 <table id="example-transation" class="display nowrap" style="width:100%">
     <thead>
         <tr class="bg-gradient-primary text-white">

             <th>Ref_id</th>
             <th>Category</th>
             <th>Note</th>
             <th>Trans Date</th>
             <th>Pay Method</th>
             <th>Expenses(₦)</th>
             <th>Entered By</th>
             <th>Created at</th>

             <th class="text-nowrap">Action</th>
         </tr>
     </thead>
     <tbody>
         <?php
            selectExpenseByMonth()
            ?>


     </tbody>
 </table>