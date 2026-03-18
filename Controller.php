<?php
include "dbconnect.php";
session_start();

if(isset($_POST['username'], $_POST['password']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE user='$username' LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_assoc($result);

		if($row['password'] == $password){

			$_SESSION['id'] = $row['id'];
			

			echo json_encode([
				"status"=>"success",
				"user"=>$row['user']
			]);

		}else{
			echo json_encode(["status"=>"error"]);
		}

	}else{
		echo json_encode(["status"=>"error"]);
	}
	
}

if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$sql = "SELECT * FROM admin WHERE user='$email' LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0)
	{
		unset($_SESSION['id']);
		unset($_SESSION['user']);
		
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['user'] = $row['user'];
		
		echo json_encode([
				"status"=>"success",
				"user"=>$row['user']
			]);
	}
	else
	{
		echo json_encode(["status"=>"error"]);
	}
	
}

if(isset($_POST['email1'],$_POST['password1']))
{
    $email = $_POST['email1'];
    $password = $_POST['password1'];

    $sql = "SELECT * FROM admin WHERE user='$email' LIMIT 1";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        mysqli_query($conn,"UPDATE admin SET password='$password' WHERE user='$email'");

        echo json_encode([
            "status"=>"success",
            "user"=>$email
        ]);
        exit;
    }
    else
    {
        echo json_encode(["status"=>"error"]);
        exit;
    }
}

?>