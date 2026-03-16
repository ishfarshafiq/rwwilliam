<?php
include "dbconnect.php";
session_start();

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
?>