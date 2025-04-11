<?php
class DanhMucController
{

    //Hàm kết nối tới Model

    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }
    public function index()
    {
        $danhmucs = $this->modelDanhMuc->getAll();


        require_once "./views/danhmuc/list_danh_muc.php";
    }

    public function create()
    {
        require_once "./views/danhmuc/create_danh_muc.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);

            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->postDanhMuc($ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header("Location: ?act=danh-mucs");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-them-danh-muc");
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $danhmuc = $this->modelDanhMuc->getDetailData($id);
        // var_dump($danhmuc);

        require_once "./views/danhmuc/edit_danh_muc.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);

            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header("Location: ?act=danh-mucs");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=sua-danh-muc");
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            $this->modelDanhMuc->deleteDanhMuc($id);

            header("Location: ?act=danh-mucs");
            exit();
        }
    }
}
