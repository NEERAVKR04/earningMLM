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
            Payment Page
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
	<?php
$username=$_SESSION['username'];
$query_st="select * from users where username='$username'";
require_once '../db.inc.php';
$result=  mysqli_query($con,$query_st);
while($row=  mysqli_fetch_array($result)){
    $package_name=$row['package_name'];
}
?>
<ul>
    <style>
    .menu-dashboard{
        margin-right: 45px;
        margin-left:-95px; 
        font-size: 11px;
        
    }
</style>
<li class="menu-dashboard"><a href="./../../index.php"><b>REFER CODE:&nbsp;&nbsp;</b><b style="color: yellow;font-size: 14px"><?php echo"$referral_code" ?></b></a></li>
    <li><a href="index.php">DASHBOARD</a></li>
               
                <li><a href="watch_adds.php">Advertisement Panel</a></li>
                <li><a href="referral_list.php">Referrals</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="index.php">How to work?</a></li>
		<li><a href="logout.php">LOGOUT</a></li>
		<li><a href="change_password.php">Policy</a></li>
                <li><b><a href="payment.php" style="color: gold"><?php echo "$package_name"." Package"?></a></b></li>
</ul>

</div>
        <style>

.vertical-menu {
    width: 20%;
    float: left;
    min-height: 1000px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
 
    font-weight: bold;
    font-size: 1em;
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
    <a href="bankdetails.php">Bank Details</a>

  <a href="wallet.php">Wallet</a>
  <a href="withdrawal_history.php">Withdrawal</a>
  <a href="referral_list.php">Your Referrals</a>
  <a href="create_campaign.php">Advertisement Campaign</a>
  <a href="payment.php">Payment Proofs</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
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
  width: 12rem;
  padding: .6rem 0rem;
  margin-top: 0rem;
  border-radius: 5px;
  border: 1px solid #e4e5e7;
  color: #333;
  font-size: 1rem;
  margin-left: 0rem;
}

