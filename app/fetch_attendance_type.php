<?php
include('../connections/conn.php');
if (isset($_POST['atendanceTypeId'])) {

    $atendanceTypeId = $_POST['atendanceTypeId'];
    $lecrosoft = "SELECT * FROM `attendance_type` WHERE attendance_type_id = $atendanceTypeId";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<form method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="attendance_type_id" name="attendance_type" placeholder="Enter attendance type" value='<?php echo $attendance_type ?>'>

    </div>



    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary attendance_update" id="<?php echo $atendanceTypeId ?>">Save changes</button>
    </div>
</form>

<?php
// if (isset($_POST['update'])) {
//     $fam_id = $_POST['update'];

//     $lecrosoft = "UPDATE `family` SET `family_name`='$family_name',`family_leader`='$family_leader',`family_quantity`=$family_quantity,`family_contact`='$family_contact',`address`='$address',`status`='$status',`join_date`='$join_date' WHERE `family_id` = $fam_id";
//     $query_lecrosoft = mysqli_query($con, $lecrosoft);
//     if (!$query_lecrosoft) {
//         echo '<script type=text/javascript>location = "family.php"</script>';
//     } else {
//         die("QUERY ERROR" . mysqli_error($con));
//     }
// }
?>
<!-- <script src="./includes/script.js"></script> -->