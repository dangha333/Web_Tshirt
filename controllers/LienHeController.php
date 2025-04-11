<?php


class LienHeController
{
    //Kết nối file moddel
    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
    }

   // Hàm xử lý thêm vào CSDL
   public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $email = $_POST['email'];
        
        $noi_dung = $_POST['noi_dung'];
        $ngay_gio = date('Y-m-d H:i:s');
        

        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Bạn phải nhập tên liên hệ';
        }
        if (empty($so_dien_thoai)) {
            $errors['so_dien_thoai'] = 'Bạn phải nhập số điện thoại liên hệ';
        }
        if (empty($email)) {
            $errors['email'] = 'Bạn phải nhập email';
        }
      
        if (empty($noi_dung)) {
            $errors['noi_dung'] = 'Bạn phải nhập nội dung liên hệ';
        }

        if (empty($errors)) {
            $result = $this->modelLienHe->postDataClient($name,$so_dien_thoai,  $email, $noi_dung, $ngay_gio);
            if ($result) {
                // Thêm thành công, chuyển hướng với thông báo
                header('Location: ?act=home&status=success');
                exit();
            } else {
                // Xử lý lỗi khi thêm thất bại
                header('Location: ?act=lien-he&status=fail');
                exit();
            }
        } else {
            $_SESSION['errors'] = $errors;
            header('Location: ?act=lien-he');
            exit();
        }
    }
}



    public function view(){
      require_once './views/LienHe.php';


    }





}

