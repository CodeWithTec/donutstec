<?php require "views/partials/header.php"; ?>
  <style>
    :root {
      --primary: #2563EB;
      --secondary: #111827;
      --accent: #F59E0B;
      --bg-white: #ffffff;
      --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
      --shadow-md: 0 12px 32px rgba(0,0,0,0.08);
    }
    body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: #f8fafc; color: #1f2937; scroll-behavior: smooth; }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .support-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 50px; }
    .ticket-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; }
    .ticket-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .status-badge { padding: 4px 16px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; }
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
    .stats-card { border-radius: 20px; padding: 20px; background: white; box-shadow: var(--shadow-sm); border-left: 4px solid var(--primary); }
    .stats-card .number { font-size: 2rem; font-weight: 700; color: var(--secondary); }
    .admin-card { border-radius: 24px; box-shadow: var(--shadow-sm); background: white; padding: 24px; }
    .admin-card .table th { background: #f8fafc; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    .chat-bubble { background: #eef2ff; border-radius: 16px 16px 16px 4px; padding: 12px 16px; max-width: 80%; }
    .chat-bubble.agent { background: var(--primary); color: white; border-radius: 16px 16px 4px 16px; }
    @media (max-width: 768px) {
      .support-hero h1 { font-size: 2.2rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require 'views/partials/navbar.php'; ?>

  <!-- SUPPORT HERO -->
  <section class="support-hero" id="support">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Support Portal</span>
          <h1 class="display-4 fw-bold mt-3">We're Here to <span class="text-primary">Help</span></h1>
          <p class="lead text-muted">Open a support ticket, track your requests, and get the assistance you need quickly.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#auth-section" class="btn btn-primary rounded-pill px-4">Login / Register</a>
            <a href="#ticket-section" class="btn btn-outline-secondary rounded-pill px-4">My Tickets</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-headset fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">24/7 Support Available</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- AUTHENTICATION SECTION -->
  <section id="auth-section" class="py-4 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up">
          <div class="bg-white p-4 rounded-4 shadow-sm">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#loginTab">Login</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#registerTab">Register</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#resetTab">Reset Password</a></li>
            </ul>
            <div class="tab-content mt-3">
              <!-- Login -->
              <div class="tab-pane fade show active" id="loginTab">
                <form>
                  <div class="row g-3">
                    <div class="col-12"><input type="email" class="form-control" placeholder="Email" /></div>
                    <div class="col-12"><input type="password" class="form-control" placeholder="Password" /></div>
                    <div class="col-12 d-flex justify-content-between align-items-center">
                      <div><button class="btn btn-primary rounded-pill px-4">Login</button></div>
                      <div><a href="#" class="text-primary" data-bs-toggle="tab" data-bs-target="#resetTab">Forgot Password?</a></div>
                    </div>
                    <div class="col-12"><small class="text-muted">OTP verification will be sent to your email after login.</small></div>
                  </div>
                </form>
              </div>
              <!-- Register -->
              <div class="tab-pane fade" id="registerTab">
                <form>
                  <div class="row g-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name" /></div>
                    <div class="col-md-6"><input type="email" class="form-control" placeholder="Email" /></div>
                    <div class="col-md-6"><input type="password" class="form-control" placeholder="Password" /></div>
                    <div class="col-md-6"><input type="password" class="form-control" placeholder="Confirm Password" /></div>
                    <div class="col-12"><button class="btn btn-primary rounded-pill px-4">Register</button></div>
                    <div class="col-12"><small class="text-muted">A 6-digit OTP will be sent to your email for verification.</small></div>
                  </div>
                </form>
              </div>
              <!-- Reset Password -->
              <div class="tab-pane fade" id="resetTab">
                <form>
                  <div class="row g-3">
                    <div class="col-12"><input type="email" class="form-control" placeholder="Email" /></div>
                    <div class="col-12"><button class="btn btn-primary rounded-pill px-4">Send Reset Link</button></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TICKET SYSTEM -->
  <section id="ticket-section" class="py-5">
    <div class="container">
      <!-- Stats -->
      <div class="row g-4 mb-4">
        <div class="col-md-3 col-6" data-aos="fade-up">
          <div class="stats-card"><div class="number">12</div><div>Active Tickets</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
          <div class="stats-card" style="border-left-color: #22c55e;"><div class="number">24</div><div>Completed Tickets</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
          <div class="stats-card" style="border-left-color: var(--accent);"><div class="number">6</div><div>Notifications</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
          <div class="stats-card" style="border-left-color: #8b5cf6;"><div class="number">3</div><div>Invoices Pending</div></div>
        </div>
      </div>

      <!-- Create Ticket Button -->
      <div class="text-end mb-3" data-aos="fade-up">
        <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newTicketModal">
          <i class="fas fa-plus me-2"></i>New Ticket
        </button>
      </div>

      <!-- Ticket List -->
      <div class="row g-4" id="ticketList">
        <div class="col-md-6" data-aos="fade-up">
          <div class="ticket-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <span class="status-badge status-progress">In Progress</span>
                <h6 class="mt-2 fw-bold">Website Update Request</h6>
                <p class="small text-muted mb-1">Ticket #T-2025-001</p>
                <p class="small mb-2">Category: Website Update · Priority: <span class="priority-high">High</span></p>
                <p class="small text-muted mb-0">Last updated: May 12, 2025</p>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="ticket-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <span class="status-badge status-waiting">Waiting for Client</span>
                <h6 class="mt-2 fw-bold">Bug Report - Login Issue</h6>
                <p class="small text-muted mb-1">Ticket #T-2025-002</p>
                <p class="small mb-2">Category: Bug Report · Priority: <span class="priority-critical">Critical</span></p>
                <p class="small text-muted mb-0">Last updated: May 10, 2025</p>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
          <div class="ticket-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <span class="status-badge status-open">Open</span>
                <h6 class="mt-2 fw-bold">New Feature Request</h6>
                <p class="small text-muted mb-1">Ticket #T-2025-003</p>
                <p class="small mb-2">Category: New Feature · Priority: <span class="priority-medium">Medium</span></p>
                <p class="small text-muted mb-0">Last updated: May 8, 2025</p>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="ticket-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <span class="status-badge status-completed">Completed</span>
                <h6 class="mt-2 fw-bold">Content Update</h6>
                <p class="small text-muted mb-1">Ticket #T-2025-004</p>
                <p class="small mb-2">Category: Content Update · Priority: <span class="priority-low">Low</span></p>
                <p class="small text-muted mb-0">Last updated: May 5, 2025</p>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TICKET DETAIL VIEW (modal) -->
  <div class="modal fade" id="ticketDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold">Ticket #T-2025-001</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex gap-3 mb-3">
            <span class="status-badge status-progress">In Progress</span>
            <span class="badge bg-danger">High Priority</span>
          </div>
          <h6>Website Update Request</h6>
          <p class="text-muted">Category: Website Update · Project: DonutsTec Main Site</p>
          <p>We need to update the homepage hero section with new content and images. Please also update the contact form.</p>
          
          <!-- Conversation -->
          <div class="mt-4">
            <h6>Conversation</h6>
            <div class="d-flex mb-3">
              <div class="chat-bubble">Hello, we need to update the homepage hero section with the new branding.</div>
            </div>
            <div class="d-flex justify-content-end mb-3">
              <div class="chat-bubble agent">Sure, I'll take care of this. Do you have the new images ready?</div>
            </div>
            <div class="d-flex mb-3">
              <div class="chat-bubble">Yes, I've attached them to this ticket.</div>
            </div>
            <div class="d-flex justify-content-end mb-3">
              <div class="chat-bubble agent">Great! I'll start working on this today.</div>
            </div>
            
            <!-- Reply -->
            <div class="mt-3">
              <textarea class="form-control" rows="2" placeholder="Type your reply..."></textarea>
              <div class="mt-2 d-flex gap-2">
                <button class="btn btn-primary btn-sm rounded-pill px-3">Send Reply</button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-paperclip"></i> Attach File</button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-download"></i> Transcript</button>
              </div>
            </div>
            
            <!-- Rate -->
            <div class="mt-4 p-3 bg-light rounded-4">
              <h6 class="mb-2">Rate this support experience</h6>
              <div>
                <i class="fas fa-star text-warning fs-5"></i>
                <i class="fas fa-star text-warning fs-5"></i>
                <i class="fas fa-star text-warning fs-5"></i>
                <i class="fas fa-star text-warning fs-5"></i>
                <i class="fas fa-star text-muted fs-5"></i>
                <button class="btn btn-primary btn-sm rounded-pill px-3 ms-2">Submit Rating</button>
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
          <h5 class="modal-title fw-bold"><i class="fas fa-ticket-alt text-primary me-2"></i>New Support Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-12">
                <select class="form-select">
                  <option selected>Select Project</option>
                  <option>DonutsTec Main Site</option>
                  <option>E-Commerce Platform</option>
                  <option>School Management System</option>
                </select>
              </div>
              <div class="col-12">
                <select class="form-select">
                  <option selected>Issue Category</option>
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
              <div class="col-12"><textarea class="form-control" rows="4" placeholder="Describe your issue in detail..."></textarea></div>
              <div class="col-12"><input type="file" class="form-control" multiple accept="image/*,.pdf,.doc,.docx" /></div>
              <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Submit Ticket</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ADMIN DASHBOARD
  <section id="admin-dashboard" class="py-5 bg-light">
    <div class="container">
      <div class="admin-card" data-aos="fade-up">
        <h4 class="fw-bold mb-4"><i class="fas fa-chart-line me-2 text-primary"></i>Support Dashboard</h4>
        
        <!-- Charts row 
        <div class="row g-4 mb-4">
          <div class="col-md-6">
            <h6>Ticket Statistics</h6>
            <canvas id="ticketChart" height="200"></canvas>
          </div>
          <div class="col-md-6">
            <h6>Ticket Status Distribution</h6>
            <canvas id="statusChart" height="200"></canvas>
          </div>
        </div>

        <div class="table-responsive">
          <h6 class="mt-4">All Tickets</h6>
          <table id="ticketsTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Ticket ID</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-semibold">#T-2025-001</span></td>
                <td>Website Update Request</td>
                <td>Website Update</td>
                <td><span class="priority-high">High</span></td>
                <td><span class="status-badge status-progress">In Progress</span></td>
                <td>Sarah Johnson</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Assign</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">#T-2025-002</span></td>
                <td>Bug Report - Login Issue</td>
                <td>Bug Report</td>
                <td><span class="priority-critical">Critical</span></td>
                <td><span class="status-badge status-waiting">Waiting for Client</span></td>
                <td>Mike Chen</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Assign</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">#T-2025-003</span></td>
                <td>New Feature Request</td>
                <td>New Feature</td>
                <td><span class="priority-medium">Medium</span></td>
                <td><span class="status-badge status-open">Open</span></td>
                <td>Unassigned</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Assign</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">#T-2025-004</span></td>
                <td>Content Update</td>
                <td>Content Update</td>
                <td><span class="priority-low">Low</span></td>
                <td><span class="status-badge status-completed">Completed</span></td>
                <td>Lisa Park</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Assign</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
----------->
  <!-- FOOTER -->
<?php require 'views/partials/footer.php'; ?>

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
      $('#ticketsTable').DataTable({
        pageLength: 5,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf']
      });
    });

    // Chart.js - Ticket Statistics
    const ctx1 = document.getElementById('ticketChart').getContext('2d');
    new Chart(ctx1, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
          label: 'Tickets',
          data: [12, 19, 15, 22, 18],
          borderColor: '#2563EB',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgba(37, 99, 235, 0.05)'
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    // Chart.js - Status Distribution
    const ctx2 = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Open', 'In Progress', 'Waiting', 'Completed', 'Closed'],
        datasets: [{
          data: [8, 12, 6, 24, 4],
          backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b', '#8b5cf6', '#6b7280']
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
      }
    });

    // Ticket click to show detail
    document.querySelectorAll('.ticket-card').forEach(card => {
      card.addEventListener('click', function() {
        const modal = new bootstrap.Modal(document.getElementById('ticketDetailModal'));
        modal.show();
      });
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#contact"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Contact page demo') }));
  </script>
</body>
</html>