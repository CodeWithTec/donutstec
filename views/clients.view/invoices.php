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
        .btn-success { background: #22c55e; border: none; }
        .btn-success:hover { background: #16a34a; }
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
        .dashboard-card { background: white; border-radius: 24px; padding: 24px; box-shadow: var(--shadow-sm); }

        .status-badge { padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-paid { background: #d1fae5; color: #065f46; }
        .status-pending { background: #fef3c7; color: #b45309; }
        .status-overdue { background: #fce4ec; color: #c62828; }
        .status-cancelled { background: #e5e7eb; color: #4b5563; }

        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }

        .invoice-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; cursor: pointer; }
        .invoice-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }

        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .detail-card .invoice-header { border-bottom: 2px solid #f3f4f6; padding-bottom: 20px; }
        .detail-card .invoice-total { background: #f8fafc; border-radius: 16px; padding: 20px; }
        .payment-method { border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; cursor: pointer; transition: 0.3s; }
        .payment-method:hover { border-color: var(--primary); }
        .payment-method.active { border-color: var(--primary); background: #eef2ff; }

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
                        <h5 class="fw-bold mb-0">Invoices</h5>
                        <small class="text-muted">View, pay, and manage all your invoices</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <div class="search-box d-none d-md-flex">
                            <i class="fas fa-search"></i>
                            <input type="text" id="invoiceSearch" placeholder="Search invoices..." />
                        </div>
                        <button class="btn btn-outline-primary btn-sm rounded-pill px-3"><i class="fas fa-download me-2"></i>Export</button>
                        <img src="https://via.placeholder.com/36" class="rounded-circle d-md-none" alt="User" />
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">$45,500</div><div class="label">Total Invoiced</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">$32,000</div><div class="label">Paid</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">$8,500</div><div class="label">Pending</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#dc2626;"><div class="number">$5,000</div><div class="label">Overdue</div></div>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-7" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Revenue Overview</h6>
                                <canvas id="revenueChart" height="180"></canvas>
                            </div>
                        </div>
                        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Invoice Status Distribution</h6>
                                <canvas id="statusChart" height="180"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Filters & Search -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Invoices</button>
                                <button class="filter-btn" data-filter="paid">Paid</button>
                                <button class="filter-btn" data-filter="pending">Pending</button>
                                <button class="filter-btn" data-filter="overdue">Overdue</button>
                                <button class="filter-btn" data-filter="cancelled">Cancelled</button>
                            </div>
                        </div>
                        <div class="col-md-4 d-md-none">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="mobileInvoiceSearch" class="form-control" placeholder="Search invoices..." />
                            </div>
                        </div>
                    </div>

                    <!-- Invoice List -->
                    <div id="invoiceList">
                        <div class="row g-4" id="invoiceContainer">
                            <!-- Invoice 1 -->
                            <div class="col-md-6 invoice-item" data-status="pending">
                                <div class="invoice-card p-4" data-invoice="1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-pending">Pending</span>
                                            <h6 class="mt-2 fw-bold">E-Commerce Platform - Phase 2</h6>
                                            <p class="small text-muted mb-1">#INV-2025-001</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $12,500</p>
                                            <p class="small text-muted mb-0">Due: Jun 30, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-primary rounded-pill px-3 pay-btn">Pay Now</button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 2 -->
                            <div class="col-md-6 invoice-item" data-status="overdue">
                                <div class="invoice-card p-4" data-invoice="2">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-overdue">Overdue</span>
                                            <h6 class="mt-2 fw-bold">API Development</h6>
                                            <p class="small text-muted mb-1">#INV-2025-002</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $3,500</p>
                                            <p class="small text-muted mb-0">Due: Jun 15, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-danger rounded-pill px-3 pay-btn">Pay Now</button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 3 -->
                            <div class="col-md-6 invoice-item" data-status="paid">
                                <div class="invoice-card p-4" data-invoice="3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-paid">Paid</span>
                                            <h6 class="mt-2 fw-bold">Healthcare Portal</h6>
                                            <p class="small text-muted mb-1">#INV-2025-003</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $15,000</p>
                                            <p class="small text-muted mb-0">Paid: May 10, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2"><i class="fas fa-download"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 4 -->
                            <div class="col-md-6 invoice-item" data-status="pending">
                                <div class="invoice-card p-4" data-invoice="4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-pending">Pending</span>
                                            <h6 class="mt-2 fw-bold">School Management System</h6>
                                            <p class="small text-muted mb-1">#INV-2025-004</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $8,000</p>
                                            <p class="small text-muted mb-0">Due: Aug 15, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-primary rounded-pill px-3 pay-btn">Pay Now</button>
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 5 -->
                            <div class="col-md-6 invoice-item" data-status="paid">
                                <div class="invoice-card p-4" data-invoice="5">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-paid">Paid</span>
                                            <h6 class="mt-2 fw-bold">Website Maintenance - Q2</h6>
                                            <p class="small text-muted mb-1">#INV-2025-005</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $2,500</p>
                                            <p class="small text-muted mb-0">Paid: Jun 1, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2"><i class="fas fa-download"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 6 -->
                            <div class="col-md-6 invoice-item" data-status="cancelled">
                                <div class="invoice-card p-4" data-invoice="6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-cancelled">Cancelled</span>
                                            <h6 class="mt-2 fw-bold">AI Customer Support - Pilot</h6>
                                            <p class="small text-muted mb-1">#INV-2025-006</p>
                                            <p class="small mb-1"><strong>Amount:</strong> $4,000</p>
                                            <p class="small text-muted mb-0">Cancelled: May 20, 2025</p>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INVOICE DETAIL VIEW -->
                    <div id="invoiceDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToInvoices">
                                <i class="fas fa-arrow-left me-2"></i>Back to Invoices
                            </button>
                            <div class="invoice-header">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h4 id="detailId" class="fw-bold">#INV-2025-001</h4>
                                        <p id="detailProject" class="text-muted">E-Commerce Platform - Phase 2</p>
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <span id="detailStatus" class="status-badge status-pending">Pending</span>
                                        <p class="small text-muted mt-1">Issued: Jun 1, 2025</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 my-4">
                                <div class="col-md-4">
                                    <h6 class="fw-bold">Bill To</h6>
                                    <p id="detailClient" class="mb-0">John Doe</p>
                                    <p id="detailClientCompany" class="mb-0">TechCorp GmbH</p>
                                    <p id="detailClientEmail" class="mb-0">john@techcorp.com</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="fw-bold">Invoice Details</h6>
                                    <p class="mb-0"><strong>Issue Date:</strong> <span id="detailIssue">Jun 1, 2025</span></p>
                                    <p class="mb-0"><strong>Due Date:</strong> <span id="detailDue">Jun 30, 2025</span></p>
                                    <p class="mb-0"><strong>Payment Terms:</strong> <span id="detailTerms">Net 30</span></p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="fw-bold">Payment Status</h6>
                                    <p class="mb-0"><span id="detailStatusBadge" class="status-badge status-pending">Pending</span></p>
                                    <p class="mb-0 mt-2"><strong>Total Amount:</strong> <span id="detailAmount" class="fs-4 fw-bold">$12,500</span></p>
                                </div>
                            </div>

                            <h6 class="fw-bold">Invoice Items</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr><th>Description</th><th>Quantity</th><th>Rate</th><th>Amount</th></tr>
                                    </thead>
                                    <tbody id="detailItems">
                                        <tr>
                                            <td>E-Commerce Platform Development - Phase 2</td>
                                            <td>1</td>
                                            <td>$12,500</td>
                                            <td>$12,500</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr><td colspan="3" class="text-end fw-bold">Subtotal</td><td>$12,500</td></tr>
                                        <tr><td colspan="3" class="text-end fw-bold">Tax (0%)</td><td>$0</td></tr>
                                        <tr><td colspan="3" class="text-end fw-bold fs-5">Total</td><td class="fs-5 fw-bold">$12,500</td></tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Payment Section -->
                            <div id="paymentSection" class="mt-4">
                                <h6 class="fw-bold">Pay Now</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Payment Method</label>
                                        <div class="payment-method active" data-method="card">
                                            <i class="fas fa-credit-card me-2"></i>Credit Card
                                        </div>
                                        <div class="payment-method" data-method="paypal">
                                            <i class="fab fa-paypal me-2"></i>PayPal
                                        </div>
                                        <div class="payment-method" data-method="bank">
                                            <i class="fas fa-university me-2"></i>Bank Transfer
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded-4">
                                            <p class="mb-1"><strong>Amount Due:</strong> <span class="fw-bold" id="payAmount">$12,500</span></p>
                                            <p class="small text-muted">Secure payment processed via Stripe</p>
                                            <button class="btn btn-success w-100 rounded-pill py-2" id="processPayment">
                                                <i class="fas fa-lock me-2"></i>Pay Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="mt-4 d-flex gap-3">
                                <button class="btn btn-outline-primary rounded-pill px-4"><i class="fas fa-download me-2"></i>Download PDF</button>
                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-print me-2"></i>Print</button>
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

    <!-- PAYMENT CONFIRMATION MODAL -->
    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-body text-center p-5">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Payment Successful!</h4>
                    <p class="text-muted">Your payment of <strong id="confirmAmount">$12,500</strong> has been processed successfully.</p>
                    <p class="text-muted">A receipt has been sent to your email.</p>
                    <button class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap + DataTables + AOS -->
<?php require 'views/partials/clients/scripts.php'; ?>
    <script>
        AOS.init({ once: true, duration: 700 });

        // Chart.js - Revenue
        const ctx1 = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 15000, 18000, 22000, 28000, 32000],
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
                scales: { y: { beginAtZero: true, ticks: { callback: function(value) { return '$' + value.toLocaleString(); } } } }
            }
        });

        // Chart.js - Status Distribution
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Paid', 'Pending', 'Overdue', 'Cancelled'],
                datasets: [{
                    data: [8, 5, 3, 2],
                    backgroundColor: ['#22c55e', '#f59e0b', '#dc2626', '#6b7280']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Invoice data for detail view
        const invoiceData = {
            1: {
                id: '#INV-2025-001',
                project: 'E-Commerce Platform - Phase 2',
                status: 'pending',
                statusLabel: 'Pending',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'Jun 1, 2025',
                due: 'Jun 30, 2025',
                terms: 'Net 30',
                amount: '$12,500',
                items: [
                    { desc: 'E-Commerce Platform Development - Phase 2', qty: 1, rate: '$12,500', amount: '$12,500' }
                ]
            },
            2: {
                id: '#INV-2025-002',
                project: 'API Development',
                status: 'overdue',
                statusLabel: 'Overdue',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'May 15, 2025',
                due: 'Jun 15, 2025',
                terms: 'Net 30',
                amount: '$3,500',
                items: [
                    { desc: 'RESTful API Development', qty: 1, rate: '$3,500', amount: '$3,500' }
                ]
            },
            3: {
                id: '#INV-2025-003',
                project: 'Healthcare Portal',
                status: 'paid',
                statusLabel: 'Paid',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'Apr 10, 2025',
                due: 'May 10, 2025',
                terms: 'Net 30',
                amount: '$15,000',
                items: [
                    { desc: 'Healthcare Portal Development', qty: 1, rate: '$15,000', amount: '$15,000' }
                ]
            },
            4: {
                id: '#INV-2025-004',
                project: 'School Management System',
                status: 'pending',
                statusLabel: 'Pending',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'Jun 5, 2025',
                due: 'Aug 15, 2025',
                terms: 'Net 60',
                amount: '$8,000',
                items: [
                    { desc: 'School Management System Development', qty: 1, rate: '$8,000', amount: '$8,000' }
                ]
            },
            5: {
                id: '#INV-2025-005',
                project: 'Website Maintenance - Q2',
                status: 'paid',
                statusLabel: 'Paid',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'May 1, 2025',
                due: 'Jun 1, 2025',
                terms: 'Net 30',
                amount: '$2,500',
                items: [
                    { desc: 'Q2 Website Maintenance', qty: 3, rate: '$833.33', amount: '$2,500' }
                ]
            },
            6: {
                id: '#INV-2025-006',
                project: 'AI Customer Support - Pilot',
                status: 'cancelled',
                statusLabel: 'Cancelled',
                client: 'John Doe',
                clientCompany: 'TechCorp GmbH',
                clientEmail: 'john@techcorp.com',
                issue: 'Apr 20, 2025',
                due: 'May 20, 2025',
                terms: 'Net 30',
                amount: '$4,000',
                items: [
                    { desc: 'AI Customer Support Pilot', qty: 1, rate: '$4,000', amount: '$4,000' }
                ]
            }
        };

        // View invoice detail
        document.querySelectorAll('.view-invoice').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.invoice-card');
                const invoiceId = card.dataset.invoice;
                showInvoiceDetail(invoiceId);
            });
        });

        // Click on card to view detail
        document.querySelectorAll('.invoice-card').forEach(card => {
            card.addEventListener('click', function() {
                const invoiceId = this.dataset.invoice;
                showInvoiceDetail(invoiceId);
            });
        });

        function showInvoiceDetail(invoiceId) {
            const data = invoiceData[invoiceId];
            if (!data) return;

            document.getElementById('detailId').textContent = data.id;
            document.getElementById('detailProject').textContent = data.project;
            document.getElementById('detailClient').textContent = data.client;
            document.getElementById('detailClientCompany').textContent = data.clientCompany;
            document.getElementById('detailClientEmail').textContent = data.clientEmail;
            document.getElementById('detailIssue').textContent = data.issue;
            document.getElementById('detailDue').textContent = data.due;
            document.getElementById('detailTerms').textContent = data.terms;
            document.getElementById('detailAmount').textContent = data.amount;
            document.getElementById('payAmount').textContent = data.amount;
            document.getElementById('confirmAmount').textContent = data.amount;

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.statusLabel;
            statusBadge.className = 'status-badge status-' + data.status;

            const statusBadge2 = document.getElementById('detailStatusBadge');
            statusBadge2.textContent = data.statusLabel;
            statusBadge2.className = 'status-badge status-' + data.status;

            // Update items
            const tbody = document.getElementById('detailItems');
            tbody.innerHTML = '';
            data.items.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.desc}</td>
                    <td>${item.qty}</td>
                    <td>${item.rate}</td>
                    <td>${item.amount}</td>
                `;
                tbody.appendChild(tr);
            });

            // Show/hide payment section
            const paymentSection = document.getElementById('paymentSection');
            if (data.status === 'pending' || data.status === 'overdue') {
                paymentSection.style.display = 'block';
            } else {
                paymentSection.style.display = 'none';
            }

            // Show detail, hide list
            document.getElementById('invoiceList').style.display = 'none';
            document.getElementById('invoiceDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to invoices
        document.getElementById('backToInvoices').addEventListener('click', function() {
            document.getElementById('invoiceList').style.display = 'block';
            document.getElementById('invoiceDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Process payment
        document.getElementById('processPayment').addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
            modal.show();
            
            // Update invoice status in detail view
            setTimeout(() => {
                const statusBadge = document.getElementById('detailStatus');
                statusBadge.textContent = 'Paid';
                statusBadge.className = 'status-badge status-paid';
                const statusBadge2 = document.getElementById('detailStatusBadge');
                statusBadge2.textContent = 'Paid';
                statusBadge2.className = 'status-badge status-paid';
                document.getElementById('paymentSection').style.display = 'none';
            }, 500);
        });

        // Pay Now buttons
        document.querySelectorAll('.pay-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.invoice-card');
                const invoiceId = card.dataset.invoice;
                showInvoiceDetail(invoiceId);
                setTimeout(() => {
                    document.getElementById('paymentSection').scrollIntoView({ behavior: 'smooth' });
                }, 300);
            });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const invoices = document.querySelectorAll('.invoice-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                invoices.forEach(inv => {
                    if (filter === 'all' || inv.dataset.status === filter) {
                        inv.style.display = 'block';
                    } else {
                        inv.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('invoiceSearch');
        const mobileSearchInput = document.getElementById('mobileInvoiceSearch');

        function filterInvoices(query) {
            invoices.forEach(inv => {
                const text = inv.textContent.toLowerCase();
                if (text.includes(query)) {
                    inv.style.display = 'block';
                } else {
                    inv.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', function() {
            filterInvoices(this.value.toLowerCase());
        });

        mobileSearchInput.addEventListener('input', function() {
            filterInvoices(this.value.toLowerCase());
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
    </script>
</body>
</html>