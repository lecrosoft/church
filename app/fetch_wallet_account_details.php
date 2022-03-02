<?php
include('../connections/conn.php');
if (isset($_POST['userId'])) {

    $userId = $_POST['userId'];
    $lecrosoft = "SELECT * FROM `wallet_payment_receiver` WHERE member_id = $userId";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>

<h4>Account Name: <?php echo $account_fullname ?></h4>
<h4>Account Number: <?php echo $account_number ?></h4>
<h4>Bank Name: <?php echo $bank_name ?></h4>