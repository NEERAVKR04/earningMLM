<?php
$ad_title='';
$ad_link='';
if(empty($ad_title)){
        
        $errors['ad_title']="First Name required!!";
    }
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$check_insert=0;
if(isset($_POST['submit'])){
    $ad_id=1;
    $query_check_ad_id="select * from advertisement ORDER BY ads_id DESC LIMIT 1";
    require_once '../db.inc.php';
    $result=  mysql_query($query_check_ad_id);
    while($row_id=  mysql_fetch_array($result))
    {
        $ad_id=$row_id['ads_id'];
        
    }
$ads_title=$_POST['ads_title'];
$ads_link=$_POST['ads_link'];
//$str_id='0123456789';
//$str_id=  str_shuffle($str_id);
$ad_id=  $ad_id+1;
$query_insert_ads="insert into advertisement values('$ad_id','$ads_title','$ads_link')";
require_once '../db.inc.php';
if($ads_title!='' && $ads_link!='' && $ad_id!=''){
mysql_query($query_insert_ads);
$check_insert=1;
}
else
{
    $check_insert=2;
}

}
/*$referral_code_check=  mysql_query($query_check_code);
if(mysql_query($result_rfr)>=0)
   {
     
       while ($row = mysql_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
       }
   }*/
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
<div class="vertical-menu">
    <a href="index.php" class="active">Home</a>
  <a href="#">Approve Articles</a>
  <a href="activate_users.php">Activate Id</a>
  <a href="add_ads.php">Add Advertisement</a>
  <a href="view_users.php">Users</a>
  <a href="#">Profile</a>
  <a href="#">Add Campaign</a>
  <a href="#">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="#">How To work?</a>
  <a href="#" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
<style>
    .vertical-content{
    width: 79.6%;
    float: left;
    min-height: 550px;
    margin-left: 0px;
    }
</style>
<div class="vertical-content">
    <style>
  .login-form {
  color: #333;
  border-radius: 5px;
  margin: 0 auto;
  width: 50rem;
  text-align: center;
  margin-top: 1rem;
  padding: 2rem;
  float: left;
  margin-left: 0px;
}

.login_details {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
}

.heading-primary {
  font-size: 2rem;
  font-weight: 300;
  margin-left: -25rem;
}

.input_field {
  width: 20rem;
  padding: 1rem 1rem;
  margin: .5rem 0rem;
  border-radius: 20px;
  border: none;
  color: #333;
  font-size: 1rem;
  margin-left: -17rem;
  background-color: #faf2cc;
  max-height: 15px;
}

.input_label {
  font-size: 1.6rem;
  margin-right: 1rem;
  width: 15rem;
  margin-left: -3rem;
}

.btn_action {
  display: flex;
  grid-column: 1/3;
}

.btn_special {
  color: #fff;
  font-size: 1.6rem;
  padding: .3rem .5rem;
  margin-left: 11rem;
  margin-top: 2rem;
  display: flex;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 10rem;
  outline: none;
}
  .btn_special:hover {
    -webkit-filter: brightness(1.2);
    transform: translateY(-2px);
}
    </style>
<div class="login-form">
            <h2 class="heading-primary">
                Add Advertisement Links
            </h2>
    <form action="add_ads.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Ads Title:</div>
                    <input type="text" name="ads_title" class="input_field" value="<?php echo "$email"?>" />

                    <div class="input_label">Ads Link:</div>
                    <input type="text" name="ads_link" class="input_field" value="" />

                    <div class="btn_action">
                        <input type="submit" name="submit" value="Submit" class="btn_special" style="background-color: steelblue;" />
                        </div>
                    <?php if($check_insert==1){ ?>
                    <h3>Advertisement Added Successfully!!</h3>
                    <?php } ?>
                    <?php if($check_insert==2){ ?>
                    <h3>Something wents wrong!!</h3>
                    <?php } ?>

                                      
                </div>
                <!-- <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="login_label">Email:</td>
                        <td><input type="text" name="email" class="login_input" value="<?php echo "$email"?>" /></td>
                    </tr>
                    <tr>
                        <td class="login_label">Password:</td>
                        <td><input type="password" name="password" class="login_input" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Login" /></td>
                        
                    </tr>
                </tbody>
            </table> -->
            </form>
            
        </div>
</div>

    
  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
