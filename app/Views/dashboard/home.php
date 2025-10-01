<!DOCTYPE html>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================-->
<!-- beautify ignore:start -->
<?= $this->include('includes/header') ?>
<style>
  .custom-progress {
    height: 25px;
    background-color: #e9ecef;
    border-radius: 20px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
    overflow: hidden;
  }

  .custom-progress-bar {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: white;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    transition: width 0.6s ease;
    box-shadow: 0 0 10px rgba(0, 114, 255, 0.6);
  }

  .progress-wrapper {
    width: 200px;
    margin: auto;
    position: relative;
  }

  .percentage {
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    z-index: 2;
  }

  .track {
    stroke: #cccccc;
  }

  .progress {
    stroke: url(#rainbowGradient);
    stroke-linecap: round;
    transition: stroke-dashoffset 1s ease;
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
        $username = $session->get('user_name');
        $PlanName = $session->get('PlanName');
        $PlanExpDate = $session->get('PlanExpDate');

        if($session->get('percent')) $p= $session->get('percent'); else $p='0';
         if($session->get('companies')) $companieslist= $session->get('companies'); else $companieslist='';

        ?>
        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-8 mb-4 order-0">
                <div class="card" style="    background-color: #0a2540;">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary" style="    color: #fff !important;    font-size: 25px;">Information Security App </h5>
                        <p class="mb-4" style="    color: #fff;">
                          <!-- You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.-->
                          Your security in one glance

                          <!-- <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->

                        <div class="custom-progress" style="display:none;" id="Bar">
                          <div class="progress-bar custom-progress-bar" id="myProgressBar" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                           0%
                          </div>
                        </div>

                        </p>

                        <div style="position: relative; width: 100%; height: 40px;">

                          <!-- Left Button -->
                          <div style="position: absolute; left: 0;">
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary" onclick="startScan();"
                              style="background-color: #3b6ea5; color: #fff; border-color: #3b6ea5;">
                              Start Scan 
                            </a>
                            <div><small style="color: #fff;">Last scan 15 June 2025</small> </div>
                          </div>

                        </div>


                        <!--  <span style="float: left;"><a href="javascript:;" class="btn btn-sm btn-outline-primary" style="   background-color: #3b6ea5;color: #fff;border-color: #3b6ea5;">Start Scan</a></span>
                         <span style="text-align: center;"> <a href="javascript:;" class="btn btn-sm btn-outline-primary" style="   background-color: #3b6ea5;color: #fff;border-color: #3b6ea5;">Start Scan</a></span>
                        <span style="float: right;"><a href="javascript:;" class="btn btn-sm btn-outline-primary" style="   background-color: #3b6ea5;color: #fff;border-color: #3b6ea5;">FLUSH PII</a></span>  
                        -->
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img
                          src="<?php echo base_url(); ?>web_assets/img/illustrations/man-with-laptop-light.png"
                          height="140"
                          alt="View Badge User"
                          data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xl-4">
                <div class="card bg-info text-white mb-3">
                  <div class="card-header">Welcome <?php echo  $session->get('user_name'); ?></div>
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $PlanName; ?></h5>
                    <p class="card-text"><?php if ($PlanExpDate > 0) { ?>Expire on <?php echo $PlanExpDate; ?> <?php } ?></p>
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
                            <!--  <div id="growthChart"></div> -->

                            <div class="progress-wrapper">
                              <svg width="200" height="100" viewBox="0 0 200 100">
                                <defs>
                                  <linearGradient id="rainbowGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="red" />
                                    <stop offset="16.6%" stop-color="orange" />
                                    <stop offset="33.3%" stop-color="yellow" />
                                    <stop offset="50%" stop-color="green" />
                                    <stop offset="66.6%" stop-color="blue" />
                                    <stop offset="83.3%" stop-color="indigo" />
                                    <stop offset="100%" stop-color="violet" />
                                  </linearGradient>
                                </defs>

                                <!-- Cap-shaped semi-circle background -->
                                <path class="track" d="M10,100 A90,90 0 0 1 190,100"
                                  fill="none"
                                  stroke-width="15" />

                                <!-- Rainbow progress arc -->
                                <path class="progress" d="M10,100 A90,90 0 0 1 190,100"
                                  fill="none"
                                  stroke-width="15"
                                  stroke-dasharray="283"
                                  stroke-dashoffset="283" />
                              </svg>

                              <div class="percentage" id="percentLabel"><?php echo $p;?>%</div>
                            </div>

                            <div class="text-center fw-semibold pt-3 mb-2">Privacy Risk Score</div>
                          </div>
                        </div>
                      </div>



                    </div>

                    <!-- <div class="col-lg-4 col-md-12 col-12 mb-12">
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
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
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
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
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
                    </div> -->

                    <div class="col-md-4">
                      <div class="card" style="
                            margin-top: 25px;
                            width: 90%;
                            margin-left:5%
                        ">
                        <div class="card-body">
                          <div class="text-center">
                            <!-- Center Button -->
                            <div>
                              <a href="javascript:;" class="btn btn-lg  btn-outline-primary"
                                style="background-color: #3b6ea5; color: #fff; border-color: #3b6ea5;">
                                Scan Schedule
                              </a>


                            </div>
                            <div><br>
                             Your Next scan 10 october 2025
                              
                            </div>
                            <!-- <span class="fw-semibold d-block mb-1">Exposure Sources</span> -->

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card" style="
                            margin-top: 25px;
                            width: 90%;
                            margin-left:5%
                        ">
                        <div class="card-body">
                          <div class="text-center">
                            <!-- Center Button -->
                            <div>
                              <a href="javascript:;" class="btn btn-lg btn-outline-primary"
                                style="background-color: #3b6ea5; color: #fff; border-color: #3b6ea5;">
                                FLUSH PII
                              </a>
                            </div>
                            <div><br>
                             Last Flush 31 March 2025
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- swapna start -->
                   <div>&nbsp; </div>
                   
                    <div class="col-md-12 col-lg-12 order-2 mb-4">
                    
                      <div class="card h-100">
                         
                        <div class="d-flex flex-wrap" id="icons-container">
                          
                          <div class="card icon-card cursor-pointer text-center mb-4 mx-4">
                            <div class="card-body">
                              0 <span class="badge bg-label-success me-1" style="float: right;">Safe</span>
                              <p class="icon-name text-capitalize text-truncate mb-0">Emails Addresses</p>
                            </div>
                          </div>
                          <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                              5 <span class="badge bg-label-danger me-1 "  style="float: right;">%fix</span>
                              <p class="icon-name text-capitalize text-truncate mb-0">Addresses</p>
                            </div>
                          </div>
                          <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                             15 <span class="badge bg-label-danger me-1"  style="float: right;">%fix</span>
                              <p class="icon-name text-capitalize text-truncate mb-0">Data Broker</p>
                            </div>
                          </div>
                          <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                             3 <span class="badge bg-label-danger me-1"  style="float: right;">%fix</span>
                              <p class="icon-name text-capitalize text-truncate mb-0">Social Medias</p>
                            </div>
                          </div>
                          <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                             1 <span class="badge bg-label-danger me-1"  style="float: right;">%fix</span>
                              <p class="icon-name text-capitalize text-truncate mb-0">Phone Number</p>
                            </div>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!-- swapna end -->

                    <!-- Transactions -->
                    <div class="col-md-12 col-lg-12 order-2 mb-4">
                      <div class="card h-100">

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                          <h5 class="card-header">Exposure Sources</h5>
                          <div class="table-responsive text-nowrap">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Company name</th>
                                  <th>Data</th>
                                  
                                </tr>
                              </thead>
                              <tbody class="table-border-bottom-0" id ="companyid">
                                <?php echo $companieslist; ?>


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

<script>
 /*  const percentage = 80; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

  const totalLength = 283; // semi-circle path length
  const offset = totalLength - (percentage / 100 * totalLength);

  circle.style.strokeDashoffset = offset;
  label.textContent = `${percentage}%`; */
</script>

<script>

  // Pecentage circle start code
     const percentage = <?php echo $p;?>; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

  const totalLength = 283; // semi-circle path length
  const offset = totalLength - (percentage / 100 * totalLength);

  circle.style.strokeDashoffset = offset;
  label.textContent = `${percentage}%`;
    //end code
  function startScan() {

    

    const progressBar = $("#myProgressBar");
    let width = 0;
    $("#Bar").show();
    progressBar.css("width", "0%");
    progressBar.attr("aria-valuenow", 0);



    const interval = setInterval(() => {
      if (width < 95) {
        width++;
        progressBar.css("width", width + "%");
        progressBar.attr("aria-valuenow", width);
      }
    }, 100);
    base_url = "<?php echo base_url(); ?>";
    $.ajax({
      url: base_url + "scanresult",
      method: "POST",
      
      data: {
        //Bankid,Txid
      },
      success: function(response) {
      let res = JSON.parse(response);
        console.log(response);
        clearInterval(interval);
         $("#Bar").hide();
        width = 100;
        progressBar.css("width", "100%");
        progressBar.attr("aria-valuenow", 100);
        progressBar.html('100%');
        console.log("Scan complete:", response);

           $("#companyid").html(res.companies);
            
           

           // Pecentage circle start code
     const percentage = res.per; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

  const totalLength = 283; // semi-circle path length
  const offset = totalLength - (percentage / 100 * totalLength);

  circle.style.strokeDashoffset = offset;
  label.textContent = `${percentage}%`;
    //end code
      },
      error: function(error) {
        alert('error');
        clearInterval(interval);
        progressBar.removeClass("bg-primary").addClass("bg-danger");
        progressBar.css("width", "100%");
        progressBar.attr("aria-valuenow", 100);
        console.error("Scan failed:", error);
      }
    });
  }
</script>

</html>