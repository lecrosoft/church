   <!-- .row -->

   <!-- .col -->
   <div class="row">

       <?php
        $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'pastor'";
        $query_lecrosoft = mysqli_query($con, $lecrosoft);
        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
            extract($row);

        ?>




           <div class="col-md-4 stretch-card grid-margin">
               <div class="card bg-gradient-primary card-img-holder text-white">
                   <div class="card-body">

                       <div class="image_div mb-5 text-white">
                           <img class="rounded-circle img-circle img-responsive img-center" src="assets/images/users/<?php echo $photo ?>" alt="" style="width:200px; height:200px">
                       </div>


                       <h4 class="font-weight-normal mb-3" style="text-transform:uppercase">
                           <?php echo "$last_name" . " " . " $first_name " ?>
                           <a class="text-white" href="pastors.php?source=pastor-profile&id=<?php echo $member_id ?>"><i class="mdi mdi-eye mdi-24px float-right"></i></a>
                       </h4>

                       <a <?php echo $hidden ?> id="<?php echo $member_id ?>" style="cursor:pointer" class="text-white delete_pastor"><i class="mdi mdi-delete-forever mdi-24px float-right"></i></a>
                       <!-- <h2 class="mb-2">₦ <?php ?></h2> -->
                       <h6 class="card-text">Position: <?php echo $position_title ?></h6>
                   </div>
               </div>
           </div>




       <?php
        }
        ?>

   </div>