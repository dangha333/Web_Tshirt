<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>Cập nhật Tin Tức | T-Shirt</title>
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
        <?php require_once "views/layouts/header.php"; require_once "views/layouts/siderbar.php"; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lí tin tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Tin tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật tin tức</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=sua-tin-tuc" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $Tintuc['id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Tiêu Đề</label>
                                                            <input type="text" class="form-control" placeholder="Nhập vào tiêu đề" name="title" value="<?= $Tintuc['title'] ?>">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="content" class="form-label">Mô Tả</label>
                                                            <textarea class="form-control" placeholder="Nhập mô tả" name="content" rows="4"><?= $Tintuc['content'] ?></textarea>
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['content']) ? $_SESSION['errors']['content'] : '' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Hình Ảnh</label>
                                                            <input type="file" class="form-control" placeholder="Đường dẫn hình ảnh" name="img">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['img']) ? $_SESSION['errors']['img'] : '' ?></span>

                                                            <?php if (!empty($Tintuc['img'])): ?>
                                                                <div class="mt-2">
                                                                    <label>Ảnh hiện tại:</label>
                                                                    <img src="<?= $Tintuc['img'] ?>" alt="Current Image" class="img-fluid" style="max-width: 200px;">
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Ngày Xuất Bản</label>
                                                            <input type="date" class="form-control" name="date" value="<?= $Tintuc['date'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Sửa Bài Viết</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
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
                            <div class="text-sm-end d-none d-sm-block">Design & Develop by Themesbrand</div>
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
