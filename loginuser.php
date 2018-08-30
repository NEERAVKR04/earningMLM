<?php
$status_check=0;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query_st="select * from users where email='$email' and password='$password'";
    require_once './includes/db.inc.php';
    $result_1=  mysql_query($query_st);
   if(mysql_num_rows($result_1)==1)
   {
       $rows=  mysql_fetch_assoc($result_1);
       if($rows['verified']==Y)
       {
           session_start();
           $role=$rows['role'];
           $first_name=$rows['first_name'];
           $email=$rows['email'];
           $username=$rows['username'];
           $_SESSION['first_name']= $first_name;
              $_SESSION['role']= $role;
              $_SESSION['email']= $email;
              $_SESSION['username']=$username;
              
              if($role=='admin')
              {
                  header('Location:./includes/admin/index.php');
              }
              else{
                  if($role=='member'){
                  header('Location:./includes/member/index.php');
              }
              }    
       }
       else{
           $status_check=2;
          
       }
   }
   else{
       $status_check=3;
   }
    
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            LOGIN FORM
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
                <style>
#header-reg {
        width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
        min-height: 50px;
}

#header-reg h1 {
	margin: 0px;
	padding: 0px;
	text-align: center;
}

#header-reg h2 {
	margin: 0px;
	padding: 0px;
	text-align: center;
	font-size: 14px;
}
#header-reg ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: center;
        color: #FFFFFF;
        font-family: sans-serif;
        font-size: 18px;
}

#header-reg li {
	display: inline;
}

#header-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	color: #FFFFFF;
}


/** MENU */

#menu-reg {
	width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
}

#menu-reg ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: center;
}

#menu-reg li {
	display: inline;
}

#menu-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 11px;
	font-weight: bold;
	color: #FFFFFF;
}

#menu-reg a:hover {
	background-color: #6D92D5;
}

        </style>
        <div id="header-reg">
	<?php require_once './includes/guest/header.php';?>
</div>
    
<div id="menu-reg">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
    <hr/>
        <div id="content" class="login-form">
            <h2 class="heading-primary">
                Login
            </h2>
            <form action="loginuser.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Email:</div>
                    <input type="text" name="email" class="input_field" value="<?php echo "$email"?>" />

                    <div class="input_label">Password:</div>
                    <input type="password" name="password" class="input_field" value="" />

                    <div class="btn_action">
                        <input type="submit" name="submit" value="Login" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>
                    
                            
                </div>
                <!-- <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="login_label">Email:</td>
                        <td><input type="text" name="email" class="login_input" value="<?php echo "$email"?>" /></td>
                    </tr>
                    <tr>
                        <td class="login_label">Password:</td>
                        <td><input type="password" name="password" class="login_input" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Login" /></td>
                        
                    </tr>
                </tbody>
            </table> -->
            </form>
            <?php if($status_check==2){ ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
            <?php } ?>
            <?php if($status_check==3){ ?>
            <h2 style="color: red">Email Or, Password not match!!</h2>
            
            <?php } ?>
        </div>
    
    </body>
</html>