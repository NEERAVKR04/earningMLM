<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqli_query($con,$query_check_code);

     
       while ($row = mysqli_fetch_assoc($referral_code_check)) {
          $email=$row['email'];
          $first_name=$row['first_name'];
          $last_name=$row['last_name'];
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $activation_status=$row["activation"];
          $package=$row["package"];
          $package_name=$row['package_name'];
          
       }
   
?>
<?php
$query_camp="select * from campaign where email='$email'";
require_once '../db.inc.php';
$res_camp=  mysqli_query($con, $query_camp);
while($row1=  mysqli_fetch_array($res_camp)){
    $status_check=$row1['status'];
   
}
?>
<?php
if(isset($_POST['start'])){
    $success=0;
    $email=$_POST['email'];
    $camp_type=$_POST['camp_type'];
    $duration=$_POST['duration'];
    $camp_name=$_POST['camp_name'];
    $status="pending";
    $info="Currently, we are verifying your info. & payment details. If approved we will publish your campaign. In Case, campaign not approved then we will try to contact you for further details or refund.";
    $link=$_POST['link'];
    $random_no='1234567890';
    $random_no=  str_shuffle($random_no);
    $camp_id=  substr($random_no,1,7);
    
    //start date
    date_default_timezone_set('Asia/Kolkata');
   $start_date=  date('Y-m-d H:i:s');
   // $end_date= date('Y-m-d H:i:s', strtotime("+3 days"));
    $end_date='';
   // echo "$camp_name $camp_type $duration $email";
    $errors=array();
    
    // check null fields
    if(empty($email)){
        $errors['email']="E-mail can't be empty";
    }
    if(empty($camp_name)){
        $errors['camp_name']="Enter some name for campaign";
    }
    if($status_check=='pending'){
        $errors['pending']="You can't request for new campaign while your previous campaign is pending.";
    }
    if(count($errors)==0){
        if($duration=='3 Days'){
          $amount='5$';
        }
        if($duration=='5 Days'){
            $amount='11$';
        }if($duration=='7 Days'){
            $amount='21$';
        }if($duration=='12 Days'){
            $amount='50$';
        }if($duration=='30 Days'){
            $amount='99$';
        }
        $query_camp="insert into campaign values('$camp_id','$email','$first_name','$last_name','$camp_name','$duration','$start_date','$end_date','$status','$info','$amount','$link','$camp_type')";
        require_once '../db.inc.php';
        $suc=mysqli_query($con, $query_camp);
        if($suc){
            $success=1;
            
        }
        }
}
?>
<?php
$query_st="select COUNT(*) as pending from campaign where status='pending' and email='$email'";
$total=0;
require_once '../db.inc.php';
$res=  mysqli_query($con, $query_st);
    $total= mysqli_fetch_assoc($res);
    
