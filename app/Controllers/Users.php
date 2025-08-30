<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
	class Users extends BaseController
	{
	
		// Log in User

		public function login(){
			$data['title'] = 'Sign In';
			//$this->load->view('users/login', $data);
			return view('users/login');
		}
		public function phpinfo(){
		    
		echo phpinfo();
		}
		public function loginprocess(){
			 $session = session();
			 
        //$model = new UserModel();
		  $model = new \App\Models\UserModel();
		 // var_dump($model);
        $email = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
       
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['name'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                
                return redirect()->to('/dashboard');
            }else{
               
                $session->setFlashdata('msg', 'Invalid EmailId/Password');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Invalid EmailId/Password');
			//echo $session->getFlashdata('msg');
			//exit();
            return redirect()->to('/');
        }
		}
		
		    public function signup() {
 $session = session();
            $userModel = new \App\Models\UserModel();
$email=$this->request->getPost('email');
			 $data = $userModel->where('email', $email)->first();
if($data==0){
   $user_data = [
                'name' => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                // Add other fields as needed
            ];

            $userModel->save($user_data); // Use the model to save data
			
			return redirect()->to('/')->with('success', 'Registration successful!');
}else{
	 $session->setFlashdata('msg', 'Email Id Already exist');
			//echo $session->getFlashdata('msg');
			
            return redirect()->to('/');

}
         

           
     
    }

		
		public function checkemail(){
			$Email = $this->input->post('Email');
			$result=$this->User_Model->checkemail($Email);
			echo $result;
		}
		// log user out
		public function logout(){
			// unset user data
			 $session = session();
		 $session->destroy();
			//Set Message
			return redirect()->to('/')->with('success', 'You are logged out.');
			redirect(base_url());
		}

		
	}