<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Messages · DonutsTec</title>
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
        .msg-item { border-bottom: 1px solid #f3f4f6; padding: 16px 0; transition: 0.3s; cursor: pointer; }
        .msg-item:hover { background: #f8fafc; margin: 0 -16px; padding-left: 16px; padding-right: 16px; border-radius: 12px; }
        .msg-item.unread { background: #f0f4ff; margin: 0 -16px; padding-left: 16px; padding-right: 16px; border-radius: 12px; border-left: 4px solid var(--primary); }
        .msg-item .avatar { width: 44px; height: 44px; border-radius: 50%; object-fit: cover; }
        .msg-item .time { font-size: 0.75rem; color: #9ca3af; }
        .msg-detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .msg-detail-card .msg-header { border-bottom: 2px solid #f3f4f6; padding-bottom: 20px; }
        .compose-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .contact-item { padding: 8px 12px; border-radius: 12px; transition: 0.3s; cursor: pointer; }
        .contact-item:hover { background: #f1f5f9; }
        .contact-item .avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }
        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; }
            .sidebar .nav { display: flex; flex-wrap: wrap; }
            .sidebar .nav-link { padding: 8px 12px; font-size: 0.9rem; }
            .topbar { padding: 12px 16px; }
            .msg-detail-card { padding: 20px; }
            .compose-card { padding: 20px; }
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
                        <h5 class="fw-bold mb-0">Messages</h5>
                        <small class="text-muted">Manage all communications with clients and team members</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" id="composeBtn">
                            <i class="fas fa-plus me-2"></i>Compose
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                
                <div class="p-4">
                    <!-- Stats 
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">48</div><div class="label">Total Messages</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#3b82f6;"><div class="number">12</div><div class="label">Unread</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">28</div><div class="label">Read</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;"><div class="number">8</div><div class="label">Sent</div></div>
                        </div>
                    </div>
                         -->
                    <!-- Message Views -->
                    <div class="row g-3 mt-2">
                        <!-- Inbox/Sent/Compose tabs -->
                        <div class="col-md-12">
                            <ul class="nav nav-tabs border-0" role="tablist">
                                <li class="nav-item"><a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#inboxTab"><i class="fas fa-inbox me-1"></i>Inbox <span class="badge bg-danger">5</span></a></li>
                                <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#sentTab"><i class="fas fa-paper-plane me-1"></i>Sent</a></li>
                                <li class="nav-item"><a class="nav-link fw-semibold" data-bs-toggle="tab" href="#composeTab"><i class="fas fa-edit me-1"></i>Compose</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                        <!-- INBOX TAB -->
                        <div class="tab-pane fade show active" id="inboxTab">
                            <div class="dashboard-card">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <h6 class="fw-bold">Contacts</h6>
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <img src="https://via.placeholder.com/32" class="avatar" />
                                            <div><span class="fw-semibold">John Doe</span><br /><small class="text-muted">RetailCo</small></div>
                                            <span class="badge bg-danger ms-auto">3</span>
                                        </div>
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <img src="https://via.placeholder.com/32" class="avatar" />
                                            <div><span class="fw-semibold">Sarah Smith</span><br /><small class="text-muted">HealthPlus</small></div>
                                            <span class="badge bg-danger ms-auto">1</span>
                                        </div>
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <img src="https://via.placeholder.com/32" class="avatar" />
                                            <div><span class="fw-semibold">Mike Johnson</span><br /><small class="text-muted">EduTech</small></div>
                                        </div>
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <img src="https://via.placeholder.com/32" class="avatar" />
                                            <div><span class="fw-semibold">Emily Chen</span><br /><small class="text-muted">DataCorp</small></div>
                                        </div>
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <img src="https://via.placeholder.com/32" class="avatar" />
                                            <div><span class="fw-semibold">Anna Martinez</span><br /><small class="text-muted">ServicePro</small></div>
                                        </div>
                                        <hr />
                                        <div class="contact-item d-flex align-items-center gap-2">
                                            <i class="fas fa-users text-primary"></i>
                                            <span>All Contacts (12)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="fw-semibold">Inbox</span>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2"><i class="fas fa-check-double"></i> Mark All Read</button>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-2"><i class="fas fa-download"></i> Export</button>
                                            </div>
                                        </div>
                                        <!-- Message Items -->
                                        <div id="messageList">
                                            <div class="msg-item unread" data-msg="1">
                                                <div class="d-flex gap-3 align-items-start">
                                                    <img src="https://via.placeholder.com/44" class="avatar" />
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fw-semibold">John Doe</span>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                        <span class="badge bg-primary mb-1">Project Update</span>
                                                        <p class="mb-0 small">The E-Commerce platform is progressing well. We've completed the payment gateway integration.</p>
                                                        <div class="mt-1 d-flex gap-2">
                                                            <span class="badge bg-light text-dark"><i class="fas fa-paperclip me-1"></i>2 attachments</span>
                                                            <span class="badge bg-light text-dark"><i class="fas fa-reply me-1"></i>Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="msg-item unread" data-msg="2">
                                                <div class="d-flex gap-3 align-items-start">
                                                    <img src="https://via.placeholder.com/44" class="avatar" />
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fw-semibold">Sarah Smith</span>
                                                            <span class="time">5 hours ago</span>
                                                        </div>
                                                        <span class="badge bg-danger mb-1">Urgent</span>
                                                        <p class="mb-0 small">We've detected a critical login issue on the Healthcare Portal. Users are unable to access their accounts.</p>
                                                        <div class="mt-1 d-flex gap-2">
                                                            <span class="badge bg-light text-dark"><i class="fas fa-paperclip me-1"></i>1 attachment</span>
                                                            <span class="badge bg-light text-dark"><i class="fas fa-reply me-1"></i>Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="msg-item" data-msg="3">
                                                <div class="d-flex gap-3 align-items-start">
                                                    <img src="https://via.placeholder.com/44" class="avatar" />
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fw-semibold">Mike Johnson</span>
                                                            <span class="time">1 day ago</span>
                                                        </div>
                                                        <span class="badge bg-success mb-1">Completed</span>
                                                        <p class="mb-0 small">The School Management System phase 1 is complete. Ready for your review and feedback.</p>
                                                        <div class="mt-1 d-flex gap-2">
                                                            <span class="badge bg-light text-dark"><i class="fas fa-reply me-1"></i>Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="msg-item" data-msg="4">
                                                <div class="d-flex gap-3 align-items-start">
                                                    <img src="https://via.placeholder.com/44" class="avatar" />
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fw-semibold">Emily Chen</span>
                                                            <span class="time">2 days ago</span>
                                                        </div>
                                                        <span class="badge bg-warning text-dark mb-1">In Progress</span>
                                                        <p class="mb-0 small">API documentation is almost ready. We need to finalize the authentication section.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="msg-item" data-msg="5">
                                                <div class="d-flex gap-3 align-items-start">
                                                    <img src="https://via.placeholder.com/44" class="avatar" />
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="fw-semibold">Anna Martinez</span>
                                                            <span class="time">3 days ago</span>
                                                        </div>
                                                        <span class="badge bg-secondary mb-1">General</span>
                                                        <p class="mb-0 small">Thank you for the great work on the AI Customer Support system. Our clients love it!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SENT TAB -->
                        <div class="tab-pane fade" id="sentTab">
                            <div class="dashboard-card">
                                <h6 class="fw-bold mb-3">Sent Messages</h6>
                                <div class="msg-item">
                                    <div class="d-flex gap-3 align-items-start">
                                        <img src="https://via.placeholder.com/44" class="avatar" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">To: John Doe</span>
                                                <span class="time">1 hour ago</span>
                                            </div>
                                            <p class="mb-0 small">Here's the updated timeline for the E-Commerce platform. Please review and confirm.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="msg-item">
                                    <div class="d-flex gap-3 align-items-start">
                                        <img src="https://via.placeholder.com/44" class="avatar" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">To: Sarah Smith</span>
                                                <span class="time">3 hours ago</span>
                                            </div>
                                            <p class="mb-0 small">The login issue has been fixed. Please deploy the latest version and confirm.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="msg-item">
                                    <div class="d-flex gap-3 align-items-start">
                                        <img src="https://via.placeholder.com/44" class="avatar" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">To: Team</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                            <p class="mb-0 small">Weekly update: All projects are on track. Great work everyone!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COMPOSE TAB -->
                        <div class="tab-pane fade" id="composeTab">
                            <div class="compose-card">
                                <h6 class="fw-bold"><i class="fas fa-edit me-2 text-primary"></i>Compose New Message</h6>
                                <form id="composeForm">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <select class="form-select">
                                                <option selected>Select Recipient</option>
                                                <option>John Doe (RetailCo)</option>
                                                <option>Sarah Smith (HealthPlus)</option>
                                                <option>Mike Johnson (EduTech)</option>
                                                <option>Emily Chen (DataCorp)</option>
                                                <option>Anna Martinez (ServicePro)</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select">
                                                <option selected>Subject</option>
                                                <option>Project Update</option>
                                                <option>Question</option>
                                                <option>Feedback</option>
                                                <option>Meeting Request</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12"><input type="text" class="form-control" placeholder="Subject line" /></div>
                                        <div class="col-12"><textarea class="form-control" rows="6" placeholder="Type your message here..."></textarea></div>
                                        <div class="col-12">
                                            <input type="file" class="form-control" multiple />
                                            <small class="text-muted">Max file size: 10MB</small>
                                        </div>
                                        <div class="col-12 d-flex gap-2">
                                            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-paper-plane me-2"></i>Send Message</button>
                                            <button type="reset" class="btn btn-outline-secondary rounded-pill px-4">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MESSAGE DETAIL VIEW -->
                    <div id="msgDetail" class="mt-4" style="display:none;">
                        <div class="msg-detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToInbox">
                                <i class="fas fa-arrow-left me-2"></i>Back to Inbox
                            </button>
                            <div class="msg-header">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="https://via.placeholder.com/56" class="avatar" style="width:56px;height:56px;" />
                                        <div>
                                            <h5 id="detailSender" class="fw-bold mb-0">John Doe</h5>
                                            <p id="detailEmail" class="text-muted mb-0">john@retailco.com</p>
                                            <p id="detailDate" class="text-muted small">2 hours ago</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span id="detailBadge" class="badge bg-primary">Project Update</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 id="detailSubject" class="fw-bold">E-Commerce Platform Update</h6>
                                <p id="detailContent" class="text-muted mt-3">The E-Commerce platform is progressing well. We've completed the payment gateway integration and are now working on the inventory management system. The frontend is 85% complete and we're on track for the June 30 deadline.</p>
                                <div class="mt-3">
                                    <h6 class="fw-bold">Attachments</h6>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-light text-dark p-2"><i class="fas fa-file-pdf text-danger me-1"></i>payment-gateway.pdf</span>
                                        <span class="badge bg-light text-dark p-2"><i class="fas fa-file-image text-primary me-1"></i>ui-screenshot.png</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 d-flex gap-2">
                                <button class="btn btn-primary rounded-pill px-4"><i class="fas fa-reply me-2"></i>Reply</button>
                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-forward me-2"></i>Forward</button>
                                <button class="btn btn-outline-danger rounded-pill px-4"><i class="fas fa-trash me-2"></i>Delete</button>
                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-archive me-2"></i>Archive</button>
                            </div>
                        </div>
                    </div>
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

        // Message data for detail view
        const msgData = {
            1: {
                sender: 'John Doe',
                email: 'john@retailco.com',
                date: '2 hours ago',
                badge: 'Project Update',
                badgeClass: 'bg-primary',
                subject: 'E-Commerce Platform Update',
                content: 'The E-Commerce platform is progressing well. We\'ve completed the payment gateway integration and are now working on the inventory management system. The frontend is 85% complete and we\'re on track for the June 30 deadline.',
                attachments: ['payment-gateway.pdf', 'ui-screenshot.png']
            },
            2: {
                sender: 'Sarah Smith',
                email: 'sarah@healthplus.com',
                date: '5 hours ago',
                badge: 'Urgent',
                badgeClass: 'bg-danger',
                subject: 'Critical Login Issue',
                content: 'We\'ve detected a critical login issue on the Healthcare Portal. Users are unable to access their accounts. The error appears to be related to the authentication service. Please investigate urgently.',
                attachments: ['error-logs.txt']
            },
            3: {
                sender: 'Mike Johnson',
                email: 'mike@edutech.com',
                date: '1 day ago',
                badge: 'Completed',
                badgeClass: 'bg-success',
                subject: 'School Management System - Phase 1 Complete',
                content: 'The School Management System phase 1 is complete. All core features including student records, attendance tracking, and grade management are functional. Ready for your review and feedback.',
                attachments: []
            },
            4: {
                sender: 'Emily Chen',
                email: 'emily@datacorp.com',
                date: '2 days ago',
                badge: 'In Progress',
                badgeClass: 'bg-warning text-dark',
                subject: 'API Documentation Update',
                content: 'API documentation is almost ready. We need to finalize the authentication section with OAuth2 implementation details. Please review the current draft and provide feedback.',
                attachments: []
            },
            5: {
                sender: 'Anna Martinez',
                email: 'anna@servicepro.com',
                date: '3 days ago',
                badge: 'General',
                badgeClass: 'bg-secondary',
                subject: 'Thank You',
                content: 'Thank you for the great work on the AI Customer Support system. Our clients love it! The response times have improved significantly and customer satisfaction scores are up 25%.',
                attachments: []
            }
        };

        // Click on message to view detail
        document.querySelectorAll('.msg-item').forEach(item => {
            item.addEventListener('click', function() {
                const msgId = this.dataset.msg;
                const data = msgData[msgId];
                if (!data) return;

                // Mark as read
                this.classList.remove('unread');

                document.getElementById('detailSender').textContent = data.sender;
                document.getElementById('detailEmail').textContent = data.email;
                document.getElementById('detailDate').textContent = data.date;
                document.getElementById('detailSubject').textContent = data.subject;
                document.getElementById('detailContent').textContent = data.content;

                const badge = document.getElementById('detailBadge');
                badge.textContent = data.badge;
                badge.className = 'badge ' + data.badgeClass;

                // Show/hide attachments
                const attachmentsContainer = document.querySelector('.mt-3 .d-flex.gap-2');
                attachmentsContainer.innerHTML = '';
                if (data.attachments && data.attachments.length > 0) {
                    data.attachments.forEach(att => {
                        const span = document.createElement('span');
                        span.className = 'badge bg-light text-dark p-2';
                        const ext = att.split('.').pop();
                        const icon = ext === 'pdf' ? 'fa-file-pdf text-danger' : 'fa-file-image text-primary';
                        span.innerHTML = `<i class="fas ${icon} me-1"></i>${att}`;
                        attachmentsContainer.appendChild(span);
                    });
                    document.querySelector('.mt-3 h6.fw-bold')?.style.display = 'block';
                } else {
                    document.querySelector('.mt-3 h6.fw-bold')?.style.display = 'none';
                }

                // Show detail, hide list
                document.getElementById('inboxTab').style.display = 'none';
                document.getElementById('msgDetail').style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });

        // Back to inbox
        document.getElementById('backToInbox').addEventListener('click', function() {
            document.getElementById('inboxTab').style.display = 'block';
            document.getElementById('msgDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Compose button - switch to compose tab
        document.getElementById('composeBtn').addEventListener('click', function() {
            const composeTab = document.querySelector('[data-bs-target="#composeTab"]');
            if (composeTab) composeTab.click();
        });

        // Mark all read
        document.querySelector('.btn-outline-secondary .fa-check-double')?.closest('button')?.addEventListener('click', function() {
            document.querySelectorAll('.msg-item.unread').forEach(item => {
                item.classList.remove('unread');
            });
            // Update badge count
            const badge = document.querySelector('.nav-link.active .badge');
            if (badge) {
                badge.textContent = '0';
                badge.classList.remove('bg-danger');
                badge.classList.add('bg-secondary');
            }
        });

        // Compose form submission
        document.getElementById('composeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Message sent successfully!');
            this.reset();
            // Switch back to inbox
            const inboxTab = document.querySelector('[data-bs-target="#inboxTab"]');
            if (inboxTab) inboxTab.click();
        });

        // Reply button in detail view
        document.querySelector('.msg-detail-card .btn-primary')?.addEventListener('click', function() {
            document.getElementById('backToInbox').click();
            setTimeout(() => {
                const composeTab = document.querySelector('[data-bs-target="#composeTab"]');
                if (composeTab) composeTab.click();
                document.querySelector('#composeTab input[type="text"]').value = 'Re: ' + document.getElementById('detailSubject').textContent;
                document.querySelector('#composeTab textarea').placeholder = 'Reply to ' + document.getElementById('detailSender').textContent + '...';
            }, 300);
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

        // Contact item click - filter messages
        document.querySelectorAll('.contact-item').forEach(contact => {
            contact.addEventListener('click', function() {
                const name = this.querySelector('.fw-semibold')?.textContent || '';
                if (name) {
                    // Highlight and filter (demo)
                    document.querySelectorAll('.contact-item').forEach(c => c.style.background = '');
                    this.style.background = '#eef2ff';
                    alert('Filtering messages for: ' + name);
                }
            });
        });
    </script>
</body>
</html>