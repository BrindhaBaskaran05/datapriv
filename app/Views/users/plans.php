<!DOCTYPE html>

<?= $this->include('includes/header') ?>
<body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <?= $this->include('includes/leftsidebar') ?>

         <!-- Layout container -->
         <div class="layout-page">
            <?= $this->include('includes/header_section') ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
               <div class="col-xxl">

                  <div class="card-header d-flex align-items-center justify-content-between">
                     <!-- Content -->
                      <form name='PlanForm' id='PlanForm' method='post'>
                     <div tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel4">Simple pricing for Peace of Mind
                                 </h5>

                              </div>
                              <div class="modal-body">
                                 <div class="row mb-5">

                                    <?php
                                   /*  $Plan1 = array(
                                       "Removal from 966+ data brokers and people search sites",
                                       "Mostly automated removals, backed by human support",
                                       "Comprehensive removal of emails, phones, addresses, and alternative names",
                                       "Priority Removals: Expedited removals for urgent situations",
                                       "Cost-Effective: Lower costs for non-urgent removals",
                                       "Continuous Monitoring: Regular monthly re-scans to ensure your data remains private",
                                    );
                                    $Plan2 = array(
                                       "Comprehensive removal of emails, phones, addresses, and alternative names",
                                       "Priority Removals: Expedited removals for urgent situations",
                                       "Cost-Effective: Lower costs for non-urgent removals",
                                       "Continuous Monitoring: Regular monthly re-scans to ensure your data remains private",
                                       "Real-Time Dashboard: Track progress and current efforts in real-time",
                                       "Monthly Progress Reports: Receive detailed email summaries of your removal progress"
                                    );
                                    $Plan3 = array(
                                       "Removal from 966+ data brokers and people search sites",
                                       "Mostly automated removals, backed by human support",
                                       "Comprehensive removal of emails, phones, addresses, and alternative names",
                                       "Priority Removals: Expedited removals for urgent situations",
                                       "Cost-Effective: Lower costs for non-urgent removals",

                                       "Monthly Progress Reports: Receive detailed email summaries of your removal progress"
                                    ); */


                                    $i = 1;
                                     
                                    foreach ($plans as $plan): ?>

                                       <?php
                                      

                                       if ($plan['plan_cost'] == 0) {
                                          $PlanCost = "Free";
                                       } else {
                                          $PlanCost = $plan['plan_cost'];
                                       }
                                       

                                       $array = explode('@',  $plan['des']);

                                       // Optional: Trim spaces around each value
                                       //$array = array_map('trim', $array);

                                      /*  echo '<pre>';
                                       print_r($des);
                                       die; */
                                      
                                       
                                       ?>
                                       <div class="col-md-6 col-lg-4 mb-3"
                                          style="cursor: pointer;"
                                          onclick="fnchoose(<?php echo $plan['plan_id']; ?>)">
                                          <!--background: linear-gradient(135deg, #2B9B8E, #3B6EA5);-->
                                          <div id="Plan<?php echo $i; ?>" class="card h-100 holographic-card"
                                             style='background-color: #2B9B8E;'>
                                             <div class="card-body">
                                                <h5 class="card-title" style="
                                 font-size: 30px;
                                    color: #fff;
                                          font-weight: bold;
                                 
                              "><?= esc($plan['plan']) ?></h5>
                                                <h6 class="card-subtitle text-muted" style="
                              color: #ffffffb0 !important;
                           "><?= esc($plan['description']) ?></h6>
                                                <br>
                                                <h3 style="
                              color: #fff;
                              font-weight: bold;
                              text-align: center;
                           "><?= "&#8377; " . esc($PlanCost) . " / " . esc($plan['valid_days']) . " days"; ?></h3>
                                                <div style="
                              font-size: 11px;
                              color: #ffffffe8;
                           ">
                                                   <?php
                                                  /*  if ($i == 1) {
                                                      $plan = $Plan1;
                                                   }
                                                   if ($i == 2) {
                                                      $plan = $Plan2;
                                                   }
                                                   if ($i == 3) {
                                                      $plan = $Plan3;
                                                   } */
                                                   $i++;

                                                   // Foreach loop
                                                   foreach ($array as $item) {
                                                      echo "<img src='" . base_url() . 'web_assets/img/tick_new.png' . "' style='
                                    height: 22px !important;
                                    width: auto;
                                    background: #2B9B8E;
                                    border: 3px solid #2B9B8E;
                                 '> " . $item . "<br>";
                                                   }
                                                   ?>
                                                </div>


                                             </div>
                                             <!--img class="img-fluid" src="<?php echo base_url(); ?>web_assets/img/elements/13.jpg" alt="Card image cap"-->

                                          </div>
                                       </div>

                                    <?php endforeach; ?>

                                 </div>

                              </div>
                              <div class="modal-footer">

                                 <input type='hidden' name='plan_id' id='plan_id'>
                                 <?php  if($expired==0){?>
                               <button type="button" onclick='fnProceed()' style='display:none' id='Buybutton' class="btn btn-primary">Proceed</button>
                              <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


<!-- / Layout wrapper -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    checkplan();

    function checkplan() {
      //alert("ok");
      
      base_url = "<?php echo base_url(); ?>";
      $.ajax({
        type: "POST",
        url: base_url + "scan/checkplan",
        data: {
          //Bankid,Txid
        },
        success: function(result) {
          // alert(result);
          // $('#exLargeModal').modal({show:true});
          var myModal = new bootstrap.Modal(document.getElementById('exLargeModal'));
          myModal.show();
          /*document.getElementById('loader').style.display="none";
          Res=result.split("~");
          document.getElementById('txtId').value=Txid;
          document.getElementById('txtBankid').value=Bankid;

          document.getElementById('txtBankRef').value=Res[0];
          document.getElementById('txtAccount').value=Res[1];
          document.getElementById('txtAmount').value=Res[2];
          document.getElementById('txtDate').value=Res[3];
          $('#myModal').modal({show:true});
          */
        }

      });
    }

    function fnchoose(Planid) {
      document.getElementById('Plan1').style.backgroundColor = "#2B9B8E";
      document.getElementById('Plan2').style.backgroundColor = "#2B9B8E";
      document.getElementById('Plan3').style.backgroundColor = "#2B9B8E";
      document.getElementById('Plan' + Planid).style.backgroundColor = '#0A2540';

      document.getElementById('Buybutton').style.display = "";
      document.getElementById('plan_id').value = Planid;

    }

    function fnProceed(){
    Planid=document.getElementById('plan_id').value;
    if(Planid==1 || true){
      fnSubmit()
    }
}
function fnSubmit(){
   Planid=document.getElementById('plan_id').value;
     document.getElementById('Buybutton').disabled=true;
     //showspinner();
     PlanForm.action="<?php echo base_url(); ?>scan/updateplan";
    PlanForm.submit();
}
  </script>
  <?php  $this->include('includes/footer') ?>

</body>

</html>