<?php
session_start();
if(!isset($_SESSION['username']))
{  
    header('Location: ../../loginuser.php'); 
}
 else {
      if(($_SESSION['role']!='member'))
      {
          header('Location:../../loginuser.php');
      }
}
?>
