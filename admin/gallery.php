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
    <title>Gallery Albums | RW William Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="admin-style.css" rel="stylesheet">
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  
	  <script type="text/javascript">

		function confirmation_gallerymain_delete(gallery_mainID) {
		  swal({
			text: "Are you sure you want to delete this record?",
			icon: "warning",
			buttons: true,
		  }).then((isDelete) => {
			if (isDelete) {
			  location.href = "DeleteController.php?gallery_mainID=" + gallery_mainID;
			} else {
			  location.href = 'gallery.php';
			}
		  });
		}
	  </script>
	
</head>
<body>

    <?php include_once('includes/sidebar.php'); ?>

    <main class="admin-main">
        <div class="admin-topbar">
            <div class="topbar-left"><button class="mobile-toggle" id="mobileMenuBtn"><i class="bi bi-list"></i></button><h4>Gallery Albums</h4></div>
            <div class="topbar-right"><a href="https://rwwilliam.com/" target="_blank" class="view-site-btn" target="_blank"><i class="bi bi-eye"></i> View Site</a></div>
        </div>
        <div class="admin-content">
            <div class="panel">
                <div class="panel-header">
                    <h5><i class="bi bi-camera"></i> Gallery Albums</h5>
                    <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addAlbum"><i class="bi bi-plus-lg"></i> Add Album</button>
                </div>
                <div class="panel-body p-0">
                    <div class="table-responsive">
						<table class="admin-table">
							<thead>
							<tr>
								<th style="width:40px">#</th>
								<!--<th>Cover</th>-->
								<th>Title</th>
								<th>Category</th>
								<th>Date</th>
								<th>Photos</th>
								<th>Status</th>
								<th style="width:100px">Actions</th>
							</tr>
							</thead>
							<tbody id="tableBody">
							<?php 
							$result = mysqli_query($conn,"SELECT a.*, count(b.gallery_mainID) as no_img FROM gallery_main a
															left join gallery_image b on a.gallery_mainID = b.gallery_mainID
															group by a.gallery_mainID
															order by a.gallery_mainID desc;");
							if(mysqli_num_rows($result) > 0){
								$i=1;
								while($row = mysqli_fetch_assoc($result)){
									$status = $row['status'];
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><strong><?php echo $row['title'];?></strong></td>
								<td><span class="status-badge active" style="background:rgba(0,173,239,.1);color:var(--admin-primary)"><?php echo $row['category'];?></span></td>
								<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
								<td><?php echo $row['no_img'];?></td>
								<td><span class="status-badge <?php echo $status;?>"><?php echo $status;?></span></td>
								
								<td>
									<div class="action-btns">
										<button class="action-btn" onclick="viewAlbum(<?php echo $row['gallery_mainID'];?>)" data-bs-toggle="modal" data-bs-target="#editAlbum" title="Edit"><i class="bi bi-pencil"></i></button>
										<a class="action-btn" href="gallery_image.php?gallery_mainID=<?php echo $row['gallery_mainID'];?>"><i class="bi bi-file-text"></i></a>
										<button class="action-btn delete" onclick='confirmation_gallerymain_delete(<?php echo $row['gallery_mainID']; ?>)' title="Delete"><i class="bi bi-trash"></i></button>
									</div>
								</td>
								
							</tr>
								 <?php 
								 $i++;
									} 
									} else { ?>
									<tr> <td colspan="7">No data...</td> </tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Modal -->
	<div class="modal fade" id="addAlbum" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Add Album</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				
			<form action="Controller.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
				<div class="modal-body">
				
				<div class="form-group">
					<label>Album Title <span class="required">*</span></label>
					<input class="form-input" id="title" name="title" placeholder="e.g. Annual Dinner 2025" required />
				</div>
				
                <div class="row g-3">
                    <div class="col-md-6">
						<div class="form-group">
						<label>Category <span class="required">*</span></label>
						<select class="form-input" id="category" name="category">
							<option value="Company Events">Company Events</option>
							<option value="Workshops & Seminars">Workshops & Seminars</option>
							<option value="Team Activities">Team Activities</option>
							<option value="Celebrations">Celebrations</option>
							<option value="CSR">CSR</option>
							<option value="Others">Others</option>
							</select>
						</div>
					</div>
                    <div class="col-md-6">
						<div class="form-group">
							<label>Date</label>
							<input class="form-input" type="date" id="date" name="date" required>
						</div>
					</div>
                </div>
				
                <div class="form-group">
					<label>Description</label>
					<textarea class="form-input" id="description" name="description"></textarea>
				</div>
                <div class="form-group">
					<label>Status</label>
					<select class="form-input" id="status" name="status">
						<option value="Active">Active</option>
						<option value="Draft">Draft</option>
					</select>
				</div>
                
					
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit" name="addGalleryMain" id="addGalleryMain">Create Album</button>
				</div>
			</form>
			
			</div>
		</div>
	</div>
	
	 <!-- Edit Modal -->
	<div class="modal fade" id="editAlbum" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Edit Album</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				
			<form action="Controller.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
				<div class="modal-body">
				
				<input type="hidden" class="form-input" id="gallery_mainID" name="gallery_mainID" required />
				
				<div class="form-group">
					<label>Album Title <span class="required">*</span></label>
					<input class="form-input" id="edit_title" name="edit_title" placeholder="e.g. Annual Dinner 2025" required />
				</div>
				
                <div class="row g-3">
                    <div class="col-md-6">
						<div class="form-group">
						<label>Category <span class="required">*</span></label>
						<select class="form-input" id="edit_category" name="edit_category">
							<option value="Company Events">Company Events</option>
							<option value="Workshops & Seminars">Workshops & Seminars</option>
							<option value="Team Activities">Team Activities</option>
							<option value="Celebrations">Celebrations</option>
							<option value="CSR">CSR</option>
							<option value="Others">Others</option>
							</select>
						</div>
					</div>
                    <div class="col-md-6">
						<div class="form-group">
							<label>Date</label>
							<input class="form-input" type="date" id="edit_date" name="edit_date" required>
						</div>
					</div>
                </div>
				
                <div class="form-group">
					<label>Description</label>
					<textarea class="form-input" id="edit_description" name="edit_description"></textarea>
				</div>
                <div class="form-group">
					<label>Status</label>
					<select class="form-input" id="edit_status" name="edit_status">
						<option value="Active">Active</option>
						<option value="Draft">Draft</option>
					</select>
				</div>
                
					
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit" name="saveGalleryMain" id="saveGalleryMain">Save Album</button>
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
	
	<?php
	
	?>
   
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
