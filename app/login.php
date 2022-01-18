<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php include('../connections/conn.php'); ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>The Glory Of God Prayer and Power Ministry </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid  page-body-wrapper full-page-wrapper">
      <div class="content-wrapper bg-gradient-primary d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/church_logo.png">
              </div>

              <?php
              if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $email = mysqli_real_escape_string($con, $email);
                $password = mysqli_real_escape_string($con, $password);

                if (!empty($email) && !empty($password)) {
                  $lecrosoft = "SELECT * FROM members WHERE email = '$email'";
                  $query_lecrosoft = mysqli_query($con, $lecrosoft);

                  $row = mysqli_fetch_assoc($query_lecrosoft);
                  $db_member_id = $row['member_id'];
                  $db_username = $row['username'];
                  $db_first_name = $row['first_name'];
                  $db_last_name = $row['last_name'];
                  $db_email = $row['email'];
                  $db_password = $row['password'];
                  $db_user_role = $row['user_role'];
                  $db_photo = $row['photo'];
                }
                // $email == $db_email && $password == $db_password && $db_user_role == "Admin"
                if ($email == $db_email && $password == $db_password) {

                  $_SESSION['member_id'] = $db_member_id;
                  $_SESSION['username'] = $db_username;
                  $_SESSION['first_name'] = $db_first_name;
                  $_SESSION['last_name'] = $db_last_name;
                  $_SESSION['password'] = $db_password;
                  $_SESSION['email'] = $db_email;
                  $_SESSION['user_role'] = $db_user_role;
                  $_SESSION['photo'] = $db_photo;
                  echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Login  successfull.
</div>';
                  echo '<script type="text/javascript">location = "index.php"</script>';
                } else {
                  echo '<div class="alert alert-danger" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Failed!</strong>
   Login failed.
</div>';
                }
              }
              ?>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" required="" name="email" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" required="" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="ssets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>