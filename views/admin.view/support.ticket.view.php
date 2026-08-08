<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Support Tickets · DonutsTec</title>
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
        .btn-success { background: #22c55e; border: none; }
        .btn-success:hover { background: #16a34a; }
        .btn-warning { background: #f59e0b; border: none; color: #111827; }
        .btn-warning:hover { background: #d97706; }
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
        .status-open { background: #dbeafe; color: #1d4ed8; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .status-progress { background: #d1fae5; color: #065f46; }
        .status-waiting { background: #fce4ec; color: #c62828; }
        .status-completed { background: #d1fae5; color: #065f46; }
        .status-closed { background: #e5e7eb; color: #4b5563; }
        .priority-high { color: #dc2626; }
        .priority-medium { color: #f59e0b; }
        .priority-low { color: #3b82f6; }
        .priority-critical { color: #7f1d1d; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        .ticket-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; cursor: pointer; }
        .ticket-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .chat-bubble { background: #eef2ff; border-radius: 16px 16px 16px 4px; padding: 12px 16px; max-width: 80%; }
        .chat-bubble.agent { background: var(--primary); color: white; border-radius: 16px 16px 4px 16px; }
        .detail-card .attachment-item { background: #f8fafc; border-radius: 12px; padding: 8px 16px; display: inline-flex; align-items: center; gap: 8px; margin: 4px; }
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
                        <h5 class="fw-bold mb-0">Support Tickets</h5>
                        <small class="text-muted">Manage all support requests and customer inquiries</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#newTicketModal">
                            <i class="fas fa-plus me-2"></i>New Ticket
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">48</div><div class="label">Total Tickets</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#3b82f6;"><div class="number">12</div><div class="label">Open</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">18</div><div class="label">In Progress</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#f59e0b;"><div class="number">8</div><div class="label">Waiting for Client</div></div>
                        </div>
                    </div>

                    <!-- Charts 
                    <div class="row g-3 mt-2">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Ticket Statistics</h6>
                                <canvas id="ticketChart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Ticket Status Distribution</h6>
                                <canvas id="statusChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                        -->
                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Tickets</button>
                                <button class="filter-btn" data-filter="open">Open</button>
                                <button class="filter-btn" data-filter="progress">In Progress</button>
                                <button class="filter-btn" data-filter="waiting">Waiting</button>
                                <button class="filter-btn" data-filter="completed">Completed</button>
                                <button class="filter-btn" data-filter="closed">Closed</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="ticketSearch" class="form-control" placeholder="Search tickets..." />
                            </div>
                        </div>
                    </div>

                    <!-- Ticket List -->
                    <div class="mt-3" id="ticketList">
                        <div class="row g-3" id="ticketContainer">
                            <!-- Ticket 1 -->
                            <div class="col-md-6 ticket-item" data-status="progress">
                                <div class="ticket-card p-3" data-ticket="1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-progress">In Progress</span>
                                            <h6 class="mt-2 fw-bold">Website Update Request</h6>
                                            <p class="small text-muted mb-1">#T-2025-001</p>
                                            <p class="small mb-1">Client: RetailCo</p>
                                            <p class="small mb-0">Priority: <span class="priority-high">High</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">May 12, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket 2 -->
                            <div class="col-md-6 ticket-item" data-status="waiting">
                                <div class="ticket-card p-3" data-ticket="2">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-waiting">Waiting for Client</span>
                                            <h6 class="mt-2 fw-bold">Bug Report - Login Issue</h6>
                                            <p class="small text-muted mb-1">#T-2025-002</p>
                                            <p class="small mb-1">Client: HealthPlus</p>
                                            <p class="small mb-0">Priority: <span class="priority-critical">Critical</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">May 10, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket 3 -->
                            <div class="col-md-6 ticket-item" data-status="open">
                                <div class="ticket-card p-3" data-ticket="3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-open">Open</span>
                                            <h6 class="mt-2 fw-bold">New Feature Request</h6>
                                            <p class="small text-muted mb-1">#T-2025-003</p>
                                            <p class="small mb-1">Client: EduTech</p>
                                            <p class="small mb-0">Priority: <span class="priority-medium">Medium</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">May 8, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket 4 -->
                            <div class="col-md-6 ticket-item" data-status="completed">
                                <div class="ticket-card p-3" data-ticket="4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-completed">Completed</span>
                                            <h6 class="mt-2 fw-bold">Content Update</h6>
                                            <p class="small text-muted mb-1">#T-2025-004</p>
                                            <p class="small mb-1">Client: DataCorp</p>
                                            <p class="small mb-0">Priority: <span class="priority-low">Low</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">May 5, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket 5 -->
                            <div class="col-md-6 ticket-item" data-status="open">
                                <div class="ticket-card p-3" data-ticket="5">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-open">Open</span>
                                            <h6 class="mt-2 fw-bold">Payment Issue</h6>
                                            <p class="small text-muted mb-1">#T-2025-005</p>
                                            <p class="small mb-1">Client: ServicePro</p>
                                            <p class="small mb-0">Priority: <span class="priority-critical">Critical</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">May 13, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket 6 -->
                            <div class="col-md-6 ticket-item" data-status="closed">
                                <div class="ticket-card p-3" data-ticket="6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-closed">Closed</span>
                                            <h6 class="mt-2 fw-bold">Domain Support</h6>
                                            <p class="small text-muted mb-1">#T-2025-006</p>
                                            <p class="small mb-1">Client: StartupX</p>
                                            <p class="small mb-0">Priority: <span class="priority-low">Low</span></p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Apr 30, 2025</small>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 view-ticket">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TICKET DETAIL VIEW -->
                    <div id="ticketDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToTickets">
                                <i class="fas fa-arrow-left me-2"></i>Back to Tickets
                            </button>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 id="detailTitle" class="fw-bold">Website Update Request</h4>
                                    <p id="detailId" class="text-muted">#T-2025-001</p>
                                    <div class="d-flex gap-2 mb-3">
                                        <span id="detailStatus" class="status-badge status-progress">In Progress</span>
                                        <span id="detailPriority" class="badge bg-danger">High Priority</span>
                                        <span id="detailClient" class="badge bg-secondary">RetailCo</span>
                                    </div>
                                    <p id="detailDescription" class="text-muted">We need to update the homepage hero section with new content and images. Please also update the contact form with new fields.</p>
                                    
                                    <div class="mb-3">
                                        <h6 class="fw-bold">Attachments</h6>
                                        <div id="detailAttachments">
                                            <span class="attachment-item"><i class="fas fa-file-pdf text-danger"></i> hero-images.zip</span>
                                            <span class="attachment-item"><i class="fas fa-file-image text-primary"></i> screenshot.png</span>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold">Conversation</h6>
                                    <div id="detailConversation">
                                        <div class="d-flex mb-3">
                                            <div class="chat-bubble">Hello, we need to update the homepage hero section with the new branding. I've attached the images.</div>
                                        </div>
                                        <div class="d-flex justify-content-end mb-3">
                                            <div class="chat-bubble agent">Sure, I'll take care of this. Do you have the new copy ready?</div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="chat-bubble">Yes, I've updated the copy in the attached document.</div>
                                        </div>
                                        <div class="d-flex justify-content-end mb-3">
                                            <div class="chat-bubble agent">Great! I'll start working on this today and update you by tomorrow.</div>
                                        </div>
                                    </div>

                                    <!-- Reply -->
                                    <div class="mt-3">
                                        <h6 class="fw-bold">Reply to Ticket</h6>
                                        <form>
                                            <textarea class="form-control" rows="3" placeholder="Type your reply..."></textarea>
                                            <div class="mt-2 d-flex gap-2">
                                                <button class="btn btn-primary rounded-pill px-4"><i class="fas fa-paper-plane me-2"></i>Send Reply</button>
                                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-paperclip me-2"></i>Attach File</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-light p-3 rounded-4">
                                        <h6 class="fw-bold">Ticket Information</h6>
                                        <p><strong>Status:</strong> <span id="detailStatusInfo" class="status-badge status-progress">In Progress</span></p>
                                        <p><strong>Priority:</strong> <span id="detailPriorityInfo" class="priority-high">High</span></p>
                                        <p><strong>Client:</strong> <span id="detailClientInfo">RetailCo</span></p>
                                        <p><strong>Created:</strong> <span id="detailCreated">May 10, 2025</span></p>
                                        <p><strong>Assigned To:</strong> <span id="detailAssigned">Sarah Johnson</span></p>
                                        <p><strong>Category:</strong> <span id="detailCategory">Website Update</span></p>
                                    </div>
                                    <div class="mt-3 d-flex flex-column gap-2">
                                        <button class="btn btn-primary rounded-pill"><i class="fas fa-user-check me-2"></i>Assign Agent</button>
                                        <button class="btn btn-success rounded-pill"><i class="fas fa-check me-2"></i>Mark Complete</button>
                                        <button class="btn btn-warning rounded-pill"><i class="fas fa-clock me-2"></i>Change Status</button>
                                        <button class="btn btn-outline-danger rounded-pill"><i class="fas fa-trash me-2"></i>Delete Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NEW TICKET MODAL -->
    <div class="modal fade" id="newTicketModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-ticket-alt text-primary me-2"></i>Create Support Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <select class="form-select">
                                    <option selected>Select Client</option>
                                    <option>RetailCo</option>
                                    <option>HealthPlus</option>
                                    <option>EduTech</option>
                                    <option>DataCorp</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <select class="form-select">
                                    <option selected>Category</option>
                                    <option>Website Update</option>
                                    <option>Bug Report</option>
                                    <option>New Feature Request</option>
                                    <option>Content Update</option>
                                    <option>Payment Issue</option>
                                    <option>Domain Support</option>
                                    <option>Hosting Support</option>
                                    <option>Security Issue</option>
                                    <option>General Inquiry</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <select class="form-select">
                                    <option selected>Priority</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Critical</option>
                                </select>
                            </div>
                            <div class="col-12"><input type="text" class="form-control" placeholder="Subject" /></div>
                            <div class="col-12"><textarea class="form-control" rows="4" placeholder="Describe the issue in detail..."></textarea></div>
                            <div class="col-12"><input type="file" class="form-control" multiple accept="image/*,.pdf,.doc,.docx" /></div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Create Ticket</button></div>
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

        // Chart.js - Ticket Statistics
        const ctx1 = document.getElementById('ticketChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Tickets',
                    data: [12, 18, 15, 22, 28, 20],
                    borderColor: '#2563EB',
                    tension: 0.3,
                    fill: true,
                    backgroundColor: 'rgba(37, 99, 235, 0.05)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });

        // Chart.js - Status Distribution
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Open', 'In Progress', 'Waiting', 'Completed', 'Closed'],
                datasets: [{
                    data: [12, 18, 8, 6, 4],
                    backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b', '#8b5cf6', '#6b7280']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Ticket data for detail view
        const ticketData = {
            1: {
                id: '#T-2025-001',
                title: 'Website Update Request',
                status: 'progress',
                statusLabel: 'In Progress',
                priority: 'High',
                priorityClass: 'priority-high',
                client: 'RetailCo',
                category: 'Website Update',
                created: 'May 10, 2025',
                assigned: 'Sarah Johnson',
                description: 'We need to update the homepage hero section with new content and images. Please also update the contact form with new fields.',
                attachments: ['hero-images.zip', 'screenshot.png'],
                conversation: [
                    { text: 'Hello, we need to update the homepage hero section with the new branding. I\'ve attached the images.', agent: false },
                    { text: 'Sure, I\'ll take care of this. Do you have the new copy ready?', agent: true },
                    { text: 'Yes, I\'ve updated the copy in the attached document.', agent: false },
                    { text: 'Great! I\'ll start working on this today and update you by tomorrow.', agent: true }
                ]
            },
            2: {
                id: '#T-2025-002',
                title: 'Bug Report - Login Issue',
                status: 'waiting',
                statusLabel: 'Waiting for Client',
                priority: 'Critical',
                priorityClass: 'priority-critical',
                client: 'HealthPlus',
                category: 'Bug Report',
                created: 'May 8, 2025',
                assigned: 'Mike Chen',
                description: 'Users are unable to log in to the admin dashboard. The error message says "Invalid credentials" even with correct credentials.',
                attachments: ['error-screenshot.png', 'logs.txt'],
                conversation: [
                    { text: 'Users are reporting login issues on the admin dashboard.', agent: false },
                    { text: 'We\'ve identified the issue and fixed it. Please test and confirm.', agent: true }
                ]
            },
            3: {
                id: '#T-2025-003',
                title: 'New Feature Request',
                status: 'open',
                statusLabel: 'Open',
                priority: 'Medium',
                priorityClass: 'priority-medium',
                client: 'EduTech',
                category: 'New Feature',
                created: 'May 5, 2025',
                assigned: 'Unassigned',
                description: 'We need to add a new feature for generating automated report cards for students at the end of each semester.',
                attachments: ['requirements.pdf'],
                conversation: [
                    { text: 'We need a new feature for automated report cards.', agent: false },
                    { text: 'Can you provide more details about the requirements?', agent: true }
                ]
            },
            4: {
                id: '#T-2025-004',
                title: 'Content Update',
                status: 'completed',
                statusLabel: 'Completed',
                priority: 'Low',
                priorityClass: 'priority-low',
                client: 'DataCorp',
                category: 'Content Update',
                created: 'Apr 28, 2025',
                assigned: 'Lisa Park',
                description: 'Please update the About Us page with the new team members and their bios.',
                attachments: ['team-bios.docx'],
                conversation: [
                    { text: 'Please update the About Us page with new team members.', agent: false },
                    { text: 'Done! Please review and let me know if any changes needed.', agent: true }
                ]
            },
            5: {
                id: '#T-2025-005',
                title: 'Payment Issue',
                status: 'open',
                statusLabel: 'Open',
                priority: 'Critical',
                priorityClass: 'priority-critical',
                client: 'ServicePro',
                category: 'Payment Issue',
                created: 'May 13, 2025',
                assigned: 'Tom Wagner',
                description: 'Several customers are reporting that their payments are being declined even though they have sufficient funds.',
                attachments: ['payment-logs.csv'],
                conversation: [
                    { text: 'Customers are reporting payment declines.', agent: false },
                    { text: 'We\'re investigating the issue. Will update soon.', agent: true }
                ]
            },
            6: {
                id: '#T-2025-006',
                title: 'Domain Support',
                status: 'closed',
                statusLabel: 'Closed',
                priority: 'Low',
                priorityClass: 'priority-low',
                client: 'StartupX',
                category: 'Domain Support',
                created: 'Apr 25, 2025',
                assigned: 'Sarah Johnson',
                description: 'We need help with DNS configuration for our new subdomain.',
                attachments: ['dns-config.png'],
                conversation: [
                    { text: 'Need help with DNS configuration.', agent: false },
                    { text: 'Done! DNS records have been updated.', agent: true }
                ]
            }
        };

        // View ticket detail
        document.querySelectorAll('.view-ticket').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.ticket-card');
                const ticketId = card.dataset.ticket;
                showTicketDetail(ticketId);
            });
        });

        // Click on card to view detail
        document.querySelectorAll('.ticket-card').forEach(card => {
            card.addEventListener('click', function() {
                const ticketId = this.dataset.ticket;
                showTicketDetail(ticketId);
            });
        });

        function showTicketDetail(ticketId) {
            const data = ticketData[ticketId];
            if (!data) return;

            document.getElementById('detailTitle').textContent = data.title;
            document.getElementById('detailId').textContent = data.id;
            document.getElementById('detailDescription').textContent = data.description;
            document.getElementById('detailClient').textContent = data.client;
            document.getElementById('detailCreated').textContent = data.created;
            document.getElementById('detailAssigned').textContent = data.assigned;
            document.getElementById('detailCategory').textContent = data.category;

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.statusLabel;
            statusBadge.className = 'status-badge status-' + data.status;

            const statusInfo = document.getElementById('detailStatusInfo');
            statusInfo.textContent = data.statusLabel;
            statusInfo.className = 'status-badge status-' + data.status;

            // Update priority
            const priorityBadge = document.getElementById('detailPriority');
            priorityBadge.textContent = data.priority + ' Priority';
            priorityBadge.className = 'badge ' + (data.priority === 'Critical' ? 'bg-danger' : 
                                        data.priority === 'High' ? 'bg-warning text-dark' :
                                        data.priority === 'Medium' ? 'bg-info text-dark' : 'bg-secondary');

            const priorityInfo = document.getElementById('detailPriorityInfo');
            priorityInfo.textContent = data.priority;
            priorityInfo.className = 'priority-' + data.priority.toLowerCase();

            // Update attachments
            const attachmentsContainer = document.getElementById('detailAttachments');
            attachmentsContainer.innerHTML = '';
            data.attachments.forEach(att => {
                const span = document.createElement('span');
                span.className = 'attachment-item';
                const ext = att.split('.').pop();
                const icon = ext === 'pdf' ? 'fa-file-pdf text-danger' : 
                            ext === 'zip' ? 'fa-file-archive text-warning' :
                            ext === 'docx' ? 'fa-file-word text-primary' :
                            ext === 'csv' ? 'fa-file-csv text-success' :
                            ext === 'txt' ? 'fa-file-alt text-secondary' :
                            'fa-file-image text-primary';
                span.innerHTML = `<i class="fas ${icon}"></i> ${att}`;
                attachmentsContainer.appendChild(span);
            });

            // Update conversation
            const conversationContainer = document.getElementById('detailConversation');
            conversationContainer.innerHTML = '';
            data.conversation.forEach(msg => {
                const div = document.createElement('div');
                div.className = 'd-flex mb-3';
                if (msg.agent) {
                    div.className = 'd-flex justify-content-end mb-3';
                }
                const bubble = document.createElement('div');
                bubble.className = msg.agent ? 'chat-bubble agent' : 'chat-bubble';
                bubble.textContent = msg.text;
                div.appendChild(bubble);
                conversationContainer.appendChild(div);
            });

            // Show detail, hide list
            document.getElementById('ticketList').style.display = 'none';
            document.getElementById('ticketDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to tickets
        document.getElementById('backToTickets').addEventListener('click', function() {
            document.getElementById('ticketList').style.display = 'block';
            document.getElementById('ticketDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const tickets = document.querySelectorAll('.ticket-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                tickets.forEach(ticket => {
                    if (filter === 'all' || ticket.dataset.status === filter) {
                        ticket.style.display = 'block';
                    } else {
                        ticket.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        document.getElementById('ticketSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            tickets.forEach(ticket => {
                const title = ticket.querySelector('h6')?.textContent.toLowerCase() || '';
                const id = ticket.querySelector('.text-muted')?.textContent.toLowerCase() || '';
                if (title.includes(query) || id.includes(query)) {
                    ticket.style.display = 'block';
                } else {
                    ticket.style.display = 'none';
                }
            });
        });

        // Dummy interactions
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('text-danger')) return;
                e.preventDefault();
                document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Modal form submission
        document.querySelector('#newTicketModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Ticket created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('newTicketModal'));
            modal.hide();
            this.reset();
        });

        // Status change buttons
        document.querySelectorAll('.detail-card .btn-success, .detail-card .btn-warning').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('This would update the ticket status.');
            });
        });

        document.querySelector('.detail-card .btn-primary')?.addEventListener('click', function() {
            alert('This would open the agent assignment modal.');
        });
    </script>
</body>
</html>