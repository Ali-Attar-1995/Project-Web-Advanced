<?php
require_once '../php/config.php';
session_start();


if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $select = "Select * from user where email = '$email' && password = '$pass'";
    $result = mysqli_query($con, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['role'] == 'Admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location: ../php/admin_page.php');
        } elseif ($row['role'] == 'Customer') {
            $_SESSION['usid'] = $row['usid'];
            header('location: ../index.php');
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>

<body>
    <div class="wrapper login">
        <span class="icon-close"><a href="../index.php"><ion-icon name="close"></ion-icon></a></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="post">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class = "error-msg">' . $error . '</span>';
                    }
                }
                ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password ? </a>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="../php/registration_page.php" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>