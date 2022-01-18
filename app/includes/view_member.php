<div class="row bg-title">


    <!-- /row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="">

                <p class="text-muted m-b-20">

                </p>

                <div class="table-responsive">
                    <table id="member-table" class="table table-striped toggle-circle table-hover">
                        <thead>
                            <tr>
                                <th data-toggle="true">Title</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>phone</th>
                                <th>DOB</th>
                                <th>Departments</th>
                                <th>Status</th>
                                <th>Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lecrosoft = "SELECT * FROM members ORDER BY last_name DESC";
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
                                $realdate = date("d M Y", strtotime($date_of_birth));
                                echo "<tr>";
                                echo "<td>$title</td>";
                                echo "<td>$last_name</td>";
                                echo "<td>$first_name</td>";
                                echo "<td>$phone_number_one</td>";
                                echo "<td> $realdate </td>";
                                echo "<td>$department</td>";
                                echo " <td>
                            <span class='label label-table label-danger'>$status</span>
                        </td>";
                                echo " <td class='text-nowrap'><a href='members.php?source=view&&id=$member_id' data-toggle='tooltip' data-original-title='View'> <i class='fa  fa-eye text-inverse m-r-10'></i> </a> <a href='members.php?source=edit&&id=$member_id' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a href='members.php?del_id=$member_id' data-toggle='tooltip' data-original-title='Delete'> <i class='fa  fa-trash-o text-danger'></i> </a> </td>";


                                echo "</tr>";
                            };

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- .right-sidebar -->