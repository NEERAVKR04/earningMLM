<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $name=$_POST['name'];
    $sub=$_POST['sub'];
    $msg=$_POST['msg'];
    $errors=array();
    $adminmail='support@muslimin.com';
    $status=0;
    
    if(empty($email)){
        $errors['email']="Enter registered email!!";
    }
    if(empty($name)){
        $errors['name']="Enter your name!!";
    }
    if(empty($sub)){
        $errors['sub']="subject can't be empty!!";
    }
    if(empty($msg)){
        $errors['msg']="Give some feedback/queries!!";
    }
    if(count($errors)==0){
        
        $status=1;
        
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
<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<?php require_once './includes/guest/header.php';?>
</div>
<div id="menu">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
<style>
    .square{
        height: auto;
        width: 95%;
        display: block;
        text-align: justify;
        border: none;
        
        
        margin-left: 2%;
        margin-top: 3rem;
        
        font-size: 16px;
        color: #000;
        background-color: #fff;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<div class="square">
    <h3 style="color:#000;text-align: center;">CONTACT US</h3>
    <b>If you are facing any issue or any query, feel free to contact & we will surely response as soon as possible </b>
<br/><br/>
<b>Email:</b> support@muslimin.com
<br/><br/>

<img src="images/whatsapp_PNG21 (2).png" height="32px" width="32px;"> 
<br/><br/>

<b>Whatsapp:</b><label style="float:auto;margin-top: 1px;">+91 7096702667</label>
<br/><br/>
    <style>
        h3,p,label {
text-align:center;
font-family:'Raleway',sans-serif;
color:#006400
}
h2 {
font-family:'Raleway',sans-serif
}
input {
width:100%;
margin-bottom:20px;
padding:5px;
height:30px;
box-shadow:1px 1px 12px gray;
border-radius:3px;
border:none
}
textarea {
width:100%;
height:80px;
margin-top:10px;
padding:5px;
box-shadow:1px 1px 12px gray;
border-radius:3px
}
#send {
width:103%;
height:45px;
margin-top:40px;
border-radius:3px;
background-color:#cd853f;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:18px
}
div#feedback {
text-align:center;
height:520px;
width:330px;
padding:20px 25px 20px 15px;
background-color:#f3f3f3;
border-radius:3px;
border:1px solid #cd853f;
font-family:'Raleway',sans-serif;
float:left
}
.container {
width:960px;
margin:40px auto
}
    </style>
    <form action="contact.php" id="form" method="post" name="form">
<input name="name" placeholder="Your Name" type="text" value="">
<input name="email" placeholder="Your Email" type="text" value="">
<input name="sub" placeholder="Subject" type="text" value="">
<input readonly type="text" style="border:none;background: #fff;box-shadow: none;margin-bottom: 1px;" value="Your Suggestion/Feedback">
<textarea name="msg" placeholder="Type your text here..."></textarea>
<input id="send" name="submit" type="submit" value="Send Feedback">
<?php if($status==1){ ?>
  <?php mail($adminmail, $sub, "One user named $name with registered email $email have submitted queries/feedback i.e. $msg");
  ?>
<h3>Message Sent. Expect reply within 24 hours. Thanks for contacting us!!</h3>
<?php } ?>
</form>
<!--<h3><?php include "secure_email_code.php"?></h3>-->
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
