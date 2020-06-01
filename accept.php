<?php

include_once 'includes\dbh.inc.php';
session_start();

$group = $_GET['name'];

$id = $_GET['id'];


$con->query("insert into groupe(group_name,user_id) values('$group','$id')");
$con->query("DELETE FROM request WHERE user_id='$id' AND group_name ='$group'");


$con->query("insert membership1 (user_id,group_name,status) values('$id','$group','yes')");

   
 header("Location:admin_request.php");
          


?>