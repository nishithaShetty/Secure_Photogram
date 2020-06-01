<?php
include 'includes/encrypt.php';  
$dbServername = "localhost";
$dbUsername ="root";
//$dbPassword ="software";
$dbName = "social";
$name = file_get_contents('./document.txt');
$encryption_key=file_get_contents('./document2.txt');

$dbPassword = decrypt($name,$encryption_key);


$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


?>
