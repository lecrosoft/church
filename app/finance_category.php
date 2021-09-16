<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

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
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome Admin</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Finance transaction categories</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <?php

                    ?>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div class="row d-flex justify-content-between px-3">
                                        <div class="sm-10">
                                            <h3 class="box-title m-b-0">Finance transaction categories</h3>
                                            <p class="text-muted">this is the sample data here for crm</p>
                                        </div>
                                        <div class="sm-2">
                                            <button class="btn btn-primary add-family">New transaction category</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Description</th>

                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                selectTransactionCategory();
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                            deleteFamily();
                            ?>

                            <?php

                            addFamily();


                            ?>


                        </div>


                        <!-- /.row -->
                    </div>
                </div>
                <!-- .right-sidebar -->
                <?php
                include('includes/right-side-bar.php');
                ?>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <!-- footer begins -->

            <div id="dataModal" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Family Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="family_content">

                        </div>


                    </div>
                </div>
            </div>
            <!-- ADD FAMILY -->
            <div id="dataModal2" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Family Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="fname" placeholder="Enter Family Name" required>

                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="fleader" placeholder="Enter Family Leader " required>

                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="fquantity" placeholder="Enter Family Quantity" required>

                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="fcontact" placeholder="Enter Contact">

                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address">

                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="jtime" placeholder="Enter Join Time">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['add'])) {



                $fname = $_POST['fname'];

                $fleader = $_POST['fleader'];
                $fquantity = $_POST['fquantity'];
                $fcontact = $_POST['fcontact'];
                $address  = $_POST['address'];
                $jtime = $_POST['jtime'];
                if (!empty($fname)) {
                    $lecrosoft = "INSERT INTO family(family_name,family_leader,family_quantity,family_contact,address,join_date) VALUES ('$fname','$fleader',$fquantity,'$fcontact','$address','$jtime')";
                    $query_lecrosoft = mysqli_query($con, $lecrosoft);
                    if ($query_lecrosoft) {
                        echo '<script type="text/javascript">location = "family.php"</script>';
                    } else {
                        die("QUERY ERROR" . mysqli_error($con));
                        recordDangerMessage();
                    }
                }
            }
            ?>
            <?php
            include('includes/footer.php');
            ?>
            <!-- footer ends -->
            <script>
                $(document).ready(function() {
                    $(".view_data").click(function() {
                        var family_id = $(this).attr("id");
                        $.ajax({
                            url: "fetch_family.php",
                            method: "post",
                            data: {
                                family_id: family_id,


                            },
                            success: function(data) {
                                // console.log('mydata', data)
                                $("#family_content").html(data);
                                $('#dataModal').modal("show");

                            },
                            error: function(obj, status, err) {
                                console.log(err)
                            }
                        });


                    });




                });
            </script>
            <script>
                $(document).ready(function() {
                    $('.add-family').click(function() {
                        $('#dataModal2').modal("show");
                    })
                })
            </script>




</body>

</html>