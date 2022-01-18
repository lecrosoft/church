 <?php

    use GuzzleHttp\Psr7\Request;


    include('../../connections/conn.php');
    sleep(1);


    ?>
 <?php
    if (isset($_POST['attendanceDate']) && isset($_POST['departmentId']) && isset($_POST['attendanceType'])) {
        $attendanceDate = $_POST['attendanceDate'];
        $departmentId = $_POST['departmentId'];
        $attendanceType = $_POST['attendanceType'];




        $lecrosoft = "SELECT * FROM department_member LEFT JOIN members ON department_member.member_id = members.member_id LEFT JOIN department_position ON department_member.department_position_id = department_position.department_position_id WHERE department_id = $departmentId";

        $query_lecrosoft = mysqli_query($con, $lecrosoft);

        // $count = mysqli_num_rows($query_lecrosoft);


    ?>
     <table class="table table-bordered mytable">
         <thead>
             <tr class="bg-gradient-primary text-white">

                 <th>Member id</th>
                 <th>Full Name</th>
                 <th>Phone Number</th>
                 <th>Email</th>
                 <th>
                     <div class="form-check form-check-flat form-check-primary">
                         <label class="form-check-label">
                             <input type="checkbox" class="form-check-input"> Select All </label>
                     </div>
                 </th>

             </tr>
         </thead>
         <tbody>

             <?php




                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                    extract($row);
                    echo "<tr>";
                    echo "<td name='member_id_array[]' class='member_id_array'>$member_id</td>";

                    echo "<td>$first_name  $last_name</td>";
                    echo "<td>$phone_number_one</td>";
                    echo "<td>$email</td>";

                    echo "<td>" . " <div class='form-check form-check-flat form-check-primary mt-1 py-1'>" .
                        "<label class='form-check-label'>" .
                        " <input type='checkbox' id='$member_id'  name='check_box_array' class='form-check-input attendance_check_box'>" . " </label>" .
                        "</div>" . "</td>";
                    echo "</tr>";
                }

                ?>

         </tbody>
     </table>
 <?php
    }
    ?>

 <input type="submit" id="mark_attendance.btn" name="mark_attendance" class="btn btn-gradient-primary mt-4" value="Submit">






 </body>
 <?php include('../includes/external_js.php'); ?>


 <!-- <script>
     $(document).ready(function() {
         $('#mark_attendance.btn').click(function() {
             // e.preventDefault();

             alert('good')

         })

     })
 </script> -->

 </html>