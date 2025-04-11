<?php require_once 'views/layout/header.php'; ?>

<body class="shop">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once 'views/layout/menu.php'; ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    Sản phẩm
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="?act=home">Trang chủ</a><span class="delimiter"></span><a href="?act=danhsachsanpham">Shop</a><span class="delimiter"></span>Sản phẩm
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar left-sidebar md-b-50 p-t-10">
                                        <!-- Block Product Categories -->
                                        <div class="block block-product-cats">
                                            <div class="block-title">
                                                <h2>Danh mục</h2>
                                            </div>

                                            <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                                                <div class="block-content">
                                                    <div class="product-cats-list">
                                                        <ul>
                                                            <li class="current">
                                                                <a href="?act=danh-muc-san-pham&iddm=<?= $danhMuc['id'] ?>">
                                                                    <?= $danhMuc['ten_danh_muc'] ?>

                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>



                                        </div>

                                        <!-- Block Product Filter -->
                                        <form method="GET" action="index.php">
                                            <input type="hidden" name="act" value="loc-san-pham-theo-gia" />
                                            <div class="mb-3">
                                                <label for="min_price" class="form-label">Giá thấp nhất:</label>
                                                <input type="number" id="min_price" name="min_price" class="form-control" value="<?= isset($_GET['min_price']) ? htmlspecialchars($_GET['min_price']) : 0 ?>" min="0" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="max_price" class="form-label">Giá cao nhất:</label>
                                                <input type="number" id="max_price" name="max_price" class="form-control" value="<?= isset($_GET['max_price']) ? htmlspecialchars($_GET['max_price']) : 1000000 ?>" min="0" required />
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" style="background-color: #ff0000; border-color: #ff0000; margin-top: 10px">Tìm sản phẩm</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                                        <div class="products-topbar clearfix">
                                            <div class="products-topbar-left">

                                            </div>
                                            <div class="products-topbar-right">
                                                <div class="products-sort dropdown">
                                                    <span class="sort-toggle dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sắp xếp mặc định</span>
                                                    <ul class="sort-list dropdown-menu" x-placement="bottom-start">
                                                        <li class="active"><a href="#">Sắp xếp mặc định</a></li>
                                                        <li><a href="#">Sort by popularity</a></li>
                                                        <li><a href="#">Sắp xếp theo mức độ phổ biến</a></li>
                                                        <li><a href="#">Sắp xếp theo mới nhất</a></li>
                                                        <li><a href="#">Sắp xếp theo giá: thấp đến cao</a></li>
                                                        <li><a href="#">Sắp xếp theo giá: cao xuống Thấp</a></li>
                                                    </ul>
                                                </div>
                                                <ul class="layout-toggle nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="layout-grid nav-link active" data-toggle="tab" href="#layout-grid" role="tab"><span class="icon-column"><span class="layer first"><span></span><span></span><span></span></span><span class="layer middle"><span></span><span></span><span></span></span><span class="layer last"><span></span><span></span><span></span></span></span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="layout-list nav-link" data-toggle="tab" href="#layout-list" role="tab"><span class="icon-column"><span class="layer first"><span></span><span></span></span><span class="layer middle"><span></span><span></span></span><span class="layer last"><span></span><span></span></span></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                                                <div class="products-list grid">
                                                    <div class="row">

                                                        <?php foreach ($listSanPhamById as $key => $sanPham): ?>
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                                                <div class="products-entry clearfix product-wapper">
                                                                    <div class="products-thumb">
                                                                        <div class="product-lable">
                                                                            <div class="hot">Hot</div>
                                                                        </div>
                                                                        <div class="product-thumb-hover">
                                                                            <a href="?act=chitietsanpham&id=<?= $sanPham['id'] ?>">
                                                                                <img width="600" height="600" src="<?= $sanPham['img'] ?>" class="post-image" alt="">
                                                                                <img width="600" height="600" src="<?= $sanPham['img'] ?>" class="hover-image back" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-button">
                                                                            <div class="btn-add-to-cart" data-title="Add to cart">
                                                                                <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                                            </div>
                                                                            <div class="btn-wishlist" data-title="Wishlist">
                                                                                <button class="product-btn">Add to wishlist</button>
                                                                            </div>
                                                                            <div class="btn-compare" data-title="Compare">
                                                                                <button class="product-btn">Compare</button>
                                                                            </div>
                                                                            <span class="product-quickview" data-title="Quick View">
                                                                                <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="products-content">
                                                                        <div class="contents text-center">
                                                                            <div class="rating">
                                                                                <div class="star star-0"></div><span class="count">(0 review)</span>
                                                                            </div>
                                                                            <h3 class="product-title"><a href="shop-details.html"><?= $sanPham['ten'] ?></a></h3>
                                                                            <span class="price"><?= $sanPham['gia_ban'] ?>đ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <nav class="pagination">
                                            <ul class="page-numbers">
                                                <li><a class="prev page-numbers" href="#">Previous</a></li>
                                                <li><span aria-current="page" class="page-numbers current">1</span></li>
                                                <li><a class="page-numbers" href="#">2</a></li>
                                                <li><a class="page-numbers" href="#">3</a></li>
                                                <li><a class="next page-numbers" href="#">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <footer id="site-footer" class="site-footer background four-columns">
            <div class="footer">
                <div class="section-padding">
                    <div class="section-container">
                        <div class="block-widget-wrap">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 column-1">
                                    <div class="block block-menu m-b-20">
                                        <h2 class="block-title">Liên hệ với chúng tôi</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <span>Trụ sở chính:</span> Trịnh Văn Bô - Nam Từ Liêm - Hà Nội
                                                </li>
                                                <li>
                                                    <span>Điện thoại:</span> 01743 234500
                                                </li>
                                                <li>
                                                    <span>Email:</span> <a href="mailto:support@mojuri.com">support@oulook.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="block block-social">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 column-2">
                                    <div class="block block-menu">
                                        <h2 class="block-title">Dịch vụ khách hàng</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <a href="shop-grid-left.html">Liên hệ với chúng tôi</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Theo dõi đơn hàng của bạn</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Chăm sóc và sửa chữa sản phẩm</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Đặt lịch hẹn</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Câu hỏi thường gặp</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Vận chuyển và hoàn trả</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 column-3">
                                    <div class="block block-menu">
                                        <h2 class="block-title">Về chúng tôi</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <a href="#">Về chúng tôi</a>
                                                </li>
                                                <li>
                                                    <a href="#">Câu hỏi thường gặp</a>
                                                </li>
                                                <li>
                                                    <a href="#">Nhà sản xuất của chúng tôi</a>
                                                </li>
                                                <li>
                                                    <a href="#">Sơ đồ trang web</a>
                                                </li>
                                                <li>
                                                    <a href="#">Điều khoản và điều kiện</a>
                                                </li>
                                                <li>
                                                    <a href="#">Chính sách bảo mật</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 column-4">
                                    <div class="block block-menu">
                                        <h2 class="block-title">Danh mục</h2>
                                        <div class="block-content">
                                            <ul>
                                                <li>
                                                    <a href="shop-grid-left.html">Bông tai</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Dây chuyền</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Vòng tay</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Nhẫn</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Hộp đựng trang sức</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-left.html">Trâm</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="section-padding">
                    <div class="section-container">
                        <div class="block-widget-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="footer-left">
                                        <p class="copyright">Bản quyền © 2024. T-Shirt</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="footer-right">
                                        <div class="block block-image">
                                            <img width="309" height="32" src="media/payments.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Back Top button -->
    <div class="back-top button-show">
        <i class="arrow_carrot-up"></i>
    </div>

    <!-- Search -->


    <!-- Wishlist -->
    <div class="wishlist-popup">
        <div class="wishlist-popup-inner">
            <div class="wishlist-popup-content">
                <div class="wishlist-popup-content-top">
                    <span class="wishlist-name">Wishlist</span>
                    <span class="wishlist-count-wrapper"><span class="wishlist-count">2</span></span>
                    <span class="wishlist-popup-close"></span>
                </div>
                <div class="wishlist-popup-content-mid">
                    <table class="wishlist-items">
                        <tbody>
                            <tr class="wishlist-item">
                                <td class="wishlist-item-remove"><span></span></td>
                                <td class="wishlist-item-image">
                                    <a href="shop-details.html">
                                        <img width="600" height="600" src="media/product/3.jpg" alt="">
                                    </a>
                                </td>
                                <td class="wishlist-item-info">
                                    <div class="wishlist-item-name">
                                        <a href="shop-details.html">Twin Hoops</a>
                                    </div>
                                    <div class="wishlist-item-price">
                                        <span>$150.00</span>
                                    </div>
                                    <div class="wishlist-item-time">June 4, 2022</div>
                                </td>
                                <td class="wishlist-item-actions">
                                    <div class="wishlist-item-stock">
                                        In stock
                                    </div>
                                    <div class="wishlist-item-add">
                                        <div data-title="Add to cart">
                                            <a rel="nofollow" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="wishlist-item">
                                <td class="wishlist-item-remove"><span></span></td>
                                <td class="wishlist-item-image">
                                    <a href="shop-details.html">
                                        <img width="600" height="600" src="media/product/4.jpg" alt="">
                                    </a>
                                </td>
                                <td class="wishlist-item-info">
                                    <div class="wishlist-item-name">
                                        <a href="shop-details.html">Yilver And Turquoise Earrings</a>
                                    </div>
                                    <div class="wishlist-item-price">
                                        <del aria-hidden="true"><span>$150.00</span></del>
                                        <ins><span>$100.00</span></ins>
                                    </div>
                                    <div class="wishlist-item-time">June 4, 2022</div>
                                </td>
                                <td class="wishlist-item-actions">
                                    <div class="wishlist-item-stock">
                                        In stock
                                    </div>
                                    <div class="wishlist-item-add">
                                        <div data-title="Add to cart">
                                            <a rel="nofollow" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wishlist-popup-content-bot">
                    <div class="wishlist-popup-content-bot-inner">
                        <a class="wishlist-page" href="shop-wishlist.html">
                            Open wishlist page
                        </a>
                        <span class="wishlist-continue" data-url="">
                            Continue shopping
                        </span>
                    </div>
                    <div class="wishlist-notice wishlist-notice-show">Added to the wishlist!</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compare -->


    <!-- Quickview -->


    <!-- Page Loader -->


    <!-- Dependency Scripts -->
    <script src="libs/popper/js/popper.min.js"></script>
    <script src="libs/jquery/js/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/slick/js/slick.min.js"></script>
    <script src="libs/mmenu/js/jquery.mmenu.all.min.js"></script>
    <script src="libs/slider/js/tmpl.js"></script>
    <script src="libs/slider/js/jquery.dependClass-0.1.js"></script>
    <script src="libs/slider/js/draggable-0.1.js"></script>
    <script src="libs/slider/js/jquery.slider.js"></script>

    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from caketheme.com/html/mojuri/shop-grid-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 11:03:00 GMT -->

</html>