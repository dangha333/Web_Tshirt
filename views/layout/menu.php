<header id="site-header" class="site-header header-v1 color-black">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <div class="header-desktop">
        <div class="header-wrapper">
            <div class="section-padding">
                <div class="section-container large p-l-r">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-left">
                            <div class="site-logo">
                                <a href="?act=home">
                                    <img
                                        src="media/logo2.png"
                                        alt="">
                                </a>
                            </div>
                        </div>


                        <div class=" col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
                            <div class="site-navigation">
                                <nav id="main-navigation">
                                    <ul id="menu-main-menu" class="menu">
                                        <li class="level-0">
                                            <a href="?act=home"><span class="menu-item-text">Trang chủ</span></a>
                                        <li class="level-0 menu-item menu-item-has-children">
                                            <a href="?act=danhsachsanpham"><span class="menu-item-text">Shop</span></a>
                                            <ul class="sub-menu">
                                                <li class="level-1 menu-item menu-item-has-children">
                                                    <?php foreach ($listDanhMuc as $key => $danhMuc) :?>
                                                        <a href="?act=danh-muc-san-pham&iddm=<?= $danhMuc['id'] ?>"><span
                                                                class="menu-item-text"><?= $danhMuc['ten_danh_muc'] ?></span></a>
                                                    <?php endforeach ?>
                                                </li>
                                            </ul>
                                        </li>
                                    
                                        <li class="level-0 menu-item menu-item-has-children">
                                            <a href="#"><span class="menu-item-text">Trang</span></a>
                                            <ul class="sub-menu">


                                                <li>
                                                    <a href="?act=form-sua-thong-tin-ca-nhan"><span class="menu-item-text">Tài
                                                            khoản của tôi</span></a>
                                                </li>
                                                <li>
                                                    <a href="?act=lien-he"><span class="menu-item-text">Liên hệ</span></a>


                                                </li>
                                            </ul>
                                        </li>

                                        <li class="level-0 menu-item">
                                            <a href=""><span class="menu-item-text">Tin tức</span></a>
                                       
                                        </li>

                                        <li class="level-0 menu-item">


                                            <a href="?act=khuyen-mai"><span class="menu-item-text">Khuyến mại</span></a>

                                        </li>
                                    </ul>
                                    <ul>

                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-right">
                            <div class="header-page-link">
                                <!-- Tìm kiếm -->
                                <div class="search-box">
                                    <div class="search-toggle"><i class="icon-search"></i></div>
                                </div>

                                <!-- Đăng nhập -->
                                <?php if (isset($_SESSION['user'])) { ?>

                                    <a ><?php echo $_SESSION['user']['email'] ?></a>
                                <?php } else { ?>
                                    <div class="login-header icon">
                                        <a href="?act=login"><i class="icon-user"></i></a>
                                    </div>
                                <?php } ?>


                                <!-- giỏ hàng -->
                                <div class="wishlist-box">
                                    <a href="?act=gio-hang"> <i class="icon-large-paper-bag"></i></a>
                                </div>

                                <!-- Lịch sử mua hàng -->
                                <div class="wishlist-box">
                                    <a href="?act=lich-su-mua-hang">
                                        <i class="fas fa-history"></i>
                                    </a>
                                </div>

                                <!-- Thông tin tài khoản -->
                                <div class="wishlist-box">
                                    <a href="?act=form-sua-thong-tin-ca-nhan"><i class="fas fa-key"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
<style>
/* Thêm nền trắng cho header */
#site-header {
    background-color: white; /* Nền trắng */
    color: black; /* Đổi màu chữ thành đen để dễ nhìn */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Tạo đổ bóng nhẹ */
}

/* Thay đổi màu sắc của menu */
#menu-main-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: space-around; /* Căn đều các mục menu */
    align-items: center;
}
.site-logo img {
    width: 100px !important; /* Đặt !important để ghi đè */
    height: auto !important;
    max-width: none !important;
}


/* Điều chỉnh vùng chứa ảnh (nếu cần) */

/* Điều chỉnh header để phù hợp với logo to */
.header-left {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    height: auto; /* Tự động theo nội dung */
}

#menu-main-menu > li > a {
    text-decoration: none;
    color: black; /* Màu chữ menu */

   
    transition: background-color 0.3s ease, color 0.3s ease;
}

#menu-main-menu > li > a:hover {
    background-color: #f5f5f5; /* Nền xám nhạt khi hover */
    color: #333; /* Màu chữ đậm hơn khi hover */
    border-radius: 5px; /* Góc bo tròn khi hover */
}

/* Submenu (dropdown menu) */
.sub-menu {
    position: absolute;
    background-color: white; /* Nền trắng cho submenu */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Tạo đổ bóng cho submenu */
    list-style: none;
    padding: 10px 0;
    margin: 0;
    display: none; /* Ẩn submenu ban đầu */
}

.menu-item-has-children:hover .sub-menu {
    display: block; /* Hiển thị submenu khi hover */
}

.sub-menu > li > a {
    display: block;
    padding: ;
    color: black; /* Màu chữ của submenu */
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.sub-menu > li > a:hover {
    background-color: #f5f5f5; /* Nền xám nhạt khi hover submenu */
    color: #333; /* Màu chữ đậm hơn khi hover submenu */
}
</style>
