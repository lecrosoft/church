<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>
<?php
if (isset($_REQUEST['fname'])) {
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];
    $stateoforigin = $_REQUEST['stateoforigin'];
    $marstatus = $_REQUEST['marstatus'];
    $empstatus = $_REQUEST['empstatus'];
    $bptdate = $_REQUEST['bptdate'];
    $jobtype = $_REQUEST['jobtype'];
    $title = $_REQUEST['title'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $email = $_REQUEST['email'];
    $country = $_REQUEST['country'];
    $phoneone = $_REQUEST['phoneone'];
    $phonetwo = $_REQUEST['phonetwo'];
    $fb_id = $_REQUEST['fb_id'];
    $family = $_REQUEST['family'];
    $department = $_REQUEST['department'];
    $linkdn = $_REQUEST['linkdn'];

    $lecrosoft = "INSERT INTO `members`(`first_name`, `last_name`, `phone_number_one`, `phone_number_two`, `email`, `title`, `state`, `baptize_date`, `state_of_origin`, `marrital_status`, `employment_status`, `job_type`, `family`, `department`, `date_of_birth`, `country`, `address`, `facebook`, `linktdin`, `city`, `gender`) VALUES
     ('$fname','$lname','$phoneone','$phonetwo','$email','$title','$state','$bptdate','$stateoforigin','$marstatus','$empstatus','$jobtype','$family','$department','$dob','$country','$address','$fb_id','$linkdn','$city','$gender')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    if (!$query_lecrosoft) {
        echo "Failed";
    }
}
