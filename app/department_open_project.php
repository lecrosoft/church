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
                    if (isset($_GET['d_id'])) {
                        $depart_id = $_GET['d_id'];
                        $lecrosoft = "SELECT * FROM department WHERE department_id = $depart_id";
                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                        $row = mysqli_fetch_assoc($query_lecrosoft);
                        $department_id = $row['department_id'];
                        $department = $row['department_name'];
                        $department_leader = $row['department_leader_name'];
                    }

                    ?>

                    <!-- ================== PAGE HEADER COMES IN ==================== -->
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-account-multiple"></i>
                            </span>
                            List of Open Projects In <span class="text-danger"><?php echo $department ?> </span> department
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
                                        <div class="page_button d-flex justify-content-between ">
                                            <div class="d-flex">

                                                <div class="form-group pr-2">

                                                    <select name="" id="" class="form-control form-select">
                                                        <option value="">Bulk Action </option>
                                                        <option value="">Delete </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-gradient-primary">Send</button>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-group">
                                                    <button class="btn btn-primary add-projects">Add New Project</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="newProjectTable" class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th>Project Title</th>
                                                        <th>Description</th>
                                                        <th>Extimated Cost</th>
                                                        <th>Priority</th>
                                                        <th>status</th>

                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    selectDepartmentOpenProject();
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>

                                        <?php
                                        deleteFamily();
                                        ?>

                                        <?php

                                        addFamily();


                                        ?>





                                        <!-- ============PHP CODE TO EXECUTE QUERIES STARTS HERE ===================== -->

                                        <!-- DELETE FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['del_fam_id'])) {
                                            $del_fam_id = $_POST['del_fam_id'];
                                            $lecrosoft = "DELETE FROM family WHERE family_id =$del_fam_id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            if ($query_lecrosoft) {
                                                echo '<script type="text/javascript">location = "family.php"</script>';
                                            } else {
                                                die("QUERY ERROR" . mysqli_error($con));
                                            }
                                        }
                                        ?>
                                        <!-- DELETE FAMILY CODE END -->


                                        <!-- ADD MEMBER CODE START  -->


                                        <!-- ADD MEMBER CODE END  -->


                                        <!-- ============PHP CODE TO EXECUTE QUERIES END HERE ===================== -->


                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- ========== footer starts here ========== -->







                <!-- =============== MODAL COMES IN ======================= -->

                <!-- EDIT FAMILY MODAL START-->

                <div id="dataModal" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Family Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="family_content">

                            </div>


                        </div>
                    </div>
                </div>


                <!-- EDIT FAMILY MODAL ENDS-->






                <!-- ADD PROJECT-->
                <div id="add_project" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">
                                            Project Title
                                        </label>
                                        <input type="text" class="form-control" name="project_title" placeholder="Enter Project Title">

                                    </div>
                                    <div class="form-group mb-3">
                                        <!-- <label for="">
                                department_id
                            </label> -->
                                        <input type="hidden" class="form-control" name="department_id" value="<?php echo $depart_id ?>">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Project Description
                                        </label>
                                        <input type="text" class="form-control" name="project_description" placeholder="Enter Project Description">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Extimated Cost
                                        </label>
                                        <input type="text" class="form-control" name="extimated_cost" placeholder="Enter Project Cost">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Priority
                                        </label>
                                        <select name="priority" id="" class="form-control form-select">
                                            <option value="" disabled>Select Priority</option>
                                            <option value="Inportant">Inportant</option>
                                            <option value="Urgent">Urgent</option>
                                            <option value="Very-Important">Very Important</option>
                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Status
                                        </label>
                                        <select name="status" id="" class="form-control form-select">
                                            <option value="" disabled>Select Status</option>
                                            <option value="In-Progress">In progress</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Pending">Pending</option>
                                        </select>

                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add_project">Add</button>
                                    </div>
                                </form>





                            </div>


                        </div>
                    </div>
                </div>



                <?php
                if (isset($_POST['add_project'])) {

                    $departs_id = $_POST['department_id'];
                    $project_title = $_POST['project_title'];
                    $project_description = $_POST['project_description'];
                    $extimated_cost = $_POST['extimated_cost'];
                    $priority = $_POST['priority'];

                    $lecrosoft = "INSERT INTO `department_project`(`department_id`, `project_title`, `project_description`, `project_extimation`, `priority`) VALUES ($departs_id,'$project_title','$project_description','$extimated_cost','$priority')";
                    $sql_query = mysqli_query($con, $lecrosoft);

                    if ($sql_query) {
                        echo "Project successfully added";
                        echo '<script type="text/javascript">location = location.href </script>';
                    } else {
                        die(mysqli_error($con));
                    }
                }
                ?>
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




    <!-- ========== J QUERY CODE STARTS HERE ========= -->

    <!-- CODE TO VIEW FAMILY DETAILS IN MODAL START -->

    <script>
        $(document).ready(function() {
            $(".view_data").click(function() {
                var family_id = $(this).attr("id");
                $.ajax({
                    url: "fetch_family.php",
                    method: "post",
                    data: {
                        family_id: family_id,


                    },
                    success: function(data) {
                        // console.log('mydata', data)
                        $("#family_content").html(data);
                        $('#dataModal').modal("show");

                    },
                    error: function(obj, status, err) {
                        console.log(err)
                    }
                });


            });




        });
    </script>
    <!-- CODE TO VIEW FAMILY DETAILS IN MODAL END -->


    <!-- CODE TO SHOW FAMILY ADD FORM START -->

    <script>
        $(document).ready(function() {
            $('.add-projects').click(function() {
                $('#add_project').modal("show");
            })
        })
    </script>

    <!-- CODE TO SHOW FAMILY ADD FORM END -->



    <!-- DELETE ALERT START HERE -->

    <script>
        $(document).ready(function() {
            $('.delete-alert').click(function(e) {
                e.preventDefault();
                let id = $(this).attr("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "family.php",
                            method: "post",
                            data: {
                                del_fam_id: id
                            },
                            success: function(data) {

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                location = window.location.href
                                console.log(location)



                            }
                        });


                    }
                })
            })
        })
        // const flashdata = $('.flash-data').data('flashdata')
        // if (flashdata) {
        //     Swal.fire(
        //         'Deleted!',
        //         'Your file has been deleted.',
        //         'success'
        //     )
        // }
    </script>
    <!-- DELETE ALERT STOPS HERE -->

    <!-- ========== J QUERY CODE END HERE ========= -->
</body>

</html>