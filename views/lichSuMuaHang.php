<?php require_once('views/layout/header.php'); ?>
<?php require_once('views/layout/menu.php'); ?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS cải tiến ở đây */
  </style>
</head>

<div class="p-5 align-items-center d-flex justify-content-center ">
  <div class="card" style="width: 1200px;">
    <div class="card-header align-items-center d-flex justify-content-between">
      <!-- Search Form -->
      <form class="search-form d-flex me-3" action="index.php?act=tim-kiem-don-hang" method="POST" role="search">
        <input type="search" class="form-control" placeholder="Tìm mã đơn hàng..." aria-label="Search" name="search" />
        <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm" />
      </form>
    </div><!-- end card header -->

    <div class="card-body">
      <div class="live-preview">
        <div class="table-responsive">
          <table class="table table-striped table-nowrap align-middle mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Phương Thức Thanh Toán</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($donHangs)): ?>
                <?php foreach ($donHangs as $index => $donHangItem): ?>
                  <tr>
                    <td class="fw-medium"><?= $index + 1 ?></td>
                    <td><?= ($donHangItem['ma_don_hang']) ?></td>
                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($donHangItem['ngay_dat_hang']))) ?></td>
                    <td><?= number_format($donHangItem['tong_tien'], 0, ',', '.') ?> đ</td>
                    <td><?= $pTTT[$donHangItem['phuong_thuc_thanh_toan_id']] ?></td>
                    <td><?= $trangThaiDonHang[$donHangItem['trang_thai_don_hang_id']] ?></td>

                    <td>
                      <a href="?act=chitietdonhang&id=<?= $donHangItem['id'] ?>" class="p-2">
                        <i class="bi bi-eye"></i>
                      </a>


                      <?php if ($donHangItem['trang_thai_don_hang_id'] == 7) { ?>
                        <a href="?act=xoa-don-hang&id_don_hang=<?= $donHangItem['id'] ?>"
                          onclick="return confirm('Xác định xóa đơn hàng?')">
                          <i class="bi bi-trash-fill"></i> Xóa
                        </a>
                      <?php } ?>
                      <?php if ($donHangItem['trang_thai_don_hang_id'] != 7 && $donHangItem['trang_thai_don_hang_id'] != 5) { ?>
                        <a href="?act=huy-don-hang&id_don_hang=<?= $donHangItem['id'] ?>"
                          onclick="return confirm('Xác định hủy đơn hàng?')">
                          <i class="bi bi-trash-fill"></i> Hủy
                        </a>
                      <?php } ?>
                      <?php if ($donHangItem['trang_thai_don_hang_id'] == 4) { ?>
                        <a href="?act=xac-nhan-don-hang&id_don_hang=<?= $donHangItem['id'] ?>"
                          onclick="return confirm('Xác nhận đơn hàng?')">
                          <i class="bi bi-check"></i> Xác nhận
                        </a>
                      <?php } ?>

                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center">Không tìm thấy kết quả.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- end card body -->
  </div><!-- end card -->
</div><!-- end .h-100 -->
<style>
  .search-form {
    position: relative;
    /* Để có thể đặt các thành phần bên trong */
  }

  .search-form input[type="search"] {
    font-size: 16px;
    /* Kích thước chữ lớn hơn */
    padding: 10px 15px;
    /* Đệm cho ô tìm kiếm */
    border: 1px solid #007bff;
    /* Viền màu xanh */
    border-radius: 5px;
    /* Bo tròn các góc */
    width: 300px;
    /* Kích thước cố định cho ô tìm kiếm */
    transition: border-color 0.3s;
    /* Hiệu ứng chuyển tiếp cho viền */
  }

  .search-form input[type="search"]:focus {
    border-color: #0056b3;
    /* Màu viền khi ô được chọn */
    outline: none;
    /* Loại bỏ viền mặc định */
  }

  .search-form input[type="search"]::placeholder {
    color: #6c757d;
    /* Màu chữ cho placeholder */
    opacity: 1;
    /* Đảm bảo độ mờ của placeholder */
  }



  .search-form .btn {
    margin-left: 10px;
    /* Khoảng cách giữa ô tìm kiếm và nút */
    padding: 10px 15px;
    /* Đệm cho nút tìm kiếm */
  }

  body {
    background-color: #f8f9fa;
    /* Màu nền nhẹ nhàng */
  }

  .card {
    border-radius: 10px;
    /* Bo tròn các góc của thẻ */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    /* Đổ bóng cho thẻ */
  }

  .card-header {
    background-color: #007bff;
    /* Màu nền cho header */
    color: white;
    /* Màu chữ */
    border-top-left-radius: 10px;
    /* Bo tròn góc trên bên trái */
    border-top-right-radius: 10px;
    /* Bo tròn góc trên bên phải */
  }

  .table {
    margin: 0;
    /* Loại bỏ margin cho bảng */
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: #f2f2f2;
    /* Màu nền cho các dòng lẻ */
  }

  .table th {
    background-color: #e9ecef;
    /* Màu nền cho tiêu đề cột */
    font-weight: bold;
    /* Đậm chữ tiêu đề */
  }

  .table td {
    vertical-align: middle;
    /* Căn giữa các ô */
  }

  .table a {
    color: #007bff;
    /* Màu liên kết */
    text-decoration: none;
    /* Không gạch chân */
  }

  .table a:hover {
    text-decoration: underline;
    /* Gạch chân khi hover */
  }

  .p-2 {
    padding: 0.5rem;
    /* Đệm cho liên kết */
  }

  .table-responsive {
    overflow-x: auto;
    /* Thêm thanh cuộn ngang nếu cần */
  }

  @media (max-width: 768px) {
    .card {
      width: 100%;
      /* Chiếm toàn bộ chiều rộng trên thiết bị di động */
    }
  }
</style>
<?php require_once './views/layout/footer.php'; ?>