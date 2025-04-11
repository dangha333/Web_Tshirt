<?php
class KhuyenMai
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM khuyen_mais";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function postKhuyenMai($ten_khuyen_mai, $mo_ta, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $sql = "INSERT INTO khuyen_mais (ten_khuyen_mai, mo_ta, giam_gia, ngay_bat_dau, ngay_ket_thuc, trang_thai) VALUES (:ten_khuyen_mai, :mo_ta, :giam_gia, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':giam_gia', $giam_gia);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function deleteKhuyenMai($id)
    {
        try {
            $sql = "DELETE FROM khuyen_mais WHERE id = :id";

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
            $sql = "SELECT * FROM khuyen_mais WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateData($id, $ten_khuyen_mai, $mo_ta, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $sql = "UPDATE khuyen_mais SET ten_khuyen_mai = :ten_khuyen_mai, mo_ta = :mo_ta, giam_gia = :giam_gia, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, trang_thai = :trang_thai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':giam_gia', $giam_gia);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
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
