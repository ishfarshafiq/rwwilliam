<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | RW William PLT</title>
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
            box-sizing: border-box;
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

        /* TOP BAR */
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

        /* NAVBAR */
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

        /* MOBILE MENU */
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

        /* PAGE HERO */
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

        /* CONTACT FORM SECTION */
        .contact-section {
            padding: 100px 0;
            position: relative
        }

        .contact-form-wrapper {
            background: var(--rw-white);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 75, 110, .08);
            border: 1px solid var(--rw-border);
            padding: 50px;
            position: relative;
            overflow: hidden
        }

        .contact-form-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--rw-primary), var(--rw-primary-dark), var(--rw-accent))
        }

        .form-floating {
            margin-bottom: 20px
        }

        .form-floating>.form-control,
        .form-floating>.form-select {
            border: 2px solid var(--rw-border);
            border-radius: 12px;
            height: 56px;
            padding: 16px;
            font-size: 15px;
            font-family: var(--font-body);
            color: var(--rw-text);
            transition: all .3s ease;
            background: var(--rw-white)
        }

        .form-floating>.form-control:focus,
        .form-floating>.form-select:focus {
            border-color: var(--rw-primary);
            box-shadow: 0 0 0 4px rgba(0, 173, 239, .1);
            outline: none
        }

        .form-floating>label {
            font-size: 14px;
            color: var(--rw-text-light);
            font-weight: 400;
            padding: 16px
        }

        .form-floating>textarea.form-control {
            height: 140px
        }

        .btn-submit {
            background: var(--rw-primary);
            color: white;
            padding: 16px 48px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border: 2px solid var(--rw-primary);
            transition: all .3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer
        }

        .btn-submit:hover {
            background: var(--rw-primary-dark);
            border-color: var(--rw-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 173, 239, .3);
            color: white
        }

        .btn-submit i {
            font-size: 18px;
            transition: transform .3s ease
        }

        .btn-submit:hover i {
            transform: translateX(4px)
        }

        /* Contact info sidebar */
        .contact-info-card {
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 50%, var(--rw-accent) 100%);
            border-radius: 20px;
            padding: 44px;
            color: white;
            position: relative;
            overflow: hidden;
            height: 100%
        }

        .contact-info-card::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
            border-radius: 50%
        }

        .contact-info-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -15%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, .05), transparent 70%);
            border-radius: 50%
        }

        .contact-info-card>* {
            position: relative;
            z-index: 1
        }

        .contact-info-card h3 {
            color: white;
            font-size: 28px;
            margin-bottom: 8px
        }

        .contact-info-card>p {
            color: rgba(255, 255, 255, .7);
            font-size: 15px;
            margin-bottom: 36px
        }

        .ci-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px
        }

        .ci-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .12);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white
        }

        .ci-item h5 {
            color: white;
            font-size: 15px;
            margin-bottom: 2px;
            font-family: var(--font-body);
            font-weight: 600
        }

        .ci-item p {
            color: rgba(255, 255, 255, .7);
            font-size: 14px;
            margin: 0;
            line-height: 1.6
        }

        .ci-item a {
            color: rgba(255, 255, 255, .85);
            font-size: 14px
        }

        .ci-item a:hover {
            color: white
        }

        .ci-social {
            display: flex;
            gap: 10px;
            margin-top: 36px;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, .15)
        }

        .ci-social a {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 17px;
            transition: all .3s ease
        }

        .ci-social a:hover {
            background: white;
            color: var(--rw-primary);
            transform: translateY(-3px)
        }

        /* OFFICES SECTION */
        .offices-section {
            padding: 100px 0;
            background: var(--rw-off-white);
            position: relative
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

        .office-card {
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            border-radius: 18px;
            overflow: hidden;
            transition: all .4s ease;
            height: 100%
        }

        .office-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 20px 50px rgba(0, 173, 239, .12);
            transform: translateY(-6px)
        }

        .office-card-header {
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-primary-dark));
            padding: 24px 28px;
            position: relative;
            overflow: hidden
        }

        .office-card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255, 255, 255, .1), transparent 70%);
            border-radius: 50%
        }

        .office-card-header h4 {
            color: white;
            font-size: 20px;
            margin: 0;
            position: relative;
            z-index: 1
        }

        .office-card-header .office-tag {
            display: inline-block;
            background: rgba(255, 255, 255, .2);
            color: white;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 3px 12px;
            border-radius: 20px;
            margin-top: 6px;
            position: relative;
            z-index: 1
        }

        .office-card-body {
            padding: 28px
        }

        .office-detail {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 18px
        }

        .office-detail:last-child {
            margin-bottom: 0
        }

        .office-detail i {
            color: var(--rw-primary);
            font-size: 16px;
            margin-top: 3px;
            flex-shrink: 0
        }

        .office-detail p {
            font-size: 14px;
            color: var(--rw-text);
            margin: 0;
            line-height: 1.6;
            font-weight: 400
        }

        .office-detail a {
            color: var(--rw-primary);
            font-weight: 500
        }

        .office-detail a:hover {
            color: var(--rw-primary-dark)
        }

        .office-map-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--rw-primary-light);
            color: var(--rw-primary);
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            transition: all .3s ease;
            margin-top: 8px
        }

        .office-map-btn:hover {
            background: var(--rw-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 173, 239, .25)
        }

        .office-map-btn i {
            font-size: 14px
        }

        /* MAP SECTION */
        .map-section {
            position: relative
        }

        .map-section iframe {
            width: 100%;
            height: 400px;
            border: none;
            display: block
        }

        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--rw-primary), var(--rw-primary-dark), var(--rw-accent));
            z-index: 2
        }

        /* FOOTER */
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

        /* SOCIAL SIDEBAR */
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

        /* SCROLL TOP */
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

        /* SUCCESS MESSAGE */
        .form-success {
            display: none;
            text-align: center;
            padding: 40px
        }

        .form-success.show {
            display: block
        }

        .form-success .success-icon {
            width: 80px;
            height: 80px;
            background: var(--rw-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
            color: white
        }

        .form-success h3 {
            font-size: 26px;
            margin-bottom: 10px
        }

        .form-success p {
            font-size: 16px
        }

        /* RESPONSIVE */
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

            .contact-section {
                padding: 60px 0
            }

            .offices-section {
                padding: 60px 0
            }

            .contact-form-wrapper {
                padding: 30px
            }

            .contact-info-card {
                padding: 30px;
                margin-top: 30px
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

            .contact-form-wrapper {
                padding: 24px
            }

            .contact-info-card {
                padding: 24px
            }
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
            <div class="breadcrumb-nav mb-4" data-aos="fade-down"><a href="index.html">Home</a><span
                    class="divider">/</span><span>Contact Us</span></div>
            <div class="hero-line" data-aos="fade-right"></div>
            <h1 data-aos="fade-up">Contact Us</h1>
            <p data-aos="fade-up" data-aos-delay="100">Have a question or ready to get started? Reach out to our team —
                we'd love to hear from you.</p>
        </div>
    </section>

    <!-- Contact Form + Info -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="contact-form-wrapper">
                        <h2 style="font-size:30px;margin-bottom:6px">Send Us a Message</h2>
                        <p style="margin-bottom:32px">Fill in the form below and our team will get back to you within 24
                            hours.</p>

                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstName" placeholder="First Name"
                                            required>
                                        <label for="firstName"><i class="bi bi-person me-1"></i> First Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lastName" placeholder="Last Name"
                                            required>
                                        <label for="lastName"><i class="bi bi-person me-1"></i> Last Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            required>
                                        <label for="email"><i class="bi bi-envelope me-1"></i> Email Address *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone" placeholder="Phone">
                                        <label for="phone"><i class="bi bi-telephone me-1"></i> Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="company" placeholder="Company">
                                        <label for="company"><i class="bi bi-building me-1"></i> Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="service">
                                            <option value="" selected disabled>Select a service</option>
                                            <option>Audit & Assurance</option>
                                            <option>Unaudited Financial Statements</option>
                                            <option>Taxation</option>
                                            <option>SST</option>
                                            <option>Liquidation</option>
                                            <option>Corporate Services</option>
                                            <option>Accounting & E-Invoicing</option>
                                            <option>MBRS Conversion</option>
                                            <option>Technical Training</option>
                                            <option>Payroll Services</option>
                                            <option>Other</option>
                                        </select>
                                        <label for="service"><i class="bi bi-briefcase me-1"></i> Service Interested
                                            In</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" placeholder="Message"
                                            style="height:140px" required></textarea>
                                        <label for="message"><i class="bi bi-chat-dots me-1"></i> Your Message *</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-submit">Send Message <i
                                            class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="form-success" id="formSuccess">
                            <div class="success-icon"><i class="bi bi-check-lg"></i></div>
                            <h3>Message Sent!</h3>
                            <p>Thank you for reaching out. Our team will get back to you within 24 hours.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade-left">
                    <div class="contact-info-card">
                        <h3>Get in Touch</h3>
                        <p>We're here to help your business grow. Contact our headquarters or visit any of our 6 offices
                            across Malaysia.</p>
                        <div class="ci-item">
                            <div class="ci-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <h5>Head Office</h5>
                                <p>No. 9-3A, Mayang Plaza, Jalan SS 26/4<br>Taman Mayang Jaya, 47301 Petaling
                                    Jaya<br>Selangor Darul Ehsan</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <h5>Phone</h5><a href="tel:+60378053859">+603-7805 3859</a><br>
                                <p style="font-size:13px;margin-top:2px">Fax: +603-7805 3871</p>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <h5>Email</h5><a href="mailto:richard@rwwilliam.com.my">richard@rwwilliam.com.my</a>
                            </div>
                        </div>
                        <div class="ci-item">
                            <div class="ci-icon"><i class="bi bi-clock-fill"></i></div>
                            <div>
                                <h5>Business Hours</h5>
                                <p>Mon – Fri: 8:30 AM – 5:30 PM<br>Sat – Sun: Closed</p>
                            </div>
                        </div>
                        <div class="ci-social">
                            <a href="https://www.facebook.com/profile.php?id=100063468196295" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="https://www.linkedin.com/in/rwwilliam" target="_blank">
                                <i class="bi bi-linkedin"></i>
                            </a>

                            <a href="https://www.instagram.com/rw_william/" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a href="https://wa.me/60123806039?text=Enquiry from Website: Hi There! I am Looking for Audit and Assurance..."
                                target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <a href="https://www.tiktok.com/@rwwilliamplt" target="_blank">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Offices -->
    <section class="offices-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label justify-content-center" data-aos="fade-up">Nationwide Presence</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="50">Our Offices</h2>
                <p class="mx-auto" style="max-width:600px" data-aos="fade-up" data-aos-delay="100">6 offices
                    strategically located across Malaysia to serve you better.</p>
            </div>
            <div class="row g-4">
                <!-- PJ -->
                <div id="petalingjaya" class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="office-card">
                        <div class="office-card-header">
                            <h4>Petaling Jaya</h4><span class="office-tag">Headquarters</span>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>No. 9-3A, Mayang Plaza, Jalan SS 26/4, Taman Mayang Jaya, 47301 Petaling Jaya,
                                    Selangor Darul Ehsan.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+60378053859">+603-7805 3859</a><br><span
                                        style="color:var(--rw-text-light);font-size:13px">Fax: +603-7805 3871</span></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:richard@rwwilliam.com.my">richard@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Mayang+Plaza+Petaling+Jaya" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
                <!-- Klang -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="office-card" id="klang">
                        <div class="office-card-header">
                            <h4>Klang</h4>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>Suite A, No.21A, 1st Floor Jalan Bayu Tinggi 7, Taman Bayu Tinggi, 41200 Klang,
                                    Selangor Darul Ehsan.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+60333247062">+603-3324 7062</a><br><span
                                        style="color:var(--rw-text-light);font-size:13px">Fax: +603-3324 7063</span></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:auditklang@rwwilliam.com.my">auditklang@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Taman+Bayu+Tinggi+Klang" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
                <!-- Ipoh -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="office-card" id="ipoh">
                        <div class="office-card-header">
                            <h4>Ipoh</h4>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>No.52A, Jalan Medan Ipoh 1E, Medan Ipoh Bistari, 31400 Ipoh, Perak.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+6055415115">+605-541 5115</a></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:jassen@rwwilliam.com.my">jassen@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Medan+Ipoh+Bistari+Ipoh" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
                <!-- Seremban -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="office-card" id="seremban">
                        <div class="office-card-header">
                            <h4>Seremban</h4>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>265-B-1, Taman AST Jalan Sg. Ujong, 70200 Seremban, Negeri Sembilan.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+6067628330">+606-762 8330 / 764 8330</a><br><span
                                        style="color:var(--rw-text-light);font-size:13px">Fax: +606-763 3684</span></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:auditns@rwwilliam.com.my">auditns@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Taman+AST+Seremban" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
                <!-- Johor Bahru -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="office-card" id="johorbahru">
                        <div class="office-card-header">
                            <h4>Johor Bahru</h4>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>39-A, Jalan Sagu 15, Taman Daya, 81100 Johor Bahru, Johor Darul Takzim.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+6077102181">+607-710 2181</a></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:auditjb@rwwilliam.com.my">auditjb@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Taman+Daya+Johor+Bahru" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
                <!-- Penang -->
                <div id="perai" class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="office-card">
                        <div class="office-card-header">
                            <h4>Perai, Penang</h4>
                        </div>
                        <div class="office-card-body">
                            <div class="office-detail"><i class="bi bi-geo-alt-fill"></i>
                                <p>1311-B, 1st Floor, Jalan Baru, Taman Chai Leng, 13700 Perai, Penang.</p>
                            </div>
                            <div class="office-detail"><i class="bi bi-telephone-fill"></i>
                                <p><a href="tel:+6043999203">+604-399 9203</a></p>
                            </div>
                            <div class="office-detail"><i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:kugan@rwwilliam.com.my">kugan@rwwilliam.com.my</a></p>
                            </div>
                            <a href="https://maps.google.com/?q=Taman+Chai+Leng+Perai+Penang" target="_blank"
                                class="office-map-btn"><i class="bi bi-map"></i> View on Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map (HQ) -->
    <section class="map-section">
        <div class="map-overlay"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.003!2d101.6145!3d3.1165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4f5a8e5b5e3d%3A0x0!2sMayang+Plaza!5e0!3m2!1sen!2smy!4v1"
            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop"><i class="bi bi-chevron-up"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });

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

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const form = this;
            const btn = form.querySelector('.btn-submit');
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Sending...';
            btn.style.pointerEvents = 'none';
            setTimeout(function () {
                form.style.display = 'none';
                document.querySelector('.contact-form-wrapper h2').style.display = 'none';
                document.querySelector('.contact-form-wrapper > p').style.display = 'none';
                document.getElementById('formSuccess').classList.add('show');
            }, 1500);
        });
    </script>
</body>

</html>