<?php
namespace App\Controllers;
use App\Models\PlanModel;
class Scan extends BaseController
{
		
        public function index()
		{
             $session = session();
               $planModel = new PlanModel();

    $plans = $planModel->findAll();
$data['plans']=$plans;
			return view('scan/home',$data);
		}
        public function checkplan(){
            echo "ok";
        }

}