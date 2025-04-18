<?php
require_once 'commons/function.php';
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getSoLuongSanPham($san_pham_id)
    {
        $sql = 'SELECT so_luong FROM san_phams WHERE id = :san_pham_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':san_pham_id' => $san_pham_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result ? $result['so_luong'] : 0; // ✅ Sửa ở đây
    }
    
    public function getSanPhamById($id)
{
    try {
        $sql = 'SELECT * FROM san_phams WHERE id = :san_pham_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':san_pham_id' => $id]); // ✅ Đúng placeholder
        return $stmt->fetch(); // Trả về sản phẩm nếu tồn tại
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}


    public function getAllSanPham()
    {
        try {
            $sql = "SELECT san_phams.*,danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }



    public function searchByName($ten)
    {
        try {
            // Câu lệnh SQL sử dụng tham số :ten để bảo mật
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc 
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.ten LIKE :ten';

            $stmt = $this->conn->prepare($sql);

            // Thêm dấu % vào biến $ten để tìm kiếm gần đúng
            $ten = '%' . $ten . '%';

            // Gắn tham số vào câu lệnh
            $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    public function getAllDanhMuc()

{
   

    {
        try {
            $sql = "SELECT * FROM danh_mucs";

            $stmt = $this->conn->prepare($sql);


            $stmt->execute();

            return $stmt->fetchAll(); // Trả về kết quả dưới dạng mảng liên kết
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}

    public function getSanPhamByDanhMucId($danhMucId)
    {
        try {
            // Câu truy vấn chỉ lấy sản phẩm trong danh mục cụ thể
            $sql = "SELECT * 
                FROM san_phams 
                WHERE danh_muc_id = :danh_muc_id";

            $stmt = $this->conn->prepare($sql);

            // Gắn tham số vào câu lệnh
            $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    public function getAllMota()
    {
        try {
            $sql = "SELECT * FROM san_phams";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }




    public function getAlllSanPham($item_per_page = 9, $current_page = 1)
    {
        try {
            // Tính toán offset
            $offset = ($current_page - 1) * $item_per_page;

            // Truy vấn sản phẩm với phân trang
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                ORDER BY san_phams.id ASC 
                LIMIT :limit OFFSET :offset";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':limit', $item_per_page, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả dưới dạng mảng liên kết
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getTotalProducts()
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM san_phams"; // Cập nhật tên bảng nếu cần
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC)['total']; // Trả về tổng số sản phẩm
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function getProductsByPriceRange($minPrice, $maxPrice, $item_per_page = 9, $current_page = 1)
    {
        try {
            // Tính toán offset
            $offset = ($current_page - 1) * $item_per_page;

            // Truy vấn sản phẩm với phân trang
            $sql = "SELECT * FROM san_phams WHERE gia_ban BETWEEN :minPrice AND :maxPrice LIMIT :limit OFFSET :offset";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
            $stmt->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $item_per_page, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(); // Trả về kết quả dưới dạng mảng liên kết
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

   
    public function countProductsByPriceRange($minPrice, $maxPrice)
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM san_phams WHERE gia_ban BETWEEN :minPrice AND :maxPrice";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
            $stmt->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC)['total']; // Trả về tổng số sản phẩm
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function updateQuantityKhiHuy($sanPhamId, $quantityChange)
{
    // Lấy số lượng hiện tại trong kho
    $currentQuantity = $this->getProductQuantity($sanPhamId);

    // Cập nhật số lượng mới (cộng hoặc trừ)
    $newQuantity = $currentQuantity + $quantityChange;

    // Cập nhật số lượng trong kho
    $sql = "UPDATE san_phams SET so_luong = :newQuantity WHERE id = :sanPhamId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);

    return $stmt->execute();
}
public function getProductQuantity($sanPhamId)
{
    // Truy vấn số lượng sản phẩm hiện tại trong kho
    $sql = "SELECT so_luong FROM san_phams WHERE id = :sanPhamId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['so_luong'] : 0; // trả về số lượng, hoặc 0 nếu không tìm thấy
}

}
