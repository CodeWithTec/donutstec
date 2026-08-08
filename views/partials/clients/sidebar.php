   <div class="col-lg-2 col-md-3 px-0 sidebar d-none d-md-block">
                <div class="brand"><span>Donuts</span>Tec</div>
                <div class="user-card d-flex align-items-center gap-3">
                    <img src="https://via.placeholder.com/44" alt="User" />
                    <div>
                        <div class="name">John Doe</div>
                        <div class="role">Client</div>
                    </div>
                </div>
                <nav class="nav flex-column">
                    <a href="/clients/dashboard" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/dashboard') echo 'active'; ?>"><i class="fas fa-chart-pie"></i>Dashboard</a>
                    <a href="/clients/projects" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/projects') echo 'active'; ?>"><i class="fas fa-project-diagram"></i>Projects <span class="badge bg-primary">4</span></a>
                    <a href="/clients/tickets" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/tickets') echo 'active'; ?>"><i class="fas fa-ticket-alt"></i>Support Tickets <span class="badge bg-danger">3</span></a>
                    <a href="/clients/notifications" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/notifications') echo 'active'; ?>"><i class="fas fa-bell"></i>Notifications <span class="badge bg-danger">6</span></a>
                    <a href="/clients/invoices" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/invoices') echo 'active'; ?>"><i class="fas fa-file-invoice"></i>Invoices</a>
                    <a href="/clients/profile" class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/clients/profile') echo 'active'; ?>"><i class="fas fa-user-cog"></i>Profile Settings</a>
                    <a href="/clients/logout" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </nav>
            </div>