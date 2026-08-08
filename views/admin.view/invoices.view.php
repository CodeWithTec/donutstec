<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Invoices · DonutsTec</title>
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
                        <h5 class="fw-bold mb-0">Invoice Management</h5>
                        <small class="text-muted">Manage all invoices, payments, and financial records</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#newInvoiceModal">
                            <i class="fas fa-plus me-2"></i>New Invoice
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">$128,500</div><div class="label">Total Revenue</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">$98,500</div><div class="label">Collected</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">$18,500</div><div class="label">Pending</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#dc2626;"><div class="number">$11,500</div><div class="label">Overdue</div></div>
                        </div>
                    </div>

                    <!-- Charts
                    <div class="row g-3 mt-2">
                        <div class="col-md-7" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Revenue Overview</h6>
                                <canvas id="revenueChart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Invoice Status Distribution</h6>
                                <canvas id="statusChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                        --->
                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Invoices</button>
                                <button class="filter-btn" data-filter="paid">Paid</button>
                                <button class="filter-btn" data-filter="pending">Pending</button>
                                <button class="filter-btn" data-filter="overdue">Overdue</button>
                                <button class="filter-btn" data-filter="cancelled">Cancelled</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="invoiceSearch" class="form-control" placeholder="Search invoices..." />
                            </div>
                        </div>
                    </div>

                    <!-- Invoice List -->
                    <div class="mt-3" id="invoiceList">
                        <div class="row g-3" id="invoiceContainer">
                            <!-- Invoice 1 -->
                            <div class="col-md-6 invoice-item" data-status="pending">
                                <div class="invoice-card p-3" data-invoice="1">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-pending">Pending</span>
                                            <h6 class="mt-2 fw-bold">E-Commerce Platform - Phase 2</h6>
                                            <p class="small text-muted mb-1">#INV-2025-001</p>
                                            <p class="small mb-1">Client: RetailCo</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $12,500</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Due: Jun 30, 2025</small>
                                            <button class="btn btn-sm btn-primary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 2 -->
                            <div class="col-md-6 invoice-item" data-status="overdue">
                                <div class="invoice-card p-3" data-invoice="2">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-overdue">Overdue</span>
                                            <h6 class="mt-2 fw-bold">API Development</h6>
                                            <p class="small text-muted mb-1">#INV-2025-002</p>
                                            <p class="small mb-1">Client: DataCorp</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $3,500</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Due: Jun 15, 2025</small>
                                            <button class="btn btn-sm btn-danger rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 3 -->
                            <div class="col-md-6 invoice-item" data-status="paid">
                                <div class="invoice-card p-3" data-invoice="3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-paid">Paid</span>
                                            <h6 class="mt-2 fw-bold">Healthcare Portal</h6>
                                            <p class="small text-muted mb-1">#INV-2025-003</p>
                                            <p class="small mb-1">Client: HealthPlus</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $15,000</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Paid: May 10, 2025</small>
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 4 -->
                            <div class="col-md-6 invoice-item" data-status="pending">
                                <div class="invoice-card p-3" data-invoice="4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-pending">Pending</span>
                                            <h6 class="mt-2 fw-bold">School Management System</h6>
                                            <p class="small text-muted mb-1">#INV-2025-004</p>
                                            <p class="small mb-1">Client: EduTech</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $8,000</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Due: Aug 15, 2025</small>
                                            <button class="btn btn-sm btn-primary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 5 -->
                            <div class="col-md-6 invoice-item" data-status="paid">
                                <div class="invoice-card p-3" data-invoice="5">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-paid">Paid</span>
                                            <h6 class="mt-2 fw-bold">Website Maintenance - Q2</h6>
                                            <p class="small text-muted mb-1">#INV-2025-005</p>
                                            <p class="small mb-1">Client: ServicePro</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $2,500</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Paid: Jun 1, 2025</small>
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 view-invoice">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice 6 -->
                            <div class="col-md-6 invoice-item" data-status="cancelled">
                                <div class="invoice-card p-3" data-invoice="6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span class="status-badge status-cancelled">Cancelled</span>
                                            <h6 class="mt-2 fw-bold">AI Customer Support - Pilot</h6>
                                            <p class="small text-muted mb-1">#INV-2025-006</p>
                                            <p class="small mb-1">Client: StartupX</p>
                                            <p class="small mb-0"><strong>Amount:</strong> $4,000</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Cancelled: May 20, 2025</small>
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
                                    <p id="detailClient" class="mb-0">RetailCo</p>
                                    <p id="detailClientName" class="mb-0">John Doe</p>
                                    <p id="detailClientEmail" class="mb-0">john@retailco.com</p>
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

                            <!-- Payment Section (for pending/overdue) -->
                            <div id="paymentSection" class="mt-4">
                                <h6 class="fw-bold">Process Payment</h6>
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
                                            <p class="mb-1"><strong>Amount:</strong> <span class="fw-bold" id="payAmount">$12,500</span></p>
                                            <button class="btn btn-success w-100 rounded-pill py-2" id="processPayment">
                                                <i class="fas fa-lock me-2"></i>Mark as Paid
                                            </button>
                                            <button class="btn btn-outline-secondary w-100 rounded-pill py-2 mt-2">
                                                <i class="fas fa-envelope me-2"></i>Send Reminder
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="mt-4 d-flex gap-3">
                                <button class="btn btn-outline-primary rounded-pill px-4"><i class="fas fa-download me-2"></i>Download PDF</button>
                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-print me-2"></i>Print</button>
                                <button class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-share-alt me-2"></i>Share</button>
                                <button class="btn btn-outline-danger rounded-pill px-4"><i class="fas fa-trash me-2"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NEW INVOICE MODAL -->
    <div class="modal fade" id="newInvoiceModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-file-invoice text-primary me-2"></i>Create Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <select class="form-select"><option>Select Client</option><option>RetailCo</option><option>HealthPlus</option><option>EduTech</option><option>DataCorp</option></select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select"><option>Select Project</option><option>E-Commerce Platform</option><option>Healthcare Portal</option><option>School Management</option><option>API Development</option></select>
                            </div>
                            <div class="col-md-6"><input type="date" class="form-control" value="2025-06-01" /></div>
                            <div class="col-md-6"><input type="date" class="form-control" value="2025-06-30" /></div>
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead><tr><th>Description</th><th>Qty</th><th>Rate</th><th>Amount</th></tr></thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Item description" value="Development Services" /></td>
                                            <td><input type="number" class="form-control" value="1" style="width:70px;" /></td>
                                            <td><input type="number" class="form-control" value="12500" style="width:100px;" /></td>
                                            <td>$12,500</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-plus me-1"></i>Add Item</button>
                            </div>
                            <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Generate Invoice</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- PAYMENT CONFIRMATION MODAL -->
    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-body text-center p-5">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Payment Recorded</h4>
                    <p class="text-muted">Invoice <strong id="confirmInvoice">#INV-2025-001</strong> has been marked as paid.</p>
                    <p class="text-muted">A receipt has been sent to the client.</p>
                    <button class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">OK</button>
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
                client: 'RetailCo',
                clientName: 'John Doe',
                clientEmail: 'john@retailco.com',
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
                client: 'DataCorp',
                clientName: 'Emily Chen',
                clientEmail: 'emily@datacorp.com',
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
                client: 'HealthPlus',
                clientName: 'Sarah Smith',
                clientEmail: 'sarah@healthplus.com',
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
                client: 'EduTech',
                clientName: 'Mike Johnson',
                clientEmail: 'mike@edutech.com',
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
                client: 'ServicePro',
                clientName: 'Anna Martinez',
                clientEmail: 'anna@servicepro.com',
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
                client: 'StartupX',
                clientName: 'Robert Wilson',
                clientEmail: 'robert@startupx.com',
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
            document.getElementById('detailClientName').textContent = data.clientName;
            document.getElementById('detailClientEmail').textContent = data.clientEmail;
            document.getElementById('detailIssue').textContent = data.issue;
            document.getElementById('detailDue').textContent = data.due;
            document.getElementById('detailTerms').textContent = data.terms;
            document.getElementById('detailAmount').textContent = data.amount;
            document.getElementById('payAmount').textContent = data.amount;
            document.getElementById('confirmInvoice').textContent = data.id;

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
        document.getElementById('invoiceSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            invoices.forEach(inv => {
                const text = inv.textContent.toLowerCase();
                if (text.includes(query)) {
                    inv.style.display = 'block';
                } else {
                    inv.style.display = 'none';
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
        document.querySelector('#newInvoiceModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Invoice created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('newInvoiceModal'));
            modal.hide();
            this.reset();
        });
    </script>
</body>
</html>