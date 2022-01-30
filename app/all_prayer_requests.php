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
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $session_id = $_SESSION['member_id'];
                                            $lecrosoft = "SELECT * FROM `prayer_request` ORDER BY `prayer_request_id` DESC";

                                            $query_lecrosoft_my_events = mysqli_query($con, $lecrosoft);

                                            while ($row = mysqli_fetch_assoc($query_lecrosoft_my_events)) {
                                                extract($row);
                                                if ($status == 'Active') {
                                                    $badge_color = 'warning';
                                                } elseif ($status == 'Closed') {
                                                    $badge_color = 'danger';
                                                }
                                                echo " <tr>";
                                                echo "<td>$prayer_title</td>";
                                                $date = date('d M Y', strtotime($created_at));
                                                echo "<td>$date</td>";

                                                echo "<td>$description</td>";

                                                echo " <td>

                                                    <label class='badge badge-$badge_color'>$status</label>
                                                </td>";

                                                echo " <td class='text-nowrap'><a id='$prayer_request_id' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-message text-success m-r-10'></i> </a> <a href='edit_event.php?editid=$prayer_request_id' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-lead-pencil text-warning m-r-10'></i> </a> <a class='delete_event' id='$prayer_request_id' data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete text-danger'></i> </a> </td>";

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




    <script>
        $(document).ready(function() {
            $('.delete_event').click(function() {
                let eventId = $(this).attr('id');



                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                        cancelButton: 'btn btn-gradient-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "includes/delete_personal_event.php",
                            method: "post",
                            data: {
                                eventId: eventId

                            },
                            success: function(data) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                location = window.location.href
                            }

                        })

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })
            })
        })
    </script>
    <!-- End custom js for this page -->
</body>

</html>