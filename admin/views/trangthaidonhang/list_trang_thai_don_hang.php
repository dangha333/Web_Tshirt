<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Trạng thái đơn hàng | T-Shirt</title>
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
                                <h4 class="mb-sm-0">Quản lý trạng thái đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách trạng thái đơn hàng</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách đơn hàng</h4>
                                        <a href="?act=form-them-trang-thai-don-hang" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i>Thêm trạng thái đơn hàng</a>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle table-sm mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Trạng thái đơn hàng</th>
                                                            <th scope="col">Ngày tạo</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($trangthaidonhangs as $index => $trangthaidonhang): ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>

                                                                <td>
                                                                    <?php if ($trangthaidonhang['trang_thai_don_hang'] == 1) { ?>
                                                                        <span>Chờ xác nhận</span>
                                                                    <?php } else if ($trangthaidonhang['trang_thai_don_hang'] == 2) { ?>
                                                                        <span>Đã xác nhận</span>
                                                                    <?php } else if ($trangthaidonhang['trang_thai_don_hang'] == 3) { ?>
                                                                        <span>Đang giao</span>
                                                                    <?php } else if ($trangthaidonhang['trang_thai_don_hang'] == 4) { ?>
                                                                        <span>Đã giao</span>
                                                                    <?php } else if ($trangthaidonhang['trang_thai_don_hang'] == 5) { ?>
                                                                        <span>Đã hoàn thành</span>
                                                                    <?php } else if ($trangthaidonhang['trang_thai_don_hang'] == 6) { ?>
                                                                        <span>Đã thất bại</span>
                                                                    <?php } else { ?>
                                                                        <span>Đã Hủy</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?= $trangthaidonhang['ngay_tao'] ?></td>
                                                                <td>
                                                                    <?php if ($trangthaidonhang['trang_thai'] == 1) { ?>
                                                                        <span class="badge bg-success">Hiển thị</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge bg-danger">Đã ẩn</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <div class="hstack gap-2 flex-wrap">
                                                                        <a href="?act=form-sua-trang-thai-don-hang&id=<?= $trangthaidonhang['id'] ?>" class="link-success fs-15 me-2"><i class="ri-edit-2-line"></i></a>
                                                                        <form action="?act=xoa-trang-thai-don-hang" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa trạng thái đơn hàng này?');">
                                                                            <input type="hidden" name="don_hang_id" value="<?= $trangthaidonhang['id'] ?>">
                                                                            <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                                <i class="ri-delete-bin-line"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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