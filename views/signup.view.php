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
    .auth-card { background: white; border-radius: 28px; padding: 40px; box-shadow: var(--shadow-md); max-width: 800px; margin: 0 auto; }
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
       <h4 class="text-primary text-center"><span class="text-dark">Create</span> Account</h4>
       <p class="text-center"><small>Make sure all the below information are provided correctly.</small></p>

        <div class="tab-content">

          <!-- REGISTER TAB -->
          <div class="">
            <form method="POST">
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                <label class="form-label fw-semibold">First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="Your first name"/>
                <?php if (isset($errors['first_name'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['first_name']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Your last name"/>
                <?php if (isset($errors['last_name'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['last_name']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="youremail@domain.com" />
                <?php if (isset($errors['email'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['email']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Company/Business</label>
                <input type="text" name="company" class="form-control" placeholder="name company" />
                <?php if (isset($errors['company'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['company']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Company Address</label>
                <input type="text" name="company_address" class="form-control" placeholder="Company address" />
                <?php if (isset($errors['company_address'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['company_address']) ?>
                      </div>
                  <?php endif; ?>
              </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                <label class="form-label fw-semibold">Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="+231 0000 00" />
                <?php if (isset($errors['phone'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['phone']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Min 8 characters" />
                  <button class="btn btn-outline-secondary" type="button" onclick="showPassword()">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
                <?php if (isset($errors['password'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['password']) ?>
                      </div>
                  <?php endif; ?>
                <small class="text-muted">Password must be at least 8 characters with uppercase, lowercase, and number</small>
              </div>
              <div class="mb-3">
                <label class="form-label  fw-semibold">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" />
                <?php if (isset($errors['confirm_password'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['confirm_password']) ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-labe fw-semibold">Gender</label>
                <select class="form-select" name="gender">
                  <option value="#" selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <?php if (isset($errors['gender'])): ?>
                      <div class="text-danger mt-1">
                        <?= htmlspecialchars($errors['gender']) ?>
                      </div>
                  <?php endif; ?>
                <!-- <small class="text-muted">Select the role that best describes your account type</small> -->
              </div>
                </div>
              </div>
              
              
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsCheck"/>
                <label class="form-check-label" for="termsCheck">I agree to the <a href="/terms-of-service" class="text-primary">Terms of Service</a> and <a href="/privacy-policy" class="text-primary">Privacy Policy</a></label>
              </div>
              <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Create Account</button>
              <div class="mt-3 text-center">
                <small class="text-muted">A 6-digit OTP will be sent to your email for verification</small>
              </div>
            </form>
          </div>



        <!-- OTP Verification (shown after login/register) -->
        
      </div>

      <!-- Role Information -->
      
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