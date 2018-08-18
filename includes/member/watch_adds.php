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
mysql_query($query_update1);

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
  <a href="#">Watch Adds</a>
  <a href="#">Profile</a>
  <a href="#">Wallet</a>
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
    .square{
        height: 200px;
        width: 200px;
        border: 3px solid;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 5%;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        
        .table-style{
            padding: 1px 1px 1px 1px;
        }
        .btn-ads{
            border-radius: 10px;
        }
    }
</style>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 79.75%;
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
$query_link_status="select * from users where username='$username'";
$result_link_status=  mysql_query($query_link_status);
while ($row1 = mysql_fetch_array($result_link_status)) {
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
$result_status=  mysql_query($query_ad_status);
while($row_status=  mysql_fetch_assoc($result_status))
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
$result_1=  mysql_query($query_ads_1);
while($row=  mysql_fetch_array($result_1))
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
$result_2=  mysql_query($query_ads_2);
while($row=  mysql_fetch_array($result_2))
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
$result_3=  mysql_query($query_ads_3);
while($row=  mysql_fetch_array($result_3))
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
$result_4=  mysql_query($query_ads_4);
while($row=  mysql_fetch_array($result_4))
{
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
$result_5=  mysql_query($query_ads_5);
while($row=  mysql_fetch_array($result_5))
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
//function update1()
//{
//$username=$_SESSION['username'];
//echo "$username";
//$query_update1="update users set ad_1='YES' where username='$username'";
//include_once '../db.inc.php';
//mysql_query($query_update1);
//}
//function update2()
//{
//$username=$_SESSION['username'];
//echo "$username";
//$query_update2="update users set ad_2='YES' where username='$username'";
//include_once '../db.inc.php';
//mysql_query($query_update2);
//}

//$query_fetch_ads="select * from advertisement";
//$result=mysql_query($query_fetch_ads);
//echo "<table id='customers'>
//<tr>
//<th>S.NO</th>
//<th>ADVERTISEMENT TITLE</th>
//<th>LINK</th>
//</tr>";
//while($row = mysql_fetch_array($result))
//{
//echo "<tr>";
//echo "<td>" . $row['ads_id'] . "</td>";
//echo "<td>" . $row['ads_name'] . "</td>";
//if($value1=="NO")
//    {
//    echo 'if()'. "<td>"."<a href=\"".$row["ads_link"]."\" target='_BLANK'>"."$ads_status_name";
//    $query_update="update users set ad_1='YES' where username='$username'";
//    mysql_query($query_update);
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
        
//        jQuery.ajax({
//            type: "POST",
//    url: 'udate_db2.php',
//    dataType: 'json',
//    data: {functionname: 'add', arguments: [1, 2]},
//
//    success: function (obj, textstatus) {
//                  if( !('error' in obj) ) {
//                      yourVariable = obj.result;
//                  }
//                  else {
//                      console.log(obj.error);
//                  }
//            }
//        });
                
      
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
   <style>
   </style>
   
</div> 
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
