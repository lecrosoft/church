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
                        <h4 class="page-title">Welcome <span> <?php echo $_SESSION['username'] ?> </span></h4>
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


                <!-- INCOME AND EXPENSES REPORT -->

                <!-- row -->

                <!-- /.row -->
                <!-- INCOME AND EXPENSES REPORT -->
                <form action="">
                    <input type="text" class="name" placeholder="Enter name">
                    <input type="text" class="class" placeholder="Enter class">
                    <select name="" id="" class="gender">
                        <option value="">select gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>

                    <button type="button" id="btn" class="btn btn-success">add</button>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>FULLNAME</th>
                                <th>CLASSS</th>
                                <th>GENDER</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </form>



                <!-- RECENT COMMENT BOX -->


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

        <script>
            $('#btn').click(function() {
                var name = $('.name').val();
                var classr = $('.class').val();
                var gender = $('.gender').val();
                var tr = '<tr><td>' + '<input type="text" value='
                name '>' + '</td> <td>' + classr + '</td> <td>' + gender + '</td></tr>';

                $('tbody').append(tr);
            })
        </script>
</body>

</html>