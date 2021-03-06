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
                                        <form action="send_sms.php" method="POST" enctype="multipart/form-data">

                                            <div class="row">
                                                <?php
                                                $mail_sql = "SELECT * FROM `sms_settings`";
                                                $query_sql = mysqli_query($con, $mail_sql);
                                                $row = mysqli_fetch_assoc($query_sql);
                                                extract($row);
                                                ?>
                                                <div class="form-group col-md-6">
                                                    <input type="text" hidden name="user_name" class="receipient_email_array form-control" placeholder="Sender Name" Value="<?php echo $sender_name ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" hidden name="sender_api" class=" form-control" placeholder="Api" Value="<?php echo $api_key ?>">
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="">Select Sender ID</label>
                                                    <select name="sender_id" class=" form-control form-select" id="">
                                                        <?php $sql = "SELECT * FROM `sms_sender_id`";
                                                        $query_sql = mysqli_query($con, $sql);

                                                        while ($row = mysqli_fetch_assoc($query_sql)) {
                                                            extract($row);
                                                            echo "<option value='$sender_id'>$sender_id</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Which group do you want to send SMS to</label>
                                                    <select name="select_contact" id="select_contact" class="form-control form-select">
                                                        <option disable selected value="">===Select Group === </option>
                                                        <option value="members_only">Members Only </option>
                                                        <option value="pastors_only">Pastors Only </option>
                                                        <option value="members_and_pastors">Members and Pastors </option>
                                                        <option value="first_timers">All First Timers </option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="">
                                                <!-- <div class="form-group">
                                                    <button type="button" class="btn btn-gradient-primary">
                                                        SMS Unit Balance &nbsp; <span class="badge badge-light text-dark">400</span>
                                                    </button>
                                                </div> -->
                                            </div>



                                            <div class="message-content">
                                                <div class="form-group">
                                                    <label for="">Message Text</label>
                                                    <textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Enter your message here"></textarea>
                                                </div>
                                                <button type="submit" name="send" class="btn btn-gradient-primary">SEND </button>
                                            </div>
                                        </form>


                                        <!-- <div class="sms_details mt-4  p-4 text-white bg-gradient-primary">
                                            <div class="d-flex justify-content-between">
                                                <div class="message_history">
                                                    Mail History
                                                </div>
                                                <div class="message_count"> Total SMS sent ()</div>
                                            </div>
                                        </div> -->



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

    <script>
        // $(document).ready(function() {
        //     $('#select_contact').change(function() {
        //         let groupID = $(this).val();
        //         alert(groupID)
        //     })
        // })
    </script>
</body>

</html>