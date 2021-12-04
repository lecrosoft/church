<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">

        <!-- Page Content -->

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pastor Profile</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Visit websit</a>
                <ol class="breadcrumb">
                    <li><a href="#">Admin</a></li>
                    <li class="active">Pastor Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->


        <?php
        if (isset($_GET['id'])) {
            $member_id = $_GET['id'];
            $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'pastor' AND member_id = $member_id";
            $query_lecrosoft = mysqli_query($con, $lecrosoft);
            $row = mysqli_fetch_assoc($query_lecrosoft);
            extract($row);
        }
        ?>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="../assets/uploads/pastors/<?php echo $photo ?>"> </div>
                    <div class="user-btm-box">
                        <!-- .row -->
                        <div class="row text-center m-t-10">
                            <div class="col-md-6 b-r"><strong>Name</strong>
                                <p><?php echo $last_name . ' ' . $first_name ?></p>
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
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">


                <div class="white-box">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="box-title">Pastor Profile</h3>
                            <!-- <p class="text-muted m-b-30">Use default tab with class <code>customtab</code></p> -->

                        </div>
                        <div class="">
                            <button class="btn btn-warning">Edit</button>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item"><a href="#home1" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Attendance</span></a></li>
                        <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Contributions</span></a></li>
                        <li role="presentation" class="nav-item"><a href="#messages1" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Pledges</span></a></li>
                        <li role="presentation" class="nav-item"><a href="#settings1" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Family</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home1">
                            <div class="col-md-6">
                                <h3>Best Clean Tab ever</h3>
                                <h4>you can use it with the small code</h4>
                            </div>
                            <div class="col-md-5 pull-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile1">
                            <div class="col-md-6">
                                <h3>Lets check profile</h3>
                                <h4>you can use it with the small code</h4>
                            </div>
                            <div class="col-md-5 pull-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages1">
                            <div class="table-responsive">

                                <table id="example-transation7" class="display table table-striped nowrap" style="width:100%">


                                    <?php
                                    $sql = "SELECT * FROM `pledges` LEFT JOIN campaign ON pledges.campaign_id = campaign.campaign_id WHERE member_id = $member_id";
                                    $query_sql = mysqli_query($con, $sql);
                                    $count = mysqli_num_rows($query_sql);
                                    if ($count == 0) {
                                        echo "<h4 class='text-center'>No pledges records found for this user!</h4>";
                                    } else {

                                    ?>

                                        <thead>
                                            <tr>



                                                <th>Campaign Title</th>
                                                <th>Pledge Date</th>
                                                <th>Amt Pledged(₦)</th>
                                                <th>Due Date</th>
                                                <th>Amt payed</th>
                                                <th>Balance</th>
                                                <th>Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($query_sql)) {
                                            $member_id = $_GET['id'];
                                            $campaign_id = $row['campaign_id'];
                                            $campaign_name = $row['campaign'];
                                            $pledge_date = $row['pledge_date'];
                                            $amount = $row['amount'];
                                            $pledge_due_date = $row['pledge_due_date'];
                                            $ammount_paid = $row['ammount_paid'];
                                            $status = $row['status'];

                                            echo "<tr>";
                                            echo "<td><a type='button' id='$campaign_id' class='pledge_details text-primary text-bold' style='cursor: pointer'>$campaign_name</a></td>";
                                            echo "<input type ='hidden' class ='member_id' value ='$member_id'/>";

                                            echo "<td>$pledge_date</td>";
                                            echo "<td>$amount</td>";
                                            echo "<td>$pledge_due_date</td>";
                                            echo "<td>$ammount_paid</td>";
                                            $balance = $amount - $ammount_paid;
                                            echo "<td>$balance</td>";

                                            echo "<td>$status </td>";
                                            echo "</tr>";
                                        }
                                    }

                                        ?>
                                        </tbody>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="settings1">
                            <div class="col-md-6">
                                <h3>Just do Settings</h3>
                                <h4>you can use it with the small code</h4>
                            </div>
                            <div class="col-md-5 pull-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->
    <!-- .right-sidebar -->