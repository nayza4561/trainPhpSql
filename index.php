<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php db training</title>
</head>
<body>
    <?php 
    session_start();
    require("component/nav.php");
    ?>
    <?php require("db/conn.php"); ?>
    
    <?php mysqli_close($conn); ?>
</body>
</html>