<?php
include('../connections/conn.php');
if (isset($_POST['input_email'])) {
    $input_email = $_POST['input_email'];
    $lecrosoft = "SELECT email FROM members WHERE email = '$input_email'";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $row = mysqli_fetch_assoc($query_lecrosoft);
    $db_email = $row['email'];
    if ($input_email == $db_email) {
        $word = "EmailMatched";
        echo trim($word);
    } else {
        echo '<div class="alert alert-danger" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Failed!</strong>
                                        There is no Existing User for this mail.
                                        </div>';
    }
}
