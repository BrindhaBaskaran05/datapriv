<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
  <title>Login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: url('<?php echo base_url(); ?>web_assets/img/bg.jpeg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
      margin: 0;
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

    /* Main wrapper */
    .main-wrapper {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Welcome text - responsive */
    .welcome-text {
      margin-bottom: 30px;
      text-align: center;
    }

    .welcome-text h1 {
      font-weight: bold;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .welcome-text h1:first-child {
      font-size: clamp(1.5rem, 5vw, 2.5rem);
      margin-bottom: 10px;
    }

    .welcome-text h1:last-child {
      font-size: clamp(1.2rem, 4vw, 2rem);
    }

    /* Login box - fully responsive */
    .login-shell {
      max-width: 500px;
      width: 100%;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
      border: 1px solid #dde2e8;
      padding: clamp(1.5rem, 5vw, 2.5rem) clamp(1.5rem, 4vw, 2.2rem);
      transition: all 0.3s ease;
    }

    .login-header h2 {
      font-weight: 600;
      font-size: clamp(1.5rem, 5vw, 2rem);
      color: #1a2634;
      margin-bottom: 25px;
    }

    /* Input group - responsive */
    .input-group-custom {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #cfd9e2;
      padding: 10px 0;
      margin-bottom: 20px;
      transition: border-color 0.2s;
    }

    .input-group-custom input {
      border: none;
      outline: none;
      width: 100%;
      padding: 8px 10px;
      font-size: clamp(0.9rem, 4vw, 1rem);
      background: transparent;
    }

    .input-group-custom input::placeholder {
      color: #9aa7b5;
      font-size: clamp(0.85rem, 3.5vw, 0.95rem);
    }

    .input-icon {
      color: #5a6b7b;
      font-size: clamp(14px, 4vw, 16px);
      margin-right: 10px;
      flex-shrink: 0;
    }

    .input-group-custom:focus-within {
      border-bottom: 1.5px solid #1f3a5f;
    }

    /* Error message */
    .ErrorMsg {
      font-size: 0.75rem;
      color: #bd362f;
      margin-top: -15px;
      margin-bottom: 10px;
      display: block;
    }

    /* Button */
    .btn-login {
      background: #1f3a5f;
      color: #fff;
      border: none;
      padding: clamp(12px, 4vw, 14px);
      width: 100%;
      font-weight: 700;
      font-size: clamp(0.9rem, 4vw, 1rem);
      margin-top: 15px;
      border-radius: 8px;
      transition: all 0.2s;
      cursor: pointer;
    }

    .btn-login:hover {
      background: #10243f;
      transform: translateY(-1px);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .login-links {
      text-align: left;
      margin-bottom: 10px;
    }

    .login-links a {
      text-decoration: none;
      font-size: clamp(0.85rem, 3.5vw, 0.9rem);
      color: #1f3a5f;
      font-weight: 600;
      transition: opacity 0.2s;
    }

    .login-links a:hover {
      opacity: 0.8;
    }

    .signup-text {
      text-align: center;
      margin-top: 15px;
      font-size: clamp(0.85rem, 3.5vw, 0.9rem);
    }

    .signup-text a {
      color: #1f3a5f;
      font-weight: 700;
      text-decoration: none;
      transition: opacity 0.2s;
    }

    .signup-text a:hover {
      opacity: 0.8;
    }

    /* Mobile specific adjustments */
    @media (max-width: 768px) {
      body {
        padding: 15px;
        align-items: flex-start;
        padding-top: 100px;
      }

      .logo-container {
        top: 15px;
        left: 15px;
      }

      .logo-container img {
        max-height: 60px;
      }

      .welcome-text {
        margin-bottom: 25px;
      }

      .login-shell {
        padding: 1.8rem;
      }

      .input-group-custom {
        padding: 8px 0;
      }
    }

    /* Small phones */
    @media (max-width: 480px) {
      body {
        padding: 10px;
        padding-top: 90px;
      }

      .logo-container img {
        max-height: 50px;
      }

      .welcome-text {
        margin-bottom: 20px;
      }

      .login-shell {
        padding: 1.5rem;
      }

      .input-group-custom {
        padding: 6px 0;
        margin-bottom: 18px;
      }

      .btn-login {
        padding: 12px;
      }
    }

    /* Landscape mode for mobile */
    @media (max-width: 768px) and (orientation: landscape) {
      body {
        padding-top: 70px;
      }

      .welcome-text {
        margin-bottom: 15px;
      }

      .login-shell {
        padding: 1.2rem;
      }
    }

    /* Tablet adjustments */
    @media (min-width: 769px) and (max-width: 1024px) {
      .login-shell {
        max-width: 450px;
      }

      .welcome-text h1:first-child {
        font-size: 2rem;
      }

      .welcome-text h1:last-child {
        font-size: 1.6rem;
      }
    }
  </style>
</head>

<body>

<!-- Logo - Responsive -->
<div class="logo-container">
  <img src="<?php echo base_url(); ?>web_assets/img/logo.jpg" alt="Logo" class="img-fluid">
</div>

<!-- Main wrapper -->
<div class="main-wrapper">
  
  <!-- Welcome Text - Responsive -->
  <div class="welcome-text">
    <h1>Welcome back...</h1>
    <h1>Continue where your privacy left off.</h1>
  </div>

  <!-- Login Box -->
  <div class="login-shell mx-auto">
    <div class="login-header text-start">
      <h2>Login</h2>
    </div>

    <form name="form1" id="form1" method="post">

      <!-- Email -->
      <div class="input-group-custom">
        <span class="input-icon">
          <i class="bi bi-envelope-fill"></i>
        </span>
        <input type="email" id="username" name="username" placeholder="Enter your email" autocomplete="email">
      </div>
      <span class="ErrorMsg" id="User_Error"></span>

      <!-- Password -->
      <div class="input-group-custom">
        <span class="input-icon">
          <i class="bi bi-lock-fill"></i>
        </span>
        <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password">
      </div>
      <span class="ErrorMsg" id="Pass_Error"></span>

      <!-- Flash message -->
      <?php if (session()->getFlashdata('msg')): ?>
        <span class='ErrorMsg'><?= session()->getFlashdata('msg') ?></span>
      <?php endif; ?>

      <!-- Forgot -->
      <div class="login-links">
        <a href="#">Forgot password?</a>
      </div>

      <!-- Button -->
      <button type="button" class="btn-login" onClick="fnLogin()">Login</button>

      <!-- Signup -->
      <div class="signup-text">
        Don't have an account? <a href="<?= base_url('signupform') ?>">Signup now</a>
      </div>

    </form>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
function fnLogin() {
  var action = 0;

  document.getElementById("User_Error").innerHTML = "";
  document.getElementById("Pass_Error").innerHTML = "";

  var username = document.getElementById("username");
  var password = document.getElementById("password");

  if (username.value.trim() === "") {
    document.getElementById("User_Error").innerHTML = "Please enter email";
    action = 1;
  }

  if (password.value.trim() === "") {
    document.getElementById("Pass_Error").innerHTML = "Please enter password";
    action = 1;
  }

  if (action === 1) {
    return false;
  } else {
    form1.action = "<?php echo base_url(); ?>users/loginprocess";
    form1.submit();
  }
}

// Add touch-friendly feedback for mobile
document.querySelectorAll('.btn-login, .login-links a, .signup-text a').forEach(element => {
  element.addEventListener('touchstart', function() {
    this.style.opacity = '0.7';
  });
  element.addEventListener('touchend', function() {
    this.style.opacity = '1';
  });
});
</script>

</body>
</html>