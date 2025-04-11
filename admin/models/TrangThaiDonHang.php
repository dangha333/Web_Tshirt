
<?php
class TrangThaiDonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
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

    public function postDonHang($trang_thai_don_hang, $ngay_tao, $trang_thai)
    {
        try {
            $sql = "INSERT INTO trang_thai_don_hangs (trang_thai_don_hang, trang_thai_thanh_toan, ngay_tao, trang_thai) VALUES (:trang_thai_don_hang, :trang_thai_thanh_toan, :ngay_tao, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':trang_thai_don_hang', $trang_thai_don_hang);
            $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function deleteDonHang($id)
    {
        try {
            $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function getDetailData($id)
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateData($id, $trang_thai_don_hang, $trang_thai_thanh_toan, $ngay_tao, $trang_thai)
    {
        try {
            $sql = "UPDATE trang_thai_don_hangs SET trang_thai_don_hang = :trang_thai_don_hang, trang_thai_thanh_toan = :trang_thai_thanh_toan, ngay_tao = :ngay_tao, trang_thai = :trang_thai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':trang_thai_don_hang', $trang_thai_don_hang);
            $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }


    public function __destroy()
    {
        $this->conn = null;
    }
}

