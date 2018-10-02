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
if(isset($_POST['hide'])){
                $tid=$_POST['tid'];
                $email_user=$_POST['email_user'];
                $query_hide="update users set payment_approval='HIDE' where tid='$tid'";
                require_once '../db.inc.php';
                if($tid!=''){
                mysqli_query($con,$query_hide);
                }
                
                    
                }
            ?>
<?php
if(isset($_POST['unhide'])){
                $query_unhide="update users set payment_approval='' where payment_approval='HIDE'";
                require_once '../db.inc.php';
                mysqli_query($con,$query_unhide);
                
                
                    
                }
            ?>
<?php
//$query_article_details="select * from article";
//    require_once '../db.inc.php';
//    $result=  mysqli_query($con,$query_article_details);
//            $status=1;
//        while ($row_article = mysqli_fetch_assoc($result)) {
//            if($row_article['article_activation']!='NO')
//            {
//                $status=2;
//            }
//        }
//?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
    min-height: 900px;
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
        min-height: auto;
        
        
    }
}
</style>
<div class="vertical-menu">
  <a href="#" class="active">Home</a>
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
<!--    <style>
        .li-article{
            list-style: none;
            float: left;
            list-style-type: none;
            
        }
    </style>-->
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
echo "<form action='check_payment.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th>Check Payments/Requests</th>
</tr>";
echo "<tr>"."<th style='background:#eee'>"."<input type='submit' name='activation' value='Activation' class='btn_special' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 0.3rem;
  background:blue;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."<input type='submit' name='upgrade' value='Upgrade' class='btn_special' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 0.3rem;
  background:tomato;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."<input type='submit' name='campaign' value='Campaign' class='btn_special' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 0.3rem;
  background:blue;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."</tr>";
                
                if(isset($_POST['activation'])){
                $query_inf="select * from request where purpose='Activate Id' and status='pending' ORDER BY date ASC";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                $no=0;
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    
                    $useremail=$row1['email'];
                    $status=$row1['status'];
                    $end_date=$row1['end_date'];
                    $query_proof="select * from users where email='$useremail'";
                    require_once '../db.inc.php';
                    $proof=  mysqli_query($con, $query_proof);
                    while ($row4 = mysqli_fetch_array($proof)) {
                        $imagenames=$row4['image_name'];
                        $imageproof=$row4['payment_proof'];
                    }
                    echo "<tr>"."<td>"."<label style='color:blue;'>"."<input type='text' name='email_users' value='$useremail' readonly style='background:none;border:none;width:auto;'>"."</label>"." has uploaded payment proof for activation of Id. ".'<a style="color: #fff;font-size: .8rem;padding: .2rem 1rem;border: none;left:2rem;
                                    margin-bottom:1rem;margin-left:0.2rem;border-radius: 100px;align-items: center;justify-content: center;cursor: pointer;transition: 200ms ease-in;width: 7rem;outline: none;background-color:steelblue;" download href="data:image/jpeg;base64,'.base64_encode( $imageproof ).'"/>'."Download Proof"."</a>"."</td>"."</tr>";
                    
                }
                }
                
                
                if(isset($_POST['upgrade'])){
                $query_upg="select * from request where purpose='Upgrade Plan' and status='pending' ORDER BY date ASC";
                require_once '../db.inc.php';
                $result_upg=  mysqli_query($con,$query_upg);
                
                
               
                while ($row1 = mysqli_fetch_array($result_upg)) {
                    
                    $useremail=$row1['email'];
                    $status=$row1['status'];
                    $end_date=$row1['end_date'];
                    $query_proof="select * from users where email='$useremail'";
                    require_once '../db.inc.php';
                    $proof=  mysqli_query($con, $query_proof);
                    while ($row4 = mysqli_fetch_array($proof)) {
                        $imagenames=$row4['image_name'];
                        $imageproof=$row4['payment_proof'];
                    }
                    echo "<tr>"."<td>"."<label style='color:blue;'>"."<input type='text' name='email_users' value='$useremail' readonly style='background:none;border:none;width:auto;'>"."</label>"." has uploaded payment proof for Upgrade. ".'<a style="color: #fff;font-size: .8rem;padding: .2rem 1rem;border: none;left:2rem;
                                    margin-bottom:1rem;margin-left:0.2rem;border-radius: 100px;align-items: center;justify-content: center;cursor: pointer;transition: 200ms ease-in;width: 7rem;outline: none;background-color:steelblue;" download href="data:image/jpeg;base64,'.base64_encode( $imageproof ).'"/>'."Download Proof"."</a>"."</td>"."</tr>";
                    
                }
                }
                if(isset($_POST['campaign'])){
                $query_upg="select * from request where purpose='Advertisement Campaign' and status='pending' ORDER BY date ASC";
                require_once '../db.inc.php';
                $result_upg=  mysqli_query($con,$query_upg);
                
                
               
                while ($row1 = mysqli_fetch_array($result_upg)) {
                    
                    $useremail=$row1['email'];
                    $status=$row1['status'];
                    $end_date=$row1['end_date'];
                    $query_proof="select * from users where email='$useremail'";
                    require_once '../db.inc.php';
                    $proof=  mysqli_query($con, $query_proof);
                    while ($row4 = mysqli_fetch_array($proof)) {
                        $imagenames=$row4['image_name'];
                        $imageproof=$row4['payment_proof'];
                    }
                    echo "<tr>"."<td>"."<label style='color:blue;'>"."<input type='text' name='email_users' value='$useremail' readonly style='background:none;border:none;width:auto;'>"."</label>"." has uploaded payment proof for Upgrade. ".'<a style="color: #fff;font-size: .8rem;padding: .2rem 1rem;border: none;left:2rem;
                                    margin-bottom:1rem;margin-left:0.2rem;border-radius: 100px;align-items: center;justify-content: center;cursor: pointer;transition: 200ms ease-in;width: 7rem;outline: none;background-color:steelblue;" download href="data:image/jpeg;base64,'.base64_encode( $imageproof ).'"/>'."Download Proof"."</a>"."</td>"."</tr>";
                    
                }
                }
                
