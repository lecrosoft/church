                           <div class="d-flex justify-content-between">
                               <div class="div"></div>
                               <div class="div">
                                   <div class="form-group d-flex">
                                       <label for="">Filter By Year</label>

                                       <input type="text" id="datepicker_year" class="form-control chart_year" value='<?php echo date("Y") ?>'>
                                   </div>
                               </div>
                           </div>



                           <script type="text/javascript">
                               google.charts.load('current', {
                                   'packages': ['bar']
                               });
                               google.charts.setOnLoadCallback(drawChart);

                               function drawChart() {
                                   var data = google.visualization.arrayToDataTable([
                                       ['Months', 'Income'],
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


                                        if ($january_income == 0) {
                                            echo "['Jan', 0],";
                                        } else {

                                            echo "['Jan', $january_income],";
                                        }



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


                                        if ($feb_income == 0) {
                                            echo "['Feb', 0],";
                                        } else {

                                            echo "['Feb', $feb_income],";
                                        }



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


                                        if ($march_income == 0) {
                                            echo "['March', 0],";
                                        } else {

                                            echo "['March', $march_income],";
                                        }


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


                                        if ($april_income == 0) {
                                            echo "['April', 0],";
                                        } else {

                                            echo "['April', $april_income],";
                                        }

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


                                        if ($may_income == 0) {
                                            echo "['May', 0],";
                                        } else {

                                            echo "['May', $may_income],";
                                        }


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


                                        if ($june_income == 0) {
                                            echo "['June', 0],";
                                        } else {

                                            echo "['June', $june_income],";
                                        }


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


                                        if ($july_income == 0) {
                                            echo "['July', 0],";
                                        } else {

                                            echo "['July', $july_income],";
                                        }


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


                                        if ($august_income == 0) {
                                            echo "['Aug', 0],";
                                        } else {

                                            echo "['Aug', $august_income],";
                                        }


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


                                        if ($september_income == 0) {
                                            echo "['Sept', 0],";
                                        } else {

                                            echo "['Sept', $september_income],";
                                        }




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


                                        if ($octomember_income == 0) {
                                            echo "['Oct', 0],";
                                        } else {

                                            echo "['Oct', $octomember_income],";
                                        }




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


                                        if ($november_income == 0) {
                                            echo "['Nov', 0],";
                                        } else {

                                            echo "['Nov', $november_income],";
                                        }




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


                                        if ($december_income == 0) {
                                            echo "['Dec', 0]";
                                        } else {

                                            echo "['Dec', $december_income]";
                                        }
                                        ?>

                                   ]);

                                   var options = {
                                       colors: ['#643e80'],
                                       chart: {

                                           // <?php
                                                // echo "<div class='d-flex'>";
                                                // $year = date('Y');
                                                // echo "title: 'Church performance',";
                                                // echo "subtitle: 'Income analysis for: $year',";


                                                // 
                                                ?>
                                           title: 'Church Performance',
                                           subtitle: 'Income analysis for Year : <?php echo date('Y') ?>',
                                       }
                                   };

                                   var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                   chart.draw(data, google.charts.Bar.convertOptions(options));
                               }
                           </script>

                           <div id="columnchart_material" style="width: auto; height: 500px;"></div>

























                           <!-- <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="clearfix">
                         <h4 class="card-title float-left">
                             Monthly Analytics
                         </h4>
                         <div id="monthly-income-chart-legend" class="
                          rounded-legend
                          legend-horizontal legend-top-right
                          float-right
                        "></div>
                     </div>
                     <canvas id="monthly-income-chart" class="mt-4"></canvas>
                 </div>
             </div>
         </div>
     </div> -->

                           <!-- ======= monthly_income_chart_js =========== -->
                           <?php include('includes/monthly_income_chart_js.php') ?>
                           <!-- End monthly_income_chart_js -->