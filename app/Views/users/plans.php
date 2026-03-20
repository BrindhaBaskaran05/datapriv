<!DOCTYPE html>

<?= $this->include('includes/header') ?>
<style>
/* Page Background */
.content-wrapper {
    background: linear-gradient(135deg, #f4f7fb, #eef2f9);
    padding: 40px 25px;
}

/* Pricing Title */
.modal-title {
    font-weight: 700;
    font-size: 26px;
    color: #0A2540;
}

/* Card Layout */
.holographic-card {
    border-radius: 16px;
    border: none;
    transition: all 0.35s ease;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    background: linear-gradient(135deg,#2B9B8E,#3B6EA5);
}

/* Hover effect */
.holographic-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.15);
}

/* Current plan highlight */
.holographic-card.active-plan {
    background: linear-gradient(135deg,#F7E7A9,#D4AF37,#B8960C,#F7E7A9);
    color: #0A2540 !important;
    transform: scale(1.04);
    border: 3px solid #D4AF37;
    box-shadow: 0 0 20px rgba(212,175,55,0.6), 0 15px 40px rgba(0,0,0,0.25);
}

/* Badge styles */
.current-plan-badge,
.upgrade-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .5px;
}

.current-plan-badge {
    background: #FFD700;
    color: #0A2540;
}

.upgrade-badge {
    background: #28a745;
    color: white;
}

/* Plan Title */
.card-title {
    font-size: 26px !important;
    font-weight: 700;
    margin-bottom: 6px;
}

/* Subtitle */
.card-subtitle {
    font-size: 14px;
    opacity: .9;
}

/* Feature list */
.plan-features {
    font-size: 14px;
    line-height: 1.9;
    margin-top: 15px;
}

/* Feature row */
.feature-row {
    display: flex;
    align-items: center;
    margin-bottom: 6px;
}

/* Tick icon */
.feature-row img {
    height: 18px;
    margin-right: 8px;
}

/* Cards equal height */
.card-body {
    display: flex;
    flex-direction: column;
}

/* Upgrade prompt */
.upgrade-prompt {
    text-align: center;
    margin-top: 25px;
    font-size: 15px;
    font-weight: 500;
    color: #0A2540;
}

/* Proceed Button */
#Buybutton {
    background: linear-gradient(135deg,#0A2540,#3B6EA5);
    border: none;
    border-radius: 8px;
    padding: 10px 28px;
    font-weight: 600;
    transition: .3s;
}

#Buybutton:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(10,37,64,0.3);
}
.navbar {
    display: none !important;
}
/* ================= MOBILE RESPONSIVE FIX ================= */

/* General spacing fix */
@media (max-width: 768px) {
    .content-wrapper {
        padding: 15px !important;
    }

    .modal-dialog {
        margin: 10px !important;
    }

    .modal-content {
        border-radius: 12px;
    }
}

/* Plan cards responsive */
@media (max-width: 768px) {
    .col-md-6,
    .col-lg-4 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
    }

    .holographic-card {
        margin-bottom: 15px;
    }

    .card-title {
        font-size: 20px !important;
    }

    .card-subtitle {
        font-size: 13px !important;
    }
}

/* Feature list scaling */
@media (max-width: 768px) {
    .card-body div {
        font-size: 13px !important;
    }

    .card-body img {
        height: 18px !important;
    }
}

/* Header section fix */
@media (max-width: 576px) {
    .modal-title {
        font-size: 18px !important;
        text-align: center;
    }

    .modal-header {
        flex-direction: column;
        align-items: flex-start !important;
    }

    .modal-header span {
        margin-top: 5px;
        font-size: 12px !important;
    }
}

/* Current plan banner responsive */
@media (max-width: 768px) {
    .alert {
        padding: 12px !important;
    }

    .alert .d-flex {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 10px;
    }

    .alert .badge {
        font-size: 12px !important;
        padding: 6px 10px !important;
    }
}

/* Buttons responsive */
@media (max-width: 768px) {
    #Buybutton {
        width: 100%;
        padding: 12px;
        font-size: 16px;
    }
}

