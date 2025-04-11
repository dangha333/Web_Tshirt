<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>
    <style>
        /* styles.css */


        .form-container {
            background-color: #fff;
            padding: 20px;

            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            margin-top: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            background-color: #28a745;
            color: #fff;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        /* styles.css */



        .news-list-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-list-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .news-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }

        .news-item img {
            width: 150px;
            height: 100px;
            border-radius: 8px;
            margin-right: 20px;
        }

        .news-content {
            flex: 1;
        }

        .news-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-left: 100px;
            /* Khoảng cách giữa nút Sửa/Xóa và nội dung tin tức */
        }

        .news-actions button {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
    <meta charset="utf-8" />
    <title>Danh mục sản phẩm</title>
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
                                    <div class="h-100">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h4>

                                                <form method="GET" action="?act=san-phams">
                                                    <input type="hidden" name="act" value="tim-kiem-san-pham">
                                                    <input type="text" name="tukhoa" placeholder="Tìm sản phẩm...">
                                                    <button type="submit" name="timkiem">Tìm kiếm</button>

                                                </form>

                                                <a href="?act=form-them-san-pham" class="btn btn-soft-success material-shadow-none ms-2">
                                                    <i class="ri-add-circle-line align-middle me-1"></i> Thêm sản phẩm
                                                </a>
                                            </div>
                                            <!-- end card header -->

                                            <div class="card-body">
                                                <div class="live-preview">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped align-middle mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th scope="col">Ảnh</th>
                                                                    <th scope="col" style="width: 10%;">Tên sản phẩm</th>
                                                                    <th scope="col" style="width: 20%;">Mô tả</th>
                                                                    <th scope="col" style="width: 8%;">Giá nhập</th>
                                                                    <th scope="col" style="width: 8%;">Giá bán</th>
                                                                    <th scope="col" style="width: 8%;">Giá KM</th>
                                                                    <th scope="col" style="width: 8%;">Số lượng</th>
                                                                    <th scope="col" style="width: 10%;">Ngày nhập</th>
                                                                    <th scope="col" style="width: 10%;">Danh mục</th>
                                                                    <th scope="col" style="width: 8%;">Trạng thái</th>
                                                                    <th scope="col" style="width: 12%;">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($listSanPham as $index => $sanPham): ?>
                                                                    <tr>
                                                                        <td class="fw-medium"><?= $index + 1 ?></td>
                                                                        <td><img src="<?= 'http://localhost/DA1-Silver_Ring' . $sanPham['img'] ?>" alt="product" width="150" height="80"
                                                                                onerror="this.onerror=null;this.src='https://d1hjkbq40fs2x4.cloudfront.net/2017-08-21/files/landscape-photography_1645-t.jpg';">
                                                                        </td>

                                                                        <td class="text-wrap"><?= $sanPham['ten'] ?></td>
                                                                        <td class="text-wrap"><?= $sanPham['mo_ta'] ?></td>
                                                                        <td class="text-wrap"><?= $sanPham['gia_nhap'] ?> VND</td>
                                                                        <td><?= $sanPham['gia_ban'] ?> VND</td>
                                                                        <td><?= $sanPham['gia_km'] ?> VND</td>
                                                                        <td><?= $sanPham['so_luong'] ?></td>
                                                                        <td><?= $sanPham['date'] ?></td>
                                                                        <td><?= $sanPham['ten_danh_muc'] ?></td>

                                                                        <td>
                                                                            <?php
                                                                            if ($sanPham['trang_thai'] == 1) { ?>
                                                                                <span class="badge bg-success">Hiển thị</span>
                                                                            <?php
                                                                            } else { ?>
                                                                                <span class="badge bg-danger">Đã ẩn</span>

                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <div class="hstack gap-3 flex-wrap">
                                                                                <a href="?act=form-sua-san-pham&san_pham_id=<?= $sanPham['id'] ?>" class="link-success fs-15">
                                                                                    <i class="ri-edit-2-line"></i>
                                                                                </a>
                                                                                <form action="?act=xoa-san-pham" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                                                                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                                                    <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                                        <i class="ri-delete-bin-line"></i>
                                                                                    </button>
                                                                                </form>
                                                                                <a href="?act=chi-tiet-san-pham&san_pham_id=<?= $sanPham['id'] ?>" class="link-primary fs-15 me-2" title="View">
                                                                                    <i class="ri-eye-line"></i>
                                                                                </a>
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