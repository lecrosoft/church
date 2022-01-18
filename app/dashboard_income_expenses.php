<?php 


include('../connections/conn.php');

?>


    


          





                    




                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                       
                                       
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
                                                    colors: ['#36d2bc', '#fe8c96', '#3e9eea'],
                                                    chart: {
                                                        // title: 'Church Performance',
                                                        // subtitle: 'Income VS Expenses, and Profit: <?php echo date('Y') ?>',
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




   


 