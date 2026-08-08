<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard · DonutsTec</title>
    <!-- Bootstrap 5.3 + Icons + AOS + DataTables + Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
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
        .sidebar { background: var(--secondary); min-height: 100vh; padding: 20px 0; position: sticky; top: 0; }
        .sidebar .brand { color: white; font-size: 1.5rem; font-weight: 700; padding: 0 20px 30px; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar .brand span { color: var(--primary); }
        .sidebar .nav-link { color: rgba(255,255,255,0.6); padding: 12px 20px; border-radius: 12px; margin: 2px 10px; transition: 0.3s; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.05); color: white; }
        .sidebar .nav-link.active { background: var(--primary); color: white; }
        .sidebar .nav-link i { width: 24px; }
        .sidebar .nav-link .badge { float: right; }
        .topbar { background: white; padding: 16px 24px; box-shadow: var(--shadow-sm); position: sticky; top: 0; z-index: 99; }
        .stat-card { background: white; border-radius: 20px; padding: 24px; box-shadow: var(--shadow-sm); transition: 0.3s; border-left: 4px solid var(--primary); }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .stat-card .number { font-size: 2.2rem; font-weight: 700; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; }
        .stat-card .icon { font-size: 2rem; opacity: 0.2; }
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }
        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .status-inactive { background: #fce4ec; color: #c62828; }
        .status-progress { background: #dbeafe; color: #1d4ed8; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-open { background: #dbeafe; color: #1d4ed8; }
        .status-closed { background: #e5e7eb; color: #4b5563; }
        .quick-action { border: 1px solid #e5e7eb; border-radius: 16px; padding: 16px 20px; transition: 0.3s; cursor: pointer; background: white; }
        .quick-action:hover { border-color: var(--primary); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
        .quick-action i { font-size: 1.5rem; color: var(--primary); }
        .activity-item { border-bottom: 1px solid #f3f4f6; padding: 12px 0; }
        .activity-item:last-child { border-bottom: 0; }
        .activity-item .time { font-size: 0.75rem; color: #9ca3af; }
        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }
        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.9rem; }
            .topbar { padding: 12px 16px; }
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

                <!-- Stats Row -->
                <div class="p-4">
                    <div class="row g-4">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card">
                                <div class="d-flex justify-content-between">
                                    <div><div class="number">$128,500</div><div class="label">Revenue (YTD)</div></div>
                                    <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                                </div>
                                <div class="mt-2"><small class="text-success"><i class="fas fa-arrow-up"></i> 12.5%</small> <small class="text-muted">vs last year</small></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;">
                                <div class="d-flex justify-content-between">
                                    <div><div class="number">156</div><div class="label">Total Projects</div></div>
                                    <div class="icon" style="color:#22c55e;"><i class="fas fa-project-diagram"></i></div>
                                </div>
                                <div class="mt-2"><small class="text-success"><i class="fas fa-arrow-up"></i> 8.2%</small> <small class="text-muted">vs last month</small></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);">
                                <div class="d-flex justify-content-between">
                                    <div><div class="number">84</div><div class="label">Active Clients</div></div>
                                    <div class="icon" style="color:var(--accent);"><i class="fas fa-users"></i></div>
                                </div>
                                <div class="mt-2"><small class="text-success"><i class="fas fa-arrow-up"></i> 5.1%</small> <small class="text-muted">vs last month</small></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;">
                                <div class="d-flex justify-content-between">
                                    <div><div class="number">98%</div><div class="label">Satisfaction Rate</div></div>
                                    <div class="icon" style="color:#8b5cf6;"><i class="fas fa-star"></i></div>
                                </div>
                                <div class="mt-2"><small class="text-success"><i class="fas fa-arrow-up"></i> 2.3%</small> <small class="text-muted">vs last month</small></div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row
                    <div class="row g-4 mt-2">
                        <div class="col-md-7" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Monthly Revenue</h6>
                                <canvas id="revenueChart" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Project Status</h6>
                                <canvas id="projectChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                        --->
                    <!-- Quick Actions -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-12" data-aos="fade-up">
                            <h6 class="fw-bold mb-3">Quick Actions</h6>
                            <div class="row g-3">
                                <div class="col-md-3 col-6">
                                    <div class="quick-action text-center">
                                        <i class="fas fa-user-plus"></i>
                                        <p class="mb-0 small fw-semibold mt-1">Add Client</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="quick-action text-center">
                                        <i class="fas fa-ticket-alt"></i>
                                        <p class="mb-0 small fw-semibold mt-1">View Tickets</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="quick-action text-center">
                                        <i class="fas fa-newspaper"></i>
                                        <p class="mb-0 small fw-semibold mt-1">New Blog Post</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="quick-action text-center">
                                        <i class="fas fa-file-invoice"></i>
                                        <p class="mb-0 small fw-semibold mt-1">Create Invoice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity & Tickets -->
                    <div class="row g-4 mt-2">
                        <div class="col-md-7" data-aos="fade-up">
                            <div class="dashboard-card">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Recent Activity</h6>
                                    <a href="#" class="text-primary small">View All</a>
                                </div>
                                <div class="activity-item d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">New client registered</span><br /><small class="text-muted">Acme Corp</small></div>
                                    <span class="time">5 min ago</span>
                                </div>
                                <div class="activity-item d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">Ticket #T-2025-001 updated</span><br /><small class="text-muted">Website Update Request</small></div>
                                    <span class="time">2 hours ago</span>
                                </div>
                                <div class="activity-item d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">Payment received</span><br /><small class="text-muted">$12,500 from RetailCo</small></div>
                                    <span class="time">4 hours ago</span>
                                </div>
                                <div class="activity-item d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">New project created</span><br /><small class="text-muted">AI Customer Support</small></div>
                                    <span class="time">1 day ago</span>
                                </div>
                                <div class="activity-item d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">Blog post published</span><br /><small class="text-muted">AI in Software Development</small></div>
                                    <span class="time">2 days ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold">Support Tickets</h6>
                                    <a href="#" class="text-primary small">View All</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <div><span class="fw-semibold">#T-2025-001</span><br /><small>Website Update</small></div>
                                    <span class="status-badge status-progress">In Progress</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <div><span class="fw-semibold">#T-2025-002</span><br /><small>Bug Report</small></div>
                                    <span class="status-badge status-open">Open</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <div><span class="fw-semibold">#T-2025-003</span><br /><small>Payment Issue</small></div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><span class="fw-semibold">#T-2025-004</span><br /><small>Domain Support</small></div>
                                    <span class="status-badge status-closed">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tables: Clients & Users -->
                    <div class="row g-4 mt-2">
                        <div class="col-md-12" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold mb-3">Recent Clients</h6>
                                <div class="table-responsive">
                                    <table id="clientsTable" class="table table-hover align-middle">
                                        <thead>
                                            <tr><th>Client</th><th>Company</th><th>Project</th><th>Status</th><th>Actions</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="fw-semibold">John Doe</span></td>
                                                <td>TechCorp</td>
                                                <td>E-Commerce Platform</td>
                                                <td><span class="status-badge status-progress">In Progress</span></td>
                                                <td><button class="btn btn-sm btn-outline-primary rounded-pill px-3">View</button></td>
                                            </tr>
                                            <tr>
                                                <td><span class="fw-semibold">Sarah Smith</span></td>
                                                <td>HealthPlus</td>
                                                <td>Healthcare Portal</td>
                                                <td><span class="status-badge status-completed">Completed</span></td>
                                                <td><button class="btn btn-sm btn-outline-primary rounded-pill px-3">View</button></td>
                                            </tr>
                                            <tr>
                                                <td><span class="fw-semibold">Mike Johnson</span></td>
                                                <td>EduTech</td>
                                                <td>School Management</td>
                                                <td><span class="status-badge status-active">Active</span></td>
                                                <td><button class="btn btn-sm btn-outline-primary rounded-pill px-3">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter & Settings -->
                    <div class="row g-4 mt-2">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold mb-3"><i class="fas fa-envelope me-2 text-primary"></i>Newsletter Subscribers</h6>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span>tech@example.com</span>
                                    <small class="text-muted">May 12, 2025</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span>marketing@company.com</span>
                                    <small class="text-muted">May 10, 2025</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span>info@startup.com</span>
                                    <small class="text-muted">May 8, 2025</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>+ 47 more subscribers</span>
                                    <a href="#" class="text-primary small">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold mb-3"><i class="fas fa-cog me-2 text-primary"></i>Quick Settings</h6>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span><i class="fas fa-globe me-2"></i>Site Maintenance</span>
                                    <div class="toggle-switch active" style="width:40px;height:22px;background:var(--primary);border-radius:11px;position:relative;cursor:pointer;">
                                        <div style="width:16px;height:16px;background:white;border-radius:50%;position:absolute;top:3px;left:21px;"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span><i class="fas fa-database me-2"></i>Backup Manager</span>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Run Backup</button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                    <span><i class="fas fa-search me-2"></i>SEO Settings</span>
                                    <a href="#" class="text-primary small">Configure</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-shield-alt me-2"></i>Security</span>
                                    <span class="status-badge status-active">Secure</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <?php require 'views/partials/admin/footer.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap + DataTables + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 700 });

        // DataTable initialization
        $(document).ready(function() {
            $('#clientsTable').DataTable({
                pageLength: 5,
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf']
            });
        });

        // Chart.js - Revenue Chart
        const ctx1 = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 15000, 18000, 22000, 28000, 32000, 35000],
                    borderColor: '#2563EB',
                    backgroundColor: 'rgba(37, 99, 235, 0.05)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { callback: function(value) { return '$' + value.toLocaleString(); } } } }
            }
        });

        // Chart.js - Project Status
        const ctx2 = document.getElementById('projectChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'In Progress', 'Completed', 'On Hold'],
                datasets: [{
                    data: [32, 45, 28, 12],
                    backgroundColor: ['#3b82f6', '#f59e0b', '#22c55e', '#6b7280']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Quick action clicks
        document.querySelectorAll('.quick-action').forEach(action => {
            action.addEventListener('click', function() {
                const text = this.querySelector('p')?.textContent || 'Action';
                alert('Navigating to: ' + text);
            });
        });

        // Toggle switch click
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
                const dot = this.querySelector('div');
                if (this.classList.contains('active')) {
                    this.style.background = 'var(--primary)';
                    dot.style.left = '21px';
                } else {
                    this.style.background = '#d1d5db';
                    dot.style.left = '3px';
                }
            });
        });

        // Dummy interactions
        document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('text-danger')) return;
                e.preventDefault();
                document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>