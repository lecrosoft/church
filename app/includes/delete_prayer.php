
<?php
include_once('../../connections/conn.php');

if (isset($_POST['prayerId'])) {
    $prayerId = $_POST['prayerId'];

    $sql = "DELETE FROM `prayer_request` WHERE `prayer_request_id` = $prayerId";
    $query_sql = mysqli_query($con, $sql);

    if ($query_sql) {
        echo "deleted";
    } else {
        die(mysqli_error($con));
    }
}
?>