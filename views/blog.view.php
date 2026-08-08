<?php   require "views/partials/header.php"; ?>

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
    .blog-hero { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 50px 0 60px; }
    .blog-card { border: none; border-radius: 24px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; overflow: hidden; }
    .blog-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
    .blog-card img { width: 100%; height: 220px; object-fit: cover; }
    .blog-card .blog-tag { background: #eef2ff; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; display: inline-block; }
    .blog-card .author-img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
    .category-pill { background: #f1f5f9; padding: 6px 20px; border-radius: 40px; display: inline-block; margin: 3px; cursor: pointer; transition: 0.3s; }
    .category-pill:hover, .category-pill.active { background: var(--primary); color: white; }
    .post-detail { background: white; border-radius: 28px; padding: 40px; box-shadow: var(--shadow-sm); }
    .comment-item { border-bottom: 1px solid #e5e7eb; padding: 16px 0; }
    .comment-item:last-child { border-bottom: 0; }
    .comment-item img { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
    .admin-card { border-radius: 24px; box-shadow: var(--shadow-sm); background: white; padding: 24px; }
    .admin-card .table th { background: #f8fafc; }
    footer { background: var(--secondary); color: #e5e7eb; }
    footer a { color: #9ca3af; text-decoration: none; }
    footer a:hover { color: white; }
    @media (max-width: 768px) {
      .blog-hero h1 { font-size: 2.4rem; }
    }
  </style>
</head>
<body>
  <!-- NAVIGATION -->
<?php require "views/partials/navbar.php"; ?>

  <!-- BLOG HERO -->
  <section class="blog-hero" id="blog">
    <div class="container pt-5">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <span class="badge bg-primary text-white bg-opacity-10 px-3 py-2 rounded-pill">Our Blog</span>
          <h1 class="display-4 fw-bold mt-3">Insights & <span class="text-primary">Innovation</span></h1>
          <p class="lead text-muted">Stay updated with the latest trends in software development, AI, cloud computing, and digital transformation.</p>
          <div class="d-flex gap-3 mt-4">
            <a href="#blog-grid" class="btn btn-primary rounded-pill px-4">Read Articles</a>
            <a href="#admin-panel" class="btn btn-outline-secondary rounded-pill px-4">Admin Panel</a>
          </div>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-left">
          <div class="bg-white p-4 rounded-5 shadow-sm d-inline-block">
            <i class="fas fa-newspaper fa-5x text-primary opacity-75"></i>
            <p class="mt-2 fw-semibold">Latest tech insights</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH & CATEGORIES -->
  <section class="py-4 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-7" data-aos="fade-right">
          <div class="d-flex flex-wrap gap-2">
            <span class="category-pill active" data-category="all">All</span>
            <span class="category-pill" data-category="ai">AI & ML</span>
            <span class="category-pill" data-category="cloud">Cloud</span>
            <span class="category-pill" data-category="development">Development</span>
            <span class="category-pill" data-category="ux">UX Design</span>
            <span class="category-pill" data-category="security">Security</span>
          </div>
        </div>
        <div class="col-md-5" data-aos="fade-left">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
            <input type="text" id="blogSearch" class="form-control" placeholder="Search blog posts..." />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BLOG GRID -->
  <section id="blog-grid" class="py-5">
    <div class="container">
      <div class="row g-4" id="blogContainer">
        <!-- Post 1 -->
        <div class="col-md-4 blog-item" data-category="ai development">
          <div class="blog-card" data-aos="fade-up">
            <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=AI+in+Software" alt="AI in Software" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Alex Rivera</span><br /><small class="text-muted">May 10, 2025</small></div>
              </div>
              <span class="blog-tag">AI</span> <span class="blog-tag">Development</span>
              <h5 class="mt-2">AI in Software Development</h5>
              <p class="small text-muted">How artificial intelligence is transforming the way we build software, from code generation to testing.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 12</span>
                <span><i class="far fa-heart"></i> 34</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Post 2 -->
        <div class="col-md-4 blog-item" data-category="cloud development">
          <div class="blog-card" data-aos="fade-up" data-aos-delay="100">
            <img src="https://via.placeholder.com/600x400/111827/ffffff?text=Cloud+Migration" alt="Cloud Migration" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Jamie Chen</span><br /><small class="text-muted">Apr 28, 2025</small></div>
              </div>
              <span class="blog-tag">Cloud</span> <span class="blog-tag">Development</span>
              <h5 class="mt-2">Cloud Migration Strategy</h5>
              <p class="small text-muted">Best practices for migrating legacy systems to the cloud with minimal disruption and maximum ROI.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 8</span>
                <span><i class="far fa-heart"></i> 27</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Post 3 -->
        <div class="col-md-4 blog-item" data-category="ux development">
          <div class="blog-card" data-aos="fade-up" data-aos-delay="200">
            <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=UX+Trends" alt="UX Trends" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Priya Patel</span><br /><small class="text-muted">Apr 15, 2025</small></div>
              </div>
              <span class="blog-tag">UX</span> <span class="blog-tag">Development</span>
              <h5 class="mt-2">UX Design Trends 2025</h5>
              <p class="small text-muted">The latest user experience trends that are shaping digital products, including AI-powered interfaces.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 15</span>
                <span><i class="far fa-heart"></i> 42</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Post 4 -->
        <div class="col-md-4 blog-item" data-category="security development">
          <div class="blog-card" data-aos="fade-up" data-aos-delay="300">
            <img src="https://via.placeholder.com/600x400/2563EB/ffffff?text=Security+Best+Practices" alt="Security" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Marcus Ng</span><br /><small class="text-muted">Apr 2, 2025</small></div>
              </div>
              <span class="blog-tag">Security</span> <span class="blog-tag">Development</span>
              <h5 class="mt-2">Cybersecurity Best Practices</h5>
              <p class="small text-muted">Essential security measures every development team should implement to protect their applications.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 9</span>
                <span><i class="far fa-heart"></i> 31</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Post 5 (Featured) -->
        <div class="col-md-4 blog-item" data-category="ai cloud">
          <div class="blog-card" data-aos="fade-up" data-aos-delay="400">
            <img src="https://via.placeholder.com/600x400/111827/ffffff?text=AI+Cloud" alt="AI Cloud" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Sarah Kim</span><br /><small class="text-muted">Mar 20, 2025</small></div>
              </div>
              <span class="blog-tag">AI</span> <span class="blog-tag">Cloud</span>
              <span class="badge bg-primary ms-2">Featured</span>
              <h5 class="mt-2">AI-Powered Cloud Solutions</h5>
              <p class="small text-muted">Leveraging artificial intelligence to optimize cloud infrastructure and reduce operational costs.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 18</span>
                <span><i class="far fa-heart"></i> 56</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Post 6 -->
        <div class="col-md-4 blog-item" data-category="development ux">
          <div class="blog-card" data-aos="fade-up" data-aos-delay="500">
            <img src="https://via.placeholder.com/600x400/F59E0B/111827?text=DevOps+Trends" alt="DevOps" />
            <div class="p-4">
              <div class="d-flex align-items-center gap-3 mb-2">
                <img src="https://via.placeholder.com/40" class="author-img" alt="Author" />
                <div><span class="fw-semibold">Tom Wagner</span><br /><small class="text-muted">Mar 10, 2025</small></div>
              </div>
              <span class="blog-tag">Development</span> <span class="blog-tag">UX</span>
              <h5 class="mt-2">DevOps & UX Integration</h5>
              <p class="small text-muted">How DevOps practices can enhance user experience through faster deployments and better reliability.</p>
              <a href="#post-detail" class="btn btn-link text-primary p-0 read-more">Read More →</a>
              <div class="mt-2 d-flex gap-3 small text-muted">
                <span><i class="far fa-comment"></i> 6</span>
                <span><i class="far fa-heart"></i> 19</span>
                <span><i class="far fa-share-alt"></i> Share</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- POST DETAIL VIEW (hidden until "Read More" clicked) -->
  <section id="post-detail" class="py-5 bg-light" style="display:none;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="post-detail" data-aos="fade-up">
            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToBlog"><i class="fas fa-arrow-left me-2"></i>Back to Blog</button>
            <img src="https://via.placeholder.com/800x400/2563EB/ffffff?text=Blog+Post" class="img-fluid rounded-4 mb-4" />
            <div class="d-flex align-items-center gap-3 mb-3">
              <img src="https://via.placeholder.com/48" class="rounded-circle" alt="Author" />
              <div><span class="fw-semibold">Alex Rivera</span><br /><small class="text-muted">May 10, 2025 · 8 min read</small></div>
            </div>
            <span class="blog-tag">AI</span> <span class="blog-tag">Development</span>
            <h2 class="mt-3 fw-bold">AI in Software Development: The Future is Now</h2>
            <p class="text-muted">Artificial intelligence is revolutionizing the software development lifecycle. From intelligent code completion to automated testing, AI is making developers more productive than ever before.</p>
            <p>In this comprehensive guide, we explore how AI is changing every aspect of software development, including:</p>
            <ul>
              <li>AI-powered code generation and review</li>
              <li>Automated testing and quality assurance</li>
              <li>Intelligent project management and estimation</li>
              <li>Natural language processing for requirements analysis</li>
              <li>AI-assisted debugging and error resolution</li>
            </ul>
            
            <!-- Social Share -->
            <div class="my-4 d-flex gap-3">
              <button class="btn btn-outline-primary rounded-pill px-4"><i class="fab fa-twitter me-2"></i>Share</button>
              <button class="btn btn-outline-primary rounded-pill px-4"><i class="fab fa-linkedin me-2"></i>Share</button>
              <button class="btn btn-outline-primary rounded-pill px-4"><i class="far fa-heart me-2"></i>Like (34)</button>
            </div>

            <!-- Comments -->
            <h5 class="mt-4">Comments (12)</h5>
            <div class="comment-item d-flex gap-3">
              <img src="https://via.placeholder.com/48" alt="User" />
              <div><span class="fw-semibold">Jane Doe</span> <small class="text-muted">2 hours ago</small><p class="mb-0">Great article! AI has definitely changed the way we approach testing.</p></div>
            </div>
            <div class="comment-item d-flex gap-3">
              <img src="https://via.placeholder.com/48" alt="User" />
              <div><span class="fw-semibold">John Smith</span> <small class="text-muted">5 hours ago</small><p class="mb-0">Looking forward to seeing how AI will continue to evolve in this space.</p></div>
            </div>
            
            <!-- Comment Form -->
            <div class="mt-4">
              <h6>Leave a Comment</h6>
              <form>
                <div class="row g-2">
                  <div class="col-md-6"><input type="text" class="form-control" placeholder="Your Name" /></div>
                  <div class="col-md-6"><input type="email" class="form-control" placeholder="Your Email" /></div>
                  <div class="col-12"><textarea class="form-control" rows="3" placeholder="Your comment..."></textarea></div>
                  <div class="col-12"><button class="btn btn-primary rounded-pill px-4">Post Comment</button></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ADMIN PANEL (Blog CMS) -->
  <section id="admin-panel" class="py-5 bg-light">
    <div class="container">
      <div class="admin-card" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold"><i class="fas fa-cog me-2 text-primary"></i> Blog Management</h4>
          <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addPostModal">
            <i class="fas fa-plus me-1"></i> New Post
          </button>
        </div>
        <div class="table-responsive">
          <table id="blogTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Post Title</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Author</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-semibold">AI in Software Development</span></td>
                <td>AI, Development</td>
                <td>#AI #Software #Tech</td>
                <td>Alex Rivera</td>
                <td><span class="badge bg-success">Published</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</button>
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">Cloud Migration Strategy</span></td>
                <td>Cloud, Development</td>
                <td>#Cloud #Migration #AWS</td>
                <td>Jamie Chen</td>
                <td><span class="badge bg-success">Published</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</button>
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                </td>
              </tr>
              <tr>
                <td><span class="fw-semibold">UX Design Trends 2025</span></td>
                <td>UX, Development</td>
                <td>#UX #Design #Trends</td>
                <td>Priya Patel</td>
                <td><span class="badge bg-warning text-dark">Draft</span></td>
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

  <!-- ADD POST MODAL -->
  <div class="modal fade" id="addPostModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i>Create New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-8"><input type="text" class="form-control" placeholder="Post Title" /></div>
              <div class="col-md-4">
                <select class="form-select"><option>Select Category</option><option>AI</option><option>Cloud</option><option>Development</option><option>UX</option><option>Security</option></select>
              </div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Tags (comma separated)" /></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="SEO Meta Title" /></div>
              <div class="col-12"><textarea class="form-control" rows="2" placeholder="SEO Meta Description"></textarea></div>
              <div class="col-12"><input type="file" class="form-control" accept="image/*" /></div>
              <div class="col-12"><textarea class="form-control" rows="5" placeholder="Post Content..."></textarea></div>
              <div class="col-12">
                <div class="d-flex gap-3">
                  <div class="form-check"><input type="checkbox" class="form-check-input" id="featured" /><label class="form-check-label" for="featured">Featured Post</label></div>
                  <div class="form-check"><input type="checkbox" class="form-check-input" id="publish" /><label class="form-check-label" for="publish">Publish Immediately</label></div>
                </div>
              </div>
              <div class="col-12"><button class="btn btn-primary w-100 rounded-pill py-2">Create Post</button></div>
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
      $('#blogTable').DataTable({
        pageLength: 5,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf']
      });
    });

    // Category filtering
    const categoryPills = document.querySelectorAll('.category-pill');
    const blogItems = document.querySelectorAll('.blog-item');

    categoryPills.forEach(pill => {
      pill.addEventListener('click', function() {
        categoryPills.forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        const category = this.dataset.category;
        blogItems.forEach(item => {
          if (category === 'all' || item.dataset.category.includes(category)) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });

    // Search functionality
    document.getElementById('blogSearch').addEventListener('input', function() {
      const query = this.value.toLowerCase();
      blogItems.forEach(item => {
        const title = item.querySelector('h5')?.textContent.toLowerCase() || '';
        const desc = item.querySelector('p')?.textContent.toLowerCase() || '';
        if (title.includes(query) || desc.includes(query)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });

    // Read More functionality - show post detail
    document.querySelectorAll('.read-more').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('blog-grid').style.display = 'none';
        document.getElementById('blog').style.display = 'none';
        document.getElementById('post-detail').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });

    document.getElementById('backToBlog').addEventListener('click', function() {
      document.getElementById('blog-grid').style.display = 'block';
      document.getElementById('blog').style.display = 'block';
      document.getElementById('post-detail').style.display = 'none';
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Dummy interactions
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Support Portal demo') }));
    document.querySelectorAll('a[href="#careers"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Careers page demo') }));
  </script>
</body>
</html>