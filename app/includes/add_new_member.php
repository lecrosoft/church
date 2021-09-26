<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">New Member</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Form Wizard</li>
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
            <div class="panel-heading">Add New Member</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-body">
                            <h3 class="box-title">Person Info</h3>
                            <hr />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="control-label">First Name</label>
                                        <div class="input-group mb-3">

                                            <select name="" id="title" class="form-select form-control col-sm-4" required>
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
                                        <select class="form-control" id="stateoforigin" data-placeholder="Choose a Category" tabindex="1">
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
                                        <select class="form-control" name="maritalstatus" id="marstatus" required>
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
                                        <select class="form-control" name="emplyStatus" id="empstatus">
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
                                        <input type="date" class="form-control" name="baptizeDate" id="bptdate" placeholder="dd/mm/yyyy" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Job Type</label>
                                        <input type="text" name="firstname" id="jobtype" class="form-control" placeholder="e.g:Programmer,Banker,Trader" />

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                    <!-- <div class="form-group">
                                                                                <label class="control-label">Photo</label>
                                                                                <input type="file" id="photo" name="photo" class="form-control" />

                                                                            </div> -->
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
                                        <input type="text" id="address" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" id="city" class="form-control" />
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
                                        <select class="form-control" id="state" data-placeholder="Choose a Category" tabindex="1">
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
                                        <input type="email" id="email" class="form-control" placeholder="eg: customercare@lecrosoft.com" />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" id="country">
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
                                        <input type="text" id="phoneone" class="form-control" required />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number two (whatsapp)</label>
                                        <input type="text" id="phonetwo" class="form-control" />
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook id</label>
                                        <input type="text" id="fb_id" class="form-control" />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linkdn id</label>
                                        <input type="text" id="likdn" class="form-control" />
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
                                        <select class="form-control select2" id="family">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                        <?php
                                        $lecrosoft = "SELECT * FROM department";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        ?>

                                        <select class="select2 m-b-10 select2-multiple" id="department" multiple="multiple" data-placeholder="Choose department">
                                            <optgroup label="a user can be in multiple departments">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                    $department_name = $row['department_name'];

                                                    echo "<option value='$department_name'>$department_name</option>";
                                                }
                                                ?>

                                            </optgroup>

                                        </select>


                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success add-member">
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
    </div>
</div>





</div>
</div>
</div>




<!-- /.row -->
<!-- .right-sidebar -->