<?php 

require "partials/header.php";

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
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: #f8fafc; color: #1f2937; }
        .btn-primary { background: var(--primary); border: none; }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,99,235,0.3); }
        .btn-outline-primary { border-color: var(--primary); color: var(--primary); }
        .btn-outline-primary:hover { background: var(--primary); color: #fff; }
        .text-primary { color: var(--primary) !important; }
        .bg-primary { background: var(--primary) !important; }
        .navbar { box-shadow: 0 2px 20px rgba(0,0,0,0.03); background: rgba(255,255,255,0.85) !important; backdrop-filter: blur(8px); }
        .nav-link { font-weight: 500; color: #1f2937 !important; margin: 0 6px; }
        .nav-link:hover { color: var(--primary) !important; }
        .page-header { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); padding: 80px 0 50px; }
        .page-header h1 { font-weight: 700; }
        .legal-card { background: white; border-radius: 24px; padding: 40px; box-shadow: var(--shadow-sm); }
        .legal-card h3 { color: var(--primary); font-weight: 600; margin-top: 24px; }
        .legal-card h3:first-of-type { margin-top: 0; }
        .legal-card ul, .legal-card ol { padding-left: 20px; }
        .legal-card ul li, .legal-card ol li { margin-bottom: 8px; }
        .legal-card .section-divider { border-top: 2px solid #f3f4f6; margin: 32px 0; }
        .faq-item { border-bottom: 1px solid #f3f4f6; padding: 16px 0; }
        .faq-item:last-child { border-bottom: 0; }
        .faq-item .question { font-weight: 600; cursor: pointer; display: flex; justify-content: space-between; align-items: center; }
        .faq-item .question i { transition: 0.3s; color: var(--primary); }
        .faq-item .question i.rotated { transform: rotate(180deg); }
        .faq-item .answer { padding-top: 8px; color: #4b5563; display: none; }
        .faq-item .answer.show { display: block; }
        .category-pill { background: #eef2ff; color: var(--primary); padding: 4px 16px; border-radius: 30px; font-size: 0.8rem; display: inline-block; cursor: pointer; transition: 0.3s; }
        .category-pill:hover, .category-pill.active { background: var(--primary); color: white; }
        .help-card { border: none; border-radius: 20px; box-shadow: var(--shadow-sm); transition: 0.3s; background: white; padding: 24px; text-align: center; }
        .help-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .help-card i { font-size: 2.5rem; color: var(--primary); }
        footer { background: var(--secondary); color: #e5e7eb; }
        footer a { color: #9ca3af; text-decoration: none; }
        footer a:hover { color: white; }
        @media (max-width: 768px) {
            .page-header h1 { font-size: 2rem; }
            .legal-card { padding: 24px; }
            .help-card { padding: 16px; }
        }
    </style>
</head>
<body>
    <!-- NAVIGATION -->
  <?php require 'partials/navbar.php'; ?>

    <!-- PAGE HEADER -->
    <section class="page-header" id="help">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <h1 class="display-4 fw-bold">Help Center &amp; <span class="text-primary">Legal</span></h1>
                <p class="lead text-muted">Find answers to common questions and review our policies</p>
            </div>
        </div>
    </section>

    <!-- TAB NAVIGATION -->
    <section class="py-3 bg-light border-bottom">
        <div class="container">
            <ul class="nav nav-pills justify-content-center gap-2" role="tablist">
                <li class="nav-item"><a class="nav-link active fw-semibold rounded-pill px-4" data-bs-toggle="tab" href="#helpTab">Help Center</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold rounded-pill px-4" data-bs-toggle="tab" href="#privacyTab">Privacy Policy</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold rounded-pill px-4" data-bs-toggle="tab" href="#termsTab">Terms of Service</a></li>
            </ul>
        </div>
    </section>

    <!-- TAB CONTENT -->
    <section class="py-5">
        <div class="container">
            <div class="tab-content">
                <!-- HELP CENTER TAB -->
                <div class="tab-pane fade show active" id="helpTab">
                    <!-- Help Categories -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="help-card">
                                <i class="fas fa-question-circle"></i>
                                <h6 class="fw-bold mt-2">General Questions</h6>
                                <p class="small text-muted">Common questions about our services</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                            <div class="help-card">
                                <i class="fas fa-user-cog"></i>
                                <h6 class="fw-bold mt-2">Account Support</h6>
                                <p class="small text-muted">Login, registration, and profile help</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="help-card">
                                <i class="fas fa-credit-card"></i>
                                <h6 class="fw-bold mt-2">Billing &amp; Payments</h6>
                                <p class="small text-muted">Invoices, payments, and pricing</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="legal-card" data-aos="fade-up">
                        <h3><i class="fas fa-faq me-2 text-primary"></i>Frequently Asked Questions</h3>
                        <p class="text-muted">Quick answers to the most common questions</p>

                        <!-- Category Filters -->
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="category-pill active" data-category="all">All</span>
                            <span class="category-pill" data-category="general">General</span>
                            <span class="category-pill" data-category="account">Account</span>
                            <span class="category-pill" data-category="billing">Billing</span>
                            <span class="category-pill" data-category="technical">Technical</span>
                        </div>

                        <!-- FAQ Items -->
                        <div class="faq-item" data-category="general">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>What services does DonutsTec offer?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">DonutsTec offers custom software development, website development, e-commerce solutions, mobile app development, UI/UX design, API development, database design, cloud solutions, ERP systems, school management systems, hospital systems, event management platforms, AI solutions, business automation, website maintenance, cybersecurity, domain &amp; hosting, and SEO optimization.</div>
                        </div>

                        <div class="faq-item" data-category="account">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>How do I create an account?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">You can create an account by clicking the "Client Login" button in the navigation menu and selecting "Register". Fill in your details, verify your email with the OTP sent to your inbox, and you're ready to go.</div>
                        </div>

                        <div class="faq-item" data-category="account">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>How do I reset my password?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">Click on "Client Login" and select "Reset Password". Enter your email address and we'll send you a link to create a new password.</div>
                        </div>

                        <div class="faq-item" data-category="billing">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>What payment methods do you accept?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">We accept all major credit cards (Visa, Mastercard, American Express), PayPal, and bank transfers. All payments are processed securely via Stripe.</div>
                        </div>

                        <div class="faq-item" data-category="billing">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>Can I get a refund?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">Yes, we offer a 14-day money-back guarantee on all our services. If you're not satisfied, contact our support team for a full refund.</div>
                        </div>

                        <div class="faq-item" data-category="technical">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>What technologies do you use?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">We use a modern tech stack including React, Vue.js, Angular, Node.js, Python, Laravel, Django, MySQL, PostgreSQL, MongoDB, AWS, Azure, and Google Cloud Platform.</div>
                        </div>

                        <div class="faq-item" data-category="technical">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>How long does a typical project take?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">Project timelines vary depending on complexity. Small websites take 2-4 weeks, while custom software solutions can take 3-6 months. We'll provide a detailed timeline during the project planning phase.</div>
                        </div>

                        <div class="faq-item" data-category="general">
                            <div class="question" onclick="toggleFaq(this)">
                                <span>Do you offer support after project completion?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="answer">Yes, we offer ongoing maintenance and support packages for all our clients. Our support team is available 24/7 for critical issues and during business hours for general inquiries.</div>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="text-center mt-4" data-aos="fade-up">
                        <p class="text-muted">Still have questions? <a href="#contact" class="text-primary fw-semibold">Contact our support team</a></p>
                    </div>
                </div>

                <!-- PRIVACY POLICY TAB -->
                <div class="tab-pane fade" id="privacyTab">
                    <div class="legal-card" data-aos="fade-up">
                        <h1 class="display-6 fw-bold">Privacy <span class="text-primary">Policy</span></h1>
                        <p class="text-muted">Last updated: June 1, 2025</p>
                        <div class="section-divider"></div>

                        <h3>1. Information We Collect</h3>
                        <p>We collect information you provide directly to us, such as when you create an account, use our services, contact us, or participate in surveys. This includes:</p>
                        <ul>
                            <li><strong>Personal Information:</strong> Name, email address, phone number, company name, and billing information.</li>
                            <li><strong>Usage Data:</strong> Information about how you interact with our website and services.</li>
                            <li><strong>Device Information:</strong> IP address, browser type, operating system, and device identifiers.</li>
                        </ul>

                        <h3>2. How We Use Your Information</h3>
                        <p>We use your information to:</p>
                        <ul>
                            <li>Provide, maintain, and improve our services</li>
                            <li>Process transactions and send transaction notifications</li>
                            <li>Send you technical notices, updates, and support messages</li>
                            <li>Respond to your comments, questions, and requests</li>
                            <li>Monitor and analyze trends, usage, and activities</li>
                            <li>Detect and prevent fraud and security issues</li>
                        </ul>

                        <h3>3. Data Security</h3>
                        <p>We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction. This includes:</p>
                        <ul>
                            <li>Encryption of data in transit and at rest</li>
                            <li>Regular security audits and penetration testing</li>
                            <li>Access controls and authentication mechanisms</li>
                            <li>Secure data storage and backup procedures</li>
                        </ul>

                        <h3>4. Data Sharing</h3>
                        <p>We do not sell, trade, or rent your personal information to third parties. We may share your data with:</p>
                        <ul>
                            <li><strong>Service Providers:</strong> Third-party vendors who help us operate our business (e.g., payment processors, hosting providers, email services).</li>
                            <li><strong>Legal Requirements:</strong> When required by law or to protect the rights and safety of DonutsTec and our users.</li>
                            <li><strong>With Your Consent:</strong> When you explicitly authorize us to share your information.</li>
                        </ul>

                        <h3>5. Cookies and Tracking</h3>
                        <p>We use cookies and similar technologies to enhance your experience, analyze usage, and deliver personalized content. You can control cookie preferences through your browser settings.</p>

                        <h3>6. Your Rights</h3>
                        <p>You have the right to:</p>
                        <ul>
                            <li>Access, update, or delete your personal information</li>
                            <li>Opt-out of marketing communications</li>
                            <li>Request a copy of your data in a portable format</li>
                            <li>Withdraw consent for data processing</li>
                        </ul>

                        <h3>7. Data Retention</h3>
                        <p>We retain your personal data for as long as necessary to provide our services and comply with legal obligations. When you close your account, we will delete your data within 30 days, except where retention is required by law.</p>

                        <h3>8. Children's Privacy</h3>
                        <p>Our services are not directed to children under 13. We do not knowingly collect personal information from children.</p>

                        <h3>9. Changes to This Policy</h3>
                        <p>We may update this Privacy Policy from time to time. We will notify you of significant changes by posting the new policy on this page and updating the "Last updated" date.</p>

                        <h3>10. Contact Us</h3>
                        <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                        <p><strong>DonutsTec Privacy Team</strong><br />
                        Email: privacy@donutstec.com<br />
                        Address: 123 Tech Park, Berlin 10115, Germany</p>
                    </div>
                </div>

                <!-- TERMS OF SERVICE TAB -->
                <div class="tab-pane fade" id="termsTab">
                    <div class="legal-card" data-aos="fade-up">
                        <h1 class="display-6 fw-bold">Terms of <span class="text-primary">Service</span></h1>
                        <p class="text-muted">Last updated: June 1, 2025</p>
                        <div class="section-divider"></div>

                        <h3>1. Acceptance of Terms</h3>
                        <p>By using DonutsTec's services, you agree to these Terms of Service. If you do not agree, please do not use our services.</p>

                        <h3>2. Description of Services</h3>
                        <p>DonutsTec provides software development, consulting, and IT services including but not limited to:</p>
                        <ul>
                            <li>Custom software development</li>
                            <li>Website and web application development</li>
                            <li>Mobile application development</li>
                            <li>E-commerce solutions</li>
                            <li>UI/UX design</li>
                            <li>Cloud solutions and IT consulting</li>
                        </ul>

                        <h3>3. User Accounts</h3>
                        <p>To access certain features, you must create an account. You are responsible for:</p>
                        <ul>
                            <li>Maintaining the confidentiality of your credentials</li>
                            <li>All activities that occur under your account</li>
                            <li>Notifying us immediately of any security breach</li>
                            <li>Providing accurate and complete information</li>
                        </ul>

                        <h3>4. Intellectual Property</h3>
                        <p>All content, trademarks, and intellectual property on our website and services are owned by DonutsTec or our licensors. You may not:</p>
                        <ul>
                            <li>Copy, modify, or distribute our content without permission</li>
                            <li>Use our trademarks or branding without authorization</li>
                            <li>Reverse engineer or decompile our software</li>
                        </ul>

                        <h3>5. Client Projects</h3>
                        <p>For custom development projects, the following terms apply:</p>
                        <ul>
                            <li>Project scope and deliverables will be defined in a separate agreement</li>
                            <li>Payment terms and schedules will be outlined in project proposals</li>
                            <li>Ownership of deliverables transfers to the client upon full payment</li>
                            <li>DonutsTec retains the right to use project results for portfolio purposes</li>
                        </ul>

                        <h3>6. Payment Terms</h3>
                        <ul>
                            <li>Invoices are payable within 30 days of receipt</li>
                            <li>Late payments may incur interest at 1.5% per month</li>
                            <li>Project deposits are non-refundable</li>
                            <li>We reserve the right to suspend services for non-payment</li>
                        </ul>

                        <h3>7. Refund Policy</h3>
                        <ul>
                            <li>We offer a 14-day money-back guarantee on our services</li>
                            <li>Refunds will be processed to the original payment method</li>
                            <li>Custom development work may be subject to different terms</li>
                        </ul>

                        <h3>8. Limitation of Liability</h3>
                        <p>To the fullest extent permitted by law, DonutsTec shall not be liable for:</p>
                        <ul>
                            <li>Indirect, incidental, or consequential damages</li>
                            <li>Loss of profits, revenue, or data</li>
                            <li>Damages arising from use or inability to use services</li>
                            <li>Third-party claims against you</li>
                        </ul>

                        <h3>9. Disclaimer of Warranties</h3>
                        <p>Our services are provided "as is" without warranties of any kind. We do not guarantee that:</p>
                        <ul>
                            <li>Services will be uninterrupted or error-free</li>
                            <li>Results will meet your expectations</li>
                            <li>Services will be secure or free from bugs</li>
                        </ul>

                        <h3>10. Termination</h3>
                        <p>We may terminate or suspend your account immediately for:</p>
                        <ul>
                            <li>Violation of these Terms of Service</li>
                            <li>Non-payment of fees</li>
                            <li>Illegal or fraudulent activity</li>
                            <li>Abuse of our support or services</li>
                        </ul>

                        <h3>11. Governing Law</h3>
                        <p>These Terms shall be governed by and construed in accordance with the laws of Germany, without regard to conflict of law provisions.</p>

                        <h3>12. Changes to Terms</h3>
                        <p>We reserve the right to modify these Terms at any time. Changes will be effective upon posting. Your continued use of our services constitutes acceptance of the updated Terms.</p>

                        <h3>13. Contact Information</h3>
                        <p>For questions about these Terms of Service, contact us at:</p>
                        <p><strong>DonutsTec Legal Department</strong><br />
                        Email: legal@donutstec.com<br />
                        Address: 123 Tech Park, Berlin 10115, Germany</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
  <?php require 'partials/footer.php'?> 

    <!-- Bootstrap + AOS -->
 <?php 

 require 'partials/scripts.php'; 


 ?>
    <script>
        AOS.init({ once: true, duration: 700 });

        // FAQ Toggle
        function toggleFaq(element) {
            const answer = element.parentElement.querySelector('.answer');
            const icon = element.querySelector('i');
            if (answer.classList.contains('show')) {
                answer.classList.remove('show');
                icon.classList.remove('rotated');
            } else {
                answer.classList.add('show');
                icon.classList.add('rotated');
            }
        }

        // Category Filter
        document.querySelectorAll('.category-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                const category = this.dataset.category;
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Smooth tab switching - update URL hash
        document.querySelectorAll('.nav-pills .nav-link').forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(e) {
                const target = this.getAttribute('data-bs-target');
                if (target) {
                    history.replaceState(null, null, target);
                }
            });
        });

        // Check URL hash on load
        window.addEventListener('load', function() {
            const hash = window.location.hash;
            if (hash) {
                const tab = document.querySelector(`.nav-pills .nav-link[data-bs-target="${hash}"]`);
                if (tab) {
                    const bsTab = new bootstrap.Tab(tab);
                    bsTab.show();
                }
            }
        });

        // Dummy interactions
        document.querySelectorAll('a[href="#contact"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Contact page demo'); }));
        document.querySelectorAll('a[href="#careers"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Careers page demo'); }));
    </script>
</body>
</html>