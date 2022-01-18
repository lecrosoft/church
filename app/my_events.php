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
                        <!-- begining of second div -->

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">My Events</h4>
                                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                                    <table class="table ">
                                        <thead>
                                            <tr>

                                                <th>Title</th>
                                                <th>Created</th>
                                                <th>Total Applicants</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $session_id = $_SESSION['member_id'];
                                            $lecrosoft = "SELECT * FROM `event` WHERE  member_id = $session_id ORDER BY `event_id` DESC";

                                            $query_lecrosoft_my_events = mysqli_query($con, $lecrosoft);

                                            while ($row = mysqli_fetch_assoc($query_lecrosoft_my_events)) {
                                                extract($row);
                                                if ($status == 'Active') {
                                                    $badge_color = 'warning';
                                                } elseif ($status == 'Closed') {
                                                    $badge_color = 'danger';
                                                }
                                                echo " <tr>";
                                                echo "<td>$event_title</td>";
                                                $date = date('d M Y', strtotime($start_date));
                                                echo "<td>$date</td>";

                                                echo "<td><span class='badge badge-pill badge-info'>$applicant_count</span></td>";

                                                echo " <td>

                                                    <label class='badge badge-$badge_color'>$status</label>
                                                </td>";

                                                echo " <td class='text-nowrap'><a id='$event_id' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-message text-success m-r-10'></i> </a> <a href='edit_event.php?editid=$event_id' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-lead-pencil text-warning m-r-10'></i> </a> <a class='delete_first_timer' id='$event_id' data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete text-danger'></i> </a> </td>";

                                                echo " </tr>";
                                            }
                                            ?>







                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>





                        <!-- end of first div -->




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
    <!-- End custom js for this page -->
</body>

</html>