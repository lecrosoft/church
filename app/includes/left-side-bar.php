<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse slimscrollsidebar">

        <ul class="nav" id="side-menu">

            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="user-pro">
                <a href="#" class="waves-effect"><img src="" alt="" class="img-circle"> <span class="hide-menu"><?php echo $_SESSION['last_name'] . " " . $_SESSION['first_name'] ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                    <li><a href="./logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>


            <!--<li class="nav-small-cap">--- POST</li>-->
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Appointment <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="pastor-schedule.php">Pastor Schedule</a> </li>
                    <!-- <li> <a href="book-appointment.html">Book Appointment</a> </li> -->
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Finance <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="income.php">Income</a> </li>
                    <li> <a href="expense.php">Expenses</a> </li>
                    <!-- <li> <a href="transaction.php">Income/Expense</a> </li> -->
                    <li> <a href="income_expenses.php">Income/Expense</a> </li>
                    <li> <a href="donation_campaign.php">Fund Raising</a> </li>
                    <li> <a href="asset.php">Asset</a> </li>

                </ul>
            </li>

            <li> <a href="family.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Family </span></a></li>

            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Pastors <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="pastors.php">All Pastors</a> </li>
                    <li> <a href="pastors.php?source=add-pastor">Add New Pastor</a> </li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Members <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="members.php">Manage Members</a> </li>
                    <li> <a href="members.php?source=add-member">Add New Member</a> </li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> First Timers <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="firsttimer.php">Manage First Timers</a> </li>
                    <li> <a href="firsttimer.php?source=add-firsttimer">Add New First timer</a> </li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Communication <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">SMS</a> </li>
                    <li> <a href="#">Email</a> </li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Attendance<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">Manage Attendance</a> </li>
                    <li> <a href="#">New Attendance</a> </li>

                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Payroll <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">Manage User</a> </li>
                    <li> <a href="#">Add New User</a> </li>

                </ul>
            </li>
            <li> <a href="department.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Department </span></a></li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Settings <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="#">General</a> </li>
                    <li> <a href="#">Family</a> </li>
                    <li> <a href="finance_category.php">Transaction Category</a> </li>
                    <li> <a href="donation_campaign.php">Donation Campaign</a> </li>


                </ul>
            </li>



            <!-- 
            <li class="nav-small-cap">--- FORUM</li>
            <li> <a href="forum-category.php" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Forum</span></a> </li>
            <li> <a href="widgets.php" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Widgets</span></a> </li> -->




    </div>
</div>