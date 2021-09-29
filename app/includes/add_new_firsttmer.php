<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">New Member</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">First Timer</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->

<!-- /.row -->
<!-- .row -->
<div class="row">




    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Add New First time</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-body">
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
                                        <input type="text" class="form-control" name="phonenumber" id="" placeholder="dd/mm/yyyy" />
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
                                        <select class="form-control" name="member" id="member" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="">Select State</option>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                $member_id = $row['member_id'];
                                                $last_name = $row['last_name'];
                                                $first_name = $row['first_name'];


                                                echo "<option value='$member_id'>$last_name $first_name</option>";
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="control-label">Marital Status</label>
                                        <select class="form-control" name="maritalstatus" id="" required>
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
                                        <input type="date" class="form-control" name="date_of_visit" id="" placeholder="dd/mm/yyyy" />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="" placeholder="Enter yiur mail" />
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
                                        <input type="text" id="" name="address" class="form-control" />

                                    </div>
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
                                        <textarea name="prayer_request" id="" cols="30" rows="10" class="form-control">Enter prayer request</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->
                            >
                            <!-- end row -->

                            <!-- end row -->

                            <!-- end row -->

                            <!--/row-->
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="add" class="btn btn-success add-member">
                                <i class="fa fa-check"></i> Save
                            </button>
                            <!-- <button type="button" class="btn btn-default">
                                Cancel
                            </button> -->
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['add'])) {
                        $title = $_POST['title'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $gender = $_POST['gender'];
                        $phonenumber = $_POST['phonenumber'];
                        $member = $_POST['member'];
                        $maritalstatus = $_POST['maritalstatus'];
                        $date_of_visit = $_POST['date_of_visit'];
                        $email = $_POST['email'];
                        $visit_reason = $_POST['visit_reason'];
                        $address = $_POST['address'];
                        $prayer_request = $_POST['prayer_request'];


                        $lecrosoft = "INSERT INTO `first_timers`(`title`, `first_name`, `last_name`, `address`, `phone_number`, `email`, `reffered_by_member`, `prayer_request`, `visit_reason`, `date_of_visit`,`gender`, `marital_status`) VALUES ('$title','$firstname','$lastname','$address','$phonenumber','$email',$member,'$prayer_request','$visit_reason','$date_of_visit','$gender','$maritalstatus')";
                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>





</div>
</div>
</div>




<!-- /.row -->
<!-- .right-sidebar -->