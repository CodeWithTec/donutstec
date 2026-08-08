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
    .glass { background: rgba(255,255,255,0.7); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.2); }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .about-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .timeline-item { border-left: 3px solid var(--primary); padding-left: 24px; margin-bottom: 32px; position: relative; }
    .timeline-item::before { content: ''; width: 14px; height: 14px; background: var(--primary); border-radius: 50%; position: absolute; left: -8px; top: 4px; }
    .team-card { border: none; border-radius: 28px; box-shadow: var(--shadow-sm); transition: 0.3s; background: white; overflow: hidden; }
    .team-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .team-card img { width: 100%; height: 200px; object-fit: cover; }
    .value-icon { width: 70px; height: 70px; background: #eef2ff; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--primary); }
    .tech-badge { background: #f1f5f9; padding: 8px 18px; border-radius: 40px; font-size: 0.9rem; display: inline-block; margin: 4px; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .about-hero h1 { font-size: 2.4rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION (same as home) -->
  <?php require "views/partials/navbar.php"; ?>

  <!-- ABOUT HERO -->
  <section class="about-hero" id="about">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary text-white bg-opacity-10 px-3 py-2 rounded-pill">About Us</span>
          <h1 class="display-4 fw-bold mt-3">Crafting <span class="text-primary">Digital Excellence</span> Since 2020</h1>
          <p class="lead text-muted">DonutsTec is a software development company that blends creativity, technology, and strategy to build solutions that drive business growth.</p>
          <div class="d-flex gap-3 mt-4">
            <div><span class="fw-bold fs-4 text-primary">100+</span><br /><span class="text-muted">Projects</span></div>
            <div><span class="fw-bold fs-4 text-primary">50+</span><br /><span class="text-muted">Clients</span></div>
            <div><span class="fw-bold fs-4 text-primary">99%</span><br /><span class="text-muted">Satisfaction</span></div>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="glass p-5 rounded-5">
            <i class="fas fa-rocket fa-5x text-primary opacity-75"></i>
            <p class="mt-3 fw-semibold">Innovation · Quality · Trust</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6" data-aos="fade-up">
          <div class="p-4 bg-white rounded-4 shadow-sm h-100">
            <div class="value-icon mb-3"><i class="fas fa-bullseye"></i></div>
            <h3 class="fw-bold">Our Mission</h3>
            <p class="text-muted">To empower businesses with scalable, secure, and innovative digital solutions that solve real-world problems and create lasting value.</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 bg-white rounded-4 shadow-sm h-100">
            <div class="value-icon mb-3"><i class="fas fa-eye"></i></div>
            <h3 class="fw-bold">Our Vision</h3>
            <p class="text-muted">To become the most trusted technology partner for businesses worldwide, known for excellence, integrity, and transformative impact.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CORE VALUES -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Our <span class="text-primary">Core Values</span></h2>
        <p class="text-muted">The principles that guide everything we do</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="zoom-in"><div class="text-center p-3"><i class="fas fa-handshake fa-3x text-primary"></i><h5 class="mt-2">Integrity</h5><p class="small text-muted">Honest, transparent partnerships</p></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="50"><div class="text-center p-3"><i class="fas fa-lightbulb fa-3x text-primary"></i><h5 class="mt-2">Innovation</h5><p class="small text-muted">Pushing boundaries daily</p></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="100"><div class="text-center p-3"><i class="fas fa-users fa-3x text-primary"></i><h5 class="mt-2">Collaboration</h5><p class="small text-muted">Teamwork with clients</p></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="150"><div class="text-center p-3"><i class="fas fa-award fa-3x text-primary"></i><h5 class="mt-2">Excellence</h5><p class="small text-muted">Quality in every line of code</p></div></div>
      </div>
    </div>
  </section>

  <!-- TIMELINE -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Our <span class="text-primary">Journey</span></h2>
        <p class="text-muted">Key milestones that shaped DonutsTec</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="timeline-item" data-aos="fade-right"><h5>2020 · Founded</h5><p class="text-muted">DonutsTec launched with a vision to bring enterprise-grade software to startups and SMEs.</p></div>
          <div class="timeline-item" data-aos="fade-right" data-aos-delay="50"><h5>2021 · First 10 Clients</h5><p class="text-muted">Delivered custom ERP and e-commerce platforms, earning a 100% satisfaction rate.</p></div>
          <div class="timeline-item" data-aos="fade-right" data-aos-delay="100"><h5>2022 · Expanded Team</h5><p class="text-muted">Grew to 15+ engineers, designers, and consultants across 3 countries.</p></div>
          <div class="timeline-item" data-aos="fade-right" data-aos-delay="150"><h5>2023 · AI & Cloud Practice</h5><p class="text-muted">Launched dedicated AI solutions and cloud migration services.</p></div>
          <div class="timeline-item" data-aos="fade-right" data-aos-delay="200"><h5>2024 · Global Reach</h5><p class="text-muted">Serving clients in 12+ countries with 50+ successful projects.</p></div>
          <div class="timeline-item" data-aos="fade-right" data-aos-delay="250"><h5>2025 · Innovation Lab</h5><p class="text-muted">Opened R&D lab focused on generative AI and Web3 technologies.</p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- MEET THE TEAM -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Meet the <span class="text-primary">Team</span></h2>
        <p class="text-muted">Passionate people behind the code</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="flip-left"><div class="team-card"><img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=CEO" alt="CEO"><div class="p-3"><h5 class="mb-0">Alex Rivera</h5><small class="text-muted">CEO & Founder</small></div></div></div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="50"><div class="team-card"><img src="https://via.placeholder.com/400x300/111827/ffffff?text=CTO" alt="CTO"><div class="p-3"><h5 class="mb-0">Jamie Chen</h5><small class="text-muted">CTO</small></div></div></div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="100"><div class="team-card"><img src="https://via.placeholder.com/400x300/F59E0B/111827?text=Design" alt="Design"><div class="p-3"><h5 class="mb-0">Priya Patel</h5><small class="text-muted">Lead Designer</small></div></div></div>
        <div class="col-md-3 col-6" data-aos="flip-left" data-aos-delay="150"><div class="team-card"><img src="https://via.placeholder.com/400x300/2563EB/ffffff?text=Dev" alt="Dev"><div class="p-3"><h5 class="mb-0">Marcus Ng</h5><small class="text-muted">Senior Developer</small></div></div></div>
      </div>
    </div>
  </section>

  <!-- TECHNOLOGIES / CERTIFICATIONS -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up">
        <h2 class="fw-bold">Tech Stack & <span class="text-primary">Certifications</span></h2>
        <p class="text-muted">Tools and credentials we bring to every project</p>
      </div>
      <div class="d-flex flex-wrap justify-content-center gap-2" data-aos="fade-up">
        <span class="tech-badge"><i class="fab fa-react"></i> React</span>
        <span class="tech-badge"><i class="fab fa-vuejs"></i> Vue</span>
        <span class="tech-badge"><i class="fab fa-angular"></i> Angular</span>
        <span class="tech-badge"><i class="fab fa-node"></i> Node.js</span>
        <span class="tech-badge"><i class="fab fa-python"></i> Python</span>
        <span class="tech-badge"><i class="fas fa-database"></i> MySQL</span>
        <span class="tech-badge"><i class="fas fa-cloud"></i> AWS</span>
        <span class="tech-badge"><i class="fas fa-shield-alt"></i> ISO 27001</span>
        <span class="tech-badge"><i class="fas fa-award"></i> Microsoft Partner</span>
        <span class="tech-badge"><i class="fas fa-certificate"></i> Scrum Master</span>
      </div>
    </div>
  </section>



<?php   require "views/partials/footer.php";
        require "views/partials/scripts.php"; 

?>