<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">First timers</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="" target="_blank" class="
                  btn btn-danger
                  pull-right
                  m-l-20
                  btn-rounded btn-outline
                  hidden-xs hidden-sm
                  waves-effect waves-light
                ">Main Website</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#"></a></li>
            <li class="active">First Timers</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0"></h3>
            <p class="text-muted m-b-20">

            </p>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped toggle-circle table-hover">
                    <thead>
                        <tr>

                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Address</th>
                            <th>Phone number</th>
                            <th>Referred by</th>
                            <th>Date of visit</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lecrosoft = "SELECT * FROM first_timers ORDER BY first_timmer_id DESC";
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
                            echo "<td>$last_name</td>";
                            echo "<td>$first_name</td>";
                            echo "<td>$address</td>";
                            echo "<td>$phone_number</td>";
                            echo "<td> $reffered_by_member </td>";
                            echo "<td>$date_of_visit</td>";
                            echo "<td>$email</td>";
                            echo " <td>
                            <span class='label label-table label-danger'>$status</span>
                        </td>";
                            echo " <td class='text-nowrap'><a href='firsttimer.php?source=view&&id=$first_timmer_id' data-toggle='tooltip' data-original-title='View'> <i class='fa  fa-eye text-inverse m-r-10'></i> </a> <a href='firsttimer.php?source=edit&&id=$first_timmer_id' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a href='members.php?del_id=$first_timmer_id' data-toggle='tooltip' data-original-title='Delete'> <i class='fa  fa-trash-o text-danger'></i> </a> </td>";


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