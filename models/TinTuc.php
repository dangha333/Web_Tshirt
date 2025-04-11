<?php
class  TinTuc {
    public $conn;

    //Ket noi csdl
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllTinTuc(){
        try {
            $sql = 'SELECT * FROM tin_tucs ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Loi: '. $e->getMessage();
        }
    }

    public function getTinTucById($id) {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
    
            $stmt = $this->conn->prepare($sql);
    
            // Gắn tham số
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
    
            // Trả về một kết quả duy nhất hoặc false nếu không có
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    
}
?>