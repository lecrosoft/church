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
                            <div class="col-sm-6">
                                <div class="white-box">
                                    <h3 class="box-title m-b-0"> Forum List</h3>
                                    <p class="text-muted">this is the sample data here for crm</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Forum</th>
                                                    <th>Forum Img</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                selectForumCategory();

                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                deleteForumCategory();


                                ?>
                                <?php
                                if (isset($_GET['update_id'])) {
                                    $update_id = $_GET['update_id'];
                                    if (isset($_POST['category-title'])) {
                                        $category_title = $_POST['category-title'];
                                        $category_img = $_POST['category-img'];
                                        $update_id = $_GET['update_id'];
                                        $sql = "UPDATE `forum_category` SET `forum_cat_title`= '$category_title', `forum_category_img`='$category_img' WHERE `id`=$update_id ";
                                        $sql_query = mysqli_query($con, $sql);
                                        if (!$sql_query) {
                                            die("QUERY ERROR" . mysqli_error($con));

                                            //header('location: category.php');

                                        } else {
                                            echo '<script type="text/javascript">location="forum-category.php"</script>';
                                        }
                                    }
                                }

                                ?>
                                <?php

                                if (isset($_POST['submit'])) {
                                    if (isset($_POST['forum-category-title'])) {
                                        $category_title = $_POST['forum-category-title'];
                                        $category_img = $_POST['forum_category_img'];
                                        $sql = "INSERT INTO forum_category (forum_cat_title,forum_category_img) VALUES ('$category_title ','$category_img')";
                                        $sql_query = mysqli_query($con, $sql);
                                        if ($sql_query) {
                                            recordSuccessMessage();
                                            //header('location: category.php');
                                            echo '<script type="text/javascript">location="forum-category.php"</script>';
                                        }
                                    }
                                }
                                ?>

                                <div class="white-box">
                                    <h3 class="box-title m-b-0">Add Forum</h3>
                                    <p class="text-muted"></p>
                                    <form action="forum-category.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="forum-category-title" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="forum_category_img" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Add" class="btn btn-success">
                                        </div>
                                    </form>


                                    <?php
                                    if (isset($_GET['edit_id'])) {
                                        $edit_id = $_GET['edit_id'];
                                        $sql = "SELECT * FROM forum_category WHERE id = $edit_id";
                                        $fetch_category_query = mysqli_query($con, $sql);
                                        if (!$fetch_category_query) {
                                            die("QUERY ERROR" . mysqli_error($con));
                                        }
                                        while ($row = mysqli_fetch_assoc($fetch_category_query)) {
                                            $cat_id = $row['id'];
                                            $cat_title = $row['forum_cat_title'];
                                            $cat_img = $row['forum_category_img'];

                                    ?>
                                            <h3 class="box-title m-b-0">Edit Forum Category</h3>
                                            <p class="text-muted"></p>
                                            <form action="forum-category.php?update_id=<?php echo $cat_id ?>" method="POST">
                                                <div class="form-group">
                                                    <input type="text" name="category-title" class="form-control" value='<?php echo "$cat_title" ?>'>

                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="category-img" class="form-control" value='<?php echo "$cat_img" ?>'>

                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="update" value="Update" class="btn btn-success">
                                                </div>
                                            </form>
                                    <?php
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
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
            <?php
            include('includes/footer.php');
            ?>
            <!-- footer ends -->
</body>

</html>