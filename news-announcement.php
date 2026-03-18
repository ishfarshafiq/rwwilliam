<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Announcements | RW William PLT</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
.btn-primary{
    background: var(--rw-primary);
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

        /* SECTION STYLES */
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

        /* WHO WE ARE LOOKING FOR */
        .welcome-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden
        }

        .welcome-section::after {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 173, 239, .04), transparent 70%);
            border-radius: 50%
        }

        .welcome-icon-row {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap
        }

        .welcome-icon-card {
            flex: 1;
            min-width: 160px;
            background: var(--rw-white);
            border: 2px solid var(--rw-border);
            border-radius: 16px;
            padding: 28px 20px;
            text-align: center;
            transition: all .4s ease
        }

        .welcome-icon-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 15px 40px rgba(0, 173, 239, .12);
            transform: translateY(-5px)
        }

        .welcome-icon-card .wic-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            background: var(--rw-primary-light);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--rw-primary);
            transition: all .3s ease
        }

        .welcome-icon-card:hover .wic-icon {
            background: var(--rw-primary);
            color: white
        }

        .welcome-icon-card h5 {
            font-size: 16px;
            margin-bottom: 4px
        }

        .welcome-icon-card p {
            font-size: 13px;
            margin: 0
        }

        .welcome-highlight {
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-accent));
            color: white;
            border-radius: 16px;
            padding: 36px;
            position: relative;
            overflow: hidden;
            margin-top: 40px
        }

        .welcome-highlight::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -15%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
            border-radius: 50%
        }

        .welcome-highlight h3 {
            color: white;
            font-size: 24px;
            margin-bottom: 8px;
            position: relative;
            z-index: 1
        }

        .welcome-highlight p {
            color: rgba(255, 255, 255, .85);
            position: relative;
            z-index: 1;
            margin: 0;
            font-size: 16px
        }

        /* WHY JOIN US */
        .why-section {
            padding: 100px 0;
            background: var(--rw-off-white)
        }

        .why-card {
            background: var(--rw-white);
            border: 1px solid var(--rw-border);
            border-radius: 18px;
            padding: 36px 28px;
            text-align: center;
            transition: all .4s ease;
            height: 100%;
            position: relative;
            overflow: hidden
        }

        .why-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--rw-primary);
            transform: scaleX(0);
            transition: transform .3s ease;
            transform-origin: left
        }

        .why-card:hover::before {
            transform: scaleX(1)
        }

        .why-card:hover {
            border-color: var(--rw-primary);
            box-shadow: 0 15px 40px rgba(0, 173, 239, .1);
            transform: translateY(-5px)
        }

        .why-card .why-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--rw-primary), var(--rw-primary-dark));
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white
        }

        .why-card h4 {
            font-size: 20px;
            margin-bottom: 8px
        }

        .why-card p {
            font-size: 14px;
            margin: 0
        }

        /* APPLICATION FORM */
        .apply-section {
            padding: 100px 0;
            position: relative
        }

        .apply-form-card {
            background: var(--rw-white);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 75, 110, .08);
            border: 1px solid var(--rw-border);
            padding: 50px;
            position: relative;
            overflow: hidden
        }

        .apply-form-card::before {
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
            padding: 26px;
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

        /* File upload */
        .file-upload-zone {
            border: 2px dashed var(--rw-border);
            border-radius: 14px;
            padding: 36px;
            text-align: center;
            transition: all .3s ease;
            cursor: pointer;
            background: var(--rw-off-white)
        }

        .file-upload-zone:hover,
        .file-upload-zone.dragover {
            border-color: var(--rw-primary);
            background: var(--rw-primary-light)
        }

        .file-upload-zone .upload-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 14px;
            background: var(--rw-primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: var(--rw-primary);
            transition: all .3s ease
        }

        .file-upload-zone:hover .upload-icon {
            background: var(--rw-primary);
            color: white
        }

        .file-upload-zone h5 {
            font-size: 16px;
            margin-bottom: 4px
        }

        .file-upload-zone p {
            font-size: 13px;
            margin: 0
        }

        .file-upload-zone .browse-link {
            color: var(--rw-primary);
            font-weight: 600;
            text-decoration: underline
        }

        .file-name-display {
            display: none;
            align-items: center;
            gap: 10px;
            background: var(--rw-primary-light);
            border: 1px solid rgba(0, 173, 239, .2);
            border-radius: 10px;
            padding: 12px 18px;
            margin-top: 12px
        }

        .file-name-display.show {
            display: flex
        }

        .file-name-display i {
            color: var(--rw-primary);
            font-size: 20px
        }

        .file-name-display span {
            font-size: 14px;
            font-weight: 500;
            color: var(--rw-accent);
            flex: 1
        }

        .file-name-display .remove-file {
            background: none;
            border: none;
            color: #e74c3c;
            font-size: 18px;
            cursor: pointer;
            padding: 0
        }

        /* Success */
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

        /* Side info */
        .apply-info-card {
            background: linear-gradient(135deg, var(--rw-primary) 0%, var(--rw-primary-dark) 50%, var(--rw-accent) 100%);
            border-radius: 20px;
            padding: 44px;
            color: white;
            position: relative;
            overflow: hidden;
            height: auto
        }

        .apply-info-card::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
            border-radius: 50%
        }

        .apply-info-card>* {
            position: relative;
            z-index: 1
        }

        .apply-info-card h3 {
            color: white;
            font-size: 26px;
            margin-bottom: 8px
        }

        .apply-info-card>p {
            color: rgba(255, 255, 255, .7);
            font-size: 15px;
            margin-bottom: 32px
        }

        .apply-step {
            display: flex;
            gap: 16px;
            margin-bottom: 24px
        }

        .apply-step-num {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-heading);
            font-size: 18px;
            color: white
        }

        .apply-step h5 {
            color: white;
            font-size: 15px;
            margin-bottom: 2px;
            font-family: var(--font-body);
            font-weight: 600
        }

        .apply-step p {
            color: rgba(255, 255, 255, .6);
            font-size: 13px;
            margin: 0;
            line-height: 1.5
        }

        .apply-depts {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, .15)
        }

        .apply-depts .dept-pill {
            background: rgba(255, 255, 255, .12);
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 20px;
            letter-spacing: .5px
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

            .welcome-section,
            .why-section,
            .apply-section {
                padding: 60px 0
            }

            .apply-form-card {
                padding: 30px
            }

            .apply-info-card {
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

            .apply-form-card {
                padding: 24px
            }

            .welcome-icon-card {
                min-width: 130px;
                padding: 20px 14px
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
            <div class="breadcrumb-nav mb-4" data-aos="fade-down"><a href="index.php">Home</a><span
                    class="divider">/</span><span>News & Announcements</span></div>
            <div class="hero-line" data-aos="fade-right"></div>
            <h1 data-aos="fade-up">News & Announcements</h1>
            <p data-aos="fade-up" data-aos-delay="100">Stay updated with the latest regulatory changes, company news,
                important deadlines, and insights from RW William PLT.</p>
        </div>
    </section>

    <!-- Who We Are Looking For -->
    <section class="welcome-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-12" data-aos="fade-right">
                    
                    <h2 class="section-title">News & Announcements</h2>
                    
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Published</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
									$i=1;
									$view_img="";
									$result = mysqli_query($conn,"select * from news where status = 'Active' order by newsID desc");
										while($row = mysqli_fetch_assoc($result)){
											
												$image = $row['image'];
												$icon = $row['icon'];
											
											
									?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
											<?php if($image != "") { ?>
												<img src="admin/<?php echo $image;?>" class="img-fluid rounded-3" style="max-width: 120px;" alt="">
											<?php } else { ?>
												<i class="<?php echo $icon;?>"></i>
											<?php }  ?>
											
                                        </td>
                                        <td><?php echo $row['title'];?> </td>
                                        <td><i class="bi bi-person"></i> <?php echo $row['author'];?><br><i class="bi bi-clock"></i><?php echo date('M d, Y',strtotime($row['publish_date']));?></td>
                                        <td><?php echo substr(strip_tags($row['description']), 0, 20) . "..."; ?></td>
                                        <td>
                                            <a href="news-details.php?newsID=<?php echo $row['newsID'];?>" target="_blank" class="btn btn-primary mt-5">Read More</a>
                                        </td>
                                    </tr>
									<?php
										$i++;
									}
									?>
                                   
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

	<?php include_once('includes/footer.php'); ?>

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

        // File upload
        const zone = document.getElementById('fileUploadZone'), fileInput = document.getElementById('resumeFile'), fileDisplay = document.getElementById('fileNameDisplay'), fileNameEl = document.getElementById('fileName'), removeBtn = document.getElementById('removeFile');
        zone.addEventListener('click', function () { fileInput.click() });
        zone.addEventListener('dragover', function (e) { e.preventDefault(); zone.classList.add('dragover') });
        zone.addEventListener('dragleave', function () { zone.classList.remove('dragover') });
        zone.addEventListener('drop', function (e) { e.preventDefault(); zone.classList.remove('dragover'); if (e.dataTransfer.files.length) { fileInput.files = e.dataTransfer.files; showFile() } });
        fileInput.addEventListener('change', showFile);
        function showFile() { if (fileInput.files.length) { const f = fileInput.files[0]; if (f.size > 5 * 1024 * 1024) { alert('File size must be under 5MB'); fileInput.value = ''; return } fileNameEl.textContent = f.name; fileDisplay.classList.add('show'); zone.style.display = 'none' } }
        removeBtn.addEventListener('click', function () { fileInput.value = ''; fileDisplay.classList.remove('show'); zone.style.display = '' });

        // Form submission
        document.getElementById('careerForm').addEventListener('submit', function (e) {
            e.preventDefault();
            if (!fileInput.files.length) { alert('Please upload your resume.'); return }
            const btn = this.querySelector('.btn-submit');
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Submitting...';
            btn.style.pointerEvents = 'none';
            setTimeout(function () {
                document.getElementById('careerForm').style.display = 'none';
                document.querySelector('.apply-form-card h2').style.display = 'none';
                document.querySelector('.apply-form-card > p').style.display = 'none';
                document.getElementById('formSuccess').classList.add('show');
            }, 1500);
        });
    </script>
</body>

</html>