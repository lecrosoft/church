<?php
if (isset($_POST['update_members'])) {

    $member_id = $_GET['id'];
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
    $phone_one_with_code = '';
    $phoneone = $_POST['phoneone'];
    $phone_one_first_digit = substr($phoneone, 0, 1);

    if ($phone_one_first_digit == 0) {
        $phone_one_with_code = preg_replace('/0/', 234, $phoneone, 1);
    } else {
        $phone_one_with_code = $phoneone;
    }


    $phone_two_with_code = '';
    $phonetwo = $_POST['phonetwo'];
    $phone_two_first_digit = substr($phonetwo, 0, 1);

    if ($phone_two_first_digit == 0) {
        $phone_two_with_code = preg_replace('/0/', 234, $phonetwo, 1);
    } else {
        $phone_two_with_code = $phonetwo;
    }

    $fb_id = $_POST['fb_id'];
    $family = $_POST['family'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $folder = "assets/images/users/";
    $linkdn = $_POST['likdn'];
    $status = $_POST['status'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $can_accept_wallet = $_POST['can_accept_wallet'];
    move_uploaded_file($tmp_name, $folder . $photo);
    $sql = "UPDATE `members` SET `title`='$title',`first_name`='$fname',`last_name`='$lname',`phone_number_one`='$phone_one_with_code',`phone_number_two`='$phone_two_with_code',`email`='$email',`photo`='$photo',`state`='$state',`baptize_date`='$bptdate',`state_of_origin`='$stateoforigin',`marrital_status`='$marstatus',`employment_status`='$empstatus',`job_type`='$jobtype',`family`='$family',`country`='$country',`address`='$address',`facebook`='$fb_id',`linktdin`='$linkdn',`city`='$city',`gender`='$gender',`status`='$status',`date_of_birth`='$dob',`username`='$username',`password`='$password',`user_role`='$user_role',`user_type`='$user_type',`can_accept_wallet_payment`='$can_accept_wallet' WHERE `member_id` = $member_id";
    $query_sql = mysqli_query($con, $sql) or die(mysqli_error($con));

    if ($query_sql) {
        echo '<script type="text/javascript"> 
        $(document).ready(function(){
        Swal.fire(
        "Good job!",
        "Record Successfully Updated!",
        "success"
        showConfirmButton:false
        timer:1500
        )

        }) ;
        </script>';


        echo '<script type="text/javascript"> location = window.location.href </script>';
    }






    // if ($query_sql) {
    //     echo "RECORD SUCCESSFULLY UPDATED";
    // }
};
