<?php
require_once '../includes/member/secure.inc.php';
$username=$_SESSION['username'];
$imagename=$_FILES["payment_proof"]["name"];
$transaction_id=$_POST['tid'];
echo "$transaction_id";
$imagetmp=  addslashes(file_get_contents($_FILES["payment_proof"]["tmp_name"]));
$insert_image="update users set payment_proof='$imagetmp',image_name='$imagename',tid='$transaction_id' where username='$username'";
require_once '../includes/db.inc.php';
mysql_query($insert_image);
$status=1;
?>
<html>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
<div id="content" class="registration">
   
           
           <h2>Payment proof uploaded!! Wait for activation of your account!!</h2>
           
    
</div>
</html>
