<?php
include_once "../php/config.php";

$c_id = $_POST['c_id'];
$c_type = $_POST['c_type'];
$c_model = $_POST['c_model'];
$c_fee = $_POST['c_fee'];
$newImage = $_FILES['newImage']['name'];
$oldImage = $_POST['oldImage'];

if ($newImage != '') {
    $update_image = $_FILES['newImage']['name'];
} else {
    $update_image = $oldImage;
}

$update = "Update car set type = '$c_type', model = '$c_model', fee = '$c_fee', image = '$update_image' where id ='$c_id'";

$sql = mysqli_query($con, $update);

if ($sql) {
    if ($_FILES['newImage']['name'] != '') {
        move_uploaded_file($_FILES['newImage']['tmp_name'], "../Images/" . basename($_FILES['newImage']['name']));
        echo "update Succefully";
    }
} else {
    echo "Error";
}
