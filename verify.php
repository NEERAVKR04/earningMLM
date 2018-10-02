<?php
include './includes/db.inc.php';
if(isset($_POST['verify'])){
    $code=$_POST['code'];
    $email=$_POST['email'];
    
    $error=array();
    if($code=''){
        $error['verify']="Enter verification code!!";
    }
    if($email==''){
        $error['email']="Enter your registered email";
    }
    $query_verify="select * from users where email='$email'";
    require_once './includes/db.inc.php';
    $result=  mysqli_query($con, $query_verify);
    if ($rowverify= mysqli_num_rows($result)==1){
        $verification_code=$rowverify['verification'];
        echo "$verification_code";
        echo "$code";
    }
    else{
        $error['email_error']="Email not found";
    }
    if($code!=$verification_code){
        $error['code']="Verification code not matches!! check your email for correct code";
    }
    if(count($error)==0){
        $queryupdate="update users set verified='Y' where email='$email'";
        require_once './includes/db.inc.php';
        mysqli_query($con, $queryupdate);
        $template=3;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Verify</title>
       

        <link rel="stylesheet" href="css/style.css">
    </head>
    
        <body style="background-color: #798F9D">
            <hr style="height:6px;width: 100%;background-color: #ED2F63"/> 
          
               <div style="display: box;line-height: 1.42857143;text-align: center;margin-bottom: 20px;font-size:13px;color:white;font-family: 'Open Sans','Helvetica Neue','Helvetica','Arial','sans-serif'">
                   <h1 style="margin-top: 5%;font-weight: 200;font-size: 36px;">MAKEASYLIFE.COM</h1><br><br>
                                <h3 style="font-size: 24px;font-weight:200;margin-bottom: 10px;">Site Register</h3>
<!--                <small style="font-size: 85%;font-weight: 200;">LOGIN</small>-->
            </div>
        
        <div id="content" class="registration">
            
            <h2 class="heading-primary">
               User Verification
            </h2>
            <form action="verify.php" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Email:</td>
                        <td><input type="text" name="email" class="input_field input_field--registration"  value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Verification Code:</td>
                        <td><input type="text" name="code" class="input_field input_field--registration" value="<?php echo "$code"?>" />
                        <?php if(isset($error['code'])){?> <br/><span class="error"><?php echo $error['code'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="verify" value="Verify"  class="btn" style="margin: 2rem 8rem;"/>
                            

                        </td>
                            <!-- <a class="btn" style="margin: 2rem 8rem;">Home</a></td>                             -->
                        
                    </tr>
                    <?php
                    if($template==3){?>
                <h2>Congratulations!! Verified Successfully. <a href="loginuser.php" style="color: #4773C1">Login Here</a> </h2>
                        
                    <?php }
                    ?>
                </tbody>
                </table>
            </form>

            
        </div>

    

    </body>
</html>
