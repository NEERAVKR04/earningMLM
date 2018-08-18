<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
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
$content='';
$title='';
$category='';
$status=0;
$errors=array();
if(isset($_POST['post'])){
    $content=$_POST['content'];
    $title=$_POST['title'];
    $category=$_POST['category'];
    $article_activation="NO";
    $creator_name=$first_name;
    $creator_email=$email;
    $random_number='0123456789';
    $article_id= str_shuffle($random_number);
    
    if(empty($title)){
        
        $errors['title']="Enter a specific title!!";
    }
    if(empty($category)){
        
        $errors['category']="select a category";
    }
    if(empty($content)){
        
        $errors['content']="content is empty!!";
    }
    if(count($errors)==0)
    {
    $query_article="insert into article values('$article_id','$title','$content','$category','$article_activation','$creator_name','$creator_email')";
    require_once '../db.inc.php';
    mysql_query($query_article);
        
    }
    
    
    
    
    
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
    min-height: 701.5px;
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
  <a href="article.php">Write Article</a>
  <a href="watch_adds.php">Watch Adds</a>
  <a href="profile.php">Profile</a>
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
<h2 id="heading">Write Article:</h2>
<form action="article.php" method="POST">
<table id="customers">
            
            <tr>
                <td><label>Title:</label>
                    <input autofocus type="text" spellcheck="true" required name="title" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid;
    background-color: white;
    color: black;font-size: 14px;" value="<?php if(isset($errors['title'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>" ></td>

        </tr>
        <tr>
        
            <td><label>Category:<b style="margin-left: 0.5rem;"></b></label>
                <select name="category" required  style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    
    color: black;">
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;"selected value="" id="1">Select category</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;" id="2">Dancing</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #ddd;
    color: black;" id="3">Earning</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;" id="4">Gaming</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #ddd;
    color: black;">Music</option>
                    <option style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #fff;
    color: black;" id="5">Technology</option>
                </select>
                
                </td>
            </tr>
            <tr>
                <td><label style="text-align: left; float: left;">Write your worthy points:</label>
                    <input disabled maxlength="10000" size="10" value="10000" id="counter"> 
<!--                    <label>words left</label>-->
<textarea spellcheck="true" required name="content" style=" width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    color: black;
    border: 1px solid;
    min-height: 20rem; overflow-y: scroll;resize: none;" onkeyup="textCounter(this,'counter',10000)" id="article" maxlength="10000"></textarea></td>

        </tr>
        <script>
        function textCounter(field,field2,maxlimit)
        {
            var countfield=document.getElementById(field2);
            if(field.value.length > maxlimit){
                field.value=field.value.substring(0,maxlimit);
                return false;
            } else{
                countfield.value=maxlimit-field.value.length;
                
            }
        }
        </script>
        <tr>
            <td><center><input type="submit" name="post" style=" width: 15%;
    padding: 12px 20px;
    alignment-adjust: central;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #4773C1;
    color: white;
    text-align: center" value="Post Article"></center></td>
        </tr>
</table>
</form>


    
</div>

    
  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
