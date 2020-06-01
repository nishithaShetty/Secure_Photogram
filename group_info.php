<?php
include_once 'includes\dbh.inc.php';
session_start();
$msg="";



  
function getComments($con,$id)
{

      $sql1 = "select * from comment where image_id='$id'";
      $result1 = $con->query($sql1);
      while ($data = $result1->fetch_assoc()) {
      	echo $data['content'];
      	
      	echo '<hr/>';
      }

      

?>