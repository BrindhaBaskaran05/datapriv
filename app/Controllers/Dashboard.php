<?php
namespace App\Controllers;
class Dashboard extends BaseController
	{
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

		


		

	
	}