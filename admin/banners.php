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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	 <script type="text/javascript">

		function confirmation_banner_delete(bannerID) {
		  swal({
			text: "Are you sure you want to delete this record?",
			icon: "warning",
			buttons: true,
		  }).then((isDelete) => {
			if (isDelete) {
			  location.href = "DeleteController.php?bannerID=" + bannerID;
			} else {
			  location.href = 'banners.php';
			}
		  });
		}
	  </script>
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
                    <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addBanner"><i class="bi bi-plus-lg"></i> Add Banner</button>
                </div>
                <div class="panel-body p-0">
                    <div class="table-responsive">
						<table class="admin-table">
							<thead>
								<tr>
									<th style="width:40px">#</th>
									<th>Image</th>
									<th>Title</th>
									<th>Description</th>
									<th>Button</th>
									<th>Status</th>
									<th>Order</th>
									<th style="width:100px">Actions</th>
								</tr>
							</thead>
							<tbody id="tableBody">
							<tr>
								<?php 
									$result = mysqli_query($conn,"select * from banner order by sort");
									if(mysqli_num_rows($result) > 0){
										$i=1;
										while($row = mysqli_fetch_assoc($result)){
											$image = $row['image'];
									?>
								<td><?php echo $i;?></td>
								<td>
									<div class="table-thumb">
										<?php if($image!="") { ?>
											<img src="<?php echo $image;?>">
										<?php } else { ?>
											<i class="bi bi-image"></i>
										<?php } ?>
									</div>
								</td>
								<td><strong><?php echo $row['title'];?></strong><br><small style="color:var(--admin-primary)"><?php echo $row['title_highlight'];?></small></td>
								<td style="max-width:200px"><small><?php echo substr($row['description'], 0, 20) . "...";?></small></td>
								<td><small><?php echo $row['button_text_one'];?></small></td>
								<td><span class="status-badge <?php echo $row['status'];?>"><?php echo $row['status'];?></span></td>
								<td><?php echo $row['sort'];?></td>
								<td>
									<div class="action-btns">
										<button class="action-btn" onclick="viewBanner(<?php echo $row['bannerID'];?>)" data-bs-toggle="modal" data-bs-target="#editBanner" title="Edit"><i class="bi bi-pencil"></i></button>
										<button class="action-btn delete" onclick='confirmation_banner_delete(<?php echo $row['bannerID']; ?>)' title="Delete"><i class="bi bi-trash"></i></button>
									</div>
								</td>
								</tr>
							 <?php 
								 $i++;
									} 
									} else { ?>
									<tr> <td colspan="8">No data...</td> </tr>
							<?php } ?>
							
							</tbody>
							</table>
					</div>
                </div>
            </div>
        </div>
    </main>
	
	 <!-- Add Modal -->
	<div class="modal fade" id="addBanner" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Add Banner</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				
			<form action="Controller.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
				
				<div class="modal-body">
				
					<div class="form-group"><label>Label Badge</label>
						<input class="form-input" id="label_badge" name="label_badge" placeholder="e.g. Trusted Since 2003">
					</div>
					<div class="form-group"><label>Title <span class="required">*</span></label>
						<input class="form-input" id="title" name="title" placeholder="e.g. Your Trusted Chartered Accountants">
					</div>
					<div class="form-group">
						<label>Title Highlight <span class="required">*</span></label>
						<input class="form-input" id="title_highlight" name="title_highlight" placeholder="e.g. Chartered Accountants (colored text)">
						<div class="form-hint">This text will appear highlighted in the primary color</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-input" id="description" name="description" placeholder="Brief description..."></textarea>
					</div>
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 1 Text</label>
								<input class="form-input" id="button_text_one" name="button_text_one" placeholder="e.g. Our Services">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 1 Link</label>
								<input class="form-input" id="button_link_one" name="button_link_one" placeholder="e.g. services.html">
							</div>
						</div>
					</div>
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 2 Text</label>
								<input class="form-input" id="button_text_two" name="button_text_two" placeholder="e.g. Learn More">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 2 Link</label>
								<input class="form-input" id="button_link_two" name="button_link_two" placeholder="e.g. about.html">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label>Background Image</label>
						<div class="img-upload-area">
							<i class="bi bi-cloud-arrow-up d-block"></i><p>Click or drag image here<br><small>Recommended: 1920×1080px</small></p>
							<input type="file" accept="image/*" id="image" name="image" onchange="handleImgUpload(event)">
						</div>
						<div class="img-preview" id="imgPreview" style="display:none">
							<img id="imgPreviewSrc"><div class="remove-img" onclick="removeImg()"><i class="bi bi-x"></i></div>
						</div>
						<input type="hidden" id="fImage">
					</div>
					
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group mb-0">
							<label>Status</label>
							<select class="form-input" id="status" name="status">
								<option value="Active">Active</option>
								<option value="Draft">Draft</option>
							</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-0">
								<label>Display Order</label>
								<input class="form-input" type="number" id="sort" name="sort" value="1" min="1">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-primary" type="submit" name="addBanner" id="addBanner">Create Banner</button>
				</div>
			</form>
			
			</div>
		</div>
	</div>
	
	<!-- Edit Modal -->
	<div class="modal fade" id="editBanner" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Edit Banner</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				
			<form action="Controller.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
				
				<div class="modal-body">
				
					<input type="hidden" class="form-input" id="bannerID" name="bannerID" required />
				
					<div class="form-group"><label>Label Badge</label>
						<input class="form-input" id="edit_label_badge" name="edit_label_badge" placeholder="e.g. Trusted Since 2003">
					</div>
					<div class="form-group"><label>Title <span class="required">*</span></label>
						<input class="form-input" id="edit_title" name="edit_title" placeholder="e.g. Your Trusted Chartered Accountants">
					</div>
					<div class="form-group">
						<label>Title Highlight <span class="required">*</span></label>
						<input class="form-input" id="edit_title_highlight" name="edit_title_highlight" placeholder="e.g. Chartered Accountants (colored text)">
						<div class="form-hint">This text will appear highlighted in the primary color</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-input" id="edit_description" name="edit_description" placeholder="Brief description..."></textarea>
					</div>
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 1 Text</label>
								<input class="form-input" id="edit_button_text_one" name="edit_button_text_one" placeholder="e.g. Our Services">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 1 Link</label>
								<input class="form-input" id="edit_button_link_one" name="edit_button_link_one" placeholder="e.g. services.html">
							</div>
						</div>
					</div>
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 2 Text</label>
								<input class="form-input" id="edit_button_text_two" name="edit_button_text_two" placeholder="e.g. Learn More">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Button 2 Link</label>
								<input class="form-input" id="edit_button_link_two" name="edit_button_link_two" placeholder="e.g. about.html">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label>Background Image</label>
						<div class="img-upload-area">
							<i class="bi bi-cloud-arrow-up d-block"></i><p>Click or drag image here<br><small>Recommended: 1920×1080px</small></p>
							<input type="file" accept="image/*" id="edit_image" name="edit_image" onchange="edit_handleImgUpload(event)">
						</div>
						<div class="img-preview" id="edit_imgPreview" style="display:none">
							<img id="edit_imgPreviewSrc"><div class="remove-img" onclick="edit_removeImg()"><i class="bi bi-x"></i></div>
						</div>
						<input type="hidden" id="edit_fImage">
					</div>
					
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group mb-0">
							<label>Status</label>
							<select class="form-input" id="edit_status" name="edit_status">
								<option value="Active">Active</option>
								<option value="Draft">Draft</option>
							</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-0">
								<label>Display Order</label>
								<input class="form-input" type="number" id="edit_sort" name="edit_sort" value="1" min="1">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-primary" type="submit" name="editBanner" id="editBanner">Save Banner</button>
				</div>
			</form>
			
			</div>
		</div>
	</div>

    

    <div class="confirm-overlay" id="confirmDialog"><div class="confirm-box"><div class="confirm-icon"><i class="bi bi-exclamation-triangle"></i></div><h5>Are you sure?</h5><p id="confirmMsg">This action cannot be undone.</p><div class="confirm-btns"><button class="btn-cancel" onclick="closeConfirm()">Cancel</button><button class="btn-save" style="background:var(--admin-danger)" id="confirmYes">Delete</button></div></div></div>
    <div class="toast-container" id="toastContainer"></div>

    <script src="admin-shared.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <script>
   
    function handleImgUpload(e){
        const file=e.target.files[0];if(!file)return;
        const reader=new FileReader();
        reader.onload=ev=>{document.getElementById('imgPreview').style.display='inline-block';document.getElementById('imgPreviewSrc').src=ev.target.result;document.getElementById('fImage').value=ev.target.result};
        reader.readAsDataURL(file);
    }
	
    function removeImg(){document.getElementById('imgPreview').style.display='none';document.getElementById('imgPreviewSrc').src='';document.getElementById('fImage').value=''}

	function edit_handleImgUpload(e){
        const file=e.target.files[0];if(!file)return;
        const reader=new FileReader();
        reader.onload=ev=>{document.getElementById('edit_imgPreview').style.display='inline-block';document.getElementById('edit_imgPreviewSrc').src=ev.target.result;document.getElementById('edit_fImage').value=ev.target.result};
        reader.readAsDataURL(file);
    }
	
    function edit_removeImg(){document.getElementById('edit_imgPreview').style.display='none';document.getElementById('edit_imgPreviewSrc').src='';document.getElementById('edit_fImage').value=''}

    
    </script>
</body>
</html>
