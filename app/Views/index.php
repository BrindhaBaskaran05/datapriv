<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home - Privacy Protection</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.umd.js"></script>

  <style>
    body {
            background-image: url('<?php echo base_url(); ?>assets/images/bg1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

      .navbar {
            background-color: rgba(0, 0, 0, 0.85);
      }

      .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            z-index: -1;
      }

      .solutions-header {
              padding: 100px 20px 60px;
              text-align: center;
              background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
          }

      .solutions-header h1 {
        font-size: 3.2rem;
        font-weight: 700;
        text-shadow: 1px 1px 8px #000;
      }

      .solutions-header p {
        font-size: 1.2rem;
        font-weight: 400;
        max-width: 800px;
        margin: 15px auto 0;
        line-height: 1.6;
        text-shadow: 1px 1px 4px #000;
      }


    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .counter-box h2 {
      font-size: 42px;
      font-weight: bold;
      color: black;
      transition: transform 0.3s ease;
    }

    .counter-box:hover h2 {
      transform: scale(1.1);
      color: #007bff;
    }

    .testimonial, .info-box, .update-box {
      background-color: rgba(255, 255, 255, 0.95);
      color: #000;
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial:hover, .info-box:hover, .update-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    footer {
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 20px 0;
      text-align: center;
      margin-top: 30px;
    }

    .section-heading {
      text-align: center;
      color: #fff;
      font-weight: bold;
      margin: 40px 0 20px;
      text-shadow: 1px 1px 2px black;
    }

    .btn-animated {
      background: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      transition: 0.3s ease;
    }

    .btn-animated:hover {
      transform: scale(1.05);
      background: #0056b3;
    }
  </style>
</head>

<body>

    <div class="bg-overlay"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Welcome <?php echo $this->session->userdata('name'); ?>!!</span>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/why_privacy">Why Privacy?</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/our_solutions">Our Solutions</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/contact">Contact</a></li>
          <!--li class="nav-item"><a class="nav-link text-danger" href="<?php echo base_url(); ?>users/logout">Sign Out</a></li-->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Sign In</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="solutions-header" data-aos="fade-down">
      <h1>Protecting Your Privacy</h1>
      <p>Empowering you to fight identity theft, data abuse, and digital threats.</p>
  </div>

  <!-- Counters -->
  <div class="container text-center my-5">
    <div class="row g-4">
      <div class="col-md-3 counter-box" data-aos="fade-up"><h2 id="count1">0</h2><p>Data Removed</p></div>
      <div class="col-md-3 counter-box" data-aos="fade-up" data-aos-delay="100"><h2 id="count2">0</h2><p>Robocalls Blocked</p></div>
      <div class="col-md-3 counter-box" data-aos="fade-up" data-aos-delay="200"><h2 id="count3">0</h2><p>Cyber Threats Prevented</p></div>
      <div class="col-md-3 counter-box" data-aos="fade-up" data-aos-delay="300"><h2 id="count4">0</h2><p>Happy Clients</p></div>
    </div>
  </div>

  <!-- Value Proposition Section -->
<div class="container mb-5">
  <h3 class="section-heading"><i class="fas fa-shield-alt me-2"></i>Why Choose Us?</h3>
  <div class="row g-4">
    <div class="col-md-4" data-aos="fade-right">
      <div class="info-box h-100">
        <h5><i class="fas fa-user-lock me-2"></i>Top Security</h5>
        <p>We ensure your data is protected with industry-leading encryption protocols and security measures.</p>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="info-box h-100">
        <h5><i class="fas fa-bell me-2"></i>Real-Time Alerts</h5>
        <p>Get immediate notifications about potential privacy threats or breaches—stay ahead of the game.</p>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-left" data-aos-delay="200">
      <div class="info-box h-100">
        <h5><i class="fas fa-headset me-2"></i>24/7 Support</h5>
        <p>Our customer support is always available to assist you in keeping your privacy safe.</p>
      </div>
    </div>
  </div>
</div>

  <!-- How It Works -->
  <div class="container mb-5">
    <h3 class="section-heading"><i class="fas fa-cogs me-2"></i>How It Works</h3>
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="info-box h-100">
          <h5><i class="fas fa-user-shield me-2"></i>Step 1: Sign Up</h5>
          <p>Create an account to get started with our secure platform.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="info-box h-100">
          <h5><i class="fas fa-database me-2"></i>Step 2: Data Monitoring</h5>
          <p>We scan databases and alert you about threats or misuse.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="info-box h-100">
          <h5><i class="fas fa-lock me-2"></i>Step 3: Take Control</h5>
          <p>You choose what to remove, block, or protect—instantly.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Features -->
  <div class="container mb-5">
    <h3 class="section-heading"><i class="fas fa-star me-2"></i>Our Features</h3>
    <div class="row g-4">
      <div class="col-md-6" data-aos="fade-right">
        <div class="info-box h-100">
          <h6><i class="fas fa-bug me-2"></i>Real-Time Threat Alerts</h6>
          <p>Be the first to know when your privacy is at risk.</p>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-left">
        <div class="info-box h-100">
          <h6><i class="fas fa-phone-slash me-2"></i>Robocall & Spam Blocking</h6>
          <p>Block nuisance calls automatically with advanced filters.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Testimonials -->
  <div class="container">
    <h3 class="section-heading"><i class="fas fa-users me-2"></i>What Our Users Say</h3>
    <div class="row">
      <div class="col-md-6" data-aos="fade-up">
        <div class="testimonial shadow-sm">
          <div class="d-flex align-items-center mb-2">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="rounded-circle me-3" width="50">
            <div><h6 class="mb-0 fw-bold">Sarah K.</h6><small>Entrepreneur</small></div>
          </div>
          <p class="fst-italic">“I no longer worry about my data being sold. This service gave me peace of mind!”</p>
        </div>
      </div>
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
        <div class="testimonial shadow-sm">
          <div class="d-flex align-items-center mb-2">
            <img src="https://cdn-icons-png.flaticon.com/512/147/147144.png" class="rounded-circle me-3" width="50">
            <div><h6 class="mb-0 fw-bold">Daniel R.</h6><small>IT Manager</small></div>
          </div>
          <p class="fst-italic">“Our business saw a drop in cyber threats after joining. Highly recommended!”</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Latest Updates -->
  <div class="container">
    <h3 class="section-heading"><i class="fas fa-bullhorn me-2"></i>Latest Updates</h3>
    <div class="update-box" data-aos="fade-up">
      <p><strong>April 2025:</strong> Our new real-time dark web monitoring tool is live!</p>
      <p><strong>March 2025:</strong> We've added support for more languages and accessibility features.</p>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; <?php echo date('Y'); ?> Company Name. All rights reserved.
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();

    window.onload = function () {
      const { CountUp } = window.countUp;
      const options = { duration: 3 };
      [ ['count1', 12500], ['count2', 4200], ['count3', 7800], ['count4', 980] ].forEach(([id, val]) => {
        const counter = new CountUp(id, val, options);
        if (!counter.error) counter.start();
      });
    };
  </script>
</body>
</html>
