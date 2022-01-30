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
                                <i class=" mdi mdi-cash-multiple"></i>
                            </span>
                            My Pledges
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

                                                    <!-- <select name="" id="" class="form-control form-select">
                                                        <option value="">Bulk Action </option>
                                                        <option value="">Delete </option>
                                                    </select> -->
                                                </div>
                                                <!-- <div class="form-group">
                                                    <button class="btn btn-primary">Send</button>
                                                </div> -->
                                            </div>
                                            <div class="">
                                                <!-- <div class="form-group">
                                                    <button type="button" class="btn btn-primary add-pledge">
                                                        New Pledger
                                                    </button>
                                                </div> -->
                                            </div>
                                        </div>


                                        <div class="table-responsive">

                                            <table id="example-transation" class=" table display table-bordered table-striped" style="width:100%">
                                                <?php
                                                $member_id = $_SESSION['member_id'];
                                                $sql = "SELECT * FROM `pledges` LEFT JOIN campaign ON pledges.campaign_id = campaign.campaign_id WHERE member_id = $member_id ORDER BY balance DESC";
                                                $query_sql = mysqli_query($con, $sql);
                                                $count = mysqli_num_rows($query_sql);
                                                if ($count == 0) {
                                                    echo "<h4 class='text-center'>No pledges records found for this user!</h4>";
                                                } else {

                                                ?>
                                                    <thead>
                                                        <tr>



                                                            <th>Campaign Title</th>
                                                            <th>Pledge Date</th>
                                                            <th>Amt Pledged(₦)</th>
                                                            <th>Due Date</th>
                                                            <th>Amt payed</th>
                                                            <th>Balance</th>

                                                            <!-- <th>Status</th> -->

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($query_sql)) {
                                                        $campaign_id = $row['campaign_id'];
                                                        $campaign_name = $row['campaign'];
                                                        $pledge_date = $row['pledge_date'];
                                                        $amount = $row['amount'];
                                                        $pledge_due_date = $row['pledge_due_date'];
                                                        $ammount_paid = $row['ammount_paid'];
                                                        $pledges_id = $row['pledges_id'];
                                                        $status = $row['status'];

                                                        if ($amount == $ammount_paid) {
                                                            $disabled = "disabled";
                                                            $btn_label = "Payment made";
                                                            $btn_color = "btn-success";
                                                            $faplus = "fa-check";
                                                        } else {
                                                            $disabled = "";
                                                            $btn_label = "Add Payment";
                                                            $btn_color = "btn-warning";
                                                            $faplus = "fa-plus";
                                                        }


                                                        echo "<tr>";
                                                        echo "<td><a type='button' id='$campaign_id' class='pledge_details text-primary text-bold' style='cursor: pointer'>$campaign_name</a></td>";
                                                        echo "<input type ='hidden' class ='member_id' value ='$member_id'/>";

                                                        echo "<td>$pledge_date</td>";
                                                        echo "<td>$amount</td>";
                                                        echo "<td>$pledge_due_date</td>";
                                                        echo "<td>$ammount_paid</td>";
                                                        $balance = $amount - $ammount_paid;
                                                        echo "<td>$balance</td>";

                                                        echo "<td class='text-nowrap'><button $disabled type='button'  id='$pledges_id' class='view_data btn $btn_color btn-sm' data-toggle='tooltip' data-original-title='Add payment for this pledger' > <i class='fa $faplus text-inverse m-r-10'></i> $btn_label </button> </td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                    ?>


                                                    </tbody>
                                            </table>
                                        </div>





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
                            <div class="show_response">

                            </div>
                            <div class="modal-body" id="pledge-payment-form">

                            </div>


                        </div>
                    </div>
                </div>


                <!-- ADD PAYMENT MODAL ENDS-->










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
                    url: "fetch_online_pledger_payment_form.php",
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



    <!-- DELETE ALERT STOPS HERE -->

    <!-- ========== J QUERY CODE END HERE ========= -->

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</body>

</html>