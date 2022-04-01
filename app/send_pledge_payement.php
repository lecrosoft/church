<?php
include('../connections/conn.php');
?>
<?php


if (isset($_POST['fund_purpose']) and isset($_POST['description']) and isset($_POST['pledger_name']) and isset($_POST['amount']) and isset($_POST['paymethod']) and isset($_POST['payment_date']) and isset($_POST['created_by'])) {
    $fund_purpose = $_POST['fund_purpose'];
    $description = $_POST['description'];
    $pledger_name = $_POST['pledger_name'];
    $amount = $_POST['amount'];
    $paymethod = $_POST['paymethod'];
    $payment_date = $_POST['payment_date'];
    $created_by = $_POST['created_by'];
    // $fund_purpose_to_add_pledge_to_income = $_POST['fund_purpose_to_add_pledge_to_income'];
    $pledge_category = 1;








    $lecrosoft = "INSERT INTO `pledges_payment_histroy`(`campaign_id`, `member_id`, `description`, `amount`, `payment_method_id`, `payment_date`) VALUES ($fund_purpose,$pledger_name,'$description','$amount',$paymethod,'$payment_date')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);


    $lecrosft_update_pledge = "UPDATE pledges SET `ammount_paid` = `ammount_paid` + $amount WHERE member_id = $pledger_name && campaign_id = $fund_purpose";
    $query_update_pledge = mysqli_query($con, $lecrosft_update_pledge);

    // FETCH BALANCE
    // if ($query_update_pledge) {
    //     $lecrosft_Send_balance_pledge = "SELECT * FROM `pledges` WHERE member_id = $pledger_name && campaign_id = $fund_purpose";
    //     $query_sendbalance = mysqli_query($con, $lecrosft_Send_balance_pledge);
    //     $row = mysqli_fetch_assoc($query_sendbalance);
    //     $total_amt_pledge = $row['amount'];

    //     $total_amt_paid = $row['ammount_paid'];

    //     $current_balance = $total_amt_pledge - $total_amt_paid;


    //     $lecrosft_update_balance = "UPDATE pledges SET `balance` = $current_balance WHERE member_id = $pledger_name && campaign_id = $fund_purpose";
    //     $query_update_pledge_balance = mysqli_query($con, $lecrosft_update_balance);
    // }
    // ADD TO INCOME TABLE

    $lecrosoft_add_to_income = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`,`entered_by`) VALUES ($pledge_category,'$description','$payment_date',$paymethod,'$amount','$created_by')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft_add_to_income) or die(mysqli_error($con));


    // UPDATE CAMPAIGN 
    $lecrosft_update_campaign = "UPDATE campaign SET `amount_donated` = `amount_donated` + $amount WHERE campaign_id = $fund_purpose";
    $query_update_campaign = mysqli_query($con, $lecrosft_update_campaign);

    echo "Data-Successfully-Saved";








    //     if ($lecrosft_update_pledge) {

    //         echo '<script type="text/javascript">
    //     location = "pledges.php?cp_id=$campaign_id"
    // </script>';
    //     }
    //     if (!$lecrosft_update_pledge) {
    //         die('QUERY ERROR' . mysqli_error($con));
    //     }
}
?>