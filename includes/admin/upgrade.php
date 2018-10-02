<?php
require_once './secure.inc.php';
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
          
       }
?>
<?php
$success=0;
$error=array();
if(isset($_POST['upgrade'])){
    $user_email=$_POST['email'];
    $package=$_POST['package'];
    if(empty($user_email)){
        $error['email_error']="Error!! Enter email of user to upgrade!!";
    }
    if($package=='5$'){
        $package_name='Silver';
    }
    if($package=='12$'){
        $package_name='Gold';
    }
    if($package=='21$'){
        $package_name='Sub Diamond';
    }
    if($package=='50$'){
        $package_name='Diamond';
    }
    if($package=='99$'){
        $package_name='Platinum';
    }
    if(count($error)==0){
$query_update_act="update users set package='$package',package_name='$package_name',activation='Y',payment_approval='approved' where email='$user_email'";
require_once '../db.inc.php';
mysqli_query($con,$query_update_act);

//1st level
$query_referee1="select * from users where email='$user_email'";
require_once '../db.inc.php';
$result_referee1=  mysqli_query($con,$query_referee1);
while($row1=  mysqli_fetch_array($result_referee1))
{
    $referee_name=$row1['referee_name'];
    $refer_code=$row1['refer_code'];
    $package=$row1['package'];
    $referee1_email=$row1['email'];
    if($refer_code!=''){
    if($package=='5$'){
        $query_select_credit="select * from users where referral_code='$refer_code'";
        require_once '../db.inc.php';
        $result_credit=  mysqli_query($con,$query_select_credit);
        while($row_credit_check=  mysqli_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            $credit_balance=$credit_balance+2;
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer_code'";
            mysqli_query($con,$query_credit_update);
        }
    }
    if($package=='12$'){
        $query_select_credit="select * from users where referral_code='$refer_code'";
        require_once '../db.inc.php';
        $result_credit=  mysqli_query($con,$query_select_credit);
        while($row_credit_check=  mysqli_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            $credit_balance=$credit_balance+4.80;
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer_code'";
            mysqli_query($con,$query_credit_update);
        }
    }
    if($package=='21$'){
        $query_select_credit="select * from users where referral_code='$refer_code'";
        require_once '../db.inc.php';
        $result_credit=  mysqli_query($con,$query_select_credit);
        while($row_credit_check=  mysqli_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            $credit_balance=$credit_balance+8.40;
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer_code'";
            mysqli_query($con,$query_credit_update);
        }
    }
    if($package=='50$'){
        $query_select_credit="select * from users where referral_code='$refer_code'";
        require_once '../db.inc.php';
        $result_credit=  mysqli_query($con,$query_select_credit);
        while($row_credit_check=  mysqli_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            $credit_balance=$credit_balance+20;
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer_code'";
            mysqli_query($con,$query_credit_update);
        }
    }
    if($package=='99$'){
        $query_select_credit="select * from users where referral_code='$refer_code'";
        require_once '../db.inc.php';
        $result_credit=  mysqli_query($con,$query_select_credit);
        while($row_credit_check=  mysqli_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            $credit_balance=$credit_balance+39;
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer_code'";
            mysqli_query($con,$query_credit_update);
        }
    }
    }
}
//2nd Level
if($referee2_code!='')
{
$query_referee2="select * from users where referral_code='$referee2_code'";
include_once '../db.inc.php';
$result_referee2=  mysqli_query($con,$query_referee2);
while ($row2 = mysqli_fetch_array($result_referee2)) {
    $referee3_code=$row2['refer_code'];
    $credit2=$row2['credit'];
    if($package=='5$'){
        $credit2=$credit2+0.70;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysqli_query($con,$query_credit_update2);
    }
    if($package=='12$'){
        $credit2=$credit2+2.20;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysqli_query($con,$query_credit_update2);
    }
    if($package=='21$'){
        $credit2=$credit2+4.20;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysqli_query($con,$query_credit_update2);
    }
    if($package=='50$'){
        $credit2=$credit2+10;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysqli_query($con,$query_credit_update2);
    }
    if($package=='99$'){
        $credit2=$credit2+19;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysqli_query($con,$query_credit_update2);
    }
    
    
    
}
}
if($referee3_code!=''){
$query_referee3="select * from users where referral_code='$referee3_code'";
include_once '../db.inc.php';
$result_referee3=  mysqli_query($con,$query_referee3);
while ($row3 = mysqli_fetch_array($result_referee3)) {
    $referee4_code=$row3['refer_code'];
    $credit3=$row3['credit'];
    if($package=='5$'){
        $credit3=$credit3+0.50;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysqli_query($con,$query_credit_update3);
    }
    if($package=='12$'){
        $credit3=$credit3+1;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysqli_query($con,$query_credit_update3);
    }
    if($package=='21$'){
        $credit3=$credit2+2;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysqli_query($con,$query_credit_update3);
    }
    if($package=='50$'){
        $credit3=$credit3+5;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysqli_query($con,$query_credit_update3);
    }
    if($package=='99$'){
        $credit3=$credit3+9;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysqli_query($con,$query_credit_update3);
    }
    
    
    
}
}
if($referee4_code!=''){
$query_referee4="select * from users where referral_code='$referee4_code'";
include_once '../db.inc.php';
$result_referee4=  mysqli_query($con,$query_referee4);
while ($row4 = mysqli_fetch_array($result_referee4)) {
    $referee5_code=$row4['refer_code'];
    $credit4=$row4['credit'];
    if($package=='5$'){
        $credit4=$credit4+0.20;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysqli_query($con,$query_credit_update4);
    }
    if($package=='12$'){
        $credit4=$credit4+0.80;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysqli_query($con,$query_credit_update4);
    }
    if($package=='21$'){
        $credit4=$credit4+1;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysqli_query($con,$query_credit_update4);
    }
    if($package=='50$'){
        $credit4=$credit4+2.50;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysqli_query($con,$query_credit_update4);
    }
    if($package=='99$'){
        $credit4=$credit4+6;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysqli_query($con,$query_credit_update4);
    } 
}
}
//level 5
if($referee5_code!=''){
$query_referee5="select * from users where referral_code='$referee5_code'";
include_once '../db.inc.php';
$result_referee5=  mysqli_query($con,$query_referee5);
while ($row5 = mysqli_fetch_array($result_referee5)) {
    $referee6_code=$row5['refer_code'];
    $credit5=$row5['credit'];
    if($package=='5$'){
        $credit5=$credit5+0.10;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysqli_query($con,$query_credit_update5);
    }
    if($package=='12$'){
        $credit5=$credit5+0.20;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysqli_query($con,$query_credit_update5);
    }
    if($package=='21$'){
        $credit5=$credit5+030;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysqli_query($con,$query_credit_update5);
    }
    if($package=='50$'){
        $credit5=$credit5+0.40;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysqli_query($con,$query_credit_update5);
    }
    if($package=='99$'){
        $credit5=$credit5+1;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysqli_query($con,$query_credit_update5);
    }    
}
}
//level 6
if($referee6_code!=''){
$query_referee6="select * from users where referral_code='$referee6_code'";
include_once '../db.inc.php';
$result_referee6=  mysqli_query($con,$query_referee6);
while ($row6 = mysqli_fetch_array($result_referee6)) {
    $referee7_code=$row6['refer_code'];
    $credit6=$row6['credit'];
    if($package=='5$'){
        $credit6=$credit6+0.10;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysqli_query($con,$query_credit_update6);
    }
    if($package=='12$'){
        $credit6=$credit6+0.20;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysqli_query($con,$query_credit_update6);
    }
    if($package=='21$'){
        $credit6=$credit6+0.30;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysqli_query($con,$query_credit_update6);
    }
    if($package=='50$'){
        $credit6=$credit6+0.40;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysqli_query($con,$query_credit_update6);
    }
    if($package=='99$'){
        $credit6=$credit6+1;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysqli_query($con,$query_credit_update6);
    }   
}
}
//level 7
if($referee7_code!=''){
$query_referee7="select * from users where referral_code='$referee7_code'";
include_once '../db.inc.php';
$result_referee7=  mysqli_query($con,$query_referee7);
while ($row7 = mysqli_fetch_array($result_referee7)) {
    $referee8_code=$row7['refer_code'];
    $credit7=$row7['credit'];
    if($package=='5$'){
        $credit7=$credit7+0.10;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysqli_query($con,$query_credit_update7);
    }
    if($package=='12$'){
        $credit7=$credit7+0.20;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysqli_query($con,$query_credit_update7);
    }
    if($package=='21$'){
        $credit7=$credit7+0.30;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysqli_query($con,$query_credit_update7);
    }
    if($package=='50$'){
        $credit7=$credit7+0.40;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysqli_query($con,$query_credit_update7);
    }
    if($package=='99$'){
        $credit7=$credit7+1;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysqli_query($con,$query_credit_update7);
    }   
}
}
//level 8
if($referee8_code!=''){
$query_referee8="select * from users where referral_code='$referee8_code'";
include_once '../db.inc.php';
$result_referee8=  mysqli_query($con,$query_referee8);
while ($row8 = mysqli_fetch_array($result_referee8)) {
    $referee9_code=$row8['refer_code'];
    $credit8=$row8['credit'];
    if($package=='5$'){
        $credit8=$credit8+0.10;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysqli_query($con,$query_credit_update8);
    }
    if($package=='12$'){
        $credit8=$credit8+0.20;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysqli_query($con,$query_credit_update8);
    }
    if($package=='21$'){
        $credit8=$credit8+0.30;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysqli_query($con,$query_credit_update8);
    }
    if($package=='50$'){
        $credit8=$credit8+0.40;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysqli_query($con,$query_credit_update8);
    }
    if($package=='99$'){
        $credit8=$credit8+1;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysqli_query($con,$query_credit_update8);
    }   
}
}
//level 9
if($referee8_code!=''){
$query_referee9="select * from users where referral_code='$referee9_code'";
include_once '../db.inc.php';
$result_referee9=  mysqli_query($con,$query_referee9);
while ($row9 = mysqli_fetch_array($result_referee9)) {
    $referee10_code=$row9['refer_code'];
    $credit9=$row9['credit'];
    if($package=='5$'){
        $credit9=$credit9+0.10;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysqli_query($con,$query_credit_update9);
    }
    if($package=='12$'){
        $credit9=$credit9+0.20;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysqli_query($con,$query_credit_update9);
    }
    if($package=='21$'){
        $credit9=$credit9+0.30;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysqli_query($con,$query_credit_update9);
    }
    if($package=='50$'){
        $credit9=$credit9+0.40;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysqli_query($con,$query_credit_update9);
    }
    if($package=='99$'){
        $credit9=$credit9+1;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysqli_query($con,$query_credit_update9);
    }   
}
}
//level 10
if($referee10_code!=''){
$query_referee10="select * from users where referral_code='$referee10_code'";
include_once '../db.inc.php';
$result_referee10=  mysqli_query($con,$query_referee10);
while ($row10 = mysqli_fetch_array($result_referee10)) {
    //$referee11_code=$row10['refer_code'];
    $credit10=$row10['credit'];
    if($package=='5$'){
        $credit10=$credit10+0.10;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysqli_query($con,$query_credit_update10);
    }
    if($package=='12$'){
        $credit10=$credit10+0.20;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysqli_query($con,$query_credit_update10);
    }
    if($package=='21$'){
        $credit10=$credit10+0.30;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysqli_query($con,$query_credit_update10);
    }
    if($package=='50$'){
        $credit10=$credit10+0.40;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysqli_query($con,$query_credit_update10);
    }
    if($package=='99$'){
        $credit10=$credit10+1;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysqli_query($con,$query_credit_update10);
    }   
}
}
//header('Location: activate_users.php');
$success=1;

    }
}
//if(isset($_POST['deactivate']))
//{
//$query_update_deact="update users set activation='N' where email='$user_email'";
//require_once '../db.inc.php';
//mysqli_query($con,$query_update_deact);
//header('Location: activate_users.php');
//}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Muslimin</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
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
    <a href="article_approval.php">Approve Articles</a>
    <a href="activate_users.php">Activate Id</a>
  <a href="add_ads.php">Add Advertisement</a>
  <a href="view_users.php">Users</a>
  <a href="#">Profile</a>
  <a href="check_payment.php">Payment Proof Request</a>
  <a href="#">Add Campaign</a>
  <a href="#">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="#">How To work?</a>
  <a href="#" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
