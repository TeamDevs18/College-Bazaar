<?php

	require 'db.php';

	session_start();
	
	if(!isset($_SESSION['active'])) {
		header("Location:index.php");
	}
	
	$sql = "UPDATE products SET hidden=1 WHERE id=".$_GET['product']." AND userId=".$_SESSION['id'];
	$query = mysqli_query($mysqli,$sql);
	if($query){
		echo '1';
	}else{
		echo '2';
	}
	
	header("Location: https://market-place-kellywebr.c9users.io/CollegeBazaar/account.php");
?>