<?php

class DonHang
{
  public $conn;
  public function __construct()
  {
    $this->conn = connectDB();
  }
  public function getAllChiTietDonHang($donHangId)
  {
    try {
      // Câu truy vấn INNER JOIN với tên bảng đầy đủ
      $sql = "
                SELECT 
                    chi_tiet_don_hangs.id AS chi_tiet_id,
                    don_hangs.ma_don_hang AS ma_don_hang,
                    san_phams.ten AS ten_san_pham,
                    chi_tiet_don_hangs.so_luong,
                    chi_tiet_don_hangs.don_gia,
                    chi_tiet_don_hangs.tong_tien
                FROM 
                    chi_tiet_don_hangs
                INNER JOIN 
                    don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                INNER JOIN 
                    san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                ORDER BY 
                    chi_tiet_don_hangs.id ASC
            ";

      // Chuẩn bị và thực thi truy vấn
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      // Trả về dữ liệu
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function addDonHang($ho_ten_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt_nguoi_nhan, $ghi_chu, $phuong_thuc_thanh_toan_id, $tong_tien, $ngay_dat_hang, $trang_thai_don_hang_id, $tai_khoan_id, $ma_don_hang)
  {
    try {
      $sql = 'INSERT INTO don_hangs (ho_ten_nguoi_nhan,email_nguoi_nhan , dia_chi_nguoi_nhan, sdt_nguoi_nhan, ghi_chu, phuong_thuc_thanh_toan_id, tong_tien, ngay_dat_hang, trang_thai_don_hang_id, tai_khoan_id,ma_don_hang) 
            VALUES (:ho_ten_nguoi_nhan,:email_nguoi_nhan , :dia_chi_nguoi_nhan, :sdt_nguoi_nhan, :ghi_chu, :phuong_thuc_thanh_toan_id, :tong_tien, :ngay_dat_hang, :trang_thai_don_hang_id, :tai_khoan_id, :ma_don_hang)';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':ho_ten_nguoi_nhan' => $ho_ten_nguoi_nhan,
        ':email_nguoi_nhan' => $email_nguoi_nhan,
        ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
        ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
        ':ghi_chu' => $ghi_chu,
        ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
        ':tong_tien' => $tong_tien,
        ':ngay_dat_hang' => $ngay_dat_hang,
        ':trang_thai_don_hang_id' => $trang_thai_don_hang_id,
        ':tai_khoan_id' => $tai_khoan_id,
        ':ma_don_hang' => $ma_don_hang,

      ]);

      return $this->conn->lastInsertId();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getTrangThai()
  {
    try {
      $sql = "SELECT * FROM trang_thai_don_hangs";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
  public function getPttt()
  {
    try {
      $sql = "SELECT * FROM `phuong_thuc_thanh_toans`";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
  public function getDonHangFromUser($nguoiDungId)
  {
    try {
      $sql = "SELECT * FROM `don_hangs` WHERE  `tai_khoan_id` = :tai_khoan_id ORDER BY `id` DESC";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':tai_khoan_id' => $nguoiDungId
      ]);

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
  public function getDonHangById($donHangId)
  {
    try {
      $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai_don_hang, tai_khoans.ho_ten, tai_khoans.so_dien_thoai, tai_khoans.email, phuong_thuc_thanh_toans.phuong_thuc_thanh_toan
FROM don_hangs
LEFT JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
LEFT JOIN tai_khoans ON don_hangs.id = tai_khoans.id
LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
WHERE don_hangs.id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':id' => $donHangId
      ]);

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
  public function getChiTietDonHangByOrderId($donHangId)
  {
    $sql = "SELECT 
    chi_tiet_don_hangs.*,
    san_phams.ten,
    san_phams.img
    FROM chi_tiet_don_hangs 
    JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':don_hang_id', $donHangId);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả chi tiết đơn hàng
  }
  public function updateDH($donHangId, $trang_thai_id)
  {
    try {
      $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = :trang_thai_don_hang_id   WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':id' => $donHangId,
        ':trang_thai_don_hang_id' => $trang_thai_id
      ]);

      return true;
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }


  public function xoaDH($donHangId)
  {
    try {
      $sql = 'DELETE FROM chi_tiet_don_hangs WHERE don_hang_id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $donHangId]);

      $sql = 'DELETE FROM don_hangs WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $donHangId]);


      return true;

    } catch (Exception $e) {
      echo "Lỗi: " . $e->getMessage();
      return false;
    }
  }

  public function searchOrders($search, $status)
  {

    $query = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai_don_hang FROM don_hangs JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id ";

    if ($search) {
      $query .= " AND ma_don_hang LIKE :search";
    }
    if ($status) {
      $query .= " AND trang_thai_don_hang_id = :status";
    }

    $stmt = $this->conn->prepare($query);

    if ($search) {
      $stmt->bindValue(':search', "%$search%");
    }
    if ($status) {
      $stmt->bindValue(':status', $status);
    }

    $stmt->execute();

    return $stmt->fetchAll();  // Trả về kết quả tìm kiếm
  }
  public function addChiTietDonHang($donHangId, $sanPhamId, $donGia, $soLuong, $tongTien)
  {
    try {
      $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, so_luong, don_gia, tong_tien) VALUES (:donHangId, :sanPhamId, :soLuong, :donGia, :tongTien)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':donHangId' => $donHangId,
        ':sanPhamId' => $sanPhamId,
        ':soLuong' => $soLuong,
        ':donGia' => $donGia,
        ':tongTien' => $tongTien
      ]);

      return true;
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
    }
  }
}
