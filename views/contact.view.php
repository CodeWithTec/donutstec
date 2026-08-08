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
    .btn-success { background: #25D366; border: none; }
    .btn-success:hover { background: #1da851; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,0.3); }
    .text-primary { color: var(--primary) !important; }
    .bg-primary { background: var(--primary) !important; }
    .contact-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .contact-info-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; padding: 24px; height: 100%; }
    .contact-info-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .contact-info-card .icon-circle { width: 60px; height: 60px; background: #eef2ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary); }
    .form-container { background: white; border-radius: 28px; padding: 40px; box-shadow: var(--shadow-sm); }
    .form-container .form-control, .form-container .form-select { border-radius: 12px; padding: 12px 16px; border: 1px solid #e5e7eb; }
    .form-container .form-control:focus, .form-container .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
    .map-container { border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-sm); }
    .social-link { width: 44px; height: 44px; border-radius: 50%; background: #f1f5f9; display: inline-flex; align-items: center; justify-content: center; transition: 0.3s; color: #4b5563; }
    .social-link:hover { background: var(--primary); color: white; transform: translateY(-3px); }
    .whatsapp-float { position: fixed; bottom: 30px; right: 30px; z-index: 1000; }
    .whatsapp-float a { width: 60px; height: 60px; border-radius: 50%; background: #25D366; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; box-shadow: 0 8px 24px rgba(37,211,102,0.4); transition: 0.3s; text-decoration: none; }
    .whatsapp-float a:hover { transform: scale(1.1); box-shadow: 0 12px 32px rgba(37,211,102,0.5); }
    .chat-bubble-float { position: fixed; bottom: 100px; right: 30px; z-index: 999; }
    .chat-bubble-float a { display: flex; align-items: center; gap: 8px; background: white; padding: 12px 20px; border-radius: 50px; box-shadow: var(--shadow-md); text-decoration: none; color: var(--secondary); font-weight: 600; transition: 0.3s; }
    .chat-bubble-float a:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
    .chat-bubble-float a i { color: var(--primary); font-size: 1.2rem; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .contact-hero h1 { font-size: 2.4rem; }
      .form-container { padding: 24px; }
      .whatsapp-float { bottom: 20px; right: 20px; }
      .whatsapp-float a { width: 50px; height: 50px; font-size: 1.5rem; }
      .chat-bubble-float { bottom: 80px; right: 20px; }
      .chat-bubble-float a { padding: 8px 16px; font-size: 0.9rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require 'views/partials/navbar.php'; ?>

  <!-- CONTACT HERO -->
  <section class="contact-hero" id="contact">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Get In Touch</span>
          <h1 class="display-4 fw-bold mt-3">Let's <span class="text-primary">Connect</span></h1>
          <p class="lead text-muted">Have a project in mind? Need support? We're here to help. Reach out to us and let's start a conversation.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#contact-form" class="btn btn-primary rounded-pill px-4">Send Message</a>
            <a href="#" class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-phone me-2"></i>+49 30 123456</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-envelope fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">We respond within 24 hours</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT FORM & INFO -->
  <section id="contact-form" class="py-5">
    <div class="container">
      <div class="row g-4">
        <!-- Contact Information -->
        <div class="col-lg-5" data-aos="fade-right">
          <div class="d-flex flex-column gap-4">
            <div class="contact-info-card">
              <div class="d-flex align-items-start gap-3">
                <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <h6 class="fw-bold">Visit Us</h6>
                  <p class="text-muted mb-0">123 Tech Park, Berlin 10115, Germany</p>
                </div>
              </div>
            </div>
            <div class="contact-info-card">
              <div class="d-flex align-items-start gap-3">
                <div class="icon-circle"><i class="fas fa-phone"></i></div>
                <div>
                  <h6 class="fw-bold">Call Us</h6>
                  <p class="text-muted mb-0">+49 30 123456</p>
                  <p class="text-muted mb-0">+49 30 789012</p>
                </div>
              </div>
            </div>
            <div class="contact-info-card">
              <div class="d-flex align-items-start gap-3">
                <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                <div>
                  <h6 class="fw-bold">Email Us</h6>
                  <p class="text-muted mb-0">hello@donutstec.com</p>
                  <p class="text-muted mb-0">support@donutstec.com</p>
                </div>
              </div>
            </div>
            <div class="contact-info-card">
              <div class="d-flex align-items-start gap-3">
                <div class="icon-circle"><i class="fas fa-clock"></i></div>
                <div>
                  <h6 class="fw-bold">Office Hours</h6>
                  <p class="text-muted mb-0">Monday - Friday: 9:00 AM - 6:00 PM</p>
                  <p class="text-muted mb-0">Saturday: 10:00 AM - 2:00 PM</p>
                  <p class="text-muted mb-0">Sunday: Closed</p>
                </div>
              </div>
            </div>
            
            <!-- Social Links -->
            <div>
              <h6 class="fw-bold">Follow Us</h6>
              <div class="d-flex gap-2">
                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-7" data-aos="fade-left">
          <div class="form-container">
            <h3 class="fw-bold mb-3">Send Us a <span class="text-primary">Message</span></h3>
            <p class="text-muted mb-4">Fill in the form below and we'll get back to you within 24 hours.</p>
            <form id="contactForm">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Full Name *</label>
                  <input type="text" class="form-control" placeholder="John Doe" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Email Address *</label>
                  <input type="email" class="form-control" placeholder="john@example.com" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Phone Number</label>
                  <input type="tel" class="form-control" placeholder="+49 30 1234567" />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Company</label>
                  <input type="text" class="form-control" placeholder="Your Company Name" />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Subject *</label>
                  <input type="text" class="form-control" placeholder="Project Inquiry" required />
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Service Needed</label>
                  <select class="form-select">
                    <option selected>Select a service</option>
                    <option>Custom Software Development</option>
                    <option>Website Development</option>
                    <option>E-Commerce Solutions</option>
                    <option>Mobile App Development</option>
                    <option>UI/UX Design</option>
                    <option>Cloud Solutions</option>
                    <option>API Development</option>
                    <option>Database Design</option>
                    <option>AI Solutions</option>
                    <option>Business Automation</option>
                    <option>Cybersecurity</option>
                    <option>SEO Optimization</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Budget Range</label>
                  <select class="form-select">
                    <option selected>Select budget</option>
                    <option>$1,000 - $5,000</option>
                    <option>$5,000 - $10,000</option>
                    <option>$10,000 - $25,000</option>
                    <option>$25,000 - $50,000</option>
                    <option>$50,000+</option>
                    <option>Not sure yet</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label fw-semibold">Message *</label>
                  <textarea class="form-control" rows="5" placeholder="Tell us about your project, requirements, and goals..." required></textarea>
                </div>
                <!-- reCAPTCHA placeholder -->
                <div class="col-12">
                  <div class="bg-light p-3 rounded-3 text-center text-muted" style="border: 1px solid #e5e7eb;">
                    <i class="fas fa-shield-alt me-2"></i> reCAPTCHA placeholder (Google reCAPTCHA v2)
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary w-100 rounded-pill py-3">
                    <i class="fas fa-paper-plane me-2"></i>Send Message
                  </button>
                  <small class="text-muted d-block mt-2 text-center">* Required fields. We respect your privacy.</small>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GOOGLE MAPS -->
  <section class="py-4">
    <div class="container">
      <div class="map-container" data-aos="fade-up">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2428.834548818768!2d13.404954076591174!3d52.52000637205365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84e1a9c0b1b7f%3A0x5b3d4b1e2c8f0a6d!2sBerlin!5e0!3m2!1sen!2sde!4v1700000000000!5m2!1sen!2sde" 
          width="100%" 
          height="400" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </section>

  <!-- WHATSAPP FLOATING BUTTON -->
  <div class="whatsapp-float" data-aos="fade-up" data-aos-delay="200">
    <a href="https://wa.me/4930123456" target="_blank" aria-label="Chat on WhatsApp">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>

  <!-- LIVE CHAT FLOATING BUTTON -->
  <div class="chat-bubble-float" data-aos="fade-up" data-aos-delay="300">
    <a href="#" id="liveChatBtn">
      <i class="fas fa-comment-dots"></i>
      <span>Live Chat</span>
    </a>
  </div>

  <!-- SUCCESS MODAL (for demo) -->
  <div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-body text-center p-5">
          <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
          <h4 class="mt-3">Message Sent Successfully!</h4>
          <p class="text-muted">Thank you for contacting DonutsTec. We'll get back to you within 24 hours.</p>
          <button class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
 <?php require 'views/partials/footer.php'; ?>

  <!-- Bootstrap + AOS + SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    AOS.init({ once: true, duration: 700 });

    // Form submission with SweetAlert2 demo
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Simulate PHPMailer sending
      Swal.fire({
        title: 'Sending...',
        text: 'Please wait while we send your message.',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });

      // Simulate AJAX delay
      setTimeout(() => {
        Swal.fire({
          icon: 'success',
          title: 'Message Sent!',
          text: 'Thank you for contacting DonutsTec. We\'ll get back to you within 24 hours.',
          confirmButtonColor: '#2563EB',
          confirmButtonText: 'OK'
        });
        this.reset();
      }, 2000);
    });

    // Live Chat placeholder
    document.getElementById('liveChatBtn').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        icon: 'info',
        title: 'Live Chat',
        text: 'Our live chat feature is currently being set up. Please use the contact form or WhatsApp for immediate assistance.',
        confirmButtonColor: '#2563EB'
      });
    });

    // WhatsApp button demo
    document.querySelector('.whatsapp-float a').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        icon: 'info',
        title: 'WhatsApp Chat',
        text: 'You will be redirected to WhatsApp to start a conversation with our support team.',
        showCancelButton: true,
        confirmButtonColor: '#25D366',
        confirmButtonText: 'Continue to WhatsApp',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.open('https://wa.me/4930123456', '_blank');
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