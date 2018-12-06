<?php

	require 'db.php';

	session_start();
	
	if(!isset($_SESSION['active'])) {
		header("Location:index.php");
	}
	
	#0 is product; 1 is service; 2 is event
	$listing_type=(empty($_GET['type']) || $_GET['type']=='null') ? 0 : $_GET['type'];
	switch($listing_type){
	default:
	case 0:
	    $table='products';
	    break;
	case 1:
	    $table='events';
	    break;
	case 2:
		$table='services';
	    break;
	}
	
	$sql = "UPDATE $table SET hidden=1 WHERE id=".$_GET['product']." AND userId=".$_SESSION['id'];
	$query = mysqli_query($mysqli,$sql);
	if($query){
		echo '1';
	}else{
		echo '2';
	}
	
	header("Location: https://market-place-kellywebr.c9users.io/CollegeBazaar/account.php");
?>