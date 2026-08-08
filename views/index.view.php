<?php require 'partials/header.php';

?>
  <style>
    :root {
      --primary: #2563EB;
      --secondary: #111827;
      --accent: #F59E0B;
      --bg-white: #ffffff;
      --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
      --shadow-md: 0 12px 32px rgba(0,0,0,0.08);
    }
    body { font-family: 'Inter', sans-serif; background: var(--bg-white); color: #1f2937; scroll-behavior: smooth; }
    .glass { background: rgba(255,255,255,0.7); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.2); }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .border-accent { border-color: var(--accent) !important; }
    .service-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; height: 100%; }
    .service-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); border-color: var(--primary); }
    .service-card i { font-size: 2.6rem; color: var(--primary); background: #eef2ff; padding: 14px; border-radius: 16px; }
    .stat-box { border-radius: 28px; background: white; padding: 28px 20px; box-shadow: var(--shadow-sm); border-left: 6px solid var(--primary); }
    .stat-box .number { font-size: 2.8rem; font-weight: 700; color: var(--secondary); }
    .portfolio-item { border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-sm); transition: 0.3s; background: white; }
    .portfolio-item:hover { transform: scale(1.01); box-shadow: var(--shadow-md); }
    .testimonial-card { background: white; border-radius: 28px; padding: 32px; box-shadow: var(--shadow-sm); }
    .testimonial-card img { width: 64px; height: 64px; object-fit: cover; border-radius: 50%; }
    .blog-card { border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-sm); transition: 0.25s; background: white; }
    .blog-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    .pricing-card { border-radius: 32px; padding: 36px 24px; background: white; box-shadow: var(--shadow-sm); transition: 0.3s; border: 1px solid #e5e7eb; }
    .pricing-card.popular { border: 2px solid var(--primary); background: #f8faff; }
    .pricing-card .price { font-size: 2.8rem; font-weight: 700; color: var(--secondary); }
    .support-badge { background: #dbeafe; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.8rem; }
    @media (max-width: 768px) {
      .hero h1 { font-size: 2.4rem; }
      .hero { padding: 100px 0 60px; }
    }
    /* glassmorphism example */
    .glass-card { background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 32px; border: 1px solid rgba(255,255,255,0.4); }
  </style>
</head>
<body>
<?php require 'partials/navbar.php'; ?>

  <!-- HERO -->
<!-- Hero -->
<section class="hero">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 text-white">
<h1 class="display-3 fw-bold">
Building Modern Software Solutions
</h1>
<p class="lead mt-4">
We create websites, mobile applications, business systems,
AI solutions and cloud software for businesses across Liberia.
</p>
<div class="mt-4">
<a href="/contact" class="btn btn-warning btn-lg px-4">
Get Started
</a>
<a href="/services" class="btn btn-outline-light btn-lg px-4 ms-3">
Our Services</a>
</div>
</div>
<div class="col-lg-6 text-center">
<div class="logo-box">
<img src="assets/images/logo.png" class="logo img-fluid" accesskey="" alt="DonutsTec Logo" style="max-width: 400px;">
</div>
</div>
</div>
</div>
</section>


  <!-- SERVICES PREVIEW -->
  <section id="services" class="py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Our <span class="text-primary">Services</span></h2>
        <p class="text-muted">End-to-end digital solutions crafted for your success</p>
      </div>
      <div class="row g-4">
        <!-- card sample (16 services) – we show 8 for brevity, full list in real project -->
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="50">
          <div class="service-card p-4 text-center"><i class="fas fa-laptop-code"></i><h5 class="mt-3">Custom Software</h5><p class="small">Tailored solutions for your business</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card p-4 text-center"><i class="fas fa-globe"></i><h5 class="mt-3">Web Development</h5><p class="small">Modern, fast, responsive websites</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="150">
          <div class="service-card p-4 text-center"><i class="fas fa-mobile-alt"></i><h5 class="mt-3">Mobile Apps</h5><p class="small">iOS & Android native experiences</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card p-4 text-center"><i class="fas fa-cloud"></i><h5 class="mt-3">Cloud Solutions</h5><p class="small">Scalable, secure cloud infrastructure</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="250">
          <div class="service-card p-4 text-center"><i class="fas fa-paint-brush"></i><h5 class="mt-3">UI/UX Design</h5><p class="small">Beautiful, user-centric interfaces</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card p-4 text-center"><i class="fas fa-database"></i><h5 class="mt-3">Database Design</h5><p class="small">Efficient data architecture</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="350">
          <div class="service-card p-4 text-center"><i class="fas fa-shield-alt"></i><h5 class="mt-3">Cybersecurity</h5><p class="small">Protect your digital assets</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
        <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-card p-4 text-center"><i class="fas fa-robot"></i><h5 class="mt-3">AI Solutions</h5><p class="small">Intelligent automation & insights</p><a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Learn More</a></div>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS / WHY CHOOSE -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-4"><h2 class="fw-bold">Why <span class="text-primary">DonutsTec</span></h2></div>
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="zoom-in"><div class="stat-box text-center"><div class="number">100+</div><div>Projects</div></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="100"><div class="stat-box text-center"><div class="number">50+</div><div>Happy Clients</div></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="150"><div class="stat-box text-center"><div class="number">99%</div><div>Satisfaction</div></div></div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="200"><div class="stat-box text-center"><div class="number">24/7</div><div>Support</div></div></div>
      </div>
    </div>
  </section>

  <!-- PORTFOLIO PREVIEW -->
  <section id="portfolio" class="py-5">
    <div class="container">
      <div class="text-center mb-4"><h2 class="fw-bold">Recent <span class="text-primary">Work</span></h2></div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="flip-up"><div class="portfolio-item p-3"><img src="https://via.placeholder.com/400x250/2563EB/ffffff?text=Project+Alpha" class="img-fluid rounded-4" alt="project"><h5 class="mt-2">E-commerce Platform</h5><span class="badge bg-primary">Web App</span></div></div>
        <div class="col-md-4" data-aos="flip-up" data-aos-delay="150"><div class="portfolio-item p-3"><img src="https://via.placeholder.com/400x250/111827/ffffff?text=Project+Beta" class="img-fluid rounded-4" alt="project"><h5 class="mt-2">School Management</h5><span class="badge bg-primary">ERP</span></div></div>
        <div class="col-md-4" data-aos="flip-up" data-aos-delay="300"><div class="portfolio-item p-3"><img src="https://via.placeholder.com/400x250/F59E0B/111827?text=Project+Gamma" class="img-fluid rounded-4" alt="project"><h5 class="mt-2">Healthcare Portal</h5><span class="badge bg-primary">Mobile</span></div></div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS (carousel) -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-4">Client <span class="text-primary">Voices</span></h2>
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active"><div class="testimonial-card"><div class="d-flex align-items-center"><img src="https://via.placeholder.com/64" alt="client"><div class="ms-3"><h5 class="mb-0">Maria G.</h5><small>CTO, HealthTech</small></div></div><p class="mt-3">“DonutsTec delivered our platform ahead of schedule. Exceptional quality.”</p><div><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div></div></div>
          <div class="carousel-item"><div class="testimonial-card"><div class="d-flex align-items-center"><img src="https://via.placeholder.com/64" alt="client"><div class="ms-3"><h5 class="mb-0">James K.</h5><small>Founder, Finly</small></div></div><p class="mt-3">“Incredible UX and smooth deployment. Our users love it.”</p><div><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div></div></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next"><span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span></button>
      </div>
    </div>
  </section>

  <!-- BLOG PREVIEW -->
  <section id="blog" class="py-5">
    <div class="container">
      <h2 class="text-center fw-bold mb-4">From our <span class="text-primary">Blog</span></h2>
      <div class="row">
        <div class="col-md-4" data-aos="fade-right"><div class="blog-card p-3"><img src="https://via.placeholder.com/400x200/eef2ff/2563EB?text=Blog+1" class="img-fluid rounded-4"><div class="mt-2"><small class="text-muted">By Admin · May 10, 2025</small><h5>AI in Software Development</h5><a href="#" class="btn btn-link text-primary p-0">Read More →</a></div></div></div>
        <div class="col-md-4" data-aos="fade-up"><div class="blog-card p-3"><img src="https://via.placeholder.com/400x200/eef2ff/2563EB?text=Blog+2" class="img-fluid rounded-4"><div class="mt-2"><small class="text-muted">By Jane · Apr 28, 2025</small><h5>Cloud Migration Strategy</h5><a href="#" class="btn btn-link text-primary p-0">Read More →</a></div></div></div>
        <div class="col-md-4" data-aos="fade-left"><div class="blog-card p-3"><img src="https://via.placeholder.com/400x200/eef2ff/2563EB?text=Blog+3" class="img-fluid rounded-4"><div class="mt-2"><small class="text-muted">By Mike · Apr 15, 2025</small><h5>UX Trends 2025</h5><a href="#" class="btn btn-link text-primary p-0">Read More →</a></div></div></div>
      </div>
    </div>
  </section>

  <!-- NEWSLETTER -->
  <section class="py-4 bg-primary text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6"><h4 class="fw-bold">Join our newsletter</h4><p>Get the latest insights, news and offers.</p></div>
        <div class="col-md-6"><div class="input-group"><input type="email" class="form-control" placeholder="Your email"><button class="btn btn-accent" style="background:var(--accent);color:#111827;border:none;">Subscribe</button></div></div>
      </div>
    </div>
  </section>

  <?php require 'partials/footer.php';
        require 'partials/scripts.php';

