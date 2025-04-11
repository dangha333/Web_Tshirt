<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm Tin Tức | T-Shirt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <div id="layout-wrapper">
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Tin Tức</h4>
                                    </div>

                                    <div class="card-body">
                                        <form action="?act=them-tin-tuc" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="title" class="form-label">Tiêu Đề</label>
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Nhập tiêu đề">
                                                    <span class="text-danger"><?= !empty($_SESSION['errors']['title']) ? $_SESSION['errors']['title'] : '' ?></span>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Nội dung</label>
                                                            <textarea name="content" id="editor" class="ckeditor-classic"></textarea>
                                                            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
                                                            <script>
                                                                // Khởi tạo CKEditor cho textarea
                                                                ClassicEditor
                                                                    .create(document.querySelector('#editor'))
                                                                    .catch(error => {
                                                                        console.error(error);
                                                                    });
                                                            </script>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['content']) ? $_SESSION['errorsư']['content'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="img" class="form-label">Hình Ảnh</label>
                                                    <input type="file" id="img" name="img" class="form-control" placeholder="Nhập đường dẫn hình ảnh">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="date" class="form-label">Ngày Xuất Bản</label>
                                                    <input type="date" id="date" name="date" class="form-control">
                                                </div>

                                                <div class="col-lg-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div> <!-- end row -->
                                        </form>
                                    </div> <!-- end card-body -->
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
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6 text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- end main content -->
    </div> <!-- END layout-wrapper -->

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>
</html>
