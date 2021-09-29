<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!-- <div class="preloader">
<div class="cssload-speeding-wheel"></div>
</div> -->
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php
        include('includes/top-nav.php');
        ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php
        include('includes/left-side-bar.php');
        ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome Admin</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Donations</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <?php

                    ?>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div class="row d-flex justify-content-between px-3">
                                        <div class="sm-10">
                                            <h3 class="box-title m-b-0">Donation/Pledges </h3>
                                            <p class="text-muted">
                                                <span class="font-weight-bold">Fund Raising Purpose:</span> <?php
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
                                            </p>
                                        </div>


                                        <div class="sm-2">

                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle add-pledge " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    New Pledger
                                                </button>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">

                                        <table id="example-transation" class="display nowrap" style="width:100%">
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
                                </div>
                            </div>
                            <?php
                            deleteFamily();
                            ?>

                            <?php

                            addFamily();


                            ?>


                        </div>


                        <!-- /.row -->
                    </div>
                </div>
                <!-- .right-sidebar -->
                <?php
                include('includes/right-side-bar.php');
                ?>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <!-- footer begins -->

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
            <!-- ADD Pledger -->
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
                                    <select class="form-select form-control" required name="pledge_by">
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
                    echo "<script>alert('This User has Already Pledged under this pledger')</script>";
                    // echo "Already Pledged";
                } else {

                    $lecrosoft = "INSERT INTO `pledges`(`campaign_id`, `member_id`, `note`, `amount`, `pledge_date`, `pledge_due_date`) VALUES ('$campaign','$pledge_by','$note','$amount','$pdate','$pduedate')";

                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                }
            }
            ?>






            <?php
            include('includes/footer.php');
            ?>
            <!-- footer ends -->
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
            <script>
                $(document).ready(function() {
                    $('.add-pledge').click(function() {
                        $('#dataModal2').modal("show");
                    })
                })
            </script>
            <script>
                $(document).ready(function() {
                    $('.add-expense').click(function() {
                        $('#dataModal1').modal("show");
                    })
                })
            </script>
            <script>
                $(document).ready(function() {
                    $('#example-transation').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>




</body>

</html>