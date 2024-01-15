<?php


include_once "../php/config.php";
$mid = $_POST['record'];
$sql = "SELECT status from messages where mid='$mid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if ($row["status"] == 0) {
    $update = mysqli_query($con, "UPDATE messages SET status = 1 where mid='$mid'");
} else if ($row["status"] == 1) {
    $update = mysqli_query($con, "UPDATE messages SET status = 0 where mid='$mid'");
}
