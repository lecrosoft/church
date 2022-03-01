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
                    <?php include('includes/page_header.php') ?>
                    <!-- ================== PAGE HEADER ENDS HERE ==================== -->



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
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="row">
                                            <h4 class="card-title float-left col-md-9">
                                                <span class="text-danger"><?php echo $department ?></span> Department Income Reports
                                            </h4>
                                            <button type="button" class="btn btn-primary add-income col-md-3">
                                                New Transaction
                                            </button>

                                        </div>
                                        <br>
                                        <br>
                                        <!-- ====================== tab starts ============================= -->


                                        <ul class="nav nav-pills mb-3 tab-ul" id="pills-tab" role="tablist">
                                            <li class="nav-item my-tab">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Chart</a>
                                            </li>
                                            <li class="nav-item my-tab">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly</a>
                                            </li>
                                            <li class="nav-item my-tab">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Yearly</a>
                                            </li>
                                            <li class="nav-item my-tab">
                                                <a class="nav-link" id="pills-custome-tab" data-toggle="pill" href="#pills-customise" role="tab" aria-controls="pills-contact" aria-selected="false">Custome</a>
                                            </li>
                                        </ul>







                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Monthly Income Chart content -->
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <div class="d-flex justify-content-between">
                                                    <div class="div"></div>
                                                    <div class="div">
                                                        <div class="form-group d-flex">
                                                            <label for="">Filter By Year</label>

                                                            <input type="text" id="datepicker_year" class="form-control chart_year" value='<?php echo date("Y") ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="fetch_chat">
                                                    <?php include('includes/department_monthly_income_chart_content.php') ?>
                                                </div>
                                            </div>
                                            <!-- Monthly Income Chart ends -->
                                            <!-- Monthly Income content -->
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                                <div class="d-flex justify-content-between">
                                                    <div class="headings">
                                                        <h5>Monthly Income Report</h5>
                                                    </div>
                                                    <form action="" method="post">

                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="department_id" value="<?php echo $depart_id ?>" hidden>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="form-group  px-2">
                                                                <label for="">Filter by transaction category</label>
                                                                <select name="" id="transaction_cat" class="form-select form-control">

                                                                    <option value="all">All</option>

                                                                    <?php
                                                                    $lecrosoft = "SELECT * FROM department_income_category ";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                        extract($row);
                                                                        echo "<option value='$department_income_cat_id'>$title</option>";
                                                                    }
                                                                    ?>


                                                                </select>
                                                            </div>



                                                            <div class="form-group px-2">
                                                                <label for="">Filter by payment method</label>
                                                                <select name="" id="payment_mtd" class="form-select form-control">

                                                                    <option value="all">All</option>
                                                                    <?php
                                                                    $lecrosoft = "SELECT * FROM payment_method";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                        extract($row);
                                                                        echo "<option value='$id'>$payment_method</option>";
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div class="form-group px-2">
                                                                <label for="">Filter By Month</label>
                                                                <select class="form-control form-select month">
                                                                    <option value="<?php echo date('m') ?>"><?php echo date('F') ?></option>
                                                                    <?php
                                                                    $lecrosoft  = "SELECT * FROM months";
                                                                    $query_leccrosoft = mysqli_query($con, $lecrosoft);
                                                                    while ($row = mysqli_fetch_assoc($query_leccrosoft)) {
                                                                        extract($row);
                                                                        echo "<option value='$id'>$month_name</option>";
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Filter By Year</label>

                                                                <input type="text" id="datepicker_year3" class="form-control year" value='<?php echo date("Y") ?>'>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="example container">
                                                    <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->

                                                </div>

                                                <div class="row d-flex justify-content-between px-3">
                                                    <div class="sm-10">

                                                        <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                    </div>
                                                    <div class="sm-2">


                                                    </div>
                                                </div>
                                                <!-- Tables comes in  -->
                                                <div class="table-responsive monthly_table-data-filter-fetch">
                                                    <?php include('includes/department_monthly_income_content.php') ?>


                                                </div>
                                            </div>
                                            <!-- monthly income content ends -->


                                            <!-- Yearly Income content -->
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div class="d-flex justify-content-between">
                                                    <div class="headings">
                                                        <h5>Yearly Income Report</h5>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="department_id" value="<?php echo $depart_id ?>" hidden>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="form-group  px-2">
                                                                <label for="">Filter by transaction category</label>
                                                                <select name="" id="transaction_cat2" class="form-select form-control">

                                                                    <option value="all">All</option>

                                                                    <?php
                                                                    $lecrosoft = "SELECT * FROM department_income_category ";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                        extract($row);
                                                                        echo "<option value='$department_income_cat_id'>$title</option>";
                                                                    }
                                                                    ?>


                                                                </select>
                                                            </div>

                                                            <div class="form-group px-2">
                                                                <label for="">Filter by payment method</label>
                                                                <select name="" id="payment_mtd2" class="form-select form-control">

                                                                    <option value="all">All</option>
                                                                    <?php
                                                                    $lecrosoft = "SELECT * FROM payment_method";
                                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                        extract($row);
                                                                        echo "<option value='$id'>$payment_method</option>";
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">Filter By Year</label>

                                                                <input type="text" id="datepicker_year2" class="form-control year_only" value='<?php echo date("Y") ?>'>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="example container">
                                                    <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->

                                                </div>

                                                <div class="row d-flex justify-content-between px-3">
                                                    <div class="sm-10">

                                                        <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                    </div>
                                                    <div class="sm-2">


                                                    </div>
                                                </div>
                                                <div class="table-responsive yearly_income_table-data-filter-fetch">



                                                    <?php include('includes/depart_yearly_income_content.php') ?>
                                                </div>
                                            </div>

                                            <!-- yearly income content ends -->

                                            <!-- Custome Income content -->
                                            <div class="tab-pane fade" id="pills-customise" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="headings">
                                                            <h5>Custome Income Report</h5>
                                                        </div>
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="department_id" value="<?php echo $depart_id ?>" hidden>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="form-group  px-2">
                                                                    <label for="">Filter by transaction category</label>
                                                                    <select name="" id="custome_transaction_cat" class="form-select form-control">

                                                                        <option value="all">All</option>

                                                                        <?php
                                                                        $lecrosoft = "SELECT * FROM department_income_category ";
                                                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                            extract($row);
                                                                            echo "<option value='$department_income_cat_id'>$title</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>



                                                                <div class="form-group px-2">
                                                                    <label for="">Filter by payment method</label>
                                                                    <select name="" id="custome_payment_mtd" class="form-select form-control">

                                                                        <option value="all">All</option>
                                                                        <?php
                                                                        $lecrosoft = "SELECT * FROM payment_method";
                                                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                            extract($row);
                                                                            echo "<option value='$id'>$payment_method</option>";
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group px-2">
                                                                    <label for="">Filter from</label>

                                                                    <input type="date" id="depart_from" class="form-control year_only" value=''>
                                                                </div>

                                                                <div class="form-group px-2">
                                                                    <label for="">Filter to</label>

                                                                    <input type="date" id="depart_to" max='<?php echo date("Y-m-d") ?>' class="form-control year_only" value=''>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="example container">
                                                    <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->

                                                </div>

                                                <div class="row d-flex justify-content-between px-3">
                                                    <div class="sm-10">

                                                        <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                    </div>
                                                    <div class="sm-2">


                                                    </div>
                                                </div>
                                                <div class="table-responsive custome_income_table-data-filter-fetch">


                                                    <?php include('includes/depart_custome_income_content.php') ?>
                                                </div>
                                            </div>

                                            <!-- Custome Income content -->
                                        </div>


                                        <!-- ====================== tab starts ============================= -->


                                    </div>

                                </div>
                            </div>


                        </div>
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
    <!-- End custom js for this page -->
    <!-- ======= monthly_income_chart_js =========== -->
    <?php include('includes/monthly_income_chart_js.php') ?>
    <!-- End monthly_income_chart_js -->



    <script>
        $(document).ready(function() {
            $('.add-income').click(function() {
                $('#dataModalDepart').modal("show");
            })
        })
    </script>




    <script>
        $(document).ready(function() {
            $('#example-transation').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#example-transation').DataTable({
                buttons: {
                    dom: {
                        button: {
                            className: 'btn btn-outline-info mr-2' //Primary class for all buttons
                        }
                    },
                    buttons: [{
                        //EXCEL
                        extend: 'excelHtml5', //extend the buttons that u wanna use
                    }]
                }

            });
        });
    </script> -->
    <script>
        $(document).ready(function() {
            $('#example-transation3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example-transation5').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


    <script>
        $("#datepicker_year").datepicker({
            // format: "mm-yyyy",
            // format: "mm-yyyy",

            // startView: "months",
            // minViewMode: "months"

            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    </script>
    <script>
        $("#datepicker_year2").datepicker({
            // format: "mm-yyyy",
            // format: "mm-yyyy",

            // startView: "months",
            // minViewMode: "months"

            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    </script>
    <script>
        $("#datepicker_year3").datepicker({
            // format: "mm-yyyy",
            // format: "mm-yyyy",

            // startView: "months",
            // minViewMode: "months"

            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    </script>












    <!-- ADD INCOME -->
    <div id="dataModalDepart" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title text-white">New <?php echo $department ?> Department Income Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="">
                    <form method="POST">
                        <div class="form-group mb-3">

                            <label for="">Transaction Category<span class="text-danger">*</span></label>
                            <select class="form-select form-control" name="tcategory" required>
                                <option value="">Select Transaction category</option>
                                <?php
                                $lecrosoft = "SELECT * FROM department_income_category";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    extract($row);
                                    echo " <option value='$department_income_cat_id'>$title</option>";
                                }

                                ?>


                            </select>


                        </div>
                        <div class="form-group mb-3">
                            <!-- <label for="" hiden>Entered By<span class="text-danger ">*</span></label> -->
                            <input type="text" class="form-control" name="department_id" value="<?php echo $depart_id ?>" hidden>

                        </div>
                        <div class="form-group mb-3">
                            <label for="">Note<span class="text-danger">*</span></label>
                            <textarea id="" cols="30" rows="10" required class="form-control" name="note"></textarea>

                        </div>

                        <div class="form-group mb-3">
                            <label for="">Payment Method<span class="text-danger">*</span></label>
                            <select class="form-select form-control" required name="payment_method">
                                <option value="">Select payment method</option>
                                <?php
                                $lecrosoft = "SELECT * FROM payment_method";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                    extract($row);
                                    echo " <option value='$id'>$payment_method</option>";
                                }
                                ?>


                            </select>


                        </div>
                        <div class="form-group mb-3">
                            <label for="">Amount<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="income_amount" placeholder="Enter Amount" required>

                        </div>
                        <div class="form-group mb-3">
                            <label for="">Transaction Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="" name="tdate" required>

                        </div>
                        <div class="form-group mb-3">
                            <!-- <label for="" hiden>Entered By<span class="text-danger ">*</span></label> -->
                            <input type="text" class="form-control" name="created_by" value="<?php echo $_SESSION['first_name'] . "  " . $_SESSION['last_name'] ?>" hidden>

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

</body>

</html>






<!-- php code  -->

<?php
if (isset($_POST['add'])) {
    $tcategory = $_POST['tcategory'];
    $department_id = $_POST['department_id'];
    $note = $_POST['note'];
    $payment_method = $_POST['payment_method'];
    $income_amount = $_POST['income_amount'];
    $tdate  = $_POST['tdate'];
    $created_by = $_POST['created_by'];


    $lecrosoft = "INSERT INTO `department_income`(`department_id`, `department_income_cat_id`, `note`, `transaction_date`, `payment_method_id`, `income`, `entered_by`) VALUES ($department_id,$tcategory,'$note','$tdate',$payment_method,'$income_amount','$created_by')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = location.href</script>';
    } else {
        die("QUERY ERROR" . mysqli_error($con));
        recordDangerMessage();
    }
}
?>
<!-- MONTHLY INCOME -->
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('#transaction_cat').change(function() {
            var transaction_cat = $(this).val();
            var payment_mtd = $('#payment_mtd').val();
            var month = $('.month').val();
            var year = $('.year').val();


            $.ajax({
                url: `includes/fetch_department_income_filter_by_month.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    month: month,
                    year: year
                },
                beforeSend: function() {
                    $('.monthly_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.monthly_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('#payment_mtd').change(function() {
            var payment_mtd = $(this).val();
            var transaction_cat = $('#transaction_cat').val();
            var month = $('.month').val();
            var year = $('.year').val();


            $.ajax({
                url: `includes/fetch_department_income_filter_by_month.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    month: month,
                    year: year
                },
                beforeSend: function() {
                    $('.monthly_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.monthly_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>


<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('.month').change(function() {
            var month = $(this).val();
            var payment_mtd = $('#payment_mtd').val();
            var transaction_cat = $('#transaction_cat').val();
            var year = $('.year').val();


            $.ajax({
                url: `includes/fetch_department_income_filter_by_month.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    month: month,
                    year: year
                },
                beforeSend: function() {
                    $('.monthly_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.monthly_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('.year').change(function() {
            var year = $(this).val();
            var month = $('.month').val();
            var payment_mtd = $('#payment_mtd').val();
            var transaction_cat = $('#transaction_cat').val();



            $.ajax({
                url: `includes/fetch_department_income_filter_by_month.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    month: month,
                    year: year
                },
                beforeSend: function() {
                    $('.monthly_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.monthly_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>


<!-- end of month income fetch -->



<!-- 
YEARLY INCOME -->



<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('#transaction_cat2').change(function() {
            var transaction_cat = $(this).val();
            var payment_mtd = $('#payment_mtd2').val();

            var year = $('.year_only').val();


            $.ajax({
                url: `includes/fetch_department_income_filter_by_year.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,

                    year: year
                },
                beforeSend: function() {
                    $('.yearly_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.yearly_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('#payment_mtd2').change(function() {
            var payment_mtd = $(this).val();
            var transaction_cat = $("#transaction_cat2").val();


            var year = $('.year_only').val();


            $.ajax({
                url: `includes/fetch_department_income_filter_by_year.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,

                    year: year
                },
                beforeSend: function() {
                    $('.yearly_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.yearly_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('.year_only').change(function() {
            var year = $(this).val();
            var payment_mtd = $('#payment_mtd2').val();
            var transaction_cat = $("#transaction_cat2").val();





            $.ajax({
                url: `includes/fetch_department_income_filter_by_year.php?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,

                    year: year
                },
                beforeSend: function() {
                    $('.yearly_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.yearly_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>

<!-- 
 END OF YEARLY INCOME AJAX -->



<!-- CUSTOME INCOME AJAX -->
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val();
        $('#custome_transaction_cat').change(function() {
            var transaction_cat = $('#custome_transaction_cat').val();
            var payment_mtd = $('#custome_payment_mtd').val();

            var from = $('#depart_from').val();
            var to = $('#depart_to').val();







            $.ajax({
                url: `includes/fetch_department_income_filter_by_date?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    from: from,
                    to: to
                },
                beforeSend: function() {
                    $('.custome_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.custome_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val()
        $('#custome_payment_mtd').change(function() {
            var payment_mtd = $('#custome_payment_mtd').val();
            var transaction_cat = $('#custome_transaction_cat').val();
            var from = $('#depart_from').val();
            var to = $('#depart_to').val();







            $.ajax({
                url: `includes/fetch_department_income_filter_by_date?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    from: from,
                    to: to
                },
                beforeSend: function() {
                    $('.custome_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.custome_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val()
        $('#depart_from').change(function() {
            var from = $('#depart_from').val();
            var to = $('#depart_to').val();
            var payment_mtd = $('#custome_payment_mtd').val();
            var transaction_cat = $('#custome_transaction_cat').val();









            $.ajax({
                url: `includes/fetch_department_income_filter_by_date?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    from: from,
                    to: to
                },
                beforeSend: function() {
                    $('.custome_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.custome_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        var depart_id = $('#department_id').val()
        $('#depart_to').change(function() {
            var from = $('#depart_from').val();
            var to = $('#depart_to').val();
            var payment_mtd = $('#custome_payment_mtd').val();
            var transaction_cat = $('#custome_transaction_cat').val();









            $.ajax({
                url: `includes/fetch_department_income_filter_by_date?d_id=${depart_id}`,
                method: "post",
                data: {
                    transaction_cat: transaction_cat,
                    payment_mtd: payment_mtd,
                    from: from,
                    to: to
                },
                beforeSend: function() {
                    $('.custome_income_table-data-filter-fetch').html('<h4>Loading...</h4>')
                },
                success: function(data) {
                    $('.custome_income_table-data-filter-fetch').html(data)
                }
            })
        })
    })
</script>
<!-- END OF CUSTOME INCOME AJAX -->