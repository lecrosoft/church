<div class="row">




    <div class="col-md-12">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-body">
                <h3 class="box-title">Person Info</h3>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">First Name</label>
                            <div class="input-group mb-3">

                                <select name="title" class="form-select form-control col-sm-4" required>
                                    <option value="">Select Title</option>
                                    <option value="MR">MR</option>
                                    <option value="MRS">MRS</option>
                                    <option value="MISS">MISS</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Prophetess">Prophetess</option>
                                    <option value="Evangelist">Evangelist</option>
                                </select>

                                <input type="text" name="fname" class="form-control col-sm-8" aria-label="Text input with dropdown button" placeholder="e.g: Olumide" required>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="e.g: Ogundimu" required />

                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Gender</label>
                            <select class="form-control" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy" />
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">State of Origin</label>
                            <?php
                            $lecrosoft = "SELECT * FROM state";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            ?>
                            <select class="form-control" name="stateoforigin" data-placeholder="Choose a Category" tabindex="1">
                                <option value="Category 2">Select State</option>
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
                            <select class="form-control" name="maritalstatus" required>
                                <option value="">Select Marital Status</option>
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
                            <select class="form-control" name="emplyStatus">
                                <option value="Employed">Employed</option>
                                <option value="Self Employed">Self Employed</option>
                                <option value="Unemployed">Unemployed</option>

                            </select>

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Baptize Date</label>
                            <input type="date" class="form-control" name="baptizeDate" placeholder="dd/mm/yyyy" />
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Position</label>
                            <select class="form-control" name="position">
                                <option value="Employed">Select Position</option>
                                <?php
                                $sql = "SELECT * FROM position";
                                $sql_query = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($sql_query)) {
                                    extract($row);
                                    echo "<option value='$position_id'>$position_title</option>";
                                }
                                ?>



                            </select>

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" />

                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Salary</label>
                            <input type="number" name="salary" class="form-control" placeholder="e.g:20000 " required />
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">CV/document</label>
                            <input type="file" id="cv" name="cv" class="form-control" />

                        </div>

                        <div class="form-group">
                            <!-- <label class="control-label">Member type</label> -->
                            <input type="text" id="member_type" name="member_type" class="form-control hidden" value="pastor" />

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
                            <input type="text" name="address" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" />
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
                            <select class="form-control" name="state" data-placeholder="Choose a Category" tabindex="1">

                                <option value="">Select State</option>
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
                            <input type="email" name="email" class="form-control" placeholder="eg: customercare@lecrosoft.com" />
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" name="country">
                                <option>--Select your Country--</option>
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
                            <input type="text" name="phoneone" class="form-control" required />
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number two (whatsapp)</label>
                            <input type="text" name="phonetwo" class="form-control" />
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Facebook id</label>
                            <input type="text" name="fb_id" class="form-control" />
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Linkdn id</label>
                            <input type="text" name="likdn" class="form-control" />
                        </div>
                        <div class="form-group">
                            <!-- <label>user role</label> -->
                            <input type="text" name="user_role" class="form-control" value="pastor" hidden />
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
                            <select class="form-control select2" name="family">
                                <option value="">Select Family</option>

                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        $family_name = $row['family_name'];

                                        echo "<option value='$family_name'>$family_name</option>";
                                    }
                                    ?>
                                </optgroup>

                            </select>

                        </div>
                    </div>
                    <!--/span-->

                </div>
                <!--/span-->
            </div>
            <!--/row-->
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success add-member" name="submit">
            <i class="fa fa-check"></i> Save
        </button>
        <!-- <button type="button" class="btn btn-default">
                                Cancel
                            </button> -->
    </div>
    </form>
</div>
</div>



<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $stateoforigin = $_POST['stateoforigin'];
    $marstatus = $_POST['maritalstatus'];
    $empstatus = $_POST['emplyStatus'];
    $bptdate = $_POST['baptizeDate'];
    $position = $_POST['position'];
    $photo = $_FILES['photo']['name'];
    $temp_file = $_FILES['photo']['tmp_name'];
    $folder = "assets/images/users/" . $photo;

    $salary = $_POST['salary'];
    $cv = $_FILES['cv']['name'];
    $cv_temp_files = $_FILES['cv']['tmp_name'];
    $cv_folder = "assets/cv/" . $cv;
    $member_type = $_POST['member_type'];
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

    $linkdn = $_POST['likdn'];
    $user_role = $_POST['user_role'];



    $sql = "INSERT INTO `members`(`title`, `first_name`,`last_name`, `phone_number_one`, `phone_number_two`,`email`, `photo`, `state`, `baptize_date`, `state_of_origin`, `marrital_status`,`employment_status`, `position_id`, `family`,`country`, `address`,`facebook`,`linktdin`, `city`, `gender`,`date_of_birth`,`salary`, `user_type`,`cv`,`user_role`) 
    VALUES ('$title','$fname','$lname','$phoneone','$phonetwo','$email','$photo','$state','$bptdate','$stateoforigin','$marstatus','$empstatus',$position,'$family','$country','$address','$fb_id','$linkdn','$city','$gender','$dob',$salary,'$member_type','$cv','$user_role')";
    $query_lecrosoft = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($query_lecrosoft) {
        move_uploaded_file($temp_file, $folder);
        move_uploaded_file($cv_temp_files, $cv_folder);
        echo "<script> alert('Record successfully added')</script>";
    }
};
?>


</div>
</div>
</div>




<!-- /.row -->
<!-- .right-sidebar -->