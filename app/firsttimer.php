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
                    case  "add-firsttimer":
                        include('includes/add_new_firsttmer.php');
                        break;
                    case "edit":
                        include('includes/edit_members.php');
                        break;
                    case "view":
                        include('includes/view_member.php');
                        break;

                    default:
                        include('includes/view_all_firsttimers.php');
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
            <script>
                $(document).ready(function() {
                    $(".add-member").click(function() {


                        // let xhr = new XMLHttpRequest();
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

                        $.ajax({
                            url: "add_members.php",
                            method: "post",
                            data: {
                                fname: fname,
                                lname: lname,
                                gender: gender,
                                dob: dob,
                                stateoforigin: stateoforigin,
                                marstatus: marstatus,
                                empstatus: empstatus,
                                bptdate: bptdate,
                                jobtype: jobtype,
                                address: address,
                                city: city,
                                state: state,
                                email: email,
                                country: country,
                                phoneone: phoneone,
                                phonetwo: phonetwo,
                                fb_id: fb_id,
                                linkdn: linkdn,
                                family: family,
                                department: department,
                                title: title





                            },
                            success: function(data) {
                                Swal.fire(
                                    'Success!',
                                    'User added successfully?',
                                    'success'
                                );
                                console.log(data);
                                location = "members.php";

                            }
                        })


                        // xhr.open("GET", `add_members.php?fname=${fname}&& lname=${lname}&& gender=${gender}&& dob=${dob}&& stateoforigin=${stateoforigin}&& marstatus=${marstatus}&& empstatus=${empstatus}
                        // && bptdate=${bptdate}&& jobtype=${jobtype}&& title=${title}&& address=${address}&& city=${city}&& state=${state}&& email=${email}&& country=${country}
                        // && phoneone=${phoneone}&& phonetwo=${phonetwo}&& fb_id=${fb_id}&& linkdn=${linkdn}&& family=${family}&& department=${department}`, true);
                        // xhr.onload = function() {
                        //     if (xhr.status = 200) {
                        //         console.log(xhr.responseText);
                        //         swal("Record Sussfully Added", ".");
                        //     }
                        // }
                        // xhr.send();


                        // swal("Record Sussfully Added", ".");


                    })
                })
            </script>


            <!--Style Switcher -->
            <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>