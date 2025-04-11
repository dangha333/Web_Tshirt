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
}
