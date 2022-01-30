<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Unpaid Pledges
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php $member_session_id = $_SESSION['member_id']; ?>
                <?php

                $lecrosoft = "SELECT SUM(`balance`) as value_sum FROM `pledges` WHERE `member_id` = $member_session_id ";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum = $row['value_sum'];
                $formated_sum = number_format($sum);

                ?>

                <?php
                $lecrosoft = "SELECT SUM(`balance`) as value_sum FROM `pledges` WHERE `member_id` = $member_session_id && year(current_date) = year(pledge_date)";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_by_year = $row['value_sum'];
                $formated_sum_by_year = number_format($sum_by_year);

                ?>
                <h2 class="mb-5">₦ <?php echo $formated_sum ?></h2>
                <h6 class="card-text">This Year: <?php echo $formated_sum_by_year ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Amt Saved this year
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>

                <?php
                // $lecrosoft = "SELECT SUM(expense) as value_sum FROM income_and_expense WHERE year(current_date) = year(transaction_date)";
                $lecrosoft = "SELECT SUM(amount) as value_sum FROM wallet WHERE `member_id`= $member_session_id && year(current_date) = year(payment_date) && `status` ='confirmed'";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_wallet_year = $row['value_sum'];
                $formated_sum_wallet_by_year = number_format($sum_wallet_year);
                ?>
                <?php

                $lecrosoft = "SELECT SUM(amount) as value_sum FROM wallet WHERE `member_id`= $member_session_id && month(current_date) = month(payment_date) && year(current_date) = year(payment_date) && `status` ='confirmed'";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_wallet = $row['value_sum'];
                $formated_sum_wallet = number_format($sum_wallet);
                ?>
                <h2 class="mb-5">₦ <?php echo number_format($sum_wallet_year) ?></h2>
                <h6 class="card-text">Amount Withdrawn: ₦ <?php echo 0 ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    My Wallet Balance
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <?php
                $member_session_id = $_SESSION['member_id'];
                $lecrosoft = "SELECT SUM(amount) as value_sum FROM wallet WHERE `member_id`= $member_session_id && month(current_date) = month(payment_date) && year(current_date) = year(payment_date) && `status` ='confirmed'";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                $row = mysqli_fetch_assoc($query_lecrosoft);
                $sum_wallet = $row['value_sum'];
                $formated_sum_wallet = number_format($sum_wallet);
                ?>
                <h2 class="mb-5">₦ <?php echo number_format($sum_wallet) ?></h2>
                <h6 class="card-text">This Month ₦ <?php echo number_format($sum_wallet) ?></h6>
            </div>
        </div>
    </div>
</div>