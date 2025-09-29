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
                    <h4 class="fw-bold py-3 mb-4"> User Profile</h4>

                    <!-- Basic Layout & Basic with Icons -->
                    <div class="row">
                       <!-- Basic Layout -->
                       <div class="col-xxl">
                          <div class="card mb-4">
                             <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Profile Details</h5>
                               
                             </div>
                             <div class="card-body">
                                                                  <?php if (session()->getFlashdata('error')): ?>
                                       <div class="alert alert-danger">
                                          <?= session()->getFlashdata('error') ?>
                                       </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('success')): ?>
                                       <div class="alert alert-success">
                                          <?= session()->getFlashdata('success') ?>
                                       </div>
                                    <?php endif; ?>
                                <form action="<?= base_url('/profile/update') ?>" method="post" >
                                  <?= csrf_field() ?>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-name">First Name</label>
                                      <div class="col-sm-10">
                                         <input type="text" name="name" class="form-control" id="basic-default-name" placeholder="John Doe" value="<?php echo isset($_POST['name']) && $_POST['name'] !== '' ? htmlspecialchars($_POST['name']) : $user_name; ?>" />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-company">Middle Name</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                            name="middle_name" 
                                            class="form-control"
                                            id="basic-default-company"
                                            value="<?php echo $middle_name;?>"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-company">Last Name</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                             name="last_name" 
                                            class="form-control"
                                            id="basic-default-company"
                                             value="<?php echo $last_name;?>"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-company">Birthday</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="date"
                                              name="dob" 
                                            class="form-control"
                                            id="basic-default-company"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                      <div class="col-sm-10">
                                         <div class="input-group input-group-merge">
                                            <input
                                               type="text"
                                               id="basic-default-email"
                                               name="email" 
                                               class="form-control"
                                               value="<?php echo $user_email;?>"
                                               placeholder="john.doe@gmail.com"
                                               aria-label="john.doe"
                                               aria-describedby="basic-default-email2" />
                                           
                                         </div>
                                         
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-phone">City</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                             name="city"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            placeholder="Kakinada"
                                             value="<?php echo $city;?>"                                            
                                            />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-phone">State</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                             name="state"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            placeholder="Andrapradesh"
                                             value="<?php echo $state;?>"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Postelcode</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                            name="postal_code"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            value="<?php echo $postal_code;?>"
                                            placeholder="533016" />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Country</label>
                                      <div class="col-sm-10">
                                         <input
                                            type="text"
                                             name="country"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            value="<?php echo $country;?>"
                                            placeholder="India" />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-message">Address1</label>
                                      <div class="col-sm-10">
                                         <textarea
                                            name="address"
                                            id="basic-default-message"
                                            class="form-control"                                            
                                            ><?php echo $address1;?></textarea>
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-default-message">Address2</label>
                                      <div class="col-sm-10">
                                         <textarea
                                           name="address2"
                                            id="basic-default-message"
                                            class="form-control"                                            
                                            ><?php echo $address2;?></textarea>
                                      </div>
                                   </div>
                                   <div class="row justify-content-end">
                                      <div class="col-sm-10">
                                         <button type="submit" class="btn btn-primary">Update</button>
                                      </div>
                                   </div>
                                </form>
                             </div>
                          </div>
                       </div>
                       <!-- Basic with Icons -->
                       <div class="col-xxl">
                          <div class="card mb-4">
                             <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Change Password</h5>
                               
                             </div>
                             <div class="card-body">
                                <form action="<?= base_url('/profile/changepassword') ?>" method="post">
                                 <?= csrf_field() ?>


                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">New Password</label>
                                      <div class="col-sm-10">
                                         <div class="input-group input-group-merge">
                                            
                                            <input
                                               type="text"
                                               name="new_password" required
                                               class="form-control"
                                               id="basic-icon-default-fullname"
                                               
                                                />
                                         </div>
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Confirm Password</label>
                                      <div class="col-sm-10">
                                         <div class="input-group input-group-merge">
                                          
                                            <input
                                               type="text"
                                                name="confirm_password"
                                               id="basic-icon-default-company"
                                               class="form-control" required
                                                />
                                         </div>
                                      </div>
                                   </div>
                                  
                                    <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Current Password</label>
                                      <div class="col-sm-10">
                                         <div class="input-group input-group-merge">
                                            
                                            <input
                                               type="text"
                                                name="current_password" required
                                               id="basic-icon-default-company"
                                               class="form-control"
                                                />
                                         </div>
                                      </div>
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