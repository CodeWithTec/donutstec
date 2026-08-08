-- ======================================================
-- DonutsTec Database Schema
-- MySQL 8.0+
-- ======================================================

-- Create database
CREATE DATABASE IF NOT EXISTS donutstec;
USE donutstec;

-- ======================================================
-- 1. ROLES TABLE
-- ======================================================
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles (name, description) VALUES
('super_admin', 'Full system access with all permissions'),
('admin', 'Administrative access with limited permissions'),
('support_agent', 'Can manage support tickets and customer inquiries'),
('developer', 'Can access projects and development related features'),
('client', 'Standard client access to projects, tickets, and invoices');

-- ======================================================
-- 2. USERS TABLE
-- ======================================================
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_id INT NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(255),
    position VARCHAR(100),
    bio TEXT,
    avatar VARCHAR(255),
    is_verified BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    last_login DATETIME,
    remember_token VARCHAR(100),
    email_verified_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    INDEX idx_users_email (email),
    INDEX idx_users_role (role_id),
    INDEX idx_users_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 3. PASSWORD RESETS TABLE
-- ======================================================
CREATE TABLE password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires_at DATETIME NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_password_resets_token (token),
    INDEX idx_password_resets_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 4. EMAIL VERIFICATIONS (OTP) TABLE
