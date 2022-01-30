<?php
include('../connections/conn.php');
session_start();
?>
<?php $member_id = $_SESSION['member_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

?>
<form method="POST">
    <div class="form-group mb-3">

        <label for="">Campaign<span class="text-danger">*</span></label>
        <select class="form-select form-control" name="campaign" required>
            <?php
            if (isset($_POST['cp_id'])) {
                $campaign_id_selected = $_POST['cp_id'];
            }

            ?>

            <?php
            $lecrosoft = "SELECT * FROM campaign WHERE campaign_id = $campaign_id_selected";
            $query_lecrosoft = mysqli_query($con, $lecrosoft);
            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                extract($row);
                echo " <option value='$campaign_id'>$campaign</option >";
            }

            ?>


        </select>


    </div>
    <div class="form-group mb-3">
        <label for="">Note<span class="text-danger"></span></label>
        <textarea id="" cols="30" rows="10" class="form-control" name="note"></textarea>

    </div>

    <div class="form-group mb-3">
        <label hidden for="">Pledge by<span class="text-danger">*</span></label>
        <select hidden class="form-select form-control select2" required name="pledge_by" style="width:100%;padding:2rem;height:300px !important">

            <option value="<?php echo $member_id ?>"><?php echo "$first_name" . " " . "$last_name"  ?></option>



        </select>


    </div>
    <div class="form-group mb-3">
        <label for="">Amount<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

    </div>
    <div class="form-group mb-3">
        <label for="">Pledge Date<span class="text-danger">*</span></label>
        <input type="date" class="form-control" name="pdate" required>

    </div>
    <div class="form-group mb-3">
        <label for="">Pledge due Date<span class="text-danger">*</span></label>
        <input type="date" class="form-control" name="pduedate" required>

    </div>



    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">Save changes</button>
    </div>
</form>