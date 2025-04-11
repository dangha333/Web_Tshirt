
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Banner | T-Shirt</title>
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
                                <h4 class="mb-sm-0">Quản lý banner</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Banner</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật banner</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="?act=sua-banner" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $banner['id'] ?>">
                                            <div class="row">
                                            <div class="row g-3">
                                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="title" class="form-label">Tiêu đề</label>
                                                                    <input type="text" class="form-control" placeholder="Hãy nhập thêm tiêu đề" name="title" value="<?= $banner['title'] ?>">
                                                                    <span class="text-danger">
                                                                        <?= !empty($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : ''  ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-xxl-4 col-md-5">
                                                            <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                                            <input type="file" class="form-control" placeholder="Đường dẫn hình ảnh" name="hinh_anh" >
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['hinh_anh']) ? $_SESSION['errors']['hinh_anh'] : '' ?></span>

                                                            <?php if (!empty($banner['hinh_anh'])): ?>
                                                                <div class="mt-2">
                                                                    <label>Ảnh hiện tại:</label>
                                                                    <img src="<?= $banner['hinh_anh'] ?>" alt="Current Image" class="hinh_anh-fluid" style="max-width: 200px;">
                                                                </div>
                                                            <?php endif; ?>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-xxl-4 col-md-5">
                                                                <div>
                                                                    <label for="link" class="form-label">Liên kết</label>
                                                                    <input type="text" class="form-control" name="lien_ket" placeholder="liên kết" value="<?= $banner['lien_ket'] ?>">
                                                                </div>
                                                            </div>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['lien_ket']) ? $_SESSION['errors']['lien_ket'] : '' ?>
                                                            </span>
                                                            <!--end col-->
                                                            <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select class="form-select" name="trang_thai">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?= $banner['trang_thai'] == 1 ? 'selected' : '' ?>>Hiển thị</option>
                                                                <option value="2" <?= $banner['trang_thai'] == 2 ? 'selected' : '' ?>>Ẩn</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                            <div class="col-12" style="text-align: center">
                                                                <button class="btn btn-primary" type="submit" onsubmit="alert('Thêm banner thành công')">Cập nhật banner</button>
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