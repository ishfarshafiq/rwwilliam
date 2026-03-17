<!-- Sidebar -->
 <?php
// Get the current page name
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand"><div class="brand-icon">RW</div><div class="brand-text"><h5>RW William</h5><span>Admin Panel</span></div></div>
        <nav class="sidebar-nav">
            <div class="nav-section-label">Main</div>
            <a class="nav-item-link <?= ($current_page == 'index') ? 'active' : '' ?>" href="index.php"><i class="bi bi-grid-1x2"></i> Dashboard</a>
            <div class="nav-section-label">Content Management</div>
            <a class="nav-item-link <?= ($current_page == 'banners') ? 'active' : '' ?>" href="banners.php"><i class="bi bi-images"></i> Home Banners <span class="nav-badge" id="bannerCount"><?php echo $count_banner;?></span></a>
            <a class="nav-item-link <?= ($current_page == 'announcements') ? 'active' : '' ?>" href="announcements.php"><i class="bi bi-megaphone"></i> Announcements <span class="nav-badge" id="annCount"><?php echo $count_news;?></span></a>
            <a class="nav-item-link <?= ($current_page == 'gallery') ? 'active' : '' ?>" href="gallery.php"><i class="bi bi-camera"></i> Gallery Albums <span class="nav-badge" id="galleryCount"><?php echo $count_album;?></span></a>
            
            
        </nav>
        <div class="sidebar-footer"><div class="admin-avatar">A</div><div class="admin-info"><h6>Administrator</h6><span>Super Admin</span></div><a href="logout.php" class="logout-btn" title="Back to Site"><i class="bi bi-box-arrow-right"></i></a></div>
    </aside>
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>