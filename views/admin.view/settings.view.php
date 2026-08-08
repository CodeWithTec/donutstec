<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Settings · DonutsTec</title>
    <!-- Bootstrap 5.3 + Icons + AOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
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
        .btn-danger { background: #dc2626; border: none; }
        .btn-danger:hover { background: #b91c1c; }
        .text-primary { color: var(--primary) !important; }
        .bg-primary { background: var(--primary) !important; }
        .sidebar { background: var(--secondary); min-height: 100vh; padding: 20px 0; position: sticky; top: 0; }
        .sidebar .brand { color: white; font-size: 1.5rem; font-weight: 700; padding: 0 20px 30px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar .brand span { color: var(--primary); }
        .sidebar .nav-link { color: rgba(255,255,255,0.6); padding: 12px 20px; border-radius: 12px; margin: 2px 10px; transition: 0.3s; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.05); color: white; }
        .sidebar .nav-link.active { background: var(--primary); color: white; }
        .sidebar .nav-link i { width: 24px; }
        .topbar { background: white; padding: 16px 24px; box-shadow: var(--shadow-sm); position: sticky; top: 0; z-index: 99; }
        .settings-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .settings-card .form-control, .settings-card .form-select { border-radius: 12px; padding: 12px 16px; border: 1px solid #e5e7eb; }
        .settings-card .form-control:focus, .settings-card .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .settings-card .form-label { font-weight: 600; }
        .settings-nav .nav-link { padding: 10px 16px; border-radius: 12px; color: #4b5563; font-weight: 500; }
        .settings-nav .nav-link:hover { background: #eef2ff; color: var(--primary); }
        .settings-nav .nav-link.active { background: var(--primary); color: white; }
        .settings-nav .nav-link i { width: 24px; }
        .toggle-switch { width: 48px; height: 26px; background: #d1d5db; border-radius: 13px; position: relative; cursor: pointer; transition: 0.3s; flex-shrink: 0; }
        .toggle-switch.active { background: var(--primary); }
        .toggle-switch .toggle-dot { width: 20px; height: 20px; background: white; border-radius: 50%; position: absolute; top: 3px; left: 3px; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .toggle-switch.active .toggle-dot { left: 25px; }
        .backup-item { border-bottom: 1px solid #f3f4f6; padding: 12px 0; }
        .backup-item:last-child { border-bottom: 0; }
        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }
        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.9rem; }
            .topbar { padding: 12px 16px; }
            .settings-card { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
           <?php require 'views/partials/admin/sidebar.php'; ?>

            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-9 px-0">
                <!-- Top Bar -->
              <?php require 'views/partials/admin/navbar.php'; ?>

                <!-- Settings Content -->
                <div class="p-4">
                    <div class="row g-4">
                        <!-- Settings Navigation -->
                        <div class="col-md-3" data-aos="fade-right">
                            <div class="settings-card">
                                <nav class="settings-nav nav flex-column">
                                    <a href="#general" class="nav-link active" data-bs-toggle="tab">
                                        <i class="fas fa-globe"></i>General
                                    </a>
                                    <a href="#seo" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-search"></i>SEO
                                    </a>
                                    <a href="#email" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-envelope"></i>Email
                                    </a>
                                    <a href="#security" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-shield-alt"></i>Security
                                    </a>
                                    <a href="#backup" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-database"></i>Backup
                                    </a>
                                    <a href="#system" class="nav-link" data-bs-toggle="tab">
                                        <i class="fas fa-server"></i>System
                                    </a>
                                </nav>
                            </div>
                        </div>

                        <!-- Settings Tabs -->
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!-- GENERAL SETTINGS -->
                                <div class="tab-pane fade show active" id="general">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">General Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Site Name</label>
                                                    <input type="text" class="form-control" value="DonutsTec" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Site Tagline</label>
                                                    <input type="text" class="form-control" value="Transforming Ideas into Digital Solutions" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Site Description</label>
                                                    <textarea class="form-control" rows="2">DonutsTec helps businesses grow through custom software development, websites, mobile applications, cloud solutions, UI/UX design, and IT consulting.</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Site URL</label>
                                                    <input type="url" class="form-control" value="https://donutstec.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Admin Email</label>
                                                    <input type="email" class="form-control" value="admin@donutstec.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Default Language</label>
                                                    <select class="form-select">
                                                        <option selected>English</option>
                                                        <option>German</option>
                                                        <option>Spanish</option>
                                                        <option>French</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Default Timezone</label>
                                                    <select class="form-select">
                                                        <option selected>UTC+1 (CET)</option>
                                                        <option>UTC+0 (GMT)</option>
                                                        <option>UTC-5 (EST)</option>
                                                        <option>UTC-8 (PST)</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Save General Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- SEO SETTINGS -->
                                <div class="tab-pane fade" id="seo">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">SEO Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label">Default Meta Title</label>
                                                    <input type="text" class="form-control" value="DonutsTec - Software Development Company" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Default Meta Description</label>
                                                    <textarea class="form-control" rows="2">DonutsTec is a leading software development company offering custom software, web development, mobile apps, cloud solutions, and IT consulting services.</textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Default Meta Keywords</label>
                                                    <input type="text" class="form-control" value="software development, web development, mobile apps, cloud solutions, IT consulting" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Facebook App ID (OG Tags)</label>
                                                    <input type="text" class="form-control" placeholder="1234567890" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Twitter Handle</label>
                                                    <input type="text" class="form-control" value="@DonutsTec" />
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fw-bold">Schema.org Structured Data</h6>
                                                    <textarea class="form-control" rows="3">{
                                                        "@context": "https://schema.org",
                                                        "@type": "Organization",
                                                        "name": "DonutsTec",
                                                        "url": "https://donutstec.com",
                                                        "logo": "https://donutstec.com/logo.png"
                                                    }</textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Save SEO Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- EMAIL SETTINGS -->
                                <div class="tab-pane fade" id="email">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">Email Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">SMTP Host</label>
                                                    <input type="text" class="form-control" value="smtp.gmail.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">SMTP Port</label>
                                                    <input type="number" class="form-control" value="587" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">SMTP Username</label>
                                                    <input type="email" class="form-control" value="noreply@donutstec.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">SMTP Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" value="********" />
                                                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">From Email</label>
                                                    <input type="email" class="form-control" value="hello@donutstec.com" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">From Name</label>
                                                    <input type="text" class="form-control" value="DonutsTec" />
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Save Email Settings</button>
                                                    <button class="btn btn-outline-secondary rounded-pill px-4 ms-2"><i class="fas fa-paper-plane me-2"></i>Test Email</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- SECURITY SETTINGS -->
                                <div class="tab-pane fade" id="security">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">Security Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                        <div>
                                                            <span class="fw-semibold">Two-Factor Authentication</span>
                                                            <p class="small text-muted mb-0">Require 2FA for all admin users</p>
                                                        </div>
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                        <div>
                                                            <span class="fw-semibold">Brute-Force Protection</span>
                                                            <p class="small text-muted mb-0">Limit login attempts to prevent brute-force attacks</p>
                                                        </div>
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Max Login Attempts</label>
                                                    <input type="number" class="form-control" value="5" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Lockout Duration (minutes)</label>
                                                    <input type="number" class="form-control" value="30" />
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                        <div>
                                                            <span class="fw-semibold">Session Management</span>
                                                            <p class="small text-muted mb-0">Automatically logout inactive users</p>
                                                        </div>
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Session Timeout (minutes)</label>
                                                    <input type="number" class="form-control" value="60" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">CSRF Protection</label>
                                                    <select class="form-select">
                                                        <option selected>Enabled</option>
                                                        <option>Disabled</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Save Security Settings</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- BACKUP SETTINGS -->
                                <div class="tab-pane fade" id="backup">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">Backup Manager</h5>
                                        <div class="d-flex gap-2 mb-4">
                                            <button class="btn btn-primary rounded-pill px-4"><i class="fas fa-database me-2"></i>Run Full Backup</button>
                                            <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-upload me-2"></i>Restore Backup</button>
                                            <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-cog me-2"></i>Configure</button>
                                        </div>
                                        <h6 class="fw-bold">Recent Backups</h6>
                                        <div class="backup-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="fw-semibold">Full Backup - May 12, 2025</span>
                                                <p class="small text-muted mb-0">Size: 245 MB</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2"><i class="fas fa-download"></i></button>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-2"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="backup-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="fw-semibold">Full Backup - May 10, 2025</span>
                                                <p class="small text-muted mb-0">Size: 238 MB</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2"><i class="fas fa-download"></i></button>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-2"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="backup-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="fw-semibold">Full Backup - May 8, 2025</span>
                                                <p class="small text-muted mb-0">Size: 240 MB</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2"><i class="fas fa-download"></i></button>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-2"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label class="form-label">Auto Backup Schedule</label>
                                            <select class="form-select">
                                                <option selected>Daily</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                                <option>Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- SYSTEM SETTINGS -->
                                <div class="tab-pane fade" id="system">
                                    <div class="settings-card" data-aos="fade-up">
                                        <h5 class="fw-bold mb-4">System Settings</h5>
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Maintenance Mode</label>
                                                    <select class="form-select">
                                                        <option selected>Disabled</option>
                                                        <option>Enabled</option>
                                                    </select>
                                                    <small class="text-muted">Enable to put the site under maintenance</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Debug Mode</label>
                                                    <select class="form-select">
                                                        <option selected>Disabled</option>
                                                        <option>Enabled</option>
                                                    </select>
                                                    <small class="text-muted">Enable for development and debugging</small>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Allowed IPs for Maintenance</label>
                                                    <input type="text" class="form-control" placeholder="192.168.1.1, 10.0.0.1" />
                                                    <small class="text-muted">Comma separated IP addresses</small>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                        <div>
                                                            <span class="fw-semibold">Cache System</span>
                                                            <p class="small text-muted mb-0">Enable caching for better performance</p>
                                                        </div>
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                                        <div>
                                                            <span class="fw-semibold">Activity Logs</span>
                                                            <p class="small text-muted mb-0">Log all user activities for audit purposes</p>
                                                        </div>
                                                        <div class="toggle-switch active">
                                                            <div class="toggle-dot"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="fw-bold">System Information</h6>
                                                    <div class="bg-light p-3 rounded-4">
                                                        <p><strong>PHP Version:</strong> 8.2.0</p>
                                                        <p><strong>MySQL Version:</strong> 8.0.35</p>
                                                        <p><strong>Server OS:</strong> Linux 5.15.0</p>
                                                        <p><strong>Memory Usage:</strong> 256 MB / 512 MB</p>
                                                        <p><strong>Disk Space:</strong> 45 GB / 100 GB</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary rounded-pill px-4">Save System Settings</button>
                                                    <button class="btn btn-danger rounded-pill px-4 ms-2"><i class="fas fa-redo me-2"></i>Clear Cache</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="py-3 mt-2" style="background: var(--secondary); color: #e5e7eb;">
                    <div class="container-fluid px-4">
                        <div class="row g-3">
                            <div class="col-md-6"><p class="mb-0 small">© 2026 DonutsTec GmbH. All rights reserved.</p></div>
                            <div class="col-md-6 text-md-end">
                                <a href="#" class="small me-3 text-white-50">Privacy Policy</a>
                                <a href="#" class="small me-3 text-white-50">Terms of Service</a>
                                <a href="#" class="small text-white-50">Support</a>
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

        // Toggle switches
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
                const dot = this.querySelector('.toggle-dot');
                if (this.classList.contains('active')) {
                    this.style.background = 'var(--primary)';
                    dot.style.left = '25px';
                } else {
                    this.style.background = '#d1d5db';
                    dot.style.left = '3px';
                }
            });
        });

        // Password toggle
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

        // Settings navigation - smooth scroll on mobile
        document.querySelectorAll('.settings-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                document.querySelectorAll('.settings-nav .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Form submissions
        document.querySelectorAll('.settings-card form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = this.querySelector('.btn-primary');
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

        // Test email button
        document.querySelector('#email .btn-outline-secondary')?.addEventListener('click', function() {
            alert('Test email sent to admin@donutstec.com');
        });

        // Backup buttons
        document.querySelector('#backup .btn-primary')?.addEventListener('click', function() {
            alert('Full backup initiated. You will be notified when complete.');
        });

        // Clear cache button
        document.querySelector('#system .btn-danger')?.addEventListener('click', function() {
            alert('Cache cleared successfully!');
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
    </script>
</body>
</html>