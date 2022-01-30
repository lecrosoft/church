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





                    <!-- end of first div -->


                    <!-- begining of second div -->

                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction Status</h4>
                                <!-- <p class="card-description"> Horizontal form layout </p> -->

                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead>
                                            <tr>

                                                <th>Amt.</th>
                                                <th>Created</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $session_id = $_SESSION['member_id'];
                                            $lecrosoft = "SELECT * FROM `wallet` WHERE status = 'pending' ORDER BY `payment_id` DESC";

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

                                                echo "<td><button id='$payment_id' class='btn btn-sm btn-warning pop'>View POP </button>

                                                <button name='approve_wallet' id='$payment_id' class='btn btn-sm btn-success approve_wallet'>Approve </button>
                                                </td>";

                                                echo " </tr>";
                                            }
                                            ?>






                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div id="popModal" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Here is the proof of payment for this transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="pop_content">

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
            $('.approve_wallet').click(function() {
                let transacId = $(this).attr('id');
                $.ajax({
                    url: "includes/confirm_wallet_payment.php",
                    method: "post",
                    data: {
                        transacId: transacId
                    },
                    success: function(data) {
                        location = window.location.href
                    }

                })
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.pop').click(function() {
                let payId = $(this).attr('id');
                $.ajax({
                    url: "includes/fetch_pop.php",
                    method: "post",
                    data: {
                        payId: payId
                    },
                    success: function(data) {
                        $('#pop_content').html(data);
                        $('#popModal').modal('show');
                    }
                })

            })
        })
    </script>
</body>

</html>