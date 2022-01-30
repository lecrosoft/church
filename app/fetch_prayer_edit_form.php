<?php
include('../connections/conn.php');
if (isset($_POST['prayerId'])) {

    $prayerId = $_POST['prayerId'];
    $lecrosoft = "SELECT * FROM `prayer_request` WHERE prayer_request_id = $prayerId";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);

    $row = mysqli_fetch_assoc($query_lecrosoft);
    extract($row);
}
?>
<form method="POST">



    <div class="form-group mb-3">
        <select id="p_status" class="form-control form-select">
            <option value="<?php echo $status ?>"><?php echo $status ?></option>

            <?php
            if ($status == 'Active') {
                echo "<option value='Closed'>Close </option>";
            } elseif ($status == 'Closed') {
                echo "<option value='Active'>Active </option>";
            } else {
                echo "<option value=''> Select Satus </option>";
            }
            ?>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update" id="<?php echo $prayerId ?>">Save changes</button>
    </div>
</form>






<script>
    $(document).ready(function() {
        $('.update').click(function(e) {
            e.preventDefault();

            let prayerIdToSend = $(this).attr('id');
            let prayerStatus = $('#p_status').val();
            alert(prayerIdToSend + ' ' + prayerStatus);
            $.ajax({
                url: "update_prayer_edit_form.php",
                method: "post",
                data: {
                    prayerIdToSend: prayerIdToSend,
                    prayerStatus: prayerStatus

                },
                success: function(data) {
                    location = window.location.href;

                }
            })

        })
    })
</script>