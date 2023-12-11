<?php require("db/conn.php");

if ($_POST == true) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $position = $_POST["position"];
    $errors = 0;
    $noti = "<h5 class='text-danger'>โปรดกรอกข้อมูลให้ครบถ้วน</h5>". "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
    if ($username == "") {
        $errors ++;
        echo $noti;
    } elseif ($firstname == "") {
        $errors ++;  
        echo $noti;
    } elseif ($lastname == "") {
        $errors ++;
        echo $noti;
    } elseif ($address == "") {
        $errors ++;
        echo $noti;
    } elseif ($password == "") {
        $errors ++;
        echo $noti;
    } else {
        // check for exists username
        $check_cus = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username';");
        $check_man = mysqli_query($conn, "SELECT * FROM manager WHERE username = '$username';");
        $check_deli = mysqli_query($conn, "SELECT * FROM delivery WHERE username = '$username';");
        $check_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username';");
        if (mysqli_num_rows($check_cus) >= 1) {
            echo "<h5 class='text-danger'>มี Username นี้ในระบบแล้ว กรุณากรอกใหม่</h5>";
            echo "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
        } else if(mysqli_num_rows($check_man) >= 1) {
            echo "<h5 class='text-danger'>มี Username นี้ในระบบแล้ว กรุณากรอกใหม่</h5>";
            echo "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
        } else if(mysqli_num_rows($check_deli) >= 1) {
            echo "<h5 class='text-danger'>มี Username นี้ในระบบแล้ว กรุณากรอกใหม่</h5>";
            echo "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
        } else if(mysqli_num_rows($check_admin) >= 1) {
            echo "<h5 class='text-danger'>มี Username นี้ในระบบแล้ว กรุณากรอกใหม่</h5>";
            echo "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
        }
        else {
            $sql = "INSERT INTO $position (firstname, lastname, address, img, username, password) VALUES ('$firstname', '$lastname', '$address', 'user.png', '$username', '$password');";
            $result = mysqli_query($conn, $sql, MYSQLI_ASSOC);
            if ($result == true) {
                echo "<h5 class='text-success container'>สมัครสมาชิกเสร็จสิ้น</h5>";
                echo "<a href='register.php' class='btn btn-danger mt-3'>กลับไปหน้าสมัครสมาชิก</a>";
                echo "<a href='login.php' class='btn btn-success mt-3 ms-3'>ไปหน้าเข้าสู่ระบบ</a>";
            }
        }
    }
} else {
?>
    <label for="username">Username</label>
    <input class="form-control my-1" type="text" name="username">
    <div class="d-flex flex-row gap-3">
        <div class="w-100">
            <label for="firstname">Firstname</label>
            <input class="form-control my-1" type="text" name="firstname">
        </div>
        <div class="w-100">
            <label for="lastname">Lastname</label>
            <input class="form-control my-1" type="text" name="lastname">
        </div>
    </div>
    <label for="address">Address</label>
    <input class="form-control my-1" type="text" name="address">
    <label for="password">Password</label>
    <input class="form-control my-1" type="password" name="password">
    <label for="position">Position</label>
    <select name="position" class="form-control my-1">
        <option value="customer">Customer</option>
        <option value="manager">Restaurant manager</option>
        <option value="delivery">Delivery</option>
    </select>
    <button class="btn btn-dark text-light my-2">Register</button>
    <p class="text-secondary">Already have an account? <a href="login.php">Login</a></p>
<?php } ?>