<?php

class ChiTietSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllChiTietSanPham($san_pham_id)
    {
        try {
            $sql = "
            SELECT 
                chi_tiet_san_phams.*, 
                san_phams.ten, 
                san_phams.img, 
                san_phams.gia_ban, 
                san_phams.gia_km, 
                san_phams.mo_ta, 
                san_phams.so_luong, 
                san_phams.date,
                san_phams.trang_thai,
                san_phams.gia_nhap,
                san_phams.danh_muc_id,
                danh_mucs.ten_danh_muc
            FROM chi_tiet_san_phams
            INNER JOIN san_phams 
                ON chi_tiet_san_phams.san_pham_id = san_phams.id
            INNER JOIN danh_mucs 
                ON san_phams.danh_muc_id = danh_mucs.id
            WHERE chi_tiet_san_phams.san_pham_id = :san_pham_id
            ";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
    
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$data) {
                throw new Exception("Không tìm thấy chi tiết sản phẩm với ID: $san_pham_id");
            }
    
            return $data;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    
    public function getAlbumHinhAnh($san_pham_id)
    {
        try {
            $sql = "
            SELECT album_hinh_anh
            FROM hinh_anh_san_phams
            WHERE san_pham_id = :san_pham_id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getAllBinhLuan($san_pham_id)
    {
        try {
            $sql = "
            SELECT * FROM binh_luans
            WHERE san_pham_id = :san_pham_id
            ORDER BY ngay_binh_luan DESC
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
            return $stmt->fetchAll(); // Sử dụng fetchAll thay vì fetch
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    

    public function getSanPhamCungDanhMuc($danh_muc_id)
    {
        try {
            $sql = "
            SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = " . $danh_muc_id;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Listring: ' . $e->getMessage();
        }
    }

    public function thembinhluan($san_pham_id, $ten_nguoi_binh_luan, $noi_dung, $ngay_binh_luan)
{
    try {
        $sql = "INSERT INTO binh_luans (san_pham_id, ten_nguoi_binh_luan, noi_dung, ngay_binh_luan) 
                VALUES (:san_pham_id, :ten_nguoi_binh_luan, :noi_dung, :ngay_binh_luan)";
        $stmt = $this->conn->prepare($sql);

        // Gắn giá trị tham số vào câu truy vấn
        $stmt->bindParam(':san_pham_id', $san_pham_id);
        $stmt->bindParam(':ten_nguoi_binh_luan', $ten_nguoi_binh_luan);
        $stmt->bindParam(':noi_dung', $noi_dung);
        $stmt->bindParam(':ngay_binh_luan', $ngay_binh_luan);

        // Thực thi câu truy vấn
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}

    }

