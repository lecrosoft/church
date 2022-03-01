<!-- /row -->
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0"></h3>
            <p class="text-muted m-b-20">

            </p>

            <div class="table-responsive">
                <table id="firsttimer_table" class="table table-striped toggle-circle table-hover">
                    <thead>
                        <tr class="bg-gradient-primary text-white">

                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Address</th>
                            <th>Phone number</th>

                            <th>Date of visit</th>
                            <th>Email</th>

                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lecrosoft = "SELECT * FROM first_timers WHERE status='visitor' ORDER BY first_timmer_id DESC";
                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                            extract($row);
                            // $title = $row['title'];
                            //$first_name = $row['first_name'];
                            //$last_name = $row['last_name'];
                            //$family = $row['family'];
                            //$title = $row['title'];
                            //$title = $row['title'];
                            //$title = $row['title'];
                            //$status = $row['status'];
                            $realdate = date("d M Y", strtotime($date_of_visit));
                            echo "<tr>";
                            echo "<td>$last_name</td>";
                            echo "<td>$first_name</td>";
                            echo "<td>$address</td>";
                            echo "<td>$phone_number</td>";

                            echo "<td>$date_of_visit</td>";
                            echo "<td>$email</td>";

                            echo " <td class='text-nowrap'><a id='$first_timmer_id' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-message text-success m-r-10'></i> </a> <a href='firsttimer.php?source=edit&&id=$first_timmer_id' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-lead-pencil text-warning m-r-10'></i> </a> <a class='delete_first_timer' id='$first_timmer_id' data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete text-danger'></i> </a> </td>";


                            echo "</tr>";
                        };

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- .right-sidebar -->