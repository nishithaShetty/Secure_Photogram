<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
     <!--JQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- latest compiled Javascript-->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="style1.css">
	<title> Pictogram</title>
</head>
<div id="wrapper">
<header>
<a href="home.php"><img class="logo" src="logo.png" alt="logo"></a>
<nav>
		<ul>
			<li><a href="home.php">HOME </a></li>
			<li><a href="signup.php">SIGN UP</a></li>
			<li><a href="login.php">LOGIN</a></li>
		</ul>
	</nav>
</header>
<div>
    <body>
         <form method="POST" action="includes/signup.inc.php" >
         	<fieldset class="third">
                <h3> Sign  Up</h3>
         		<input type ="text" name="fname" value="Jose" ><br>
                <input type ="text" name="lname" value="white" ><br>
         		<input type ="text" name="username" value="Jo1234Sath" ><br>
         		<input type ="email" name="email" value="jose2gmail.com" ><br>
         		<input type ="password" name="password" value="........" ><br>
         		<input type ="password" name="confirm_password" value="........" ><br>
         		
         		<input type="submit" name="register">
         		
         		
                 </fieldset>
         </form>
		



</body>

</html>