<?php include('includes/head.php');


include('../connections/conn.php');




//insert.php



//delete.php

if (isset($_POST["id"])) {
    $event_id = $_POST["id"];
    $query = "DELETE from event WHERE event_id = $event_id";
    $statement = mysqli_query($con, $query);
    // $statement->execute(
    //     array(
    //         ':id' => $_POST['id']
    //     )
    // );
}
