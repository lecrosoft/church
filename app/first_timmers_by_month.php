<?php
include('../connections/conn.php');
if (isset($_POST['visitMonth'])) {

    $visitMonth = $_POST['visitMonth'];
?>

    <?php
    $lecrosoft = "SELECT * FROM first_timers WHERE status='visitor' AND month(date_of_visit) = $visitMonth AND year(date_of_visit) = year(current_date) ORDER BY first_timmer_id DESC";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
    $count = mysqli_num_rows($query_lecrosoft);
    if ($count > 0) {
    ?>
        <table id="" class="table table-striped toggle-circle table-hover">
            <thead>
                <tr>


                    <th>Full Name</th>

                    <th>Phone number</th>

                    <!-- <th>Date of visit</th> -->


                    <th>Actions</th>


                </tr>
            </thead>
            <tbody>
            <?php
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
                echo "<td>$last_name $first_name</td>";


                echo "<td>$phone_number</td>";

                // echo "<td>$date_of_visit</td>";

                //                     echo " <td>
                //     <span class='label label-table label-danger'>$status</span>
                // </td>";
                echo "<td><div class='btn-group'>
                                                    <button type='button' class='btn btn-gradient-primary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Message
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='#'>SMS</a>
                                                        <a class='dropdown-item' href='https://wa.me/+2347060934005?text=happy birthday to $first_name'>Whatsapp</a>
                                                        <a class='dropdown-item' href='#'>Email</a>
                                                    
                                                    </div></td>";


                echo "</tr>";
            };
        } else {


            echo  ' <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
             <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  </svg>
            <div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <div>
     &nbsp;Opps! We there are no visitors in this month.
  </div>
</div>';
        }


            ?>

            </tbody>
        </table>
    <?php
}
    ?>