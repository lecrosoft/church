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
                            }
                            ?>
                            <h4>Password Reset</h4>
                            <h6 class="font-weight-light">Pls provide the email used in signing up.</h6>
                            <form action="" class="pt-3">


                                <?php
                                // if (isset($_POST['input_email'])) {

                                //     $input_email = $_POST['input_email'];

                                //     $lecrosoft = "SELECT email FROM members WHERE email = '$input_email'";
                                //     $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                //     $row = mysqli_fetch_assoc($query_lecrosoft);

                                //     $db_email = $row['email'];


                                //     if ($input_email == $db_email) {
                                //         echo "EmailMatched";
                                //     } else {
                                //         echo '<div class="alert alert-danger" id="success-alert">
                                //         <button type="button" class="close" data-dismiss="alert">x</button>
                                //         <strong>Failed!</strong>
                                //         There is no Existing User for this mail.
                                //         </div>';
                                //     }
                                // }
                                ?>
                                <div class="error_message"></div>
                                <div class="form-group">
                                    <input type="email" id='email' class="form-control form-control-lg" required="" placeholder="Enter your email">
                                    <div class="email_message"></div>
                                </div>


                                <div class="mt-3">
                                    <input type="submit" id="mail_verify_button" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="next" value="NEXT">
                                </div>
                                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook </button>
                </div> -->

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



    <script>
        $(document).ready(function() {

            $('#mail_verify_button').click(function(e) {
                e.preventDefault();

                let input_email = $('#email').val();

                if (input_email == '') {
                    $('.email_message').html(`<p class="text-danger">This field can not be empty</p>`);
                } else {

                    $.ajax({
                        url: "verify_password.php",
                        method: "POST",
                        data: {
                            input_email: input_email
                        },
                        success: function(data) {


                            if (data == "EmailMatched") {
                                location = `password_reset?Get_email=${input_email}`;
                            } else {
                                $('.error_message').html(`<div class="alert alert-danger" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Failed!</strong>
                                        There is no Existing User for this mail.
                                        </div>`)
                            }
                        }
                    })
                }

            })


        })
    </script>
</body>

</html>