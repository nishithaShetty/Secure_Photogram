<?php
include_once 'includes\dbh.inc.php';
    $msg ="";
    if(!isset($fname)||!isset($lname)||!isset($email)||!isset($username))
    {
      $fname ='';
      $lname ='';
      $email ='';
      $username ='';
       
    }
    //error handler
    if(isset($_POST['submit']))
    {   
      //$fname = filter_input(INPUT_POST, 'fname');
      
      $fname = $con->real_escape_string($_POST['fname']);
      $lname = $con->real_escape_string($_POST['lname']);
      $email = $con->real_escape_string($_POST['email']);
      $username = $con->real_escape_string($_POST['username']);
      $password = $con->real_escape_string($_POST['password']);
    	$cpassword = $con->real_escape_string($_POST['cpassword']);
    	
    	$type = 'user';
      if(empty($fname)||empty($lname)||empty($email)||empty($username)||empty($password)||empty($cpassword))
      { 
        $emptyError ="Fileds cannot be empty";
        
      }
      else if(!preg_match("/^[a-zA-Z]*$/", $fname))
      {
        $nameError="Enter valid first name";
              
      }
      else if( strlen($fname)>20|| strlen($lname)>20|| strlen($email)>20|| strlen($username)>20||strlen($password)>20||strlen($cpassword)>20)
      {
        $sizeError="Size limit for all the fields is 30 characters";
              
      }
      else if(!preg_match("/^[a-zA-Z]*$/", $lname))
      {
       $nameError2 ="Enter valid last name";
              
      }
      else if(!preg_match("/^[a-zA-Z]*$/", $username))
      {
       $usernameError ="Enter valid username";
              
      }
      else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password))
      {
       $passwordError =" Invalid Password must be 8 characters long, one upper case , one lower case, one number";
              
      }

      else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
      {
        $emailError = "Enter valid email";
        
      }


    	else if( $password != $cpassword)
    		$msg  = "Passwords need to be the same";
    	else
    	  { 
        $hash  = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name,last_name,username,email,password,type) VALUES (?, ?, ?,?,?,?)";
 
       if($stmt = mysqli_prepare($con, $sql)){
    // Bind variables to the prepared statement as parameters
       mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $username,$email,$hash,$type);
    
    /* Set the parameters values and execute
    the statement again to insert another row */

  
           mysqli_stmt_execute($stmt);
    
    /* Set the parameters values and execute
    the statement to insert a row */
           $msg = "Registration complete";
           $fname ='';
           $lname ='';
           $email ='';
           $username ='';
           $password ='';
           $cpassword='';
    
    }
  }
}

    


?>
</!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	

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
   	   

       <div class="reg_box">	 
          <h2> REGISTER</h2>

          <?php

          if ($msg != "")
          	echo $msg . "<br>";

          ?>
   	   	 <form method="post" action="register.php">
             <?php  if(isset($emptyError)){?>
              <p><?php  echo $emptyError ?></p>
            <?php } ?>
              <?php  if(isset($sizeError)){?>
              <p><?php  echo $sizeError ?></p>
            <?php } ?>

   	   	     <input class="form-control" type="text" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($fname); ?>">
             <?php  if(isset($nameError)){?>
             <p><?php  echo $nameError ?></p>
             <?php } ?>
             <input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($lname); ?>">
             <?php  if(isset($nameError2)){?>
             <p><?php  echo $nameError2 ?></p>
             <?php } ?>
   	   	     <input class="form-control" type="text" name="username" placeholder="Username"  
              value="<?php echo htmlspecialchars($username); ?>">
              <?php  if(isset($emailError)){?>
             <p><?php  echo $emailError ?></p>
             <?php } ?>
   	   	     <input class="form-control" type="email" name="email" placeholder="ni@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
             <?php  if(isset($emailError)){?>
             <p><?php  echo $emailError ?></p>
             <?php } ?>
   	   	     <input class="form-control" type="password" name="password" placeholder="password">
   	   	     <input class="form-control" type="password" name="cpassword" placeholder="confirm Password">
             <?php  if(isset($passwordError)){?>
             <p><?php  echo $passwordError ?></p>
             <?php } ?>
   	   	     <input class="btn btn-primary" type="submit" name="submit"  value="register">

   	   	     
   	   	    
   	   	</form>
      </div>

   	 </div>
</div>
</body>
</html>