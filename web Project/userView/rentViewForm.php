<div class="container p-5">

    <h4>Rent Car Now!</h4>
    <?php
    include_once "../php/config.php";
    $cid = $_POST['record1'];
    $select = "Select * from car where id = '$cid'";
    $usid = $_POST['record2'];
    $select1 = "Select * from user where usid = '$usid'";
    $qry = mysqli_query($con, $select);
    $row = mysqli_fetch_array($qry);
    $qry1 = mysqli_query($con, $select1);
    $row1 = mysqli_fetch_array($qry1);

    ?>
    <form id="rentCar" onsubmit="rentCars()" enctype='multipart/form-data'>
        <input type="text" hidden value="<?= $cid ?>" id="c_id">
        <input type="text" hidden value="<?= $usid ?>" id="u_id">
        <input type="text" hidden value="<?= $row['available'] ?>" id="av">
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
            <span id="c_type"><?= $row['type'] ?></span>
        </div>
        <div class="form-group">
            <label>Pick-up Date : </label>
            <input type="datetime-local" id="date" required oninput="calculateFee()" min="<?= date('Y-m-d') ?>T00:00">
        </div>
        <div class="form-group">
            <label>Return Date : </label>
            <input type="datetime-local" id="duedate" required oninput="calculateFee()" min="<?= date('Y-m-d') ?>T00:00">
        </div>
        <div class="form-group">
            <label> Fee : </label>
            <span id="feePerDay" hidden><?= $row['fee'] ?></span>
            <span id="fee"></span>
        </div>
        <div class="form-group">
            <label> location : </label>
            <select id="location">
                <option value="">Select Location</option>
                <option value="Beirut">Beirut</option>
                <option value="Saida">Saida</option>
                <option value="Sour">Sour</option>
                <option value="Nabatieh">Nabatieh</option>
                <option value="Tripoli">Tripoli</option>
            </select>
        </div>
        <div class="form-group">
            <img width='200px' height='150px' src='../Images/<?= $row["image"] ?>'>
        </div>
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn1">Rent Now!</button>
        </div>
    </form>

</div>
<script>
    function calculateFee() {
        var currentDate = new Date(document.getElementById("date").value);
        var returnDate = new Date(document.getElementById("duedate").value);


        var feePerDay = parseFloat(document.getElementById("feePerDay").textContent);


        if (!isNaN(currentDate.getTime()) && !isNaN(returnDate.getTime())) {

            var timeDifference = returnDate.getTime() - currentDate.getTime();
            var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));


            var fee = daysDifference * feePerDay;

            document.getElementById("fee").textContent = "$" + fee;
        }
    }
</script>