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
    .glass { background: rgba(255,255,255,0.7); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.2); }
    .btn-primary { background: var(--primary); border: none; }
    .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
    .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
    .btn-outline-primary:hover { background: var(--primary); color: #fff; }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .pricing-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .pricing-card { border-radius: 32px; padding: 36px 28px; background: white; box-shadow: var(--shadow-sm); transition: all 0.3s; border: 1px solid #e5e7eb; height: 100%; position: relative; }
    .pricing-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .pricing-card.popular { border: 2px solid var(--primary); background: #f8faff; }
    .pricing-card .popular-badge { position: absolute; top: -12px; right: 24px; background: var(--primary); color: white; padding: 4px 20px; border-radius: 30px; font-size: 0.8rem; font-weight: 600; }
    .pricing-card .price { font-size: 3rem; font-weight: 700; color: var(--secondary); }
    .pricing-card .price span { font-size: 1.2rem; font-weight: 400; color: #6b7280; }
    .pricing-card .feature-item { padding: 8px 0; border-bottom: 1px solid #f3f4f6; }
    .pricing-card .feature-item:last-child { border-bottom: 0; }
    .pricing-card .feature-item i { color: var(--primary); width: 24px; }
    .toggle-group { background: white; border-radius: 50px; padding: 4px; box-shadow: var(--shadow-sm); display: inline-flex; }
    .toggle-group .btn-toggle { border-radius: 50px; padding: 10px 30px; border: none; background: transparent; font-weight: 600; transition: 0.3s; }
    .toggle-group .btn-toggle.active { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(37,99,235,0.3); }
    .comparison-table th { background: #f8fafc; font-weight: 600; }
    .comparison-table td, .comparison-table th { padding: 16px; }
    .comparison-table i.fa-check { color: var(--primary); }
    .comparison-table i.fa-times { color: #9ca3af; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .pricing-hero h1 { font-size: 2.4rem; }
      .pricing-card .price { font-size: 2.4rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require "views/partials/navbar.php"; ?>

  <!-- PRICING HERO -->
  <section class="pricing-hero" id="pricing">
    <div class="container pt-4">
      <div class="text-center" data-aos="fade-up">
        <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Pricing</span>
        <h1 class="display-4 fw-bold mt-3">Choose the <span class="text-primary">Right Plan</span> for You</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Flexible pricing options for every budget. Monthly subscriptions or one-time project-based pricing.</p>
        
        <!-- Toggle: Monthly / One-Time -->
        <div class="mt-4 d-flex justify-content-center">
          <div class="toggle-group" role="group">
            <button class="btn-toggle active" data-type="monthly">Monthly Plans</button>
            <button class="btn-toggle" data-type="onetime">One-Time Projects</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PRICING CARDS -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4" id="pricingCards">
        <!-- STARTER -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
          <div class="pricing-card">
            <h3 class="fw-bold">Starter</h3>
            <p class="text-muted">Perfect for small businesses</p>
            <div class="price">$499 <span>/mo</span></div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Small websites (up to 5 pages)</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Basic support (email)</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 5 GB storage</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> SSL certificate</div>
            <div class="feature-item"><i class="fas fa-times-circle" style="color:#9ca3af;"></i> Custom CMS</div>
            <div class="feature-item"><i class="fas fa-times-circle" style="color:#9ca3af;"></i> 24/7 support</div>
            <div class="mt-4"><a href="#contact" class="btn btn-outline-primary w-100 rounded-pill py-2">Get Started</a></div>
          </div>
        </div>

        <!-- BUSINESS (Popular) -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-card popular">
            <span class="popular-badge">Most Popular</span>
            <h3 class="fw-bold">Business</h3>
            <p class="text-muted">For growing companies</p>
            <div class="price">$1,299 <span>/mo</span></div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Dynamic websites (unlimited pages)</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Custom CMS integration</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Admin dashboard</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 50 GB storage</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 24/7 priority support</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> SEO optimization</div>
            <div class="feature-item"><i class="fas fa-times-circle" style="color:#9ca3af;"></i> Custom software development</div>
            <div class="mt-4"><a href="#contact" class="btn btn-primary w-100 rounded-pill py-2">Get Started</a></div>
          </div>
        </div>

        <!-- ENTERPRISE -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
          <div class="pricing-card">
            <h3 class="fw-bold">Enterprise</h3>
            <p class="text-muted">Custom solutions for large organizations</p>
            <div class="price">Custom</div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Custom software development</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> ERP & mobile apps</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> API integration</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Unlimited storage</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Dedicated team</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 24/7 enterprise support</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Custom SLA</div>
            <div class="mt-4"><a href="#contact" class="btn btn-outline-primary w-100 rounded-pill py-2">Contact Sales</a></div>
          </div>
        </div>
      </div>

      <!-- ONE-TIME PROJECTS (hidden by default) -->
      <div class="row g-4 mt-2" id="onetimeCards" style="display:none;">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
          <div class="pricing-card">
            <h3 class="fw-bold">Small Project</h3>
            <p class="text-muted">Simple websites & landing pages</p>
            <div class="price">$3,000</div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Up to 5 pages</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Responsive design</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Basic SEO setup</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 30 days support</div>
            <div class="mt-4"><a href="#contact" class="btn btn-outline-primary w-100 rounded-pill py-2">Get Quote</a></div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-card popular">
            <span class="popular-badge">Popular</span>
            <h3 class="fw-bold">Medium Project</h3>
            <p class="text-muted">Dynamic websites & web apps</p>
            <div class="price">$12,000</div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Full CMS integration</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Admin dashboard</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 3 months support</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> SEO & analytics</div>
            <div class="mt-4"><a href="#contact" class="btn btn-primary w-100 rounded-pill py-2">Get Quote</a></div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
          <div class="pricing-card">
            <h3 class="fw-bold">Large Project</h3>
            <p class="text-muted">Custom software & enterprise solutions</p>
            <div class="price">$25,000+</div>
            <hr />
            <div class="feature-item"><i class="fas fa-check-circle"></i> Custom software development</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Mobile & web apps</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> 12 months support</div>
            <div class="feature-item"><i class="fas fa-check-circle"></i> Training & documentation</div>
            <div class="mt-4"><a href="#contact" class="btn btn-outline-primary w-100 rounded-pill py-2">Contact Sales</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- COMPARE FEATURES TABLE -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Compare <span class="text-primary">Features</span></h2>
        <p class="text-muted">Detailed comparison of what's included in each plan</p>
      </div>
      <div class="table-responsive" data-aos="fade-up">
        <table class="table comparison-table table-bordered bg-white rounded-4 overflow-hidden">
          <thead>
            <tr>
              <th style="width:25%;">Feature</th>
              <th style="width:25%;">Starter</th>
              <th style="width:25%;">Business</th>
              <th style="width:25%;">Enterprise</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Websites</td><td>Up to 5 pages</td><td>Unlimited</td><td>Unlimited</td></tr>
            <tr><td>Custom CMS</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>Admin Dashboard</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>Mobile App</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>Custom Development</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>API Integration</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>24/7 Support</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td><td><i class="fas fa-check"></i></td></tr>
            <tr><td>SEO Optimization</td><td>Basic</td><td>Advanced</td><td>Premium</td></tr>
            <tr><td>Storage</td><td>5 GB</td><td>50 GB</td><td>Unlimited</td></tr>
            <tr><td>Dedicated Team</td><td><i class="fas fa-times"></i></td><td><i class="fas fa-times"></i></td><td><i class="fas fa-check"></i></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CUSTOM QUOTE REQUEST -->
  <section id="contact" class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up">
          <div class="bg-white p-5 rounded-4 shadow-sm">
            <h3 class="fw-bold text-center">Request a <span class="text-primary">Custom Quote</span></h3>
            <p class="text-center text-muted">Tell us about your project and we'll get back to you within 24 hours.</p>
            <form>
              <div class="row g-3">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name" /></div>
                <div class="col-md-6"><input type="email" class="form-control" placeholder="Email" /></div>
                <div class="col-md-6"><input type="tel" class="form-control" placeholder="Phone" /></div>
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Company" /></div>
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Budget Range" /></div>
                <div class="col-md-6">
                  <select class="form-select">
                    <option selected>Plan Interested In</option>
                    <option>Starter</option>
                    <option>Business</option>
                    <option>Enterprise</option>
                    <option>One-Time Project</option>
                    <option>Not Sure</option>
                  </select>
                </div>
                <div class="col-12"><textarea class="form-control" rows="4" placeholder="Tell us about your project requirements..."></textarea></div>
                <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Send Request</button></div>
              </div>
            </form>
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

    // Toggle between Monthly and One-Time
    const toggleBtns = document.querySelectorAll('.btn-toggle');
    const monthlyCards = document.getElementById('pricingCards');
    const onetimeCards = document.getElementById('onetimeCards');

    toggleBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        toggleBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        if (this.dataset.type === 'monthly') {
          monthlyCards.style.display = 'flex';
          onetimeCards.style.display = 'none';
        } else {
          monthlyCards.style.display = 'none';
          onetimeCards.style.display = 'flex';
        }
      });
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
    document.querySelectorAll('a[href="#careers"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Careers page demo') }));
    document.querySelectorAll('a[href="#blog"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Blog page demo') }));
  </script>
</body>
</html>