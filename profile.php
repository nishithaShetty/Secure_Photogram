<?php
include_once 'includes\dbh.inc.php';
session_start();

?>

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
<div class="container">
     <div class="row justify-content-center">
      
         
          <h2>GALLERY</h2>
</div>

     <?php
      include_once 'includes\dbh.inc.php';
      $id = $_SESSION['userid'];
      $sql = "select * from images where user_id ='$id' ";
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
