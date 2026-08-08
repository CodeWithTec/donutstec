<?php require "views/partials/header.php"; ?>
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
        <ul class="nav nav-tabs nav-justified border-0 mb-4" role="tablist">
          <li class="nav-item"><a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#loginTab">Login</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#registerTab">Register</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#resetTab">Reset</a></li>
        </ul>

        <div class="tab-content">
          <!-- LOGIN TAB -->
          <div class="tab-pane fade show active" id="loginTab">
            <form id="loginForm">
              <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control" placeholder="client@example.com" required />
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required />
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('loginPassword')">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <a href="#" class="text-primary" data-bs-toggle="tab" data-bs-target="#resetTab">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Login</button>
              <div class="mt-3 text-center">
                <small class="text-muted">After login, you'll receive a 6-digit OTP for verification</small>
              </div>
            </form>
          </div>

          <!-- REGISTER TAB -->
          <div class="tab-pane fade" id="registerTab">
            <form id="registerForm">
              <div class="mb-3">
                <label class="form-label fw-semibold">Full Name</label>
                <input type="text" class="form-control" placeholder="John Doe" required />
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control" placeholder="john@example.com" required />
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="registerPassword" placeholder="Min 8 characters" required />
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('registerPassword')">
                    <i class="fas fa-eye"></i>
                  </button>
                </div>
                <small class="text-muted">Password must be at least 8 characters with uppercase, lowercase, and number</small>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm your password" required />
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Role</label>
                <select class="form-select">
                  <option value="client" selected>Client</option>
                  <option value="developer">Developer</option>
                  <option value="agent">Support Agent</option>
                  <option value="admin">Admin</option>
                </select>
                <small class="text-muted">Select the role that best describes your account type</small>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsCheck" required />
                <label class="form-check-label" for="termsCheck">I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a></label>
              </div>
              <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Create Account</button>
              <div class="mt-3 text-center">
                <small class="text-muted">A 6-digit OTP will be sent to your email for verification</small>
              </div>
            </form>
          </div>

          <!-- RESET PASSWORD TAB -->
          <div class="tab-pane fade" id="resetTab">
            <form id="resetForm">
              <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control" placeholder="client@example.com" required />
              </div>
              <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Send Reset Link</button>
              <div class="mt-3 text-center">
                <small class="text-muted">We'll send you a link to reset your password</small>
              </div>
            </form>
          </div>
        </div>

        <!-- OTP Verification (shown after login/register) -->
        <div id="otpSection" class="mt-4" style="display:none;">
          <hr />
          <h6 class="text-center fw-bold">Email Verification</h6>
          <p class="text-center text-muted small">Enter the 6-digit OTP sent to your email</p>
          <div class="d-flex justify-content-center gap-2">
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
            <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" />
          </div>
          <div class="text-center mt-3">
            <button class="btn btn-primary btn-sm rounded-pill px-4">Verify OTP</button>
            <button class="btn btn-link text-primary btn-sm">Resend OTP</button>
          </div>
        </div>
      </div>

      <!-- Role Information -->
      <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="200">
        <p class="text-muted mb-2">Available Roles:</p>
        <div class="d-flex flex-wrap justify-content-center gap-2">
          <span class="role-badge role-superadmin">Super Admin</span>
          <span class="role-badge role-admin">Admin</span>
          <span class="role-badge role-agent">Support Agent</span>
          <span class="role-badge role-developer">Developer</span>
          <span class="role-badge role-client">Client</span>
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

    // Toggle password visibility
    function togglePassword(fieldId) {
      const field = document.getElementById(fieldId);
      const icon = field.parentElement.querySelector('.btn-outline-secondary i');
      if (field.type === 'password') {
        field.type = 'text';
        icon.className = 'fas fa-eye-slash';
      } else {
        field.type = 'password';
        icon.className = 'fas fa-eye';
      }
    }

    // OTP input auto-advance
    document.querySelectorAll('.otp-input').forEach((input, index, arr) => {
      input.addEventListener('input', function(e) {
        if (this.value.length === 1 && index < arr.length - 1) {
          arr[index + 1].focus();
        }
      });
      input.addEventListener('keydown', function(e) {
        if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
          arr[index - 1].focus();
        }
      });
    });

    // Login form submission
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Show OTP section
      document.getElementById('otpSection').style.display = 'block';
      
      Swal.fire({
        icon: 'info',
        title: 'OTP Sent',
        text: 'A 6-digit verification code has been sent to your email.',
        timer: 3000,
        showConfirmButton: false
      });
      
      // Scroll to OTP
      document.getElementById('otpSection').scrollIntoView({ behavior: 'smooth', block: 'center' });
    });

    // Register form submission
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Show OTP section
      document.getElementById('otpSection').style.display = 'block';
      
      Swal.fire({
        icon: 'success',
        title: 'Registration Successful!',
        text: 'Please verify your email with the OTP sent to your inbox.',
        timer: 3000,
        showConfirmButton: false
      });
      
      // Scroll to OTP
      document.getElementById('otpSection').scrollIntoView({ behavior: 'smooth', block: 'center' });
      
      // Switch to login tab after registration
      setTimeout(() => {
        document.querySelector('[data-bs-target="#loginTab"]').click();
      }, 1000);
    });

    // Reset form submission
    document.getElementById('resetForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      Swal.fire({
        icon: 'success',
        title: 'Reset Link Sent',
        text: 'Check your email for a password reset link.',
        confirmButtonColor: '#2563EB'
      });
    });

    // OTP Verification
    document.querySelector('#otpSection .btn-primary').addEventListener('click', function() {
      const inputs = document.querySelectorAll('.otp-input');
      let otp = '';
      inputs.forEach(input => otp += input.value);
      
      if (otp.length === 6) {
        Swal.fire({
          icon: 'success',
          title: 'Verification Successful!',
          text: 'Your email has been verified. You are now logged in.',
          confirmButtonColor: '#2563EB',
          confirmButtonText: 'Go to Dashboard'
        }).then(() => {
          window.location.href = '#dashboard';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Invalid OTP',
          text: 'Please enter a valid 6-digit verification code.',
          confirmButtonColor: '#2563EB'
        });
      }
    });

    // Resend OTP
    document.querySelector('#otpSection .btn-link').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        icon: 'info',
        title: 'OTP Resent',
        text: 'A new verification code has been sent to your email.',
        timer: 2000,
        showConfirmButton: false
      });
    });

    // Forgot password link in login tab
    document.querySelector('a[data-bs-target="#resetTab"]')?.addEventListener('click', function(e) {
      e.preventDefault();
      // Switch to reset tab via Bootstrap tab API
      const resetTab = document.querySelector('[data-bs-target="#resetTab"]');
      if (resetTab) resetTab.click();
    });

    // Demo: "Remember Me" checkbox
    document.getElementById('rememberMe')?.addEventListener('change', function() {
      if (this.checked) {
        Swal.fire({
          icon: 'info',
          title: 'Remember Me',
          text: 'You will stay logged in for 30 days.',
          timer: 2000,
          showConfirmButton: false
        });
      }
    });

    // Dummy interactions for nav
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
    document.querySelectorAll('a[href="#contact"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Contact page demo') }));
  </script>
</body>
</html>