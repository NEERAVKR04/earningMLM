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
       if($activation_status!='Y'){
           header('Location: payment.php');
       }
   
?>

<?php
$success=0;
$status=0;
$errors=array();
if(isset($_POST['withdrawal_request'])){
    $method=$_POST['method'];
    //$purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    if(empty($amount)){
        
        $errors['amount']="Enter valid amount!!";
    }
    if($amount<100){
        $errors['amount']="You can't withdraw less than $10";
    }
    if($amount>1000){
        $errors['amount']="You can't withdraw more than $100";
    }
    if($activation_status!='Y'){
        $errors['activation_status']="You can't request withdrawal as your Id is not active";
    }
    $query_credit="select * from users where email='$email'";
    require_once '../db.inc.php';
    $result_credit=  mysqli_query($con,$query_credit);
    while ($rowcredit = mysqli_fetch_array($result_credit)) {
        $credit_balance=$rowcredit['credit'];
        
    }
    if($amount>$credit_balance){
        $errors['credit_balance']="You don't have sufficient balance. You have just $".$credit_balance." in your wallet";
    }

    $query_check_details="select * from paymentwithdraw where email='$email'";
    require_once '../db.inc.php';
    $result_det=  mysqli_query($con,$query_check_details);
    while ($row1 = mysqli_fetch_array($result_det)) {
        $upi_fetch=$row1['upi'];
        $paytm_fetch=$row1['paytm'];
        $paypal_fetch=$row1['paypal'];
        $request_fetch=$row1['request'];
    }
    if($method=='UPI' && $upi_fetch==''){
        $errors['upi']="First enter your upi address in bank details then request withdrawal via UPI";
    }
    if($method=='PayTM' && $paytm_fetch==''){
        $errors['paytm']="We don't have your paytm number. Enter paytm in bank details first!!";
    }
    if($method=='PayPal' && $paypal_fetch==''){
        $errors['paypal']="We don't have your paypal id. Enter paypal id in bank details first!!";
    }
    if($request_fetch=='pending'){
        $errors['pending']="You have already requested for withdrawal previously. Wait for 24-48 hours for approval!!";

    }
    
     $query_st="select * from paymentwithdraw where email='$email'";
       require_once '../db.inc.php';
    $result_pay=  mysqli_query($con,$query_st);
   if(mysqli_num_rows($result_pay)!=1){
       $errors['message']="First, complete bank details then request for withdraw!!";
   }
   
   $query_st2="select * from paymentwithdraw where email='$email'";
       require_once '../db.inc.php';
       $result_pending=  mysqli_query($con, $query_st2);
       while ($row2 = mysqli_fetch_array($result_pending)) {
            $request_pending=$row2['request'];
       }
       if($request_pending=='pending'){
           $errors['pending_request']="Your one request is already in progress or pending. Wait for approval!!";
       }
   
   if(count($errors)==0){
       
       
       $query_update="update paymentwithdraw set amount='$amount',request='pending',method='$method' where email='$email'";
       require_once '../db.inc.php';
       mysqli_query($con,$query_update);
       $success=1;
       
       
   }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
           Withdrawal Request
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" href="default.css">
    </head>
    <body>
                <style>
#header-reg {
        width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
        min-height: 40px;
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
        font-size: 16px;
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
	font-size: 11px;
	font-weight: bold;
	color: #FFFFFF;
}

#menu-reg a:hover {
	background-color: #6D92D5;
}

        </style>
        <div id="header-reg">
	<?php require_once './header.php';?>
</div>
<div id="menu-reg">
	<?php require_once './menu.inc.php'; ?>
</div>
<style>

.vertical-menu {
    width: 20%;
    float: left;
    min-height: 1000px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
}

.vertical-menu a {
    background-color: #eee;
    color: #000;
    display: block;
    padding: 12px;
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
        min-height: 1000px;
    }
    
}
</style>
<div class="vertical-menu">
    <a href="index.php" class="active">Home</a>
  <a href="article.php">Write Article</a>
  <a href="sendpayment.php">Payment Options</a>
  <a href="watch_adds.php">Watch Adds</a>
  <a href="profile.php">Profile</a>
    <a href="bankdetails.php">Bank Details</a>

  <a href="wallet.php">Wallet</a>
  <a href="withdrawal_history.php">Withdrawal</a>
  <a href="referral_list.php">Your Referrals</a>
  <a href="create_campaign.php">Advertisement Campaign</a>
  <a href="payment.php">Payment Proofs</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
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
        margin-top: 5rem;
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
    
    <form class="login-forms" action="requestPayment.php" method="POST">
        <h2>
            Request Payments/Withdrawal
        </h2>
        <table id="history">
                <input readonly type="text" class="login-labels" value="Method:">
                
                <select class="login-fields" type="text" name="method" value="">
                    <option selected>Bank Transfer</option>
                    <option>UPI</option>
                    <option>PayTM</option>
                    <option>PayPal</option>
                </select>
                <br/>
                <input readonly type="text" class="login-labels" value="Amount:">
                <input class="login-fields" type="text" placeholder="Enter withdrawal amount" name="amount" value="">
                <br/>
                <?php if(isset($errors['amount'])){?> <br/><span class="error" style="color: red;font-size: 1.45rem;"><?php echo $errors['amount'] ?></span>
                        <?php } ?>
                <br/>
                <input type="submit" name="withdrawal_request" value="Request" class="btn_special" style="background-color: steelblue;margin-bottom: 5px;" />
                <input type="submit" name="cancel" value="Cancel" class="btn_special" style="background-color: tomato;margin-bottom: 5px;" />
                           <?php if(isset($errors['payment'])){?> <br/><span class="error"><?php echo $errors['payment'] ?></span>
                        <?php } ?>
        </table>
        <?php if(isset($errors['message'])){?> <br/><span style="color: red;font-size: 1rem;"><?php echo $errors['message'] ?></span>
                        <?php } ?>
                    <?php if(isset($errors['activation_status'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['activation_status'] ?></label>
                        <?php } ?>
                    <?php if(isset($errors['upi'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['upi'] ?></label>
                        <?php } ?>
                    <?php if(isset($errors['paytm'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['paytm'] ?></label>
                        <?php } ?>
                    <?php if(isset($errors['paypal'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['paypal'] ?></label>
                        <?php } ?>
                    <?php if(isset($errors['pending'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['pending'] ?></label>
                        <?php } ?>
                    <?php if(isset($errors['credit_balance'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $errors['credit_balance'] ?></label>
                        <?php } ?>
                    <?php if($success==1){ ?>
                    <?php echo "<br/>"."Withdrawal request submitted!!";?>
                    <?php } ?>
        </form>
</div>
<div class="square" style="margin-top: 1px;">
<h4>We usually take 24-48 hours for processing your withdrawal request!!
<br/>
But, sometimes it can take more than 48 hours. So, be patient.
</h4>
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
        ">
        <br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 22px;
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

    
    </body>
</html>