
</!DOCTYPE html>
<html>
<head>
    <title>GROUPS</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>

<nav>
        <ul>
            <li><a href="home1.php">HOME </a></li>
            <li><a href="group.php">GROUPS </a></li>
            <li><a href="profile.php">PROFILE</a></li>
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
          <?php
          $sql = $con->query("select groupa from membership where user_id ='$id2'");
          if($sql->num_rows >0)
          {
             $data = $sql->fetch_array();
             if($data['groupa']=='yes')
             {
              echo " <a href=\"groupMember.php?name=groupa\" >GROUP A<br></a> ";
             }
           }
          ?>
          <?php
          $sql = $con->query("select groupb from membership where user_id ='$id2'");
          if($sql->num_rows >0)
          {
             $data = $sql->fetch_array();
             if($data['groupb']=='yes')
             {
              echo " <a href=\"groupMember.php?name=groupb\" >GROUP B<br></a> ";
             }
           }

          ?>
       <hr>   
          <h2>Other groups Available</h2>
          <?php
          $sql = $con->query("select groupa from membership where user_id ='$id2'");
          $sql1 = $con->query("select * from request where user_id ='$id2'AND group_name='groupa'");
          
          if($sql->num_rows >0)
          {
             if($sql1->num_rows ==0)
             { 
             $data = $sql->fetch_array();
             if($data['groupa']=='no')
             {
              

               echo " <a href=\"request.php?name=groupa\" >GROUP A-send request<br></a> ";
             }
           }
         }


          ?>
          
          <?php
          $sql = $con->query("select groupb from membership where user_id ='$id2'");
          $sql1 = $con->query("select * from request where user_id ='$id2'AND group_name='groupb'");
          
          if($sql->num_rows >0)
          {
             if($sql1->num_rows ==0)
             { 
             $data = $sql->fetch_array();
             if($data['groupb']=='no')
             {
              

               echo " <a href=\"request.php?name=groupb\" >GROUP B-send request<br></a> ";
             }
           }
         }
         

          ?>

           
                
          </div>  
   </div>
</body>
</html>