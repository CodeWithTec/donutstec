<?php 
session_start();

require "views/partials/header.php"; ?>
  <style>
    :root {
      --primary: #2563EB;
      --secondary: #111827;
      --accent: #F59E0B;
      --bg-white: #ffffff;
      --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
      --shadow-md: 0 12px 32px rgba(0,0,0,0.08);
    }
    body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: #f8fafc; color: #1f2937; min-height: 100vh; display: flex; flex-direction: column; }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .auth-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .auth-card { background: white; border-radius: 28px; padding: 40px; box-shadow: var(--shadow-md); max-width: 480px; margin: 0 auto; }
    .auth-card .form-control, .auth-card .form-select { border-radius: 12px; padding: 12px 16px; border: 1px solid #e5e7eb; }
    .auth-card .form-control:focus, .auth-card .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
    .auth-card .input-group-text { background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 12px 0 0 12px; }
    .auth-card .input-group .form-control { border-radius: 0 12px 12px 0; }
    .role-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.7rem; font-weight: 600; display: inline-block; }
    .role-superadmin { background: #fef3c7; color: #92400e; }
    .role-admin { background: #dbeafe; color: #1e40af; }
    .role-agent { background: #d1fae5; color: #065f46; }
    .role-developer { background: #e0e7ff; color: #3730a3; }
    .role-client { background: #fce4ec; color: #9a3412; }
    .otp-input { width: 48px; height: 56px; text-align: center; font-size: 1.5rem; border-radius: 12px; border: 2px solid #e5e7eb; margin: 0 4px; }
    .otp-input:focus { border-color: var(--primary); outline: none; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
    footer { background: var(--secondary); color: #e5e7eb; margin-top: auto; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .auth-hero h1 { font-size: 2rem; }
      .auth-card { padding: 24px; margin: 0 16px; }
      .otp-input { width: 40px; height: 48px; font-size: 1.2rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require 'views/partials/navbar.php'; ?>

  <!-- AUTH HERO -->
  <section class="auth-hero">
    <div class="container pt-5">
      <div class="text-center mb-4" data-aos="fade-up">
        <h1 class="display-4 fw-bold">Client <span class="text-primary">Portal</span></h1>
        <p class="lead text-muted">Secure access to your account, support tickets, and project updates</p>
      </div>

      <!-- Auth Card -->
      <div class="auth-card" data-aos="fade-up" data-aos-delay="100">
        <!-- Tabs -->
         <h4 class="text-primary text-center">Login</h4> 
        <ul class="nav nav-tabs nav-justified border-0 mb-4" role="tablist">
          <!-- <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#loginTab">Login</a></li> -->
          <!-- <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#registerTab">Register</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#resetTab">Reset</a></li> -->
        </ul>

        <div class="tab-content">
          <!-- LOGIN TAB -->
          <div class="tab-pane fade show active" id="loginTab">
            <form method="POST">
              <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="client@example.com" />
                <?php if (isset($errors['email'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['email']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" />
                  <button class="btn btn-outline-secondary" type="button" onclick="showPassword()">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
                <?php if (isset($errors['password'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['password']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <a href="/reset-password" class="text-primary">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Login</button>
              <div class="mt-3 text-center">
                <!-- <small class="text-muted">After login, you'll receive a 6-digit OTP for verification</small> -->
              </div>
            </form>
          </div>
      </div>

    
    </div>
  </section>

  <!-- SUCCESS/ERROR MODALS (via SweetAlert2) -->

  <!-- FOOTER -->
  <?php require 'views/partials/footer.php'; ?>

  <!-- Bootstrap + AOS + SweetAlert2 -->
 <?php require 'views/partials/scripts.php';?>
  <script>
    AOS.init({ once: true, duration: 700 });


    function showPassword() {

    let password = document.getElementById("password");

    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }

}
  </script>
</body>
</html>