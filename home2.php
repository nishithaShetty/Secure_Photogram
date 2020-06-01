<?php
session_start();

?>

</!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>

<nav>
        <ul>
            
            <li><a href="home.php">HOME </a></li>
            <li><a href="createGroup3.php">GROUPS M</a></li>
            <li><a href="admin_request.php">GROUPS Request</a></li>
            <li><a href="createGroup.php">Create Group</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        
        </ul>
    </nav>
</header>
<body>
   <div class="container">
   	Welcome Admin <?php  echo $_SESSION['first_name']; ?>
    
</div>
</body>
</html>
