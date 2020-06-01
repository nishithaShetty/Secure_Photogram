

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
    <?php

      include_once 'includes\dbh.inc.php';
      include 'createGroup2.php';
    ?>
   <div class="container">
   	<form action="<?php createGroup($con); ?>" method="post">
     <input type="text" name="groupName" value="Group Name">
     <input type="submit" name="create" value="submit">        
    </form>

<h2>EXISTING GROUPS</h2>
<?php
getGroups($con);
?>
</div>
</body>
</html>
