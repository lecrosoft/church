<?php include('includes/head.php');


include('../connections/conn.php');




//insert.php



if (isset($_POST["title"])) {

    $event_title = $_POST['title'];
    $start_date = $_POST['start'];
    $end_date = $_POST['end'];
    $query = "INSERT INTO event (event_title, start_date, end_date) 
 VALUES ('$event_title','$start_date','$end_date')";
    $statement = mysqli_query($con, $query);

    // if ($statement) {
    //     array(
    //         ':event_title'  => $_POST['title'],
    //         ':start_date' => $_POST['start'],
    //         ':end_date' => $_POST['end']
    //     );
    // }
}
