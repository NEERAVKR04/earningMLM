<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$useremail=$_SESSION['email'];
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
          $package=$row['package'];
       }
   }
?>
<?php
$status=0;
if(isset($_POST['upload'])){
$username=$_SESSION['username'];
$imagename=$_FILES["payment_proof"]["name"];
$transaction_id=$_POST['tid'];

if($imagename==''){    
    $status=1;
}

else{
    $image_type=array(IMAGETYPE_JPEG,IMAGETYPE_PNG);
    $detected_type=  exif_imagetype($_FILES['payment_proof']['tmp_name']);
    $error=!in_array($detected_type, $image_type);
    if(!in_array($detected_type, $image_type)){
        
        $status=2;
    }
 else {
    $imagetmp=  addslashes(file_get_contents($_FILES["payment_proof"]["tmp_name"]));
    $insert_image="update users set payment_proof='$imagetmp',image_name='$imagename',tid='$transaction_id' where username='$username'";
    require_once '../db.inc.php';
    mysql_query($insert_image);
    $useremail=$_POST['useremail'];
    $purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    $status=3;
    //check request table
    $query_st="select * from request where email='$useremail'";
    require_once '../db.inc.php';
    $result_req=  mysql_query($query_st);
    while($row_req=  mysql_fetch_array($result_req)){
        $status_msg=$row_req['status'];
    }
      if($purpose=='Upgrade Plan' && $status_msg!='pending'){
          date_default_timezone_set('Asia/Kolkata');
          $date=  date('Y-m-d H:i:s');
            $query_st="insert into request values('$useremail','$purpose','$amount','pending','$date')";
            require_once '../db.inc.php';
            mysql_query($query_st);
      }
      else{
          $status=4;
      }
      
    }
    
}
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Payment/Upgrade Interface</title>
 
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
                How you want to pay us?
            </h3>
    <form action="payment.php" method="POST" enctype="multipart/form-data">
                <div class="login_details">
                    <div class="login_details">
                    <div class="input_label">Email:</div>
                    <input readonly type="text" name="useremail" class="input_field" value="<?php echo "$useremail"?>" />
                    <div class="input_label">Transaction Id:</div>
                    <input type="text" name="tid" class="input_field" value="<?php echo "$transaction_id"?>" />

                    
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

                    
<!--                    <div class="btn_action">
                        <input type="submit" name="getdetails" value="Get Details" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>-->

                </div>
                
         <br/>
        <hr/>
        <br/>
    <center> <label style="font-size: large;color: #000;">Upload Proof:</label>
    
    <input type="file" name="payment_proof" id="payment_proof" style=" width: 50%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4773C1;
    color: white;
    text-align: center;border-radius: 3rem;" value="Upload">
    <br/>
        <input type="submit" name="upload" value="Upload Proof" style=" width: 50%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 3rem;"></center>  
               
</div>
            </form>
   <?php if($status==1){?>
           <?php "<h2>"."Error Try Again!!"."</h2>"?>
           <?php } ?>
    
           <?php if($status==2){?>
           <?php echo "<h2 class='error'>"."Invalid file uploaded, please upload jpeg/png images only"."</h2>";?>
           <?php } ?>
    <?php if($status==3){?>
           <?php echo "<h2>"."Image/Payment proof uploaded successfully!!"."</h2>";?>
           <?php } ?>
    <?php if($status==4){?>
           <?php echo "<h2>"."You have already requested previously!! Wait 24-36 hrs. Then request for new issue!1"."</h2>";?>
           <?php } ?>
</div>



    
  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
