<div class="t1">
    <h2>All Messages</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Full Name </th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        include_once '../php/config.php';
        $sql = "Select * from Messages";
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
                    <td><?= $row["subject"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <?php
                    if ($row["status"] == 0) {
                    ?>
                        <td><button class="btn btn-danger" onclick="ChangeMessageStatus('<?= $row['mid'] ?>')"> Not Read</button></td>
                    <?php
                    } else {
                    ?>
                        <td><button class="btn btn-success" onclick="ChangeMessageStatus('<?= $row['mid'] ?>')">Read</button></td>
                    <?php
                    }
                    ?>
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>
</div>