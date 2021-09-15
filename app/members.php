<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>

<?php

?>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div> -->
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php
        include('includes/top-nav.php');
        ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php
        include('includes/left-side-bar.php');
        ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = "";
                }

                switch ($source) {
                    case  "add-member":
                        include('includes/add_new_member.php');
                        break;
                    case "edit":
                        include('includes/edit_members.php');
                        break;
                    case "view":
                        include('includes/view_member.php');
                        break;

                    default:
                        include('includes/view_all_members.php');
                }
                ?>
                <!-- --right side bar--- -->
                <?php
                include('includes/right-side-bar.php');
                ?>

                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <?php
            include('includes/footer.php');

            ?>
            <script type="text/javascript">
                (function() {
                    $('#exampleBasic').wizard({
                        onFinish: function() {
                            swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                        }
                    });
                    $('#exampleBasic2').wizard({
                        onFinish: function() {
                            let xhr = new XMLHttpRequest();
                            let fname = document.getElementById("fname").value
                            let lname = document.getElementById("lname").value
                            let gender = document.getElementById("gender").value
                            let dob = document.getElementById("dob").value
                            let stateoforigin = document.getElementById("stateoforigin").value
                            let marstatus = document.getElementById("marstatus").value
                            let empstatus = document.getElementById("empstatus").value
                            let bptdate = document.getElementById("bptdate").value
                            let jobtype = document.getElementById("jobtype").value
                            // let photo = document.getElementById("photo").value
                            let address = document.getElementById("address").value
                            let city = document.getElementById("city").value
                            let state = document.getElementById("state").value
                            let email = document.getElementById("email").value
                            let country = document.getElementById("country").value
                            let phoneone = document.getElementById("phoneone").value
                            let phonetwo = document.getElementById("phonetwo").value
                            let fb_id = document.getElementById("fb_id").value
                            let linkdn = document.getElementById("likdn").value
                            let family = document.getElementById("family").value
                            let department = document.getElementById("department").value
                            let title = document.getElementById("title").value
                            // var fd = new FormData();
                            // fd.append('photo', $('#photo')[0].files[0]);


                            xhr.open("GET", `add_members.php?fname=${fname}&& lname=${lname}&& gender=${gender}&& dob=${dob}&& stateoforigin=${stateoforigin}&& marstatus=${marstatus}&& empstatus=${empstatus}
                            && bptdate=${bptdate}&& jobtype=${jobtype}&& title=${title}&& address=${address}&& city=${city}&& state=${state}&& email=${email}&& country=${country}
                            && phoneone=${phoneone}&& phonetwo=${phonetwo}&& fb_id=${fb_id}&& linkdn=${linkdn}&& family=${family}&& department=${department}`, true);
                            xhr.onload = function() {
                                if (xhr.status = 200) {
                                    console.log(xhr.responseText);
                                    swal("Record Sussfully Added", ".");
                                }
                            }
                            xhr.send();


                            // swal("Record Sussfully Added", ".");
                        }
                    });
                    $('#exampleValidator').wizard({
                        onInit: function() {
                            $('#validation').formValidation({
                                framework: 'bootstrap',
                                fields: {
                                    username: {
                                        validators: {
                                            notEmpty: {
                                                message: 'The username is required'
                                            },
                                            stringLength: {
                                                min: 6,
                                                max: 30,
                                                message: 'The username must be more than 6 and less than 30 characters long'
                                            },
                                            regexp: {
                                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                                message: 'The username can only consist of alphabetical, number, dot and underscore'
                                            }
                                        }
                                    },
                                    email: {
                                        validators: {
                                            notEmpty: {
                                                message: 'The email address is required'
                                            },
                                            emailAddress: {
                                                message: 'The input is not a valid email address'
                                            }
                                        }
                                    },
                                    password: {
                                        validators: {
                                            notEmpty: {
                                                message: 'The password is required'
                                            },
                                            different: {
                                                field: 'username',
                                                message: 'The password cannot be the same as username'
                                            }
                                        }
                                    }
                                }
                            });
                        },
                        validator: function() {
                            var fv = $('#validation').data('formValidation');
                            var $this = $(this);
                            // Validate the container
                            fv.validateContainer($this);
                            var isValidStep = fv.isValidContainer($this);
                            if (isValidStep === false || isValidStep === null) {
                                return false;
                            }
                            return true;
                        },
                        onFinish: function() {
                            $('#validation').submit();
                            swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                        }
                    });
                    $('#accordion').wizard({
                        step: '[data-toggle="collapse"]',
                        buttonsAppendTo: '.panel-collapse',
                        templates: {
                            buttons: function() {
                                var options = this.options;
                                return '<div class="panel-footer"><ul class="pager">' + '<li class="previous">' + '<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' + '</li>' + '<li class="next">' + '<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' + '<a href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' + '</li>' + '</ul></div>';
                            }
                        },
                        onBeforeShow: function(step) {
                            step.$pane.collapse('show');
                        },
                        onBeforeHide: function(step) {
                            step.$pane.collapse('hide');
                        },
                        onFinish: function() {
                            swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                        }
                    });
                })();
            </script>


            <!--Style Switcher -->
            <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>