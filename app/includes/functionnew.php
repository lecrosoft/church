
<?php

// ============ DEPARTMENT FUNCTION STARTS HERE ==============
function selectDepartment()
{
  global $con;


  $lecrosoft = "SELECT * FROM department";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    $department_id = $row['department_id'];
    $department = $row['department_name'];
    $department_leader = $row['department_leader_name'];
    echo "<tr>";
    echo "<td><a href= 'department_dashboard.php?d_id=$department_id'> $department </a></td>";
    echo "<td>$department_leader</td>";
    echo "<td class='text-nowrap'><a href='department.php?edit_id=$department_id' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a onClick=\"javascript: return confirm ('Are you sure you want to delete this category?');\" href='department.php?del_id=$department_id'  data-toggle='tooltip' data-original-title='Delete'> <i class='far fa-trash-alt text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
function
deleteDepartment()

{
  global $con;
  if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $lecrosoft = "DELETE FROM department WHERE department_id = $del_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
  }
}

function addDepartment()
{
  global $con;
  if (isset($_POST['save'])) {

    $department_name = $_POST['department_name'];
    $department_leader = $_POST['department_leader'];
    if (!empty($department_name) && !(empty($department_leader))) {
      $lecrosoft = "INSERT INTO `department`(`department_name`, `department_leader_name`) VALUES ( '$department_name','$department_leader')";
      $query_lecrosoft = mysqli_query($con, $lecrosoft);
      if (!$lecrosoft) {
        die("QUERY ERROR" . mysqli_error($con));
      } else {
        recordSuccessMessage();
        echo '<script type="text/javascript">location="department.php"</script>';
      }
    }
  }
}
// ============ DEPARTMENT FUNCTION END HERE ==============

// ============ MESSAGE ALLERT  FUNCTION STARTS HERE ==============
function
recordSuccessMessage()
{
  echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Record has been added successfully.
</div>';
}
function recordDangerMessage()
{
  echo '<div class="alert alert-danger" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Faild!</strong>
   Record Not Added.
</div>';
}

// ============ MESSAGE ALLERT  FUNCTION END HERE ==============


// ============ FAMILY  FUNCTION STARTS HERE ==============


function selectFamily()
{
  global $con;


  $lecrosoft = "SELECT * FROM family";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    $family_id = $row['family_id'];
    $family_name = $row['family_name'];
    $family_leader = $row['family_leader'];
    $family_quantity = $row['family_quantity'];
    $family_contact = $row['family_contact'];
    $address = $row['address'];
    $join_date = $row['join_date'];
    $status = $row['status'];

    $family_leader = $row['family_leader'];
    echo "<tr>";
    echo "<td>" . " <div class='form-check form-check-flat form-check-primary mt-1 py-1'>" .
      "<label class='form-check-label'>" .
      " <input type='checkbox' name='check_box_array[]' class='form-check-input my_check_box'>" . " </label>" .
      "</div>" . "</td>";
    echo "<td>$family_name</td>";
    echo "<td>$family_leader</td>";
    echo "<td>$family_quantity</td>";
    echo "<td>$family_contact</td>";

    echo "<td>$join_date</td>";
    echo "<td>$status</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$family_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-border-color text-warning m-r-10'></i> </a> <a id='$family_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete-forever text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}

function
deleteFamily()

{
  global $con;
  if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $lecrosoft = "DELETE FROM department WHERE department_id = $del_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
  }
}

function addFamily()
{
  global $con;
  if (isset($_POST['save'])) {

    $department_name = $_POST['department_name'];
    $department_leader = $_POST['department_leader'];
    if (!empty($department_name) && !(empty($department_leader))) {
      $lecrosoft = "INSERT INTO `department`(`department_name`, `department_leader_name`) VALUES ( '$department_name','$department_leader')";
      $query_lecrosoft = mysqli_query($con, $lecrosoft);
      if (!$lecrosoft) {
        die("QUERY ERROR" . mysqli_error($con));
      } else {
        recordSuccessMessage();
        echo '<script type="text/javascript">location="department.php"</script>';
      }
    }
  }
}

// ============ FAMILY  FUNCTION END HERE ==============

// FINANCE CATEGORY START HERE
function selectTransactionCategory()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_expence_category";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);

    echo "<tr>";

    echo "<td>$category_name</td>";
    echo "<td>$description</td>";
    echo "<td>$type</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
// SELECT INCOME TRANSACTION
function selectTransactionIncome()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE income !=0";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
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

// SELECT INCOME by MONTH
function selectIncomeByMonth()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE income !=0 && month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date) ORDER BY income_and_expense.income_and_expense_id DESC ";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = '';
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
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
// SELECT INCOME by YEAR
function
selectIncomeByYear()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE income !=0 && year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
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
// END OF SELECT INCOME BY YEAR


