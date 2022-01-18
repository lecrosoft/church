 <?php

    use GuzzleHttp\Psr7\Request;

    sleep(1);
    include_once('../../connections/conn.php');
    include('function.php');
    ?>
 <?php


    if (isset($_POST['transaction_cat'])) {
        $transaction_cat = $_POST['transaction_cat'];
        $payment_mtd = $_POST['payment_mtd'];

        $year = $_POST['year'];
        $condition = "";

        if ($transaction_cat == 'all' and  $payment_mtd == 'all') {
            $condition = "&& year(transaction_date) = $year";
        } else if (($transaction_cat == 'all' and $payment_mtd != 'all')) {
            $condition = "&& payment_method_id = $payment_mtd && year(transaction_date) = $year";
        } else if (($transaction_cat != 'all' and $payment_mtd == 'all')) {
            $condition = "&& income_and_expenses_category_id = $transaction_cat && year(transaction_date) = $year";
        } else if ($transaction_cat == 'all' and  $payment_mtd == 'all' and $year = '') {
            $condition = " year(transaction_date) = year(current_date)";
        } else {
            $condition = "&& income_and_expenses_category_id = $transaction_cat && payment_method_id = $payment_mtd && year(transaction_date) = $year";
        }





        // if (!empty($payment_mtd) and !empty($month)) {
        //     $condition = "WHERE income_and_expenses_category_id = $transaction_cat AND payment_method.id = $payment_mtd AND month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date)";
        // } else {
        //     $condition = "";
        // }


        // $lecrosoft = "SELECT * FROM income_and_expense";

        $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense !=0" . $condition;
        // $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE income !=0 && income_and_expenses_category_id = $transaction_cat && month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date) AND payment_method_id = $payment_mtd ";
        $query_lecrosoft = mysqli_query($con, $lecrosoft) or die(mysqli_error($con));
        $sum_expense = 0;




        $count = mysqli_num_rows($query_lecrosoft);

        if ($query_lecrosoft) {
        }




        if ($count == 0) {
            echo "<h3> No record found </h3>";
        } else {

    ?>
         <table id="example-transation4" class="table display table-bordered table-striped example-transation3" style="width:100%">
             <thead>
                 <tr class="bg-gradient-primary text-white">

                     <th>Ref_id</th>
                     <th>Category</th>
                     <th>Note</th>
                     <th>Trans Date</th>
                     <th>Pay Method</th>
                     <th>Expense(₦)</th>
                     <th>Entered By</th>
                     <th>Created at</th>

                     <th class="text-nowrap">Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        extract($row);
                        $formated_expense = number_format($expense);
                        $sum_expense += $expense;
                        $formated_sum_expense = number_format($sum_expense);


                        echo "<tr>";

                        echo "<td>$income_and_expense_id</td>";
                        echo "<td>$category_name</td>";
                        echo "<td>$note</td>";
                        echo "<td>$transaction_date</td>";
                        echo "<td>$payment_method</td>";

                        echo "<td>$formated_expense</td>";

                        echo "<td>$entered_by</td>";
                        echo "<td>$created_at</td>";

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
            echo "<td class='font-weight-bold'>$formated_sum_expense</td>";
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
             $('.example-transation3').DataTable({
                 dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             });
         });
     </script>