<?php
class LienHe
{
  public $conn;

  //Kết nối csdl
  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function postDataClient($name, $so_dien_thoai, $email, $noi_dung, $ngay_gio)
  {
      try {
          // Câu truy vấn SQL
          $sql = "INSERT INTO tbl_lienhe (name, so_dien_thoai, email,  noi_dung, ngay_gio)
                  VALUES (:name,:so_dien_thoai,  :email, :noi_dung, :ngay_gio)";

          // Chuẩn bị truy vấn
          $stmt = $this->conn->prepare($sql);

          // Thực thi truy vấn
          $stmt->execute([
              ':name' => $name,
              ':so_dien_thoai' => $so_dien_thoai,
              ':email' => $email,
              
              ':noi_dung' => $noi_dung,
              ':ngay_gio' => $ngay_gio,
          ]);

          // Nếu thành công, trả về true
          return true;

      } catch (PDOException $e) {
          // Log lỗi ra file (nếu cần)
          error_log("Lỗi khi thêm dữ liệu vào bảng tbl_lienhe: " . $e->getMessage());

          // Hiển thị thông báo lỗi gọn gàng (cho developer)
          echo "Đã xảy ra lỗi khi thêm dữ liệu. Vui lòng kiểm tra lại.";

          // Có thể trả về false để xử lý logic khác
          return false;
      }
  }


}
