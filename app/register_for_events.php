<?php
include('../connections/conn.php');
session_start();
$member_id =  $_SESSION['member_id'];
if (isset($_POST['eventId'])) {

    $eventId = $_POST['eventId'];
    $reg_status = "Registered";
    $lecrosoft = "INSERT INTO `event_attendant`(`event_id`, `member_id`, `status`) VALUES ($eventId,$member_id,'$reg_status')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {


        $update_event_count = "UPDATE `event` SET applicant_count = applicant_count + 1  WHERE `event_id` = $eventId";
        $query_update = mysqli_query($con, $update_event_count);
    }
}
