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
                                    <h4 class="card-title">New Prayer Request</h4>
                                    <?php

                                    if (isset($_POST['add_prayer'])) {
                                        $member_id = $_SESSION['member_id'];

                                        $title = $_POST['title'];



                                        $description = $_POST['description'];
                                        $lecrosoft = "INSERT INTO `prayer_request`(`member_id`, `prayer_title`, `description`) VALUES ($member_id,'$title','$description')";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);


                                        echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Your prayer request has been added successfully. the pastosr and prayer worriors will recive it and start working on it!
</div>';
                                    }
                                    ?>
                                    <p class="card-description"> Your Prayer request will be seen only by the pastors and your name and identity will be annonymous. </p>
                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Event Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Prayer Request Title">
                                        </div>







                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description</label>
                                            <textarea class="form-control" name="description" id="summernote" cols="30" placeholder="Enter full details of the event here" rows="10"></textarea>
                                        </div>

                                        <button type="submit" name="add_prayer" class="btn btn-gradient-primary mr-2">Submit</button>

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