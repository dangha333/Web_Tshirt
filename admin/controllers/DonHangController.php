
<?php
class DonHangController
{

    //Hàm kết nối tới Model

    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelDonHang = new DonHang();
        $this->modelSanPham = new SanPham();
    }
    public function index()
    {
        $donhangs = $this->modelDonHang->getAll();

        require_once "./views/donhang/list_don_hang.php";
    }

    public function create()
    {
        require_once "./views/donhang/create_don_hang.php";
    }


    public function detail()
    {
        $don_hang_id = $_GET['id_don_hang']; // Lấy ID đơn hàng từ query string
    
        // Lấy thông tin chi tiết đơn hàng
        $donhang = $this->modelDonHang->getDetailDonHang($don_hang_id);
    
        // Lấy thông tin tài khoản của người đã đặt đơn hàng
        $user = $this->modelDonHang->getTaiKhoanByDonHang($don_hang_id);
    
        // Lấy danh sách sản phẩm trong đơn hàng
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
    
        require_once './views/donhang/chiTietDonHang.php';
    }
    
    
    

    public function edit()
    {
        $id = $_GET['id_don_hang'];
        $donhangs = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        // var_dump($donhangs);
        // die;
        if ($donhangs) {
            require_once "./views/donhang/edit_don_hang.php";
            deleteSessionError();
        } else {
            header("Location: ?act=don-hangs");
            exit();
        }
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_don_hang'];
            $ma_don_hang = $_POST['ma_don_hang'];
            $trang_thai_don_hang_id = $_POST['trang_thai_don_hang_id'];


            // var_dump();

            $errors = [];



            if (empty($ma_don_hang)) {
                $errors['ma_don_hang'] = 'Mã đơn hàng không được để trống';
            }




            if (empty($trang_thai_don_hang_id)) {
                $errors['trang_thai_don_hang_id'] = 'Trạng thái đơn hàng không được để trống';
            }
            if (empty($errors)) {
                $this->modelDonHang->updateData($id, $ma_don_hang, $trang_thai_don_hang_id);
                unset($_SESSION['errors']);
                header("Location: ?act=don-hangs");
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=sua-don-hang&id_don_hang");
                exit();
            }
        }
    }


    public function search()
    {
        // Kiểm tra xem có dữ liệu tìm kiếm hay không
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchTerm = $_GET['search'];
            // Gọi model để tìm kiếm đơn hàng theo từ khóa
            $donhangs = $this->modelDonHang->searchDonHang($searchTerm);
        } else {
            // Nếu không có tìm kiếm, lấy tất cả đơn hàng
            $donhangs = $this->modelDonHang->getAll();
        }

        require_once "./views/donhang/list_don_hang.php";
    }
}
