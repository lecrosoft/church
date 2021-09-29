 <?php
    include('../../connections/conn.php');
    include('function.php');
    ?>
 <div class="table-responsive">
     <table id="example-transation" class="display nowrap" style="width:100%">
         <thead>
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
                selectTransactionIncome();
                ?>


         </tbody>
     </table>
 </div>