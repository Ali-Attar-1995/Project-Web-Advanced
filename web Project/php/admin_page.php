<?php
include '../php/config.php';
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <?php
    include 'adminnav.php';
    ?>

    <section class="home" id="#home">
        <div class="heading">
            <h1>Welcome</h1>
            <span>Admin <?php echo $_SESSION['admin_name'] ?></span>
        </div>
        <div class="admin-container">
            <div class="box">
                <div class="box-img">
                    <img src="../Images/users.svg">
                </div>
                <h4>Total Customers</h4>
                <h5>
                    <?php
                    $select = "Select * from user where role = 'Customer'";
                    $result = mysqli_query($con, $select);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="../Images/cars.svg">
                </div>
                <h4>Total Cars</h4>
                <h5>
                    <?php
                    $select = "Select * from car";
                    $result = mysqli_query($con, $select);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="../Images/rents.svg">
                </div>
                <h4>Total Rents</h4>
                <h5>
                    <?php
                    $select = "Select * from rentals";
                    $result = mysqli_query($con, $select);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="../Images/message.svg">
                </div>
                <h4>Total Messages</h4>
                <h5>
                    <?php
                    $select = "Select * from messages";
                    $result = mysqli_query($con, $select);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
        </div>
    </section>
    <br><br><br>
</body>
<script src="../js/jquery-3.1.1.js"></script>
<script src="../js/ajax.js"></script>
<script>
    let menu1 = document.querySelector("#menu-icon1");
    let navbar1 = document.querySelector(".navbar1");

    menu1.onclick = () => {
        menu1.classList.toggle("fa-x");
        navbar1.classList.toggle("active");
    };
    window.onscroll = () => {
        menu1.classList.remove("fa-x");
        navbar1.classList.remove("active");
    };
</script>
<script src="https://kit.fontawesome.com/096572d129.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>