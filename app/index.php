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

                    <?php
                    if ($_SESSION['user_role'] == 'Admin') {
                        include('includes/admin_dashboard.php');
                    } elseif ($_SESSION['user_role'] == 'member') {


                        include('includes/member_dashboard.php');
                    }

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





    <script>
        $(document).ready(function() {
            $('.month_select').change(function() {
                let visitMonth = $(this).val();

                $.ajax({
                    url: "first_timmers_by_month.php",
                    method: "POST",
                    data: {
                        visitMonth: visitMonth
                    },
                    beforeSend: function() {
                        $('.firstimer_table_content').html('Loading...')
                    },
                    success: function(data) {
                        $('.firstimer_table_content').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>