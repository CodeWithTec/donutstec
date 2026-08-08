<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top ">
    <div class="container">

        <!-- Logo -->
        <!-- Image and text -->
  <a class="navbar-brand" href="/">
    <img src="assets/images/logo.png" width="35" height="35" class="d-inline-block align-top" alt="DonutsTec Logo">
    Donuts<span class="text-primary">Tec</span>
  </a>

        <!-- Mobile Toggle -->

        <button class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu"
                aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

</button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/') echo 'active'; ?>" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/about') echo 'active'; ?>" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/services') echo 'active'; ?>" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/portfolio') echo 'active'; ?>" href="/portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/pricing') echo 'active'; ?>" href="/pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/blog') echo 'active'; ?>" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/careers') echo 'active'; ?>" href="/careers">Careers</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/support') echo 'active'; ?>" href="/support">Support</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/contact') echo 'active'; ?>" href="/contact">Contact</a></li>
            </ul>

            <!-- Right Buttons -->
            <div class="d-flex gap-2">
                <a href="/clientlogin" class="btn btn-primary btn-login">
                    Client Sign Up
                </a>

                <!-- <a href="/signup" class="btn btn-primary btn-signup">
                    Sign Up
                </a> -->
            </div>

        </div>

    </div>
</nav>

<!-- Mobile Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-primary">
            DonutsTec
        </h5>

        <button type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas">
        </button>
    </div>

    <div class="offcanvas-body">

        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/') echo 'active'; ?>" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/about') echo 'active'; ?>" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/services') echo 'active'; ?>" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/portfolio') echo 'active'; ?>" href="/portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/pricing') echo 'active'; ?>" href="/pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/blog') echo 'active'; ?>" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/careers') echo 'active'; ?>" href="/careers">Careers</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/support') echo 'active'; ?>" href="/support">Support</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/contact') echo 'active'; ?>" href="/contact">Contact</a></li>
        </ul>

        <hr>

        <div class="d-grid gap-2">
            <a href="/clientlogin" class="btn btn-outline-primary">
                Client Sign Up
            </a>
<!-- 
            <a href="/signup" class="btn btn-primary">
                Sign Up
            </a> -->
        </div>

    </div>

</div>