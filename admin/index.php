<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DonHangController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/BaoCaoThongKeController.php';
require_once 'controllers/TaiKhoanController.php';
require_once 'controllers/DangKiController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/Banner.php';
require_once 'models/LienHe.php';
require_once 'models/TinTuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/KhuyenMai.php';
require_once 'models/SanPham.php';
require_once 'models/DonHang.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/ThongKe.php';
require_once 'models/TaiKhoan.php';
require_once 'models/DangKi.php';

// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    // Dashboards
    '/' => (new BaoCaoThongKeController())->home(),
    'thong-ke' => (new BaoCaoThongKeController())->home(),
    'dashboard' => (new DashboardController())->index(),

    // Quản lý danh mục
    'danh-mucs' => (new DanhMucController())->index(),
    'form-them-danh-muc' => (new DanhMucController())->create(),
    'them-danh-muc' => (new DanhMucController())->store(),
    'form-sua-danh-muc' => (new DanhMucController())->edit(),
    'sua-danh-muc' => (new DanhMucController())->update(),
    'xoa-danh-muc' => (new DanhMucController())->destroy(),

    // Quản lý banner
    'banners' => (new BannerController())->index(),
    'form-them-banner' => (new BannerController())->create(),
    'them-banner' => (new BannerController())->store(),
    'form-sua-banner' => (new BannerController())->edit(),
    'sua-banner' => (new BannerController())->update(),
    'xoa-banner' => (new BannerController())->destroy(),

    // Quản lý tin tức
    'tin-tucs' => (new TinTucController())->index(),
    'form-them-tin-tuc' => (new TinTucController())->create(),
    'them-tin-tuc' => (new TinTucController())->store(),
    'form-sua-tin-tuc' => (new TinTucController())->edit(),
    'sua-tin-tuc' => (new TinTucController())->update(),
    'xoa-tin-tuc' => (new TinTucController())->destroy(),

    // Quản lý liên hệ
    'lien-he' => (new LienHeController())->index(),
    'form-them-lien-he' => (new LienHeController())->create(),
    'them-lien-he' => (new LienHeController())->store(),
    'form-sua-lien-he' => (new LienHeController())->edit(),
    'sua-lien-he' => (new LienHeController())->update(),
    'xoa-lien-he' => (new LienHeController())->destroy(),

    // Quản lý người dùng
    'nguoi-dungs' => (new NguoiDungController())->index(),
    'form-them-nguoi-dung' => (new NguoiDungController())->create(),
    'them-nguoi-dung' => (new NguoiDungController())->store(),
    'form-sua-nguoi-dung' => (new NguoiDungController())->edit(),
    'sua-nguoi-dung' => (new NguoiDungController())->update(),
    'xoa-nguoi-dung' => (new NguoiDungController())->destroy(),

    // Quản lý khuyến mãi
    'khuyen-mais' => (new KhuyenMaiController())->index(),
    'form-them-khuyen-mai' => (new KhuyenMaiController())->create(),
    'them-khuyen-mai' => (new KhuyenMaiController())->store(),
    'form-sua-khuyen-mai' => (new KhuyenMaiController())->edit(),
    'sua-khuyen-mai' => (new KhuyenMaiController())->update(),
    'xoa-khuyen-mai' => (new KhuyenMaiController())->destroy(),

    // Quản lý sản phẩm
    'san-phams' => (new SanPhamController())->index(),
    'tim-kiem-san-pham' => (new SanPhamController())->search(),
    'form-them-san-pham' => (new SanPhamController())->create(),
    'them-san-pham' => (new SanPhamController())->store(),
    'form-sua-san-pham' => (new SanPhamController())->edit(),
    'sua-san-pham' => (new SanPhamController())->update(),
    'xoa-san-pham' => (new SanPhamController())->destroy(),
    'chi-tiet-san-pham' => (new SanPhamController())->DetailSanPham(),
    'xoa-binh-luan' => (new SanPhamController())->deleteReview(),
    'xoa-danh-gia' => (new SanPhamController())->deleteDanhgia(),
    
    // Quản lý trạng thái đơn hàng
    'trang-thai-don-hangs' => (new TrangThaiDonHangController())->index(),
    'form-them-trang-thai-don-hang' => (new TrangThaiDonHangController())->create(),
    'them-trang-thai-don-hang' => (new TrangThaiDonHangController())->store(),
    'sua-trang-thai-don-hang' => (new TrangThaiDonHangController())->update(),
    'xoa-trang-thai-don-hang' => (new TrangThaiDonHangController())->destroy(),

    // Quản lý đơn hàng
    'don-hangs' => (new DonHangController())->index(),
    'form-sua-don-hang' => (new DonHangController())->edit(),
    'sua-don-hang' => (new DonHangController())->update(),
    'chi-tiet-don-hangs' => (new DonHangController())->detail(),
    'tim-don-hang' => (new DonHangController())->search(),

    // Quản lý tài khoản quản trị
    'list-tai-khoan-quan-tri' => (new TaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new TaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new TaiKhoanController())->postAddQuanTri(),
    //









    // Quản lý tài khoản Quản trị
    // 'list-tai-khoan-quan-tri' => (new TaiKhoanController())->danhSachQuanTri(),
    // 'form-them-quan-tri' => (new TaiKhoanController())->formAddQuanTri(),
    // 'them-quan-tri' => (new TaiKhoanController())->postAddQuanTri(),

    'form-sua-quan-tri' => (new TaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new TaiKhoanController())->postEditQuanTri(),
    'reset-password' => (new TaiKhoanController())->resetPassword(),
    'update-chuc-vu-ajax' => (new TaiKhoanController())->updateChucVuAjax(),




    //




    // 'login-admin' => (new TaiKhoanController())->formLogin(),
    // 'check-login-admin' => (new TaiKhoanController())->login(),
    // 'logout-admin' => (new TaiKhoanController())->logout(),



    //
    'login-admin' => (new TaiKhoanController())->formLogin(),
    'check-login-admin' => (new TaiKhoanController())->login(),
    'logout-admin' => (new TaiKhoanController())->logout(),
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postlogin(),
    'dang-ky' => (new DangKiController())->formDangKi(),
    'check-dang-ky' => (new DangKiController())->dangky(),

    // Quản lý thông tin cá nhân
    'form-sua-thong-tin-ca-nhan' => (new TaiKhoanController())->formEditCaNhanQuanTri(),
    'sua-thong-tin-ca-nhan' => (new TaiKhoanController())->postEditCaNhanQuanTri(),
    'sua-mat-khau-ca-nhan' => (new TaiKhoanController())->postEditMatKhauCaNhan(),

    
};
?>