<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team | RW William PLT</title>
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
            font-weight: 400;
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
            font-weight: 400;
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
            padding: 133px 0 80px;
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

        .dept-section {
            padding: 80px 0;
            position: relative
        }

        .dept-section:nth-child(even) {
            background: var(--rw-off-white)
        }

        .dept-header {
            margin-bottom: 50px
        }

        .dept-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--rw-primary);
            color: white;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px
        }

        .dept-badge i {
            font-size: 16px
        }

        .dept-title {
            font-size: 36px;
            margin-bottom: 10px
        }

        .dept-desc {
            max-width: 650px;
            font-size: 16px
        }

        .team-counter {
            display: flex;
            gap: 30px;
            margin-top: 24px;
            flex-wrap: wrap
        }

        .team-counter-item {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .team-counter-num {
            font-family: var(--font-heading);
            font-size: 32px;
            color: var(--rw-primary);
            line-height: 1
        }

        .team-counter-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--rw-text-light);
            font-weight: 500
        }

        .partner-card {
            background: var(--rw-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 75, 110, .08);
            transition: all .4s ease;
            border: 1px solid var(--rw-border)
        }

        .partner-card:hover {
            box-shadow: 0 25px 60px rgba(0, 173, 239, .15);
            transform: translateY(-6px);
            border-color: var(--rw-primary)
        }

        .partner-img {
            height: 100%;
            min-height: 380px;
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden
        }

        .partner-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, .04) 1px, transparent 1px);
            background-size: 20px 20px
        }

        .partner-img .initials {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            border: 2px solid rgba(255, 255, 255, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 38px;
            color: white;
            position: relative
        }

        .partner-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .partner-content {
            padding: 40px
        }

        .partner-content .partner-name {
            font-size: 28px;
            margin-bottom: 4px
        }

        .partner-content .partner-role {
            color: var(--rw-primary);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 6px
        }

        .partner-content .partner-location {
            font-size: 13px;
            color: var(--rw-text-light);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .partner-content .partner-location i {
            color: var(--rw-primary)
        }

        .partner-titles {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 20px
        }

        .partner-titles .title-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--rw-primary-light);
            border: 1px solid rgba(0, 173, 239, .12);
            border-radius: 6px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 500;
            color: var(--rw-accent)
        }

        .partner-titles .title-tag i {
            color: var(--rw-primary);
            font-size: 11px
        }

        .qual-list {
            list-style: none;
            padding: 0;
            margin: 0 0 16px
        }

        .qual-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 6px 0;
            font-size: 13px;
            color: var(--rw-text-light);
            font-weight: 400;
            line-height: 1.5
        }

        .qual-list li::before {
            content: '';
            flex-shrink: 0;
            width: 6px;
            height: 6px;
            background: var(--rw-primary);
            border-radius: 50%;
            margin-top: 6px
        }

        .partner-exp {
            font-size: 13px;
            color: var(--rw-text-light);
            margin-top: 12px
        }

        .partner-exp strong {
            color: var(--rw-text);
            font-weight: 600
        }

        .partner-since {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--rw-primary);
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 20px;
            margin-top: 16px
        }

        .team-card {
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all .4s ease;
            height: 100%
        }

        .team-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 15px 40px rgba(0, 173, 239, .12);
            transform: translateY(-5px)
        }

        .team-card-img {
            height: 260px;
            background: linear-gradient(135deg, var(--rw-primary-dark), var(--rw-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden
        }

        .team-card-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, .04) 1px, transparent 1px);
            background-size: 16px 16px
        }

        .team-card-img .initials-sm {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            border: 2px solid rgba(255, 255, 255, .2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 24px;
            color: white;
            position: relative
        }

        .team-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .team-card-body {
            padding: 22px 20px
        }

        .team-card-body .tc-name {
            font-size: 18px;
            margin-bottom: 2px;
            line-height: 1.2
        }

        .team-card-body .tc-location {
            font-size: 12px;
            color: var(--rw-primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 10px
        }

        .team-card-body .tc-location i {
            font-size: 11px
        }

        .team-card-body .tc-grad {
            font-size: 12px;
            color: var(--rw-text-light);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .team-card-body .tc-grad i {
            color: var(--rw-primary);
            font-size: 13px;
            flex-shrink: 0
        }

        .tc-quals {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            margin-bottom: 10px
        }

        .tc-quals .tq {
            font-size: 11px;
            background: var(--rw-primary-light);
            color: var(--rw-accent);
            padding: 3px 10px;
            border-radius: 4px;
            font-weight: 500
        }

        .tc-exp-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            margin-bottom: 10px
        }

        .tc-exp-tags .exp-tag {
            font-size: 10px;
            background: var(--rw-off-white);
            border: 1px solid var(--rw-border);
            color: var(--rw-text-light);
            padding: 2px 8px;
            border-radius: 3px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .5px
        }

        .tc-since {
            font-size: 11px;
            color: var(--rw-white);
            background: var(--rw-primary);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 12px;
            font-weight: 600
        }

        .team-grid-hidden {
            display: none
        }

        .team-grid-hidden.show {
            display: flex
        }

        .view-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--rw-white);
            border: 2px solid var(--rw-primary);
            color: var(--rw-primary);
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all .3s ease;
            margin-top: 30px
        }

        .view-more-btn:hover {
            background: var(--rw-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 173, 239, .25)
        }

        .view-more-btn i {
            transition: transform .3s ease
        }

        .view-more-btn.expanded i {
            transform: rotate(180deg)
        }

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
            letter-spacing: .5px;
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
                padding: 176px 0 60px
            }

            .page-hero h1 {
                font-size: 36px
            }

            .dept-section {
                padding: 60px 0
            }

            .dept-title {
                font-size: 28px
            }

            .partner-img {
                min-height: 280px
            }

            .partner-content {
                padding: 28px
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

            .top-bar {
                display: none
            }

            .cta-section h2 {
                font-size: 28px
            }

            .team-card-img {
                height: 160px
            }
        }

        /* ── Team Search ───────────────────────────────────────── */
        .team-search-section {
            background: var(--rw-primary-lighter);
            border-bottom: 1px solid var(--rw-border);
            padding: 5px 0;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0,173,239,.10);
        }
        .team-search-spacer {
            display: block;
        }

        .team-search-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
        }

        .team-search-input-wrap {
            position: relative;
            width: 100%;
            max-width: 580px;
        }

        .team-search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--rw-primary);
            font-size: 18px;
            pointer-events: none;
        }

        .team-search-input {
            width: 100%;
            padding: 14px 48px 14px 50px;
            border: 2px solid var(--rw-border);
            border-radius: 50px;
            font-family: var(--font-body);
            font-size: 15px;
            color: var(--rw-text);
            background: var(--rw-white);
            outline: none;
            transition: border-color .25s, box-shadow .25s;
            box-shadow: 0 2px 12px rgba(0,0,0,.05);
        }

        .team-search-input:focus {
            border-color: var(--rw-primary);
            box-shadow: 0 0 0 4px rgba(0,173,239,.12);
        }

        .team-search-clear {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--rw-text-light);
            font-size: 14px;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 50%;
            display: none;
            transition: color .2s, background .2s;
        }

        .team-search-clear:hover {
            color: var(--rw-primary);
            background: var(--rw-primary-light);
        }

        .team-search-clear.visible { display: flex; align-items: center; justify-content: center; }

        .team-search-results-info {
            font-size: 13px;
            color: var(--rw-text-light);
            min-height: 18px;
            font-weight: 500;
        }

        .team-search-results-info span { color: var(--rw-primary); font-weight: 600; }

        .team-no-results {
            display: none;
            text-align: center;
            padding: 32px 0;
            color: var(--rw-text-light);
            font-size: 15px;
        }

        .team-no-results i { font-size: 40px; display: block; margin-bottom: 10px; color: var(--rw-border); }

        @media(max-width:575.98px) {
            .team-search-section { padding: 14px 0; }
            .team-search-input { font-size: 14px; padding: 12px 44px 12px 44px; }
        }
    </style>
