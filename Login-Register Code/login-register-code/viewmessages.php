<?php

require 'db.php';
#$mysqli

session_start();

date_default_timezone_set('America/Detroit');

$buyerId=(empty($_GET['buyerId']) || $_GET['buyerId']=='null') ? $_SESSION['id'] : intval($_GET['buyerId']);

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

$sql="SELECT
    first_name,
    last_name
    FROM users
    WHERE
        id=".$buyerId;
$result = $mysqli->query($sql);

foreach($result as $name){
    $buyerName=ucwords($name['first_name'].' '.$name['last_name']);
}

$result = $mysqli->query("SELECT
    users.id,
    users.first_name,
    users.last_name
    FROM $table
        INNER JOIN users ON $table.userId=users.id
    WHERE
        $table.id=".$_GET['productId']
);

foreach($result as $name){
    $sellerId=$name['id'];
    $sellerName=ucwords($name['first_name'].' '.$name['last_name']);
}

#$sellerName=$result[0]['first_name'].' '.$result[0]['last_name'];
#$sellerName='Bob';

$result = $mysqli->query("SELECT
    productId,
    buyerId,
    toSeller,
    text,
    date
    FROM messages
    WHERE
        productId=".$_GET['productId']."
        AND buyerId=".$buyerId."
        AND type=$listing_type
    ORDER BY date ASC"
);

foreach($result as $message) {
    $messengerId=$message['toSeller'] ? $buyerId : $sellerId;
    
    echo "<div class='message-",($messengerId==$_SESSION['id'] ? 'you' : 'them'),"'>
        <p>",$message['toSeller'] ? $buyerName : $sellerName,"
        <br>",$message['text'],"
        <br><small>",date('F j Y, g:ia',strtotime($message['date'].' GMT')),"</small></p>
    </div>";
}

#if(true) ...
#else ...

#(if true) ? (then this) : (else this)


?>