 <!-- Navbar -->
 <?php
// Get the current page name
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>
   <nav class="navbar navbar-expand-xl" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <div class="brand-logo">RW</div>
                <div class="brand-text">
                    <span class="brand-name">RW William</span>
                    <span class="brand-sub"> Bridging Your Business</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="desktop-nav d-none d-xl-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'about') ? 'active' : '' ?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'services') ? 'active' : '' ?>" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'team') ? 'active' : '' ?>" href="team.php">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'gallery') ? 'active' : '' ?>" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'clients') ? 'active' : '' ?>" href="clients.php">Our Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'news-announcement') ? 'active' : '' ?>" href="news-announcement.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'careers') ? 'active' : '' ?>" href="careers.php">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contacts') ? 'active' : '' ?>" href="contacts.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Country
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">🇲🇾 Malaysia</a></li>
                            <li><a class="dropdown-item" href="#">🇹🇭 Thailand</a></li>
                            <li><a class="dropdown-item" href="#">🇸🇬 Singapore</a></li>
                            <li><a class="dropdown-item" href="#">🇮🇩 Jakarta</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Mobile Toggle (Right Side) -->
            <button class="navbar-toggler d-xl-none ms-auto" type="button" id="mobileToggle">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay" id="mobileOverlay"></div>
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <div class="brand-logo-m">RW</div>
            <div class="brand-info">
                <h5>RW William</h5>
                <span>Bridging Your Business</span>
            </div>
            <button id="mobileCloseBtn" class="mobile-menu-close" type="button" aria-label="Close menu"><i
                    class="bi bi-x-lg"></i></button>
        </div>
        <nav class="mobile-menu-nav">
            <a href="index.php" class="mobile-nav-link">Home <i class="bi bi-chevron-right"></i></a>
            <a href="about.php" class="mobile-nav-link">About Us <i class="bi bi-chevron-right"></i></a>
            <a href="services.php" class="mobile-nav-link">Services <i class="bi bi-chevron-right"></i></a>
            <a href="team.php" class="mobile-nav-link">Our Team <i class="bi bi-chevron-right"></i></a>
            <a href="gallery.php" class="mobile-nav-link">Gallery <i class="bi bi-chevron-right"></i></a>
            <a href="clients.php" class="mobile-nav-link">Our Client <i class="bi bi-chevron-right"></i></a>
             <a href="news-announcement.php" class="mobile-nav-link">News<i class="bi bi-chevron-right"></i></a>
            <a href="careers.php" class="mobile-nav-link">Career <i class="bi bi-chevron-right"></i></a>
            <a href="contact.php" class="mobile-nav-link">Contact <i class="bi bi-chevron-right"></i></a>
            <a href="#" class="mobile-nav-link" id="countryToggle">Country <i class="bi bi-chevron-down"></i></a>
            <div class="mobile-submenu" id="countrySubmenu">
                <a href="#">🇲🇾 Malaysia</a>
                <a href="#">🇹🇭 Thailand</a>
                <a href="#">🇸🇬 Singapore</a>
                <a href="#">🇮🇩 Jakarta</a>
            </div>
        </nav>
        <div class="mobile-menu-footer">
            <div class="social-icons mb-3">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
            <p>&copy; 2026 RW William PLT. All rights reserved.</p>
        </div>
    </div>