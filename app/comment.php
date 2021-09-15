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
                                    <h3 class="box-title m-b-0">CommentList</h3>
                                    <p class="text-muted">this is the list of the users that commented on posts</p>
                                    <div class="table-responsive">
                                        <table id="comment-table" class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Author</th>
                                                    <th>In response to</th>
                                                    <th>Comment </th>
                                                    <th>email</th>
                                                    <th>website</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $lecrosoft = "SELECT * FROM comment LEFT JOIN post ON comment.post_id = post.post_id";
                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {

                                                    $comment_id = $row['comment_id'];
                                                    $comment_author = $row['comment_author'];
                                                    $post_title = $row['post_title'];
                                                    $comment_content = $row['comment_content'];
                                                    $comment_email = $row['comment_email'];
                                                    $comment_website = $row['comment_website'];
                                                    $comment_date = $row['date'];
                                                    $comment_status = $row['comment_status'];
                                                    $post_id = $row['post_id'];

                                                    if ($comment_status == 'PENDING') {
                                                        $label_color = "label-info";
                                                    } elseif ($comment_status == 'APPROVED') {
                                                        $label_color = "label-success";
                                                    } elseif ($comment_status == 'REJECTED') {
                                                        $label_color = "label-danger";
                                                    } else {
                                                        $label_color = "";
                                                    }
                                                    echo "<tr>";

                                                    echo "<td>$comment_author</td>";
                                                    echo "<td><a href='../post.php?post_id=$post_id'> $post_title </a></td>";
                                                    echo "<td>$comment_content</td>";
                                                    echo "<td>$comment_email </td>";
                                                    echo "<td>$comment_website</td>";
                                                    echo "<td>$comment_date</td>";
                                                    echo "<td><div class='label label-table $label_color'> $comment_status</div></td>";
                                                    echo "<td class='text-nowrap'><a href='comment.php?edit_id=$comment_id ' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a onClick=\"javascript: return confirm('Are you sure you want to delete this record?')\" href='comment.php?del_id=$comment_id'  data-toggle='tooltip' data-original-title='Delete'> <i class='far fa-trash-alt text-danger'></i> </a> </td>";
                                                    echo "</tr>";
                                                }

                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php
                            deleteComment();


                            ?>
                            <?php
                            if (isset($_GET['update_id'])) {
                                $update_id = $_GET['update_id'];
                                if (isset($_POST['category-title'])) {
                                    $category_title = $_POST['category-title'];
                                    $update_id = $_GET['update_id'];
                                    $sql = "UPDATE `blog_category` SET `category_title`= '$category_title' WHERE `category_id`=$update_id ";
                                    $sql_query = mysqli_query($con, $sql);
                                    if (!$sql_query) {
                                        die("QUERY ERROR" . mysqli_error($con));

                                        //header('location: category.php');

                                    } else {
                                        echo '<script type="text/javascript">location="category.php"</script>';
                                    }
                                }
                            }

                            ?>
                            <?php

                            if (isset($_POST['submit'])) {
                                if (isset($_POST['category-title'])) {
                                    $category_id = $_POST['category-title'];
                                    $sql = "INSERT INTO blog_category (category_title) VALUES ('$category_id')";
                                    $sql_query = mysqli_query($con, $sql);
                                    if ($sql_query) {
                                        recordSuccessMessage();
                                        //header('location: category.php');
                                        echo '<script type="text/javascript">location="category.php"</script>';
                                    }
                                }
                            }
                            ?>



                            <?php
                            if (isset($_GET['edit_id'])) {
                                $edit_id = $_GET['edit_id'];
                                $sql = "SELECT * FROM blog_category WHERE category_id = $edit_id";
                                $fetch_category_query = mysqli_query($con, $sql);
                                if (!$fetch_category_query) {
                                    die("QUERY ERROR" . mysqli_error($con));
                                }
                                while ($row = mysqli_fetch_assoc($fetch_category_query)) {
                                    $cat_id = $row['category_id'];
                                    $cat_title = $row['category_title'];

                            ?>
                                    <h3 class="box-title m-b-0">Edit Category</h3>
                                    <p class="text-muted"></p>
                                    <form action="category.php?update_id=<?php echo $cat_id ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="category-title" class="form-control" value='<?php echo "$cat_title" ?>'>

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