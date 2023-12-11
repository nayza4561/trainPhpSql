<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
        require("component/nav.php");
        require("db/conn.php");
    ?>
    <form method="post" class="w-50 p-3 rounded border border-2 my-5 m-auto">
        <h2>Login</h2>
        <?php require("login_db.php"); ?>
        <span>Username</span>
        <input class="form-control my-1" type="text" name="username">
        <span>Password</span>
        <input class="form-control my-1" type="password" name="password">
        <button type="submit" class="btn btn-dark my-2">Login</button>
        <p class="text-secondary">Not have an account? <a href="register.php">Register</a></p>
    </form>

    <?php mysqli_close($conn); ?>
</body>

</html>