<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Danh sách Chi Tiết Sản Phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Product Detail List" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Danh sách Chi Tiết Sản Phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=san-phams">Danh sách Sản Phẩm</a></li>
                                        <li class="breadcrumb-item active">Chi Tiết Sản Phẩm</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách Chi Tiết Sản Phẩm</h4>
                            <a href="?act=form-them-chi-tiet-san-pham" class="btn btn-soft-success material-shadow-none ms-2">
                                <i class="ri-add-circle-line align-middle me-1"></i> Thêm Chi Tiết Sản Phẩm
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Sản Phẩm</th>
                                            <th scope="col">Mã Sản Phẩm</th>
                                            <th scope="col">Mô Tả Chi Tiết</th>
                                            <th scope="col">Số Lượng Tồn</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($dsChiTiet)): ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Không có chi tiết sản phẩm nào.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($dsChiTiet as $index => $chiTiet): ?>
                                                <tr>
                                                    <td class="fw-medium"><?= $index + 1 ?></td>
                                                    <td><?= htmlspecialchars($chiTiet['ten_san_pham']) ?></td>
                                                    <td><?= htmlspecialchars($chiTiet['ma_san_pham']) ?></td>
                                                    <td><?= htmlspecialchars($chiTiet['mo_ta_chi_tiet']) ?></td>
                                                    <td><?= htmlspecialchars($chiTiet['so_luong_ton']) ?></td>
                                                    <td>
                                                        <?php if ($chiTiet['trang_thai'] == 1): ?>
                                                            <span class="badge bg-success">Hiển thị</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Đã ẩn</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <a href="?act=form-sua-chi-tiet-san-pham&id=<?= $chiTiet['id'] ?>" class="link-success fs-15">
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                            <a href="?act=xoa-chi-tiet-san-pham&id=<?= $chiTiet['id'] ?>" class="link-danger fs-15" onclick="return confirm('Bạn có chắc muốn xóa chi tiết sản phẩm này?');">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
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
    </div>

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>