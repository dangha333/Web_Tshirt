<?php
class TinTucController
{

    //Ket noi den file model
    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }
    public function index()
    {
        $TinTucs = $this->modelTinTuc->getAll();
        require_once './views/TinTuc/list_tin_tuc.php';
    }
    public function create()
    {
        require_once './views/TinTuc/them_tin_tuc.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = $_POST['date'];

            $errors = [];
            if (empty($title)) {
                $errors['title'] = 'Vui lòng nhập tiêu đề';
            }
            if (empty($content)) {
                $errors['content'] = 'Vui lòng nhập mô tả';
            }
            if (empty($date)) {
                $errors['date'] = 'Vui lòng nhập ngày xuất bản';
            }

            // Xử lý ảnh tải lên
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/'; // Thư mục lưu ảnh
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Tạo đường dẫn lưu ảnh
                $uploadFile = $uploadDir . basename($_FILES['img']['name']);
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                    $errors['img'] = 'Không thể tải lên ảnh';
                } else {
                    $imgPath = $uploadFile;
                }
            } else {
                $errors['img'] = 'Vui lòng chọn một file ảnh hợp lệ';
            }

            // Thêm dữ liệu nếu không có lỗi
            if (empty($errors)) {
                $this->modelTinTuc->postData($title, $content, $imgPath, $date);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] =  $errors;
                header('Location: ?act=form-them-tin-tuc');
                exit();
            }
        }
    }

    //Hien thi form sua
    public function edit()
    {
        $id = $_GET['tin_tuc_id'];
        //Lay thong tin chi tiet cua danh muc
        $Tintuc = $this->modelTinTuc->getDetailData($id);

        //Do du lieu ra form
        require_once './views/TinTuc/sua_tin_tuc.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $img = $_FILES['img'];
            $date = $_POST['date'];

            $errors = [];
            if (empty($title)) {
                $errors['title'] = 'Vui lòng nhập tiêu đề';
            }
            if (empty($content)) {
                $errors['content'] = 'Vui lòng nhập mô tả';
            }
            if (empty($date)) {
                $errors['date'] = 'Vui lòng nhập ngày xuất bản';
            }

            // Kiểm tra nếu có file ảnh mới
            if (isset($img) && $img['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'imgs/uploads'; // Thư mục lưu ảnh
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Tạo đường dẫn lưu ảnh
                $uploadFile = $uploadDir . basename($img['name']);
                if (!move_uploaded_file($img['tmp_name'], $uploadFile)) {
                    $errors['img'] = 'Không thể tải lên ảnh';
                } else {
                    $imgPath = $uploadFile;
                }
            } else {
                // Nếu không có ảnh mới, giữ ảnh cũ
                $Tintuc = $this->modelTinTuc->getDetailData($id);
                $imgPath = $Tintuc['img'];  // Giữ ảnh cũ trong cơ sở dữ liệu
            }

            // Thêm dữ liệu vào cơ sở dữ liệu nếu không có lỗi
            if (empty($errors)) {
                $this->modelTinTuc->updateData($id, $title, $content, $imgPath, $date);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-tin-tuc');
                exit();
            }
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['tin_tuc_id'];

            //Xoa danh muc
            $this->modelTinTuc->deleteData($id);
            header('Location: ?act=tin-tucs');
            exit();
        }
    }
}