-- ======================================================
CREATE TABLE email_verifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    otp VARCHAR(6) NOT NULL,
    expires_at DATETIME NOT NULL,
    verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_email_verifications_user (user_id),
    INDEX idx_email_verifications_otp (otp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 5. CLIENTS TABLE
-- ======================================================
CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    company_name VARCHAR(255) NOT NULL,
    contact_person VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    country VARCHAR(100),
    postal_code VARCHAR(20),
    website VARCHAR(255),
    industry VARCHAR(100),
    status ENUM('active', 'pending', 'inactive') DEFAULT 'active',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_clients_email (email),
    INDEX idx_clients_status (status),
    INDEX idx_clients_company (company_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 6. SERVICES TABLE
-- ======================================================
CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    icon VARCHAR(100),
    image VARCHAR(255),
    description TEXT,
    short_description VARCHAR(500),
    features TEXT,
    technologies TEXT,
    process TEXT,
    benefits TEXT,
    faq TEXT,
    pricing_estimate TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_services_slug (slug),
    INDEX idx_services_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 7. PROJECTS TABLE
-- ======================================================
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    category VARCHAR(100),
    status ENUM('active', 'inprogress', 'completed', 'onhold', 'planning', 'cancelled') DEFAULT 'planning',
    priority ENUM('low', 'medium', 'high', 'critical') DEFAULT 'medium',
    start_date DATE,
    due_date DATE,
    completion_date DATE,
    budget DECIMAL(15,2),
    progress INT DEFAULT 0,
    live_url VARCHAR(255),
    github_url VARCHAR(255),
    featured_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE SET NULL,
    INDEX idx_projects_client (client_id),
    INDEX idx_projects_status (status),
    INDEX idx_projects_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 8. PROJECT_TECHNOLOGIES TABLE
-- ======================================================
CREATE TABLE project_technologies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT NOT NULL,
    technology VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    INDEX idx_project_tech_project (project_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 9. PROJECT_MILESTONES TABLE
-- ======================================================
CREATE TABLE project_milestones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATE,
    is_completed BOOLEAN DEFAULT FALSE,
    completed_at DATETIME,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    INDEX idx_milestones_project (project_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 10. PROJECT_TEAM TABLE
-- ======================================================
CREATE TABLE project_team (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT NOT NULL,
    user_id INT NOT NULL,
    role VARCHAR(100),
    assigned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_project_user (project_id, user_id),
    INDEX idx_project_team_project (project_id),
    INDEX idx_project_team_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 11. PORTFOLIO ITEMS TABLE
-- ======================================================
CREATE TABLE portfolio_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category VARCHAR(100),
    description TEXT,
    client_name VARCHAR(255),
    completion_date DATE,
    live_url VARCHAR(255),
    github_url VARCHAR(255),
    featured_image VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE SET NULL,
    INDEX idx_portfolio_category (category),
    INDEX idx_portfolio_slug (slug),
    INDEX idx_portfolio_featured (is_featured)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 12. PORTFOLIO_IMAGES TABLE
-- ======================================================
CREATE TABLE portfolio_images (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portfolio_item_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    caption VARCHAR(255),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portfolio_item_id) REFERENCES portfolio_items(id) ON DELETE CASCADE,
    INDEX idx_portfolio_images_item (portfolio_item_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 13. PORTFOLIO_TECHNOLOGIES TABLE
-- ======================================================
CREATE TABLE portfolio_technologies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portfolio_item_id INT NOT NULL,
    technology VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portfolio_item_id) REFERENCES portfolio_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 14. BLOG_CATEGORIES TABLE
-- ======================================================
CREATE TABLE blog_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_blog_categories_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 15. BLOG_TAGS TABLE
-- ======================================================
CREATE TABLE blog_tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_blog_tags_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 16. BLOG_POSTS TABLE
-- ======================================================
CREATE TABLE blog_posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    author_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    featured_image VARCHAR(255),
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    is_featured BOOLEAN DEFAULT FALSE,
    meta_title VARCHAR(255),
    meta_description TEXT,
    meta_keywords TEXT,
    views INT DEFAULT 0,
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_blog_posts_slug (slug),
    INDEX idx_blog_posts_status (status),
    INDEX idx_blog_posts_author (author_id),
    INDEX idx_blog_posts_category (category_id),
    INDEX idx_blog_posts_published (published_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 17. BLOG_POST_TAGS TABLE
-- ======================================================
CREATE TABLE blog_post_tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES blog_tags(id) ON DELETE CASCADE,
    UNIQUE KEY unique_post_tag (post_id, tag_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 18. BLOG_COMMENTS TABLE
-- ======================================================
CREATE TABLE blog_comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    user_id INT,
    author_name VARCHAR(255),
    author_email VARCHAR(255),
    content TEXT NOT NULL,
    is_approved BOOLEAN DEFAULT FALSE,
    parent_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (parent_id) REFERENCES blog_comments(id) ON DELETE CASCADE,
    INDEX idx_blog_comments_post (post_id),
    INDEX idx_blog_comments_approved (is_approved)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 19. SUPPORT_TICKETS TABLE
-- ======================================================
CREATE TABLE support_tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    user_id INT,
    project_id INT,
    ticket_number VARCHAR(20) NOT NULL UNIQUE,
    subject VARCHAR(255) NOT NULL,
    description TEXT,
    category ENUM('website_update', 'bug_report', 'new_feature', 'content_update', 'payment_issue', 'domain_support', 'hosting_support', 'security_issue', 'general_inquiry') NOT NULL,
    priority ENUM('low', 'medium', 'high', 'critical') DEFAULT 'medium',
    status ENUM('open', 'pending', 'in_progress', 'waiting_client', 'completed', 'closed') DEFAULT 'open',
    assigned_to INT,
    resolved_at DATETIME,
    rating TINYINT,
    rating_comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE SET NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE SET NULL,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_tickets_number (ticket_number),
    INDEX idx_tickets_client (client_id),
    INDEX idx_tickets_status (status),
    INDEX idx_tickets_priority (priority),
    INDEX idx_tickets_assigned (assigned_to)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 20. TICKET_REPLIES TABLE
-- ======================================================
CREATE TABLE ticket_replies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ticket_id INT NOT NULL,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_internal BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (ticket_id) REFERENCES support_tickets(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_ticket_replies_ticket (ticket_id),
    INDEX idx_ticket_replies_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 21. TICKET_ATTACHMENTS TABLE
-- ======================================================
CREATE TABLE ticket_attachments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ticket_id INT NOT NULL,
    reply_id INT,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_size INT,
    file_type VARCHAR(100),
    uploaded_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ticket_id) REFERENCES support_tickets(id) ON DELETE CASCADE,
    FOREIGN KEY (reply_id) REFERENCES ticket_replies(id) ON DELETE SET NULL,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_attachments_ticket (ticket_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 22. CONTACT_MESSAGES TABLE
-- ======================================================
CREATE TABLE contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(255),
    subject VARCHAR(255),
    service_needed VARCHAR(100),
    budget VARCHAR(50),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied', 'archived') DEFAULT 'new',
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_contact_messages_email (email),
    INDEX idx_contact_messages_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 23. NEWSLETTER_SUBSCRIBERS TABLE
-- ======================================================
CREATE TABLE newsletter_subscribers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    verification_token VARCHAR(100),
    verified_at DATETIME,
    unsubscribed_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_newsletter_email (email),
    INDEX idx_newsletter_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 24. PRICING_PLANS TABLE
-- ======================================================
CREATE TABLE pricing_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    type ENUM('monthly', 'onetime') DEFAULT 'monthly',
    price DECIMAL(10,2),
    currency VARCHAR(3) DEFAULT 'USD',
    description TEXT,
    features TEXT,
    is_popular BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_pricing_slug (slug),
    INDEX idx_pricing_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 25. CAREER_OPENINGS TABLE
-- ======================================================
CREATE TABLE career_openings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    department VARCHAR(100),
    location VARCHAR(255),
    employment_type VARCHAR(50),
    salary_range VARCHAR(100),
    description TEXT,
    requirements TEXT,
    benefits TEXT,
    status ENUM('open', 'closed', 'draft') DEFAULT 'draft',
    is_urgent BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_careers_slug (slug),
    INDEX idx_careers_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 26. JOB_APPLICATIONS TABLE
-- ======================================================
CREATE TABLE job_applications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    opening_id INT NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    current_location VARCHAR(255),
    experience_years TINYINT,
    portfolio_url VARCHAR(255),
    message TEXT,
    resume_path VARCHAR(255),
    cover_letter_path VARCHAR(255),
    status ENUM('new', 'reviewing', 'shortlisted', 'interview', 'offer', 'hired', 'rejected') DEFAULT 'new',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (opening_id) REFERENCES career_openings(id) ON DELETE CASCADE,
    INDEX idx_job_applications_email (email),
    INDEX idx_job_applications_status (status),
    INDEX idx_job_applications_opening (opening_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 27. INVOICES TABLE
-- ======================================================
CREATE TABLE invoices (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    project_id INT,
    invoice_number VARCHAR(50) NOT NULL UNIQUE,
    issue_date DATE NOT NULL,
    due_date DATE NOT NULL,
    subtotal DECIMAL(15,2) NOT NULL,
    tax DECIMAL(15,2) DEFAULT 0.00,
    total DECIMAL(15,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'USD',
    status ENUM('pending', 'paid', 'overdue', 'cancelled') DEFAULT 'pending',
    payment_method VARCHAR(50),
    payment_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE SET NULL,
    INDEX idx_invoices_client (client_id),
    INDEX idx_invoices_status (status),
    INDEX idx_invoices_number (invoice_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 28. INVOICE_ITEMS TABLE
-- ======================================================
CREATE TABLE invoice_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    invoice_id INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    quantity INT DEFAULT 1,
    unit_price DECIMAL(15,2) NOT NULL,
    total DECIMAL(15,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE,
    INDEX idx_invoice_items_invoice (invoice_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 29. NOTIFICATIONS TABLE
-- ======================================================
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    type VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    link VARCHAR(255),
    is_read BOOLEAN DEFAULT FALSE,
    read_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_notifications_user (user_id),
    INDEX idx_notifications_read (is_read)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 30. ACTIVITY_LOGS TABLE
-- ======================================================
CREATE TABLE activity_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    action VARCHAR(255) NOT NULL,
    model_type VARCHAR(100),
    model_id INT,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_activity_logs_user (user_id),
    INDEX idx_activity_logs_model (model_type, model_id),
    INDEX idx_activity_logs_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 31. SETTINGS TABLE
-- ======================================================
CREATE TABLE settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    group_name VARCHAR(100) NOT NULL,
    key_name VARCHAR(100) NOT NULL,
    value TEXT,
    description TEXT,
    is_public BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_setting (group_name, key_name),
    INDEX idx_settings_group (group_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 32. SESSIONS TABLE
-- ======================================================
CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id INT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    payload LONGTEXT,
    last_activity INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_sessions_user (user_id),
    INDEX idx_sessions_last_activity (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 33. BACKUP_LOGS TABLE
-- ======================================================
CREATE TABLE backup_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL,
    file_size BIGINT,
    type ENUM('full', 'database', 'files') DEFAULT 'full',
    status ENUM('pending', 'running', 'completed', 'failed') DEFAULT 'pending',
    notes TEXT,
    started_at DATETIME,
    completed_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 34. TESTIMONIALS TABLE
-- ======================================================
CREATE TABLE testimonials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    name VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    position VARCHAR(100),
    avatar VARCHAR(255),
    content TEXT NOT NULL,
    rating TINYINT DEFAULT 5,
    is_approved BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE SET NULL,
    INDEX idx_testimonials_approved (is_approved)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- 35. FAQS TABLE
-- ======================================================
CREATE TABLE faqs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(100),
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    display_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_faqs_active (is_active),
    INDEX idx_faqs_category (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Insert default settings
-- ======================================================
INSERT INTO settings (group_name, key_name, value, description) VALUES
('general', 'site_name', 'DonutsTec', 'Website name'),
('general', 'site_tagline', 'Transforming Ideas into Digital Solutions', 'Site tagline'),
('general', 'site_description', 'DonutsTec helps businesses grow through custom software development, websites, mobile applications, cloud solutions, UI/UX design, and IT consulting.', 'Site description'),
('general', 'admin_email', 'admin@donutstec.com', 'Admin email address'),
('general', 'site_url', 'https://donutstec.com', 'Website URL'),
('seo', 'default_meta_title', 'DonutsTec - Software Development Company', 'Default meta title'),
('seo', 'default_meta_description', 'DonutsTec is a leading software development company offering custom software, web development, mobile apps, cloud solutions, and IT consulting services.', 'Default meta description'),
('email', 'smtp_host', 'smtp.gmail.com', 'SMTP server host'),
('email', 'smtp_port', '587', 'SMTP server port'),
('email', 'smtp_username', 'noreply@donutstec.com', 'SMTP username'),
('email', 'from_email', 'hello@donutstec.com', 'Default from email'),
('email', 'from_name', 'DonutsTec', 'Default from name'),
('security', 'max_login_attempts', '5', 'Maximum login attempts before lockout'),
('security', 'lockout_duration', '30', 'Lockout duration in minutes'),
('security', 'session_timeout', '60', 'Session timeout in minutes'),
('security', 'csrf_protection', 'enabled', 'CSRF protection status'),
('system', 'maintenance_mode', 'disabled', 'Maintenance mode status'),
('system', 'debug_mode', 'disabled', 'Debug mode status'),
('system', 'cache_enabled', 'enabled', 'Cache system status'),
('system', 'activity_logs_enabled', 'enabled', 'Activity logs status');

-- ======================================================
-- Create indexes for performance
-- ======================================================
-- Additional indexes for common queries
CREATE INDEX idx_users_created ON users(created_at);
CREATE INDEX idx_projects_created ON projects(created_at);
CREATE INDEX idx_projects_due_date ON projects(due_date);
CREATE INDEX idx_tickets_created ON support_tickets(created_at);
CREATE INDEX idx_invoices_created ON invoices(created_at);
CREATE INDEX idx_blog_posts_created ON blog_posts(created_at);
CREATE INDEX idx_contact_messages_created ON contact_messages(created_at);

-- ======================================================
-- Create views for common queries
-- ======================================================

-- View: Active projects with client info
CREATE VIEW view_active_projects AS
SELECT 
    p.id,
    p.name,
    p.status,
    p.progress,
    p.due_date,
    c.company_name AS client_company,
    c.contact_person AS client_contact,
    u.first_name,
    u.last_name
FROM projects p
LEFT JOIN clients c ON p.client_id = c.id
LEFT JOIN project_team pt ON p.id = pt.project_id
LEFT JOIN users u ON pt.user_id = u.id
WHERE p.status IN ('active', 'inprogress');

-- View: Ticket summary
CREATE VIEW view_ticket_summary AS
SELECT 
    t.id,
    t.ticket_number,
    t.subject,
    t.status,
    t.priority,
    c.company_name AS client_company,
    u.first_name AS assigned_first,
    u.last_name AS assigned_last,
    t.created_at,
    COUNT(tr.id) AS reply_count
FROM support_tickets t
LEFT JOIN clients c ON t.client_id = c.id
LEFT JOIN users u ON t.assigned_to = u.id
LEFT JOIN ticket_replies tr ON t.id = tr.ticket_id
GROUP BY t.id;

-- View: Revenue by month
CREATE VIEW view_monthly_revenue AS
SELECT 
    DATE_FORMAT(issue_date, '%Y-%m') AS month,
    SUM(total) AS total_revenue,
    COUNT(*) AS invoice_count
FROM invoices
WHERE status = 'paid'
GROUP BY DATE_FORMAT(issue_date, '%Y-%m')
ORDER BY month DESC;

-- View: User roles summary
CREATE VIEW view_user_roles AS
SELECT 
    r.name AS role_name,
    COUNT(u.id) AS user_count,
    SUM(CASE WHEN u.is_active = 1 THEN 1 ELSE 0 END) AS active_count
FROM roles r
LEFT JOIN users u ON r.id = u.role_id
GROUP BY r.id;

-- ======================================================
-- Sample data insertion for testing
-- ======================================================

-- Insert sample roles (already inserted above)

-- Insert sample users (password: password123)
-- Note: In production, use proper password hashing
INSERT INTO users (role_id, first_name, last_name, email, password_hash, is_verified, is_active) VALUES
(1, 'Admin', 'User', 'admin@donutstec.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1),
(5, 'John', 'Doe', 'john@techcorp.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1),
(5, 'Sarah', 'Smith', 'sarah@healthplus.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1),
(3, 'Mike', 'Johnson', 'mike@edutech.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1),
(4, 'Emily', 'Chen', 'emily@datacorp.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1),
(5, 'Robert', 'Wilson', 'robert@startupx.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1);

-- Insert sample clients
INSERT INTO clients (user_id, company_name, contact_person, email, phone, industry, status) VALUES
(2, 'TechCorp GmbH', 'John Doe', 'john@techcorp.com', '+49 30 1234567', 'Technology', 'active'),
(3, 'HealthPlus', 'Sarah Smith', 'sarah@healthplus.com', '+49 30 7654321', 'Healthcare', 'active'),
(4, 'EduTech', 'Mike Johnson', 'mike@edutech.com', '+49 30 9876543', 'Education', 'active'),
(5, 'DataCorp', 'Emily Chen', 'emily@datacorp.com', '+49 30 4567890', 'Analytics', 'active'),
(6, 'StartupX', 'Robert Wilson', 'robert@startupx.com', '+49 30 7890123', 'Technology', 'active');

-- Insert sample services
INSERT INTO services (name, slug, icon, short_description, is_active) VALUES
('Custom Software Development', 'custom-software', 'fa-laptop-code', 'Tailored enterprise solutions for your business', 1),
('Website Development', 'website-development', 'fa-globe', 'Modern, responsive websites that convert', 1),
('E-Commerce Solutions', 'e-commerce', 'fa-shopping-cart', 'Scalable online stores with payment integration', 1),
('Mobile App Development', 'mobile-apps', 'fa-mobile-alt', 'Native iOS and Android applications', 1),
('UI/UX Design', 'ui-ux-design', 'fa-paint-brush', 'User-centric interfaces that delight users', 1),
('API Development', 'api-development', 'fa-plug', 'RESTful and GraphQL API solutions', 1),
('Database Design', 'database-design', 'fa-database', 'Efficient data architecture and optimization', 1),
('Cloud Solutions', 'cloud-solutions', 'fa-cloud', 'Scalable cloud infrastructure and migration', 1),
('AI Solutions', 'ai-solutions', 'fa-robot', 'Intelligent automation and machine learning', 1),
('Business Automation', 'business-automation', 'fa-cogs', 'Workflow and process automation', 1),
('Cybersecurity', 'cybersecurity', 'fa-shield-alt', 'Security audits and protection services', 1),
('SEO Optimization', 'seo-optimization', 'fa-search', 'Rank higher and grow your traffic', 1);

-- Sample projects
INSERT INTO projects (client_id, name, slug, status, progress, due_date) VALUES
(1, 'E-Commerce Platform', 'e-commerce-platform', 'inprogress', 75, '2025-06-30'),
(2, 'Healthcare Portal', 'healthcare-portal', 'completed', 100, '2025-05-10'),
(3, 'School Management System', 'school-management', 'active', 30, '2025-08-15');

-- Sample blog categories
INSERT INTO blog_categories (name, slug) VALUES
('AI & Machine Learning', 'ai-machine-learning'),
('Cloud Computing', 'cloud-computing'),
('Software Development', 'software-development'),
('UX Design', 'ux-design'),
('Cybersecurity', 'cybersecurity');

-- Sample blog tags
INSERT INTO blog_tags (name, slug) VALUES
('AI', 'ai'),
('Cloud', 'cloud'),
('DevOps', 'devops'),
('React', 'react'),
('Node.js', 'nodejs'),
('Security', 'security'),
('UX', 'ux'),
('Design', 'design');

-- Sample blog posts
INSERT INTO blog_posts (category_id, author_id, title, slug, excerpt, content, status, is_featured, published_at) VALUES
(1, 1, 'AI in Software Development', 'ai-in-software-development', 'How artificial intelligence is transforming software development', '<p>Full content here...</p>', 'published', 1, NOW()),
(2, 1, 'Cloud Migration Strategy', 'cloud-migration-strategy', 'Best practices for migrating legacy systems to the cloud', '<p>Full content here...</p>', 'published', 0, NOW());

-- Sample pricing plans
INSERT INTO pricing_plans (name, slug, type, price, description, features, is_popular) VALUES
('Starter', 'starter', 'monthly', 499, 'Perfect for small businesses', 'Small websites (up to 5 pages)\nBasic support (email)\n5 GB storage', 0),
('Business', 'business', 'monthly', 1299, 'For growing companies', 'Dynamic websites (unlimited pages)\nCustom CMS integration\nAdmin dashboard\n50 GB storage\n24/7 priority support', 1),
('Enterprise', 'enterprise', 'monthly', NULL, 'Custom solutions for large organizations', 'Custom software development\nERP & mobile apps\nAPI integration\nUnlimited storage\nDedicated team', 0);

-- Sample support tickets
INSERT INTO support_tickets (client_id, user_id, ticket_number, subject, category, priority, status) VALUES
(1, 2, 'T-2025-001', 'Website Update Request', 'website_update', 'high', 'in_progress'),
(2, 3, 'T-2025-002', 'Bug Report - Login Issue', 'bug_report', 'critical', 'waiting_client');

-- Sample invoices
INSERT INTO invoices (client_id, project_id, invoice_number, issue_date, due_date, subtotal, tax, total, status) VALUES
(1, 1, 'INV-2025-001', '2025-06-01', '2025-06-30', 12500, 0, 12500, 'pending'),
(2, 2, 'INV-2025-003', '2025-04-10', '2025-05-10', 15000, 0, 15000, 'paid');

-- Sample invoice items
INSERT INTO invoice_items (invoice_id, description, quantity, unit_price, total) VALUES
(1, 'E-Commerce Platform Development - Phase 2', 1, 12500, 12500),
(2, 'Healthcare Portal Development', 1, 15000, 15000);

-- Sample testimonials
INSERT INTO testimonials (client_id, name, company, content, rating, is_approved) VALUES
(1, 'John Doe', 'TechCorp', 'DonutsTec delivered our platform ahead of schedule. Exceptional quality.', 5, 1),
(2, 'Sarah Smith', 'HealthPlus', 'Incredible UX and smooth deployment. Our users love it.', 5, 1);

-- Sample FAQ
INSERT INTO faqs (category, question, answer, is_active) VALUES
('general', 'What services does DonutsTec offer?', 'DonutsTec offers custom software development, website development, e-commerce solutions, mobile app development, UI/UX design, and more.', 1),
('account', 'How do I create an account?', 'You can create an account by clicking the "Client Login" button and selecting "Register".', 1),
('billing', 'What payment methods do you accept?', 'We accept all major credit cards, PayPal, and bank transfers.', 1);