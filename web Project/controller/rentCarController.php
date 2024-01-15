<?php
include  "../php/config.php";
$av = $_POST['av'];
$response = array();
if ($av == "yes") {
    $cid = $_POST['c_id'];
    $uid = $_POST['u_id'];
    $fee = mysqli_real_escape_string($con, $_POST['fee']);
    $date = $_POST['date'];
    $duedate = $_POST['duedate'];
    $location = $_POST['location'];

    $sql = "Insert into rentals(car_id,cus_id,rfee,date,duedate,location) 
    Values ('$cid','$uid','$fee','$date','$duedate','$location')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $update = "UPDATE car Set available = 'no' where id = '$cid'";
        $rs = mysqli_query($con, $update);
        $response['success'] = true;
        $response['message'] = "Car Rented";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Car not Available";
}
mysqli_close($con);

echo json_encode($response);
