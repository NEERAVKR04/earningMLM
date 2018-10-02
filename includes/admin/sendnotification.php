<?php
require_once './secure.inc.php';
include '../db.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqli_query($con,$query_check_code);

       while ($row = mysqli_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $activation_status=$row["activation"];
          $package=$row["package"];
          $email=$row['email'];
       }
       
   
?>

<?php
$display=0;

$error=array();
if(isset($_POST['personal'])){
    $emailuser=$_POST['emailuser'];
    //$purpose=$_POST['purpose'];
    $personalmessage=$_POST['personalmessage'];
    if(empty($personalmessage)){
        
        $error['personalmessage']="Enter some message first";
    }
    if(empty($emailuser)){
        
        $error['emailuser']="Enter user email";
    }
    
    if(count($errors)==0){
        date_default_timezone_set('Asia/Kolkata');
        $date=  date('Y-m-d H:i:s');
        $query_update="insert into information values ('$emailuser','$personalmessage','sent','$date')";
       require_once '../db.inc.php';
       mysqli_query($con,$query_update);
       $display=1;
        
    }
}
?>
<?php

$status=0;
$errors=array();
if(isset($_POST['messageall'])){
    
    //$purpose=$_POST['purpose'];
    $message=$_POST['message'];
    $title=$_POST['title'];
    if(empty($message)){
        
        $errors['message']="Enter some message first";
    }
    if(empty($title)){
        $errors['title']="Enter some heading/Title";
    }
    
    if(count($errors)==0){
        date_default_timezone_set('Asia/Kolkata');
        $date=  date('Y-m-d H:i:s');
        $query_update="insert into notifications values ('$title','$message','sent','$date')";
       require_once '../db.inc.php';
       mysqli_query($con,$query_update);
       $status=1;
       
        
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
           Send Notifications
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" href="default.css">
    </head>
    <body>
                <style>
#header-reg {
        width: 100%;
	margin: 0;
	padding: 5px 0px 6px 0px;
	background-color: #fff;
        height: 62px;
        padding: 0;
        position: relative;
        border-bottom: 1px solid #e4e5e7;
        display: block;
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
	text-align: left;
}

#menu-reg li {
	display: inline;
        
}

#menu-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}

#menu-reg a:hover {
	background-color: #6D92D5;
}

        </style>
        
<style>

.vertical-menu {
    width: 16%;
    float: left;
    min-height: 870px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
    margin-top: 62px;
    margin-bottom: 0%;
    
}

