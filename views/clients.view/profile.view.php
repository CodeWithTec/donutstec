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
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: #f1f5f9; color: #1f2937; }
        .btn-primary { background: var(--primary); border: none; }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
        .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
        .btn-outline-primary:hover { background: var(--primary); color: #fff; }
        .btn-success { background: #22c55e; border: none; }
        .btn-success:hover { background: #16a34a; }
        .text-primary { color: var(--primary) !important; }
        .bg-primary { background: var(--primary) !important; }
        
        /* Sidebar */
        .sidebar { background: var(--secondary); min-height: 100vh; padding: 20px 0; position: sticky; top: 0; }
        .sidebar .brand { color: white; font-size: 1.5rem; font-weight: 700; padding: 0 20px 30px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar .brand span { color: var(--primary); }
        .sidebar .nav-link { color: rgba(255,255,255,0.6); padding: 12px 20px; border-radius: 12px; margin: 2px 10px; transition: 0.3s; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.05); color: white; }
        .sidebar .nav-link.active { background: var(--primary); color: white; }
        .sidebar .nav-link i { width: 24px; }
        .sidebar .nav-link .badge { float: right; }
        .sidebar .user-card { padding: 16px 20px; border-bottom: 1px solid rgba(255,255,255,0.05); margin-bottom: 16px; }
        .sidebar .user-card img { width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.1); }
        .sidebar .user-card .name { color: white; font-weight: 600; font-size: 0.95rem; }
        .sidebar .user-card .role { color: rgba(255,255,255,0.5); font-size: 0.8rem; }

        /* Topbar */
        .topbar { background: white; padding: 16px 24px; box-shadow: var(--shadow-sm); position: sticky; top: 0; z-index: 99; }

        /* Cards */
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }
        .profile-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .profile-card .avatar { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid white; box-shadow: var(--shadow-sm); }
        .profile-card .avatar-upload { position: relative; cursor: pointer; }
        .profile-card .avatar-upload .overlay { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); background: rgba(0,0,0,0.6); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; white-space: nowrap; }
        .profile-card .avatar-upload:hover .overlay { background: rgba(0,0,0,0.8); }
        .profile-card .form-control, .profile-card .form-select { border-radius: 12px; padding: 12px 16px; border: 1px solid #e5e7eb; }
        .profile-card .form-control:focus, .profile-card .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .profile-card .form-label { font-weight: 600; }

        .settings-nav .nav-link { padding: 10px 16px; border-radius: 12px; color: #4b5563; font-weight: 500; }
        .settings-nav .nav-link:hover { background: #eef2ff; color: var(--primary); }
        .settings-nav .nav-link.active { background: var(--primary); color: white; }
        .settings-nav .nav-link i { width: 24px; }

        .toggle-switch { width: 48px; height: 26px; background: #d1d5db; border-radius: 13px; position: relative; cursor: pointer; transition: 0.3s; flex-shrink: 0; }
        .toggle-switch.active { background: var(--primary); }
        .toggle-switch .toggle-dot { width: 20px; height: 20px; background: white; border-radius: 50%; position: absolute; top: 3px; left: 3px; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .toggle-switch.active .toggle-dot { left: 25px; }

        .activity-item { border-bottom: 1px solid #f3f4f6; padding: 10px 0; }
        .activity-item:last-child { border-bottom: 0; }
        .activity-item .icon-circle { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .activity-item .icon-circle.blue { background: #dbeafe; color: var(--primary); }
        .activity-item .icon-circle.green { background: #d1fae5; color: #065f46; }
        .activity-item .icon-circle.yellow { background: #fef3c7; color: #b45309; }
        .activity-item .icon-circle.purple { background: #e0e7ff; color: #3730a3; }

        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }

        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.85rem; margin: 2px 5px; }
            .sidebar .user-card { text-align: center; }
            .topbar { padding: 12px 16px; }
            .profile-card { padding: 20px; }
            .profile-card .avatar { width: 80px; height: 80px; }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
           <?php require 'views/partials/clients/sidebar.php' ?>

            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-9 px-0">
                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">Profile Settings</h5>
                        <small class="text-muted">Manage your account settings and preferences</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <img src="https://via.placeholder.com/36" class="rounded-circle d-md-none" alt="User" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <div class="row g-4">
                        <!-- Settings Navigation -->
                        <div class="col-md-3" data-aos="fade-right">
                            <div class="dashboard-card">
                                <nav class="settings-nav nav flex-column">
                                    <a href="#personal" class="nav-link active" data-bs-toggle="tab">
                                        <i class="fas fa-user"></i>Personal Info
                                    </a>
                                    <a href="#security" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-shield-alt"></i>Security
                                    </a>
                                    <a href="#preferences" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-sliders-h"></i>Preferences
                                    </a>
                                    <a href="#activity" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-history"></i>Activity
                                    </a>
                                </nav>
                            </div>
                        </div>

                        <!-- Settings Tabs -->
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!-- PERSONAL INFO -->
                                <div class="tab-pane fade show active" id="personal">
                                    <div class="profile-card" data-aos="fade-up">
                                        <div class="text-center mb-4">
                                            <div class="avatar-upload d-inline-block">
                                                <img src="https://via.placeholder.com/120" class="avatar" alt="Profile" />
                                                <div class="overlay"><i class="fas fa-camera me-1"></i>Change</div>
                                            </div>
                                            <h5 class="mt-3 fw-bold">John Doe</h5>
                                            <p class="text-muted">john.doe@example.com</p>
                                            <span class="badge bg-success rounded-pill px-3 py-1">Active</span>
                                        </div>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" value="John Doe" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" value="john.doe@example.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" value="+49 30 1234567" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Company</label>
                                                    <input type="text" class="form-control" value="TechCorp GmbH" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Position</label>
                                                    <input type="text" class="form-control" value="CTO" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Industry</label>
                                                    <select class="form-select">
                                                        <option>Technology</option>
                                                        <option selected>Healthcare</option>
                                                        <option>Finance</option>
                                                        <option>Education</option>
                                                        <option>Retail</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Bio</label>
                                                    <textarea class="form-control" rows="3">Technology executive with 15+ years of experience in software development and digital transformation.</textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Update Profile</button>
                                                    <button class="btn btn-outline-secondary rounded-pill px-4">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- SECURITY -->
                                <div class="tab-pane fade" id="security">
                                    <div class="profile-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-shield-alt me-2 text-primary"></i>Security Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Current Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" placeholder="Enter current password" />
                                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">New Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" placeholder="Enter new password" />
                                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" placeholder="Confirm new password" />
                                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Two-Factor Authentication</label>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                        <span class="ms-2">Enabled</span>
                                                    </div>
                                                    <small class="text-muted">Protect your account with SMS or authenticator app</small>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Update Password</button>
                                                </div>
                                            </div>
                                        </form>

                                        <hr class="my-4" />

                                        <h6 class="fw-bold">Session Management</h6>
                                        <div class="bg-light p-3 rounded-4">
                                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                <div>
                                                    <span class="fw-semibold"><i class="fas fa-desktop me-2"></i>Chrome on Windows</span>
                                                    <p class="small text-muted mb-0">Berlin, Germany · Active now</p>
                                                </div>
                                                <span class="badge bg-success">Current</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                <div>
                                                    <span class="fw-semibold"><i class="fas fa-mobile-alt me-2"></i>Safari on iPhone</span>
                                                    <p class="small text-muted mb-0">Berlin, Germany · 2 hours ago</p>
                                                </div>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Terminate</button>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center py-2">
                                                <div>
                                                    <span class="fw-semibold"><i class="fas fa-tablet-alt me-2"></i>Firefox on iPad</span>
                                                    <p class="small text-muted mb-0">London, UK · 1 day ago</p>
                                                </div>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Terminate</button>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-danger rounded-pill px-4 mt-3">Terminate All Sessions</button>
                                    </div>
                                </div>

                                <!-- PREFERENCES -->
                                <div class="tab-pane fade" id="preferences">
                                    <div class="profile-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-sliders-h me-2 text-primary"></i>Preferences</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Language</label>
                                                <select class="form-select">
                                                    <option selected>English</option>
                                                    <option>German</option>
                                                    <option>Spanish</option>
                                                    <option>French</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Time Zone</label>
                                                <select class="form-select">
                                                    <option selected>UTC+1 (CET)</option>
                                                    <option>UTC+0 (GMT)</option>
                                                    <option>UTC-5 (EST)</option>
                                                    <option>UTC-8 (PST)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Currency</label>
                                                <select class="form-select">
                                                    <option selected>USD ($)</option>
                                                    <option>EUR (€)</option>
                                                    <option>GBP (£)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date Format</label>
                                                <select class="form-select">
                                                    <option selected>MM/DD/YYYY</option>
                                                    <option>DD/MM/YYYY</option>
                                                    <option>YYYY-MM-DD</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <h6 class="fw-bold mt-3">Notification Preferences</h6>
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                                    <span>Email notifications for project updates</span>
                                                    <div class="toggle-switch active">
                                                        <div class="toggle-dot"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                                    <span>Email notifications for ticket responses</span>
                                                    <div class="toggle-switch active">
                                                        <div class="toggle-dot"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                                    <span>Marketing and promotional emails</span>
                                                    <div class="toggle-switch">
                                                        <div class="toggle-dot"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Push notifications in browser</span>
                                                    <div class="toggle-switch active">
                                                        <div class="toggle-dot"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary rounded-pill px-4">Save Preferences</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ACTIVITY -->
                                <div class="tab-pane fade" id="activity">
                                    <div class="profile-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-history me-2 text-primary"></i>Activity History</h5>
                                        <div class="activity-item d-flex align-items-center gap-3">
                                            <div class="icon-circle blue"><i class="fas fa-sign-in-alt"></i></div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold">Logged in</span>
                                                <p class="small text-muted mb-0">Today, 9:30 AM</p>
                                            </div>
                                            <span class="badge bg-success">Active</span>
                                        </div>
                                        <div class="activity-item d-flex align-items-center gap-3">
                                            <div class="icon-circle green"><i class="fas fa-file-invoice"></i></div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold">Paid invoice #INV-2025-003</span>
                                                <p class="small text-muted mb-0">May 10, 2025, 2:15 PM</p>
                                            </div>
                                            <span class="badge bg-success">Completed</span>
                                        </div>
                                        <div class="activity-item d-flex align-items-center gap-3">
                                            <div class="icon-circle yellow"><i class="fas fa-ticket-alt"></i></div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold">Created ticket #T-2025-003</span>
                                                <p class="small text-muted mb-0">May 8, 2025, 11:20 AM</p>
                                            </div>
                                            <span class="badge bg-warning text-dark">Open</span>
                                        </div>
                                        <div class="activity-item d-flex align-items-center gap-3">
                                            <div class="icon-circle purple"><i class="fas fa-project-diagram"></i></div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold">Project update: E-Commerce Platform</span>
                                                <p class="small text-muted mb-0">May 5, 2025, 4:45 PM</p>
                                            </div>
                                            <span class="badge bg-info text-dark">In Progress</span>
                                        </div>
                                        <div class="activity-item d-flex align-items-center gap-3">
                                            <div class="icon-circle blue"><i class="fas fa-user-edit"></i></div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold">Updated profile information</span>
                                                <p class="small text-muted mb-0">May 3, 2025, 10:00 AM</p>
                                            </div>
                                            <span class="badge bg-secondary">Completed</span>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-outline-secondary rounded-pill px-4">View All Activity</button>
                                            <button class="btn btn-outline-secondary rounded-pill px-4 ms-2"><i class="fas fa-download me-2"></i>Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="py-3">
                    <div class="container-fluid px-4">
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
            </div>
        </div>
    </div>

    <!-- Bootstrap + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 700 });

        // Toggle password visibility
        document.querySelectorAll('.input-group .btn-outline-secondary').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('input');
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.className = 'fas fa-eye-slash';
                } else {
                    input.type = 'password';
                    icon.className = 'fas fa-eye';
                }
            });
        });

        // Toggle switches
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
                const dot = this.querySelector('.toggle-dot');
                if (this.classList.contains('active')) {
                    this.style.background = 'var(--primary)';
                    dot.style.left = '25px';
                    // Update label
                    const label = this.closest('.d-flex')?.querySelector('span.ms-2');
                    if (label) label.textContent = 'Enabled';
                } else {
                    this.style.background = '#d1d5db';
                    dot.style.left = '3px';
                    const label = this.closest('.d-flex')?.querySelector('span.ms-2');
                    if (label) label.textContent = 'Disabled';
                }
            });
        });

        // Settings navigation
        document.querySelectorAll('.settings-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                document.querySelectorAll('.settings-nav .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Sidebar navigation
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('text-danger')) return;
                // e.preventDefault();
                document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Form submissions
        document.querySelectorAll('.profile-card form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = this.querySelector('.btn-primary');
                if (!btn) return;
                const originalText = btn.textContent;
                btn.textContent = 'Saving...';
                btn.disabled = true;
                setTimeout(() => {
                    btn.textContent = '✓ Saved!';
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-success');
                    setTimeout(() => {
                        btn.textContent = originalText;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-primary');
                        btn.disabled = false;
                    }, 2000);
                }, 1500);
            });
        });

        // Avatar upload
        document.querySelector('.avatar-upload')?.addEventListener('click', function() {
            alert('Click to upload a new profile photo (demo)');
        });

        // Terminate session
        document.querySelectorAll('.bg-light .btn-outline-secondary').forEach(btn => {
            btn.addEventListener('click', function() {
                const item = this.closest('.d-flex');
                if (item) {
                    item.style.opacity = '0.5';
                    this.textContent = 'Terminated';
                    this.className = 'btn btn-sm btn-secondary rounded-pill px-3';
                    this.disabled = true;
                    alert('Session terminated successfully.');
                }
            });
        });

        // Terminate all sessions
        document.querySelector('.btn-outline-danger')?.addEventListener('click', function() {
            if (confirm('Are you sure you want to terminate all sessions except this one?')) {
                document.querySelectorAll('.bg-light .btn-outline-secondary').forEach(btn => {
                    const item = btn.closest('.d-flex');
                    if (item && !item.querySelector('.badge.bg-success')) {
                        item.style.opacity = '0.5';
                        btn.textContent = 'Terminated';
                        btn.className = 'btn btn-sm btn-secondary rounded-pill px-3';
                        btn.disabled = true;
                    }
                });
                alert('All other sessions have been terminated.');
            }
        });

        // Save preferences button
        document.querySelector('#preferences .btn-primary')?.addEventListener('click', function(e) {
            e.preventDefault();
            const btn = this;
            const originalText = btn.textContent;
            btn.textContent = 'Saving...';
            btn.disabled = true;
            setTimeout(() => {
                btn.textContent = '✓ Saved!';
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-success');
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-primary');
                    btn.disabled = false;
                }, 2000);
            }, 1500);
        });

        // Activity - View All
        document.querySelector('#activity .btn-outline-secondary')?.addEventListener('click', function() {
            alert('Loading all activity...');
        });

        // Activity - Export
        document.querySelector('#activity .btn-outline-secondary.ms-2')?.addEventListener('click', function() {
            alert('Exporting activity log...');
        });
    </script>
</body>
</html>