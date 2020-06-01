<?php
include_once 'includes\dbh.inc.php';
session_start();

    $msg ="";

    if (isset($_POST['submit']))
    {   

        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string($_POST['password']);

        if(empty($email)||empty($password))
      { 
        $emptyError ="Fileds cannot be empty";
        
      }
        else if(  strlen($email)>20||strlen($password)>20)
      {
        $sizeError="Size limit for all the fields is 30 characters";
              
      }
      else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
      {
        $emailError = "Enter valid email";
        
      }
      
        $sql = $con->query("select id,username,first_name, password,type from users where email ='$email'");
        if($sql->num_rows >0)
          {
          $data = $sql->fetch_array();
          if(password_verify($password, $data['password']))
          {
            $msg = "you have been logged in";
            echo $data['username'];
            $_SESSION['userid']=$data['id'];
            $_SESSION['username']=$data['username'];
            $_SESSION['first_name']=$data['first_name'];
            $_SESSION['type']=$data['type'];

            if($_SESSION['type'] == 'user')
            header("Location:home1.php");
            else
            header("Location:home2.php");
              
          }  
            

          else
            $msg = "Check your credentials";
        }
      
        else
          $msg ="please check your inputs";
            
}

?>
</!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style2.css">

</head>

<header>

<nav class="navbar navbar-expand justify-content-centre navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Instagram</a>
    <div  id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="home.php">HOME </a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
        </ul>
</nav>
</header>
<body>
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-6 col-md-offset-3" align="center">
         
          <h2>Log In</h2>

          <?php

          if ($msg != "")
            echo $msg . "<br>";

          ?>
         <form method="post" action="login.php">
           <?php  if(isset($emptyError)){?>
              <p><?php  echo $emptyError ?></p>
            <?php } ?>
             
             <input class="form-control" type="email" name="email" placeholder="ni@gmail.com">
             <?php  if(isset($emailError)){?>
             <p><?php  echo $emailError ?></p>
             <?php } ?>
             <input class="form-control" type="password" name="password" placeholder="password">
             <?php  if(isset($passwordError)){?>
             <p><?php  echo $passwordError ?></p>
             <?php } ?>
             <input class="btn btn-primary" type="submit" name="submit"  value="log in">

             
            
        </form>


     </div>
</div>
</body>
</html>