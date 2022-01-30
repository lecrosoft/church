
<?php
include_once('../../connections/conn.php');

if (isset($_POST['eventId'])) {
    $eventId = $_POST['eventId'];

    $sql = "DELETE FROM `event` WHERE event_id = $eventId";
    $query_sql = mysqli_query($con, $sql);

    if ($query_sql) {
        echo "deleted";
    } else {
        die(mysqli_error($con));
    }
}
?>