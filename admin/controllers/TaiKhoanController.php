<?php
class TaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan();
        // vat_dump($lisQuanTri);die;
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        // deleteSessionError();
    }
    public function postAddQuanTri()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            // var_dump($email);

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên  không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Emaili không được để trống';
            }

            $_SESSION['error'] = $errors;



            if (empty($errors)) {
                $password = "123456";
                $chuc_vu_id = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                // unset($_SESSION['errors']);
                header("Location: ?act=list-tai-khoan-quan-tri");
            } else {
                $_SESSION['flash'] = true;
                header("Location: ?act=form-them-quan-tri");
                exit();
            }
        }
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if (gettype($user) != 'string') {
                if ($user['email'] == $email) {
                    $_SESSION['user_admin'] = $user;
                    $_SESSION['flash'] = false;
                    if ($user['chuc_vu_id'] == 1) {
                        header("Location: ?act=dashboard");
                    } else {
                        header("Location: /web_Tshirt/?act=home");
                    }
                    exit();
                }
            } else {
                $_SESSION['flash'] = $user;
                header("Location: /web_Tshirt/?act=home");
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: ?act=login-admin");
            exit();
        }
    }
    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        require_once './views/taikhoan/quantri/editQuanTri.php';
    }
    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $trang_thai = $_POST['trang_thai'];
            $so_dien_thoai = $_POST['so_dien_thoai'];

            // var_dump();

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email nguoi nhan không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái vui long chọn';
            }


            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $trang_thai, $so_dien_thoai);
                unset($_SESSION['errors']);
                header("Location: ?act=list-tai-khoan-quan-tri");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-quan-tri&id_quan_tri=" . $quan_tri_id);
                exit();
            }
        }
    }



    //
    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getAllTaiKhoanformEmail($email);
        // var_dump($thongTin);die;
        require_once './views/taikhoan/canhan/editCaNhan.php';
    }
    public function postEditMatKhauCaNhan()
    {
        // var_dump($_POST);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            // var_dump($old_pass);die;

            // Lấy thông tin user từ session
            $user_id = $_SESSION['user_admin']['id'];
            $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($user_id);

            $checkPass = $old_pass == $user['mat_khau'];

            $errors = [];

            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
            }
            if ($new_pass != $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không khớp';
            }
            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng điền trường dữ liệu';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng điền trường dữ liệu';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng điền trường dữ liệu';
            }
            $_SESSION['error'] = $errors;

            if (!$errors) {
                $hashPass = $new_pass;
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;
                    header("Location: ?act=form-sua-thong-tin-ca-nhan");
                }
            } else {
                $_SESSION['flash'] = true;
                header("Location: ?act=form-sua-thong-tin-ca-nhan");
                exit();
            }

        }








    }
    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $password = "123456";
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if ($status) {
            header("Location: ?act=list-tai-khoan-quan-tri");
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
            die;
        }
    }
public function postEditCaNhanQuanTri(){
    require_once './views/taikhoan/canhan/postEditCaNhanQuanTri';
}

}