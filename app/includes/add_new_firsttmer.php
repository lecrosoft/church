<div class="row">




    <div class="col-md-12">



        <form action="" method="POST">
            <div class="form-body">
                <?php
                if (isset($_POST['add'])) {
                    $title = $_POST['title'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $gender = $_POST['gender'];

                    $phone_with_country_code = '';
                    $phonenumber = $_POST['phonenumber'];
                    $first_character_of_phone = substr($phonenumber, 0, 1);
                    if ($first_character_of_phone == 0) {
                        $phone_with_country_code = preg_replace('/0/', '234', trim($phonenumber), 1);
                    } else {
                        $phone_with_country_code = trim($phonenumber);
                    }

                    $member = $_POST['member'];
                    $maritalstatus = $_POST['maritalstatus'];
                    $date_of_visit = $_POST['date_of_visit'];
                    $email = $_POST['email'];
                    $visit_reason = $_POST['visit_reason'];
                    $address = $_POST['address'];
                    $prayer_request = $_POST['prayer_request'];
                    $asign_to = $_POST['asign_to'];


                    $lecrosoft = "INSERT INTO `first_timers`(`title`, `first_name`, `last_name`, `address`, `phone_number`, `email`, `reffered_by_member`, `prayer_request`, `visit_reason`, `date_of_visit`,`gender`, `marital_status`,`asign_to`) VALUES ('$title','$firstname','$lastname','$address','$phone_with_country_code','$email',$member,'$prayer_request','$visit_reason','$date_of_visit','$gender','$maritalstatus',$asign_to)";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft) or die(mysqli_error($con));

                    if ($query_lecrosoft) {
                        echo '<div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Success!</strong>
                                        Record successfully added.
                                        </div>';
                    } else {
                        echo "FAILED";
                    }
                }

                ?>
                <h3 class="box-title">Personal Info</h3>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">First Name</label>
                            <div class="input-group mb-3">

                                <select name="title" id="title" class="form-select form-control col-sm-4" required>
                                    <option value="">Select Title</option>
                                    <option value="MR">MR</option>
                                    <option value="MRS">MRS</option>
                                    <option value="MISS">MISS</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Prophetess">Prophetess</option>
                                    <option value="Evangelist">Evangelist</option>
                                </select>

                                <input type="text" id="fname" name="firstname" class="form-control col-sm-8" aria-label="Text input with dropdown button" placeholder="e.g: Olumide" required>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Last Name</label>
                            <input type="text" id="lname" name="lastname" class="form-control" placeholder="e.g: Ogundimu" required />

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
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input type="text" class="form-control" name="phonenumber" id="" placeholder="Enter phone number" required />
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Reffered by</label>
                            <?php
                            $lecrosoft = "SELECT * FROM members";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            ?>
                            <select class="form-control select2" name="member" id="member" data-placeholder="Choose a Category" tabindex="1">
                                <option value="">Select Member</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    $member_id = $row['member_id'];
                                    $member_last_name = $row['last_name'];
                                    $member_first_name = $row['first_name'];


                                    echo "<option value='$member_id'>$member_last_name $member_first_name</option>";
                                }
                                ?>
                                <option value="">None</option>

                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Marital Status</label>
                            <select class="form-control" name="maritalstatus" id="">
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
                            <label class="control-label">Date of visit</label>
                            <input type="date" class="form-control" name="date_of_visit" id="" placeholder="dd/mm/yyyy" required />
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Enter your mail" />
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Reason For visit</label>
                            <input type="text" name="visit_reason" id="" class="form-control" placeholder="e.g:Programmer,Banker,Trader" />

                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" id="" name="address" class="form-control" placeholder="Enter Address" />

                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label">Assign to (Assign an existing member to follow up with this visitor</label>
                            <?php
                            $lecrosoft = "SELECT * FROM members";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            ?>
                            <select class="form-control select2" name="asign_to" id="asign_to" data-placeholder="Choose a Category" tabindex="1">
                                <option value="">Select State</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    $assign_member_id = $row['member_id'];
                                    $assign_member_last_name = $row['last_name'];
                                    $assign_member_first_name = $row['first_name'];


                                    echo "<option value='$assign_member_id'> $assign_member_last_name $assign_member_first_name</option>";
                                }
                                ?>


                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">

                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="box-title m-t-40">Prayer Request</h3>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Prayer Request</label>
                            <textarea name="prayer_request" id="" cols="30" rows="10" class="form-control" placeholder="Enter prayer request"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!--/span-->

                    <!--/span-->
                </div>
                <!--/row-->

                <!-- end row -->

                <!-- end row -->

                <!-- end row -->

                <!--/row-->
            </div>
            <div class="form-actions">
                <button type="submit" name="add" class="btn btn-gradient-primary add-member">
                    <i class="fa fa-check"></i> Save
                </button>
                <!-- <button type="button" class="btn btn-default">
                                Cancel
                            </button> -->
            </div>
        </form>


    </div>
</div>









<!-- /.row -->
<!-- .right-sidebar -->