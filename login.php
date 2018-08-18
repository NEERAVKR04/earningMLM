<?php
$status=0;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query="select * from users where email='$email' and password='$password'";
    require_once './includes/db.inc.php';
    $result=  mysql_query($query);
   if( mysql_num_rows($result)==1)
   {      
       $row = mysql_fetch_assoc($result);
          if($row['verified']=='Y'){
              session_start();
              $username=$row['username'];
              $role=$row['role'];
              $first_name=$row['first_name'];
              $_SESSION['first_name']= $first_name;
              $_SESSION['role']= $role;
              $_SESSION['username']= $username;
              if($role=='admin')
              {
                  header('Location:./includes/admin/index.php');
                  
              }
 else {
                  if($role=='member')
                  {
                  header('Location:./includes/member/index.php');
                  }
 }
          }
          else {
       $status=2;    
   }   
   }
 else {
       $status=3;    
   }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MuslimIn()</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<?php require_once './includes/guest/header.php';?>
</div>
<div id="menu">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
<div id="content">
	<h2>Login Form</h2>
        <form action="login.php" method="POST">
            <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" value="" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Login" /></td>
                        
                    </tr>
                </tbody>
            </table>
        <?php    if($status==1)
            { ?>
            <h2 style="color: green">Login Successful</h2>
           <?php }?>
            <?php if($status==2)
            { ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
          <?php  } ?>
            <?php    if($status==3)
            { ?>
            <h2 style="color: red">User Name or Password is Incorrect</h2>
           <?php }?>
            <hr>
            <a href="forgot_password.php">Forgot password</a>
            <hr>

        </form>
        
        
</div>
<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>
</body>
</html>
