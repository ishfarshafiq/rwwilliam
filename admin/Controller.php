<header>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</header>
<?php
session_start();
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
$datetimes = date("Y-m-d h:i:s");


if (isset($_POST['addHappening'])) {
    
    $happeningTitle = $_POST['happeningTitle'];
    $happeningDate = $_POST['happeningDate'];
	$eventAuthor = $_POST['eventAuthor'];
	$happeningStatus = $_POST['happeningStatus'];
	$happeningDescription = $_POST['happeningDescription'];
	$happeningDescription = str_replace(["'", "’"], "", $happeningDescription);

    // Handling the file upload
    if (isset($_FILES['happeningImage']) && $_FILES['happeningImage']['error'] == 0) {
       
        $fileName = $_FILES['happeningImage']['name'];
        $fileTmpName = $_FILES['happeningImage']['tmp_name'];
        $fileSize = $_FILES['happeningImage']['size'];
        $fileType = $_FILES['happeningImage']['type'];
        
        $uploadDir = 'uploads/happening/';
        
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExt;
        $uploadPath = $uploadDir . $newFileName;
        
        
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
           
            if(mysqli_query($conn,"insert into happening(happeningTitle, happeningDate, happeningImage, happeningDescription, eventAuthor, happeningStatus) values ('$happeningTitle', '$happeningDate','$uploadPath','$happeningDescription', '$eventAuthor', '$happeningStatus')")){
				
				echo "<script>
							swal({
							  title: 'Success',
							  text: 'Happening Added',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='index.php';
							  }else{
								  location.href='index.php';
							  }
							});
					</script>";
				
			}
        }
		else 
		{
			echo "<script>
							swal({
							  title: 'Error',
							  text: 'There was an error uploading the file.',
							  icon: 'error',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='index.php';
							  }else{
								  location.href='index.php';
							  }
							});
					</script>";
			
          
        }
    }

   
}

if (isset($_POST['editHappening'])) {
	
	$happeningID = $_POST['happeningID'];
	$happeningTitle = $_POST['happeningTitle'];
    $happeningDate = $_POST['happeningDate'];
	$eventAuthor = $_POST['eventAuthor'];
	$happeningStatus = $_POST['happeningStatus'];
	$happeningDescription = $_POST['happeningDescription'];
	$happeningDescription = str_replace(["'", "’"], "", $happeningDescription);
	$uploadOk = 1;

  $target_dir = "uploads/happening/";
  $target_file = $target_dir . basename($_FILES["happeningImage"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
  if($_FILES["happeningImage"]["tmp_name"]!=""){ $uploadOk = 1; }else{ $uploadOk = 0; }


	if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }

	if ($uploadOk == 0) {
	  
	  if(mysqli_query($conn,"update happening set happeningTitle='$happeningTitle', happeningDate='$happeningDate', eventAuthor='$eventAuthor', happeningStatus='$happeningStatus', happeningDescription='$happeningDescription' where happeningID = $happeningID")){
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='edit_happening.php?happeningID=$happeningID';
							  }else{
								  location.href='index.php';
							  }
							});
					</script>";
			
		}


	} 
	else 
	{
	  if (move_uploaded_file($_FILES["happeningImage"]["tmp_name"], $target_file)) {
		
		$sql="SELECT happeningImage FROM happening where happeningID = $happeningID limit 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			if($row['happeningImage'] != ""){
				unlink($row['happeningImage']);
			}
		}
		
		if(mysqli_query($conn,"update happening set happeningTitle='$happeningTitle', happeningDate='$happeningDate', eventAuthor='$eventAuthor', happeningStatus='$happeningStatus', happeningDescription='$happeningDescription', happeningImage ='$target_file' where happeningID = $happeningID")){
			
			
			echo "<script>
							swal({
							  title: 'Success',
							  text: 'Save changes',
							  icon: 'success',
							  buttons: true,
							})
							.then((isUpdate) => {
							  if (isUpdate) {
								location.href='edit_happening.php?happeningID=$happeningID';
							  }else{
								  location.href='index.php';
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
								location.href='index.php';
							  }else{
								  location.href='index.php';
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
	
	//Sambung
	// $gallery_mainID = $_POST['gallery_mainID'];
	// $category_title = $_POST['category_title'];
	// $descriptions = $_POST['descriptions'];
	// $descriptions = str_replace(["'", "’"], "", $descriptions);
	// $date = $_POST['date'];
	// $status = $_POST['status'];
	
	// if(mysqli_query($conn,"update gallery_main set category_title='$category_title', date='$date', descriptions='$descriptions', status='$status' where gallery_mainID = $gallery_mainID")){
				
				// echo "<script>
							// swal({
							  // title: 'Success',
							  // text: 'Data saved!',
							  // icon: 'success',
							  // buttons: true,
							// })
							// .then((isUpdate) => {
							  // if (isUpdate) {
								// location.href='edit_gallery_main.php?gallery_mainID=$gallery_mainID';
							  // }else{
								  // location.href='gallery.php';
							  // }
							// });
					// </script>";
			// }
 
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


// if(isset($_POST['UploadBtn'])) {
    // $gallery_mainID = $_POST['gallery_mainID'];

    // $images = $_FILES['imageName'];

    // $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'heic'];
	
	
    // for($i = 0; $i < count($images['name']); $i++) {
        // $image = $images['name'][$i];
        // $tmp_name = $images['tmp_name'][$i];
		
        // if(!empty($image)) {
			
            // $filename = stripslashes($image);
            // $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
			
            // if(!in_array($extension, $allowed_extensions)) {
                // echo "<script>alert('Invalid image extension for $filename');</script>";
                // continue; // Skip this image
            // }
			
			// if($extension == "jpg" || $extension == "jpeg") { 
				// $src = fixImageOrientation($tmp_name); // Fix orientation and load the image
			// } else if($extension == "png") {
				// $src = imagecreatefrompng($tmp_name);
			// } else {
				// $src = imagecreatefromgif($tmp_name);
			// }
			
            // list($width, $height) = getimagesize($tmp_name);

            // $newwidth = 360;
            // $newheight = ($height / $width) * $newwidth;
            // $tmp = imagecreatetruecolor($newwidth, $newheight);

            // imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            // $randomCode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
            // $timestamp = date("Ymd_His") . "_" . $i; // Add $i to make sure filenames are unique per loop
            // $newFileName = $randomCode . "_" . $timestamp . "." . $extension;

            // $filenameOriginal = "uploads/gallery/" . $newFileName;
			
            // imagejpeg($tmp, $filenameOriginal, 100);

            // $sql = "INSERT INTO gallery_image(gallery_mainID, image) VALUES ($gallery_mainID, '$filenameOriginal')";

            // mysqli_query($conn, $sql);
			
		
        // }
		
    // }

    // echo "<script>location.href='gallery_image.php?gallery_mainID=$gallery_mainID'</script>";
// }

function fixImageOrientation($filename) {
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            $image = imagecreatefromjpeg($filename);

            switch ($orientation) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
                default:
                    // No rotation needed
                    return $image;
            }

            imagejpeg($image, $filename, 100);
            return $image;
        }
    }
    return imagecreatefromjpeg($filename); // fallback
}
?>