// SELECT INCOME by DATE
function
selectIncomeByDate()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE income !=0 && transaction_date = date(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
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
// SELECT EXPENSE TRANSACTION

// SELECT EXPENSE by MONTH
function selectExpenseByMonth()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense !=0 && month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_expense = 0;
  $formated_sum_expense = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
    echo "<td>$note</td>";
    echo "<td>$transaction_date</td>";
    echo "<td>$payment_method</td>";
    $formated_expense = number_format($expense);
    echo "<td>$formated_expense</td>";

    echo "<td>$entered_by</td>";
    echo "<td>$created_at</td>";
    $sum_expense += $expense;
    $formated_sum_expense = number_format($sum_expense);
    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }

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


// ================================
function selectTransactionExpense()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense != 0";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_expense = 0;
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
    echo "<td>$note</td>";
    echo "<td>$transaction_date</td>";
    echo "<td>$payment_method</td>";
    $formated_expense = number_format($expense);
    echo "<td>$formated_expense</td>";

    echo "<td>$entered_by</td>";
    echo "<td>$created_at</td>";
    $sum_expense += $expense;
    $formated_sum_expense = number_format($sum_expense);
    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }

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






// SELECT EXPENSE by YEAR
function
selectExpenseByYear()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense !=0 && year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_expense = 0;
  $formated_sum_expense = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
    echo "<td>$note</td>";
    echo "<td>$transaction_date</td>";
    echo "<td>$payment_method</td>";
    $formated_expense = number_format($expense);
    echo "<td>$formated_expense</td>";

    echo "<td>$entered_by</td>";
    echo "<td>$created_at</td>";
    $sum_expense += $expense;
    $formated_sum_expense = number_format($sum_expense);
    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }

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
// ================== END OF SELECT EXPENSE BY YEAR =====================




// SELECT INCOME by DATE
function
selectExpenseByDate()
{
  global $con;


  $lecrosoft = "SELECT * FROM income_and_expense LEFT JOIN income_expence_category ON income_and_expense.income_and_expenses_category_id=income_expence_category.id LEFT JOIN payment_method ON income_and_expense.payment_method_id = payment_method.id WHERE expense !=0 && transaction_date = date(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_expense = 0;
  $formated_sum_expense = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$income_and_expense_id</td>";
    echo "<td>$category_name</td>";
    echo "<td>$note</td>";
    echo "<td>$transaction_date</td>";
    echo "<td>$payment_method</td>";
    $formated_expense = number_format($expense);
    echo "<td>$formated_expense</td>";

    echo "<td>$entered_by</td>";
    echo "<td>$created_at</td>";
    $sum_expense += $expense;
    $formated_sum_expense = number_format($sum_expense);
    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }

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

// SELECT DONATION CAMPAIGN
function selectCampaign()
{
  global $con;


  $lecrosoft = "SELECT * FROM campaign";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";
    echo "<td><a href='pledges.php?cp_id=$campaign_id'>$campaign</a</td>";
    echo "<td>$description</td>";
    echo "<td>$date</td>";
    echo "<td>$amount_pledged</td>";
    echo "<td>$amount_donated</td>";
    echo "<td>$status</td>";
    echo "<td class='text-nowrap'><a type='button'  id='$campaign_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='$campaign_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
// END DONATION by member CAMPAIGN
function selectCampaignByMember()
{
  global $con;


  $lecrosoft = "SELECT * FROM campaign";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";
    echo "<td><a href='pledges.php?cp_id=$campaign_id'>$campaign</a</td>";
    echo "<td>$description</td>";
    echo "<td>$date</td>";
    echo "<td>$amount_pledged</td>";
    echo "<td>$amount_donated</td>";

    // 
    echo "</tr>";
  }
}
// END DONATION CAMPAIGN

// SELECT PLEDGES
function selectPledges()
{
  global $con;


  $lecrosoft = "SELECT pledges.*,campaign,first_name,last_name,note,amount,pledge_date,pledge_due_date FROM pledges LEFT JOIN campaign ON pledges.campaign_id=campaign.campaign_id LEFT JOIN members ON pledges.member_id = members.member_id";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);

    echo "<tr>";


    echo "<td>$campaign</td>";
    echo "<td>$note</td>";
    echo "<td>" . "$last_name" . " " . "$first_name" . "</td>";
    echo "<td>$amount</td>";
    echo "<td>$pledge_date</td>";
    echo "<td>$pledge_due_date</td>";


    echo "<td class='text-nowrap'><a type='button'  id='$pledges_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}


