<?php
if(isset($_SESSION["id"]))
{
	$datetimes = date("Y-m-d h:i:s");
	$id = $_SESSION["id"];
	
	$result_count_album = mysqli_query($conn,"SELECT count(*) as count_album FROM gallery_main");
	$row_count_album = mysqli_fetch_assoc($result_count_album);
	$count_album = $row_count_album['count_album'];
	
	$result_count_news = mysqli_query($conn,"SELECT count(*) as count_news FROM news");
	$row_count_news = mysqli_fetch_assoc($result_count_news);
	$count_news = $row_count_news['count_news'];
	$count_newss = $row_count_news['count_news'];
	
	$result_count_banner = mysqli_query($conn,"SELECT count(*) as count_banner FROM banner");
	$row_count_banner = mysqli_fetch_assoc($result_count_banner);
	$count_banner = $row_count_banner['count_banner'];
	
	$result_count_images = mysqli_query($conn,"SELECT count(*) as count_images FROM `gallery_image`;");
	$row_count_images = mysqli_fetch_assoc($result_count_images);
	$count_images = $row_count_images['count_images'];
	
}
else
{
	header("Location: logout.php");
	exit();
}

?>