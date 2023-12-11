<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errors = 0;
    $sql_cus = "SELECT * FROM customer WHERE username = '$username' AND password = '$password';";
    $sql_man = "SELECT * FROM manager WHERE username = '$username' AND password = '$password';";
    $sql_deli = "SELECT * FROM delivery WHERE username = '$username' AND password = '$password';";
    $sql_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
    $result_cus = mysqli_query($conn, $sql_cus);
    $result_man = mysqli_query($conn, $sql_man);
    $result_deli = mysqli_query($conn, $sql_deli);
    $result_admin = mysqli_query($conn, $sql_admin);
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
    if (mysqli_num_rows($result_admin) == 1) {
        $_SESSION["position"] = "admin";
        $_SESSION["username"] = "$username";
        $_SESSION["logStatus"] = true;
        header("location: index.php");
    }
}
