<div class="t1">
    <h2>All Customers</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Username </th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        include_once '../php/config.php';
        $sql = "Select * from user where role = 'Customer'";
        $result = mysqli_query($con, $sql);
        $count = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {


        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="CustomerDelete('<?= $row['usid'] ?>')">Delete</button></td>
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>
</div>