//expired
$query_st="select COUNT(*) as expired from campaign where status='expired' and email='$email'";
$total_exp=0;
require_once '../db.inc.php';
$res_exp=  mysqli_query($con, $query_st);
$total_exp= mysqli_fetch_assoc($res_exp);
//live
$query_st="select COUNT(*) as live from campaign where status='live' and email='$email'";
$total_live=0;
require_once '../db.inc.php';
$res_live=  (mysqli_query($con, $query_st));
$total_live= mysqli_fetch_assoc($res_live);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Create Campaign</title>
 
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
            .camp-content{
                min-height: 700px;
                width: 90%;
                margin-left: 5rem;
               //border: 1px solid black;
                margin-top: 2rem;
                margin-bottom: 2rem;
                
                
                
            }
            .square-box{
                margin-top: 2.5rem;
                height: 6.5rem;
                width: 88%;
                border:2px solid blue;
                border-radius:10rem;  
                margin-right: 10rem;
                
            }
            .label-camp{
                margin-left: 3rem;
                padding-top: 2px;
                color: #000;
                font-weight: bolder;
                
            }
            .link_form{
                text-align: center;
                color: red;
                margin-left: 37.5%;
                
            }
            .square_rec{
                margin-top: 2.5rem;
                height: 5rem;
                width: 25%;
                border:2px solid blue;
                border-radius:10rem;  
                display: inline-block;
                float: left;
                margin-left: 5rem;
                text-align: center;
                font-size: 20px;
                color: #4773C1;
                background-image: linear-gradient(to bottom right, #ef629f, #eecda3);
                
                
                
            }
        </style>
        <br/>
        <a href="#form-camp" class="link_form">Wanna Start Your Campaign?</a>
        <br/>
                <a style="float:left;margin-left: 7rem;color:#4CAF50;">Our Statistics:</a>

        <br/>

        <div class="square_rec">
            <br/>
            <?php
            $query_totallive="select COUNT(*) as totalLive from campaign where status='live'";
            $total_lives=0;
            require_once '../db.inc.php';
            $res_lives=  (mysqli_query($con, $query_totallive));
            $total_lives= mysqli_fetch_assoc($res_lives);
            ?>
            <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;"><label><?php echo $total_lives['totalLive'] ?></label> Live Campaign</label>
        <br/>
        
        
            </div>
        <div class="square_rec" style="margin-left:1rem; background-image: linear-gradient(to bottom right, #f7bb97, #ffb88c);">
        <br/>
<?php
            $query_totalexpire="select COUNT(*) as totalCompleted from campaign where status='expired'";
            $total_expires=0;
            require_once '../db.inc.php';
            $res_expires=  (mysqli_query($con, $query_totalexpire));
            $total_expires= mysqli_fetch_assoc($res_expires);
            ?>
            <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;"><label><?php echo $total_expires['totalCompleted'] ?></label> Completed Campaign</label>
<br/>

            </div>
            <div class="square_rec"  style="margin-left:1rem;">
                <br/>
            <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;"><label><?php echo $total_lives['totalLive']+$total_expires['totalCompleted'] ?></label> Total Campaign</label>
<br/>
<label style="font-size:14px; color: #fff;margin-left: 1rem; ">(Live+Completed)</label>

            </div>
        <div class="camp-content" style="overflow: hidden;">
            <br/>
            <a style="float:left;margin-left: 2rem;color:#4CAF50;">Your Statistics:</a>
<!--            <a href="#popup" style="float:left;margin-left: 48%;color:#000;">Check Pricing?</a>-->
            
            <div class="square-box">
               
                <br/>
               
                <label class="label-camp">Live Campaign: <label style="color:red;"><?php echo $total_live['live']; ?></label></label>
    <?php
                    echo "<a href='camp_notification.php' style='float:right;margin-right:1rem;font-size:13px;color:#000;'>"."History"."</a>";

    ?>
                <br/><br/>
            <?php
            
                $query_inf="select * from campaign where status='live' and email='$email' ORDER BY start_date DESC LIMIT 0,2";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                $no=1;
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    $status=$row1['status'];
                    $req_date=$row1['start_date'];
                    $camp_id=$row1['camp_id'];
                    $info=$row1['info'];
                    
                    echo "<tr>"."<td>"."<label style='color:blue;margin-left:2rem;'>".$no.". Your camp id $camp_id is ".$status. "."."</label>"."</td>"."</tr>";
                    $no++;
                }

                
                ?>
            <?php
        $query_live="select * from campaign where status='live' and email='$email' ORDER BY start_date DESC LIMIT 0,3";
        require_once '../db.inc.php';
        $result_live=  mysqli_query($con, $query_live);
        while($row_live=  mysqli_fetch_array($result_live)){
            
        }
        ?>
            </div>
            <div class="square-box">
                <br/>
                <label class="label-camp">Expired Campaign: <label style="color:red;"><?php echo $total_exp['expired']; ?></label></label>
            <?php
                    echo "<a href='camp_notification.php' style='float:right;margin-right:1rem;font-size:13px;color:#000;'>"."History"."</a>";

    ?>
                <br/><br/>
                    <?php
            
                $query_inf="select * from campaign where status='expired' and email='$email' ORDER BY start_date DESC LIMIT 0,2";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                $no=1;
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    $status=$row1['status'];
                    $req_date=$row1['start_date'];
                    $camp_id=$row1['camp_id'];
                    $info=$row1['info'];
                    
                    echo "<tr>"."<td>"."<label style='color:blue;margin-left:2rem;'>".$no.". Your camp id $camp_id is ".$status. "."."</label>"."</td>"."</tr>";
                    $no++;
                }

                
                ?>
                    <?php
        $query_exp="select * from campaign where status='expired' and email='$email'";
        require_once '../db.inc.php';
        $result_exp=  mysqli_query($con, $query_exp);
        while($row_exp=  mysqli_fetch_array($result_exp)){
            
        }
        ?>
            </div>
