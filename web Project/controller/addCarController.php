<?php
include_once  "../php/config.php";
if (isset($_POST['addcar'])) {
    $target = "../Images/" . basename($_FILES['c_Image']['name']);
    $image = $_FILES['c_Image']['name'];
    $type = $_POST['c_type'];
    $model = $_POST['c_model'];
    $fee = $_POST['c_fee'];

    $sql = "Insert Into car (type,model,available,fee,image) Values
    ('$type','$model','yes','$fee','$image')";
    $result = mysqli_query($con, $sql);
    if (($result)) {
        if (move_uploaded_file($_FILES['c_Image']['tmp_name'], $target)) {
            echo "Car Added";
        } else {
            echo "Error";
        }
    }
}
