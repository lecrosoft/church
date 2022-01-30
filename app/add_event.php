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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">New Event</h4>
                                    <?php

                                    if (isset($_POST['add_event'])) {
                                        $member_id = $_SESSION['member_id'];

                                        $title = $_POST['title'];
                                        $start_date = $_POST['start_date'];
                                        $end_date = $_POST['end_date'];
                                        $time = $_POST['time'];
                                        $location = $_POST['location'];
                                        $description = $_POST['description'];
                                        $img = $_FILES['img']['name'];
                                        $temp_file = $_FILES['img']['tmp_name'];
                                        $folder = "assets/images/event_pics/" . $img;

                                        move_uploaded_file($temp_file, $folder);
                                        $lecrosoft = "INSERT INTO `event`(`event_title`, `start_date`, `event_time`, `location`, `event_photo`, `description`, `member_id`,`end_date`) VALUES ('$title','$start_date','$time','$location','$img','$description',$member_id,'$end_date')";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);


                                        echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Your event has been added successfully!
</div>';
                                    }
                                    ?>
                                    <p class="card-description"> Your Event will be publish to other members </p>
                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Event Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Event Title">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control" id="exampleInputUsername1" placeholder="Event date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">End Date</label>
                                                    <input type="date" name="end_date" class="form-control" id="exampleInputUsername1" placeholder="Event date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Time</label>
                                                    <input type="time" name="time" class="form-control" id="exampleInputUsername1" placeholder="Event time">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Location</label>
                                                    <input type="text" name="location" class="form-control" id="exampleInputUsername1" placeholder="Event Location">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description</label>
                                            <textarea class="form-control" name="description" id="summernote" cols="30" placeholder="Enter full details of the event here" rows="10"></textarea>
                                        </div>

                                        <button type="submit" name="add_event" class="btn btn-gradient-primary mr-2">Submit</button>

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