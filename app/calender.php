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

                                                <!-- <div class="form-group pr-2">
                                                    <h2>All active events</h2>
                                                

                                                </div> -->
                                                <!-- <div class="form-group">
                                                    <button class="btn btn-gradient-primary">Send</button>
                                                </div> -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- row -->

                                    <div class="container">
                                        <div id="calendar"></div>
                                    </div>

                                    <!-- /row -->


                                    <!-- ====================== tab starts ============================= -->




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





                <div id="show_event_details" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-gradient-primary">
                                <h5 class="modal-title text-white">Event Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body event_content" id="">


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



        <!-- for calender -->







        <script>
            $(document).ready(function() {

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    eventColor: '#da8cff',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    events: 'load_event_to_calender.php',

                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = prompt("Enter Event Title");
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url: "insert_event_from_calender.php",
                                type: "POST",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Added Successfully");
                                }
                            })
                        }
                    },
                    editable: true,
                    eventResize: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert('Event Update');
                            }
                        })
                    },

                    eventDrop: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated");
                            }
                        });
                    },

                    eventClick: function(event) {


                        // if (confirm("Are you sure you want to remove it?")) {
                        var id = event.id;



                        $.ajax({
                            url: "fetch_single_event_to_calender.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $('.event_content').html(data);
                                $('#show_event_details').modal('show');
                            }
                        })
                    }

                    // $.ajax({
                    //     url: "delete_event_from_calender.php",
                    //     type: "POST",
                    //     data: {
                    //         id: id
                    //     },
                    //     success: function() {
                    //         calendar.fullCalendar('refetchEvents');
                    //         alert("Event Removed");
                    //     }
                    // })
                    // }


                });
            });
        </script>
        <!-- end calender -->
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


        <!-- End custom js for this page -->








</body>

</html>