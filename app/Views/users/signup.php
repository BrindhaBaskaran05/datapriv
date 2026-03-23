<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>Sign Up</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: url('<?php echo base_url(); ?>web_assets/img/bg.jpeg') no-repeat center center fixed;
  background-size: cover;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Segoe UI', sans-serif;
  flex-direction: column;
  padding: 20px;
  position: relative;
}

/* Dark overlay for better text readability on mobile */
body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.3);
  z-index: 0;
}

/* Logo responsive */
.position-absolute {
  z-index: 10;
}

.position-absolute img {
  max-height: 80px;
  width: auto;
}

/* Welcome text responsive */
.text-center.mb-4 h1 {
  font-size: clamp(1.2rem, 5vw, 2rem);
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  position: relative;
  z-index: 1;
}

/* Card - fully responsive */
.signup-card {
  width: 100%;
  max-width: 600px;
  background: rgba(255, 255, 255, 0.98);
  padding: 30px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.25);
  position: relative;
  z-index: 1;
}

/* Title */
.signup-title {
  text-align: center;
  font-weight: 600;
  font-size: clamp(18px, 5vw, 22px);
  margin-bottom: 20px;
}

.signup-title h2 {
  font-size: inherit;
}

/* Input */
.form-control {
  height: 42px;
  border-radius: 8px;
  font-size: clamp(13px, 4vw, 14px);
}

/* Row spacing */
.mb-15 {
  margin-bottom: 15px;
}

/* Gender */
.gender-group {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  font-size: clamp(13px, 4vw, 14px);
}

/* Button */
.btn-submit {
  width: 100%;
  padding: 12px;
  border-radius: 8px;
  border: none;
  background: #4e6f95;
  color: #fff;
  font-weight: 600;
  font-size: clamp(14px, 4vw, 16px);
  cursor: pointer;
  transition: all 0.2s;
}

.btn-submit:hover {
  background: #2f4f73;
}

.btn-submit:active {
  transform: scale(0.98);
}

/* Terms */
.terms {
  font-size: clamp(12px, 3.5vw, 13px);
}

/* Error messages */
.ErrorMsg {
  font-size: 11px;
  color: #dc3545;
  margin-top: 5px;
  display: block;
}

/* Logo container - responsive */
    .logo-container {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 10;
    }

    .logo-container img {
      max-height: 80px;
      width: auto;
    }

/* Mobile Responsive Styles */
@media (max-width: 768px) {
  body {
    padding: 15px;
    align-items: flex-start;
    padding-top: 100px;
  }
  
  .position-absolute {
    top: 10px !important;
    left: 10px !important;
    padding: 10px !important;
  }
  
  .position-absolute img {
    max-height: 60px;
  }
  
  .text-center.mb-4 {
    margin-bottom: 20px !important;
  }
  
  .signup-card {
    padding: 20px;
  }
  
  /* Make all columns stack on mobile */
  .row {
    flex-direction: column;
  }
  
  .row > [class*="col-"] {
    width: 100%;
    margin-bottom: 15px;
  }
  
  .row > [class*="col-"]:last-child {
    margin-bottom: 0;
  }
  
  /* Adjust spacing */
  .mb-15 {
    margin-bottom: 12px;
  }
  
  .gender-group {
    gap: 12px;
  }
}

.logo-container {
        top: 15px;
        left: 15px;
      }

      .logo-container img {
        max-height: 60px;
      }
	  
@media (max-width: 480px) {
  body {
    padding: 10px;
    padding-top: 85px;
  }
  
  .position-absolute img {
    max-height: 50px;
  }
  
  .signup-card {
    padding: 18px;
  }
  
  .form-control {
    height: 40px;
  }
  
  .btn-submit {
    padding: 10px;
  }
  .logo-container img {
        max-height: 50px;
      }
}

/* Landscape mode for mobile */
@media (max-width: 768px) and (orientation: landscape) {
  body {
    padding-top: 70px;
  }
  
  .signup-card {
    padding: 15px;
  }
  
  .mb-15 {
    margin-bottom: 10px;
  }
}

/* Tablet adjustments */
@media (min-width: 769px) and (max-width: 1024px) {
  .signup-card {
    max-width: 550px;
  }
}

/* Better touch targets for mobile */
@media (max-width: 768px) {
  button, 
  input, 
  select, 
  .btn-submit,
  a {
    touch-action: manipulation;
  }
  
  input, select {
    font-size: 16px !important; /* Prevents zoom on focus in iOS */
  }
  
  .form-check-input {
    width: 18px;
    height: 18px;
    cursor: pointer;
  }
}

/* Ensure content stays above overlay */
.signup-card,
.text-center.mb-4,
.position-absolute {
  position: relative;
  z-index: 1;
}

