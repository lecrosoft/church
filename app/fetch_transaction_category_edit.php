<?php
include('../connections/conn.php');
if (isset($_POST['tCategoryId'])) {
    $tCategoryId = $_POST['tCategoryId'];
    $lecrosoft = "SELECT * FROM income_expence_category WHERE id = $tCategoryId";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
        extract($row);

?>
        <form method="POST">
            <div class="form-group mb-3">
                <label for="">Category Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="category_name" value="<?php echo $category_name ?>" required>

            </div>
            <div class="form-group mb-3">
                <label for="">Category description<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="category_description" value="<?php echo $description ?>" required>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="<?php echo $id ?>" class="btn btn-primary update_transaction" name="update">Update</button>
            </div>

        </form>



    <?php
    }
    ?>
<?php
}


if (isset($_POST['update_id'])) {

    $update_id = $_POST['update_id'];
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $lecrosoft2 = "UPDATE income_expence_category SET category_name='$category_name',description='$category_description' WHERE id= $update_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft2);
    if (!$query_lecrosoft) {
        die("query Error" . mysqli_error($con));
    } else {
        echo "success 
    $update_id";
    }
}


?>

<script>
    $(document).ready(function() {
        $('.update_transaction').click(function() {

            var id = $(this).attr("id");
            let category_name = document.getElementById("category_name").value;
            let category_description = document.getElementById("category_description").value

            $.ajax({
                url: "fetch_transaction_category_edit.php",
                method: "post",
                data: {
                    update_id: id,
                    category_name: category_name,
                    category_description: category_description


                },
                success: function(data) {

                }
            })

        });
    })
</script>