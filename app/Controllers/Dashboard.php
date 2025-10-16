<?php
namespace App\Controllers;
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
			echo "Welcome ".$username."<br><a href='".base_url()."/users/logout'>logout</a>";
		}
        	public function index()
		{
             $session = session();
             $data['Page_title']='Dashboard';               
			return view('dashboard/home',$data);
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
            $dat='';
            foreach($Companies as $k=>$company){
                
             $dat .='<tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$Companies[$k]['Company'].'</strong></td>
                <td><span class="badge bg-label-danger me-1">'.$randomLimit.'</span></td>                
            </tr>'; 
            }
            $session->set('companies', $dat);
            $data['companies']=$dat;
            $data['per']=$percent;
            return  json_encode($data);

           
		   
       }		

	
	}