<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>The Glory Of God Prayer and Power Ministry</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="" method="POST">
                    <?php include('../connections/conn.php'); ?>


                    <a href="javascript:void(0)" class="text-center db"><img src="../plugins/images/eliteadmin-logo-dark.png22" alt="THE GLORY OF GOD CHURCH" />
                        <br /><img src="../plugins/images/eliteadmin-text-dark.png22" alt="GGPPM" /></a>

                    <?php
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $username = mysqli_real_escape_string($con, $username);
                        $password = mysqli_real_escape_string($con, $password);

                        if (!empty($username) && !empty($password)) {
                            $lecrosoft = "SELECT * FROM members WHERE username = '$username'";
                            $query_lecrosoft = mysqli_query($con, $lecrosoft);

                            $row = mysqli_fetch_assoc($query_lecrosoft);
                            $db_username = $row['username'];
                            $db_first_name = $row['first_name'];
                            $db_last_name = $row['last_name'];
                            $db_email = $row['email'];
                            $db_password = $row['password'];
                            $db_user_role = $row['user_role'];
                        }

                        if ($username = $db_username && $password = $db_password && $db_user_role == "Admin") {

                            $_SESSION['username'] = $db_username;
                            $_SESSION['first_name'] = $db_first_name;
                            $_SESSION['last_name'] = $db_last_name;
                            $_SESSION['password'] = $db_password;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['user_role'] = $db_user_role;
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
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="login" type="subbmit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>