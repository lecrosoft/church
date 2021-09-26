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
            <h4 class="page-title">Pastor Schedule</h4>
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
              <li><a href="#">Appointment</a></li>
              <li class="active">Pastor Schedule</li>
            </ol>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
          <div class="col-md-3">
            <div class="white-box">
              <h3 class="box-title">
                Drag and drop your Appontment to calender
              </h3>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div id="calendar-events" class="m-t-20">
                    <div class="calendar-events" data-class="bg-info">
                      <i class="fa fa-circle text-info"></i> 10 AM
                    </div>
                    <div class="calendar-events" data-class="bg-success">
                      <i class="fa fa-circle text-success"></i> 11 AM
                    </div>
                    <div class="calendar-events" data-class="bg-danger">
                      <i class="fa fa-circle text-danger"></i> 12 PM
                    </div>
                    <div class="calendar-events" data-class="bg-warning">
                      <i class="fa fa-circle text-warning"></i> 1PM
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="checkbox">
                    <input id="drop-remove" type="checkbox" />
                    <label for="drop-remove"> Remove after drop </label>
                  </div>
                  <a href="#" data-toggle="modal" data-target="#add-new-event" class="
                        btn btn-lg
                        m-t-40
                        btn-danger btn-block
                        waves-effect waves-light
                      ">
                    <i class="ti-plus"></i> Fix Appointment
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="white-box">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- BEGIN MODAL -->
        <div class="modal fade none-border" id="my-event">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
                </button>
                <h4 class="modal-title"><strong>Fix Appointment</strong></h4>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">
                  Close
                </button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">
                  Create event
                </button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">
                  Delete
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="add-new-event">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
                </button>
                <h4 class="modal-title"><strong>Fix</strong> Date</h4>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="control-label">Patient Name</label>
                      <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                    </div>
                    <div class="col-md-6">
                      <label class="control-label">Choose Category Color</label>
                      <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">Success</option>
                        <option value="danger">Danger</option>
                        <option value="info">Info</option>
                        <option value="primary">Primary</option>
                        <option value="warning">Warning</option>
                        <option value="inverse">Inverse</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="
                      btn btn-danger
                      waves-effect waves-light
                      save-category
                    " data-dismiss="modal">
                  Save
                </button>
                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- END MODAL -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
          <div class="slimscrollright">
            <div class="rpanel-title">
              Service Panel
              <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
              <ul>
                <li><b>Layout Options</b></li>
                <li>
                  <div class="checkbox checkbox-info">
                    <input id="checkbox1" type="checkbox" class="fxhdr" />
                    <label for="checkbox1"> Fix Header </label>
                  </div>
                </li>
                <li>
                  <div class="checkbox checkbox-warning">
                    <input id="checkbox2" type="checkbox" checked="" class="fxsdr" />
                    <label for="checkbox2"> Fix Sidebar </label>
                  </div>
                </li>
                <li>
                  <div class="checkbox checkbox-success">
                    <input id="checkbox4" type="checkbox" class="open-close" />
                    <label for="checkbox4"> Toggle Sidebar </label>
                  </div>
                </li>
              </ul>
              <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li>
                  <a href="javascript:void(0)" data-theme="default" class="default-theme">1</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="green" class="green-theme">2</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a>
                </li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>

                <li>
                  <a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a>
                </li>
              </ul>
              <ul class="m-t-20 chatonline">
                <li><b>Chat option</b></li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle" />
                    <span>Varun Dhavan
                      <small class="text-success">online</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle" />
                    <span>Genelia Deshmukh
                      <small class="text-warning">Away</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle" />
                    <span>Ritesh Deshmukh
                      <small class="text-danger">Busy</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle" />
                    <span>Arijit Sinh
                      <small class="text-muted">Offline</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle" />
                    <span>Govinda Star
                      <small class="text-success">online</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle" />
                    <span>John Abraham<small class="text-success">online</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle" />
                    <span>Hritik Roshan<small class="text-success">online</small></span></a>
                </li>
                <li>
                  <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle" />
                    <span>Pwandeep rajan
                      <small class="text-success">online</small></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.right-sidebar -->
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