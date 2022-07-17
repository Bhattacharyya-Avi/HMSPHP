<?php
	include_once('DB.php'); 
	$con=getCon();


	if(isset($_GET['id'])){

		$id=$_GET['id'];

		$sql=mysqli_query($con,"DELETE FROM `medic_list` WHERE `id`='$id' ");

		echo "Successfully deleted...";
		header('location: medicine_list.php');
		//print_r($row);
	}else{
		echo "invalid id";
	}

?>

