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
        .topbar .search-box { background: #f1f5f9; border-radius: 40px; padding: 6px 16px; border: none; }
        .topbar .search-box input { background: transparent; border: none; outline: none; padding: 4px 8px; font-size: 0.9rem; width: 200px; }
        .topbar .search-box i { color: #9ca3af; }

        /* Cards */
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }
        .stat-card { background: white; border-radius: 20px; padding: 20px; box-shadow: var(--shadow-sm); transition: 0.3s; border-left: 4px solid var(--primary); }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .stat-card .number { font-size: 2rem; font-weight: 700; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; }
        .stat-card .icon { font-size: 2rem; opacity: 0.2; }

        .notification-item { border: 1px solid #f3f4f6; border-radius: 16px; padding: 16px 20px; background: white; transition: all 0.3s; margin-bottom: 12px; }
        .notification-item:hover { box-shadow: var(--shadow-sm); transform: translateX(4px); }
        .notification-item.unread { background: #f8fafc; border-left: 4px solid var(--primary); }
        .notification-item .time { font-size: 0.75rem; color: #9ca3af; }
        .notification-item .icon-circle { width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .notification-item .icon-circle.blue { background: #dbeafe; color: var(--primary); }
        .notification-item .icon-circle.green { background: #d1fae5; color: #065f46; }
        .notification-item .icon-circle.yellow { background: #fef3c7; color: #b45309; }
        .notification-item .icon-circle.purple { background: #e0e7ff; color: #3730a3; }
        .notification-item .icon-circle.red { background: #fce4ec; color: #c62828; }

        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }

        .preference-card { border: 1px solid #e5e7eb; border-radius: 16px; padding: 16px 20px; background: white; transition: 0.3s; }
        .preference-card:hover { border-color: var(--primary); }
        .toggle-switch { width: 48px; height: 26px; background: #d1d5db; border-radius: 13px; position: relative; cursor: pointer; transition: 0.3s; flex-shrink: 0; }
        .toggle-switch.active { background: var(--primary); }
        .toggle-switch .toggle-dot { width: 20px; height: 20px; background: white; border-radius: 50%; position: absolute; top: 3px; left: 3px; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .toggle-switch.active .toggle-dot { left: 25px; }

        .mark-all-btn { border-radius: 40px; padding: 8px 24px; }

        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }

        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.85rem; margin: 2px 5px; }
            .sidebar .user-card { text-align: center; }
            .topbar { padding: 12px 16px; }
            .topbar .search-box input { width: 120px; }
            .notification-item { padding: 12px 16px; }
            .stat-card .number { font-size: 1.5rem; }
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
                        <h5 class="fw-bold mb-0">Notifications</h5>
                        <small class="text-muted">Stay updated with all your project activity and announcements</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <div class="search-box d-none d-md-flex">
                            <i class="fas fa-search"></i>
                            <input type="text" id="notificationSearch" placeholder="Search notifications..." />
                        </div>
                        <button class="btn btn-outline-primary btn-sm rounded-pill px-3 mark-all-btn">
                            <i class="fas fa-check-double me-2"></i>Mark All Read
                        </button>
                        <img src="https://via.placeholder.com/36" class="rounded-circle d-md-none" alt="User" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">48</div><div class="label">Total Notifications</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#3b82f6;"><div class="number">12</div><div class="label">Unread</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">18</div><div class="label">This Week</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;"><div class="number">42</div><div class="label">This Month</div></div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All</button>
                                <button class="filter-btn" data-filter="unread">Unread</button>
                                <button class="filter-btn" data-filter="project">Projects</button>
                                <button class="filter-btn" data-filter="ticket">Tickets</button>
                                <button class="filter-btn" data-filter="invoice">Invoices</button>
                                <button class="filter-btn" data-filter="update">Updates</button>
                                <button class="filter-btn" data-filter="announcement">Announcements</button>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-none">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="mobileNotificationSearch" class="form-control" placeholder="Search notifications..." />
                            </div>
                        </div>
                    </div>

                    <!-- Notifications List -->
                    <div class="row g-4">
                        <div class="col-lg-8" data-aos="fade-up">
                            <div id="notificationContainer">
                                <!-- Unread - Project Update -->
                                <div class="notification-item unread" data-type="project">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle blue"><i class="fas fa-project-diagram"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Project Update</span>
                                                <span class="time">5 min ago</span>
                                            </div>
                                            <p class="mb-1">E-Commerce Platform is now 75% complete. All major features are implemented.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Project</a>
                                                <a href="#" class="text-muted small mark-read">Mark as read</a>
                                            </div>
                                        </div>
                                        <div class="text-muted small"><i class="fas fa-circle text-primary" style="font-size:10px;"></i></div>
                                    </div>
                                </div>

                                <!-- Unread - Ticket Response -->
                                <div class="notification-item unread" data-type="ticket">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle purple"><i class="fas fa-ticket-alt"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Ticket Response</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                            <p class="mb-1">Support agent replied to ticket #T-2025-001: "We've started working on the website update."</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Ticket</a>
                                                <a href="#" class="text-muted small mark-read">Mark as read</a>
                                            </div>
                                        </div>
                                        <div class="text-muted small"><i class="fas fa-circle text-primary" style="font-size:10px;"></i></div>
                                    </div>
                                </div>

                                <!-- Invoice Due -->
                                <div class="notification-item" data-type="invoice">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle yellow"><i class="fas fa-file-invoice-dollar"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Invoice Due</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                            <p class="mb-1">Invoice #INV-2025-004 for $3,500 is due in 3 days. Please make payment to avoid service interruption.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Invoice</a>
                                                <a href="#" class="text-primary small">Pay Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Completed -->
                                <div class="notification-item" data-type="project">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle green"><i class="fas fa-check-circle"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Project Completed</span>
                                                <span class="time">3 days ago</span>
                                            </div>
                                            <p class="mb-1">Healthcare Portal has been successfully completed and deployed. You can now access it at the live URL.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Project</a>
                                                <a href="#" class="text-primary small">Launch Site</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Announcement -->
                                <div class="notification-item" data-type="announcement">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle red"><i class="fas fa-bullhorn"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">System Announcement</span>
                                                <span class="time">5 days ago</span>
                                            </div>
                                            <p class="mb-1">Maintenance scheduled for this Saturday, May 17, 2025 from 2:00 AM - 4:00 AM EST. Services may be temporarily unavailable.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Ticket Created -->
                                <div class="notification-item" data-type="ticket">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle blue"><i class="fas fa-plus-circle"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">New Ticket Created</span>
                                                <span class="time">May 10, 2025</span>
                                            </div>
                                            <p class="mb-1">Ticket #T-2025-003 "New Feature Request" has been created and assigned to the development team.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Ticket</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Received -->
                                <div class="notification-item" data-type="invoice">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle green"><i class="fas fa-credit-card"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Payment Received</span>
                                                <span class="time">May 8, 2025</span>
                                            </div>
                                            <p class="mb-1">Payment of $12,500 for Invoice #INV-2025-003 has been received. Thank you for your business!</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Invoice</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Team Member Added -->
                                <div class="notification-item" data-type="project">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle purple"><i class="fas fa-user-plus"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Team Member Added</span>
                                                <span class="time">May 5, 2025</span>
                                            </div>
                                            <p class="mb-1">Tom Wagner has been added as a QA Engineer to the E-Commerce Platform project.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Team</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Security Alert -->
                                <div class="notification-item" data-type="update">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle yellow"><i class="fas fa-shield-alt"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Security Update</span>
                                                <span class="time">May 3, 2025</span>
                                            </div>
                                            <p class="mb-1">Security patches have been applied to all projects. Please ensure you have the latest updates.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feedback Request -->
                                <div class="notification-item" data-type="update">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="icon-circle green"><i class="fas fa-star"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Feedback Request</span>
                                                <span class="time">May 1, 2025</span>
                                            </div>
                                            <p class="mb-1">We'd love to hear your feedback on the recently completed Healthcare Portal project.</p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="text-primary small">Provide Feedback</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Load More -->
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-secondary rounded-pill px-4 load-more">Load More</button>
                            </div>
                        </div>

                        <!-- Sidebar - Preferences -->
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold mb-3"><i class="fas fa-sliders-h me-2 text-primary"></i>Notification Preferences</h6>
                                
                                <div class="preference-card mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-semibold">Project Updates</span>
                                            <p class="small text-muted mb-0">Get notified about project progress</p>
                                        </div>
                                        <div class="toggle-switch active" data-pref="project">
                                            <div class="toggle-dot"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-card mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-semibold">Ticket Responses</span>
                                            <p class="small text-muted mb-0">Get notified about ticket replies</p>
                                        </div>
                                        <div class="toggle-switch active" data-pref="ticket">
                                            <div class="toggle-dot"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-card mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-semibold">Invoice Alerts</span>
                                            <p class="small text-muted mb-0">Get notified about invoices and payments</p>
                                        </div>
                                        <div class="toggle-switch" data-pref="invoice">
                                            <div class="toggle-dot"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-card mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-semibold">System Announcements</span>
                                            <p class="small text-muted mb-0">Get notified about system updates</p>
                                        </div>
                                        <div class="toggle-switch active" data-pref="announcement">
                                            <div class="toggle-dot"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-card mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fw-semibold">Email Notifications</span>
                                            <p class="small text-muted mb-0">Receive notifications via email</p>
                                        </div>
                                        <div class="toggle-switch active" data-pref="email">
                                            <div class="toggle-dot"></div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary w-100 rounded-pill mt-2 save-preferences">Save Preferences</button>
                            </div>

                            <!-- Stats Summary -->
                            <div class="dashboard-card mt-3">
                                <h6 class="fw-bold mb-3"><i class="fas fa-chart-pie me-2 text-primary"></i>Notification Stats</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total Notifications</span>
                                    <span class="fw-semibold">48</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Unread</span>
                                    <span class="fw-semibold text-primary">12</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>This Week</span>
                                    <span class="fw-semibold">18</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>This Month</span>
                                    <span class="fw-semibold">42</span>
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
<?php require 'views/partials/clients/scripts.php'; ?>
    <script>
        AOS.init({ once: true, duration: 700 });

        // Mark as read functionality
        document.querySelectorAll('.mark-read').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const item = this.closest('.notification-item');
                item.classList.remove('unread');
                const dot = item.querySelector('.fa-circle');
                if (dot) dot.style.display = 'none';
                
                // Update unread count
                const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                const badge = document.querySelector('.sidebar .nav-link.active .badge');
                if (badge) {
                    badge.textContent = unreadCount > 0 ? unreadCount : '';
                    if (unreadCount === 0) badge.style.display = 'none';
                }
                
                this.textContent = '✓ Read';
                this.style.color = 'var(--primary)';
                setTimeout(() => {
                    this.textContent = 'Mark as read';
                    this.style.color = '';
                }, 2000);
            });
        });

        // Mark all as read
        document.querySelector('.mark-all-btn').addEventListener('click', function() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            unreadItems.forEach(item => {
                item.classList.remove('unread');
                const dot = item.querySelector('.fa-circle');
                if (dot) dot.style.display = 'none';
            });
            
            const badge = document.querySelector('.sidebar .nav-link.active .badge');
            if (badge) {
                badge.textContent = '';
                badge.style.display = 'none';
            }
            
            this.innerHTML = '<i class="fas fa-check-double me-2"></i>All Read!';
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-success');
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check-double me-2"></i>Mark All Read';
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-primary');
            }, 2000);
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const notifications = document.querySelectorAll('.notification-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                notifications.forEach(notif => {
                    if (filter === 'all') {
                        notif.style.display = 'block';
                    } else if (filter === 'unread') {
                        notif.style.display = notif.classList.contains('unread') ? 'block' : 'none';
                    } else {
                        notif.style.display = notif.dataset.type === filter ? 'block' : 'none';
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('notificationSearch');
        const mobileSearchInput = document.getElementById('mobileNotificationSearch');

        function filterNotifications(query) {
            notifications.forEach(notif => {
                const text = notif.textContent.toLowerCase();
                if (text.includes(query)) {
                    notif.style.display = 'block';
                } else {
                    notif.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', function() {
            filterNotifications(this.value.toLowerCase());
        });

        mobileSearchInput.addEventListener('input', function() {
            filterNotifications(this.value.toLowerCase());
        });

        // Toggle switches
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
                const pref = this.dataset.pref;
                const label = this.closest('.preference-card').querySelector('.fw-semibold');
                if (this.classList.contains('active')) {
                    showToast('success', label.textContent + ' notifications enabled');
                } else {
                    showToast('secondary', label.textContent + ' notifications disabled');
                }
            });
        });

        // Toast notification helper
        function showToast(type, message) {
            const toast = document.createElement('div');
            toast.className = 'position-fixed bottom-0 end-0 p-3';
            toast.style.zIndex = '9999';
            const color = type === 'success' ? 'bg-success' : 'bg-secondary';
            toast.innerHTML = `
                <div class="${color} text-white p-3 rounded-4 shadow">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-ban'} me-2"></i> ${message}
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        // Save preferences
        document.querySelector('.save-preferences').addEventListener('click', function(e) {
            e.preventDefault();
            showToast('success', 'Preferences saved successfully!');
        });

        // Load more
        document.querySelector('.load-more')?.addEventListener('click', function(e) {
            e.preventDefault();
            this.textContent = 'Loading...';
            this.disabled = true;
            setTimeout(() => {
                this.textContent = 'Load More';
                this.disabled = false;
                showToast('info', 'No more notifications to load.');
            }, 1500);
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

        // Dummy link clicks
        document.querySelectorAll('.notification-item a').forEach(link => {
            if (!link.classList.contains('mark-read')) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('info', 'Navigating to ' + this.textContent);
                });
            }
        });
    </script>
</body>
</html>