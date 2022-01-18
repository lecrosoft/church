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