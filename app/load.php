<?php
include('../connections/conn.php');


$data = array();
$lecrosoft = "SELECT * FROM event";
$query_lecrosoft = mysqli_query($con, $lecrosoft);

while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);

    $data[] = array(
        'id'   => $event_id,
        'title'   => $event_title,
        'start'   => $start_date,
        'end'   => $end_date
    );
};

echo json_encode($data);
