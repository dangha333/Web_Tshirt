<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Cập nhật sản phẩm | T-Shirt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

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
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sản phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật sản phẩm <?= $SanPham['ten'] ?></h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=sua-san-pham" method="post" enctype="multipart/form-data">

                                                <input type="hidden" name="id" value="<?= $SanPham['id'] ?>">

                                                <div class="row">

                                                    <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                                    <!-- Tên sản phẩm -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" placeholder="Nhập vào tên sản phẩm" name="ten" value="<?= $SanPham['ten'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <!-- Giá nhập -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_nhap" class="form-label">Giá nhập</label>
                                                            <input type="number" class="form-control" placeholder="Nhập vào giá nhập" name="gia_nhap" value="<?= $SanPham['gia_nhap'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Giá bán -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_ban" class="form-label">Giá bán</label>
                                                            <input type="number" class="form-control" placeholder="Nhập vào giá bán" name="gia_ban" value="<?= $SanPham['gia_ban'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Giá khuyến mãi -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_km" class="form-label">Giá khuyến mãi</label>
                                                            <input type="number" class="form-control" placeholder="Nhập vào giá khuyến mãi" name="gia_km" value="<?= $SanPham['gia_km'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_km']) ? $_SESSION['errors']['gia_km'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Số lượng -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="so_luong" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control" name="so_luong" value="<?= $SanPham['so_luong'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <!-- Hình ảnh -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Hình ảnh</label>
                                                            <!-- Hiển thị ảnh hiện tại nếu có -->
                                                            <?php if (!empty($SanPham['img'])): ?>
                                                                <div>
                                                                    <img src="<?= 'http://localhost/DA1-Sliver_Ring' . $SanPham['img'] ?>" alt="Hình ảnh hiện tạii" style="max-width: 50px;">
                                                                </div>
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" id="img" name="img">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['img']) ? $_SESSION['errors']['img'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <!-- Ablum ảnh -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="album" class="form-label">Album ảnh</label>
                                                            <input type="file" class="form-control" id="album" name="album[]" multiple>
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['album']) ? $_SESSION['errors']['album'] : '' ?></span>
                                                        </div>
                                                    </div>

                                                    <!-- Ngày nhập hàng -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Ngày nhập hàng</label>
                                                            <input type="date" class="form-control" name="date" value="<?= $SanPham['date'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['date']) ? $_SESSION['errors']['date'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Danh mục -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Danh mục</label>
                                                            <select name="danh_muc_id" class="form-control">
                                                                <?php foreach ($danhmucs as $danh_muc) : ?>
                                                                    <option <?= $danh_muc['id'] == $SanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danh_muc['id'] ?>"><?= $danh_muc['ten_danh_muc'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['danh_muc_id']) ? $_SESSION['errors']['danh_muc_id'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select class="form-select" name="trang_thai">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?= $SanPham['trang_thai'] == 1 ? 'selected' : '' ?>>Hiển thị</option>
                                                                <option value="2" <?= $SanPham['trang_thai'] == 2 ? 'selected' : '' ?>>Ẩn</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Mô tả -->
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="mo_ta" class="form-label">Mô Tả</label>
                                                            <textarea class="form-control" rows="4" name="mo_ta"><?= $SanPham['mo_ta'] ?></textarea>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Submit button -->
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div>

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

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>

</body>

</html>