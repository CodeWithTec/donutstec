<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Users · DonutsTec</title>
    <!-- Bootstrap 5.3 + Icons + AOS + DataTables -->
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
        .sidebar .nav-link .badge { float: right; }
        .topbar { background: white; padding: 16px 24px; box-shadow: var(--shadow-sm); position: sticky; top: 0; z-index: 99; }
        .stat-card { background: white; border-radius: 20px; padding: 20px; box-shadow: var(--shadow-sm); transition: 0.3s; border-left: 4px solid var(--primary); }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .stat-card .number { font-size: 2rem; font-weight: 700; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; }
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }
        .role-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .role-superadmin { background: #fef3c7; color: #92400e; }
        .role-admin { background: #dbeafe; color: #1e40af; }
        .role-agent { background: #d1fae5; color: #065f46; }
        .role-developer { background: #e0e7ff; color: #3730a3; }
        .role-client { background: #fce4ec; color: #9a3412; }
        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-inactive { background: #fce4ec; color: #c62828; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        .user-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; }
        .user-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .user-card .avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .detail-card .avatar-large { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid white; box-shadow: var(--shadow-sm); }
        .activity-item { border-bottom: 1px solid #f3f4f6; padding: 8px 0; }
        .activity-item:last-child { border-bottom: 0; }
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
            <?php require 'views/partials/admin/sidebar.php'; ?>
            <!-- MAIN CONTENT -->
            <div class="col-lg-10 col-md-9 px-0">
                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0">User Management</h5>
                        <small class="text-muted">Manage all users, roles, and permissions</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus me-2"></i>Add User
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">48</div><div class="label">Total Users</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">32</div><div class="label">Active</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">10</div><div class="label">Pending</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#dc2626;"><div class="number">6</div><div class="label">Inactive</div></div>
                        </div>
                    </div>

                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Users</button>
                                <button class="filter-btn" data-filter="active">Active</button>
                                <button class="filter-btn" data-filter="pending">Pending</button>
                                <button class="filter-btn" data-filter="inactive">Inactive</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="userSearch" class="form-control" placeholder="Search users..." />
                            </div>
                        </div>
                    </div>

                    <!-- User List -->
                    <div class="mt-3" id="userList">
                        <div class="dashboard-card">
                            <div class="table-responsive">
                                <table id="usersTable" class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Joined</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userContainer">
                                        <tr class="user-item" data-status="active">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">John Doe</span>
                                                </div>
                                            </td>
                                            <td>john@techcorp.com</td>
                                            <td><span class="role-badge role-client">Client</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>Jan 15, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="1">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="active">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Sarah Smith</span>
                                                </div>
                                            </td>
                                            <td>sarah@healthplus.com</td>
                                            <td><span class="role-badge role-admin">Admin</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>Mar 10, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="2">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="pending">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Mike Johnson</span>
                                                </div>
                                            </td>
                                            <td>mike@edutech.com</td>
                                            <td><span class="role-badge role-client">Client</span></td>
                                            <td><span class="status-badge status-pending">Pending</span></td>
                                            <td>Apr 5, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="3">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="active">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Emily Chen</span>
                                                </div>
                                            </td>
                                            <td>emily@datacorp.com</td>
                                            <td><span class="role-badge role-developer">Developer</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>Feb 20, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="4">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="inactive">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Robert Wilson</span>
                                                </div>
                                            </td>
                                            <td>robert@startupx.com</td>
                                            <td><span class="role-badge role-client">Client</span></td>
                                            <td><span class="status-badge status-inactive">Inactive</span></td>
                                            <td>Jan 5, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="5">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="active">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Anna Martinez</span>
                                                </div>
                                            </td>
                                            <td>anna@servicepro.com</td>
                                            <td><span class="role-badge role-agent">Support Agent</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>May 1, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="6">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="pending">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">David Kim</span>
                                                </div>
                                            </td>
                                            <td>david@techinnovate.com</td>
                                            <td><span class="role-badge role-developer">Developer</span></td>
                                            <td><span class="status-badge status-pending">Pending</span></td>
                                            <td>May 12, 2025</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="7">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                        <tr class="user-item" data-status="active">
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://via.placeholder.com/36" class="rounded-circle" />
                                                    <span class="fw-semibold">Lisa Park</span>
                                                </div>
                                            </td>
                                            <td>lisa@designstudio.com</td>
                                            <td><span class="role-badge role-superadmin">Super Admin</span></td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>Dec 1, 2024</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-user" data-user="8">View</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Edit</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- USER DETAIL VIEW -->
                    <div id="userDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToUsers">
                                <i class="fas fa-arrow-left me-2"></i>Back to Users
                            </button>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="https://via.placeholder.com/100" class="avatar-large" alt="User" />
                                    <h5 id="detailName" class="mt-3 fw-bold">John Doe</h5>
                                    <p id="detailEmail" class="text-muted">john@techcorp.com</p>
                                    <span id="detailRole" class="role-badge role-client">Client</span>
                                    <span id="detailStatus" class="status-badge status-active ms-2">Active</span>
                                    <div class="mt-3 d-flex justify-content-center gap-2">
                                        <button class="btn btn-primary btn-sm rounded-pill px-3"><i class="fas fa-edit me-1"></i>Edit</button>
                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="fas fa-trash me-1"></i>Delete</button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Account Details</h6>
                                            <p><strong>User ID:</strong> <span id="detailId">#USR-001</span></p>
                                            <p><strong>Joined:</strong> <span id="detailJoined">Jan 15, 2025</span></p>
                                            <p><strong>Last Login:</strong> <span id="detailLastLogin">Today, 9:30 AM</span></p>
                                            <p><strong>Status:</strong> <span id="detailStatusText" class="status-badge status-active">Active</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Contact Information</h6>
                                            <p><strong>Phone:</strong> <span id="detailPhone">+49 30 1234567</span></p>
                                            <p><strong>Company:</strong> <span id="detailCompany">TechCorp GmbH</span></p>
                                            <p><strong>Position:</strong> <span id="detailPosition">CTO</span></p>
                                            <p><strong>Role:</strong> <span id="detailRoleText" class="role-badge role-client">Client</span></p>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="fw-bold">Recent Activity</h6>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Logged in to dashboard</span>
                                                <small class="text-muted">Today, 9:30 AM</small>
                                            </div>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Paid invoice #INV-2025-003</span>
                                                <small class="text-muted">May 10, 2025</small>
                                            </div>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Created support ticket #T-2025-001</span>
                                                <small class="text-muted">May 8, 2025</small>
                                            </div>
                                            <div class="activity-item d-flex justify-content-between">
                                                <span>Updated profile information</span>
                                                <small class="text-muted">May 3, 2025</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="fw-bold">Permissions</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark p-2"><i class="fas fa-check-circle text-success me-1"></i>View Projects</span>
                                                <span class="badge bg-light text-dark p-2"><i class="fas fa-check-circle text-success me-1"></i>Create Tickets</span>
                                                <span class="badge bg-light text-dark p-2"><i class="fas fa-check-circle text-success me-1"></i>View Invoices</span>
                                                <span class="badge bg-light text-dark p-2"><i class="fas fa-times-circle text-danger me-1"></i>Manage Users</span>
                                                <span class="badge bg-light text-dark p-2"><i class="fas fa-times-circle text-danger me-1"></i>Delete Projects</span>
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

    <!-- ADD USER MODAL -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-user-plus text-primary me-2"></i>Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="row g-3">
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name" required /></div>
                            <div class="col-md-6"><input type="email" class="form-control" placeholder="Email" required /></div>
                            <div class="col-md-6"><input type="tel" class="form-control" placeholder="Phone" /></div>
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Company" /></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option selected>Select Role</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Support Agent</option>
                                    <option>Developer</option>
                                    <option>Client</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option selected>Status</option>
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6"><input type="password" class="form-control" placeholder="Password" required /></div>
                            <div class="col-md-6"><input type="password" class="form-control" placeholder="Confirm Password" required /></div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Create User</button></div>
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

        // DataTable initialization
        $(document).ready(function() {
            $('#usersTable').DataTable({
                pageLength: 5,
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf'],
                ordering: true,
                columnDefs: [
                    { orderable: false, targets: 5 }
                ]
            });
        });

        // User data for detail view
        const userData = {
            1: {
                name: 'John Doe',
                email: 'john@techcorp.com',
                role: 'Client',
                roleClass: 'role-client',
                status: 'Active',
                statusClass: 'status-active',
                id: '#USR-001',
                joined: 'Jan 15, 2025',
                lastLogin: 'Today, 9:30 AM',
                phone: '+49 30 1234567',
                company: 'TechCorp GmbH',
                position: 'CTO'
            },
            2: {
                name: 'Sarah Smith',
                email: 'sarah@healthplus.com',
                role: 'Admin',
                roleClass: 'role-admin',
                status: 'Active',
                statusClass: 'status-active',
                id: '#USR-002',
                joined: 'Mar 10, 2025',
                lastLogin: 'Yesterday, 4:15 PM',
                phone: '+49 30 7654321',
                company: 'HealthPlus',
                position: 'Operations Manager'
            },
            3: {
                name: 'Mike Johnson',
                email: 'mike@edutech.com',
                role: 'Client',
                roleClass: 'role-client',
                status: 'Pending',
                statusClass: 'status-pending',
                id: '#USR-003',
                joined: 'Apr 5, 2025',
                lastLogin: 'Never',
                phone: '+49 30 9876543',
                company: 'EduTech',
                position: 'CEO'
            },
            4: {
                name: 'Emily Chen',
                email: 'emily@datacorp.com',
                role: 'Developer',
                roleClass: 'role-developer',
                status: 'Active',
                statusClass: 'status-active',
                id: '#USR-004',
                joined: 'Feb 20, 2025',
                lastLogin: 'Today, 11:20 AM',
                phone: '+49 30 4567890',
                company: 'DataCorp',
                position: 'Senior Developer'
            },
            5: {
                name: 'Robert Wilson',
                email: 'robert@startupx.com',
                role: 'Client',
                roleClass: 'role-client',
                status: 'Inactive',
                statusClass: 'status-inactive',
                id: '#USR-005',
                joined: 'Jan 5, 2025',
                lastLogin: 'Apr 28, 2025',
                phone: '+49 30 7890123',
                company: 'StartupX',
                position: 'Founder'
            },
            6: {
                name: 'Anna Martinez',
                email: 'anna@servicepro.com',
                role: 'Support Agent',
                roleClass: 'role-agent',
                status: 'Active',
                statusClass: 'status-active',
                id: '#USR-006',
                joined: 'May 1, 2025',
                lastLogin: 'Today, 8:45 AM',
                phone: '+49 30 2345678',
                company: 'ServicePro',
                position: 'Support Lead'
            },
            7: {
                name: 'David Kim',
                email: 'david@techinnovate.com',
                role: 'Developer',
                roleClass: 'role-developer',
                status: 'Pending',
                statusClass: 'status-pending',
                id: '#USR-007',
                joined: 'May 12, 2025',
                lastLogin: 'Never',
                phone: '+49 30 3456789',
                company: 'TechInnovate',
                position: 'Full-Stack Developer'
            },
            8: {
                name: 'Lisa Park',
                email: 'lisa@designstudio.com',
                role: 'Super Admin',
                roleClass: 'role-superadmin',
                status: 'Active',
                statusClass: 'status-active',
                id: '#USR-008',
                joined: 'Dec 1, 2024',
                lastLogin: 'Today, 10:00 AM',
                phone: '+49 30 4567890',
                company: 'DesignStudio',
                position: 'Director'
            }
        };

        // View user detail
        document.querySelectorAll('.view-user').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const userId = this.dataset.user;
                showUserDetail(userId);
            });
        });

        function showUserDetail(userId) {
            const data = userData[userId];
            if (!data) return;

            document.getElementById('detailName').textContent = data.name;
            document.getElementById('detailEmail').textContent = data.email;
            document.getElementById('detailId').textContent = data.id;
            document.getElementById('detailJoined').textContent = data.joined;
            document.getElementById('detailLastLogin').textContent = data.lastLogin;
            document.getElementById('detailPhone').textContent = data.phone;
            document.getElementById('detailCompany').textContent = data.company;
            document.getElementById('detailPosition').textContent = data.position;

            // Update role
            const roleBadge = document.getElementById('detailRole');
            roleBadge.textContent = data.role;
            roleBadge.className = 'role-badge ' + data.roleClass;

            const roleText = document.getElementById('detailRoleText');
            roleText.textContent = data.role;
            roleText.className = 'role-badge ' + data.roleClass;

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.status;
            statusBadge.className = 'status-badge ' + data.statusClass;

            const statusText = document.getElementById('detailStatusText');
            statusText.textContent = data.status;
            statusText.className = 'status-badge ' + data.statusClass;

            // Show detail, hide list
            document.getElementById('userList').style.display = 'none';
            document.getElementById('userDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to users
        document.getElementById('backToUsers').addEventListener('click', function() {
            document.getElementById('userList').style.display = 'block';
            document.getElementById('userDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const users = document.querySelectorAll('.user-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                users.forEach(user => {
                    if (filter === 'all' || user.dataset.status === filter) {
                        user.style.display = 'table-row';
                    } else {
                        user.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        document.getElementById('userSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            users.forEach(user => {
                const text = user.textContent.toLowerCase();
                if (text.includes(query)) {
                    user.style.display = 'table-row';
                } else {
                    user.style.display = 'none';
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

        // Add user form submission
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('User created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
            this.reset();
        });

        // Edit buttons in user list
        document.querySelectorAll('.user-item .btn-outline-secondary').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                alert('Edit user functionality (demo)');
            });
        });

        // Delete button in detail view
        document.querySelector('.detail-card .btn-outline-danger')?.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this user?')) {
                alert('User deleted successfully!');
                document.getElementById('backToUsers').click();
            }
        });
    </script>
</body>
</html>