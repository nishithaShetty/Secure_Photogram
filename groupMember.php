</!DOCTYPE html>
<html>
<head>
    <title>GROUPA </title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>

<nav>
        <ul>
            <li><a href="home1.php">HOME </a></li>
            <li><a href="group.php">GROUPS M</a></li>
            <li><a href="profile.php">IMAGES</a></li>
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
          $group = $_GET['name'];
          ?>
          <h2>Members Of GroupA</h2>
          <?php
          if ($group == 'groupa')
          {
          $query = "SELECT * FROM users JOIN groupe ON users.id = groupe.user_id";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result)>0)
          
          {
             
          ?>
           <div class="table-responsive">
            <table class="table table bordered">
              <tr>
                 <th>First name</th>
                 <th>Username</th>
                 <th>Select</th>
                 </tr>
                 <?php
                  
              while($data = mysqli_fetch_array($result)){
            
                 ?>
               <tr>
                  <td><?php echo $data['first_name'] ?></td>
                  <td><?php echo $data['username']?></td>
                  <td>
                   <a href="groupAProfile.php?name=<?php echo $data['group_name'] ?>">VIEW GROUP</a></td>
           
                 </tr>
                 <?php
                  }}
}
        else if($group == 'groupb')
          {
          $query = "SELECT * FROM users JOIN groupe ON users.id = groupe.user_id";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result)>0)
          {
            // $data = $sql->fetch_array();

                 ?>
          <div class="table-responsive">
            <table class="table table bordered">
              <tr>
                 <th>First name</th>
                 <th>Username</th>
                 <th>Select</th>
                 </tr>
                 <?php
                  
              while($data = mysqli_fetch_array($result)){
            
                 ?>
               <tr>
                  <td><?php echo $data['first_name'] ?></td>
                  <td><?php echo $data['username']?></td>
                  <td>
                   <a href="groupBProfile.php">VIEW GROUP</a></td>
                 </tr>
                 <?php
                  }
                }
}
?>
       
            </table>
          </div>

                
          </div>  
   </div>
</body>
</html>