<br/>

            <div class="square-box">
                <br/>
                <label class="label-camp">Pending Campaign: <label style="color:red;"><?php echo $total['pending']; ?></label> </label>
            <?php
                    echo "<a href='camp_notification.php' style='float:right;margin-right:1rem;font-size:13px;color:#000;'>"."History"."</a>";

    ?>
                <br/><br/>
            <?php
            
                $query_inf="select * from campaign where status='pending' and email='$email' ORDER BY start_date DESC LIMIT 0,2";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                $no=1;
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    $status=$row1['status'];
                    $req_date=$row1['start_date'];
                    $camp_id=$row1['camp_id'];
                    $info=$row1['info'];
                    
                    echo "<tr>"."<td>"."<label style='color:blue;margin-left:2rem;'>".$no.". Your camp id $camp_id is ".$status. "."."</label>"."</td>"."</tr>";
                    $no++;
                }

                
                ?>
                    <?php
        $query_pen="select * from campaign where email='$email' ORDER BY start_date DESC LIMIT 0,3";
        
        require_once '../db.inc.php';
        $result_pen=  mysqli_query($con,$query_pen);
        while($row_pen=  mysqli_fetch_array($result_pen)){
            $camp_id=$row_pen['camp_id'];
            
        }
        ?>
            </div>
            
            <style>
                .form-camp{
                    background-color:#ddd;
                    width: 64%;
                    margin-left: 15%;
                   // margin-top: 2rem;
                    text-align: center;
                    border-radius: 5px;
                    overflow-x: hidden;
                }
                .input_field--registration {
                margin-left: 1rem;
}
.heading-primary {
  font-size: 2rem;
  font-weight: 200;
  color: #4CAF50;
  margin-top: 1rem;
}

.input_field {
  width: 12rem;
  padding: .4rem 0.8rem;
  margin: .5rem 1rem;
  border-radius: 5px;
  border: none;
  color: #333;
  font-size: 1rem;
  margin-left: -3rem;
}

.input_label {
  font-size: 1rem;
  margin-right: 0.5rem;
  width: 12rem;
  margin-left: 30rem;
  color: #000;
  font-weight: bold;
}

.btn_action {
  display: flex;
  grid-column: 1/3;
}

.btn_special {
  color: #fff;
  font-size: 1vw;
  padding: .5rem 1rem;
  
  margin-right: 1rem;
  margin-top: 2rem;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12vw;
  outline: none;
  background: #2980f3;
  font-weight: bold;
}
  .btn_special:hover {
    -webkit-filter: brightness(1.2);
    transform: translateY(-2px);
}
            </style>
            <br/>
<!--            <a class="link_form" style="color:#000;">Then, You are right here...</a>-->
<!--        <div class="square_rec">
        <br/>
        <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;">Live Campaign</label>

        </div>
        <div class="square_rec" style="margin-left:1rem;background-image: linear-gradient(to bottom right, #f7bb97, #ffb88c);">
        <br/>
            <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;">Live Campaign</label>

            </div>
        <div class="square_rec" style="margin-left:1rem;">
                <br/>
            <label class="label-camp" style="margin-top:2.5rem;margin-left: 1rem;text-align: center;font-size:14px;">Live Campaign</label>
            </div>-->
<!--            <a href="#popup" style="margin-left: 40%;color:#000;">Our Pricing Model?</a>-->
            <style>
                .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
    visibility: hidden;
    width: 300px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
            </style>
            <div class="popup" onclick="myFunction()" style="text-align: center;color:#000;margin-left: 40%;font-weight: bold;text-decoration: underline;">Check Our Pricing Model?
            <span class="popuptext" id="myPopup">3 Days Plan - 5$
            <br/>5 Days Plan - 11$
            <br/>7 Days Plan - 21$
            <br/>15 Days Plan - 50$
            <br/>30 Days Plan - 100$
            <br/><br/>You will need to pay the price after<br/> you submit campaign details.
            </span>
            </div>
            <script>
