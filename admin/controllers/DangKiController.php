<?php
class DangKiController
{
    public $modelDangKi;

    public function __construct()
    {
        $this->modelDangKi = new DangKy();
    }
    public function danhSachQuanTri()
    {
        $lisQuanTri = $this->modelDangKi->getAllDangKi(1);
        // var_dump($lisQuanTri);die;
        require_once './views/dangki/dangki.php';
    }
    public function formDangKi()
    {
        require_once './views/dangki/formDangKi.php';
        // deleteSessionError();
    }
    public function dangky()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $ho_ten = $_POST['ho_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $this->modelDangKi->checkDangKy($email, $password, $ho_ten, $so_dien_thoai);
            header("Location: ?act=login-admin");
        }
    }
}