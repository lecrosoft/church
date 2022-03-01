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

                    <?php $session_id = $_SESSION['member_id']; ?>



                    <!-- end of first div -->


                    <!-- begining of second div -->
                    <input type="text" id="approval_id" value="<?php echo $session_id ?>" hidden>
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction Status</h4>
                                <!-- <p class="card-description"> Horizontal form layout </p> -->

                                <div class="table-responsive">
                                    <table id="received_wallet" class="table ">
                                        <thead>
                                            <tr>

                                                <th>Amt.</th>
                                                <th>Paid by</th>
                                                <th>Pay Meth</th>
                                                <th>Created</th>
                                                <th>Paid to</th>
                                                <th>Status</th>
                                                <th>Approved by</th>
                                                <th>POP</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $lecrosoft = "SELECT wallet.*,first_name,last_name,payment_method FROM wallet  LEFT JOIN members ON wallet.member_id = members.member_id  LEFT JOIN payment_method ON wallet.payment_method_id = payment_method.id WHERE wallet.status = 'confirmed' ORDER BY payment_id DESC";

                                            $query_lecrosoft_transanct_history = mysqli_query($con, $lecrosoft);
                                            $receiver_first_name = "";
                                            $receiver_last_name = "";
                                            $approval_first_name = "";
                                            $approval_last_name = "";
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft_transanct_history)) {
                                                extract($row);
                                                $wallet_status = $row['status'];

                                                $sql = "SELECT first_name,last_name FROM members WHERE member_id = $received_by_id";
                                                $query_sql = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($query_sql)) {
                                                    $receiver_first_name = $row['first_name'];
                                                    $receiver_last_name = $row['last_name'];
                                                }
                                                $approval_sql = "SELECT first_name,last_name FROM members WHERE member_id = $approved_by";
                                                $query_sql_approval = mysqli_query($con, $approval_sql);
                                                while ($row = mysqli_fetch_assoc($query_sql_approval)) {
                                                    $approval_first_name = $row['first_name'];
                                                    $approval_last_name = $row['last_name'];
                                                }



                                                if ($wallet_status == 'pending') {
                                                    $badge_color = 'danger';
                                                } elseif ($wallet_status == 'confirmed') {
                                                    $badge_color = 'success';
                                                }
                                                echo " <tr>";
                                                echo "<td>$amount</td>";
                                                echo "<td>$first_name" . " " . "$last_name</td>";
                                                echo "<td>$payment_method</td>";
                                                $date = date('d M Y', strtotime($payment_date));
                                                echo "<td>$date</td>";

                                                echo "<td>" . "<a href=#''>" . "$receiver_last_name" . " " . "$receiver_first_name" . "</a>" . "</td>";

                                                echo " <td>
                                                
                                                    <label class='badge badge-$badge_color'>$status</label>
                                                </td>";
                                                echo "<td>$approval_last_name" . " " . "$approval_first_name</td>";

                                                echo "<td><button id='$payment_id' class='btn btn-sm btn-warning pop'>View POP </button>
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
            $('#received_wallet').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.approve_wallet').click(function() {
                let transacId = $(this).attr('id');
                let approvalID = $('#approval_id').val();
                $.ajax({
                    url: "includes/confirm_wallet_payment.php",
                    method: "post",
                    data: {
                        transacId: transacId,
                        approvalID: approvalID
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