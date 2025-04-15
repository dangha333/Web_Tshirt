
<?php
class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        try {
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai_don_hang, phuong_thuc_thanh_toans.phuong_thuc_thanh_toan
                    FROM don_hangs
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
                    JOIN phuong_thuc_thanh_toans  ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function searchDonHang($keyword)
{
    $sql = "SELECT * FROM don_hangs 
            WHERE ma_don_hang LIKE :keyword 
            OR ho_ten_nguoi_nhan LIKE :keyword 
            OR email_nguoi_nhan LIKE :keyword 
            OR sdt_nguoi_nhan LIKE :keyword";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':keyword' => '%' . $keyword . '%'
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }






    public function getDetailData($id)
    {
        try {
            $sql = "SELECT * FROM don_hangs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.trang_thai_don_hang, tai_khoans.ho_ten, tai_khoans.so_dien_thoai, tai_khoans.email, phuong_thuc_thanh_toans.phuong_thuc_thanh_toan
FROM don_hangs
LEFT JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
LEFT JOIN tai_khoans ON don_hangs.id = tai_khoans.id
LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
WHERE don_hangs.id = :id
';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
        }
    }
    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten
            FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            $result = $stmt->fetchAll(); // Sử dụng fetchAll() để lấy tất cả kết quả

            if (empty($result)) {
                echo "Không có sản phẩm trong đơn hàng!";
            }

            return $result;  // Trả về tất cả các sản phẩm trong đơn hàng
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }







    public function updateData($id, $ma_don_hang, $trang_thai_don_hang_id)
    {
        try {
            $sql = "UPDATE don_hangs SET   ma_don_hang= :ma_don_hang , trang_thai_don_hang_id = :trang_thai_don_hang_id WHERE id = :id";


            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->bindParam(':ma_don_hang', $ma_don_hang);

            $stmt->bindParam(':trang_thai_don_hang_id', $trang_thai_don_hang_id);


            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getTaiKhoanByDonHang($don_hang_id)
    {
        try {
            // Giả sử bảng `don_hang` có cột `id_tai_khoan` là khóa ngoại liên kết đến bảng `tai_khoans`
            $sql = "
                SELECT tk.* 
                FROM tai_khoans tk
                JOIN don_hangs dh ON tk.id = dh.tai_khoan_id
                WHERE dh.id = :don_hang_id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Lấy một bản ghi duy nhất
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    
    
}
