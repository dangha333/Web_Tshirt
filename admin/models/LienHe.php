<?php

class LienHe
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách liên hệ
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM tbl_lienhe';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm liên hệ mới
    public function postData($name, $so_dien_thoai, $noi_dung, $ngay_gio)
    {
        try {
            $sql = 'INSERT INTO tbl_lienhe (name, so_dien_thoai, noi_dung, ngay_gio)
                    VALUES (:name, :so_dien_thoai, :noi_dung, :ngay_gio)';
            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho các tham số
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_gio', $ngay_gio);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Lấy thông tin chi tiết liên hệ
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM tbl_lienhe WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Cập nhật thông tin liên hệ
    public function updateData($id, $name, $so_dien_thoai, $noi_dung, $ngay_gio)
    {
        try {
            $sql = 'UPDATE tbl_lienhe SET name = :name, so_dien_thoai = :so_dien_thoai, 
                    noi_dung = :noi_dung, ngay_gio = :ngay_gio WHERE id = :id';
            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_gio', $ngay_gio);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Xóa liên hệ
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM tbl_lienhe WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Hủy kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
