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
                            Attendance Type
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
                                                    <button class="btn btn-gradient-primary send_attendance">Send</button>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-group">
                                                    <button class="btn btn-gradient-primary add-family">Add New Attendance Type</button>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="" method="POST">

                                            <div class="d-flex justify-content-center ">
                                                <div class="boxes m-4">
                                                    <div class="form-group">
                                                        <label for="">Attendance Date</label>
                                                        <input name="attendance_date" id="attendance_date" type="date" class="form-control attendance_date">
                                                    </div>
                                                </div>
                                                <div class="boxes m-4">
                                                    <div class="form-group">
                                                        <label for="">Attendance Group</label>
                                                        <select name="department_id" id="department_id" class="form-select form-control department_id">
                                                            <option value="">Select attendance group</option>
                                                            <?php
                                                            $sql_lecrosoft = "SELECT * FROM `department`";
                                                            $query_sql_lecrosoft = mysqli_query($con, $sql_lecrosoft);
                                                            while ($row = mysqli_fetch_assoc($query_sql_lecrosoft)) {
                                                                extract($row);
                                                                echo  "<option value='$department_id'>$department_name</option>";
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="boxes m-4">
                                                    <div class="form-group">
                                                        <label for="">Attendance Type</label>

                                                        <select name="attendance_type" id="attendance_type" class="form-select form-control attendance_type">
                                                            <option value="">select attendance type</option>
                                                            <?php
                                                            $sql = "SELECT * FROM attendance_type";
                                                            $query_sql = mysqli_query($con, $sql);
                                                            while ($row = mysqli_fetch_assoc($query_sql)) {
                                                                extract($row);
                                                                echo "<option value='$attendance_type_id'>$attendance_type</option>";
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="boxes m-4">
                                                    <div class="form-group">
                                                        <label for="">Attendance Type</label>

                                                        <input type="submit" id="browse_btn" class=" btn btn-gradient-primary" value="browse">
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>

                                            <div class="table-responsive attendance_content" id="attendance_content">

                                                <table class="table table-bordered mytable">
                                                    <thead>
                                                        <tr class="bg-gradient-primary text-white">

                                                            <th>Member id</th>
                                                            <th>Full Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>
                                                                <div class="form-check form-check-flat form-check-primary">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input"> Select All </label>
                                                                </div>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                    </tbody>
                                                </table>

                                            </div>

                                        </form>






                                        <!-- ====================== tab starts ============================= -->


                                        <!-- ============PHP CODE TO EXECUTE QUERIES STARTS HERE ===================== -->



                                        <!-- ADD FAMILY CODE START  -->
                                        <?php
                                        if (isset($_POST['add_attendance_type'])) {

                                            $attendance_type = $_POST['attendance_type'];
                                            if (!empty($attendance_type)) {
                                                $lecrosoft = "INSERT INTO `attendance_type`(`attendance_type`) VALUES ('$attendance_type')";
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


                                        <!-- ADD ATTENDANCE TYPE CODE END  -->


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



                <?php
                if (isset($_POST['mark_attendance'])) {

                    include('includes/submit_attendance.php');
                }
                ?>


                <!-- ADD Attendance Type -->
                <div id="dataModal2" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Attendance Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="">
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="attendance_type" placeholder="Enter attendance type" required>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="add_attendance_type">Add Attendance Type</button>
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
            $("#mark_attendance.btn").click(function(e) {
                e.preventDefault();

                alert('good');
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $(".view_data_attendance").click(function() {
                var atendanceTypeId = $(this).attr("id");
                $.ajax({
                    url: "fetch_attendance_type.php",
                    method: "post",
                    data: {
                        atendanceTypeId: atendanceTypeId,


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











    <!-- ======BROWSE ATTENDANCE BUTTON ==================== -->

    <script>
        $(document).ready(function() {
            $('#browse_btn').click(function(e) {
                e.preventDefault();

                let attendanceDate = $('.attendance_date').val();
                let departmentId = $('.department_id').val();
                let attendanceType = $('.attendance_type').val();
                $.ajax({
                    url: "includes/attendance_new.php",
                    method: "post",
                    data: {
                        attendanceDate: attendanceDate,
                        departmentId: departmentId,
                        attendanceType: attendanceType
                    },
                    beforeSend: function() {
                        // $('.attendance_content').html("<h4 class='text-center text-primary'><i class='mdi mdi-timer-sand'></i> Loading...</h4>")
                    },
                    success: function(data) {

                        console.log(JSON.parse(data));

                        var dataset = '';

                        JSON.parse(data).forEach((d) => {
                            dataset += `
                                       <tr>
                                            <td>${d.member_id}</td>
                                             <td>${d.first_name} ${d.last_name} </td>
                                             <td>${d.phone_number_one} </td>
                                             <td>${d.email}</td>
                                             <td>
                                                <div class='form-check form-check-flat form-check-primary mt-1 py-1'>
                                                    <label class='form-check-label'>
                                                         <input type='checkbox' id='${d.member_id}' value='${d.member_id}'  name='check_box_array' class='form-check-input attendance_check_box'>
                                                    </label>
                                                </div>
                                             </td>
                                       </tr> 
                        
                                    `


                        })
                        $('tbody').html(dataset);
                        console.log(dataset)

                        // $('.attendance_content').html(data)
                    }
                })
            })
        })
    </script>



    <script>
        $(document).ready(function() {
            $('.send_attendance').click(function() {
                let attendanceDateNew = $('#attendance_date').val();
                let departmentIdNew = $('#department_id').val();
                let attendanceTypeNew = $('#attendance_type').val();
                let memberIdArray = [];
                let attendanceStatusArray = [];

                $('.member_id_array').each(function() {
                    let mId = $(this).text();
                    memberIdArray.push(mId);


                })


                alert(attendanceDateNew + ' ' + departmentIdNew + ' ' + attendanceTypeNew + ' ' +
                    memberIdArray + ' ' + attendanceStatusArray)
            })


        })
    </script>

    <script>
        var attendance = [];
        var parentElem = document.getElementById('attendance_content');
        console.log(parentElem.children)
    </script>



    <!-- ========== J QUERY CODE END HERE ========= -->
</body>

</html>