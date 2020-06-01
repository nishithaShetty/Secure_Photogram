<?php
include_once 'dbh.inc.php';


$first = $_POST['fname'];
$last = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];

$username = $_POST['username'];


$sql = "insert into user(username, first_name,last_name,email,password) values('$username',$first','$last','$email','$pass');";

$result = mysqli_query($conn,$sql);
if($result >0)
{

header("Location:../login.php");

}
else

header("Location:../signup.php");
