<header>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</header>
<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
$datetimes = date("Y-m-d h:i:s");

if (isset($_GET['gallery_mainID'])) {
	
	$gallery_mainID = $_GET['gallery_mainID'];
	
	$result=mysqli_query($conn,"select image from gallery_image where gallery_mainID = '$gallery_mainID'");
	while($row=mysqli_fetch_assoc($result))
	{
		if($row['image'] != ""){
			unlink($row['image']);
		}
	}
	
	
	
	 if(mysqli_query($conn,"delete from gallery_image where gallery_mainID = $gallery_mainID")){
		 
			mysqli_query($conn,"delete from gallery_main where gallery_mainID = $gallery_mainID");
			
				echo "<script>
							swal({
							  title: 'Success',
							  text: 'Data is deleted',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='gallery.php';
							  }else{
								  location.href='gallery.php';
							  }
							});
					</script>";
					
			
		}

}

if (isset($_GET['gallery_imageID'])) {
	
	$gallery_imageID = $_GET['gallery_imageID'];
	
	$result=mysqli_query($conn,"SELECT gallery_mainID FROM gallery_image where gallery_imageID = $gallery_imageID limit 1");
	$row = mysqli_fetch_assoc($result);
	$gallery_mainID = $row['gallery_mainID'];
	
	$sql="SELECT image FROM gallery_image where gallery_imageID = $gallery_imageID limit 1";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($row['image'] != ""){
			unlink($row['image']);
		}
	}
	
	 if(mysqli_query($conn,"delete from gallery_image where gallery_imageID = $gallery_imageID")){
			
				echo "<script>
							swal({
							  title: 'Success',
							  text: 'Data is deleted',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='gallery_image.php?gallery_mainID=$gallery_mainID';
							  }else{
								  location.href='gallery.php';
							  }
							});
					</script>";
					
			
		}
		
	
	

}



if (isset($_GET['newsID'])) {
	
	$newsID = $_GET['newsID'];
	$sql="SELECT image FROM news where newsID = $newsID limit 1";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($row['image'] != ""){
			unlink($row['image']);
		}
	}
	
	 if(mysqli_query($conn,"delete from news where newsID = $newsID")){
		
		echo "<script>
							swal({
							  title: 'Success',
							  text: 'Data is deleted',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='announcements.php';
							  }else{
								  location.href='announcements.php';
							  }
							});
					</script>";
		}

}

if (isset($_GET['bannerID'])) {
	
	$bannerID = $_GET['bannerID'];
	$sql="SELECT image FROM banner where bannerID = $bannerID limit 1";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($row['image'] != ""){
			unlink($row['image']);
		}
	}
	
	 if(mysqli_query($conn,"delete from banner where bannerID = $bannerID")){
		
		echo "<script>
							swal({
							  title: 'Success',
							  text: 'Data is deleted',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='banners.php';
							  }else{
								  location.href='banners.php';
							  }
							});
					</script>";
		}

}
?>