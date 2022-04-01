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
                                                Incomes , expenses and Profit Report
                                            </h4>
                                            <button type="button" class="btn  btn-gradient-primary add-income">
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

                                        <script type="text/javascript">
                                            google.charts.load('current', {
                                                'packages': ['bar']
                                            });
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                    ['Months', 'Income', 'Expenses', 'Profit/Loss'],
                                                    <?php
                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 1 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $january_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 1 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $january_expenses = $row['value_sum'];
                                                    $january_profit = ($january_income - $january_expenses);


                                                    echo "['Jan', $january_income, $january_expenses, $january_profit],";



                                                    // february analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 2 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $feb_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 2 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $feb_expenses = $row['value_sum'];
                                                    $feb_profit = ($feb_income - $feb_expenses);


                                                    echo "['Feb', $feb_income, $feb_expenses, $feb_profit],";


                                                    // March analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 3 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $march_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 3 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $march_expenses = $row['value_sum'];
                                                    $march_profit = ($march_income - $march_expenses);


                                                    echo "['March', $march_income, $march_expenses, $march_profit],";


                                                    // April analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 4 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $april_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 4 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $april_expenses = $row['value_sum'];
                                                    $april_profit = ($april_income - $april_expenses);


                                                    echo "['April', $april_income, $april_expenses, $april_profit],";

                                                    // May analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 5 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $may_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 5 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $may_expenses = $row['value_sum'];
                                                    $may_profit = ($may_income - $may_expenses);


                                                    echo "['May', $may_income, $may_expenses, $may_profit],";


                                                    //June analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 6 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $june_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 6 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $june_expenses = $row['value_sum'];
                                                    $june_profit = ($june_income - $june_expenses);


                                                    echo "['June', $june_income, $june_expenses, $june_profit],";


                                                    //July analysis



                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 7 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $july_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 7 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $july_expenses = $row['value_sum'];
                                                    $july_profit = ($july_income - $july_expenses);


                                                    echo "['July', $july_income, $july_expenses, $july_profit],";


                                                    //August analysis

                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 8 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $august_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 8 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $august_expenses = $row['value_sum'];
                                                    $august_profit = ($august_income - $august_expenses);


                                                    echo "['Aug', $august_income, $august_expenses, $august_profit],";


                                                    //September analysis


                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 9 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $september_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 9 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $september_expenses = $row['value_sum'];
                                                    $september_profit = ($september_income - $september_expenses);


                                                    echo "['Sept', $september_income, $september_expenses, $september_profit],";




                                                    //Octomber analysis

                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 10 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $octomember_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 10 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $octomber_expenses = $row['value_sum'];
                                                    $octomber_profit = ($octomember_income - $octomber_expenses);


                                                    echo "['Oct', $octomember_income, $octomber_expenses, $octomber_profit],";



                                                    //November analysis


                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 11 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $november_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 11 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $november_expenses = $row['value_sum'];
                                                    $november_profit = ($november_income - $november_expenses);


                                                    echo "['Nov', $november_income, $november_expenses, $november_profit],";



                                                    //December analysis





                                                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 12 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $december_income = $row['value_sum'];

                                                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 12 && year(transaction_date) = year(current_date)";
                                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                    $row = mysqli_fetch_assoc($query_lecrosoft);
                                                    $december_expenses = $row['value_sum'];
                                                    $december_profit = ($december_income - $december_expenses);


                                                    echo "['Dec', $december_income, $december_expenses, $december_profit]";

                                                    ?>
                                                ]);

                                                var options = {
                                                    colors: ['#643e80', '#fe8c96', '#fbdd44'],
                                                    chart: {
                                                        title: 'Church Performance',
                                                        subtitle: 'Income VS Expenses, and Profit: <?php echo date('Y') ?>',
                                                    }
                                                };

                                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                                chart.draw(data, google.charts.Bar.convertOptions(options));
                                            }
                                        </script>

                                        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
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
                $('#dataModal2').modal("show");
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
                    url: "includes/fetch_income_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.table-data-filter-fetch').html(data)
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
                    url: "includes/fetch_income_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.table-data-filter-fetch').html(data)
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
                    url: "includes/fetch_income_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.table-data-filter-fetch').html(data)
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
                    url: "includes/fetch_income_filter_by_month.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        month: month,
                        year: year
                    },
                    beforeSend: function() {
                        $('.table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>




    <!-- 
YEARLY INCOME -->



    <script>
        $(document).ready(function() {
            $('#transaction_cat2').change(function() {
                var transaction_cat = $(this).val();
                var payment_mtd = $('#payment_mtd2').val();

                var year = $('.year_only').val();


                $.ajax({
                    url: "includes/fetch_income_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.yearly-table-data-filter-fetch').html(data)
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
                    url: "includes/fetch_income_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.yearly-table-data-filter-fetch').html(data)
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
                    url: "includes/fetch_income_filter_by_year.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,

                        year: year
                    },
                    beforeSend: function() {
                        $('.yearly-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.yearly-table-data-filter-fetch').html(data)
                    }
                })
            })
        })
    </script>

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
                    url: "includes/fetch_income_filter_by_date.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        from: from,
                        to: to
                    },
                    beforeSend: function() {
                        $('.date-table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.date-table-data-filter-fetch').html(data)
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

                alert(transaction_cat + '' + payment_mtd + '' + from + '' + to)





                $.ajax({
                    url: "includes/fetch_income_filter_by_date.php",
                    method: "post",
                    data: {
                        transaction_cat: transaction_cat,
                        payment_mtd: payment_mtd,
                        from: from,
                        to: to
                    },
                    beforeSend: function() {
                        $('.table-data-filter-fetch').html('<h4>Loading...</h4>')
                    },
                    success: function(data) {
                        $('.table-data-filter-fetch').html(data)
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




<!-- ADD INCOME -->
<div id="dataModal2" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">New Income Transaction</h5>
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
                            $lecrosoft = "SELECT * FROM income_expence_category WHERE type = 'income' ";
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
                        <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>



<!-- php code  -->

<?php
if (isset($_POST['add'])) {
    $tcategory = $_POST['tcategory'];
    $note = $_POST['note'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];
    $tdate  = $_POST['tdate'];
    $created_by = $_POST['created_by'];

    $lecrosoft = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`,`entered_by`) VALUES ($tcategory,'$note','$tdate',$payment_method,'$amount','$created_by')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = location.href</script>';
    } else {
        die("QUERY ERROR" . mysqli_error($con));
        recordDangerMessage();
    }
}
?>