<div class="vertical-content" style="overflow-y: scroll;">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    height: auto;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    //text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
.error{color: tomato;margin-left: 1rem;float: left;}
</style>
<form action="upgrade.php" method="post" style="margin-top:2rem;margin-bottom: 1rem;">
    <label style="margin-left: 1rem;color: #000">Enter email to <label style="color:#4773C1"><b>Upgrade User </b></label>:</label>
<input type="text" name="email" placeholder="user email here" style="border-radius: 5px;width: 12rem;font-size: 1rem;color: #333;height:1.5rem;">
<?php if(isset($error['email_error'])){?> <br/><span class="error"><?php echo $error['email_error'] ?></span>
                        <?php } ?>
<br/>
<label style="color:#4773C1;margin-left: 1rem;"><b>Package: </b></label>:
<select name="package">
    <option>5$</option>
    <option>12$</option>
    <option>21$</option>
    <option>50$</option>
    <option>99$</option>
</select>
<p></p>
<div style="display: flex;
  grid-column: 1/3;">

<button type="submit" name="upgrade" style="font-size: 1.6rem;
  padding:0.25rem 1rem;
  margin-left: 1rem;
  display: flex;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 11rem;
  outline: none;
  background-color:#4CAF50;
  color: #FFFFFF">Upgrade</button>
  <?php
  if($success==1){
      echo 'User package updated & bonus credited to all upline!!';
  }
  ?>
  
<!--<button type="submit" name="back" style="color: #fff;
  font-size: 1.6rem;
  margin-left: 1rem;
  padding:0.25rem 1rem;
  display: flex;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 11rem;
  outline: none;
  background-color:red;">Back</button>-->
</div>
</form>
<?php

echo "<table id='customers'>
<tr>
<th>Email</th>
<th>Amount</th>
<th>Purpose</th>
<th>Date</th>
</tr>";
    $query_users="select * from request";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    while($row=  mysqli_fetch_array($result_users))
{
        if($row['purpose']=='Upgrade Plan'){
echo "<tr>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row['purpose'] ." ".$row['last_name']. "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
?>
<p></p>
<p></p>

</div> 

<div id="footer">
   <?php require_once './footer.php'; ?>
    
</div>
</body>
</html>
