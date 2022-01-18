     <div class="table-responsive mt-4">
         <table id="" class="table table-striped toggle-circle table-hover">
             <thead>
                 <tr>


                     <th>Full Name</th>

                     <th>Phone number</th>

                     <th>Date of visit</th>


                     <th>Actions</th>


                 </tr>
             </thead>
             <tbody>
                 <?php
                    $lecrosoft = "SELECT * FROM first_timers WHERE asign_to = $member_id AND status='visitor' ORDER BY first_timmer_id DESC";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                        extract($row);
                        // $title = $row['title'];
                        //$first_name = $row['first_name'];
                        //$last_name = $row['last_name'];
                        //$family = $row['family'];
                        //$title = $row['title'];
                        //$title = $row['title'];
                        //$title = $row['title'];
                        //$status = $row['status'];
                        $realdate = date("d M Y", strtotime($date_of_visit));
                        echo "<tr>";
                        echo "<td>$last_name $first_name</td>";


                        echo "<td>$phone_number</td>";

                        echo "<td>$date_of_visit</td>";

                        //                     echo " <td>
                        //     <span class='label label-table label-danger'>$status</span>
                        // </td>";
                        echo "<td><div class='btn-group'>
                                                    <button type='button' class='btn btn-gradient-primary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Message
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='#'>SMS</a>
                                                        <a class='dropdown-item' href='https://wa.me/+2347060934005?text=happy birthday to $first_name'>Whatsapp</a>
                                                        <a class='dropdown-item' href='#'>Email</a>
                                                    
                                                    </div></td>";


                        echo "</tr>";
                    };

                    ?>

             </tbody>
         </table>
     </div>