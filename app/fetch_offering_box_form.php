<?php
session_start();
include('../connections/conn.php');
$userMail = $_SESSION['email'];
?>


<?php
if (isset($_POST['catId'])) {

    $catId = $_POST['catId'];
    $lecrosoft = "SELECT * FROM `income_expence_category` WHERE type ='income' AND id = $catId ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {


        extract($row);

?>
        <div class="modal-header">
            <h5 class="modal-title">Offering Payment for <?php echo $category_name ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="">

            <form id="paymentForm" method="POST">
                <div class="form-group mb-3">
                    <label for="" hidden>Fund raising purpose</label>
                    <!-- just to add pledges to income -->
                    <select id="fund_purpose_to_add_offering_to_income" class="form-control form-select" hidden disabled>

                        <?php

                        echo " <option  class='' value='$catId'>$category_name</option>";

                        ?>
                    </select>

                    <!-- just to get the amount pledged -->
                    <div class="form-group mb-3">
                        <label for="" hidden>email</label>
                        <input type="text" class="form-control" id="email" value='<?php echo $userMail ?>' disabled hidden>

                    </div>



                    <!-- the real canpaign select  bellow-->
                    <select id="fund_purpose" class="form-control form-select" hidden disabled>

                        <?php

                        echo " <option  class='' value='$catId'> $category_name</option>";

                        ?>

                        <!-- to display the campaign it self -->

                        <input hidden type="text" class="form-control" value="<?php echo $catId ?>" disabled>


                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <input type="text" class="form-control" id="description" value='<?php echo "Payment for : " . $category_name ?>' disabled>

                </div>


                <div class="form-group mb-3">
                    <label for="">Amount<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter the amount to pay here" min="1" max="" autocomplete="off" required>

                </div>
                <div class="form-group mb-3">
                    <label hidden for="">Payment method <span class="text-danger">*</span></label>
                    <select hidden id="paymethod" class="form-control form-select" required>
                        <option value='3'>Online</option>
                        <?php
                        // $lecrosoft = "SELECT * FROM payment_method";
                        // $query_lecrosoft = mysqli_query($con, $lecrosoft);
                        // while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        //     extract($row);
                        //     echo " <option value='$id'>$payment_method</option>";
                        // }
                        ?>
                    </select>

                </div>
                <div class="form-group mb-3">
                    <label hidden for="">Payment date <span class="text-danger">*</span></label>
                    <input hidden type="text" class="form-control" id="payment_date" value="<?php echo date('Y-m-d') ?>" required>

                </div>
                <div class="form-group mb-3">
                    <label for="" hidden>created by <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="created_by" value='<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>' required hidden>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add-payment-for-pledger" onclick="payWithPaystack()" id="" name=" add-payment-btn">Add Payment</button>
                </div>


            </form>
        </div>

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
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            let fund_purpose = document.getElementById("fund_purpose").value;
            let description = document.getElementById("description").value;

            let amount = document.getElementById("amount").value;
            let paymethod = document.getElementById("paymethod").value;
            let payment_date = document.getElementById("payment_date").value;

            let created_by = document.getElementById("created_by").value;


            let fund_purpose_to_add_offering_to_income = document.getElementById("fund_purpose_to_add_offering_to_income").value;
            // if (amount > current_balance) {

            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Oops...',
            //         text: 'The amount you entered is more than your balance !'
            //         // footer: '<a href="">Why do I have this issue?</a>'
            //     })

            // } else {
            let handler = PaystackPop.setup({
                key: 'pk_test_fe27bd519b1346a18ca00c5af5e8c1788fd0c74e', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);

                    let transactionID = response.reference;
                    $.ajax({
                        url: "send_user_online_offering_payement.php",

                        method: "post",
                        data: {
                            transactionID: transactionID,
                            fund_purpose: fund_purpose,
                            description: description,

                            amount: amount,
                            paymethod: paymethod,
                            payment_date: payment_date,
                            created_by: created_by,
                            fund_purpose_to_add_offering_to_income: fund_purpose_to_add_offering_to_income


                        },
                        success: function(data) {
                            location = window.location.href;
                            // $('.show_response').html(data)
                            //     if (data == "Data-Successfully-Saved") {
                            //         Swal.fire({
                            //             icon: 'success',
                            //             title: 'successful',
                            //             text: data["message"],

                            //         })
                            //         location = window.location.href;
                            //     } else {

                            //         Swal.fire({
                            //             icon: 'error',
                            //             title: 'Oops...',
                            //             text: 'Internal Server Error!',

                            //         })
                            //     }


                        }


                    })

                }
            });
            handler.openIframe();


        }
        // }














    })
</script>