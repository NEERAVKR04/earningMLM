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
       }
   }
?>
<?php
$user_email=$_POST['email'];
if(isset($_POST['activate']))
{
$query_update_act="update users set activation='Y' where email='$user_email'";
require_once '../db.inc.php';
mysql_query($query_update_act);
header('Location: activate_users.php');
}
if(isset($_POST['deactivate']))
{
$query_update_deact="update users set activation='N' where email='$user_email'";
require_once '../db.inc.php';
mysql_query($query_update_deact);
header('Location: activate_users.php');
}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MuslimIn</title>
 
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
  <a href="#">Activate Id</a>
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
<div class="vertical-content">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 79.74%;
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
</style>
<?php
echo "<table id='customers'>
<tr>
<th>Email</th>
<th>Mobile</th>
<th>Name</th>
<th>Activation</th>
<th>Balance</th>
</tr>";
    $query_users="select * from users";
    require_once '../db.inc.php';
    $result_users=  mysql_query($query_users);
    while($row=  mysql_fetch_array($result_users))
{
echo "<tr>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['mobile'] . "</td>";
echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";
echo "<td>" . $row['activation'] . "</td>";
echo "<td>" . $row['credit'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
<p></p>
<p></p>
<form action="activate_users.php" method="post">
    <label style="margin-left: 1rem;color: #000">Enter email to <label style="color:#4773C1"><b>Activate </b>/<b> Deactivate</b></label>:</label>
<input type="text" name="email" placeholder="" style="border-radius: 5px;width: 12rem;font-size: 1rem;color: #333;height:1.5rem;">
<p></p>
<div style="display: flex;
  grid-column: 1/3;">

<button type="submit" name="activate" style="font-size: 1.6rem;
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
  color: #FFFFFF">Activate</button>
<button type="submit" name="deactivate" style="color: #fff;
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
  background-color:red;">De-Activate</button>
</div>
</form>
</div> 

<div id="footer">
   <?php require_once './footer.php'; ?>
    
</div>
</body>
</html>