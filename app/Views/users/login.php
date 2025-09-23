<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #E2EBE6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 80px auto;
    }

    .login-title {
      font-size: 26px;
      font-weight: 600;
      color: #2f4f4f;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-label {
      font-weight: 500;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ced4da;
    }

    .btn-primary {
      background-color: #4a7c59;
      border-color: #4a7c59;
      border-radius: 8px;
      padding: 10px 30px;
      font-weight: 600;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #3a6447;
      border-color: #3a6447;
    }

    .form-text {
      text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="login-container">
      <div class="login-title">Login</div>
      <form name='form1' id='form1' method='post'>
        <div class="mb-4">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="username" id='username' placeholder="you@example.com" />
          <span class='ErrorMsg' id='User_Error'></span>
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id='password' placeholder="••••••••" />
         <span class='ErrorMsg' id='Pass_Error'></span>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary" onclick='fnLogin()'>Log In</button>
        </div>

        <div class="form-text">
          <a href="<?= base_url('/signupform') ?>">Signup</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>  

  function fnLogin() {
    document.getElementById("User_Error").innerHTML = "";
    document.getElementById("Pass_Error").innerHTML = "";

    if (document.getElementById("username").value == "") {
      document.getElementById("User_Error").innerHTML = "Please enter emailid";
      return false;
    }
    if (document.getElementById("password").value == "") {
      document.getElementById("Pass_Error").innerHTML = "Please enter password";
      return false;
    }
    form1.action = "<?php echo base_url(); ?>users/loginprocess";
    form1.submit();
  }
  document.querySelector('.img-btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s-signup')
  });
</script>
</html>
