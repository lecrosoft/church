
<?php
include_once('../../connections/conn.php');

if (isset($_POST['first_timer_id'])) {
    $first_timer_id = $_POST['first_timer_id'];

    $sql = "DELETE FROM `first_timers` WHERE first_timmer_id = $first_timer_id";
    $query_sql = mysqli_query($con, $sql);

    if ($query_sql) {
        echo "deleted";
    } else {
        die(mysqli_error($con));
    }
}
?>