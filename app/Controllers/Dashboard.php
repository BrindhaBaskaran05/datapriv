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
        //$data['Page_title']='Dashboard';  
        $user_id = $session->get('user_id');
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

        /*  print_r($data['0']['next_date']);
                die; */


        return view('dashboard/home', $data);
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

                $dat .= '<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $Companies[$k]['Company'] . '</strong></td>
                <td><span class="badge bg-label-danger me-1">' . $randomLimit . '</span></td>                
            </tr>';

                $scan = [
                    'user_id' => $user_id,
                    'scan_url'    => $Companies[$k]['Opt_out_url'],
                    'status'    => 'exposed'
                ];
                $builder = $this->db->table('dp_scan');
                $builder->insert($scan);

                $insertID = $this->db->insertID();

                $myList = ["phone Number", "Email", "Address"];
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
        } else {
            $data['redirectplans'] = 1;
        }


        return  json_encode($data);
    }
}
