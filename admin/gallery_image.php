<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once('includes/authentication.php');

if(isset($_GET['gallery_mainID']))
{
	$gallery_mainID = $_GET['gallery_mainID'];
	$sql="SELECT * FROM gallery_main where gallery_mainID = $gallery_mainID limit 1";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$title = $row['title'];
	
	$sql="SELECT count(*) as counts FROM gallery_image where gallery_mainID = $gallery_mainID limit 1";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$counts = $row['counts'];
}
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
	
	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
	<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
	  
	  <script type="text/javascript">
		$(document).ready(function() {
			$('#dtTbl').DataTable({
				searching: false,
				language: {
					emptyTable: "No data available"
				}
			});
		});
		</script>
		
		<script type="text/javascript">

		 function confirmation_image_delete(gallery_imageID) {
			  swal({
				text: "Are you sure you want to delete this record?",
				icon: "warning",
				buttons: true,
			  }).then((isDelete) => {
				if (isDelete) {
				  location.href = "DeleteController.php?gallery_imageID=" + gallery_imageID ;
				} else {
				  location.href = 'gallery.php';
				}
			  });
			}
			
		function previewImages(event) {
			var files = event.target.files;
			var output = document.getElementById('outputPreview');
			output.innerHTML = ''; // Clear previous

			for (var i = 0; i < files.length; i++) {
				var img = document.createElement("img");
				img.src = URL.createObjectURL(files[i]);
				img.style.width = "150px";
				img.style.height = "100px";
				img.style.margin = "5px";
				output.appendChild(img);
			}
		}

		function toggleCheckboxes(source) {
			const checkboxes = document.querySelectorAll('input[name="gallery_imageIDs[]"]');
			checkboxes.forEach(cb => cb.checked = source.checked);
		}
  </script>
	  
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
            <div class="topbar-left"><button class="mobile-toggle" id="mobileMenuBtn"><i class="bi bi-list"></i></button><h4>Gallery</h4></div>
            <div class="topbar-right"><a href="https://rwwilliam.com/" target="_blank" class="view-site-btn" target="_blank"><i class="bi bi-eye"></i> View Site</a></div>
        </div>
		
        <div class="admin-content">
            <div class="panel">
                <div class="panel-header">
                    <h5><i class="bi bi-camera"></i> <?php echo $title;?></h5>
                    <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addImage"><i class="bi bi-plus-lg"></i> Add Image</button>
                </div>
				<form action="" method="post">
                <div class="panel-body p-0">
                    <div class="table-responsive">
						
						<div class="mb-3">
							<input type="hidden" class="form-control" id="gallery_mainID" name="gallery_mainID" value="<?php echo $gallery_mainID;?>" />
						  </div>
						
						<table id="dtTbl" class="admin-table">
							<thead>
							<tr>
								<th style="width:40px"><input type="checkbox" id="checkAll" onclick="toggleCheckboxes(this)"> Select All</th>
								<th style="width:40px">Image</th>
								<th style="width:50px">Actions</th>
							</tr>
							</thead>
							<tbody id="tableBody">
							<?php 
								$i=1;
								$result = mysqli_query($conn,"SELECT * FROM gallery_image where gallery_mainID = $gallery_mainID order by gallery_imageID desc");
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_assoc($result)){
								?>
							<tr>
								<td><input type="checkbox" id="gallery_imageIDs" name="gallery_imageIDs[]" value="<?php echo $row['gallery_imageID'];?>"></td>
								<td>
									<a href="<?php echo $row['image']; ?>" target="_blank">
										<img class="img-thumbnail" width="150" height="150" src="<?php echo $row['image']; ?>">
									</a>
								</td>
								<td>
									<div class="action-btns">
										<a class="action-btn delete" onclick='confirmation_image_delete(<?php echo $row['gallery_imageID']; ?>)' title="Delete"><i class="bi bi-trash"></i></a>
									</div>
								</td>
								
							</tr>
								 <?php 
								 $i++;
									} 
									} else { ?>
									<tr> <td colspan="3">No data...</td> </tr>
							<?php } ?>
							</tbody>
						</table>
						
						
						
					</div>
					
                </div>
            </div>
			<?php if($counts > 0) { ?>
			<br/>
			<button type="submit" id="btnDeleteAll" name="btnDeleteAll" class="btn btn-danger">Delete All</button>
		 <?php } ?>
        </div>
		
		
		
		</form>
    </main>

    <!-- Upload Modal -->
	<div class="modal fade" id="addImage" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Upload Image</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				
			<form action="Controller.php" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
				<div class="modal-body">
				
				 <div class="mb-3">
					<input type="hidden" class="form-control" id="gallery_mainID" name="gallery_mainID" value="<?php echo $gallery_mainID;?>" />
				  </div>
				
					<div class="mb-3">
						<label for="image" class="form-label">Upload Images</label>
						<input type="file" class="form-control" name="imageName[]" id="imageName" onchange="previewImages(event)" multiple required>
					  </div>
		  
				   <div class="mb-3">
						<center>
							<div id="outputPreview"></div>
						</center>
					</div>
                
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit" id="UploadBtn" name="UploadBtn">Upload</button>
				</div>
			</form>
			
			</div>
		</div>
	</div>
	
	

    <div class="confirm-overlay" id="confirmDialog"><div class="confirm-box"><div class="confirm-icon"><i class="bi bi-exclamation-triangle"></i></div><h5>Are you sure?</h5><p id="confirmMsg">This action cannot be undone.</p><div class="confirm-btns"><button class="btn-cancel" onclick="closeConfirm()">Cancel</button><button class="btn-save" style="background:var(--admin-danger)" id="confirmYes">Delete</button></div></div></div>
    <div class="toast-container" id="toastContainer"></div>
	
	<?php
if(isset($_POST['btnDeleteAll']))
{
	
	$gallery_mainID = $_POST['gallery_mainID'];
	
	if (empty($_POST['gallery_imageIDs']))
	{
		
		echo "<script>
					swal({
					  title: 'Warning',
					  text: 'Please select image.',
					  icon: 'warning',
					  buttons: true,
					})
					.then((isUpdate) => {
					  if (isUpdate) {
						location.href='gallery_image.php?gallery_mainID=$gallery_mainID';
					  }else{
						  location.href='gallery_image.php?gallery_mainID=$gallery_mainID';
					  }
					});
			</script>";
		
	}
	else
	{
		foreach($_POST['gallery_imageIDs'] as $gallery_imageIDs) 
		{
			$result=mysqli_query($conn,"select image from gallery_image where gallery_imageID = $gallery_imageIDs");
			$row=mysqli_fetch_assoc($result);
			
			if($row['image'] != ""){
				unlink($row['image']);
			}
			
			mysqli_query($conn,"delete from gallery_image where gallery_imageID = $gallery_imageIDs");
			
		}
		
		echo "<script>
					swal({
					  title: 'Success',
					  text: 'Data deleted!',
					  icon: 'success',
					  buttons: true,
					})
					.then((isUpdate) => {
					  if (isUpdate) {
						location.href='gallery_image.php?gallery_mainID=$gallery_mainID';
					  }else{
						  location.href='gallery_image.php?gallery_mainID=$gallery_mainID';
					  }
					});
			</script>";
		
	}
}
?>
	

    <script src="admin-shared.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
