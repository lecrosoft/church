<?php include('includes/head.php');


include('../connections/conn.php');
include('includes/function.php');
$member_to_fetch_id = $_SESSION['member_id'];
?>

<?php
if (isset($_POST['id'])) {
    // $single_event_id = $_POST['id'];

    // $disable = "";
    // $button_text = "Register";
    // $btn_color = "btn-primary";



    // $hidden = "";
    // $hide_for_admin = "";
    // if ($_SESSION['user_role'] == 'member') {
    //     $hidden = 'hidden';
    // }
    // if ($_SESSION['user_role'] == 'Admin') {
    //     $hide_for_admin = 'hidden';
    // }




    // $lecrosoft = "SELECT * FROM `event` LEFT JOIN members ON `event`.member_id = members.member_id WHERE `event`.`status` = 'Active' AND  event_id = $single_event_id";
    // $query_lecrosoft = mysqli_query($con, $lecrosoft);

    // $row = mysqli_fetch_assoc($query_lecrosoft);
    // extract($row);

?>







    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <h4 class="card-title ">

                        </h4>

                        <!-- ====================== tab starts ============================= -->



                    </div>
                    <!-- row -->




                    <div class="card  grid-margin">
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
                                                            text-white mdi mdi-alert-circle-outline
                                                            "></i>&nbsp;Full Details</button>

                            </div>
                            <div class="d-flex justify-content-between mb-2">


                                <a <?php echo $hidden ?> href="event_contribution.php?event_id=<?php echo $event_id ?>" class="btn btn-sm btn-primary ">Add Contributions</a>





                            </div>
                            <div class="d-flex  mb-2">

                                <button <?php echo $hidden ?> type="button" class="btn btn-sm btn-success">

                                    Amt contributed <span class="badge badge-primary">N <?php echo number_format($amount_collected) ?></span>
                                </button>

                            </div>




                            <div class="d-flex justify-content-between mb-2">


                                <a <?php echo $hidden ?> href="edit_all_event.php?editid=<?php echo $event_id ?>" class="btn btn-sm btn-primary ">Edit</a>
                                <a <?php echo $hidden ?> href="event_contribution.php?event_id=<?php echo $event_id ?>" class="btn btn-sm btn-primary ">Delete</a>





                            </div>
                        </div>
                    </div>

                <?php
            }
                ?>

                <!-- /row -->


                <!-- ====================== tab starts ============================= -->




                </div>


            </div>
        </div>





    </div>


















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