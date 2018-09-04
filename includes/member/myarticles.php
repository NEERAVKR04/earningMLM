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
if(isset($_POST['delete'])){
                $article_id=$_POST['id'];
                
                $email_user=$_POST['email_user'];
                
                $query_delete="delete from article where article_id='$article_id'";
                require_once '../db.inc.php';
                mysql_query($query_delete);
                    
                }
               
                
            
            ?>
<?php
//$query_article_details="select * from article";
//    require_once '../db.inc.php';
//    $result=  mysql_query($query_article_details);
//            $status=1;
//        while ($row_article = mysql_fetch_assoc($result)) {
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
<!--<div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="article_approval.php">Approve Articles</a>
  <a href="activate_users.php">Activate Id</a>
  <a href="add_ads.php">Add Advertisement</a>
  <a href="view_users.php">Users</a>
  <a href="#">Profile</a>
  <a href="#">Payment Proof Request</a>
  <a href="#">Add Campaign</a>
  <a href="#">Your Referrals</a>
  <a href="#">Advertisement Campaign</a>
  <a href="#">How To work?</a>
  <a href="#" class="active-red">LOGOUT</a>
  
    <b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>

    </div>-->
<div class="vertical-content" style="height: auto;">
<!--"<font style='margin-left: 1rem'>"-->
<h2 style="text-align: center;color: #000;">My Articles</h2>
    <?php
    $query_article="select * from article where creator_email='$email'";
    require_once '../db.inc.php';
    $result_article=  mysql_query($query_article);
        while ($row_article = mysql_fetch_array($result_article)) {
            
            $article_id=$row_article['article_id'];
            $email_user=$row_article['creator_email'];
            $date=$row_article['date'];
            $message=$row_article['message'];
            $article_image=$row_article['thumbnail'];
            $article_link=$row_article['article_link'];
            
            
            echo "<form method='POST' action='myarticles.php'>";
            echo "<ul type='none' style='margin-left:0.1rem;'>";
            echo '<img src="images/'.$article_image.'" style="width:90%;height:300px;display: block;margin-left:2rem;margin-right: auto;">';             //echo "<input readonly type='text' name='email_user' value='$email_user'>";
            echo "<li>"."<input readonly type='text' name='id' value='$article_id' style='border:none;visibility:hidden;'>"."</li>";
            
            echo "<li style='color: white;
                   padding: 8px;background-color: #4CAF50;overflow:hidden;width:95%'>".$row_article['article_title']." "."<label style='float:right;'>"."Posted on: "."$date"."</li>";
            echo "<br/>";
            echo "<li style='text-align: justify;color:#000;'>"."Posted under: ".$row_article['article_category'];
            echo "<li style='text-align: justify;overflow:hidden;width:95%;'>"."<br/>".$row_article['article_content'];
            echo "<h5>"."<label style='color:#2196F3'>"."Approval Status: "."</label>".$row_article['message']."<a href=\"".$row_article['article_link']."\" style='float:right;margin-right:1rem;'>"."</h5>";
            if($row_article['disapprove']=='YES')
            {
                echo "<h5>"."<label style='color:red;'>"."Dis-Approved By Admin!!"."</label>"."</h5>"."<button name='delete' style='border-radius:3rem;' value='Delete Article'>"."Delete article"."</button>";

            }
            echo "<hr>";
            //echo"<br/>"; echo "<input type='submit' name='approve' value='Approve'>";
            
            
            echo "</ul>";
            echo "</form>";
            
            }
            
           
    ?>
</div>
    
  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
