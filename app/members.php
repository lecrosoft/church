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
                                <i class="mdi mdi-home"></i>
                            </span>
                            Members
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



                                        <?php
                                        if (isset($_GET['source'])) {
                                            $source = $_GET['source'];
                                        } else {
                                            $source = "";
                                        }

                                        switch ($source) {
                                            case  "add-member":
                                                include('includes/add_new_member.php');
                                                break;
                                            case "edit":
                                                include('includes/edit_members.php');
                                                break;
                                            case "view":
                                                include('includes/view_member.php');
                                                break;
                                            case  "member-profile":
                                                include('includes/member_profile.php');

                                                break;

                                            default:
                                                include('includes/view_all_members.php');
                                        }
                                        ?>


                                        <!-- ====================== tab starts ============================= -->


                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>



                </div>





                <!-- ====SMS MODAL === -->




                <!-- ====SMS MODAL ENDS ==== -->
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
    <!-- End custom js for this page -->


    <!-- ================ PERSONAL PLEDGE HISTORY ============== -->


    <script>
        $(document).ready(function() {
            $('#all_members_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
    </script>




    <script>
        $(document).ready(function() {
            $('.delete_member').click(function(e) {
                e.preventDefault();
                let memberId = $(this).attr('id');


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
                            url: "includes/delete_members.php",
                            method: "post",
                            data: {
                                userId: memberId

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



    <!-- send messages to single member -->

    <script>
        $(document).ready(function() {
            $('.personal-sms').click(function(e) {
                e.preventDefault();
                let memberID = $(this).attr('id');
                $('#sms_modal').modal("show");
            })
        })
        $(document).ready(function() {
            $('.personal-email').click(function(e) {
                e.preventDefault();
                let memberID = $(this).attr('id');
                $('#email_modal').modal("show");
            })
        })
    </script>
</body>

</html>