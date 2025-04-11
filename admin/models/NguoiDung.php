<?php
class NguoiDung
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi:' . $e->getMessage();
        }
    }
    public function postNguoiDung($ho_ten, $email, $mat_khau, $so_dien_thoai, $dia_chi)
    {
        try {
            $sql = 'INSERT INTO nguoi_dungs (ho_ten, email, mat_khau, so_dien_thoai, dia_chi) 
            VALUES (:ho_ten, :email, :mat_khau, :so_dien_thoai, :dia_chi)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);


            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function deleteNguoiDung($id)
    {
        try {
            $sql = "DELETE FROM nguoi_dungs WHERE id = :id";

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
            $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateNguoiDung($id, $ho_ten, $email, $mat_khau,  $so_dien_thoai, $dia_chi)
    {
        try {
            $sql = "UPDATE nguoi_dungs SET ho_ten = :ho_ten, email= :email, mat_khau= :mat_khau, so_dien_thoai =:so_dien_thoai, dia_chi =:dia_chi WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':dia_chi', $dia_chi);


            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->conn = null;
    }
}
