<?php
class ThongKe
{
    public $conn;

    // Database connection
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Get total revenue by status
    public function getRevenueByStatus()
    {
        try {
            $sql = "SELECT SUM(IFNULL(tong_tien, 0)) AS revenue FROM don_hangs WHERE trang_thai_don_hang_id = 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return ['revenue' => 0]; // Return a default value
        }
    }

    // Get total completed orders
    public function getTotalDh()
    {
        try {
            $sql = "SELECT COUNT(*) AS completed_orders FROM don_hangs WHERE trang_thai_don_hang_id = 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return ['completed_orders' => 0]; // Default value
        }
    }

    // Get total users
    public function getTotalUser()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_users FROM nguoi_dungs WHERE vai_tro = 'User'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return ['total_users' => 0]; // Default value
        }
    }

    // Calculate profit
    public function getLoiNhuan()
    {
        try {
            $sql = "SELECT SUM((gia_ban - gia_nhap) * so_luong) AS profit FROM san_phams WHERE trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return ['profit' => 0]; // Default value
        }
    }

    // Get monthly profits
    public function getMoth()
    {
        try {
            $sql = "SELECT YEAR(ngay_nhap) AS year, MONTH(ngay_nhap) AS month, SUM((gia_ban - gia_nhap) * so_luong) AS monthly_profit FROM san_phams WHERE trang_thai = 1 GROUP BY YEAR(ngay_nhap), MONTH(ngay_nhap) ORDER BY year, month;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; // Return empty array on error
        }
    }

    // Get total products by category
    public function totalSp()
    {
        try {
            $sql = "SELECT dmsp.ten_danh_muc, COUNT(SP.id) as totalSp FROM san_phams as SP INNER JOIN danh_mucs as dmsp ON SP.danh_muc_id = dmsp.id GROUP BY dmsp.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; // Return empty array on error
        }
    }
}
?>