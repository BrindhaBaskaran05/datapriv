<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forgot Password</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
       background:
    radial-gradient(circle at top left, rgba(59,110,165,0.12), transparent 40%),
    linear-gradient(135deg, #F7FAFF, #EDF3FB);
      min-height: 100vh;
      display: flex;
      align-items: center;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .auth-shell {
      max-width: 1100px;
      width: 100%;
      margin: auto;
    }

    .auth-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 30px 70px rgba(0, 0, 0, 0.25);
      overflow: hidden;
    }

    /* LEFT PANEL */
    .auth-left {
      background: linear-gradient(160deg, #0A2540, #3B6EA5);
      color: #fff;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      
    }

    .auth-left h1 {
      font-size: 38px;
      font-weight: 800;
      line-height: 1.25;
      margin-bottom: 20px;
    }

    .auth-left p {
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
    .auth-wrapper {
      padding: 60px 70px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
    }

    .auth-header {
      margin-bottom: 25px;
    }

    .auth-header h2 {
      font-weight: 700;
      color: #0A2540;
      margin-bottom: 6px;
    }

    .auth-header p {
      font-size: 14px;
      color: #6c757d;
      margin: 0;
    }

    .form-label {
      font-size: 13px;
      font-weight: 600;
      color: #0A2540;
      margin-bottom: 4px;
    }

    .form-control {
      height: 40px;
      border-radius: 8px;
      font-size: 14px;
      border: 1px solid #d6dce3;
    }

    .form-control:focus {
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
      padding: 12px;
      font-weight: 700;
      font-size: 15px;
      width: 100%;
    }

    .auth-links {
      margin-top: 18px;
      text-align: center;
      font-size: 13px;
    }

    .auth-links a {
      color: #3B6EA5;
      text-decoration: none;
      font-weight: 600;
    }

    @media (max-width: 992px) {
      .auth-left {
        display: none;
      }

      body {
        padding: 20px;
        align-items: flex-start;
      }

      .auth-wrapper {
        padding: 40px 30px;
      }
    }

     .auth-shell {
  opacity: 0;
  transform: translateY(40px);
  animation: signupShellSlow 1.4s ease-out forwards;
}

/* Slow, elegant entrance */
@keyframes signupShellSlow {
  0% {
    opacity: 0;
    transform: translateY(40px);
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
  </style>
</head>

<body>

<div class="auth-shell">
  <div class="auth-card row g-0">

    <!-- LEFT CARD -->
    <div class="col-lg-5 auth-left">
      <h1>Forgot your password? 🔐</h1>
      <p>
        No worries. We’ll help you get back into your account safely and quickly.
      </p>
      <div class="quote-box">
        “Security is not a product, but a process.”
      </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="col-lg-7 auth-wrapper">

      <div class="auth-header">
        <h2>Reset Password</h2>
        <p>Enter your registered email to receive reset instructions</p>
      </div>

      <form id="forgotPasswordForm" method="post">

        <div class="mb-3">
          <label class="form-label">Email Address*</label>
          <input type="email" class="form-control" id="txt_email" name="email">
          <span class="ErrorMsg" id="txt_email_Error"></span>
        </div>

        <button type="button" class="btn btn-primary" onclick="fnForgotPassword()">
          Send Reset Link
        </button>

        <div class="auth-links">
          <a href="<?= base_url('/') ?>">Back to Login</a>
        </div>

      </form>
    </div>

  </div>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
