<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        require("component/nav.php");
        require("db/conn.php");
    ?>
    <form method="post" class="w-50 p-3 rounded border border-2 my-5 m-auto">
        <h2>Login</h2>
        <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $errors = 0;
                $sql_cus = "SELECT * FROM customer WHERE username = '$username' AND password = '$password';";
                $sql_man = "SELECT * FROM manager WHERE username = '$username' AND password = '$password';";
                $sql_deli = "SELECT * FROM delivery WHERE username = '$username' AND password = '$password';";
                $result_cus = mysqli_query($conn, $sql_cus);
                $result_man = mysqli_query($conn, $sql_man);
                $result_deli = mysqli_query($conn, $sql_deli);
                if (mysqli_num_rows($result_cus) == 1) {
                    $_SESSION["position"] = "customer";
                    $_SESSION["username"] = "$username";
                    $_SESSION["logStatus"] = true;
                    header("location: index.php");
                }
                if (mysqli_num_rows($result_man) == 1) {
                    $_SESSION["position"] = "manager";
                    $_SESSION["username"] = "$username";
                    $_SESSION["logStatus"] = true;
                    header("location: index.php");
                }
                if (mysqli_num_rows($result_deli) == 1) {
                    $_SESSION["position"] = "delivery";
                    $_SESSION["username"] = "$username";
                    $_SESSION["logStatus"] = true;
                    header("location: index.php");
                }
            }
        ?>
        <span>Username</span>
        <input class="form-control my-1" type="text" name="username">
        <span>Password</span>
        <input class="form-control my-1" type="password" name="password">
        <button type="submit" class="btn btn-dark my-2">Login</button>
    </form>

    <?php mysqli_close($conn); ?>
</body>

</html>