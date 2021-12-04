<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

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
                        <h4 class="page-title">Welcome Admin</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button type="button" id="add_department_btn" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Add New Department</button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- row -->
                <div class="row">
                    <?php
                    $lecrosoft = "SELECT * FROM department";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        $department_id = $row['department_id'];
                        $department = $row['department_name'];
                        $department_leader = $row['department_leader_name'];

                        $lecrosoft_dept_member = "SELECT * FROM department_member  WHERE department_id = $department_id";

                        $query_lecrosoft_dept_member = mysqli_query($con, $lecrosoft_dept_member);
                        $count_members = mysqli_num_rows($query_lecrosoft_dept_member);

                    ?>


                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <a href='department_dashboard.php?d_id=<?php echo $department_id ?>'>
                                <div class="white-box text-center bg-primary">
                                    <p class="text-white" style="font-weight:bold;font-size:20px;"><?php echo $department ?></p>

                                    <h2 class="text-white counter"><?php echo $count_members ?></h2><span class="text-white">Members</span>

                                    <h2 class="text-white" style="font-weight:bold;font-size:15px;">Leader : <?php echo $department_leader ?></h2>

                                </div>
                            </a>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <!-- /row -->
                <div class="row">

                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-sm-6">
                                <?php
                                deleteDepartment();
                                ?>

                                <?php

                                addDepartment()


                                ?>


                                <div class="">


                                    </form>



                                    <?php
                                    if (isset($_POST['update'])) {
                                        if (isset($_GET['edit_id'])) {
                                            $id = $_GET['edit_id'];
                                            $department_name = $_POST['department_name'];
                                            $department_leader = $_POST['department_leader'];
                                            $lecrosoft = "UPDATE department SET department_name='$department_name',department_leader_name='$department_leader' WHERE department_id = $id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            if (!$query_lecrosoft) {
                                                die("QUERY ERROR" . mysqli_error($con));
                                            }
                                        }
                                    }
                                    ?>




                                    <!-- edit Department -->
                                    <?php
                                    if (isset($_GET['edit_id'])) {
                                        $edit_id = $_GET['edit_id'];

                                        $lecrosoft = "SELECT * FROM department WHERE department_id = $edit_id";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            $department_id = $row['department_id'];
                                            $department = $row['department_name'];
                                            $department_leader = $row['department_leader_name'];

                                    ?>




                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>


                        <!-- /.row -->
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





            <div id="dataModal2" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form method="POST">

                                <div class="form-group mb-3">

                                    <input type="text" class="form-control" name="department_name" placeholder="Department Name">
                                </div>




                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="department_leader" placeholder="Department Leader">
                                </div>




                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-info text-white waves-effect" name="save" data-bs-dismiss="modal">Add</button>
                                </div>
                            </form>





                        </div>


                    </div>
                </div>
            </div>
            <!-- footer ends -->


            <script>
                $(document).ready(function() {
                    $('#add_department_btn').click(function() {
                        $('#dataModal2').modal('show');
                    })
                })
            </script>

</body>

</html>