<?php require 'views/partials/header.php'; ?>
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
    .careers-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 100px 0 60px; }
    .job-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; cursor: pointer; }
    .job-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .job-card .job-tag { background: #eef2ff; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; display: inline-block; margin: 2px; }
    .job-detail { background: white; border-radius: 28px; padding: 40px; box-shadow: var(--shadow-sm); }
    .benefit-icon { width: 60px; height: 60px; background: #eef2ff; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: var(--primary); }
    .admin-card { border-radius: 24px; box-shadow: var(--shadow-sm); background: white; padding: 24px; }
    .admin-card .table th { background: #f8fafc; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .careers-hero h1 { font-size: 2.4rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
  <?php require 'views/partials/navbar.php'; ?>

  <!-- CAREERS HERO -->
  <section class="careers-hero" id="careers">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Join Our Team</span>
          <h1 class="display-4 fw-bold mt-3">Build Your <span class="text-primary">Career</span> at DonutsTec</h1>
          <p class="lead text-muted">We're looking for passionate, talented individuals to help us build the future of digital solutions.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#openings" class="btn btn-primary rounded-pill px-4">View Openings</a>
            <a href="#benefits" class="btn btn-outline-secondary rounded-pill px-4">Benefits</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-users fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">Join 50+ team members</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BENEFITS SECTION -->
  <section id="benefits" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Why Work <span class="text-primary">With Us</span></h2>
        <p class="text-muted">We offer competitive benefits and a culture that fosters growth</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="zoom-in">
          <div class="text-center p-3">
            <div class="benefit-icon mx-auto"><i class="fas fa-laptop"></i></div>
            <h6 class="mt-2">Remote Work</h6>
            <small class="text-muted">Flexible work arrangements</small>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="50">
          <div class="text-center p-3">
            <div class="benefit-icon mx-auto"><i class="fas fa-graduation-cap"></i></div>
            <h6 class="mt-2">Learning Budget</h6>
            <small class="text-muted">$2,000/year for courses</small>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="text-center p-3">
            <div class="benefit-icon mx-auto"><i class="fas fa-heartbeat"></i></div>
            <h6 class="mt-2">Health Insurance</h6>
            <small class="text-muted">Comprehensive coverage</small>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="150">
          <div class="text-center p-3">
            <div class="benefit-icon mx-auto"><i class="fas fa-glass-cheers"></i></div>
            <h6 class="mt-2">Team Events</h6>
            <small class="text-muted">Regular social gatherings</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JOB OPENINGS -->
  <section id="openings" class="py-5">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Current <span class="text-primary">Openings</span></h2>
        <p class="text-muted">Find your dream role and join our team</p>
      </div>
      <div class="row g-4" id="jobContainer">
        <!-- Job 1 -->
        <div class="col-md-6" data-aos="fade-up">
          <div class="job-card p-4" data-job-id="1">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">Senior Full-Stack Developer</h5>
                <div class="mb-2">
                  <span class="job-tag">Engineering</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">Remote</span>
                </div>
                <p class="small text-muted">Berlin, Germany · €80,000 - €100,000</p>
              </div>
              <span class="badge bg-success">Urgent</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
        <!-- Job 2 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="job-card p-4" data-job-id="2">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">UX/UI Designer</h5>
                <div class="mb-2">
                  <span class="job-tag">Design</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">Hybrid</span>
                </div>
                <p class="small text-muted">Berlin, Germany · €60,000 - €75,000</p>
              </div>
              <span class="badge bg-warning text-dark">New</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
        <!-- Job 3 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
          <div class="job-card p-4" data-job-id="3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">DevOps Engineer</h5>
                <div class="mb-2">
                  <span class="job-tag">Engineering</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">Remote</span>
                </div>
                <p class="small text-muted">Remote · €70,000 - €90,000</p>
              </div>
              <span class="badge bg-secondary">Open</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
        <!-- Job 4 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="job-card p-4" data-job-id="4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">Project Manager</h5>
                <div class="mb-2">
                  <span class="job-tag">Management</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">Hybrid</span>
                </div>
                <p class="small text-muted">Berlin, Germany · €75,000 - €95,000</p>
              </div>
              <span class="badge bg-secondary">Open</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
        <!-- Job 5 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
          <div class="job-card p-4" data-job-id="5">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">AI/ML Engineer</h5>
                <div class="mb-2">
                  <span class="job-tag">AI</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">Remote</span>
                </div>
                <p class="small text-muted">Remote · €85,000 - €110,000</p>
              </div>
              <span class="badge bg-success">Urgent</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
        <!-- Job 6 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="job-card p-4" data-job-id="6">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold">Sales Executive</h5>
                <div class="mb-2">
                  <span class="job-tag">Sales</span>
                  <span class="job-tag">Full-time</span>
                  <span class="job-tag">On-site</span>
                </div>
                <p class="small text-muted">Berlin, Germany · €50,000 + Commission</p>
              </div>
              <span class="badge bg-warning text-dark">New</span>
            </div>
            <button class="btn btn-primary btn-sm rounded-pill px-3 apply-btn">Apply Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JOB DETAIL & APPLICATION FORM -->
  <section id="job-detail" class="py-5 bg-light" style="display:none;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="job-detail" data-aos="fade-up">
            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToJobs"><i class="fas fa-arrow-left me-2"></i>Back to Openings</button>
            <h2 id="jobTitle" class="fw-bold">Senior Full-Stack Developer</h2>
            <div class="mb-3">
              <span class="job-tag">Engineering</span>
              <span class="job-tag">Full-time</span>
              <span class="job-tag">Remote</span>
            </div>
            <p><strong>Location:</strong> <span id="jobLocation">Berlin, Germany</span></p>
            <p><strong>Salary:</strong> <span id="jobSalary">€80,000 - €100,000</span></p>
            <hr />
            
            <h5>About the Role</h5>
            <p id="jobDescription">We're looking for an experienced Full-Stack Developer to join our engineering team. You'll be working on cutting-edge projects using modern technologies like React, Node.js, and cloud platforms.</p>
            
            <h5 class="mt-4">Requirements</h5>
            <ul id="jobRequirements">
              <li>5+ years of experience in full-stack development</li>
              <li>Strong proficiency in JavaScript/TypeScript, React, and Node.js</li>
              <li>Experience with cloud platforms (AWS, GCP, or Azure)</li>
              <li>Knowledge of database design and optimization</li>
              <li>Excellent problem-solving and communication skills</li>
            </ul>
            
            <h5 class="mt-4">What We Offer</h5>
            <ul>
              <li>Competitive salary and performance bonuses</li>
              <li>Flexible working hours and remote options</li>
              <li>Professional development budget</li>
              <li>Health insurance and wellness programs</li>
              <li>Regular team events and retreats</li>
            </ul>

            <!-- Application Form -->
            <h5 class="mt-4">Apply for this Position</h5>
            <form id="applicationForm" class="mt-3">
              <div class="row g-3">
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name" required /></div>
                <div class="col-md-6"><input type="email" class="form-control" placeholder="Email" required /></div>
                <div class="col-md-6"><input type="tel" class="form-control" placeholder="Phone" /></div>
                <div class="col-md-6"><input type="text" class="form-control" placeholder="Current Location" /></div>
                <div class="col-md-6">
                  <select class="form-select">
                    <option selected>Years of Experience</option>
                    <option>0-1 years</option>
                    <option>2-3 years</option>
                    <option>4-6 years</option>
                    <option>7+ years</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-select">
                    <option selected>Portfolio Link (optional)</option>
                    <option>GitHub</option>
                    <option>Website</option>
                    <option>Behance</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label fw-semibold">Upload Documents</label>
                  <input type="file" class="form-control" multiple accept=".pdf,.doc,.docx" />
                  <small class="text-muted">CV, Cover Letter, Portfolio (PDF, DOC, DOCX)</small>
                </div>
                <div class="col-12"><textarea class="form-control" rows="4" placeholder="Tell us why you're the perfect fit for this role..."></textarea></div>
                <div class="col-12"><button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Submit Application</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ADMIN PANEL (Applications Management) --
  <section id="admin-panel" class="py-5 bg-light">
    <div class="container">
      <div class="admin-card" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold"><i class="fas fa-cog me-2 text-primary"></i> Applications Management</h4>
          <div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-download me-1"></i>Export</button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="applicationsTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Applicant</th>
                <th>Position</th>
                <th>Experience</th>
                <th>Status</th>
                <th>Applied</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-semibold">Anna Schmidt</span></td>
                <td>Senior Full-Stack Developer</td>
                <td>6 years</td>
                <td><span class="badge bg-warning text-dark">Reviewing</span></td>
                <td>May 12, 2025</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-success rounded-pill px-2">Contact</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">Michael Brown</span></td>
                <td>UX/UI Designer</td>
                <td>4 years</td>
                <td><span class="badge bg-success">Interview</span></td>
                <td>May 10, 2025</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-success rounded-pill px-2">Contact</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">Laura Chen</span></td>
                <td>DevOps Engineer</td>
                <td>3 years</td>
                <td><span class="badge bg-danger">Rejected</span></td>
                <td>May 8, 2025</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-secondary rounded-pill px-2">Archive</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">David Kim</span></td>
                <td>AI/ML Engineer</td>
                <td>5 years</td>
                <td><span class="badge bg-success">Shortlisted</span></td>
                <td>May 5, 2025</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-success rounded-pill px-2">Contact</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">Emma Wilson</span></td>
                <td>Project Manager</td>
                <td>7 years</td>
                <td><span class="badge bg-primary">New</span></td>
                <td>May 3, 2025</td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-2">View</button>
                  <button class="btn btn-sm btn-outline-success rounded-pill px-2">Contact</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

------------------>

  <!-- FOOTER -->
<?php require 'views/partials/footer.php'; ?>

  <!-- Bootstrap + DataTables + AOS -->
 <?php require 'views/partials/scripts.php'; ?>
  <script>
    AOS.init({ once: true, duration: 700 });

    // DataTable initialization
    $(document).ready(function() {
      $('#applicationsTable').DataTable({
        pageLength: 5,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf']
      });
    });

    // Job application flow
    const jobData = {
      1: {
        title: 'Senior Full-Stack Developer',
        location: 'Berlin, Germany',
        salary: '€80,000 - €100,000',
        description: "We're looking for an experienced Full-Stack Developer to join our engineering team. You'll be working on cutting-edge projects using modern technologies like React, Node.js, and cloud platforms.",
        requirements: [
          '5+ years of experience in full-stack development',
          'Strong proficiency in JavaScript/TypeScript, React, and Node.js',
          'Experience with cloud platforms (AWS, GCP, or Azure)',
          'Knowledge of database design and optimization',
          'Excellent problem-solving and communication skills'
        ]
      },
      2: {
        title: 'UX/UI Designer',
        location: 'Berlin, Germany',
        salary: '€60,000 - €75,000',
        description: "We're seeking a creative UX/UI Designer to create beautiful and intuitive user experiences for our clients' digital products.",
        requirements: [
          '4+ years of UX/UI design experience',
          'Proficiency in Figma, Sketch, or Adobe XD',
          'Strong portfolio demonstrating user-centered design',
          'Experience with design systems and prototyping',
          'Knowledge of accessibility standards'
        ]
      },
      3: {
        title: 'DevOps Engineer',
        location: 'Remote',
        salary: '€70,000 - €90,000',
        description: "Join our DevOps team to build and maintain cloud infrastructure, CI/CD pipelines, and ensure system reliability for our growing product portfolio.",
        requirements: [
          '3+ years of DevOps or SRE experience',
          'Experience with AWS, GCP, or Azure',
          'Proficiency with Docker, Kubernetes, and Terraform',
          'Scripting skills in Python or Bash',
          'CI/CD pipeline experience (GitLab CI, Jenkins, or GitHub Actions)'
        ]
      },
      4: {
        title: 'Project Manager',
        location: 'Berlin, Germany',
        salary: '€75,000 - €95,000',
        description: "We're looking for an experienced Project Manager to lead software development projects, coordinate teams, and ensure successful delivery for our clients.",
        requirements: [
          '5+ years of project management experience in software development',
          'Strong knowledge of Agile/Scrum methodologies',
          'Excellent communication and stakeholder management skills',
          'Experience with project management tools (Jira, Asana, Trello)',
          'Project management certification (PMP, CSM, or similar)'
        ]
      },
      5: {
        title: 'AI/ML Engineer',
        location: 'Remote',
        salary: '€85,000 - €110,000',
        description: "Join our AI team to develop and implement machine learning models, natural language processing systems, and computer vision solutions for real-world applications.",
        requirements: [
          '3+ years of AI/ML engineering experience',
          'Strong proficiency in Python and ML frameworks (TensorFlow, PyTorch, scikit-learn)',
          'Experience with NLP, computer vision, or generative AI',
          'Knowledge of MLOps and model deployment',
          'Master\'s degree in CS, AI, or related field (preferred)'
        ]
      },
      6: {
        title: 'Sales Executive',
        location: 'Berlin, Germany',
        salary: '€50,000 + Commission',
        description: "We're seeking a motivated Sales Executive to drive business growth, build relationships with enterprise clients, and promote DonutsTec's software solutions.",
        requirements: [
          '3+ years of B2B sales experience in IT or software services',
          'Strong communication and negotiation skills',
          'Experience with CRM tools (Salesforce, HubSpot)',
          'Track record of meeting or exceeding sales targets',
          'Ability to understand technical solutions and client needs'
        ]
      }
    };

    // Apply button clicks
    document.querySelectorAll('.apply-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const jobCard = this.closest('.job-card');
        const jobId = jobCard.dataset.jobId;
        const job = jobData[jobId];
        
        if (job) {
          document.getElementById('jobTitle').textContent = job.title;
          document.getElementById('jobLocation').textContent = job.location;
          document.getElementById('jobSalary').textContent = job.salary;
          document.getElementById('jobDescription').textContent = job.description;
          
          const reqList = document.getElementById('jobRequirements');
          reqList.innerHTML = '';
          job.requirements.forEach(req => {
            const li = document.createElement('li');
            li.textContent = req;
            reqList.appendChild(li);
          });
          
          document.getElementById('openings').style.display = 'none';
          document.getElementById('job-detail').style.display = 'block';
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
      });
    });

    // Job card click to view details (alternative)
    document.querySelectorAll('.job-card').forEach(card => {
      card.addEventListener('click', function(e) {
        if (e.target.classList.contains('apply-btn')) return;
        this.querySelector('.apply-btn')?.click();
      });
    });

    // Back to jobs
    document.getElementById('backToJobs').addEventListener('click', function() {
      document.getElementById('openings').style.display = 'block';
      document.getElementById('job-detail').style.display = 'none';
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Form submission
    document.getElementById('applicationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Application submitted successfully! We\'ll review your application and get back to you soon.');
      this.reset();
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
  </script>
</body>
</html>