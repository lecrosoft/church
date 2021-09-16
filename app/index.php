<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<?php

?>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div> -->
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php
        include('includes/top-nav.php');
        ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php
        include('includes/left-side-bar.php');
        ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../index.php" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard Online users <span class="useronline"></span>
                            </li>
                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>


                <!-- INCOME AND EXPENSES REPORT -->

                <!-- row -->
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Income</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-success"></i> <span class="counter text-success">₦8659</span></li>

                            </ul>
                            <hr>
                            <span class="text-success">This Month ₦2334</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Expenses</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-danger"></i> <span class="counter text-danger">₦7469</span></li>
                            </ul>
                            <hr>
                            <span class="text-danger">This Month ₦2334</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Current Balance</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-info"></i> <span class="counter text-info">₦6011</span></li>
                            </ul>
                            <hr>
                            <span class="text-success">This Month ₦2334</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pledges</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-warning"></i> <span class="text-warning">₦1800</span></li>
                            </ul>
                            <hr>
                            <span class="text-warning">Pending Pledges ₦2334</span>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- INCOME AND EXPENSES REPORT -->


                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class=" ti-pencil-alt bg-megna"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM family";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $family_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $family_count; ?></h4> <span class="text-muted">Total Families</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="  ti-comments bg-info"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM members";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $members_count = mysqli_num_rows($query_lecrosoft);
                                ?>

                                <div class="bodystate">
                                    <h4><?php echo $members_count; ?></h4> <span class="text-muted">Total members</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class=" ti-book bg-success"></i>

                                <?php
                                $lecrosoft = "SELECT * FROM department";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $department_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $department_count; ?></h4> <span class="text-muted">Total department.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-user bg-inverse"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM users";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $user_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $user_count; ?></h4> <span class="text-muted">Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- RECENT COMMENT BOX -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Birthday Celebrants </div>
                            <div class="panel-body">
                                <ul class="nav nav-pills m-b-30 ">
                                    <li class="active nav-item"> <a href="#navpills-1" class="nav-link" data-toggle="tab" aria-expanded="false">Today Celebrants</a> </li>
                                    <li class="nav-item"> <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">This Week Celebrant</a> </li>
                                    <li class="nav-item"> <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">This Month</a> </li>
                                </ul>
                                <div class="tab-content br-n pn">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE day(current_date)=day(date_of_birth) && month(current_date)= month(date_of_birth)";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);
                                            ?>
                                            <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants Today</H2>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fullname</th>
                                                        <th>Email</th>
                                                        <th>DOB</th>


                                                        <th>ACTION</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                        extract($row);
                                                        echo "<tr>";
                                                        echo "<td>" . $first_name . ' ' . $last_name . " </td>";
                                                        echo "<td>" . $email . " </td>";
                                                        echo "<td>" . $date_of_birth . "</td>";
                                                        echo "<td><div class='dropdown show'>
  <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Dropdown link
  </a>

  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
    <a class='dropdown-item' href='#'>Action</a>
    <a class='dropdown-item' href='#'>Another action</a>
    <a class='dropdown-item' href='#'>Something else here</a>
  </div>
</div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all the sales</a>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-8"> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                <p><br /> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                                            </div>
                                            <div class="col-md-4"> <img src="../plugins/images/large/img2.jpg" class="img-responsive thumbnail mr25"> </div>
                                        </div>
                                    </div>
                                    <div id="navpills-3" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-4"> <img src="../plugins/images/large/img3.jpg" class="img-responsive thumbnail mr25"> </div>
                                            <div class="col-md-8"> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                <p><br /> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Visitors
                                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>March 2017</option>
                                        <option>April 2017</option>
                                        <option>May 2017</option>
                                        <option>June 2017</option>
                                        <option>July 2017</option>
                                    </select>
                                </div>
                            </h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>TOTAL SUBSCRIBERS</h2>
                                    <p>Check all the subscribers</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20">30</h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>EMAIL</th>
                                            <th>ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">lecrosoft@gmail.com</td>
                                            <td class="txt-oflo"><a class="btn btn-success btn-sm">SEND MAIL</a><a class="btn btn-success btn-sm">SEND SMS</a></td>



                                        </tr>






                                    </tbody>
                                </table> <a href="#">Check all the sales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .right-sidebar -->
            <?php
            include('includes/right-side-bar.php');
            ?>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
        <!-- footer begins -->
        <?php
        include('includes/footer.php');

        ?>
        <!-- footer ends -->
        <script type="text/javascript">
            $(document).ready(function() {
                var comment_id
                $(".mail-contnet").on('click', function(e) {
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    //approve(comment_id)


                })

                $(".action_approved").on('click', function(e) {
                    e.preventDefault()
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    update(comment_id, 'APPROVED')
                })
                $(".action_disapproved").on('click', function(e) {
                    e.preventDefault()
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    update(comment_id, 'REJECTED')

                })


                function update(id, state) {


                    $.ajax({
                        url: "comment_status.php",
                        method: 'post',
                        data: {
                            id: id,
                            state: state
                        },
                        success: function(data) {
                            if (data === "Success") {
                                window.location = '/educate/admin/index.php'
                            } else {
                                alert('An Error Occurred');
                            }
                        },
                        error: function(obj, status, err) {
                            console.log('Error', err)
                        }
                    })

                }
            })
        </script>
        <script>

        </script>
</body>

</html>