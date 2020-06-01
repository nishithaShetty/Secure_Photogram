<?php
include_once 'includes\dbh.inc.php';
session_start();
$msg="";


function setComments($con)
{

if(isset($_POST['comment']))
{

$id = $con->real_escape_string($_POST['image_id']);
$id2 = $_SESSION['userid'];

$comment = $con->real_escape_string($_POST['content']);

if(strlen($comment)>50)
{
      $commentError = "Only 50 character allowed";
}
else
{

$sql = $con->query("insert into comment(image_id,content,user_id)values('$id','$comment','$id2')");

}


}
}



function getComments($con,$id)
{
      $query = "SELECT * FROM users JOIN comment ON users.id = comment.user_id where image_id='$id'";
      //$sql1 = "select * from comment where image_id='$id'";
      $result1 = $con->query($query);
      while ($data = $result1->fetch_assoc()) {
      	echo $data['content'];
      	echo "<br>";
      	echo "<i>Commented by: </i>";
      

      	echo "<i>";
      	echo  $data['username'];
      	echo "</i>";
      	
      	echo '<hr/>';
      }

      

}
?>
