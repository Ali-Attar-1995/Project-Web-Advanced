<div class="container p-5">

    <h4>Edit Car Details</h4>
    <?php
    include_once "../php/config.php";
    $id = $_POST['record'];
    $select = "Select * from car where id = '$id'";
    $qry = mysqli_query($con, $select);
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateCars()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="c_id" value="<?= $row1['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="name">Car Type</label>
                    <input type="text" class="form-control" id="c_type" value="<?= $row1['type'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Car Model</label>
                    <input type="text" class="form-control" id="c_model" value="<?= $row1['model'] ?>">
                </div>
                <div class="form-group">
                    <label for="price">Car Fee</label>
                    <input type="number" class="form-control" id="c_fee" value="<?= $row1['fee'] ?>">
                </div>
                <div class="form-group">
                    <img width='200px' height='150px' src='../Images/<?= $row1["image"] ?>'>
                    <div>
                        <label for="file">Choose Image:</label>
                        <input type="text" id="oldImage" class="form-control" value="<?= $row1["image"] ?>" hidden>
                        <input type="file" id="newImage" value="">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn1">Update Car</button>
                </div>
        <?php
        }
    }
        ?>
            </form>

</div>