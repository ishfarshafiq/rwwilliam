<?php
include "dbconnect.php";
session_start();

//View Album Data
if(isset($_POST['gallery_mainID']))
{
	$gallery_mainID= $_POST['gallery_mainID'];
	
	$sql = "SELECT * FROM gallery_main WHERE gallery_mainID=$gallery_mainID LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_assoc($result);


			echo json_encode([
				"res_status"=>"success",
				"title"=>$row['title'],
				"category"=>$row['category'],
				"date"=> date("Y-m-d", strtotime($row['date'])),
				"description"=>$row['description'],
				"status"=>$row['status']
			]);


	}else{
		echo json_encode(["status"=>"error"]);
	}
	
}

//View Announcement
if(isset($_POST['newsID']))
{
	$newsID= $_POST['newsID'];
	
	$sql = "SELECT * FROM news WHERE newsID=$newsID LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_assoc($result);


			echo json_encode([
				"res_status"=>"success",
				"title"=>$row['title'],
				"category"=>$row['category'],
				"publish_date"=> date("Y-m-d", strtotime($row['publish_date'])),
				"author"=>$row['author'],
				"description"=>$row['description'],
				"icon"=>$row['icon'],
				"image"=>$row['image'],
				"status"=>$row['status']
			]);


	}else{
		echo json_encode(["status"=>"error"]);
	}
	
}

//View Banner
if(isset($_POST['bannerID']))
{
	$bannerID= $_POST['bannerID'];
	
	$sql = "SELECT * FROM banner WHERE bannerID=$bannerID LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_assoc($result);


			echo json_encode([
				"res_status"=>"success",
				"label_badge"=>$row['label_badge'],
				"title"=>$row['title'],
				"title_highlight"=> $row['title_highlight'],
				"description"=>$row['description'],
				"button_text_one"=>$row['button_text_one'],
				"button_link_one"=>$row['button_link_one'],
				"button_text_two"=>$row['button_text_two'],
				"button_link_two"=>$row['button_link_two'],
				"image"=>$row['image'],
				"status"=>$row['status'],
				"sort"=>$row['sort']
			]);


	}else{
		echo json_encode(["status"=>"error"]);
	}
	
}



?>