// END PLEDGES UNDER CAMPAIGH
function
selectPledgesByUnderCampaign()
{
  global $con;

  if (isset($_GET['cp_id'])) {
    $cp_id = $_GET['cp_id'];

    $lecrosoft = "SELECT pledges.*,campaign,first_name,last_name,note,amount,pledge_date,pledge_due_date FROM pledges LEFT JOIN campaign ON pledges.campaign_id=campaign.campaign_id LEFT JOIN members ON pledges.member_id = members.member_id WHERE pledges.campaign_id =$cp_id ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);



    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {


      extract($row);
      if ($amount == $ammount_paid) {
        $disabled = "disabled";
        $btn_label = "Payment made";
        $btn_color = "btn-success";
        $faplus = "fa-check";
      } else {
        $disabled = "";
        $btn_label = "Add Payment";
        $btn_color = "btn-warning";
        $faplus = "fa-plus";
      }
      echo "<tr>";
      echo "<td>" . "$last_name" . " " . "$first_name" . "</td>";
      echo "<td>$amount</td>";
      echo "<td>$pledge_date</td>";
      echo "<td>$pledge_due_date</td>";
      echo "<td>$ammount_paid</td>";

      echo "<td>" . $balance . "</td>";
      // echo "<td>$status</td>";
      echo "<td class='text-nowrap'><button $disabled type='button'  id='$pledges_id' class='view_data btn $btn_color btn-sm' data-toggle='tooltip' data-original-title='Add payment for this pledger' > <i class='fa $faplus text-inverse m-r-10'></i> $btn_label </button> </td>";
      echo "</tr>";
    }
  }
}
function
selectContributorsUnderEvent()
{
  global $con;

  if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    $lecrosoft = "SELECT contributions.*,event_title,first_name,last_name,amount_to_contribute,contribution_date FROM contributions LEFT JOIN event ON contributions.event_id = event.event_id LEFT JOIN members ON contributions.member_id = members.member_id WHERE contributions.event_id = $event_id ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);



    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {


      extract($row);
      if ($amount_to_contribute == $Amount_paid) {
        $disabled = "disabled";
        $btn_label = "Payment made";
        $btn_color = "btn-success";
        $faplus = "fa-check";
      } else {
        $disabled = "";
        $btn_label = "Add Payment";
        $btn_color = "btn-warning";
        $faplus = "fa-plus";
      }
      echo "<tr>";
      echo "<td>" . "$last_name" . " " . "$first_name" . "</td>";
      echo "<td>$amount_to_contribute</td>";
      echo "<td>$contribution_date</td>";
      echo "<td>$Amount_paid</td>";

      echo "<td>" . $balance . "</td>";
      // echo "<td>$status</td>";
      echo "<td class='text-nowrap'><button $disabled type='button'  id='$contribution_id' class='view_data btn $btn_color btn-sm' data-toggle='tooltip' data-original-title='Add payment for this pledger' > <i class='fa $faplus text-inverse m-r-10'></i> $btn_label </button> </td>";
      echo "</tr>";
    }
  }
}




// function
// selectPledgesByUnderProfile()
// {
//   global $con;


//   $lecrosoft = "SELECT pledges.*,campaign,first_name,last_name,note,amount,pledge_date,pledge_due_date FROM pledges LEFT JOIN campaign ON pledges.campaign_id=campaign.campaign_id LEFT JOIN members ON pledges.member_id = members.member_id WHERE member_id = $member_id ";
//   $query_lecrosoft = mysqli_query($con, $lecrosoft);



//   while ($row = mysqli_fetch_assoc($query_lecrosoft)) {


//     extract($row);
//     if ($amount == $ammount_paid) {
//       $disabled = "disabled";
//       $btn_label = "Payment made";
//       $btn_color = "btn-success";
//       $faplus = "fa-check";
//     } else {
//       $disabled = "";
//       $btn_label = "Add Payment";
//       $btn_color = "btn-warning";
//       $faplus = "fa-plus";
//     }
//     echo "<tr>";



//     echo "<td>" . "$last_name" . " " . "$first_name" . "</td>";
//     echo "<td>$amount</td>";
//     echo "<td>$pledge_date</td>";
//     echo "<td>$pledge_due_date</td>";
//     echo "<td>$ammount_paid</td>";
//     $balance = ($amount - $ammount_paid);
//     echo "<td>" . $balance . "</td>";
//     // echo "<td>$status</td>";


//     echo "<td class='text-nowrap'><button $disabled type='button'  id='$pledges_id' class='view_data btn $btn_color btn-sm' data-toggle='tooltip' data-original-title='Add payment for this pledger' > <i class='fa $faplus text-inverse m-r-10'></i> $btn_label </button> </td>";
//     echo "</tr>";
//   }
// }