/* Upgrade text */
@media (max-width: 576px) {
    .upgrade-prompt {
        font-size: 14px;
        padding: 10px;
    }
}

/* Fix modal height scrolling */
@media (max-width: 768px) {
    .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }
}

/* Fix badge positioning on small screens */
@media (max-width: 576px) {
    .current-plan-badge,
    .upgrade-badge {
        top: 8px;
        right: 8px;
        font-size: 10px;
        padding: 4px 10px;
    }
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
            <?php 
            $session = session(); 
            $PlanExpDate = $session->get('PlanExpDate'); 
            $currentPlan = $session->get('PlanName'); // Get current plan name
            ?>
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
                                    
                                    <!-- Current Plan Indicator -->
                                    <div class="alert alert-info mb-4" style="background-color: #e3f2fd; border: none; border-radius: 10px;">
                                       <div class="d-flex justify-content-between align-items-center">
                                          <div>
                                             <strong>Your Current Plan:</strong> 
                                             
                                             <span class="badge" style="background: linear-gradient(135deg,#F7E7A9,#D4AF37,#B8960C,#F7E7A9); color:#0A2540; padding:8px 15px; font-size:14px; font-weight:600;">
    <?= $currentPlan ?>
</span>
                                          </div>
                                          <div class="text-muted" style="display:none">
                                             <?php if($PlanExpDate>0): ?>
                                                Expires on <?= date('d M Y', strtotime($PlanExpDate)) ?>
                                             <?php endif; ?>
                                          </div>
                                          <div>
                                             <span class="badge" style="background-color: #28a745; color: white; padding: 8px 15px; font-size: 14px;">Ready to Upgrade?</span>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row mb-5">
                                       <?php
                                       $i = 1;
                                       foreach ($plans as $plan): ?>

                                          <?php
                                          if ($plan['plan_cost'] == 0) {
                                             $PlanCost = "Free";
                                          } else {
                                             $PlanCost = $plan['plan_cost'];
                                          }

                                          $array = explode('@',  $plan['des']);
                                          
                                          $session = session();
                                          $PlanName = $session->get('PlanName');

                                          // Set background color based on plan
                                          if ($i == 1 && $PlanName == 'Free') {
                                             $bg = '#0A2540;';
                                             $isCurrentPlan = true;
                                          } else if ($i == 2 && $PlanName == 'Basic') {
                                             $bg = '#0A2540;';
                                             $isCurrentPlan = true;
                                          } else if ($i == 3 && $PlanName == 'Pro') {
                                             $bg = '#0A2540;';
                                             $isCurrentPlan = true;
                                          } else if ($i == 4 && $PlanName == 'Elite') {
                                             $bg = '#0A2540;';
                                             $isCurrentPlan = true;
                                          } else if ($i == 5 && $PlanName == 'Pay-Per-Use Add-ons') {
                                             $bg = '#0A2540;';
                                             $isCurrentPlan = true;
                                          } else {
                                             $bg = '#2B9B8E;';
                                             $isCurrentPlan = false;
                                          }
                                          ?>
                                          <div class="col-md-6 col-lg-4 mb-3"


                                             style="cursor: pointer; position: relative;"
                                             onclick="fnchoose(<?php echo $plan['plan_id']; ?>)">
                                             
                                             <!-- Current Plan Badge -->
                                             <?php if($isCurrentPlan): ?>
                                                <div class="current-plan-badge">CURRENT PLAN</div>
                                             <?php else: ?>
                                                <div class="upgrade-badge">UPGRADE</div>
                                             <?php endif; ?>
                                             
                                             <div id="Plan<?php echo $i; ?>" class="card h-100 holographic-card <?php echo ($isCurrentPlan) ? 'active-plan' : ''; ?>"
                                                style='background-color: <?php echo $bg; ?> '>
                                                <div class="card-body">
                                                   <h5 class="card-title" style="font-size: 30px;color: #fff;font-weight: bold;margin-bottom:20px;"><?= esc($plan['plan']) ?></h5>
                                                   <h6 class="card-subtitle text-muted" style="color: #ffffffb0 !important;margin-bottom:20px;">
                                                      <?= esc($plan['description']) ?>
                                                   </h6>
                                                   <br>
                                                   <div style="font-size: 15px; color: #ffffffe8;">
                                                      <?php
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
                                             </div>
                                          </div>

                                       <?php 
                                       $i++;
                                       endforeach; 
                                       ?>
                                    </div>

                                    <!-- Upgrade Prompt -->
                                    <div class="upgrade-prompt">
                                       <?php if($PlanName != 'Elite'): ?>
                                          <p>Want more features? Choose any plan above to upgrade your account.</p>
                                       <?php else: ?>
                                          <p>You're on our best plan! Enjoy all premium features.</p>
                                       <?php endif; ?>
                                    </div>

                                 </div>
                                 <div class="modal-footer">
                                    <input type='hidden' name='plan_id' id='plan_id'>
                                    <?php if ($expired == 0) { ?>
                                       <button type="button" onclick='fnProceed()' style='display:none' id='Buybutton' class="btn btn-primary">Proceed to Upgrade</button>
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
         base_url = "<?php echo base_url(); ?>";
         $.ajax({
            type: "POST",
            url: base_url + "scan/checkplan",
            data: { Planid },
            success: function(result) {
                let res = JSON.parse(result);
                var Planid = document.getElementById('plan_id').value;
               
                if(res.activeplan != 0)
                   document.getElementById('Plan' + Planid).style.backgroundColor = '#0A2540';
               
                if(res.expiredbasic >= 1 && res.Planid == 1)
                   document.getElementById('Buybutton').disabled = true;
                else {
                   document.getElementById('Buybutton').disabled = false;
                }

                var myModal = new bootstrap.Modal(document.getElementById('exLargeModal'));
                myModal.show();
            }
         });
      }

      function fnchoose(Planid) {
         checkplan(Planid);

         // Remove active from all
         document.querySelectorAll('.holographic-card').forEach(card => {
            card.classList.remove('active-plan');
         });

         // Remove all badges first
         document.querySelectorAll('.current-plan-badge, .upgrade-badge').forEach(badge => {
            badge.remove();
         });

         // Add active class
         document.getElementById('Plan' + Planid).classList.add('active-plan');
		 
		 document.getElementById('Buybutton').style.display = "inline-block";
   document.getElementById('plan_id').value = Planid;

         // Add appropriate badge to selected plan
         var selectedCard = document.getElementById('Plan' + Planid).closest('.col-md-6');
         
         // Check if this is current plan
         <?php 
         // Create a JavaScript object mapping plan IDs to names
         $planMap = [];
         foreach($plans as $plan) {
            $planMap[$plan['plan_id']] = $plan['plan'];
         }
         ?>
         var planNames = <?= json_encode($planMap) ?>;
         var currentPlan = "<?= $PlanName ?>";
         
         // Create new badge
         var badge = document.createElement('div');
         if(planNames[Planid] == currentPlan) {
            badge.className = 'current-plan-badge';
            badge.textContent = 'CURRENT PLAN';
         } else {
            badge.className = 'upgrade-badge';
            badge.textContent = 'UPGRADE';
         }
         
         selectedCard.style.position = 'relative';
         selectedCard.appendChild(badge);

         document.getElementById('Buybutton').style.display = "inline-block";
         document.getElementById('plan_id').value = Planid;
      }

      function fnProceed() {
         Planid = document.getElementById('plan_id').value;
         if (Planid == 1 || true) {
            fnSubmit();
         }
      }

      function fnSubmit() {
         Planid = document.getElementById('plan_id').value;
         document.getElementById('Buybutton').disabled = true;
         PlanForm.action = "<?php echo base_url(); ?>scan/updateplan";
         PlanForm.submit();
      }
   </script>
   <?php $this->include('includes/footer') ?>
</body>

</html>