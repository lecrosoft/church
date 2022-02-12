<?php
include('../../connections/conn.php');

$attendanceDate = $_POST['attendanceDate'];
$departmentId = $_POST['departmentId'];
$attendanceType = $_POST['attendanceType'];

$myresult = array();
$lecrosoft = "SELECT * FROM department_member LEFT JOIN members ON department_member.member_id = members.member_id LEFT JOIN department_position ON department_member.department_position_id = department_position.department_position_id WHERE department_id = $departmentId";

$query_lecrosoft = mysqli_query($con, $lecrosoft);

// $count = mysqli_num_rows($query_lecrosoft);
// $result = array(mysqli_fetch_assoc($query_lecrosoft));
while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    array_push($myresult, $row);
}
echo json_encode($myresult);
