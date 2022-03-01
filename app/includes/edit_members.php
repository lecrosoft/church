<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lecrosoft = "SELECT * FROM members WHERE member_id = $id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<div class="row">


    <h4 class="page-title">Edit Member</h4>

    <div class="col-12  stretch-card">

        <div class="card">
            <form action="" autocomplete="off" method="POST" class="forms-sample" enctype="multipart/form-data">
                <input type="hidden" autocomplete="false">
                <div class="form-body">
                    <h3 class="box-title">Personal Info</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">First Name</label>
                                <div class="input-group mb-3">

                                    <select name="title" class="form-select form-control col-sm-4" required>
                                        <option value="<?php echo $title ?>"><?php echo $title ?></option>
                                        <option value="MR">MR</option>
                                        <option value="MRS">MRS</option>
                                        <option value="MISS">MISS</option>
                                        <option value="Pastor">Pastor</option>
                                        <option value="Prophetess">Prophetess</option>
                                        <option value="Evangelist">Evangelist</option>
                                    </select>

                                    <input type="text" name="fname" class="form-control col-sm-8" value="<?php echo $first_name ?>" aria-label="Text input with dropdown button" placeholder="e.g: Olumide" required>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="e.g: Ogundimu" value="<?php echo $last_name ?>" required />

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Gender</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="<?php echo $gender ?>"><?php echo $gender ?></option>

                                    <?php
                                    if ($gender == 'Male') {
                                        echo '<option value="Female">Female</option>';
                                    } elseif ($gender == 'Female') {
                                        echo '<option value="Male">Male</option>';
                                    } else {
                                        echo '<option value="">Select Gender</option>';
                                        echo '<option value="Male">Male</option>';
                                        echo '<option value="Female">Female</option>';
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $date_of_birth ?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">

                                <label class="control-label">State of Origin</label>
                                <?php
                                $lecrosoft = "SELECT * FROM state";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                ?>
                                <select class="form-control select2" name="stateoforigin" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $state_of_origin ?>"><?php echo $state_of_origin ?></option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        $state = $row['state'];


                                        echo "<option value='$state'>$state</option>";
                                    }
                                    ?>


                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Marital Status</label>
                                <select class="form-control" name="marstatus" required>
                                    <option value="<?php echo $marrital_status ?>"><?php echo $marrital_status ?></option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                </select>

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label">Employment Status</label>
                                <select class="form-control" name="empstatus">
                                    <option value="<?php echo $employment_status ?>"><?php echo $employment_status ?></option>
                                    <option value="Employed">Employed</option>
                                    <option value="SelfEmployed">Self Employed</option>
                                    <option value="Unemployed">Unemployed</option>

                                </select>

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Baptize Date</label>
                                <input type="date" class="form-control" name="bptdate" value="<?php echo $baptize_date ?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Job Type</label>
                                <input type="text" name="jobtype" class="form-control" value="<?php echo $job_type ?>" placeholder="e.g:Programmer,Banker,Trader" />

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" id="photo" name="photo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" value="<?php echo $photo ?>" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <h3 class="box-title m-t-40">Address</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo $address ?>" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" value="<?php echo $city ?>" class="form-control" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">State</label>
                                <?php
                                $lecrosoft = "SELECT * FROM state";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                ?>
                                <select class="form-control select2" name="state" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $state ?>"><?php echo $state ?></option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        $state = $row['state'];

                                        echo "<option value='$state'>$state</option>";
                                    }
                                    ?>


                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="eg: customercare@lecrosoft.com" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control select2" name="country">
                                    <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                    <option>Nigeria</option>

                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number one</label>
                                <input type="text" name="phoneone" class="form-control" value="<?php echo $phone_number_one ?>" placeholder="eg: +2348104986022" required />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number two (whatsapp)</label>
                                <input type="text" name="phonetwo" class="form-control" value="<?php echo $phone_number_two ?>" placeholder="eg: +2348104986022" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook id</label>
                                <input type="text" name="fb_id" value="<?php echo $facebook ?>" class="form-control" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkdn id</label>
                                <input type="text" name="likdn" value="<?php echo $linktdin ?>" class="form-control" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Family</label>
                                <?php
                                $lecrosoft = "SELECT * FROM family";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                ?>
                                <select class="form-control form-select select2" name="family">
                                    <option value="<?php echo $family ?>"><?php echo $family ?></option>


                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        $family_name = $row['family_name'];

                                        echo "<option value='$family_name'>$family_name</option>";
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>
                        <!-- span -->
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label" <?php echo $hidden ?>>User Type</label>
                                <select class="form-control form-select " name="user_type" <?php echo $hidden ?>>
                                    <option value="<?php echo $user_type ?>"><?php echo $user_type ?></option>


                                    <?php
                                    if ($user_type == "pastor") {
                                        echo "<option value='member'>Member</option>";
                                    } elseif ($user_type == "member") {
                                        echo "<option value='pastor'>Pastor</option>";
                                    }
                                    ?>


                                </select>


                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label" <?php echo $hidden ?>>Status</label>
                                <select class="form-control" name="status" <?php echo $hidden ?>>
                                    <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <?php
                                    if ($status == "Active") {
                                        echo "<option value='Non_Active'>Non Active</option>";
                                    } elseif ($status == "Non_Active") {
                                        echo "<option value='Active'>Active</option>";
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label" <?php echo $hidden ?>>User role</label>
                                <?php
                                $sql = "SELECT * FROM `user_role`";
                                $query_lecrosoft = mysqli_query($con, $sql);

                                ?>

                                <select class="form-control" name="user_role" <?php echo $hidden ?>>

                                    <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>


                                    <?php
                                    if ($user_role == "Admin") {
                                        echo "<option value='member'>member</option>";
                                    } elseif ($user_role == "member") {
                                        echo "<option value='Admin'>Admin</option>";
                                    }
                                    ?>








                                </select>

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label">Username</label>
                                <input type="text" autocomplete="off" class="form-control" name="username" value="<?php echo $username ?>">

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label">Password</label>
                                <input type="password" autocomplete="off" class="form-control" name="password" value="<?php echo $password ?>">


                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label" <?php echo $hidden ?>>Can accept wallent payment?</label>
                                <select name="can_accept_wallet" class="form-select form-control" id="" <?php echo $hidden ?>>
                                    <option value="<?php echo $can_accept_wallet_payment ?>"><?php echo $can_accept_wallet_payment ?></option>

                                    <?php
                                    if ($can_accept_wallet_payment == "No") {
                                        echo "<option value='Yes'>Yes</option>";
                                    } elseif ($can_accept_wallet_payment == "Yes") {
                                        echo "<option value='No'>No</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <!--/span-->
                        <!-- <div class="col-md-6">
                            <div class="form-group">


                                <label class="control-label">Password</label>
                                <input type="password" autocomplete="off" class="form-control" name="password" value="<?php echo $password ?>">


                            </div>
                        </div> -->
                        <!--/span-->
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" name="update_members" class="btn btn-gradient-primary add-member">
                        <i class="fa fa-check"></i> Update
                    </button>
                    <!-- <button type="button" class="btn btn-default">
                                Cancel
                            </button> -->
                </div>
            </form>
        </div>
    </div>

</div>


<?php include('update_members.php') ?>



<!-- </div>
</div>
</div> -->




<!-- /.row -->
<!-- .right-sidebar -->




<?php
// if (isset($_POST['add-member'])) {
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $gender = $_POST['gender'];
//     $dob = $_POST['dob'];
//     $stateoforigin = $_POST['stateoforigin'];
//     $marstatus = $_POST['marstatus'];
//     $empstatus = $_POST['empstatus'];
//     $bptdate = $_POST['bptdate'];
//     $jobtype = $_POST['jobtype'];
//     $title = $_POST['title'];
//     $address = $_POST['address'];
//     $city = $_POST['city'];
//     $state = $_POST['state'];
//     $email = $_POST['email'];
//     $country = $_POST['country'];
//     $phoneone = $_POST['phoneone'];
//     $phonetwo = $_POST['phonetwo'];
//     $fb_id = $_POST['fb_id'];
//     $family = $_POST['family'];

//     $linkdn = $_POST['likdn'];
//     $photo = $_FILES["photo"]["name"];
//     $temp_file = $_FILES["photo"]["tmp_name"];
//     $folder = "assets/images/users/";

//     if (move_uploaded_file($temp_file, $folder)) {


//         $lecrosoft = "INSERT INTO `members`(`first_name`, `last_name`, `phone_number_one`, `phone_number_two`, `email`, `title`, `state`, `baptize_date`, `state_of_origin`, `marrital_status`, `employment_status`, `job_type`, `family`, `photo`, `date_of_birth`, `country`, `address`, `facebook`, `linktdin`, `city`, `gender`) VALUES
//      ('$fname','$lname','$phoneone','$phonetwo','$email','$title','$state','$bptdate','$stateoforigin','$marstatus','$empstatus','$jobtype','$family','$photo','$dob','$country','$address','$fb_id','$linkdn','$city','$gender')";
//         $query_lecrosoft = mysqli_query($con, $lecrosoft);
//     } else {
//         echo $folder;
//     }

//     if ($query_lecrosoft) {



//         // echo '<script type="text/javascript">

//         //                         location = "members.php";

//         // </script>';
//     }
// }
?>