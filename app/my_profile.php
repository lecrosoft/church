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
                            Families
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


                                        <?php
                                        if (isset($_GET['id'])) {
                                            $member_id = $_GET['id'];
                                            $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'member' AND member_id = $member_id";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $row = mysqli_fetch_assoc($query_lecrosoft);
                                            extract($row);
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="white-box">
                                                    <div class="user-bg mb-4"> <img width="100%" alt="user" height="300px" src="assets/images/users/<?php echo $photo ?>"> </div>
                                                    <div class="user-btm-box">
                                                        <!-- .row -->
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Salary</strong>
                                                                <p><?php echo number_format($salary) ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>Position</strong>
                                                                <p><?php echo $position_title ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <hr>
                                                        <!-- .row -->
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Email ID</strong>
                                                                <p><?php echo $email ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>Phone</strong>
                                                                <p><?php echo $phone_number_one ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                        <hr>
                                                        <!-- .row -->
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-12"><strong>Address</strong>
                                                                <p><?php echo $address ?>
                                                                    <br />
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <!-- /.row -->
                                                        <!-- <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-facebook"></i></p>
                        <h1>258</h1>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-blue"><i class="ti-twitter"></i></p>
                        <h1>125</h1>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-danger"><i class="ti-google"></i></p>
                        <h1>140</h1>
                    </div>
                </div> -->

                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Phone Number 2</strong>
                                                                <p><?php echo $phone_number_two ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>Marital Status</strong>
                                                                <p><?php echo $marrital_status ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Baptize Date</strong>
                                                                <p><?php echo $baptize_date ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>State of Origin</strong>
                                                                <p><?php echo $state_of_origin ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Date Of birth</strong>
                                                                <p><?php echo $date_of_birth ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>Employment Status</strong>
                                                                <p><?php echo $employment_status ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row text-center m-t-10">
                                                            <div class="col-md-6 b-r"><strong>Job Type</strong>
                                                                <p><?php echo $job_type ?></p>
                                                            </div>
                                                            <div class="col-md-6"><strong>Username</strong>
                                                                <p><?php echo $username ?></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-xs-12">


                                                <div class="white-box">

                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h3 class="box-title"><?php echo $title . ' ' . $last_name . ' ' . $first_name ?></h3>
                                                            <!-- <p class="text-muted m-b-30">Use default tab with class <code>customtab</code></p> -->

                                                        </div>
                                                        <div class="">
                                                            <a href="members.php?source=edit&id=<?php echo $_SESSION['member_id'] ?>" class="btn btn-warning">Edit</a>
                                                        </div>
                                                    </div>
                                                    <!-- Nav tabs -->
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Follow Ups</a>
                                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pledges</a>
                                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contributions</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                                            <?php include('includes/personal_follow_up.php') ?>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                                            <?php include('includes/personal_pledges.php') ?>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contributions</div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- /.row -->
                                            <!-- .right-sidebar -->
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


                                        <!-- ADD FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['add'])) {



                                            $fname = $_POST['fname'];

                                            $fleader = $_POST['fleader'];
                                            $fquantity = $_POST['fquantity'];
                                            $fcontact = $_POST['fcontact'];
                                            $address  = $_POST['address'];
                                            $jtime = $_POST['jtime'];
                                            if (!empty($fname)) {
                                                $lecrosoft = "INSERT INTO family(family_name,family_leader,family_quantity,family_contact,address,join_date) VALUES ('$fname','$fleader',$fquantity,'$fcontact','$address','$jtime')";
                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                if ($query_lecrosoft) {
                                                    echo '<script type="text/javascript">location = "family.php"</script>';
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
                                <h5 class="modal-title">Add New Family</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fname" placeholder="Enter Family Name" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fleader" placeholder="Enter Family Leader " required>

                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fquantity" placeholder="Enter Family Quantity" required>

                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fcontact" placeholder="Enter Contact">

                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="address" placeholder="Enter Address">

                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="jtime" placeholder="Enter Join Time">

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