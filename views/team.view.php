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
    body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: var(--bg-white); color: #1f2937; }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .page-header { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .team-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; overflow: hidden; }
    .team-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .team-card .card-img-top { height: 280px; object-fit: cover; }
    .team-card .social-links a { width: 36px; height: 36px; border-radius: 50%; background: #f1f5f9; display: inline-flex; align-items: center; justify-content: center; color: #4b5563; transition: 0.3s; text-decoration: none; }
    .team-card .social-links a:hover { background: var(--primary); color: white; transform: translateY(-2px); }
    .team-card .role-badge { background: #eef2ff; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600; }
    .filter-btn { border-radius: 40px; padding: 8px 24px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
    .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
    .leader-card { border: none; border-radius: 28px; box-shadow: var(--shadow-sm); background: white; padding: 32px; }
    .leader-card .avatar { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid white; box-shadow: var(--shadow-sm); }
    .join-card { background: linear-gradient(135deg, var(--primary), #1d4ed8); border-radius: 28px; padding: 48px; color: white; }
    .join-card .btn { background: white; color: var(--primary); }
    .join-card .btn:hover { background: #f8fafc; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.15); }
    .stat-box { background: white; border-radius: 20px; padding: 24px; box-shadow: var(--shadow-sm); border-left: 4px solid var(--primary); }
    .stat-box .number { font-size: 2.5rem; font-weight: 700; color: var(--secondary); }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .page-header h1 { font-size: 2.4rem; }
      .team-card .card-img-top { height: 200px; }
      .join-card { padding: 28px; }
      .leader-card { padding: 24px; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require "views/partials/navbar.php"; ?>

  <!-- PAGE HEADER -->
  <section class="page-header" id="team">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Meet Our Team</span>
          <h1 class="display-4 fw-bold mt-3">The People Behind <span class="text-primary">DonutsTec</span></h1>
          <p class="lead text-muted">A diverse team of innovators, engineers, and creators dedicated to building exceptional digital solutions.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#team-grid" class="btn btn-primary rounded-pill px-4">Meet the Team</a>
            <a href="#join-us" class="btn btn-outline-secondary rounded-pill px-4">Join Us</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-users fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">50+ team members worldwide</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS -->
  <section class="py-4 bg-light">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="fade-up">
          <div class="stat-box text-center"><div class="number">50+</div><div>Team Members</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
          <div class="stat-box text-center" style="border-left-color:#22c55e;"><div class="number">15+</div><div>Countries</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
          <div class="stat-box text-center" style="border-left-color:var(--accent);"><div class="number">8</div><div>Departments</div></div>
        </div>
        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
          <div class="stat-box text-center" style="border-left-color:#8b5cf6;"><div class="number">10+</div><div>Years Combined</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- LEADERSHIP -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Leadership <span class="text-primary">Team</span></h2>
        <p class="text-muted">Visionaries driving our mission forward</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="flip-left">
          <div class="leader-card text-center">
            <img src="https://via.placeholder.com/100/2563EB/ffffff?text=CEO" class="avatar" alt="CEO" />
            <h5 class="mt-3 fw-bold">Alex Rivera</h5>
            <p class="text-muted small">CEO & Founder</p>
            <span class="role-badge">Leadership</span>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="50">
          <div class="leader-card text-center">
            <img src="https://via.placeholder.com/100/111827/ffffff?text=CTO" class="avatar" alt="CTO" />
            <h5 class="mt-3 fw-bold">Jamie Chen</h5>
            <p class="text-muted small">CTO</p>
            <span class="role-badge">Engineering</span>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="100">
          <div class="leader-card text-center">
            <img src="https://via.placeholder.com/100/F59E0B/111827?text=Design" class="avatar" alt="Design" />
            <h5 class="mt-3 fw-bold">Priya Patel</h5>
            <p class="text-muted small">Lead Designer</p>
            <span class="role-badge">Design</span>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="150">
          <div class="leader-card text-center">
            <img src="https://via.placeholder.com/100/2563EB/ffffff?text=Dev" class="avatar" alt="Dev" />
            <h5 class="mt-3 fw-bold">Marcus Ng</h5>
            <p class="text-muted small">Senior Developer</p>
            <span class="role-badge">Engineering</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FILTER -->
  <section class="py-3 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8" data-aos="fade-right">
          <div class="d-flex flex-wrap gap-2">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="engineering">Engineering</button>
            <button class="filter-btn" data-filter="design">Design</button>
            <button class="filter-btn" data-filter="management">Management</button>
            <button class="filter-btn" data-filter="sales">Sales & Marketing</button>
            <button class="filter-btn" data-filter="support">Support</button>
            <button class="filter-btn" data-filter="leadership">Leadership</button>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-left">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
            <input type="text" id="teamSearch" class="form-control" placeholder="Search team members..." />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TEAM GRID -->
  <section id="team-grid" class="py-5">
    <div class="container">
      <div class="row g-4" id="teamContainer">
        <!-- Engineering -->
        <div class="col-md-3 col-sm-6 team-item" data-department="engineering">
          <div class="team-card" data-aos="fade-up">
            <img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=Engineer+1" class="card-img-top" alt="Engineer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Sarah Johnson</h6>
              <span class="role-badge">Engineering</span>
              <p class="small text-muted mt-1">Senior Full-Stack Developer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Engineering -->
        <div class="col-md-3 col-sm-6 team-item" data-department="engineering">
          <div class="team-card" data-aos="fade-up" data-aos-delay="50">
            <img src="https://via.placeholder.com/400x300/111827/ffffff?text=Engineer+2" class="card-img-top" alt="Engineer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Mike Chen</h6>
              <span class="role-badge">Engineering</span>
              <p class="small text-muted mt-1">DevOps Engineer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Design -->
        <div class="col-md-3 col-sm-6 team-item" data-department="design">
          <div class="team-card" data-aos="fade-up" data-aos-delay="100">
            <img src="https://via.placeholder.com/400x300/F59E0B/111827?text=Designer+1" class="card-img-top" alt="Designer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Lisa Park</h6>
              <span class="role-badge">Design</span>
              <p class="small text-muted mt-1">UI/UX Designer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
                <a href="#"><i class="fab fa-behance"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Engineering -->
        <div class="col-md-3 col-sm-6 team-item" data-department="engineering">
          <div class="team-card" data-aos="fade-up" data-aos-delay="150">
            <img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=Engineer+3" class="card-img-top" alt="Engineer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Tom Wagner</h6>
              <span class="role-badge">Engineering</span>
              <p class="small text-muted mt-1">QA Engineer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Management -->
        <div class="col-md-3 col-sm-6 team-item" data-department="management">
          <div class="team-card" data-aos="fade-up" data-aos-delay="200">
            <img src="https://via.placeholder.com/400x300/111827/ffffff?text=PM" class="card-img-top" alt="PM" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Rachel Green</h6>
              <span class="role-badge">Management</span>
              <p class="small text-muted mt-1">Project Manager</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Sales -->
        <div class="col-md-3 col-sm-6 team-item" data-department="sales">
          <div class="team-card" data-aos="fade-up" data-aos-delay="250">
            <img src="https://via.placeholder.com/400x300/F59E0B/111827?text=Sales" class="card-img-top" alt="Sales" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">David Kim</h6>
              <span class="role-badge">Sales</span>
              <p class="small text-muted mt-1">Sales Director</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Support -->
        <div class="col-md-3 col-sm-6 team-item" data-department="support">
          <div class="team-card" data-aos="fade-up" data-aos-delay="300">
            <img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=Support" class="card-img-top" alt="Support" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Anna Schmidt</h6>
              <span class="role-badge">Support</span>
              <p class="small text-muted mt-1">Customer Support Lead</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Design -->
        <div class="col-md-3 col-sm-6 team-item" data-department="design">
          <div class="team-card" data-aos="fade-up" data-aos-delay="350">
            <img src="https://via.placeholder.com/400x300/111827/ffffff?text=Designer+2" class="card-img-top" alt="Designer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Emma Wilson</h6>
              <span class="role-badge">Design</span>
              <p class="small text-muted mt-1">Motion Designer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Leadership -->
        <div class="col-md-3 col-sm-6 team-item" data-department="leadership">
          <div class="team-card" data-aos="fade-up" data-aos-delay="400">
            <img src="https://via.placeholder.com/400x300/F59E0B/111827?text=Leadership" class="card-img-top" alt="Leadership" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">James O'Brien</h6>
              <span class="role-badge">Leadership</span>
              <p class="small text-muted mt-1">VP of Engineering</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Engineering -->
        <div class="col-md-3 col-sm-6 team-item" data-department="engineering">
          <div class="team-card" data-aos="fade-up" data-aos-delay="450">
            <img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=Engineer+4" class="card-img-top" alt="Engineer" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Sofia Rodriguez</h6>
              <span class="role-badge">Engineering</span>
              <p class="small text-muted mt-1">AI/ML Engineer</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Support -->
        <div class="col-md-3 col-sm-6 team-item" data-department="support">
          <div class="team-card" data-aos="fade-up" data-aos-delay="500">
            <img src="https://via.placeholder.com/400x300/111827/ffffff?text=Support+2" class="card-img-top" alt="Support" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Carlos Mendez</h6>
              <span class="role-badge">Support</span>
              <p class="small text-muted mt-1">Technical Support Specialist</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Management -->
        <div class="col-md-3 col-sm-6 team-item" data-department="management">
          <div class="team-card" data-aos="fade-up" data-aos-delay="550">
            <img src="https://via.placeholder.com/400x300/F59E0B/111827?text=Management" class="card-img-top" alt="Management" />
            <div class="p-3">
              <h6 class="fw-bold mb-0">Nina Patel</h6>
              <span class="role-badge">Management</span>
              <p class="small text-muted mt-1">Product Manager</p>
              <div class="social-links d-flex gap-1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JOIN US -->
  <section id="join-us" class="py-5">
    <div class="container">
      <div class="join-card" data-aos="fade-up">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <h2 class="fw-bold">Join Our <span style="color:var(--accent);">Team</span></h2>
            <p class="mb-0 opacity-75">We're always looking for talented individuals to join our mission. Check out our open positions and become part of the DonutsTec family.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="#careers" class="btn rounded-pill px-5 py-2 fw-bold">View Openings <i class="fas fa-arrow-right ms-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
 <?php require "views/partials/footer.php"; ?>

  <!-- Bootstrap + AOS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true, duration: 700 });

    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const teamMembers = document.querySelectorAll('.team-item');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        filterBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        teamMembers.forEach(member => {
          if (filter === 'all' || member.dataset.department === filter) {
            member.style.display = 'block';
          } else {
            member.style.display = 'none';
          }
        });
      });
    });

    // Search functionality
    document.getElementById('teamSearch').addEventListener('input', function() {
      const query = this.value.toLowerCase();
      teamMembers.forEach(member => {
        const name = member.querySelector('h6')?.textContent.toLowerCase() || '';
        const role = member.querySelector('p')?.textContent.toLowerCase() || '';
        if (name.includes(query) || role.includes(query)) {
          member.style.display = 'block';
        } else {
          member.style.display = 'none';
        }
      });
    });

    // Social link clicks - demo
    document.querySelectorAll('.social-links a').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        alert('This would open the team member\'s social profile.');
      });
    });

    // Join us button
    document.querySelector('.join-card .btn')?.addEventListener('click', function(e) {
      e.preventDefault();
      alert('This would navigate to the Careers page.');
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
    document.querySelectorAll('a[href="#careers"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Careers page demo') }));
  </script>
</body>
</html>