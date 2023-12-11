<?php 
    session_start(); 
    require("db/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <?php require("component/nav.php"); ?>
    
    <?php mysqli_close($conn); ?>
</body>

</html>