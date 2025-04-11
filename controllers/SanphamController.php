<?php
class SanPhamController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function sanpham()
    {
        // Lấy số sản phẩm mỗi trang và trang hiện tại từ URL
        $item_per_page = !empty($_GET['per_page']) ? (int)$_GET['per_page'] : 9;
        $current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

        // Lấy sản phẩm từ model
        $listSanPham = $this->modelSanPham->getAlllSanPham($item_per_page, $current_page);
        $products = $this->modelSanPham->getAllSanPham();
        $totalProducts = $this->modelSanPham->getTotalProducts();
        $totalPages = ceil($totalProducts / $item_per_page); // Tính số trang

        // Lấy danh mục sản phẩm
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();



        // Yêu cầu view danh sách sản phẩm



        // Biến lưu tên file view sẽ được gọi
        $viewFile = './views/danhsachsanpham.php';

        // Kiểm tra nếu có id danh mục trong URL

        $danhMucId = $_GET['iddm'] ?? 0; // Lấy id danh mục từ URL
        if (isset($_GET['iddm'])) {
            // Nhận tên sản phẩm từ form tìm kiếm
            $iddm = $_GET['iddm'];

            // Gọi phương thức tìm sản phẩm theo danh mục
            $listSanPhamById = $this->modelSanPham->getSanPhamByDanhMucId($danhMucId);

            // Chuyển view sang danh mục sản phẩm
        } elseif (isset($_GET['search'])) {
            // Kiểm tra nếu có tìm kiếm từ form
            $searchTerm = $_GET['search'];
            // Gọi phương thức tìm sản phẩm theo từ khóa tìm kiếm
            // $listSanPhamBySearch = $this->modelSanPham->searchSanPham($searchTerm);

            // Chuyển view sang tìm kiếm sản phẩm
            $viewFile = './views/sanpham/tim_kiem_san_pham.php';
        }



        // var_dump($danhmucs);

        require_once './views/danhsachsanpham.php';
        require_once './views/Home.php';
        // require_once './views/sanpham/danh_muc_san_pham.php';

        // Gửi thông tin cho view
        require_once $viewFile;
    }




    public function search()
    {
        if (isset($_GET['tukhoa'])) {
            // Nhận tên sản phẩm từ form tìm kiếm
            $ten = $_GET['tukhoa'];

            // Nếu có từlistDanhMuc khóa tìm kiếm
            if (isset($ten)) {
                // Gọi phương thức tìm kiếm từ model
                $timKiemSanPham = $this->modelSanPham->searchByName($ten);
                $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            } else {
                // Nếu không có từ khóa, hiển thị tất cả sản phẩm
                $timKiemSanPham = $this->modelSanPham->getAllSanPham();
                $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            }

            // Gửi danh sách sản phẩm tới view

            require_once './views/sanpham/tim_kiem_san_pham.php';
        }
    }
    public function filterByPrice()
    {
        $minPrice = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $maxPrice = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 100000000;

        // Thiết lập số sản phẩm mỗi trang và trang hiện tại
        $item_per_page = 10; // hoặc giá trị mà bạn muốn
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Đếm tổng số sản phẩm trong khoảng giá
        $totalProducts = $this->modelSanPham->countProductsByPriceRange($minPrice, $maxPrice);
        $totalPages = ceil($totalProducts / $item_per_page); // Tính số trang

        // Lấy danh sách sản phẩm trong khoảng giá và phân trang
        $products = $this->modelSanPham->getProductsByPriceRange($minPrice, $maxPrice, $item_per_page, $current_page);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        // Gửi các biến đến view
        require_once 'views/danhsachsanpham.php';
    }
}
