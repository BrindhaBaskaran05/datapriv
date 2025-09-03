<?php
namespace App\Controllers;
use App\Models\PlanModel;
use App\Models\UserPlanModel;
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
        public function updateplan(){
            $PlanId=$this->request->getPost('plan_id');
             $session = session();
            $user_id = $session->get('user_id');

             $planModel = new PlanModel();
              $Plandata = $planModel
            ->where('plan_id', $PlanId)
            ->first();
            $ValidDays=$Plandata['valid_days'];
            $StartDate=date("Y-m-d");
            $EndDate=date("Y-m-d",strtotime($StartDate. ' + '.$ValidDays.' days'));

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
                  ->where('plan_id', $PlanId)
                  ->set([
                      'plan_status' => 1,
                      'plan_start_dt' => $StartDate,
                      'plan_end_dt' => $EndDate
                  ])
                  ->update();
}
return redirect()->to('/scan');
        }

}