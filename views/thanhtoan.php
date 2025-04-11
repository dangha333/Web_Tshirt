<?php require_once('views/layout/header.php'); ?>


<body class="home">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once('views/layout/menu.php'); ?>

        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        </head>
        <main><br><br><br><br>
            <div class="mb-4 pb-4"></div>
            <div class="container">
                <div class="checkout-form">
                    <h1>THANH TOÁN</h1>

                    <form action="?act=xu-li-thanh-toan" method="POST">
                        <!-- Liên hệ -->
                        <div class="section">
                            <h2>Thông tin người đặt</h2>
                            <span>Email:</span>
                            <input type="email" 
                                value="<?= $user['email'] ?>" placeholder="Địa chỉ email" required>
                     
                                <span>Họ và tên:</span>
                            <input type="text" 
                                value="<?= $user['ho_ten'] ?>" placeholder="Họ và tên *" required>
                                <span>Số điện thoại:</span>
                            <input  value="<?= $user['so_dien_thoai'] ?>"
                                type="text" placeholder="Số điện thoại *" required>
                        </div>

                        <div class="section">
                            <h2>Thông tin người nhận</h2>
                            <span>Email:</span>
                            <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                value="<?= $user['email'] ?>" placeholder="Địa chỉ email" required>
                     
                                <span>Họ và tên:</span>
                            <input type="text" id="ho_ten_nguoi_nhan" name="ho_ten_nguoi_nhan"
                                value="<?= $user['ho_ten'] ?>" placeholder="Họ và tên *" required>
                                <span>Địa chỉ:</span>
                            <input id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" type="text"
                                value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ người nhận *" required>
                                <span>Số điện thoại:</span>
                            <input id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>"
                                type="text" placeholder="Số điện thoại *" required>
                        </div>

                        <!-- Ghi chú -->
                        <div class="section">
                            <h2>GHI CHÚ</h2>
                            <textarea name="ghi_chu" placeholder="Nhập ghi chú (nếu có)" rows="4"></textarea>
                        </div>

                        <!-- Hóa đơn -->
                        <div class="section">
                            <select name="phuong_thuc_thanh_toan_id" required>
                                <option value="" disabled selected>Phương thức thanh toán</option>
                                <option value="1">Thanh toán khi nhận hàng</option>
                            </select>
                        </div>


                        <button type="submit" class="btn-submit">Đặt hàng</button>


                </div>

                <!-- Đơn hàng -->
                <div class="order-summary">
                    <h2>ĐƠN HÀNG CỦA BẠN</h2>
                    <?php
                    $tongGioHang = 0;
                    foreach ($chiTietGioHang as $sanPham):
                    ?>
                        <div class="order-item">
                            <div class="product-info">
                                <div class="product-image">
                                    <a href="<?= "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['san_pham_id'] ?>">
                                        <img loading="lazy" src="<?= $sanPham['img'] ?>" alt="" class="pc__img">
                                    </a>
                                </div>
                                <div class="product-details">
                                    <h4>
                                        <a href=""><?= $sanPham['ten'] ?></a>
                                    </h4>
                                    <div class="product-price">
                                        <?php if ($sanPham['gia_km']) { ?>
                                            <span
                                                style="color: red;"><?= number_format($sanPham['gia_km'], 0, ',', '.') ?>đ</span><br>
                                            <span><del><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</del></span>
                                        <?php } else { ?>
                                            <span><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</span>
                                        <?php } ?>
                                        <br>
                                        <span>Số lượng: <?= $sanPham['so_luong'] ?></span>
                                    </div>
                                    <div class="product-subtotal">
                                        <?php
                                        $tongtien = $sanPham['gia_km'] ? $sanPham['gia_km'] * $sanPham['so_luong'] : $sanPham['gia_ban'] * $sanPham['so_luong'];
                                        $tongGioHang += $tongtien;
                                        echo "Tổng: " . number_format($tongtien, 0, ',', '.') . ' đ';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach ?>
                    <div class="shopping-cart__totals-wrapper">
                        <div class="sticky-content">
                            <div class="shopping-cart__totals">
                                <h3>Tổng tiền giỏ hàng</h3>
                                <table class="cart-totals">
                                    <tbody>
                                        <tr>
                                            <th>Tổng tiền sản phẩm</th>
                                            <td> <?php echo number_format($tongGioHang, 0, ',', '.') ?> đ </td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển</th>
                                            <td>
                                                <label class="form-check-label mb-2" for="free_shipping">
                                                    <?php $phiship = 50000;
                                                    if ($tongGioHang > 0) {
                                                        echo number_format($phiship, 0, ',', '.') . ' đ';
                                                    } else {
                                                        echo "0 đ";
                                                    }
                                                    ?>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tổng thanh toán</th>
                                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang + $phiship ?>">
                                            <td><?php $phiship = 50000;
                                                if ($tongGioHang > 0) {
                                                    echo number_format($tongGioHang + $phiship, 0, ',', '.') . ' đ';
                                                } else {
                                                    echo "0 đ";
                                                }
                                                ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            </form>


        </main>
        
<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        font-size: 14px;
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {

        font-family: Arial, sans-serif;

        color: #333;
        line-height: 1.6;

    }

    .container {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .checkout-form,
    .order-summary {
        background: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .checkout-form {
        flex: 3;
        margin-right: 20px;
    }

    h1,
    h2 {
        margin-bottom: 15px;
    }

    h1{
        font-size: 36px; /* Kích thước lớn hơn để nổi bật */
    font-weight: bold; /* Đậm hơn */
    text-align: center; /* Căn giữa */
    color: #000; /* Màu chữ trắng */
    background: linear-gradient(10deg, #000 0%, #fff 50%, #000 120%); /* Hiệu ứng nền gradient */
    padding: 15px 20px; /* Khoảng cách bên trong */
    border-radius: 10px; /* Bo góc mềm mại */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
    text-transform: uppercase; /* Chuyển chữ thường thành chữ in hoa */
    letter-spacing: 2px; /* Tăng khoảng cách giữa các ký tự */
    }

    .section {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: #000;
        color: #fff;
        text-transform: uppercase;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-submit:hover {
        background: #333;
    }

    /* Tóm tắt đơn hàng */
    .order-item,
    .price-details {
        margin-bottom: 15px;
    }

    .price-details p {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .price-details p:last-child {
        font-weight: bold;
    }

    hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }

    /* Đáp ứng trên thiết bị di động */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .checkout-form {
            margin-right: 0;
            margin-bottom: 20px;
        }
    }

    .order-summary {
        background: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .order-summary h2 {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .order-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }

    .product-info {
        display: flex;
        align-items: flex-start;
        width: 100%;
    }

    .product-image img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
        justify-content: center;
    }

    .product-details {
        flex: 1;
    }

    .product-details h4 {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
        word-break: break-word;
        /* Tự động xuống dòng khi vượt quá chiều dài */
        display: inline-block;
        max-width: 30ch;
        /* Giới hạn tên sản phẩm hiển thị trong 10 ký tự */
        white-space: normal;
        /* Đảm bảo cho phép xuống dòng */
        overflow-wrap: break-word;
    }

    .product-price span {
        font-size: 14px;
        color: #333;
    }

    .product-price span[style="color: red;"] {
        font-weight: bold;
        font-size: 16px;
    }

    .product-subtotal {
        font-size: 14px;
        font-weight: bold;
        color: #333;
        margin-top: 5px;
    }

    hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }
</style>
        <br>
        <?php require_once './views/layout/footer.php'; ?>