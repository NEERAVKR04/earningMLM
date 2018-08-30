
?>
<html>
    <head>
        <title>Upload Proof</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
<div id="content" class="registration">
   
            <?php if($status==1){?>
           <?php "<h2>"."Error Try Again!!"."</h2>"?>
           <?php } ?>
    
           <?php if($status==2){?>
           <?php echo "<h2>"."Payment proof uploaded!! Wait for activation of your account!!"."</h2>";?>
           <?php } ?>
           
    
</div>
</html>
