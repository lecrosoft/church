<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lecrosoft = "SELECT * FROM first_timers  WHERE first_timmer_id = $id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<div class="row">


    <h4 class="page-title">Edit First timer</h4>

    <div class="col-12  stretch-card">

        <div class="card">
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
                                        <option value="<?php echo $title ?>"><?php echo $title ?></option>
                                        <option value="MR">MR</option>
                                        <option value="MRS">MRS</option>
                                        <option value="MISS">MISS</option>
                                        <option value="Pastor">Pastor</option>
                                        <option value="Prophetess">Prophetess</option>
                                        <option value="Evangelist">Evangelist</option>
                                    </select>

                                    <input type="text" id="fname" name="firstname" class="form-control col-sm-8" aria-label="Text input with dropdown button" value="<?php echo $first_name  ?>" placeholder="e.g: Olumide" required>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Last Name</label>
                                <input type="text" id="lname" name="lastname" class="form-control" value="<?php echo $last_name  ?>" placeholder="e.g: Ogundimu" required />

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
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" value="<?php echo $phone_number ?>" id="" placeholder="dd/mm/yyyy" />
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
                                $lecrosoft = "SELECT * FROM members WHERE member_id = $reffered_by_member";
                                $query_lecrosoft_reffered = mysqli_query($con, $lecrosoft);

                                ?>
                                <select class="form-control" name="member" id="member" data-placeholder="Choose a Category" tabindex="1">

                                    <?php
                                    $row = mysqli_fetch_assoc($query_lecrosoft_reffered);
                                    $member_id = $row['member_id'];
                                    $last_name_reffered = $row['last_name'];
                                    $first_name_reffered = $row['first_name'];

                                    echo "<option value='$reffered_by_member'> $last_name_reffered  $first_name_reffered </option>";

                                    ?>

                                    <?php
                                    $lecrosoft = "SELECT * FROM members";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

                                        extract($row);

                                        echo "<option value='$member_id'> $last_name  $first_name </option>";
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
                                    <?php
                                    $lecrosoft = "SELECT * FROM first_timers  WHERE first_timmer_id = $id";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    extract($row);


                                    echo "<option value='$marital_status'>$marital_status</option>";

                                    ?>


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
                                <input type="date" class="form-control" name="date_of_visit" id="" value="<?php echo $date_of_visit ?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" id="" value="<?php echo $email ?>" placeholder="Enter yiur mail" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Reason For visit</label>
                                <input type="text" name="visit_reason" id="" class="form-control" value="<?php echo $visit_reason ?>" placeholder="e.g:Programmer,Banker,Trader" />

                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" id="" name="address" value="<?php echo $address ?>" class="form-control" />

                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Assign to</label>

                                <?php
                                $lecrosoft = "SELECT * FROM members WHERE member_id = $asign_to";
                                $query_lecrosoft_assigned_to = mysqli_query($con, $lecrosoft);

                                ?>
                                <select class="form-control" name="asign_to" id="asign_to" data-placeholder="Choose a Category" tabindex="1">

                                    <?php
                                    $row = mysqli_fetch_assoc($query_lecrosoft_assigned_to);

                                    $member_id = $row['member_id'];
                                    $last_name_assigned_to = $row['last_name'];
                                    $first_name_assigned_to = $row['first_name'];


                                    echo "<option value='$asign_to'>$last_name_assigned_to $first_name_assigned_to</option>";

                                    ?>
                                    <?php
                                    $lecrosoft = "SELECT * FROM members";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

                                        extract($row);

                                        echo "<option value='$member_id'> $last_name  $first_name </option>";
                                    }

                                    ?>


                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Status</label>


                                <select class="form-control" name="status" id="status" data-placeholder="Choose a Category" tabindex="1">

                                    <?php
                                    $lecrosoft = "SELECT * FROM first_timers  WHERE first_timmer_id = $id";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    extract($row);


                                    echo "<option value='$status'>$status</option>";

                                    ?>

                                    <option value='member'>member</option>

                                </select>
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
                                <textarea name="prayer_request" id="" cols="30" rows="10" class="form-control"><?php echo $prayer_request ?></textarea>
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
                    <button type="submit" name="update_firstimer" class="btn btn-gradient-primary add-member">
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

if (isset($_POST['update_firstimer'])) {
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phonenumber'];
    $member = $_POST['member'];
    $maritalstatus = $_POST['maritalstatus'];
    $date_of_visit = $_POST['date_of_visit'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $visit_reason = $_POST['visit_reason'];
    $address = $_POST['address'];
    $prayer_request = $_POST['prayer_request'];
    $asign_to = $_POST['asign_to'];



    if ($status == 'member') {
        $sql =
            "INSERT INTO `members`(`first_name`, `last_name`, `phone_number_one`,`email`, `title`,`marrital_status`, `address`,`gender`) VALUES
     ('$firstname','$lastname','$phonenumber','$email','$title','$maritalstatus','$address','$gender')";

        $query_sql = mysqli_query($con, $sql) or die(mysqli_error($con));
    }


    $lecrosoft = "UPDATE `first_timers` SET `title`='$title',`first_name`='$firstname',`last_name`='$lastname',`address`='$address',`phone_number`='$phonenumber',`email`='$email',`reffered_by_member`=$member,`prayer_request`='$prayer_request',`visit_reason`='$visit_reason',`date_of_visit`='$date_of_visit',`status`='$status',`gender`='$gender',`marital_status`='$maritalstatus',`asign_to`= $asign_to WHERE first_timmer_id = $id ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);


    if ($query_lecrosoft) {
        echo '<script type="text/javascript"> location = window.location.href </script>';
    }
}



?>