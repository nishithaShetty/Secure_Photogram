<?php
include_once 'includes\dbh.inc.php';
session_start();
$msg="";

function groupProfile($con,$group)
{
if(isset($_POST['upload']))
{   //path to store images
	$exts = array('jpg','jpef','png','gif');
    $ext = strtolower(end(explode('.',$_FILES['image']['name'])));

if (in_array($ext, $exts) == true)
    {
    
	$target="images/".basename($_FILES['image']['name']);
	//get all submitted data from th form
	$image=$_FILES['image']['name'];
	$text = $con->real_escape_string($_POST['text']);

	
    $id = $_SESSION['userid'];
 // $group = $_POST['hidden_name'];
   // echo $group;
    
if(strlen($text)<20)
{

    $sql = $con->query("insert into images(image,text,user_id,group_type)values('$image', '$text','$id','$group')");
	// move the uploaded image into the folder
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{

     $msg ="image uploaded succedssfully";
	}

    else
    {
    $msg ="something went wrong";
    }

   // else
    //{

    //$extensionError = "Must be a jpeg,jpg,gif,or png extension";
    }

}
//if uploat button
}
}
?>