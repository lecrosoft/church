<!-- Preloader -->


<?php
if (isset($_GET['id'])) {
    $member_id = $_GET['id'];
    $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'member' AND member_id = $member_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg mb-4"> <img width="100%" alt="user" height="300px" src="assets/images/users/<?php echo $photo ?>"> </div>
            <div class="user-btm-box">

                <button type='button' class='mb-3  btn btn-gradient-primary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Send Message to this member
                </button>
                <div class='dropdown-menu'>
                    <a id="<?php echo $member_id ?>" class='dropdown-item personal-sms'>SMS</a>
                    <?php
                    $use = " ";
                    $whatsapp_number = $phone_number_two;

                    if ($whatsapp_number == '') {
                        $use = $phone_number_one;
                    } else {
                        $use = $whatsapp_number;
                    }
                    ?>
                    <a target="_blank" class='dropdown-item' href='https://wa.me/<?php echo $use ?>?text=Hello <?php echo $title . " " . $first_name . " " . $last_name ?>'>Whatsapp</a>
                    <a id="<?php echo $member_id ?>" class='dropdown-item personal-email'>Email</a>

                </div>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Salary</strong>
                        <p><?php echo number_format($salary) ?></p>
                    </div>
                    <div class="col-md-6"><strong>Position</strong>
                        <p><?php echo $position_title ?></p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Email ID</strong>
                        <p><?php echo $email ?></p>
                    </div>
                    <div class="col-md-6"><strong>Phone</strong>
                        <p><?php echo $phone_number_one ?></p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Address</strong>
                        <p><?php echo $address ?>
                            <br />
                        </p>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <!-- <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-facebook"></i></p>
                        <h1>258</h1>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-blue"><i class="ti-twitter"></i></p>
                        <h1>125</h1>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-danger"><i class="ti-google"></i></p>
                        <h1>140</h1>
                    </div>
                </div> -->

                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Phone Number 2</strong>
                        <p><?php echo $phone_number_two ?></p>
                    </div>
                    <div class="col-md-6"><strong>Marital Status</strong>
                        <p><?php echo $marrital_status ?></p>
                    </div>
                </div>
                <hr>
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Baptize Date</strong>
                        <p><?php echo $baptize_date ?></p>
                    </div>
                    <div class="col-md-6"><strong>State of Origin</strong>
                        <p><?php echo $state_of_origin ?></p>
                    </div>
                </div>
                <hr>
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Date Of birth</strong>
                        <p><?php echo $date_of_birth ?></p>
                    </div>
                    <div class="col-md-6"><strong>Employment Status</strong>
                        <p><?php echo $employment_status ?></p>
                    </div>
                </div>
                <hr>
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Job Type</strong>
                        <p><?php echo $job_type ?></p>
                    </div>
                    <div class="col-md-6"><strong>Username</strong>
                        <p><?php echo $username ?></p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">


        <div class="white-box">

            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="box-title"><?php echo $title . ' ' . $last_name . ' ' . $first_name ?></h3>
                    <!-- <p class="text-muted m-b-30">Use default tab with class <code>customtab</code></p> -->

                </div>
                <div class="">
                    <button class="btn btn-warning">Edit</button>
                </div>
            </div>
            <!-- Nav tabs -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Follow Ups</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pledges</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contributions</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <?php include('includes/personal_follow_up.php') ?>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <?php include('includes/personal_pledges.php') ?>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contributions</div>
            </div>
        </div>
    </div>


    <!-- /.row -->
    <!-- .right-sidebar -->
    <!-- ========== SMS MODAL =============== -->

    <div id="sms_modal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <?php
                    $lecrosoft = "SELECT phone_number_one,first_name,last_name FROM members WHERE member_id = $member_id";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    extract($row);

                    ?>
                    <h5 class="modal-title text-white">New SMS to <?php echo $first_name . " " . $last_name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <form action="send_single_sms.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <?php
                            $mail_sql = "SELECT * FROM `sms_settings`";
                            $query_sql = mysqli_query($con, $mail_sql);
                            $row = mysqli_fetch_assoc($query_sql);
                            extract($row);
                            ?>
                            <div class="form-group col-md-6">
                                <input type="text" hidden name="user_name" class="receipient_email_array form-control" placeholder="Sender Name" Value="<?php echo $sender_name ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" hidden name="sender_api" class=" form-control" placeholder="Api" Value="<?php echo $api_key ?>">
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Select Sender ID</label>
                                <select name="sender_id" class=" form-control form-select" id="">
                                    <?php $sql = "SELECT * FROM `sms_sender_id`";
                                    $query_sql = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_assoc($query_sql)) {
                                        extract($row);
                                        echo "<option value='$sender_id'>$sender_id</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Receipient Contact</label>
                                <?php

                                $lecrosoft = "SELECT phone_number_one,first_name,last_name FROM members  WHERE member_id = $member_id";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                extract($row);

                                ?>
                                <input type="text" class="form-control" name="select_contact" id="select_contact" value="<?php echo $phone_number_one ?>">

                            </div>

                        </div>
                        <div class="">
                            <!-- <div class="form-group">
                                                    <button type="button" class="btn btn-gradient-primary">
                                                        SMS Unit Balance &nbsp; <span class="badge badge-light text-dark">400</span>
                                                    </button>
                                                </div> -->
                        </div>



                        <div class="message-content">
                            <div class="form-group">
                                <label for="">Message Text</label>
                                <textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Enter your message here"></textarea>
                            </div>
                            <button type="submit" name="send" class="btn btn-gradient-primary">SEND </button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <!-- ======END OF SMS MODAL====== -->




    <!-- ========== EMAIL MODAL =============== -->

    <div id="email_modal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <?php
                    $lecrosoft = "SELECT email,phone_number_one,first_name,last_name FROM members WHERE member_id = $member_id";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    extract($row);

                    ?>
                    <h5 class="modal-title text-white">New Mail to <?php echo $first_name . " " . $last_name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <form action="send_single_mail.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="first_name" id="" class="form-control" value="<?php echo $first_name ?>">
                        <input type="hidden" name="last_name" id="" class="form-control" value="<?php echo $last_name ?>">
                        <div class="row">
                            <?php
                            $mail_sql = "SELECT * FROM `email_settings`";
                            $query_sql = mysqli_query($con, $mail_sql);
                            $row = mysqli_fetch_assoc($query_sql);
                            extract($row);
                            ?>
                            <div class="form-group col-md-6">
                                <input type="text" name="sender_name" class="receipient_email_array form-control" placeholder="Sender Name" Value="<?php echo $sender_name ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="sender_mail" class="receipient_email_array form-control" placeholder="Sender Name" Value="<?php echo $sender_mail ?>">
                            </div>
                        </div>



                        <div class="form-group pr-2">
                            <?php
                            $lecrosoft = "SELECT email,phone_number_one,first_name,last_name FROM members WHERE member_id = $member_id";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                            $row = mysqli_fetch_assoc($query_lecrosoft);
                            extract($row);

                            ?>
                            <label for="">Receipient mail</label>
                            <input type="email" name="select_contact" id="select_contact" class="form-control" value="<?php echo $email ?>">

                        </div>
                        <div class="">
                            <!-- <div class="form-group">
                                                    <button type="button" class="btn btn-gradient-primary">
                                                        SMS Unit Balance &nbsp; <span class="badge badge-light text-dark">400</span>
                                                    </button>
                                                </div> -->
                        </div>


                        <div class="form-group">
                            <input type="hidden" class="receipient_email_array form-control">
                        </div>

                        <div class="form-group ">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                        </div>



                        <div class="form-group">
                            <label>Attachement (You can upload multiple files)</label>
                            <input type="file" name="attachements[]" multiple class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload attachements">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload Files</button>
                                </span>
                            </div>
                        </div>

                        <div class="message-content">
                            <div class="form-group">
                                <label for="">Message Text</label>
                                <textarea class="form-control" name="body" id="summernote" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" name="send" class="btn btn-gradient-primary">SEND </button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <!-- ======END OF EMAIL MODAL====== -->