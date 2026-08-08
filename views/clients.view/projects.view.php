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
        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-active { background: #d1fae5; color: #065f46; }
        .status-inprogress { background: #dbeafe; color: #1d4ed8; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-onhold { background: #fef3c7; color: #b45309; }
        .status-planning { background: #f3e8ff; color: #6d28d9; }

        .project-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; overflow: hidden; }
        .project-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); }
        .project-card .card-img-top { height: 180px; object-fit: cover; }
        .project-card .progress { height: 6px; border-radius: 10px; background: #e5e7eb; }
        .project-card .progress .progress-bar { background: var(--primary); border-radius: 10px; }
        .project-card .team-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid white; margin-left: -8px; }
        .project-card .team-avatar:first-child { margin-left: 0; }

        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }

        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .detail-card .task-item { border-bottom: 1px solid #f3f4f6; padding: 10px 0; }
        .detail-card .task-item:last-child { border-bottom: 0; }
        .detail-card .task-check { width: 20px; height: 20px; border-radius: 6px; border: 2px solid #d1d5db; margin-right: 12px; cursor: pointer; display: inline-block; }
        .detail-card .task-check.done { background: var(--primary); border-color: var(--primary); position: relative; }
        .detail-card .task-check.done::after { content: '✓'; color: white; position: absolute; top: -2px; left: 3px; font-size: 14px; }
        .detail-card .task-check.in-progress { background: var(--accent); border-color: var(--accent); }

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
            .detail-card { padding: 20px; }
            .project-card .card-img-top { height: 140px; }
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
                        <h5 class="fw-bold mb-0">My Projects</h5>
                        <small class="text-muted">View and manage all your projects</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <div class="search-box d-none d-md-flex">
                            <i class="fas fa-search"></i>
                            <input type="text" id="projectSearch" placeholder="Search projects..." />
                        </div>
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                            <i class="fas fa-plus me-2"></i>New Project
                        </button>
                        <img src="https://via.placeholder.com/36" class="rounded-circle d-md-none" alt="User" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Filters -->
                    <div class="row g-3 mb-4">
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
                        <div class="col-md-4 d-md-none">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="mobileProjectSearch" class="form-control" placeholder="Search projects..." />
                            </div>
                        </div>
                    </div>

                    <!-- Project Grid -->
                    <div id="projectGrid">
                        <div class="row g-4" id="projectContainer">
                            <!-- Project 1 -->
                            <div class="col-md-4 project-item" data-status="inprogress">
                                <div class="project-card" data-project="1">
                                    <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=E-Commerce+Platform" class="card-img-top" alt="E-Commerce" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">E-Commerce Platform</h5>
                                            <span class="status-badge status-inprogress">In Progress</span>
                                        </div>
                                        <p class="small text-muted">Full-featured online store with payment gateway and admin dashboard.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:75%;"></div></div>
                                            <small>75% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:36px;">+3</span>
                                            </div>
                                            <small class="text-muted">Due: Jun 30, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="1">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 2 -->
                            <div class="col-md-4 project-item" data-status="active">
                                <div class="project-card" data-project="2">
                                    <img src="https://via.placeholder.com/600x400/111827/ffffff?text=School+Management" class="card-img-top" alt="School Management" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">School Management</h5>
                                            <span class="status-badge status-active">Active</span>
                                        </div>
                                        <p class="small text-muted">Student records, attendance, grades, and parent communication.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:30%;"></div></div>
                                            <small>30% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:36px;">+2</span>
                                            </div>
                                            <small class="text-muted">Due: Aug 15, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="2">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 3 -->
                            <div class="col-md-4 project-item" data-status="completed">
                                <div class="project-card" data-project="3">
                                    <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=Healthcare+Portal" class="card-img-top" alt="Healthcare" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">Healthcare Portal</h5>
                                            <span class="status-badge status-completed">Completed</span>
                                        </div>
                                        <p class="small text-muted">Patient appointment booking, telemedicine, and EHR management.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:100%; background:#22c55e;"></div></div>
                                            <small>100% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                            </div>
                                            <small class="text-muted">Completed: May 10, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="3">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 4 -->
                            <div class="col-md-4 project-item" data-status="onhold">
                                <div class="project-card" data-project="4">
                                    <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=API+Development" class="card-img-top" alt="API" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">API Development</h5>
                                            <span class="status-badge status-onhold">On Hold</span>
                                        </div>
                                        <p class="small text-muted">RESTful API development for third-party integration.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:60%; background:#f59e0b;"></div></div>
                                            <small>60% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                            </div>
                                            <small class="text-muted">Due: Jul 15, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="4">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 5 -->
                            <div class="col-md-4 project-item" data-status="planning">
                                <div class="project-card" data-project="5">
                                    <img src="https://via.placeholder.com/600x400/111827/ffffff?text=Mobile+App" class="card-img-top" alt="Mobile App" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">Mobile App Development</h5>
                                            <span class="status-badge status-planning">Planning</span>
                                        </div>
                                        <p class="small text-muted">Cross-platform mobile application for iOS and Android.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:5%;"></div></div>
                                            <small>5% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <span class="team-avatar bg-light text-center fw-bold text-muted" style="line-height:36px;">+4</span>
                                            </div>
                                            <small class="text-muted">Due: Oct 30, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="5">View Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 6 -->
                            <div class="col-md-4 project-item" data-status="active">
                                <div class="project-card" data-project="6">
                                    <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=AI+Support" class="card-img-top" alt="AI Support" />
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h5 class="fw-bold">AI Customer Support</h5>
                                            <span class="status-badge status-active">Active</span>
                                        </div>
                                        <p class="small text-muted">AI-powered chatbot and support automation system.</p>
                                        <div class="mb-2">
                                            <div class="progress"><div class="progress-bar" style="width:45%;"></div></div>
                                            <small>45% Complete</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                                <img src="https://via.placeholder.com/36" class="team-avatar" alt="Team" />
                                            </div>
                                            <small class="text-muted">Due: Sep 15, 2025</small>
                                        </div>
                                        <button class="btn btn-primary btn-sm w-100 mt-3 rounded-pill view-project" data-project="6">View Details</button>
                                    </div>
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
                                            <div class="task-check in-progress"></div>
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
                                        <button class="btn btn-primary rounded-pill"><i class="fas fa-comment me-2"></i>Add Update</button>
                                        <button class="btn btn-outline-primary rounded-pill"><i class="fas fa-ticket-alt me-2"></i>Create Ticket</button>
                                        <button class="btn btn-outline-secondary rounded-pill"><i class="fas fa-download me-2"></i>Export Report</button>
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

    <!-- NEW PROJECT MODAL -->
    <div class="modal fade" id="newProjectModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i>Create New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-12"><input type="text" class="form-control" placeholder="Project Name" /></div>
                            <div class="col-12"><textarea class="form-control" rows="3" placeholder="Project Description"></textarea></div>
                            <div class="col-md-6"><input type="date" class="form-control" placeholder="Start Date" /></div>
                            <div class="col-md-6"><input type="date" class="form-control" placeholder="Due Date" /></div>
                            <div class="col-12"><input type="text" class="form-control" placeholder="Technologies (comma separated)" /></div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Create Project</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap + AOS -->
   <?php require 'views/partials/clients/scripts.php'; ?>
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
                    check.classList.add('in-progress');
                }
                const span = document.createElement('span');
                span.textContent = milestone.text;
                div.appendChild(check);
                div.appendChild(span);
                milestonesContainer.appendChild(div);
            });

            // Show detail, hide grid
            document.getElementById('projectGrid').style.display = 'none';
            document.getElementById('projectDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to projects
        document.getElementById('backToProjects').addEventListener('click', function() {
            document.getElementById('projectGrid').style.display = 'block';
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
                projects.forEach(proj => {
                    if (filter === 'all' || proj.dataset.status === filter) {
                        proj.style.display = 'block';
                    } else {
                        proj.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('projectSearch');
        const mobileSearchInput = document.getElementById('mobileProjectSearch');
        
        function filterProjects(query) {
            projects.forEach(proj => {
                const title = proj.querySelector('h5')?.textContent.toLowerCase() || '';
                const desc = proj.querySelector('p')?.textContent.toLowerCase() || '';
                if (title.includes(query) || desc.includes(query)) {
                    proj.style.display = 'block';
                } else {
                    proj.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', function() {
            filterProjects(this.value.toLowerCase());
        });

        mobileSearchInput.addEventListener('input', function() {
            filterProjects(this.value.toLowerCase());
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

        // Task checkbox toggle (visual only)
        document.querySelectorAll('.task-check').forEach(check => {
            check.addEventListener('click', function() {
                if (this.classList.contains('done')) {
                    this.classList.remove('done');
                    this.classList.add('in-progress');
                } else if (this.classList.contains('in-progress')) {
                    this.classList.remove('in-progress');
                } else {
                    this.classList.add('done');
                }
            });
        });

        // Modal form submission
        document.querySelector('#newProjectModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Project created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('newProjectModal'));
            modal.hide();
            this.reset();
        });
    </script>
</body>
</html>