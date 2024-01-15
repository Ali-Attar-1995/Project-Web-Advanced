<div class="t1" id="ordersBtn">
    <h2>Rental Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>R.N.</th>
                <th>Car Type</th>
                <th>Customer</th>
                <th>Contact number</th>
                <th>Order Date</th>
                <th>Due Date</th>
                <th>Fee</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        include_once "../php/config.php";
        $sql = "SELECT rentals.rid, car.type, user.name, user.phone, rentals.rfee, rentals.date, rentals.duedate, rentals.location
        From rentals
        Inner JOIN car On rentals.car_id = car.id
        Inner JOIN user ON rentals.cus_id = user.usid";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= $row["rid"] ?></td>
                    <td><?= $row["type"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td><?= $row["duedate"] ?></td>
                    <td><?= $row["rfee"] ?></td>
                    <td><?= $row["location"] ?></td>
                    <td><button data-toggle="modal" data-target="#myModal" class="btn btn-danger" onclick="returnCarForm(<?= $row['rid'] ?>)">Return</button></td>
                </tr>
        <?php

            }
        }
        ?>

    </table>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Return car</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>

    </section>

</div>