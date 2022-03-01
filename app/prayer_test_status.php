               <div class="form-group">
                   <label>status</label>
                   <select name="status" id="" class="form-control form-select">
                       <option value="Active"><?php echo $status ?></option>

                       <?php
                        if ($status == 'Active') {
                            echo  "<option value='Closed'>Closed</option>";
                        } elseif ($status == 'Closed') {
                            echo  "<option value='Active'>Active</option>";
                        }
                        ?>


                   </select>
               </div>