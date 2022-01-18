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
                            SMS
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
                                            <div class="d-flex">

                                                <div class="form-group pr-2">
                                                    <label for="">Which group do you want to send SMS to</label>
                                                    <select name="" id="" class="form-control form-select">
                                                        <option value="">All Members </option>
                                                        <option value="">All Pastors </option>
                                                        <option value="">All First Timers </option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-gradient-primary">
                                                        SMS Unit Balance &nbsp; <span class="badge badge-light text-dark">400</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="receipient_contacts_array form-control">
                                        </div>
                                        <div class="message-content">
                                            <div class="form-group">
                                                <label for="">Message Text</label>
                                                <textarea class="form-control" name="" id="summernote" cols="30" rows="10"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-gradient-primary">SEND </button>
                                        </div>



                                        <div class="sms_details mt-4  p-4 text-white bg-gradient-primary">
                                            <div class="d-flex justify-content-between">
                                                <div class="message_history">
                                                    Message History
                                                </div>
                                                <div class="message_count"> Total SMS sent ()</div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="form-check form-check-flat form-check-primary">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"> Select All </label>
                                                            </div>
                                                        </th>
                                                        <th>SM ID</th>
                                                        <th>Time</th>
                                                        <th>Content</th>
                                                        <th>Destination</th>
                                                        <th>SMS Cost</th>


                                                        <th>Balance</th>
                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    selectFamily();
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


                                        <!-- ====================== tab starts ============================= -->


                                        <!-- ============PHP CODE TO EXECUTE QUERIES STARTS HERE ===================== -->






                                        <!-- ============PHP CODE TO EXECUTE QUERIES END HERE ===================== -->


                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- ========== footer starts here ========== -->







                <!-- =============== MODAL COMES IN ======================= -->

                <!-- EDIT FAMILY MODAL START-->

                <div id="dataModal" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Family Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="family_content">

                            </div>


                        </div>
                    </div>
                </div>


                <!-- EDIT FAMILY MODAL ENDS-->







                <!-- =============== MODALENDS HERE ======================= -->







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




    <!-- ========== J QUERY CODE STARTS HERE ========= -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Enter your message here...',
                tabsize: 2,
                spellCheck: true,
                height: 100

            });
        });
    </script>

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
                                location = window.location.href
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


    <!-- summernote -->



    <!-- ========== J QUERY CODE END HERE ========= -->
</body>

</html>