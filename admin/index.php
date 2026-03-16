<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once('includes/authentication.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | RW William Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
</head>
<body>
    
	<?php include_once('includes/sidebar.php'); ?>

    <main class="admin-main">
        <div class="admin-topbar">
            <div class="topbar-left"><button class="mobile-toggle" id="mobileMenuBtn"><i class="bi bi-list"></i></button><h4>Dashboard</h4></div>
            <div class="topbar-right"><a href="https://rwwilliam.com/" target="_blank" class="view-site-btn" target="_blank"><i class="bi bi-eye"></i> View Site</a></div>
        </div>
        <div class="admin-content">
            <!-- Stats -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-sm-6"><div class="stat-card"><div class="stat-icon blue"><i class="bi bi-images"></i></div><div class="stat-info"><h3 id="statBanners">0</h3><p>Home Banners</p></div></div></div>
                <div class="col-lg-3 col-sm-6"><div class="stat-card"><div class="stat-icon green"><i class="bi bi-megaphone"></i></div><div class="stat-info"><h3 id="statAnn">0</h3><p>Announcements</p></div></div></div>
                <div class="col-lg-3 col-sm-6"><div class="stat-card"><div class="stat-icon amber"><i class="bi bi-camera"></i></div><div class="stat-info"><h3 id="statAlbums">0</h3><p>Gallery Albums</p></div></div></div>
                <div class="col-lg-3 col-sm-6"><div class="stat-card"><div class="stat-icon red"><i class="bi bi-image"></i></div><div class="stat-info"><h3 id="statPhotos">0</h3><p>Total Photos</p></div></div></div>
            </div>

            <!-- Quick Actions -->
            <div class="panel mb-4">
                <div class="panel-header"><h5><i class="bi bi-lightning-charge"></i> Quick Actions</h5></div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-md-4"><a href="admin-banners.html" class="btn-add w-100 justify-content-center text-decoration-none"><i class="bi bi-plus-lg"></i> Add New Banner</a></div>
                        <div class="col-md-4"><a href="admin-announcements.html" class="btn-add w-100 justify-content-center text-decoration-none"><i class="bi bi-plus-lg"></i> Add Announcement</a></div>
                        <div class="col-md-4"><a href="admin-gallery.html" class="btn-add w-100 justify-content-center text-decoration-none"><i class="bi bi-plus-lg"></i> Add Gallery Album</a></div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-header"><h5><i class="bi bi-megaphone"></i> Latest Announcements</h5><a href="admin-announcements.html" class="btn-add" style="padding:6px 14px;font-size:12px">View All</a></div>
                        <div class="panel-body p-0"><table class="admin-table"><tbody id="recentAnnBody"></tbody></table></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-header"><h5><i class="bi bi-camera"></i> Latest Albums</h5><a href="admin-gallery.html" class="btn-add" style="padding:6px 14px;font-size:12px">View All</a></div>
                        <div class="panel-body p-0"><table class="admin-table"><tbody id="recentAlbumBody"></tbody></table></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="toast-container" id="toastContainer"></div>
    <script src="admin-shared.js"></script>
    <script>
    // Update stats
    function updatePage(){
        const banners=getData('banners'),ann=getData('announcements'),gallery=getData('gallery');
        const totalPhotos=gallery.reduce((s,a)=>s+(a.photos?a.photos.length:0),0);
        document.getElementById('statBanners').textContent=banners.length;
        document.getElementById('statAnn').textContent=ann.length;
        document.getElementById('statAlbums').textContent=gallery.length;
        document.getElementById('statPhotos').textContent=totalPhotos;
        updateSidebarCounts();

        // Recent Announcements
        const recentAnn=ann.sort((a,b)=>new Date(b.date)-new Date(a.date)).slice(0,5);
        const annBody=document.getElementById('recentAnnBody');
        if(!recentAnn.length){annBody.innerHTML='<tr><td class="text-center p-4" style="color:var(--admin-text-light)">No announcements yet</td></tr>'}
        else{annBody.innerHTML=recentAnn.map(a=>{
            const d=a.date?new Date(a.date+'T00:00:00').toLocaleDateString('en-GB',{day:'numeric',month:'short',year:'numeric'}):'-';
            return `<tr><td><strong style="font-size:13px">${a.title}</strong><br><small style="color:var(--admin-text-light)">${d} &bull; ${a.category}</small></td><td style="width:80px"><span class="status-badge ${a.status}">${a.status}</span></td></tr>`}).join('')}

        // Recent Albums
        const recentAlbums=gallery.sort((a,b)=>new Date(b.date)-new Date(a.date)).slice(0,5);
        const albumBody=document.getElementById('recentAlbumBody');
        if(!recentAlbums.length){albumBody.innerHTML='<tr><td class="text-center p-4" style="color:var(--admin-text-light)">No albums yet</td></tr>'}
        else{albumBody.innerHTML=recentAlbums.map(a=>{
            const pc=a.photos?a.photos.length:0;
            return `<tr><td><strong style="font-size:13px">${a.title}</strong><br><small style="color:var(--admin-text-light)">${a.category} &bull; ${pc} photos</small></td><td style="width:80px"><span class="status-badge ${a.status}">${a.status}</span></td></tr>`}).join('')}
    }
    updatePage();
    </script>
</body>
</html>
