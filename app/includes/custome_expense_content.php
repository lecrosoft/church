  <table id="example-transation5" class="table display table-bordered table-striped" style="width:100%">
      <thead class="bg-gradient-primary text-white">
          <tr>

              <th>Ref_id</th>
              <th>Category</th>
              <th>Note</th>
              <th>Trans Date</th>
              <th>Pay Method</th>
              <th>Expense(₦)</th>
              <th>Entered By</th>
              <th>Created at</th>

              <th class="text-nowrap">Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
            selectExpenseByDate()
            ?>


      </tbody>
  </table>