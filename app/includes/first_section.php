<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    <span style="font-weight:bold;text-decoration:underline">This year </span> Income
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>

                <?php
                $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum = $row['value_sum'];
                $formated_sum = number_format($sum);

                ?>

                <?php
                $lecrosoft = "SELECT SUM(income) as value_sum FROM income_and_expense WHERE month(current_date) = month(transaction_date) && year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_by_month = $row['value_sum'];
                $formated_sum_by_month = number_format($sum_by_month);

                ?>
                <h2 class="mb-5">₦ <?php echo $formated_sum ?></h2>
                <h6 class="card-text">This Month: <?php echo $formated_sum_by_month ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    <span style="font-weight:bold;text-decoration:underline">This year </span>Expenses
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>

                <?php
                $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_expense = $row['value_sum'];
                $formated_expense = number_format($sum_expense);
                ?>
                <?php
                $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE month(current_date) = month(transaction_date) && year(current_date) = year(transaction_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_expense_by_month = $row['value_sum'];
                $formated_expense_by_month = number_format($sum_expense_by_month);
                ?>
                <h2 class="mb-5">₦ <?php echo $formated_expense ?></h2>
                <h6 class="card-text">This Month: ₦ <?php echo $formated_expense_by_month ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    <span style="font-weight:bold;text-decoration:underline">This year </span>Balance
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <?php
                $balance = $sum - $sum_expense;
                $balance_by_month = $sum_by_month - $sum_expense_by_month;
                ?>
                <h2 class="mb-5">₦ <?php echo number_format($balance) ?></h2>
                <h6 class="card-text">This Month ₦ <?php echo number_format($balance_by_month) ?></h6>
            </div>
        </div>
    </div>
</div>