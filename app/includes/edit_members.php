<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lecrosoft = "SELECT * FROM members WHERE member_id = $id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Edit Member</h4>
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
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Edit Member</h3>
            <p class="text-muted m-b-30 font-13"> This is the Icon wizrd without validation.</p>
            <div id="exampleBasic2" class="wizard">
                <ul class="wizard-steps" role="tablist">
                    <li class="active" role="tab">
                        <h4><span><i class="ti-user"></i></span>Personal Info</h4>
                    </li>
                    <li role="tab">
                        <h4><span><i class="ti-credit-card"></i></span>Contact info</h4>
                    </li>
                    <li role="tab">
                        <h4><span><i class="ti-check"></i></span>Membership</h4>
                    </li>
                </ul>
                <div class="wizard-content">
                    <div class="wizard-pane active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">

                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                <div class="form-body">

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label class="control-label">First Name</label>
                                                                <div class="input-group mb-3">

                                                                    <select name="" id="title" class="form-select form-control col-sm-4">
                                                                        <option value="<?php echo $title ?>"><?php echo $title ?></option>
                                                                        <option value="MR">MR</option>
                                                                        <option value="MRS">MRS</option>
                                                                        <option value="MISS">MISS</option>
                                                                        <option value="Pastor">Pastor</option>
                                                                        <option value="Prophetess">Prophetess</option>
                                                                        <option value="Evangelist">Evangelist</option>
                                                                    </select>

                                                                    <input type="text" id="fname" name="firstname" class="form-control col-sm-8" aria-label="Text input with dropdown button" value='<?php echo $first_name ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" id="lname" name="lastname" class="form-control" value='<?php echo $last_name ?>' />

                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender</label>
                                                                <select class="form-control" name="gender" id="gender">
                                                                    <option value='<?php echo $gender ?>'><?php echo $gender ?></option>
                                                                    <?php
                                                                    if ($gender = 'Male') {
                                                                        echo " <option value='Female'>Female</option>";
                                                                    } else {
                                                                        echo " <option value='Male'>Male</option>";
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Date of Birth</label>
                                                                <input type="text" class="form-control" name="dob" id="dob" value='<?php echo $date_of_birth ?>' />
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
                                                                // $lecrosoft = "SELECT state_of_origin FROM members WHERE id =$id";
                                                                // $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                ?>
                                                                <select class="form-control" id="stateoforigin" data-placeholder="Choose a Category" tabindex="1">

                                                                    <?php
                                                                    // while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                    //     $state_of_origin = $row['state_of_origin'];

                                                                    // 
                                                                    ?>
                                                                    <option value='<?php echo $state_of_origin ?>'><?php echo $state_of_origin ?></option>

                                                                    <?php
                                                                    // }

                                                                    ?>
                                                                    <?php
                                                                    $lecrosoft = "SELECT * FROM state WHERE state != '$state_of_origin'";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                        $state = $row['state'];

                                                                    ?>

                                                                        <option value='<?php echo $state ?>'><?php echo $state ?></option>
                                                                    <?php } ?>
                                                                    <?php

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Marital Status</label>
                                                                <select class="form-control" name="maritalstatus" id="marstatus">

                                                                    <?php
                                                                    if ($marrital_status == "") {
                                                                        echo "<option value=''>Select Marital Status</option>";
                                                                        echo "<option value='Married'>Married</option>";
                                                                        echo "<option value='Single'>Single</option>";
                                                                        echo "<option value='Divorced'>Divorced</option>";
                                                                    } else {
                                                                        echo "<option value='$marrital_status '>$marrital_status</option>";
                                                                    }
                                                                    if ($marrital_status == 'Married') {
                                                                        echo "<option value='Single'>Single</option>";
                                                                        echo "<option value='Divorced'>Divorced</option>";
                                                                    } elseif ($marrital_status == 'Single') {
                                                                        echo "<option value='Married'>Married</option>";
                                                                        echo "<option value='Divorced'>Divorced</option>";
                                                                    } elseif ($marrital_status == 'Divorced') {
                                                                        echo "<option value='Married'>Married</option>";
                                                                        echo "<option value='Single'>Single</option>";
                                                                    } else {
                                                                        echo "<option value='$marrital_status '>$marrital_status</option>";
                                                                    }
                                                                    ?>


                                                                    <?php

                                                                    ?>

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
                                                                    <option value='<?php echo $employment_status ?>'><?php echo $employment_status ?></option>
                                                                    <?php
                                                                    if ($employment_status == "") {
                                                                        echo "<option value=''>Select Employment Status</option>";
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    if ($employment_status == 'Employed') {
                                                                        echo "<option value='SelfEmployed'>Self Employed</option>";
                                                                        echo "<option value='Unemployed'>Unemployed</option>";
                                                                    } elseif ($employment_status == 'SelfEmployed') {
                                                                        echo "<option value='Employed'>Employed</option>";
                                                                        echo "<option value='Unemployed'>Unemployed</option>";
                                                                    } elseif ($employment_status == 'Unemployed') {
                                                                        echo "<option value='Employed'>Employed</option>";
                                                                        echo "<option value='SelfEmployed'>Self Employed</option>";
                                                                    } else {
                                                                    }
                                                                    ?>


                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Baptize Date</label>
                                                                <input type="text" class="form-control" name="baptizeDate" id="bptdate" value='<?php echo $baptize_date ?>' />
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Job Type</label>
                                                                <input type="text" name="job_type" id="jobtype" class="form-control" value='<?php echo $job_type ?>' />

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

                                                </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wizard-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">

                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">

                                            <div class="form-body">


                                                <!--/row-->

                                                <!--/row-->

                                                <!--/row-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" id="address" class="form-control" value='<?php echo $address ?>' />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" id="city" class="form-control" value='<?php echo $city ?>' />
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">State</label>

                                                            <select class="form-control" id="state" data-placeholder="Choose a Category" tabindex="1">
                                                                <?php
                                                                echo "<option value='$state'>$state</option>";

                                                                ?>


                                                                <?php
                                                                $lecrosoft = "SELECT * FROM state  WHERE state_id !='$state'";
                                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                    $state_option = $row['state'];


                                                                    echo "<option value='$state_option'>$state_option</option>";
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
                                                            <input type="email" id="email" class="form-control" value='<?php echo $email ?>' />
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control" id="country">
                                                                <option value='<?php echo $country ?>'><?php echo $country ?></option>
                                                                <option>Nigeria</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number one</label>
                                                        <input type="text" id="phoneone" class="form-control" value='<?php echo $phone_number_one ?>' />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number two (whatsapp)</label>
                                                        <input type="text" id="phonetwo" class="form-control" value='<?php echo $phone_number_two ?>' />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Facebook id</label>
                                                        <input type="text" id="fb_id" class="form-control" value='<?php echo $facebook ?>' />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Linkdn id</label>
                                                        <input type="text" id="likdn" class="form-control" value='<?php echo $linktdin ?>' />
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">

                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">

                                            <div class="form-body">


                                                <!--/row-->

                                                <!--/row-->

                                                <!--/row-->


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Family</label>
                                                            <?php
                                                            $lecrosoft = "SELECT * FROM family";
                                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                            ?>
                                                            <select class="form-control select2" id="family">
                                                                <option value='<?php echo $family ?>'><?php echo $family ?></option>;

                                                                <optgroup label="">

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



                                                            <select class="select2 m-b-10 select2-multiple" id="department" multiple="multiple" data-placeholder="">
                                                                <option value='<?php echo $department ?>'><?php echo $department ?></option>
                                                                <optgroup label="a user can be in multiple departments">
                                                                    <?php

                                                                    $lecrosoft = "SELECT * FROM department";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);


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


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- .row -->

<!-- /.row -->
<!-- .row -->

<!-- /.row -->
<!-- .right-sidebar -->