<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'Bazaar';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
