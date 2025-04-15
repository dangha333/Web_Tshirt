<?php
require_once 'models/ChiTietSanPham.php';
require_once 'models/SanPham.php';

class ChiTietSanPhamController {
    private $chiTietSanPhamModel;
    private $sanPhamModel;

    public function __construct() {
        $this->chiTietSanPhamModel = new ChiTietSanPham();
        $this->sanPhamModel = new SanPham();
    }

    // Hiển thị danh sách chi tiết sản phẩm
    public function index() {
        $dsChiTiet = $this->chiTietSanPhamModel->layTatCa();
        
        // Debug: Kiểm tra dữ liệu trả về
        if (empty($dsChiTiet)) {
            echo "Không có dữ liệu chi tiết sản phẩm từ model.";
        } else {
            var_dump($dsChiTiet); // Xem cấu trúc dữ liệu
        }
        
        $dsChiTiet = $dsChiTiet ?? [];
        include 'views/chitietsanpham/list.php';
    }

    // ... (các hàm khác như them, luuThem, sua, luuSua, xoa đã được định nghĩa trước đó)
}