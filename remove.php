<?php

include_once 'includes\dbh.inc.php';
session_start();

$group = $_GET['name'];

$id = $_GET['id'];



$con->query("DELETE FROM groupe WHERE user_id ='$id' AND group_name ='$group'");

 header("home1.php");
          


?>