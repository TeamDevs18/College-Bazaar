<?php

session_start();
require 'db.php';
        
$mysqli->query("INSERT INTO
    `events_viewed`(`userId`, `eventId`)
    VALUES (".$_SESSION['id'].",".$_GET['event'].")");
    
    header('Location: mailto:'.$_GET['email']);
?>