/* Smooth transitions */
.signup-card {
  transition: all 0.3s ease;
}

/* Animation for card */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.signup-card {
  animation: fadeInUp 0.4s ease-out;
}
.login-card {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #f1f5fb;
  padding: 10px 16px;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  color: #6b7c93;
  float: right;
}

.login-card a {
  color: #0A2540;
  font-weight: 700;
  text-decoration: none;
}

.login-card a:hover {
  color: #3B6EA5;
}

</style>
</head>

<body>

<!-- Logo -->
<!--<div class="position-absolute top-0 start-0 p-3">
  <img src="<?php echo base_url(); ?>web_assets/img/logo.jpg" style="max-height:100px;">
</div>-->
<div class="logo-container">
  <img src="<?php echo base_url(); ?>web_assets/img/logo.jpg" alt="Logo" class="img-fluid">
</div>

<div class="text-center mb-4">
  <h1 class="fw-bold text-white">Reclaim your privacy—get started.</h1>
</div>

<div class="signup-card mx-auto">


  <div class="signup-title"><h2><strong>Registration Form</strong></h2></div>
   <div class="login-card">
  <span>Already have an account?</span>
  <a href="<?= base_url('/') ?>">Sign in →</a>
 </div><br><br>

  <form name="form2" id="form2" method="post" autocomplete="off">

    <!-- Name -->
    <div class="mb-15">
      <label style="font-weight: bold;">Full Name</label>
      <input type="text" class="form-control" id="txt_name" name="name" placeholder="Enter full name">
      <span class="ErrorMsg" id="txt_name_Error"></span>
    </div>
   
    <!-- Email -->
    <div class="mb-15">
      <label style="font-weight: bold;">Email Address</label>
      <input type="email" class="form-control" id="txt_email" name="email" onChange="fncheckEmail(this)" placeholder="Enter email address">
      <span class="ErrorMsg" id="txt_email_Error"></span>
    </div>
    
     <!-- Password -->
    <div class="row mb-15">
      <div class="col-6">
        <label style="font-weight: bold;">Password</label>
        <input type="password" class="form-control" id="txt_password" name="password" placeholder="Password">
        <span class="ErrorMsg" id="txt_password_Error"></span>
      </div>
      
      <div class="col-6">
        <label style="font-weight: bold;">Confirm Password</label>
        <input type="password" class="form-control" id="txt_confirm_password" name="txt_confirm_password" placeholder="Confirm Password">
            <span class="ErrorMsg" id="txt_confirm_Error"></span>
      </div>      
    </div>

    <!-- Mobile + DOB -->
    <div class="row mb-15">
      <div class="col-6">
        <label style="font-weight: bold;">Mobile Number</label>
        <input type="text" class="form-control" maxlength='15' id="txt_contact_number1" name="contact_number1" placeholder="Enter mobile number">
        <span class="ErrorMsg" id="txt_contact_number1_Error"></span>
      </div>
      
      <div class="col-6">
        <label style="font-weight: bold;">Birth Date</label>
        <input type="date" class="form-control" id="txt_dob" name="dob">
        <span class="ErrorMsg" id="txt_dob_Error"></span>
      </div>
      

    </div>

    <!-- Gender -->
    <div class="mb-15">
      <label style="font-weight: bold;">Gender</label>
      <div class="gender-group mt-1">
        <label><input type="radio" name="gender" value="Male"> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
        <label><input type="radio" name="gender" value="Prefer not to say"> Prefer not to say</label>
      </div>
    </div>

    <!-- Address -->
    <div class="mb-15">
      <label style="font-weight: bold;">Address</label>
      <input type="text" name="address" class="form-control" id="txt_address" placeholder="Enter address">
    </div>

    <!-- Country + Postal -->
    <div class="row mb-15">
     <div class="col-6">
        <select class="form-control" id="country" name="country">
          <option value="" disabled selected>Country</option>
          <?php foreach ($countries as $country): ?>
            <option value="<?= $country['country_id'] ?>">
              <?= $country['country_name'] ?> (<?= $country['code'] ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="col-6">
        <input type="number" class="form-control" id="txt_postal_code"  maxlength='10' name="postal_code" placeholder="Enter postal code">
      </div>
      
    </div>

    <!-- Terms -->
<!-- <div class="form-check terms mb-15">
      <input class="form-check-input" type="checkbox" id="termsCheck" disabled>
      <label class="form-check-label" for="termsCheck">
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#termsModal">
    I agree to Terms of Use and privacy policy
    </a>
      </label>
    </div>-->
<div class="form-check terms mb-15">
  <input class="form-check-input" type="checkbox" id="termsCheck">
  <label class="form-check-label" for="termsCheck">
    <a href="javascript:void(0)" id="termsLink">I agree to Terms of Use and privacy policy</a>
  </label>
</div>
    
    <!-- Button -->
    <div id="submitWrapper" style="display:none;">
    <button type="button" class="btn-submit" onClick="fnSignUp()">Submit</button>
    </div>
    
  </form>
</div>


<?= view('users/mdl_terms_conditions') ?>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  /*$(document).ready(function() {
    $('#country').select2({
      placeholder: "Select a country",
      allowClear: true
    });
  });*/
</script>

<script>
  function fncheckEmail(obj) {
    document.getElementById("txt_email_Error").innerHTML = "";
    Email = obj.value;

    $.ajax({
      url: '<?php echo base_url(); ?>/users/checkemail', // add slash
      type: 'POST',
      data: {
        Email
      },
      success: function(msg) {
        if (msg > 0) {
          document.getElementById("txt_email_Error").innerHTML = "Email ID Already Registered";
          document.getElementById("txt_email").value = "";
        }
      }
    });
  }


  function valid(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
  }

  function fnSignUp() {
    var action = 0;

    document.getElementById("txt_name_Error").innerHTML = "";
    document.getElementById("txt_email_Error").innerHTML = "";
    document.getElementById("txt_password_Error").innerHTML = "";
    document.getElementById("txt_confirm_Error").innerHTML = "";

    if (document.getElementById("txt_name").value == "") {
      document.getElementById("txt_name_Error").innerHTML = "Please enter name";
      action = 1;
    }
    if (document.getElementById("txt_email").value == "") {
      document.getElementById("txt_email_Error").innerHTML = "Please enter email";
      action = 1;
    }
    //lert(valid(document.getElementById("txt_email").value))
    if (!valid(document.getElementById("txt_email").value)) {
      document.getElementById("txt_email_Error").innerHTML = "Invalid Email ID";
      action = 1;
    }

    if (document.getElementById("txt_password").value == "") {
      document.getElementById("txt_password_Error").innerHTML = "Please enter password";
      action = 1;
    }
    if (document.getElementById("txt_confirm_password").value == "") {
      document.getElementById("txt_confirm_Error").innerHTML = "Please enter confirm password";
      action = 1;
    }
    if (document.getElementById("txt_password").value != document.getElementById("txt_confirm_password").value) {
      document.getElementById("txt_confirm_Error").innerHTML = "Password and Confirm Password mismatching";
      action = 1;
    }
     if (document.getElementById("txt_contact_number1").value =='') {
      document.getElementById("txt_contact_number1_Error").innerHTML = "Please enter Mobile Number";
      action = 1;
    }
        
    if (action == 1) {
      return false;
    } else {
      form2.action = "<?php echo base_url(); ?>users/signup";
      form2.submit();
    }

  }


  document.querySelector('.img-btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s-signup')
  });
