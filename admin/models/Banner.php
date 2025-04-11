<?php 
class Banner 
{
    public $conn;
    public function __construct()
    {
        $this->conn= connectDB();
    }
    //Danh sach banner
    public function getAll(){
        try{
            $sql = 'SELECT * FROM banners';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (PDOException $e){
            echo 'Lỗi:' .$e->getMessage();
        }
    }
    public function postBanner($title,$hinh_anh,$lien_ket,$trang_thai)
    {
        try {
            $sql = 'INSERT INTO banners (title, hinh_anh, lien_ket, trang_thai) 
            VALUES (:title, :hinh_anh, :lien_ket, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':hinh_anh',$hinh_anh);
            $stmt->bindParam(':lien_ket',$lien_ket);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function deleteBanner($id)
    {
        try {
            $sql = "DELETE FROM banners WHERE id = :id";

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
            $sql = "SELECT * FROM banners WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateBanner($id, $title, $hinh_anh, $lien_ket,  $trang_thai)
    {
        try {
            $sql = "UPDATE banners SET title = :title, hinh_anh= :hinh_anh, lien_ket= :lien_ket, trang_thai =:trang_thai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':hinh_anh',$hinh_anh);
            $stmt->bindParam(':lien_ket',$lien_ket);
            $stmt->bindParam(':trang_thai', $trang_thai);

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