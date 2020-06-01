<?php
session_start();
include_once 'includes\dbh.inc.php';
$msg ="";

if (isset($_POST['submit']))
    {   
        $id = $_SESSION['userid'];
        $group = $con->real_escape_string($_POST['group']);

          $con->query("insert into request(user_id,group_name) values('$id','$group')");
}        

 header("Location:home1.php");


?>
