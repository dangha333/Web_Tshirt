<?php
require_once('views/layout/header.php');

// Khởi động session nếu chưa khởi động
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    
    if (isset($_POST['add_to_cart'])) {
        $id = $_POST['id'];
        $size = $_POST['size'] ?? '--';
        $color = $_POST['color'] ?? '--';
        $so_luong = 1;
    
        // Kiểm tra nếu đã có trong giỏ hàng thì tăng số lượng
        $found = false;
        foreach ($_SESSION['giohang'] as &$item) {
            if ($item['id'] == $id && $item['size'] == $size && $item['color'] == $color) {
                $item['so_luong'] += 1;
                $found = true;
                break;
            }
        }
    
        if (!$found) {
            $_SESSION['giohang'][] = [
                'id' => $id,
                'size' => $size,
                'color' => $color,
                'so_luong' => $so_luong
            ];
        }
    
        header("Location: gioHang.php");
        exit;
    }
    
}

// Giả sử $chiTietGioHang đã được chuẩn bị từ controller (dựa trên session giỏ hàng)
$tongGioHang = 0;
?>

<body class="home">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once('views/layout/menu.php'); ?>

        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        </head>
        <main><br><br><br><br>
            <div class="mb-4 pb-4"></div>
            <section class="shop-checkout container">
                <div class="checkout-steps"></div>
                <div class="shopping-cart mb-5">
                    <div class="cart-table__wrapper">
                        <form action="?act=cap-nhat-gio-hang" method="POST" class="position-relative bg-body">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên</th>
                                        <th>Giá tiền</th>
                                        <th>Màu sắc</th>
                                        <th>Kích cỡ</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hủy</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($chiTietGioHang)): ?>
                                        <tr>
                                            <td colspan="8">Giỏ hàng của bạn đang trống.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($chiTietGioHang as $index => $sanPham): ?>
                                            <tr>
                                                <td>
                                                    <div class="shopping-cart__product-item">
                                                        <a href="<?= "?act=chitietsanpham&id=" . $sanPham['san_pham_id'] ?>">
                                                            <img loading="lazy" src="<?= $sanPham['img'] ?>" alt="" class="pc__img">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="shopping-cart__product-item__detail">
                                                        <h4><a href="?act=chitietsanpham&id=<?= $sanPham['san_pham_id'] ?>"><?= $sanPham['ten'] ?></a></h4>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="shopping-cart__product-price">
                                                        <?php if ($sanPham['gia_km']) { ?>
                                                            <span style="color: red;"><?= number_format($sanPham['gia_km'], 0, ',', '.') ?>đ</span><br>
                                                            <span><del><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</del></span>
                                                        <?php } else { ?>
                                                            <span><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</span>
                                                        <?php } ?>
                                                    </span>
                                                </td>
                                                <td class="color">
                                                    <?= htmlspecialchars($sanPham['color'] ?? '--') ?>
                                                </td>
                                                <td class="size">
                                                    <?= htmlspecialchars($sanPham['size'] ?? '--') ?>
                                                </td>
                                                <td>
                                                    <div class="qty-control position-relative">
                                                        <div class="qty-control__reduce">-</div>
                                                        <input type="number" name="so_luong[<?= $index ?>]"
                                                            class="qty-control__number text-center" value="<?= $sanPham['so_luong'] ?>" min="1"
                                                            data-gia="<?= $sanPham['gia_km'] ?? $sanPham['gia_ban'] ?>"
                                                            data-san-pham-id="<?= $sanPham['san_pham_id'] ?>">
                                                        <div class="qty-control__increase">+</div>
                                                    </div><!-- .qty-control -->
                                                </td>
                                                <td>
                                                    <span class="shopping-cart__subtotal" id="subtotal-<?= $sanPham['san_pham_id'] ?>">
                                                        <?php
                                                        $tongtien = 0;
                                                        if ($sanPham['gia_km']) {
                                                            $tongtien = $sanPham['gia_km'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongtien = $sanPham['gia_ban'] * $sanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongtien;
                                                        echo number_format($tongtien, 0, ',', '.') . ' đ';
                                                        ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div style="display:none">
                                                        <form id="<?= $sanPham['san_pham_id'] ?>" action="?act=xoa-san-pham-gio-hang" method="POST">
                                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['san_pham_id'] ?>">
                                                            <input type="hidden" name="size" value="<?= htmlspecialchars($sanPham['size'] ?? '') ?>">
        <input type="hidden" name="color" value="<?= htmlspecialchars($sanPham['color'] ?? '') ?>">
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <form id="<?= $sanPham['san_pham_id'] ?>" action="?act=xoa-san-pham-gio-hang" method="POST">
                                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['san_pham_id'] ?>">
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="cart-table-footer">
                                <button type="submit" class="btn btn-light">Cập nhật giỏ hàng</button>
                            </div>
                        </form>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error'] ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                        <script>
                            document.querySelectorAll('.qty-control__reduce').forEach(button => {
                                button.addEventListener('click', function () {
                                    const input = this.nextElementSibling;
                                    let value = parseInt(input.value);
                                    if (value > 1) {
                                        value--;
                                        input.value = value;
                                    }
                                });
                            });

                            document.querySelectorAll('.qty-control__increase').forEach(button => {
                                button.addEventListener('click', function () {
                                    const input = this.previousElementSibling;
                                    let value = parseInt(input.value);
                                    value++;
                                    input.value = value;
                                });
                            });
                        </script>
                    </div>

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
                            <div class="mobile_fixed-btn_wrapper">
                                <div class="button-wrapper container">
                                    <?php if ($tongGioHang > 0): ?>
                                        <a href="?act=thanh-toan"><button class="btn btn-primary btn-checkout">Bắt đầu thanh toán</button></a>
                                    <?php else: ?>
                                        <button class="btn btn-primary btn-checkout" disabled>Không có sản phẩm trong giỏ hàng</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <style>
                /* Đảm bảo hình ảnh nằm trong bảng */
                .cart-table img {
                    width: 100px;
                    height: 100px;
                    object-fit: cover;
                }

                /* Định dạng cho các phần tử sản phẩm */
                .shopping-cart__product-item {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                }

                /* Định dạng cho các cột Màu sắc và Kích cỡ */
                .cart-table th.color,
                .cart-table th.size {
                    text-align: center;
                    font-weight: bold;
                }

                .cart-table td.color,
                .cart-table td.size {
                    text-align: center;
                    vertical-align: middle;
                    color: #555;
                }

                /* Định dạng khi giá trị là "--" */
                .cart-table td.color:empty::before,
                .cart-table td.size:empty::before {
                    content: "--";
                    color: #999;
                }

                /* Định dạng cho các nút tăng/giảm */
                .qty-control {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .qty-control__number {
                    width: 50px;
                    text-align: center;
                    margin: 0 5px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    padding: 5px;
                }

                .qty-control__reduce,
                .qty-control__increase {
                    cursor: pointer;
                    padding: 5px 10px;
                    background-color: #e7e7e7;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    margin: 0 2px;
                }

                .qty-control__reduce:hover,
                .qty-control__increase:hover {
                    background-color: #d0d0d0;
                }

                .btn-danger {
                    background-color: #dc3545;
                    color: white;
                    border: none;
                    padding: 8px 12px;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .btn-danger:hover {
                    background-color: #c82333;
                }

                /* Định dạng chung cho bảng */
                .cart-table th,
                .cart-table td {
                    padding: 15px;
                    vertical-align: middle;
                }

                .cart-table th {
                    background-color: #f8f8f8;
                    font-weight: bold;
                }

                .cart-table td {
                    border-bottom: 1px solid #eee;
                }
            </style>
        </main>
        <br>
        <?php require_once './views/layout/footer.php'; ?>
    </div>
</body>
</html>