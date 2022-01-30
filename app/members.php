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



                                        <?php
                                        if (isset($_GET['source'])) {
                                            $source = $_GET['source'];
                                        } else {
                                            $source = "";
                                        }

                                        switch ($source) {
                                            case  "add-member":
                                                include('includes/add_new_member.php');
                                                break;
                                            case "edit":
                                                include('includes/edit_members.php');
                                                break;
                                            case "view":
                                                include('includes/view_member.php');
                                                break;
                                            case  "member-profile":
                                                include('includes/member_profile.php');

                                                break;

                                            default:
                                                include('includes/view_all_members.php');
                                        }
                                        ?>


                                        <!-- ====================== tab starts ============================= -->


                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>



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
    <!-- End custom js for this page -->


    <!-- ================ PERSONAL PLEDGE HISTORY ============== -->

    <script>
        $(document).ready(function() {
            $('.pledge_details').click(function() {
                const campaignId = $(this).attr('id');
                const member_id = $('.member_id').val();



                $.ajax({

                    url: "includes/pledges_payment_history.php",
                    method: "post",
                    data: {
                        campaignId: campaignId,
                        member_id: member_id
                    },
                    success: function(data) {
                        $('#pledges_payment_content').html(data);
                        $('#dataModal2').modal("show");
                    }
                })


            })
        })
    </script>
    <script>
        $('#my-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#member-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>