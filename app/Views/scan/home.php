<!DOCTYPE html>
<?= $this->include('includes/header') ?>
<style>
  .holographic-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;

}

.holographic-card {


  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  overflow: hidden;
  border-radius: 15px;
  transition: all 0.5s ease;
}

.holographic-card h2 {
  color: #0ff;
  font-size: 2rem;
  position: relative;
  z-index: 2;
}

.holographic-card::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(
    0deg, 
    transparent, 
    transparent 30%, 
    rgba(0,255,255,0.3)
  );
  transform: rotate(-45deg);
  transition: all 0.5s ease;
  opacity: 0;
}

.holographic-card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0,255,255,0.5);
}

.holographic-card:hover::before {
  opacity: 1;
  transform: rotate(-45deg) translateY(100%);
}
</style>
  <style>
    body {
      background-color: #f4f6f8;
      font-family: Arial, sans-serif;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .score-circle {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 10px solid #00c3a5;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.8rem;
      font-weight: bold;
      color: #333;
      margin: 0 auto;
    }
    .map-card {
      background: url('<?= base_url("web_assets/img/world_map.jpg") ?>') no-repeat center center;
      background-size: cover;
      height: 400px;
      border-radius: 15px;
    }
    .badge-safe { background-color: #28a745; }
    .badge-warning { background-color: #ffc107; color: #000; }
    .badge-exposed { background-color: #dc3545; }
    .btn-scan {
      background-color: #3b6ea5;
      color: #fff;
      border-radius: 8px;
      padding: 10px 20px;
    }
    .btn-scan:hover { background-color: #2f5c8d; }
	
	.status-dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 8px;
  }
  .dot-safe { background-color: #28a745; }
  .dot-warning { background-color: #ffc107; }
  .dot-exposed { background-color: #dc3545; }
  
  .score-wrapper {
  position: relative;
  width: 180px;
  height: 180px;
  margin: 0 auto;
}

.score-svg {
  transform: rotate(-90deg);
  width: 100%;
  height: 100%;
}

.score-bg {
  fill: none;
  stroke: #e9ecef;
  stroke-width: 15;
}

.score-progress {
  fill: none;
  stroke: url(#gradient);
  stroke-width: 15;
  stroke-linecap: round;
  stroke-dasharray: 565; /* circumference (2πr = 2*π*90 ≈ 565) */
  stroke-dashoffset: 565;
  animation: fillScore 2s ease forwards;
}

.score-value {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 2.2rem;
  font-weight: bold;
  color: #333;
}

.score-wrapper::before {
  content: "";
  position: absolute;
  top: -15px;
  left: -15px;
  right: -15px;
  bottom: -15px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0,195,165,0.15), transparent 70%);
  z-index: -1;
}

@keyframes fillScore {
  to {
    stroke-dashoffset: calc(565 - (565 * 85 / 100));
  }
}
</style>

<!-- Gradient Def -->
<svg width="0" height="0">
  <defs>
    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#00c3a5"/>
      <stop offset="100%" stop-color="#3b6ea5"/>
    </linearGradient>
  </defs>
</svg>
  
<body>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?= $this->include('includes/leftsidebar') ?>
    <div class="layout-page">
      <?= $this->include('includes/header_section') ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

          <!-- Header -->
          <div class="text-center mb-4">
            <h3 class="fw-bold">Your Security in One Glance</h3>
            <p class="text-muted">We've detected <b>25</b> exposures in your personal data</p>
            <a href="javascript:;" class="btn btn-scan">Start Scan</a>
          </div>

          <!-- Top Row -->
          <div class="row g-4 mb-4">
            <!-- Map -->
            <div class="col-lg-8">
              <div class="card map-card"></div>
            </div>
            <!-- Score + Breaches + Resolved -->
            <div class="col-lg-4">
              <!--<div class="card p-4 text-center mb-3">
                <div class="score-circle">85</div>
                <p class="mt-2 fw-semibold">Security Score</p>
              </div>-->
              <div class="card p-4 text-center mb-3">
                <div class="score-wrapper">
                  <svg class="score-svg" viewBox="0 0 200 200">
                    <circle class="score-bg" cx="100" cy="100" r="90"></circle>
                    <circle class="score-progress" cx="100" cy="100" r="90"></circle>
                  </svg>
                  <div class="score-value">85</div>
                </div>
                <p class="mt-3 fw-semibold">Security Score</p>
              </div>
              <div class="d-flex gap-3">
                <div class="card flex-fill p-3 text-center">
                  <h6 class="fw-semibold">Breaches</h6>
                  <h3>0</h3>
                </div>
                <div class="card flex-fill p-3 text-center">
                  <h6 class="fw-semibold">Resolved</h6>
                  <h3>8</h3>
                </div>
              </div>
            </div>
          </div>
          
                    <!-- Bottom Row -->
          <div class="row g-4">
            <!-- Exposure Sources Table -->
            <div class="col-lg-4">
              <div class="card p-3">
                <h6 class="fw-bold mb-3">Exposure Sources</h6>
               <table class="table mb-0">
  <tbody>
    <tr>
      <td><strong>Source</strong></td>
      <td><strong>Status</strong></td>
    </tr>
    <tr>
      <td><span class="status-dot dot-warning"></span>example.com</td>
      <td><span class="status-dot dot-warning"></span>warning</td>
    </tr>
    <tr>
      <td><span class="status-dot dot-safe"></span>another-site.com</td>
      <td><span class="status-dot dot-safe"></span>safe</td>
    </tr>
    <tr>
      <td><span class="status-dot dot-exposed"></span>data-secure.com</td>
      <td><span class="status-dot dot-exposed"></span>exposed</td>
    </tr>
  </tbody>
</table>
              </div>
            </div>
            <!-- Export Card -->
            <div class="col-lg-4">
              <div class="card p-3 text-center">
                <div class="my-2">
                  <img src="<?= base_url('web_assets/img/chart-placeholder.jpg') ?>" alt="chart" class="img-fluid">
                </div>
                <a href="javascript:;" class="btn btn-primary">Export</a>
              </div>
            </div>
            <!-- Exposure Sources Summary -->
            <div class="col-lg-4">
              <div class="card p-3">
                <h6 class="fw-bold mb-3">Exposure Sources</h6>
               <table class="table mb-0">
  <tbody>
    <tr>
      <td><strong>Source</strong></td>
      <td><strong>Status</strong></td>
    </tr>
    <tr>
      <td><span class="status-dot dot-warning"></span>example.com</td>
      <td><span class="status-dot dot-warning"></span>warning</td>
    </tr>
    <tr>
      <td><span class="status-dot dot-safe"></span>data-secure.com</td>
      <td><span class="status-dot dot-safe"></span>safe</td>
    </tr>
  </tbody>
</table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
  
   <?= $this->include('includes/plans') ?>
<?= $this->include('includes/footer_section') ?>




   <script>
    checkplan();
   </script>
<?= $this->include('includes/footer') ?>
</body>
</html> 