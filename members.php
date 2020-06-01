<!DOCTYPE html>
<html>
<head>
    <title>MEMBERS OF GROUPS</title>
    
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
    <div class="row justify-content-center">
       <div class="col-md-6 col-md-offset-3" align="center">
        <?php 
         include_once 'includes\dbh.inc.php';
         session_start();
         //$group = $_GET['attribute'];
          $group1 = $_GET['attribute'];
    
      $group = urldecode(base64_decode($group1));
        ?>
       <h2> Members of <?php echo $group; ?> </h2>

<?php
         $query ="SELECT * FROM users JOIN groupe ON users.id = groupe.user_id where group_name='$group'";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result)>0)
          {
             ?>

          <div class="table-responsive">
            <div class="table table bordered">
            <table>
              <tr>
                <th>username</th>
                <th>Name</th>
                <th>group name</th>
                <th>REMOVE</th> 
              </tr>
              <?php 

              while($data = mysqli_fetch_array($result)){
                
              ?>
              <tr>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['first_name'] ?></td>
                <td><?php echo $data['group_name'] ?></td>
                <td>
            <a href="remove.php?name=<?php echo $data['group_name'];?>&id=<?php echo $data['id'];?>">REMOVE</a></td>
                </tr>

<?php
}}
?>
</table>


            </div>
          </div>

<br>




</div>
</div>
</div>
</body>
</html>