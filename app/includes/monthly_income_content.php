 <div class="headings text-center mb-2">
     <h5>Monthly Income Report</h5>
 </div>
 <br>
 <br>
 <div class="container">
     <div class="">

         <form action="" method="post" class="text-center" style="padding-top:0px;padding-left:4rem;padding-right: 4rem;">
             <div class="row">
                 <div class="form-group px-2 col-md-3">
                     <label for=""> by transaction category</label>
                     <select name="" id="transaction_cat" class="form-select form-control">

                         <option value="all">All</option>

                         <?php
                            $lecrosoft = "SELECT * FROM income_expence_category WHERE type ='income'";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                extract($row);
                                echo "<option value='$id'>$category_name</option>";
                            }
                            ?>


                     </select>
                 </div>



                 <div class="form-group px-2 col-md-3">
                     <label for="">by payment method</label>
                     <select name="" id="payment_mtd" class="form-select form-control">

                         <option value="all">All</option>
                         <?php
                            $lecrosoft = "SELECT * FROM payment_method";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                extract($row);
                                echo "<option value='$id'>$payment_method</option>";
                            }
                            ?>

                     </select>
                 </div>
                 <div class="form-group px-2 col-md-3">
                     <label for="">By Month</label>
                     <select class="form-control form-select month" id="selectedMonth">
                         <option value="<?php echo date('m') ?>"><?php echo date('F') ?></option>
                         <?php
                            $lecrosoft  = "SELECT * FROM months";
                            $query_leccrosoft = mysqli_query($con, $lecrosoft);
                            while ($row = mysqli_fetch_assoc($query_leccrosoft)) {
                                extract($row);
                                echo "<option value='$id'>$month_name</option>";
                            }
                            ?>

                     </select>

                 </div>

                 <div class="form-group px-2 col-md-3 col-sm-12">
                     <label for="">By Year</label>

                     <input type="text" id="datepicker_year3" class="form-control year selectedYear" value='<?php echo date("Y") ?>'>
                 </div>
             </div>
         </form>
     </div>
 </div>

 <!-- content  -->

 <div class="example container">
     <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->

 </div>

 <div class="row d-flex justify-content-between px-3">
     <div class="sm-10">

         <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
     </div>
     <div class="sm-2">


     </div>
 </div>
 <div class="table-responsive table-data-filter-fetch">

     <table id="example-transation" class="table display table-bordered table-striped" style="width:100%">
         <thead class="bg-gradient-primary text-white">
             <tr>

                 <th>Ref_id</th>
                 <th>Category</th>
                 <th>Note</th>
                 <th>Trans Date</th>
                 <th>Pay Method</th>
                 <th>Income(₦)</th>
                 <th>Entered By</th>
                 <th>Created at</th>

                 <th class="text-nowrap">Action</th>
             </tr>
         </thead>
         <tbody>
             <?php
                selectIncomeByMonth()
                ?>


         </tbody>
     </table>
 </div>