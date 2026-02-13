<!DOCTYPE html>

<?= $this->include('includes/header') ?>
<style>
/* Page Background */
.content-wrapper {
    background: linear-gradient(135deg, #f4f7fb, #eef2f9);
    padding: 40px 20px;
}

/* Pricing Title */
.modal-title {
    font-weight: 700;
    font-size: 26px;
    color: #0A2540;
}

/* Pricing Cards */
.holographic-card {
    border-radius: 18px;
    border: none;
    transition: all 0.35s ease;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* Gradient Background */
.holographic-card {
    background: linear-gradient(135deg, #2B9B8E, #3B6EA5);
}

/* Hover Effect */
.holographic-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Active Plan Highlight */
.holographic-card.active-plan {
    background: linear-gradient(135deg, #0A2540, #3B6EA5);
    transform: scale(1.03);
    box-shadow: 0 30px 60px rgba(10, 37, 64, 0.35);
}

/* Plan Title */
.card-title {
    font-size: 28px !important;
    font-weight: 700;
}

/* Plan Price */
.plan-price {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
    margin: 15px 0;
}

/* Feature List */
.plan-features {
    font-size: 13px;
    line-height: 1.8;
    margin-top: 15px;
}

/* Tick icon */
.plan-features img {
    margin-right: 8px;
}

/* Proceed Button */
#Buybutton {
    background: linear-gradient(135deg, #0A2540, #3B6EA5);
    border: none;
    border-radius: 10px;
    padding: 10px 30px;
    font-weight: 600;
    transition: 0.3s ease;
}

#Buybutton:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(10, 37, 64, 0.3);
}
</style>

<body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <?= $this->include('includes/leftsidebar') ?>

         <!-- Layout container -->
         <div class="layout-page">
            <?= $this->include('includes/header_section') ?>
            <?php $session = session(); $PlanExpDate= $session->get('PlanExpDate'); ?>
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
                                     <span style="float: right;"><?php if($PlanExpDate>0) { ?><small class="text-muted" style="color: #0A2540 !important;font-weight: bold;font-style: italic;">Expire on <?php echo date('d M Y', strtotime($PlanExpDate)); ?></small> <?php  } ?></span>


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
                                       $session = session();
                                           $PlanName = $session->get('PlanName');

                                                   if ($i == 1 && $PlanName =='Free') {
                                                      $bg='#0A2540;';
                                                   }
                                                   else if ($i == 2 && $PlanName =='Basic') {
                                                      $bg='#0A2540;';
                                                   }
                                                  else if ($i == 3 && $PlanName =='Pro') {
                                                      $bg='#0A2540;';
                                                  /* }                                         
                                                   else{$bg='#2B9B8E;';}*/
												   } else if ($i == 4 && $PlanName == 'Elite') {
														$bg = '#0A2540;';
													} else if ($i == 5 && $PlanName == 'Pay-Per-Use Add-ons') {
														$bg = '#0A2540;';
													} else {
														$bg = '#2B9B8E;';
													}

                                          ?>
                                          <div class="col-md-6 col-lg-4 mb-3"
                                             style="cursor: pointer;"
                                             onclick="fnchoose(<?php echo $plan['plan_id']; ?>)">
                                             <!--background: linear-gradient(135deg, #2B9B8E, #3B6EA5);-->
                                             <div id="Plan<?php echo $i; ?>" class="card h-100 holographic-card"
                                                style='background-color: <?php echo $bg; ?> '>
                                                <div class="card-body">
                                                   <h5 class="card-title" style="font-size: 30px;color: #fff;font-weight: bold;"><?= esc($plan['plan']) ?></h5>
                                                   <h6 class="card-subtitle text-muted" style="
                              color: #ffffffb0 !important;
                           "><?= esc($plan['description']) ?></h6>
                                                   <br>
                                                  <!-- <h3 style="
                              color: #fff;
                              font-weight: bold;
                              text-align: center;
                           "><?= "&#8377; " . esc($PlanCost) . " / " . esc($plan['valid_days']) . " days"; ?></h3>-->
                                                   <div style="
                              font-size: 15px;
                              color: #ffffffe8;
                           ">
                                                      <?php
                                                      
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
                                    <?php if ($expired == 0) { ?>
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
      

      function checkplan(Planid) {
         //alert("ok");

         base_url = "<?php echo base_url(); ?>";
         $.ajax({
            type: "POST",
            url: base_url + "scan/checkplan",
            data: {
               Planid
            },
            success: function(result) {
                let res = JSON.parse(result);
                var Planid = document.getElementById('plan_id').value;
               //alert(res.Planid);
               if(res.activeplan !=0)
               document.getElementById('Plan' + Planid).style.backgroundColor = '#0A2540';
              if(res.expiredbasic >=1 && res.Planid==1)
                 document.getElementById('Buybutton').disabled = true;
               else{
                   document.getElementById('Buybutton').disabled = false;
               }

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

      function fnchoose_OLD(Planid) {
         checkplan(Planid);
         document.getElementById('Plan1').style.backgroundColor = "#2B9B8E";
         document.getElementById('Plan2').style.backgroundColor = "#2B9B8E";
         document.getElementById('Plan3').style.backgroundColor = "#2B9B8E";
         document.getElementById('Plan' + Planid).style.backgroundColor = '#0A2540';

         document.getElementById('Buybutton').style.display = "";
         document.getElementById('plan_id').value = Planid;

      }
      function fnchoose(Planid) {

   checkplan(Planid);

   // Remove active from all
   document.querySelectorAll('.holographic-card').forEach(card => {
      card.classList.remove('active-plan');
   });

   // Add active class
   document.getElementById('Plan' + Planid).classList.add('active-plan');

   document.getElementById('Buybutton').style.display = "inline-block";
   document.getElementById('plan_id').value = Planid;
}

      function fnProceed() {
         Planid = document.getElementById('plan_id').value;
         if (Planid == 1 || true) {
            fnSubmit()
         }
      }

      function fnSubmit() {
         Planid = document.getElementById('plan_id').value;
         document.getElementById('Buybutton').disabled = true;
         //showspinner();
         PlanForm.action = "<?php echo base_url(); ?>scan/updateplan";
         PlanForm.submit();
      }
   </script>
   <?php $this->include('includes/footer') ?>

</body>

</html>