// END PLEDGES
// ASSET
function selectAsset()
{
  global $con;


  $lecrosoft = "SELECT * FROM asset";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);
    echo "<tr>";
    echo "<td>$asset_name</td>";
    echo "<td>$asset_description</td>";
    echo "<td>$asset_cost</td>";


    echo "<td class='text-nowrap'><a type='button'  id='$asset_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-border-color text-warning m-r-10'></i> </a> <a id='$asset_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete-forever text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
function
selectDepartmentMember()
{
  global $con;


  $depart_id = $_GET['d_id'];

  $lecrosoft = "SELECT * FROM department_member LEFT JOIN members ON department_member.member_id = members.member_id LEFT JOIN department_position ON department_member.department_position_id = department_position.department_position_id WHERE department_id = $depart_id";

  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);
    echo "<tr>";
    echo "<td>$first_name  $last_name</td>";
    echo "<td>$phone_number_one</td>";
    echo "<td>$department_position_title</td>";

    echo "<td>$status</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='$id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
function
selectDepartmentProject()
{
  global $con;


  $depart_id = $_GET['d_id'];

  $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id ";

  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);
    $formatted_extimation = number_format($project_extimation);
    echo "<tr>";
    echo "<td>$project_title</td>";
    echo "<td>$project_description</td>";
    echo "<td>$formatted_extimation</td>";
    echo "<td>$priority</td>";
    echo "<td>$status</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$project_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='$project_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}


// department open projects

function
selectDepartmentOpenProject()
{
  global $con;


  $depart_id = $_GET['d_id'];


  $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id and status != 'Completed' ";

  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);
    $formatted_extimation = number_format($project_extimation);
    echo "<tr>";
    echo "<td>$project_title</td>";
    echo "<td>$project_description</td>";
    echo "<td>$formatted_extimation</td>";
    echo "<td>$priority</td>";
    echo "<td>$status</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$project_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='$project_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}


// ================ DEPARTMENT CODES STARTS HERE =============================================


// ================ DEPARTMENT INCOME ====================

// SELECT DEPARTMENT INCOME by MONTH
function selectDepartmentIncomeByMonth()
{
  global $con;

  $depart_id = $_GET['d_id'];
  $lecrosoft = "SELECT * FROM department_income LEFT JOIN department_income_category ON department_income.department_income_cat_id=department_income_category.department_income_cat_id LEFT JOIN payment_method ON department_income.payment_method_id = payment_method.id WHERE department_id = $depart_id  && month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = "";
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

function
selectDepartmentIncomeByYear()
{
  global $con;
  $depart_id = $_GET['d_id'];
  $lecrosoft = "SELECT * FROM department_income LEFT JOIN department_income_category ON department_income.department_income_cat_id=department_income_category.department_income_cat_id LEFT JOIN payment_method ON department_income.payment_method_id = payment_method.id WHERE department_id = $depart_id  && year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_income = 0;
  $formated_sum_income = "";
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

// =========== DEPARTMENT EXPENSES =============

// SELECT INCOME by MONTH
function selectDepartmentExpenseByMonth()
{
  global $con;

  $depart_id = $_GET['d_id'];
  $lecrosoft = "SELECT * FROM department_expense LEFT JOIN department_expense_category ON department_expense.department_expense_cat_id=department_expense_category.department_expense_cat_id LEFT JOIN payment_method ON department_expense.payment_method_id = payment_method.id WHERE department_id = $depart_id  && month(transaction_date) = month(current_date) AND year(transaction_date) = year(current_date)";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);
  $sum_expense = 0;
  $formated_sum_expense = "";
  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

    extract($row);

    echo "<tr>";

    echo "<td>$id</td>";
    echo "<td>$title</td>";
    echo "<td>$note</td>";
    echo "<td>$transaction_date</td>";
    echo "<td>$payment_method</td>";
    $formated_expense = number_format($expense);
    echo "<td>$formated_expense</td>";

    echo "<td>$entered_by</td>";
    echo "<td>$created_at</td>";
    $sum_expense += $expense;
    $formated_sum_expense = number_format($sum_expense);
    echo "<td class='text-nowrap'><a type='button'  id='$id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a id='sa-warning'   data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }

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


// ============ Attendance Type =============

function
selectAttendanceType()
{
  global $con;


  $lecrosoft = "SELECT * FROM `attendance_type`";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    extract($row);

    echo "<tr>";
    echo "<td>" . " <div class='form-check form-check-flat form-check-primary mt-1 py-1'>" .
      "<label class='form-check-label'>" .
      " <input type='checkbox' name='check_box_array[]' class='form-check-input my_check_box'>" . " </label>" .
      "</div>" . "</td>";
    echo "<td>$attendance_type</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$attendance_type_id' class='view_data_attendance' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-border-color text-warning m-r-10'></i> </a> <a id='$attendance_type_id' class='delete-alert'  data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete-forever text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
