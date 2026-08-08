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
        .stat-card { background: white; border-radius: 20px; padding: 20px; box-shadow: var(--shadow-sm); transition: 0.3s; border-left: 4px solid var(--primary); }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .stat-card .number { font-size: 2rem; font-weight: 700; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; }
        .stat-card .icon { font-size: 2rem; opacity: 0.2; }
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }

        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-inprogress { background: #dbeafe; color: #1d4ed8; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .status-onhold { background: #fef3c7; color: #b45309; }
        .status-open { background: #dbeafe; color: #1d4ed8; }
        .status-closed { background: #e5e7eb; color: #4b5563; }
        .status-progress { background: #dbeafe; color: #1d4ed8; }
        .status-waiting { background: #fce4ec; color: #c62828; }

        .priority-high { color: #dc2626; }
        .priority-critical { color: #7f1d1d; }
        .priority-medium { color: #f59e0b; }
        .priority-low { color: #3b82f6; }

        .notification-item { border-bottom: 1px solid #f3f4f6; padding: 10px 0; }
        .notification-item:last-child { border-bottom: 0; }
        .notification-item .time { font-size: 0.75rem; color: #9ca3af; }
        .notification-item.unread { background: #f8fafc; border-left: 3px solid var(--primary); padding-left: 12px; }

        .project-progress { height: 6px; border-radius: 10px; background: #e5e7eb; }
        .project-progress .progress-bar { background: var(--primary); border-radius: 10px; }

        .ticket-item { padding: 8px 0; border-bottom: 1px solid #f3f4f6; }
        .ticket-item:last-child { border-bottom: 0; }

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
            .stat-card .number { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
         <?php require 'views/partials/clients/sidebar.php'; ?>

            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-9 px-0">
                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">Dashboard</h5>
                        <small class="text-muted">Welcome back, John!</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <div class="search-box d-none d-md-flex">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search..." />
                        </div>
                        <button class="btn btn-primary btn-sm rounded-pill px-3"><i class="fas fa-plus me-2"></i>New Project</button>
                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-bell"></i></button>
                        <img src="https://via.placeholder.com/36" class="rounded-circle d-md-none" alt="User" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">12</div><div class="label">Active Projects</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">8</div><div class="label">Completed Projects</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">5</div><div class="label">Active Tickets</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;"><div class="number">3</div><div class="label">Invoices Due</div></div>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Project Status</h6>
                                <canvas id="projectChart" height="180"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Ticket Analytics</h6>
                                <canvas id="ticketChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Projects & Tickets -->
                    <div class="row g-3">
                        <!-- Projects -->
                        <div class="col-md-7" data-aos="fade-up">
                            <div class="dashboard-card">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Your Projects</h6>
                                    <a href="#" class="text-primary small">View All <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr><th>Project</th><th>Status</th><th>Progress</th><th>Deadline</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="fw-semibold">E-Commerce Platform</span></td>
                                                <td><span class="status-badge status-inprogress">In Progress</span></td>
                                                <td><div class="project-progress"><div class="progress-bar" style="width:75%;"></div></div><small>75%</small></td>
                                                <td>Jun 30, 2025</td>
                                            </tr>
                                            <tr>
                                                <td><span class="fw-semibold">School Management</span></td>
                                                <td><span class="status-badge status-active">Active</span></td>
                                                <td><div class="project-progress"><div class="progress-bar" style="width:30%;"></div></div><small>30%</small></td>
                                                <td>Aug 15, 2025</td>
                                            </tr>
                                            <tr>
                                                <td><span class="fw-semibold">Healthcare Portal</span></td>
                                                <td><span class="status-badge status-completed">Completed</span></td>
                                                <td><div class="project-progress"><div class="progress-bar" style="width:100%; background:#22c55e;"></div></div><small>100%</small></td>
                                                <td>May 10, 2025</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Tickets & Notifications -->
                        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Recent Tickets</h6>
                                    <a href="#" class="text-primary small">View All</a>
                                </div>
                                <div class="ticket-item d-flex justify-content-between align-items-center">
                                    <div><span class="status-badge status-progress">In Progress</span><br /><span class="fw-semibold">Website Update</span></div>
                                    <span class="priority-high">High</span>
                                </div>
                                <div class="ticket-item d-flex justify-content-between align-items-center">
                                    <div><span class="status-badge status-open">Open</span><br /><span class="fw-semibold">Bug Report</span></div>
                                    <span class="priority-critical">Critical</span>
                                </div>
                                <div class="ticket-item d-flex justify-content-between align-items-center">
                                    <div><span class="status-badge status-pending">Pending</span><br /><span class="fw-semibold">New Feature</span></div>
                                    <span class="priority-medium">Medium</span>
                                </div>

                                <hr />

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold">Notifications <span class="badge bg-danger">6</span></h6>
                                    <a href="#" class="text-primary small">Mark all read</a>
                                </div>
                                <div class="notification-item unread">
                                    <div class="d-flex justify-content-between"><span class="fw-semibold">Project Update</span><span class="time">5 min ago</span></div>
                                    <p class="small mb-0">E-Commerce Platform is 75% complete.</p>
                                </div>
                                <div class="notification-item unread">
                                    <div class="d-flex justify-content-between"><span class="fw-semibold">Ticket Response</span><span class="time">2 hours ago</span></div>
                                    <p class="small mb-0">Support agent replied to ticket #T-2025-001.</p>
                                </div>
                                <div class="notification-item">
                                    <div class="d-flex justify-content-between"><span class="fw-semibold">Invoice Due</span><span class="time">1 day ago</span></div>
                                    <p class="small mb-0">Invoice #INV-2025-004 is due in 3 days.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoices -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="150">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Invoice Status</h6>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr><th>Invoice #</th><th>Project</th><th>Amount</th><th>Due Date</th><th>Status</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#INV-2025-001</td>
                                                <td>E-Commerce Platform</td>
                                                <td>$12,500</td>
                                                <td>Jun 30, 2025</td>
                                                <td><span class="status-badge status-pending">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>#INV-2025-002</td>
                                                <td>School Management</td>
                                                <td>$8,000</td>
                                                <td>Aug 15, 2025</td>
                                                <td><span class="status-badge status-pending">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>#INV-2025-003</td>
                                                <td>Healthcare Portal</td>
                                                <td>$15,000</td>
                                                <td>May 10, 2025</td>
                                                <td><span class="status-badge status-completed">Paid</span></td>
                                            </tr>
                                            <tr>
                                                <td>#INV-2025-004</td>
                                                <td>API Development</td>
                                                <td>$3,500</td>
                                                <td>Jun 15, 2025</td>
                                                <td><span class="status-badge status-onhold">Overdue</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
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

    <!-- Bootstrap + DataTables + AOS -->
     <?php require 'views/partials/clients/scripts.php'; ?>

    <script>
        AOS.init({ once: true, duration: 700 });

        // Chart.js - Project Status
        const ctx1 = document.getElementById('projectChart').getContext('2d');
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'In Progress', 'Completed', 'On Hold'],
                datasets: [{ data: [8, 12, 6, 4], backgroundColor: ['#3b82f6', '#f59e0b', '#22c55e', '#6b7280'] }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });

        // Chart.js - Ticket Analytics
        const ctx2 = document.getElementById('ticketChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Open', 'In Progress', 'Waiting', 'Completed', 'Closed'],
                datasets: [{ label: 'Tickets', data: [8, 12, 6, 24, 4], backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b', '#8b5cf6', '#6b7280'], borderRadius: 8 }]
            },
            options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
        });

        // Notification click - mark as read
        document.querySelectorAll('.notification-item.unread').forEach(item => {
            item.addEventListener('click', function() {
                this.classList.remove('unread');
                this.style.borderLeft = 'none';
                this.style.background = 'transparent';
                this.style.paddingLeft = '0';
                // Update badge count
                const badge = document.querySelector('.nav-link .badge.bg-danger');
                if (badge) {
                    const count = parseInt(badge.textContent) - 1;
                    badge.textContent = count > 0 ? count : '0';
                    if (count <= 0) badge.style.display = 'none';
                }
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

        // Dummy interactions
        document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
        document.querySelectorAll('.table .btn-outline-primary').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                alert('View details page (demo)');
            });
        });
    </script>
</body>
</html>