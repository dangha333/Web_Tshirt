<?php
class SanPhamController
{

    //Ket noi den file model
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function index()
    {
        $listSanPham = $this->modelSanPham->getAll();

        require_once './views/sanpham/list_san_pham.php';
    }
    public function create()
    {
        $danhmucs = $this->modelDanhMuc->getAll();
        require_once './views/sanpham/them_san_pham.php';
        deleteSessionError();
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $gia_nhap = $_POST['gia_nhap'] ?? '';
            $gia_ban = $_POST['gia_ban'] ?? '';
            $gia_km = $_POST['gia_km'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $date = $_POST['date'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';

            $img = $_FILES['img'] ?? '';

            //Lưu hình ảnh vào thư mục uploads
            $file_thumb = uploadFile($img, './uploads/');
            // var_dump($file_thumb);


            $errors = [];

            // Các kiểm tra khác
            if (empty($ten)) {
                $errors['ten'] = 'Vui lòng nhập tên sản phẩm';
            }
            if ($img['error'] !== 0) {
                $errors['img'] = 'Vui lòng nhập hình ảnh';
            }
            if (empty($gia_nhap)) {
                $errors['gia_nhap'] = 'Vui lòng nhập giá nhập';
            }
            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'Vui lòng nhập giá bán';
            }
            if (empty($gia_km)) {
                $errors['gia_km'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Vui lòng nhập số lượng';
            }
            if (empty($date)) {
                $errors['date'] = 'Vui lòng nhập ngày';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh sách';
            }

            $_SESSION['errors'] = $errors;

            // Thêm dữ liệu
            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->postData($ten, $file_thumb, $gia_nhap, $gia_ban,  $gia_km, $mo_ta, $so_luong, $date, $trang_thai, $danh_muc_id);

                // Kiểm tra và lưu album hình ảnh nếu có
                if (isset($_FILES['img_array']) && !empty($_FILES['img_array']['name'][0])) {
                    $img_array = $_FILES['img_array'];
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $album_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->albumHinhAnh($san_pham_id, $album_hinh_anh);
                    }
                }
                // echo "Thêm thành công";
                header('Location: ?act=san-phams');
            } else {
                $_SESSION['flash'] = true;
                header('Location: ?act=form-them-san-pham');
                exit();
            }
        }
    }


    //Hien thi form sua
    public function edit()
    {
        $id = $_GET['san_pham_id'];

        $SanPham = $this->modelSanPham->getDetailData($id);

        $listSanPham = $this->modelSanPham->getAlbumHinhAnh($id);

        $danhmucs = $this->modelDanhMuc->getAll();

        //Do du lieu ra form
        require_once './views/sanpham/sua_san_pham.php';
        deleteSessionError();
    }

    public function DetailSanPham()
    {
        $id = $_GET['san_pham_id'];

        $SanPham = $this->modelSanPham->getDetailData($id);

        $listSanPham = $this->modelSanPham->getAlbumHinhAnh($id);

        $binhLuan = $this->getBinhLuanBySanPhamId($id);

        $danhmucs = $this->modelDanhMuc->getAll();

        $danhgia = $this->getDanhGia($id);

        //Do du lieu ra form
        require_once './views/sanpham/chi_tiet_san_pham.php';
        deleteSessionError();
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $san_pham_id = $_POST['san_pham_id'];

            $sanPhamOld = $this->modelSanPham->getDetailData($san_pham_id);
            $old_file = $sanPhamOld['img']; //Lấy ảnh cũ nếu có sửa ảnh mới


            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $gia_nhap = $_POST['gia_nhap'];
            $gia_ban = $_POST['gia_ban'];
            $gia_km = $_POST['gia_km'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            $so_luong = $_POST['so_luong'];
            $date = $_POST['date'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $img = $_FILES['img'];

            $errors = [];



            // Các kiểm tra khác
            if (empty($ten)) {
                $errors['ten'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($gia_nhap)) {
                $errors['gia_nhap'] = 'Vuiź nhập giá nhập';
            }
            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'Vui lòng nhập giá bán';
            }
            if (empty($gia_km)) {
                $errors['gia_km'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Vui lòng nhập số lượng';
            }
            if (empty($date)) {
                $errors['date'] = 'Vui lòng nhập ngày';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }

            if (isset($img) && $img['error'] === UPLOAD_ERR_OK) {
                $new_File = uploadFile($img, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_File = $old_file;
            }

            // Cập nhật dữ liệu
            if (empty($errors)) {
                $this->modelSanPham->updateData($id, $ten, $new_File, $gia_nhap, $gia_ban, $gia_km, $trang_thai, $mo_ta, $so_luong, $date, $danh_muc_id);
                unset($_SESSION['errors']);
                header('Location: ?act=san-phams');
            } else {
                $_SESSION['errors'] =  $errors;
                header('Location: ?act=form-sua-san-pham');
                exit();
            }
        }
    }

    public function getBinhLuanBySanPhamId($san_pham_id)
    {
        $binhLuan = $this->modelSanPham->getBinhLuanBySanPhamId($san_pham_id);
        return $binhLuan;
    }

    public function getDanhGia($san_pham_id)
    {
        $danhgia = $this->modelSanPham->getDanhGia($san_pham_id);

        return $danhgia;
    }
    public function deleteReview()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelSanPham->deleteReviewById($id);

            // Sau khi xóa thành công, chuyển hướng về trang chi tiết sản phẩm
            header('Location: ?act=chi-tiet-san-pham&id=' . $_GET['san_pham_id']);
        } else {
            echo "Khong tim thay id";
        }
    }

    public function deleteDanhGia()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->modelSanPham->deleteDanhGiaById($id);

            // Sau khi xóa thành công, chuyển hướng về trang chi tiết sản phẩm
            header('Location: ?act=chi-tiet-san-pham&id=' . $_GET['id']);
        } else {
            echo "Khong tim thay id";
        }
    }

    public function search()
{
    if (isset($_GET['tukhoa'])) {
        // Nhận tên sản phẩm từ form tìm kiếm
        $ten = $_GET['tukhoa'];

        // Nếu có từ khóa tìm kiếm
        if (isset($ten)) {
            // Gọi phương thức tìm kiếm từ model
            $timKiemSanPham = $this->modelSanPham->searchByName($ten);
        } else {
            // Nếu không có từ khóa, hiển thị tất cả sản phẩm
            $timKiemSanPham = $this->modelSanPham->getAll();
        }

        // Gửi danh sách sản phẩm tới view
        
        require_once './views/sanpham/tim_kiem_san_pham.php';
    }
}

public function destroy()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['san_pham_id'];

        // Xóa bình luận của sản phẩm
        $this->modelSanPham->deleteReviewById($id);

        // Xóa đánh giá của sản phẩm
       

        // Xóa sản phẩm
        $this->modelSanPham->deleteData($id);

        header('Location: ?act=san-phams');
        exit();
    }
}

}
