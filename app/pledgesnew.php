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
                            Fund Raising Purpose:
                            <?php
                            if (isset($_GET['cp_id'])) {
                                $cp_id = $_GET['cp_id'];
                                $lecrosoft = "SELECT * FROM campaign WHERE campaign_id =$cp_id";
                                // $lecrosoft = "SELECT pledges.*,campaign,note,amount,pledge_date,pledge_due_date FROM pledges LEFT JOIN campaign ON pledges.campaign_id=campaign.campaign_id LEFT JOIN members ON pledges.member_id = members.member_id WHERE pledges.campaign_id =$cp_id ";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $row = mysqli_fetch_assoc($query_lecrosoft);
                                // extract($row);
                                $campaign_name = $row['campaign'];

                                echo "$campaign_name";
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
                                                    <button type="button" class="btn btn-primary add-pledge">
                                                        New Pledger
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="table-responsive">

                                            <table id="example-transation" class=" table display table-bordered table-striped" style="width:100%">
                                                <thead>
                                                    <tr>



                                                        <th>Pledged by</th>
                                                        <th>Amt(₦)</th>
                                                        <th>Pledge Date</th>
                                                        <th>Due Date</th>
                                                        <th>Amt payed</th>
                                                        <th>Balance</th>
                                                        <!-- <th>Status</th> -->

                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    selectPledgesByUnderCampaign();
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
                                            $campaign = $_POST['campaign'];
                                            $note = $_POST['note'];
                                            $pledge_by = $_POST['pledge_by'];
                                            $amount = $_POST['amount'];
                                            $pdate  = $_POST['pdate'];
                                            $pduedate = $_POST['pduedate'];

                                            //  to prevent redundancy fro add new pledger
                                            $sql = "SELECT * FROM pledges WHERE member_id = $pledge_by && campaign_id = $cp_id";
                                            $query_sql = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($query_sql);
                                            $member_id = $row['member_id'];
                                            $campaign_id = $row['campaign_id'];
                                            if ($member_id == $pledge_by && $campaign_id == $cp_id) {
                                                echo "<script>alert('This User has Already Pledged under this category')</script>";
                                                // echo "Already Pledged";
                                            } else {

                                                $lecrosoft = "INSERT INTO `pledges`(`campaign_id`, `member_id`, `note`, `amount`, `pledge_date`, `pledge_due_date`,`balance`) VALUES ('$campaign','$pledge_by','$note','$amount','$pdate','$pduedate',$amount)";

                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                $lecrosft_update_campaign = "UPDATE campaign SET `amount_pledged` = `amount_pledged` + $amount WHERE campaign_id = $cp_id";
                                                $query_update_campaign = mysqli_query($con, $lecrosft_update_campaign);
                                                if ($query_update_campaign) {
                                                    echo "<script type='text/javascript'>location=location.href</script>";
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
                            <div class="modal-body" id="pledge-payment-form">

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
                                <h5 class="modal-title text-white">New Pledge By member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">
                                    <div class="form-group mb-3">

                                        <label for="">Campaign<span class="text-danger">*</span></label>
                                        <select class="form-select form-control" name="campaign" required>
                                            <?php
                                            if (isset($_GET['cp_id'])) {
                                                $campaign_id_selected = $_GET['cp_id'];
                                            }

                                            ?>

                                            <?php
                                            $lecrosoft = "SELECT * FROM campaign WHERE campaign_id = $campaign_id_selected";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                extract($row);
                                                echo " <option value='$campaign_id'>$campaign</option >";
                                            }

                                            ?>


                                        </select>


                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Note<span class="text-danger">*</span></label>
                                        <textarea id="" cols="30" rows="10" required class="form-control" name="note"></textarea>

                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Pledge by<span class="text-danger">*</span></label>
                                        <select class="form-select form-control select2" required name="pledge_by" style="width:100%;padding:2rem;height:300px !important">
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
                                        <label for="">Amount<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Pledge Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="pdate" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Pledge due Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="pduedate" required>

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
                var pledger_id = $(this).attr("id");
                $.ajax({
                    url: "fetch_pledger_payment_form.php",
                    method: "post",
                    data: {
                        pledger_id: pledger_id,


                    },
                    success: function(data) {
                        // console.log('mydata', data)
                        $("#pledge-payment-form").html(data);
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
            $('.add-pledge').click(function() {
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