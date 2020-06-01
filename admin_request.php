</!DOCTYPE html>
<html>
<head>
    <title>GROUP REQUESTS </title>
    
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
          $id2 = $_SESSION['userid'];
          
          ?>
          <h2>REQUESTS FOR GROUP MEMEBERSHIP</h2>
          <?php
          $query = "SELECT * FROM users JOIN request ON users.id = request.user_id";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result)>0)
          {
             
          ?>
           <div class="table-responsive">
            <table class="table table bordered">
              <tr>
                 <th>First name</th>
                 <th>Username</th>
                 <th>GROUP</th>
                 <th>ACCEPT</th>
                 <th>DELETE</th>
                 </tr>

                 <?php 

              while($data = mysqli_fetch_array($result)){
                
              ?>
               <tr>
                  <td><?php echo $data['first_name'] ?></td>
                  <td><?php echo $data['username']?></td>
                  <td><?php echo $data['group_name']?></td>
                  <td>
                   <a href="accept.php?name=<?php echo $data['group_name'];?>&id=<?php echo $data['user_id'];?>">ACCEPT</a></td>
                   <td>
                   <a href="decline.php?name=<?php echo $data['group_name'];?>&id=<?php echo $data['user_id'];?>">REJECT</a></td>
           
                 </tr>
                 <?php
                  }
}
             ?>
            </table>
          </div>

                
          </div>  
   </div>
</body>
</html>