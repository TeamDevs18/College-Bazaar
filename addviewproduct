<?php

session_start();
require 'db.php';
        
$mysqli->query("INSERT INTO
    `products_viewed`(`userId`, `productId`)
    VALUES (".$_SESSION['id'].",".$_GET['product'].")");
    
    header('Location: mailto:'.$_GET['email']);
?>
