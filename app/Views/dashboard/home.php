<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<?= $this->include('includes/header') ?>

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
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary" style="    color: #fff !important;    font-size: 25px;">Information Security App </h5>
                          <p class="mb-4" style="    color: #fff;">
                           <!-- You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.-->
                            Your security in one glance
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary" style="   background-color: #3b6ea5;color: #fff;border-color: #3b6ea5;">Start Scan</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url(); ?>web_assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
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

   
<?= $this->include('includes/footer') ?>
  
  </body>
</html>
