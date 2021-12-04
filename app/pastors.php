<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<?php

?>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        include('includes/top-nav.php');
        ?>

        <?php
        include('includes/left-side-bar.php');
        ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = "";
                }

                switch ($source) {
                    case  "add-pastor":
                        include('includes/add_new_pastor.php');

                        break;
                    case  "pastor-profile":
                        include('includes/pastor_profile.php');

                        break;



                    default:
                        include('includes/view_all_pastors.php');
                }
                ?>


            </div>
            <!-- /.row -->
            <!-- .right-sidebar -->
            <?php
            include('includes/right-side-bar.php');
            ?>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
        <!-- payment history -->
        <!-- Modal -->
        v<div id="dataModal2" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pledge payment history</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="pledges_payment_content">


                    </div>


                </div>
            </div>
        </div>


        <?php
        include('includes/footer.php');

        ?>
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
        <script>
            $(document).ready(function() {
                $('#example-transation7').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>

</body>

</html>