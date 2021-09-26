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
                        <h4 class="page-title">Income/Expense</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="" target="_blank" class="
                  btn btn-danger
                  pull-right
                  m-l-20
                  btn-rounded btn-outline
                  hidden-xs hidden-sm
                  waves-effect waves-light
                ">Main Website</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Income</a></li>
                            <li class="active">Expense</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="d-flex">

                                <div class="col-sm-8">

                                    <code>Income/Expense</code>
                                </div>
                                <div class="col-sm-4">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            New Transaction
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item add-income" href="#">Income</a>
                                            <a class="dropdown-item add-expense" href="#">Expense</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <section class="m-t-40">
                                <div class="sttabs tabs-style-linebox">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="#section-linebox-5"><span>Income</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-linebox-4"><span>Expense</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-linebox-2"><span>Analytics</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-linebox-3"><span>Income/Expense</span></a>
                                            </li>
                                            <li>
                                                <a href="#section-linebox-5"><span>Settings</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="content-wrap text-center">
                                        <section id="section-linebox-1">
                                            <h3>Best Clean Tab ever</h3>
                                            <div class="example container">
                                                <!-- 
                                                <p class="text-muted m-b-20">just add id <code>#date-range</code> to create it.</p> -->
                                                <div class="input-daterange input-group" id="date-range">
                                                    <span class="input-group-addon bg-info b-0 text-white">From</span> <input type="text" class="form-control" id="datepicker" name="start" /> <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                    <input type="text" class="form-control" id="datepicker" name="end" /><button id="search_btn" class="input-group-addon btn bg-info b-0 text-white">Go</button>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-between px-3">
                                                <div class="sm-10">

                                                    <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                </div>
                                                <div class="sm-2">


                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example-transation" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>

                                                            <th>Ref_id</th>
                                                            <th>Category</th>
                                                            <th>Note</th>
                                                            <th>Trans Date</th>
                                                            <th>Pay Method</th>
                                                            <th>Income(₦)</th>
                                                            <th>Entered By</th>
                                                            <th>Created at</th>

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        selectTransactionIncome();
                                                        ?>


                                                    </tbody>
                                                </table>

                                            </div>
                                            <?php
                                            deleteFamily();
                                            ?>

                                            <?php

                                            addFamily();


                                            ?>

                                        </section>
                                        <section id="section-linebox-2">
                                            <h2>Tabbing 2</h2>
                                            <div class="row d-flex justify-content-between px-3">
                                                <div class="sm-10">

                                                    <p class="text-muted">Export data to Copy, CSV, Excel, PDF & Print</p>
                                                </div>

                                            </div>
                                            <div class="table-responsive">
                                                <table id="example-transation2" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>

                                                            <th>Ref_id</th>
                                                            <th>Category</th>
                                                            <th>Note</th>
                                                            <th>Transaction Date</th>
                                                            <th>Pay Method</th>

                                                            <th>Expense(₦)</th>
                                                            <th>Entered By</th>
                                                            <th>Created at</th>

                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        selectTransactionExpense();
                                                        ?>


                                                    </tbody>
                                                </table>

                                            </div>
                                            <?php
                                            deleteFamily();
                                            ?>

                                            <?php

                                            addFamily();


                                            ?>
                                        </section>
                                        <section id="section-linebox-3">
                                            <h2>Tabbing 3</h2>
                                        </section>
                                        <section id="section-linebox-4">
                                            <h2>Tabbing 4</h2>
                                        </section>
                                        <section id="section-linebox-5">
                                            <h2>Tabbing 5</h2>
                                        </section>
                                    </div>
                                    <!-- /content -->
                                </div>
                                <!-- /tabs -->
                            </section>
                            <!-- Tabstyle start -->
                            <!-- Tabstyle start -->









                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                <?php
                include('includes/right-side-bar.php');
                ?>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->

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
            <!-- ADD INCOME -->
            <div id="dataModal2" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white">New Income Transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form method="POST">
                                <div class="form-group mb-3">

                                    <label for="">Transaction Category<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="tcategory" required>
                                        <option value="">Select Transaction category</option>
                                        <?php
                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type = 'income' ";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$category_name</option>";
                                        }

                                        ?>


                                    </select>


                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Note<span class="text-danger">*</span></label>
                                    <textarea id="" cols="30" rows="10" required class="form-control" name="note"></textarea>

                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Payment Method<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" required name="payment_method">
                                        <option value="">Select payment method</option>
                                        <?php
                                        $lecrosoft = "SELECT * FROM payment_method";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$payment_method</option>";
                                        }
                                        ?>


                                    </select>


                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Amount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Transaction Date<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="datepicker" name="tdate" required>

                                </div>
                                <div class="form-group mb-3">
                                    <!-- <label for="" hiden>Entered By<span class="text-danger ">*</span></label> -->
                                    <input type="text" class="form-control" name="created_by" value="<?php echo $_SESSION['first_name'] . "  " . $_SESSION['last_name'] ?>" hidden>

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
                $tcategory = $_POST['tcategory'];
                $note = $_POST['note'];
                $payment_method = $_POST['payment_method'];
                $amount = $_POST['amount'];
                $tdate  = $_POST['tdate'];
                $created_by = $_POST['created_by'];

                $lecrosoft = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`,`entered_by`) VALUES ($tcategory,'$note','$tdate',$payment_method,'$amount','$created_by')";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                if ($query_lecrosoft) {
                    echo '<script type="text/javascript">location = "transaction.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
                }
            }
            ?>


            <!-- ADD EXPENSE -->
            <div id="dataModal1" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white">New Expense Transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="">
                            <form method="POST">
                                <div class="form-group mb-3">

                                    <label for="">Transaction Category<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="tcategory" required>
                                        <option value="">Select Transaction category</option>
                                        <?php
                                        $lecrosoft = "SELECT * FROM income_expence_category WHERE type = 'expense'";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$category_name</option>";
                                        }

                                        ?>


                                    </select>


                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Note<span class="text-danger">*</span></label>
                                    <textarea id="" cols="30" rows="10" required class="form-control" name="note"></textarea>

                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Payment Method<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" required name="payment_method">
                                        <option value="">Select payment method</option>
                                        <?php
                                        $lecrosoft = "SELECT * FROM payment_method";
                                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                                            extract($row);
                                            echo " <option value='$id'>$payment_method</option>";
                                        }
                                        ?>


                                    </select>


                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Amount<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="amount" placeholder="Enter Amount" required>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Transaction Date<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="datepicker" name="tdate" required>

                                </div>
                                <div class="form-group mb-3">
                                    <!-- <label for="" hiden>Entered By<span class="text-danger ">*</span></label> -->
                                    <input type="text" class="form-control" name="created_by" value="<?php echo $_SESSION['first_name'] . "  " . $_SESSION['last_name'] ?>" hidden>

                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add_expense">Save changes</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>


            <?php
            if (isset($_POST['add_expense'])) {
                $tcategory = $_POST['tcategory'];
                $note = $_POST['note'];
                $payment_method = $_POST['payment_method'];
                $amount = $_POST['amount'];
                $tdate  = $_POST['tdate'];
                $created_by = $_POST['created_by'];

                $lecrosoft = "INSERT INTO `income_and_expense`(`income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `expense`,`entered_by`) VALUES ($tcategory,'$note','$tdate',$payment_method,'$amount','$created_by')";
                $query_lecrosoft = mysqli_query($con, $lecrosoft);
                if ($query_lecrosoft) {
                    echo '<script type="text/javascript">location = "transaction.php"</script>';
                } else {
                    die("QUERY ERROR" . mysqli_error($con));
                    recordDangerMessage();
                }
            }
            ?>
            <?php
            include('includes/footer.php');
            ?>


            <!-- Custom Theme JavaScript -->
            <script src="js/cbpFWTabs.js"></script>
            <script type="text/javascript">
                (function() {
                    [].slice
                        .call(document.querySelectorAll(".sttabs"))
                        .forEach(function(el) {
                            new CBPFWTabs(el);
                        });
                })();
            </script>




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
                    $('.add-income').click(function() {
                        $('#dataModal2').modal("show");
                    })
                })
            </script>
            <script>
                $(document).ready(function() {
                    $('.add-expense').click(function() {
                        $('#dataModal1').modal("show");
                    })
                })
            </script>
            <script>
                $(document).ready(function() {
                    $('#example-transation').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example-transation2').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>

            <script>
                // Clock pickers
                $('#single-input').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('.clockpicker').clockpicker({
                    donetext: 'Done',
                }).find('input').change(function() {
                    console.log(this.value);
                });
                $('#check-minutes').click(function(e) {
                    // Have to stop propagation here
                    e.stopPropagation();
                    input.clockpicker('show').clockpicker('toggleView', 'minutes');
                });
                if (/mobile/i.test(navigator.userAgent)) {
                    $('input').prop('readOnly', true);
                }
                // Colorpicker
                $(".colorpicker").asColorPicker();
                $(".complex-colorpicker").asColorPicker({
                    mode: 'complex'
                });
                $(".gradient-colorpicker").asColorPicker({
                    mode: 'gradient'
                });
                // Date Picker
                var date = $('#datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                }).val();
                jQuery('.mydatepicker, #datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true

                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                jQuery('#datepicker-inline').datepicker({
                    todayHighlight: true
                });
                // Daterange picker
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse'
                });
                $('.input-daterange-timepicker').daterangepicker({
                    timePicker: true,
                    format: 'MM/DD/YYYY h:mm A',
                    timePickerIncrement: 30,
                    timePicker12Hour: true,
                    timePickerSeconds: false,
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse'
                });
                $('.input-limit-datepicker').daterangepicker({
                    format: 'MM/DD/YYYY',
                    minDate: '06/01/2015',
                    maxDate: '06/30/2015',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-danger',
                    cancelClass: 'btn-inverse',
                    dateLimit: {
                        days: 6
                    }
                });
            </script>

            <!-- FILTER DATE SCRIPT -->
            <script>
                $(document).ready(function() {
                    $('#search_btn').click(function() {
                        alert('good boy')
                    })
                })
            </script>

</body>

</html>