<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>
<?php
if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $stateoforigin = $_POST['stateoforigin'];
    $marstatus = $_POST['marstatus'];
    $empstatus = $_POST['empstatus'];
    $bptdate = $_POST['bptdate'];
    $jobtype = $_POST['jobtype'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phoneone = $_POST['phoneone'];
    $phonetwo = $_POST['phonetwo'];
    $fb_id = $_POST['fb_id'];
    $family = $_POST['family'];
    $department = $_POST['department'];
    $linkdn = $_POST['linkdn'];

    $lecrosoft = "INSERT INTO `members`(`first_name`, `last_name`, `phone_number_one`, `phone_number_two`, `email`, `title`, `state`, `baptize_date`, `state_of_origin`, `marrital_status`, `employment_status`, `job_type`, `family`, `department`, `date_of_birth`, `country`, `address`, `facebook`, `linktdin`, `city`, `gender`) VALUES
     ('$fname','$lname','$phoneone','$phonetwo','$email','$title','$state','$bptdate','$stateoforigin','$marstatus','$empstatus','$jobtype','$family','$department','$dob','$country','$address','$fb_id','$linkdn','$city','$gender')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    if ($query_lecrosoft) {



        // echo '<script type="text/javascript">

        //                         location = "members.php";

        // </script>';
    }
}
