<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

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

    .solution-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(5px);
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      color: #333;
    }

    .solution-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .solution-card i {
      font-size: 60px;
      color: #007bff;
      margin-bottom: 20px;
      transition: color 0.3s ease-in-out;
    }

    .solution-card:hover i {
      color: #0056b3;
    }

    .solution-title {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 15px;
      color: #333;
    }

    .solution-desc {
      font-size: 16px;
      line-height: 1.6;
      color: #555;
    }

    .solution-card a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 25px;
      font-size: 16px;
      background-color: #007bff;
      color: #fff;
      border-radius: 25px;
      text-decoration: none;
      transition: background-color 0.3s ease-in-out;
    }

    .solution-card a:hover {
      background-color: #0056b3;
    }

    footer {
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 20px 0;
      text-align: center;
      margin-top: 30px;
    }

    .container.py-5 {
      padding-bottom: 0 !important;
    }

    .social-icons i {
      font-size: 40px;
      margin: 0 15px;
      color: white;
      transition: color 0.3s ease-in-out;
    }

    .social-icons i:hover {
      color: #007bff;
    }
  </style>
</head>

<body>

  <div class="bg-overlay"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Welcome <?php echo $this->session->userdata('name'); ?>!!</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/index">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/why_privacy">Why Privacy?</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/our_solutions">Our Solutions</a></li>
          <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>dashboard/contact">Contact</a></li>
          <!--li class="nav-item"><a class="nav-link text-danger" href="<?php echo base_url(); ?>users/logout">Sign Out</a></li-->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Sign In</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header with AOS effect -->
  <div class="solutions-header" data-aos="fade-down">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you. Reach out to us via any of the channels below, and we’ll get back to you promptly.</p>
  </div>

  <!-- Contact Info Cards -->
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="solution-card">
          <i class="fas fa-phone-alt"></i>
          <div class="solution-title">Phone</div>
          <p class="solution-desc">Call us directly for support or inquiries:<br><strong>+1 234 567 8900</strong></p>
          <a href="tel:+12345678900">Call Now</a>
        </div>
      </div>

      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="solution-card">
          <i class="fas fa-envelope"></i>
          <div class="solution-title">Email</div>
          <p class="solution-desc">Reach out via email and we’ll respond within 24 hours:<br><strong>support@company.com</strong></p>
          <a href="mailto:support@company.com">Send Email</a>
        </div>
      </div>

      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="solution-card">
          <i class="fas fa-map-marker-alt"></i>
          <div class="solution-title">Address</div>
          <p class="solution-desc">Visit our office at:<br><strong>123 Privacy St, Secure City, SC 12345</strong></p>
          <a href="https://www.google.com/maps?q=123+Privacy+St,+Secure+City,+SC+12345" target="_blank">View on Google Maps</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Social Media Icons -->
  <div class="container text-center py-4">
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; <?php echo date('Y'); ?> Company Name. All rights reserved.
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

</body>
</html>
