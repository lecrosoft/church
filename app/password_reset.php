<!DOCTYPE html>
<html lang="en">

<?php include('../connections/conn.php'); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>The Glory of God Church</title>
    <link rel="manifest" href="manifest.webmanifest" />
    <!-- 
    for calender -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />

    <!-- data tables -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <!-- Buttons -->
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=c6b24f8a56e04fcee6105a02f4027462.css" rel="stylesheet" type="text/css"> <!-- endinject -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- second css -->


    <link rel="stylesheet" href="css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/church_single_logo.png" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- summernote -->

    <link rel="stylesheet" href="summernote/summernote-bs4.css" />

    <!-- select2 -->

    <link rel="stylesheet" href="select2/css/select2.min.css" />




    <!-- 
    for calender -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->








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
                            if (isset($_GET['Get_email'])) {
                                $email_inputed = $_GET['Get_email'];
                            }
                            ?>
                            <h4>Password Reset</h4>
                            <!-- <h6 class="font-weight-light">Pls provide the email used in signing up.</h6> -->
                            <form class="pt-3" method="POST">


                                <?php
                                if (isset($_POST['next'])) {

                                    $input_email = $_POST['email'];

                                    $lecrosoft = "SELECT email FROM members";
                                    $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                    $row = mysqli_fetch_assoc($query_lecrosoft);

                                    $db_email = $row['email'];


                                    if ($input_email == $db_email) {
                                        echo '<script type="text/javascript"> location = "password_reset" </script>';
                                    } else {
                                        echo '<div class="alert alert-danger" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Failed!</strong>
   There is no Existing User for this mail.
</div>';
                                    }
                                }
                                ?>

                                <div class="form-group">
                                    <label for="" hidden>Email Inputed</label>
                                    <input type="email" id="EmailImputed" hidden class="form-control form-control-lg" required="" value="<?php echo $email_inputed ?>">
                                    <div class="new_password_message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Enter new password</label>
                                    <input type="password" autocomplete="off" id="new_password" class="form-control form-control-lg" required="" placeholder="Enter your Prefered password">
                                    <div class="new_password_message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm password</label>
                                    <input type="password" autocomplete="off" id="confirm_password" class="form-control form-control-lg" required="" placeholder="Enter your Prefered again">
                                    <div class="confirm_password_message"></div>
                                </div>


                                <div class="mt-3">
                                    <input type="submit" id="password_verify_button" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="submit" value="SUBMIT">
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

    <?php include('includes/external_js.php') ?>

    <script>
        $(document).ready(function() {
            $('#password_verify_button').click(function(e) {
                e.preventDefault()


                let inputedMail = $('#EmailImputed').val();
                let new_password = $('#new_password').val();
                let confirm_password = $('#confirm_password').val();

                if (new_password == '') {
                    $('.new_password_message').html(`<p class="text-danger">This field can not be empty</p>`);
                } else if (new_password !== '') {
                    $('.new_password_message').html(``)
                }
                if (confirm_password == '') {
                    $('.confirm_password_message').html(`<p class="text-danger">This field can not be empty</p>`);
                } else if (confirm_password !== '') {
                    $('.confirm_password_message').html(``)
                }

                if (new_password !== '' && confirm_password !== '' && new_password == confirm_password) {
                    $(this).val('...PROCCESING');
                    $.ajax({
                        url: "update_reset_password.php",
                        method: "POST",
                        data: {
                            new_password: new_password,
                            inputedMail: inputedMail
                        },
                        success: function(data) {
                            if (data == "updated") {
                                $('#password_verify_button').val('SUCCESS ');
                                Swal.fire({
                                        icon: 'success',
                                        title: 'successful',
                                        text: 'Your password has been reset successfully, an email has been sent to you containing your password.You can proceed to log in with your new password',

                                    })
                                    .then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "login.php"
                                        }
                                    })

                            } else(
                                Swal.fire({
                                    icon: 'danger',
                                    title: 'successful',
                                    text: 'Failed',

                                })
                            )
                        }
                    })
                } else if (new_password != confirm_password) {
                    $('.confirm_password_message').html(`<p class="text-danger">Password does not match with the one above pls make sure your input is the same as above</p>`);
                }

            })



        })
    </script>
</body>

</html>