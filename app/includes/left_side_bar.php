  <?php
    $hidden = "";
    if ($_SESSION['user_role'] == 'member') {
        $hidden = 'hidden';
    }

    ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
          <li class="nav-item nav-profile">
              <a href="my_profile.php?id=<?php echo $_SESSION['member_id'] ?>" class="nav-link">
                  <div class="nav-profile-image">
                      <img src="assets/images/users/<?php echo $_SESSION['photo'] ?>" alt="profile" />
                      <span class="login-status online"></span>
                      <!--change to offline or busy as needed-->
                  </div>
                  <div class="nav-profile-text d-flex flex-column">
                      <span class="font-weight-bold mb-2"><?php echo $_SESSION['last_name'] . " " . $_SESSION['first_name'] ?></span>
                      <span class="text-secondary text-small"><?php echo $_SESSION['user_role'] ?></span>
                  </div>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
              </a>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" href="family.php">
                  <span class="menu-title">Family</span>
                  <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#events" aria-expanded="false" aria-controls="members">
                  <span class="menu-title">Events</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-check menu-icon"></i>
              </a>
              <div class="collapse" id="events">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="events.php">All Events</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="my_events.php">My Events</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="add_event.php">Add New Event</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="add_event.php" <?php echo $hidden ?>>All Applicant</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="add_event.php" <?php echo $hidden ?>>Add Applicant</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="member_pledge.php">
                  <span class="menu-title">Make a Pledge</span>
                  <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
          </li>



          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#wallet" aria-expanded="false" aria-controls="members">
                  <span class="menu-title">My Wallet</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-check menu-icon"></i>
              </a>
              <div class="collapse" id="wallet">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="events.php">Payment History</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="events.php">Pending Payment</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="fund_wallet.php">Fund Wallet</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#prayer-request" aria-expanded="false" aria-controls="members">
                  <span class="menu-title">Prayer Request</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-check menu-icon"></i>
              </a>
              <div class="collapse" id="prayer-request">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="prayer_request.php">Manage your Prayer requests</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="add_prayer_request.php">Add New request</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#testimonial" aria-expanded="false" aria-controls="members">
                  <span class="menu-title">Testimonies</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-check menu-icon"></i>
              </a>
              <div class="collapse" id="testimonial">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="prayer_request.php">All Testimonies</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="add_prayer_request.php">Share New Testimony</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" data-toggle="collapse" href="#members" aria-expanded="false" aria-controls="members">
                  <span class="menu-title">Members</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-check menu-icon"></i>
              </a>
              <div class="collapse" id="members">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="members.php">Manage Members</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="members.php?source=add-member">Add New Member</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Finance</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-wallet menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="income.php">Income</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="expense.php">Expenses</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="income_expenses.php">Income Vs Expense</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="donation_campaign.php">Fund Raising</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="asset.php">Asset</a>
                      </li>
                  </ul>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pastor" aria-expanded="false" aria-controls="pastor">
                  <span class="menu-title">Pastors</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-convert menu-icon"></i>
              </a>
              <div class="collapse" id="pastor">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="pastors.php">All Pastors</a>
                      </li>
                      <li class="nav-item">
                          <a <?php echo $hidden ?> class="nav-link" href="pastors.php?source=add-pastor">Add New Pastor</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" data-toggle="collapse" href="#first-timer" aria-expanded="false" aria-controls="first-timer">
                  <span class="menu-title">First Timers</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-star menu-icon"></i>
              </a>
              <div class="collapse" id="first-timer">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="firsttimer.php">Manage First Timers</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="firsttimer.php?source=add-firsttimer">Add New First timer</a>
                      </li>


                  </ul>
              </div>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" data-toggle="collapse" href="#communication" aria-expanded="false" aria-controls="communication">
                  <span class="menu-title">Communication</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-message-reply-text menu-icon"></i>
              </a>
              <div class="collapse" id="communication">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="sms.php">SMS</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="email.php">Email</a>
                      </li>


                  </ul>
              </div>
          </li>

          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" href="department.php">
                  <span class="menu-title">Departments</span>
                  <i class="mdi mdi-arrow-expand-all menu-icon"></i>
              </a>
          </li>
          <li class="nav-item" <?php echo $hidden ?>>
              <a class="nav-link" data-toggle="collapse" href="#attendance" aria-expanded="false" aria-controls="attendance">
                  <span class="menu-title">Attendance</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-checkbox-marked menu-icon"></i>
              </a>
              <div class="collapse" id="attendance">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="attendance_type.php">Attendance Type</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="browse_attendance.php">Browse Attendance</a>
                      </li>


                  </ul>
              </div>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#payroll" aria-expanded="false" aria-controls="payroll">
                  <span class="menu-title">Pay roll</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-currency-usd menu-icon"></i>
              </a>
              <div class="collapse" id="payroll">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="sms.php">SMS</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="ty.php">Email</a>
                      </li>


                  </ul>
              </div>
          </li> -->
          <!-- <li class="nav-item">
              <a class="nav-link" href="announcement.php">
                  <span class="menu-title">Announcement</span>
                  <i class="mdi mdi-bell-ring menu-icon"></i>
              </a>
          </li> -->


          <li class="nav-item sidebar-actions" <?php echo $hidden ?>>
              <span class="nav-link">
                  <div class="border-bottom">
                      <!-- <h6 class="font-weight-normal mb-3">Projects</h6> -->
                  </div>
                  <button class="btn btn-block btn-lg btn-gradient-primary text-center mt-4">
                      + Add a New Branch
                  </button>
                  <div class="mt-4">
                      <div class="border-bottom">
                          <p class="text-secondary">Settings</p>
                      </div>
                      <!-- <ul class="gradient-bullet-list mt-4">
                          <li>Free</li>
                          <li>Pro</li>
                      </ul> -->
                  </div>
              </span>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="suggestion_box.php">
                  <span class="menu-title">Suggestion Box</span>
                  <i class="mdi mdi-home menu-icon"></i>
              </a>
          </li>
      </ul>
  </nav>