<?php

namespace App\Controllers;

use App\Models\PlanModel;
use App\Models\UserPlanModel;
use App\Models\UserPlanHistoryModel;

class Scan extends BaseController
{

  protected $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect(); // 🔧 FIX HERE
  }

  public function index()
  {

    $session = session();
    $user_id = $session->get('user_id');
    $planModel = new PlanModel();
    $plans = $planModel->findAll();
    $data['plans'] = $plans;

    $UserPlanHistoryModel = new UserPlanHistoryModel();
    $FreeCountUsed = $UserPlanHistoryModel
      ->where('user_id', $user_id)
      ->where('plan_status', 1)
      ->where('plan_id', 1)
      ->where('plan_end_dt < CURDATE()', null, false) // disable escaping
      ->countAllResults();
    $data['FreeCountUsed'] = $FreeCountUsed;
    $data['Page_title'] = 'Scan';

    /* Scan Results start */
    $subQuery = $this->db->table('dp_scan')
      ->select('user_id, MAX(scan_date) AS last_scan_date')
      ->where('user_id', $user_id)
      ->getCompiledSelect();

    $builder = $this->db->table('dp_scan s');
    $builder->select('s.id AS scan_id, s.user_id, s.scan_date,company');
    $builder->join("($subQuery) latest", 's.user_id = latest.user_id AND s.scan_date = latest.last_scan_date');
    $query = $builder->get();

    $latestScan = $query->getResultArray();


   
    $dat = '';
    foreach ($latestScan as $k => $company) {
       $randlist = rand(0, 10);
        if($randlist==0){ $cls='bg-success'; $lbl='Safe'; }
        if($randlist>0){ $cls='bg-danger'; $lbl='Exposed'; }
        
            $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $latestScan[$k]['company'] . '</strong></td>
                <td><span class="badge rounded-pill '.$cls.'" style="text-transform: capitalize;">'.$lbl.'</span></td> 
                <td><span class="badge rounded-pill bg-label-secondary" style="text-transform: capitalize;">Review</span></td>                
            </tr>';
    }
    $data['companieslist'] = $dat;
    $scan_id = '';
    if ($latestScan) {
      foreach ($latestScan as $key => $value) {
        $scan_id .= $value['scan_id'] . ',';
      }
    }
    $scanIds = explode(',', rtrim($scan_id, ','));


    $builder = $this->db->table('dp_scan_detail');

    $builder->select("
            scan_id,
            SUM(CASE WHEN exposed_data = 'Email' AND status = 'exposed' THEN 1 ELSE 0 END) AS email_count,
            SUM(CASE WHEN exposed_data = 'Contact No1' AND status = 'exposed' THEN 1 ELSE 0 END) AS phone_count,
            SUM(CASE WHEN exposed_data = 'Address' AND status = 'exposed' THEN 1 ELSE 0 END) AS address_count,
            SUM(CASE WHEN exposed_data = 'Date of Birth' AND status = 'exposed' THEN 1 ELSE 0 END) AS dob_count,
            SUM(CASE WHEN exposed_data = 'Username' AND status = 'exposed' THEN 1 ELSE 0 END) AS username_count,
            SUM(CASE WHEN exposed_data = 'Password' AND status = 'exposed' THEN 1 ELSE 0 END) AS password_count,
            SUM(CASE WHEN exposed_data = 'Contact No2' AND status = 'exposed' THEN 1 ELSE 0 END) AS contact2_count,
            SUM(CASE WHEN exposed_data = 'Full Name' AND status = 'exposed' THEN 1 ELSE 0 END) AS name_count

        ");
    $builder->whereIn('scan_id', $scanIds);
    $builder->groupBy('scan_id');
    $query = $builder->get();

    $result = $query->getResultArray();




    $data['email_count'] = array_sum(array_column($result, 'email_count'));
    $data['phone_count'] = array_sum(array_column($result, 'phone_count'));
    $data['address_count'] = array_sum(array_column($result, 'address_count'));
    $data['dob_count'] = array_sum(array_column($result, 'dob_count'));
    $data['name_count'] = array_sum(array_column($result, 'name_count'));
    $data['username_count'] = array_sum(array_column($result, 'username_count'));
    $data['password_count'] = array_sum(array_column($result, 'password_count'));
    $data['contact2_count'] = array_sum(array_column($result, 'contact2_count'));


     

    return view('scan/home', $data);
  }
  public function checkplan()
  {

    $Planid = $this->request->getPost('Planid');
    //echo "ok";
    /*first() → returns row.

findAll() → returns array of rows.

countAllResults() → returns number of rows.
*/
    $session = session();
    $user_id = $session->get('user_id');
    $UserPlanModel = new UserPlanModel();
    $PlandataCount = $UserPlanModel
      ->where('user_id', $user_id)
      ->where('plan_status', 1)
      ->where('plan_end_dt >= CURDATE()', null, false) // disable escaping
      ->countAllResults();

    // $query = $UserPlanModel->getLastQuery();
    //echo $query;
    $data['activeplan'] = $PlandataCount;

    $Planbasic = $UserPlanModel
      ->where('user_id', $user_id)
      ->where('plan_id', 1)
      ->where('plan_end_dt <= CURDATE()', null, false) // disable escaping
      ->countAllResults();
    $data['expiredbasic'] = $Planbasic;
    $data['Planid'] = $Planid;

    return  json_encode($data);
  }
  public function updateplan()
  {
    $PlanId = $this->request->getPost('plan_id');
    $session = session();
    $user_id = $session->get('user_id');

    $planModel = new PlanModel();
    $Plandata = $planModel
      ->where('plan_id', $PlanId)
      ->first();
    $ValidDays = $Plandata['valid_days'];
    $StartDate = date("Y-m-d");
    $EndDate = date("Y-m-d", strtotime($StartDate . ' + ' . $ValidDays . ' days'));
    $EndDateFmt = date("d-m-Y", strtotime($EndDate));

    $ses_data = [
      'PlanName'   => $Plandata['plan'],     // column from dp_plan table
      'PlanExpDate' => $EndDateFmt   // alias or column name
    ];

    // Update (or overwrite) session values
    $session->set($ses_data);

    $UserPlanModel = new UserPlanModel();
    $data = $UserPlanModel
      ->where('user_id', $user_id)
      //  ->where('plan_id', $PlanId)
      ->first();

    if ($data === null) {
      // No record found

      $UserPlanModel->insert([
        'user_id' => $user_id,
        'plan_id' => $PlanId,
        'plan_start_dt' => $StartDate,
        'plan_end_dt' => $EndDate,
        'plan_status' => 1
      ]);
    } else {
      // Record exists
      $UserPlanModel->where('user_id', $user_id)
        ->set([
          'plan_status' => 1,
          'plan_id' => $PlanId,
          'plan_start_dt' => $StartDate,
          'plan_end_dt' => $EndDate
        ])
        ->update();
    }
    //$query = $UserPlanModel->getLastQuery();
    //echo $query;
    //exit();
    $UserPlanHistoryModel = new UserPlanHistoryModel();
    $UserPlanHistoryModel->insert([
      'user_id' => $user_id,
      'plan_id' => $PlanId,
      'plan_start_dt' => $StartDate,
      'plan_end_dt' => $EndDate,
      'plan_status' => 1
    ]);
    return redirect()->to('/scan');
  }

  function userscan() {}

  public function Myriskexploser()
  {

    $data['plans'] = 'Myriskexploser';

    $session = session();
    $percent = rand(30, 100);
    $session->set('percent', $percent);
    $user_id = $session->get('user_id');


    $randomLimit = rand(3, 10);


    $data['per'] = $percent;


    //count start
    $subQuery = $this->db->table('dp_scan')
      ->select('user_id, MAX(scan_date) AS last_scan_date')
      ->where('user_id', $user_id)
      ->getCompiledSelect();

    $builder = $this->db->table('dp_scan s');
    $builder->select('s.id AS scan_id, s.user_id, s.scan_date,company');
    $builder->join("($subQuery) latest", 's.user_id = latest.user_id AND s.scan_date = latest.last_scan_date');
    $query = $builder->get();

    $latestScan = $query->getResultArray();




    $randomLimit = 2;
    $dat = '';
    $scan_id = '';
    $data['companieslist'] = '';
    if ($latestScan) {
      $dat = '<div class="row">';
        foreach ($latestScan as $key => $value) {
               $dat .= ' <div class="col-md-4 mb-4">
                  <div class="card icon-card cursor-pointer text-start">
                      <div class="card-body">
                                 
                                <p class="icon-name fw-bold text-capitalize text-truncate mb-0"><img src="https://privacybee.com/cdn-cgi/image/fit=scale-down,width=25,height=25,quality=100/https://cdn.privacybee.com/company-logo/production/103081.png"> ' . $latestScan[$key]['company'] . '</p>
                                <p class="small">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $latestScan[$key]['company'] . '.com</p>
                                <hr>
                                <a href="">Removal</a>
                           
                      </div>
                  </div>
                  
                </div>';


          $scan_id .= $value['scan_id'] . ',';
               
            }
            $dat .= '</div>';  

    /*   foreach ($latestScan as $k => $company) {

        $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $latestScan[$k]['company'] . '</strong></td>
                <td><span class="badge bg-label-danger me-1">' . $randomLimit . '</span></td>                
              </tr>';
        $scan_id .= $company['scan_id'] . ',';
      } */
      $data['companieslist'] = $dat;
    }


    $scanIds = explode(',', rtrim($scan_id, ','));

    /*  print_r($scanIds);
        die; */


    $builder = $this->db->table('dp_scan_detail');

    $builder->select("
            scan_id,
            exposed_data,
            SUM(CASE WHEN exposed_data = 'Email' AND status = 'exposed' THEN 1 ELSE 0 END) AS email_count,
            SUM(CASE WHEN exposed_data = 'Contact No1' AND status = 'exposed' THEN 1 ELSE 0 END) AS phone_count,
            SUM(CASE WHEN exposed_data = 'Address' AND status = 'exposed' THEN 1 ELSE 0 END) AS address_count,
            SUM(CASE WHEN exposed_data = 'Date of Birth' AND status = 'exposed' THEN 1 ELSE 0 END) AS dob_count,
            SUM(CASE WHEN exposed_data = 'Username' AND status = 'exposed' THEN 1 ELSE 0 END) AS username_count,
            SUM(CASE WHEN exposed_data = 'Password' AND status = 'exposed' THEN 1 ELSE 0 END) AS password_count,
            SUM(CASE WHEN exposed_data = 'Contact No2' AND status = 'exposed' THEN 1 ELSE 0 END) AS contact2_count,
            SUM(CASE WHEN exposed_data = 'Full Name' AND status = 'exposed' THEN 1 ELSE 0 END) AS name_count

        ");
    $builder->whereIn('scan_id', $scanIds);
    $builder->groupBy('scan_id');
    $query = $builder->get();

    $result = $query->getResultArray();
    /* echo '<pre>';
    print_r();
    die; */

   /*  echo $last_query = $this->db->getLastQuery();  // get last executed query
  die; */

    $data['email_count'] = array_sum(array_column($result, 'email_count'));
    $data['phone_count'] = array_sum(array_column($result, 'phone_count'));
    $data['address_count'] = array_sum(array_column($result, 'address_count'));
    $data['dob_count'] = array_sum(array_column($result, 'dob_count'));
    $data['name_count'] = array_sum(array_column($result, 'name_count'));
    $data['username_count'] = array_sum(array_column($result, 'username_count'));
    $data['password_count'] = array_sum(array_column($result, 'password_count'));
    $data['contact2_count'] = array_sum(array_column($result, 'contact2_count'));

    $data['personal_info'] =array_unique(array_column($result, 'exposed_data'));


    $filterids = [
            'email_sids'    => [],
            'phone_sids'    => [],
            'address_sids'  => [],
            'dob_sids'      => [],
            'username_sids' => [],
            'password_sids' => [],
            'contact2_sids' => [],
            'name_sids'     => []
        ];

        $map = [
            'email_sids'    => 'email_count',
            'phone_sids'    => 'phone_count',
            'address_sids'  => 'address_count',
            'dob_sids'      => 'dob_count',
            'username_sids' => 'username_count',
            'password_sids' => 'password_count',
            'contact2_sids' => 'contact2_count',
            'name_sids'     => 'name_count'
        ];

        foreach ($result as $row) {
            foreach ($map as $sidKey => $countKey) {
                if ($row[$countKey] > 0) {
                    $filterids[$sidKey][] = $row['scan_id'];
                }
            }
        }

        $data['sids'] = $filterids;

        /* echo '<pre>';
        print_r($result);
        die;  */

    return view('scan/myrisk_exploser', $data);
  }
  public function scan_schedule()
  {


    $data['title'] = 'scan schedule';
    $session = session();
    $user_id = $session->get('user_id');

    $builder = $this->db->table('dp_scan_schedule');
    $builder->select('schedule');
    $builder->where('user_id', $user_id);

    $query = $builder->get();
    $data['schedule'] = $query->getRowArray();   // keep title + schedule

    /* echo $last_query = $this->db->getLastQuery();  // get last executed query
  die; */
    /*  echo '<pre>';
    print_r($data);
    die;  */

    return view('scan/scan_schedule', $data);
  }

  public function save_schedule_time()
  {
    $session = session();
    $user_id = $session->get('user_id');
    $schedule = [
      'user_id' => $user_id,
      'schedule'    => $this->request->getPost('scan_schedule')
    ];

    $builder = $this->db->table('dp_scan_schedule');
    $data = $builder->where('user_id', $user_id)->get()->getRowArray();

    if ($data === null) {

      $builder = $this->db->table('dp_scan_schedule');
      $builder->insert($schedule);
    } else {

      $builder = $this->db->table('dp_scan_schedule');
      $builder->where('user_id', $user_id);
      $builder->update($schedule);
    }


    return redirect()->back()->with('success', 'Scan Schedule Added successfully.');
  }
}
