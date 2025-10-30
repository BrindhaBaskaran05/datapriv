<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserPlanModel;
use App\Models\PlanModel;



class Plans extends BaseController
{
	protected $db;
	public function __construct()
	{
		$this->db = \Config\Database::connect(); // 🔧 FIX HERE
	}
   public function plan_expair() {
    
      $session = session();
      $user_id = $session->get('user_id');
      $planstatus = [        
          'plan_status'    => 0		
        ];

      $builder = $this->db->table('dp_user_plan'); 
      $builder->where('user_id', $user_id);
      $builder->where('plan_status', 1);
      $builder->where('plan_end_dt < CURDATE()');
      $builder->update($planstatus);      
      die;
      
   }
}