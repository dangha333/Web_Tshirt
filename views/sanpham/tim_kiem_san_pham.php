<?php require_once 'views/layout/header.php'; ?>

<body class="shop">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once 'views/layout/menu.php'; ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">


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
                                                        <?php foreach ($timKiemSanPham as $key => $sanPham): ?>
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
                                            <div class="tab-pane fade" id="layout-list" role="tabpanel">
                                                <div class="products-list list">
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/1.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/1-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Medium Flat Hoops</a></h3>
                                                                    <span class="price">$150.00</span>
                                                                    <div class="rating">
                                                                        <div class="star star-5"></div>
                                                                        <div class="review-count">
                                                                            (1<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover border">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/5.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/5-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Yilver And Turquoise Earrings</a></h3>
                                                                    <span class="price">
                                                                        <del aria-hidden="true"><span>$150.00</span></del>
                                                                        <ins><span>$100.00</span></ins>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star star-0"></div>
                                                                        <div class="review-count">
                                                                            (0<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/2.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/2-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Bold Pearl Hoop Earrings</a></h3>
                                                                    <span class="price">$150.00</span>
                                                                    <div class="rating">
                                                                        <div class="star star-4"></div>
                                                                        <div class="review-count">
                                                                            (1<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover border">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/6.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/6-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Bora Armchair</a></h3>
                                                                    <span class="price">
                                                                        <del aria-hidden="true"><span>$120.00</span></del>
                                                                        <ins><span>$100.00</span></ins>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star star-0"></div>
                                                                        <div class="review-count">
                                                                            (0<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/3.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/3-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Twin Hoops</a></h3>
                                                                    <span class="price">
                                                                        <del aria-hidden="true"><span>$100.00</span></del>
                                                                        <ins><span>$90.00</span></ins>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star star-5"></div>
                                                                        <div class="review-count">
                                                                            (3<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover border">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/7.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/7-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Diamond Bracelet</a></h3>
                                                                    <span class="price">
                                                                        <del aria-hidden="true"><span>$79.00</span></del>
                                                                        <ins><span>$50.00</span></ins>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star star-5"></div>
                                                                        <div class="review-count">
                                                                            (2<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/4.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/4-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Yilver And Turquoise Earrings</a></h3>
                                                                    <span class="price">$120.00</span>
                                                                    <div class="rating">
                                                                        <div class="star star-4"></div>
                                                                        <div class="review-count">
                                                                            (1<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover border">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/8.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/8-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">X Hoop Earrings</a></h3>
                                                                    <span class="price">
                                                                        <del aria-hidden="true"><span>$200.00</span></del>
                                                                        <ins><span>$180.00</span></ins>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star star-5"></div>
                                                                        <div class="review-count">
                                                                            (4<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-entry clearfix product-wapper">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="products-thumb">
                                                                    <div class="product-lable">
                                                                        <div class="hot">Hot</div>
                                                                    </div>
                                                                    <div class="product-thumb-hover border">
                                                                        <a href="shop-details.html">
                                                                            <img width="600" height="600" src="media/product/9.jpg" class="post-image" alt="">
                                                                            <img width="600" height="600" src="media/product/9-2.jpg" class="hover-image back" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <span class="product-quickview" data-title="Quick View">
                                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="products-content">
                                                                    <h3 class="product-title"><a href="shop-details.html">Yintage Medallion Necklace</a></h3>
                                                                    <span class="price">$140.00</span>
                                                                    <div class="rating">
                                                                        <div class="star star-5"></div>
                                                                        <div class="review-count">
                                                                            (1<span> review</span>)
                                                                        </div>
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
                                                                    </div>
                                                                    <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                                                </div>
                                                            </div>
                                                        </div>
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
    <div class="search-overlay">
        <div class="close-search"></div>
        <div class="wrapper-search">
            <form role="search" method="GET" class="search-from ajax-search" action="?act=home">

                <div class="search-box">
                    <input type="hidden" name="act" value="tim-kiem-san-pham">
                    <input type="text" value="" name="tukhoa" placeholder="Nhãy nhập vào tên sản phẩm...">
                    <button id="searchsubmit" class="btn" type="submit" name="timkiem">
                        <i class="icon-search"></i>
                    </button>

                    <div class="content-menu_search">
                        <label>Đề xuất</label>
                        <ul id="menu_search" class="menu">
                          
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
    <div class="compare-popup">
        <div class="compare-popup-inner">
            <div class="compare-table">
                <div class="compare-table-inner">
                    <a href="#" id="compare-table-close" class="compare-table-close">
                        <span class="compare-table-close-icon"></span>
                    </a>
                    <div class="compare-table-items">
                        <table id="product-table" class="product-table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="#" class="compare-table-settings">Settings</a>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Twin Hoops</a> <span class="remove">remove</span>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Medium Flat Hoops</a> <span class="remove">remove</span>
                                    </th>
                                    <th>
                                        <a href="shop-details.html">Bold Pearl Hoop Earrings</a> <span class="remove">remove</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-image">
                                    <td class="td-label">Image</td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="media/product/3.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="media/product/1.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="shop-details.html">
                                            <img width="600" height="600" src="media/product/2.jpg" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="tr-sku">
                                    <td class="td-label">SKU</td>
                                    <td>VN00189</td>
                                    <td></td>
                                    <td>D1116</td>
                                </tr>
                                <tr class="tr-rating">
                                    <td class="td-label">Rating</td>
                                    <td>
                                        <div class="star-rating">
                                            <span style="width:80%"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="star-rating">
                                            <span style="width:100%"></span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="tr-price">
                                    <td class="td-label">Price</td>
                                    <td><span class="amount">$150.00</span></td>
                                    <td><del><span class="amount">$150.00</span></del> <ins><span class="amount">$100.00</span></ins></td>
                                    <td><span class="amount">$200.00</span></td>
                                </tr>
                                <tr class="tr-add-to-cart">
                                    <td class="td-label">Add to cart</td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div data-title="Add to cart">
                                            <a href="#" class="button">Add to cart</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="tr-description">
                                    <td class="td-label">Description</td>
                                    <td>Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                                    <td>The EcoSmart Fleece Hoodie full-zip hooded jacket provides medium weight fleece comfort all year around. Feel better in this sweatshirt because Hanes keeps plastic bottles of landfills by using recycled polyester.7.8 ounce fleece sweatshirt made with up to 5 percent polyester created from recycled plastic.</td>
                                </tr>
                                <tr class="tr-content">
                                    <td class="td-label">Content</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
                                </tr>
                                <tr class="tr-dimensions">
                                    <td class="td-label">Dimensions</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quickview -->
    <div class="quickview-popup">
        <div id="quickview-container">
            <div class="quickview-container">
                <a href="#" class="quickview-close"></a>
                <div class="quickview-notices-wrapper"></div>
                <div class="product single-product product-type-simple">
                    <div class="product-detail">
                        <div class="row">
                            <div class="img-quickview">
                                <div class="product-images-slider">
                                    <div id="quickview-slick-carousel">
                                        <div class="images">
                                            <div class="scroll-image">
                                                <div class="slick-wrap">
                                                    <div class="slick-sliders image-additional" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
                                                        <div class="img-thumbnail slick-slide">
                                                            <a href="media/product/3.jpg" class="image-scroll" title="">
                                                                <img width="900" height="900" src="media/product/3.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="img-thumbnail slick-slide">
                                                            <a href="media/product/3-2.jpg" class="image-scroll" title="">
                                                                <img width="900" height="900" src="media/product/3-2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quickview-single-info">
                                <div class="product-content-detail entry-summary">
                                    <h1 class="product-title entry-title">Twin Hoops</h1>
                                    <div class="price-single">
                                        <div class="price">
                                            <del><span>$150.00</span></del>
                                            <span>$100.00</span>
                                        </div>
                                    </div>
                                    <div class="product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                            <span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>
                                        <a href="#" class="review-link">(<span class="count">1</span> customer review)</a>
                                    </div>
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</p>
                                    </div>
                                    <form class="cart" method="post" enctype="multipart/form-data">
                                        <div class="quantity-button">
                                            <div class="quantity">
                                                <button type="button" class="plus">+</button>
                                                <input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                <button type="button" class="minus">-</button>
                                            </div>
                                            <button type="submit" class="single-add-to-cart-button button alt">Add to cart</button>
                                        </div>
                                        <button class="button quick-buy">Buy It Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

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