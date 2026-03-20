<!DOCTYPE html>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
============================================================== -->
<!-- beautify ignore:start -->
<?= $this->include('includes/header') ?>
<style>
  .risk-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
  }
  
  .risk-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
  }
  .bg-orange {
    background-color: #fd7e14;
}
  .risk-badge {
    background-color: #dc3545;
    color: white;
    padding: 5px 15px;
    border-radius: 5px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 20px;
  }
  
  .risk-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin: 20px 0;
  }
  
  .stat-item {
    font-size: 16px;
  }
  
  .stat-item strong {
    font-size: 20px;
    margin-right: 5px;
  }
  
  .breach-summary {
    background: rgba(255,255,255,0.2);
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
    font-size: 16px;
  }
  
  .section-header {
    font-size: 20px;
    font-weight: 600;
    margin: 25px 0 15px 0;
    color: #333;
  }
  
  .website-table {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 25px;
  }
  
  .website-table table {
    width: 100%;
  }
  
  .website-table th {
    padding: 12px 0;
    text-align: left;
    border-bottom: 2px solid #eee;
    font-weight: 600;
    color: #555;
  }
  
  .website-table td {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
  }
  
  .check-mark {
    color: #28a745;
    font-weight: bold;
    font-size: 18px;
  }
  
  .action-buttons {
    margin: 20px 0 30px 0;
  }
  
  .btn-flush {
    background-color: #6c5ce7;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 5px;
    margin-right: 10px;
    margin-bottom: 10px;
  }
  
  .btn-flush:hover {
    background-color: #5b4bc4;
    color: white;
  }
  
  .pii-table {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    overflow-x: auto;
  }
  
  .pii-table table {
    width: 100%;
    min-width: 800px;
  }
  
  .pii-table th {
    padding: 12px 10px;
    background: #f8f9fa;
    font-weight: 600;
    color: #555;
    border-bottom: 2px solid #dee2e6;
  }
  
  .pii-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #eee;
  }
  
  .category-header {
    background-color: #e9ecef;
    font-weight: 600;
  }
  
  .badge-pii {
    background-color: #dc3545;
    color: white;
    padding: 3px 8px;
    border-radius: 3px;
    font-size: 12px;
  }
  
  .pii-label {
    color: #666;
    font-size: 14px;
  }
  
  .website-note {
    color: #666;
    font-style: italic;
    margin-bottom: 15px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 5px;
  }
  
  .question-text {
    font-size: 18px;
    font-weight: 500;
    margin: 20px 0;
    color: #444;
  }
  
  /* Gauge styles */
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
    margin: 0 auto;
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

  .planbg{
    background-color: #0a2540;
    padding: 5px 10px 5px 10px;
    border-radius: 10px;
    font-size: 14px;
    width: 90px;
    text-align: center;
  }
  
  /* Gauge container */
  .gauge-container {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 25px;
    text-align: center;
    max-width: 300px;
  }
  .navbar {
    display: none !important;
}
.content-footer {
    display: none !important;
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

      /*  if ($session->get('percent')) $p = $session->get('percent');
        else $p = '0';*/
     
        if ($session->get('companies')) $companieslist = $session->get('companies');
        else $companieslist;

        ?>
     <!-- Content wrapper -->
<div class="content-wrapper">

  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    
    <!-- Risk Exposure Card -->
    <!-- Welcome message and SCAN NOW button in same row -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <span class="fs-4 fw-semibold">Welcome <?php echo $session->get('user_name'); ?></span>
      
<!-- SCAN NOW button  -->
<div class="text-end">
  <a href="javascript:;" class="btn btn-primary px-5 py-3 fw-bold fs-5" onClick="startScan()" style="background-color: #dc3545; border: none; border-radius: 8px;">SCAN NOW</a>
  <div class="mt-2 text-muted" style="font-size: 14px;">Last Scan was on <?php echo $last_scan_date; ?></div>
</div></div>

    <!-- Risk Exposure badge directly below without extra space -->
    <div class="d-flex align-items-center gap-3 mb-3">
      <span class="fs-4 fw-semibold">Risk Exposure:</span>
     <?php
$Clss = "bg-success";

if ($percentage < 20) {
    $sts = "NORMAL";
    $Clss = "bg-success";
} elseif ($percentage < 50) {
    $sts = "MEDIUM";
    $Clss = "bg-warning text-dark";
} elseif ($percentage < 75) {
    $sts = "HIGH";
    $Clss = "bg-orange text-white";
} else {
    $sts = "CRITICAL";
    $Clss = "bg-danger";
}
?>
<span class="badge <?= $Clss ?> px-3 py-2 fs-6 shadow-sm">
    <?= $sts ?> 
</span>    </div>
   
    <!-- Row for Gauge and Bullet points side by side -->
    <div class="row mb-4">
      <!-- Gauge column (left side) -->
      <div class="col-md-4">
        <div class="gauge-container">
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
              <path class="track" d="M10,100 A90,90 0 0 1 190,100" fill="none" stroke-width="15" />
              <path class="progress" d="M10,100 A90,90 0 0 1 190,100" fill="none" stroke-width="15" stroke-dasharray="283" stroke-dashoffset="283" />
            </svg>
            <div class="percentage" id="percentLabel"><?php echo $percentage; ?>%</div>
          </div>
          <div class="text-center fw-semibold pt-3 mb-2">Total <?= ($email_count + $password_count + $phone_count + $address_count + 2) ?> Data Breaches found across 250+ sites, 3rd party apps and data broker</div>
        </div>
      </div>
      
      <!-- Bullet points column (right side) -->
      <div class="col-md-8">
        <ul class="list-unstyled mb-4">
          <li class="mb-2"><span class="fw-bold me-2">&bull;</span> <span class="fw-bold"><?= $password_count ?></span> Password Leaks</li>
          <li class="mb-2"><span class="fw-bold me-2">&bull;</span> <span class="fw-bold"><?= $email_count ?></span> Email Address</li>
          <li class="mb-2"><span class="fw-bold me-2">&bull;</span> <span class="fw-bold">2</span> Passport details</li>
          <li class="mb-2"><span class="fw-bold me-2">&bull;</span> <span class="fw-bold"><?= $phone_count ?></span> Phone Number</li>
          <li class="mb-2"><span class="fw-bold me-2">&bull;</span> <span class="fw-bold"><?= $address_count ?></span> Address</li>
        </ul>
      </div>
    </div>

    <!-- Website Section -->                        
    <div class="website-table">
      <table>
        <thead>
          <tr>
            <th>App name/Webpage</th>
            <th>Have you whitelisted this App? <br>OR do you want to delete this data</th>
            <th>Your PII details it holds</th>
          </tr>
        </thead>
        <tbody id="companyid">
          <?php 
          if($companieslist) {
            echo $companieslist;
          } else {
            echo '<tr><td colspan="3" class="text-center">No scan data found</td></tr>';
          }
          ?>
        </tbody>
      </table>
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
  // Pecentage circle start code
  const storedUserId = localStorage.getItem('scanpercent');
  var percentage = <?php echo $percentage?>; // Change this from 0 to 100

  const circle = document.querySelector('.progress');
  const label = document.getElementById('percentLabel');

  if (percentage == null)
    percentage = 0;

  const totalLength = 283; // semi-circle path length
  const offset = totalLength - (percentage / 100 * totalLength);

  circle.style.strokeDashoffset = offset;
  label.textContent = `${percentage}%`;

  localStorage.setItem('last_scan_date', "<?php echo isset($last_scan_date) ? $last_scan_date : ''; ?>");
  var last_scan_date = localStorage.getItem('last_scan_date');
  $('#last_scan_date').text(last_scan_date);

  if (last_scan_date) {
    $('#last_scan_date').show();
  } else {
    $('#last_scan_date').hide();
  }
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

        if (res.redirectplans == 1) {
          window.location.href = base_url + "users/upgrade_plans";
          return false;
        } else {
         window.location.href = base_url + "dashboard";
         return false;
          $("#companyid").html(res.companies);

          $("#email_count").html(res.email_count);
          $("#phone_count").html(res.phone_count);
          $("#address_count").html(res.address_count);
          $("#dob_count").html(res.dob_count);
          $("#name_count").html(res.name_count);
          $("#username_count").html(res.username_count);
          $("#password_count").html(res.password_count);
          $("#contact2_count").html(res.contact2_count);

          $('#last_scan_date').text(res.last_scan_date);

          // Pecentage circle start code
          const percentage = res.per;
          const scanpercent = res.per;
          localStorage.setItem('scanpercent', scanpercent);

          const circle = document.querySelector('.progress');
          const label = document.getElementById('percentLabel');

          const totalLength = 283;
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

  function getcomapny(sids){
    base_url = "<?php echo base_url(); ?>";
    $.ajax({
      url: base_url + "getcompany",
      method: "POST",
      data: {
        sids: sids
      },
      success: function(response) {
        let res = JSON.parse(response);
        $("#companyid").html(res.filtercomapany);
      },
      error: function(error) {
        alert('error');
      }
    });
  }
  
  function flushData() {
    alert('Flush functionality to be implemented');
  }
</script>

</html>