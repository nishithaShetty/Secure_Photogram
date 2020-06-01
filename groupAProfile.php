
<!DOCTYPE html>
<head>
	


   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style2.css">
      
<title>PROFILE</title>
</head>
<header>
    <nav class="navbar navbar-expand justify-content-centre navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Instagram</a>
    <div  id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="home1.php">HOME </a></li>
            <li class="nav-item"><a class="nav-link" href="group1.php">GROUPS</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">MY PROFILE</a></li>
             <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>

</header>

<body>
    <?php
      include_once 'includes\dbh.inc.php';

      include 'groupAProfile1.php';
      //$id = $_SESSION['userid'];
      $group1 = $_GET['attribute'];
      //$key_value = "1f4276388ad3214c873428dbef42243f"; //<--- Note..the same key !
      $group = urldecode(base64_decode($group1));
     // $group = decrypt($group1,$encryption_key);
   ?>
	<form action="<?php groupProfile($con,$group); ?>" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="size" value="1000000">
		<div>
		 <input type="file" name="image">
        </div>
		<div>
			<textarea name="text" cols="40" rows="4"
			placeholder="say something about this image"></textarea>
		
		</div>
		<div>
			<input type="submit" name="upload" value="upload image">
<?php if(isset($extensionError))
     {?>
    <p><?php  echo $extensionError ?></p>
            <?php } ?>
		</div>
    

     </form>

     <?php
      include_once 'includes\dbh.inc.php';
      $id = $_SESSION['userid'];
      //$group = $_GET['name'];
      //$sql = "select * from images where group_type ='$group' ";
      $sql ="SELECT * FROM users JOIN images ON  users.id = images.user_id where images.group_type ='$group'";
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
  
  <i>created by:<?php echo $data['username'];?></i>
</div>
             </div>


<?php
}

     ?>
</body>

</html>
