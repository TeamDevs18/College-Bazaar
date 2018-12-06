<?php
# Delete a message thread for viewed products, etc
# Call this file like so: deletethread.php?product=[id]&type=[type]

	require 'db.php';

	session_start();
	
	if(!isset($_SESSION['active'])) {
		header("Location:index.php");
	}
	
	#0 is product; 1 is service; 2 is event
	$listing_type=(empty($_GET['type']) || $_GET['type']=='null') ? 0 : $_GET['type'];
	$sql = "DELETE FROM messages WHERE productId=".$_GET['product']." AND buyerId=".$_SESSION['id']." AND type=".$listing_type;
	$query = mysqli_query($mysqli,$sql);
	if($query){
		echo '1';
	}else{
		echo '2';
	}
	
	header("Location: https://market-place-kellywebr.c9users.io/CollegeBazaar/account.php");
?>