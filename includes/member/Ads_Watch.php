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
if(isset($_POST['watched'])){
                $ads_id=$_POST['id'];
                $email_user=$_POST['email_user'];
                $query_approve="update article set article_activation='YES' where article_id='$article_id'";
                require_once '../db.inc.php';
                mysql_query($query_approve);
                //email
                $query_credit="select * from users where email='$email_user'";
                require_once '../db.inc.php';
                $res_credit=mysql_query($query_credit);
                while ($row_credit = mysql_fetch_assoc($res_credit)) {
                    $credit=$row_credit['credit'];
                    $credit=$credit+0.05;
                    $query_credit="update users set credit='$credit' where email='$email_user'";
                    require_once '../db.inc.php';
                    mysql_query($query_credit);
                }   
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
    
}
echo "<form action='Ads_Watch.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th>S.No</th>
<th>Advertisement Title</th>
<th>Link</th>
</tr>";
$query_ads="select * from advertisement";
require_once '../db.inc.php';
$result_ads=  mysql_query($query_ads);
$ads_count=0;
while($row_ads=  mysql_fetch_assoc($result_ads))
{
    if($value1!='YES')
    {
        $ads_id=$row_ads['ads_id'];
        $ads_title=$row_ads['ads_name'];
        $ads_link=$row_ads['ads_link'];
       // echo "$ads_link";
        echo "<tr>";
        echo "<td>"."<input readonly type='text' name='id' value='$ads_id' style='border:none;'>"."</td>";
        echo "<td>"."<input readonly type='text' name='ads_title' value='$ads_title' style='border:none;'>"."</td>";
        echo "<td>"."<input type='button' name='open_link' onclick='gotolink(this)' value='View'>"."</button>"."</td>";
    }
}
if(isset($_POST['open_link']))
{
   $ads_link=$row_ads['ads_link'];
   echo "$ads_link";
  
}
echo "</table>";
echo "</form>";
?>
<style>
    background-color:#FFFFFF ;
</style>
<script type="text/javascript">   
function clickAndDisable1(link) {
     // disable subsequent clicks
     link.onclick = function(event) {
        event.preventDefault();
        //var loadTo = "#id_of_the_div_or_other_element_to_hold_any_PHP_output";
      
     }
   }   
   </script>
   <script>
   function clickAndDisable2(link) {
     // disable subsequent clicks
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
</div> 
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
