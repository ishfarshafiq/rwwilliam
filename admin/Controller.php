<header>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</header>
<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
$datetimes = date("Y-m-d h:i:s");

if (isset($_POST['addBanner'])) {
    
    $label_badge = $_POST['label_badge'];
    $title = $_POST['title'];
	$title_highlight = $_POST['title_highlight'];
	$button_text_one = $_POST['button_text_one'];
	$button_link_one = $_POST['button_link_one'];
	$button_text_two = $_POST['button_text_two'];
	$button_link_two = $_POST['button_link_two'];
	$status = $_POST['status'];
	$sort = $_POST['sort'];
	$description = $_POST['description'];
	$description = str_replace(["'", "’"], "", $description);
	$uploadOk = 1;
	
	$target_dir = "uploads/banners/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if($_FILES["image"]["tmp_name"]!=""){ $uploadOk = 1; }else{ $uploadOk = 0; }

    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }
	
	if ($uploadOk == 0) {
		
		if(mysqli_query($conn,"insert into banner
		(label_badge, title, title_highlight, button_text_one, button_link_one, button_text_two, button_link_two, status, sort, description) 
			values 
		('$label_badge', '$title', '$title_highlight', '$button_text_one', '$button_link_one', '$button_text_two', '$button_link_two', '$status', '$sort', '$description')"))
		{
			echo "<script>
					swal({
					  title: 'Success',
					  text: 'Data saved',
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
	else 
	{
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			
			if(mysqli_query($conn,"insert into banner
									(label_badge, title, title_highlight, button_text_one, button_link_one, button_text_two, button_link_two, status, sort, description, image) 
										values 
									('$label_badge', '$title', '$title_highlight', '$button_text_one', '$button_link_one', '$button_text_two', '$button_link_two', '$status', '$sort', '$description', '$target_file')"))
			{
				echo "<script>
						swal({
						  title: 'Success',
						  text: 'Data saved',
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
	}

   
}

if (isset($_POST['editBanner'])) {
	
	$bannerID = $_POST['bannerID'];
	$label_badge = $_POST['edit_label_badge'];
    $title = $_POST['edit_title'];
	$title_highlight = $_POST['edit_title_highlight'];
	$button_text_one = $_POST['edit_button_text_one'];
	$button_link_one = $_POST['edit_button_link_one'];
	$button_text_two = $_POST['edit_button_text_two'];
	$button_link_two = $_POST['edit_button_link_two'];
	$status = $_POST['edit_status'];
	$sort = $_POST['edit_sort'];
	$description = $_POST['edit_description'];
	$description = str_replace(["'", "’"], "", $description);
	$uploadOk = 1;

  $target_dir = "uploads/banners/";
  $target_file = $target_dir . basename($_FILES["edit_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
  if($_FILES["edit_image"]["tmp_name"]!=""){ $uploadOk = 1; }else{ $uploadOk = 0; }


	if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }

	if ($uploadOk == 0) {
	  
	  if(mysqli_query($conn,"update banner set 
								label_badge='$label_badge',
								title='$title',
								title_highlight='$title_highlight',
								description='$description',
								button_text_one='$button_text_one',
								button_link_one='$button_link_one',
								button_text_two='$button_text_two',
								button_link_two='$button_link_two',
								status='$status',
								sort='$sort'
								where bannerID = $bannerID")){
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
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
	else 
	{
	  if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $target_file)) {
		
		$sql="SELECT image FROM banner where bannerID = $bannerID limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			if($row['image'] != ""){
				unlink($row['image']);
			}
		}
		
		if(mysqli_query($conn,"update banner set 
								label_badge='$label_badge',
								title='$title',
								title_highlight='$title_highlight',
								description='$description',
								button_text_one='$button_text_one',
								button_link_one='$button_link_one',
								button_text_two='$button_text_two',
								button_link_two='$button_link_two',
								status='$status',
								sort='$sort',
								image='$target_file'
								where bannerID = $bannerID")){
			
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
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
		
	  } else {
		
		echo "<script>
							swal({
							  title: 'Error',
							  text: 'Sorry, there was an error uploading your file.',
							  icon: 'error',
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

   
}

if (isset($_POST['addAnnouncement'])) {
    
    $title = $_POST['title'];
    $category = $_POST['category'];
	$date = $_POST['publish_date'];
	$author = $_POST['author'];
	$icon = $_POST['icon'];
	$status = $_POST['status'];
	$description = $_POST['description'];
	$description = str_replace(["'", "’"], "", $description);
	$uploadOk = 1;
	
	$target_dir = "uploads/announcement/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if($_FILES["image"]["tmp_name"]!=""){ $uploadOk = 1; }else{ $uploadOk = 0; }

    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }
	
	if ($uploadOk == 0) {
		
		if(mysqli_query($conn,"insert into news(category, title, publish_date, author, description, icon, status) values ('$category', '$title', '$date', '$author', '$description', '$icon', '$status')"))
		{
			echo "<script>
					swal({
					  title: 'Success',
					  text: 'Data saved',
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
	else 
	{
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			
			if(mysqli_query($conn,"insert into news(category, title, publish_date, author, description, icon, status, image) values ('$category', '$title', '$date', '$author', '$description', '$icon', '$status', '$target_file')"))
			{
				echo "<script>
						swal({
						  title: 'Success',
						  text: 'Data saved',
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
	}

   
}

if (isset($_POST['editAnnouncement'])) {
	
	$newsID = $_POST['newsID'];
	$title = $_POST['edit_title'];
    $category = $_POST['edit_category'];
	$publish_date = $_POST['edit_publish_date'];
	$author = $_POST['edit_author'];
	$icon = $_POST['edit_icon'];
	$status = $_POST['edit_status'];
	$description = $_POST['edit_description'];
	$description = str_replace(["'", "’"], "", $description);
	$uploadOk = 1;

  $target_dir = "uploads/announcement/";
  $target_file = $target_dir . basename($_FILES["edit_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
  if($_FILES["edit_image"]["tmp_name"]!=""){ $uploadOk = 1; }else{ $uploadOk = 0; }


	if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }

	if ($uploadOk == 0) {
	  
	  if(mysqli_query($conn,"update news set category='$category', title='$title', publish_date='$publish_date', author='$author', description='$description', icon='$icon', status='$status' where newsID = $newsID")){
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
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
	else 
	{
	  if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $target_file)) {
		
		$sql="SELECT image FROM news where newsID = $newsID limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			if($row['image'] != ""){
				unlink($row['image']);
			}
		}
		
		if(mysqli_query($conn,"update news set category='$category', title='$title', publish_date='$publish_date', author='$author', description='$description', icon='$icon', status='$status', image='$target_file' where newsID = $newsID")){
			
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
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
		
	  } else {
		
		echo "<script>
							swal({
							  title: 'Error',
							  text: 'Sorry, there was an error uploading your file.',
							  icon: 'error',
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

   
}

if(isset($_POST['addGalleryMain']))
{
	$title = $_POST['title'];
	$category = $_POST['category'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$description = str_replace(["'", "’"], "", $description);
	$status = $_POST['status'];
	
	if(mysqli_query($conn,"insert into gallery_main (title, category, date, description, status) values ('$title', '$category', '$date', '$description', '$status')")){
			
			echo "<script>
						swal({
						  title: 'Success',
						  text: 'Data saved!',
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


if (isset($_POST['saveGalleryMain'])) {
	
	$gallery_mainID = $_POST['gallery_mainID'];
	$title = $_POST['edit_title'];
	$category = $_POST['edit_category'];
	$date = $_POST['edit_date'];
	$description = $_POST['edit_description'];
	$description = str_replace(["'", "’"], "", $description);
	$status = $_POST['edit_status'];
	
	if(mysqli_query($conn,"update gallery_main set title='$title', category='$category', date='$date', description='$description', status='$status' where gallery_mainID = $gallery_mainID")){
				
				echo "<script>
							swal({
							  title: 'Success',
							  text: 'Data saved!',
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


if(isset($_POST['UploadBtn'])) {
    $gallery_mainID = $_POST['gallery_mainID'];
    $images = $_FILES['imageName'];

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'heic'];

    for($i = 0; $i < count($images['name']); $i++) {
        $image = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];

        if(!empty($image)) {

            $filename = stripslashes($image);
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if(!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid image extension for $filename');</script>";
                continue; // Skip this image
            }

            $randomCode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
            $timestamp = date("Ymd_His") . "_" . $i;
            $newFileName = $randomCode . "_" . $timestamp . "." . $extension;

            $uploadPath = "uploads/gallery/" . $newFileName;

            // Move the original file without resizing
            if(move_uploaded_file($tmp_name, $uploadPath)) {

                $sql = "INSERT INTO gallery_image(gallery_mainID, image) VALUES ($gallery_mainID, '$uploadPath')";
                mysqli_query($conn, $sql);

            } else {
                echo "<script>alert('Failed to upload $filename');</script>";
            }

        }
    }

    echo "<script>location.href='gallery_image.php?gallery_mainID=$gallery_mainID'</script>";
}

?>