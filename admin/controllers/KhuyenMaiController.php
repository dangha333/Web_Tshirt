<?php
class KhuyenMaiController
{

    //Hàm kết nối tới Model

    public $modelKhuyenMai;

    public function __construct()
    {
        $this->modelKhuyenMai = new KhuyenMai();
    }
    public function index()
    {
        $khuyenmais = $this->modelKhuyenMai->getAll();


        require_once "./views/khuyenmai/list_khuyen_mai.php";
    }

    public function create()
    {
        require_once "./views/khuyenmai/create_khuyen_mai.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $mo_ta = $_POST['mo_ta'];
            $giam_gia = $_POST['giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);

            $errors = [];

            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi không được để trống';
            }

            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả khuyến mãi không được để trống';
            }

            if (empty($giam_gia)) {
                $errors['giam_gia'] = 'Giảm giá khuyến mãi không được để trống';
            }

            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu khuyến mãi không được để trống';
            }


            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc khuyến mãi không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelKhuyenMai->postKhuyenMai($ten_khuyen_mai, $mo_ta, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);
                unset($_SESSION['errors']);
                header("Location: ?act=khuyen-mais");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-them-khuyen-mai");
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $khuyenmais = $this->modelKhuyenMai->getDetailData($id);
        // var_dump($danhmuc);

        require_once "./views/khuyenmai/edit_khuyen_mai.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $mo_ta = $_POST['mo_ta'];
            $giam_gia = $_POST['giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);

            $errors = [];

            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen$ten_khuyen_mai'] = 'Tên danh mục không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelKhuyenMai->updateData($id, $ten_khuyen_mai, $mo_ta, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);
                unset($_SESSION['errors']);
                header("Location: ?act=khuyen-mais");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=sua-khuyen-mai");
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['khuyen_mai_id'];
            // var_dump($id);

            $this->modelKhuyenMai->deleteKhuyenMai($id);

            header("Location: ?act=khuyen-mais");
            exit();
        }
    }
}
