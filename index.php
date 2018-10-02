<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Muslimin</title>
    </head>
    <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HOME</title>
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
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  position: relative;
  margin: auto;
  overflow-y: hidden;
  overflow-x: hidden;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: 120px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  display: inline-block;
  transition: background-color 0.6s ease;
  border-radius: 50%;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/banner1.jpg" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/banner2.jpg" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/banner3.png" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
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
<style>
    .square{
        height: auto;
        width: 80%;
        display: inherit;
        text-align: justify;
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 3px;
        padding-bottom: 2px;
        border: 1px solid #000;
        margin-left: 12.5%;
        margin-top: 0.3rem;
        
        font-size: 16px;
        color: #000;
        background-color: #eee;
        margin-bottom: 1%;
        border-radius: 10px;
        
        
    }
</style>
    <div class="square">
        You can start your own business by just opting our 1 package out of 5 & even you can upgrade further. Boost your business by just starting and referring your 5 friends and tell them to do the same i.e. to opt our helping plan & refer to their friends. So, by just investing for once can make you lakhpati or crorepati depending on how many people you and your referral has invited. <a href="howtowork.php" style="font-size: 12px;">READ MORE...</a>
<br/><br/>
    </div>
    <br/>
    <div class="square" style="background: #fff;text-align: center;border: none;margin-bottom: 4rem;margin-top: 3rem;">
        <img src="images/create_account.png" height="275px" width="280px">
        <img src="images/package.png" height="275px" width="280px" style="margin-left: 1.2rem;">
    <img src="images/earning.png" height="275px" width="280px" style="margin-left: 1.2rem;">
    </div>
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 79.7%;
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
<!--Banner Ads Script Start-->

<!--  
1. Copy the script from Banner Ads Script Start to Banner Ads Script Ends
2. In <a href="#"> Put the banner ads/website/app link within double quotes i.e. "" after href
3. In Images folder upload the banner image 
4. Now, change the <img src="images/banner_name">
-->
<style>
    .banner-ads {
  width: 100%;
  position: relative;
  margin: auto;
  overflow-y: hidden;
  overflow-x: hidden;
  margin-bottom: 1rem;
}
</style>
<div class="banner-ads">

<div class="">
    <a href="#"><img src="images/banner2.jpg" style="width:100%;height:7.5rem;"></a>
  
</div>
</div>
    <!--Banner Ads Script Ends-->

<div>
    <?php
echo "<center>"."<form action='#' method='POST' style='min-height:300px;'>";
echo "<h2 style='color:#000;font-size:15px;'>"."Recent 10 withdrawals to users "."</h2>";
echo "<table id='customers'>
<tr>
<th>Withdrawal Amount</th>
<th>Withdrawal Date</th>
<th>Payment Proof</th>

</tr>";
$query_his="select * from withdrawal ORDER BY date DESC LIMIT 0,10";
    require_once './includes/db.inc.php';
    $result_his=  mysqli_query($con,$query_his);
    $count=1;
    while($row=  mysqli_fetch_array($result_his)){
       if($count<=10){
           $proof_name=$row['proof'];
           $email=$row['email'];
           
    echo "<tr>";
    echo "<td>"."Withdrawal of "."<b>"."$".$row['amount'] ."</b>" ." has been processed to ".$row['email']. "</td>";
    echo "<td>".$row['date'] . "</td>";
    echo "<td>"."<a href='includes/admin/payment_proofs/$proof_name' download>"."Payment Proof"."</a>"."</td>";
    echo "</tr>";
    $count++;
       }
    }
    
echo "</table>"."</form>"."</center>";
?>
<br/>
</div>
<!--Banner Ads Script Start-->

<!--  
1. Copy the script from Banner Ads Script Start to Banner Ads Script Ends
2. In <a href="#"> Put the banner ads/website/app link within double quotes i.e. "" after href
3. In Images folder upload the banner image 
4. Now, change the <img src="images/banner_name">
-->
<style>
    .banner-ads {
  width: 100%;
  position: relative;
  margin: auto;
  overflow-y: hidden;
  overflow-x: hidden;
  margin-bottom: 1rem;
}
</style>
<div class="banner-ads">

<div class="">
    <a href="#"><img src="images/banner1.jpg" style="width:100%;height:7.5rem;"></a>
  
</div>
</div>
    <!--Banner Ads Script Ends-->

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
    font-size: 24.5px;
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
<!--                <label style="text-align: center"><a href="futureoweb.com">Designed by futureOweb.com</a></label>-->
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
