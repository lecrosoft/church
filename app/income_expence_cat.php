<?php
include('../connections/conn.php');
if (isset($_POST['income_expence_cat_id'])) {

    $income_expence_cat_id = $_POST['income_expence_cat_id'];
    $lecrosoft = "SELECT * FROM income_expence_category WHERE id = $income_expence_cat_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<form method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="category_name" value='<?php echo $category_name ?>'>

    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="description" value='<?php echo $description ?>'>

    </div>

    <div class="form-group mb-3">

        <select name="" class="form-select form-control" id="type">
            <option value="<?php echo $type ?>"><?php echo $type ?> </option>

            <?php
            if ($type == "income") {
                echo "<option value='expense'>Expense</option>";
            } else {
                echo "<option value='income'>Income</option>";
            }

            ?>
        </select>


    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update" id="<?php echo $id ?>">Save changes</button>
    </div>
</form>

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
<script type="text/javascript">
    $(document).ready(function() {
        $('.update').click(function() {
            var id = $(this).attr("id");
            let category_name = document.getElementById("category_name").value
            let description = document.getElementById("description").value
            let type = document.getElementById("type").value

            $.ajax({
                url: "income_expence_cat.php",
                method: "POST",
                data: {
                    id: id,
                    category_name: category_name,
                    description: description,
                    type: type
                },
                success: function(data) {

                }

            })

        })
    })
</script>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $type = $_POST['type'];


    $lecrosoft = "UPDATE `income_expence_category` SET `category_name`='$category_name',`description`='$description',`type`='$type' WHERE `id` = $id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = "location.href"</script>';
    }
}
?><?php
