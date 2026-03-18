<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | RW William PLT</title>
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
            transition: color .3s
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
            transition: transform .3s;
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
            transition: all .2s
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
            transition: all .4s
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
            transition: all .3s;
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
            transition: max-height .4s
        }

        .mobile-submenu.open {
            max-height: 300px
        }

        .mobile-submenu a {
            display: block;
            padding: 12px 24px 12px 40px;
            color: rgba(255, 255, 255, .8);
            font-size: 14px;
            transition: all .3s
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

        /* HERO */
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
            background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
            border-radius: 50%
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, .05), transparent 70%);
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

        /* SHARED */
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

        /* ===== GALLERY FILTER TABS ===== */
        .gallery-section {
            padding: 80px 0
        }

        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 50px;
            justify-content: center
        }

        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--rw-white);
            border: 2px solid var(--rw-border);
            border-radius: 50px;
            padding: 10px 24px;
            font-size: 13px;
            font-weight: 600;
            color: var(--rw-text);
            cursor: pointer;
            transition: all .3s;
            text-transform: uppercase;
            letter-spacing: .5px
        }

        .filter-tab:hover {
            border-color: var(--rw-primary);
            color: var(--rw-primary)
        }

        .filter-tab.active {
            background: var(--rw-primary);
            border-color: var(--rw-primary);
            color: white;
            box-shadow: 0 6px 20px rgba(0, 173, 239, .3)
        }

        .filter-tab .tab-count {
            background: rgba(0, 0, 0, .08);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700
        }

        .filter-tab.active .tab-count {
            background: rgba(255, 255, 255, .2)
        }

        /* ===== GALLERY ALBUM ===== */
        .gallery-album {
            margin-bottom: 60px;
            padding-bottom: 60px;
            border-bottom: 1px solid var(--rw-border);
            animation: fadeInUp .6s ease forwards;
            opacity: 0
        }

        .gallery-album:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0
        }

        .gallery-album.visible {
            opacity: 1
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .album-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px
        }

        .album-info h3 {
            font-size: 28px;
            margin-bottom: 6px
        }

        .album-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap
        }

        .album-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--rw-primary);
            color: white;
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px
        }

        .album-category {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--rw-primary-light);
            color: var(--rw-primary);
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
            text-transform: uppercase
        }

        .album-count {
            color: var(--rw-text-light);
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 4px
        }

        .album-desc {
            font-size: 15px;
            color: var(--rw-text-light);
            margin-bottom: 20px;
            max-width: 700px
        }

        /* Photo Grid */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px
        }

        .photo-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
            background: var(--rw-primary-lighter)
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease
        }

        .photo-item:hover img {
            transform: scale(1.08)
        }

        .photo-item .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(0, 75, 110, .7) 100%);
            opacity: 0;
            transition: opacity .3s;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 16px
        }

        .photo-item:hover .photo-overlay {
            opacity: 1
        }

        .photo-overlay .zoom-icon {
            width: 44px;
            height: 44px;
            background: var(--rw-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(.7);
            opacity: 0;
            transition: all .3s
        }

        .photo-item:hover .zoom-icon {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1)
        }

        /* Photo placeholder (no real images) */
        .photo-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--rw-primary-light), var(--rw-primary-lighter));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px
        }

        .photo-placeholder i {
            font-size: 32px;
            color: var(--rw-primary);
            opacity: .4
        }

        .photo-placeholder span {
            font-size: 11px;
            color: var(--rw-primary);
            opacity: .5;
            font-weight: 500
        }

        /* Expand / collapse */
        .photos-toggle {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 16px;
            color: var(--rw-primary);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            padding: 8px 20px;
            border: 2px solid var(--rw-primary);
            border-radius: 8px;
            transition: all .3s;
            background: transparent
        }

        .photos-toggle:hover {
            background: var(--rw-primary);
            color: white
        }

        .photo-grid .photo-item.hidden-photo {
            display: none
        }

        .photo-grid.expanded .photo-item.hidden-photo {
            display: block
        }

        /* ===== LIGHTBOX ===== */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(10, 22, 40, .95);
            backdrop-filter: blur(10px);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .3s
        }

        .lightbox.active {
            display: flex;
            opacity: 1
        }

        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s;
            z-index: 10
        }

        .lightbox-close:hover {
            background: var(--rw-primary);
            transform: rotate(90deg)
        }

        .lightbox-body {
            max-width: 90vw;
            max-height: 85vh;
            position: relative
        }

        .lightbox-body img {
            max-width: 100%;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .5)
        }

        .lightbox-body .lb-placeholder {
            width: 70vw;
            max-width: 800px;
            height: 60vh;
            background: rgba(255, 255, 255, .05);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border: 2px dashed rgba(255, 255, 255, .15)
        }

        .lb-placeholder i {
            font-size: 64px;
            color: rgba(255, 255, 255, .15)
        }

        .lb-placeholder span {
            color: rgba(255, 255, 255, .3);
            font-size: 14px
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, .1);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 22px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s;
            z-index: 10
        }

        .lightbox-nav:hover {
            background: var(--rw-primary)
        }

        .lightbox-prev {
            left: 20px
        }

        .lightbox-next {
            right: 20px
        }

        .lightbox-info {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: rgba(255, 255, 255, .6);
            font-size: 13px;
            font-weight: 500
        }

        .lightbox-counter {
            background: rgba(255, 255, 255, .1);
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 12px;
            color: rgba(255, 255, 255, .5)
        }

        /* ===== EMPTY STATE ===== */
        .gallery-empty {
            text-align: center;
            padding: 80px 20px
        }

        .gallery-empty i {
            font-size: 64px;
            color: var(--rw-border);
            margin-bottom: 20px;
            display: block
        }

        .gallery-empty h4 {
            font-size: 24px;
            margin-bottom: 10px
        }

        .gallery-empty p {
            max-width: 400px;
            margin: 0 auto
        }

        /* ===== CTA ===== */
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
            transition: all .3s;
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
            transition: all .3s;
            display: inline-block
        }

        .btn-rw-outline:hover {
            background: white;
            color: var(--rw-accent);
            border-color: white;
            transform: translateY(-2px)
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
            transition: all .3s
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
            transition: all .3s
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
            transition: all .3s;
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
            transition: all .3s;
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
            transition: all .3s;
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
            transition: all .3s;
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

            .photo-grid {
                grid-template-columns: repeat(3, 1fr)
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

            .photo-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .album-info h3 {
                font-size: 22px
            }

            .cta-section h2 {
                font-size: 28px
            }
        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div><a href="mailto:richard@rwwilliam.com.my"><i class="bi bi-envelope me-1"></i>
                        richard@rwwilliam.com.my</a><span class="separator">|</span><a href="tel:+60378053859"><i
                            class="bi bi-telephone me-1"></i> +603-7805 3859</a></div>
                <div><a href="#" class="me-3"><i class="bi bi-facebook"></i></a><a href="#" class="me-3"><i
                            class="bi bi-linkedin"></i></a><a href="#"><i class="bi bi-instagram"></i></a></div>
            </div>
        </div>
    </div>

	<?php include_once('includes/navbar.php'); ?>
    
    <!-- Hero -->
    <section class="page-hero">
        <div class="hero-pattern"></div>
        <div class="container position-relative">
            <div class="breadcrumb-nav mb-4" data-aos="fade-down" data-aos-delay="100"><a
                    href="index.php">Home</a><span class="divider">/</span><span>Gallery</span></div>
            <div class="hero-line" data-aos="fade-right" data-aos-delay="200"></div>
            <h1 data-aos="fade-up" data-aos-delay="300">Our Gallery</h1>
            <p data-aos="fade-up" data-aos-delay="400">Capturing moments and milestones across events, workshops, team
                activities, and celebrations at RW William PLT.</p>
        </div>
    </section>

<?php
$galleryAlbums = [];

$sql = "SELECT * FROM gallery_main WHERE status='Active' ORDER BY date DESC";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

    $albumID = $row['gallery_mainID'];

    $photos = [];

    $img_sql = "SELECT * FROM gallery_image 
                WHERE gallery_mainID='$albumID'";

    $img_result = mysqli_query($conn, $img_sql);

    while($img = mysqli_fetch_assoc($img_result)){
        $photos[] = [
            "src" => "admin/".$img['image'],
            "caption" => $row['title']
        ];
    }

    $galleryAlbums[] = [
        "id" => $row['gallery_mainID'],
        "title" => $row['title'],
        "date" => date("d M Y", strtotime($row['date'])),
        "category" => $row['category'],
        "description" => $row['description'],
        "photos" => $photos
    ];
}
?>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <!-- Filter Tabs -->
            <div class="filter-tabs" id="filterTabs"></div>
            <!-- Album Container -->
            <div id="galleryAlbums"></div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2>Want to Be Part of Our Story?</h2>
                    <p class="mb-0">Join RW William PLT and grow your career in a dynamic, professional, and supportive
                        environment.</p>
                </div>
                <div class="col-lg-5 text-lg-end" data-aos="fade-left"><a href="careers.php"
                        class="btn-rw-white me-2 mb-2">View Careers</a><a href="contacts.php"
                        class="btn-rw-outline mb-2">Contact Us</a></div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });

        // ===================================================================
        // GALLERY DATA — Replace this with a fetch() to your backend API/CMS
        // Each album: { id, title, date, category, description, photos:[] }
        // Each photo: { src: "url", caption: "..." } — use src:"" for placeholder
        // ===================================================================
        // const galleryAlbums = [
            // {
                // id: 1, title: "Training 2025", date: "18 Jan 2025", category: "Company Training",
                // description: "Training and teamwork across all 7 offices.",
                // photos: [
                    // { src: "img/gallery/1.jpg", caption: "Training 2025" }, { src: "img/gallery/5.jpg", caption: "Training 2025" },
                    // { src: "img/gallery/2.jpg", caption: "Training 2025" }, { src: "img/gallery/6.jpg", caption: "Training 2025" },
                    // { src: "img/gallery/3.jpg", caption: "Training 2025" }, { src: "img/gallery/7.jpg", caption: "Training 2025" },
                    // { src: "img/gallery/4.jpg", caption: "Training 2025" }, { src: "img/gallery/8.jpg", caption: "Training 2025" }
                // ]
            // }
            
        // ];
		const galleryAlbums = <?php echo json_encode($galleryAlbums); ?>;

        // ===== RENDER FILTER TABS =====
        const categories = ['All', ...[...new Set(galleryAlbums.map(a => a.category))]];
        const tabsEl = document.getElementById('filterTabs');
		
        // const categoryCounts = {};
        // galleryAlbums.forEach(a => { categoryCounts[a.category] = (categoryCounts[a.category] || 0) + 1 });
        
		const categoryCounts = {};

		galleryAlbums.forEach(album => {

			const photoCount = album.photos.length;

			if (!categoryCounts[album.category]) {
				categoryCounts[album.category] = 0;
			}

			categoryCounts[album.category] += photoCount;

		});
		
		tabsEl.innerHTML = categories.map((c, i) => {
            const count = c === 'All' ? galleryAlbums.length : categoryCounts[c];
            return `<div class="filter-tab${i === 0 ? ' active' : ''}" data-cat="${c}"><i class="bi bi-${c === 'All' ? 'grid-3x3-gap' : c === 'Company Events' ? 'building' : c === 'Workshops & Seminars' ? 'mortarboard' : c === 'Team Activities' ? 'people' : c === 'Celebrations' ? 'balloon' : 'camera'}"></i>${c}<span class="tab-count">${count}</span></div>`;
        }).join('');

        // ===== RENDER ALBUMS =====
        const albumsEl = document.getElementById('galleryAlbums');
        const INITIAL_SHOW = 8; // show first 8 photos, rest hidden

        function renderAlbums(filter = 'All') {
            const filtered = filter === 'All' ? galleryAlbums : galleryAlbums.filter(a => a.category === filter);
            if (!filtered.length) {
                albumsEl.innerHTML = '<div class="gallery-empty"><i class="bi bi-images"></i><h4>No Albums Found</h4><p>No gallery albums in this category yet. Check back soon!</p></div>';
                return;
            }
            albumsEl.innerHTML = filtered.map((album, ai) => {
                const photosHtml = album.photos.map((p, pi) => {
                    const hidden = pi >= INITIAL_SHOW ? ' hidden-photo' : '';
                    const placeholder = !p.src ? `<div class="photo-placeholder"><i class="bi bi-image"></i><span>Photo ${pi + 1}</span></div>` : `<img src="${p.src}" alt="${p.caption}" loading="lazy">`;
                    return `<div class="photo-item${hidden}" data-album="${album.id}" data-index="${pi}" data-src="${p.src}" data-caption="${p.caption}">${placeholder}<div class="photo-overlay"><div class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></div></div></div>`;
                }).join('');
                const hasMore = album.photos.length > INITIAL_SHOW;
                const moreCount = album.photos.length - INITIAL_SHOW;
                return `
            <div class="gallery-album visible" data-album-id="${album.id}" style="animation-delay:${ai * 0.1}s">
                <div class="album-header">
                    <div class="album-info">
                        <h3>${album.title}</h3>
                        <div class="album-meta">
                            <span class="album-date"><i class="bi bi-calendar3"></i> ${album.date}</span>
                            <span class="album-category"><i class="bi bi-tag"></i> ${album.category}</span>
                            <span class="album-count"><i class="bi bi-images"></i> ${album.photos.length} Photos</span>
                        </div>
                    </div>
                </div>
                <p class="album-desc">${album.description}</p>
                <div class="photo-grid" id="grid-${album.id}">${photosHtml}</div>
                ${hasMore ? `<button class="photos-toggle" data-grid="grid-${album.id}" data-more="${moreCount}"><i class="bi bi-plus-circle"></i> Show ${moreCount} More Photos</button>` : ''}
            </div>`;
            }).join('');

            // Rebind events
            bindPhotoClicks();
            bindToggleButtons();
        }

        // ===== FILTER TAB CLICKS =====
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function () {
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                renderAlbums(this.dataset.cat);
            });
        });

        // ===== PHOTO EXPAND/COLLAPSE =====
        function bindToggleButtons() {
            document.querySelectorAll('.photos-toggle').forEach(btn => {
                btn.addEventListener('click', function () {
                    const grid = document.getElementById(this.dataset.grid);
                    const isExpanded = grid.classList.toggle('expanded');
                    if (isExpanded) {
                        this.innerHTML = '<i class="bi bi-dash-circle"></i> Show Less';
                    } else {
                        this.innerHTML = `<i class="bi bi-plus-circle"></i> Show ${this.dataset.more} More Photos`;
                    }
                });
            });
        }

        // ===== LIGHTBOX =====
        let lbPhotos = [], lbIndex = 0;
        const lightbox = document.getElementById('lightbox');
        const lbBody = document.getElementById('lbBody');
        const lbCaption = document.getElementById('lbCaption');
        const lbCounter = document.getElementById('lbCounter');

        function openLightbox(albumId, photoIndex) {
            const album = galleryAlbums.find(a => a.id == albumId);
            if (!album) return;
            lbPhotos = album.photos;
            lbIndex = photoIndex;
            showLbPhoto();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
        function showLbPhoto() {
            const p = lbPhotos[lbIndex];
            if (p.src) {
                lbBody.innerHTML = `<img src="${p.src}" alt="${p.caption}">`;
            } else {
                lbBody.innerHTML = `<div class="lb-placeholder"><i class="bi bi-image"></i><span>Image Placeholder — Upload from Backend</span></div>`;
            }
            lbCaption.textContent = p.caption;
            lbCounter.textContent = `${lbIndex + 1} / ${lbPhotos.length}`;
        }
        function lbNext() { lbIndex = (lbIndex + 1) % lbPhotos.length; showLbPhoto() }
        function lbPrev() { lbIndex = (lbIndex - 1 + lbPhotos.length) % lbPhotos.length; showLbPhoto() }

        document.getElementById('lbClose').addEventListener('click', closeLightbox);
        document.getElementById('lbNext').addEventListener('click', lbNext);
        document.getElementById('lbPrev').addEventListener('click', lbPrev);
        lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox() });
        document.addEventListener('keydown', e => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') lbNext();
            if (e.key === 'ArrowLeft') lbPrev();
        });

        function bindPhotoClicks() {
            document.querySelectorAll('.photo-item').forEach(item => {
                item.addEventListener('click', () => {
                    openLightbox(parseInt(item.dataset.album), parseInt(item.dataset.index));
                });
            });
        }

        // Initial render
        renderAlbums();

        // ===== STANDARD FUNCTIONS =====
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
        document.querySelectorAll('.mobile-nav-link:not(#countryToggle)').forEach(l => l.addEventListener('click', () => closeMobileMenu(true)));
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMobileMenu() });
        window.addEventListener('scroll', () => { document.getElementById('mainNavbar').classList.toggle('scrolled', window.scrollY > 50) });
        const socialSidebar = document.getElementById('socialSidebar');
        document.getElementById('socialToggle').addEventListener('click', () => socialSidebar.classList.toggle('open'));
        document.addEventListener('click', e => { if (!socialSidebar.contains(e.target) && socialSidebar.classList.contains('open')) socialSidebar.classList.remove('open') });
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => scrollTopBtn.classList.toggle('visible', window.scrollY > 400));
        scrollTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>
</body>

</html>