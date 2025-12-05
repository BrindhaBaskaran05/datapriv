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

        if ($session->get('percent')) $p = $session->get('percent');
        else $p = '0';
        //if ($session->get('companies')) $companieslist = $session->get('companies');
        // else $companieslist = '';

        ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->



          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">




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

                              <div class="percentage" id="percentLabel"><?php echo $p; ?>%</div>
                            </div>

                            <div class="text-center fw-semibold pt-3 mb-2">Privacy Risk Score</div>
                          </div>
                        </div>
                      </div>



                    </div>


                    <!-- map start -->
                    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

                    <div class="col-md-8">
                      <!-- <div class="card" style="
                            margin-top: 25px;
                            width: 90%;
                            margin-left:5%
                        ">
                        <div class="card-body">
                          <div class="text-center"> -->
                      <div class="container my-4">
                        <div class="card p-4 shadow-sm">

                          <!-- Top row: Title + Erase button -->
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold">
                              <span class="text-danger">⚠</span> Your Exposed Personal Info
                            </h5>

                            <button class="btn btn-primary btn-sm">Erase It</button>
                          </div>

                          <div class="row">
                            <!-- LEFT: Details List -->
                            <div class="col-md-6">
                              <ul class="list-unstyled">
                                <?php foreach ($personal_info as $key => $value) {?>
                                  <li>• <?=  $value ?></li>
                                <?php } ?>
                               
                              </ul>
                            </div>

                            <!-- RIGHT: Map + Location -->
                            <div class="col-md-6 text-center">
                              <p class="mb-1 text-muted">Comcast: 129.4.87.105</p>
                              <h6 class="fw-bold mb-3">Atlanta, Georgia US</h6>

                              <!-- Map Image -->
                              <iframe
                                width="100%"
                                height="250"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3316.227036478987!2d-84.389977!3d33.749099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f50359d1f2e7d1%3A0x6a1ef0ad5d1c0b17!2sAtlanta%2C%20GA!5e0!3m2!1sen!2sus!4v1700000000000">
                              </iframe>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- </div>
                      </div>
                    </div> -->
                    </div>

                    <!-- map end -->







                    <!-- swapna start -->
                    <div>&nbsp; </div>

                    <div class="col-md-12 col-lg-12 order-2 mb-4">

                      <div class="card h-100">

                        <div class="d-flex flex-wrap" id="icons-container">

                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-4">
                              <div class="card-body">
                                <p><span id="email_count"><?= $email_count ?></span> <span class="badge <?=($email_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($email_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Emails ID</p>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="username_count"><?= $username_count ?></span> <span class="badge <?=($username_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($username_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Username</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="password_count"><?= $password_count ?></span> <span class="badge <?=($password_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($password_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Password</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="phone_count"><?= $phone_count ?></span> <span class="badge <?=($phone_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($phone_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Contact No 1</p>
                              </div>
                            </div>
                          </div>

                        </div>


                        <div class="d-flex flex-wrap" id="icons-container">

                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="address_count"><?= $address_count ?></span> <span class="badge <?=($address_count==0)?'bg-label-success':'bg-label-danger';?> me-1 " style="float: right;"><?=($address_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Addresses</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="name_count"><?= $name_count ?></span> <span class="badge <?=($name_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($name_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Full Name</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="dob_count"><?= $dob_count ?></span> <span class="badge <?=($dob_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($dob_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Date of Birth</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-lg-3">
                            <div class="card icon-card cursor-pointer text-left mb-4 mx-2">
                              <div class="card-body">
                                <p><span id="contact2_count"><?= $contact2_count ?></span> <span class="badge <?=($contact2_count==0)?'bg-label-success':'bg-label-danger';?> me-1" style="float: right;"><?=($contact2_count==0)?'Safe':'Fix';?></span></p>
                                <p class="icon-name text-capitalize text-truncate mb-0">Contact No 2</p>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>



                    <!-- swapna end -->


                    <!-- companieslist start -->
                    <div class="col-md-12 col-lg-12 order-2 mb-4">
                      <div class="card h-100">

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                          <h5 class="card-header">Exposure Sources</h5>
                         

                          <?php echo $data = ($companieslist) ? $companieslist : '<tr><td>No scan data found</tr></td>'; ?>

                            
                          
                        </div>
                        <!--/ Basic Bootstrap Table -->
                      </div>
                    </div>
                    <!--/ companieslist end -->


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
  // Pecentage circle start code
  const storedUserId = localStorage.getItem('scanpercent');
  var percentage = storedUserId; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

  if (percentage == null)
    percentage = 0;

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
        const scanpercent = res.per;
        localStorage.setItem('scanpercent', scanpercent);

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