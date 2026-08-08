<?php require 'views/partials/clients/header.php'; ?>
    <style>
        :root {
            --primary: #2563EB;
            --secondary: #111827;
            --accent: #F59E0B;
            --bg-white: #ffffff;
            --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
            --shadow-md: 0 12px 32px rgba(0,0,0,0.08);
        }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: #f1f5f9; color: #1f2937; min-height: 100vh; display: flex; flex-direction: column; }
        .btn-primary { background: var(--primary); border: none; }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
        .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
        .btn-outline-primary:hover { background: var(--primary); color: #fff; }
        .btn-danger { background: #dc2626; border: none; }
        .btn-danger:hover { background: #b91c1c; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(220,38,38,0.3); }
        .btn-outline-secondary { border-color: #6b7280; color: #6b7280; }
        .btn-outline-secondary:hover { background: #6b7280; color: white; }
        .text-primary { color: var(--primary) !important; }
        .bg-primary { background: var(--primary) !important; }
        
        /* Navbar */
        .navbar { box-shadow: 0 2px 20px rgba(0,0,0,0.03); background: rgba(255,255,255,0.85) !important; backdrop-filter: blur(8px); }
        .nav-link { font-weight: 500; color: #1f2937 !important; margin: 0 6px; }
        .nav-link:hover { color: var(--primary) !important; }
        
        /* Main Content */
        .logout-wrapper { min-height: calc(100vh - 200px); display: flex; align-items: center; justify-content: center; padding: 60px 20px; }
        .logout-card { background: white; border-radius: 32px; padding: 48px; box-shadow: var(--shadow-md); max-width: 500px; margin: 0 auto; text-align: center; }
        .logout-card .icon-circle { width: 90px; height: 90px; border-radius: 50%; background: #fef3c7; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; }
        .logout-card .icon-circle i { font-size: 3rem; color: #f59e0b; }
        .logout-card .avatar { width: 72px; height: 72px; border-radius: 50%; object-fit: cover; border: 3px solid white; box-shadow: var(--shadow-sm); }
        .logout-card .options { border-top: 1px solid #f3f4f6; padding-top: 20px; margin-top: 20px; }
        .logout-card .option-item { padding: 12px 16px; border-radius: 16px; transition: 0.3s; cursor: pointer; }
        .logout-card .option-item:hover { background: #f8fafc; }
        .logout-card .option-item i { width: 28px; color: var(--primary); }

        .session-card { background: white; border-radius: 20px; padding: 16px 20px; box-shadow: var(--shadow-sm); border-left: 4px solid var(--primary); }
        .session-card .device { font-weight: 600; }
        .session-card .time { font-size: 0.8rem; color: #9ca3af; }
        .session-card .active-badge { background: #d1fae5; color: #065f46; padding: 2px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 600; }

        footer { background: var(--secondary); color: #e5e7eb; margin-top: auto; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }

        @media (max-width: 768px) {
            .logout-card { padding: 32px 24px; }
            .logout-card .icon-circle { width: 70px; height: 70px; }
            .logout-card .icon-circle i { font-size: 2.2rem; }
        }
    </style>
</head>
<body>
    <!-- NAVIGATION -->

    <!-- LOGOUT SECTION -->
    <div class="logout-wrapper">
        <div class="container">
            <div class="logout-card" data-aos="fade-up" data-aos-duration="800">
                <!-- Icon -->
                <div class="icon-circle" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-sign-out-alt"></i>
                </div>

                <!-- User Info -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <img src="https://via.placeholder.com/72" class="avatar" alt="User Avatar" />
                    <h5 class="fw-bold mt-3">John Doe</h5>
                    <p class="text-muted small">john.doe@donutstec.com</p>
                    <span class="badge bg-primary rounded-pill px-3 py-1">Client</span>
                </div>

                <!-- Logout Message -->
                <div class="mt-3" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-muted">Are you sure you want to logout?</p>
                    <p class="small text-muted">You'll need to login again to access your dashboard.</p>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 mt-4" data-aos="fade-up" data-aos-delay="500">
                    <button class="btn btn-danger rounded-pill px-5 py-2 flex-grow-1" id="confirmLogout">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2" id="cancelLogout">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                </div>

                <!-- Options -->
                <div class="options" data-aos="fade-up" data-aos-delay="600">
                    <div class="option-item" id="switchAccount">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="fw-semibold">Switch Account</span>
                        <small class="text-muted d-block">Login with a different user</small>
                    </div>
                    <div class="option-item" id="sessionManagement">
                        <i class="fas fa-laptop"></i>
                        <span class="fw-semibold">Manage Sessions</span>
                        <small class="text-muted d-block">View and manage active sessions</small>
                    </div>
                </div>
            </div>

            <!-- Active Sessions (hidden initially) -->
            <div id="sessionsPanel" class="mt-4" style="display:none;">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="bg-white p-4 rounded-4 shadow-sm" data-aos="fade-up">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold"><i class="fas fa-laptop me-2 text-primary"></i>Active Sessions</h6>
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3" id="terminateAll">Terminate All</button>
                            </div>
                            <div class="session-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="device"><i class="fas fa-desktop me-2"></i>Chrome on Windows</div>
                                        <div class="time">Berlin, Germany · Active now</div>
                                    </div>
                                    <span class="active-badge">Current</span>
                                </div>
                            </div>
                            <div class="session-card mt-2" style="border-left-color:#9ca3af;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="device"><i class="fas fa-mobile-alt me-2"></i>Safari on iPhone</div>
                                        <div class="time">Berlin, Germany · 2 hours ago</div>
                                    </div>
                                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 terminate-session">Terminate</button>
                                </div>
                            </div>
                            <div class="session-card mt-2" style="border-left-color:#9ca3af;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="device"><i class="fas fa-tablet-alt me-2"></i>Firefox on iPad</div>
                                        <div class="time">London, UK · 1 day ago</div>
                                    </div>
                                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 terminate-session">Terminate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUCCESS MODAL (shown after logout) -->
    <div class="modal fade" id="logoutSuccessModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-body text-center p-5">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Logout Successful!</h4>
                    <p class="text-muted">You have been securely logged out.</p>
                    <p class="text-muted small">You will be redirected to the homepage in <span id="countdown">5</span> seconds.</p>
                    <a href="#" class="btn btn-primary rounded-pill px-4">Go to Homepage</a>
                </div>
            </div>
        </div>
    </div>

    <!-- SWITCH ACCOUNT MODAL -->
    <div class="modal fade" id="switchAccountModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-body p-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-exchange-alt text-primary me-2"></i>Switch Account</h5>
                    <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg" style="cursor:pointer; transition:0.3s;" id="switchAccount1">
                        <img src="https://via.placeholder.com/44" class="rounded-circle" />
                        <div>
                            <span class="fw-semibold">Sarah Smith</span>
                            <p class="text-muted small mb-0">sarah@healthplus.com · Admin</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg mt-2" style="cursor:pointer; transition:0.3s;" id="switchAccount2">
                        <img src="https://via.placeholder.com/44" class="rounded-circle" />
                        <div>
                            <span class="fw-semibold">Mike Johnson</span>
                            <p class="text-muted small mb-0">mike@edutech.com · Client</p>
                        </div>
                    </div>
                    <hr />
                    <button class="btn btn-outline-primary w-100 rounded-pill py-2"><i class="fas fa-plus me-2"></i>Login with another account</button>
                    <button class="btn btn-outline-secondary w-100 rounded-pill py-2 mt-2" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="py-4">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6"><p class="mb-0 small">© 2026 DonutsTec GmbH. All rights reserved.</p></div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="small me-3">Privacy Policy</a>
                    <a href="#" class="small me-3">Terms of Service</a>
                    <a href="#" class="small">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 700 });

        // Confirm Logout
        document.getElementById('confirmLogout').addEventListener('click', function() {
            if (confirm('Are you sure you want to logout?')) {
                // Show success modal
                const modal = new bootstrap.Modal(document.getElementById('logoutSuccessModal'));
                modal.show();
                
                // Countdown
                let seconds = 5;
                const countdownEl = document.getElementById('countdown');
                const interval = setInterval(() => {
                    seconds--;
                    if (countdownEl) countdownEl.textContent = seconds;
                    if (seconds <= 0) {
                        clearInterval(interval);
                        window.location.href = '#home';
                        modal.hide();
                    }
                }, 1000);
            }
        });

        // Cancel Logout
        document.getElementById('cancelLogout').addEventListener('click', function(e) {
            e.preventDefault();
            alert('You have cancelled the logout process.');
        });

        // Switch Account
        document.getElementById('switchAccount').addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('switchAccountModal'));
            modal.show();
        });

        // Session Management Toggle
        document.getElementById('sessionManagement').addEventListener('click', function() {
            const panel = document.getElementById('sessionsPanel');
            if (panel.style.display === 'none') {
                panel.style.display = 'block';
                panel.scrollIntoView({ behavior: 'smooth', block: 'center' });
                this.querySelector('.fw-semibold').textContent = 'Hide Sessions';
            } else {
                panel.style.display = 'none';
                this.querySelector('.fw-semibold').textContent = 'Manage Sessions';
            }
        });

        // Terminate individual session
        document.querySelectorAll('.terminate-session').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (confirm('Terminate this session?')) {
                    const card = this.closest('.session-card');
                    if (card) {
                        card.style.opacity = '0.5';
                        this.textContent = 'Terminated';
                        this.className = 'btn btn-sm btn-secondary rounded-pill px-2';
                        this.disabled = true;
                    }
                }
            });
        });

        // Terminate all sessions
        document.getElementById('terminateAll').addEventListener('click', function() {
            if (confirm('Terminate all sessions except this one?')) {
                document.querySelectorAll('.session-card .btn-outline-secondary').forEach(btn => {
                    const card = btn.closest('.session-card');
                    if (card && !card.querySelector('.active-badge')) {
                        btn.textContent = 'Terminated';
                        btn.className = 'btn btn-sm btn-secondary rounded-pill px-2';
                        btn.disabled = true;
                        card.style.opacity = '0.5';
                    }
                });
                alert('All other sessions have been terminated.');
            }
        });

        // Switch account modal - click on account
        document.getElementById('switchAccount1').addEventListener('click', function() {
            alert('Switching to Sarah Smith...');
            const modal = bootstrap.Modal.getInstance(document.getElementById('switchAccountModal'));
            modal.hide();
        });

        document.getElementById('switchAccount2').addEventListener('click', function() {
            alert('Switching to Mike Johnson...');
            const modal = bootstrap.Modal.getInstance(document.getElementById('switchAccountModal'));
            modal.hide();
        });

        // Go to homepage after logout
        document.querySelector('#logoutSuccessModal .btn-primary')?.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '#home';
        });

        // Login with another account
        document.querySelector('#switchAccountModal .btn-outline-primary')?.addEventListener('click', function() {
            alert('Redirecting to login page...');
        });
    </script>
</body>
</html>