</head>

<body>
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="/cdn-cgi/l/email-protection#88fae1ebe0e9faecc8faffffe1e4e4e1e9e5a6ebe7e5a6e5f1"><i class="bi bi-envelope me-1"></i>
                        <span class="__cf_email__" data-cfemail="74061d171c150610340603031d18181d15195a171b195a190d">[email&#160;protected]</span></a>
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
            <div class="breadcrumb-nav mb-4" data-aos="fade-down"><a href="index.html">Home</a><span
                    class="divider">/</span><span>Our Team</span></div>
            <div class="hero-line" data-aos="fade-right"></div>
            <h1 data-aos="fade-up">Our Team</h1>
            <p data-aos="fade-up" data-aos-delay="100">A dedicated team of 50+ professionals across 7 offices, combining
                expertise in audit, tax, accounting, and corporate services to serve over 2,000 clients.</p>
        </div>
    </section>

    <!-- SEARCH BAR -->
    <section class="team-search-section">
        <div class="container">
            <div class="team-search-wrap">
                <div class="team-search-input-wrap">
                    <i class="bi bi-search team-search-icon"></i>
                    <input type="text" id="teamSearchInput" class="team-search-input" placeholder="Search by name, title, role, or expertise…" autocomplete="off">
                    <button class="team-search-clear" id="teamSearchClear" title="Clear search"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="team-search-results-info" id="teamSearchInfo"></div>
            </div>
        </div>
    </section>
    <div class="team-search-spacer" id="teamSearchSpacer"></div>

    <!-- PARTNERS -->
   <section class="dept-section" id="partners">
    <div class="container">
        <div class="dept-header" data-aos="fade-up">
            <div class="dept-badge"><i class="bi bi-star-fill"></i> Leadership</div>
            <h2 class="dept-title">Partners</h2>
            <p class="dept-desc">Our partners bring decades of combined experience in audit, taxation, and advisory,
                leading the firm with vision and integrity.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="partner-card mb-5" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-lg-4">
                            <div class="partner-img">
                                <img src="img/team/richard.jpg" alt="richard">
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="partner-content">
                                <div class="partner-role">Founder &amp; Lead Partner</div>
                                <h3 class="partner-name">Richard William</h3>
                                <div class="partner-location"><i class="bi bi-geo-alt-fill"></i> Petaling Jaya</div>

                                <div class="partner-titles">
                                    <span class="title-tag"><i class="bi bi-check-circle-fill"></i> Licensed Tax Agent</span>
                                    <span class="title-tag"><i class="bi bi-check-circle-fill"></i> Approved Company Auditor</span>
                                    <span class="title-tag"><i class="bi bi-check-circle-fill"></i> Approved HRDF Trainer</span>
                                    <span class="title-tag"><i class="bi bi-check-circle-fill"></i> SST Tax Agent (RMCD)</span>
                                </div>

                                <p style="font-size:13px;color:var(--rw-text-light);margin-bottom:12px">
                                    <i class="bi bi-mortarboard me-1" style="color:var(--rw-primary)"></i>
                                    Ungku Omar Polytechnic
                                </p>

                                <ul class="qual-list">
                                    <li>Member of Malaysian Institute of Accountants (MIA)</li>
                                    <li>Member of Malaysian Institute of Certified Public Accountants (MICPA)</li>
                                    <li>Member of Chartered Tax Institute of Malaysia (CTIM)</li>
                                    <li>Member of Institute of Approved Company Secretaries (IACS)</li>
                                    <li>Member of Institute of Internal Auditors Malaysia (IIA Malaysia)</li>
                                </ul>

                                <div class="partner-exp">
                                    <strong>Experience:</strong> Accounting, audit, corporate advisory,
                                    secretarial and taxation. Advised local and international clients across a broad range
                                    of industries.
                                </div>

                                <span class="partner-since">
                                    <i class="bi bi-calendar3"></i> Founded 1 April 2003
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="partner-card" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-lg-4">
                            <div class="partner-img">
                                <img src="img/team/Yeo-Seow-Yong.jpg" alt="Yeo-Seow-Yong">
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="partner-content">
                                <div class="partner-role">Partner</div>
                                <h3 class="partner-name">Yeo Seow Yong</h3>
                                <div class="partner-location"><i class="bi bi-geo-alt-fill"></i> RW William</div>

                                <div class="partner-titles">
                                    <span class="title-tag"><i class="bi bi-check-circle-fill"></i> Approved Company Auditor</span>
                                </div>

                                <ul class="qual-list">
                                    <li>Member of Malaysian Institute of Accountants (MIA)</li>
                                    <li>Member of Chartered Accountants Australia &amp; New Zealand</li>
                                </ul>

                                <div class="partner-exp">
                                    <strong>Experience:</strong> Finance Director at a Dutch multinational
                                    (semiconductor) company. Group Accountant of a Bursa Malaysia listed
                                    company. Audit Manager of a Big 4 firm. Internal Audit Officer for local banks.
                                </div>

                                <span class="partner-since">
                                    <i class="bi bi-calendar3"></i> Since January 2026
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- PRINCIPALS -->
    <section class="dept-section" id="principals">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-award-fill"></i> Senior Management</div>
                <h2 class="dept-title">Principals</h2>
                <p class="dept-desc">Experienced leaders overseeing operations and ensuring the highest standard of
                    service delivery across offices.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/tan-mui-leng.jpg" alt="tan-mui-leng">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tan Mui Leng</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Petaling Jaya</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Curtin Univ. of Technology,
                                Perth</div>
                            <div class="tc-quals"><span class="tq">B.Com (Acc & Fin)</span><span class="tq">CPA
                                    Australia</span><span class="tq">MIA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Advisory</span><span
                                    class="exp-tag">Finance</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2005</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/sitifaizah.jpg" alt="sitifaizah">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Siti Faizah</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Petaling Jaya</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">MIA</span><span
                                    class="tq">ACCA Affiliate</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2005</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/tan_chiang.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tan Ching Yong</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Johor Bahru</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Sunway College, JB</div>
                            <div class="tc-quals"><span class="tq">Prof. Diploma</span><span class="tq">ACCA
                                    CAT</span><span class="tq">LCCI</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Advisory</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2008</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/kugan.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Kuganeswaran</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Penang</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> IAAP</div>
                            <div class="tc-quals"><span class="tq">Prof. Diploma</span><span class="tq">CTIM</span><span
                                    class="tq">MIHRM</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Banking</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2010</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AUDIT AND ASSURANCE -->
    <section class="dept-section" id="audit-team">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-shield-check"></i> Audit &amp; Assurance</div>
                <h2 class="dept-title">Audit &amp; Assurance Team</h2>
                <p class="dept-desc">Our largest division with professionals across all offices delivering statutory,
                    internal, and management audits.</p>
                <div class="team-counter">
                    <div class="team-counter-item"><span class="team-counter-num">27</span><span
                            class="team-counter-label">Members</span></div>
                    <div class="team-counter-item"><span class="team-counter-num">6</span><span
                            class="team-counter-label">Offices</span></div>
                </div>
            </div>
            <div class="row g-4" id="auditGridVisible">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/hema-darshini.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Hema Darshini</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Acc</span><span class="tq">MIA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2019</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/nurina.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Nurina Rasyiqah</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">MIA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                       <div class="team-card-img">
                            <img src="img/team/ling.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Ling Yuh Seng</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UTAR</div>
                            <div class="tc-quals"><span class="tq">B.Com (Hons) Acc</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/navina.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Navina</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Segi College</div>
                            <div class="tc-quals"><span class="tq">B.Com (Hons) Acc & Fin</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/sanggavi.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Sanggavi</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UNITAR</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/durrani.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Durrani Indrarina</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                       <div class="team-card-img">
                            <img src="img/team/chai-jian-yong.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Chai Jian Yeong</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> ZhengZhou Univ., China</div>
                            <div class="tc-quals"><span class="tq">B.Financial Mgmt</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/rennita.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Renitha</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 team-grid-hidden mt-0" id="auditGridHidden">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/ChuYingLoong.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Chu Ying Loong</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Sunway College</div>
                            <div class="tc-quals"><span class="tq">ACCA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/Hashveny.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Hashveny</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Finance (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/yanyi.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Wong Yan Yie</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Univ. of Nottingham MY</div>
                            <div class="tc-quals"><span class="tq">BSc (Hons) FAM</span><span class="tq">ACCA
                                    Affiliate</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/NurinAzfar.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Nurin Azfar</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UniKL Business School</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/ThamMaoHui.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tham Mao Hui</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> SEGi College Subang Jaya</div>
                            <div class="tc-quals"><span class="tq">B.Acc & Fin</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span class="exp-tag">Tax</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2025</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                         <div class="team-card-img">
                            <img src="img/team/WongShuMei.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Wong Shu Mei</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Klang</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Kolej Tuanku Abdul Rahman</div>
                            <div class="tc-quals"><span class="tq">MICPA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/WongBooMien.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Wong Boon Mien</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Institut Jati</div>
                            <div class="tc-quals"><span class="tq">AIA Prof. II</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2005</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                       <div class="team-card-img">
                            <img src="img/team/TeyShiaoFun.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tey Shiao Fun</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Univ. of Wollongong, AU</div>
                            <div class="tc-quals"><span class="tq">B.Com (Acc)</span><span class="tq">CPA
                                    Australia</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/TongJunKeat.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tong Jun Keat</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> TARUMT</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">ACCA
                                    (Pursuing)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2021</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                             <img src="img/team/SeeXiaoTong.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">See Xiao Tong</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> INTI International Univ.</div>
                            <div class="tc-quals"><span class="tq">B.Acc & Fin (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/TanYeeMun.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tan Yee Mun</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UTAR</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/ChinPuiWen.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Chin Pui Wen</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Univ. Malaysia, Sarawak</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/TheenaFlora.jpg">
                        </div>
                        <div class="team-card-body">                          
                            <h5 class="tc-name">Theena Flora</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> MSU</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">MIA</span><span
                                    class="tq">ASEAN CPA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/taranjit.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Taran Jit Kaur</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> QUIP</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                             <img src="img/team/k.kalaivani.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">K. Kalaivaani</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Cosmopoint College</div>
                            <div class="tc-quals"><span class="tq">Dip. Accounting</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/shakila.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Shakila</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/sarathadevi.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Saratha Devi</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UPSI</div>
                            <div class="tc-quals"><span class="tq">M.Ed (Accounting)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Audit</span><span
                                    class="exp-tag">Assurance</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/tan-darvin.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Tan Darwin</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Johor Bahru</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Systematic Education Group</div>
                            <div class="tc-quals"><span class="tq">Dip. Business</span><span class="tq">ACCA CAT</span>
                            </div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Advisory</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2008</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="team-card">
                        <div class="team-card-img">
                             <img src="img/team/siti-atika.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Siti Atikah</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Penang</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> PTSB</div>
                            <div class="tc-quals"><span class="tq">Dip. Accounting</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Assurance</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center"><button class="view-more-btn" data-target="auditGridHidden"><i
                        class="bi bi-chevron-down"></i> View All 27 Members</button></div>
        </div>
    </section>

    <!-- TAX ADVISORY -->
    <section class="dept-section" id="tax-team">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-percent"></i> Tax Advisory</div>
                <h2 class="dept-title">Tax Advisory Team</h2>
                <p class="dept-desc">Expert tax consultants providing strategic planning, compliance, and representation
                    before the IRB.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                             <img src="img/team/mazlina.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Mazlina</h5>                        
                            <p>Tax Director</p>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UPM</div>
                            <div class="tc-quals"><span class="tq">Dip. Business</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2008</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/zi-sang.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Zi Sang</h5>
                            <p>Tax Director and Licensed Tax Agent</p>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UKM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">MIA</span><span
                                    class="tq">CTIM</span><span class="tq">IACS</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2014</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/Hui-Yi.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Hui Yi</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> Sunway College (KL)</div>
                            <div class="tc-quals"><span class="tq">Dip. Business Admin</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/pavithra.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Pavitra</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UNISEL</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2014</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SST & E-INVOICING -->
    <section class="dept-section" id="sst-team">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-calculator"></i> Accounting</div>
                <h2 class="dept-title">SST, E-Invoicing &amp; Accounting Team</h2>
                <p class="dept-desc">Specialists in SST compliance, e-invoicing implementation, and full-cycle
                    accounting services.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                          <img src="img/team/Siti-Raudhah.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Siti Raudhah</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/janova.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Janova</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Banking (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2024</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/yasotha.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Yasotha</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Penang</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2003</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/C.Priyatarsshini.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">C.Priyatarsshini</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Penang</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">M.Taxation</span>
                            </div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORPORATE SECRETARY -->
    <section class="dept-section" id="cosec-team">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-briefcase-fill"></i> Corporate Secretary</div>
                <h2 class="dept-title">Corporate Secretary Team</h2>
                <p class="dept-desc">Licensed corporate secretaries managing your company compliance and statutory
                    filings.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/hana.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Hana Afeeza</h5>
                            <p>Corporate Director and Licensed Corporate Secretary (LS0010755)</p>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Corp Admin</span><span class="tq">IACS</span><span
                                    class="tq">LS0010755</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Management</span><span
                                    class="exp-tag">Secretarial</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/puterisarah.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Puteri Sarah Hanis</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UiTM</div>
                            <div class="tc-quals"><span class="tq">B.Corp Admin</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Secretarial</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/Puteri-Mahhanum.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Puteri Mahhanum</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> USIM</div>
                            <div class="tc-quals"><span class="tq">B.Corp Admin</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Secretarial</span></div><span
                                class="tc-since"><i class="bi bi-calendar3"></i> Since 2025</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/jassen.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Jassen Raj</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Ipoh</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UNITEN, Pahang</div>
                            <div class="tc-quals"><span class="tq">B.Acc (Hons)</span><span class="tq">MIA</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Accounting</span><span
                                    class="exp-tag">Audit</span><span class="exp-tag">Secretarial</span><span
                                    class="exp-tag">Tax</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2015</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/see-poh.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">See Poh Lam</h5>
                            <p>Licensed Corporate Secretary (LS0002467)</p>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> Seremban</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> IIUM</div>
                            <div class="tc-quals"><span class="tq">CiCA</span><span class="tq">IACS Fellow</span><span
                                    class="tq">LS0002467</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Management</span><span
                                    class="exp-tag">Secretarial</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2003</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORPORATE ADMINISTRATIVE -->
    <section class="dept-section" id="admin-team">
        <div class="container">
            <div class="dept-header" data-aos="fade-up">
                <div class="dept-badge"><i class="bi bi-people-fill"></i> Administration</div>
                <h2 class="dept-title">Corporate Administrative Team</h2>
                <p class="dept-desc">The backbone of our operations — ensuring smooth day-to-day management across the
                    firm.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/norazlina.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Norazlina</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> SMK Taman Dato Harun</div>
                            <div class="tc-quals"><span class="tq">Administrative Supervisor</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">HR</span><span
                                    class="exp-tag">Admin</span></div><span class="tc-since"><i
                                    class="bi bi-calendar3"></i> Since 2010</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                           <img src="img/team/nur-aisha.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Nur Aisyah</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">B.Dev Mgmt</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Admin</span><span class="exp-tag">HR</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up">
                    <div class="team-card">
                        <div class="team-card-img">
                            <img src="img/team/nanthinidevi.jpg">
                        </div>
                        <div class="team-card-body">
                            <h5 class="tc-name">Nanthinidevi</h5>
                            <div class="tc-location"><i class="bi bi-geo-alt-fill"></i> PJ</div>
                            <div class="tc-grad"><i class="bi bi-mortarboard-fill"></i> UUM</div>
                            <div class="tc-quals"><span class="tq">BSc (Hons) Decision Science</span></div>
                            <div class="tc-exp-tags"><span class="exp-tag">Admin</span><span class="exp-tag">HR</span>
                            </div><span class="tc-since"><i class="bi bi-calendar3"></i> Since 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2>Join Our Growing Team</h2>
                    <p class="mb-0">We're always looking for talented professionals. Explore career opportunities at RW
                        William PLT.</p>
                </div>
                <div class="col-lg-5 text-lg-end" data-aos="fade-left"><a href="career.html"
                        class="btn-rw-white me-2 mb-2">View Careers</a><a href="contact.html"
                        class="btn-rw-outline mb-2">Contact Us</a></div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
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
                        <li><i class="bi bi-envelope"></i><span><a href="mailto:richard@rwwilliam.com.my" target="_blank">richard@rwwilliam.com.my</a></span></li>
                        
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">                        
                        <p class="copyright"> <span>Copyright</span> ©
                    <script> document.write(new Date().getFullYear())  </script>
                    <span class="copyright">RW WILLIAM PLT </span> (201906003458 (LLP0022270-LCA) & AF1490)| <span> All Rights Reserved | Powered by :<a href="http://www.webprotechnologi.com/" target="_blank"> WebPro Design </span>
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
            <a href="/cdn-cgi/l/email-protection#56243f353e372432162421213f3a3a3f373b7835393b783b2f" class="social-email">
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });
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
        // View more toggle
        document.querySelectorAll('.view-more-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const target = document.getElementById(targetId);
                if (target) {
                    target.classList.add('show');
                    this.closest('.text-center').style.display = 'none';
                }
            });
        });

        // ── Team Search ──────────────────────────────────────────
        (function() {
            const input = document.getElementById('teamSearchInput');
            const clearBtn = document.getElementById('teamSearchClear');
            const info = document.getElementById('teamSearchInfo');
            if (!input) return;

            function runSearch() {
                const q = input.value.trim().toLowerCase();
                clearBtn.classList.toggle('visible', q.length > 0);
                let totalVisible = 0;

                // Partner cards
                document.querySelectorAll('.partner-card').forEach(function(card) {
                    const match = !q || card.textContent.toLowerCase().includes(q);
                    card.style.display = match ? '' : 'none';
                    if (match) totalVisible++;
                });

                // Team grid cards
                document.querySelectorAll('.team-card').forEach(function(card) {
                    const col = card.closest('[class*="col-"]') || card;
                    const match = !q || card.textContent.toLowerCase().includes(q);
                    if (match) {
                        col.style.display = '';
                        // Reveal hidden grid if this card is inside one
                        const hiddenGrid = col.closest('.team-grid-hidden');
                        if (hiddenGrid && q) {
                            hiddenGrid.classList.add('show');
                            const viewMoreWrap = hiddenGrid.closest('section') && hiddenGrid.closest('section').querySelector('.text-center');
                            if (viewMoreWrap) viewMoreWrap.style.display = 'none';
                        }
                        totalVisible++;
                    } else {
                        col.style.display = 'none';
                    }
                });

                // Show/hide dept sections; restore state on clear
                document.querySelectorAll('.dept-section').forEach(function(section) {
                    if (!q) {
                        section.style.display = '';
                        section.querySelectorAll('.team-grid-hidden').forEach(g => g.classList.remove('show'));
                        section.querySelectorAll('.text-center').forEach(tc => tc.style.display = '');
                        section.querySelectorAll('[class*="col-"]').forEach(c => c.style.display = '');
                        return;
                    }
                    const anyVisible = Array.from(section.querySelectorAll('.team-card, .partner-card'))
                        .some(c => c.style.display !== 'none');
                    section.style.display = anyVisible ? '' : 'none';
                });

                info.innerHTML = q
                    ? 'Showing <span>' + totalVisible + '</span> result' + (totalVisible !== 1 ? 's' : '') + ' for "<span>' + input.value.trim() + '</span>"'
                    : '';
            }

            input.addEventListener('input', runSearch);
            clearBtn.addEventListener('click', function() { input.value = ''; runSearch(); input.focus(); });
        })();

        // ── Fix search bar: always sits just below the sticky navbar ──
        (function() {
            const navbar = document.getElementById('mainNavbar');
            const searchBar = document.querySelector('.team-search-section');
            const spacer = document.getElementById('teamSearchSpacer');

            function positionSearch() {
                if (!navbar || !searchBar) return;
                const navH = navbar.offsetHeight;
                searchBar.style.top = navH + 'px';
                if (spacer) spacer.style.height = searchBar.offsetHeight + 'px';
            }

            positionSearch();
            window.addEventListener('resize', positionSearch);
            window.addEventListener('scroll', positionSearch);
        })();
    </script>
</body>
</html>
