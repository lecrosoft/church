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
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../index.php" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard Online users <span class="useronline"></span>
                            </li>
                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class=" ti-pencil-alt bg-megna"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM post";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $post_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $post_count; ?></h4> <span class="text-muted">Total Posts</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="  ti-comments bg-info"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM comment";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $comment_count = mysqli_num_rows($query_lecrosoft);
                                ?>

                                <div class="bodystate">
                                    <h4><?php echo $comment_count; ?></h4> <span class="text-muted">Total comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class=" ti-book bg-success"></i>

                                <?php
                                $lecrosoft = "SELECT * FROM ebook";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $ebook_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $ebook_count; ?></h4> <span class="text-muted">Total Ebooks.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-user bg-inverse"></i>
                                <?php
                                $lecrosoft = "SELECT * FROM users";
                                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                $user_count = mysqli_num_rows($query_lecrosoft);
                                ?>
                                <div class="bodystate">
                                    <h4><?php echo $user_count; ?></h4> <span class="text-muted">Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- RECENT COMMENT BOX -->

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Comments</h3>
                            <div class="comment-center">
                                <?php
                                $lecrosoft = "SELECT * FROM comment LEFT JOIN post ON comment.post_id = post.post_id ORDER BY comment_id DESC LIMIT 4 ";
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
                                ?>

                                    <div class="comment-body" style="width:100%">
                                        <!-- <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div> -->
                                        <div class="mail-contnet">

                                            <h5><?php echo $comment_author ?></h5> <span class="mail-desc"><?php echo $comment_content ?></span> <span class="label label-rouded <?php echo  $label_color ?>"><?php echo $comment_status ?></span><a href="" class="action_disapproved"><input type="hidden" value='<?php echo $comment_id ?>'><i class="ti-close text-danger"></i></a> <a href="" class="action_approved"><input type="hidden" value='<?php echo $comment_id ?>'><i class="ti-check text-success"></i></a><span class="time pull-right"><?php echo date('M d,Y', strtotime($comment_date)) ?></span>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent subscribers
                                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>March 2017</option>
                                        <option>April 2017</option>
                                        <option>May 2017</option>
                                        <option>June 2017</option>
                                        <option>July 2017</option>
                                    </select>
                                </div>
                            </h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>TOTAL SUBSCRIBERS</h2>
                                    <p>Check all the subscribers</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20">30</h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>EMAIL</th>
                                            <th>ACTION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">lecrosoft@gmail.com</td>
                                            <td class="txt-oflo"><a class="btn btn-success">SEND MAIL</a></td>


                                        </tr>






                                    </tbody>
                                </table> <a href="#">Check all the sales</a>
                            </div>
                        </div>
                    </div>
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
        <script type="text/javascript">
            $(document).ready(function() {
                var comment_id
                $(".mail-contnet").on('click', function(e) {
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    //approve(comment_id)


                })

                $(".action_approved").on('click', function(e) {
                    e.preventDefault()
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    update(comment_id, 'APPROVED')
                })
                $(".action_disapproved").on('click', function(e) {
                    e.preventDefault()
                    var comment_id = $(this).find('input').attr('value').valueOf();
                    update(comment_id, 'REJECTED')

                })


                function update(id, state) {


                    $.ajax({
                        url: "comment_status.php",
                        method: 'post',
                        data: {
                            id: id,
                            state: state
                        },
                        success: function(data) {
                            if (data === "Success") {
                                window.location = '/educate/admin/index.php'
                            } else {
                                alert('An Error Occurred');
                            }
                        },
                        error: function(obj, status, err) {
                            console.log('Error', err)
                        }
                    })

                }
            })
        </script>
        <script>

        </script>
</body>

</html>