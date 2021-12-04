 <?php
    sleep(1);
    include('../../connections/conn.php');
    include('function.php');
    ?>
 <?php
    if (isset($_POST['date_from']) && isset($_POST['date_to'])) {
        $from = $_POST['date_from'];
        $to = $_POST['date_to'];
        $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense !=0 && transaction_date BETWEEN '$from' and '$to' ";
        $query_lecrosoft = mysqli_query($con, $lecrosoft);
        $sum_expense = 0;
        $count = mysqli_num_rows($query_lecrosoft);

        echo "$from";
        echo "$to";

        if ($count == 0) {
            echo "<h3> No records found </h3>";
        } else {

    ?>
         <table id="example-transation3" class="display nowrap" style="width:100%">
             <thead>
                 <tr>

                     <th>Ref_id</th>
                     <th>Category</th>
                     <th>Note</th>
                     <th>Transaction Date</th>
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
            echo "<td class='font-weight-bold'>Total Expense</td>";
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
        if (!$query_lecrosoft) {
            die("query error" . mysqli_error($con));
        }
    }
        ?>

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