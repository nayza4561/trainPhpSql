<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php require("component/nav.php");
    ?>
    <form method="post" class="w-50 p-3 rounded border border-2 my-5 m-auto">
        <h2>Register</h2>
        <?php include("register_check.php"); ?>
    </form>

    <?php mysqli_close($conn); ?>
</body>

</html>