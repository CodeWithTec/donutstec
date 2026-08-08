<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Clients · DonutsTec</title>
    <!-- Bootstrap 5.3 + Icons + AOS + DataTables + Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
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
        .stat-card { background: white; border-radius: 20px; padding: 20px; box-shadow: var(--shadow-sm); transition: 0.3s; border-left: 4px solid var(--primary); }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .stat-card .number { font-size: 2rem; font-weight: 700; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; }
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }
        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .status-inactive { background: #fce4ec; color: #c62828; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        .client-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; }
        .client-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .client-card .avatar { width: 56px; height: 56px; border-radius: 50%; object-fit: cover; }
        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .detail-card .avatar-large { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid white; box-shadow: var(--shadow-sm); }
        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }
        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.9rem; }
            .topbar { padding: 12px 16px; }
            .detail-card { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <?php require "views/partials/admin/sidebar.php"; ?>

            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-9 px-0">
                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">Client Management</h5>
                        <small class="text-muted">Manage all client accounts and information</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addClientModal">
                            <i class="fas fa-plus me-2"></i>Add Client
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">84</div><div class="label">Total Clients</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">62</div><div class="label">Active</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">15</div><div class="label">Pending</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#dc2626;"><div class="number">7</div><div class="label">Inactive</div></div>
                        </div>
                    </div>

                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Clients</button>
                                <button class="filter-btn" data-filter="active">Active</button>
                                <button class="filter-btn" data-filter="pending">Pending</button>
                                <button class="filter-btn" data-filter="inactive">Inactive</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="clientSearch" class="form-control" placeholder="Search clients..." />
                            </div>
                        </div>
                    </div>

                    <!-- Client List -->
                    <div class="mt-3" id="clientList">
                        <div class="row g-3" id="clientContainer">
                            <!-- Client 1 -->
                            <div class="col-md-4 client-item" data-status="active">
                                <div class="client-card p-3" data-client="1">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">John Doe</h6>
                                            <p class="small text-muted mb-0">TechCorp GmbH</p>
                                            <span class="status-badge status-active">Active</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Client 2 -->
                            <div class="col-md-4 client-item" data-status="active">
                                <div class="client-card p-3" data-client="2">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">Sarah Smith</h6>
                                            <p class="small text-muted mb-0">HealthPlus</p>
                                            <span class="status-badge status-active">Active</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Client 3 -->
                            <div class="col-md-4 client-item" data-status="pending">
                                <div class="client-card p-3" data-client="3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">Mike Johnson</h6>
                                            <p class="small text-muted mb-0">EduTech</p>
                                            <span class="status-badge status-pending">Pending</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Client 4 -->
                            <div class="col-md-4 client-item" data-status="active">
                                <div class="client-card p-3" data-client="4">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">Emily Chen</h6>
                                            <p class="small text-muted mb-0">DataCorp</p>
                                            <span class="status-badge status-active">Active</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Client 5 -->
                            <div class="col-md-4 client-item" data-status="inactive">
                                <div class="client-card p-3" data-client="5">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">Robert Wilson</h6>
                                            <p class="small text-muted mb-0">StartupX</p>
                                            <span class="status-badge status-inactive">Inactive</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Client 6 -->
                            <div class="col-md-4 client-item" data-status="pending">
                                <div class="client-card p-3" data-client="6">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://via.placeholder.com/56" class="avatar" alt="Client" />
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0">Anna Martinez</h6>
                                            <p class="small text-muted mb-0">ServicePro</p>
                                            <span class="status-badge status-pending">Pending</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-client">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CLIENT DETAIL VIEW -->
                    <div id="clientDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToClients">
                                <i class="fas fa-arrow-left me-2"></i>Back to Clients
                            </button>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="https://via.placeholder.com/100" class="avatar-large" alt="Client" />
                                    <h5 id="detailName" class="mt-3 fw-bold">John Doe</h5>
                                    <p id="detailCompany" class="text-muted">TechCorp GmbH</p>
                                    <span id="detailStatus" class="status-badge status-active">Active</span>
                                    <div class="mt-3 d-flex justify-content-center gap-2">
                                        <button class="btn btn-primary btn-sm rounded-pill px-3"><i class="fas fa-edit me-1"></i>Edit</button>
                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="fas fa-trash me-1"></i>Delete</button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Contact Information</h6>
                                            <p><strong>Email:</strong> <span id="detailEmail">john@techcorp.com</span></p>
                                            <p><strong>Phone:</strong> <span id="detailPhone">+49 30 1234567</span></p>
                                            <p><strong>Address:</strong> <span id="detailAddress">123 Tech Street, Berlin</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Account Details</h6>
                                            <p><strong>Client Since:</strong> <span id="detailSince">Jan 15, 2025</span></p>
                                            <p><strong>Projects:</strong> <span id="detailProjects">3 Active</span></p>
                                            <p><strong>Total Spent:</strong> <span id="detailSpent">$45,000</span></p>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="fw-bold">Projects</h6>
                                            <ul id="detailProjectList">
                                                <li>E-Commerce Platform (In Progress)</li>
                                                <li>Website Redesign (Completed)</li>
                                                <li>Mobile App Development (Planning)</li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="fw-bold">Recent Activity</h6>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Paid invoice #INV-2025-003</span>
                                                <small class="text-muted">May 10, 2025</small>
                                            </div>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Created support ticket #T-2025-001</span>
                                                <small class="text-muted">May 8, 2025</small>
                                            </div>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Project update: E-Commerce Platform</span>
                                                <small class="text-muted">May 5, 2025</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD CLIENT MODAL -->
    <div class="modal fade" id="addClientModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-user-plus text-primary me-2"></i>Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name" /></div>
                            <div class="col-md-6"><input type="email" class="form-control" placeholder="Email" /></div>
                            <div class="col-md-6"><input type="tel" class="form-control" placeholder="Phone" /></div>
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Company" /></div>
                            <div class="col-12"><input type="text" class="form-control" placeholder="Address" /></div>
                            <div class="col-12">
                                <select class="form-select">
                                    <option selected>Status</option>
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <div class="col-12"><textarea class="form-control" rows="3" placeholder="Notes"></textarea></div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Add Client</button></div>
                        </div>
                    </form>
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

        // Client data for detail view
        const clientData = {
            1: {
                name: 'John Doe',
                company: 'TechCorp GmbH',
                status: 'active',
                statusLabel: 'Active',
                email: 'john@techcorp.com',
                phone: '+49 30 1234567',
                address: '123 Tech Street, Berlin',
                since: 'Jan 15, 2025',
                projects: '3 Active',
                spent: '$45,000',
                projectList: ['E-Commerce Platform (In Progress)', 'Website Redesign (Completed)', 'Mobile App Development (Planning)']
            },
            2: {
                name: 'Sarah Smith',
                company: 'HealthPlus',
                status: 'active',
                statusLabel: 'Active',
                email: 'sarah@healthplus.com',
                phone: '+49 30 7654321',
                address: '456 Health Ave, Berlin',
                since: 'Mar 10, 2025',
                projects: '2 Active',
                spent: '$28,000',
                projectList: ['Healthcare Portal (Completed)', 'Patient App (In Progress)']
            },
            3: {
                name: 'Mike Johnson',
                company: 'EduTech',
                status: 'pending',
                statusLabel: 'Pending',
                email: 'mike@edutech.com',
                phone: '+49 30 9876543',
                address: '789 Education Blvd, Berlin',
                since: 'Apr 5, 2025',
                projects: '1 Active',
                spent: '$8,000',
                projectList: ['School Management System (In Progress)']
            },
            4: {
                name: 'Emily Chen',
                company: 'DataCorp',
                status: 'active',
                statusLabel: 'Active',
                email: 'emily@datacorp.com',
                phone: '+49 30 4567890',
                address: '321 Data Lane, Berlin',
                since: 'Feb 20, 2025',
                projects: '4 Active',
                spent: '$62,000',
                projectList: ['API Development (Completed)', 'Data Analytics Platform (In Progress)', 'Cloud Migration (In Progress)']
            },
            5: {
                name: 'Robert Wilson',
                company: 'StartupX',
                status: 'inactive',
                statusLabel: 'Inactive',
                email: 'robert@startupx.com',
                phone: '+49 30 7890123',
                address: '654 Startup St, Berlin',
                since: 'Jan 5, 2025',
                projects: '0',
                spent: '$12,000',
                projectList: ['Mobile App Development (Cancelled)']
            },
            6: {
                name: 'Anna Martinez',
                company: 'ServicePro',
                status: 'pending',
                statusLabel: 'Pending',
                email: 'anna@servicepro.com',
                phone: '+49 30 2345678',
                address: '987 Service Rd, Berlin',
                since: 'May 1, 2025',
                projects: '1 Active',
                spent: '$3,500',
                projectList: ['AI Customer Support (Planning)']
            }
        };

        // View client detail
        document.querySelectorAll('.view-client').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.client-card');
                const clientId = card.dataset.client;
                showClientDetail(clientId);
            });
        });

        // Click on card to view detail
        document.querySelectorAll('.client-card').forEach(card => {
            card.addEventListener('click', function() {
                const clientId = this.dataset.client;
                showClientDetail(clientId);
            });
        });

        function showClientDetail(clientId) {
            const data = clientData[clientId];
            if (!data) return;

            document.getElementById('detailName').textContent = data.name;
            document.getElementById('detailCompany').textContent = data.company;
            document.getElementById('detailEmail').textContent = data.email;
            document.getElementById('detailPhone').textContent = data.phone;
            document.getElementById('detailAddress').textContent = data.address;
            document.getElementById('detailSince').textContent = data.since;
            document.getElementById('detailProjects').textContent = data.projects;
            document.getElementById('detailSpent').textContent = data.spent;

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.statusLabel;
            statusBadge.className = 'status-badge status-' + data.status;

            // Update project list
            const projectList = document.getElementById('detailProjectList');
            projectList.innerHTML = '';
            data.projectList.forEach(project => {
                const li = document.createElement('li');
                li.textContent = project;
                projectList.appendChild(li);
            });

            // Show detail, hide list
            document.getElementById('clientList').style.display = 'none';
            document.getElementById('clientDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to clients
        document.getElementById('backToClients').addEventListener('click', function() {
            document.getElementById('clientList').style.display = 'block';
            document.getElementById('clientDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const clients = document.querySelectorAll('.client-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                clients.forEach(client => {
                    if (filter === 'all' || client.dataset.status === filter) {
                        client.style.display = 'block';
                    } else {
                        client.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        document.getElementById('clientSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            clients.forEach(client => {
                const name = client.querySelector('h6')?.textContent.toLowerCase() || '';
                const company = client.querySelector('p')?.textContent.toLowerCase() || '';
                if (name.includes(query) || company.includes(query)) {
                    client.style.display = 'block';
                } else {
                    client.style.display = 'none';
                }
            });
        });

        // Dummy interactions
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('text-danger')) return;
                // e.preventDefault();
                document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Modal form submission
        document.querySelector('#addClientModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Client added successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addClientModal'));
            modal.hide();
            this.reset();
        });
        
    </script>
</body>
</html>