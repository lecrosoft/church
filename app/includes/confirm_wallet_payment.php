
<?php
include_once('../../connections/conn.php');

if (isset($_POST['transacId'])) {
    $transacId = $_POST['transacId'];

    $sql = "UPDATE `wallet` SET `status`='confirmed' WHERE `payment_id` = $transacId ";
    $query_sql = mysqli_query($con, $sql);

    if ($query_sql) {
        echo "Confirmed";
    } else {
        die(mysqli_error($con));
    }
}
?>