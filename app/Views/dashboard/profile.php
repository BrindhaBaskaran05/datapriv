  <?= $this->include('includes/header') ?>
<style>
   label {
      text-transform: capitalize !important;
   }
</style>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                      <label class="col-sm-4 col-form-label" for="basic-default-name">First Name*</label>
                                      <div class="col-sm-8">
                                         <input type="text" required name="name" class="form-control" id="basic-default-name" placeholder="John Doe" value="<?php echo isset($_POST['name']) && $_POST['name'] !== '' ? htmlspecialchars($_POST['name']) : $name; ?>" />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-company">Middle Name</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-default-company">Last Name</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-default-company">Birthday</label>
                                      <div class="col-sm-8">
                                         <input
                                            type="date"
                                              name="dob" 
                                               value="<?php echo $dob;?>"
                                            class="form-control"
                                            id="basic-default-company"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-email">Email*</label>
                                      <div class="col-sm-8">
                                         <div class="input-group input-group-merge">
                                            <input
                                               type="text"
                                               id="basic-default-email"
                                               name="email" 
                                               class="form-control"
                                               value="<?php echo $user_email;?>"
                                               placeholder="john.doe@gmail.com"
                                               aria-label="john.doe" disabled
                                               aria-describedby="basic-default-email2" />
                                           
                                         </div>
                                         
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-phone">City</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-default-phone">State</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-default-phone">Postelcode</label>
                                      <div class="col-sm-8">
                                         <input
                                            type="number"
                                            name="postal_code"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            value="<?php echo $postal_code;?>"
                                            placeholder="533016" />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-phone">Country</label>
                                      <div class="col-sm-8">
                                       <select class="form-select" id="ctry_id" name="country">
                                                   <!-- <option value="">Select a country</option> -->
                                       <?php foreach ($countries as $ctry): ?>
                                          <option value="<?= $ctry['country_id'] ?>" 
                                             <?= ($ctry['country_id'] == $country) ? 'selected' : '' ?>>
                                             <?= $ctry['country_name'] ?>
                                          </option>
                                          <?php endforeach; ?>
                                       </select>
                                        
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-message">Address1</label>
                                      <div class="col-sm-8">
                                         <textarea
                                            name="address"
                                            id="basic-default-message"
                                            class="form-control"                                            
                                            ><?php echo $address1;?></textarea>
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="basic-default-message">Address2</label>
                                      <div class="col-sm-8">
                                         <textarea
                                           name="address2"
                                            id="basic-default-message"
                                            class="form-control"                                            
                                            ><?php echo $address2;?></textarea>
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="contact_number1">Contact 1*</label>
                                      <div class="col-sm-8">
                                         <input
                                            type="text" required
                                             name="contact_number1"
                                            id="contact_number1"
                                            class="form-control phone-mask"
                                            placeholder="9377454333"
                                             value="<?php echo $contact_number1;?>"
                                             />
                                      </div>
                                   </div>
                                   <div class="row mb-3">
                                      <label class="col-sm-4 col-form-label" for="contact_number2">Contact 2</label>
                                      <div class="col-sm-8">
                                         <input
                                            type="text"
                                             name="contact_number2"
                                            id="contact_number2"
                                            class="form-control phone-mask"
                                            placeholder="9377454444"
                                             value="<?php echo $contact_number2;?>"
                                             />
                                      </div>
                                   </div>
                                   <div class="row justify-content-end">
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-icon-default-fullname">New Password</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-icon-default-company">Confirm Password</label>
                                      <div class="col-sm-8">
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
                                      <label class="col-sm-4 col-form-label" for="basic-icon-default-company">Current Password</label>
                                      <div class="col-sm-8">
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
                                      <div class="col-sm-8">
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('#ctry_id').select2({
      placeholder: "Select a country",
      allowClear: true
    });
  });
</script>

  </html>