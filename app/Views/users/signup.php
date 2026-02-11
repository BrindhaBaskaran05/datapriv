<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign Up</title>

  <!-- Bootstrap & Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
  -webkit-box-shadow: 0 0 0 1000px #ffffff inset;
  box-shadow: 0 0 0 1000px #ffffff inset;
  -webkit-text-fill-color: #0A2540;
  transition: background-color 9999s ease-in-out 0s;
}
 body {
background:
    radial-gradient(circle at top left, rgba(59,110,165,0.12), transparent 40%),
    linear-gradient(135deg, #F7FAFF, #EDF3FB);
     min-height: 100vh;
      display: flex;
      align-items: center;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }
    .signup-shell {
      max-width: 1200px;
      width: 100%;
      margin: auto;
    }

    .signup-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 30px 70px rgba(0, 0, 0, 0.25);
      overflow: hidden;
    }

    /* LEFT PANEL */
    .signup-left {
      background: linear-gradient(160deg, #0A2540, #3B6EA5);
      color: #fff;
      padding: 50px 45px;
      display: flex;
      flex-direction: column;
      justify-content: center;
     
    }

    .signup-left h1 {
      font-size: 36px;
      font-weight: 800;
      line-height: 1.25;
      margin-bottom: 20px;
    }

    .signup-left p {
      font-size: 16px;
      opacity: 0.95;
      margin-bottom: 30px;
    }

    .quote-box {
      background: rgba(255, 255, 255, 0.15);
      border-left: 4px solid #ffffff;
      padding: 18px 20px;
      border-radius: 10px;
      font-style: italic;
      font-size: 15px;
    }

    /* RIGHT PANEL */
    .signup-wrapper {
      padding: 35px 40px;
    }

    .signup-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .signup-header h2 {
      font-weight: 700;
      color: #0A2540;
      margin: 0;
    }

    .signup-header a {
      font-size: 14px;
      color: #3B6EA5;
      font-weight: 600;
      text-decoration: none;
    }

    .section-title {
      font-size: 14px;
      font-weight: 700;
      color: #3B6EA5;
      margin: 16px 0 8px;
      text-transform: uppercase;
    }

    .form-label {
      font-size: 13px;
      font-weight: 600;
      color: #0A2540;
      margin-bottom: 4px;
    }

    .form-control,
    .form-select,
    .select2-container .select2-selection--single {
      height: 36px;
      border-radius: 8px;
      font-size: 13px;
      border: 1px solid #d6dce3;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #3B6EA5;
      box-shadow: 0 0 0 2px rgba(59, 110, 165, 0.15);
    }

    .ErrorMsg {
      font-size: 11px;
      color: #dc3545;
    }

    .btn-primary {
      background: linear-gradient(135deg, #0A2540, #3B6EA5);
      border: none;
      border-radius: 10px;
      padding: 10px 34px;
      font-weight: 700;
      font-size: 14px;
    }

    @media (max-width: 992px) {
      .signup-left {
        display: none;
      }

      body {
        padding: 20px;
        align-items: flex-start;
      }
    }
    .signup-shell {
  opacity: 0;
  transform: translateY(20px);
  animation: signupShellSlow 1.4s ease-out forwards;
}

/* Slow, elegant entrance */
@keyframes signupShellSlow {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  70% {
    opacity: 0.9;
    transform: translateY(6px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
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
}

.login-card a {
  color: #0A2540;
  font-weight: 700;
  text-decoration: none;
}

.login-card a:hover {
  color: #3B6EA5;
}
.form-check-label a {
  color: #3B6EA5;
  font-weight: 600;
  text-decoration: none;
}

.form-check-label a:hover {
  text-decoration: underline;
}

  </style>
</head>

<body>

<div class="signup-shell">
  <div class="signup-card row g-0">

    <!-- LEFT CARD -->
    <div class="col-lg-4 signup-left">
    <h1>Welcome 👋</h1>
      <p>
       Create your account and unlock access to secure your data and privacy
      </p>
      <!--p>
        Secure, scalable, and built for growth.
        Create your account and move forward with clarity.
      </p>
      <div class="quote-box">
        “Success is the sum of small efforts repeated every day.”
      </div-->
    </div>

    <!-- RIGHT FORM -->
    <div class="col-lg-8 signup-wrapper">

      <div class="signup-header">
        <h2>Create Account</h2>
      <div class="login-card">
  <span>Already have an account?</span>
  <a href="<?= base_url('/') ?>">Sign in →</a>
</div>
      </div>

      <form name="form2" id="form2" method="post" autocomplete="off">

        <!-- PERSONAL INFO -->
        <div class="section-title">Personal Information</div>
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">First Name*</label>
            <input type="text" class="form-control" id="txt_name" name="name">
            <span class="ErrorMsg" id="txt_name_Error"></span>
          </div>
          <div class="col-md-3">
            <label class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="txt_middle_name" name="middle_name">
          </div>
          <div class="col-md-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" id="txt_last_name" name="last_name">
          </div>
          <div class="col-md-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="txt_dob" name="dob">
            <span class="ErrorMsg" id="txt_dob_Error"></span>
          </div>
        </div>

        <!-- ACCOUNT -->
        <div class="section-title">Account Details</div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Email*</label>
            <input type="email" class="form-control" id="txt_email" name="email" onchange="fncheckEmail(this)" >
            <span class="ErrorMsg" id="txt_email_Error"></span>
          </div>
          <div class="col-md-4">
            <label class="form-label">Password*</label>
            <input type="password" class="form-control" id="txt_password" name="password">
            <span class="ErrorMsg" id="txt_password_Error"></span>
          </div>
          <div class="col-md-4">
            <label class="form-label">Confirm Password*</label>
            <input type="password" class="form-control" id="txt_confirm_password" name="txt_confirm_password">
            <span class="ErrorMsg" id="txt_confirm_Error"></span>
          </div>
        </div>

        <!-- ADDRESS -->
        <div class="section-title">Address</div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" id="txt_address" name="address">
          </div>
          <div class="col-md-6">
            <label class="form-label">Address 2</label>
            <input type="text" class="form-control" id="txt_address2" name="address2">
          </div>
          <div class="col-md-4">
            <label class="form-label">City</label>
            <input type="text" class="form-control" id="txt_city" name="city">
          </div>
          <div class="col-md-4">
            <label class="form-label">State</label>
            <input type="text" class="form-control" id="txt_state" name="state">
          </div>
          <div class="col-md-4">
            <label class="form-label">Postal Code</label>
            <input type="number" class="form-control" id="txt_postal_code"  maxlength='10' name="postal_code">
          </div>
        </div>

        <!-- CONTACT -->
        <div class="section-title">Contact</div>
        <div class="row g-3 align-items-end">
          <div class="col-md-4">
            <label class="form-label">Country</label>
            <select class="form-select" id="country" name="country">
              <option value=""></option>
              <?php foreach ($countries as $country): ?>
                <option value="<?= $country['country_id'] ?>"><?= $country['country_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Mobile Number *</label>
            <input type="text" class="form-control" maxlength='15' id="txt_contact_number1" name="contact_number1">
            <span class="ErrorMsg" id="txt_contact_number1_Error"></span>
          </div>
          <div class="col-md-4">
            <label class="form-label">Alternate Number </label>
            <input type="text" class="form-control" maxlength='15' id="txt_contact_number2" name="contact_number2">
          </div>
        </div>
       <div class="form-check mt-4">
  <input class="form-check-input" type="checkbox" id="termsCheck" disabled>
  <label class="form-check-label" for="termsCheck">
     
    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#termsModal">
    I agree to Terms & Conditions
    </a>
  </label>
</div>



        <!-- SUBMIT -->
        
     <div class="text-end mt-4" id="submitWrapper" style="display:none;">
  <button type="button" class="btn btn-primary" onclick="fnSignUp()">
    Create Account
  </button>
</div>


      </form>
    </div>
  </div>
</div>
<?= view('users/mdl_terms_conditions') ?>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('#country').select2({
      placeholder: "Select a country",
      allowClear: true
    });
  });
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
      document.getElementById("txt_contact_number1_Error").innerHTML = "Please enter contact1";
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
  document.getElementById('agreeBtn').addEventListener('click', function () {
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
  });
</script>


</body>
</html>
