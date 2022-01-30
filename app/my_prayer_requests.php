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
                                    <h4 class="card-title">My Prayer Requests</h4>
                                    <!-- <p class="card-description"> Horizontal form layout </p> -->

                                    <?php
                                    $session_id = $_SESSION['member_id'];
                                    $lecrosoft = "SELECT * FROM `prayer_request` WHERE  member_id = $session_id ORDER BY `prayer_request_id` DESC";

                                    $query_lecrosoft_my_prayer_request = mysqli_query($con, $lecrosoft);

                                    $count = mysqli_num_rows($query_lecrosoft_my_prayer_request);


                                    if ($count == 0) {
                                        echo "<h1>You have no prayer request listed for now! </h1>";
                                    } else {
                                    ?>

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
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft_my_prayer_request)) {
                                                extract($row);

                                                if ($status == 'Active') {
                                                    $badge_color = 'warning';
                                                } elseif ($status == 'Closed') {
                                                    $badge_color = 'danger';
                                                } else {
                                                    $badge_color = '';
                                                }
                                                echo " <tr>";
                                                echo "<td>$prayer_title</td>";
                                                $date = date('d M Y', strtotime($created_at));
                                                echo "<td>$date</td>";

                                                echo "<td>$description</td>";

                                                echo " <td>

                                                    <label class='badge badge-$badge_color'>$status</label>
                                                </td>";

                                                echo " <td class='text-nowrap'><a id='$prayer_request_id' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-message text-success m-r-10'></i> </a> <a class='edit_prayer' id='$prayer_request_id' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-lead-pencil text-warning m-r-10'></i> </a> <a class='delete_prayer_request' id='$prayer_request_id' data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete text-danger'></i> </a> </td>";

                                                echo " </tr>";
                                            }
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




                <!-- ADD PAYMENT  START-->

                <div id="prayer_request" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="show_response">

                            </div>
                            <div class="modal-body" id="add-prayer-form">

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
            $('.delete_prayer_request').click(function() {
                let prayerId = $(this).attr('id');



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
                            url: "includes/delete_personal_prayer_request.php",
                            method: "post",
                            data: {
                                prayerId: prayerId

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



    <script>
        $(document).ready(function() {
            $('.edit_prayer').click(function() {

                let prayerId = $(this).attr('id');

                $.ajax({
                    url: "fetch_prayer_edit_form",
                    method: "post",
                    data: {
                        prayerId: prayerId
                    },
                    success: function(data) {
                        $('#add-prayer-form').html(data);
                        $('#prayer_request').modal('show');
                    }


                })
            })
        })
    </script>
    <!-- End custom js for this page -->
</body>

</html>