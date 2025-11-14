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
    ->where('user_id', 15)
    ->getCompiledSelect();

$builder = $this->db->table('dp_scan s');
$builder->select('s.id AS scan_id, s.user_id, s.scan_date,company');
$builder->join("($subQuery) latest", 's.user_id = latest.user_id AND s.scan_date = latest.last_scan_date');
$query = $builder->get();

$latestScan = $query->getResultArray();

 
$randomLimit=2;
$dat='';
    foreach ($latestScan as $k => $company) {

                $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $latestScan[$k]['company'] . '</strong></td>
                <td><span class="badge bg-label-danger me-1">' . $randomLimit . '</span></td>                
            </tr>';
    }
        $data['companieslist']=$dat;
        $scan_id = ''; 
        if ($latestScan) {
            foreach ($latestScan as $key => $value) {
                $scan_id .= $value['scan_id'].',';
            }    
        }
        $scanIds = explode(',', rtrim($scan_id, ','));


        $builder = $this->db->table('dp_scan_detail');

        $builder->select("
            scan_id,
            SUM(CASE WHEN exposed_data = 'Email' AND status = 'exposed' THEN 1 ELSE 0 END) AS email_count,
            SUM(CASE WHEN exposed_data = 'phone Number' AND status = 'exposed' THEN 1 ELSE 0 END) AS phone_count,
            SUM(CASE WHEN exposed_data = 'Physical Address' AND status = 'exposed' THEN 1 ELSE 0 END) AS address_count,
            SUM(CASE WHEN exposed_data = 'Date of Birth' AND status = 'exposed' THEN 1 ELSE 0 END) AS dob_count,
            SUM(CASE WHEN exposed_data = 'Full Name' AND status = 'exposed' THEN 1 ELSE 0 END) AS name_count

        ");
        $builder->whereIn('scan_id', $scanIds);
        $builder->groupBy('scan_id');
        $query = $builder->get();

        $result = $query->getResultArray();




        $data['email_count']= array_sum(array_column($result, 'email_count'));
        $data['phone_count']= array_sum(array_column($result, 'phone_count'));
        $data['address_count']= array_sum(array_column($result, 'address_count'));
        $data['dob_count']= array_sum(array_column($result, 'dob_count'));
        $data['name_count']= array_sum(array_column($result, 'name_count'));

    return view('scan/home', $data);
  }
  public function checkplan()
  {
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
    echo $PlandataCount;
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

    $randomLimit = rand(3, 10);

    $builder = $this->db->table('dp_data_brokers_list');
    $builder->select('id, Company');
    $builder->orderBy('RAND()'); // For MySQL
    $builder->limit($randomLimit); // Use the random number as limit
    $Companies = $builder->get()->getResultArray();

    /*  echo '<pre>';
            print_r($Companies);
              echo $Companies[0]['Company'];
            die; */
    $dat = '';
    foreach ($Companies as $k => $company) {

      $dat .= ' <div class="col-md-6 mb-4">
                  <div class="card icon-card cursor-pointer text-start">
                      <div class="card-body">
                                 <span class="badge bg-label-danger me-1" style="float: right;">fix</span>
                                <p class="icon-name text-capitalize text-truncate mb-0">' . $Companies[$k]['Company'] . '</p>
                                <p class="small">' . $Companies[$k]['Company'] . '.com</p>
                            <div class="demo-inline-spacing">
                                <button type="button" class="btn btn-sm rounded-pill btn-outline-primary">Kept</button>
                                <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary">Delete</button>
                                <button type="button" class="btn btn-sm rounded-pill btn-outline-success">Do Not Sell</button>                            
                            </div>
                      </div>
                  </div>
                  
                </div>';
    }
    $session->set('companies', $dat);
    $data['companies'] = $dat;
    $data['per'] = $percent;

    return view('scan/myrisk_exploser', $data);
  }
  public function scan_schedule()
  {  
    $data['title'] = 'scan schedule';
      $session = session();
      $user_id = $session->get('user_id');
    $builder = $this->db->table('dp_scan_schedule'); 
     $builder->select('schedule');
    $data = $builder->where('user_id', $user_id)->get()->getRowArray();

    /* print_r($data['schedule']);
    die; */

    return view('scan/scan_schedule', $data);
  }

  public function save_schedule_time(){
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
    }else{

      $builder = $this->db->table('dp_scan_schedule'); 
      $builder->where('user_id', $user_id);
      $builder->update($schedule);
    }

			
       return redirect()->back()->with('success', 'Scan Schedule Added successfully.');
  }
}
