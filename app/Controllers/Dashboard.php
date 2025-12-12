<?php

namespace App\Controllers;

use App\Models\UserPlanModel;

class Dashboard extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect(); // 🔧 FIX HERE
    }
    public function indexold()
    {
        $session = session();
        $username = $session->get('user_name');
        //var_dump($username);
        echo "Welcome " . $username . "<br><a href='" . base_url() . "/users/logout'>logout</a>";
    }
    public function index()
    {
        $session = session();
        $data['Page_title'] = 'Dashboard';
        $user_id = $session->get('user_id');
        $data['last_scan_date'] = '';


        $builder1 = $this->db->table('dp_scan');
        $builder1->select('user_id, MAX(scan_date) as last_scan_date');
        $builder1->where('user_id', $user_id);
        $query = $builder1->get();

        $result = $query->getRowArray();

        if ($result['last_scan_date']) {
            $formatted = date('d M Y h:i A', strtotime($result['last_scan_date']));
            $data['last_scan_date'] = $formatted;
        }




        $builder = $this->db->table('dp_scan_schedule');
        $dat = $builder->where('user_id', $user_id)->get()->getRowArray();
        // $data['schedules'] = array();
        /*  echo $this->db->getLastQuery();
        die; */
        if ($dat != null) {
            $builder = $this->db->table('dp_scan_schedule');
            $builder->select("
                    id, 
                    schedule, 
                    ins_dt,
                    CASE 
                       WHEN schedule = 1 THEN DATE_ADD(ins_dt, INTERVAL (DATEDIFF(CURDATE(), ins_dt) + 1) DAY)
                         -- Weekly schedule: calculate weeks passed and add next week
        WHEN schedule = 2 THEN DATE_ADD(ins_dt, INTERVAL (FLOOR(DATEDIFF(CURDATE(), ins_dt)/7) + 1)*7 DAY)
        
        -- Monthly schedule: calculate months passed and add next month
        WHEN schedule = 3 THEN DATE_ADD(ins_dt, INTERVAL (PERIOD_DIFF(DATE_FORMAT(CURDATE(), '%Y%m'), DATE_FORMAT(ins_dt, '%Y%m')) + 1) MONTH)
        
        -- Yearly schedule: calculate years passed and add next year
        WHEN schedule = 4 THEN DATE_ADD(ins_dt, INTERVAL (YEAR(CURDATE()) - YEAR(ins_dt) + 1) YEAR)
    END AS next_date
                ");
            $builder->where('user_id', $user_id);
            $data['schedules'] = $builder->get()->getRowArray();
        }



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
            if ($randlist == 0) {
                $cls = 'bg-success';
                $lbl = 'Safe';
            }
            if ($randlist > 0) {
                $cls = 'bg-danger';
                $lbl = 'Exposed';
            }

            $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $latestScan[$k]['company'] . '</strong></td>
                <td><span class="badge rounded-pill ' . $cls . '" style="text-transform: capitalize;">' . $lbl . '</span></td> 
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

        // print_r($scanIds);
        // die;


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



        /* echo '<pre>';
                print_r($result);
                die;   
 */



        $data['email_count'] = array_sum(array_column($result, 'email_count'));
        $data['phone_count'] = array_sum(array_column($result, 'phone_count'));
        $data['address_count'] = array_sum(array_column($result, 'address_count'));
        $data['dob_count'] = array_sum(array_column($result, 'dob_count'));
        $data['name_count'] = array_sum(array_column($result, 'name_count'));
        $data['username_count'] = array_sum(array_column($result, 'username_count'));
        $data['password_count'] = array_sum(array_column($result, 'password_count'));
        $data['contact2_count'] = array_sum(array_column($result, 'contact2_count'));


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
        print_r($data);
        die; */



        return view('dashboard/home', $data);
    }
    public function getcompany()
    {
        $session = session();



        $user_id = $session->get('user_id');
        $scanids = $this->request->getVar('sids');
        $page = $this->request->getVar('risk');
        $scanIds = explode(',', rtrim($scanids, ','));

        $builder1 = $this->db->table('dp_scan');

        $builder1->select('id,user_id,company');
        $builder1->where('user_id', $user_id);
        $builder1->whereIn('id', $scanIds);

        $query = $builder1->get();

        $result = $query->getResultArray();

        /* echo '<pre>';
                print_r($result);
                die; 

        echo $this->db->getLastQuery();
             die; */

        $dat = '';
        if ($page == 'myrisk') {
            $dat = '<div class="row">';
        }
        foreach ($result as $k => $company) {
            $randlist = rand(0, 10);
            if ($randlist == 0) {
                $cls = 'bg-success';
                $lbl = 'Safe';
            }
            if ($randlist > 0) {
                $cls = 'bg-danger';
                $lbl = 'Exposed';
            }

            if ($page == 'myrisk') {

                $dat .= ' <div class="col-md-4 mb-4">
                  <div class="card icon-card cursor-pointer text-start">
                      <div class="card-body">
                                 
                                <p class="icon-name fw-bold text-capitalize text-truncate mb-0"><img src="https://privacybee.com/cdn-cgi/image/fit=scale-down,width=25,height=25,quality=100/https://cdn.privacybee.com/company-logo/production/103081.png"> ' . $result[$k]['company'] . '</p>
                                <p class="small">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $result[$k]['company'] . '.com</p>
                                <hr>
                                <a href="">Removal</a>
                           
                      </div>
                  </div>
                  
                </div>';
            } else {

                $dat .= '<tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $result[$k]['company'] . '</strong></td>
                    <td><span class="badge rounded-pill ' . $cls . '" style="text-transform: capitalize;">' . $lbl . '</span></td> 
                    <td><span class="badge rounded-pill bg-label-secondary" style="text-transform: capitalize;">Review</span></td>                
                </tr>';
            }
        }

        if ($page == 'myrisk') {
            $dat .= '</div>';
        }
        $data['filtercomapany'] = $dat;

        return  json_encode($data);
    }

    public function why_privacy()
    {
        /*if (!$this->session->userdata('login')) {

               redirect('users/login');
            }*/
        $data['title'] = 'Why Privacy';

        $this->load->view('dashboard/why_privacy', $data);
    }

    public function our_solutions()
    {
        /* if (!$this->session->userdata('login')) {

               redirect('users/login');
            }*/
        $data['title'] = 'Our Solutions';

        $this->load->view('dashboard/our_solutions', $data);
    }

    public function contact()
    {
        /* if (!$this->session->userdata('login')) {

               redirect('users/login');
            }*/
        $data['title'] = 'Contact';

        $this->load->view('dashboard/contact', $data);
    }
    public function getscanresult()
    {
        $session = session();

        $user_id = $session->get('user_id');


        $UserPlanModel = new UserPlanModel();
        $Plandata = $UserPlanModel
            ->select("dp_user_plan.plan_end_dt , dp_plan.plan") // select fields
            ->join('dp_plan', 'dp_plan.plan_id = dp_user_plan.plan_id')
            ->where('dp_user_plan.user_id', $user_id)
            ->where('dp_user_plan.plan_status', 1)
            ->where('dp_user_plan.plan_end_dt >= CURDATE()', null, false)
            ->first();



        if ($Plandata != NULL) {
            $percent = rand(30, 100);
            $session->set('percent', $percent);
            $randomLimit = rand(3, 10);

            $builder = $this->db->table('dp_data_brokers_list');
            $builder->select('id, Company,Opt_out_url');
            $builder->orderBy('RAND()'); // For MySQL
            $builder->limit($randomLimit); // Use the random number as limit
            $Companies = $builder->get()->getResultArray();

            /*  echo '<pre>';
            print_r($Companies);
              echo $Companies[0]['Company'];
            die;*/
            $dat = '';
            foreach ($Companies as $k => $company) {
                $randlist = rand(0, 10);

                $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $Companies[$k]['Company'] . '</strong></td>
                <td><span class="badge bg-label-danger me-1">' . $randlist . '</span></td>                
            </tr>';
                date_default_timezone_set('Asia/Kolkata');
                $now = date('Y-m-d H:i:s');
                $scan = [
                    'user_id' => $user_id,
                    'company'    => $Companies[$k]['Company'],
                    'scan_url'    => $Companies[$k]['Opt_out_url'],
                    'status'    => 'exposed',
                    'scan_date' => $now

                ];
                $data['last_scan_date'] = date('d M Y h:i A', strtotime($now));
                $builder = $this->db->table('dp_scan');
                $builder->insert($scan);

                $scanIds[] = $insertID = $this->db->insertID();

                $myList = ["Contact No1", "Email", "Address", "Date of Birth", "Full Name", "Username", "Password", "Contact No2"];
                // Shuffle the array for random order
                shuffle($myList);

                // Select the first 3 elements after shuffling (or any desired number)
                $randomSubset = array_slice($myList, 0, 2);
                foreach ($randomSubset as $value) {

                    $scandetails = [
                        'scan_id' => $insertID,
                        'exposed_data'    => $value,
                        'status'    => 'exposed'
                    ];

                    $scandt = $this->db->table('dp_scan_detail');
                    $scandt->insert($scandetails);
                }
            }
            $session->set('companies', $dat);
            $data['companies'] = $dat;
            $data['per'] = $percent;
            $data['redirectplans'] = 0;



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



            /* print_r($scanIds);
            die; */

            $data['email_count'] = array_sum(array_column($result, 'email_count'));
            $data['phone_count'] = array_sum(array_column($result, 'phone_count'));
            $data['address_count'] = array_sum(array_column($result, 'address_count'));
            $data['dob_count'] = array_sum(array_column($result, 'dob_count'));
            $data['name_count'] = array_sum(array_column($result, 'name_count'));
            $data['username_count'] = array_sum(array_column($result, 'username_count'));
            $data['password_count'] = array_sum(array_column($result, 'password_count'));
            $data['contact2_count'] = array_sum(array_column($result, 'contact2_count'));
        } else {
            /* echo $this->db->getLastQuery();
             die; */
            $data['redirectplans'] = 1;
        }





        return  json_encode($data);
    }
}
