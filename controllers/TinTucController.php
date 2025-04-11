<?php
class TinTucController
{

    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }

    public function home()
    {

        $TinTucs = $this->modelTinTuc->getAllTinTuc();
        var_dump($TinTucs);
        // require_once 'views/Home.php';
    }

    public function tintuc()
    {
        // Lấy ID từ URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Lấy bài viết chi tiết từ model
        $TinTucs = $this->modelTinTuc->getTinTucById($id);
        // var_dump($TinTucs);
        // die;

        // Nếu không tìm thấy bài viết, hiển thị lỗi
        if (!$TinTucs) {
            echo 'Không tìm thấy bài viết!';
            exit;
        }

        // Hiển thị view chi tiết bài viết
        require_once 'views/tintuc/tintuc.php';
    }
}