</script>
<script>
  window.addEventListener('load', function () {
    const inputs = document.querySelectorAll(
      'input[type="text"], input[type="email"], input[type="password"], input[type="number"]'
    );

    inputs.forEach(input => {
      input.value = '';
    });
  });
</script>
<script>
  /*document.getElementById('agreeBtn').addEventListener('click', function () {
    const checkbox = document.getElementById('termsCheck');
    const submit = document.getElementById('submitWrapper');

    checkbox.checked = true;
    checkbox.disabled = false;
    submit.style.display = 'block';

    const modal = bootstrap.Modal.getInstance(
      document.getElementById('termsModal')
    );
    modal.hide();

    checkbox.addEventListener('change', function () {
    submit.style.display = this.checked ? 'block' : 'none';
  });
  });*/
</script>
<script>
  // Show terms modal when checkbox is clicked
  document.getElementById('termsCheck').addEventListener('click', function(e) {
    if (this.checked) {
      e.preventDefault();
      var termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
      termsModal.show();
    }
  });

  //Updated agree button handler
  document.getElementById('agreeBtn').addEventListener('click', function() {
    const checkbox = document.getElementById('termsCheck');
    const submit = document.getElementById('submitWrapper');
    checkbox.checked = true;
    submit.style.display = 'block';
    const modal = bootstrap.Modal.getInstance(document.getElementById('termsModal'));
    modal.hide();
  });

  // Added new modal close handler
  document.getElementById('termsModal').addEventListener('hidden.bs.modal', function() {
    const checkbox = document.getElementById('termsCheck');
    const submit = document.getElementById('submitWrapper');
    if (!checkbox.checked) {
      submit.style.display = 'none';
    }
  });

  //Added link click handler
  document.getElementById('termsLink').addEventListener('click', function(e) {
    e.preventDefault();
    var termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
    termsModal.show();
  });
</script>


</body>
</html>