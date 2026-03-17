<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | RW William PLT</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- AOS Animation -->
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
            --rw-gold: #C9A84C;
            --font-heading: 'DM Serif Display', serif;
            --font-body: 'Outfit', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: clip;
        }

        body {
            font-family: var(--font-body);
            color: var(--rw-text);
            background-color: var(--rw-white);
            overflow-x: hidden;
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
            color: var(--rw-accent);
        }

        p {
            line-height: 1.8;
            color: var(--rw-text-light);
            font-weight: 300;
        }

        a {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: var(--rw-primary);
            padding: 8px 0;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 0.3px;
        }

        .top-bar a {
            color: rgba(255, 255, 255, 0.9);
        }

        .top-bar a:hover {
            color: var(--rw-white);
        }

        .top-bar .separator {
            margin: 0 12px;
            opacity: 0.4;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: var(--rw-white);
            padding: 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 1050;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            padding: 12px 0;
        }

        .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .navbar-brand .brand-name {
            font-family: var(--font-heading);
            font-size: 22px;
            color: var(--rw-accent);
            letter-spacing: 0.5px;
        }

        .navbar-brand .brand-sub {
            font-size: 9px;
            color: var(--rw-text-light);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 500;
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

        /* Desktop Nav */
        .navbar .nav-link {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 500;
            color: var(--rw-text) !important;
            padding: 28px 16px !important;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            position: relative;
            transition: color 0.3s ease;
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
            transition: transform 0.3s ease;
            border-radius: 3px 3px 0 0;
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            transform: scaleX(1);
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--rw-primary) !important;
        }

        .navbar .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            padding: 10px;
            margin-top: 0;
            border-top: 3px solid var(--rw-primary);
        }

        .navbar .dropdown-item {
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 400;
            color: var(--rw-text);
            transition: all 0.2s ease;
        }

        .navbar .dropdown-item:hover {
            background: var(--rw-primary-light);
            color: var(--rw-primary);
        }

        /* ===== MOBILE MENU ===== */
        .navbar-toggler {
            border: none;
            padding: 8px;
            position: relative;
            z-index: 1060;
            outline: none !important;
            box-shadow: none !important;
        }

        .hamburger {
            width: 28px;
            height: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hamburger span {
            display: block;
            width: 100%;
            height: 2.5px;
            background: var(--rw-accent);
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: center;
        }

        .navbar-toggler.active .hamburger span:nth-child(1) {
            transform: translateY(8.75px) rotate(45deg);
            background: var(--rw-white);
        }

        .navbar-toggler.active .hamburger span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .navbar-toggler.active .hamburger span:nth-child(3) {
            transform: translateY(-8.75px) rotate(-45deg);
            background: var(--rw-white);
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(10, 22, 40, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
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
            transition: transform 0.5s cubic-bezier(0.77, 0, 0.175, 1);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .mobile-menu-header {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
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

        .mobile-menu-header .brand-logo-m {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-heading);
            font-size: 16px;
            margin-right: 12px;
        }

        .mobile-menu-header .brand-info h5 {
            color: white;
            font-size: 18px;
            margin: 0;
        }

        .mobile-menu-header .brand-info span {
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .mobile-menu-nav {
            padding: 16px 0;
            flex: 1;
        }

        .mobile-menu-nav .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 24px;
            color: white;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .mobile-menu-nav .mobile-nav-link:hover,
        .mobile-menu-nav .mobile-nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
            padding-left: 28px;
        }

        .mobile-menu-nav .mobile-nav-link i {
            font-size: 12px;
            opacity: 0.5;
        }

        .mobile-submenu {
            max-height: 0;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.15);
            transition: max-height 0.4s ease;
        }

        .mobile-submenu.open {
            max-height: 300px;
        }

        .mobile-submenu a {
            display: block;
            padding: 12px 24px 12px 40px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .mobile-submenu a:hover {
            color: white;
            padding-left: 48px;
        }

        .mobile-menu-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .mobile-menu-footer p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 12px;
            margin: 0;
        }

        .mobile-menu-footer .social-icons a {
            color: rgba(255, 255, 255, 0.6);
            margin-right: 16px;
            font-size: 18px;
        }

        .mobile-menu-footer .social-icons a:hover {
            color: white;
        }

        /* ===== PAGE HERO ===== */
        .page-hero {
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 40%, var(--rw-accent) 100%);
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-hero .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .page-hero h1 {
            font-size: 52px;
            color: var(--rw-white);
            margin-bottom: 16px;
            position: relative;
        }

        .page-hero .hero-line {
            width: 60px;
            height: 4px;
            background: var(--rw-white);
            border-radius: 2px;
            margin-bottom: 20px;
        }

        .page-hero p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 17px;
            max-width: 600px;
        }

        .breadcrumb-nav {
            position: relative;
        }

        .breadcrumb-nav a {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .breadcrumb-nav a:hover {
            color: white;
        }

        .breadcrumb-nav span {
            color: var(--rw-white);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .breadcrumb-nav .divider {
            color: rgba(255, 255, 255, 0.3);
            margin: 0 10px;
        }

        /* ===== SHARED SECTION STYLES ===== */
        .section-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--rw-primary);
            font-weight: 600;
            margin-bottom: 12px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .section-label::before {
            content: '';
            width: 30px;
            height: 2px;
            background: var(--rw-primary);
            border-radius: 1px;
        }

        .section-title {
            font-size: 42px;
            color: var(--rw-accent);
            margin-bottom: 20px;
            line-height: 1.2;
        }

        /* ===== SERVICES OVERVIEW GRID ===== */
        .services-overview {
            padding: 100px 0 60px;
            background: var(--rw-white);
        }

        .service-overview-card {
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            border-radius: 16px;
            padding: 32px 28px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            height: 100%;
            cursor: pointer;
        }

        .service-overview-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--rw-primary);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            transform-origin: left;
        }

        .service-overview-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
            border-radius: 16px;
        }

        .service-overview-card:hover::before {
            transform: scaleX(1);
        }

        .service-overview-card:hover::after {
            opacity: 1;
        }

        .service-overview-card:hover {
            border-color: transparent;
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 173, 239, 0.25);
        }

        .service-overview-card>* {
            position: relative;
            z-index: 1;
        }

        .service-overview-card:hover .soc-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .service-overview-card:hover .soc-icon i {
            color: white;
        }

        .service-overview-card:hover h5 {
            color: white;
        }

        .service-overview-card:hover p {
            color: rgba(255, 255, 255, 0.8);
        }

        .service-overview-card:hover .card-arrow {
            color: white;
            opacity: 1;
        }

        .soc-icon {
            width: 68px;
            height: 68px;
            background: var(--rw-primary-light);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.4s ease;
        }

        .soc-icon i {
            font-size: 28px;
            color: var(--rw-primary);
            transition: color 0.4s ease;
        }

        .service-overview-card h5 {
            font-size: 18px;
            margin-bottom: 10px;
            transition: color 0.4s ease;
        }

        .service-overview-card p {
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 0;
            transition: color 0.4s ease;
        }

        .card-arrow {
            color: var(--rw-primary);
            font-size: 20px;
            margin-top: 14px;
            display: inline-block;
            opacity: 0;
            transition: all 0.4s ease;
            transform: translateY(6px);
        }

        .service-overview-card:hover .card-arrow {
            opacity: 1;
            transform: translateY(0);
        }

        /* service count badge */
        .service-count {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--rw-primary);
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 50px;
            margin-bottom: 30px;
        }

        .service-count i {
            font-size: 18px;
        }

        /* ===== SERVICE DETAIL SECTIONS ===== */
        .service-detail {
            padding: 80px 0;
            position: relative;
        }

        .service-detail:nth-child(even) {
            background: var(--rw-off-white);
        }

        .service-detail-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .service-detail-number {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            background: var(--rw-primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 22px;
            color: white;
        }

        .service-detail-header h2 {
            font-size: 34px;
            margin: 0;
        }

        .service-detail p.lead-text {
            font-size: 17px;
            line-height: 1.9;
            color: var(--rw-text);
            font-weight: 300;
            margin-bottom: 24px;
        }

        /* Service list items */
        .service-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .service-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid var(--rw-border);
            font-size: 15px;
            color: var(--rw-text);
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .service-list li:last-child {
            border-bottom: none;
        }

        .service-list li:hover {
            padding-left: 8px;
        }

        .service-list li::before {
            content: '';
            flex-shrink: 0;
            width: 8px;
            height: 8px;
            background: var(--rw-primary);
            border-radius: 50%;
            margin-top: 7px;
        }

        /* Feature tags */
        .feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--rw-primary-light);
            border: 1px solid rgba(0, 173, 239, 0.15);
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 500;
            color: var(--rw-accent);
            margin: 4px;
            transition: all 0.3s ease;
        }

        .feature-tag:hover {
            background: var(--rw-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 173, 239, 0.25);
        }

        .feature-tag i {
            color: var(--rw-primary);
            font-size: 14px;
        }

        .feature-tag:hover i {
            color: white;
        }

        /* Info box / highlight */
        .info-box {
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-primary-dark));
            border-radius: 16px;
            padding: 32px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .info-box::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent 70%);
            border-radius: 50%;
        }

        .info-box h4 {
            color: white;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .info-box p {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 300;
            margin-bottom: 0;
        }

        .info-box .info-icon {
            width: 52px;
            height: 52px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .info-box .info-icon i {
            font-size: 24px;
            color: white;
        }

        /* Secondary info panel */
        .info-panel {
            background: var(--rw-white);
            border: 2px solid var(--rw-primary);
            border-radius: 16px;
            padding: 28px;
        }

        .info-panel h5 {
            font-size: 18px;
            color: var(--rw-primary);
            margin-bottom: 12px;
        }

        .info-panel p {
            font-size: 14px;
        }

        .info-panel .panel-badge {
            display: inline-block;
            background: var(--rw-primary);
            color: white;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 4px 14px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        /* Criteria list for audit exemption */
        .criteria-list {
            list-style: none;
            padding: 0;
            counter-reset: criteria;
        }

        .criteria-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px;
            margin-bottom: 10px;
            background: var(--rw-primary-lighter);
            border-radius: 12px;
            border-left: 4px solid var(--rw-primary);
            font-size: 15px;
            color: var(--rw-text);
            font-weight: 400;
        }

        .criteria-list li .criteria-letter {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            background: var(--rw-primary);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        /* Winding up modes */
        .mode-card {
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            border-radius: 14px;
            padding: 28px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .mode-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 10px 30px rgba(0, 173, 239, 0.12);
            transform: translateY(-4px);
        }

        .mode-card .mode-num {
            width: 44px;
            height: 44px;
            background: var(--rw-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 18px;
            margin: 0 auto 14px;
        }

        .mode-card h5 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .mode-card p {
            font-size: 14px;
            margin: 0;
        }

        /* MBRS steps */
        .mbrs-step {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 24px 0;
            border-bottom: 1px solid var(--rw-border);
        }

        .mbrs-step:last-child {
            border-bottom: none;
        }

        .mbrs-step-num {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            background: var(--rw-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 20px;
            color: white;
        }

        .mbrs-step h5 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .mbrs-step p {
            font-size: 14px;
            margin: 0;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 50%, var(--rw-accent) 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -15%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08), transparent 70%);
            border-radius: 50%;
        }

        .cta-section h2 {
            color: var(--rw-white);
            font-size: 38px;
        }

        .cta-section p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 17px;
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
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-rw-white:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
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
            border: 2px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-rw-outline:hover {
            background: white;
            color: var(--rw-accent);
            border-color: white;
            transform: translateY(-2px);
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background: var(--rw-dark);
            padding: 80px 0 0;
        }

        .footer-brand .brand-name {
            font-family: var(--font-heading);
            font-size: 24px;
            color: var(--rw-white);
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.4);
            font-size: 14px;
            margin-top: 16px;
            max-width: 320px;
        }

        .footer-title {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 600;
            color: var(--rw-white);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 24px;
        }

        .footer-links li {
            list-style: none;
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.45);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--rw-primary);
            padding-left: 6px;
        }

        .footer-contact li {
            list-style: none;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 14px;
        }

        .footer-contact i {
            color: var(--rw-primary);
            margin-top: 3px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 24px 0;
            margin-top: 60px;
        }

        .footer-bottom p {
            color: rgba(255, 255, 255, 0.3);
            font-size: 13px;
            margin: 0;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.4);
            margin-left: 8px;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--rw-primary);
            color: white;
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991.98px) {
            .desktop-nav {
                display: none !important;
            }

            .page-hero {
                padding: 80px 0 60px;
            }

            .page-hero h1 {
                font-size: 36px;
            }

            .section-title {
                font-size: 32px;
            }

            .services-overview,
            .service-detail {
                padding: 60px 0;
            }

            .service-detail-header h2 {
                font-size: 28px;
            }
        }

        @media (min-width: 1200px) {

            .navbar-toggler,
            .mobile-menu,
            .mobile-menu-overlay {
                display: none !important;
            }
        }

        @media (max-width: 575.98px) {
            .page-hero h1 {
                font-size: 30px;
            }

            .section-title {
                font-size: 26px;
            }

            .top-bar {
                display: none;
            }

            .cta-section h2 {
                font-size: 28px;
            }

            .service-detail-header {
                flex-direction: column;
                gap: 12px;
            }

            .service-detail-header h2 {
                font-size: 24px;
            }
        }

        /* ===== STICKY SOCIAL SIDEBAR ===== */
        .social-sidebar {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1030;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
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
            transition: all 0.3s ease;
            box-shadow: 4px 4px 15px rgba(0, 173, 239, 0.3);
            position: relative;
            z-index: 2;
        }

        .social-sidebar-toggle:hover {
            background: var(--rw-primary-dark);
            width: 52px;
        }

        .social-sidebar-toggle .toggle-icon {
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .social-sidebar.open .social-sidebar-toggle .toggle-icon {
            transform: rotate(180deg);
        }

        .social-sidebar-links {
            display: flex;
            flex-direction: column;
            gap: 3px;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.77, 0, 0.175, 1);
            pointer-events: none;
        }

        .social-sidebar.open .social-sidebar-links {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto;
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
            transition: all 0.3s ease;
            transform: translateX(-60px);
        }

        .social-sidebar-links a:hover {
            width: 56px;
        }

        .social-sidebar.open .social-sidebar-links a {
            transform: translateX(0);
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
            letter-spacing: 0.5px;
            padding: 6px 14px;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .social-sidebar-links a .social-tooltip::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 5px solid transparent;
            border-right-color: var(--rw-dark);
        }

        .social-sidebar-links a:hover .social-tooltip {
            opacity: 1;
            margin-left: 14px;
        }

        .social-sidebar-links .social-facebook {
            background: #1877F2;
        }

        .social-sidebar-links .social-tiktok {
            background: #010101;
        }

        .social-sidebar-links .social-viber {
            background: #7360F2;
        }

        .social-sidebar-links .social-whatsapp {
            background: #25D366;
        }

        .social-sidebar-links .social-linkedin {
            background: #0A66C2;
        }

        .social-sidebar-links .social-email {
            background: #6B7B8D;
        }

        .social-sidebar-links .social-twitter {
            background: #1DA1F2;
        }

        .social-sidebar-links .social-instagram {
            background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        }

        .social-sidebar-links .social-youtube {
            background: #FF0000;
        }

        .social-sidebar-links a:hover {
            filter: brightness(1.15);
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(1) {
            transition-delay: 0.03s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(2) {
            transition-delay: 0.06s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(3) {
            transition-delay: 0.09s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(4) {
            transition-delay: 0.12s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(5) {
            transition-delay: 0.15s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(6) {
            transition-delay: 0.18s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(7) {
            transition-delay: 0.21s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(8) {
            transition-delay: 0.24s;
        }

        .social-sidebar.open .social-sidebar-links a:nth-child(9) {
            transition-delay: 0.27s;
        }

        @keyframes pulse-ring {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 173, 239, 0.4);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(0, 173, 239, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 173, 239, 0);
            }
        }

        .social-sidebar-toggle {
            animation: pulse-ring 2.5s infinite;
        }

        .social-sidebar.open .social-sidebar-toggle {
            animation: none;
        }

        @media (max-width: 767.98px) {
            .social-sidebar {
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                transform: none;
                flex-direction: column;
                align-items: stretch;
            }

            .social-sidebar-toggle {
                width: 100%;
                height: 44px;
                border-radius: 12px 12px 0 0;
                box-shadow: 0 -4px 15px rgba(0, 173, 239, 0.2);
                flex-direction: row;
                gap: 8px;
                font-size: 14px;
            }

            .social-sidebar-toggle .toggle-label {
                display: inline;
                font-family: var(--font-body);
                font-weight: 600;
                font-size: 13px;
                letter-spacing: 1px;
                text-transform: uppercase;
            }

            .social-sidebar.open .social-sidebar-toggle .toggle-icon {
                transform: rotate(180deg);
            }

            .social-sidebar-links {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0;
                background: var(--rw-dark);
                padding: 12px 8px;
                transform: translateY(100%);
            }

            .social-sidebar.open .social-sidebar-links {
                transform: translateY(0);
            }

            .social-sidebar-links a {
                width: 44px;
                height: 44px;
                border-radius: 10px;
                margin: 3px;
                transform: translateY(30px);
            }

            .social-sidebar.open .social-sidebar-links a {
                transform: translateY(0);
            }

            .social-sidebar-links a .social-tooltip {
                display: none;
            }
        }

        /* ===== SCROLL-TO-TOP ===== */
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
            transition: all 0.3s ease;
            z-index: 999;
            box-shadow: 0 6px 20px rgba(0, 173, 239, 0.35);
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-4px);
            background: var(--rw-primary-dark);
        }
    </style>
</head>

<body>

    <!-- Top Bar -->
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

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="hero-pattern"></div>
        <div class="container position-relative">
            <div class="breadcrumb-nav mb-4" data-aos="fade-down" data-aos-delay="100">
                <a href="index.html">Home</a>
                <span class="divider">/</span>
                <span>Services</span>
            </div>
            <div class="hero-line" data-aos="fade-right" data-aos-delay="200"></div>
            <h1 data-aos="fade-up" data-aos-delay="300">Our Services</h1>
            <p data-aos="fade-up" data-aos-delay="400">Comprehensive professional services tailored to help your
                business grow, stay compliant, and thrive in an ever-changing regulatory landscape.</p>
        </div>
    </section>

    <!-- Services Overview Grid -->
    <section class="services-overview">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label justify-content-center" data-aos="fade-up">What We Offer</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Professional Services<br>You Can Trust
                </h2>
                <div class="service-count" data-aos="fade-up" data-aos-delay="150">
                    <i class="bi bi-grid-3x3-gap"></i> 10 Core Services
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="#audit" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-shield-check"></i></div>
                        <h5>Audit &amp; Assurance</h5>
                        <p>Statutory &amp; non-statutory audits</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                    <a href="#unaudit" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-file-earmark-text"></i></div>
                        <h5>Unaudited Financial Statements</h5>
                        <p>Audit exemption services</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="#taxation" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-percent"></i></div>
                        <h5>Taxation</h5>
                        <p>Strategic tax planning &amp; compliance</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                    <a href="#sst" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <h5>SST</h5>
                        <p>Sales &amp; Service Tax advisory</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="#liquidation" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-building-down"></i></div>
                        <h5>Liquidation</h5>
                        <p>Voluntary &amp; court winding up</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                    <a href="#corporate" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-briefcase"></i></div>
                        <h5>Corporate Services</h5>
                        <p>Incorporation &amp; secretarial</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="#accounting" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-calculator"></i></div>
                        <h5>Accounting &amp; E-Invoicing</h5>
                        <p>Full accounting &amp; SST reporting</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                    <a href="#mbrs" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-database-check"></i></div>
                        <h5>MBRS Conversion</h5>
                        <p>XBRL compliance &amp; filing</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6 offset-lg-1-5" data-aos="fade-up" data-aos-delay="100">
                    <a href="#training" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-mortarboard"></i></div>
                        <h5>Technical Training</h5>
                        <p>Workshops &amp; tailored courses</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                    <a href="#payroll" class="service-overview-card d-block">
                        <div class="soc-icon"><i class="bi bi-wallet2"></i></div>
                        <h5>Payroll Services</h5>
                        <p>Complete payroll management</p>
                        <span class="card-arrow"><i class="bi bi-arrow-down"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =============================== -->
    <!-- SERVICE DETAIL SECTIONS         -->
    <!-- =============================== -->

    <!-- 1. AUDIT AND ASSURANCE -->
    <section class="service-detail" id="audit">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">01</div>
                <h2>Audit &amp; Assurance</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">Statutory audit is one of RW's core business activities. It is a statutory
                        requirement under the Malaysian Companies Act, 2016 that a company incorporated in Malaysia has
                        to prepare its financial statements in accordance with applicable approved accounting standards,
                        and has to be audited in accordance with approved standards on auditing in Malaysia.</p>
                    <p class="lead-text">We have knowledgeable, skilled and experienced people who stay abreast of
                        accounting developments and have access to state-of-the-art auditing technology in carrying out
                        our audit effectively and efficiently. It also permits us to consider established facts
                        objectively in arriving at an unbiased audit opinion.</p>
                    <p class="lead-text">Apart from complying with statutory requirements, we encourage clients to turn
                        the legal necessity of audit into a business opportunity by ensuring that the right controls are
                        in place, so business assets are safe from negligent or criminal misappropriation; recommending
                        new ways to strengthen controls; and in general, suggesting new ways for our clients' business
                        to be run more cost effectively.</p>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box mb-4">
                        <div class="info-icon"><i class="bi bi-shield-check"></i></div>
                        <h4>Our Auditing Services</h4>
                        <p>Comprehensive audit solutions from statutory compliance to operational efficiency reviews.
                        </p>
                    </div>
                    <ul class="service-list">
                        <li>Statutory audits</li>
                        <li>Non-statutory audits</li>
                        <li>Management and operational audits</li>
                        <li>Internal controls and systems review</li>
                        <li>Review of financial reports</li>
                        <li>Internal audit</li>
                        <li>Agreed upon procedure reports</li>
                        <li>Financial accounting</li>
                        <li>Financial reporting standards</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. UNAUDITED FINANCIAL STATEMENTS -->
    <section class="service-detail" id="unaudit">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">02</div>
                <h2>Unaudited Financial Statements Services</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">We provide professional preparation of unaudited financial statements to assist
                        businesses with accurate financial reporting while meeting internal and external regulatory
                        requirements without the cost of an audit.</p>
                    <p class="lead-text">Pursuant to subsection 267(2) of the CA 2016, the Registrar may exempt any
                        private company from having to appoint an auditor according to the criteria and conditions as
                        set out in Practice Directive.</p>
                    <p class="lead-text">The audit exemption aims to reduce the financial burden for carrying company
                        audit on micro and small private companies, promoting ease of doing business whilst ensuring
                        financial accountability.</p>
                    <p class="lead-text">We are here to aid clients in situations where they are exempt from having to
                        undergo a formal audit and involves advising clients or helping them understand the criteria and
                        process for legally avoiding an audit.</p>

                    <h4 class="mt-5 mb-3" style="font-size:22px;">Qualifying Criteria for Audit Exemption</h4>
                    <p class="mb-4" style="color: var(--rw-text);">A private company qualifies for audit exemption if it
                        fulfils <strong>at least two (2)</strong> of the following criteria:</p>
                    <ul class="criteria-list">
                        <li>
                            <span class="criteria-letter">a</span>
                            <span>The annual revenue of the company during the current financial year and in the
                                immediate past two (2) financial years do not exceed <strong>RM3,000,000</strong></span>
                        </li>
                        <li>
                            <span class="criteria-letter">b</span>
                            <span>The total assets of the company in the current statement of financial position and in
                                the immediate past two (2) financial years do not exceed
                                <strong>RM3,000,000</strong></span>
                        </li>
                        <li>
                            <span class="criteria-letter">c</span>
                            <span>The number of employees at the end of the current financial year and in the immediate
                                past two (2) financial years do not exceed <strong>thirty (30)</strong></span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box mb-4">
                        <div class="info-icon"><i class="bi bi-file-earmark-check"></i></div>
                        <h4>Audit Exemption</h4>
                        <p>Reduce financial burden for micro and small private companies while ensuring financial
                            accountability.</p>
                    </div>
                    <div class="info-panel mt-4">
                        <div class="panel-badge">Reference</div>
                        <h5><i class="bi bi-link-45deg"></i> SSM Practice Directive</h5>
                        <p>For the full qualifying criteria and conditions, refer to SSM's Practice Directive on audit
                            exemption for certain categories of private companies.</p>
                        <a href="https://www.ssm.com.my/Pages/Legal_Framework/Document/NEW%20PD%2010-2024%20-%20Qualifying%20Criteria%20for%20Audit%20Exemption%20for%20Certain%20Categories%20of%20Private%20Companies%20(Portal).pdf"
                            target="_blank" class="feature-tag mt-2">
                            <i class="bi bi-box-arrow-up-right"></i> View PD 10-2024
                        </a>
                        <a href="https://www.ssm.com.my/Pages/Legal_Framework/Document/PART%20Q%20(19.3.2025).pdf"
                            target="_blank" class="feature-tag mt-2">
                            <i class="bi bi-box-arrow-up-right"></i> View Part Q
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. TAXATION -->
    <section class="service-detail" id="taxation">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">03</div>
                <h2>Taxation</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">We appreciate and understand the technicalities and legalities involved in
                        assessing clients' tax situations to obtain maximum tax benefit and relief. We will also take
                        care of routine tax compliance work as well as advice on specific tax issues that may be
                        required on an ad hoc basis.</p>
                    <p class="lead-text">As your tax consultants, we provide value-added and client-centric tax services
                        that help address your tax concerns — be it complying with filing requirements or strategic
                        planning to reduce your tax liabilities.</p>
                    <p class="lead-text">During tax audits and investigations by the Inland Revenue Board (IRB), we are
                        able to guide clients through the process and provide professional tax audit representation to
                        safeguard their position. We also offer tax review and audit services to detect any potential
                        problems and complications which may arise from an official tax audit by the IRB.</p>

                    <h4 class="mt-4 mb-3" style="font-size:20px;">Our Tax Services Include:</h4>
                    <div class="d-flex flex-wrap mb-4">
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Strategic tax planning</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Corporate taxation</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Individual taxation</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Tax compliance</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> IRB liaison</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Tax incentive applications</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Tax due diligence review</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Tax audits &amp;
                            investigations</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Indirect taxation</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Transfer pricing</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Capital statement</span>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box mb-4">
                        <div class="info-icon"><i class="bi bi-arrow-left-right"></i></div>
                        <h4>Transfer Pricing</h4>
                        <p>The Transfer Pricing Guidelines issued by the tax authorities provide taxpayers with
                            information on relevant legislation, methodologies for determining arm's length price and
                            administrative regulations.</p>
                    </div>
                    <h5 class="mb-3" style="font-size:17px; color: var(--rw-accent);">Our Transfer Pricing Services:
                    </h5>
                    <ul class="service-list">
                        <li>Undertaking a transfer pricing study to determine whether transfer prices in related party
                            transactions meet the arm's length standard</li>
                        <li>Benchmarking exercise</li>
                        <li>Representing clients to defend their transfer pricing policy in the event of a transfer
                            pricing audit</li>
                        <li>International tax planning through effective transfer pricing techniques</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SST -->
    <section class="service-detail" id="sst">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">04</div>
                <h2>SST (Sales &amp; Service Tax)</h2>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">Our team is well experienced to handle SST accounting for monthly and quarterly
                        reporting using Customs approved accounting software. We provide comprehensive SST advisory and
                        compliance services to ensure your business meets all Sales and Service Tax obligations
                        efficiently.</p>
                    <p class="lead-text">We help businesses navigate the complexities of SST registration, filing, and
                        reporting requirements, ensuring full compliance with the Royal Malaysian Customs Department
                        (RMCD) regulations.</p>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-receipt-cutoff"></i></div>
                        <h4>SST Compliance</h4>
                        <p>Monthly and quarterly reporting using Customs approved accounting software with full
                            regulatory compliance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. LIQUIDATION -->
    <section class="service-detail" id="liquidation">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">05</div>
                <h2>Liquidation</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">Winding up is a process in which the existence of a company is brought to an
                        end, where assets of a company are collected and realised. The proceeds collected are used to
                        discharge the company's debts and liabilities and the remaining balance (if any) will be
                        distributed amongst the contributories according to their entitlement.</p>
                    <p class="lead-text">Our qualified team of liquidators are well equipped to complete the liquidation
                        task in a timely and cost efficient manner.</p>

                    <h4 class="mt-4 mb-4" style="font-size:20px;">Two Modes of Winding Up</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="mode-card">
                                <div class="mode-num">1</div>
                                <h5>Voluntary Winding Up</h5>
                                <p>Initiated by the company's shareholders through a resolution.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mode-card">
                                <div class="mode-num">2</div>
                                <h5>Winding Up by Court</h5>
                                <p>Ordered by the court upon petition by an interested party.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-building-down"></i></div>
                        <h4>Professional Liquidation</h4>
                        <p>Our qualified team of liquidators ensures a timely and cost-efficient process, handling all
                            aspects from asset collection to distribution.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CORPORATE SERVICES -->
    <section class="service-detail" id="corporate">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">06</div>
                <h2>Corporate Services</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">The Companies Act sets out an extensive array of duties, responsibilities and
                        guidelines for administration of company affairs. Our corporate services team provides
                        comprehensive solutions to meet your business needs.</p>

                    <h4 class="mt-3 mb-3" style="font-size:20px;">Our Services Include:</h4>
                    <ul class="service-list">
                        <li>Incorporation of companies or shelf companies</li>
                        <li>Registration of business, regional or representative office</li>
                        <li>Company secretarial services</li>
                        <li>Liquidation and winding up</li>
                        <li>Special investigations</li>
                        <li>Stamping services</li>
                        <li>Licensing application services</li>
                    </ul>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-briefcase"></i></div>
                        <h4>End-to-End Corporate Solutions</h4>
                        <p>From company incorporation to secretarial services and special investigations — we cover the
                            full spectrum of corporate needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. ACCOUNTING & E-INVOICING -->
    <section class="service-detail" id="accounting">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">07</div>
                <h2>Accounting &amp; E-Invoicing Services</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">Our accounting services cater for sole proprietors, partnerships, companies and
                        cooperatives. Your business transactions will be updated and posted into the Accounting System
                        and we will prepare the Management Accounts for your review and analysis in order for you to
                        take a right and proper business decision which will also assist you in your tax planning.</p>
                    <p class="lead-text">Our team is well experienced to handle SST accounting for monthly and quarterly
                        reporting using Customs approved accounting software.</p>

                    <h4 class="mt-4 mb-3" style="font-size:20px;">E-Invoicing Services</h4>
                    <p class="lead-text">Our team is well equipped with the latest government regulations on electronic
                        invoicing requirements. Once appointed, we will liaise with your personnel to establish the
                        documentation and information flow to ensure a complete, accurate and timely invoicing cycle.
                    </p>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box mb-4">
                        <div class="info-icon"><i class="bi bi-calculator"></i></div>
                        <h4>Accounting Solutions</h4>
                        <p>Full accounting services for sole proprietors, partnerships, companies and cooperatives with
                            e-invoicing and SST compliant reporting.</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Sole Proprietors</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Partnerships</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Companies</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Cooperatives</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> Management Accounts</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> SST Reporting</span>
                        <span class="feature-tag"><i class="bi bi-check-circle"></i> E-Invoicing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. MBRS CONVERSION -->
    <section class="service-detail" id="mbrs">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">08</div>
                <h2>MBRS Conversion Services</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">The Companies Commission of Malaysia (SSM) has launched MBRS 2.0, an upgraded
                        version of the platform designed to streamline the submission of financial statements and other
                        statutory filings.</p>
                    <p class="lead-text">We are committed to ensuring that your company remains fully compliant with all
                        regulatory filing requirements. We will be assisting with all MBRS 2.0 filings and are available
                        to help guide you through this transition.</p>
                    <p class="lead-text">Our team of financial reporting experts is ready to guide businesses through
                        every step of MBRS compliance. From data conversion to final submission, we provide tailored
                        support to ensure a seamless transition.</p>

                    <h4 class="mt-4 mb-4" style="font-size:20px;">Our MBRS Process</h4>
                    <div class="mbrs-step">
                        <div class="mbrs-step-num">1</div>
                        <div>
                            <h5>Provision of Financial Statements</h5>
                            <p>We prepare and review your financial statements to ensure they are ready for conversion.
                            </p>
                        </div>
                    </div>
                    <div class="mbrs-step">
                        <div class="mbrs-step-num">2</div>
                        <div>
                            <h5>Conversion to XBRL Format</h5>
                            <p>Expert conversion of your financial data into the required XBRL taxonomy format.</p>
                        </div>
                    </div>
                    <div class="mbrs-step">
                        <div class="mbrs-step-num">3</div>
                        <div>
                            <h5>Submission via MBRS Portal</h5>
                            <p>Final review and electronic submission through the official MBRS portal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-database-check"></i></div>
                        <h4>MBRS 2.0 Compliance</h4>
                        <p>Seamless transition from data conversion to final submission with tailored expert support
                            every step of the way.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. TECHNICAL TRAINING -->
    <section class="service-detail" id="training">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">09</div>
                <h2>Technical Training</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">We provide workshops and seminars on accounting standards, SST changes, tax
                        updates, tax planning and training, payroll administration and conducting courses tailored to
                        the clients' industry requirements. Our trainers have vast
                        experience in handling internal and external courses for various industries.</p>
                    <ul class="service-list">
                        
                        <li>Courses tailored to the clients’ industry and specific needs</li>
                        <li>Workshops and seminars on accounting standards and SST</li>
                        <li>Trainers with vast experience in internal and external courses for various industries</li>
                        <li>Workshops and seminars on comprehensive tax planning</li>
                       
                    </ul>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-mortarboard"></i></div>
                        <h4>Industry-Tailored Training</h4>
                        <p>Our experienced trainers deliver customised workshops and courses designed to keep your team
                            up-to-date with the latest industry developments.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. PAYROLL SERVICES -->
    <section class="service-detail" id="payroll">
        <div class="container">
            <div class="service-detail-header" data-aos="fade-right">
                <div class="service-detail-number">10</div>
                <h2>Payroll Services</h2>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-7" data-aos="fade-up">
                    <p class="lead-text">Our team is well equipped with the government regulations on the labour
                        requirements in respect of salaries and other remunerations enjoyed by your staff.</p>
                    <p class="lead-text">Once appointed, we will liaise with your personnel to establish the cut-off
                        period and documentation and information flow to ensure a complete, accurate and timely payroll
                        cycle.</p>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="info-box">
                        <div class="info-icon"><i class="bi bi-wallet2"></i></div>
                        <h4>Complete Payroll Management</h4>
                        <p>Accurate, timely, and fully compliant payroll processing with seamless integration into your
                            business operations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2>Need Our Professional Services?</h2>
                    <p class="mb-0">Get in touch with our team today to discuss how we can help your business grow and
                        stay compliant.</p>
                </div>
                <div class="col-lg-5 text-lg-end" data-aos="fade-left">
                    <a href="contact.html" class="btn-rw-white me-2 mb-2">Get in Touch</a>
                    <a href="about.html" class="btn-rw-outline mb-2">Learn About Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <div class="brand-name">RW William PLT</div>
                        <p>A trusted name in chartered accounting since 2003. Providing professional excellence across
                            Malaysia with offices in 7 strategic locations.</p>
                        <p style="font-size:12px;color:rgba(255,255,255,.3);margin-top:8px">201906003458
                            (LLP0022270-LCA) & AF 1490</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links p-0">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="team.html">Our Team</a></li>
                        <li><a href="career.html">Careers</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links p-0">
                        <li><a href="services.html">Services</a></li>
                        <li><a href="clients.html">Our Clients</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5 class="footer-title">Head Office</h5>
                    <ul class="footer-contact p-0">
                        <li><i class="bi bi-geo-alt"></i><span>No. 9-3A, Mayang Plaza, Jalan SS 26/4, Taman Mayang Jaya,
                                47301 Petaling Jaya</span></li>
                        <li><i class="bi bi-telephone"></i><span>+603-7805 3859</span></li>
                        <li><i class="bi bi-envelope"></i><span><a href="mailto:richard@rwwilliam.com.my"
                                    target="_blank">richard@rwwilliam.com.my</a></span></li>

                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <p class="copyright"> <span>Copyright</span> ©
                            <script> document.write(new Date().getFullYear())  </script>
                            <span class="copyright">RW WILLIAM PLT </span> (201906003458 (LLP0022270-LCA) & AF1490)|
                            <span> All Rights Reserved | Powered by :<a href="http://www.webprotechnologi.com/"
                                    target="_blank"> WebPro Design </span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- Sticky Social Sidebar -->
    <div id="socialSidebar" class="social-sidebar open">
        <div class="social-sidebar-links">
            <a href="https://www.facebook.com/profile.php?id=100063468196295" target="_blank" class="social-facebook">
                <i class="bi bi-facebook"></i>
                <span class="social-tooltip">Facebook</span>
            </a>
            <a href="https://www.tiktok.com/@rwwilliamplt" target="_blank" class="social-tiktok">
                <i class="bi bi-tiktok"></i>
                <span class="social-tooltip">TikTok</span>
            </a>

            <a href="https://wa.me/60123806039?text=Enquiry from Website: Hi There! I am Looking for Audit and Assurance..."
                target="_blank" class="social-whatsapp">
                <i class="bi bi-whatsapp"></i>
                <span class="social-tooltip">WhatsApp</span>
            </a>
            <a href="https://www.linkedin.com/in/rwwilliam" target="_blank" class="social-linkedin">
                <i class="bi bi-linkedin"></i>
                <span class="social-tooltip">LinkedIn</span>
            </a>
            <a href="mailto:richard@rwwilliam.com.my" class="social-email">
                <i class="bi bi-envelope-fill"></i>
                <span class="social-tooltip">Email Us</span>
            </a>
            <a href="https://twitter.com/rwwilliamplt" target="_blank" class="social-twitter">
                <i class="bi bi-twitter"></i>
                <span class="social-tooltip">Twitter</span>
            </a>
            <a href="https://www.instagram.com/rw_william/" target="_blank" class="social-instagram">
                <i class="bi bi-instagram"></i>
                <span class="social-tooltip">Instagram</span>
            </a>
            <a href="https://www.youtube.com/channel/UCesZWUo9bHkU7soOS_0huFg" target="_blank" class="social-youtube">
                <i class="bi bi-youtube"></i>
                <span class="social-tooltip">YouTube</span>
            </a>
        </div>
        <button class="social-sidebar-toggle" id="socialToggle" title="Connect with us">
            <span class="toggle-icon"><i class="bi bi-share-fill"></i></span>
            <span class="toggle-label d-none d-md-none">Follow Us</span>
        </button>
    </div>
    <button class="scroll-top" id="scrollTop"><i class="bi bi-chevron-up"></i></button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({ duration: 700, once: true, offset: 80 });

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


        // Country Submenu Toggle
        const countryToggle = document.getElementById('countryToggle');
        const countrySubmenu = document.getElementById('countrySubmenu');
        if (countryToggle && countrySubmenu) countryToggle.addEventListener('click', function (e) {
            e.preventDefault();
            countrySubmenu.classList.toggle('open');
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-chevron-down');
            icon.classList.toggle('bi-chevron-up');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('mainNavbar');
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });
        // Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMobileMenu();
        });

        // Social Sidebar Toggle
        const socialSidebar = document.getElementById('socialSidebar');
        const socialToggle = document.getElementById('socialToggle');
        socialToggle.addEventListener('click', function () {
            socialSidebar.classList.toggle('open');
        });
        document.addEventListener('click', function (e) {
            if (!socialSidebar.contains(e.target) && socialSidebar.classList.contains('open')) {
                socialSidebar.classList.remove('open');
            }
        });

        // Scroll to Top button
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', function () {
            scrollTopBtn.classList.toggle('visible', window.scrollY > 400);
        });
        scrollTopBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for service overview cards
        document.querySelectorAll('.service-overview-card').forEach(card => {
            card.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = 80;
                    const position = target.getBoundingClientRect().top + window.scrollY - offset;
                    window.scrollTo({ top: position, behavior: 'smooth' });
                }
            });
        });
    </script>
</body>

</html>