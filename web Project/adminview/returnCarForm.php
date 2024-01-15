<div class="container p-5">

    <?php
    include_once "../php/config.php";
    $rid = $_POST['record'];
    $sql = "SELECT rentals.rid, car.id, car.type, car.image, car.fee, car.available, user.name, user.phone, rentals.rfee, rentals.date, rentals.duedate, rentals.location
        From rentals
        Inner JOIN car On rentals.car_id = car.id
        Inner JOIN user ON rentals.cus_id = user.usid
        WHERE rid = '$rid'";
    $result = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_array($result);

    ?>
    <form id="returnCar" onsubmit="returnCars(<?= $rid ?>,<?= $row1['id'] ?>)" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="name">UserName : </label>
            <input type="text" class="form-control" id="c_name" readonly placeholder="<?= $row1['name'] ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone-number</label>
            <input type="text" class="form-control" id="c_phone" readonly placeholder="<?= $row1['phone'] ?>">
        </div>
        <div class="form-group">
            <label>Car Type : </label>
            <span id="c_type"><?= $row1['type'] ?></span>
        </div>
        <div class="form-group">
            <label>Pick-up Date : </label>
            <input type="datetime-local" id="date" readonly min="<?= date('Y-m-d') ?>T00:00" value="<?= $row1['date'] ?>">
        </div>
        <div class="form-group">
            <label>Return Date : </label>
            <input type="datetime-local" id="duedate" readonly min="<?= date('Y-m-d') ?>T00:00" value="<?= $row1['duedate'] ?>">
        </div>
        <div class="form-group">
            <label> Days returned : </label>
            <input type="datetime-local" id="day" required min="<?= date('Y-m-d') ?>T00:00" oninput="calculateFee()">
        </div>
        <div class="form-group">
            <label>Days Elapsed : </label>
            <span id="e_days"></span>
        </div>
        <div class="form-group">
            <label>Paid : </label>
            <span id="fee"><?= $row1['rfee'] ?></span>
        </div>
        <div class="form-group">
            <label> Fee : </label>
            <span id="feePerDay" hidden><?= $row1['fee'] ?></span>
            <span id="t_fee"></span>
        </div>
        <div class="form-group">
            <label> location : </label>
            <span id="location"><?= $row1['location'] ?></span>
        </div>
        <div class="form-group">
            <img width='200px' height='150px' src='../Images/<?= $row1["image"] ?>'>
        </div>
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn1">Return Car</button>
        </div>
    </form>

</div>

<script>
    function calculateFee() {
        var currentDate = new Date();
        var dueDate = new Date(document.getElementById("duedate").value);
        var returnDate = new Date(document.getElementById("day").value);

        var feePerDay = parseFloat(document.getElementById("feePerDay").textContent);


        var timeDifference = returnDate.getTime() - dueDate.getTime();
        var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

        var fee = daysDifference * feePerDay;
        if (daysDifference >= 0) {
            document.getElementById("e_days").textContent = daysDifference;
            document.getElementById("t_fee").textContent = "$" + fee;
        } else {
            document.getElementById("e_days").textContent = 0;
            document.getElementById("t_fee").textContent = "$" + 0;
        }


    }
</script>