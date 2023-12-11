<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/9f329728c0.js" crossorigin="anonymous"></script>

<?php require("db/conn.php"); ?>

<nav class="bg-dark text-light p-3 d-flex flex-row justify-content-around sticky-top">
    <a href="index.php" class="navbar-brand fs-3 fw-bold">Home</a>
    <div class="d-flex flex-row gap-3 align-items-center">
        <?php if (isset($_SESSION["logStatus"])) { ?>
            <?php if($_SESSION["position"] == "customer") : ?>
                <i class="fa-solid fa-user fa-xl"></i>
            <?php elseif($_SESSION["position"] == "admin") : ?>
                <i class="fa-solid fa-user-tie fa-xl"></i>
            <?php elseif($_SESSION["position"] == "delivery") : ?>
                <i class="fa-solid fa-truck-fast fa-xl"></i>
            <?php endif ?>
            <a class="d-flex flex-row gap-3 align-items-center nav-link fw-bold" href="profile.php">
                <img class="nav-profile-img" src="assets/img/<?php
                $result = mysqli_query($conn, "SELECT img FROM $_SESSION[position] WHERE username = '$_SESSION[username]';");
                echo mysqli_fetch_all($result, MYSQLI_ASSOC)[0]["img"];
                ?>">
                <span>
                    <?php
                    $sql = "SELECT firstname FROM $_SESSION[position] WHERE username = '$_SESSION[username]';";
                    $result = mysqli_query($conn, $sql);
                    echo mysqli_fetch_all($result, MYSQLI_ASSOC)[0]["firstname"];
                    ?>
                </span>
            </a>
            <a href="logout.php" class="btn btn-danger d-flex flex-row gap-2 align-items-center">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>
                    Logout
                </span>
            </a>
        <?php } else { ?>
            <a href="register.php" class="nav-link">Register</a>
            <a href="login.php" class="nav-link">Login</a>
        <?php } ?>
    </div>
</nav>