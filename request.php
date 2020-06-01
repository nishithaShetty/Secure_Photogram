
</!DOCTYPE html>
<html>
<head>
    <title>REQUEST MEMBERSHIP</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>

<nav>
        <ul>
            <li><a href="home.php">HOME </a></li>
            <li><a href="group.php">GROUPS </a></li>
            <li><a href="profile.php">MY PROFILE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
</header>
<body>
   <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-6 col-md-offset-3" align="center">
         <?php
         
         include_once 'includes\dbh.inc.php';
         $groupRequest =$_GET['name'];
         ?>
          <h2> REQUEST MEMBERSHIP</h2>
    <form method="post" action="request1.php">
             <input class="form-control"  name="group" placeholder="group name" value="<?php echo $groupRequest; ?>">
            
             <input class="btn btn-primary" type="submit" name="submit"  value="request">

             
            
        </form>
</div>
</div>
</div>

    
</div>
</body>
</html>
