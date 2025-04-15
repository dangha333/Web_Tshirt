<?php
class GioHang
{
    public $conn;


    // Ket noi csdl 

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getGioHangFromUser($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':tai_khoan_id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten, san_phams.img, san_phams.gia_ban, san_phams.gia_km
            FROM chi_tiet_gio_hangs 
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';



            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function addGioHang($id)
    {
        
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }

    }
    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            // Lấy số lượng tồn kho của sản phẩm
            $soLuongConLai = $this->getSoLuongSanPham($san_pham_id);
            
            // Kiểm tra xem số lượng mới có vượt quá tồn kho không
            if ($so_luong > $soLuongConLai) {
                return false; // Trả về false nếu không đủ số lượng
            }
    
            $sql = 'UPDATE chi_tiet_gio_hangs 
                    SET so_luong = :so_luong 
                    WHERE gio_hang_id = :gio_hang_id 
                    AND san_pham_id = :san_pham_id';
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong]);
    
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong, $size, $color)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong, size, color) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$gio_hang_id, $san_pham_id, $so_luong, $size, $color]);
            return true; // Trả về true nếu thành công
        } catch (PDOException $e) {
            echo "Lỗi khi thêm chi tiết giỏ hàng: " . $e->getMessage();
            return false;
        }
    }
    public function getSoLuongSanPham($san_pham_id)
    {
        try {
            $sql = 'SELECT so_luong FROM san_phams WHERE id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':san_pham_id' => $san_pham_id]);

            return $stmt->fetchColumn(); // Lấy trực tiếp giá trị của cột `so_luong`
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function xoaSanPham($gio_hang_id, $san_pham_id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id]);


            return true; // Sản phẩm đã được xóa

        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function clearDetailGioHang($gioHangId)
    {
        try {

            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id' => $gioHangId]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function clearGioHang($taiKhoanId)
    {
        try {

            $sql = 'DELETE FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':tai_khoan_id' => $taiKhoanId]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
