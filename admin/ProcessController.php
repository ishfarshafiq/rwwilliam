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





?>