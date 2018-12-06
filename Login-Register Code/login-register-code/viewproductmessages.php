<?php

require 'db.php';
#$mysqli

session_start();

$result = $mysqli->query("SELECT
    users.first_name,
    users.last_name
    FROM users
    WHERE id=".$_SESSION['id']
);

foreach($result as $name){
    $sellerName=$name['first_name'].' '.$name['last_name'];
}

#$sellerName=$result[0]['first_name'].' '.$result[0]['last_name'];
#$sellerName='Bob';

$result2 = "SELECT
    messages.productId,
    messages.buyerId,
    messages.toSeller,
    messages.text,
    messages.date,
    users.first_name,
    users.last_name
    FROM messages
    INNER JOIN users ON messages.buyerId=users.id
    WHERE
        productId=".$_GET['productId']."
        AND NOT users.id=".$_SESSION['id']."
    GROUP BY messages.buyerId
    ORDER BY date ASC"
    ;
die($result2);

foreach($result as $message) {
    $productId=$_GET['productId'];
    $buyerId=$message['buyerId'];
    $buttonTitle=ucwords($message['first_name'].' '.$message['last_name']);
    
    echo "<button class='thread-button btn btn-primary' onclick='showMessages($productId,$buyerId,0)'>",ucwords($message['first_name'].' '.$message['last_name']),"</button>";
    
    #echo "<script src='addmessagebutton.php?productId=",$_GET['productId'],"'></script>";
}

#if(true) ...
#else ...

#(if true) ? (then this) : (else this)


?>