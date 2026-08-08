<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin · Blog · DonutsTec</title>
    <!-- Bootstrap 5.3 + Icons + AOS + DataTables + Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .status-published { background: #d1fae5; color: #065f46; }
        .status-draft { background: #fef3c7; color: #b45309; }
        .status-archived { background: #e5e7eb; color: #4b5563; }
        .filter-btn { border-radius: 40px; padding: 6px 20px; border: 1px solid #e5e7eb; background: white; transition: 0.3s; font-size: 0.9rem; }
        .filter-btn:hover, .filter-btn.active { background: var(--primary); color: white; border-color: var(--primary); }
        .post-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: all 0.3s; background: white; }
        .post-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .post-card .post-img { height: 140px; object-fit: cover; border-radius: 12px; }
        .detail-card { background: white; border-radius: 24px; padding: 32px; box-shadow: var(--shadow-sm); }
        .tag-pill { background: #eef2ff; color: var(--primary); padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; display: inline-block; margin: 2px; }
        .meta-field { border-bottom: 1px solid #f3f4f6; padding: 8px 0; }
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
                        <h5 class="fw-bold mb-0">Blog Management</h5>
                        <small class="text-muted">Create, manage, and optimize your blog content</small>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#newPostModal">
                            <i class="fas fa-plus me-2"></i>New Post
                        </button>
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin" />
                    </div>
                </div>

                <!-- Stats -->
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-3 col-6" data-aos="fade-up">
                            <div class="stat-card"><div class="number">48</div><div class="label">Total Posts</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="stat-card" style="border-left-color:#22c55e;"><div class="number">32</div><div class="label">Published</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-card" style="border-left-color:var(--accent);"><div class="number">12</div><div class="label">Drafts</div></div>
                        </div>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="150">
                            <div class="stat-card" style="border-left-color:#8b5cf6;"><div class="number">4</div><div class="label">Archived</div></div>
                        </div>
                    </div>

                    <!-- Charts
                    <div class="row g-3 mt-2">
                        <div class="col-md-6" data-aos="fade-up">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Post Performance</h6>
                                <canvas id="performanceChart" height="50"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="dashboard-card">
                                <h6 class="fw-bold">Category Distribution</h6>
                                <canvas id="categoryChart" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                     -->
                    <!-- Filters & Search -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="filter-btn active" data-filter="all">All Posts</button>
                                <button class="filter-btn" data-filter="published">Published</button>
                                <button class="filter-btn" data-filter="draft">Drafts</button>
                                <button class="filter-btn" data-filter="archived">Archived</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" id="postSearch" class="form-control" placeholder="Search posts..." />
                            </div>
                        </div>
                    </div>

                    <!-- Post List -->
                    <div class="mt-3" id="postList">
                        <div class="row g-3" id="postContainer">
                            <!-- Post 1 -->
                            <div class="col-md-4 post-item" data-status="published">
                                <div class="post-card p-3" data-post="1">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/2563EB/ffffff?text=AI" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">AI in Software Development</h6>
                                                <span class="status-badge status-published">Published</span>
                                            </div>
                                            <p class="small text-muted mb-1">May 10, 2025</p>
                                            <div>
                                                <span class="tag-pill">AI</span>
                                                <span class="tag-pill">Development</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 2 -->
                            <div class="col-md-4 post-item" data-status="published">
                                <div class="post-card p-3" data-post="2">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/111827/ffffff?text=Cloud" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">Cloud Migration Strategy</h6>
                                                <span class="status-badge status-published">Published</span>
                                            </div>
                                            <p class="small text-muted mb-1">Apr 28, 2025</p>
                                            <div>
                                                <span class="tag-pill">Cloud</span>
                                                <span class="tag-pill">DevOps</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 3 -->
                            <div class="col-md-4 post-item" data-status="draft">
                                <div class="post-card p-3" data-post="3">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/F59E0B/111827?text=UX" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">UX Design Trends 2025</h6>
                                                <span class="status-badge status-draft">Draft</span>
                                            </div>
                                            <p class="small text-muted mb-1">Apr 15, 2025</p>
                                            <div>
                                                <span class="tag-pill">UX</span>
                                                <span class="tag-pill">Design</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 4 -->
                            <div class="col-md-4 post-item" data-status="published">
                                <div class="post-card p-3" data-post="4">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/2563EB/ffffff?text=Security" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">Cybersecurity Best Practices</h6>
                                                <span class="status-badge status-published">Published</span>
                                            </div>
                                            <p class="small text-muted mb-1">Apr 2, 2025</p>
                                            <div>
                                                <span class="tag-pill">Security</span>
                                                <span class="tag-pill">DevOps</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 5 -->
                            <div class="col-md-4 post-item" data-status="draft">
                                <div class="post-card p-3" data-post="5">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/111827/ffffff?text=AI+Cloud" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">AI-Powered Cloud Solutions</h6>
                                                <span class="status-badge status-draft">Draft</span>
                                            </div>
                                            <p class="small text-muted mb-1">Mar 20, 2025</p>
                                            <div>
                                                <span class="tag-pill">AI</span>
                                                <span class="tag-pill">Cloud</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 6 -->
                            <div class="col-md-4 post-item" data-status="archived">
                                <div class="post-card p-3" data-post="6">
                                    <div class="d-flex gap-3">
                                        <img src="https://via.placeholder.com/120/F59E0B/111827?text=DevOps" class="post-img" alt="Post" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-0">DevOps & UX Integration</h6>
                                                <span class="status-badge status-archived">Archived</span>
                                            </div>
                                            <p class="small text-muted mb-1">Mar 10, 2025</p>
                                            <div>
                                                <span class="tag-pill">DevOps</span>
                                                <span class="tag-pill">UX</span>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 mt-1 view-post">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- POST DETAIL VIEW -->
                    <div id="postDetail" class="mt-4" style="display:none;">
                        <div class="detail-card" data-aos="fade-up">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill mb-3" id="backToPosts">
                                <i class="fas fa-arrow-left me-2"></i>Back to Posts
                            </button>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h4 id="detailTitle" class="fw-bold">AI in Software Development</h4>
                                        <span id="detailStatus" class="status-badge status-published">Published</span>
                                    </div>
                                    <p id="detailDate" class="text-muted">May 10, 2025 · By Alex Rivera</p>
                                    <div id="detailTags">
                                        <span class="tag-pill">AI</span>
                                        <span class="tag-pill">Development</span>
                                        <span class="tag-pill">Technology</span>
                                    </div>
                                    <img src="https://via.placeholder.com/800x300/2563EB/ffffff?text=AI+in+Software" class="img-fluid rounded-4 my-3" alt="Post" />
                                    <p id="detailContent" class="text-muted">Artificial intelligence is revolutionizing the software development lifecycle. From intelligent code completion to automated testing, AI is making developers more productive than ever before. In this comprehensive guide, we explore how AI is changing every aspect of software development, including AI-powered code generation and review, automated testing and quality assurance, intelligent project management and estimation, natural language processing for requirements analysis, and AI-assisted debugging and error resolution.</p>
                                    
                                    <h6 class="fw-bold mt-3">SEO Settings</h6>
                                    <div class="meta-field"><strong>Meta Title:</strong> <span id="detailMetaTitle">AI in Software Development - DonutsTec</span></div>
                                    <div class="meta-field"><strong>Meta Description:</strong> <span id="detailMetaDesc">Learn how AI is transforming software development with code generation, testing automation, and intelligent project management.</span></div>
                                    <div class="meta-field"><strong>Slug:</strong> <span id="detailSlug">ai-in-software-development</span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-light p-3 rounded-4">
                                        <h6 class="fw-bold">Post Information</h6>
                                        <p><strong>Status:</strong> <span id="detailStatusInfo" class="status-badge status-published">Published</span></p>
                                        <p><strong>Category:</strong> <span id="detailCategory">Technology</span></p>
                                        <p><strong>Author:</strong> <span id="detailAuthor">Alex Rivera</span></p>
                                        <p><strong>Created:</strong> <span id="detailCreated">May 10, 2025</span></p>
                                        <p><strong>Last Updated:</strong> <span id="detailUpdated">May 12, 2025</span></p>
                                        <p><strong>Featured:</strong> <span id="detailFeatured" class="badge bg-success">Yes</span></p>
                                    </div>
                                    <div class="mt-3 d-flex flex-column gap-2">
                                        <button class="btn btn-primary rounded-pill"><i class="fas fa-edit me-2"></i>Edit Post</button>
                                        <button class="btn btn-success rounded-pill"><i class="fas fa-eye me-2"></i>Preview</button>
                                        <button class="btn btn-warning rounded-pill"><i class="fas fa-star me-2"></i>Toggle Featured</button>
                                        <button class="btn btn-outline-danger rounded-pill"><i class="fas fa-trash me-2"></i>Delete Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NEW POST MODAL -->
    <div class="modal fade" id="newPostModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle text-primary me-2"></i>Create New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-12"><input type="text" class="form-control" placeholder="Post Title" /></div>
                            <div class="col-md-6">
                                <select class="form-select"><option>Select Category</option><option>AI</option><option>Cloud</option><option>Development</option><option>UX</option><option>Security</option></select>
                            </div>
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Tags (comma separated)" /></div>
                            <div class="col-12"><input type="file" class="form-control" accept="image/*" /></div>
                            <div class="col-12"><textarea class="form-control" rows="5" placeholder="Post content..."></textarea></div>
                            <div class="col-12">
                                <h6 class="fw-bold">SEO Settings</h6>
                                <input type="text" class="form-control mb-2" placeholder="Meta Title" />
                                <textarea class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
                                <input type="text" class="form-control" placeholder="Slug" />
                            </div>
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

    <!-- Bootstrap + DataTables + AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 700 });

        // Chart.js - Performance
        const ctx1 = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Views',
                    data: [120, 180, 220, 340, 410, 380],
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
                scales: { y: { beginAtZero: true } }
            }
        });

        // Chart.js - Categories
        const ctx2 = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['AI', 'Cloud', 'Development', 'UX', 'Security'],
                datasets: [{
                    data: [8, 6, 12, 5, 7],
                    backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b', '#8b5cf6', '#dc2626']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Post data for detail view
        const postData = {
            1: {
                title: 'AI in Software Development',
                status: 'published',
                statusLabel: 'Published',
                date: 'May 10, 2025',
                author: 'Alex Rivera',
                category: 'Technology',
                tags: ['AI', 'Development', 'Technology'],
                content: 'Artificial intelligence is revolutionizing the software development lifecycle. From intelligent code completion to automated testing, AI is making developers more productive than ever before. In this comprehensive guide, we explore how AI is changing every aspect of software development, including AI-powered code generation and review, automated testing and quality assurance, intelligent project management and estimation, natural language processing for requirements analysis, and AI-assisted debugging and error resolution.',
                metaTitle: 'AI in Software Development - DonutsTec',
                metaDesc: 'Learn how AI is transforming software development with code generation, testing automation, and intelligent project management.',
                slug: 'ai-in-software-development',
                created: 'May 10, 2025',
                updated: 'May 12, 2025',
                featured: 'Yes'
            },
            2: {
                title: 'Cloud Migration Strategy',
                status: 'published',
                statusLabel: 'Published',
                date: 'Apr 28, 2025',
                author: 'Jamie Chen',
                category: 'Cloud',
                tags: ['Cloud', 'DevOps', 'Strategy'],
                content: 'Best practices for migrating legacy systems to the cloud with minimal disruption and maximum ROI. This article covers assessment, planning, execution, and optimization strategies for successful cloud migration.',
                metaTitle: 'Cloud Migration Strategy - DonutsTec',
                metaDesc: 'Learn best practices for migrating your legacy systems to the cloud with minimal disruption.',
                slug: 'cloud-migration-strategy',
                created: 'Apr 28, 2025',
                updated: 'Apr 30, 2025',
                featured: 'No'
            },
            3: {
                title: 'UX Design Trends 2025',
                status: 'draft',
                statusLabel: 'Draft',
                date: 'Apr 15, 2025',
                author: 'Priya Patel',
                category: 'Design',
                tags: ['UX', 'Design', 'Trends'],
                content: 'The latest user experience trends that are shaping digital products, including AI-powered interfaces, voice UX, and immersive experiences.',
                metaTitle: 'UX Design Trends 2025 - DonutsTec',
                metaDesc: 'Explore the latest UX design trends that are shaping digital products in 2025.',
                slug: 'ux-design-trends-2025',
                created: 'Apr 15, 2025',
                updated: 'Apr 18, 2025',
                featured: 'No'
            },
            4: {
                title: 'Cybersecurity Best Practices',
                status: 'published',
                statusLabel: 'Published',
                date: 'Apr 2, 2025',
                author: 'Marcus Ng',
                category: 'Security',
                tags: ['Security', 'DevOps', 'Best Practices'],
                content: 'Essential security measures every development team should implement to protect their applications from threats and vulnerabilities.',
                metaTitle: 'Cybersecurity Best Practices - DonutsTec',
                metaDesc: 'Essential security measures for development teams to protect their applications.',
                slug: 'cybersecurity-best-practices',
                created: 'Apr 2, 2025',
                updated: 'Apr 5, 2025',
                featured: 'Yes'
            },
            5: {
                title: 'AI-Powered Cloud Solutions',
                status: 'draft',
                statusLabel: 'Draft',
                date: 'Mar 20, 2025',
                author: 'Sarah Kim',
                category: 'AI',
                tags: ['AI', 'Cloud', 'Solutions'],
                content: 'Leveraging artificial intelligence to optimize cloud infrastructure and reduce operational costs through intelligent automation.',
                metaTitle: 'AI-Powered Cloud Solutions - DonutsTec',
                metaDesc: 'Learn how AI can optimize your cloud infrastructure and reduce costs.',
                slug: 'ai-powered-cloud-solutions',
                created: 'Mar 20, 2025',
                updated: 'Mar 22, 2025',
                featured: 'No'
            },
            6: {
                title: 'DevOps & UX Integration',
                status: 'archived',
                statusLabel: 'Archived',
                date: 'Mar 10, 2025',
                author: 'Tom Wagner',
                category: 'DevOps',
                tags: ['DevOps', 'UX', 'Integration'],
                content: 'How DevOps practices can enhance user experience through faster deployments, better reliability, and continuous improvement.',
                metaTitle: 'DevOps & UX Integration - DonutsTec',
                metaDesc: 'How DevOps practices can enhance user experience through faster deployments.',
                slug: 'devops-ux-integration',
                created: 'Mar 10, 2025',
                updated: 'Mar 12, 2025',
                featured: 'No'
            }
        };

        // View post detail
        document.querySelectorAll('.view-post').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const card = this.closest('.post-card');
                const postId = card.dataset.post;
                showPostDetail(postId);
            });
        });

        // Click on card to view detail
        document.querySelectorAll('.post-card').forEach(card => {
            card.addEventListener('click', function() {
                const postId = this.dataset.post;
                showPostDetail(postId);
            });
        });

        function showPostDetail(postId) {
            const data = postData[postId];
            if (!data) return;

            document.getElementById('detailTitle').textContent = data.title;
            document.getElementById('detailDate').textContent = data.date + ' · By ' + data.author;
            document.getElementById('detailContent').textContent = data.content;
            document.getElementById('detailMetaTitle').textContent = data.metaTitle;
            document.getElementById('detailMetaDesc').textContent = data.metaDesc;
            document.getElementById('detailSlug').textContent = data.slug;
            document.getElementById('detailCategory').textContent = data.category;
            document.getElementById('detailAuthor').textContent = data.author;
            document.getElementById('detailCreated').textContent = data.created;
            document.getElementById('detailUpdated').textContent = data.updated;
            document.getElementById('detailFeatured').textContent = data.featured;
            document.getElementById('detailFeatured').className = 'badge ' + (data.featured === 'Yes' ? 'bg-success' : 'bg-secondary');

            // Update status
            const statusBadge = document.getElementById('detailStatus');
            statusBadge.textContent = data.statusLabel;
            statusBadge.className = 'status-badge status-' + data.status;

            const statusInfo = document.getElementById('detailStatusInfo');
            statusInfo.textContent = data.statusLabel;
            statusInfo.className = 'status-badge status-' + data.status;

            // Update tags
            const tagsContainer = document.getElementById('detailTags');
            tagsContainer.innerHTML = '';
            data.tags.forEach(tag => {
                const span = document.createElement('span');
                span.className = 'tag-pill';
                span.textContent = tag;
                tagsContainer.appendChild(span);
            });

            // Show detail, hide list
            document.getElementById('postList').style.display = 'none';
            document.getElementById('postDetail').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Back to posts
        document.getElementById('backToPosts').addEventListener('click', function() {
            document.getElementById('postList').style.display = 'block';
            document.getElementById('postDetail').style.display = 'none';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const posts = document.querySelectorAll('.post-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                posts.forEach(post => {
                    if (filter === 'all' || post.dataset.status === filter) {
                        post.style.display = 'block';
                    } else {
                        post.style.display = 'none';
                    }
                });
            });
        });

        // Search functionality        document.getElementById('postSearch').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            posts.forEach(post => {
                const title = post.querySelector('h6')?.textContent.toLowerCase() || '';
                if (title.includes(query)) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
 
        // Dummy interactions
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('text-danger')) return;
                // e.preventDefault();
                document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Modal form submission
        document.querySelector('#newPostModal form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Post created successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('newPostModal'));
            modal.hide();
            this.reset();
        });

        // Toggle featured
        document.querySelector('.detail-card .btn-warning')?.addEventListener('click', function() {
            const badge = document.getElementById('detailFeatured');
            if (badge.textContent === 'Yes') {
                badge.textContent = 'No';
                badge.className = 'badge bg-secondary';
                alert('Post removed from featured.');
            } else {
                badge.textContent = 'Yes';
                badge.className = 'badge bg-success';
                alert('Post marked as featured.');
            }
        });
    </script>
</body>
</html>