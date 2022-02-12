<div class="row">




    <div class="col-12  stretch-card">

        <div class="card">
            <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                <div class="form-body">
                    <h3 class="box-title">Personal Info</h3>
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
                                <label class="control-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="dd/mm/yyyy" />
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
                                <select class="form-control select2" name="stateoforigin" data-placeholder="Choose a Category" tabindex="1">
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
                                <select class="form-control" name="marstatus" required>
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
                                <select class="form-control" name="empstatus">
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
                                <input type="date" class="form-control" name="bptdate" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Job Type</label>
                                <input type="text" name="jobtype" class="form-control" placeholder="e.g:Programmer,Banker,Trader" />

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" id="photo" name="photo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
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
                                <select class="form-control select2" name="state" data-placeholder="Choose a Category" tabindex="1">
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
                                <select class="form-control select2" name="country">
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
                                <input type="text" name="phoneone" class="form-control" placeholder="eg: +2348104986022" required />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number two (whatsapp)</label>
                                <input type="text" name="phonetwo" class="form-control" placeholder="eg: +2348104986022" />
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
                                    <option value="">Select Family</option>


                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        $family_name = $row['family_name'];

                                        echo "<option value='$family_name'>$family_name</option>";
                                    }
                                    ?>


                                </select>

                            </div>
                        </div>

                    </div>
                    <!--/row-->
                </div>
                <div class="form-actions">
                    <button type="submit" name="add-member" class="btn btn-gradient-primary add-member">
                        <i class="fa fa-check"></i> Save
                    </button>
                    <!-- <button type="button" class="btn btn-default">
                                Cancel
                            </button> -->
                </div>
            </form>
        </div>
    </div>

</div>






<!-- </div>
</div>
</div> -->

<?php include('add_members.php') ?>


<!-- /.row -->
<!-- .right-sidebar -->