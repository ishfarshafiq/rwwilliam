<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Clients | RW William PLT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --rw-primary: #00ADEF;
            --rw-primary-dark: #0088BF;
            --rw-primary-deeper: #006A94;
            --rw-primary-light: #E6F7FD;
            --rw-primary-lighter: #F0FAFF;
            --rw-accent: #004B6E;
            --rw-dark: #0A1628;
            --rw-text: #2C3E50;
            --rw-text-light: #6B7B8D;
            --rw-white: #FFFFFF;
            --rw-off-white: #F8FBFD;
            --rw-border: #D6EAF4;
            --font-heading: 'DM Serif Display', serif;
            --font-body: 'Outfit', sans-serif
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth;
            overflow-x: clip;
        }

        body {
            font-family: var(--font-body);
            color: var(--rw-text);
            background: var(--rw-white);
            overflow-x: hidden
        }

        #mainNavbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: var(--font-heading);
            color: var(--rw-accent)
        }

        p {
            line-height: 1.8;
            color: var(--rw-text-light);
            font-weight: 300
        }

        a {
            text-decoration: none;
            transition: all .3s ease
        }

        .top-bar {
            background: var(--rw-primary);
            padding: 8px 0;
            font-size: 13px;
            color: rgba(255, 255, 255, .9);
            letter-spacing: .3px
        }

        .top-bar a {
            color: rgba(255, 255, 255, .9)
        }

        .top-bar a:hover {
            color: var(--rw-white)
        }

        .top-bar .separator {
            margin: 0 12px;
            opacity: .4
        }

        .navbar {
            background: var(--rw-white);
            padding: 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, .06);
            position: sticky;
            top: 0;
            z-index: 1050;
            transition: all .3s ease
        }

        .navbar.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, .1)
        }

        .navbar-brand {
            padding: 12px 0
        }

        .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1
        }

        .navbar-brand .brand-name {
            font-family: var(--font-heading);
            font-size: 22px;
            color: var(--rw-accent);
            letter-spacing: .5px
        }

        .navbar-brand .brand-sub {
            font-size: 9px;
            color: var(--rw-text-light);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500
        }

        .navbar-brand .brand-logo {
            width: 80px;
            height: 50px;
            background: #00ADEF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-heading);
            font-size: 35px;
            font-weight: 700;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .navbar .nav-link {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 500;
            color: var(--rw-text) !important;
            padding: 28px 16px !important;
            letter-spacing: .3px;
            text-transform: uppercase;
            position: relative;
            transition: color .3s ease
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 16px;
            right: 16px;
            height: 3px;
            background: var(--rw-primary);
            transform: scaleX(0);
            transition: transform .3s ease;
            border-radius: 3px 3px 0 0
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            transform: scaleX(1)
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--rw-primary) !important
        }

        .navbar .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .12);
            padding: 10px;
            margin-top: 0;
            border-top: 3px solid var(--rw-primary)
        }

        .navbar .dropdown-item {
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            color: var(--rw-text);
            transition: all .2s ease
        }

        .navbar .dropdown-item:hover {
            background: var(--rw-primary-light);
            color: var(--rw-primary)
        }

        .navbar-toggler {
            border: none;
            padding: 8px;
            position: relative;
            z-index: 1060;
            outline: none !important;
            box-shadow: none !important
        }

        .hamburger {
            width: 28px;
            height: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between
        }

        .hamburger span {
            display: block;
            width: 100%;
            height: 2.5px;
            background: var(--rw-accent);
            border-radius: 2px;
            transition: all .4s cubic-bezier(.68, -.55, .265, 1.55);
            transform-origin: center
        }

        .navbar-toggler.active .hamburger span:nth-child(1) {
            transform: translateY(8.75px) rotate(45deg);
            background: var(--rw-white)
        }

        .navbar-toggler.active .hamburger span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0)
        }

        .navbar-toggler.active .hamburger span:nth-child(3) {
            transform: translateY(-8.75px) rotate(-45deg);
            background: var(--rw-white)
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(10, 22, 40, .6);
            backdrop-filter: blur(4px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all .4s ease
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            right: auto;
            width: 320px;
            max-width: 85vw;
            height: 100vh;
            background: var(--rw-primary);
            z-index: 1055;
            transform: translateX(-100%);
            transition: transform .5s cubic-bezier(.77, 0, .175, 1);
            overflow-y: auto;
            display: flex;
            flex-direction: column
        }

        .mobile-menu.active {
            transform: translateX(0)
        }

        .mobile-menu-header {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, .15)
        }

        .mobile-menu-header .brand-logo-m {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, .2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-heading);
            font-size: 16px;
            margin-right: 12px
        }

        .mobile-menu-header .brand-info h5 {
            color: white;
            font-size: 18px;
            margin: 0
        }

        .mobile-menu-header .brand-info span {
            color: rgba(255, 255, 255, .6);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px
        }

        .mobile-menu-nav {
            padding: 16px 0;
            flex: 1
        }

        .mobile-menu-nav .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 24px;
            color: white;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: .5px;
            text-transform: uppercase;
            transition: all .3s ease;
            border-left: 3px solid transparent
        }

        .mobile-menu-nav .mobile-nav-link:hover,
        .mobile-menu-nav .mobile-nav-link.active {
            background: rgba(255, 255, 255, .1);
            border-left-color: white;
            padding-left: 28px
        }

        .mobile-menu-nav .mobile-nav-link i {
            font-size: 12px;
            opacity: .5
        }

        .mobile-submenu {
            max-height: 0;
            overflow: hidden;
            background: rgba(0, 0, 0, .15);
            transition: max-height .4s ease
        }

        .mobile-submenu.open {
            max-height: 300px
        }

        .mobile-submenu a {
            display: block;
            padding: 12px 24px 12px 40px;
            color: rgba(255, 255, 255, .8);
            font-size: 14px;
            transition: all .3s ease
        }

        .mobile-submenu a:hover {
            color: white;
            padding-left: 48px
        }

        .mobile-menu-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255, 255, 255, .15)
        }

        .mobile-menu-footer p {
            color: rgba(255, 255, 255, .5);
            font-size: 12px;
            margin: 0
        }

        .mobile-menu-footer .social-icons a {
            color: rgba(255, 255, 255, .6);
            margin-right: 16px;
            font-size: 18px
        }

        .mobile-menu-footer .social-icons a:hover {
            color: white
        }

        /* Mobile menu close button */
        .mobile-menu-close {
            margin-left: auto;
            width: 38px;
            height: 38px;
            border: 0;
            background: rgba(5, 4, 66, 0.5);
            color: var(--rw-white);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .25s ease, transform .25s ease;
        }

        .mobile-menu-close:hover {
            background: rgba(255, 255, 255, .28)
        }

        .mobile-menu-close:active {
            transform: scale(.96)
        }

        .mobile-menu-close.spinning {
            animation: rwSpin .45s linear
        }

        @keyframes rwSpin {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        /* Optional: a smoother closing state */
        .mobile-menu.closing {
            transform: translateX(-100%)
        }

        .page-hero {
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 40%, var(--rw-accent) 100%);
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(255, 255, 255, .08) 0%, transparent 70%);
            border-radius: 50%
        }

        .page-hero .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: auto;
            bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, .06) 1px, transparent 1px);
            background-size: 30px 30px
        }

        .page-hero h1 {
            font-size: 52px;
            color: var(--rw-white);
            margin-bottom: 16px;
            position: relative
        }

        .page-hero .hero-line {
            width: 60px;
            height: 4px;
            background: var(--rw-white);
            border-radius: 2px;
            margin-bottom: 20px
        }

        .page-hero p {
            color: rgba(255, 255, 255, .8);
            font-size: 17px;
            max-width: 600px
        }

        .breadcrumb-nav {
            position: relative
        }

        .breadcrumb-nav a {
            color: rgba(255, 255, 255, .6);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500
        }

        .breadcrumb-nav a:hover {
            color: white
        }

        .breadcrumb-nav span {
            color: var(--rw-white);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500
        }

        .breadcrumb-nav .divider {
            color: rgba(255, 255, 255, .3);
            margin: 0 10px
        }

        .section-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--rw-primary);
            font-weight: 600;
            margin-bottom: 12px;
            display: inline-flex;
            align-items: center;
            gap: 10px
        }

        .section-label::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--rw-primary);
            border-radius: 1px
        }

        .section-title {
            font-size: 42px;
            color: var(--rw-accent);
            margin-bottom: 20px;
            line-height: 1.2
        }

        /* STATS BAR */
        .stats-bar {
            background: var(--rw-white);
            padding: 50px 0;
            position: relative;
            z-index: 2;
            margin-top: -40px
        }

        .stat-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 16px;
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            transition: all .3s ease
        }

        .stat-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 10px 30px rgba(0, 173, 239, .1);
            transform: translateY(-4px)
        }

        .stat-num {
            font-family: var(--font-heading);
            font-size: 48px;
            color: var(--rw-primary);
            line-height: 1
        }

        .stat-label {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--rw-text-light);
            font-weight: 500;
            margin-top: 8px
        }

        /* CLIENT LOGOS GRID */
        .clients-section {
            padding: 80px 0 100px
        }

        .client-logo-card {
            background: var(--rw-white);
            border: 2px solid var(--rw-border);
            border-radius: 16px;
            padding: 0;
            height: 180px;
            display: flex;
            flex-direction: column;
            transition: all .4s ease;
            overflow: hidden;
            position: relative
        }

        .client-logo-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 15px 40px rgba(0, 173, 239, .12);
            transform: translateY(-6px)
        }

        /*.client-logo-card:hover .client-logo-area {
            background: var(--rw-primary-light)
        }*/

        .client-logo-area {
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #fff;
            transition: all .3s ease;
            position: relative
        }

        /* When real logo images are available, use <img> inside .client-logo-area */
        .client-logo-area img {
            max-width: 80%;
            object-fit: contain;
            /*filter: grayscale(100%) opacity(.6); */
            transition: all .4s ease
        }

        .client-logo-card:hover .client-logo-area img {
            filter: grayscale(0%) opacity(1)
        }

        /* Placeholder monogram for when no logo image is available */
        .client-monogram {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 22px;
            color: white;
            letter-spacing: 1px;
            transition: all .3s ease;
            box-shadow: 0 4px 12px rgba(0, 173, 239, .2)
        }

        .client-logo-card:hover .client-monogram {
            transform: scale(1.08);
            box-shadow: 0 6px 20px rgba(0, 173, 239, .3)
        }

        .client-name-bar {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 14px;
            text-align: center;
            border-top: 1px solid var(--rw-border)
        }

        .client-name-bar span {
            font-size: 12px;
            font-weight: 600;
            color: var(--rw-accent);
            line-height: 1.3;
            letter-spacing: .3px
        }

        .client-logo-card:hover .client-name-bar span {
            color: var(--rw-primary)
        }

        /* INDUSTRY TAGS */
        .industry-section {
            padding: 80px 0;
            background: var(--rw-off-white)
        }

        .industry-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            color: var(--rw-text);
            transition: all .3s ease;
            margin: 5px
        }

        .industry-tag:hover {
            border-color: var(--rw-primary);
            background: var(--rw-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 173, 239, .2)
        }

        .industry-tag i {
            font-size: 16px;
            color: var(--rw-primary)
        }

        .industry-tag:hover i {
            color: white
        }

        /* CTA */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 50%, var(--rw-accent) 100%);
            position: relative;
            overflow: hidden
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -15%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
            border-radius: 50%
        }

        .cta-section h2 {
            color: var(--rw-white);
            font-size: 38px
        }

        .cta-section p {
            color: rgba(255, 255, 255, .8);
            font-size: 17px
        }

        .btn-rw-white {
            background: white;
            color: var(--rw-primary);
            padding: 14px 36px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid white;
            transition: all .3s ease;
            display: inline-block
        }

        .btn-rw-white:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .15)
        }

        .btn-rw-outline {
            background: transparent;
            color: white;
            padding: 14px 36px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid rgba(255, 255, 255, .4);
            transition: all .3s ease;
            display: inline-block
        }

        .btn-rw-outline:hover {
            background: white;
            color: var(--rw-accent);
            border-color: white;
            transform: translateY(-2px)
        }

        /* MARQUEE */
        .marquee-section {
            padding: 40px 0;
            background: var(--rw-white);
            overflow: hidden;
            border-bottom: 1px solid var(--rw-border)
        }

        .marquee-track {
            display: flex;
            gap: 60px;
            animation: marqueeScroll 100s linear infinite;
            width: max-content
        }

        .marquee-track:hover {
            animation-play-state: paused
        }

        .marquee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
            flex-shrink: 0
        }

        .marquee-item .mq-dot {
            width: 8px;
            height: 8px;
            background: var(--rw-primary);
            border-radius: 50%;
            flex-shrink: 0
        }

        .marquee-item span {
            font-size: 15px;
            font-weight: 500;
            color: var(--rw-text-light);
            letter-spacing: .3px
        }

        @keyframes marqueeScroll {
            0% {
                transform: translateX(0)
            }

            100% {
                transform: translateX(-50%)
            }
        }

        .site-footer {
            background: var(--rw-dark);
            padding: 80px 0 0
        }

        .footer-brand .brand-name {
            font-family: var(--font-heading);
            font-size: 24px;
            color: var(--rw-white)
        }

        .footer-brand p {
            color: rgba(255, 255, 255, .4);
            font-size: 14px;
            margin-top: 16px;
            max-width: 320px
        }

        .footer-title {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 600;
            color: var(--rw-white);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 24px
        }

        .footer-links li {
            list-style: none;
            margin-bottom: 12px
        }

        .footer-links a {
            color: rgba(255, 255, 255, .45);
            font-size: 14px;
            transition: all .3s ease
        }

        .footer-links a:hover {
            color: var(--rw-primary);
            padding-left: 6px
        }

        .footer-contact li {
            list-style: none;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, .45);
            font-size: 14px
        }

        .footer-contact i {
            color: var(--rw-primary);
            margin-top: 3px
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .08);
            padding: 24px 0;
            margin-top: 60px
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, .3);
            font-size: 13px;
            margin: 0
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, .05);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, .4);
            margin-left: 8px;
            transition: all .3s ease
        }

        .footer-social a:hover {
            background: var(--rw-primary);
            color: white;
            transform: translateY(-3px)
        }

        .social-sidebar {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1030;
            display: flex;
            flex-direction: column;
            align-items: flex-start
        }

        .social-sidebar-toggle {
            width: 48px;
            height: 48px;
            background: var(--rw-primary);
            border: none;
            border-radius: 0 12px 12px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: all .3s ease;
            box-shadow: 4px 4px 15px rgba(0, 173, 239, .3);
            position: relative;
            z-index: 2
        }

        .social-sidebar-toggle:hover {
            background: var(--rw-primary-dark);
            width: 52px
        }

        .social-sidebar-toggle .toggle-icon {
            transition: transform .4s cubic-bezier(.68, -.55, .265, 1.55)
        }

        .social-sidebar.open .social-sidebar-toggle .toggle-icon {
            transform: rotate(180deg)
        }

        .social-sidebar-links {
            display: flex;
            flex-direction: column;
            gap: 3px;
            transform: translateX(100%);
            opacity: 0;
            transition: all .5s cubic-bezier(.77, 0, .175, 1);
            pointer-events: none
        }

        .social-sidebar.open .social-sidebar-links {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto
        }

        .social-sidebar-links a {
            width: 48px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            border-radius: 0 10px 10px 0;
            position: relative;
            overflow: hidden;
            transition: all .3s ease;
            transform: translateX(-60px)
        }

        .social-sidebar-links a:hover {
            width: 56px
        }

        .social-sidebar.open .social-sidebar-links a {
            transform: translateX(0)
        }

        .social-sidebar-links a .social-tooltip {
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: var(--rw-dark);
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all .3s ease;
            margin-left: 10px
        }

        .social-sidebar-links a .social-tooltip::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 5px solid transparent;
            border-right-color: var(--rw-dark)
        }

        .social-sidebar-links a:hover .social-tooltip {
            opacity: 1;
            margin-left: 14px
        }

        .social-sidebar-links .social-facebook {
            background: #1877F2
        }

        .social-sidebar-links .social-tiktok {
            background: #010101
        }

        .social-sidebar-links .social-viber {
            background: #7360F2
        }

        .social-sidebar-links .social-whatsapp {
            background: #25D366
        }

        .social-sidebar-links .social-linkedin {
            background: #0A66C2
        }

        .social-sidebar-links .social-email {
            background: #6B7B8D
        }

        .social-sidebar-links .social-twitter {
            background: #1DA1F2
        }

        .social-sidebar-links .social-instagram {
            background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888)
        }

        .social-sidebar-links .social-youtube {
            background: #FF0000
        }

        .social-sidebar-links a:hover {
            filter: brightness(1.15)
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(1) {
            transition-delay: .03s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(2) {
            transition-delay: .06s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(3) {
            transition-delay: .09s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(4) {
            transition-delay: .12s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(5) {
            transition-delay: .15s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(6) {
            transition-delay: .18s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(7) {
            transition-delay: .21s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(8) {
            transition-delay: .24s
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(9) {
            transition-delay: .27s
        }

        @keyframes pulse-ring {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 173, 239, .4)
            }

            70% {
                box-shadow: 0 0 0 12px rgba(0, 173, 239, 0)
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 173, 239, 0)
            }
        }

        .social-sidebar-toggle {
            animation: pulse-ring 2.5s infinite
        }

        .social-sidebar.open .social-sidebar-toggle {
            animation: none
        }

        @media(max-width:767.98px) {
            .social-sidebar {
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                transform: none;
                flex-direction: column;
                align-items: stretch
            }

            .social-sidebar-toggle {
                width: 100%;
                height: 44px;
                border-radius: 12px 12px 0 0;
                box-shadow: 0 -4px 15px rgba(0, 173, 239, .2);
                flex-direction: row;
                gap: 8px;
                font-size: 14px
            }

            .social-sidebar-links {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0;
                background: var(--rw-dark);
                padding: 12px 8px;
                transform: translateY(100%)
            }

            .social-sidebar.open .social-sidebar-links {
                transform: translateY(0)
            }

            .social-sidebar-links a {
                width: 44px;
                height: 44px;
                border-radius: 10px;
                margin: 3px;
                transform: translateY(30px)
            }

            .social-sidebar.open .social-sidebar-links a {
                transform: translateY(0)
            }

            .social-sidebar-links a .social-tooltip {
                display: none
            }
        }

        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 48px;
            height: 48px;
            background: var(--rw-primary);
            color: white;
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all .3s ease;
            z-index: 999;
            box-shadow: 0 6px 20px rgba(0, 173, 239, .35)
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible
        }

        .scroll-top:hover {
            transform: translateY(-4px);
            background: var(--rw-primary-dark)
        }

        @media(max-width:991.98px) {
            .desktop-nav {
                display: none !important
            }

            .page-hero {
                padding: 80px 0 60px
            }

            .page-hero h1 {
                font-size: 36px
            }

            .section-title {
                font-size: 32px
            }

            .clients-section {
                padding: 60px 0 80px
            }

            .client-logo-card {
                height: 160px
            }

            .stat-num {
                font-size: 36px
            }
        }

        @media(min-width:1200px) {

            .navbar-toggler,
            .mobile-menu,
            .mobile-menu-overlay {
                display: none !important
            }
        }

        @media(max-width:575.98px) {
            .page-hero h1 {
                font-size: 30px
            }

            .section-title {
                font-size: 26px
            }

            .top-bar {
                display: none
            }

            .client-logo-card {
                height: 150px
            }

            .client-monogram {
                width: 50px;
                height: 50px;
                font-size: 18px
            }

            .stat-num {
                font-size: 30px
            }
        }
    </style>
</head>

<body>
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="mailto:richard@rwwilliam.com.my"><i class="bi bi-envelope me-1"></i>
                        richard@rwwilliam.com.my</a>
                    <span class="separator">|</span>
                    <a href="tel:+6037805 3859"><i class="bi bi-telephone me-1"></i> +603-7805 3859</a>
                </div>
                <div>
                    <a href="https://www.facebook.com/profile.php?id=100063468196295" target="_blank" class="me-3"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/rwwilliam" target="_blank" class="me-3"><i
                            class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/rw_william/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
	
	<?php include_once('includes/navbar.php'); ?>
   
    <section class="page-hero">
        <div class="hero-pattern"></div>
        <div class="container position-relative">
            <div class="breadcrumb-nav mb-4" data-aos="fade-down"><a href="index.php">Home</a><span
                    class="divider">/</span><span>Our Clients</span></div>
            <div class="hero-line" data-aos="fade-right"></div>
            <h1 data-aos="fade-up">Our Clients</h1>
            <p data-aos="fade-up" data-aos-delay="100">Trusted by leading organizations across diverse industries — from
                local SMEs to multinational corporations and international bodies.</p>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="stats-bar">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-lg-3" data-aos="fade-up">
                    <div class="stat-card">
                        <div class="stat-num">2,500+</div>
                        <div class="stat-label">Clients Served</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                    <div class="stat-card">
                        <div class="stat-num">20+</div>
                        <div class="stat-label">Industries</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-num">5,000+</div>
                        <div class="stat-label">Featured Clients</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                    <div class="stat-card">
                        <div class="stat-num">23+</div>
                        <div class="stat-label">Years of Trust</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Marquee -->
    <section class="marquee-section">
        <div class="marquee-track" id="marqueeTrack"></div>
    </section>

    <!-- Client Logo Grid -->
    <!--  <section class="clients-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label justify-content-center" data-aos="fade-up">Trusted Partners</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="50">Featured Clients</h2>
                <p class="mx-auto" style="max-width:600px" data-aos="fade-up" data-aos-delay="100">A selection of
                    organizations that trust RW William PLT for their audit, tax, and advisory needs.</p>
            </div>
            <div class="row g-4" id="clientGrid"></div>
        </div>
    </section> -->
    <section class="clients-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Trusted Partners</span>
                <h2 class="section-title">Featured Clients</h2>
                <p class="mx-auto" style="max-width:600px;">A selection of organizations that trust RW William PLT for
                    their audit, tax, and advisory needs.</p>
            </div>

            <div class="row g-3" id="clientGrid">

                <!-- Asia Propel -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/01.jpg">
                        </div>
                        <div class="client-name-bar"><span>Asia Propel Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Butter & Olive Group -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/03.jpg">
                        </div>
                        <div class="client-name-bar"><span>Butter &amp; Olive Group</span></div>
                    </div>
                </div>

                <!-- Hankyu Hanshin Group -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/02.jpg">
                        </div>
                        <div class="client-name-bar"><span>Hankyu Hanshin Group</span></div>
                    </div>
                </div>

                <!-- MC Mitra -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/18.jpg">
                        </div>
                        <div class="client-name-bar"><span>MC Mitra Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Ambersoft -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/05.jpg">
                        </div>
                        <div class="client-name-bar"><span>Ambersoft Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Allegion -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="180">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/06.jpg">
                        </div>
                        <div class="client-name-bar"><span>Allegion (Malaysia) Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Roca Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/07.jpg">
                        </div>
                        <div class="client-name-bar"><span>Roca Malaysia Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Restoran BBQ Nights -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/19.jpg">
                        </div>
                        <div class="client-name-bar"><span>Restoran BBQ Nights (M) Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- OSIM -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/20.jpg">
                        </div>
                        <div class="client-name-bar"><span>OSIM (M) Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- HCK Education -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/hck.jpg">
                        </div>
                        <div class="client-name-bar"><span>HCK Education Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- NHTC Wellness -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/nhtc.jpg">
                        </div>
                        <div class="client-name-bar"><span>NHTC Wellness Products Malaysia Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Langkawi Duty Free -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="180">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/langkawi.jpg">
                        </div>
                        <div class="client-name-bar"><span>Langkawi Duty Free (M) Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- LOL Events -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/asia.jpg">
                        </div>
                        <div class="client-name-bar"><span>LOL Events (M) Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Justlogin -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/22.jpg">
                        </div>
                        <div class="client-name-bar"><span>Justlogin Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Majlis Paralimpik Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/17.jpg">
                        </div>
                        <div class="client-name-bar"><span>Majlis Paralimpik Malaysia</span></div>
                    </div>
                </div>

                <!-- The Mineraw -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/mineraw.jpg">
                        </div>
                        <div class="client-name-bar"><span>The Mineraw Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Fifa Development Zurich -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/fifa.jpg">
                        </div>
                        <div class="client-name-bar"><span>Fifa Development Zurich Ltd</span></div>
                    </div>
                </div>

                <!-- Recording Industry Association of Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="180">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/23.jpg">
                        </div>
                        <div class="client-name-bar"><span>Recording Industry Association of Malaysia (RIM)</span></div>
                    </div>
                </div>

                <!-- Caring Pharmacy -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/24.jpg">
                        </div>
                        <div class="client-name-bar"><span>Caring Pharmacy Retail Management Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- PJ De Inn -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/pjdeen.jpg">
                        </div>
                        <div class="client-name-bar"><span>PJ De Inn Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Corida -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/26.jpg">
                        </div>
                        <div class="client-name-bar"><span>Corida Sendirian Berhad</span></div>
                    </div>
                </div>

                <!-- Melamine Marketing -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/melamine.jpg">
                        </div>
                        <div class="client-name-bar"><span>Melamine Marketing (KL) Sdn Bhd</span></div>
                    </div>
                </div>

                <!-- Magnet Group -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/magnet.jpg">
                        </div>
                        <div class="client-name-bar"><span>Magnet Group Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- SRS Power Switchgear -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="180">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/citata.jpg">
                        </div>
                        <div class="client-name-bar"><span>Citatah Marble</span></div>
                    </div>
                </div>
                <!-- Tsubaki Power Transmission -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                             <img src="img/clients/tsubaki.jpg">
                        </div>
                        <div class="client-name-bar"><span>Tsubaki Power Transmission (Malaysia) Sdn Bhd</span></div>
                    </div>
                </div>
                <!-- Persatuan Yoga Isha Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                           <img src="img/clients/pioneer.jpg">
                        </div>
                        <div class="client-name-bar"><span>Pioneer Engineering</span></div>
                    </div>
                </div>

                <!-- First Ambulans -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/first-ambulans.jpg">
                        </div>
                        <div class="client-name-bar"><span>First Ambulans</span></div>
                    </div>
                </div>
                <!-- Beaconhouse Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <img src="img/clients/beconhouse.jpg">
                        </div>
                        <div class="client-name-bar"><span>Beaconhouse Malaysia Sdn. Bhd.</span></div>
                    </div>
                </div>
                    <!-- Beaconhouse Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">YI</div>
                        </div>
                        <div class="client-name-bar"><span>Persatuan Yoga Isha Malaysia </span></div>
                    </div>
                </div>

                <!-- Sette Colli -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">SC</div>
                        </div>
                        <div class="client-name-bar"><span>Sette Colli Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Seppia & Polpo -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">SP</div>
                        </div>
                        <div class="client-name-bar"><span>Seppia &amp; Polpo Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Green Ampere -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="180">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">GA</div>
                        </div>
                        <div class="client-name-bar"><span>Green Ampere Sdn. Bhd.</span></div>
                    </div>
                </div>

                <!-- Minconsult Group -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="30">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">MN</div>
                        </div>
                        <div class="client-name-bar"><span>Minconsult Group</span></div>
                    </div>
                </div>

                <!-- Leaderonomics Group -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="60">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">LG</div>
                        </div>
                        <div class="client-name-bar"><span>Leaderonomics Group</span></div>
                    </div>
                </div>

                <!-- Taier Malaysia -->
                <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="90">
                    <div class="client-logo-card">
                        <div class="client-logo-area">
                            <div class="client-monogram">TI</div>
                        </div>
                        <div class="client-name-bar"><span>Taier Malaysia Sdn. Bhd.</span></div>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Industries -->
    <section class="industry-section">
        <div class="container">
            <div class="text-center mb-4">
                <div class="section-label justify-content-center" data-aos="fade-up">Diverse Expertise</div>
                <h2 class="section-title" data-aos="fade-up">Industries We Serve</h2>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <span class="industry-tag"><i class="bi bi-building"></i> Property & Real Estate</span>
                <span class="industry-tag"><i class="bi bi-cup-hot"></i> F&B & Hospitality</span>
                <span class="industry-tag"><i class="bi bi-train-front"></i> Transportation</span>
                <span class="industry-tag"><i class="bi bi-cpu"></i> Technology</span>
                <span class="industry-tag"><i class="bi bi-heart-pulse"></i> Healthcare & Wellness</span>
                <span class="industry-tag"><i class="bi bi-mortarboard"></i> Education</span>
                <span class="industry-tag"><i class="bi bi-cart4"></i> Retail & E-Commerce</span>
                <span class="industry-tag"><i class="bi bi-gear"></i> Manufacturing</span>
                <span class="industry-tag"><i class="bi bi-globe"></i> International Bodies</span>
                <span class="industry-tag"><i class="bi bi-music-note-beamed"></i> Entertainment & Media</span>
                <span class="industry-tag"><i class="bi bi-lightning"></i> Energy & Utilities</span>
                <span class="industry-tag"><i class="bi bi-person-workspace"></i> Professional Services</span>
                <span class="industry-tag"><i class="bi bi-trophy"></i> Sports & Associations</span>
                <span class="industry-tag"><i class="bi bi-shop"></i> Duty Free & Trade</span>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <!-- <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2>Ready to Partner With Us?</h2>
                    <p class="mb-0">Join over 2,000 clients who trust RW William PLT for their audit, tax, and advisory
                        needs.</p>
                </div>
                <div class="col-lg-5 text-lg-end" data-aos="fade-left"><a href="contact.php"
                        class="btn-rw-white me-2 mb-2">Get in Touch</a><a href="services.php"
                        class="btn-rw-outline mb-2">Our Services</a></div>
            </div>
        </div>
    </section>-->

    <?php include_once('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });

        // Client data
        const clients = [
            { name: "Asia Propel Sdn. Bhd.", mono: "AP" },
            { name: "Butter & Olive Group", mono: "BO" },
            { name: "Hankyu Hanshin Group", mono: "HH" },
            { name: "MC Mitra Sdn. Bhd.", mono: "MC" },
            { name: "Ambersoft Sdn Bhd", mono: "AS" },
            { name: "Allegion (Malaysia) Sdn. Bhd.", mono: "AL" },
            { name: "Roca Malaysia Sdn. Bhd.", mono: "RM" },
            { name: "Restoran BBQ Nights (M) Sdn Bhd", mono: "BQ" },
            { name: "OSIM (M) Sdn Bhd", mono: "OS" },
            { name: "HCK Education Sdn Bhd", mono: "HE" },
            { name: "NHTC Wellness Products Malaysia Sdn Bhd", mono: "NW" },
            { name: "Langkawi Duty Free (M) Sdn Bhd", mono: "LD" },
            { name: "LOL Events (M) Sdn Bhd", mono: "LE" },
            { name: "Justlogin Sdn. Bhd.", mono: "JL" },
            { name: "Majlis Paralimpik Malaysia", mono: "MP" },
            { name: "The Mineraw Sdn Bhd", mono: "TM" },
            { name: "Fifa Development Zurich Ltd", mono: "FD" },
            { name: "Recording Industry Association of Malaysia (RIM)", mono: "RI" },
            { name: "Caring Pharmacy Retail Management Sdn Bhd", mono: "CP" },
            { name: "PJ De Inn Sdn Bhd", mono: "PD" },
            { name: "Corida Sendirian Berhad", mono: "CS" },
            { name: "Melamine Marketing (KL) Sdn Bhd", mono: "MM" },
            { name: "Magnet Group Sdn. Bhd.", mono: "MG" },
            { name: "SRS Power Switchgear Sdn Bhd", mono: "SP" },
            { name: "Persatuan Yoga Isha Malaysia", mono: "YI" },
            { name: "Beaconhouse Malaysia Sdn. Bhd.", mono: "BM" },
            { name: "Tsubaki Power Transmission (Malaysia) Sdn Bhd", mono: "TP" },
            { name: "Sette Colli Sdn. Bhd.", mono: "SC" },
            { name: "Seppia & Polpo Sdn. Bhd.", mono: "SP" },
            { name: "Green Ampere Sdn. Bhd.", mono: "GA" },
            { name: "Minconsult Group", mono: "MN" },
            { name: "Leaderonomics Group", mono: "LG" },
            { name: "Taier Malaysia Sdn. Bhd.", mono: "TI" }
        ];



        // Render marquee
        const track = document.getElementById('marqueeTrack');
        let marqueeHTML = '';
        clients.forEach(c => { marqueeHTML += `<div class="marquee-item"><div class="mq-dot"></div><span>${c.name}</span></div>` });
        track.innerHTML = marqueeHTML + marqueeHTML;

        // Mobile menu
        const mobileToggle = document.getElementById('mobileToggle'),
            mobileMenu = document.getElementById('mobileMenu'),
            mobileOverlay = document.getElementById('mobileOverlay'),
            mobileCloseBtn = document.getElementById('mobileCloseBtn');

        function openMobileMenu() {
            if (!mobileToggle || !mobileMenu || !mobileOverlay) return;
            mobileToggle.classList.add('active');
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu(animate = true) {
            if (!mobileToggle || !mobileMenu || !mobileOverlay) return;
            if (animate && mobileCloseBtn) {
                mobileCloseBtn.classList.add('spinning');
                setTimeout(() => mobileCloseBtn.classList.remove('spinning'), 520);
            }
            mobileToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileToggle) {
            mobileToggle.addEventListener('click', () => mobileMenu.classList.contains('active') ? closeMobileMenu(false) : openMobileMenu());
        }
        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', () => closeMobileMenu(true));
        }
        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', () => closeMobileMenu(true));
        }
        document.querySelectorAll('.mobile-menu-nav a:not(#countryToggle), .mobile-menu-nav .mobile-nav-link:not(#countryToggle)').forEach(a => a.addEventListener('click', () => closeMobileMenu(true)));
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) closeMobileMenu(true); });
        document.getElementById('countryToggle').addEventListener('click', function (e) { e.preventDefault(); document.getElementById('countrySubmenu').classList.toggle('open'); const i = this.querySelector('i'); i.classList.toggle('bi-chevron-down'); i.classList.toggle('bi-chevron-up') });
        window.addEventListener('scroll', function () { document.getElementById('mainNavbar').classList.toggle('scrolled', window.scrollY > 50) });
        document.querySelectorAll('.mobile-nav-link:not(#countryToggle)').forEach(l => l.addEventListener('click', () => closeMobileMenu(true)));
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeMobileMenu() });

        // Social sidebar
        const socialSidebar = document.getElementById('socialSidebar'), socialToggle = document.getElementById('socialToggle');
        socialToggle.addEventListener('click', function () { socialSidebar.classList.toggle('open') });
        document.addEventListener('click', function (e) { if (!socialSidebar.contains(e.target) && socialSidebar.classList.contains('open')) socialSidebar.classList.remove('open') });

        // Scroll top
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', function () { scrollTopBtn.classList.toggle('visible', window.scrollY > 400) });
        scrollTopBtn.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }) });
    </script>
</body>

</html>