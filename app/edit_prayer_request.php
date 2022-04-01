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
                        $prayer_request_id = $_GET['editid'];
                        $session_id = $_SESSION['member_id'];
                        $lecrosoft = "SELECT * FROM `prayer_request` WHERE `prayer_request_id` = $prayer_request_id";
                        $query_lecrosoft_prayer_request = mysqli_query($con, $lecrosoft);

                        while ($row = mysqli_fetch_assoc($query_lecrosoft_prayer_request)) {
                            extract($row);
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Prayer request</h4>
                                    <?php

                                    if (isset($_POST['update'])) {
                                        $member_id = $_SESSION['member_id'];

                                        $title = $_POST['title'];
                                        $description = $_POST['description'];
                                        $status = $_POST['status'];
                                        $lecrosoft = "UPDATE `prayer_request` SET `prayer_title`='$title',`description`='$description',`status`='$status' WHERE `prayer_request_id` = $prayer_request_id";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        if ($query_lecrosoft) {
                                            echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Record has been updated successfully!
</div>';
                                        };
                                        echo '<script type="text/javascript">location = "all_prayer_requests.php"</script>';
                                    }
                                    ?>




                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Prayer Request</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Prayer Request Title" value="<?php echo $prayer_title ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description</label>
                                            <textarea class="form-control" name="description" id="summernote" cols="30" placeholder="Enter full details of the event here" rows="10"><?php echo $description ?></textarea>

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

                                        <button type="submit" name="update" class="btn btn-gradient-primary mr-2">Save Changes</button>

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