<?php
include('../connections/conn.php');
if (isset($_REQUEST['state']) && isset($_REQUEST['id'])) {
    $query = "UPDATE comment SET comment_status= '" . $_REQUEST['state'] . "' WHERE comment_id ='" . $_REQUEST['id'] . "'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error' . mysqli_error($con));
    } else {
        echo 'Success';
    }
}
