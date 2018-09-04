<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysql_query($query_check_code);
if(mysql_query($result_rfr)>=0)
   {
     
       while ($row = mysql_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $activation_status=$row["activation"];
          $package=$row["package"];
          $email=$row['email'];
       }
   }
?>

<?php
$display=0;
if(isset($_POST['getdetails'])){
    $method=$_POST['method'];
    $purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    $display=1;
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
        <link rel="stylesheet" href="../../css/style.css">
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
	<?php require_once './header.php';?>
</div>
    
<div id="menu-reg">
	<?php require_once './menu.inc.php'; ?>
</div>
        <style>

.vertical-menu {
    width: 20%;
    float: left;
    min-height: 550px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    font-size: 1.5em;
    text-align: justify;
    
    text-decoration: none;
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
    <hr/>
        <div id="content" class="login-form">
            <h3 class="heading-primary">
                How you want to pay us?
            </h3>
            <form action="sendpayment.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Method:</div>
                    <select class="input_field" name="method">
                        <option id="1">PayPal</option>
                        <option id="2">PayTM</option>
                        <option id="3" selected>UPI</option>
                        <option id="4">Bank Transfer</option>
                    </select>
                    <div class="input_label">Purpose:</div>
                    <select class="input_field" name="purpose" onselect="getdetails()">
                        <option id="5" selected>Activate Id</option>
                        <option id="6">Upgrade Plan</option>
                        <option id="7">Advertisement Campaign</option>
                        
                    </select>
                    <div class="input_label">Amount:</div>
                    <select class="input_field" name="amount" onselect="getdetails()">
                        <option id="8">5$</option>
                        <option id="9">11$</option>
                        <option id="10">21$</option>
                        <option id="11">50$</option>
                        <option id="12">99$</option>
                        
                    </select>

                    
                    <div class="btn_action">
                        <input type="submit" name="getdetails" value="Get Details" class="btn_special" style="background-color: steelblue;" />
                        <!--<a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>-->
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>

                </div>
                </form>
            <?php if($method=='UPI' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            
            <?php if($method=='UPI' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>

            <?php if($method=='UPI' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
      

            
        </div>
    
    </body>
</html>