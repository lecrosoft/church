<!DOCTYPE html>
<html lang="en">
<?php include('../connections/conn.php'); ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>The Glory Of God Prayer and Power Ministry</title>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper bg-gradient-primary d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/church_logo.png">
              </div>


              <?php
              if (isset($_POST['sign_up'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];



                $firstname = mysqli_real_escape_string($con, $firstname);
                $lastname = mysqli_real_escape_string($con, $lastname);
                $email = mysqli_real_escape_string($con, $email);
                $password = mysqli_real_escape_string($con, $password);

                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                if (!empty($email) and !empty($password)) {
                  $lecrosoft = "SELECT * FROM members WHERE email ='$email'";

                  $query_lecrosoft = mysqli_query($con, $lecrosoft);

                  $row = mysqli_fetch_assoc($query_lecrosoft);

                  $existing_db_email = $row['email'];



                  if ($email == $existing_db_email) {
                    echo '<div class="alert alert-warning" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Failed!</strong>
   An account with this email already Exists!
</div>';
                  } else {
                    $sql = "INSERT INTO `members`(`first_name`, `last_name`, `email`,  `password`) VALUES ('$firstname','$lastname','$email','$password_hash')";

                    $query_sql = mysqli_query($con, $sql) or die(mysqli_error($con));

                    echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Failed!</strong>
   You have successfully signup.Pls use your credentials to Login!
</div>';

                    echo '<script type="text/javascript">location = "login.php"</script>';
                  }
                }
              }

              ?>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form method="POST" class="pt-3">
                <div class="form-group">
                  <input type="text" name="firstname" class="form-control form-control-lg" id="" placeholder="Firstname" required>
                </div>
                <div class="form-group">
                  <input type="text" name="lastname" class="form-control form-control-lg" id="" placeholder="surname" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="" placeholder="Email" required>
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" name="sign_up" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
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
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>