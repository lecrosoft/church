   <div class="row bg-title">
       <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
           <h4 class="page-title">Pastors</h4>
       </div>
       <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
           <ol class="breadcrumb">
               <li><a href="#">pastor</a></li>
               <li class="active">all</li>
           </ol>
       </div>
       <!-- /.col-lg-12 -->
   </div>
   <!-- .row -->
   <div class="row">
       <!-- .col -->


       <?php
        $lecrosoft = "SELECT * FROM members  LEFT JOIN position ON members.position_id = position.position_id  WHERE user_type  = 'pastor'";
        $query_lecrosoft = mysqli_query($con, $lecrosoft);
        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
            extract($row);

        ?>
           <div class="col-md-4 col-sm-4">
               <div class="white-box">
                   <div class="row">
                       <div class="col-md-4 col-sm-4 text-center">
                           <a href="contact-detail.html"><img src="../assets/uploads/pastors/<?php echo $photo ?>" alt="user" class="img-circle img-responsive"></a>
                       </div>
                       <div class=" col-md-8 col-sm-8">
                           <a href="pastors.php?source=pastor-profile&id=<?php echo $member_id ?>">
                               <h3 class="box-title m-b-0"><?php echo $last_name . ' ' . $first_name ?></h3> <small><?php echo $position_title ?></small>
                               <p>
                                   <address>
                                       795 Folsom Ave, Suite 600 San Francisco, CADGE 94107<br /><br />
                                       <abbr title="Phone">P:</abbr> <?php echo $phone_number_one ?>
                                   </address>
                                   <div class="d-flex ">
                                       <button class="btn btn-success btn-sm">View</button>
                                       <button class="btn btn-warning btn-sm">Message</button>
                                       <button class="btn btn-danger btn-sm">Delete</button>
                                   </div>
                               </p>
                       </div>
                   </div>
               </div>
           </div>
       <?php
        }

        ?>


   </div>