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
                  <h3 class="box-title m-b-0">Category List</h3>
                  <p class="text-muted">this is the sample data here for crm</p>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Category Title</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        selectCategory();

                        ?>


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <?php
                deleteCategory();


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

                <div class="white-box">
                  <h3 class="box-title m-b-0">Add Category</h3>
                  <p class="text-muted"></p>
                  <form action="category.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="category-title" class="form-control">

                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" value="Add" class="btn btn-success">
                    </div>
                  </form>


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