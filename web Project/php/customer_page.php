<?php
include '../php/config.php';
session_start();
if (isset($_SESSION['usid'])) {
    $usid = $_SESSION['usid'];
    $select = "SELECT * FROM user WHERE usid = '$usid'";
    $result1 = mysqli_query($con, $select);
    $row1 = mysqli_fetch_assoc($result1);
}
$sql = "SELECT * FROM car";

$result2 = mysqli_query($con, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="../Images/jeep.png" alt="" /></a>
        <div class="fas fa-bars" id="menu-icon2"></div>
        <ul class="navbar2">
            <li><a href="../index.php#home">Home</a></li>
            <li><a href="../index.php#ride">Ride</a></li>
            <li><a href="#home1">Rent</a></li>
            <li><a href="../index.php#about">About</a></li>
            <li><a href="../index.php#contact">Contact Us</a></li>
        </ul>
        <div class="header-btn">
            <?php

            if (isset($_SESSION['usid'])) {
                echo '<a href="signout.php" class="sign-in">Sign out</a>';
            } else {
                echo '<a href="login_page.php" class="sign-in">Sign In</a>';
            }
            ?>

        </div>
    </header>
    <section class="home1" id="#home1">
        <div class="heading">
            <h1>Welcome</h1>
            <?php
            if (isset($_SESSION['usid'])) {
            ?>
                <span><?= $row1["name"]; ?></span>
            <?php
            }
            ?>

        </div>

        <div class="user-container">
            <?php
            while ($row = mysqli_fetch_assoc($result2)) {
            ?>
                <div class="box">
                    <div class="box-img">
                        <img src="../Images/<?php echo $row["image"]; ?>" alt="">
                    </div>
                    <p><?php echo $row["model"]; ?></p>
                    <h3><?php echo $row["type"]; ?></h3>
                    <h2>$<?php echo $row["fee"]; ?> <span>/Day</span></h2>
                    <?php
                    if (isset($_SESSION['usid'])) {
                    ?>
                        <a class="btn" data-toggle="modal" data-target="#myModal" onclick="rentViewFrom(<?= $row['id'] ?> , <?= $usid ?>)">Rent Now</a>
                    <?php
                    } else {
                    ?>
                        <a class="btn" href="../php/login_page.php">Login Now</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Rent A Car</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </section>

</body>
<script src="../js/jquery-3.1.1.js"></script>
<script src="../js/ajax.js"></script>
<script>
    let menu = document.querySelector("#menu-icon2");
    let navbar = document.querySelector(".navbar2");

    menu.onclick = () => {
        menu.classList.toggle("fa-x");
        navbar.classList.toggle("active");
    };
    window.onscroll = () => {
        menu.classList.remove("fa-x");
        navbar.classList.remove("active");
    };
</script>

<script src="https://kit.fontawesome.com/096572d129.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>