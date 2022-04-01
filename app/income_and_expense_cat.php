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
                                <i class="mdi mdi-account-multiple"></i>
                            </span>
                            Income and Expenses Categories
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
                                        <div class="page_button row">
                                            <div class="col-md-9">

                                                <div class="row">
                                                    <div class="form-group pr-2 col-md-9">

                                                        <select name="" id="" class="form-control form-select">
                                                            <option value="">Bulk Action </option>
                                                            <option value="">Delete </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button class="btn btn-gradient-primary">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-gradient-primary add-family">Add New Category</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="family_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="form-check form-check-flat form-check-primary">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"> Select All </label>
                                                            </div>
                                                        </th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Type</th>
                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    select_Income_and_expense_category();
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


                                        <!-- ====================== tab starts ============================= -->


                                        <!-- ============PHP CODE TO EXECUTE QUERIES STARTS HERE ===================== -->

                                        <!-- DELETE FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['del_cat_id'])) {
                                            $del_cat_id = $_POST['del_cat_id'];
                                            $lecrosoft = "DELETE FROM `income_expence_category` WHERE id =$del_cat_id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            if ($query_lecrosoft) {
                                                echo '<script type="text/javascript">location = "window.location.href"</script>';
                                            } else {
                                                die("QUERY ERROR" . mysqli_error($con));
                                            }
                                        }
                                        ?>
                                        <!-- DELETE FAMILY CODE END -->


                                        <!-- ADD FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['add'])) {



                                            $title = $_POST['title'];

                                            $description = $_POST['description'];
                                            $type = $_POST['type'];

                                            if (!empty($title)) {
                                                $lecrosoft = "INSERT INTO income_expence_category(category_name,description,type) VALUES ('$title','$description','$type')";
                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                if ($query_lecrosoft) {
                                                    echo '<script type="text/javascript">location = window.location.href</script>';
                                                } else {
                                                    die("QUERY ERROR" . mysqli_error($con));
                                                    recordDangerMessage();
                                                }
                                            }
                                        }
                                        ?>


                                        <!-- ADD FAMILY CODE END  -->


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
                                <h5 class="modal-title">Edit Income/Expenses category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="income_expense_cat_content">

                            </div>


                        </div>
                    </div>
                </div>


                <!-- EDIT FAMILY MODAL ENDS-->






                <!-- ADD FAMILY -->
                <div id="dataModal2" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">Category Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Category Title" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Category description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Enter description" required>

                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="">Category Type</label>
                                        <select name="type" class="form-select form-control">
                                            <option value="">Select Category Type</option>
                                            <option value="expense">Expense</option>
                                            <option value="income">Income</option>

                                        </select>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- =============== MODALENDS HERE ======================= -->







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
            $('#family_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".view_data").click(function() {
                var income_expence_cat_id = $(this).attr("id");
                $.ajax({
                    url: "income_expence_cat.php",
                    method: "post",
                    data: {
                        income_expence_cat_id: income_expence_cat_id,


                    },
                    success: function(data) {
                        // console.log('mydata', data)
                        $("#income_expense_cat_content").html(data);
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
            $('.add-family').click(function() {
                $('#dataModal2').modal("show");
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
                            url: "income_and_expense_cat.php",
                            method: "post",
                            data: {
                                del_cat_id: id
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