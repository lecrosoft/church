<?php
include_once('../../connections/conn.php');

if (isset($_POST['payId'])) {
    $payId = $_POST['payId'];

    $sql = "SELECT * FROM `wallet`  WHERE `payment_id` = $payId";
    $query_sql = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query_sql);
    extract($row);

?>
    <div class="container">
        <img height="400px" src="assets/images/pop/<?php echo $pop ?>" alt="">

    </div>
<?php

    // if ($query_sql) {
    //     echo "Confirmed";
    // } else {
    //     die(mysqli_error($con));
    // }
}
?>