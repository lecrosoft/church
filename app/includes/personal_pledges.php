    <div class="table-responsive mt-4">

        <table id="example-transation7" class="display table table-striped nowrap" style="width:100%">


            <?php
            $sql = "SELECT * FROM `pledges` LEFT JOIN campaign ON pledges.campaign_id = campaign.campaign_id WHERE member_id = $member_id";
            $query_sql = mysqli_query($con, $sql);
            $count = mysqli_num_rows($query_sql);
            if ($count == 0) {
                echo "<h4 class='text-center'>No pledges records found for this user!</h4>";
            } else {

            ?>

                <thead>
                    <tr class="bg-gradient-primary">



                        <th>Campaign Title</th>
                        <th>Pledge Date</th>
                        <th>Amt Pledged(₦)</th>
                        <th>Due Date</th>
                        <th>Amt payed</th>
                        <th>Balance</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query_sql)) {
                    $member_id = $_GET['id'];
                    $campaign_id = $row['campaign_id'];
                    $campaign_name = $row['campaign'];
                    $pledge_date = $row['pledge_date'];
                    $amount = $row['amount'];
                    $pledge_due_date = $row['pledge_due_date'];
                    $ammount_paid = $row['ammount_paid'];
                    $status = $row['status'];

                    echo "<tr>";
                    echo "<td><a type='button' id='$campaign_id' class='pledge_details text-primary text-bold' style='cursor: pointer'>$campaign_name</a></td>";
                    echo "<input type ='hidden' class ='member_id' value ='$member_id'/>";

                    echo "<td>$pledge_date</td>";
                    echo "<td>$amount</td>";
                    echo "<td>$pledge_due_date</td>";
                    echo "<td>$ammount_paid</td>";
                    $balance = $amount - $ammount_paid;
                    echo "<td>$balance</td>";

                    echo "<td>$status </td>";
                    echo "</tr>";
                }
            }

                ?>
                </tbody>
        </table>
    </div>



    <!-- ============ Pledges history modal =========== -->

    <!-- Modal -->
    <div id="dataModal2" class="modal " tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title">Pledge payment history</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="pledges_payment_content">


                </div>


            </div>
        </div>
    </div>