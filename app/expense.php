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




                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title float-left">
                                                Expenses Report
                                            </h4>
                                            <button type="button" class="btn btn-gradient-primary add-expense">
                                                New Transaction
                                            </button>
                                        </div>
                                        <br>
                                        <br>
                                        <!-- ====================== tab starts ============================= -->
                                        <!-- <div id="service-02">
                                            <div id="service-tabs">

                                                <br><br><br>

                                                <ul class="text-center">
                                                    <li class='r-tabs-state-active'><a class="btn " href="#tab-1">Chart</a></li>
                                                    <li><a href="#tab-2">Monthly</a></li>
                                                    <li><a href="#tab-3">Yearly</a></li>
                                                    <li><a href="#tab-4">Custome</a></li>
                                                </ul>
                                                <br>
                                                <div id="tab-1" class="service-tab">
                                                    lekan1
                                                </div>
                                                <div id="tab-2">
                                                    lekan2
                                                </div>
                                                <div id="tab-3">
                                                    lekan3
                                                </div>
                                                <div id="tab-4">
                                                    lekan4
                                                </div>

                                            </div>
                                        </div> -->

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
                                                <div id="fetch_chat">
                                                    <?php include('includes/monthly_expense_chart_content.php') ?>
                                                </div>
                                            </div>
                                            <!-- Monthly Income Chart ends -->
                                            <!-- Monthly Expense content -->
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="headings text-center mb-2">
                                                    <h5>Monthly Expenses Report</h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="container">
                                                    <div class="d-flex justify-content-between">

                                                        <form action="" method="post" class="text-center" style="padding-top:0px;padding-left:4rem;padding-right: 4rem;">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="form-group  px-2">
                                                                    <label for="">Filter by transaction category</label>
                                                                    <select name="" id="transaction_cat" class="form-select form-control">

                                                                        <option value="all">All</option>

                                                                        <?php
                                                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type ='expense'";
                                                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                            extract($row);
                                                                            echo "<option value='$id'>$category_name</option>";
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

                                                                <div class="form-group px-2">
                                                                    <label for="">Filter By Year</label>

                                                                    <input type="text" id="datepicker_year3" class="form-control year" value='<?php echo date("Y") ?>'>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- content  -->

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
                                                <div class="table-responsive expense_table-data-filter-fetch">
                                                    <?php include('includes/monthly_expense_content.php') ?>
                                                </div>

                                            </div>
                                            <!-- monthly income content ends -->


                                            <!-- Yearly Income content -->
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div class="headings text-center mb-2">
                                                    <h5>Yearly Expenses Report</h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="container">
                                                    <div class="d-flex justify-content-between">
                                                        <form action="" method="post" class="text-center" style="padding-top:0px;padding-left:4rem;padding-right: 4rem;">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="form-group  px-2">
                                                                    <label for="">Filter by transaction category</label>
                                                                    <select name="" id="transaction_cat2" class="form-select form-control">

                                                                        <option value="all">All</option>

                                                                        <?php
                                                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type ='expense'";
                                                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                            extract($row);
                                                                            echo "<option value='$id'>$category_name</option>";
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
                                                </div>

                                                <!-- content  -->

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
                                                <div class="table-responsive expense_yearly-table-data-filter-fetch">
                                                    <?php include('includes/yearly_expense_content.php') ?>
                                                </div>
                                            </div>

                                            <!-- yearly income content ends -->



                                            <!-- Custome Income content -->
                                            <div class="tab-pane fade" id="pills-customise" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <div class="headings text-center mb-2">
                                                    <h5>Custome Income Report</h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="container">
                                                    <div class="d-flex justify-content-between">

                                                        <form action="" method="post" style="padding-top:0px;padding-left:4rem;padding-right: 4rem;">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="form-group  px-2">
                                                                    <label for="">Filter by transaction category</label>
                                                                    <select name="" id="transaction_cat3" class="form-select form-control">

                                                                        <option value="all">All</option>

                                                                        <?php
                                                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type ='expense'";
                                                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                                            extract($row);
                                                                            echo "<option value='$id'>$category_name</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>



                                                                <div class="form-group px-2">
                                                                    <label for="">Filter by payment method</label>
                                                                    <select name="" id="payment_mtd3" class="form-select form-control">

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

                                                                    <input type="date" id="from" class="form-control year_only" value=''>
                                                                </div>

                                                                <div class="form-group px-2">
                                                                    <label for="">Filter to</label>

                                                                    <input type="date" id="to" max='<?php echo date("Y-m-d") ?>' class="form-control year_only" value=''>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- content  -->

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
                                                <div class="table-responsive expense_date-table-data-filter-fetch">

                                                    <?php include('includes/custome_expense_content.php') ?>
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
            $('.add-expense').click(function() {
                $('#dataModal1').modal("show");
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




    <!-- MONTHLY INCOME -->
    <script>
        $(document).ready(function() {
            $('#transaction_cat').change(function() {
                var transaction_cat = $(this).val();
                var payment_mtd = $('#payment_mtd').val();
                var month = $('.month').val();
                var year = $('.year').val();


                $.ajax({
                    url: "includes/fetch_expense_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#payment_mtd').change(function() {
                var payment_mtd = $(this).val();
                var transaction_cat = $('#transaction_cat').val();
                var month = $('.month').val();
                var year = $('.year').val();


                $.ajax({
                    url: "includes/fetch_expense_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.month').change(function() {
                var month = $(this).val();
                var payment_mtd = $('#payment_mtd').val();
                var transaction_cat = $('#transaction_cat').val();
                var year = $('.year').val();


                $.ajax({
                    url: "includes/fetch_expense_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>



    <script>
        $(document).ready(function() {
            $('.year').change(function() {
                var year = $(this).val();
                var month = $('.month').val();
                var payment_mtd = $('#payment_mtd').val();
                var transaction_cat = $('#transaction_cat').val();



                $.ajax({
                    url: "includes/fetch_expense_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>




    <!-- 
YEARLY EXPENSES -->



    <script>
        $(document).ready(function() {
            $('#transaction_cat2').change(function() {
                var transaction_cat = $(this).val();
                var payment_mtd = $('#payment_mtd2').val();

                var year = $('.year_only').val();


                $.ajax({
                    url: "includes/fetch_expense_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_yearly-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#payment_mtd2').change(function() {
                var payment_mtd = $(this).val();
                var transaction_cat = $("#transaction_cat2").val();


                var year = $('.year_only').val();


                $.ajax({
                    url: "includes/fetch_expense_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_yearly-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.year_only').change(function() {
                var year = $(this).val();
                var payment_mtd = $('#payment_mtd2').val();
                var transaction_cat = $("#transaction_cat2").val();





                $.ajax({
                    url: "includes/fetch_expense_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.expense_yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_yearly-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>

    <!-- END OF YEARLY EXPENSES FILTER  -->

    <!-- by date range -->
    <script>
        $(document).ready(function() {
            $('#transaction_cat3').change(function() {
                var transaction_cat = $(this).val();
                var payment_mtd = $('#payment_mtd3').val();

                var from = $('#from').val();
                var to = $('#to').val();

                alert(transaction_cat + '' + payment_mtd + '' + from + '' + to)





                $.ajax({
                    url: "includes/fetch_expense_filter_by_date.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        from: from,
                        to: to
                    },
                    beforeSend: function() {
                        $('.expense_date-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_date-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#payment_mtd3').change(function() {
                var payment_mtd = $('this').val();
                var transaction_cat = $('#transaction_cat3').val();
                var from = $('#from').val();
                var to = $('#to').val();





                $.ajax({
                    url: "includes/fetch_expense_filter_by_date.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        from: from,
                        to: to
                    },
                    beforeSend: function() {
                        $('.expense_date-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.expense_date-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#search_btn2').click(function() {

                const date_from = $(".date_from").val();
                const date_to = $(".date_to").val();
                $.ajax({
                    url: "includes/fetch_expense_by_filter.php",
                    method: "post",
                    data: {
                        date_from: date_from,
                        date_to: date_to
                    },
                    beforeSend: function() {
                        $(".table-data-filter-fetch_expense").html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $(".table-data-filter-fetch_expense").html(data)
                        console.log(data)
                    }


                })

            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.chart_year').change(function() {
                var chart_year = $(this).val();
                alert(chart_year)
                // fetch_chat
                $.ajax({
                    url: 'includes/fetch_income_chart.php',
                    method: 'post',
                    data: {
                        chart_year: chart_year
                    },
                    beforeSend: function() {
                        $('#fetch_chat').html('<h4>Loading...</h4>');
                    },
                    success: function(data) {
                        $('#fetch_chat').html(data)
                    }
                })
            })
        })
    </script>


</body>

</html>




<!-- ADD EXPENSE -->
<div id="dataModal1" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h5 class="modal-title text-white">New Expense Transaction</h5>
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
                            $lecrosoft = "SELECT * FROM income_expence_category WHERE type = 'expense'";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                extract($row);
                                echo " <option value='$id'>$category_name</option>";
                            }

                            ?>


                        </select>


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
                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

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
                        <button type="submit" class="btn btn-primary" name="add_expense">Save changes</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>


<?php
if (isset($_POST['add_expense'])) {
    $tcategory = $_POST['tcategory'];
    $note = $_POST['note'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];
    $tdate  = $_POST['tdate'];
    $created_by = $_POST['created_by'];

    $lecrosoft = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `expense`,`entered_by`) VALUES ($tcategory,'$note','$tdate',$payment_method,'$amount','$created_by')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = location.href </script>';
    } else {
        die("QUERY ERROR" . mysqli_error($con));
        recordDangerMessage();
    }
}
?>