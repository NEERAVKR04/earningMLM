<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Earning Junction(EJ)</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles/default.css" rel="stylesheet" type="text/css" />
<style>
    p{
        font-size: 0.99em;
    }
    img
    {
        float: right;
        margin: 2px;
        margin-left: 5px;
        
        
    }
</style>
</head>
<body>
<div id="header">
	<?php require_once './includes/guest/header.php';?>
</div>
    
<div id="menu">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
    <hr/>
<div id="content">
    <style>
* {
  box-sizing: border-box;
}

.column {
    float: left;
    width: 30%;
    padding: 0px;
    
    
    
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 10px;
    text-align: center">it's just 3 steps</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 30px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">how you <b>Start?</b></h2>
    <br/>
<div class="row">
  
    <div class="column">
        <a href="#"><img src="images/create_account.png" alt="signup" style="width:81%"></a>
  </div>
  <div class="column">
      <a href="#"><img src="images/package.png" alt="package" style="width:85%"></a>
  </div>
  <div class="column">
      <a href="#"><img src="images/earning.png" alt="earn" style="width:80%;"></a>
  </div>
</div>
    <br/><br/><br/>
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
    <?php
echo "<center>"."<form action='#' method='POST'>";
echo "<h2>"."Recent 10 withdrawals to users "."</h2>";
echo "<table id='customers'>
<tr>
<th>Withdrawal Amount</th>
<th>Withdrawal Date</th>
<th>Payment Proof</th>

</tr>";
$query_his="select * from withdrawal ORDER BY date DESC LIMIT 0,10";
    require_once './includes/db.inc.php';
    $result_his=  mysql_query($query_his);
    $count=1;
    while($row=  mysql_fetch_array($result_his)){
       if($count<=10){
           $proof_name=$row['proof'];
           $email=$row['email'];
           
    echo "<tr>";
    echo "<td>"."Withdrawal of "."<b>".$row['amount'] ."$"."</b>" ." has been processed to ".$row['email']. "</td>";
    echo "<td>".$row['date'] . "</td>";
    echo "<td>"."<a href='payment_proof/$proof_name' download>"."Payment Proof"."</a>"."</td>";
    
    echo "</tr>";
    $count++;
       }
    }
    
echo "</table>"."</center>";
echo "<br/>";
?>
</div>
    
    <div id="content2">
        <br/><br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">earn extra money</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 50px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 3px;
    
    text-align: center">why <b>join us?</b></h2>
    </div>
<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>
</body>
</html>
