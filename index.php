<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RW William PLT | Chartered Accountants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">

</head>

<body>

	<?php include_once('includes/navbar.php'); ?>

   
	<?php
	$banner_sql = "SELECT * FROM banner WHERE status='Active' ORDER BY sort";
	$banner_result = mysqli_query($conn, $banner_sql);
	?>

    <!-- ===== FULLSCREEN HERO SLIDER ===== -->
	<section class="hero-slider" id="heroSlider">

		<?php 
		$first = true;
		$i = 0;

		while($banner = mysqli_fetch_assoc($banner_result)) { 

		$title = $banner['title'];
		$highlight = $banner['title_highlight'];

		if(!empty($highlight)){
			$title = str_replace($highlight, "<span>$highlight</span>", $title);
		}
		?>

		<div class="hero-slide <?php if($first){ echo 'active'; } ?>">

			<div class="hero-slide-bg" style="background-image: url('<?php echo "admin/".$banner['image']; ?>');"></div>

			<div class="hero-slide-overlay"></div>

			<div class="hero-slide-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">

							<?php if(!empty($banner['label_badge'])){ ?>
							<div class="hero-label">
								<i class="bi bi-shield-check"></i> <?php echo $banner['label_badge']; ?>
							</div>
							<?php } ?>

							<h1 class="hero-title"><?php echo $title; ?></h1>

							<p class="hero-desc">
								<?php echo $banner['description']; ?>
							</p>

							<div class="hero-btns">

								<?php if(!empty($banner['button_text_one'])){ ?>
								<a href="<?php echo $banner['button_link_one']; ?>" class="btn-hero btn-hero-primary">
									<?php echo $banner['button_text_one']; ?> <i class="bi bi-arrow-right"></i>
								</a>
								<?php } ?>

								<?php if(!empty($banner['button_text_two'])){ ?>
								<a href="<?php echo $banner['button_link_two']; ?>" class="btn-hero btn-hero-outline">
									<?php echo $banner['button_text_two']; ?>
								</a>
								<?php } ?>

							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<?php 
		$first = false;
		$i++;
		} 
		?>

		<!-- DOTS -->
		<div class="hero-dots" id="heroDots">

		<?php
		for($d=0; $d<$i; $d++){
		?>
		<div class="hero-dot <?php if($d==0){ echo 'active'; } ?>" data-slide="<?php echo $d; ?>"></div>
		<?php
		}
		?>

		</div>

		<div class="hero-arrows">
			<div class="hero-arrow" id="heroPrev"><i class="bi bi-chevron-left"></i></div>
			<div class="hero-arrow" id="heroNext"><i class="bi bi-chevron-right"></i></div>
		</div>
		<div class="hero-scroll">
			<div class="scroll-line"></div> Scroll
		</div>
		<div class="hero-stats">
			<div class="hero-stat">
				<div class="hero-stat-num">23+</div>
				<div class="hero-stat-label">Years</div>
			</div>
			<div class="hero-stat">
				<div class="hero-stat-num">2.5K+</div>
				<div class="hero-stat-label">Clients</div>
			</div>
			<div class="hero-stat">
				<div class="hero-stat-num">80+</div>
				<div class="hero-stat-label">Team</div>
			</div>
		</div>

		</section>
	
    
    <!-- ===== ANNOUNCEMENTS ===== -->
    <section class="announcement-section" id="announcements">
        <div class="container">
            
			<div class="row align-items-end mb-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="announcement-badge"><i class="bi bi-megaphone-fill"></i> Latest Updates</div>
                    <h2 class="section-title">Announcements &amp; News</h2>
                    <p>Stay informed with the latest updates, regulatory changes, and news from RW William PLT.</p>
                </div>

                <div class="col-lg-5 text-lg-end" data-aos="fade-left">
                    <a href="news-announcement.php" class="btn-rw-outline" style="border-color:var(--rw-primary);color:var(--rw-primary);padding:10px 28px;font-size:13px">View
                        All Announcements <i class="bi bi-arrow-right ms-1"></i></a>
                </div>

            </div>
			
            <div class="row g-4">
               <?php 
					$i=100;
					$view_img="";
					$result = mysqli_query($conn,"select * from news where status = 'Active' order by newsID desc");
						while($row = mysqli_fetch_assoc($result)){
							if($row['image']!="")
							{
								$image = "admin/".$row['image'];
								$view_img = "<img src='$image' alt='Playgroup' class='img-fluid'>";
							}
							
					?>
					   <div class="col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="<?php echo $i;?>">
							<div class="card program-card">
								<div class="program-image">
									<?php echo $view_img;?><br/>
									<div class="announcement-date-badge"><i class="bi bi-calendar3 me-1"></i> <?php echo date('d-m-Y',strtotime($row['publish_date']));?></div>
								</div>
								<div class="announcement-body">
									<h4><?php echo $row['title'];?></h4>
									<p><?php echo substr(strip_tags($row['description']), 0, 200) . "..."; ?></p>
									<a href="news-details.php?newsID=<?php echo $row['newsID'];?>" class="btn-hero btn-hero-primary" style="padding:12px 30px;font-size:13px">Read More <i class="bi bi-arrow-right"></i></a>
								</div>
							</div>
						</div>
					<?php
					$i = $i+100;
					}
					?>
			</div>
            <!-- Announcement cards - dynamic from backend via JS -->

        </div>
    </section>

    <!-- ===== ABOUT PREVIEW ===== -->
    <section class="about-preview">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="about-img-stack">

                        <div class="about-img-main">
                            <img src="img/team/richard.jpg" alt="richard" width="100%">
                            <div class="img-text">
                                <h3>RW William PLT</h3>
                                <span>Est. 2003 &bull; Petaling Jaya</span>
                            </div>
                        </div>
                        <div class="about-float-card">
                            <div class="float-num">23+</div>
                            <div class="float-label">Years of Excellence</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5" data-aos="fade-left">
                    <div class="section-label">Who We Are</div>
                    <h2 class="section-title">A Legacy of Professional Excellence Since 2003</h2>
                    <p style="font-size:16px">RW William was formed in Petaling Jaya as a chartered accounting firm,
                        stemming from the vision of founder Mr. Richard William to provide a higher standard of services
                        and large-firm expertise to businesses of every size.</p>
                    <p style="font-size:16px">Today, the RW William Network spans 7 offices across Malaysia with 50+
                        dedicated professionals serving over 2,000 clients.</p>
                    <div class="d-flex flex-wrap gap-4 mt-4 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div
                                style="width:48px;height:48px;background:var(--rw-primary-light);border-radius:12px;display:flex;align-items:center;justify-content:center">
                                <i class="bi bi-patch-check-fill" style="color:var(--rw-primary);font-size:22px"></i>
                            </div>
                            <div><strong style="font-size:15px;color:var(--rw-accent)">MIA Approved</strong><br><span
                                    style="font-size:12px;color:var(--rw-text-light)">AF 1490</span></div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div
                                style="width:48px;height:48px;background:var(--rw-primary-light);border-radius:12px;display:flex;align-items:center;justify-content:center">
                                <i class="bi bi-building-check" style="color:var(--rw-primary);font-size:22px"></i>
                            </div>
                            <div><strong style="font-size:15px;color:var(--rw-accent)">LLP Registered</strong><br><span
                                    style="font-size:12px;color:var(--rw-text-light)">LLP0022270-LCA</span></div>
                        </div>
                    </div>
                    <a href="about.php" class="btn-hero btn-hero-primary"
                        style="padding:12px 30px;font-size:13px">Learn More About Us <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES PREVIEW ===== -->
    <section class="services-preview">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label justify-content-center" data-aos="fade-up">What We Do</div>
                <h2 class="section-title" data-aos="fade-up">Our Core Services</h2>
                <p class="mx-auto" style="max-width:550px" data-aos="fade-up">Unaudited and Technical training services
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="50"><a
                        href="services.php#audit" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-shield-check"></i></div>
                        <h5>Audit &amp; Assurance</h5>
                        <p>Statutory &amp; internal audits</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100"><a
                        href="services.php#taxation" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-percent"></i></div>
                        <h5>Taxation</h5>
                        <p>Strategic tax planning</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150"><a
                        href="services.php#accounting" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-calculator"></i></div>
                        <h5>Accounting &amp; E-Invoicing</h5>
                        <p>Full accounting solutions</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200"><a
                        href="services.php#corporate" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-briefcase"></i></div>
                        <h5>Corporate Services</h5>
                        <p>Incorporation &amp; secretarial</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="50"><a href="services.php#sst"
                        class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <h5>SST Advisory</h5>
                        <p>Sales &amp; service tax</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100"><a
                        href="services.php#mbrs" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-database-check"></i></div>
                        <h5>MBRS Conversion</h5>
                        <p>XBRL compliance</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150"><a
                        href="services.php#liquidation" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-building-down"></i></div>
                        <h5>Liquidation</h5>
                        <p>Winding up services</p>
                    </a></div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200"><a
                        href="services.php#payroll" class="sp-card d-block">
                        <div class="sp-icon"><i class="bi bi-wallet2"></i></div>
                        <h5>Payroll Services</h5>
                        <p>Complete payroll management</p>
                    </a></div>
            </div>
            <div class="text-center mt-5" data-aos="fade-up"><a href="services.php" class="btn-hero btn-hero-primary"
                    style="padding:12px 32px;font-size:13px;background:var(--rw-accent);border-color:var(--rw-accent)">View
                    All 10 Services <i class="bi bi-arrow-right"></i></a></div>
        </div>
    </section>

    <!-- ===== WHY CHOOSE US ===== -->
    <section class="why-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label justify-content-center" style="color:rgba(255,255,255,.5)" data-aos="fade-up">
                    <span style="background:rgba(255,255,255,.3)"></span>Why RW William
                </div>
                <h2 class="section-title" style="color:white" data-aos="fade-up">Why Clients Trust Us</h2>
                <p style="color:rgba(255,255,255,.5);max-width:550px" class="mx-auto" data-aos="fade-up">Built on
                    integrity, driven by excellence — here's what sets us apart.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="why-card">
                        <div class="why-icon"><i class="bi bi-award"></i></div>
                        <h5>23+ Years Expertise</h5>
                        <p>Two decades of chartered accounting excellence and deep industry knowledge.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-card">
                        <div class="why-icon"><i class="bi bi-geo-alt"></i></div>
                        <h5>6 Nationwide Offices</h5>
                        <p>Strategic locations across PJ, Klang, Ipoh, Seremban, JB, Penang and more.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="why-card">
                        <div class="why-icon"><i class="bi bi-people"></i></div>
                        <h5>80+ Professionals</h5>
                        <p>Skilled, dedicated team across audit, tax, accounting, and advisory verticals.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="why-card">
                        <div class="why-icon"><i class="bi bi-globe2"></i></div>
                        <h5>Regional Network</h5>
                        <p>Cross-border presence in Malaysia, Thailand, Singapore, and Jakarta.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CLIENT MARQUEE ===== -->
    <section class="client-marquee">
        <div class="marquee-track" id="clientMarquee"></div>
    </section>

    <!-- ===== OFFICES ===== -->
    <section class="offices-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="section-label">Our Offices</div>
                    <h2 class="section-title">RW William Network</h2>
                    <p>Strategically located to serve clients across Malaysia and beyond.</p>
                    <a href="contact.php" class="btn-hero btn-hero-primary mt-2"
                        style="padding:12px 28px;font-size:13px">Contact Us <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="d-flex flex-wrap justify-content-lg-end">

                        <a href="contact.php#petalingjaya" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Petaling Jaya</h6><span>Headquarters</span>
                                </div>
                            </div>
                        </a>

                        <a href="contact.php#klang" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Klang</h6><span>Branch Office</span>
                                </div>
                            </div>
                        </a>

                        <a href="contact.php#ipoh" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Ipoh</h6><span>Branch Office</span>
                                </div>
                            </div>
                        </a>

                        <a href="contact.php#seremban" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Seremban</h6><span>Branch Office</span>
                                </div>
                            </div>
                        </a>

                        <a href="contact.php#johorbahru" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Johor Bahru</h6><span>Branch Office</span>
                                </div>
                            </div>
                        </a>

                        <a href="contact.php#perai" class="text-decoration-none">
                            <div class="office-pill">
                                <div class="op-icon"><i class="bi bi-building"></i></div>
                                <div class="op-info">
                                    <h6>Perai, Penang</h6><span>Branch Office</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2>Ready to Work With Us?</h2>
                    <p class="mb-0">Let us help your business grow with our comprehensive range of professional
                        accounting services.</p>
                </div>
                <div class="col-lg-5 text-lg-end" data-aos="fade-left"><a href="contact.php"
                        class="btn-rw-white me-2 mb-2">Get in Touch</a><a href="career.php"
                        class="btn-rw-outline mb-2">Join Our Team</a></div>
            </div>
        </div>
    </section>

   <?php include_once('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });

        // ===== HERO SLIDER =====
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.hero-dot');
        let currentSlide = 0, sliderInterval;
        function goToSlide(n) { slides[currentSlide].classList.remove('active'); dots[currentSlide].classList.remove('active'); currentSlide = (n + slides.length) % slides.length; slides[currentSlide].classList.add('active'); dots[currentSlide].classList.add('active') }
        function nextSlide() { goToSlide(currentSlide + 1) }
        function startSlider() { sliderInterval = setInterval(nextSlide, 6000) }
        function resetSlider() { clearInterval(sliderInterval); startSlider() }
        document.getElementById('heroNext').addEventListener('click', () => { nextSlide(); resetSlider() });
        document.getElementById('heroPrev').addEventListener('click', () => { goToSlide(currentSlide - 1); resetSlider() });
        dots.forEach(d => d.addEventListener('click', () => { goToSlide(parseInt(d.dataset.slide)); resetSlider() }));
        startSlider();

        // ===== TRANSPARENT NAVBAR ON SCROLL =====
        const navbar = document.getElementById('mainNavbar');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 100) { navbar.classList.remove('hero-mode'); navbar.classList.add('scrolled') }
            else { navbar.classList.add('hero-mode'); navbar.classList.remove('scrolled') }
        });

        // ===== ANNOUNCEMENTS (Dynamic from Backend) =====
        // This array simulates data coming from your backend API/CMS.
        // Replace this with a fetch() call to your actual backend endpoint.

        // ===== CLIENT MARQUEE =====
        const clients = ["Asia Propel Sdn. Bhd.", "Butter & Olive Group", "Hankyu Hanshin Group", "MC Mitra Sdn. Bhd.", "Ambersoft Sdn Bhd", "Allegion (Malaysia) Sdn. Bhd.", "Roca Malaysia Sdn. Bhd.", "OSIM (M) Sdn Bhd", "HCK Education Sdn Bhd", "NHTC Wellness Products Malaysia Sdn Bhd", "Langkawi Duty Free (M) Sdn Bhd", "LOL Events (M) Sdn Bhd", "Justlogin Sdn. Bhd.", "Majlis Paralimpik Malaysia", "The Mineraw Sdn Bhd", "Fifa Development Zurich Ltd", "Caring Pharmacy Retail Management Sdn Bhd", "Magnet Group Sdn. Bhd.", "Beaconhouse Malaysia Sdn. Bhd.", "Tsubaki Power Transmission (Malaysia) Sdn Bhd", "Minconsult Group", "Leaderonomics Group", "Taier Malaysia Sdn. Bhd."];
        const track = document.getElementById('clientMarquee');
        let mHTML = ''; clients.forEach(c => { const mono = c.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase(); mHTML += `<div class="marquee-item"><div class="mq-mono">${mono}</div><span>${c}</span></div>` });
        track.innerHTML = mHTML + mHTML;

        // Mobile Menu Toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const mobileCloseBtn = document.getElementById('mobileCloseBtn');

        function openMobileMenu() {
            if (!mobileToggle || !mobileMenu || !mobileOverlay) return;
            mobileToggle.classList.add('active');
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu(animate = true) {
            if (!mobileToggle || !mobileMenu || !mobileOverlay) return;

            // Spin animation on close button while closing
            if (animate && mobileCloseBtn) {
                mobileCloseBtn.classList.add('spinning');
                window.setTimeout(() => mobileCloseBtn.classList.remove('spinning'), 520);
            }

            mobileToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileToggle) {
            mobileToggle.addEventListener('click', () => {
                (mobileMenu && mobileMenu.classList.contains('active')) ? closeMobileMenu(false) : openMobileMenu();
            });
        }

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', () => closeMobileMenu(true));
        }

        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', () => closeMobileMenu(true));
        }

        // Close when a menu link is clicked
        document.querySelectorAll('.mobile-menu-nav a:not(#countryToggle), .mobile-menu-nav .mobile-nav-link:not(#countryToggle)').forEach(a => {
            a.addEventListener('click', () => closeMobileMenu(true));
        });

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) {
                closeMobileMenu(true);
            }
        });


        // Country dropdown (mobile menu)
        const countryToggle = document.getElementById('countryToggle');
        const countrySubmenu = document.querySelector('#mobileMenu #countrySubmenu');

        if (countryToggle && countrySubmenu) {
            countryToggle.addEventListener('click', function (e) {
                e.preventDefault(); // don't navigate
                countrySubmenu.classList.toggle('open');

                const icon = this.querySelector('i');
                if (icon) {
                    icon.classList.toggle('bi-chevron-down');
                    icon.classList.toggle('bi-chevron-up');
                }
            });
        }


        // ===== SOCIAL SIDEBAR =====
        const socialSidebar = document.getElementById('socialSidebar'), socialToggle = document.getElementById('socialToggle');
        socialToggle.addEventListener('click', () => socialSidebar.classList.toggle('open'));
        document.addEventListener('click', e => { if (!socialSidebar.contains(e.target) && socialSidebar.classList.contains('open')) socialSidebar.classList.remove('open') });

        // ===== SCROLL TOP =====
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => scrollTopBtn.classList.toggle('visible', window.scrollY > 400));
        scrollTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>

</body>

</html>