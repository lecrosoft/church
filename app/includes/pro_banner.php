 <div class="row" id="proBanner">
     <div class="col-12">
         <span class="d-flex align-items-center purchase-popup">

             <?php
                date_default_timezone_set('Africa/Abidjan');
                $greetings = "";
                $hour = date('G') + 1;

                // echo $hour;

                if ($hour >= 0 && $hour <= 11) {
                    $greetings = "Good Morning";
                } elseif ($hour >= 12 && $hour <= 15) {
                    $greetings = "Good Afternoon";
                } elseif ($hour >= 16 && $hour <= 23) {
                    $greetings = "Good Evening";
                }


                ?>
             <p>
             <h4 class="page-title"><?php echo $greetings ?><span> <?php echo $_SESSION['first_name']  ?> </span></h4>
             </p>
             <a href="https://lecrosoft.com" target="_blank" class="btn download-button purchase-button ml-auto">Check for Updates</a>
             <i class="mdi mdi-close" id="bannerClose"></i>
         </span>
     </div>
 </div>