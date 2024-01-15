<?php
include_once "../php/config.php";
$id = $_POST['record'];
$delete = "delete from car where id = '$id'";
$result = mysqli_query($con, $delete);

if ($result) {
    echo "Car Deleted";
} else {
    echo "Not able to delete";
}
