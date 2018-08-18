<?php
require_once './secure.inc.php';
$status=0;
if(isset($_POST['submit']))
{
$roll_number=$_POST['roll_number'];
$query="select * from students where roll_number='$roll_number'";
require_once '../db.inc.php';
$result=  mysql_query($query);
if(mysql_num_rows($result)==1)
{
   $row= mysql_fetch_assoc($result);
    $status=1;
}
 else {
    $status=2;   
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Student Information System(SIS)</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<?php require_once 'header.php';?>
</div>
<div id="menu">
	<?php require_once 'menu.inc.php'; ?>
</div>
<div id="content">
    	<form action="search.php" method="POST">
            <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Roll Number:</td>
                        <td><input type="text" name="roll_number" value="" /></td>
                    </tr>
                   
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="search student" /></td>
                        
                    </tr>
                </tbody>
            </table>
        </form>
    <?php if($status==2){ ?>
        <h2 style="color: red">Roll Doesn't Exists</h2>
        <?php } else if($status==1) { ?>
        <h3>Detail of Student:</h3>
        <hr>
        <table class="table-striped table-bordered" border="10" cellpadding="10">
            <tbody>
                <tr>
                    <td>Roll   :</td>
                    <td><?php echo $row['roll_number']; ?></td>
                </tr>
                <tr>
                    <td>Name   :</td>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>
                <tr>
                    <td>Email  :</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>Mobile :</td>
                    <td><?php echo $row['mobile_number']; ?></td>
                </tr>
                <tr>
                    <td>Course :</td>
                    <td><?php echo $row['course']; ?></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
        <hr>
    
</div>
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
