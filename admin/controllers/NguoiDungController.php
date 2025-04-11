<?php
class NguoiDungController
{
    // ket noiden file model
    public $modelNguoiDung;

    public function __construct()
    {
        $this->modelNguoiDung = new NguoiDung();
    }
    public function index()
    {
        //Lay ra du lieu banner
        $nguoi_dungs = $this->modelNguoiDung->getAll();
        require_once "./views/nguoidung/list_nguoi_dung.php";
    }
    public function create()
    {

        require_once "./views/nguoidung/create_nguoi_dung.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }

            //them du lieu
            if (empty($errors)) {
                $this->modelNguoiDung->postNguoiDung($ho_ten, $email, $mat_khau, $so_dien_thoai, $dia_chi);
                unset($_SESSION['errors']);
                // echo "Thêm thành công";
                header("Location: ?act=nguoi-dungs");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-them-nguoi-dung");
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['nguoi_dung_id'];
        $nguoi_dung = $this->modelNguoiDung->getDetailData($id);


        require_once "./views/nguoidung/edit_nguoi_dung.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }



            if (empty($errors)) {
                $this->modelNguoiDung->updateNguoiDung($id, $ho_ten, $email, $mat_khau, $so_dien_thoai, $dia_chi);
                unset($_SESSION['errors']);
                header("Location: ?act=nguoi-dungs");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-nguoi-dung");
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['nguoi_dung_id'];
            // var_dump($id);

            $this->modelNguoiDung->deleteNguoiDung($id);

            header("Location: ?act=nguoi-dungs");
            exit();
        }
    }
}
