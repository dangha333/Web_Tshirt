<!DOCTYPE html>
<html lang="en-US">
<!--<![endif]-->

<head>
    <!--[if lt IE 9]>
<link rel='stylesheet' id='mojuri-ie-css' href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/ie.css?ver=20131205' type='text/css' media='all' />
<![endif]-->
    <link rel='stylesheet' id='bootstrap-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/bootstrap.css?ver=6.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='circlestime-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/jquery.circlestime.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='mmenu-all-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/jquery.mmenu.all.css?ver=6.6.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='slick-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/slick/slick.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='font-awesome-css'
        href='https://mojuri.wpbingosite.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min.css?ver=4.7.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='materia-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/materia.css?ver=6.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elegant-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/elegant.css?ver=6.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wpbingo-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/wpbingo.css?ver=6.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='photoswipe-css'
        href='https://mojuri.wpbingosite.com/wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe.min.css?ver=9.3.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='icomoon-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/icomoon.css?ver=6.6.2' type='text/css'
        media='all' />
    <link rel='stylesheet' id='mojuri-style-template-css'
        href='https://mojuri.wpbingosite.com/wp-content/themes/mojuri/css/template.css?ver=6.6.2' type='text/css'
        media='all' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>



</html>
<?php require_once 'views/layout/header.php'; ?>

<body class="page-template-default page page-id-18 theme-mojuri woocommerce-checkout woocommerce-page woocommerce-order-received woocommerce-no-js checkout banners-effect-1 elementor-default elementor-kit-27720">
    <div id='page' class="hfeed page-wrapper  style-1">
        <h1 class="bwp-title hide"><a href="https://mojuri.wpbingosite.com/" rel="home">T-Shirt</a></h1>

        <div id="bwp-main" class="bwp-main">
            <div data-bg_default="https://mojuri.wpbingosite.com/wp-content/uploads/2021/07/bg-breadcrumb.jpg"
                class="page-title bwp-title"
                style="background-image:url(https://mojuri.wpbingosite.com/wp-content/uploads/2021/07/bg-breadcrumb.jpg);">
                <div class="container">
                    <div class="content-title-heading">
                        <span class="back-to-shop">Shop</span>
                        <h1 class="text-title-heading">
                            Đơn hàng </h1>
                    </div><!-- Page Title -->
                    <div id="breadcrumb" class="breadcrumb">
                        <div class="bwp-breadcrumb"><a href="?act=home">Trang chủ</a> <span
                                class="delimiter"></span> <span class="current">Đơn hàng</span> </div>
                    </div>
                </div>
            </div><!-- .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="main-content" class="main-content">
                            <div id="primary" class="content-area">
                                <div id="content" class="site-content" role="main">
                                    <article id="post-18" class="post-18 page type-page status-publish hentry">
                                        <div class="entry-content clearfix">
                                            <div class="woocommerce">
                                                <div class="woocommerce-order">
                                                    <p
                                                        class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                                        Đơn hàng của bạn đã được ghi nhận. Chúng tôi sẽ cập nhật thông tin khi hàng được giao.</p>

                                                    <ul
                                                        class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                                        <li class="woocommerce-order-overview__order order">
                                                            Mã đơn hàng: <strong><?= $donHang['ma_don_hang'] ?></strong>
                                                        </li>

                                                        <li class="woocommerce-order-overview__date date">
                                                            Ngày đặt hàng: <strong><?= $donHang['ngay_dat_hang'] ?></strong>
                                                        </li>


                                                        <li class="woocommerce-order-overview__total total">
                                                            Tổng tiền: <strong><span
                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                            class="woocommerce-Price-currencySymbol"></span><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</bdi></span></strong>
                                                        </li>

                                                        <li class="woocommerce-order-overview__payment-method method">
                                                            Phương thức thanh toán: <strong>Thanh toán khi nhận hàng</strong>
                                                        </li>

                                                    </ul>


                                                    <section>


                                                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center-align woocommerce-table__product-name product-name"
                                                                        style="font-size: 26px; text-align: center; vertical-align: middle;">
                                                                        Thông tin sản phẩm
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($chiTietDonHang as $item) : ?>
                                                                    <!-- Dòng sản phẩm -->
                                                                    <!-- Giữ nguyên file gốc, chỉ sửa phần hiển thị sản phẩm -->
                                                                    <tr class="woocommerce-table__line-item order_item">
                                                                        <td class="woocommerce-table__product-name product-name" style="display: flex; align-items: center; gap: 20px; padding: 15px; border-bottom: 1px solid #e5e5e5;">
                                                                            <div style="width: 120px; height: 120px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                                                                <img src="<?= $item['img'] ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                                                            </div>
                                                                            <div>
                                                                                <h3 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;">
                                                                                    <?= $item['ten'] ?>
                                                                                </h3>
                                                                                <div style="color: #666; line-height: 1.6;">
                                                                                    <p><strong>Số lượng:</strong> <?= $item['so_luong'] ?></p>
                                                                                    <p><strong>Đơn giá:</strong><?= number_format($item['don_gia'], 0, ',', '.') ?> đ</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="font-weight: bold; color:#cb8161 ; text-align: center;">
                                                                            <?= number_format($item['tong_tien'], 0, ',', '.') ?> đ
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>

                                                                <!-- Dòng tổng kết -->
                                                                <tr>
                                                                    <th scope="row">Vận chuyển:</th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;">50.000 đ</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Phương thức thanh toán:</th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;">Thanh toán khi nhận hàng</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Ghi chú:</th>
                                                                    <td><?= $donHang['ghi_chu'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Tổng tiền:</th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><span class="woocommerce-Price-amount amount"><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </section>
                                                    <section class="woocommerce-order-details">

                                                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                            <thead>
                                                                <tr>
                                                                    <th class="woocommerce-table__product-name product-name" style="font-size: 26px; text-align: center">
                                                                        Thông tin đơn hàng
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Dòng tổng kết -->
                                                                <tr>
                                                                    <th scope="row">Mã đơn hàng: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['ma_don_hang'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Tên người nhận: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['ho_ten_nguoi_nhan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Số điện thoại: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['email_nguoi_nhan'] ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">Địa chỉ: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Trạng thái đơn hàng: </th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><?= $donHang['trang_thai_don_hang'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Tổng tiền:</th>
                                                                    <td style="font-weight: bold; color:#cb8161 ; text-align: center;"><span class="woocommerce-Price-amount amount"><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="?act=danhsachsanpham" class="btn btn-primary">
                                                            <i class="fas fa-tags"></i>
                                                            Tiếp tục mua sắm
                                                        </a>
                                                    </section>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #main -->
        <?php require_once './views/layout/footer.php'; ?>
    </div><!-- #page -->