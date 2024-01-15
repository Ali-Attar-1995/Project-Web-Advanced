<?php
include_once "../php/config.php";
$rid = $_POST['record1'];
$cid = $_POST['record2'];
$delete = "delete from rentals where rid = '$rid'";
$result = mysqli_query($con, $delete);

if ($result) {
    $update = "UPDATE car SET available = 'yes' WHERE id = '$cid'";
    $rs = mysqli_query($con, $update);
} else {
    echo "Not able to delete";
}
