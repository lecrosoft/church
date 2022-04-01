<?php
include('../connections/conn.php');

if (isset($_POST['memberID'])) {

    $memberID = $_POST['memberID'];

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
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Payment categories</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM `department_income_category` WHERE department_id = $departmentClickedID";
            $query_sql = mysqli_query($con, $sql);



            while ($row = mysqli_fetch_assoc($query_sql)) {
                extract($row);


                echo "<tr>
                <td><a href='#'>$title</a></td>

            </tr>";
            }

            ?>


        </tbody>



        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </table>
    </table>
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