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
                            <li class="active">Dashboard</li>
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
                                            <h3 class="box-title m-b-0">Asset</h3>
                                            <p class="text-muted">this is the sample data here for crm</p>
                                        </div>
                                        <div class="sm-2">
                                            <button class="btn btn-primary add-family">Add New Asset</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Asset Name</th>
                                                    <th>Description</th>
                                                    <th>Estimated Cost</th>

                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                selectAsset();
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
                            <h5 class="modal-title">Asset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="asset_content">

                        </div>


                    </div>
                </div>
            </div>
            <!-- ADD ASSET -->
            <div id="dataModal2" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Asset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label for="">Asset Name</label>
                                    <input type="text" class="form-control" name="asset_name" placeholder="Enter Asset Name" required>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter description" required>

                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Estimated Cost</label>
                                    <input type="number" class="form-control" name="cost" placeholder="Enter asset Cost" required>

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
            if (isset($_POST['del_fam_id'])) {
                $del_fam_id = $_POST['del_fam_id'];
                $lecrosoft = "DELETE FROM family WHERE family_id =$del_fam_id";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                if ($query_lecrosoft) {
                    echo '<script type="text/javascript">location = "family.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                }
            }
            ?>

            <?php
            if (isset($_POST['add'])) {



                $asset_name = $_POST['asset_name'];

                $description = $_POST['description'];
                $cost = $_POST['cost'];


                $lecrosoft = "INSERT INTO `asset`(`asset_name`, `asset_description`, `asset_cost`) VALUES ('$asset_name','$description','$cost')";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                if ($query_lecrosoft) {
                    echo '<script type="text/javascript">location = "asset.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
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
                        var asset_id = $(this).attr("id");
                        $.ajax({
                            url: "fetch_asset.php",
                            method: "post",
                            data: {
                                asset_id: asset_id,


                            },
                            success: function(data) {
                                // console.log('mydata', data)
                                $("#asset_content").html(data);
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



            <script>
                $(document).ready(function() {
                    $('.delete-alert').click(function(e) {
                        e.preventDefault();
                        let id = $(this).attr("id");
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $.ajax({
                                    url: "family.php",
                                    method: "post",
                                    data: {
                                        del_fam_id: id
                                    },
                                    success: function(data) {

                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        location = "/church/app/family.php"
                                        console.log(location)



                                    }
                                });


                            }
                        })
                    })
                })
                // const flashdata = $('.flash-data').data('flashdata')
                // if (flashdata) {
                //     Swal.fire(
                //         'Deleted!',
                //         'Your file has been deleted.',
                //         'success'
                //     )
                // }
            </script>




</body>

</html>