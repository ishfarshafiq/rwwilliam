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
    <title>Home Banners | RW William Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
</head>
<body>

   <?php include_once('includes/sidebar.php'); ?>

    <main class="admin-main">
        <div class="admin-topbar">
            <div class="topbar-left"><button class="mobile-toggle" id="mobileMenuBtn"><i class="bi bi-list"></i></button><h4>Home Banners</h4></div>
            <div class="topbar-right"><a href="https://rwwilliam.com/" target="_blank" class="view-site-btn" target="_blank"><i class="bi bi-eye"></i> View Site</a></div>
        </div>
        <div class="admin-content">
            <div class="panel">
                <div class="panel-header">
                    <h5><i class="bi bi-images"></i> Home Banners</h5>
                    <button class="btn-add" onclick="openModal()"><i class="bi bi-plus-lg"></i> Add Banner</button>
                </div>
                <div class="panel-body p-0">
                    <div class="table-responsive"><table class="admin-table"><thead><tr><th style="width:40px">#</th><th>Image</th><th>Title</th><th>Subtitle</th><th>Button</th><th>Status</th><th>Order</th><th style="width:100px">Actions</th></tr></thead><tbody id="tableBody"></tbody></table></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-box">
            <div class="modal-head"><h5 id="modalTitle">Add Banner</h5><button class="modal-close" onclick="closeModal()"><i class="bi bi-x-lg"></i></button></div>
            <div class="modal-form">
                <input type="hidden" id="itemId">
                <div class="form-group"><label>Label Badge</label><input class="form-input" id="fLabel" placeholder="e.g. Trusted Since 2003"></div>
                <div class="form-group"><label>Title <span class="required">*</span></label><input class="form-input" id="fTitle" placeholder="e.g. Your Trusted Chartered Accountants"></div>
                <div class="form-group"><label>Title Highlight <span class="required">*</span></label><input class="form-input" id="fHighlight" placeholder="e.g. Chartered Accountants (colored text)"><div class="form-hint">This text will appear highlighted in the primary color</div></div>
                <div class="form-group"><label>Description</label><textarea class="form-input" id="fDesc" placeholder="Brief description..."></textarea></div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group"><label>Button 1 Text</label><input class="form-input" id="fBtn1Text" placeholder="e.g. Our Services"></div></div>
                    <div class="col-md-6"><div class="form-group"><label>Button 1 Link</label><input class="form-input" id="fBtn1Link" placeholder="e.g. services.html"></div></div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group"><label>Button 2 Text</label><input class="form-input" id="fBtn2Text" placeholder="e.g. Learn More"></div></div>
                    <div class="col-md-6"><div class="form-group"><label>Button 2 Link</label><input class="form-input" id="fBtn2Link" placeholder="e.g. about.html"></div></div>
                </div>
                <div class="form-group">
                    <label>Background Image</label>
                    <div class="img-upload-area"><i class="bi bi-cloud-arrow-up d-block"></i><p>Click or drag image here<br><small>Recommended: 1920×1080px</small></p><input type="file" accept="image/*" onchange="handleImgUpload(event)"></div>
                    <div class="img-preview" id="imgPreview" style="display:none"><img id="imgPreviewSrc"><div class="remove-img" onclick="removeImg()"><i class="bi bi-x"></i></div></div>
                    <input type="hidden" id="fImage">
                </div>
                <div class="row g-3">
                    <div class="col-md-6"><div class="form-group mb-0"><label>Status</label><select class="form-input" id="fStatus"><option value="active">Active</option><option value="draft">Draft</option></select></div></div>
                    <div class="col-md-6"><div class="form-group mb-0"><label>Display Order</label><input class="form-input" type="number" id="fOrder" value="1" min="1"></div></div>
                </div>
            </div>
            <div class="modal-foot"><button class="btn-cancel" onclick="closeModal()">Cancel</button><button class="btn-save" onclick="saveItem()"><i class="bi bi-check-lg"></i> Save Banner</button></div>
        </div>
    </div>

    <div class="confirm-overlay" id="confirmDialog"><div class="confirm-box"><div class="confirm-icon"><i class="bi bi-exclamation-triangle"></i></div><h5>Are you sure?</h5><p id="confirmMsg">This action cannot be undone.</p><div class="confirm-btns"><button class="btn-cancel" onclick="closeConfirm()">Cancel</button><button class="btn-save" style="background:var(--admin-danger)" id="confirmYes">Delete</button></div></div></div>
    <div class="toast-container" id="toastContainer"></div>

    <script src="admin-shared.js"></script>
    <script>
    const STORE_KEY='banners';

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
            const data=getData(STORE_KEY),b=data.find(x=>x.id===id);if(!b)return;
            document.getElementById('itemId').value=b.id;
            document.getElementById('fLabel').value=b.label||'';
            document.getElementById('fTitle').value=b.title;
            document.getElementById('fHighlight').value=b.highlight;
            document.getElementById('fDesc').value=b.desc||'';
            document.getElementById('fBtn1Text').value=b.btn1Text||'';
            document.getElementById('fBtn1Link').value=b.btn1Link||'';
            document.getElementById('fBtn2Text').value=b.btn2Text||'';
            document.getElementById('fBtn2Link').value=b.btn2Link||'';
            document.getElementById('fStatus').value=b.status||'active';
            document.getElementById('fOrder').value=b.order||1;
            if(b.image){document.getElementById('imgPreview').style.display='inline-block';document.getElementById('imgPreviewSrc').src=b.image;document.getElementById('fImage').value=b.image}
            document.getElementById('modalTitle').textContent='Edit Banner';
        }
        document.getElementById('modalOverlay').classList.add('show');document.body.style.overflow='hidden';
    }
    function closeModal(){document.getElementById('modalOverlay').classList.remove('show');document.body.style.overflow='';resetForm()}
    function resetForm(){['itemId','fLabel','fTitle','fHighlight','fDesc','fBtn1Text','fBtn1Link','fBtn2Text','fBtn2Link','fImage'].forEach(id=>document.getElementById(id).value='');document.getElementById('fStatus').value='active';document.getElementById('fOrder').value='1';document.getElementById('imgPreview').style.display='none';document.getElementById('modalTitle').textContent='Add Banner'}

    function saveItem(){
        const title=document.getElementById('fTitle').value.trim(),highlight=document.getElementById('fHighlight').value.trim();
        if(!title||!highlight){showToast('Title and Highlight are required','error');return}
        const data=getData(STORE_KEY),id=document.getElementById('itemId').value;
        const item={label:document.getElementById('fLabel').value.trim(),title,highlight,desc:document.getElementById('fDesc').value.trim(),btn1Text:document.getElementById('fBtn1Text').value.trim(),btn1Link:document.getElementById('fBtn1Link').value.trim(),btn2Text:document.getElementById('fBtn2Text').value.trim(),btn2Link:document.getElementById('fBtn2Link').value.trim(),image:document.getElementById('fImage').value,status:document.getElementById('fStatus').value,order:parseInt(document.getElementById('fOrder').value)||1};
        if(id){const idx=data.findIndex(b=>b.id===id);if(idx>-1){data[idx]={...data[idx],...item};showToast('Banner updated successfully')}}
        else{item.id=genId();data.push(item);showToast('Banner added successfully')}
        setData(STORE_KEY,data);closeModal();renderTable();updateSidebarCounts();
    }
    function deleteItem(id){showConfirm('Delete this banner? This cannot be undone.',()=>{let data=getData(STORE_KEY);data=data.filter(b=>b.id!==id);setData(STORE_KEY,data);renderTable();updateSidebarCounts();showToast('Banner deleted')})}

    function renderTable(){
        const data=getData(STORE_KEY).sort((a,b)=>(a.order||1)-(b.order||1));
        const tbody=document.getElementById('tableBody');
        if(!data.length){tbody.innerHTML='<tr><td colspan="8"><div class="empty-state"><i class="bi bi-images"></i><h6>No banners yet</h6><p>Add your first home banner slide</p></div></td></tr>';return}
        tbody.innerHTML=data.map((b,i)=>`<tr>
            <td>${i+1}</td>
            <td><div class="table-thumb">${b.image?`<img src="${b.image}">`:'<i class="bi bi-image"></i>'}</div></td>
            <td><strong>${b.title}</strong><br><small style="color:var(--admin-primary)">${b.highlight}</small></td>
            <td style="max-width:200px"><small>${b.desc?b.desc.substring(0,60)+'...':'-'}</small></td>
            <td><small>${b.btn1Text||'-'}</small></td>
            <td><span class="status-badge ${b.status}">${b.status}</span></td>
            <td>${b.order||1}</td>
            <td><div class="action-btns"><button class="action-btn" onclick="openModal('${b.id}')" title="Edit"><i class="bi bi-pencil"></i></button><button class="action-btn delete" onclick="deleteItem('${b.id}')" title="Delete"><i class="bi bi-trash"></i></button></div></td>
        </tr>`).join('');
    }

    // Modal close on overlay/esc
    document.getElementById('modalOverlay').addEventListener('click',e=>{if(e.target.id==='modalOverlay')closeModal()});
    document.addEventListener('keydown',e=>{if(e.key==='Escape'){closeModal();closeConfirm()}});

    renderTable();updateSidebarCounts();
    </script>
</body>
</html>