// When the user clicks on <div>, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>

            <div id="form-camp" class="form-camp" style="overflow-x: hidden;margin-top: 2rem;">
                <h2 class="heading-primary">
                Start Your Campaign!!
            </h2>
                <form action="create_campaign.php#form-camp" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Your Email:</td>
                        <td><input type="text" name="email" class="input_field input_field--registration" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
  
                    <tr>
                        <td class="input_label input_label--registration">Campaign Name:</td>
                        <td><input type="text" name="camp_name" class="input_field input_field--registration" value="" />
                        <?php if(isset($errors['camp_name'])){?><br/> <span class="error" style="margin-left:-4rem;"><?php echo $errors['camp_name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Campaign Type:</td>
                        <td><select name="camp_type" class="input_field input_field--registration" value="<?php echo "$package"?>">
                                        <option>Visitor Ads</option>
                                        <option>Banner Ads</option>
                                        
                                      
                            </select>
                        <?php if(isset($errors['package'])){?> <span class="error"><?php echo $errors['package'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="input_label input_label--registration">Select Duration:</td>
                        <td><select name="duration" class="input_field input_field--registration" value="<?php echo "$package"?>">
                                        <option>3 Days</option>
                                        <option>5 Days</option>
                                        <option>7 Days</option>
                                        <option>12 Days</option>
                                        <option>30 Days</option>
                                      
                            </select>
                        <?php if(isset($errors['package'])){?> <span class="error"><?php echo $errors['package'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">URL/Link:</td>
                        <td><input type="text" name="link" class="input_field input_field--registration" placeholder="Website/App promotion url/link (Optional)" value="" style="font-size: 11px;" />
                        
                        </td>
                    </tr>
  
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="start" value="Start Campaign"  class="btn_special" style="margin-left:3rem;"/>
                       
                            <input type="submit" name="cancel" value="Cancel"  class="btn_special" style="margin-left:1rem;background: tomato;"/>
                        </td>
                            <!-- <a class="btn" style="margin: 2rem 8rem;">Home</a></td>                             -->
                        
                    </tr>
                    
                    
                </tbody>
            </table>
                    <?php
                    if($success==1){
                        echo "<label style='color:red;'>"."Please, make payment of "."</label>" .$amount ." " ."<a href='payment.php'>"."Pay Here "."</a>"."to make your campaign start!!";
                    }
                    ?>
                
           <br />

           <br/>
            </form>
                
            </div>

            <?php if(isset($errors['pending'])){?><br/> <span class="error" style="margin-left:12vw;"><?php echo $errors['pending'] ?></span>
                        <?php } ?>

        </div>
        <div id="content2" style="height: 220px;background-color: #eee;">
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

<!--<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">why users choose us?</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 14px;
    
    font-weight: bold;
    margin-top: 11px;
    margin-left: 1rem;
    margin-right: 1rem;
    text-align: justify">With fortunfire you can not only earn for timepass but we assure you that you will earn big. So, be ready with our helping plan and emerge as a big player on this platform because the more you refer, the more rich you can be. For detailed info visit <a href="howtowork.php" style="font-size:13px;">How To Work?</a> and get more details about how can you earn?, how you need to work? etc.  </h2>
        
        <h3 style="text-align: justify;margin-left: 1rem;
    margin-right: 1rem;font-size: 12px;">Our main goal is to bring you such a platform which can generate a good source of income for you. So, get, set & Go. Happy Earning!!</h3>
        <style>
            #footerdiv{
                margin-left: 1rem;
                width: 98%;
                text-align: center;
                margin-right: 1rem;
            }
            #footerdiv a{
                text-decoration: none;
                font-size: 13px;
                text-align: center;
                margin-bottom: 0rem;
                
            }
        </style>
        <div id="footerdiv">
                    <h3 style="color:black;font-size: 13px;">Some important pages/links:</h3>
            <a href="loginuser.php">Login |</a>
            <a href="register.php">Register |</a>
            <a href="privacy.php">Privacy |</a>
            <a href="contact.php">Contact Us |</a>
            <a href="terms_conditions.php">Terms & conditions |</a>
            <a href="howtowork.php">How To Work? |</a>
            <a href="opportunities.php">Business opportunities</a>
        </div>-->
    </div>
</body>
</html>
