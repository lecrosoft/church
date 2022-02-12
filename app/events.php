<?php include('includes/head.php');


include('../connections/conn.php');
include('includes/function.php');
$member_to_fetch_id = $_SESSION['member_id'];
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
                                <i class="mdi mdi-calendar-multiple"></i>
                            </span>
                            Events
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="today_events.php"><span></span>Today's Events
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

                                        <div class="page_button d-flex justify-content-between ">
                                            <div class="d-flex">

                                                <div class="form-group pr-2">
                                                    <h2>All active events</h2>
                                                    <p>Click on the register button to register for the events you will be attending.This will enable the event host to know the number of guests that will be attending the event from this church so they can pprepare ahead.</p>

                                                </div>
                                                <!-- <div class="form-group">
                                                    <button class="btn btn-gradient-primary">Send</button>
                                                </div> -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- row -->
                                    <div class="row">
                                        <?php
                                        $disable = "";
                                        $button_text = "Register";
                                        $btn_color = "btn-primary";
                                        // $lecrosoft_register = "SELECT * FROM `event_attendant` WHERE `member_id` = $member_to_fetch_id AND status ='Registered'";
                                        // $query_lecrosoft_register = mysqli_query($con, $lecrosoft_register);
                                        // $count = mysqli_num_rows($query_lecrosoft_register);

                                        // while ($row = mysqli_fetch_array($query_lecrosoft_register)) {
                                        //     $register_status = $row['status'];
                                        //     $register_event_id = $row['event_id'];



                                        //     $button_text = "Registered";
                                        //     $btn_color = "btn-success";
                                        //     $disable = "disabled";
                                        // };







                                        $lecrosoft = "SELECT * FROM `event` LEFT JOIN members ON `event`.member_id = members.member_id WHERE `event`.`status` = 'Active' ORDER BY event_id DESC";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);


                                        ?>


                                            <div class="card  grid-margin col-md-4 stretch-card" style=" padding:0px !important; border:1px solid purple;background:#f2edf3">
                                                <img style="" height="200px" src="assets/images/event_pics/<?php echo $event_photo ?>" class="card-img-top" alt="...">
                                                <div class="card-body p-4" style=" line-height:1.6px">
                                                    <h5 class=" card-title"><?php echo $event_title ?></h5>
                                                    <p class="card-text"><?php echo substr($description, 0, 80) ?>...</p>


                                                    <div class="d-flex justify-content-between">
                                                        <?php $st_date = date('d M Y', strtotime($start_date)) ?>
                                                        <p><i class="mdi mdi-calendar-check text-success"></i>&nbsp;<?php echo $st_date ?></p>
                                                        <p><i class="mdi mdi-clock text-warning"></i>&nbsp;<?php echo $event_time ?></p>
                                                    </div>

                                                    <p><i class="mdi mdi-google-maps text-primary"></i>&nbsp;<?php echo $location ?></p>
                                                    <p><span class="text-danger">Host: </span> <?php echo $last_name . " " . $first_name ?></p>

                                                    <div class="d-flex justify-content-between mb-2">


                                                        <button <?php echo $disable ?> id="<?php echo $event_id ?>" class="btn btn-sm <?php echo $btn_color ?> register d-flex "><?php echo $button_text ?></button>
                                                        <button id="<?php echo $event_id ?>" class="btn btn-sm btn-primary event_details2 d-flex ">
                                                            <i class="icon-sm
                                                            text-white 
mdi mdi-alert-circle-outline
                                                            "></i>&nbsp;Full Details</button>

                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">


                                                        <a <?php echo $hidden ?> href="event_contribution.php?event_id=<?php echo $event_id ?>" class="btn btn-sm btn-primary ">Contributions</a>





                                                    </div>
                                                    <div class="d-flex  mb-2">

                                                        <button <?php echo $hidden ?> type="button" class="btn btn-sm btn-success">

                                                            Amt contributed <span class="badge badge-primary">N <?php echo number_format($amount_collected) ?></span>
                                                        </button>

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
                                <h5 class="modal-title text-white">Event Details</h5>
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
                $('.event_details').click(function() {
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

        <script>
            $(document).ready(function() {
                $('.register').click(function() {

                    let eventId = $(this).attr('id');
                    $.ajax({
                        url: "register_for_events.php",
                        method: "post",
                        data: {
                            eventId: eventId

                        },
                        success: function(data) {
                            $(this).html('saved');
                            location = window.location.href;

                        }
                    })
                })
            })
        </script>
        <!-- End custom js for this page -->
</body>

</html>