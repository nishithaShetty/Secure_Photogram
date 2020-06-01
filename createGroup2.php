<?php
session_start();
include_once 'includes\dbh.inc.php';


function createGroup($con)
{

if(isset($_POST['create']))
{
$group= $con->real_escape_string($_POST['groupName']);

if (strlen($group)<20)
{
$con->query("insert into groupcreate(group_name)value ('$group')");
}

}
}



function getGroups($con)
{
      $query = "SELECT * FROM groupcreate";
      //$sql1 = "select * from comment where image_id='$id'";
      $result1 = $con->query($query);
      while ($data = $result1->fetch_assoc()) {
      	 $plain_text = $data['group_name'];

            $encrypted = urlencode(base64_encode($plain_text));
      	echo '<a href="members.php?attribute='.$encrypted.'">'.$data['group_name'].'</a>';
      	
      	echo "<br>";
      	
      	
      	echo '<hr/>';
      }

      

}


?>
