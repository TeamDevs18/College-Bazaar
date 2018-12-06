<?php

require 'db.php';
session_start();

$buyerId=(empty($_POST['buyerId']) || $_POST['buyerId']=='null') ? $_SESSION['id'] : $_POST['buyerId'];

#If you're sending a message, and you are the buyer, the message is to the seller; toSeller is 1
$toSeller=($buyerId==$_SESSION['id']) ? 1 : 0;

$listing_type=(empty($_POST['type']) || $_POST['type']=='null') ? 0 : $_POST['type']; #0 is product; 1 is event; 2 is service

$query = mysqli_query(
    $mysqli,
    "INSERT INTO
        messages(`productId`,
            `type`,
            `buyerId`, 
            `toSeller`,
            `text`)
    VALUES (".$_POST['productId'].",
            $listing_type,
            $buyerId,
            $toSeller,
            \"".$_POST['text']."\")
    "
);
if($query){
	echo "<div class='message-you'>
	<p>",ucwords($_SESSION['first_name']." ".$_SESSION['last_name']),"
        <br>",$_POST['text'],"
        <br><small>",date('F j Y, g:ia',time()),"</small></p>
    </div>";
}else{
	echo 'failure';
}

?>