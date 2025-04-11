<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
  data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
  


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-12" />
  <title>Quản Lý Tài Khoản Cá Nhân</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>

</head>

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <!-- HEADER -->
    <?php
    require_once "views/layouts/header.php";

    require_once "views/layouts/siderbar.php";
    ?>

    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container">


          <div class="row">
            <!-- left column -->

            <!-- <div class="col-md-3">
              <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6 class="mt-2">Họ tên</h6> -->


              </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
<form action="?act=sua-thong-tin-ca-nhan" method="post">
  <hr>
  <h3>Thông tin cá nhân</h3>
  

    <div class="form-group">
      <label class="col-lg-3 control-label">Họ tên:</label>
      <div class="col-lg-12">
        <input class="form-control" type="text" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">Email:</label>
      <div class="col-lg-12">
        <input class="form-control" type="email" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">Số điện thoại:</label>
      <div class="col-lg-12">
        <input class="form-control" type="text" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">Trạng thái:</label>
      <div class="col-lg-12">
        <input class="form-control" type="text" value="">
      </div>
    </div>
    <!-- <div class="form-group">
      <label class="col-lg-3 control-label">Time Zone:</label>
      <div class="col-lg-12">
        <div class="ui-select">
          <select id="user_time_zone" class="form-control">
            <option value="Hawaii">(GMT-10:00) Hawaii</option>
            <option value="Alaska">(GMT-09:00) Alaska</option>
            <option value="Pacific Time (US &amp; Canada)">(GMT-012:00) Pacific Time (US &amp; Canada)</option>
            <option value="Arizona">(GMT-07:00) Arizona</option>
            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
            <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
          </select>
        </div>
      </div>
    </div> -->
    <div class="form-group">
      <label class="col-md-3 control-label"></label>
      <div class="col-md-12">
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>
    <hr>
            <h3>Đổi mật khẩu</h3>

            <?php if (isset($_SESSION['success'])) { ?>
              <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-coffee"></i>
              </div>

            <?php } ?>
            <form action="?act=sua-mat-khau-ca-nhan" method="post">
              <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="old_pass" value="">
                  <span
                    class="text-danger"><?= !empty($_SESSION['errors']['old_pass']) ? $_SESSION['errors']['old_pass'] : '' ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Mật khẩu mới:</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="new_pass" value="">
                  <span
                    class="text-danger"><?= !empty($_SESSION['errors']['new_pass']) ? $_SESSION['errors']['new_pass'] : '' ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Nhập lại mật khẩu mới :</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="confirm_pass" value="">
                  <span
                    class="text-danger"><?= !empty($_SESSION['errors']['confirm_pass']) ? $_SESSION['errors']['confirm_pass'] : '' ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" value="Submit">

                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>

  </div>
  <hr>
  </div>
  <!-- END layout-wrapper -->



  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->

  <!--preloader-->
  <div id="preloader">
    <div id="status">
      <div class="spinner-border text-primary avatar-sm" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>

  <div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
      data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
      <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>

</body>

</html>