echo "</table>";
?>

<!--    <form action="check_payment.php" method="POST">
    <label><button name="unhide" style="margin-top: 1rem;margin-left: 2rem;border-radius: 2rem;">See Hidden Requests</button></label>
    </form>-->
    <!--"<font style='margin-left: 1rem'>"-->
    
    <?php
//    $query_payment_status="select * from users";
//    require_once '../db.inc.php';
//    $result=  mysqli_query($con,$query_payment_status);
//    //Activation Check
//                $query_check_activation="select * from users where tid='$tid'";
//                require_once '../db.inc.php';
//                $res_status=mysqli_query($con,$query_check_activation);
//                while ($row_status = mysqli_fetch_assoc($res_status)) {
//                    $activation_status=$row_status['activation'];
//                    $payment_approval=$row_status['payment_approval'];
//                    
//                    //$credit=$credit+0.05;
//                    
//                    //$query_credit="update users set credit='$credit' where email='$email_user'";
//                    //require_once '../db.inc.php';
//                    //mysqli_query($con,$query_credit);
//                }
//    
//            $count=1;
//            
//        while ($row_payment = mysqli_fetch_assoc($result)) {
//            if($row_payment['payment_approval']!='YES')
//            {
//                if(($display<6)){
//            $payment_status=$row_payment['payment_approval'];
//            $tid=$row_payment['tid'];
//            $payment_proof=$row_payment[payment_proof];
//            $image_name=$row_payment['image_name'];
//            $email_user=$row_payment['email'];
//            $activation=$row_payment['activation'];
//            //Check Purpose
//            $query_purpose="select * from request where email='$email_user'";
//            require_once '../db.inc.php';
//            $result_purpose=  mysqli_query($con, $query_purpose);
//            while ($row1 = mysqli_fetch_array($result_purpose)) {
//                $purpose=$row1['purpose'];
//            }
//          if(($payment_status!='HIDE' && $activation!='Y') || ($payment_status!='HIDE' && $purpose=='Upgrade')){
//            echo "<form method='POST' action='check_payment.php'>";
//            echo "<ul type='none' style='margin-left:0.5rem;float:left;border:1.5px solid black;border-radius:2rem;'>";
//            echo "$count".".";
//            echo "<br/>";
//            echo "<label style='color:#2196F3'>"."Requested By: "."</label>".$row_payment['first_name'];
//            echo "<br/>";
//            echo "<input readonly type='text' name='email_user' value='$email_user' style='margin-top:0.5rem;;border-radius:10px;border-color: black;font-size:1rem;padding-top:0.2rem;padding-left:0.2rem;padding-bottom:0.2rem;'>";
//            echo "<br/>";
//                        echo "<br/>";
//            echo "<li style='color: white;
//                   padding: 8px;background-color: #4CAF50;overflow:hidden'>"."<input type='text' readonly name='tid' value='$tid' style='background:none;border:none;color:#fff;'>"."Transaction Id: "."</li>";
//            echo "<br/>";
//            echo "<li style='text-align: justify;'>"."Transaction Method: "."<label style='font-color:black;'>".$row_payment['payment_method']."</label>";
//            echo "<br/>";
//            echo "Payment Proof ".'<a style="color: #fff;font-size: .8rem;padding: .2rem 1rem;border: none;left:2rem;
//                                    margin-bottom:1rem;margin-left:0.2rem;border-radius: 100px;align-items: center;justify-content: center;cursor: pointer;transition: 200ms ease-in;width: 7rem;outline: none;background-color:steelblue;" download href="data:image/jpeg;base64,'.base64_encode( $payment_proof ).'"/>'."Download & Check"."</a>";
//            echo"<br/>";echo"<br/>";
//           // echo "<label style='color:black;'>"."File name: "."</label>"."$image_name";
//            echo "<br/>";
//            echo "<input type='submit' name='hide' value='Hide' style='color: #fff;font-size: .8rem;padding: .2rem 1rem;border: none;left:2rem;
//                   font-size:1rem;margin-bottom:1rem;margin-left:0.2rem;border-radius: 100px;align-items: center;justify-content: center;cursor: pointer;transition: 200ms ease-in;width: 7rem;outline: none;background-color:green;'>";
//         if($purpose=='Upgrade'){
//            echo "<label style='color:#000;margin-left:2px;'>"."$purpose";
//         }
//         $count=$count+1;
//            $display=$display+1;
//        
//            echo "</ul>";
//            echo "</form>";
//          }
//            
//                }
//        }
//            }
//    ?>
</div>

<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
