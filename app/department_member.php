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
                            List of Members In <span class="text-danger"><?php echo $department ?> </span> department
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
                                            <div class="col-md-4">

                                                <div class="row">
                                                    <div class="form-group  col-md-6">

                                                        <select name="" id="" class="form-control form-select">
                                                            <option value="">Bulk Action </option>
                                                            <option value="">Delete </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <button class="btn btn-gradient-primary">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <button type='button' class='mb-1 btn btn-gradient-primary  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                            Mesg All in <?php echo $department ?> dept.
                                                        </button>

                                                        <div class='dropdown-menu'>
                                                            <?

                                                            $depart_id = $_GET['d_id'];

                                                            $lecrosoft = "SELECT * FROM department_member LEFT JOIN members ON department_member.member_id = members.member_id LEFT JOIN department_position ON department_member.department_position_id = department_position.department_position_id WHERE department_id = $depart_id";

                                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                extract($row);
                                                            }
                                                            ?>
                                                            <a id="<?php echo $member_id ?>" class='dropdown-item personal-sms'>SMS</a>
                                                            <?php
                                                            // $use = " ";
                                                            // $whatsapp_number = $phone_number_two;

                                                            // if ($whatsapp_number == '') {
                                                            //     $use = $phone_number_one;
                                                            // } else {
                                                            //     $use = $whatsapp_number;
                                                            // }
                                                            ?>
                                                            <a target="_blank" class='dropdown-item' href='https://wa.me/<?php echo $use ?>?text=Hello <?php echo $title . " " . $first_name . " " . $last_name ?>'>Whatsapp Group</a>
                                                            <a id="<?php echo $member_id ?>" class='dropdown-item personal-email'>Email</a>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary add-family">Add New Member</button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                        <div class="table-responsive">
                                            <table id="department_member" class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th>Member Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Position</th>
                                                        <th>status</th>

                                                        <th class="text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    selectDepartmentMember();
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






                <!-- ADD FAMILY -->
                <div id="dataModal2" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Member Name
                                        </label>
                                        <select name="member_id" id="" class="form-select form-control select2" required>
                                            <option value="" selected>---Select member---</option>
                                            <?php
                                            $sql = "SELECT * FROM members";
                                            $query_lecrosoft = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                extract($row);
                                                echo "<option value='$member_id'>$first_name  $last_name</option>";
                                            }
                                            ?>

                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">
                                            Position
                                        </label>
                                        <select required name="department_position" id="" class="form-select form-control" required>
                                            <option value="" selected disabled>---Select position---</option>

                                            <?php
                                            $sql = "SELECT * FROM department_position";
                                            $query_lecrosoft = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                extract($row);
                                                echo "<option value='$department_position_id'>$department_position_title</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>



                </div>
                <!-- =============== MODALENDS HERE ======================= -->


                <?php
                if (isset($_POST['add'])) {

                    $member_id_to_add = $_POST['member_id'];
                    $department_position = $_POST['department_position'];

                    $sql = "SELECT * FROM `department_member` WHERE `department_id` =  $depart_id";
                    $query_sql = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($query_sql)) {
                        $db_member_id = $row['member_id'];
                    }


                    if ($member_id_to_add === $db_member_id) {
                        echo '<script type="text/javascript">
                            
                            alert("This person is already added to this department!")
                            </script>';
                        echo '<script type="text/javascript">location = location.href </script>';
                    } else {
                        $lecrosoft = "INSERT INTO `department_member`(`member_id`, `department_id`, `department_position_id`) VALUES ($member_id_to_add,$depart_id,$department_position)";
                        $query_lecrosoft = mysqli_query($con, $lecrosoft) or (die(mysqli_error($con)));
                        echo '<script type="text/javascript">location = location.href </script>';
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

    <script>
        $(document).ready(function() {
            $('#department_member').DataTable({
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