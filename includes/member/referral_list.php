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
          $activation_status=$row["activation"];
          $package=$row["package"];
       
   }
       if($activation_status!='Y'){
           header('Location: payment.php');
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
<div class="vertical-content" style="overflow-y: scroll;overflow-x: scroll;">
    
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 14px;
    //text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
#customers tr{
    max-height: 2px;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    
}
</style>
<?php
echo "<table id='customers'>
<tr>
<th>Referral List</th>
</tr>";
echo "</table>";
echo "<form action='referral_list.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th style='background-color: #4773C1;'>Name</th>
<th style='background-color: #4773C1;'>Email</th>
<th style='background-color: #4773C1;'>Mobile</th>
<th style='background-color: #4773C1;'>Package</th>
<th style='background-color: #4773C1;'>Referral Code</th>
<th style='background-color: #4773C1;'>Referral Count</th>
<th style='background-color: #4773C1;'>Referred By</th>


</tr>";
$query_users="select * from users where username='$username' ";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    while($row=  mysqli_fetch_array($result_users)){
        $referral_code=$row['referral_code'];
    }
    $query_referrals="select * from users where refer_code='$referral_code'";
    require_once '../db.inc.php';
    $result_referrals=  mysqli_query($con,$query_referrals);
    if($referral_code!=''){
    while ($row1 = mysqli_fetch_array($result_referrals)) {
        $members_referral_code=$row1['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row1['first_name'] ." ".$row1['last_name']. "</td>";
    echo "<td>".$row1['email'] . "</td>";
    echo "<td>".$row1['mobile'] . "</td>";
     echo "<td>".$row1['package']." -".$row1['package_name'] . "</td>";
    echo "<td>".$row1['referral_code']."</td>";
    echo "<td>".$row1['referral_count']."</td>";
    echo "<td>"."ME"."</td>";
    echo "</tr>";
    //2nd level

$query_2level="select * from users where refer_code='$members_referral_code'";
require_once '../db.inc.php';
$result_2level=  mysqli_query($con,$query_2level);
if($members_referral_code!=''){
while ($row2 = mysqli_fetch_array($result_2level)) {
        $members_referral_code2=$row2['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row2['first_name'] ." ".$row2['last_name']. "</td>";
    echo "<td>".$row2['email'] . "</td>";
    echo "<td>".$row2['mobile'] . "</td>";
    echo "<td>".$row2['package']." -".$row2['package_name'] . "</td>";
    echo "<td>".$row2['referral_code']."</td>";
    echo "<td>".$row2['referral_count']."</td>";
    echo "<td>".$row2['referee_name']." -2nd Level"."</td>";
    echo "</tr>";
}
}
//3rd level
if($members_referral_code2!=''){
$query_3level="select * from users where refer_code='$members_referral_code2'";
require_once '../db.inc.php';
$result_3level=  mysqli_query($con,$query_3level);
while ($row3 = mysqli_fetch_array($result_3level)) {
        $members_referral_code3=$row3['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row3['first_name'] ." ".$row3['last_name']. "</td>";
    echo "<td>".$row3['email'] . "</td>";
    echo "<td>".$row3['mobile'] . "</td>";
    echo "<td>".$row3['package']." -".$row3['package_name'] . "</td>";
    echo "<td>".$row3['referral_code']."</td>";
    echo "<td>".$row3['referral_count']."</td>";
    echo "<td>".$row3['referee_name']." -3rd Level"."</td>";
    echo "</tr>";
}
}
//4th level
if($members_referral_code3!=''){
$query_4level="select * from users where refer_code='$members_referral_code3'";
require_once '../db.inc.php';
$result_4level=  mysqli_query($con,$query_4level);
while ($row4 = mysqli_fetch_array($result_4level)) {
        $members_referral_code4=$row4['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row4['first_name'] ." ".$row4['last_name']. "</td>";
    echo "<td>".$row4['email'] . "</td>";
    echo "<td>".$row4['mobile'] . "</td>";
    echo "<td>".$row4['package']." -".$row4['package_name'] . "</td>";
    echo "<td>".$row4['referral_code']."</td>";
    echo "<td>".$row4['referral_count']."</td>";
    echo "<td>".$row4['referee_name']." -4th Level"."</td>";
    echo "</tr>";
}
}
//5th level
if($members_referral_code4!=''){
$query_5level="select * from users where refer_code='$members_referral_code4'";
require_once '../db.inc.php';
$result_5level=  mysqli_query($con,$query_5level);
while ($row5 = mysqli_fetch_array($result_5level)) {
        $members_referral_code5=$row5['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row5['first_name'] ." ".$row5['last_name']. "</td>";
    echo "<td>".$row5['email'] . "</td>";
    echo "<td>".$row5['mobile'] . "</td>";
    echo "<td>".$row5['package']." -".$row5['package_name'] . "</td>";
    echo "<td>".$row5['referral_code']."</td>";
    echo "<td>".$row5['referral_count']."</td>";
    echo "<td>".$row5['referee_name']." -5th Level"."</td>";
    echo "</tr>";
}
}
//6th level
if($members_referral_code5!=''){
$query_6level="select * from users where refer_code='$members_referral_code5'";
require_once '../db.inc.php';
$result_6level=  mysqli_query($con,$query_6level);
while ($row6 = mysqli_fetch_array($result_6level)) {
        $members_referral_code6=$row6['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row6['first_name'] ." ".$row6['last_name']. "</td>";
    echo "<td>".$row6['email'] . "</td>";
    echo "<td>".$row6['mobile'] . "</td>";
    echo "<td>".$row6['package']." -".$row6['package_name'] . "</td>";
    echo "<td>".$row6['referral_code']."</td>";
    echo "<td>".$row6['referral_count']."</td>";
    echo "<td>".$row6['referee_name']." -6th Level"."</td>";
    echo "</tr>";
}
}
//7th level
if($members_referral_code6!=''){
$query_7level="select * from users where refer_code='$members_referral_code6'";
require_once '../db.inc.php';
$result_7level=  mysqli_query($con,$query_7level);
while ($row7 = mysqli_fetch_array($result_7level)) {
        $members_referral_code7=$row7['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row7['first_name'] ." ".$row7['last_name']. "</td>";
    echo "<td>".$row7['email'] . "</td>";
    echo "<td>".$row7['mobile'] . "</td>";
    echo "<td>".$row7['package']." -".$row7['package_name'] . "</td>";
    echo "<td>".$row7['referral_code']."</td>";
    echo "<td>".$row7['referral_count']."</td>";
    echo "<td>".$row7['referee_name']." -7th Level"."</td>";
    echo "</tr>";
}
}
//8th level
if($members_referral_code7!=''){
$query_8level="select * from users where refer_code='$members_referral_code7'";
require_once '../db.inc.php';
$result_8level=  mysqli_query($con,$query_8level);
while ($row8 = mysqli_fetch_array($result_8level)) {
        $members_referral_code8=$row8['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row8['first_name'] ." ".$row8['last_name']. "</td>";
    echo "<td>".$row8['email'] . "</td>";
    echo "<td>".$row8['mobile'] . "</td>";
    echo "<td>".$row8['package']." -".$row8['package_name'] . "</td>";
    echo "<td>".$row8['referral_code']."</td>";
    echo "<td>".$row8['referral_count']."</td>";
    echo "<td>".$row8['referee_name']." -8th Level"."</td>";
    echo "</tr>";
}
}
//9th level
if($members_referral_code8!=''){
$query_9level="select * from users where refer_code='$members_referral_code8'";
require_once '../db.inc.php';
$result_9level=  mysqli_query($con,$query_9level);
while ($row9 = mysqli_fetch_array($result_9level)) {
        $members_referral_code9=$row9['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row9['first_name'] ." ".$row9['last_name']. "</td>";
    echo "<td>".$row9['email'] . "</td>";
    echo "<td>".$row9['mobile'] . "</td>";
    echo "<td>".$row9['package']." -".$row9['package_name'] . "</td>";
    echo "<td>".$row9['referral_code']."</td>";
    echo "<td>".$row9['referral_count']."</td>";
    echo "<td>".$row9['referee_name']." -9th Level"."</td>";
    echo "</tr>";
}
}
//10th level
if($members_referral_code9!=''){
$query_10level="select * from users where refer_code='$members_referral_code9'";
require_once '../db.inc.php';
$result_10level=  mysqli_query($con,$query_10level);
while ($row10 = mysqli_fetch_array($result_10level)) {
        $members_referral_code10=$row10['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row10['first_name'] ." ".$row10['last_name']. "</td>";
    echo "<td>".$row10['email'] . "</td>";
    echo "<td>".$row10['mobile'] . "</td>";
    echo "<td>".$row10['package']." -".$row10['package_name'] . "</td>";
    echo "<td>".$row10['referral_code']."</td>";
    echo "<td>".$row10['referral_count']."</td>";
    echo "<td>".$row10['referee_name']." -10th Level"."</td>";
    echo "</tr>";
}
}

    
    }
    }
    
echo "</table>";
?>
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
