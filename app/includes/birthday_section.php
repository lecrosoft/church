        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Birthday Celebrants</h4>

                        <div class="panel panel-default">

                            <div class="panel-body">
                                <ul class="nav nav-pills m-b-30 ">
                                    <li class="active nav-item"> <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Today Celebrants</a> </li>
                                    <li class="nav-item"> <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">This Week Celebrant</a> </li>
                                    <li class="nav-item"> <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">This Month</a> </li>
                                </ul>
                                <div class="tab-content br-n pn">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE day(current_date)=day(date_of_birth) && month(current_date)= month(date_of_birth)";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);
                                            if ($count_celebrant == 0) {
                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-warning container  alert-dismissible fade show' role='alert'><strong></strong> We have no birthday celebrants today.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                                // echo "<H2> We have no Birthday Celebrants Today </H2>";
                                            } else {
                                            ?>







                                                <!-- <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants Today</H2> -->

                                            <?php
                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-success container  alert-dismissible fade show' role='alert'><strong>Hurray!!</strong> We have $count_celebrant birthday celebrant(s) today.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                            }
                                            ?>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fullname</th>
                                                        <th>Email</th>
                                                        <th>DOB</th>


                                                        <th>ACTION</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                        extract($row);
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<img src='assets/images/users/$photo' class='mr-2' alt='image' />" .
                                                            "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " 
                                        </td>";
                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
                                                                <button type='button' class='btn btn-outline-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                Message
                                                                </button>
                                                                <div class='dropdown-menu'>
                                                                    <a class='dropdown-item' href='#'>SMS</a>
                                                                    <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
                                                                    <a class='dropdown-item' href='#'>Email</a>
                                                                
                                                                </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE YEARWEEK(date_of_birth)= YEARWEEK(NOW())";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);

                                            if ($count_celebrant == 0) {

                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-warning container  alert-dismissible fade show' role='alert'><strong></strong> We have no birthday celebrants this Week.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                            } else {
                                            ?>

                                                <!-- <H2>Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants This Week</H2> -->
                                            <?php
                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-success container  alert-dismissible fade show' role='alert'><strong>Hurray!!</strong> We have $count_celebrant birthday celebrant(s) this Week.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                            }
                                            ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fullname</th>
                                                        <th>Email</th>
                                                        <th>DOB</th>


                                                        <th>ACTION</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                        extract($row);
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<img src='assets/images/users/$photo' class='mr-2' alt='image' />" .
                                                            "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " 
                                        </td>";
                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
                                                                <button type='button' class='btn btn-outline-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                Message
                                                                </button>
                                                                <div class='dropdown-menu'>
                                                                    <a class='dropdown-item' href='#'>SMS</a>
                                                                    <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
                                                                    <a class='dropdown-item' href='#'>Email</a>
                                                                
                                                                </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                    <div id="navpills-3" class="tab-pane">
                                        <div class="row sales-report">
                                            <?php
                                            $lecrosoft = "SELECT * FROM members WHERE month(current_date)= month(date_of_birth)";
                                            $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                            $count_celebrant = mysqli_num_rows($query_lecrosoft);
                                            if ($count_celebrant == 0) {
                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-warning container  alert-dismissible fade show' role='alert'><strong></strong> We have no birthday  celebrants this Month.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                            } else {
                                            ?>
                                                <!-- <H4 class="text-center">Hurray!! We Have <span class="text-success"><?php echo $count_celebrant ?></span> Celebrants This month</H4> -->
                                            <?php
                                                echo "<br><br><div  style='width:100%' class='alert text-center mt-2 alert-success container  alert-dismissible fade show' role='alert'><strong>Hurray!!</strong> We have $count_celebrant birthday celebrant(s) this Month.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
                                            }
                                            ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fullname</th>
                                                        <th>Email</th>
                                                        <th>DOB</th>


                                                        <th>ACTION</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                        extract($row);
                                                        $date = date('d M', strtotime($date_of_birth));

                                                        echo "<tr>";
                                                        echo "<td>" . "<img src='assets/images/users/$photo' class='mr-2' alt='image' />" .
                                                            "<a href='#'>" . $first_name . ' ' . $last_name . "</a>" . " 
                                        </td>";

                                                        echo "<td>$email</td>";
                                                        echo "<td> $date </td>";
                                                        echo "<td><div class='btn-group'>
                                                                    <button type='button' class='btn btn-outline-success btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                    Message
                                                                    </button>
                                                                    <div class='dropdown-menu'>
                                                                        <a class='dropdown-item' href='#'>SMS</a>
                                                                        <a class='dropdown-item' href='https://wa.me/+234$phone_number_one?text=happy birthday to $first_name'>Whatsapp</a>
                                                                        <a class='dropdown-item' href='#'>Email</a>
                                                                    
                                                                    </div></td>";
                                                        echo "<tr>";
                                                    }
                                                    ?>









                                                    </tr>






                                                </tbody>
                                            </table> <a href="#">Check all celebrants</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <h4 class="card-title">Today Birthday Celebrants</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Assignee</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Tracking ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image" />
                                            David Grey
                                        </td>
                                        <td>Fund is not recieved</td>
                                        <td>
                                            <label class="badge badge-gradient-success">DONE</label>
                                        </td>
                                        <td>Dec 5, 2017</td>
                                        <td>WD-12345</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image" />
                                            Stella Johnson
                                        </td>
                                        <td>High loading time</td>
                                        <td>
                                            <label class="badge badge-gradient-warning">PROGRESS</label>
                                        </td>
                                        <td>Dec 12, 2017</td>
                                        <td>WD-12346</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image" />
                                            Marina Michel
                                        </td>
                                        <td>Website down for one week</td>
                                        <td>
                                            <label class="badge badge-gradient-info">ON HOLD</label>
                                        </td>
                                        <td>Dec 16, 2017</td>
                                        <td>WD-12347</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image" />
                                            John Doe
                                        </td>
                                        <td>Loosing control on server</td>
                                        <td>
                                            <label class="badge badge-gradient-danger">REJECTED</label>
                                        </td>
                                        <td>Dec 3, 2017</td>
                                        <td>WD-12348</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>