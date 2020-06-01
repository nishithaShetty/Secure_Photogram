<?php 


?>
<!DOCTYPE html>
<html>
<head>
    <title>MEMBERS OF GROUPS</title>
    
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>

<nav>
        <ul>
        	<li><a href="home2.php">HOME </a></li>
            <li><a href="Members_group_admin.php">GROUPS M</a></li>
            <li><a href="admin_request.php">GROUPS Request</a></li>
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
          <h2>Members</h2>
          <br>

          <h3>Members of Group A</h3>
          <?php
         $query ="SELECT * FROM users JOIN groupe ON users.id = groupe.user_id where group_name='groupa'";
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

          <h3>Members of Group B</h3>
          <?php
          $query ="SELECT * FROM users JOIN groupe ON users.id = groupe.user_id where group_name='groupb'";
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
                   <a href="remove.php?name=<?php echo $data['groupe.group_name'];?>&id=<?php echo $data['id'];?>">REMOVE</a></td>
                </tr>

<?php
}}
?>
</table>


          	</div>
          </div>

 <br>


          <h3>Members of Group C</h3>
          <?php
          $query ="SELECT * FROM users JOIN groupe ON users.id = groupe.user_id where group_name='groupc'";
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
                   <a href="remove.php?name=<?php echo $data['groupe.group_name'];?>&id=<?php echo $data['id'];?>">REMOVE</a></td>
                </tr>

<?php
}}
?>
</table>


          	</div>
          </div>



