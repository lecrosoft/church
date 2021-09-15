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
                        <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <?php

                    ?>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="white-box">
                                    <h3 class="box-title m-b-0">Department List</h3>
                                    <p class="text-muted">this is the sample data here for crm</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Department Title</th>
                                                    <th>Department Leader</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                selectDepartment();
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                deleteDepartment();
                                ?>

                                <?php

                                addDepartment()


                                ?>


                                <div class="white-box">
                                    <h3 class="box-title m-b-0">Add Department</h3>
                                    <p class="text-muted"></p>
                                    <form action="" class="form-horizontal form-material" method="POST">
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="department_name" placeholder="Department Name">
                                            </div>




                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="department_leader" placeholder="Department Leader">
                                            </div>

                                        </div>



                                        <button type="submit" class="btn btn-info text-white waves-effect" name="save" data-bs-dismiss="modal">Add</button>

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
                                            <h3 class="box-title m-b-0 py-2">Edit Department</h3>
                                            <p class="text-muted"></p>
                                            <form action="department.php?edit_id=<?php echo $department_id ?>" class="form-horizontal form-material" method="POST">
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="department_name" value='<?php echo "$department" ?>'>
                                                    </div>




                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="department_leader" value='<?php echo "$department_leader" ?>'>
                                                    </div>

                                                </div>



                                                <button type="submit" class="btn btn-info text-white waves-effect" name="update" data-bs-dismiss="modal">Update</button>

                                            </form>


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
            <!-- footer ends -->
</body>

</html>