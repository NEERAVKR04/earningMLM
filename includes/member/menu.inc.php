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
        margin-left:60px; 
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
