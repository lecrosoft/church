
<?php
include_once('../../connections/conn.php');

if (isset($_POST['pastorId'])) {
    $user_id = $_POST['pastorId'];

    $sql = "DELETE FROM `members` WHERE user_type ='pastor' && member_id = $user_id";
    $query_sql = mysqli_query($con, $sql);

    if ($query_sql) {
        echo "deleted";
    } else {
        die(mysqli_error($con));
    }
}
?>