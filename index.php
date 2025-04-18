<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/BannerController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/ChiTietSanPhamController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/KhuyenMaiController.php';
require_once './controllers/TinTucController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/DangKiController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/Banner.php';
require_once './models/TaiKhoan.php';
require_once './models/ChiTietSanPham.php';
require_once './models/LienHe.php';
require_once './models/KhuyenMai.php';
require_once './models/GioHang.php';
require_once './models/TinTuc.php';
require_once './models/DangKi.php';
require_once './models/ThanhToan.php';
require_once './models/DonHang.php';

// error_reporting(E_ERROR | E_PARSE);

checkAccess(); // dùng chung

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null; // Lấy ID từ URL, nếu không có thì gán giá trị null

// Xử lý match
match ($act) {
  // Trang chủ
  'home'                       => (new HomeController())->home(),
  'them-gio-hang'           => (new HomeController())->addGioHang(),
  'gio-hang'                => (new HomeController())->gioHang(),
  'cap-nhat-gio-hang'       => (new HomeController())->capNhatGioHang(),
  'xoa-san-pham-gio-hang'   => (new HomeController())->xoaSanPhamGioHang(),
  'thanh-toan'              => (new HomeController())->ThanhToan(),
  'xu-li-thanh-toan'          => (new HomeController())->postThanhtoan(),

  'lich-su-mua-hang'        => (new HomeController())->lichSuMuaHang(),
  'huy-don-hang'            => (new HomeController())->huyDonHang(),
  'xac-nhan-don-hang'            => (new HomeController())->xacNhanDonHang(),
  'tim-kiem-don-hang'       => (new HomeController())->timDonHang(),
  'xoa-don-hang'            => (new HomeController())->xoaDonHang(),
  'danh-muc-san-pham'      => (new SanPhamController())->sanpham(),



  'tim-kiem-san-pham'       => (new SanPhamController())->search(),
  'banner'                     => (new BannerController())->banner(),
  'tin-tuc'                   => (new TinTucController())->tintuc(),
  'alltin-tuc'                   => (new TinTucController())->home(),

  // Danh sách sản phẩm

  'danhsachsanpham' => (new SanPhamController())->sanpham(),


  // Chi tiết sản phẩm
  'chitietsanpham' => $id ? (new ChiTietSanPhamController())->chitietsanpham($id) : print("ID sản phẩm không hợp lệ."),
'themvaogio' => (new ChiTietSanPhamController())->themvaogio(),



  // // Chi tiết sản phẩm


  'them-binh-luan'            => (new ChiTietSanPhamController())->thembinhluan(),



  'check-login-admin' => (new TaiKhoanController())->login(),
  'form-sua-thong-tin-ca-nhan' => (new TaiKhoanController())->formEditCaNhanQuanTri(),
  'sua-thong-tin-ca-nhan' => (new TaiKhoanController())->postEditCaNhanQuanTri(),
  'sua-mat-khau-ca-nhan' => (new TaiKhoanController())->postEditMatKhauCaNhan(),
  'list-tai-khoan-quan-tri' => (new TaiKhoanController())->danhSachQuanTri(),




  'chitietdonhang'       => (new HomeController())->chiTietMuahang(),

  // Lien he
  'lien-he' => (new LienHeController())->view(),
  'add-lien-he' => (new LienHeController())->store(),

  // Khuyen mai
  'khuyen-mai' => (new KhuyenMaiController())->view(),
  //
  'login' => (new TaiKhoanController())->formLogin(),
  'check-login' => (new TaiKhoanController())->login(),
  'logout' => (new TaiKhoanController())->logout(),

  'dang-ky' => (new DangKiController())->formDangKi(),
  'check-dang-ky' => (new DangKiController())->dangky(),

  //giỏ hàng
  // 'them-gio-hang' => (new HomeController())->addGioHang(),

  //lọc sản phẩm
  'loc-san-pham-theo-gia' => (new SanPhamController())->filterByPrice(),

  default => (new HomeController())->home(),
};
