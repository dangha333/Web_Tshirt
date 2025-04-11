<?php
class DangKy
{
    public $conn;

    //Ket noi csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDangKi($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM users Where chuc_vu_id= :chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }
    public function checkDangKy($email, $mat_khau, $ho_ten, $so_dien_thoai)
    {
        try {
            $sql = 'INSERT INTO `tai_khoans`(`ho_ten`, `email`, `so_dien_thoai`, `mat_khau`, `chuc_vu_id`, `trang_thai`,`anh_dai_dien`,`ngay_sinh`,`gioi_tinh`,`dia_chi`) 
            VALUES(:ho_ten,:email,:so_dien_thoai,:mat_khau,:chuc_vu_id,:trang_thai, :anh_dai_dien, :ngay_sinh, :gioi_tinh, :dia_chi)';
            $stmt = $this->conn->prepare($sql);
            $chuc_vu = "2";
            $trang_thai = "1";
            $anh_dai_dien = "";
            $ngay_sinh = "2024-01-01";
            $gioi_tinh = "1";
            $dia_chi = "";
            //Gan gia tri vao cac tham so
            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':chuc_vu_id', $chuc_vu);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            echo 'Lỗi' . $e->getMessage();
            return $e->getMessage();
        }
    }
}
