<!DOCTYPE html>
<?= $this->include('includes/header') ?>
<style>
  .holographic-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;

  }

  .holographic-card {


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
    background: linear-gradient(0deg,
        transparent,
        transparent 30%,
        rgba(0, 255, 255, 0.3));
    transform: rotate(-45deg);
    transition: all 0.5s ease;
    opacity: 0;
  }

  .holographic-card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
  }

  .holographic-card:hover::before {
    opacity: 1;
    transform: rotate(-45deg) translateY(100%);
  }
</style>
<style>
  body {
    background-color: #f4f6f8;
    font-family: Arial, sans-serif;
  }

  .card {
    border-radius: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  }

  .score-circle {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 10px solid #00c3a5;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    margin: 0 auto;
  }

  .map-card {
    background: url('<?= base_url("web_assets/img/world_map.jpg") ?>') no-repeat center center;
    background-size: cover;
    height: 400px;
    border-radius: 15px;
  }

  .badge-safe {
    background-color: #28a745;
  }

  .badge-warning {
    background-color: #ffc107;
    color: #000;
  }

  .badge-exposed {
    background-color: #dc3545;
  }

  .btn-scan {
    background-color: #3b6ea5;
    color: #fff;
    border-radius: 8px;
    padding: 10px 20px;
  }

  .btn-scan:hover {
    background-color: #2f5c8d;
  }

  .status-dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 8px;
  }

  .dot-safe {
    background-color: #28a745;
  }

  .dot-warning {
    background-color: #ffc107;
  }

  .dot-exposed {
    background-color: #dc3545;
  }

  .score-wrapper {
    position: relative;
    width: 180px;
    height: 180px;
    margin: 0 auto;
  }

  .score-svg {
    transform: rotate(-90deg);
    width: 100%;
    height: 100%;
  }

  .score-bg {
    fill: none;
    stroke: #e9ecef;
    stroke-width: 15;
  }

  .score-progress {
    fill: none;
    stroke: url(#gradient);
    stroke-width: 15;
    stroke-linecap: round;
    stroke-dasharray: 565;
    /* circumference (2πr = 2*π*90 ≈ 565) */
    stroke-dashoffset: 565;
    animation: fillScore 2s ease forwards;
  }

  .score-value {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2.2rem;
    font-weight: bold;
    color: #333;
  }

  .score-wrapper::before {
    content: "";
    position: absolute;
    top: -15px;
    left: -15px;
    right: -15px;
    bottom: -15px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0, 195, 165, 0.15), transparent 70%);
    z-index: -1;
  }

  @keyframes fillScore {
    to {
      stroke-dashoffset: calc(565 - (565 * 85 / 100));
    }
  }
</style>

<!-- scan css -->
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

<!-- Gradient Def -->
<svg width="0" height="0">
  <defs>
    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#00c3a5" />
      <stop offset="100%" stop-color="#3b6ea5" />
    </linearGradient>
  </defs>
</svg>

