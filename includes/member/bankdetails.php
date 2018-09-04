<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$mobile=$_SESSION['mobile'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysql_query($query_check_code);
     
       while ($row = mysql_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $first_name=$row['first_name'];
          $last_name=$row['last_name'];
          $country=$row['country'];
          $state=$row['state'];
          $city=$row['city'];
          $address=$row['address'];
          $mobile=$row['mobile'];
          $email=$row['email'];
          $pincode=$row['pincode'];
       }
       $query_det="select * from paymentwithdraw where email='$email'";
require_once '../db.inc.php';
$result=  mysql_query($query_det);
     
       while ($row1 = mysql_fetch_assoc($result)) {
         $bank_name=$row1['bank_name'];
         $bank_type=$row1['bank_type'];
         $acno=$row1['account_no'];
         $ifsc=$row1['ifsc'];
         $upi=$row1['upi'];
         $paytm=$row1['paytm'];
         $paypal=$row1['paypal'];
       }
   
?>
<?php
if(isset($_POST['submit']))
{
    $bank_name=$_POST['bank_name'];
    $acno=$_POST['acno'];
    $cnfacno=$_POST['cnfacno'];
    $bank_type=$_POST['bank_type'];
    $upi=$_POST['upi'];
    $paytm=$_POST['paytm'];
    $paypal=$_POST['paypal'];
    $ifsc=$_POST['ifsc'];
    
    $errors=array();
    
    if(empty($bank_name)){
        $errors['bank_name']="Bank name can't be empty";
    }
        if(empty($bank_type)){
        $errors['bank_type']="Bank type can't be empty";
    }
        if(empty($acno)){
        $errors['acno']="Account no. can't be empty";
    }
        if(empty($cnfacno)){
        $errors['cnfacno']="Re-enter account no.";
    }
        if(empty($ifsc)){
        $errors['ifsc']="IFSC can't be empty";
    }
        
    if(count($errors)==0){
    $query_bank="insert into paymentwithdraw values('$email','$first_name','$last_name','$bank_name','$ifsc','$acno','$upi','$paytm','$paypal','','','','$bank_type')";
    require_once '../db.inc.php';
    mysql_query($query_bank);
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Muslimin</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
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
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        text-decoration: none;
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
    height: 650px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
    
    font-size:1.5em;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
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
        min-height: 550px;
    }
}
</style>
<div class="vertical-menu">
    <a href="index.php" class="active">Home</a>
  <a href="article.php">Write Article</a>
  <a href="sendpayment.php">Payment Options</a>
  <a href="watch_adds.php">Watch Adds</a>
  <a href="profile.php">Profile</a>
  <a href="wallet.php">Wallet</a>
  <a href="withdrawal_history.php">Withdrawal</a>
  <a href="referral_list.php">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="payment.php">Payment Proofs</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>


<div id="content" class="login-form">
            <h3 class="heading-primary">
                Bank & Payment Details !!
            </h3>
    <form action="bankdetails.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Bank Name:</div>
                    <input type="text" name="bank_name" class="input_field" value="<?php echo "$bank_name"?>" />

                    <div class="input_label">A/C No.:</div>
                    <input type="password" name="acno" class="input_field" value="<?php echo "$acno"; ?>" />
                    <div class="input_label">Confirm A/C No.:</div>
                    <input type="text" name="cnfacno" class="input_field" value="<?php echo "$acno"; ?>" />
                    <div class="input_label">Bank Type.:</div>
                    <input type="text" name="bank_type" class="input_field" placeholder="Savings/Current" value="<?php echo "$bank_type"; ?>" />
                    <div class="input_label">IFSC Code:</div>
                    <input type="text" name="ifsc" class="input_field" placeholder="10-12 digit ifsc code" value="<?php echo "$ifsc"; ?>" />
                    
                    
                    <div class="input_label">UPI Address.:</div>
                    <input type="text" name="upi" class="input_field" value="<?php echo "$upi"; ?>" />
                    <div class="input_label">PayTM No.:</div>
                    <input type="text" name="paytm" class="input_field" placeholder="Paytm no." value="<?php echo "$paytm"; ?>" />
                    <div class="input_label">Paypal:</div>
                    <input type="text" name="paypal" class="input_field" placeholder="Paypal email" value="<?php echo "$paypal"; ?>" />

                    <div class="btn_action">
                        <input type="submit" name="submit" value="Save" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="index.php" style="background-color: springgreen;">Cancel</a>
                        <a class="btn_special" href="../../index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>
                    
                            
                </div>
            </form>
            <?php if($status_check==2){ ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
            <?php } ?>
            <?php if($status_check==3){ ?>
            <h2 style="color: red">Email Or, Password not match!!</h2>
            
            <?php } ?>
            
        </div>



<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
