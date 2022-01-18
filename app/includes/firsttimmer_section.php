        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">This Month First Timers</h4>


                            <div class="form-group" style="width:50%;">
                                <select class="form-control form-select pull-right row b-none">
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
                        </div>


                        <div class="table-responsive">
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
                                    $lecrosoft = "SELECT * FROM first_timers WHERE status='visitor' ORDER BY first_timmer_id DESC";
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

                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-white">Todo</h4>
                        <div class="add-items d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" />
                            <button class="
                          add
                          btn btn-gradient-primary
                          font-weight-bold
                          todo-list-add-btn
                        " id="add-task">
                                Add
                            </button>
                        </div>
                        <div class="list-wrapper">
                            <ul class="
                          d-flex
                          flex-column-reverse
                          todo-list todo-list-custom
                        ">

                                <?php
                                $LoggedInUserId = $_SESSION['member_id'];
                                $sql = "SELECT * FROM `todolist` WHERE member_id = $LoggedInUserId";
                                $query_sql = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($query_sql)) {
                                    extract($row);


                                ?>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" /> <?php echo $task ?>

                                            </label>
                                        </div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>


                                <?php
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>