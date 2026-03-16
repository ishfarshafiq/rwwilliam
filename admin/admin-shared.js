// ===== DATA STORE (localStorage) =====
function getData(key){try{return JSON.parse(localStorage.getItem('rw_admin_'+key))||[]}catch(e){return[]}}
function setData(key,data){localStorage.setItem('rw_admin_'+key,JSON.stringify(data))}
function genId(){return Date.now().toString(36)+'_'+Math.random().toString(36).substr(2,5)}

// ===== SIDEBAR COUNTS =====
function updateSidebarCounts(){
    const bc=document.getElementById('bannerCount'),ac=document.getElementById('annCount'),gc=document.getElementById('galleryCount');
    if(bc) bc.textContent=getData('banners').length;
    if(ac) ac.textContent=getData('announcements').length;
    if(gc) gc.textContent=getData('gallery').length;
}

// ===== MOBILE SIDEBAR =====
(function(){
    const sidebar=document.getElementById('adminSidebar');
    const backdrop=document.getElementById('sidebarBackdrop');
    const btn=document.getElementById('mobileMenuBtn');
    if(btn){btn.addEventListener('click',()=>{sidebar.classList.add('open');backdrop.classList.add('show')})}
    if(backdrop){backdrop.addEventListener('click',()=>{sidebar.classList.remove('open');backdrop.classList.remove('show')})}
})();

// ===== TOAST =====
function showToast(msg,type='success'){
    const container=document.getElementById('toastContainer');if(!container)return;
    const t=document.createElement('div');t.className='toast-msg '+type;
    t.innerHTML=`<i class="bi bi-${type==='success'?'check-circle':type==='error'?'x-circle':'info-circle'}"></i> ${msg}`;
    container.appendChild(t);
    requestAnimationFrame(()=>t.classList.add('show'));
    setTimeout(()=>{t.classList.remove('show');setTimeout(()=>t.remove(),400)},3000);
}

// ===== CONFIRM DIALOG =====
let _confirmCallback=null;
function showConfirm(msg,cb){
    const el=document.getElementById('confirmDialog');if(!el)return;
    document.getElementById('confirmMsg').textContent=msg;
    _confirmCallback=cb;
    el.classList.add('show');
}
function closeConfirm(){
    const el=document.getElementById('confirmDialog');if(el)el.classList.remove('show');
    _confirmCallback=null;
}
(function(){
    const yesBtn=document.getElementById('confirmYes');
    if(yesBtn){yesBtn.addEventListener('click',()=>{if(_confirmCallback)_confirmCallback();closeConfirm()})}
})();

// ===== EXPORT / IMPORT =====
function exportAllData(){
    const exportObj={banners:getData('banners'),announcements:getData('announcements'),gallery:getData('gallery'),exportDate:new Date().toISOString()};
    const blob=new Blob([JSON.stringify(exportObj,null,2)],{type:'application/json'});
    const url=URL.createObjectURL(blob);
    const a=document.createElement('a');a.href=url;a.download='rw-admin-data-'+new Date().toISOString().split('T')[0]+'.json';a.click();
    URL.revokeObjectURL(url);showToast('Data exported successfully');
}
function importData(e){
    const file=e.target.files[0];if(!file)return;
    const reader=new FileReader();
    reader.onload=function(ev){
        try{
            const data=JSON.parse(ev.target.result);
            if(data.banners)setData('banners',data.banners);
            if(data.announcements)setData('announcements',data.announcements);
            if(data.gallery)setData('gallery',data.gallery);
            updateSidebarCounts();
            if(typeof renderTable==='function')renderTable();
            if(typeof updatePage==='function')updatePage();
            showToast('Data imported successfully');
        }catch(err){showToast('Invalid JSON file','error')}
    };reader.readAsText(file);e.target.value='';
}
