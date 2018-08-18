<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$mobile=$_SESSION['mobile'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysql_query($query_check_code);
     
       while ($row = mysql_fetch_assoc($referral_code_check)) {
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
   
?>
<?php
if(isset($_POST['save']))
{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
   
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $address=$_POST['address'];
    
    $query_update_profile="update users set first_name='$first_name',last_name='$last_name',country='$country',state='$state',city='$city',address='$address',pincode='$pincode' where username='$username'";
    require_once '../db.inc.php';
    mysql_query($query_update_profile);
    

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
    float: left;
    min-height: 550px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
    height: 770px;
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
  <a href="#" class="active">Home</a>
  <a href="#">Write Article</a>
  <a href="watch_adds.php">Watch Adds</a>
  <a href="#">Profile</a>
  <a href="wallet.php">Wallet</a>
  <a href="#">Withdrawal</a>
  <a href="#">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="#">How To work?</a>
  <a href="#" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
<div class="vertical-content">
    <style>
        #heading{
            margin-left: 3rem;
            color: #000;
        }
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
<h2 id="heading">Edit Profile:</h2>
<form action="profile.php" method="POST">
    <h3>Basic Info:</h3>
    <table id="customers">
        
        <tr>
            <td><label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo "$first_name"; ?>"></td>
            <td><label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo "$last_name"; ?>"></td>
        </tr>
        <tr>
            <td><label>Email:</label>
                <input type="email" style="margin-left: 2.3rem;" disabled name="email" value="<?php echo "$email";?>"></td>
            <td><label>Mobile:</label>
                <input type="number" style="margin-left: 1.7rem;" disabled name="mobile" value="<?php echo "$mobile";?>"></td>

        </tr>
        </table>
            
        <table id="customers">
            <h3>Address Info:</h3>
        <tr>
        
            <td><label>Country:<b style="margin-left: 0.5rem;"><?php echo"$country"?></b></label>
                <select name="country"  style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;">
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;">Select country to update...</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;">India</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #ddd;
    color: black;">USA</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;">Pakistan</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #ddd;
    color: black;">Srilanka</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;">Bangladesh</option>
                </select>
                
                </td>
            </tr>
            <tr>
                <td><label>State:</label><input type="text" name="state" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;" value="<?php echo "$state";?>"></td>

        </tr>
        <tr>
        
            <td><label>City:</label>
                
                <input type="text"  name="city" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;" value="<?php echo "$city";?>"></td>
            </tr>
            <tr>
                <td><label>Address:</label>
                <input type="text" name="address" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;" value="<?php echo "$address";?>"></td>

        </tr>
        <tr>
                <td><label>Pincode:</label><input type="text" name="pincode" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white; "value="<?php echo "$pincode";?>"></td>
        </tr>
        <tr>
<td><center><input type="submit" name="save" style=" width: 15%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4773C1;
    color: white;
    text-align: center" value="Save Details"></center></td>
        </tr>
            </table>
</form>
</div>

<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
