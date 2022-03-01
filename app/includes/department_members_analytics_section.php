 <div class="row grid-margin">


     <div class="col-md-3 col-sm-6">
         <a href="department_member.php?d_id=<?php echo $depart_id ?>">
             <div class="counter_display">
                 <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-check bg-gradient-success p-4 rounded-circle counter_icon"></i>
                     <?php
                        $lecrosoft = "SELECT * FROM department_member  WHERE department_id = $depart_id";

                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                        $count_members = mysqli_num_rows($query_lecrosoft);
                        ?>

                     <div class="bodystate">
                         <h4><?php echo $count_members; ?></h4> <span class="text-muted">Members</span>
                     </div>
                 </div>
             </div>
         </a>
     </div>
     <div class="col-md-3 col-sm-6">
         <a href="department_project.php?d_id=<?php echo $depart_id ?>">
             <div class="counter_display">
                 <div class="r-icon-stats icon_div"> <i class=" mdi mdi-arrow-expand-all bg-gradient-danger p-4 rounded-circle counter_icon"></i>

                     <?php

                        $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id ";

                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                        $count_project = mysqli_num_rows($query_lecrosoft);

                        ?>
                     <div class="bodystate">
                         <h4><?php echo $count_project; ?></h4> <span class="text-muted">Total Projects</span>
                     </div>
                 </div>
             </div>
         </a>
     </div>
     <div class="col-md-3 col-sm-6">
         <a href="department_open_project.php?d_id=<?php echo $depart_id ?>">
             <div class="counter_display">
                 <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-multiple bg-gradient-warning p-4 rounded-circle counter_icon"></i>
                     <?php
                        $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id and status != 'Completed' ";

                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                        $count_pending_project = mysqli_num_rows($query_lecrosoft);
                        ?>
                     <div class="bodystate">
                         <h4><?php echo $count_pending_project; ?></h4> <span class="text-muted">Open Projects</span>
                     </div>
                 </div>
             </div>
         </a>
     </div>

     <div class="col-md-3 col-sm-6">
         <a href="department_completed_project.php?d_id=<?php echo $depart_id ?>">
             <div class="counter_display">
                 <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-multiple bg-gradient-primary p-4 rounded-circle counter_icon"></i>
                     <?php
                        $lecrosoft = "SELECT * FROM `department_project` WHERE department_id = $depart_id and status = 'Completed' ";

                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                        $count_completed_project = mysqli_num_rows($query_lecrosoft);
                        ?>
                     <div class="bodystate">
                         <h4><?php echo $count_completed_project; ?></h4> <span class="text-muted">Completed Projects</span>
                     </div>

                 </div>
         </a>
     </div>
 </div>