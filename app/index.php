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
                        <h4 class="page-title">Welcome <span> <?php echo $_SESSION['username'] ?> </span></h4>
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
                                <?php
                                $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE year(current_date) = year(transaction_date)";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                $sum = $row['value_sum'];
                                $formated_sum = number_format($sum);

                                ?>

                                <?php
                                $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(current_date) = month(transaction_date)";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                $sum_by_month = $row['value_sum'];
                                $formated_sum_by_month = number_format($sum_by_month);

                                ?>
                                <li class="text-right"><i class="ti-arrow-down text-success"></i> <span class="counter text-success">₦<?php echo $formated_sum ?></span></li>

                            </ul>
                            <hr>
                            <span class="text-success">This Month ₦<?php echo $formated_sum_by_month ?></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Expenses</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <?php
                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE year(current_date) = year(transaction_date)";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    $sum_expense = $row['value_sum'];
                                    $formated_expense = number_format($sum_expense);
                                    ?>
                                    <?php
                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(current_date) = month(transaction_date)";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    $sum_expense_by_month = $row['value_sum'];
                                    $formated_expense_by_month = number_format($sum_expense_by_month);
                                    ?>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-danger"></i> <span class="counter text-danger">₦<?php echo $formated_expense ?></span></li>
                            </ul>
                            <hr>
                            <span class="text-danger">This Month ₦<?php echo $formated_expense_by_month ?></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Current Balance</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <?php
                                $balance = $sum - $sum_expense;
                                $balance_by_month = $sum_by_month - $sum_expense_by_month;
                                ?>
                                <li class="text-right"><i class="ti-arrow-down text-info"></i> <span class="counter text-info">₦<?php echo number_format($balance) ?></span></li>
                            </ul>
                            <hr>
                            <span class="text-success">This Month ₦<?php echo number_format($balance_by_month) ?></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pledges</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <?php
                                    $lecrosoft = "SELECT SUM(amount) as value_sum FROM pledges_payment_histroy";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    $sum_pledges = $row['value_sum'];
                                    $formated_sum_pledges = number_format($sum_pledges);

                                    ?>

                                    <?php
                                    $lecrosoft = "SELECT SUM(amount) as value_sum FROM pledges_payment_histroy WHERE month(current_date) = month(payment_date)";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                    $pending_sum_by_month = $row['value_sum'];
                                    $formated_sum_pledges_by_month = number_format($pending_sum_by_month);

                                    ?>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-warning"></i> <span class="text-warning"><?php echo $formated_sum_pledges ?></span></li>
                            </ul>
                            <hr>
                            <span class="text-warning">This month ₦<?php echo $formated_sum_pledges_by_month ?></span>
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
                                    <h4><?php echo $family_count; ?></h4> <span class="text-muted">Families</span>
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
                                    <h4><?php echo $members_count; ?></h4> <span class="text-muted">Members</span>
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
                                    <h4><?php echo $department_count; ?></h4> <span class="text-muted">Departments.</span>
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
                                            if ($count_celebrant == 0) {
                                                echo "<H2> We have no Birthday Celebrants Today </H2>";
                                            } else {
                                            ?>
                                                <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants Today</H2>
                                            <?php
                                            }
                                            ?>

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
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " </td>";
                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
  <button type='button' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
   Message
  </button>
  <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>SMS</a>
    <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
    <a class='dropdown-item' href='#'>Email</a>
   
  </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE YEARWEEK(date_of_birth)= YEARWEEK(NOW())";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);

                                            if ($count_celebrant == 0) {
                                                echo "<H2> We have no Birthday Celebrants This Week </H2>";
                                            } else {
                                            ?>
                                                <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants This Week</H2>
                                            <?php
                                            }
                                            ?>
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
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " </td>";
                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
  <button type='button' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
   Message
  </button>
  <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>SMS</a>
    <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
    <a class='dropdown-item' href='#'>Email</a>
   
  </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                    <div id="navpills-3" class="tab-pane">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE month(current_date)= month(date_of_birth)";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);
                                            if ($count_celebrant == 0) {
                                                echo "<H2> We have no Birthday Celebrants This month </H2>";
                                            } else {
                                            ?>
                                                <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants This month</H2>
                                            <?php
                                            }
                                            ?>
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
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " </td>";
                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
  <button type='button' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
   Message
  </button>
  <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>SMS</a>
    <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
    <a class='dropdown-item' href='#'>Email</a>
   
  </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">First Timers
                                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>September 20201</option>
                                        <option>April 2017</option>
                                        <option>May 2017</option>
                                        <option>June 2017</option>
                                        <option>July 2017</option>
                                    </select>
                                </div>
                            </h3>
                            <!-- <div class="row sales-report">


                            </div> -->
                            <div class="table-responsive">
                                <table id="" class="table table-striped toggle-circle table-hover">
                                    <thead>
                                        <tr>


                                            <th>Full Name</th>

                                            <th>Phone number</th>

                                            <th>Date of visit</th>


                                            <th>Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $lecrosoft = "SELECT * FROM first_timers ORDER BY first_timmer_id DESC";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            // $title = $row['title'];
                                            //$first_name = $row['first_name'];
                                            //$last_name = $row['last_name'];
                                            //$family = $row['family'];
                                            //$title = $row['title'];
                                            //$title = $row['title'];
                                            //$title = $row['title'];
                                            //$status = $row['status'];
                                            $realdate = date("d M Y", strtotime($date_of_visit));
                                            echo "<tr>";
                                            echo "<td>$last_name $first_name</td>";


                                            echo "<td>$phone_number</td>";

                                            echo "<td>$date_of_visit</td>";

                                            //                     echo " <td>
                                            //     <span class='label label-table label-danger'>$status</span>
                                            // </td>";
                                            echo "<td><div class='btn-group'>
  <button type='button' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
   Message
  </button>
  <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>SMS</a>
    <a class='dropdown-item' href='https://wa.me/+2347060934005?text=happy birthday to $first_name'>Whatsapp</a>
    <a class='dropdown-item' href='#'>Email</a>
   
  </div></td>";


                                            echo "</tr>";
                                        };

                                        ?>

                                    </tbody>
                                </table>
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