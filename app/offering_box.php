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
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-dropbox"></i>
                            </span>
                            Virtual Offring Boxes
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="#"><span></span>Overview
                                        <i class="
                        mdi mdi-alert-circle-outline
                        icon-sm
                        text-primary
                        align-middle
                      "></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- ================== PAGE HEADER ENDS HERE ==================== -->




                    <div class="row">
                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h4 class="card-title ">

                                        </h4>

                                        <!-- ====================== tab starts ============================= -->

                                        <div class="page_button d-flex justify-content-between ">
                                            <div class="d-flex m-2">

                                                <h4>Honor thy God with thy substances</h4>

                                            </div>

                                        </div>
                                        <!-- row -->
                                        <div class="row">
                                            <?php
                                            $lecrosoft = "SELECT * FROM `income_expence_category` WHERE type ='income'";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                $id = $row['id'];
                                                $category_name = $row['category_name'];



                                            ?>


                                                <div class="col-md-4 stretch-card grid-margin ">

                                                    <!-- <div class="card  card-img-holder text-white" style="background:url('assets/images/dashboard/offering_box.png'); background-repeat:no-repeat;background-size:cover;background-position:center"> -->
                                                    <div class="card bg-gradient-primary card-img-holder text-white">
                                                        <div class="card-body">
                                                            <!-- <img src="assets/images/dashboard/offering_box.png" class="card-img-absolute" alt="circle-image" /> -->
                                                            <h2 class="font-weight-bold mb-3">
                                                                <?php echo $category_name ?>
                                                                <i class="mdi mdi-dropbox menu-icon mdi-24px float-right"></i>
                                                            </h2>


                                                            <button id="<?php echo $id ?>" class="mb-5 btn btn-sm btn-success pay_offering">Make Payment</button>
                                                            <!-- <h5 class="card-text">Department Leader: <?php  ?></h5> -->
                                                        </div>
                                                    </div>

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





                <div id="dataModal2" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content modal-offering-box">




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
                $('.pay_offering').click(function() {
                    let catId = $(this).attr('id');
                    $.ajax({
                        url: "fetch_offering_box_form.php",
                        method: "post",
                        data: {
                            catId: catId
                        },
                        success: function(data) {
                            $('.modal-offering-box').html(data);
                            $('#dataModal2').modal('show');
                        }

                    })

                })
            })
        </script>
        <!-- End custom js for this page -->
        <script src="https://js.paystack.co/v1/inline.js"></script>
</body>

</html>