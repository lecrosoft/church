 <div class="row grid-margin">
     <div class="col-md-3 col-sm-6">
         <div class="counter_display">
             <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-multiple bg-gradient-primary p-4 rounded-circle counter_icon"></i>
                 <?php
                    $lecrosoft = "SELECT * FROM family";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $family_count = mysqli_num_rows($query_lecrosoft);
                    ?>
                 <div class="bodystate">
                     <h4><?php echo $family_count; ?></h4> <span class="text-muted">Families</span>
                 </div>

             </div>
         </div>
     </div>
     <div class="col-md-3 col-sm-6">
         <div class="counter_display">
             <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-check bg-gradient-success p-4 rounded-circle counter_icon"></i>
                 <?php
                    $lecrosoft = "SELECT * FROM members WHERE user_type  = 'member'";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $members_count = mysqli_num_rows($query_lecrosoft);
                    ?>

                 <div class="bodystate">
                     <h4><?php echo $members_count; ?></h4> <span class="text-muted">Members</span>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-md-3 col-sm-6">
         <div class="counter_display">
             <div class="r-icon-stats icon_div"> <i class=" mdi mdi-arrow-expand-all bg-gradient-danger p-4 rounded-circle counter_icon"></i>

                 <?php
                    $lecrosoft = "SELECT * FROM department";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $department_count = mysqli_num_rows($query_lecrosoft);
                    ?>
                 <div class="bodystate">
                     <h4><?php echo $department_count; ?></h4> <span class="text-muted">Departments.</span>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-md-3 col-sm-6">
         <div class="counter_display">
             <div class="r-icon-stats icon_div"> <i class="mdi mdi-account-multiple bg-gradient-warning p-4 rounded-circle counter_icon"></i>
                 <?php
                    $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'pastor'";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    $user_count = mysqli_num_rows($query_lecrosoft);
                    ?>
                 <div class="bodystate">
                     <h4><?php echo $user_count; ?></h4> <span class="text-muted">Pastors</span>
                 </div>
             </div>
         </div>
     </div>
 </div>