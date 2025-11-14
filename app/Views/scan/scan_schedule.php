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
                 <!-- Content -->

                 <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Scan Schedule</h4>
                    <!-- Basic Layout & Basic with Icons -->
                    <div class="row">
                       <div class="col-xxl">
                          <div class="card mb-4">
                             <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Scan Schedule</h5>
                             </div>
                              <div class="card-body">
                                 <form action="<?= base_url('/scan/scan_schedulesave') ?>" method="post">
                                   <?= csrf_field() ?>
                                    <div class="mb-4"> 
                                       <?php  ?>
                                      <label for="scan_schedule" class="form-label">Scan Time</label>
                                       <select class="form-select" id="scan_schedule" name="scan_schedule">
                                         <option value="">Select a Scan Time</option>
                                         <option value="1" <?php echo  ($schedule==1) ? 'selected' : ''; ?>>Daily</option>
                                         <option value="2" <?php echo  ($schedule==2) ? 'selected' : ''; ?>>Weekly</option> 
                                         <option value="3" <?php echo  ($schedule==3) ? 'selected' : ''; ?>>Monthly</option>
                                         <option value="4" <?php echo  ($schedule==4) ? 'selected' : ''; ?>>Yearly</option>                                          
                                       </select>
                                    </div>

                                   <div class="row justify-content-end">
                                      <div class="col-sm-10">
                                         <button type="submit" class="btn btn-primary">Save</button>
                                      </div>
                                   </div>
                                 </form>
                              </div>
                          </div>
                       </div>
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