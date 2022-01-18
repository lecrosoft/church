           <table id="example-transation3" class="table display table-bordered table-striped" style=" width:100%">
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
                    selectExpenseByYear()
                    ?>


               </tbody>
           </table>





           <!-- ADD INCOME -->
           <div id="dataModal2" class="modal" tabindex="-1">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header bg-success">
                           <h5 class="modal-title text-white">New Income Transaction</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body" id="">
                           <form method="POST">
                               <div class="form-group mb-3">

                                   <label for="">Transaction Category<span class="text-danger">*</span></label>
                                   <select class="form-select form-control" name="tcategory" required>
                                       <option value="">Select Transaction category</option>
                                       <?php
                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type = 'income' ";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$category_name</option>";
                                        }

                                        ?>


                                   </select>


                               </div>
                               <div class="form-group mb-3">
                                   <label for="">Note<span class="text-danger">*</span></label>
                                   <textarea id="" cols="30" rows="10" required class="form-control" name="note"></textarea>

                               </div>

                               <div class="form-group mb-3">
                                   <label for="">Payment Method<span class="text-danger">*</span></label>
                                   <select class="form-select form-control" required name="payment_method">
                                       <option value="">Select payment method</option>
                                       <?php
                                        $lecrosoft = "SELECT * FROM payment_method";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$payment_method</option>";
                                        }
                                        ?>


                                   </select>


                               </div>
                               <div class="form-group mb-3">
                                   <label for="">Amount<span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

                               </div>
                               <div class="form-group mb-3">
                                   <label for="">Transaction Date<span class="text-danger">*</span></label>
                                   <input type="date" class="form-control" id="" name="tdate" required>

                               </div>
                               <div class="form-group mb-3">
                                   <!-- <label for="" hiden>Entered By<span class="text-danger ">*</span></label> -->
                                   <input type="text" class="form-control" name="created_by" value="<?php echo $_SESSION['first_name'] . "  " . $_SESSION['last_name'] ?>" hidden>

                               </div>


                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                               </div>
                           </form>

                       </div>


                   </div>
               </div>
           </div>



           <!-- php code  -->

           <?php
            if (isset($_POST['add'])) {
                $tcategory = $_POST['tcategory'];
                $note = $_POST['note'];
                $payment_method = $_POST['payment_method'];
                $amount = $_POST['amount'];
                $tdate  = $_POST['tdate'];
                $created_by = $_POST['created_by'];

                $lecrosoft = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`,`entered_by`) VALUES ($tcategory,'$note','$tdate',$payment_method,'$amount','$created_by')";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                if ($query_lecrosoft) {
                    echo '<script type="text/javascript">location = location.href</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
                }
            }
            ?>