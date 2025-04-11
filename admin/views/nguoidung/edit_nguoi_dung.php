<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Người dùng | T-Shirt</title>
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
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý người dùng</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Người dùng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật người dùng</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=sua-nguoi-dung" method="POST">
                                            <input type="hidden" name="id" value="<?= $nguoi_dung['id'] ?>">
                                            <div class="row">
                                            <div class="row g-3">
                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="ho_ten"  class="form-label">Họ tên</label>
                                                                    <input type="text" class="form-control" placeholder="Hãy nhập thêm họ tên" name="ho_ten" value="<?= $nguoi_dung['ho_ten'] ?>">
                                                                    <span class="text-danger">
                                                                        <?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : ''  ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <div>
                                                                        <label for="email"  class="form-label">Email</label>
                                                                        <input type="email" class="form-control" placeholder="Nhập vào email"  name="email" value="<?= $nguoi_dung['email'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                                                            </span>
                                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="mat_khau"  class="form-label">Mật khẩu</label>
                                                                    <input type="password" class="form-control"  placeholder="Nhập vào mật khẩu" name="mat_khau" value="<?= $nguoi_dung['mat_khau'] ?>">
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
                                                            </span>
                                                            <!--end col-->
                                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                                    <input type="number" class="form-control"  placeholder="Nhập số điện thoại của bạn" name="so_dien_thoai" value="<?= $nguoi_dung['so_dien_thoai'] ?>">
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                                                            </span>
                                                    <!--end col-->
                                                    <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="dia_chi"  class="form-label">Địa chỉ</label>
                                                                    <input type="text" class="form-control"  placeholder="Nhập số địa chỉ của bạn" name="dia_chi" value="<?= $nguoi_dung['dia_chi'] ?>">
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>
                                                            </span>
                                                    <!--end col-->
                                                            <div class="col-12" style="text-align: center">
                                                                <button class="btn btn-primary" type="submit" onsubmit="alert('Cập nhật người dùng thành công')">Cập nhật ngươi dùng</button>
                                                            </div>
                                                            <!--end col-->

                                            </div>
                                            
                                            <!--end row-->
                                            </form>
                                    </div>
                                </div>
                                
                            </div>
                                    
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <!-- end col -->
                                </div>
                            </div><!-- end card -->

                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

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