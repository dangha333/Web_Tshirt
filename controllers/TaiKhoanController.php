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
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        // deleteSessionError();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if (gettype($user) != 'string') {


                $_SESSION['flash'] = false;

                if ($user['chuc_vu_id'] == 2) {
                    $_SESSION['user'] = $user;
                    header("Location: ?act=home");

                } else {
                    $_SESSION['user-admin'] = $user;
                    header("Location: /web_Tshirt/admin?act=dashboard");

                }
                exit();

            } else {
                $_SESSION['flash'] = $user;
                header("Location: ?act=login");
                exit();
            }
        }
    }
    public function logout(): void
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: ?act=home");
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
        $email = $_SESSION['user'];
        $thongTin = $this->modelTaiKhoan->getAllTaiKhoanformEmail($email['email']);
        require_once './views/taikhoan/canhan/editCaNhan.php';
    }
    public function postEditMatKhauCaNhan()
    {
        // var_dump($_POST);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];


            // Lấy thông tin user từ session
            $user_id = $_SESSION['user']['email'];
            $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($user_id);
            $checkPass = $old_pass == $user['mat_khau'];
            $errors = [];
            $_SESSION['success'] = '';
            $_SESSION['error'] = '';

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
            if (!$errors) {
                $hashPass = $new_pass;
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;
                    header("Location: ?act=form-sua-thong-tin-ca-nhan");
                }
            } else {
                $_SESSION['error'] = $errors;
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

    public function postEditCaNhanQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            ;

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email nguoi nhan không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng điền số điện thoại';
            }


            if (empty($errors)) {
                $this->modelTaiKhoan->updateCaNhanQuanTri($id, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                unset($_SESSION['errors']);
                echo "<script>alert('Cập nhật thành công');window.location.href='?act=form-sua-thong-tin-ca-nhan'</script>";
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-thong-tin-ca-nhan");
                exit();
            }
        }
    }

}