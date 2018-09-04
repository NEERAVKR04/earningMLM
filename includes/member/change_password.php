<?php
    require_once './secure.inc.php';
    $status = 0;
    if(isset($_POST['submit'])){
        $current_password = $_POST['current_password']; 
        $new_password = $_POST['new_password']; 
        $confirm_password = $_POST['confirm_password']; 
        require_once '../db.inc.php';
        $username = $_SESSION['username'];
        $email=$_SESSION['email'];
        $password = md5($current_password);
        $new_password=md5($new_password);
        $query = "select * from users where username='$username' and password='$password'";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==1){
           
            if($confirm_password!=$new_password){
                $status=1;
            }
            else{
            $query_change="update users set password='$new_password' where email='$email'";
            require_once '../db.inc.php';
            mysql_query($query_change);
            
            }
            }else{
            $status=3;
        }
    }
    ?>

<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="default.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="header">
        <?php require_once './header.php'; ?>
        </div>
        <div id="menu">
        <?php require_once './menu.inc.php'; ?>
        </div>
        <div id="content">
        <h2>Change Password Form</h2>
        <form action="change_password.php" method="POST">
            <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Current Password:</td>
                        <td><input required type="password" name="current_password" value="" /></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input required type="password" name="new_password" value="" /></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input required type="password" name="confirm_password" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Change Password" /></td>
                        
                    </tr>
                </tbody>
            </table>
        </form>
        <?php if($status==3) { ?>
            <h2 class="error">The current password is Incorrect</h2>
            <?php } ?>
        </div>
    </body>
    <div id="footer">
    <?php require_once './footer.php'; ?>
    </div>
</html>
