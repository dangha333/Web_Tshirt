<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Đơn hàng | T-Shirt</title>
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

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- Tiêu đề trang -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Quản lý danh sách đơn hàng - Đơn hàng: <?= $donhang['ma_don_hang'] ?></h4>



                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="?act=don-hangs">Danh sách đơn hàng</a></li>
                                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <?php
                                if ($donhang['trang_thai_don_hang_id'] == 1) {
                                    $color = "bg-warning";
                                } else if ($donhang['trang_thai_don_hang_id'] >= 2 && $donhang['trang_thai_don_hang_id'] <= 5) {
                                    $color = "bg-success";
                                } else {
                                    $color = "bg-danger";
                                }
                                ?>

                                <div class="alert <?= $color ?>" role="alert">
                                    <h4 class="alert-heading">Trạng thái:
                                        <?php
                                        if ($donhang['trang_thai_don_hang_id'] == 1) {
                                            echo "<span>Chờ xác nhận</span>";
                                        } else if ($donhang['trang_thai_don_hang_id'] == 2) {
                                            echo "<span>Đã xác nhận</span>";
                                        } else if ($donhang['trang_thai_don_hang_id'] == 3) {
                                            echo "<span>Đang giao</span>";
                                        } else if ($donhang['trang_thai_don_hang_id'] == 4) {
                                            echo "<span>Đã giao</span>";
                                        } else if ($donhang['trang_thai_don_hang_id'] == 5) {
                                            echo "<span>Đã hoàn thành</span>";
                                        } else if ($donhang['trang_thai_don_hang_id'] == 6) {
                                            echo "<span>Đã thất bại</span>";
                                        } else {
                                            echo "<span>Đã Hủy</span>";
                                        }
                                        ?>
                                    </h4>
                                </div>




                                <div class="card-body">
                                    <div class="row">
                                        <!-- Title with Icon and Date -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Silver Ring Title with Icon -->
                                            <div class="col-md-6 text-right">
                                                <h4 class="mb-3" style="font-weight: bold; color:red">T-Shirt</h4>
                                            </div>
                                            <!-- Order Date -->
                                            <div class="col-md-2 text-right" style="margin-bottom: 10px;">
                                                <p>Ngày đặt hàng: <?= date("d/m/Y", strtotime($donhang['ngay_dat_hang'])) ?></p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row" style="margin-bottom: 20px;">
    <!-- Thông tin người đặt -->
    <div class="col-md-4">
        <h5 class="h3" style="padding-bottom: 10px;"><u>Thông tin người đặt</u></h5>
        <?php if ($user): ?>
            <p>Họ tên: <?= htmlspecialchars($user['ho_ten']) ?></p>
            <p>Email: <?= htmlspecialchars($user['email'] ?? '')?></p>
            <p>SĐT: <?= htmlspecialchars($user['so_dien_thoai']) ?></p>
        <?php else: ?>
            <p>Không tìm thấy thông tin người đặt.</p>
        <?php endif; ?>
    </div>

    <!-- Thông tin người nhận -->
    <div class="col-md-4">
        <h5 class="h3" style="padding-bottom: 10px;"><u>Thông tin người nhận</u></h5>
        <p>Họ tên: <?= htmlspecialchars($donhang['ho_ten_nguoi_nhan']) ?></p>
        <p>Email: <?= htmlspecialchars($donhang['email_nguoi_nhan'] ?? '') ?></p>
        <p>SĐT: <?= htmlspecialchars($donhang['sdt_nguoi_nhan']) ?></p>
        <p>Địa chỉ: <?= htmlspecialchars($donhang['dia_chi_nguoi_nhan']) ?></p>
    </div>

    <!-- Thông tin đơn hàng -->
    <div class="col-md-4">
        <h5 class="h3" style="padding-bottom: 10px;"><u>Thông tin đơn hàng</u></h5>
        <p>Mã đơn hàng: <?= htmlspecialchars($donhang['ma_don_hang']) ?></p>
        <p>Phương thức thanh toán:
            <?php if ($donhang['phuong_thuc_thanh_toan_id'] == 1): ?>
                <span>Thanh toán tiền mặt khi giao hàng</span>
            <?php elseif ($donhang['phuong_thuc_thanh_toan_id'] == 2): ?>
                <span>Thanh toán qua ví Momo, ZaloPay,...</span>
            <?php endif; ?>
        </p>
    </div>
</div>



                                        <hr>

                                        <!-- Bảng sản phẩm -->
                                        <h5>Sản phẩm</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $tong_tien = 0; ?>
                                                <?php foreach ($sanPhamDonHang as $key => $SanPham) : ?> <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $SanPham['ten'] ?></td>
                                                        <td><?= number_format($SanPham['don_gia']) ?></td>
                                                        <td><?= $SanPham['so_luong'] ?></td>
                                                        <td><?= number_format($SanPham['tong_tien']) ?></td>

                                                    </tr>
                                                    <?php $tong_tien += $SanPham['tong_tien'] ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                        <!-- Tổng kết đơn hàng -->
                                        <div class="d-flex justify-content-between">
                                            <p>Ngày đặt hàng: <?= date("d/m/Y", strtotime($donhang['ngay_dat_hang'])) ?></p>
                                            <p>Mã đơn hàng: <?= $donhang['ma_don_hang'] ?></p>
                                        </div>
                                        <p>Thành tiền:
                                            <?= $tong_tien  ?>
                                        </p>
                                        <p>Vận chuyển: 50.000 </p>
                                        <p>Tổng tiền: <?= $tong_tien + 50000 ?></p>

                                        <!-- Nút điều hướng -->
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="?act=don-hangs" class="btn btn-primary"><i class="ri-arrow-left-line"></i> Quay lại danh sách đơn hàng</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>