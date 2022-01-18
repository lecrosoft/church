<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Total Income
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>



                <?php
                $lecrosoft = "SELECT SUM(income) as income_value FROM department_income WHERE department_id = $depart_id AND year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $income_sum = $row['income_value'];
                $formated_sum = number_format($income_sum);
                ?>

                <?php
                $lecrosoft = "SELECT SUM(income) as income_value FROM department_income WHERE department_id = $depart_id AND month(current_date) = month(transaction_date) && year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $monthly_income_sum = $row['income_value'];
                $formated_sum_by_month = number_format($monthly_income_sum);
                ?>


                <h2 class="mb-5">₦ <?php echo $formated_sum ?></h2>
                <h6 class="card-text">This Month: <?php echo $formated_sum_by_month ?></h6>


                <li class="breadcrumb-item active text-white" aria-current="page">
                    <a href="depart_income.php?d_id=<?php echo $depart_id ?>"><span></span>Overview
                        <i class="
                        mdi mdi-alert-circle-outline
                        icon-sm
                        text-primary
                        align-middle
                      "></i></a>
                </li>

            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Total Expenses
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>




                <?php
                $lecrosoft = "SELECT SUM(expense) as expense_value FROM department_expense WHERE department_id = $depart_id AND year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $expense_sum = $row['expense_value'];
                $formated_expense = number_format($expense_sum);
                ?>
                <?php
                $lecrosoft = "SELECT SUM(expense) as expense_value FROM department_expense WHERE department_id = $depart_id AND month(current_date) = month(transaction_date) && year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $monthly_expense_sum = $row['expense_value'];
                $formated_expense_by_month = number_format($monthly_expense_sum);
                ?>

                <h2 class="mb-5">₦ <?php
                                    if ($expense_sum > 0) {
                                        echo $formated_expense;
                                    } else {
                                        echo 0;
                                    }
                                    ?></h2>
                <h6 class="card-text">This Month: ₦ <?php
                                                    if ($expense_sum > 0) {
                                                        echo $formated_expense_by_month;
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?> </h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Current Balance
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>

                <h2 class="mb-5">₦ <?php echo number_format($income_sum - $expense_sum) ?></h2>
                <h6 class="card-text">This Month ₦ <?php echo number_format($monthly_income_sum - $monthly_expense_sum) ?></h6>
            </div>
        </div>
    </div>
</div>