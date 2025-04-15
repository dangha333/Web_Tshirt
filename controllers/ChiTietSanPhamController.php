<?php
class ChiTietSanPhamController
{

    //Ket noi den file model
    public $modelchiTietSanPham;
    public $modelSanPham;

    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelchiTietSanPham = new ChiTietSanPham();
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan=new TaiKhoan();
    }
    public function chitietsanpham($san_pham_id)
    {

        $chiTietSanPham = $this->modelchiTietSanPham->getAllChiTietSanPham($san_pham_id);
        $albumHinhAnh = $this->modelchiTietSanPham->getAlbumHinhAnh($san_pham_id);
        $listBinhLuan = $this->modelchiTietSanPham->getAllBinhLuan($san_pham_id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if ($chiTietSanPham && is_array($chiTietSanPham)) {
            $listSanPhamCungDanhMuc = $this->modelchiTietSanPham->getSanPhamCungDanhMuc($chiTietSanPham['danh_muc_id']);
        } else {
            // Có thể redirect về trang lỗi hoặc show thông báo
            echo "Không tìm thấy thông tin sản phẩm!";
            exit();
        }


        require_once './views/chitietsanpham.php';
    }

    public function thembinhluan()
    {
        $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_nguoi_binh_luan=$user['ho_ten'];
            $noi_dung = $_POST['comment'];
            $ngay_binh_luan = date("Y-m-d H:i:s");
            $san_pham_id = $_POST['san_pham_id'];

            

            $this->modelchiTietSanPham->thembinhluan($san_pham_id,$ten_nguoi_binh_luan,$noi_dung,$ngay_binh_luan);

            header('Location:?act=chitietsanpham&id=' . $san_pham_id);
exit();

        
        } else {
            header('Location:?act=danhsachsanpham');
            exit();
        }
        
    }
    public function themvaogio() {
       // Ví dụ: File xử lý thêm sản phẩm vào giỏ hàng (có thể nằm trong controller)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them_vao_gio_hang'])) {
    $san_pham_id = $_POST['san_pham_id'];
    $so_luong = $_POST['so_luong'];
    $size = $_POST['size']; // Lấy size từ form
    $color = $_POST['color']; // Lấy color từ form
    $gia_ban = $_POST['gia_ban']; // Giả sử giá bán được gửi từ form
    $gia_km = $_POST['gia_km'] ?? null; // Giá khuyến mãi (nếu có)
    $ten = $_POST['ten']; // Tên sản phẩm
    $img = $_POST['img']; // Ảnh sản phẩm

    // Khởi động session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Nếu giỏ hàng chưa tồn tại, khởi tạo
    if (!isset($_SESSION['gio_hang'])) {
        $_SESSION['gio_hang'] = [];
    }

    // Tạo mảng sản phẩm
    $san_pham = [
        'san_pham_id' => $san_pham_id,
        'ten' => $ten,
        'img' => $img,
        'gia_ban' => $gia_ban,
        'gia_km' => $gia_km,
        'so_luong' => $so_luong,
        'size' => $size, // Lưu size
        'color' => $color, // Lưu color
    ];

    // Thêm sản phẩm vào giỏ hàng (có thể kiểm tra trùng lặp nếu cần)
    $_SESSION['gio_hang'][] = $san_pham;
}
    }

}
