<?php
// include('includes/head.php');
// include('../connections/conn.php');
// include('includes/function.php');

?>
<?php
$phone_one_with_country_code = '';
$phone_two_with_country_code = '';
if (isset($_POST['add-member'])) {
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
    $first_character_of_phone_one = substr($phoneone, 0, 1);


    if ($first_character_of_phone_one == 0) {
        $phone_one_with_country_code = preg_replace('/0/', '234', $phoneone, 1);
    } else {
        $phone_one_with_country_code = $phoneone;
    }


    $phonetwo = $_POST['phonetwo'];
    $first_character_of_phone_two = substr($phonetwo, 0, 1);

    if ($first_character_of_phone_two == 0) {
        $phone_two_with_country_code = preg_replace('/0/', '234', $phonetwo, 1);
    } else {
        $phone_two_with_country_code = $phonetwo;
    }


    $fb_id = $_POST['fb_id'];
    $family = $_POST['family'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $folder = "assets/images/users/";
    $linkdn = $_POST['likdn'];

    move_uploaded_file($tmp_name, $folder . $photo);


    $lecrosoft = "INSERT INTO `members`(`first_name`, `last_name`, `phone_number_one`, `phone_number_two`, `email`, `title`, `state`, `baptize_date`, `state_of_origin`, `marrital_status`, `employment_status`, `job_type`, `family`, `photo`, `date_of_birth`, `country`, `address`, `facebook`, `linktdin`, `city`, `gender`) VALUES
     ('$fname','$lname','$phone_one_with_country_code','$phone_two_with_country_code','$email','$title','$state','$bptdate','$stateoforigin','$marstatus','$empstatus','$jobtype','$family','$photo','$dob','$country','$address','$fb_id','$linkdn','$city','$gender')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft) or die(mysqli_error($con));


    if ($query_lecrosoft) {



        // echo '<script type="text/javascript">

        //                         location = "members.php";

        // </script>';
    }
}
