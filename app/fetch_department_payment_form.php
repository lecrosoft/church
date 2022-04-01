<?php
include('../connections/conn.php');

if (isset($_POST['memberID'])) {

    $memberID = $_POST['memberID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $departmentClickedID = $_POST['departmentClickedID'];
    $lecrosoft = "SELECT * FROM members WHERE member_id = $memberID";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>


<div class="modal-header bg-gradient-primary">

    <h5 class="modal-title">You are about to record payment for <span class="text-white"><?php echo $first_name . " " . $last_name ?></span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST">
        <div class="form-group mb-3">
            <label for="" hidden>Member id</label>
            <input type="text" hidden class="form-control" id="member_id" value="<?php echo $member_id ?> ">

        </div>

        <?php
        // This is just to get the first and last name of the member who the admin is making poyment for
        $select_member_who_owns_the_payment_query = "SELECT first_name,last_name FROM members WHERE member_id = $member_id";
        $query_select_members = mysqli_query($con, $select_member_who_owns_the_payment_query);
        while ($member_row = mysqli_fetch_assoc($query_select_members)) {
            extract($member_row);
        }
        ?>
        <div class="form-group mb-3">
            <label for="" hidden>Logged in member firstname</label>
            <input type="text" class="form-control" id="created_by" value="<?php echo $firstName . " " . $lastName ?> ">

        </div>
        <div class="form-group mb-3">
            <label for="" hidden>Logged in member lastname</label>
            <input type="text" hidden class="form-control" id="logged_in_member_lname" value="<?php echo $lastName ?> ">

        </div>
        <div class="form-group mb-3">
            <label for="" hidden>Member firstname</label>
            <input type="text" hidden class="form-control" id="member_fname" value="<?php echo $first_name ?> ">

        </div>
        <div class="form-group mb-3">
            <label for="" hidden>Member lastname</label>
            <input type="text" hidden class="form-control" id="member_lname" value="<?php echo $last_name ?> ">

        </div>
        <div class="form-group mb-3">
            <label for="" hidden>Depart id</label>
            <input type="text" hidden class="form-control" id="depart_id" value="<?php echo $departmentClickedID ?> ">

        </div>
        <div class="form-group mb-3">
            <label for="">Amount</label>
            <input type="number" class="form-control" id="amount" placeholder='Enter amount'>

        </div>
        <div class="form-group mb-3">
            <label for="">Payment Category</label>
            <select id="category" id="" class="form-select form-control">
                <option value="" disabled selected>select category</option>

                <?php
                $sql = "SELECT * FROM `department_income_category` WHERE `department_id` = $departmentClickedID";
                $sql_query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($sql_query)) {
                    extract($row);
                    echo " <option value='$department_income_cat_id'>$title</option>";
                }
                ?>

            </select>

        </div>
        <div class="form-group mb-3">
            <label for="">Payment Method</label>
            <select id="payment_method" id="" class="form-select form-control">
                <option value="" disabled selected>select payment method</option>

                <?php
                $sql = "SELECT * FROM `payment_method`";
                $sql_query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($sql_query)) {
                    extract($row);
                    echo " <option value='$id'>$payment_method</option>";
                }
                ?>

            </select>

        </div>



        <div class="form-group mb-3">
            <label for="">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" value='<?php echo date('d M Y') ?>'>

        </div>
        <div class="form-group mb-3">
            <label for="">Note</label>
            <input type="text" class="form-control" id="note" placeholder='Enter note'>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary add-payment_button" name="add-payment">Add Payment</button>
        </div>




        <?php
        if (isset($_POST['depart_member_id'])) {



            $depart_member_id = $_POST['depart_member_id'];
            $depart_id = $_POST['depart_id'];
            $created_by = $_POST['created_by'];
            $logged_in_member_lname = $_POST['logged_in_member_lname'];
            $member_fname = $_POST['member_fname'];
            $member_lname = $_POST['member_lname'];
            $amount = $_POST['amount'];
            $category = $_POST['category'];
            $payment_method = $_POST['payment_method'];
            $payment_date = $_POST['payment_date'];
            $note = $_POST['note'];
            $description_on_income_table = "Payment made by :" . $member_fname . " " . $member_lname;


            // echo $amount . " " . $payment_category_id . " " . $payment_method_id . " " . $payment_date . " " . $note;
            $lecrosoft = "INSERT INTO `department_transaction`(`member_id`, `department_id`, `amount`, `payment_category_id`, `payment_method_id`, `payment_date`, `note`) VALUES ($depart_member_id,$depart_id,$amount,$category,$payment_method,'$payment_date','$note')";
            $query_lecrosoft = mysqli_query($con, $lecrosoft);
            $insert_to_income = "INSERT INTO `department_income`(`department_id`, `department_income_cat_id`, `note`, `transaction_date`, `payment_method_id`, `income`, `entered_by`) VALUES ($depart_id,$category,'$description_on_income_table','$payment_date',$payment_method,$amount,'$created_by')";
            $query_income = mysqli_query($con, $insert_to_income);
            if ($query_lecrosoft and $query_income) {
                echo '<script type="text/javascript">location = "location.href"</script>';
            } else {
                die(mysqli_error($con));
            }
        }
        ?>
    </form>
</div>


<?php
// if (isset($_POST['update'])) {
//     $fam_id = $_POST['update'];

//     $lecrosoft = "UPDATE `family` SET `family_name`='$family_name',`family_leader`='$family_leader',`family_quantity`=$family_quantity,`family_contact`='$family_contact',`address`='$address',`status`='$status',`join_date`='$join_date' WHERE `family_id` = $fam_id";
//     $query_lecrosoft = mysqli_query($con, $lecrosoft);
//     if (!$query_lecrosoft) {
//         echo '<script type=text/javascript>location = "family.php"</script>';
//     } else {
//         die("QUERY ERROR" . mysqli_error($con));
//     }
// }
?>
<!-- <script src="./includes/script.js"></script> -->
<script>
    $(document).ready(function() {
        $('.add-payment_button').click(function(e) {
            e.preventDefault();

            let member_id = $('#member_id').val();

            let created_by = $('#created_by').val();
            let logged_in_member_lname = $('#logged_in_member_lname').val();

            let member_fname = $('#member_fname').val();
            let member_lname = $('#member_lname').val();
            let depart_id = $('#depart_id').val();
            let amount = $('#amount').val();
            let category = $('#category').val();
            let payment_method = $('#payment_method').val();
            let payment_date = $('#payment_date').val();
            let note = $('#note').val();

            $.ajax({
                url: "fetch_department_payment_form.php",
                method: "POST",
                data: {
                    depart_member_id: member_id,
                    depart_id: depart_id,
                    amount: amount,
                    category: category,
                    payment_method: payment_method,
                    payment_date: payment_date,
                    note: note,
                    member_lname: member_lname,
                    member_fname: member_fname

                },

                success: function(data) {
                    location = window.location.href;
                }
            })



        })
    })
</script>