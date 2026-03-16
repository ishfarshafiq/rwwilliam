<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RW William Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
	<style>
        :root{--admin-primary:#00ADEF;--admin-primary-dark:#0088BF;--admin-accent:#004B6E;--admin-dark:#0A1628;--admin-white:#FFFFFF;--admin-off-white:#F4F7FA;--admin-border:#E2E8F0;--admin-text:#2C3E50;--admin-text-light:#6B7B8D;--admin-success:#10B981;--admin-danger:#EF4444;--font-heading:'DM Serif Display',serif;--font-body:'Outfit',sans-serif}
        *{margin:0;padding:0;box-sizing:border-box}html,body{height:100%}body{font-family:var(--font-body);color:var(--admin-text);background:var(--admin-off-white);overflow-x:hidden}

        .login-wrapper{display:flex;min-height:100vh}

        /* ===== LEFT PANEL ===== */
        .login-left{flex:1;background:linear-gradient(160deg,var(--admin-dark) 0%,var(--admin-accent) 45%,var(--admin-primary-dark) 100%);position:relative;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:60px;overflow:hidden}
        .login-left::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background-image:radial-gradient(rgba(255,255,255,.04) 1px,transparent 1px);background-size:30px 30px}
        .login-left::after{content:'';position:absolute;top:-20%;right:-20%;width:500px;height:500px;background:radial-gradient(circle,rgba(0,173,239,.15),transparent 70%);border-radius:50%}

        .left-content{position:relative;z-index:2;max-width:460px;text-align:center}
        .left-brand{display:flex;align-items:center;justify-content:center;gap:16px;margin-bottom:48px}
        .left-brand .brand-icon{width:60px;height:60px;background:linear-gradient(135deg,var(--admin-primary),var(--admin-primary-dark));border-radius:14px;display:flex;align-items:center;justify-content:center;color:white;font-family:var(--font-heading);font-size:24px;font-weight:700;box-shadow:0 8px 30px rgba(0,173,239,.35)}
        .left-brand .brand-text h3{color:white;font-family:var(--font-heading);font-size:26px;margin:0;text-align:left;line-height:1.2}
        .left-brand .brand-text span{color:rgba(255,255,255,.4);font-size:10px;text-transform:uppercase;letter-spacing:2px;font-weight:500}

        .left-headline{color:white;font-family:var(--font-heading);font-size:38px;line-height:1.25;margin-bottom:20px}
        .left-headline span{color:var(--admin-primary)}
        .left-desc{color:rgba(255,255,255,.5);font-size:16px;line-height:1.8;font-weight:300;margin-bottom:48px}

        .left-features{display:flex;flex-direction:column;gap:16px}
        .left-feature{display:flex;align-items:center;gap:14px;text-align:left}
        .left-feature .feat-icon{width:44px;height:44px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.08);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .left-feature .feat-icon i{color:var(--admin-primary);font-size:18px}
        .left-feature .feat-text h6{color:white;font-size:14px;font-family:var(--font-body);font-weight:600;margin:0}
        .left-feature .feat-text p{color:rgba(255,255,255,.4);font-size:12px;margin:0;line-height:1.5}

        .left-bottom{position:absolute;bottom:30px;left:0;right:0;text-align:center;z-index:2}
        .left-bottom p{color:rgba(255,255,255,.2);font-size:12px}

        /* Floating shapes */
        .float-shape{position:absolute;border-radius:50%;border:1px solid rgba(255,255,255,.05);z-index:1}
        .float-shape-1{width:200px;height:200px;top:10%;left:-5%;animation:floatUp 8s ease-in-out infinite}
        .float-shape-2{width:120px;height:120px;bottom:15%;right:5%;animation:floatUp 6s ease-in-out infinite;animation-delay:2s}
        .float-shape-3{width:80px;height:80px;top:60%;left:10%;background:rgba(0,173,239,.06);animation:floatUp 10s ease-in-out infinite;animation-delay:4s}
        @keyframes floatUp{0%,100%{transform:translateY(0)}50%{transform:translateY(-20px)}}

        /* ===== RIGHT PANEL ===== */
        .login-right{width:520px;display:flex;flex-direction:column;justify-content:center;padding:60px;background:var(--admin-white);position:relative}

        .login-header{margin-bottom:40px}
        .login-header .back-link{display:inline-flex;align-items:center;gap:6px;color:var(--admin-text-light);font-size:13px;font-weight:500;text-decoration:none;margin-bottom:32px;transition:color .2s}
        .login-header .back-link:hover{color:var(--admin-primary)}
        .login-header h2{font-family:var(--font-heading);font-size:30px;color:var(--admin-accent);margin-bottom:8px}
        .login-header p{color:var(--admin-text-light);font-size:15px;font-weight:300}

        .form-group{margin-bottom:22px}
        .form-group label{display:block;font-size:13px;font-weight:600;color:var(--admin-text);margin-bottom:8px;text-transform:uppercase;letter-spacing:.5px}
        .input-wrap{position:relative}
        .input-wrap .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--admin-text-light);font-size:18px;pointer-events:none;transition:color .2s}
        .input-wrap input{width:100%;padding:13px 14px 13px 44px;border:1.5px solid var(--admin-border);border-radius:10px;font-size:14px;font-family:var(--font-body);color:var(--admin-text);transition:all .2s;background:white;outline:none}
        .input-wrap input:focus{border-color:var(--admin-primary);box-shadow:0 0 0 3px rgba(0,173,239,.1)}
        .input-wrap input:focus ~ .input-icon{color:var(--admin-primary)}
        .input-wrap .toggle-pw{position:absolute;right:14px;top:50%;transform:translateY(-50%);color:var(--admin-text-light);font-size:18px;cursor:pointer;background:none;border:none;padding:0;transition:color .2s}.toggle-pw:hover{color:var(--admin-primary)}

        .form-options{display:flex;align-items:center;justify-content:space-between;margin-bottom:28px}
        .remember-me{display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13px;color:var(--admin-text-light);font-weight:500;user-select:none}
        .remember-me input[type=checkbox]{display:none}
        .remember-me .custom-check{width:20px;height:20px;border:1.5px solid var(--admin-border);border-radius:6px;display:flex;align-items:center;justify-content:center;transition:all .2s;flex-shrink:0}
        .remember-me .custom-check i{font-size:12px;color:white;opacity:0;transition:opacity .2s}
        .remember-me input:checked ~ .custom-check{background:var(--admin-primary);border-color:var(--admin-primary)}
        .remember-me input:checked ~ .custom-check i{opacity:1}
        .forgot-link{font-size:13px;color:var(--admin-primary);font-weight:500;text-decoration:none;transition:color .2s}.forgot-link:hover{color:var(--admin-primary-dark)}

        .btn-login{width:100%;padding:14px;border:none;border-radius:10px;background:linear-gradient(135deg,var(--admin-primary),var(--admin-primary-dark));color:white;font-size:15px;font-weight:600;cursor:pointer;transition:all .3s;display:flex;align-items:center;justify-content:center;gap:8px;letter-spacing:.3px;position:relative;overflow:hidden}
        .btn-login::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);transition:left .6s}
        .btn-login:hover::before{left:100%}
        .btn-login:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,173,239,.35)}
        .btn-login:active{transform:translateY(0)}
        .btn-login.loading{pointer-events:none;opacity:.8}
        .btn-login .spinner{width:20px;height:20px;border:2.5px solid rgba(255,255,255,.3);border-top-color:white;border-radius:50%;animation:spin .6s linear infinite;display:none}
        .btn-login.loading .spinner{display:block}
        .btn-login.loading .btn-text{display:none}
        @keyframes spin{to{transform:rotate(360deg)}}

        .login-error{background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.2);border-radius:10px;padding:12px 16px;margin-bottom:20px;display:none;align-items:center;gap:10px;font-size:13px;color:var(--admin-danger);font-weight:500}
        .login-error.show{display:flex}
        .login-error i{font-size:18px;flex-shrink:0}

        .login-footer{margin-top:40px;text-align:center}
        .login-footer p{font-size:12px;color:var(--admin-text-light);opacity:.6}

        /* Default credentials hint */
        .credentials-hint{background:rgba(0,173,239,.06);border:1px solid rgba(0,173,239,.12);border-radius:10px;padding:14px 16px;margin-bottom:24px;font-size:12px;color:var(--admin-accent);display:flex;align-items:flex-start;gap:10px}
        .credentials-hint i{color:var(--admin-primary);font-size:16px;flex-shrink:0;margin-top:1px}
        .credentials-hint code{background:rgba(0,173,239,.1);padding:1px 6px;border-radius:4px;font-size:12px;font-weight:600;color:var(--admin-primary-dark)}

        /* ===== RESPONSIVE ===== */
        @media(max-width:991.98px){
            .login-left{display:none}
            .login-right{width:100%;max-width:100%;padding:40px 24px}
            .login-wrapper{justify-content:center;background:linear-gradient(160deg,var(--admin-dark) 0%,var(--admin-accent) 100%)}
            .login-right{max-width:460px;margin:20px;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.2)}
        }
        @media(max-width:575.98px){
            .login-right{margin:12px;padding:32px 20px;border-radius:16px}
            .login-header h2{font-size:26px}
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Left Decorative Panel -->
        <div class="login-left">
            <div class="float-shape float-shape-1"></div>
            <div class="float-shape float-shape-2"></div>
            <div class="float-shape float-shape-3"></div>

            <div class="left-content">
                <div class="left-brand">
                    <div class="brand-icon">RW</div>
                    <div class="brand-text"><h3>RW William</h3><span>Chartered Accountants</span></div>
                </div>
                <h2 class="left-headline">Manage Your <span>Website Content</span> With Ease</h2>
                <p class="left-desc">Access the admin panel to update home banners, announcements, gallery albums, and more — all from one centralized dashboard.</p>
                <div class="left-features">
                    <div class="left-feature"><div class="feat-icon"><i class="bi bi-images"></i></div><div class="feat-text"><h6>Home Banners</h6><p>Manage fullscreen hero slider content</p></div></div>
                    <div class="left-feature"><div class="feat-icon"><i class="bi bi-megaphone"></i></div><div class="feat-text"><h6>Announcements</h6><p>Post news, updates & regulatory alerts</p></div></div>
                    <div class="left-feature"><div class="feat-icon"><i class="bi bi-camera"></i></div><div class="feat-text"><h6>Gallery Albums</h6><p>Upload event photos & organize albums</p></div></div>
                </div>
            </div>

            <div class="left-bottom"><p>&copy; 2026 RW William PLT. All Rights Reserved.</p></div>
        </div>

        <!-- Right Login Form -->
        <div class="login-right">
            <div class="login-header">
                <a href="index.html" class="back-link"><i class="bi bi-arrow-left"></i> Back to Website</a>
                <h2>Welcome Back</h2>
                <p>Sign in to access the admin panel</p>
            </div>

            <!--<div class="credentials-hint">
                <i class="bi bi-info-circle"></i>
                <div>Default credentials: Username <code>admin</code> &bull; Password <code>admin123</code></div>
            </div>-->

            <div class="login-error" id="loginError">
                <i class="bi bi-exclamation-circle"></i>
                <span id="loginErrorMsg">Invalid username or password</span>
            </div>

            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <label>Username</label>
                    <div class="input-wrap">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="loginUser" placeholder="Enter your username" autocomplete="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" id="loginPass" placeholder="Enter your password" autocomplete="current-password" required>
                        <button type="button" class="toggle-pw" onclick="togglePassword()" tabindex="-1"><i class="bi bi-eye" id="pwIcon"></i></button>
                    </div>
                </div>
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <div class="custom-check"><i class="bi bi-check2"></i></div>
                        Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>
                <button type="submit" class="btn-login" id="btnLogin">
                    <span class="btn-text"><i class="bi bi-box-arrow-in-right"></i> Sign In</span>
                    <div class="spinner"></div>
                </button>
            </form>

            <div class="login-footer">
                <p>RW William PLT &bull; 201906003458 (LLP0022270-LCA)</p>
            </div>
        </div>
    </div>
	
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
    // Default credentials (in production, this would be server-side authentication)
    // const VALID_USERS = [
        // { username: 'admin', password: 'admin123', name: 'Administrator', role: 'Super Admin' }
    // ];

    // function togglePassword(){
        // const input = document.getElementById('loginPass');
        // const icon = document.getElementById('pwIcon');
        // if(input.type === 'password'){
            // input.type = 'text';
            // icon.classList.remove('bi-eye');
            // icon.classList.add('bi-eye-slash');
        // } else {
            // input.type = 'password';
            // icon.classList.remove('bi-eye-slash');
            // icon.classList.add('bi-eye');
        // }
    // }

    // function handleLogin(e){
        // e.preventDefault();
        // const username = document.getElementById('loginUser').value.trim();
        // const password = document.getElementById('loginPass').value;
        // const remember = document.getElementById('rememberMe').checked;
        // const btn = document.getElementById('btnLogin');
        // const errorEl = document.getElementById('loginError');

        // // Hide previous errors
        // errorEl.classList.remove('show');

        // // Show loading
        // btn.classList.add('loading');

        // // Simulate authentication delay
        // setTimeout(() => {
            // const user = VALID_USERS.find(u => u.username === username && u.password === password);

            // if(user){
                // // Save session
                // localStorage.setItem('rw_admin_session', JSON.stringify({
                    // loggedIn: true,
                    // username: user.username,
                    // name: user.name,
                    // role: user.role,
                    // loginTime: new Date().toISOString()
                // }));

                // // Remember me
                // if(remember){
                    // localStorage.setItem('rw_admin_remember', JSON.stringify({ username: user.username }));
                // } else {
                    // localStorage.removeItem('rw_admin_remember');
                // }

                // // Redirect
                // window.location.href = 'admin/index.php';
            // } else {
                // btn.classList.remove('loading');
                // errorEl.classList.add('show');
                // document.getElementById('loginErrorMsg').textContent = 'Invalid username or password. Please try again.';
                // // Shake effect
                // document.getElementById('loginForm').style.animation = 'shake .4s ease';
                // setTimeout(() => document.getElementById('loginForm').style.animation = '', 400);
            // }
        // }, 800);
    // }

    // // Shake animation
    // const style = document.createElement('style');
    // style.textContent = '@keyframes shake{0%,100%{transform:translateX(0)}20%,60%{transform:translateX(-8px)}40%,80%{transform:translateX(8px)}}';
    // document.head.appendChild(style);

    // // Enter key support
    // document.getElementById('loginPass').addEventListener('keydown', e => {
        // if(e.key === 'Enter') document.getElementById('loginForm').requestSubmit();
    // });
    </script>
</body>
</html>