.input_label {
  font-size: 1rem;
  margin-right: 1rem;
  width: 10rem;
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
        margin-left: 3.5rem;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #000;
        background-color: #eee;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
    .square2{
        height: auto;
        width: 90%;
        display: grid;
        border: 1px solid #e4e5e7;
        display: inline-block;
        float: left;
        margin-left: 2rem;
        margin-top: 2rem;
        text-align: center;
        font-size: 18px;
        color: #000;
        background-color: #fff;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<style>
    .login-forms{
        min-height: 300px;
        font-weight: bold;
        font-size: 18px;
        margin-top: 1rem;
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
        margin-top: 1rem;
        width: 12rem;
        border:none;
        background: none;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
    }
</style>


<div class="square">
            <div class="square2">
            <h3 style="color: black;">Bank Info:</h3>
            <form action="#" method="POST">
                <table border="0" cellpadding="2">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Account Name.:</td>
                        <td><input type="text" name="acname" readonly class="input_field input_field--registration" style="margin-left: 0.2rem;border:none;" value="<?php echo "Muslimin"?>" />
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Account No.:</td>
                        <td><input type="text" name="accno" readonly class="input_field input_field--registration" style="margin-left: 0.2rem;border:none;" value="<?php echo "34259337732"?>" />
                        
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="input_label input_label--registration">Bank Name:</td>
                        <td><input type="text" name="bank" class="input_field input_field--registration" readonly style="margin-left: 0.2rem;border:none;" value="State Bank Of India" />
                        
                        </td>
                    </tr>
<tr>
                        <td class="input_label input_label--registration">IFSC:</td>
                        <td><input type="text" name="bank" class="input_field input_field--registration" readonly style="margin-left: 0.2rem;border:none;" value="SBIN0014994" />
                        
                        </td>
                    </tr>
<tr>
                        <td class="input_label input_label--registration">Bank Type:</td>
                        <td><input type="text" name="bank" class="input_field input_field--registration" readonly style="margin-left: 0.2rem;border:none;" value="Savings" />
                        
                        </td>
                    </tr>

                   
                </tbody>
            </table>
            </form>

            </div>
    <!--paytm qr code-->
    
<!--    <div class="square2">
            <h3 style="color: black;">PayTM Scan & Pay:</h3>
            <form action="#" method="POST">
                <table border="0" cellpadding="2">
                <tbody>
                    
                    <tr>
                        <td><img src="../../images/paytm.jpg" alt="scan&pay" style="margin-left: 1rem;" width="275" height="300">
                        
                        </td>
                    </tr>                    
                </tbody>
            </table>
            </form>

            </div>-->
            
</div>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JZQCHUNG59X3E">
<table>
<tr><td><input type="hidden" name="on0" value="Choose your amount">Choose your amount</td></tr><tr><td><select name="os0">
	<option value="Silver Package">Silver Package $5.00 USD</option>
	<option value="Gold Package">Gold Package $12.00 USD</option>
	<option value="Sub diamond Package">Sub diamond Package $21.00 USD</option>
	<option value="Diamond Package">Diamond Package $50.00 USD</option>
	<option value="Platinum Package">Platinum Package $99.00 USD</option>
	<option value="Advertise for 1 day">Advertise for 1 day $0.50 USD</option>
	<option value="Advertise for 5 days">Advertise for 5 days $1.50 USD</option>
	<option value="Advertise for 7 days">Advertise for 7 days $2.00 USD</option>
	<option value="Advertise for 12 days">Advertise for 12 days $3.50 USD</option>
	<option value="Advertise for 1 month">Advertise for 1 month $7.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

<div class="square" style="margin-top: 1px;">
    <h4 style="color:red;">Only pay to us on this bank details or paypal gateway and upload your transaction receipt mentioned above.
 </h4>
    <h3 style="color:#000; font-size: 12px;">
In case, you have any issue or you need other payment option then, contact us on whatsapp: +91 7096702667
</h3>
</div>


<!--        <div id="content" class="login-form">
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
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
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
      

            
        </div>-->
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
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 0px;
    text-align: center">Your Best Opportunity To Earn With <label style="color:red;">"MAKEASYLIFE"</label></h3>
    
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
<?php
//require_once './secure.inc.php';
//$first_name=$_SESSION['first_name'];
//$username=$_SESSION['username'];
//$query_check_code="select * from users where username='$username'";
//require_once '../db.inc.php';
//$referral_code_check=  mysqli_query($con,$query_check_code);
//
//     
//       while ($row = mysqli_fetch_assoc($referral_code_check)) {
//          $referral_code= $row["referral_code"];
//          $credit=$row["credit"];
//          $withdrawal=$row["total_withdrawal"];
//          $referral_no=$row["referral_count"];
//          $activation_status=$row["activation"];
//          $package=$row["package"];
//          $email=$row['email'];
//       }
   
?>

<?php
//$display=0;
//if(isset($_POST['getdetails'])){
//    $method=$_POST['method'];
//    $purpose=$_POST['purpose'];
//    $amount=$_POST['amount'];
//    $display=1;
//}
?>
<!--<!DOCTYPE HTML>
<html>
    <head>
        <title>
            LOGIN FORM
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
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
    min-height: 1000px;
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
    <a href="bankdetails.php">Bank Details</a>

  <a href="wallet.php">Wallet</a>
  <a href="withdrawal_history.php">Withdrawal</a>
  <a href="referral_list.php">Your Referrals</a>
  <a href="create_campaign.php">Advertisement Campaign</a>
  <a href="payment.php">Payment Proofs</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>

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
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
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
    
        <br/><br/>
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
            <ul>  
                <li><a href="terms_conditions.php">Terms & conditions </a><br/></li>                
                <li><a href="howtowork.php">How To Work? </a><br/></li>
                <li><a href="loginuser.php">Login </a><br/></li>
                <li><a href="register.php">Register </a><br/></li>
                <li><a href="privacy.php">Privacy </a><br/></li>
                <li><a href="contact.php">Contact Us </a><br/></li>
                <li><a href="opportunities.php">Business opportunities</a></li>
            </ul>
        </div>
        <br/>
        <br/>
    </div>
  

    </body>
</html>-->