<body>



  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?= $this->include('includes/leftsidebar') ?>
      <!-- Layout container -->
      <div class="layout-page">
        <?= $this->include('includes/header_section') ?>



        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Header -->
            <div class="text-center mb-4">
              <h3 class="fw-bold">Your Security in One Glance</h3>
              <p class="text-muted" id="ltxt">Last Scan <b id="last_scan_date"> </b></p>
              <a href="javascript:;" class="btn btn-scan" onclick="startScan();">Start Scan</a>
            </div>

            <div class="custom-progress" style="display:none;" id="Bar">
                          <div class="progress-bar custom-progress-bar" id="myProgressBar" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                           0%
                          </div>
                        </div>

            <!-- Top Row -->
            <div class="row g-4 mb-4">
               <!-- Map -->
            <div class="col-lg-6">
              <div class="card map-card"></div>
            </div>
             
              <!-- Score + Breaches + Resolved -->
              <div class="col-lg-6">
                <!--<div class="card p-4 text-center mb-3">
                <div class="score-circle">85</div>
                <p class="mt-2 fw-semibold">Security Score</p>
              </div>-->
                <div class="card h-100 p-4 text-center mb-3">
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

                              <div class="percentage" id="percentLabel">50%</div>
                            </div>
                </div>
               <!--  <div class="d-flex gap-3">
                  <div class="card flex-fill p-3 text-center">
                    <h6 class="fw-semibold">Breaches</h6>
                    <h3>0</h3>
                  </div>
                  <div class="card flex-fill p-3 text-center">
                    <h6 class="fw-semibold">Resolved</h6>
                    <h3>8</h3>
                  </div>
                </div> -->
              </div>
            </div>

            <!-- Bottom Row -->
            <div class="row g-4">
              <!-- Exposure Sources Table -->
              <div class="col-lg-4">
                <div class="card h-100 p-3">
                  <h6 class="fw-bold mb-3">Exposure Sources</h6>
                  <table class="table mb-0">
                    <tbody>
                      <tr>
                        <td><strong>Source</strong></td>
                        <td><strong>Status</strong></td>
                      </tr>
                      <tr>
                        <td><span class="status-dot dot-warning"></span>Full Name</td>
                        <td><span class="status-dot dot-warning"></span><span id="name_count"><?= $name_count?></span> </td>
                      </tr>
                      <tr>
                        <td><span class="status-dot dot-safe"></span>Date of Birth</td>
                        <td><span class="status-dot dot-safe"></span><span id="dob_count"><?= $dob_count?></span></td>
                      </tr>
                      <tr>
                        <td><span class="status-dot dot-exposed"></span>Phone Number</td>
                        <td><span class="status-dot dot-exposed"></span><span id="name_count"><?= $phone_count?></span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Export Card -->
              <div class="col-lg-4">
                  <div class="card h-100">
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
                               
                                <?php echo $data = ($companieslist) ? $companieslist : '<tr><td>No scan data found</tr></td>'; ?>



                              </tbody>
                            </table>
                          </div>
                        </div>
              </div>
              <!-- Exposure Sources Summary -->
              <div class="col-lg-4">
                <div class="card h-100 p-3">
                  <h6 class="fw-bold mb-3">Exposure Sources</h6>
                  <table class="table mb-0">
                    <tbody>
                      <tr>
                        <td><strong>Source</strong></td>
                        <td><strong>Status</strong></td>
                      </tr>
                      <tr>
                        <td><span class="status-dot dot-warning"></span>Emails Addresses</td>
                        <td><span class="status-dot dot-warning"></span><span id="email_count"><?= $email_count?></span></td>
                      </tr>
                      <tr>
                        <td><span class="status-dot dot-safe"></span>Physical Addresses</td>
                        <td><span class="status-dot dot-safe"></span><span id="phone_count"><?= $address_count?></span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?= $this->include('includes/spinner') ?>
  <?php $this->include('includes/plans') ?>
  <?= $this->include('includes/footer_section') ?>




  <script>
    //checkplan();

    /* scan score */
    
  </script>
  <?= $this->include('includes/footer') ?>
</body>
<script>

  // Pecentage circle start code
    const storedUserId = localStorage.getItem('scanpercent');
     var percentage = storedUserId; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

    if (percentage == null)
      percentage = 0;

    //alert(percentage);

  const totalLength = 283; // semi-circle path length
  const offset = totalLength - (percentage / 100 * totalLength);

  circle.style.strokeDashoffset = offset;
  label.textContent = `${percentage}%`;




    var last_scan_date =localStorage.getItem('last_scan_date');
    $('#last_scan_date').html(last_scan_date);

    if (last_scan_date) {
        $('#ltxt').show();
    } else {
        $('#ltxt').hide();
    }


    

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

        if(res.redirectplans==1)
        { window.location.href = base_url + "users/upgrade_plans";
          return false;
        }else{
        

           $("#companyid").html(res.companies);

           $("#email_count").html(res.email_count);
           $("#phone_count").html(res.phone_count);
           $("#address_count").html(res.address_count);
           $("#dob_count").html(res.dob_count);
           $("#name_count").html(res.name_count);
          localStorage.setItem('last_scan_date', res.last_scan_date);
            
            $('#last_scan_date').text(res.last_scan_date);

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
            }
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