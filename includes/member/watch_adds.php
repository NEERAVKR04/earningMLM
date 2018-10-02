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
if(isset($_POST['del'])){
        $username=$_SESSION['username'];
        echo "$username";
    }
    ?>
<?php
$status_check=0;
if(isset($_POST['submit'])){
 require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
echo "$username";
$query_update1="update users set ad_1='YES' where username='$username'";
include_once '../db.inc.php';
mysqli_query($con,$query_update1);

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
    min-height: 1000px;
    
    float: left;
    margin-left: 0px;
    background-color: #eee;
   
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
        max-height: 550px;
        overflow-y: auto;
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
<div id='rightdiv' class="vertical-content" style="overflow-y: scroll">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
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
</style>
<script>
var right=document.getElementById('rightdiv').style.height;
var left=document.getElementById('leftdiv').style.height;
if(right>left){
    document.getElementById('leftdiv').style.height=right;
}
</script>
<?php
$query_link_status="select * from users where username='$username'";
$result_link_status=  mysqli_query($con,$query_link_status);
while ($row1 = mysqli_fetch_array($result_link_status)) {
    $value1=$row1['ad_1'];
    $value2=$row1['ad_2'];
    $value3=$row1['ad_3'];
    $value4=$row1['ad_4'];
    $value5=$row1['ad_5'];
    $value6=$row1['ad_6'];
    $value7=$row1['ad_7'];
    $value8=$row1['ad_8'];
    $value9=$row1['ad_9'];
    $value10=$row1['ad_10'];
    $value11=$row1['ad_11'];
    $value12=$row1['ad_12'];
    $value13=$row1['ad_13'];
    $value14=$row1['ad_14'];
    $value15=$row1['ad_15'];
    $value16=$row1['ad_16'];
    $value17=$row1['ad_17'];
    $value18=$row1['ad_18'];
    $value19=$row1['ad_19'];
    $value20=$row1['ad_20'];
    $value21=$row1['ad_21'];
    $value22=$row1['ad_22'];
    $value23=$row1['ad_23'];
    $value24=$row1['ad_24'];
    $value25=$row1['ad_25'];
    $ads_status_name="View Ads";
    
}
$query_ad_status="select * from users where username='$username'";
$result_status=  mysqli_query($con,$query_ad_status);
while($row_status=  mysqli_fetch_assoc($result_status))
{
    $ad_1=$row_status['ad_1'];
    $ad_2=$row_status['ad_2'];
    $ad_3=$row_status['ad_3'];
    $ad_4=$row_status['ad_4'];
    $ad_5=$row_status['ad_5'];
    $ad_6=$row_status['ad_6'];
    $ad_7=$row_status['ad_7'];
    $ad_8=$row_status['ad_8'];
    $ad_9=$row_status['ad_9'];
    $ad_10=$row_status['ad_10'];
    $ad_11=$row_status['ad_11'];
    $ad_12=$row_status['ad_12'];
    $ad_13=$row_status['ad_13'];
    $ad_14=$row_status['ad_14'];
    $ad_15=$row_status['ad_15'];
    $ad_16=$row_status['ad_16'];
    $ad_17=$row_status['ad_17'];
    $ad_18=$row_status['ad_18'];
    $ad_19=$row_status['ad_19'];
    $ad_20=$row_status['ad_20'];
    $ad_21=$row_status['ad_21'];
    $ad_22=$row_status['ad_22'];
    $ad_23=$row_status['ad_23'];
    $ad_24=$row_status['ad_24'];
    $ad_25=$row_status['ad_25'];
}
echo "<form action='watch_ads.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th>S.NO</th>
<th>ADVERTISEMENT TITLE</th>
<th>LINK</th>
<th>Status</th>
</tr>";
$ads_id_1="1";$ads_id_2="2";$ads_id_3="3";$ads_id_4="4";$ads_id_5="5";$ads_id_6="6";$ads_id_7="7";$ads_id_8="8";$ads_id_9="9";$ads_id_10="10";$ads_id_11="11";$ads_id_12="12";$ads_id_13="13";$ads_id_14="14";$ads_id_15="15";$ads_id_16="16";$ads_id_17="17";$ads_id_18="18";$ads_id_19="19";$ads_id_20="20";$ads_id_21="21";$ads_id_22="22";$ads_id_23="23";$ads_id_24="24";$ads_id_25="25";
$query_ads_1="select * from advertisement where ads_id='$ads_id_1'";
$result_1=  mysqli_query($con,$query_ads_1);
while($row=  mysqli_fetch_array($result_1))
{
    if($value1!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable1(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes1' style='visibility:hidden' href='update_db.php'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
    
}
$query_ads_2="select * from advertisement where ads_id='$ads_id_2'";
$result_2=  mysqli_query($con,$query_ads_2);
while($row=  mysqli_fetch_array($result_2))
{
if($value2!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable2(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes2' style='visibility:hidden' href='update_db2.php'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_3="select * from advertisement where ads_id='$ads_id_3'";
$result_3=  mysqli_query($con,$query_ads_3);
while($row=  mysqli_fetch_array($result_3))
{
if($value3!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable3(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes3' style='visibility:hidden' href='update_db3.php'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}$query_ads_4="select * from advertisement where ads_id='$ads_id_4'";
$result_4=  mysqli_query($con,$query_ads_4);
while($row=  mysqli_fetch_array($result_4)){
if($value4!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable4(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes4' style='visibility:hidden' href='update_db4.php'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}$query_ads_5="select * from advertisement where ads_id='$ads_id_5'";
$result_5=  mysqli_query($con,$query_ads_5);
while($row=  mysqli_fetch_array($result_5))
{
if($value5!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable5(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes5' href='update_db5.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_6="select * from advertisement where ads_id='$ads_id_6'";
$result_6=  mysqli_query($con,$query_ads_6);
while($row=  mysqli_fetch_array($result_6))
{
if($value6!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable6(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes6' href='update_db6.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_7="select * from advertisement where ads_id='$ads_id_7'";
$result_7=  mysqli_query($con,$query_ads_7);
while($row=  mysqli_fetch_array($result_7))
{
if($value7!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable7(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes7' href='update_db7.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_8="select * from advertisement where ads_id='$ads_id_8'";
$result_8=  mysqli_query($con,$query_ads_8);
while($row=  mysqli_fetch_array($result_8))
{
if($value8!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable8(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes8' href='update_db8.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_9="select * from advertisement where ads_id='$ads_id_9'";
$result_9=  mysqli_query($con,$query_ads_9);
while($row=  mysqli_fetch_array($result_9))
{
if($value9!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable9(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes9' href='update_db9.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_10="select * from advertisement where ads_id='$ads_id_10'";
$result_10=  mysqli_query($con,$query_ads_10);
while($row=  mysqli_fetch_array($result_10))
{
if($value10!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable10(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes10' href='update_db10.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_11="select * from advertisement where ads_id='$ads_id_11'";
$result_11=  mysqli_query($con,$query_ads_11);
while($row=  mysqli_fetch_array($result_11))
{
if($value11!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable11(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes11' href='update_db11.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_12="select * from advertisement where ads_id='$ads_id_12'";
$result_12=  mysqli_query($con,$query_ads_12);
while($row=  mysqli_fetch_array($result_12))
{
if($value12!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable12(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes12' href='update_db12.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_13="select * from advertisement where ads_id='$ads_id_13'";
$result_13=  mysqli_query($con,$query_ads_13);
while($row=  mysqli_fetch_array($result_13))
{
if($value13!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable13(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes13' href='update_db13.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_14="select * from advertisement where ads_id='$ads_id_14'";
$result_14=  mysqli_query($con,$query_ads_14);
while($row=  mysqli_fetch_array($result_14))
{
if($value14!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable14(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes14' href='update_db14.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_15="select * from advertisement where ads_id='$ads_id_15'";
$result_15=  mysqli_query($con,$query_ads_15);
while($row=  mysqli_fetch_array($result_15))
{
if($value15!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable15(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes15' href='update_db15.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_16="select * from advertisement where ads_id='$ads_id_16'";
$result_16=  mysqli_query($con,$query_ads_16);
while($row=  mysqli_fetch_array($result_16))
{
if($value16!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable16(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes16' href='update_db16.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_17="select * from advertisement where ads_id='$ads_id_17'";
$result_17=  mysqli_query($con,$query_ads_17);
while($row=  mysqli_fetch_array($result_17))
{
if($value17!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable17(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes17' href='update_db17.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_18="select * from advertisement where ads_id='$ads_id_18'";
$result_18=  mysqli_query($con,$query_ads_18);
while($row=  mysqli_fetch_array($result_18))
{
if($value18!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable18(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes18' href='update_db18.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_19="select * from advertisement where ads_id='$ads_id_19'";
$result_19=  mysqli_query($con,$query_ads_19);
while($row=  mysqli_fetch_array($result_19))
{
if($value9!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable19(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes19' href='update_db19.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_20="select * from advertisement where ads_id='$ads_id_20'";
$result_20=  mysqli_query($con,$query_ads_20);
while($row=  mysqli_fetch_array($result_20))
{
if($value20!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable20(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes20' href='update_db20.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_21="select * from advertisement where ads_id='$ads_id_21'";
$result_21=  mysqli_query($con,$query_ads_21);
while($row=  mysqli_fetch_array($result_21))
{
if($value21!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable21(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes21' href='update_db21.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_22="select * from advertisement where ads_id='$ads_id_22'";
$result_22=  mysqli_query($con,$query_ads_22);
while($row=  mysqli_fetch_array($result_22))
{
if($value22!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable22(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes22' href='update_db22.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_23="select * from advertisement where ads_id='$ads_id_23'";
$result_23=  mysqli_query($con,$query_ads_23);
while($row=  mysqli_fetch_array($result_23))
{
if($value23!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable23(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes23' href='update_db23.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_24="select * from advertisement where ads_id='$ads_id_24'";
$result_24=  mysqli_query($con,$query_ads_24);
while($row=  mysqli_fetch_array($result_24))
{
if($value24!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable24(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes24' href='update_db24.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
$query_ads_25="select * from advertisement where ads_id='$ads_id_25'";
$result_25=  mysqli_query($con,$query_ads_25);
while($row=  mysqli_fetch_array($result_25))
{
if($value25!='YES')
    {
echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."<a href=\"".$row['ads_link']."\" onclick='clickAndDisable25(this)' target='_BLANK'>"."View Ads";
    echo "<td>"."<a id='changes25' href='update_db25.php' style='visibility:hidden'>"."Confirm"."</a>"." - Click on view ads to get reward"."</td>";
    
    }
 else {
        echo "<tr>";
echo "<td>" . $row['ads_id'] . "</td>";
echo "<td>" . $row['ads_name'] . "</td>";

    echo "<td>"."Completed"."</td>";
    echo "<td>"."Reward Credited";

    }
}
//function update1()
//{
//$username=$_SESSION['username'];
//echo "$username";
//$query_update1="update users set ad_1='YES' where username='$username'";
//include_once '../db.inc.php';
//mysqli_query($query_update1);
//}
//function update2()
//{
//$username=$_SESSION['username'];
//echo "$username";
//$query_update2="update users set ad_2='YES' where username='$username'";
//include_once '../db.inc.php';
//mysqli_query($query_update2);
//}

//$query_fetch_ads="select * from advertisement";
//$result=mysqli_query($query_fetch_ads);
//echo "<table id='customers'>
//<tr>
//<th>S.NO</th>
//<th>ADVERTISEMENT TITLE</th>
//<th>LINK</th>
//</tr>";
//while($row = mysqli_fetch_array($result))
//{
//echo "<tr>";
//echo "<td>" . $row['ads_id'] . "</td>";
//echo "<td>" . $row['ads_name'] . "</td>";
//if($value1=="NO")
//    {
//    echo 'if()'. "<td>"."<a href=\"".$row["ads_link"]."\" target='_BLANK'>"."$ads_status_name";
//    $query_update="update users set ad_1='YES' where username='$username'";
//    mysqli_query($query_update);
//    
//    }
// else {
//      echo "<td>"."";    
//    }
//
////$ads_link=$row['ads_link'];
////$ads_status_name="View Ads";
/////*function check_link($ads_link,$statusCode=303)
////{
////    
////    header('Location:'.$ads_link,true,$statusCode);
////    die();
////    
////}*/
//////echo "<td>"."<button>" . $row['ads_link'] ."</button>"."</td>";
////
////echo "<td>"."<a href=\"".$row["ads_link"]."\" onclick='clickAndDisable($ads_link)' target='_BLANK' name='ads_status'>" . "$ads_status_name" ."</a>"."</td>";
////echo "</tr>";
//}
echo "</table>";
echo "</form>";
?>
<script type="text/javascript">   
function clickAndDisable1(link) {
     // disable subsequent clicks
     document.getElementById("changes1").style.visibility="visible";
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   
   <script>
   function clickAndDisable2(link) {
     // disable subsequent clicks
     document.getElementById("changes2").style.visibility="visible";
     link.onclick = function(event) {
        event.preventDefault();

     }
   }   
</script>
<script type="text/javascript">   
function clickAndDisable3(link) {
     // disable subsequent clicks
     document.getElementById("changes3").style.visibility="visible";
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable4(link) {
     // disable subsequent clicks
     document.getElementById("changes4").style.visibility="visible";
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable5(link) {
     // disable subsequent clicks
     document.getElementById("changes5").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable6(link) {
     // disable subsequent clicks
     document.getElementById("changes6").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable7(link) {
     // disable subsequent clicks
     document.getElementById("changes7").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable8(link) {
     // disable subsequent clicks
     document.getElementById("changes8").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable9(link) {
     // disable subsequent clicks
     document.getElementById("changes9").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable10(link) {
     // disable subsequent clicks
     document.getElementById("changes10").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable11(link) {
     // disable subsequent clicks
     document.getElementById("changes11").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable12(link) {
     // disable subsequent clicks
     document.getElementById("changes12").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable13(link) {
     // disable subsequent clicks
     document.getElementById("changes13").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable14(link) {
     // disable subsequent clicks
     document.getElementById("changes14").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable15(link) {
     // disable subsequent clicks
     document.getElementById("changes15").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable16(link) {
     // disable subsequent clicks
     document.getElementById("changes16").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable17(link) {
     // disable subsequent clicks
     document.getElementById("changes17").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable18(link) {
     // disable subsequent clicks
     document.getElementById("changes18").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable19(link) {
     // disable subsequent clicks
     document.getElementById("changes19").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable20(link) {
     // disable subsequent clicks
     document.getElementById("changes20").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable21(link) {
     // disable subsequent clicks
     document.getElementById("changes21").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable22(link) {
     // disable subsequent clicks
     document.getElementById("changes22").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable23(link) {
     // disable subsequent clicks
     document.getElementById("changes23").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable24(link) {
     // disable subsequent clicks
     document.getElementById("changes24").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script type="text/javascript">   
function clickAndDisable25(link) {
     // disable subsequent clicks
     document.getElementById("changes25").style.visibility="visible";
     
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <style>
   </style>
   
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
