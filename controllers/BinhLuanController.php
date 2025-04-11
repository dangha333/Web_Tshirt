<?php
 class BinhLuanController {

    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new BinhLuan();
    }
    public function thembinhluan()
    {
        if(isset($_POST['submit'])){
            $ten_nguoi_binh_luan=$_POST['name'];
            $noi_dung = $_POST['comment'];
            $ngay_binh_luan = date("Y-m-d H:i:s");
            $san_pham_id = $_GET['id'];
            

            $this->modelBinhLuan->thembinhluan($san_pham_id,$ten_nguoi_binh_luan,$noi_dung,$ngay_binh_luan);

            header('Location:?act=chitietsanpham');
            exit();
        } else {
            header('Location:?act=danhsachsanpham');
            exit();
        }
    }
 }
?>