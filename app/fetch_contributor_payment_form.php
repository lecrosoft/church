<?php
session_start();
include('../connections/conn.php');

if (isset($_POST['contributor_id'])) {

    $contributor_id = $_POST['contributor_id'];
    $lecrosoft = "SELECT contributions.*,event_title,last_name,first_name FROM contributions LEFT JOIN event ON contributions.event_id = event.event_id LEFT JOIN members ON contributions.member_id = members.member_id   WHERE contribution_id = $contributor_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {


        extract($row);

?>

        <form method="POST">
            <div class="form-group mb-3">
                <label for="" hidden>Fund raising purpose</label>
                <!-- just to add pledges to income -->
                <select hidden id="event_purpose_to_add_contribution_to_income" class="form-control form-select" hidden disabled>

                    <?php

                    echo " <option  class='' value='$event_id'>$event_title</option>";

                    ?>
                </select>

                <!-- just to get the amount pledged -->



                <!-- the real canpaign select  bellow-->
                <select id="event_purpose" class="form-control form-select" hidden disabled>

                    <?php

                    echo " <option  class='' value='$event_id'>$event_title</option>";

                    ?>

                    <!-- to display the campaign it self -->



            </div>
            <div class="form-group mb-3">
                <label for="">Description</label>
                <input type="text" class="form-control" id="description" value='<?php echo "Payment for : " . $event_title ?>' disabled>

            </div>

            <div class="form-group mb-3">
                <label for="" hidden>Contributor</label>
                <input hidden type="text" class="form-control" value="<?php echo $last_name . " " . $first_name ?>" disabled>

                <select hidden id="contributor_name" class="form-control form-select" hidden disabled>
                    <?php

                    echo " <option class='selected' value='$member_id'>$last_name  $first_name </option>";

                    ?>
                </select>

            </div>
            <div class="form-group mb-3">
                <label for="">Amount<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="amount" placeholder="Enter the amount to pay here" min="1" max="<?php echo $balance ?>" required>

            </div>
            <div class="form-group mb-3">
                <label for="" hidden>Description</label>
                <input hidden type="number" class="form-control" id="current_balance" value='<?php echo $balance ?>' disabled>

            </div>
            <div class="form-group mb-3">
                <label for="">Payment method <span class="text-danger">*</span></label>
                <select id="paymethod" class="form-control form-select" required>
                    <option value="">Select payment method</option>
                    <?php
                    $lecrosoft = "SELECT * FROM payment_method";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        extract($row);
                        echo " <option value='$id'>$payment_method</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="form-group mb-3">
                <label for="">Payment date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="payment_date" required>

            </div>
            <div class="form-group mb-3">
                <label for="" hidden>created by <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="created_by" value='<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>' required hidden>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add-payment-for-contributor" id="" name="add-payment-btn">Add Payment</button>
            </div>


        </form>

<?php
    };
}
?>
<?php

// if (isset($_POST['add-payment'])) {
//     echo '<script>alert("Okay")</script>';
//     $fund_purpose = $_POST['fund_purpose'];
//     $description = $_POST['description'];
//     $pledger_name = $_POST['pledger_name'];
//     $amount = $_POST['amount'];
//     $paymethod = $_POST['paymethod'];
//     $payment_date = $_POST['payment_date'];

//     $lecrosoft = "INSERT INTO `pledges_payment_histroy`(`campaign_id`, `member_id`, `description`, `amount`, `payment_method_id`, `payment_date`) VALUES ($fund_purpose,$pledger_name,'$description','$amount',$paymethod,'$payment_date')";
//     $query_lecrosoft = mysqli_query($con, $lecrosoft);
//     if ($query_lecrosoft) {
//         echo '<script type="text/javascript">location = "pledges.php?cp_id=$campaign_id"</script>';
//     }
//     if (!$query_lecrosoft) {
//         die('QUERY ERROR' . mysqli_error($con));
//     }
// }

?>

<?php
//         if (isset($_POST['fund_purpose']) and isset($_POST['description']) and isset($_POST['pledger_name']) and isset($_POST['amount']) and isset($_POST['paymethod']) and isset($_POST['payment_date'])) {
//             $fund_purpose = $_POST['fund_purpose'];
//             $description = $_POST['description'];
//             $pledger_name = $_POST['pledger_name'];
//             $amount = $_POST['amount'];
//             $paymethod = $_POST['paymethod'];
//             $payment_date = $_POST['payment_date'];

//             $lecrosoft = "INSERT INTO `pledges_payment_histroy`(`campaign_id`, `member_id`, `description`, `amount`, `payment_method_id`, `payment_date`) VALUES ($fund_purpose,$pledger_name,'$description','$amount',$paymethod,'$payment_date')";
//             $query_lecrosoft = mysqli_query($con, $lecrosoft);
//             if ($query_lecrosoft) {
//                 echo '<script type="text/javascript">location = "pledges.php?cp_id=$campaign_id"</script>';
//             }
//             if (!$query_lecrosoft) {
//                 die('QUERY ERROR' . mysqli_error($con));
//             }
//         }
//     };
// }
?>
<script>
    $(document).ready(function() {
        $('.add-payment-for-contributor').click(function(e) {
            e.preventDefault();


            let event_purpose = document.getElementById("event_purpose").value;
            let description = document.getElementById("description").value;
            let contributor_name = document.getElementById("contributor_name").value;
            let amount = document.getElementById("amount").value;
            let paymethod = document.getElementById("paymethod").value;
            let payment_date = document.getElementById("payment_date").value;
            let created_by = document.getElementById("created_by").value;
            let current_balance = document.getElementById("current_balance").value;
            let event_purpose_to_add_contribution_to_income = document.getElementById("event_purpose_to_add_contribution_to_income").value;
            if ($('#amount').val().length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Amount field cannot be empty !'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
            } else if ($('#paymethod').val().length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Payment method cannot be empty !'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
            } else if ($('#payment_date').val().length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Payment date cannot be empty !'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })
            } else if (amount > current_balance) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'The amount you entered is more than your balance !'
                    // footer: '<a href="">Why do I have this issue?</a>'
                })

            } else {
                $.ajax({
                    url: "send_contribution_payement.php",
                    method: "post",
                    data: {
                        event_purpose: event_purpose,
                        description: description,
                        contributor_name: contributor_name,
                        amount: amount,
                        paymethod: paymethod,
                        payment_date: payment_date,
                        created_by: created_by,
                        event_purpose_to_add_contribution_to_income: event_purpose_to_add_contribution_to_income,


                    },
                    success: function(data) {


                        if (data == "Data-Successfully-Saved") {
                            Swal.fire({
                                icon: 'success',
                                title: 'successful',
                                text: data["message"],

                            })
                            location = window.location.href;
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Internal Server Error!',

                            })
                        }


                    }


                })

            }


        })
    })
</script>