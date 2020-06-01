<?php
include_once 'includes\dbh.inc.php';
session_start();
$msg="";

//if uploat button
if(isset($_POST['upload']))
{   //path to store images
	$target="images/".basename($_FILES['image']['name']);
	//get all submitted data from th form
	$image=$_FILES['image']['name'];
	$text = $_POST['text'];
  $id = $_SESSION['userid'];
  
  $sql = $con->query("insert into images(image,text,user_id,group_type)values('$image', '$text','$id','groupb')");
	// move the uploaded image into the folder
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{

     $msg ="image uploaded succedssfully";
	}

    else
    $msg ="something went wrong";
}


?>

<!DOCTYPE html>
<head>
	

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
  
<title>PROFILE</title>
</head>
<header>

<nav>
        <ul>
            <li><a href="home1.php">HOME </a></li>
            <li><a href="group.php">GROUPS M</a></li>
            <li><a href="profile.php">MY PROFILE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
</header>

<body>
    <?php
      include_once 'includes\dbh.inc.php';
      $id = $_SESSION['userid'];
     // $group = $_GET['name'];
   ?>
	<form action="groupBprofile.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
		 <input type="file" name="image">
        </div>
		<div>
			<textarea name="text" cols="40" rows="4"
			placeholder="say something about this image"></textarea>
		  
		</div>
		<div>
			<input type="submit" name="upload" value="uplaod image">

		</div>


     </form>

     <?php
      include_once 'includes\dbh.inc.php';
      $id = $_SESSION['userid'];
      //$group = $_GET['name'];
      $sql = "select * from images where group_type ='groupb' ";
      $result = mysqli_query($con,$sql);
      while($data = mysqli_fetch_array($result))
      {
?>
<div>
               
<div class="gallery">

  <a target="_blank" href="comment.php?name=<?php echo $data['id']; ?>">
    <img src="images/<?php  echo $data['image'];?>" class="img-responsive"/>
  </a>
  <div class="desc"><?php echo $data['text'];?></div>
</div>
             </div>


<?php
}

     ?>
</body>

</html>
