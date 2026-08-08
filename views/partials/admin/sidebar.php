 
 
 <div class="col-lg-2 col-md-3 px-0 sidebar d-none d-md-block vh-100 overflow-hidden">
                <div class="brand"><span>Donuts</span>Tec</div>
                <nav class="nav flex-column sidebar-sticky">
                    <div class="position-sticky">
                    <a href="/admin/dashboard" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/dashboard') echo 'active'; ?>"><i class="fas fa-chart-pie"></i>Dashboard</a>
                    <a href="/admin/clients" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/clients') echo 'active'; ?> "><i class="fas fa-users"></i>Clients</a>
                    <a href="/admin/projects" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/projects') echo 'active'; ?>"><i class="fas fa-project-diagram"></i>Projects</a>
                    <a href="/admin/support-tickets" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/support-tickets') echo 'active'; ?>"><i class="fas fa-ticket-alt"></i>Support Tickets</a>
                    <a href="/admin/blog" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/blog') echo 'active'; ?>"><i class="fas fa-newspaper"></i>Blog <span class="badge bg-primary">12</span></a>
                    <a href="/admin/invoices" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/invoices') echo 'active'; ?>"><i class="fas fa-file-invoice"></i>Invoices</a>
                    <a href="/admin/messages" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/messages') echo 'active'; ?>"><i class="fas fa-envelope"></i>Messages</a>
                    <a href="/admin/users" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/users') echo 'active'; ?>"><i class="fas fa-user-cog"></i>Users</a>
                    <a href="/admin/settings" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/admin/settings') echo 'active'; ?>"><i class="fas fa-cog"></i>Settings</a>
                    <a href="/admin/logout" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </nav>
            </div>
 