<?php

class SanPham
{
    public $conn;

    //Ket noi csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sach
    public function getAll()
    {
        try {
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc, chi_tiet_san_phams.mo_ta_chi_tiet FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            LEFT JOIN chi_tiet_san_phams ON san_phams.id = chi_tiet_san_phams.san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }


    //Them du lieu moi vao csdl
    public function postData($ten, $img, $gia_nhap, $gia_ban,  $gia_km, $mo_ta, $so_luong, $date, $trang_thai, $danh_muc_id)
    {
        try {
            $sql = 'INSERT INTO san_phams (ten,img,gia_nhap,gia_ban,gia_km,trang_thai,mo_ta,so_luong,date,danh_muc_id)
                 VALUES(:ten,:img,:gia_nhap,:gia_ban,:gia_km,:trang_thai,:mo_ta,:so_luong,:date,:danh_muc_id)';
            $stmt = $this->conn->prepare($sql);

            //Gan gia tri vao cac tham so
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_km', $gia_km);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);

            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    public function albumHinhAnh($san_pham_id, $album_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, album_hinh_anh) VALUES (:san_pham_id, :album_hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':album_hinh_anh', $album_hinh_anh);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    //Lay thong tin chi tiet
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();


            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    public function getAlbumHinhAnh($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Throwable $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    public function searchByName($ten)
    {
        try {
            // Câu lệnh SQL sử dụng tham số :ten để bảo mật
            $sql= 'SELECT san_phams.*,danh_mucs.ten_danh_muc 
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.ten LIKE :ten';
    
            $stmt = $this->conn->prepare($sql);
    
            // Thêm dấu % vào biến $ten để tìm kiếm gần đúng
            $ten = '%' . $ten . '%';
    
            // Gắn tham số vào câu lệnh
            $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
    
            $stmt->execute();
    
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    

    //Cap nhat du lieu
    public function updateData($id, $ten, $img, $gia_nhap, $gia_ban, $gia_km, $trang_thai, $mo_ta, $so_luong, $date, $danh_muc_id)
    {
        try {
            $sql = 'UPDATE san_phams SET ten= :ten, img=:img,gia_nhap=:gia_nhap, gia_ban=:gia_ban, gia_km=:gia_km, trang_thai=:trang_thai, mo_ta=:mo_ta, so_luong=:so_luong, date=:date, danh_muc_id=:danh_muc_id WHERE id=:id ';

            $stmt = $this->conn->prepare($sql);

            //Gan gia tri vao cac tham so
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_km', $gia_km);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }

    //Xoa du lieu trong csdl
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Loi: ' . $e->getMessage();
        }
    }
    public function getBinhLuanBySanPhamId($san_pham_id)
    {
        try {
            // Thay đổi từ binh_luan thành binh_luans
            $sql = "SELECT * FROM binh_luans WHERE san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDanhGia($san_pham_id)
    {
        try {

            $sql = "SELECT * FROM danh_gias WHERE san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function deleteReviewById($id)
    {
        $sql = "DELETE FROM binh_luans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    public function deleteDanhGiaById($id)
    {
        $sql = "DELETE FROM danh_gias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    // Thêm đánh giá mới


    // Xóa đánh giá




    //Huy ket noi
    public function __destruct()
    {
        $this->conn = null;
    }
    
}
