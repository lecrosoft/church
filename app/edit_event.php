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
                    <?php
                    if (isset($_GET['editid'])) {
                        $event_id = $_GET['editid'];
                        $session_id = $_SESSION['member_id'];
                        $lecrosoft = "SELECT * FROM `event` WHERE  member_id = $session_id && `event_id` = $event_id";
                        $query_lecrosoft_my_events = mysqli_query($con, $lecrosoft);

                        while ($row = mysqli_fetch_assoc($query_lecrosoft_my_events)) {
                            extract($row);
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">New Event</h4>
                                    <?php

                                    if (isset($_POST['update_event'])) {
                                        $member_id = $_SESSION['member_id'];

                                        $title = $_POST['title'];
                                        $start_date = $_POST['start_date'];
                                        $end_date = $_POST['end_date'];
                                        $time = $_POST['time'];
                                        $location = $_POST['location'];
                                        $description = $_POST['description'];
                                        $status = $_POST['status'];
                                        $img = $_FILES['img']['name'];
                                        $temp_file = $_FILES['img']['tmp_name'];
                                        $folder = "assets/images/event_pics/" . $img;

                                        move_uploaded_file($temp_file, $folder);
                                        $lecrosoft = "UPDATE `event` SET `event_title`='$title',`start_date`='$start_date',`event_time`='$time',`location`='$location',`event_photo`='$img',`description`='$description',`end_date`='$end_date',`status`='$status' WHERE event_id = $event_id";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        if ($query_lecrosoft) {
                                            echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Your event has been updated successfully!
</div>';
                                        }
                                    }
                                    ?>
                                    <p class="card-description"> Your Event will be publish to other members </p>



                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Event Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputUsername1" value="<?php echo $event_title ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control" id="exampleInputUsername1" value="<?php echo $start_date ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">End Date</label>
                                                    <input type="date" name="end_date" class="form-control" id="exampleInputUsername1" value="<?php echo $end_date ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Time</label>
                                                    <input type="time" name="time" class="form-control" id="exampleInputUsername1" value="<?php echo $event_time ?>">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Location</label>
                                                    <input type="text" name="location" class="form-control" id="exampleInputUsername1" value="<?php echo $location ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled value="<?php echo $event_photo ?>" placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>status</label>
                                            <select name="status" id="" class="form-control form-select">
                                                <option value="Active"><?php echo $status ?></option>

                                                <?php
                                                if ($status == 'Active') {
                                                    echo  "<option value='Closed'>Closed</option>";
                                                } elseif ($status == 'Closed') {
                                                    echo  "<option value='Active'>Active</option>";
                                                }
                                                ?>


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description</label>
                                            <textarea class="form-control" name="description" id="summernote" cols="30" placeholder="Enter full details of the event here" rows="10"><?php echo $description ?></textarea>
                                        </div>



                                        <button type="submit" name="update_event" class="btn btn-gradient-primary mr-2">Submit</button>

                                    </form>
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