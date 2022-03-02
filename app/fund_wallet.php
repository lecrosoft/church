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

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">New Fund</h4>
                                    <?php

                                    if (isset($_POST['add_fund'])) {
                                        $member_id = $_SESSION['member_id'];

                                        $amount = $_POST['amount'];
                                        $payment_method = $_POST['payment_method'];
                                        $approved_by = $_POST['approved_by'];
                                        $img = $_FILES['img']['name'];
                                        $temp_file = $_FILES['img']['tmp_name'];
                                        $folder = "assets/images/pop/" . $img;

                                        move_uploaded_file($temp_file, $folder);
                                        $lecrosoft = "INSERT INTO `wallet`(`member_id`, `payment_date`, `amount`, `payment_method_id`, `received_by_id`, `pop`) VALUES ($member_id,now(),'$amount',$payment_method,$approved_by,'$img')";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        if ($query_lecrosoft) {
                                            echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   your fund has been added successfully.It will reflect on your wallet when yor payment has been confirmed!
</div>';
                                            sleep(6);
                                            echo '<script type="text/javascript"> location = location.href</script>';
                                        }
                                    }
                                    ?>
                                    <!-- <p class="card-description"> Basic form layout </p> -->
                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">To be approved by (Select the person incharge of the collection of your wallet fee so you can get the account details to make your payment to</label>
                                            <select name="approved_by" id="approved_by" class="form-control form-select select2">
                                                <option value=''>Select The Account you want to make payment to </option>
                                                <?php
                                                $sql = "SELECT wallet_payment_receiver.*,account_fullname,bank_name,account_number,first_name,last_name FROM `wallet_payment_receiver` LEFT JOIN `members` ON wallet_payment_receiver.member_id = members.member_id";
                                                $query_sql = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($query_sql)) {
                                                    extract($row);
                                                    echo "<option value='$member_id'>$last_name $first_name </option>";
                                                }


                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Amount</label>
                                            <input type="number" name="amount" class="form-control" id="exampleInputUsername1" placeholder="enter Amount" min="1">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Payment Method</label>
                                            <select name="payment_method" id="" class="form-control form-select">
                                                <?php
                                                $sql = "SELECT * FROM payment_method";
                                                $query_sql = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($query_sql)) {
                                                    extract($row);
                                                    echo "<option value='$id'>$payment_method</option>";
                                                }


                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Upload Proof Of Payment</label>
                                            <input type="file" name="img" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image/PDF">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <button type="submit" name="add_fund" class="btn btn-gradient-primary mr-2">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>




                        <!-- end of first div -->


                        <!-- begining of second div -->

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Transaction Status</h4>
                                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>

                                                <th>Amt.</th>
                                                <th>Created</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $session_id = $_SESSION['member_id'];
                                            $lecrosoft = "SELECT * FROM `wallet` WHERE member_id = $session_id";

                                            $query_lecrosoft_transanct_history = mysqli_query($con, $lecrosoft);

                                            while ($row = mysqli_fetch_assoc($query_lecrosoft_transanct_history)) {
                                                extract($row);
                                                if ($status == 'pending') {
                                                    $badge_color = 'danger';
                                                } elseif ($status == 'confirmed') {
                                                    $badge_color = 'success';
                                                }
                                                echo " <tr>";
                                                echo "<td>$amount</td>";
                                                $date = date('d M Y', strtotime($payment_date));
                                                echo "<td>$date</td>";

                                                echo " <td>
                                                
                                                    <label class='badge badge-$badge_color'>$status</label>
                                                </td>";
                                                echo " </tr>";
                                            }
                                            ?>







                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div id="dataModal" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-primary">
                                        <h5 class="modal-title">Receiver's Account Details</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="container">
                                        <h6 style="font-weight:bold">NOTE:</h6>
                                        <p class="text-danger">Make your payment to the acount details below,after making the payment, close the pop-up and fill in the details of the payment you made, eg, amount and most importantly the Prove of payments,Your payment will reflect in your wallet when it has been approved by an admin or the receiver.</p>
                                        <div class="modal-body" id="account_content">

                                        </div>
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


    <!-- ======= dashboard script comes in =========== -->
    <?php include('includes/dashboard_js.php')
    ?>
    <!-- End custom js for this page -->



    <script>
        $(document).ready(function() {
            $('#approved_by').change(function() {
                let userId = $(this).val();
                $.ajax({
                    url: "fetch_wallet_account_details.php",
                    method: "POST",
                    data: {
                        userId: userId
                    },
                    success: function(data) {
                        $('#dataModal').modal('show');
                        $('#account_content').html(data);
                    }

                })

            })
        })
    </script>
</body>

</html>