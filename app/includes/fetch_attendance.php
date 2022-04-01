 <?php

    use GuzzleHttp\Psr7\Request;


    include('../../connections/conn.php');



    ?>
 <?php
    if (isset($_POST['attendanceDate']) && isset($_POST['departmentId']) && isset($_POST['attendanceType'])) {
        $attendanceDate = $_POST['attendanceDate'];
        $departmentId = $_POST['departmentId'];
        $attendanceType = $_POST['attendanceType'];




        $lecrosoft = "SELECT * FROM department_member LEFT JOIN members ON department_member.member_id = members.member_id LEFT JOIN department_position ON department_member.department_position_id = department_position.department_position_id WHERE department_id = $departmentId";

        $query_lecrosoft = mysqli_query($con, $lecrosoft);

        // $count = mysqli_num_rows($query_lecrosoft);

        echo json_decode($row = mysqli_fetch_assoc($query_lecrosoft));


    ?>

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