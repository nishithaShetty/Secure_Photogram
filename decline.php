<?php

include_once 'includes\dbh.inc.php';
session_start();

$group = $_GET['name'];

$id = $_GET['id'];

$con->query("DELETE FROM request WHERE user_id='$id' AND group_name ='$group'");
        
          

header("Location:admin_request.php");
?>