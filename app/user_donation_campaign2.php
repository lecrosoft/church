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
                                <i class="mdi mdi-account-multiple"></i>
                            </span>
                            Fund Raising
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




                            <!-- ====================== tab starts ============================= -->


                            <div class="d-flex justify-content-between" style="flex-wrap:wrap">

                                <?php
                                $lecrosoft = "SELECT * FROM campaign";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

                                    extract($row);



                                ?>


                                    <div class="col-md-4 stretch-card grid-margin">
                                        <a href='pledges.php?cp_id=<?php echo $campaign_id ?>' style="text-decoration:none">
                                            <div class="card bg-gradient-primary card-img-holder text-white">
                                                <div class="card-body">
                                                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                                                    <h2 class="font-weight-bold mb-3">
                                                        <?php echo $campaign ?>
                                                        <i class="mdi mdi-arrow-expand-all menu-icon mdi-24px float-right"></i>
                                                    </h2>


                                                    <p class="mb-5"> <?php echo $description ?> </p>
                                                    <h5 class="card-text">Date: <?php echo $date ?></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php
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




            <!-- ========== J QUERY CODE STARTS HERE ========= -->

            <!-- CODE TO VIEW FAMILY DETAILS IN MODAL START -->

            <script>
                $(document).ready(function() {
                    $(".view_data").click(function() {
                        var family_id = $(this).attr("id");
                        $.ajax({
                            url: "fetch_family.php",
                            method: "post",
                            data: {
                                family_id: family_id,


                            },
                            success: function(data) {
                                // console.log('mydata', data)
                                $("#family_content").html(data);
                                $('#dataModal').modal("show");

                            },
                            error: function(obj, status, err) {
                                console.log(err)
                            }
                        });


                    });




                });
            </script>
            <!-- CODE TO VIEW FAMILY DETAILS IN MODAL END -->


            <!-- CODE TO SHOW FAMILY ADD FORM START -->

            <script>
                $(document).ready(function() {
                    $('.add-family').click(function() {
                        $('#dataModal2').modal("show");
                    })
                })
            </script>

            <!-- CODE TO SHOW FAMILY ADD FORM END -->



            <!-- DELETE ALERT START HERE -->

            <script>
                $(document).ready(function() {
                    $('.delete-alert').click(function(e) {
                        e.preventDefault();
                        let id = $(this).attr("id");
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $.ajax({
                                    url: "family.php",
                                    method: "post",
                                    data: {
                                        del_fam_id: id
                                    },
                                    success: function(data) {

                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        location = "/church/app/family.php"
                                        console.log(location)



                                    }
                                });


                            }
                        })
                    })
                })
                // const flashdata = $('.flash-data').data('flashdata')
                // if (flashdata) {
                //     Swal.fire(
                //         'Deleted!',
                //         'Your file has been deleted.',
                //         'success'
                //     )
                // }
            </script>
            <!-- DELETE ALERT STOPS HERE -->

            <!-- ========== J QUERY CODE END HERE ========= -->
</body>

</html>