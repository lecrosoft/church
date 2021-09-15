<?php
include('includes/head.php');
include('../connections/conn.php');
include('includes/function.php');

?>
<style>
    #uploadFile {
        display: block;
        visibility: hidden;
        width: 0;
        height: 0;
    }
</style>

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
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <h3 class="box-title m-b-0">Book List</h3>
                                            <p class="text-muted">this is the sample data here for crm</p>
                                        </div>
                                        <div class="col-sm-2">



                                            <div class="button-box">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Ebook</button>

                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel1">Add Ebook</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="ebook.php" method="POST" enctype="multipart/form-data">

                                                                <div class="form-group">
                                                                    <label for="book cover">Upload your book cover here</label>
                                                                    <input type="file" name="book_cover" class="form-control" placeholder="book cover">

                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>

                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="file" name="book_file" class="form-control" placeholder="book cover">

                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <input type="submit" name="submit_book" value="Submit" class="btn btn-success">
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>

                                    <!-- edit book -->

                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Ebook</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="ebook.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" id="book_id" value="">

                                                        <div class="form-group">
                                                            <label for="book cover">Upload your book cover here</label>
                                                            <img src="" id="image" id="img" />
                                                            <input type="file" name="book_cover" id="bookcover" class="form-control" placeholder="" value="">

                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="description" class="form-control" id="description" value=""></textarea>

                                                        </div>

                                                        <div class="form-group">
                                                            <div id="bookfile"></div>
                                                            <input type="file" name="book_file" id="uploadFile" title="Choose a video please" class="form-control" placeholder="book cover">

                                                        </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input type="submit" name="submit_book" value="Submit" class="btn btn-success">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="updateTable">
                                            <thead>
                                                <tr>

                                                    <th>Cover</th>
                                                    <th>Description</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $lecrosoft = "SELECT * FROM ebook ORDER BY book_id DESC";
                                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                                while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                                    $book_id = $row['book_id'];
                                                    $cover = $row['cover'];
                                                    $description = $row['description'];
                                                    $file = $row['file'];
                                                    echo "<tr>";
                                                    echo "<td><img src='img/books/cover/$cover' height='150px' width='150px'></td>";
                                                    echo "<td>$description</td>";
                                                    echo "<td class='text-nowrap'><a class='editbtn'  data-original-title='Edit' data-toggle='modal' data-target='#editModal' data-whatever='@mdo' ><input type='hidden' id='" . $cover . "' name='" . $description . "' value='" . $book_id . "''/><span id='" . $file . "'></span> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a href='ebook.php?del_id=$book_id'  data-toggle='tooltip' data-original-title='Delete'> <i class='far fa-trash-alt text-danger'></i> </a> </td>";
                                                    echo "</tr>";
                                                }


                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
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

                                <div class="">


                                    <?php
                                    if (isset($_POST['submit_book'])) {
                                        $book_cover = $_FILES['book_cover']['name'];
                                        $temp_name = $_FILES['book_cover']['tmp_name'];
                                        $folder = "img/books/cover/" . $book_cover;
                                        $description = $_POST['description'];
                                        $book_file = $_FILES['book_file']['name'];
                                        $temp_name_file = $_FILES['book_file']['tmp_name'];
                                        $folder_file = "img/books/book_files/" . $book_file;


                                        $lecrosoft = "INSERT INTO ebook (cover,description,file) VALUES ('$book_cover','$description','$book_file')";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);

                                        if ($query_lecrosoft) {
                                            if (move_uploaded_file($temp_name, $folder) and move_uploaded_file($temp_name_file, $folder_file)) {
                                                echo "file uploaded";
                                            }
                                        } else ("query error" . mysqli_error($con));
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
                                            <h3 class="box-title m-b-0">Edit Book</h3>
                                            <p class="text-muted"></p>
                                            <form action="ebook.php?update_id=<?php echo $cat_id ?>" method="POST">
                                                <div class="form-group">
                                                    <input type="text" name="category-title" class="form-control" placeholder="book cover">

                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="description" class="form-control" placeholder="Description">

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

            <script type="text/javascript">
                //$(document).on('click', '.editbtn', function() {
                //  let ebook = JSON.parse($(this).attr('ebook'));
                //console.log("check", ebook)
                // let ebook = JSON.parse($(this).attr('ebook'))
                // $('#book_id').val(ebook.book_id);
                //$('#bookcover').val(ebook.cover);
                //$('#description2').val(ebook.description);
                //$('#editModal').modal('show');
                // });
                $(document).ready(function() {
                    $(".editbtn").click(function() {
                        var book_id = $(this).find('input').attr('value').valueOf();
                        var cover = $(this).find('input').attr('id').valueOf();
                        var description = $(this).find('input').attr('name').valueOf();
                        var file = $(this).find('span').attr('id').valueOf();
                        console.log('file', file)
                        $("#book_id").val(book_id)
                        $("#description").val(description)
                        document.getElementById('bookfile').innerHTML = file;
                        var x = document.querySelector('#image');
                        x.setAttribute('src', 'img/books/cover/' + cover)
                        x.style.width = "200px"
                        x.style.height = "200px"

                        //document.getElementById('description').value = description

                    })

                    document.querySelector('#bookfile').addEventListener('click', function(e) {
                        var x = $('#uploadFile').click()
                        console.log(x)

                    });

                })
            </script>
            <!-- footer ends -->
</body>

</html>