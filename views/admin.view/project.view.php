<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Projects · DonutsTec</title>
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
        .status-inprogress { background: #dbeafe; color: #1d4ed8; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-onhold { background: #fef3c7; color: #b45309; }
        .status-planning { background: #f3e8ff; color: #6d28d9; }
        .status-cancelled { background: #fce4ec; color: #c62828; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        .project-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; }
        .project-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .project-card .progress { height: 6px; border-radius: 10px; background: #e5e7eb; }
        .project-card .progress .progress-bar { border-radius: 10px; }
        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .detail-card .task-item { border-bottom: 1px solid #f3f4f6; padding: 10px 0; }
        .detail-card .task-item:last-child { border-bottom: 0; }
        .detail-card .task-check { width: 20px; height: 20px; border-radius: 6px; border: 2px solid #d1d5db; margin-right: 12px; cursor: pointer; display: inline-block; }
        .detail-card .task-check.done { background: var(--primary); border-color: var(--primary); position: relative; }
        .detail-card .task-check.done::after { content: '✓'; color: white; position: absolute; top: -2px; left: 3px; font-size: 14px; }
        .team-avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid white; margin-left: -8px; }
        .team-avatar:first-child { margin-left: 0; }
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
               <?php require 'views/partials/admin/navbar.php'; ?>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">156</div><div class="label">Total Projects</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">45</div><div class="label">Active</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">28</div><div class="label">Completed</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;"><div class="number">12</div><div class="label">On Hold</div></div>
                        </div>
                    </div>

                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Projects</button>
                                <button class="filter-btn" data-filter="active">Active</button>
                                <button class="filter-btn" data-filter="inprogress">In Progress</button>
                                <button class="filter-btn" data-filter="completed">Completed</button>
                                <button class="filter-btn" data-filter="onhold">On Hold</button>
                                <button class="filter-btn" data-filter="planning">Planning</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="projectSearch" class="form-control" placeholder="Search projects..." />
                            </div>
                        </div>
                    </div>

                    <!-- Project List -->
                    <div class="mt-3" id="projectList">
                        <div class="row g-3" id="projectContainer">
                            <!-- Project 1 -->
                            <div class="col-md-4 project-item" data-status="inprogress">
                                <div class="project-card p-3" data-project="1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">E-Commerce Platform</h6>
                                        <span class="status-badge status-inprogress">In Progress</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: RetailCo</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:75%;"></div></div>
                                        <small>75% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:32px;">+3</span>
                                        </div>
                                        <small class="text-muted">Due: Jun 30, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>

                            <!-- Project 2 -->
                            <div class="col-md-4 project-item" data-status="active">
                                <div class="project-card p-3" data-project="2">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">School Management</h6>
                                        <span class="status-badge status-active">Active</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: EduTech</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:30%;"></div></div>
                                        <small>30% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:32px;">+2</span>
                                        </div>
                                        <small class="text-muted">Due: Aug 15, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>

                            <!-- Project 3 -->
                            <div class="col-md-4 project-item" data-status="completed">
                                <div class="project-card p-3" data-project="3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">Healthcare Portal</h6>
                                        <span class="status-badge status-completed">Completed</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: HealthPlus</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:100%; background:#22c55e;"></div></div>
                                        <small>100% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                        </div>
                                        <small class="text-muted">Completed: May 10, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>

                            <!-- Project 4 -->
                            <div class="col-md-4 project-item" data-status="onhold">
                                <div class="project-card p-3" data-project="4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">API Development</h6>
                                        <span class="status-badge status-onhold">On Hold</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: DataCorp</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:60%; background:#f59e0b;"></div></div>
                                        <small>60% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                        </div>
                                        <small class="text-muted">Due: Jul 15, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>

                            <!-- Project 5 -->
                            <div class="col-md-4 project-item" data-status="planning">
                                <div class="project-card p-3" data-project="5">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">Mobile App Development</h6>
                                        <span class="status-badge status-planning">Planning</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: StartupX</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:5%;"></div></div>
                                        <small>5% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:32px;">+4</span>
                                        </div>
                                        <small class="text-muted">Due: Oct 30, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>

                            <!-- Project 6 -->
                            <div class="col-md-4 project-item" data-status="active">
                                <div class="project-card p-3" data-project="6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="fw-bold mb-0">AI Customer Support</h6>
                                        <span class="status-badge status-active">Active</span>
                                    </div>
                                    <p class="small text-muted mt-1">Client: ServicePro</p>
                                    <div class="mb-2">
                                        <div class="progress"><div class="progress-bar" style="width:45%;"></div></div>
                                        <small>45% Complete</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                            <img src="https://via.placeholder.com/32" class="team-avatar" alt="Team" />
                                        </div>
                                        <small class="text-muted">Due: Sep 15, 2025</small>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2 view-project">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PROJECT DETAIL VIEW -->
                    <div id="projectDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToProjects">
                                <i class="fas fa-arrow-left me-2"></i>Back to Projects
                            </button>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 id="detailTitle" class="fw-bold">E-Commerce Platform</h4>
                                    <p id="detailClient" class="text-muted">Client: RetailCo</p>
                                    <div class="d-flex gap-2 mb-3">
                                        <span id="detailStatus" class="status-badge status-inprogress">In Progress</span>
                                        <span id="detailPriority" class="badge bg-primary">Priority: High</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <span>Progress</span>
                                            <span id="detailProgress">75%</span>
                                        </div>
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar" id="detailProgressBar" style="width:75%;"></div>
                                        </div>
                                    </div>
                                    <p id="detailDescription" class="text-muted">Full-featured e-commerce platform with payment gateway integration, inventory management, and real-time analytics dashboard.</p>
                                    
                                    <h6 class="fw-bold mt-3">Technologies</h6>
                                    <div id="detailTech">
                                        <span class="badge bg-light text-dark me-1 p-2">React</span>
                                        <span class="badge bg-light text-dark me-1 p-2">Node.js</span>
                                        <span class="badge bg-light text-dark me-1 p-2">Stripe</span>
                                        <span class="badge bg-light text-dark me-1 p-2">MongoDB</span>
                                    </div>

                                    <h6 class="fw-bold mt-3">Milestones</h6>
                                    <div id="detailMilestones">
                                        <div class="task-item d-flex align-items-center">
                                            <div class="task-check done"></div>
                                            <span>Project Kickoff (Apr 1, 2025)</span>
                                        </div>
                                        <div class="task-item d-flex align-items-center">
                                            <div class="task-check done"></div>
                                            <span>Design Phase Complete (Apr 20, 2025)</span>
                                        </div>
                                        <div class="task-item d-flex align-items-center">
                                            <div class="task-check" style="background:var(--accent);border-color:var(--accent);"></div>
                                            <span>Development Phase (In Progress)</span>
                                        </div>
                                        <div class="task-item d-flex align-items-center">
                                            <div class="task-check"></div>
                                            <span>Testing Phase (Pending)</span>
                                        </div>
                                        <div class="task-item d-flex align-items-center">
                                            <div class="task-check"></div>
                                            <span>Deployment (Pending)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-light p-3 rounded-4">
                                        <h6 class="fw-bold">Team</h6>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <div class="d-flex align-items-center"><img src="https://via.placeholder.com/28" class="rounded-circle me-2" /> Sarah Johnson (PM)</div>
                                            <div class="d-flex align-items-center"><img src="https://via.placeholder.com/28" class="rounded-circle me-2" /> Mike Chen (Dev)</div>
                                            <div class="d-flex align-items-center"><img src="https://via.placeholder.com/28" class="rounded-circle me-2" /> Lisa Park (Design)</div>
                                            <div class="d-flex align-items-center"><img src="https://via.placeholder.com/28" class="rounded-circle me-2" /> Tom Wagner (QA)</div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex flex-column gap-2">
                                        <button class="btn btn-primary rounded-pill"><i class="fas fa-edit me-2"></i>Edit Project</button>
                                        <button class="btn btn-outline-secondary rounded-pill"><i class="fas fa-users me-2"></i>Manage Team</button>
                                        <button class="btn btn-outline-secondary rounded-pill"><i class="fas fa-ticket-alt me-2"></i>View Tickets</button>
                                        <button class="btn btn-outline-danger rounded-pill"><i class="fas fa-trash me-2"></i>Delete Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD PROJECT MODAL -->
    <div class="modal fade" id="addProjectModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i>Create New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Project Name" /></div>
                            <div class="col-md-6">
                                <select class="form-select"><option>Select Client</option><option>RetailCo</option><option>EduTech</option><option>HealthPlus</option><option>DataCorp</option></select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select"><option>Status</option><option>Active</option><option>In Progress</option><option>Planning</option><option>On Hold</option></select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select"><option>Priority</option><option>Low</option><option>Medium</option><option>High</option><option>Critical</option></select>
                            </div>
                            <div class="col-md-6"><input type="date" class="form-control" placeholder="Start Date" /></div>
                            <div class="col-md-6"><input type="date" class="form-control" placeholder="Due Date" /></div>
                            <div class="col-12"><input type="text" class="form-control" placeholder="Technologies (comma separated)" /></div>
                            <div class="col-12"><textarea class="form-control" rows="3" placeholder="Project Description"></textarea></div>
                            <div class="col-12"><input type="file" class="form-control" multiple accept="image/*" /></div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Create Project</button></div>
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

        // Project data for detail view
        const projectData = {
            1: {
                title: 'E-Commerce Platform',
                client: 'RetailCo',
                status: 'inprogress',
                statusLabel: 'In Progress',
                priority: 'High',
                progress: 75,
                description: 'Full-featured e-commerce platform with payment gateway integration, inventory management, and real-time analytics dashboard.',
                tech: ['React', 'Node.js', 'Stripe', 'MongoDB'],
                milestones: [
                    { text: 'Project Kickoff (Apr 1, 2025)', done: true },
                    { text: 'Design Phase Complete (Apr 20, 2025)', done: true },
                    { text: 'Development Phase (In Progress)', done: false, inprogress: true },
                    { text: 'Testing Phase (Pending)', done: false },
                    { text: 'Deployment (Pending)', done: false }
                ],
                team: ['Sarah Johnson (PM)', 'Mike Chen (Dev)', 'Lisa Park (Design)', 'Tom Wagner (QA)']
            },
            2: {
                title: 'School Management System',
                client: 'EduTech',
                status: 'active',
                statusLabel: 'Active',
                priority: 'Medium',
                progress: 30,
                description: 'Complete student records management with attendance tracking, grade books, and parent communication portal.',
                tech: ['Laravel', 'Vue.js', 'MySQL', 'Redis'],
                milestones: [
                    { text: 'Project Kickoff (May 1, 2025)', done: true },
                    { text: 'Design Phase (In Progress)', done: false, inprogress: true },
                    { text: 'Development Phase (Pending)', done: false },
                    { text: 'Testing Phase (Pending)', done: false },
                    { text: 'Deployment (Pending)', done: false }
                ],
                team: ['Rachel Green (PM)', 'Mike Chen (Dev)', 'Lisa Park (Design)']
            },
            3: {
                title: 'Healthcare Portal',
                client: 'HealthPlus',
                status: 'completed',
                statusLabel: 'Completed',
                priority: 'High',
                progress: 100,
                description: 'Patient appointment booking system with telemedicine capabilities and electronic health records management.',
                tech: ['React Native', 'Django', 'PostgreSQL', 'AWS'],
                milestones: [
                    { text: 'Project Kickoff (Jan 15, 2025)', done: true },
                    { text: 'Design Phase Complete (Feb 10, 2025)', done: true },
                    { text: 'Development Phase Complete (Apr 15, 2025)', done: true },
                    { text: 'Testing Phase Complete (May 5, 2025)', done: true },
                    { text: 'Deployment Complete (May 10, 2025)', done: true }
                ],
                team: ['Sarah Johnson (PM)', 'Mike Chen (Dev)', 'Lisa Park (Design)', 'Tom Wagner (QA)']
            },
            4: {
                title: 'API Development',
                client: 'DataCorp',
                status: 'onhold',
                statusLabel: 'On Hold',
                priority: 'Low',
                progress: 60,
                description: 'RESTful API development for third-party integration with comprehensive documentation and authentication.',
                tech: ['Node.js', 'Express', 'PostgreSQL', 'JWT'],
                milestones: [
                    { text: 'Project Kickoff (Mar 1, 2025)', done: true },
                    { text: 'Design Phase Complete (Mar 20, 2025)', done: true },
                    { text: 'Development Phase (On Hold)', done: false, inprogress: false },
                    { text: 'Testing Phase (Pending)', done: false },
                    { text: 'Deployment (Pending)', done: false }
                ],
                team: ['Mike Chen (Dev)', 'Tom Wagner (QA)']
            },
            5: {
                title: 'Mobile App Development',
                client: 'StartupX',
                status: 'planning',
                statusLabel: 'Planning',
                priority: 'Medium',
                progress: 5,
                description: 'Cross-platform mobile application for iOS and Android with offline capabilities and push notifications.',
                tech: ['Flutter', 'Firebase', 'Node.js', 'MongoDB'],
                milestones: [
                    { text: 'Project Kickoff (Jun 1, 2025)', done: true },
                    { text: 'Design Phase (Planning)', done: false, inprogress: false },
                    { text: 'Development Phase (Pending)', done: false },
                    { text: 'Testing Phase (Pending)', done: false },
                    { text: 'Deployment (Pending)', done: false }
                ],
                team: ['Rachel Green (PM)', 'Lisa Park (Design)']
            },
            6: {
                title: 'AI Customer Support',
                client: 'ServicePro',
                status: 'active',
                statusLabel: 'Active',
                priority: 'High',
                progress: 45,
                description: 'AI-powered chatbot and support automation system with natural language processing and sentiment analysis.',
                tech: ['Python', 'TensorFlow', 'React', 'Node.js', 'PostgreSQL'],
                milestones: [
                    { text: 'Project Kickoff (Apr 15, 2025)', done: true },
                    { text: 'Design Phase (In Progress)', done: false, inprogress: true },
                    { text: 'Development Phase (In Progress)', done: false, inprogress: true },
                    { text: 'Testing Phase (Pending)', done: false },
                    { text: 'Deployment (Pending)', done: false }
                ],
                team: ['Sarah Johnson (PM)', 'Mike Chen (Dev)', 'Lisa Park (Design)', 'Tom Wagner (QA)']
            }
        };

        // View project detail
        document.querySelectorAll('.view-project').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.project-card');
                const projectId = card.dataset.project;
                showProjectDetail(projectId);
            });
        });

        // Click on card to view detail
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('click', function() {
                const projectId = this.dataset.project;
                showProjectDetail(projectId);
            });
        });

        function showProjectDetail(projectId) {
            const data = projectData[projectId];
            if (!data) return;

            document.getElementById('detailTitle').textContent = data.title;
            document.getElementById('detailClient').textContent = 'Client: ' + data.client;
            document.getElementById('detailDescription').textContent = data.description;
            document.getElementById('detailProgress').textContent = data.progress + '%';
            document.getElementById('detailProgressBar').style.width = data.progress + '%';

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.statusLabel;
            statusBadge.className = 'status-badge status-' + data.status;

            // Update priority
            const priorityBadge = document.getElementById('detailPriority');
            priorityBadge.textContent = 'Priority: ' + data.priority;
            priorityBadge.className = 'badge ' + (data.priority === 'Critical' ? 'bg-danger' : 
                                        data.priority === 'High' ? 'bg-warning text-dark' :
                                        data.priority === 'Medium' ? 'bg-info text-dark' : 'bg-secondary');

            // Update technologies
            const techContainer = document.getElementById('detailTech');
            techContainer.innerHTML = '';
            data.tech.forEach(tech => {
                const badge = document.createElement('span');
                badge.className = 'badge bg-light text-dark me-1 p-2';
                badge.textContent = tech;
                techContainer.appendChild(badge);
            });

            // Update milestones
            const milestonesContainer = document.getElementById('detailMilestones');
            milestonesContainer.innerHTML = '';
            data.milestones.forEach(milestone => {
                const div = document.createElement('div');
                div.className = 'task-item d-flex align-items-center';
                const check = document.createElement('div');
                check.className = 'task-check';
                if (milestone.done) {
                    check.classList.add('done');
                } else if (milestone.inprogress) {
                    check.style.background = 'var(--accent)';
                    check.style.borderColor = 'var(--accent)';
                }
                const span = document.createElement('span');
                span.textContent = milestone.text;
                div.appendChild(check);
                div.appendChild(span);
                milestonesContainer.appendChild(div);
            });

            // Show detail, hide list
            document.getElementById('projectList').style.display = 'none';
            document.getElementById('projectDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to projects
        document.getElementById('backToProjects').addEventListener('click', function() {
            document.getElementById('projectList').style.display = 'block';
            document.getElementById('projectDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const projects = document.querySelectorAll('.project-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                projects.forEach(project => {
                    if (filter === 'all' || project.dataset.status === filter) {
                        project.style.display = 'block';
                    } else {
                        project.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        document.getElementById('projectSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            projects.forEach(project => {
                const title = project.querySelector('h6')?.textContent.toLowerCase() || '';
                const client = project.querySelector('p')?.textContent.toLowerCase() || '';
                if (title.includes(query) || client.includes(query)) {
                    project.style.display = 'block';
                } else {
                    project.style.display = 'none';
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
        document.querySelector('#addProjectModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Project created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProjectModal'));
            modal.hide();
            this.reset();
        });
    </script>
</body>
</html>