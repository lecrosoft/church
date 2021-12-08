<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<?php

?>

<body>
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
                <?php
                if (isset($_GET['d_id'])) {
                    $depart_id = $_GET['d_id'];
                    $lecrosoft = "SELECT * FROM department WHERE department_id = $depart_id";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $department_id = $row['department_id'];
                    $department = $row['department_name'];
                    $department_leader = $row['department_leader_name'];
                }

                ?>

                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome to <span class='text-danger'> <?php echo $department ?> </span> Department</h4>
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
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-8 col-sm-12 col-xs-12">

                        <div class="collapse m-t-15" id="pgr1" aria-expanded="true">
                            <pre class="line-numbers language-javascript m-t-0"><code><b>Use below code & put in column</b><br/>
                  &lt;div class="white-box"&gt;
                      &lt;h3 class="box-title"&gt;NEW CLIENTS&lt;/h3&gt;
                      &lt;ul class="list-inline two-part"&gt;
                      &lt;li&gt;&lt;i class="icon-people text-info"&gt;&lt;/i&gt;&lt;/li&gt;
                      &lt;li class="text-right"&gt;&lt;span class="counter"&gt;23&lt;/span&gt;&lt;/li&gt;
                      &lt;/ul&gt;
                  &lt;/div&gt;</code></pre>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">MEMBERS</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="icon-people text-info"></i></li>
                                        <li class="text-right">

                                            <?php
                                            $lecrosoft = "SELECT * FROM department_member  WHERE department_id = $depart_id";

                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_members = mysqli_num_rows($query_lecrosoft);
                                            ?>
                                            <span class="counter"><?php echo $count_members ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">TOTAL Projects</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="icon-folder text-purple"></i></li>
                                        <li class="text-right">

                                            <?php
                                            $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id ";

                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_project = mysqli_num_rows($query_lecrosoft);

                                            ?>
                                            <span class="counter"><?php echo $count_project ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Open Projects</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="icon-folder-alt text-warning"></i></li>
                                        <li class="text-right">

                                            <?php
                                            $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id and status != 'Completed' ";

                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                            $count_pending_project = mysqli_num_rows($query_lecrosoft);
                                            ?>
                                            <span class="counter"><?php echo $count_pending_project ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <a href="depart_income.php?d_id=<?php echo $depart_id ?>">
                                    <div class="white-box">
                                        <h3 class="box-title">INCOME</h3>
                                        <ul class="list-inline two-part">
                                            <li><i class="ti-wallet text-success"></i></li>
                                            <li class="text-right">
                                                <?php
                                                $lecrosoft = "SELECT SUM(income) as income_value FROM department_income WHERE department_id = $depart_id";
                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                                $income_sum = $row['income_value'];
                                                ?>
                                                <span class="counter"><?php
                                                                        if ($income_sum > 0) {
                                                                            echo $income_sum;
                                                                        } else {
                                                                            echo 0;
                                                                        }
                                                                        ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">EXPENSES</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="ti-wallet text-danger"></i></li>
                                        <li class="text-right">
                                            <span class="counter">117</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">WALLET BALANCE</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="ti-wallet text-success"></i></li>
                                        <li class="text-right">
                                            <span class="counter">117</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">


                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <!-- <div class="active item">
                                        <div class="overlaybg">
                                            <img src="../plugins/images/news/slide1.jpg" />
                                        </div>
                                        <div class="news-content">
                                            <span class="label label-danger label-rounded">Primary</span>
                                            <h2>
                                                It has survived not only five centuries, but also the
                                                leap into electronic typesetting, remaining
                                                essentially unchanged.
                                            </h2>
                                            <a href="#">Read More</a>
                                        </div>
                                    </div> -->



                                    <?php
                                    $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id and status != 'Completed' ";

                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                    ?>
                                    <div class="active item">
                                        <div class="overlaybg">
                                            <img src="../plugins/images/news/slide1.jpg" />
                                        </div>
                                        <div class="news-content">
                                            <span class="label label-danger label-rounded"></span>
                                            <h2>

                                            </h2>
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                        extract($row);

                                    ?>
                                        <div class="item">
                                            <div class="overlaybg">
                                                <img src="../plugins/images/news/slide1.jpg" />
                                            </div>
                                            <div class="news-content">
                                                <span class="label label-danger label-rounded"><?php echo $status ?></span>
                                                <h2>
                                                    <?php echo $project_description ?>
                                                </h2>
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <section>
                                <div class="sttabs tabs-style-bar">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="#section-bar-1" class="sticon ti-home"><span>Members</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-bar-2" class="sticon ti-trash"><span>Projects</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-bar-3" class="sticon ti-stats-up"><span>Income/Expenses</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-bar-4" class="sticon ti-upload"><span>Attendance</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-bar-5" class="sticon ti-settings"><span>Settings</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="content-wrap">
                                        <section id="section-bar-1">
                                            <div class="row d-flex justify-content-between px-3">
                                                <div class="sm-10">
                                                    <h3 class="box-title m-b-0">Family List</h3>
                                                    <p class="text-muted">this is the sample data here for crm</p>
                                                </div>
                                                <div class="sm-2">
                                                    <button class="btn btn-primary add-family">Add New Member</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>

                                                            <th>Member Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Position</th>
                                                            <th>status</th>

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        selectDepartmentMember();
                                                        ?>


                                                    </tbody>
                                                </table>
                                            </div>


                                            <?php
                                            deleteFamily();
                                            ?>

                                            <?php

                                            addFamily();


                                            ?>

                                        </section>
                                        <section id="section-bar-2">
                                            <div class="row d-flex justify-content-between px-3">
                                                <div class="sm-10">
                                                    <h3 class="box-title m-b-0">Family List</h3>
                                                    <p class="text-muted">this is the sample data here for crm</p>
                                                </div>
                                                <div class="sm-2">
                                                    <button class="btn btn-primary add-projects">Add New Project</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="newProjectTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>

                                                            <th>Project Title</th>
                                                            <th>Description</th>
                                                            <th>Extimated Cost</th>
                                                            <th>Priority</th>
                                                            <th>status</th>

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        selectDepartmentPledge();
                                                        ?>


                                                    </tbody>
                                                </table>
                                            </div>


                                            <?php
                                            deleteFamily();
                                            ?>

                                            <?php

                                            addFamily();


                                            ?>
                                        </section>
                                        <section id="section-bar-3">
                                            <h2>Tabbing 3</h2>
                                        </section>
                                        <section id="section-bar-4">
                                            <h2>Tabbing 4</h2>
                                        </section>
                                        <section id="section-bar-5">
                                            <h2>Tabbing 5</h2>
                                        </section>
                                    </div>
                                    <!-- /content -->
                                </div>
                                <!-- /tabs -->
                            </section>
                        </div>
                    </div>
                </div>







                <!-- ==================INCOME AND EXPENSES ================= -->


                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Income Report</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Transaction Title</th>
                                            <th>Amount</th>
                                            <th>Pay. Method</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Deshmukh</td>
                                            <td>Prohaska</td>
                                            <td>@Genelia</td>
                                            <td><span class="label label-danger">Fever</span> </td>
                                        </tr>





                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Expenses Report</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction Title</th>
                                            <th>Amount</th>
                                            <th>Pay. Method</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>3</td>
                                            <td>Hrithik Roshan</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,3,6,1,2,4,6,3,2,1</span> </td>
                                            <td><span class="text-success text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 58.56%</span> </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- /.row -->
        </div>

    </div>
    <!-- /row -->


    </div>
    </div>
    </div>
    </div>
    <!-- /.row -->
    <!-- .right-sidebar -->
    <!-- add department member -->


    <?php
    include('includes/right-side-bar.php');
    ?>
    <!-- /.right-sidebar -->
    </div>
    <!-- /.container-fluid -->
    <!-- footer begins -->
    <!-- Add department_member Modal-->
    <div id="dataModal2" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="">
                                Member Name
                            </label>
                            <select name="member_id" id="" class="form-select form-control select2" required>
                                <option value="" selected>---Select member---</option>
                                <?php
                                $sql = "SELECT * FROM members";
                                $query_lecrosoft = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    extract($row);
                                    echo "<option value='$member_id'>$first_name  $last_name</option>";
                                }
                                ?>

                            </select>

                        </div>
                        <div class="form-group mb-3">
                            <label for="">
                                Position
                            </label>
                            <select name="department_position" id="" class="form-select form-control">
                                <option value="" selected disabled>---Select position---</option>

                                <?php
                                $sql = "SELECT * FROM department_position";
                                $query_lecrosoft = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    extract($row);
                                    echo "<option value='$department_position_id'>$department_position_title</option>";
                                }
                                ?>
                            </select>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add">Add</button>
                        </div>
                    </form>




                    <?php
                    if (isset($_POST['add'])) {

                        $member_id_to_add = $_POST['member_id'];
                        $department_position = $_POST['department_position'];

                        $sql = "SELECT * FROM `department_member` WHERE `department_id` =  $depart_id";
                        $query_sql = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($query_sql)) {
                            $db_member_id = $row['member_id'];
                        }


                        if ($member_id_to_add === $db_member_id) {
                            echo '<script type="text/javascript">
                            $(document).ready(function(){
                             swal({
                             icon: "error",
                            title: "Oops...",
                            text: "This person is already added to this department!"
 
                               })
                            })
                            
                            </script>';
                            echo '<script type="text/javascript">location = location.href </script>';
                        } else {
                            $lecrosoft = "INSERT INTO `department_member`(`member_id`, `department_id`, `department_position_id`) VALUES ($member_id_to_add,$depart_id,$department_position)";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft) or (die(mysqli_error($con)));
                            echo '<script type="text/javascript">location = location.href </script>';
                        }
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
    <div id="add_project" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <form method="POST">

                        <div class="form-group mb-3">
                            <label for="">
                                Project Title
                            </label>
                            <input type="text" class="form-control" name="project_title" placeholder="Enter Project Title">

                        </div>
                        <div class="form-group mb-3">
                            <!-- <label for="">
                                department_id
                            </label> -->
                            <input type="hidden" class="form-control" name="department_id" value="<?php echo $depart_id ?>">

                        </div>
                        <div class="form-group mb-3">
                            <label for="">
                                Project Description
                            </label>
                            <input type="text" class="form-control" name="project_description" placeholder="Enter Project Description">

                        </div>
                        <div class="form-group mb-3">
                            <label for="">
                                Extimated Cost
                            </label>
                            <input type="text" class="form-control" name="extimated_cost" placeholder="Enter Project Cost">

                        </div>
                        <div class="form-group mb-3">
                            <label for="">
                                Priority
                            </label>
                            <select name="priority" id="" class="form-control form-select">
                                <option value="" disabled>Select Priority</option>
                                <option value="Inportant">Inportant</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Very-Important">Very Important</option>
                            </select>

                        </div>
                        <div class="form-group mb-3">
                            <label for="">
                                Status
                            </label>
                            <select name="status" id="" class="form-control form-select">
                                <option value="" disabled>Select Status</option>
                                <option value="In-Progress">In progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Pending">Pending</option>
                            </select>

                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add_project">Add</button>
                        </div>
                    </form>




                    <?php
                    if (isset($_POST['add_project'])) {

                        $departs_id = $_POST['department_id'];
                        $project_title = $_POST['project_title'];
                        $project_description = $_POST['project_description'];
                        $extimated_cost = $_POST['extimated_cost'];
                        $priority = $_POST['priority'];

                        $lecrosoft = "INSERT INTO `department_project`(`department_id`, `project_title`, `project_description`, `project_extimation`, `priority`) VALUES ($departs_id,'$project_title','$project_description','$extimated_cost','$priority')";
                        $sql_query = mysqli_query($con, $lecrosoft);

                        if ($sql_query) {
                            echo "Project successfully added";
                            echo '<script type="text/javascript">location = location.href </script>';
                        } else {
                            die(mysqli_error($con));
                        }
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
    <?php
    include('includes/footer.php');

    ?>
    <!-- footer ends -->

    <!-- Custom Theme JavaScript -->
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
        (function() {
            [].slice
                .call(document.querySelectorAll(".sttabs"))
                .forEach(function(el) {
                    new CBPFWTabs(el);
                });
        })();
    </script>
    <script>
        $(document).ready(function() {
            $('.add-family').click(function() {
                $('#dataModal2').modal("show");
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.add-projects').click(function() {
                $('#add_project').modal("show");
            })
        })
    </script>


</body>

</html>