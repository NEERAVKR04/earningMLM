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
       }
   }
?>

<?php
$display=0;
if(isset($_POST['update'])){
    $user_email=$_POST['email'];
    
    $amount=$_POST['amount'];
    $display=1;
    
    if(empty($user_email)){
        $errors['email']="Email required!!";
    }
    if(empty($amount)){
        $errors['amount']="Enter valid amount!!";
    }
    if(count($errors)==0)
        {
        $query_st1="select * from users where email='$user_email'";
    require_once '../db.inc.php';
    $result=  mysql_query($query_st1);
    while($row=  mysql_fetch_array($result)){
        $withdrawal_amount=$row['withdrawal_amount'];
        $credit=$row['credit'];
        
        $withdrawal_amount=$withdrawal_amount+$amount;
        $credit=$credit-$amount;
        //update user wallet
        $query_st2="update users set total_withdrawal='$withdrawal_amount',credit='$credit' where email='$user_email'";
        require_once '../db.inc.php';
        $result_1=  mysql_query($query_st2);
        //update withdrawal history 
        date_default_timezone_set('Asia/Kolkata');
        $date=  date('Y-m-d H:i:s');
        //admin payment proofs
        $error=array();
    $file_name=$_FILES["image_proof"]["name"];
    
    $file_size=$_FILES["image_proof"]["size"];
    $file_tmp=$_FILES["image_proof"]["tmp_name"];
    $file_type=$_FILES["image_proof"]["type"];
    $file_ext=  strtolower(end(explode('.',$_FILES["image_proof"]["name"])));
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext, $extensions)===false){
        $error[]="extension not allowed, please choose a jpeg, jpg or png file";
    }
    if($file_size>2097152){
        $error[]="File size must be upto 2MB Only";
    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp, "payment_proofs/".$file_name);
        
        
    }else{
        print_r($error);
    }
        $query_st_his="insert into withdrawal values('$user_email','$amount','$date','$file_name')";
        require_once '../db.inc.php';
        mysql_query($query_st_his);
        $display=1;
        //admin payment proof
        
        

    }
        
    
        }
        }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            Payment Updation
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
    <hr/>
        <div id="content" class="login-form">
            <h3 class="heading-primary">
                Update Withdrawal !!
            </h3>
            <form action="sendpayment.php" method="POST" enctype="multipart/form-data">
                <div class="login_details">
                    <div class="input_label">User E-mail:</div>
                    <input type="text" name="email" class="input_field input_field--registration" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
              
                    <div class="input_label">Amount:</div>
                    <input type="text" name="amount" class="input_field input_field--registration" value="<?php echo "$amount"?>" />
                        <?php if(isset($errors['amount'])){?> <br/><span class="error"><?php echo $errors['amount'] ?></span>
                        <?php } ?>
                        
                        <div class="input_label">Upload Proof: </div>
                        <input class="input_field input_field--registration" type="file" name="image_proof"  value="Upload" style="border-radius: 10rem;">

                    
                    <div class="btn_action">
                        <input type="submit" name="update" value="Update" class="btn_special" style="background-color: steelblue;" />
                        <!--<a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>-->
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                        
                    </div>

                </div>
                </form>
            <?php if($display==1){ ?>
            <h2>Yipee!! User Wallet Updated. </h2>
            
            
            <!--<h3>An email has been sent on <?php echo "$email" ?> to verify your email id!!<a href="login.php"><b>&nbsp;Login</b></a></h3>-->
            <?php } ?>
        </div>
    
    </body>
</html>