<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Danh mục tin tức</title>
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
                        <div class="col">
                        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Submission Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Quản lý danh sách tin tức</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Tin tức</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="h-100">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Danh sách tin tức</h4>
            <a href="?act=form-them-tin-tuc" class="btn btn-soft-success material-shadow-none">
                <i class="ri-add-circle-line align-middle me-1"></i> Thêm tin tức
            </a>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="live-preview">
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col" style="width: 20%;">Tiêu đề</th>
                                <th scope="col" style="width: 15%;">Ngày đăng</th>
                                <th scope="col" style="width: 40%;">Nội dung</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($TinTucs as $index => $TinTuc): ?>
                                <tr>
                                    <td class="fw-medium"><?= $index + 1 ?></td>
                                    <td><img src="<?= $TinTuc['img'] ?>" alt="News Image" width="100" height="100"></td>
                                    <td class="text-wrap"><?= $TinTuc['title'] ?></td>
                                    <td><?= $TinTuc['date'] ?></td>
                                    <td>
                                                                <?php
                                                                // Lấy nội dung
                                                                $noi_dung = $TinTuc['content'];

                                                                // Giới hạn số từ
                                                                $maxWords = 10;
                                                                $words = explode(' ', $noi_dung); // Tách chuỗi thành mảng các từ

                                                                if (count($words) > $maxWords) {
                                                                    // Nếu số từ vượt quá giới hạn, lấy 20 từ đầu tiên và thêm "..."
                                                                    echo implode(' ', array_slice($words, 0, $maxWords)) . '...';
                                                                } else {
                                                                    // Nếu số từ nhỏ hơn hoặc bằng giới hạn, hiển thị toàn bộ nội dung
                                                                    echo $noi_dung;
                                                                }
                                                                ?>
                                                            </td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="?act=form-sua-tin-tuc&tin_tuc_id=<?= $TinTuc['id'] ?>"
                                               class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                            <form action="?act=xoa-tin-tuc" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tin tức này?');">
                                                <input type="hidden" name="tin_tuc_id" value="<?= $TinTuc['id'] ?>">
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
        </div><!-- end card-body -->
    </div><!-- end card -->
</div> <!-- end .h-100 -->


</body>
</html>

          
           
    </div>
    
</body>
</html>


                            <div class="h-100">
                               
                                
                                </div> <!-- end row-->

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
   

  

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>