<?php
class LienHeController
{

    // Kết nối đến file model
    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
    }

    public function index()
    {
        // Lấy ra dữ liệu liên hệ
        $lienhes = $this->modelLienHe->getAll();
        require_once './views/LienHe/list_lien_he.php';
    }

    public function create()
    {
        require_once './views/LienHe/them_lien_he.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $ngay_gio = $_POST['trang_thai'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $noi_dung = $_POST['noi_dung'];

            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Vui lòng nhập tên liên hệ';
            }
            if (empty($ngay_gio)) {
                $errors['trang_thai'] = 'Vui lòng nhập ngày giờ';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Vui lòng nhập nội dung';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }

            // Thêm dữ liệu
            if (empty($errors)) {
                $this->modelLienHe->postData($name, $so_dien_thoai, $noi_dung, $ngay_gio);
                unset($_SESSION['errors']);
                header('Location: ?act=lien-he');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-lien-he');
                exit();
            }
        }
    }

    // Hiển thị form sửa
    public function edit()
    {
        $id = $_GET['lien_he_id'];
        $lienhe = $this->modelLienHe->getDetailData($id);
        require_once './views/LienHe/sua_lien_he.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['ten_lien_he'];
            $ngay_gio = $_POST['trang_thai'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $noi_dung = $_POST['noi_dung'];

            $errors = [];
            if (empty($name)) {
                $errors['ten_lien_he'] = 'Vui lòng nhập tên liên hệ';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Vui lòng nhập nội dung';
            }
            if (empty($ngay_gio)) {
                $errors['trang_thai'] = 'Vui lòng nhập ngày giờ';
            }

            if (empty($errors)) {
                $this->modelLienHe->updateData($id, $name, $so_dien_thoai, $noi_dung, $ngay_gio);
                unset($_SESSION['errors']);
                header('Location: ?act=lien-he');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-lien-he');
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['lien_he_id'];
            $this->modelLienHe->deleteData($id);
            header('Location: ?act=lien-he');
            exit();
        }
    }
}
