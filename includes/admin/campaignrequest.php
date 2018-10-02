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
if(isset($_POST['approve'])){
    $success=0;
    $campid=$_POST['campid'];
    $duration=$_POST['duration'];
    date_default_timezone_set('Asia/Kolkata');
    $start_date=  date('Y-m-d H:i:s');
    $end_date= date('Y-m-d H:i:s', strtotime("+ $duration"));
    echo "$duration";
    $query_st="update campaign set status='live',start_date='$start_date',end_date='$end_date',info='Your Campaign is live & will expire on $end_date' where camp_id='$campid'";
    require_once '../db.inc.php';
    $up=  mysqli_query($con, $query_st);
    if($up){
        $success=1;
    }
    
}
if(isset($_POST['reject'])){
    $success=0;
    $campid=$_POST['campid'];
    $duration=$_POST['duration'];
    date_default_timezone_set('Asia/Kolkata');
    //$start_date=  date('Y-m-d H:i:s');
    $end_date= date('Y-m-d H:i:s', strtotime("+ $duration"));
    $query_st="update campaign set status='rejected',start_date='$start_date',info='Your Campaign has been rejected due to im-proper data/payment. Contact us for any query!!' where camp_id='$campid'";
    require_once '../db.inc.php';
    $up=  mysqli_query($con, $query_st);
    if($up){
        $success=1;
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
<div class="vertical-menu" >
    <a href="index.php" class="active">Home</a>
  <a href="#">Approve Articles</a>
  <a href="activate_users.php">Activate Id</a>
  <a href="add_ads.php">Add Advertisement</a>
  <a href="#">Users</a>
  <a href="#">Profile</a>
  <a href="#">Payment Proof Request</a>
  <a href="#">Add Campaign</a>
  <a href="#">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="#">How To work?</a>
  <a href="#" class="active-red">LOGOUT</a>
  
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
echo "<form action='campaignrequest.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th>S.No</th>
<th>Email</th>
<th>Camp Id</th>
<th>Req. Date</th>
<th>Duration</th>
<th>Status</th>
<th>Amount</th>
<th>Type</th>
<th>Link</th>
<th>Approve</th>
<th>Reject</th>
</tr>";
    $query_users="select * from campaign where status='pending'";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    $sno=1;
    while($row=  mysqli_fetch_array($result_users))
{
        $camp_id=$row['camp_id'];
        $duration=$row['duration'];
echo "<tr>";
echo "<td>".$sno."</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" ."<input type='text' name='campid' value='$camp_id' readonly style='background:none;border:none;'>"."</td>";
echo "<td>" . $row['start_date'] . "</td>";
echo "<td>" . "<input type='text' name='duration' value='$duration' readonly style='background:none;border:none;'>". "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row['camp_type'] . "</td>";
echo "<td>" . $row['link'] . "</td>";
echo "<td>"."<input type='submit' name='approve' value='Approve'>"."</td>";
echo "<td>"."<input type='submit' name='reject' value='Reject'>"."</td>";


echo "</tr>";
$sno++;
}
echo "</table>";
echo "</form>";
?>
</div>  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
