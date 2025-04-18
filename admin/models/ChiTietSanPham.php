<?php
require_once 'includes/config.php';

class ChiTietSanPham {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
        if (!$this->conn instanceof PDO) {
            throw new Exception("Lỗi: Không thể kết nối đến cơ sở dữ liệu. \$conn không phải là đối tượng PDO.");
        }
    }

    
    public function layTatCa(): array {
        try {
            $sql = "SELECT chi_tiet_san_phams.*, san_phams.ten 
            FROM chi_tiet_san_phams 
            JOIN san_phams ON chi_tiet_san_phams.san_pham_id = san_phams.id";
            // Chuẩn bị câu truy vấn
            /** @var PDOStatement $stmt */
            $stmt = $this->conn->prepare($sql);
            if ($stmt === false) {
                throw new PDOException("Không thể chuẩn bị câu truy vấn SQL.");
            }
    
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result === false) {
                throw new PDOException("Không thể lấy dữ liệu từ cơ sở dữ liệu.");
            }
    
            return $result;
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        } catch (Exception $e) {
            error_log("Lỗi: " . $e->getMessage());
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }
}
