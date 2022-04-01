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
                            Event Title:
                            <?php
                            if (isset($_GET['event_id'])) {
                                $event_id = $_GET['event_id'];
                                $lecrosoft = "SELECT * FROM event WHERE event_id =$event_id";
                                // $lecrosoft = "SELECT pledges.*,campaign,note,amount,pledge_date,pledge_due_date FROM pledges LEFT JOIN campaign ON pledges.campaign_id=campaign.campaign_id LEFT JOIN members ON pledges.member_id = members.member_id WHERE pledges.campaign_id =$cp_id ";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                // extract($row);
                                $event_title = $row['event_title'];

                                echo "$event_title";
                            }
                            ?>

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

                                                    <select name="" id="" class="form-control form-select">
                                                        <option value="">Bulk Action </option>
                                                        <option value="">Delete </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary add-contribution">
                                                        New Contributor
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="table-responsive">

                                            <table id="example-transation" class=" table display table-bordered table-striped" style="width:100%">
                                                <thead>
                                                    <tr>



                                                        <th>Member Name</th>
                                                        <th>Amt(₦)</th>
                                                        <th>Date</th>
                                                        <th>Amt payed</th>
                                                        <th>Balance</th>
                                                        <!-- <th>Status</th> -->

                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    selectContributorsUnderEvent();
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

                                        <!-- DELETE FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['del_fam_id'])) {
                                            $del_fam_id = $_POST['del_fam_id'];
                                            $lecrosoft = "DELETE FROM family WHERE family_id =$del_fam_id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            if ($query_lecrosoft) {
                                                echo '<script type="text/javascript">location = "family.php"</script>';
                                            } else {
                                                die("QUERY ERROR" . mysqli_error($con));
                                            }
                                        }
                                        ?>
                                        <!-- DELETE FAMILY CODE END -->




                                        <!-- ADD NEW PLEDGER -->

                                        <?php
                                        if (isset($_POST['add'])) {
                                            $event_title_id = $_POST['event_title_id'];
                                            $contribution_by = $_POST['contribution_by'];
                                            $amount = $_POST['amount'];
                                            $contribution_date  = $_POST['contribution_date'];


                                            //  to prevent redundancy from add new contributor
                                            $sql = "SELECT * FROM `contributions` WHERE `member_id` = $contribution_by && `event_id` = $event_title_id";
                                            $query_sql = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($query_sql);
                                            $member_id = $row['member_id'];
                                            $event_id = $row['event_id'];
                                            if ($member_id == $contribution_by && $event_id == $event_title_id) {
                                                echo "<script>alert('This User has Already been added as a contributor under this event')</script>";
                                                // echo "Already Pledged";
                                            } else {

                                                $lecrosoft = "INSERT INTO `contributions`(`event_id`, `member_id`, `amount_to_contribute`, `contribution_date`) VALUES ($event_title_id,$contribution_by,'$amount','$contribution_date')";

                                                $query_lecrosoft = mysqli_query($con, $lecrosoft) or die(mysqli_error($con));

                                                $lecrosft_update_event = "UPDATE event SET `amount_promised` = `amount_promised` + $amount WHERE event_id = $event_title_id";
                                                $query_update_event = mysqli_query($con, $lecrosft_update_event);
                                                if ($query_update_event) {
                                                    echo "<script type='text/javascript'>location=window.location.href</script>";
                                                }
                                            }
                                        }
                                        ?>


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

                <!-- ADD PAYMENT  START-->

                <div id="dataModal" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="contribution-payment-form">

                            </div>


                        </div>
                    </div>
                </div>


                <!-- ADD PAYMENT MODAL ENDS-->




                <!-- 
ADD PLEDGER -->
                <div id="dataModal2" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-white">New Contribution member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">
                                    <div class="form-group mb-3">

                                        <label for="">Event Title<span class="text-danger">*</span></label>
                                        <select class="form-select form-control" name="event_title_id" required>
                                            <?php
                                            if (isset($_GET['event_id'])) {
                                                $event_id = $_GET['event_id'];
                                            }

                                            ?>

                                            <?php
                                            $lecrosoft = "SELECT * FROM event WHERE event_id = $event_id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                extract($row);
                                                echo " <option value='$event_id'>$event_title</option >";
                                            }

                                            ?>


                                        </select>


                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Pledge by<span class="text-danger">*</span></label>
                                        <select class="form-select form-control select2" required name="contribution_by" style="width:100%;padding:2rem;height:300px !important">
                                            <option value="">Select pledger name</option>
                                            <?php
                                            $lecrosoft = "SELECT * FROM members";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                extract($row);
                                                echo " <option value='$member_id'>" . "$last_name" . " " . "$first_name" . "</option>";
                                            }
                                            ?>


                                        </select>


                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Amount to contribute<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Congtribution Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="contribution_date" value="<?php echo date('Y-m-d') ?>">

                                    </div>




                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
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

    <!-- CODE TO FETCH PLEDGER DETAILS IN MODAL START -->

    <script>
        $(document).ready(function() {
            $(".view_data").click(function() {
                var contributor_id = $(this).attr("id");
                $.ajax({
                    url: "fetch_contributor_payment_form.php",
                    method: "post",
                    data: {
                        contributor_id: contributor_id,


                    },
                    success: function(data) {
                        // console.log('mydata', data)
                        $("#contribution-payment-form").html(data);
                        $('#dataModal').modal("show");

                    },
                    error: function(obj, status, err) {
                        console.log(err)
                    }
                });


            });




        });
    </script>
    <!-- CODE TO  FETCH PLEDGER DETAILS IN MODAL END -->


    <!-- CODE TO SHOW FAMILY ADD FORM START -->

    <script>
        $(document).ready(function() {
            $('.add-family').click(function() {
                $('#dataModal2').modal("show");
            })
        })
    </script>

    <!-- CODE TO SHOW FAMILY ADD FORM END -->

    <script>
        $(document).ready(function() {
            $('.add-contribution').click(function() {
                $('#dataModal2').modal("show");
            })
        })
    </script>


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

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>