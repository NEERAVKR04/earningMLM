<?php
    $status=0;
    $template=1;
    $first_name='';
    $last_name='';
    $email='';
    $mobile='';
    $password='';
    $cnf_password='';
    $package='';
    $refer_code='';
    $errors= array();
if(isset($_POST['submit'])){
    session_start();
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cnf_password=$_POST['cnf_password'];
    $package=$_POST['package'];
    if($package=="5$")
    {
        $package_name='Silver';
    }
    if($package=="12$")
    {
        $package_name='Gold';
    }
    if($package=="21$")
    {
        $package_name='Sub Diamond';
    }
    if($package=="50$")
    {
        $package_name='Diamond';
    }
    if($package=="99$")
    {
        $package_name='Platinum';
    }
    
    $refer_code=$_POST['refer_code'];
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    if(empty($first_name)){
        
        $errors['first_name']="First Name required!!";
    }
    if(empty($last_name)){
        $errors['last_name']="Last Name required!!";
    }
    if(empty($email)){
        $errors['email']="Email required!!";
    }
    if(empty($password)){
        $errors['password']="Password can't be empty!!";
    }
    if(empty($cnf_password)){
        $errors['cnf_password']="Confirm Password can't be empty!!";
    }
    if(empty($mobile)){
        $errors['mobile']="Mobile number required!!";
    }
    if(empty($package)){
        $errors['package']="Select Package!!";
    }
    if(count($errors)==0)
    {
        if(strlen($password)<6)
        {
            $errors['password']="Password must be atleast of 6 character";
        }
        if($password!=$cnf_password)
        {
            $errors['cnf_password']="Confirm password not matches!!";
        }
        if(!preg_match('/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]+$/', $email)){
            $errors['email']="Email id not valid!!";
        }
        if($email=='abc@example.com' || $email=='123@example.com' || $email=='abcd@example'){
            $errors['email']="Email id not valid!!";

        }
        if(strlen($mobile)!=10)
        {
            $errors['mobile']="Mobile number must be of 10 digit";
        }
        }
        
        
        if(count($errors)==0)
        {
    $query_st="select * from users where email='$email'";
    require_once './includes/db.inc.php';
    $result_1=  mysql_query($query_st);
   if(mysql_num_rows($result_1)==1){
       $errors['email']="Email id already exists";
   }
   $query_rfr="select first_name from users where referral_code='$refer_code'";
   require_once './includes/db.inc.php';
   $result_rfr=mysql_query($query_rfr);
   if(mysql_num_rows($result_rfr)>0)
   {
     
       while ($row = mysql_fetch_assoc($result_rfr)) {
          $referee_name= $row["first_name"];
       }
     
   }
   
   
   $query_count="select referral_count from users where referral_code='$refer_code'";
          require_once './includes/db.inc.php';
          $result_count=  mysql_query($query_count);
          if(mysql_num_rows($result_count)>=0)
          {
              while ($row_count = mysql_fetch_assoc($result_count)) {
              $referral_count=$row_count["referral_count"];
              $referral_count=$referral_count+1;
              $query_referral_count_update="update users set referral_count='$referral_count' where referral_code='$refer_code'";
              mysql_query($query_referral_count_update);
              }
          }
   
        }
        if(count($errors)==0){
            //verification code
            $string='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$&!';
            $string= str_shuffle($string);
            $verification=  substr($string,0,12);
            $_SESSION['verification']=$verification;
            $str=substr($email,0,8);
            $username=$str;
           
            $str_referral=substr($first_name,0,3).strtoupper($str_referral);
            $str_referral= strtoupper($str_referral);
            
            $digit_rfr='0123456789';
            $digit_rfr=  str_shuffle($digit_rfr);
            $digit=substr($digit_rfr,0,4);
            $referral_code=$str_referral.$digit;
            
            $password=  md5($password);
            echo "$referral_count";
            $query= "insert into users values('$username','$email','$first_name','$last_name','$password','$mobile','$package','$refer_code','$referee_name','$referral_code','$verification','Y','N','member','0','$package_name','0','0','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','','','','','','','','','','')";
            require_once './includes/db.inc.php';
            mysql_query($query);
            $template=2;     
        }   
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
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
        
        <div id="content" class="registration">
            <?php if($template==1){ ?>
            <h2 class="heading-primary">
                Register
            </h2>
            <form action="register.php" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Email:</td>
                        <td><input type="text" name="email" class="input_field input_field--registration" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">First Name:</td>
                        <td><input type="text" name="first_name" class="input_field input_field--registration" value="<?php echo "$first_name"?>" />
                        <?php if(isset($errors['first_name'])){?><br/> <span class="error"><?php echo $errors['first_name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Last Name:</td>
                        <td><input type="text" name="last_name" class="input_field input_field--registration" value="<?php echo "$last_name"?>" />
                        <?php if(isset($errors['last_name'])){?><br/> <span class="error"><?php echo $errors['last_name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Password:</td>
                        <td><input type="password" name="password" class="input_field input_field--registration" value="" />
                        <?php if(isset($errors['password'])){?> <span class="error"><?php echo $errors['password'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Confirm Password:</td>
                        <td><input type="password" name="cnf_password" value="" class="input_field input_field--registration"  />
                        <?php if(isset($errors['cnf_password'])){?> <span class="error"><?php echo $errors['cnf_password'] ?></span>
                        <?php } ?>
                       
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Mobile:</td>
                        <td><input type="text" name="mobile" class="input_field input_field--registration"  value="<?php echo "$mobile"?>" />
                        <?php if(isset($errors['mobile'])){?> <span class="error"><?php echo $errors['mobile'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Select Package:</td>
                        <td><select name="package" class="input_field input_field--registration" value="<?php echo "$package"?>"/>
                                        <option>5$</option>
                                        <option>12$</option>
                                        <option>21$</option>
                                        <option>50$</option>
                                        <option>99$</option>
                            </select>
                        <?php if(isset($errors['package'])){?> <span class="error"><?php echo $errors['package'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Refer Code:</td>
                        <td><input type="text" name="refer_code" placeholder="If any (optional)" class="input_field input_field--registration" value="<?php echo "$refer_code"?>" />
                        <?php if(isset($errors['refer_code'])){?> <span class="error"><?php echo $errors['refer_code'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Register"  class="btn" style="margin: 2rem 8rem;"/>
                        </td>
                            <!-- <a class="btn" style="margin: 2rem 8rem;">Home</a></td>                             -->
                        
                    </tr>
                    
                    
                </tbody>
            </table>
                
                &nbsp;&nbsp;<a href="loginuser.php" class="link">Or, Already a member?</a>&nbsp;&nbsp;&nbsp;&nbsp;
           <br />
           <a href="index.php" class="link">Home</a>
            </form>
            <?php } ?>
            <?php if($template==2){ 
                
                /*$to      = $email;
                
$subject = 'Account verification required';
$message = 'Verification code is:';
$headers = 'From: neeravkr04@gmail.com' . "\r\n" .
   'Reply-To: neeravkr04@gmail.com';

mail($to, $subject, $message, $headers);*/
                mail('myselfcool.neerav@gmail.com','Sample mail','Sample content','From: neeravkr.04@gmail.com');


                ?>
            <h2>Congratulations!! Registered Successfully </h2>
            <h3>An email has been sent on <?php echo "$email" ?> to verify your email id!!<a href="login.php"><b>&nbsp;Login</b></a></h3>
            <?php } ?>
        </div>
    </body>
</html>
