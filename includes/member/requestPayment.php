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
$status=0;
$errors=array();
if(isset($_POST['withdrawal_request'])){
    $method=$_POST['method'];
    //$purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    if(empty($amount)){
        
        $errors['amount']="Enter valid amount!!";
    }
    if($amount<10){
        $errors['amount']="You can't withdraw less than 10$";
    }
    if($amount>50){
        $errors['amount']="You can't withdraw more than 50$";
    }
    if($activation_status!='Y'){
        $errors['activation_status']="You can't request withdrawal as your Id is not active";
    }
    if($method=='UPI'){
        
    }
    
    if(count($errors)==0){
        $query_st="select * from paymentwithdraw where email='$email'";
        require_once '../db.inc.php';
    $result=  mysql_query($query_st);
   if(mysql_num_rows($result)!=1){
       $errors['message']="First, complete bank details then request for withdraw!!";
   }
   
   else{
       $request=$result['request'];
       if($request!='pending'){
       $query_update="update paymentwithdraw set amount='$amount',request='pending',method='$method' where email='$email'";
       require_once '../db.inc.php';
       mysql_query($query_update);
       }
   }
        
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
                Request Payment !!
            </h3>
            
            <form action="requestPayment.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Method:</div>
                    <select class="input_field" name="method">
                        <option id="1">PayPal</option>
                        <option id="2">PayTM</option>
                        <option id="3" selected>UPI</option>
                        <option id="4">Bank Transfer</option>
                    </select>
                    
                    <div class="input_label">Amount:</div>
                    
                    
                    <input type="text" name="amount" class="input_field">
                    <?php if(isset($errors['amount'])){?> <br/><span class="error" style="color: red;font-size: 1.45rem;"><?php echo $errors['amount'] ?></span>
                        <?php } ?>
                    
                    <div class="btn_action">
                        <input type="submit" name="withdrawal_request" value="Request Withdrawal" class="btn_special" style="background-color: steelblue;font-size: 16px;width: 25rem;" />
                        
                            
                        <!--<a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>-->
                  
                    </div>
                    <?php if(isset($errors['message'])){?> <br/><span style="color: red;font-size: 1.5rem;"><?php echo $errors['message'] ?></span>
                        <?php } ?>
                    <?php if(isset($errors['activation_status'])){?> <br/><label style="color: red;font-size: 1.5rem;margin-left: auto;margin-right: auto;"><?php echo $errors['activation_status'] ?></label>
                        <?php } ?>

                </div>
                <?php
                if($status==1){
                    echo "<h2>"."Bank details not complete!!"."</h2>";
                }
                ?>
                </form>
                        
        </div>
    
    </body>
</html>