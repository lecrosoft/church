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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- ======= PRO BANNER COMES IN ================== -->
                    <div class="row" id="proBanner">
                        <div class="col-12">
                            <span class="d-flex align-items-center purchase-popup">


                                <p>
                                <h4 class="page-title"> Welcome to <span> <?php echo $department ?> Department </span></h4>
                                </p>
                                <a href="https://lecrosoft.com" target="_blank" class="btn download-button purchase-button ml-auto">Check for Updates</a>
                                <i class="mdi mdi-close" id="bannerClose"></i>
                            </span>
                        </div>
                    </div>


                    <!-- ======= PRO BANNER ENDS HERE ================== -->



                    <!-- ================== PAGE HEADER COMES IN ==================== -->
                    <?php include('includes/page_header.php') ?>
                    <!-- ================== PAGE HEADER ENDS HERE ==================== -->


                    <!-- =================== FIRST SECTION TO DISPLAY INCOME AND EXPENSES AND BALANCE SUM STARTS HERE ============ -->
                    <?php include('includes/department_first_section.php') ?>
                    <!-- =================== FIRST SECTION TO DISPLAY INCOME AND EXPENSES AND BALANCE SUM ENDSHERE ============ -->



                    <!-- =================== SECOND SECTION TO DISPLAY INCOME AND EXPENSES AND CHARTS AND MARITAL STATUS  STARTS HERE ============ -->
                    <?php //include('includes/department_second_section.php') 
                    ?>
                    <!-- =================== FIRST SECTION TO DISPLAY INCOME AND EXPENSES AND BALANCE SUM ENDSHERE ============ -->

                    <!-- =================== SECOND SECTION TO DISPLAY MEMBERS,USERS,DEPARTMENTS  STARTS HERE ============ -->
                    <?php include('includes/department_members_analytics_section.php') ?>
                    <!-- =================== FIRST SECTION TO DISPLAY INCOME AND EXPENSES AND BALANCE SUM ENDSHERE ============ -->


                    <!-- =================== SECOND SECTION TO DISPLAY BIRTRHDAY  STARTS HERE ============ -->
                    <?php //include('includes/birthday_section.php') 
                    ?>
                    <!-- =================== FIRST SECTION TO DISPLAY BIRTHDAY ENDSHERE ============ -->





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
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- ======= external script comes in =========== -->
    <?php include('includes/external_js.php') ?>


    <!-- ======= dashboard script comes in =========== -->
    <?php include('includes/dashboard_js.php')
    ?>
    <!-- End custom js for this page -->
</body>

</html>