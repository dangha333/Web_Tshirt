<?php
class Banner
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllBanner()
    {
        try {
            $sql = "SELECT * FROM banners";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }
}
