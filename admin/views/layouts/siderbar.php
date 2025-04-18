<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Đường dẫn tới tệp CSS của bạn -->
    <style>
        /* Thay đổi màu nền của thanh bên trái */
        .app-menu {
            background-color: #000000;
            /* Màu đen */
        }

        /* Thay đổi màu chữ trong thanh bên trái */
        .app-menu .navbar-nav .nav-link,
        .app-menu .navbar-nav .menu-title {
            color: #ffffff;
            /* Màu trắng */
        }

        /* Thay đổi màu chữ cho các mục trong menu khi di chuột */
        .app-menu .navbar-nav .nav-link:hover {
            color: #cccccc;
            /* Màu xám nhạt khi di chuột */
        }
    </style>
</head>

<body>
    <div class="app-menu navbar-menu">
        <!-- LOGO -->

        <div class="navbar-brand-box">
            <a href="?act=thong-ke" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="17">
                </span>
            </a>
            <a href="?act=thong-ke" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="" height="17">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div class="dropdown sidebar-user m-1 rounded">
            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center gap-2">
                    <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="text-start">
                        <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                        <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                                class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                                class="align-middle">Online</span></span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <h6 class="dropdown-header">Welcome Anna!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="auth-logout-basic.html"><i
                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                        data-key="t-logout">Logout</span></a>
            </div>


        </div>

        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="?act=thong-ke">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Trang chủ</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarBanner" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarBanner">
                            <i class="ri-image-line"></i> <span data-key="t-dashboards">Banner</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarBanner">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=banners" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-banner" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarTinTuc" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarTinTuc">
                            <i class="ri-newspaper-line"></i> <span data-key="t-dashboards">Tin Tức</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTinTuc">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=tin-tucs" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-tin-tuc" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a href="#sidebarLienHe" class="nav-link menu-link" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLienHe">
                            <i class="ri-contacts-line"></i> <span data-key="t-pages">Liên hệ</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLienHe">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=lien-he" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-lien-he" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                      
                        <div class="collapse menu-dropdown" id="sidebarNguoiDung">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=nguoi-dungs" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-nguoi-dung" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDanhMuc">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Danh mục sản phẩm</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=danh-mucs" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-danh-muc" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>

        
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarKhuyenMai" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarKhuyenMai">
                            <i class="ri-gift-line"></i> <span data-key="t-advance-ui">Khuyến Mãi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarKhuyenMai">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=khuyen-mais" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-khuyen-mai" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSanPham" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSanPham">
                            <i class="ri-shopping-bag-line"></i> <span data-key="t-dashboards">Sản phẩm</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSanPham">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=san-phams" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-san-pham" class="nav-link" data-key="t-nestable-list">Thêm
                                        mới</a>
                                </li>
                                <li class="nav-item">
                <a href="?act=chi-tiet-san-pham" class="nav-link">Chi tiết sản phẩm</a>
            </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarTrangThaiDonHang" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarTrangThaiDonHang">
                            <i class="ri-shopping-cart-line"></i> <span data-key="t-advance-ui">Trạng thái đơn hàng
                            </span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTrangThaiDonHang">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=trang-thai-don-hangs" class="nav-link" data-key="t-sweet-alerts">Danh
                                        sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?act=form-them-trang-thai-don-hang" class="nav-link"
                                        data-key="t-nestable-list">Thêm mới</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDonHang" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDonHang">
                            <i class="ri-shopping-bag-fill"></i> <span data-key="t-advance-ui">Đơn hàng </span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDonHang">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=don-hangs" class="nav-link" data-key="t-sweet-alerts">Danh sách</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Quản lý tài khoản</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#sidebarDonHang" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>Tài khoản quản trị</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>Tài khoản khách hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>Quản lý tài khoản cá nhân</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarTaiKhoan" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarTaiKhoan">
                            <i class="ri-user-fill"></i> <span data-key="t-advance-ui">Quản lý tài khoản </span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTaiKhoan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?act=list-tai-khoan-quan-tri" class="nav-link" data-key="t-sweet-alerts">Tài khoản quản trị</a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
</body>

</html>
<!-- #region -->