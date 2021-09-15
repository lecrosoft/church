<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Foo Tables</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="" target="_blank" class="
                  btn btn-danger
                  pull-right
                  m-l-20
                  btn-rounded btn-outline
                  hidden-xs hidden-sm
                  waves-effect waves-light
                ">Buy Now</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Foo Tables</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Row Toggler</h3>
            <p class="text-muted m-b-20">
                Create your table with Toggle Footable
            </p>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped toggle-circle table-hover">
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