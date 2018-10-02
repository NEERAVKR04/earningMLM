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
            $query= "insert into users values('$username','$email','$first_name','$last_name','$password','$mobile','$package','$refer_code','$referee_name','$referral_code','$verification','Y','N','member','0','$package_name','0','0','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','','','','','','','','','','','')";
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
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="keywords" content="" />
        <meta name="description" content="" />

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
    <style>
    .squarefoot{
        height:auto;
        width: 22%;
        border: 3px solid;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #fff;
        margin-bottom: 2%;
        
        
    }
</style>
        <div style="width: 100%;
	overflow: hidden;
	margin-left: 0px;
        height: 300px;
        background-color: #eee;
        margin-top: 30rem;
        ">
        <br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 0px;
    text-align: center">BEST OPPORTUNITY TO TRY YOUR LUCK. EARN BIG WITH <label style="color: tomato;">"MUSLIMIN"</label></h3>
    
        <style>
#history {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#history td, #history th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 13.25px;
    //text-align: center;
}

#history tr:nth-child(even){background-color: #f2f2f2;}

#history tr:hover {background-color: #ddd;}
#history tr{
    max-height: 1.8px;
}

#history th {
    padding-top: 10px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: #eee;
}
</style>
    <style>
        .announcements{
        float: left;
        padding: 0px 12px;
        border: 1px solid;
        width: 65%;
        min-height: 100px;
        text-align: justify;
        margin-left: 5rem;
        margin-top: 4rem;
        border-radius: 3px;
        padding: 16px;
        position: relative;
        background-color: #eee;
        
    }
    </style>
               <style>
            #footerdiv{
                margin-left: 3rem;
                width: 98%;
                text-align: left;
                margin-right: 1rem;
            }
            #footerdiv a{
                text-decoration: none;
                font-size: 13px;
                text-align: justify;
                margin-bottom: 0rem;
                color: #000;
                
                
            }
        </style>
        
        <div id="footerdiv">
            <div class="announcements" style="width:90%;margin-left: 0rem;border: none;">
                <div class="squarefoot" style="border:none;width:25%;margin-top: -2rem;">
    <form action="notification.php" method="POST">
            <table id="history">
            <th><a style="color: #fff;">Some Guides</a></th>

                    <?php
              
          
                echo "<tr style='background:none;'>"."<td>"."<a href='../../howtowork.php' style='color:blue;'>"."How To Work?"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../opportunities.php' style='color:blue;'>"."Our Idea"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../privacy.php' style='color:blue;'>"."Have some queries?"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../opportunities.php' style='color:blue;'>"."Our Helping Plan"."</a>"."</td>"."</tr>";

                
                ?>
        </table>
        </form>
</div>
<div class="squarefoot" style="border:none;width:25%;margin-top: -2rem;">
    <form action="index.php" method="POST">
            <table id="history">
                <th><a style="color: #fff;">Useful Links</a></th>
                <?php
          
                echo "<tr style='background:none;'>"."<td>"."<a href='../../loginuser.php' style='color:blue;'>"."Login"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../register.php' style='color:blue;'>"."Register"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../privacy.php' style='color:blue;'>"."Privacy Policy"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../contact.php' style='color:blue;'>"."Contact Us"."</a>"."</td>"."</tr>";

                ?>  
        </table>
        </form>
</div>
<div class="squarefoot" style="border:none;width:25%;margin-top: -2rem;">
    <form action="index.php" method="POST">
            <table id="history">
                <th><a style="color: #fff;">Opportunities</a></th>
                <?php
          
                echo "<tr style='background:none;'>"."<td>"."<a href='../../opportunities.php' style='color:blue;'>"."Business Opportunities"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../contact.php' style='color:blue;'>"."Need Help?"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../contact.php' style='color:blue;'>"."Whatsapp Help"."</a>"."</td>"."</tr>";
                echo "<tr style='background:none;'>"."<td>"."<a href='../../howtowork.php' style='color:blue;'>"."How much you can earn?"."</a>"."</td>"."</tr>";

                ?>  
        </table>
        </form>
</div>
                <br/>
</div>
<!--            <ul>  
                <li><a href="terms_conditions.php">Terms & conditions </a><br/></li>                
                <li><a href="howtowork.php">How To Work? </a><br/></li>
                <li><a href="loginuser.php">Login </a><br/></li>
                <li><a href="register.php">Register </a><br/></li>
                <li><a href="privacy.php">Privacy </a><br/></li>
                <li><a href="contact.php">Contact Us </a><br/></li>
                <li><a href="opportunities.php">Business opportunities</a></li>
            </ul>-->
        </div>
        <br/>
        <br/>
    </div>
<!--    <div style="width: 100%;
	overflow: hidden;
	margin-left: 0px;
        min-height: 420px;
        background-color: #F7F6F6;">
        <br/><br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">earn extra money</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 50px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 3px;
    
    text-align: center">why <b>join us?</b></h2>
    </div>
<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>-->

    </body>
</html>
