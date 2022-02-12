<?php
include('../connections/conn.php');
?>
<?php


if (isset($_POST['event_purpose']) and isset($_POST['description']) and isset($_POST['contributor_name']) and isset($_POST['amount']) and isset($_POST['paymethod']) and isset($_POST['payment_date']) and isset($_POST['created_by'])) {
    $event_purpose = $_POST['event_purpose'];
    $description = $_POST['description'];
    $contributor_name = $_POST['contributor_name'];
    $amount = $_POST['amount'];
    $paymethod = $_POST['paymethod'];
    $payment_date = $_POST['payment_date'];
    $created_by = $_POST['created_by'];
    // $fund_purpose_to_add_pledge_to_income = $_POST['fund_purpose_to_add_pledge_to_income'];
    $pledge_category = 1;








    $lecrosoft = "INSERT INTO `contribution_payment_histroy`(`event_id`, `member_id`, `description`, `amount`, `payment_method_id`, `payment_date`,`entered_by`) VALUES ($event_purpose,$contributor_name,'$description','$amount',$paymethod,'$payment_date','$created_by')";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);


    $lecrosft_update_contribution = "UPDATE contributions SET `Amount_paid` = `Amount_paid` + $amount WHERE member_id =$contributor_name && event_id = $event_purpose";
    $query_update_contribution = mysqli_query($con, $lecrosft_update_contribution);


    // ADD TO INCOME TABLE

    // $lecrosoft_add_to_income = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`,`entered_by`) VALUES ($pledge_category,'$description','$payment_date',$paymethod,'$amount','$created_by')";
    // $query_lecrosoft = mysqli_query($con, $lecrosoft_add_to_income) or die(mysqli_error($con));


    // UPDATE CAMPAIGN 
    $lecrosft_update_event = "UPDATE event SET `amount_collected` = `amount_collected` + $amount WHERE event_id = $event_purpose";
    $query_update_event = mysqli_query($con, $lecrosft_update_event);

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