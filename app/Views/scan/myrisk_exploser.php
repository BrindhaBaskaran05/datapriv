<!DOCTYPE html>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
============================================================== -->
<?= $this->include('includes/header') ?>
<style>
  .stats-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
  }
 
  .welcome-text {
    font-size: 24px;
    font-weight: 600;
    color: #212529;
    margin-bottom: 20px;
  }
  
  .section-title {
    font-size: 20px;
    font-weight: 600;
    color: #212529;
    margin: 30px 0 20px 0;
  }
  
  .people-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
  }
  
  .people-table th {
    text-align: left;
    padding: 8px 6px;
    background-color: #f8f9fa;
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #dee2e6;
    font-size: 12px;
  }
  
  .people-table td {
    padding: 6px;
    border-bottom: 1px solid #e9ecef;
    vertical-align: top;
  }
  
  .website-header {
    font-weight: 700;
    font-size: 14px;
    color: #212529;
  }
  
  .content-list {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
    font-size: 12px;
  }
  
  .content-list li {
    margin-bottom: 2px;
    line-height: 1.3;
  }
  
  .radio-group {
    display: flex;
    gap: 10px;
  }
  
  .radio-group .form-check {
    margin-bottom: 0;
  }
  
  .radio-group .form-check-input {
    margin-top: 3px;
  }
  
  .radio-group .form-check-label {
    font-size: 12px;
  }
  
  .pref-card {
    background: white;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    height: 100%;
    font-size: 12px;
  }
  
  .pref-card h6 {
    font-size: 14px;
    margin-bottom: 12px;
  }
  
  .pref-number {
    font-size: 24px;
    font-weight: 700;
    color: #212529;
    margin: 10px 0 2px 0;
  }
  
  .pref-label {
    color: #6c757d;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
  }
  
  .stat-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 4px 0;
    border-bottom: 1px solid #f0f0f0;
    font-size: 12px;
  }
  
  .stat-row:last-child {
    border-bottom: none;
  }
  
  .stat-value {
    font-weight: 600;
    color: #212529;
  }
  
  .badge {
    font-size: 11px;
    padding: 4px 8px;
  }
  
  .form-control-sm {
    font-size: 12px;
    padding: 4px 8px;
  }
  
  .form-check-label {
    font-size: 12px;
  }
  
  .btn-sm {
    font-size: 12px;
    padding: 5px 10px;
  }
  
  .dsar-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    margin-top: 10px;
  }
  
  .dsar-stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 11px;
  }
  
  .dsar-percent {
    color: #28a745;
    font-weight: 600;
  }
  
  .identity-failure {
    color: #dc3545;
    font-weight: 600;
  }
  
  .time-filter {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 8px;
    font-size: 11px;
  }
  
  .time-filter span {
    color: #6c757d;
    cursor: pointer;
  }
  
  .time-filter span.active {
    color: #0d6efd;
    font-weight: 600;
  }
  
  .compact-card-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }
  
  .full-width {
    grid-column: span 2;
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
        ?>
        
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            
            <!-- Welcome Text -->
            <div class="welcome-text">Welcome <?php echo $session->get('user_name'); ?></div>

            <!-- Stats Cards -->
            <div class="d-flex flex-wrap gap-3 mt-3">
              <!-- Card 1 - Red -->
              <div class="bg-white p-4 rounded-3 shadow-sm text-center" style="flex: 1 1 200px;">
                <div class="text-dark text-uppercase small fw-medium mb-2">UNANSWERED REQUESTS</div>
                <div><span class="display-4 fw-semibold text-danger">0</span></div>
                <div class="bg-danger text-white rounded-pill px-3 py-1 d-inline-block mt-2 small fw-medium">Unanswered</div>
              </div>
              
              <!-- Card 2 - Green -->
              <div class="bg-white p-4 rounded-3 shadow-sm text-center" style="flex: 1 1 200px;">
                <div class="text-dark text-uppercase small fw-medium mb-2">UNANSWERED REQUESTS</div>
                <div><span class="display-4 fw-semibold text-success">0</span></div>
                <div class="bg-success text-white rounded-pill px-3 py-1 d-inline-block mt-2 small fw-medium">In Validation</div>
              </div>
              
              <!-- Card 3 - Orange -->
              <div class="bg-white p-4 rounded-3 shadow-sm text-center" style="flex: 1 1 200px;">
                <div class="text-dark text-uppercase small fw-medium mb-2">UNANSWERED REQUESTS</div>
                <div><span class="display-4 fw-semibold text-warning">0</span></div>
                <div class="bg-warning text-white rounded-pill px-3 py-1 d-inline-block mt-2 small fw-medium">Avg Time to Close</div>
              </div>
              
              <!-- Card 4 - Blue -->
              <div class="bg-white p-4 rounded-3 shadow-sm text-center" style="flex: 1 1 200px;">
                <div class="text-dark text-uppercase small fw-medium mb-2">IN PROGRESS</div>
                <div><span class="display-4 fw-semibold text-primary">0</span></div>
                <div class="bg-primary text-white rounded-pill px-3 py-1 d-inline-block mt-2 small fw-medium">In Progress</div>
              </div>
            </div>
            <!-- People Search Overview Section -->
            <div class="section-title">People Search Overview</div>
            <p class="text-muted mb-3 small">We found your information on a number of people search databases. <br>Here is the information that each of them had on you:</p>

<div class="row">
 <div class="col-lg-7">
   <div class="table-responsive">
         <table class="table table-bordered table-hover align-middle" style="font-size: 13px; border-color: #dee2e6;">
        <thead class="table-dark" style="background-color: #212529; color: white !important;">
          <tr>
            <th style="color: white !important;">Website</th>
            <th style="color: white !important;">Content Found</th>
            <th style="color: white !important;">Did we Delete it?</th>
          </tr>
        </thead>
        <tbody>
        <!-- people -->
        <tr>
          <td class="fw-bold" style="background-color: #f8f9fa; vertical-align: middle; padding: 10px 8px;">people</td>
          <td style="padding: 8px;">
            <div class="row g-1">
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_name" checked>
                  <label class="form-check-label" for="people_name">Name</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_phone">
                  <label class="form-check-label" for="people_phone">Phone</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_email" checked>
                  <label class="form-check-label" for="people_email">Email</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_other" checked>
                  <label class="form-check-label" for="people_other">Other</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_address" checked>
                  <label class="form-check-label" for="people_address">Address</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_city">
                  <label class="form-check-label" for="people_city">City, State</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="people_photos" checked>
                  <label class="form-check-label" for="people_photos">Photos</label>
                </div>
              </div>
            </div>
          </td>
          <td class="text-center" style="vertical-align: middle;">
            <div class="d-flex justify-content-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="people_delete" id="people_yes">
                <label class="form-check-label" for="people_yes">Yes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="people_delete" id="people_no" checked>
                <label class="form-check-label" for="people_no">No</label>
              </div>
            </div>
          </td>
        </tr>
        
        <!-- mylife -->
        <tr>
          <td class="fw-bold" style="background-color: #f8f9fa; vertical-align: middle; padding: 10px 8px;">mylife</td>
          <td style="padding: 8px;">
            <div class="row g-1">
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_name" checked>
                  <label class="form-check-label" for="mylife_name">Name</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_phone">
                  <label class="form-check-label" for="mylife_phone">Phone</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_email" checked>
                  <label class="form-check-label" for="mylife_email">Email</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_other">
                  <label class="form-check-label" for="mylife_other">Age, past add</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_address">
                  <label class="form-check-label" for="mylife_address">Address</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_city" checked>
                  <label class="form-check-label" for="mylife_city">City, State</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mylife_photos">
                  <label class="form-check-label" for="mylife_photos">Photos</label>
                </div>
              </div>
            </div>
          </td>
          <td class="text-center" style="vertical-align: middle;">
            <div class="d-flex justify-content-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mylife_delete" id="mylife_yes">
                <label class="form-check-label" for="mylife_yes">Yes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mylife_delete" id="mylife_no" checked>
                <label class="form-check-label" for="mylife_no">No</label>
              </div>
            </div>
          </td>
        </tr>
        
        <!-- spokeo -->
        <tr>
          <td class="fw-bold" style="background-color: #f8f9fa; vertical-align: middle; padding: 10px 8px;">spokeo</td>
          <td style="padding: 8px;">
            <div class="row g-1">
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_name" checked>
                  <label class="form-check-label" for="spokeo_name">Name</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_phone">
                  <label class="form-check-label" for="spokeo_phone">Phone</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_email" >
                  <label class="form-check-label" for="spokeo_email">Email</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_other" checked>
                  <label class="form-check-label" for="spokeo_other">Hobbies, net worth</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_address">
                  <label class="form-check-label" for="spokeo_address">Address</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_city">
                  <label class="form-check-label" for="spokeo_city">City, State</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="spokeo_photos" checked>
                  <label class="form-check-label" for="spokeo_photos">Photos</label>
                </div>
              </div>
            </div>
          </td>
          <td class="text-center" style="vertical-align: middle;">
            <div class="d-flex justify-content-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="spokeo_delete" id="spokeo_yes" checked>
                <label class="form-check-label" for="spokeo_yes">Yes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="spokeo_delete" id="spokeo_no" >
                <label class="form-check-label" for="spokeo_no">No</label>
              </div>
            </div>
          </td>
        </tr>
        
        <!-- USSEARCH -->
        <tr>
          <td class="fw-bold" style="background-color: #f8f9fa; vertical-align: middle; padding: 10px 8px;">USSEARCH</td>
          <td style="padding: 8px;">
            <div class="row g-1">
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_name" checked>
                  <label class="form-check-label" for="ussearch_name">Name</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_phone">
                  <label class="form-check-label" for="ussearch_phone">Phone</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_email" >
                  <label class="form-check-label" for="ussearch_email">Email</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_other" checked>
                  <label class="form-check-label" for="ussearch_other">Age, family</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_address">
                  <label class="form-check-label" for="ussearch_address">Address</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_city" checked>
                  <label class="form-check-label" for="ussearch_city">City, State</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ussearch_photos">
                  <label class="form-check-label" for="ussearch_photos">Photos</label>
                </div>
              </div>
            </div>
          </td>
          <td class="text-center" style="vertical-align: middle;">
            <div class="d-flex justify-content-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ussearch_delete" id="ussearch_yes">
                <label class="form-check-label" for="ussearch_yes">Yes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ussearch_delete" id="ussearch_no" checked>
                <label class="form-check-label" for="ussearch_no">No</label>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
              <!--Compact Cards -->
              <div class="col-lg-5">
                <div class="compact-card-grid">
                  <!-- PRIVACY PREFERENCES -->
                <div class="pref-card">
                  <h6 class="fw-semibold">PRIVACY PREFERENCES</h6><br>
                  <div class="mb-2">
                    <input type="text" class="form-control form-control-sm mb-2" placeholder="Email Address">
                    <input type="text" class="form-control form-control-sm mb-2" placeholder="Phone Number">
                  </div>
                  <div class="pref-number">0</div>
                  <div class="pref-label mb-3">individually Configured</div>
                  <button class="btn btn-primary rounded-pill w-100 py-2" style="background-color: #0d6efd; border: none;">Search</button>
                </div>     

                  <!-- CAPTURE PREFERENCES -->
                  <div class="pref-card">
                    <h6 class="fw-semibold">CAPTURE PREFERENCES</h6><br>
                    <div class="form-check mb-1">
                      <input class="form-check-input" type="checkbox" id="websiteForm" checked>
                      <label class="form-check-label" for="websiteForm">Website Form</label>
                    </div>
                    <div class="form-check mb-1">
                      <input class="form-check-input" type="checkbox" id="vendorConsent" >
                      <label class="form-check-label" for="vendorConsent">Vendor & Cookie Consent</label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="emailUnsubscribe">
                      <label class="form-check-label" for="emailUnsubscribe">Email Unsubscribe</label>
                    </div><br><br><br>
                   <button class="btn btn-primary rounded-pill w-100 py-2" style="background-color: #0d6efd; border: none;">Search</button>
                  </div> 
                              
                <!-- DSAR VELOCITY -->
                <div class="pref-card">
                  <h6 class="fw-semibold">DSAR VELOCITY</h6>
                  
                  <div class="stat-row">
                    <span>Last 7 Days</span>
                    <span class="stat-value">0</span>
                  </div>
                  <div class="stat-row">
                    <span>Last 30 Days</span>
                    <span class="stat-value">0</span>
                  </div>
                  <div class="stat-row">
                    <span>Last 90 Days</span>
                    <span class="stat-value">0</span>
                  </div>
                  <div class="stat-row">
                    <span>Last Year</span>
                    <span class="stat-value">0</span>
                  </div>
              <button class="btn btn-primary rounded-pill w-100 mt-3 py-2" style="background-color: #0d6efd; border: none;">Search</button>
                </div>
                  
                  
<!-- DSAR STATS -->
<div class="pref-card">
  <h6 class="fw-semibold mb-3">DSAR STATS</h6>
  
  <!-- Table Header -->
  <div class="d-flex justify-content-between mb-2 px-1">
    <span class="fw-medium" style="font-size: 11px; color: #6c757d;"></span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 14px; color: #000;">30 Days</span>
      <span class="text-center" style="width: 55px; font-size: 14px; color: #000;">7 Days</span>
    </div>
  </div>
  
  <!-- Received -->
  <div class="d-flex justify-content-between align-items-center mb-2 px-1">
    <span class="fw-semibold" style="font-size: 13px;">Received</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0</span>
    </div>
  </div>
  
  <!-- Responded -->
  <div class="d-flex justify-content-between align-items-center mb-2 px-1">
    <span class="fw-semibold" style="font-size: 13px;">Responded</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
    </div>
  </div>
  
  <!-- Abandoned -->
  <div class="d-flex justify-content-between align-items-center mb-2 px-1">
    <span class="fw-semibold" style="font-size: 13px;">Abandoned</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
    </div>
  </div>
  
  <!-- Data Sent -->
  <div class="d-flex justify-content-between align-items-center mb-2 px-1">
    <span class="fw-semibold" style="font-size: 13px;">Data Sent</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
    </div>
  </div>
  
  <!-- Data Deleted -->
  <div class="d-flex justify-content-between align-items-center mb-2 px-1">
    <span class="fw-semibold" style="font-size: 13px;">Data Deleted</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #28a745; font-weight: 600;">0%</span>
    </div>
  </div>
  
  <!-- Identity Failure -->
  <div class="d-flex justify-content-between align-items-center px-1">
    <span class="fw-semibold" style="font-size: 13px;">Identity Failure</span>
    <div class="d-flex" style="width: 110px;">
      <span class="text-center" style="width: 55px; font-size: 13px; color: #dc3545; font-weight: 600;">0%</span>
      <span class="text-center" style="width: 55px; font-size: 13px; color: #dc3545; font-weight: 600;">0%</span>
    </div>
  </div>
</div>
                
              </div>
            </div>

          </div>
          <!-- / Content -->
<br>
          <?= $this->include('includes/footer_section') ?>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>
  <!-- / Layout wrapper -->

  <?= $this->include('includes/footer') ?>
</body>

</html>