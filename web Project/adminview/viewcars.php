<div class="t1">
    <h2>All Cars</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Car Image </th>
                <th class="text-center">Car Type</th>
                <th class="text-center">Car Model</th>
                <th class="text-center">Car Fee</th>
                <th class="text-center">Available</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        include_once '../php/config.php';
        $sql = "Select * from car";
        $result = mysqli_query($con, $sql);
        $count = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {


        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td>
                        <div class="box-img">
                            <img src="../Images/<?= $row["image"] ?>" alt="">
                        </div>
                    </td>
                    <td><?= $row["type"] ?></td>
                    <td><?= $row["model"] ?></td>
                    <td><?= $row["fee"] ?> $/day </td>
                    <td><?= $row["available"] ?></td>
                    <td><button class="btn btn-primary" style="height:40px" onclick="CarEditForm('<?= $row['id'] ?>')">Edit</button></td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="CarDelete('<?= $row['id'] ?>')">Delete</button></td>
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>
    <button type="button" class="btn1" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Car
    </button>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Car</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' onsubmit="addCars()" method="POST">
                        <div class="form-group">
                            <label for="type">Car Type:</label>
                            <input type="text" class="form-control" id="c_type" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Car model</label>
                            <input type="text" class="form-control" id="c_model" required>
                        </div>
                        <div class="form-group">
                            <label for="fee">Car Fee</label>
                            <input type="number" class="form-control" id="c_fee" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Choose Image:</label>
                            <input type="file" class="form-control-file" id="c_Image">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn1" id="addcar" style="height:40px">Add Car</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>