 <?php

    use GuzzleHttp\Psr7\Request;

    sleep(1);
    include_once('../../connections/conn.php');
    include('function.php');
    ?>
 <?php


    if (isset($_POST['transaction_cat'])) {
        $depart_id = $_GET['d_id'];
        $transaction_cat = $_POST['transaction_cat'];
        $payment_mtd = $_POST['payment_mtd'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $condition = "";

        if ($transaction_cat == 'all' and  $payment_mtd == 'all') {
            $condition = "&& month(transaction_date) = $month && year(transaction_date) = $year";
        } else if (($transaction_cat == 'all' and $payment_mtd != 'all')) {
            $condition = "&& payment_method_id = $payment_mtd && month(transaction_date) = $month && year(transaction_date) = $year";
        } else if (($transaction_cat != 'all' and $payment_mtd == 'all')) {
            $condition = "&& department_income.department_income_cat_id = $transaction_cat  && month(transaction_date) = $month && year(transaction_date) = $year";
        } else if ($transaction_cat == 'all' and  $payment_mtd == 'all' and $year = '') {
            $condition = "&& month(transaction_date) = month(current_date) && year(transaction_date) = year(current_date)";
        } else {
            $condition = "&& department_income.department_income_cat_id = $transaction_cat && month(transaction_date) = $month && year(transaction_date) = $year AND payment_method_id = $payment_mtd";
        }





        // if (!empty($payment_mtd) and !empty($month)) {
        //     $condition = "WHERE income_and_expenses_category_id = $transaction_cat AND payment_method.id = $payment_mtd AND month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date)";
        // } else {
        //     $condition = "";
        // }


        // $lecrosoft = "SELECT * FROM income_and_expense";
        $lecrosoft = "SELECT * FROM department_income LEFT JOIN department_income_category ON department_income.department_income_cat_id=department_income_category.department_income_cat_id LEFT JOIN payment_method ON department_income.payment_method_id = payment_method.id WHERE department_id = $depart_id" . $condition;

        $query_lecrosoft = mysqli_query($con, $lecrosoft) or die(mysqli_error($con));
        $sum_income = 0;





        $count = mysqli_num_rows($query_lecrosoft);

        if ($query_lecrosoft) {
        }




        if ($count == 0) {
            echo "<h3> No record found </h3>";
        } else {

    ?>
         <table id="example-transation2" class="display nowrap" style="width:100%">
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
                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        extract($row);

                        echo "<tr>";

                        echo "<td>$id</td>";
                        echo "<td>$title</td>";
                        echo "<td>$note</td>";
                        echo "<td>$transaction_date</td>";
                        echo "<td>$payment_method</td>";
                        $formated_income = number_format($income);
                        echo "<td>$formated_income</td>";

                        echo "<td>$entered_by</td>";
                        echo "<td>$created_at</td>";
                        $sum_income += $income;
                        $formated_sum_income = number_format($sum_income);
                        echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
                        echo "</tr>";
                    }
                    ?>


             </tbody>
         <?php
            echo "<tfoot>";
            echo "<tr>";
            echo "<td class='font-weight-bold'>Total Income</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td class='font-weight-bold'>$formated_sum_income</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
            echo "</tfoot>";
        }
            ?>
         </table>
     <?php

    }
        ?>

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