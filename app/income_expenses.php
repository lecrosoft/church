<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!-- <div class="preloader">
<div class="cssload-speeding-wheel"></div>
</div> -->
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php
        include('includes/top-nav.php');
        ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php
        include('includes/left-side-bar.php');
        ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Income/Expense</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="" target="_blank" class="
                  btn btn-danger
                  pull-right
                  m-l-20
                  btn-rounded btn-outline
                  hidden-xs hidden-sm
                  waves-effect waves-light
                ">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Income</a></li>
                            <li class="active">Expense</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="d-flex">

                                <div class="col-sm-8">

                                    <code>Income/Expense</code>
                                </div>
                                <div class="col-sm-4">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            New Transaction
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item add-income" href="#">Income</a>
                                            <a class="dropdown-item add-expense" href="#">Expense</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <section class="m-t-40">
                                <div class="sttabs tabs-style-linebox">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="#section-linebox-1"><span>Chart</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-linebox-2"><span>Income</span></a>
                                            </li>


                                        </ul>
                                    </nav>
                                    <div class="content-wrap text-center">

                                        <section id="section-linebox-1">
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
                                                        chart: {
                                                            title: 'Church Performance',
                                                            subtitle: 'Income, Expenses, and Profit: 2021',
                                                        }
                                                    };

                                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                                }
                                            </script>

                                            <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                                        </section>

                                        <section id="section-linebox-2">
                                            <h3>Income Report</h3>
                                            <div class="example container">
                                                <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->
                                                <div class="d-flex" id="">
                                                    <span class="input-group-addon bg-info b-0 text-white">From</span> <input type="date" class="form-control date_from" id="" name="date_from" /> <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                    <input type="date" class="form-control date_to" id="" name="date_to" /><button id="search_btn" class="input-group-addon btn bg-info b-0 text-white">Go</button>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between px-3">
                                                <div class="sm-10">

                                                    <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                </div>
                                                <div class="sm-2">


                                                </div>
                                            </div>
                                            <div class="table-responsive table-data-filter-fetch">

                                                <table id="example-transation" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>

                                                            <th>Ref_id</th>
                                                            <th>Category</th>
                                                            <th>Note</th>
                                                            <th>Trans Date</th>
                                                            <th>Pay Method</th>
                                                            <th>Income(₦)</th>
                                                            <th>Entered By</th>
                                                            <th>Created at</th>

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        selectTransactionIncome();
                                                        ?>


                                                    </tbody>
                                                </table> <?php
                                                            deleteFamily();
                                                            ?> <?php

                                                                addFamily();


                                                                ?>
                                        </section>


                                    </div>
                                    <!-- /content -->
                                </div>

                                <!-- /tabs -->
                            </section>
                            <!-- Tabstyle start -->
                            <!-- Tabstyle start -->









                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                <?php
                include('includes/right-side-bar.php');
                ?>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->

            <!-- /.container-fluid -->
            <!-- footer begins -->

            <div id="dataModal" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Family Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="family_content">

                        </div>


                    </div>
                </div>
            </div>
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
                    echo '<script type="text/javascript">location = "transaction.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
                }
            }
            ?>


            <!-- ADD EXPENSE -->
            <div id="dataModal1" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
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
                    echo '<script type="text/javascript">location = "transaction.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
                }
            }
            ?>
            <?php
            include('includes/footer.php');
            ?>

            <!--Morris JavaScript -->
            <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
            <script src="../plugins/bower_components/morrisjs/morris.js"></script>
            <!-- jQuery for carousel -->
            <script src="../plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
            <script src="../plugins/bower_components/owl.carousel/owl.custom.js"></script>
            <!-- Sparkline chart JavaScript -->
            <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
            <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
            <!--Counter js -->
            <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
            <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
            <!-- Custom Theme JavaScript -->
            <script src="js/cbpFWTabs.js"></script>
            <script type="text/javascript">
                (function() {
                    [].slice
                        .call(document.querySelectorAll(".sttabs"))
                        .forEach(function(el) {
                            new CBPFWTabs(el);
                        });
                })();
            </script>




            <!-- footer ends -->
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
            <script>
                $(document).ready(function() {
                    $('.add-income').click(function() {
                        $('#dataModal2').modal("show");
                    })
                })
            </script>
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
            <script>
                $(document).ready(function() {
                    $('#example-transation2').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>

            <script>
                // Clock pickers
                $('#single-input').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('.clockpicker').clockpicker({
                    donetext: 'Done',
                }).find('input').change(function() {
                    console.log(this.value);
                });
                $('#check-minutes').click(function(e) {
                    // Have to stop propagation here
                    e.stopPropagation();
                    input.clockpicker('show').clockpicker('toggleView', 'minutes');
                });
                if (/mobile/i.test(navigator.userAgent)) {
                    $('input').prop('readOnly', true);
                }
                // Colorpicker
                $(".colorpicker").asColorPicker();
                $(".complex-colorpicker").asColorPicker({
                    mode: 'complex'
                });
                $(".gradient-colorpicker").asColorPicker({
                    mode: 'gradient'
                });
                // Date Picker
                var date = $('#datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                }).val();
                jQuery('.mydatepicker, #datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true

                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                jQuery('#datepicker-inline').datepicker({
                    todayHighlight: true
                });
                // Daterange picker
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse'
                });
                $('.input-daterange-timepicker').daterangepicker({
                    timePicker: true,
                    format: 'MM/DD/YYYY h:mm A',
                    timePickerIncrement: 30,
                    timePicker12Hour: true,
                    timePickerSeconds: false,
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse'
                });
                $('.input-limit-datepicker').daterangepicker({
                    format: 'MM/DD/YYYY',
                    minDate: '06/01/2015',
                    maxDate: '06/30/2015',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse',
                    dateLimit: {
                        days: 6
                    }
                });
            </script>

            <!-- FILTER DATE SCRIPT -->
            <script>
                $(document).ready(function() {
                    $('#search_btn').click(function() {

                        const date_from = $(".date_from").val();
                        const date_to = $(".date_to").val();
                        $.ajax({
                            url: "includes/fetch_income_by_filter.php",
                            method: "post",
                            data: {
                                date_from: date_from,
                                date_to: date_to
                            },
                            beforeSend: function() {
                                $(".table-data-filter-fetch").html('<h4>Loading...</h4>')
                            },
                            success: function(data) {
                                $(".table-data-filter-fetch").html(data)
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

</body>

</html>