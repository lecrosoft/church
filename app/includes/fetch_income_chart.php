 <?php

    use GuzzleHttp\Psr7\Request;

    sleep(1);
    include_once('../../connections/conn.php');
    include('function.php');
    ?>
 <?php
    if (isset($_POST['chart_year'])) {
        $chart_year = $_POST['chart_year'];

    ?>
     <script type="text/javascript">
         google.charts.load('current', {
             'packages': ['bar']
         });
         google.charts.setOnLoadCallback(drawChart);

         function drawChart() {
             var data = google.visualization.arrayToDataTable([
                 ['Months', 'Income'],
                 <?php
                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 1 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $january_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 1 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $january_expenses = $row['value_sum'];
                    $january_profit = ($january_income - $january_expenses);


                    echo "['Jan', $january_income],";



                    // february analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 2 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $feb_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 2 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $feb_expenses = $row['value_sum'];
                    $feb_profit = ($feb_income - $feb_expenses);


                    echo "['Feb', $feb_income],";


                    // March analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 3 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $march_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 3 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $march_expenses = $row['value_sum'];
                    $march_profit = ($march_income - $march_expenses);


                    echo "['March', $march_income],";


                    // April analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 4 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $april_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 4 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $april_expenses = $row['value_sum'];
                    $april_profit = ($april_income - $april_expenses);


                    echo "['April', $april_income],";

                    // May analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 5 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $may_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 5 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $may_expenses = $row['value_sum'];
                    $may_profit = ($may_income - $may_expenses);


                    echo "['May', $may_income],";


                    //June analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 6 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $june_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 6 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $june_expenses = $row['value_sum'];
                    $june_profit = ($june_income - $june_expenses);


                    echo "['June', $june_income],";


                    //July analysis



                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 7 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $july_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 7 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $july_expenses = $row['value_sum'];
                    $july_profit = ($july_income - $july_expenses);


                    echo "['July', $july_income],";


                    //August analysis

                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 8 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $august_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 8 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $august_expenses = $row['value_sum'];
                    $august_profit = ($august_income - $august_expenses);


                    echo "['Aug', $august_income],";


                    //September analysis


                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 9 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $september_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 9 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $september_expenses = $row['value_sum'];
                    $september_profit = ($september_income - $september_expenses);


                    echo "['Sept', $september_income],";




                    //Octomber analysis

                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 10 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $octomember_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 10 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $octomber_expenses = $row['value_sum'];
                    $octomber_profit = ($octomember_income - $octomber_expenses);


                    echo "['Oct', $octomember_income],";



                    //November analysis


                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 11 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $november_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 11 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $november_expenses = $row['value_sum'];
                    $november_profit = ($november_income - $november_expenses);


                    echo "['Nov', $november_income],";



                    //December analysis





                    $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(transaction_date) = 12 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $december_income = $row['value_sum'];

                    $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(transaction_date) = 12 && year(transaction_date) = $chart_year";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $row = mysqli_fetch_assoc($query_lecrosoft);
                    $december_expenses = $row['value_sum'];
                    $december_profit = ($december_income - $december_expenses);


                    echo "['Dec', $december_income]";

                    ?>
             ]);

             var options = {
                 chart: {

                     <?php

                        echo "title: 'Church performance',";
                        echo "subtitle: 'Income analysis for year: $chart_year',";



                        ?>
                     //  title: 'Church Performance',
                     //  subtitle: 'Income, Expenses, and Profit: 2021',
                 }
             };

             var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

             chart.draw(data, google.charts.Bar.convertOptions(options));
         }
     </script>

     <div id="columnchart_material" style="width: auto; height: 500px;"></div>
 <?php


    }
    ?>