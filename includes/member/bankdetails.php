<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$mobile=$_SESSION['mobile'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqlI_query($con,$query_check_code);
     
       while ($row = mysqli_fetch_assoc($referral_code_check)) {
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
$result=  mysqli_query($con,$query_det);
     
       while ($row1 = mysqli_fetch_assoc($result)) {
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
    mysqli_query($con,$query_bank);
    }

}
?>
<?php
$update=0;
if(isset($_POST['update_data']))
{
    
    $upi_update=$_POST['upi_update'];
    $paytm_update=$_POST['paytm_update'];
    $paypal_update=$_POST['paypal_update'];
    
    
    $query_updateinfo="update paymentwithdraw set paytm='$paytm_update',upi='$upi_update',paypal='$paypal_update' where email='$email'";
    require_once '../db.inc.php';
    mysqli_query($con,$query_updateinfo);
    $update=1;
   
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
    height: 1200px;
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


<div id="content" class="login-form">
    <h3 class="heading-primary" style="font-size:24px;font-weight: bold;">
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
                       
        </div>
<div class="square" style="height:350px">
<div id="content" class="login-form">
    <h3 class="heading-primary" style="font-size:24px;font-weight: bold;margin-top: 1.5rem;">
                PayTm, UPI & Paypal Updation !!
            </h3>
    <form action="bankdetails.php" method="POST">
                <div class="login_details">
        
                    <div class="input_label">UPI Address.:</div>
                    <input type="text" name="upi_update" class="input_field" value="" />
                    <div class="input_label">PayTM No.:</div>
                    <input type="text" name="paytm_update" class="input_field" placeholder="Paytm no." value="" />
                    <div class="input_label">Paypal:</div>
                    <input type="text" name="paypal_update" class="input_field" placeholder="Paypal email" value="" />

                    <div class="btn_action" style="margin-left:17rem;">
                        <input type="submit" name="update_data" value="Update" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="index.php" style="background-color: springgreen;">Cancel</a>
                        <a class="btn_special" href="../../index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>
                    <?php
                    if($update==1){
                        echo "<label style='margin-left:2rem;'>"."Info updated!!";
                    }
                    ?>
                    
                            
                </div>
            </form>
            
            
        </div>

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
    font-size: 20px;
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
