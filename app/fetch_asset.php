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
        <input type="text" class="form-control" id="fname" value='<?php echo $asset_name ?>'>

    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="fleader" value='<?php echo $asset_description ?>'>

    </div>

    <div class="form-group mb-3">
        <input type="text" class="form-control" id="fquantity" value='<?php echo $asset_cost ?>'>

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
            let fname = document.getElementById("fname").value
            let fleader = document.getElementById("fleader").value
            let fquantity = document.getElementById("fquantity").value
            let fcontact = document.getElementById("fcontact").value
            let address = document.getElementById("address").value
            let status = document.getElementById("status").value
            let jtime = document.getElementById("jtime").value
            $.ajax({
                url: "fetch_family.php",
                method: "POST",
                data: {
                    id: id,
                    fname: fname,
                    fleader: fleader,
                    fquantity: fquantity,
                    fcontact: fcontact,
                    address: address,
                    status: status,
                    jtime: jtime




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
    $fname = $_POST['fname'];
    $fleader = $_POST['fleader'];
    $fquantity = $_POST['fquantity'];
    $fcontact = $_POST['fcontact'];
    $address  = $_POST['address'];
    $status = $_POST['status'];
    $jtime = $_POST['jtime'];

    $lecrosoft = "UPDATE `family` SET `family_name`='$fname',`family_leader`='$fleader',`family_quantity`='$fquantity',`family_contact`='$fcontact',`address`='$address',`status`='$status',`join_date`='$jtime' WHERE family_id = $id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    if ($query_lecrosoft) {
        echo '<script type="text/javascript">location = "family.php"</script>';
    }
}
?><?php
