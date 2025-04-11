<?php

class KhuyenMaiController
{
    //kết nối file model
    public $modelKhuyenMai;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelKhuyenMai = new KhuyenMai();
        $this->modelSanPham = new SanPham();
    }
    //Hiển thị danh sách khuyến mãi
    public function view()
    {
        //lấy ra danh sách khuyến mãi
        $danhSachKhuyenMai = $this->modelKhuyenMai->getAllKhuyenMai();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();


        // var_dump($danhSachKhuyenMai);
        // die();

        //đưa dữ liệu ra view
        require_once './views/Khuyenmai.php';
    }
}
