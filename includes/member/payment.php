<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$useremail=$_SESSION['email'];
$error=array();
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqli_query($con,$query_check_code);

     
       while ($row = mysqli_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $package=$row['package'];
          $activation=$row['activation'];
       }
   
?>
<?php
$status=0;
if(isset($_POST['upload'])){
$username=$_SESSION['username'];
$imagename=$_FILES["payment_proof"]["name"];
$transaction_id=$_POST['tid'];
$purpose=$_POST['purpose'];

//check request
$query_exist="select * from request where email='$useremail'";
require_once '../db.inc.php';
$result_exist=  mysqli_query($con, $query_exist);
while ($row1 = mysqli_fetch_array($result_exist)) {
   $statuscheck=$row1['status'];
   if($statuscheck=='pending'){
       $error['pending']="You have already submitted a request previously which is under processing. Once, processed then you can request for new.";
   }
}
if(count($error)==0){
if($imagename==''){    
    $status=1;
}

else{
    $image_type=array(IMAGETYPE_JPEG,IMAGETYPE_PNG);
    $detected_type=  exif_imagetype($_FILES['payment_proof']['tmp_name']);
    $error=!in_array($detected_type, $image_type);
    if(!in_array($detected_type, $image_type)){
        
        $status=2;
    }
 else {
    $imagetmp=  addslashes(file_get_contents($_FILES["payment_proof"]["tmp_name"]));
    $insert_image="update users set payment_proof='$imagetmp',image_name='$imagename',tid='$transaction_id' where username='$username'";
    require_once '../db.inc.php';
    mysqli_query($con,$insert_image);
    $useremail=$_POST['useremail'];
    
    $amount=$_POST['amount'];
    $status=3;
    //check request table
    $query_st="select * from request where email='$useremail'";
    require_once '../db.inc.php';
    $result_req=  mysqli_query($con,$query_st);
    while($row_req=  mysqli_fetch_array($result_req)){
        $status_msg=$row_req['status'];
    }
          date_default_timezone_set('Asia/Kolkata');
          $date=  date('Y-m-d H:i:s');
            $query_st="insert into request values('$useremail','$purpose','$amount','pending','$date')";
            require_once '../db.inc.php';
            mysqli_query($con,$query_st);
      
    }
    
}
}  
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Payment/Upgrade Interface</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
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
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    font-size: 1.5em;
    text-align: justify;
    
    text-decoration: none;
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
<div id="content" class="login-form">
            <h3 class="heading-primary">
                How you want to pay us?
            </h3>
    <form action="payment.php" method="POST" enctype="multipart/form-data">
                <div class="login_details">
                    <div class="login_details">
                    <div class="input_label">Email:</div>
                    <input readonly type="text" name="useremail" class="input_field" value="<?php echo "$useremail"?>" />
                    <div class="input_label">Transaction Id:</div>
                    <input type="text" name="tid" class="input_field" value="<?php echo "$transaction_id"?>" />

                    
                    <div class="input_label">Purpose:</div>
<!--                    <select  onchange="change(this)">
                        <option value="" class="default" selected>Select</option>
                        <option id="1" value="1">Activate Id</option>
                        <option id="2" value="2">Upgrade Plan</option>
                        <option id="3" value="3">Advertisement Campaign</option>
                        
                    </select>-->
                    <select required class="input_field" id="purpose" name="purpose" >
           <option value="" selected="selected" >--Please Select--</option>
           <option value="Activate Id" >Activate Id</option>
           <option value="Upgrade Plan" >Upgrade Plan</option>
           <option value="Advertisement Campaign" >Advertisement Campaign</option>
           
           </select>
                    
                    <div class="input_label">Amount:</div>
                        <select required="" id="amount" class="input_field" name="amount">
                        <option value="" selected>--Please Select--</option>
                        
                        <option id="1" value="5$">5$   (Activation/Upgrade)</option>
                        <option id="1" value="11$">11$ (Activation/Upgrade)</option>
                        <option id="1" value="21$">21$ (Activation/Upgrade)</option>
                        <option id="1" value="50$">50$ (Activation/Upgrade)</option>
                        <option id="1" value="99$">99$ (Activation/Upgrade)</option>
                        <option id="3" value="0.50$">0.50$ (Ads Campaign)</option>
                        <option id="3" value="1$">1$ (Ads Campaign)</option>
                        <option id="3" value="1.50$">1.50$ (Ads Campaign)</option>
                        <option id="3" value="2$">2$ (Ads Campaign)</option>
                        <option id="3" value="3.50$">3.50$ (Ads Campaign)</option>
                        <option id="3" value="4$">4$ (Ads Campaign)</option>
                        <option id="3" value="7$">7$ (Ads Campaign)</option>

                        
                    </select>
<!--                    <select required id="amount" name="amount" class="input_field" >
           <option value="" >First</option>
           <option value="Second" >Second</option>
           <option value="Third" >Third</option>
           </select>-->
<!--<script>
$(document).ready(function(){
  $('#country').change(function(){
    loadState($(this).find(':selected').val())
  })
  $('#state').change(function(){
    loadCity($(this).find(':selected').val())
  })


})

function loadCountry(){
        $.ajax({
            type: "POST",
            url: "ajax/ajax.php",
            data: "get=country"
            }).done(function( result ) {
                $(result).each(function(){
                    $("#country").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}
function loadState(countryId){
        $("#state").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax/ajax.php",
            data: "get=state&countryId=" + countryId
            }).done(function( result ) {
                $(result).each(function(){
                    $("#state").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}
function loadCity(stateId){
        $("#city").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax/ajax.php",
            data: "get=city&stateId=" + stateId
            }).done(function( result ) {
                $(result).each(function(){
                    $("#city").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })
            });
}

// init the countries
loadCountry();
</script>-->
                <!--<script>
                    $(function(){
                        $("#amount").hide();
                        $("#purpose").change(function(){
                            if($(".default").is(:selected)){
                                $("#amount").hide();
                                
                            } else {
                                $("#amount").show();
                            }
                        });
                    }); 
                    
                    
                        $("#purpose").change(function(){
                            if($(this).data('options')===undefined){
                                $(this).data('options',$('#amount option').clone());
                            }
                            var id=$(this).val();
                            var options=$(this).data('options').filter('[value=' + id + ']');
                            $('#amount').html(options);
                            });
                       
                    
                                    </script>-->

                    
<!--                    <div class="btn_action">
                        <input type="submit" name="getdetails" value="Get Details" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>-->

                </div>
                
         <br/>
        <hr/>
        <br/>
    <center> <label style="font-size: large;color: #000;">Upload Proof:</label>
    
    <input type="file" name="payment_proof" id="payment_proof" style=" width: 50%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4773C1;
    color: white;
    text-align: center;border-radius: 3rem;" value="Upload">
    <br/>
        <input type="submit" name="upload" value="Upload Proof" style=" width: 50%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 3rem;"></center>  
               
</div>
            </form>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JZQCHUNG59X3E">
<table>
<tr><td><input type="hidden" name="on0" value="Choose your amount">Choose your amount</td></tr><tr><td><select name="os0">
	<option value="Silver Package">Silver Package $5.00 USD</option>
	<option value="Gold Package">Gold Package $12.00 USD</option>
	<option value="Sub diamond Package">Sub diamond Package $21.00 USD</option>
	<option value="Diamond Package">Diamond Package $50.00 USD</option>
	<option value="Platinum Package">Platinum Package $99.00 USD</option>
	<option value="Advertise for 1 day">Advertise for 1 day $0.50 USD</option>
	<option value="Advertise for 5 days">Advertise for 5 days $1.50 USD</option>
	<option value="Advertise for 7 days">Advertise for 7 days $2.00 USD</option>
	<option value="Advertise for 12 days">Advertise for 12 days $3.50 USD</option>
	<option value="Advertise for 1 month">Advertise for 1 month $7.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

   <?php if($status==1){?>
           <?php "<h2>"."Error Try Again!!"."</h2>"?>
           <?php } ?>
    
           <?php if($status==2){?>
           <?php echo "<h2 class='error'>"."Invalid file uploaded, please upload jpeg/png images only"."</h2>";?>
           <?php } ?>
    <?php if($status==3){?>
           <?php echo "<h2>"."Image/Payment proof uploaded successfully!!"."</h2>";?>
           <?php } ?>
    <?php if($status==4){?>
           <?php echo "<h2>"."You have already requested previously!! Wait 24-36 hrs. Then request for new request"."</h2>";?>
           <?php } ?>
    <?php if(isset($error['pending'])){?> <br/><label style="color: red;font-size: 1rem;margin-left: auto;margin-right: auto;"><?php echo $error['pending'] ?></label>
                        <?php } ?>
</div>
        
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
