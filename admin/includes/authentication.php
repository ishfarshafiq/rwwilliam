<?php
if(isset($_SESSION["id"]))
{
	$datetimes = date("Y-m-d h:i:s");
	$id = $_SESSION["id"];
	
}
else
{
	header("Location: logout.php");
	exit();
}

?>