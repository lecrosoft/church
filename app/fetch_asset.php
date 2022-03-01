<?php
include('../connections/conn.php');
if (isset($_POST['asset_id'])) {

    $asset_id = $_POST['asset_id'];
    $lecrosoft = "SELECT * FROM asset WHERE asset_id = $asset_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<form method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="asset_name" value='<?php echo $asset_name ?>'>

    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="asset_description" value='<?php echo $asset_description ?>'>

    </div>

    <div class="form-group mb-3">
        <input type="text" class="form-control" id="asset_cost" value='<?php echo $asset_cost ?>'>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update" id="<?php echo $asset_id ?>">Save changes</button>
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
            let asset_name = document.getElementById("asset_name").value
            let asset_description = document.getElementById("asset_description").value
            let asset_cost = document.getElementById("asset_cost").value

            $.ajax({
                url: "fetch_asset.php",
                method: "POST",
                data: {
                    id: id,
                    asset_name: asset_name,
                    asset_description: asset_description,
                    asset_cost: asset_cost





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
    $asset_name = $_POST['asset_name'];
    $asset_description = $_POST['asset_description'];
    $asset_cost = $_POST['asset_cost'];


    $lecrosoft = "UPDATE `asset` SET `asset_name`='$asset_name',`asset_description`='$asset_description',`asset_cost`='$asset_cost' WHERE `asset_id` = $id ";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = "asset.php"</script>';
    }
}
?><?php
