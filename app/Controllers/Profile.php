<?php

namespace App\Controllers;
use App\Models\UserModel;

class Profile extends BaseController
{

    public function index()
    {
        
        $session = session();
        //$data['Page_title']='Dashboard';
        $username = $session->get('user_name');   
         $data['user_name']    = $session->get('user_name');   
        $data['name']    = $session->get('name');
        $data['middle_name']    = $session->get('middle_name');
        $data['last_name']    = $session->get('last_name');
        $data['user_email']   = $session->get('user_email');
        $data['dob']    = $session->get('dob');
        $data['address1']    = $session->get('address1');
        $data['address2']    = $session->get('address2');
        $data['city']  = $session->get('city');
        $data['state']    = $session->get('state');
        $data['postal_code']    = $session->get('postal_code');
        $data['country']   = $session->get('country');

        $data['title'] = 'Profile';

       /*  print_r($data);
        die; */
        return view('dashboard/profile', $data);

        //$this->load->view('dashboard/profile', $data); 

    }

    public function update()
    {
        $session = session();
        $userId = $session->get('user_id');

        $data = $this->request->getPost();

       $session->set($data);
        /* print_r($data);
        die; */

        // Optional: Validate here
        $userModel = new UserModel();
		 // $model = new \App\Models\UserModel();
       
        $userModel->update($userId, $data);

        $session->setFlashdata('success', 'Profile updated successfully.');
        return redirect()->to('/profile');
    }

    public function changepassword()
    {
        $session = session();
        $userId = $session->get('user_id');

        $data = $this->request->getPost();

      
        //$userModel = new UserModel();

         $currentPassword = $this->request->getVar('current_password');
        $newPassword = $this->request->getVar('new_password');
         $confirmPassword = $this->request->getVar('confirm_password');

          $userModel = new \App\Models\UserModel();
        $data = $userModel->where('user_id', $userId)->first();

		 
		/* print_r($data);
        die; */
       
          // Validate current password
            if (!password_verify($currentPassword, $data['password'])) {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }

            // Validate new password match
            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'New passwords do not match.');
            }

            // Update password
            $userModel->update($userId, [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');
              //  return redirect()->to('/profile');
    }
}
