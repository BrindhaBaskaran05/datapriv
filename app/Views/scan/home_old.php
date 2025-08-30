<!DOCTYPE html>

<?= $this->include('includes/header') ?>
<style>
  .holographic-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #000;
}

.holographic-card {
  width: 300px;
  height: 200px;
  background: #111;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  overflow: hidden;
  border-radius: 15px;
  transition: all 0.5s ease;
}

.holographic-card h2 {
  color: #0ff;
  font-size: 2rem;
  position: relative;
  z-index: 2;
}

.holographic-card::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(
    0deg, 
    transparent, 
    transparent 30%, 
    rgba(0,255,255,0.3)
  );
  transform: rotate(-45deg);
  transition: all 0.5s ease;
  opacity: 0;
}

.holographic-card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0,255,255,0.5);
}

.holographic-card:hover::before {
  opacity: 1;
  transform: rotate(-45deg) translateY(100%);
}
.score-gauge {
  position: relative;
  width: 200px;
  margin: 0 auto;
}

.gauge-svg {
  width: 100%;
  height: auto;
}

.score-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -30%);
  text-align: center;
}

#scoreValue {
  font-size: 2rem;
  font-weight: bold;
  color: #333;
}
</style>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
<?=  $this->include('includes/leftsidebar') ?>

        <!-- Layout container -->
        <div class="layout-page">
          <?=  $this->include('includes/header_section') ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card" style="    background-color: #0a2540;">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12" style='text-align:center'>
                        <div class="card-body">
                          <h5 class="card-title text-primary" style="    color: #fff !important;    font-size: 25px;"> Your security in one glance </h5>
                          <p class="mb-4" style="    color: #fff;">
                           <!-- You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.-->
                            We've detected 25 exposure in your personal data
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary" style="   background-color: #3b6ea5;color: #fff;border-color: #3b6ea5;">Start Scan</a>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
               
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card" style="
    background-color: #f4f6f8;
    box-shadow: none;
">
                    <div class="row row-bordered g-0">
                      
                      <div class="col-md-4">
                         <div class="card" style="
    margin-top: 25px;
    width: 90%;
     margin-left:5%
">
                        <div class="card-body">
                          <div class="text-center">
                            <!--div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                2022
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                              </div>
                            </div-->
                               <div id="growthChart"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">Security Score</div>
                          </div>
                        </div>
                          </div>
                     

                       
                      </div>
                     
                      <div class="col-lg-4 col-md-12 col-12 mb-12">
                      <div class="card" style="
    margin-top: 25px;
    width: 90%;
     margin-left:5%
">
                        <div class="card-body">
                          <br>
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="<?php echo base_url(); ?>web_assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Data Breaches</span>
                          <h3 class="card-title mb-2">4</h3>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-12 mb-12">
                      <div class="card" style="
    margin-top: 25px;
    width: 90%;
    margin-left:5%
">
                        <div class="card-body">
                          <br>
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="<?php echo base_url(); ?>web_assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Pending Actions</span>
                          <h3 class="card-title mb-2">2</h3>
                        </div>
                      </div>
                    </div>

<div class="col-md-4 col-lg-4 order-2 mb-4">
   <div class="card" style="
    margin-left:5%;
     margin-top: 15px;
    width: 90%;
">
                        <div class="card-body">
<span class="fw-semibold d-block mb-1">Exposure Sources</span>

    </div>  
  </div>
    <div class="card" style="
    margin-top: 15px;
    width: 90%;
     margin-left:5%
">
                        <div class="card-body">
<span class="fw-semibold d-block mb-1">Seachite</span>

    </div>  
  </div>
  </div>
                <!-- Transactions -->
                <div class="col-md-6 col-lg-8 order-2 mb-4" >
                  <div class="card h-100" >
                    
                    <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Exposure Sources</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Source</th>
                      
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Social Media</strong></td>
                        
                        <td><span class="badge bg-label-success me-1">Safe</span></td>
                       
                        <td><span class="badge bg-label-secondary  me-1">Review</span></td>
                      </tr>
                       <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Email</strong></td>
                        
                        <td><span class="badge bg-label-warning me-1">Action Required</span></td>
                       
                        <td><span class="badge bg-label-secondary  me-1">Review</span></td>
                      </tr>
                       <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Data Broker</strong></td>
                        
                        <td><span class="badge bg-label-danger me-1">Exposed</span></td>
                       
                        <td><span class="badge bg-label-secondary  me-1">Review</span></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
                  </div>
                </div>
                <!--/ Transactions -->



                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->



               
              </div>
              
       
            </div>
            <!-- / Content -->
             <!-- Extra Large Modal -->
                      <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel4">Simple pricing for Peace of Mind
</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <div class="row mb-5">
              
 <?php foreach($plans as $plan): ?>
                <div class="col-md-6 col-lg-4 mb-3 " >
                  
                  <div class="card h-100 holographic-card" style='background: linear-gradient(135deg, #2B9B8E, #3B6EA5);'>
                    <div class="card-body">
                      <h5 class="card-title" style="
    font-size: 30px;
   
"><?= esc($plan['plan']) ?></h5>
                      <h6 class="card-subtitle text-muted" style="
   
"><?= esc($plan['description']) ?></h6>
<br>
<h3><?= "&#8377; ".esc($plan['plan_cost'])." / ".esc($plan['valid_days'])." days"; ?></h3>

                    </div>
                    <!--img class="img-fluid" src="<?php echo base_url(); ?>web_assets/img/elements/13.jpg" alt="Card image cap"-->
                    <div class="card-body">
                
                      <a href="javascript:void(0);" class="card-link">Card link</a>
                      <a href="javascript:void(0);" class="card-link">Another link</a>
                    </div>
                  </div>
                </div>

            <?php endforeach; ?>    

              </div>
                             
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
   
<?= $this->include('includes/footer_section') ?>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   <script>
  //  checkplan();
function checkplan(){
  //alert("ok");
  base_url="<?php echo base_url(); ?>";
  $.ajax({
				type:"POST",
				url:base_url+"scan/checkplan",
				data:{
					//Bankid,Txid
				},
				success:function(result){
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

   </script>
<?= $this->include('includes/footer') ?>
  
  </body>
</html>
