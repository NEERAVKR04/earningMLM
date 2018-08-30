<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$query_update1="update users set ad_19='YES' where username='$username'";
include_once '../db.inc.php';
mysql_query($query_update1);
$query_credit="select * from users where username='$username'";
$result=  mysql_query($query_credit);
require_once '../db.inc.php';
while($row=  mysql_fetch_assoc($result))
{
    $credit=$row['credit'];
    $credit=$credit+0.05;
    $query_add_credit="update users set credit='$credit' where username='$username'";
    require_once '../db.inc.php';
    mysql_query($query_add_credit);
}
header('Location:watch_adds.php');
?>

