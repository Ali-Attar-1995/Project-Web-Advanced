<?php
include_once "../php/config.php";
$usid = $_POST['record'];
$delete = "delete from user where usid = '$usid'";
$result = mysqli_query($con, $delete);

if ($result) {
    echo "Customer Deleted";
} else {
    echo "Not able to delete";
}