.vertical-menu a {
    background-color: #eee;
    color: #000;
    display: block;
    padding: 16.5px;
    text-decoration: none;
    
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    //background-color: #4773C1;
    color: white;
    
    .vertical-menu a.active-red {
    background-color: tomato;
    //background-color: #4773C1;
    color: white;
    
    .vertical-content {
        float: left;
        padding: 0px 12px;
        border: 1px solid;
        width: 80%;
        border-left: none;
        height: 550px;
        background-color: #eee;
       
    }
    
}
</style>
<div class="vertical-menu">
    <a href="../../index.php" class="active">Home</a>
  
  <a href="activate_users.php">Activate Id</a>
  <a href="view_users.php">Users</a>
  <a href="approved.php">Approved Id</a>
  <a href="check_payment.php">Proof Request</a>
  <a href="payment_request.php">Withdrawal Request</a>
  <a href="sendnotification.php">Send Notification</a>
  <a href="sendpayment.php">Payment Updation</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>

<div id="header-reg">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <a href="index.php"> <span style="float: left;margin-top:1.35rem;margin-left: -145px;font-weight: bolder;color:black;">
            DASHBOARD
        </span>
        <span style="
        height: 62px;
        width: 0;
        border: 0.5px solid;
        //display: inline-block;
        float: left;
        margin-left:0rem;
        margin-top: 0;
        text-align: center;
        font-size: 20px;
        color: #000;
        ">
            
        </span></a>
        <a href="logout.php"> <span style="float: right;margin-top:1.35rem;margin-right: 1.35rem;font-weight: bolder;color:black;">
            LOGOUT
            </span></a>
    </div>
    
</div>
<style>
    .login-form {
  color: #333;
  background-color: #fff;
  border-radius: 5px;
  
  width: 30rem;
  
  height:10rem;
  text-align: center;
  margin-top: 2rem;
  padding: 2rem;
}

.login_details {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 10px;
  margin-left: 15rem;
  margin-right: 5rem;
  background: #eee;
  
}

.heading-primary {
  font-size: 2rem;
  font-weight: 300;
}

.input_field {
  width: 15rem;
  padding: .6rem 1rem;
 margin-top: 0.5rem;
  border-radius: 5px;
  border: 1px solid #e4e5e7;
  color: #333;
  font-size: 1rem;
  margin-left: -5rem;
}

.input_label {
  font-size: 1rem;
  margin-right: 1rem;
  width: 15rem;
  margin-left: 18rem;
  font-weight: bold;
}

.btn_action {
  display: flex;
  grid-column: 1/3;
}

.btn_special {
  color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 1rem;
  
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 6rem;
  outline: none;
}
  .btn_special:hover {
    -webkit-filter: brightness(1.2);
    transform: translateY(-2px);
}

</style>
<style>
    .square{
        height: auto;
        width: 70%;
        display: grid;
        border: 1px solid #e4e5e7;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #eee;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<style>
    .login-forms{
        min-height: 300px;
        font-weight: bold;
        font-size: 18px;
        margin-top: 2rem;
        text-align: center;
        color: black;
        
        
    }
    .login-fields{
        margin-left: 0rem;
        border-radius: 5px;
        padding: .6rem 1rem;
        border: 1px solid #e4e5e7;
        margin-top: 0.5rem;
        font-size: 1rem;
        color: #333;
        width: 15rem;
       
    }
    .login-labels{
        margin-top: 2rem;
        width: 10rem;
        border:none;
        background: none;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
    }
</style>

<div class="square">
    
    <form class="login-forms" action="sendnotification.php" method="POST">
        <h2>
            Send Personal Notifications!!
        </h2>
        <table id="history">
                <input readonly type="text" class="login-labels" value="Enter Email:">
                <input class="login-fields" type="text" placeholder="Enter Email" name="emailuser" value="">
                <?php if(isset($error['emailuser'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $error['emailuser'] ?></label>
                        <?php } ?>
                    
                <br/>
                <input readonly type="text" class="login-labels" value="Your Message:">
                <input class="login-fields" type="text" placeholder="Type Your Message" name="personalmessage" value="">
                <?php if(isset($error['personalmessage'])){?> <br/><span style="color: red;font-size: 1rem;"><?php echo $error['personalmessage'] ?></span>
                        <?php } ?>
                <br/>
                <?php if(isset($errors['amount'])){?> <br/><span class="error" style="color: red;font-size: 1.45rem;"><?php echo $errors['amount'] ?></span>
                        <?php } ?>
                <br/>
                <input type="submit" name="personal" value="Send" class="btn_special" style="background-color: steelblue;margin-bottom: 5px;" />
                <input type="submit" name="cancel" value="Cancel" class="btn_special" style="background-color: tomato;margin-bottom: 5px;" />
                           <?php if(isset($errors['payment'])){?> <br/><span class="error"><?php echo $errors['payment'] ?></span>
                        <?php } ?>
        </table>
        
                    
                   
</div>
<div class="square">
    
    <form class="login-forms" action="sendnotification.php" method="POST">
        <h2>
            Send Notification To All!!
        </h2>
        <table id="history">
                <input readonly type="text" class="login-labels" value="Title:">
                <input class="login-fields" type="text" placeholder="Enter message title" name="title" value="">
                <?php if(isset($errors['title'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['title'] ?></label>
                        <?php } ?>
                <br/>
                <input readonly type="text" class="login-labels" value="Message:">
                <input class="login-fields" type="text" placeholder="Enter message here" name="message" value=""><?php if(isset($errors['message'])){?> <br/><label style="color: red;font-size: 1rem;margin-left:1rem;"><?php echo $errors['message'] ?></label>
                        <?php } ?>
                <br/>
                <br/>
                <input type="submit" name="messageall" value="Send" class="btn_special" style="background-color: steelblue;margin-bottom: 5px;" />
                <input type="submit" name="cancel" value="Cancel" class="btn_special" style="background-color: tomato;margin-bottom: 5px;" />
                           
        </table>
                    
                    
                    
                    
        </form>
</div>
<div class="square" style="margin-top: 1px;">
<h4>We usually take 24-48 hours for processing your withdrawal request!!
<br/>
But, sometimes it can take more than 48 hours. So, be patient.
</h4>
</div>

    
        
    
    </body>
</html>