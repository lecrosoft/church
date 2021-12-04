<?php
include('../../connections/conn.php');
if (isset($_POST['campaignId'])) {
    $campaignId = $_POST['campaignId'];
    $member_id = $_POST['member_id'];

?>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Payment Date</th>

            </tr>
        </thead>
        <tbody>
        <?php
        $lecrosoft = "SELECT * FROM pledges_payment_histroy LEFT JOIN payment_method ON  pledges_payment_histroy.payment_method_id = payment_method.id  WHERE campaign_id = $campaignId AND member_id = $member_id" or die(mysqli_error($con));
        $query_lecrosoft = mysqli_query($con, $lecrosoft);
        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
            extract($row);
            echo "<tr>";
            echo "<td>$description</td>";
            echo "<td>$amount</td>";
            echo "<td>$payment_method</td>";
            echo "<td>$payment_date</td>";
            echo "</tr>";
        }
    }
        ?>
        </tbody>
    </table>