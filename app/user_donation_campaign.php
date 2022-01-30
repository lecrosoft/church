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
                                <i class="mdi mdi-cash-multiple"></i>
                            </span>
                            Pledges
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

                                        <!-- <div class="page_button d-flex justify-content-between ">
                                            <div class="d-flex">

                                                <div class="form-group pr-2">


                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-gradient-primary">Send</button>
                                                </div>
                                            </div>

                                        </div> -->

                                    </div>
                                    <!-- row -->
                                    <div class="row">
                                        <?php
                                        $lecrosoft = "SELECT * FROM campaign";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            $campaign_id = $row['campaign_id'];
                                            $campaign = $row['campaign'];
                                            $description = $row['description'];
                                            $date = $row['date'];
                                            $campaign_id = $row['campaign_id'];


                                        ?>


                                            <div class="card  grid-margin col-md-4 stretch-card" style=" border:1px solid purple;background:#f2edf3">
                                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $campaign ?></h5>
                                                    <p class="card-text"><?php echo $description ?></p>
                                                    <p class="card-text">Date: <?php echo $date ?></p>
                                                    <div class="d-flex justify-content-between">
                                                        <button id="<?php echo $campaign_id ?>" class="btn btn-sm btn-primary add-pledge d-flex ">Make a pledge</button>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /row -->


                                    <!-- ====================== tab starts ============================= -->




                                </div>


                            </div>
                        </div>
                        <?php
                        deleteDepartment();
                        ?>

                        <?php

                        addDepartment()


                        ?>


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





                <div id="addPleder" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-gradient-primary">
                                <h5 class="modal-title text-white">New Pledge By member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pledger_content" id="">


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
                        echo "<script>alert('This User has Already Pledged under this category')</script>";
                        // echo "Already Pledged";
                    } else {

                        $lecrosoft = "INSERT INTO `pledges`(`campaign_id`, `member_id`, `note`, `amount`, `pledge_date`, `pledge_due_date`,`balance`) VALUES ('$campaign','$pledge_by','$note','$amount','$pdate','$pduedate',$amount)";

                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                        $lecrosft_update_campaign = "UPDATE campaign SET `amount_pledged` = `amount_pledged` + $amount WHERE campaign_id = $cp_id";
                        $query_update_campaign = mysqli_query($con, $lecrosft_update_campaign);
                        if ($query_update_campaign) {
                            echo "<script type='text/javascript'>location=location.href</script>";
                        }
                    }
                }
                ?>

                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <!-- ======= external script comes in =========== -->


        <?php include('includes/external_js.php') ?>


        <script>
            $(document).ready(function() {
                $('.add-pledge').click(function() {
                    let catId = $(this).attr('id');
                    $.ajax({
                        url: 'fetch_personal_pledger.php',
                        method: "post",
                        data: {
                            cp_id: catId
                        },
                        success: function(data) {
                            $('.pledger_content').html(data);
                            $('#addPleder').modal('show');
                        }
                    })

                })
            })
        </script>
        <!-- End custom js for this page -->
</body>

</html>