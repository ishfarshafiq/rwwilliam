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
    <title>Announcements | RW William Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
</head>
<body>

   <?php include_once('includes/sidebar.php'); ?>

    <main class="admin-main">
        <div class="admin-topbar">
            <div class="topbar-left"><button class="mobile-toggle" id="mobileMenuBtn"><i class="bi bi-list"></i></button><h4>Announcements</h4></div>
            <div class="topbar-right"><a href="https://rwwilliam.com/" target="_blank" class="view-site-btn" target="_blank"><i class="bi bi-eye"></i> View Site</a></div>
        </div>
        <div class="admin-content">
            <div class="panel">
                <div class="panel-header">
                    <h5><i class="bi bi-megaphone"></i> Announcements</h5>
                    <button class="btn-add" onclick="openModal()"><i class="bi bi-plus-lg"></i> Add Announcement</button>
                </div>
                <div class="panel-body p-0">
                    <div class="table-responsive"><table class="admin-table"><thead><tr><th style="width:40px">#</th><th>Image</th><th>Title</th><th>Category</th><th>Date</th><th>Status</th><th style="width:100px">Actions</th></tr></thead><tbody id="tableBody"></tbody></table></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-box">
            <div class="modal-head"><h5 id="modalTitle">Add Announcement</h5><button class="modal-close" onclick="closeModal()"><i class="bi bi-x-lg"></i></button></div>
            <div class="modal-form">
                <input type="hidden" id="itemId">
                <div class="form-group"><label>Title <span class="required">*</span></label><input class="form-input" id="fTitle" placeholder="Announcement title"></div>
                <div class="form-group"><label>Category <span class="required">*</span></label><select class="form-input" id="fCategory"><option value="Regulatory Update">Regulatory Update</option><option value="Company News">Company News</option><option value="Deadline Alert">Deadline Alert</option><option value="Event">Event</option><option value="General">General</option></select></div>
                <div class="form-group"><label>Excerpt / Summary <span class="required">*</span></label><textarea class="form-input" id="fExcerpt" placeholder="Brief summary shown on homepage..."></textarea></div>
                <div class="form-group"><label>Date</label><input class="form-input" type="date" id="fDate"></div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="img-upload-area"><i class="bi bi-cloud-arrow-up d-block"></i><p>Click or drag image here</p><input type="file" accept="image/*" onchange="handleImgUpload(event)"></div>
                    <div class="img-preview" id="imgPreview" style="display:none"><img id="imgPreviewSrc"><div class="remove-img" onclick="removeImg()"><i class="bi bi-x"></i></div></div>
                    <input type="hidden" id="fImage">
                </div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group mb-0"><label>Icon (if no image)</label><select class="form-input" id="fIcon"><option value="bi-megaphone">Megaphone</option><option value="bi-receipt">Receipt</option><option value="bi-building-add">Building</option><option value="bi-calendar-event">Calendar</option><option value="bi-exclamation-triangle">Alert</option><option value="bi-info-circle">Info</option></select></div></div>
                    <div class="col-md-6"><div class="form-group mb-0"><label>Status</label><select class="form-input" id="fStatus"><option value="active">Active</option><option value="draft">Draft</option></select></div></div>
                </div>
            </div>
            <div class="modal-foot"><button class="btn-cancel" onclick="closeModal()">Cancel</button><button class="btn-save" onclick="saveItem()"><i class="bi bi-check-lg"></i> Save Announcement</button></div>
        </div>
    </div>

    <div class="confirm-overlay" id="confirmDialog"><div class="confirm-box"><div class="confirm-icon"><i class="bi bi-exclamation-triangle"></i></div><h5>Are you sure?</h5><p id="confirmMsg">This action cannot be undone.</p><div class="confirm-btns"><button class="btn-cancel" onclick="closeConfirm()">Cancel</button><button class="btn-save" style="background:var(--admin-danger)" id="confirmYes">Delete</button></div></div></div>
    <div class="toast-container" id="toastContainer"></div>

    <script src="admin-shared.js"></script>
    <script>
    const STORE_KEY='announcements';

    function handleImgUpload(e){
        const file=e.target.files[0];if(!file)return;
        const reader=new FileReader();
        reader.onload=ev=>{document.getElementById('imgPreview').style.display='inline-block';document.getElementById('imgPreviewSrc').src=ev.target.result;document.getElementById('fImage').value=ev.target.result};
        reader.readAsDataURL(file);
    }
    function removeImg(){document.getElementById('imgPreview').style.display='none';document.getElementById('imgPreviewSrc').src='';document.getElementById('fImage').value=''}

    function openModal(id){
        resetForm();
        if(id){
            const data=getData(STORE_KEY),a=data.find(x=>x.id===id);if(!a)return;
            document.getElementById('itemId').value=a.id;
            document.getElementById('fTitle').value=a.title;
            document.getElementById('fCategory').value=a.category;
            document.getElementById('fExcerpt').value=a.excerpt;
            document.getElementById('fDate').value=a.date||'';
            document.getElementById('fIcon').value=a.icon||'bi-megaphone';
            document.getElementById('fStatus').value=a.status||'active';
            if(a.image){document.getElementById('imgPreview').style.display='inline-block';document.getElementById('imgPreviewSrc').src=a.image;document.getElementById('fImage').value=a.image}
            document.getElementById('modalTitle').textContent='Edit Announcement';
        }
        document.getElementById('modalOverlay').classList.add('show');document.body.style.overflow='hidden';
    }
    function closeModal(){document.getElementById('modalOverlay').classList.remove('show');document.body.style.overflow='';resetForm()}
    function resetForm(){['itemId','fTitle','fExcerpt','fImage'].forEach(id=>document.getElementById(id).value='');document.getElementById('fCategory').value='Regulatory Update';document.getElementById('fDate').value='';document.getElementById('fStatus').value='active';document.getElementById('fIcon').value='bi-megaphone';document.getElementById('imgPreview').style.display='none';document.getElementById('modalTitle').textContent='Add Announcement'}

    function saveItem(){
        const title=document.getElementById('fTitle').value.trim(),excerpt=document.getElementById('fExcerpt').value.trim();
        if(!title||!excerpt){showToast('Title and Excerpt are required','error');return}
        const data=getData(STORE_KEY),id=document.getElementById('itemId').value;
        const item={title,category:document.getElementById('fCategory').value,excerpt,date:document.getElementById('fDate').value||new Date().toISOString().split('T')[0],image:document.getElementById('fImage').value,icon:document.getElementById('fIcon').value,status:document.getElementById('fStatus').value};
        if(id){const idx=data.findIndex(a=>a.id===id);if(idx>-1){data[idx]={...data[idx],...item};showToast('Announcement updated')}}
        else{item.id=genId();data.push(item);showToast('Announcement added')}
        setData(STORE_KEY,data);closeModal();renderTable();updateSidebarCounts();
    }
    function deleteItem(id){showConfirm('Delete this announcement?',()=>{let data=getData(STORE_KEY);data=data.filter(a=>a.id!==id);setData(STORE_KEY,data);renderTable();updateSidebarCounts();showToast('Announcement deleted')})}

    function renderTable(){
        const data=getData(STORE_KEY).sort((a,b)=>new Date(b.date)-new Date(a.date));
        const tbody=document.getElementById('tableBody');
        if(!data.length){tbody.innerHTML='<tr><td colspan="7"><div class="empty-state"><i class="bi bi-megaphone"></i><h6>No announcements yet</h6><p>Add your first announcement</p></div></td></tr>';return}
        tbody.innerHTML=data.map((a,i)=>{
            const d=a.date?new Date(a.date+'T00:00:00').toLocaleDateString('en-GB',{day:'numeric',month:'short',year:'numeric'}):'-';
            return `<tr>
            <td>${i+1}</td>
            <td><div class="table-thumb">${a.image?`<img src="${a.image}">`:'<i class="bi bi-image"></i>'}</div></td>
            <td><strong>${a.title}</strong><br><small style="color:var(--admin-text-light)">${a.excerpt.substring(0,50)}...</small></td>
            <td><span class="status-badge active" style="background:rgba(0,173,239,.1);color:var(--admin-primary)">${a.category}</span></td>
            <td><small>${d}</small></td>
            <td><span class="status-badge ${a.status}">${a.status}</span></td>
            <td><div class="action-btns"><button class="action-btn" onclick="openModal('${a.id}')" title="Edit"><i class="bi bi-pencil"></i></button><button class="action-btn delete" onclick="deleteItem('${a.id}')" title="Delete"><i class="bi bi-trash"></i></button></div></td>
        </tr>`}).join('');
    }

    document.getElementById('modalOverlay').addEventListener('click',e=>{if(e.target.id==='modalOverlay')closeModal()});
    document.addEventListener('keydown',e=>{if(e.key==='Escape'){closeModal();closeConfirm()}});

    renderTable();updateSidebarCounts();
    </script>
</body>
</html>
