<?php
include('../connections/conn.php');

if (isset($_POST['attendance_type_id_update'])) {
    $attendance_type_id_update = $_POST['attendance_type_id_update'];
    $attendance_type_update = $_POST['attendance_type_update'];


    $lecrosoft = "UPDATE `attendance_type` SET `attendance_type`='$attendance_type_update' WHERE attendance_type_id = $attendance_type_id_update";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = window.location.href </script>';
    }
}
