<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign Up</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <style>
      body {
      background-color: #E2EBE6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      margin: 60px auto;
    }

    .form-title {
      font-size: 30px;
      font-weight: 600;
      color: #2f4f4f;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-label {
      font-weight: 500;
    }

    .form-control,
    .select2-container .select2-selection--single {
      border-radius: 8px;
      border: 1px solid #ced4da;
      height: 38px;
    }

    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 36px;
      padding-left: 12px;
    }

    .btn-primary {
      background-color: #4a7c59;
      border-color: #4a7c59;
      border-radius: 8px;
      padding: 10px 30px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #3a6447;
      border-color: #3a6447;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-container">
      <div class="form-title">Signup Form  <span style="float: right;font-size:14px;"> <a href="<?= base_url('/') ?>">Login</a></span></div>
      
      <form name='form2' id='form2' method='post'>
        <!-- Row 1: Firstname, Middle Name, Last Name, DOB -->
        <div class="row mb-4">
          <div class="col-md-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="txt_name" name="name" placeholder="John" />
           <span class='ErrorMsg' id='txt_name_Error'></span>
          </div>
          <div class="col-md-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="txt_middle_name" name="middle_name" placeholder="A." />
          </div>
          <div class="col-md-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="txt_last_name" name="last_name" placeholder="Doe" />
          </div>
          <div class="col-md-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="txt_dob" name="dob" />
            <span class='ErrorMsg' id='txt_dob_Error'></span>
          </div>
        </div>

        <!-- Email & Password -->
        <div class="row mb-4">
          <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="txt_email" name="email" onchange='fncheckEmail(this)' placeholder="you@example.com" />
            <span class='ErrorMsg' id='txt_email_Error'></span>
          </div>
          <div class="col-md-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="txt_password" name="password" placeholder="••••••••" />
            <span class='ErrorMsg' id='txt_password_Error'></span>
          </div>
          <div class="col-md-4">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="txt_confirm_password" id='txt_confirm_password' placeholder="••••••••" />
          <span class='ErrorMsg' id='txt_confirm_Error'></span>
          </div>
        </div>

        <!-- Address 1 -->
        <div class="mb-4">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="txt_address" name="address" placeholder="1234 Main St" />
        </div>

        <!-- Address 2 -->
        <div class="mb-4">
          <label for="address2" class="form-label">Address 2</label>
          <input type="text" class="form-control" id="txt_address2" name="address2" placeholder="Apartment, suite, etc." />
        </div>

        <!-- City, State, Postal Code -->
        <div class="row mb-4">
          <div class="col-md-4">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="txt_city" name="city" />
          </div>
          <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="txt_state" name="state" />
          </div>
          <div class="col-md-4">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" class="form-control" id="txt_postal_code" name="postal_code" />
          </div>
        </div>

        <!-- Country -->
      <div class="mb-4">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country">
          <option value="">Select a country</option>
         
           <?php
            foreach ($countries as $country) { ?>
            <option value="<?=$country['country_id']?>"><?=$country['country_name']?></option>
           <?php
            }
            ?>
          <!-- Add more countries as needed -->
        </select>
      </div>

        <!-- Submit Button -->
        <div class="text-end">
          <button type="submit" class="btn btn-primary" onclick='fnSignUp()'>Submit Form</button>
        </div>
      </form>
    </div>
  </div>

</body>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<!-- Then Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Bootstrap (optional here since already loaded earlier) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
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
      url: '<?php echo base_url(); ?>users/checkemail',
      type: 'POST',
      data: {
        Email
      },
      success: function(msg) {
        // alert('Email Sent');
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
    document.getElementById("txt_name_Error").innerHTML = "";
    document.getElementById("txt_email_Error").innerHTML = "";
    document.getElementById("txt_password_Error").innerHTML = "";
    document.getElementById("txt_confirm_Error").innerHTML = "";

    if (document.getElementById("txt_name").value == "") {
      document.getElementById("txt_name_Error").innerHTML = "Please enter name";
      return false;
    }
    if (document.getElementById("txt_email").value == "") {
      document.getElementById("txt_email_Error").innerHTML = "Please enter email";
      return false;
    }
    //lert(valid(document.getElementById("txt_email").value))
    if (!valid(document.getElementById("txt_email").value)) {
      document.getElementById("txt_email_Error").innerHTML = "Invalid Email ID";
      return false;
    }

    if (document.getElementById("txt_password").value == "") {
      document.getElementById("txt_password_Error").innerHTML = "Please enter password";
      return false;
    }
    if (document.getElementById("txt_confirm_password").value == "") {
      document.getElementById("txt_confirm_Error").innerHTML = "Please enter confirm password";
      return false;
    }
    if (document.getElementById("txt_password").value != document.getElementById("txt_confirm_password").value) {
      document.getElementById("txt_confirm_Error").innerHTML = "Password and Confirm Password mismatching";
      return false;
    }
    form2.action = "<?php echo base_url(); ?>users/signup";
    form2.submit();
  }

  
  document.querySelector('.img-btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s-signup')
  });



 
</script>
</html>
