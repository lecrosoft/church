<?php include('includes/head.php');


include('../connections/conn.php');
include('includes/function.php');
?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include('includes/top_nav.php') ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <!-- ========== SIDE BAR BEGINS ============ -->

            <?php include('includes/left_side_bar.php') ?>
            <!-- ========== SIDE BAR ENDS ============ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">





                    <!-- ================== PAGE HEADER COMES IN ==================== -->
                    <?php include('includes/page_header.php') ?>
                    <!-- ================== PAGE HEADER ENDS HERE ==================== -->




                    <div class="row">
                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h4 class="card-title ">

                                        </h4>

                                        <!-- ====================== tab starts ============================= -->

                                        <div class="page_button row">
                                            <div class="col-md-6">
                                                <div class="row">

                                                    <div class="form-group col-md-6 pr-2">

                                                        <select name="" id="" class="form-control form-select">
                                                            <option value="">Bulk Action </option>
                                                            <option value="">Delete </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <button class="btn btn-gradient-primary">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" id="add_department_btn" class="btn btn-gradient-primary pull-right m-l-20 btn-outline hidden-xs hidden-sm waves-effect waves-light">Add New Department</button>
                                                </div>
                                            </div>
                                        </div>

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


                                            <div class="col-md-4 stretch-card grid-margin">
                                                <a href='department_dashboard.php?d_id=<?php echo $department_id ?>' style="text-decoration:none">
                                                    <div class="card bg-gradient-primary card-img-holder text-white">
                                                        <div class="card-body">
                                                            <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                                                            <h2 class="font-weight-bold mb-3">
                                                                <?php echo $department ?>
                                                                <i class="mdi mdi-arrow-expand-all menu-icon mdi-24px float-right"></i>
                                                            </h2>


                                                            <h4 class="mb-5"> <?php echo $count_members ?> Members</h4>
                                                            <h5 class="card-text">Department Leader: <?php echo $department_leader ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /row -->


                                    <!-- ====================== tab starts ============================= -->




                                </div>


                            </div>
                        </div>
                        <?php
                        deleteDepartment();
                        ?>

                        <?php

                        addDepartment()


                        ?>


                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <!-- ========== footer starts here ========== -->
                    <?php
                    include('includes/footer.php')
                    ?>
                    <!-- ==================footer ends here ======================== -->
                    <!-- partial -->
                </div>





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

                                        <button type="submit" class="btn btn-gradient-primary text-white waves-effect" name="save" data-bs-dismiss="modal">Add</button>
                                    </div>
                                </form>





                            </div>


                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <!-- ======= external script comes in =========== -->


        <?php include('includes/external_js.php') ?>


        <script>
            $(document).ready(function() {
                $('#add_department_btn').click(function() {
                    $('#dataModal2').modal('show');
                })
            })
        </script>
        <!-- End custom js for this page -->
</body>

</html>