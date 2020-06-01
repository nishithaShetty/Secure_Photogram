<?php

include_once 'includes/dbh.inc.php';
session_start();
function getGroup1($con)
{

   

   $id = $_SESSION['userid'];
      $query ="SELECT * FROM groupcreate JOIN groupe ON groupcreate.group_name = groupe.group_name where groupe.user_id ='$id'";
      $result1 = $con->query($query);
      
      while ($data = $result1->fetch_assoc()) {
      	
         $plain_text = $data['group_name'];

         $encrypted = urlencode(base64_encode($plain_text));
      	echo '<a href="groupAProfile.php?attribute='.$encrypted.'">'.$data['group_name'].'</a>';
      	
      	echo "<br>";
      	
      	
      	echo '<hr/>';
      }

}

function getGroup2($con)
{     $id = $_SESSION['userid'];
      $query1 ="SELECT group_name FROM groupcreate ss WHERE NOT EXISTS 
   ( SELECT group_name FROM groupe e WHERE ss.group_name = e.group_name AND user_id='$id');";
     
          $result = mysqli_query($con,$query1);
          
              while($data = mysqli_fetch_array($result))
            {
            
            echo '<a href="request.php?name='.$data['group_name'].'">'.$data['group_name'].'</a>';
            
            echo "<br>";
            
            
            echo '<hr/>';
      }

}


?>
