<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm sản phẩm | T-Shirt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-san-pham" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ten" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập vào tên sản phẩm">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_nhap" class="form-label">Giá nhập</label>
                                                            <input type="number" class="form-control" id="gia_nhap" name="gia_nhap" placeholder="Nhập vào giá nhập">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_ban" class="form-label">Giá bán</label>
                                                            <input type="number" class="form-control" id="gia_ban" name="gia_ban" placeholder="Nhập vào giá bán">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gia_km" class="form-label">Giá khuyến mãi</label>
                                                            <input type="number" class="form-control" id="gia_km" name="gia_km" placeholder="Nhập vào giá khuyến mãi">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_km']) ? $_SESSION['errors']['gia_km'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="so_luong" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control" id="so_luong" name="so_luong" min="1" step="1" placeholder="Nhập vào số lượng">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="img" name="img">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['img']) ? $_SESSION['errors']['img'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Album ảnh</label>
                                                            <input type="file" class="form-control" name="img_array[]" multiple>
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['img_array']) ? $_SESSION['errors']['img_array'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Ngày nhập hàng</label>
                                                            <input type="date" class="form-control" id="date" name="date" placeholder="Nhập vào ngày nhập hàng">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="danh_muc_id" class="form-label">Danh mục</label>
                                                            <select class="form-select" name="danh_muc_id" id="exampleFormControlSelect1">

                                                                <option selected disabled>Chọn danh mục sản phẩm</option>

                                                                <?php foreach ($danhmucs as $danh_muc) : ?>
                                                                    <option value="<?= $danh_muc['id'] ?>"><?= $danh_muc['ten_danh_muc'] ?></option>
                                                                <?php endforeach; ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select class="form-select" name="trang_thai">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Hiển thị</option>
                                                                <option value="2">Ẩn</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="mo_ta" class="form-label">Mô tả</label>
                                                            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" placeholder="Nhập vào mô tả sản phẩm"></textarea>
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 text-center">
                                                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end h-100 -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div> <!-- page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6 text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- end main content-->
    </div> <!-- END layout-wrapper -->

    <!-- Back to Top Button -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>

</html>