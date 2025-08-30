<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Privacy?</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

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
            padding: 40px 25px;
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

        .list-unstyled li {
            margin: 10px 0;
            font-size: 18px;
            color: #ddd;
            transition: transform 0.2s;
        }

        .list-unstyled li:hover {
            transform: scale(1.03);
            color: #fff;
        }

        h3 {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        ul.list-unstyled li {
            font-size: 1.2rem;
            font-weight: 500;
            color: white;
            margin: 15px 0;
            transition: transform 0.2s;
        }

        ul.list-unstyled li i {
            margin-right: 10px;
            color: #007bff;
        }

        ul.list-unstyled li:hover {
            transform: scale(1.05);
            color: #fff;
        }


        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 30px;
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
                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>dashboard/why_privacy">Why Privacy?</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/our_solutions">Our Solutions</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/contact">Contact</a></li>
                    <!--li class="nav-item"><a class="nav-link text-danger" href="<?php echo base_url(); ?>users/logout">Sign Out</a></li-->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="solutions-header" data-aos="fade-down">
        <h1>Why Privacy Matters</h1>
        <p>Privacy is essential for protecting your personal information, security, and identity online. Here's why it should matter to you.</p>
    </div>

    <!-- Privacy Cards -->
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="solution-card">
                    <i class="fas fa-shield-alt"></i>
                    <div class="solution-title">Protect Personal Data</div>
                    <p class="solution-desc">Your personal information should remain in your control, and not be exposed to unnecessary risks or shared without your consent.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="solution-card">
                    <i class="fas fa-user-secret"></i>
                    <div class="solution-title">Avoid Identity Theft</div>
                    <p class="solution-desc">Protecting your privacy means safeguarding your identity from criminals who may attempt to steal it for malicious purposes.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="solution-card">
                    <i class="fas fa-lock"></i>
                    <div class="solution-title">Ensure Security</div>
                    <p class="solution-desc">Privacy is a fundamental pillar of online security. Without it, your personal data is vulnerable to hackers, fraudsters, and cybercriminals.</p>
                </div>
            </div>
        </div>

        <div class="row mt-5" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <h3>The Growing Threats</h3>
                 <p><strong>With an increase in digital communication, the threats to your privacy are rising rapidly. We are here to help you reduce the risk of:</strong></p>
                   <ul class="list-unstyled">
                        <li><i class="fas fa-exclamation-circle"></i><strong> Identity Theft</strong></li>
                        <li><i class="fas fa-credit-card"></i><strong> Credit Card Fraud</strong></li>
                        <li><i class="fas fa-phone-alt"></i><strong> Robocalls and Spam</strong></li>
                        <li><i class="fas fa-bug"></i><strong> Cybersecurity Threats</strong></li>
                        <li><i class="fas fa-user-secret"></i><strong> Stalking and Harassment</strong></li>
                 </ul>
            </div>
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
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>
