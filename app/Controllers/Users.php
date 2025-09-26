<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserPlanModel;
use App\Models\PlanModel;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\RequestInterface;


class Users extends BaseController
{
	protected $db;

	public function __construct()
	{
		$this->db = \Config\Database::connect(); // 🔧 FIX HERE
	}

	// Log in User

	public function login()
	{
		$data['title'] = 'Sign In';
		//$this->load->view('users/login', $data);
		return view('users/login');
	}
	public function signupform()
	{
		$data['title'] = 'Sign In';
		//$this->load->view('users/login', $data);
		$builder = $this->db->table('dp_countries');
		$builder->select('country_id, country_name');
		$data['countries'] =  $builder->get()->getResultArray();
		/* print_r($data);
			die; */

		return view('users/signup', $data);
	}
	public function phpinfo()
	{

		echo phpinfo();
	}
	public function loginprocess()
	{
		$session = session();

		//$model = new UserModel();
		$model = new \App\Models\UserModel();
		// var_dump($model);
		$email = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data = $model->where('email', $email)->first();




		if ($data) {
			$pass = $data['password'];
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {



				$ses_data = [
					'user_id'       => $data['user_id'],
					'user_name'     => $data['name'],
					'middle_name'    => $data['middle_name'],
					'last_name'    => $data['last_name'],
					'user_email'    => $data['email'],
					'dob'    => $data['dob'],
					'address1'    => $data['address'],
					'address2'    => $data['address2'],
					'city'    => $data['city'],
					'state'    => $data['state'],
					'postal_code'    => $data['postal_code'],
					'country'    => $data['country'],


					'logged_in'     => TRUE
				];

				//fecth plan
				$UserPlanModel = new UserPlanModel();
				$Plandata = $UserPlanModel
					->select("date_format(dp_user_plan.plan_end_dt,'%d-%m-%Y') as EndDate , dp_plan.plan") // select fields
					->join('dp_plan', 'dp_plan.plan_id = dp_user_plan.plan_id')
					->where('dp_user_plan.user_id', $data['user_id'])
					->where('dp_user_plan.plan_status', 1)
					->where('dp_user_plan.plan_end_dt >= CURDATE()', null, false)
					->first();
				if ($Plandata != NULL) {
					$ses_data['PlanName'] = $Plandata['plan'];
					$ses_data['PlanExpDate'] = $Plandata['EndDate'];
				} else {
					$ses_data['PlanName'] = "Guest";
					$ses_data['PlanExpDate'] = "-";
				}
				$session->set($ses_data);




				return redirect()->to('/dashboard');
			} else {

				$session->setFlashdata('msg', 'Invalid EmailId/Password');
				return redirect()->to('/');
			}
		} else {
			$session->setFlashdata('msg', 'Invalid EmailId/Password');
			//echo $session->getFlashdata('msg');
			//exit();
			return redirect()->to('/');
		}
	}

	public function signup()
	{
		$session = session();
		$userModel = new \App\Models\UserModel();
		$email = $this->request->getPost('email');
		$data = $userModel->where('email', $email)->first();
		if ($data == 0) {
			$user_data = [
				'name' => $this->request->getPost('name'),
				'email'    => $this->request->getPost('email'),
				'middle_name'    => $this->request->getPost('middle_name'),
				'last_name'    => $this->request->getPost('last_name'),
				'dob'    => $this->request->getPost('dob'),
				'city'    => $this->request->getPost('city'),
				'state'    => $this->request->getPost('state'),
				'postal_code'    => $this->request->getPost('postal_code'),
				'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
				// Add other fields as needed
			];

			$userModel->save($user_data); // Use the model to save data

			return redirect()->to('/')->with('success', 'Registration successful!');
		} else {
			$session->setFlashdata('msg', 'Email Id Already exist');
			//echo $session->getFlashdata('msg');

			return redirect()->to('/');
		}
	}


	public function checkemail()
	{
		$Email = $this->input->post('Email');
		$result = $this->User_Model->checkemail($Email);
		echo $result;
	}
	// log user out
	public function logout()
	{
		// unset user data
		$session = session();
		$session->destroy();
		//Set Message
		return redirect()->to('/')->with('success', 'You are logged out.');
		redirect(base_url());
	}
	
	public function plans()
	{
		$data['title'] = 'User Plans';
		 $session = session();
               $user_id = $session->get('user_id');
             $planModel = new PlanModel();
             $plans = $planModel->findAll();
             $data['plans']=$plans;		
		return view('users/plans',$data);
	}
}
