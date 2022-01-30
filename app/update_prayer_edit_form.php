<?php
include('../connections/conn.php');

if (isset($_POST['prayerIdToSend'])) {
    $prayerIdToSend = $_POST['prayerIdToSend'];
    $prayerStatus = $_POST['prayerStatus'];

    $lecrosoft = "UPDATE `prayer_request` SET `status`= '$prayerStatus' WHERE prayer_request_id = $prayerIdToSend ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = window.location.href </script>';
    }
}
