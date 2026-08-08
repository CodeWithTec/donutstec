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
    body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: var(--bg-white); color: #1f2937; scroll-behavior: smooth; }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .portfolio-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .filter-btn { border-radius: 40px; padding: 8px 24px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; }
    .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
    .project-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; overflow: hidden; }
    .project-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .project-card img { width: 100%; height: 220px; object-fit: cover; }
    .project-tag { background: #eef2ff; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.8rem; display: inline-block; margin: 2px; }
    .admin-card { border-radius: 24px; box-shadow: var(--shadow-sm); background: white; padding: 24px; }
    .admin-card .table th { background: #f8fafc; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .portfolio-hero h1 { font-size: 2.4rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
<?php require "views/partials/navbar.php"; ?>

  <!-- PORTFOLIO HERO -->
  <section class="portfolio-hero" id="portfolio">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col-lg-6 " data-aos="fade-right">
          <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Our Work</span>
          <h1 class="display-4 fw-bold mt-3">Projects that <span class="text-primary">Deliver Impact</span></h1>
          <p class="lead text-muted">Explore our portfolio of successful digital solutions across industries.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#project-grid" class="btn btn-primary rounded-pill px-4">View Projects</a>
            <a href="#admin-panel" class="btn btn-outline-secondary rounded-pill px-4">Admin Panel</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-folder-open fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">50+ completed projects</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FILTER & SEARCH -->
  <section class="py-4 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6" data-aos="fade-right">
          <div class="d-flex flex-wrap gap-2">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="websites">Websites</button>
            <button class="filter-btn" data-filter="webapps">Web Apps</button>
            <button class="filter-btn" data-filter="mobile">Mobile Apps</button>
            <button class="filter-btn" data-filter="erp">ERP Systems</button>
            <button class="filter-btn" data-filter="school">School Systems</button>
            <button class="filter-btn" data-filter="ecommerce">E-commerce</button>
            <button class="filter-btn" data-filter="government">Government</button>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
            <input type="text" id="projectSearch" class="form-control" placeholder="Search projects..." />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECT GRID -->
  <section id="project-grid" class="py-5">
    <div class="container">
      <div class="row g-4" id="projectContainer">
        <!-- Project 1 -->
        <div class="col-md-4 project-item" data-category="webapps ecommerce">
          <div class="project-card" data-aos="flip-up">
            <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=E-Commerce+Platform" alt="E-Commerce Platform" />
            <div class="p-4">
              <h5>E-Commerce Platform</h5>
              <div class="mb-2"><span class="project-tag">Web App</span><span class="project-tag">E-commerce</span></div>
              <p class="small text-muted">Full-featured online store with payment gateway, inventory, and admin dashboard.</p>
              <div><strong>Tech:</strong> React, Node.js, Stripe, MongoDB</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Project 2 -->
        <div class="col-md-4 project-item" data-category="school erp">
          <div class="project-card" data-aos="flip-up" data-aos-delay="100">
            <img src="https://via.placeholder.com/600x400/111827/ffffff?text=School+Management" alt="School Management" />
            <div class="p-4">
              <h5>School Management System</h5>
              <div class="mb-2"><span class="project-tag">ERP</span><span class="project-tag">School</span></div>
              <p class="small text-muted">Complete solution for student records, attendance, grades, and parent communication.</p>
              <div><strong>Tech:</strong> Laravel, Vue.js, MySQL, Redis</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Project 3 -->
        <div class="col-md-4 project-item" data-category="mobile healthcare">
          <div class="project-card" data-aos="flip-up" data-aos-delay="200">
            <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=Healthcare+App" alt="Healthcare App" />
            <div class="p-4">
              <h5>Healthcare Portal</h5>
              <div class="mb-2"><span class="project-tag">Mobile</span><span class="project-tag">Web App</span></div>
              <p class="small text-muted">Patient appointment booking, telemedicine, and electronic health records.</p>
              <div><strong>Tech:</strong> React Native, Django, PostgreSQL</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Project 4 -->
        <div class="col-md-4 project-item" data-category="websites government">
          <div class="project-card" data-aos="flip-up" data-aos-delay="300">
            <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=Gov+Portal" alt="Government Portal" />
            <div class="p-4">
              <h5>Government Services Portal</h5>
              <div class="mb-2"><span class="project-tag">Website</span><span class="project-tag">Government</span></div>
              <p class="small text-muted">Citizen services platform with document management and e-signature integration.</p>
              <div><strong>Tech:</strong> Angular, .NET Core, SQL Server, Azure</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Project 5 -->
        <div class="col-md-4 project-item" data-category="erp ecommerce">
          <div class="project-card" data-aos="flip-up" data-aos-delay="400">
            <img src="https://via.placeholder.com/600x400/111827/ffffff?text=ERP+System" alt="ERP System" />
            <div class="p-4">
              <h5>ERP System</h5>
              <div class="mb-2"><span class="project-tag">ERP</span><span class="project-tag">E-commerce</span></div>
              <p class="small text-muted">Integrated business management with inventory, HR, finance, and CRM modules.</p>
              <div><strong>Tech:</strong> Java, Spring Boot, React, PostgreSQL</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Project 6 -->
        <div class="col-md-4 project-item" data-category="mobile webapps">
          <div class="project-card" data-aos="flip-up" data-aos-delay="500">
            <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=Event+App" alt="Event App" />
            <div class="p-4">
              <h5>Event Management Platform</h5>
              <div class="mb-2"><span class="project-tag">Mobile</span><span class="project-tag">Web App</span></div>
              <p class="small text-muted">Ticketing, attendee management, and virtual event streaming capabilities.</p>
              <div><strong>Tech:</strong> Flutter, Firebase, Node.js</div>
              <div class="mt-2 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">Live Demo</a>
                <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECT DETAILS MODAL (demo) -->
  <div class="modal fade" id="projectModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold">Project Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <img src="https://via.placeholder.com/800x400/2563EB/ffffff?text=Project+Details" class="img-fluid rounded-4 mb-3" />
          <h4>E-Commerce Platform</h4>
          <p class="text-muted">This project involved building a full-featured e-commerce solution with payment processing, inventory management, and real-time analytics.</p>
          <div><strong>Category:</strong> Web App, E-commerce</div>
          <div><strong>Technologies:</strong> React, Node.js, Stripe, MongoDB, Redis</div>
          <div><strong>Client:</strong> RetailCo</div>
          <div><strong>Completion:</strong> March 2025</div>
          <div class="mt-3 d-flex gap-2">
            <a href="#" class="btn btn-primary rounded-pill px-4">Live Demo</a>
            <a href="#" class="btn btn-outline-secondary rounded-pill px-4">GitHub</a>
            <a href="#contact" class="btn btn-outline-primary rounded-pill px-4">Contact About Project</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ADMIN PANEL (Portfolio Management) -->
  <section id="admin-panel" class="py-5 bg-light">
    <div class="container">
      <div class="admin-card" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold"><i class="fas fa-cog me-2 text-primary"></i> Portfolio Management</h4>
          <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addProjectModal">
            <i class="fas fa-plus me-1"></i> Add Project
          </button>
        </div>
        <div class="table-responsive">
          <table id="portfolioTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Project</th>
                <th>Category</th>
                <th>Technologies</th>
                <th>Client</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-semibold">E-Commerce Platform</span></td>
                <td><span class="project-tag">Web App</span></td>
                <td>React, Node.js, MongoDB</td>
                <td>RetailCo</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</button>
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">School Management</span></td>
                <td><span class="project-tag">ERP</span></td>
                <td>Laravel, Vue.js, MySQL</td>
                <td>EduTech</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</button>
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">Healthcare Portal</span></td>
                <td><span class="project-tag">Mobile</span></td>
                <td>React Native, Django</td>
                <td>HealthPlus</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</button>
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- ADD PROJECT MODAL -->
  <div class="modal fade" id="addProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i>Add New Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Project Name" /></div>
              <div class="col-md-6">
                <select class="form-select"><option>Select Category</option><option>Websites</option><option>Web Apps</option><option>Mobile Apps</option><option>ERP Systems</option><option>School Systems</option><option>E-commerce</option><option>Government</option></select>
              </div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Technologies (comma separated)" /></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Client Name" /></div>
              <div class="col-md-6"><input type="date" class="form-control" placeholder="Completion Date" /></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Live Demo URL" /></div>
              <div class="col-12"><input type="file" class="form-control" multiple accept="image/*" /></div>
              <div class="col-12"><textarea class="form-control" rows="3" placeholder="Project Description"></textarea></div>
              <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Save Project</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php require "views/partials/footer.php"; ?>

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
      $('#portfolioTable').DataTable({
        pageLength: 5,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf']
      });
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
          if (filter === 'all' || proj.dataset.category.includes(filter)) {
            proj.style.display = 'block';
          } else {
            proj.style.display = 'none';
          }
        });
      });
    });

    // Search functionality
    document.getElementById('projectSearch').addEventListener('input', function() {
      const query = this.value.toLowerCase();
      projects.forEach(proj => {
        const title = proj.querySelector('h5')?.textContent.toLowerCase() || '';
        const desc = proj.querySelector('p')?.textContent.toLowerCase() || '';
        if (title.includes(query) || desc.includes(query)) {
          proj.style.display = 'block';
        } else {
          proj.style.display = 'none';
        }
      });
    });

    // Demo: click on project card to show modal
    document.querySelectorAll('.project-card .btn-outline-secondary').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const modal = new bootstrap.Modal(document.getElementById('projectModal'));
        modal.show();
      });
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
  </script>
</body>
</html>