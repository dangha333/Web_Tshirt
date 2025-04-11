<?php
class TaiKhoan
{
    public $conn;

    //Ket noi csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sach tin tuc
    public function getAllTaiKhoan()
    {
        try {
            $sql = 'SELECT * FROM tai_khoans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
    {

        try {
            $sql = "INSERT INTO tai_khoans (ho_ten,email,mat_khau,chuc_vu_id) VALUES (:ho_ten,:email,:mat_khau,:chuc_vu_id)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if ($user && $user['mat_khau'] == $mat_khau) {
                if ($user['trang_thai'] == 1) {
                    return $user;
                } else {
                    return "Tài khoản bị cấm";
                }
            } else {
                echo "<script>alert('Bạn nhập sai thông tin mật khẩu tài khoản'); window.location.href='?act=login-admin'</script>";
                exit();
            }
        } catch (Exception $e) {
            //throw $th;
            echo 'Lỗi' . $e->getMessage();
            return $e->getMessage();
        }
    }
    ///
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $trang_thai, $so_dien_thoai)
    {
        try {
            $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten,   trang_thai = :trang_thai,  email = :email, so_dien_thoai = :so_dien_thoai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }


    public function getAllTaiKhoanformEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':email', $email);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function resetPassword($id, $mat_khau)
    {

        try {
            $sql = 'UPDATE tai_khoans 
            SET mat_khau =:mat_khau
            WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':id', $id);



            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
}
