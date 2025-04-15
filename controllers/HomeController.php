<?php

class HomeController
{

  public $modelSanPham;
  public $modelBanner;

  public $modelGioHang;
  public $modelTaiKhoan;

  public $modelTinTuc;

  public $modelDonHang;

  public function __construct()
  {
    $this->modelSanPham = new SanPham();
    $this->modelBanner = new Banner();
    $this->modelTinTuc = new TinTuc();

    $this->modelGioHang = new GioHang();



    $this->modelTaiKhoan = new TaiKhoan();


    $this->modelDonHang = new DonHang();
  }
  public function home()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();
    $listBanner = $this->modelBanner->getAllBanner();
    $TinTucs = $this->modelTinTuc->getAllTinTuc();

    $listDanhMuc = $this->modelSanPham->getAllDanhMuc();




    $listMota = $this->modelSanPham->getAllMota();



    require_once "./views/Home.php";
  }



  public function addGioHang()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_SESSION['user'])) {
        $email = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
        if (!$gioHang) {
          $gioHangId = $this->modelGioHang->addGioHang($email['id']);
          $gioHang = ['id' => $gioHangId];
        } else {
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }

        $san_pham_id = $_POST['san_pham_id'];
       
        $so_luong = (int) $_POST['so_luong']; 

        // Kiểm tra số lượng tồn kho
        $so_luong_ton = $this->modelGioHang->getSoLuongSanPham($san_pham_id);
        $tongSoLuongHienTai = 0;
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            $tongSoLuongHienTai = $detail['so_luong'];
            break;
          }
        }

        // Kiểm tra tổng số lượng sau khi thêm
        if ($tongSoLuongHienTai + $so_luong > $so_luong_ton) {
          echo "<script>alert('Không thể thêm sản phẩm ID là: $san_pham_id , số lượng vượt quá số lượng trong kho.'); window.history.back();</script>";
          exit();
        }

        if ($so_luong > $so_luong_ton) {
          echo "<script>alert('Không thể thêm sản phẩm, số lượng vượt quá tồn kho.'); window.history.back();</script>";
          exit();
        }

        $checkSanPham = false;
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            $newSoLuong = $detail['so_luong'] + $so_luong;
            // Kiểm tra xem số lượng mới có vượt quá tồn kho không
            if ($newSoLuong > $so_luong_ton) {
              echo "<script>alert('Cập nhật không thành công, số lượng vượt quá tồn kho.'); window.history.back();</script>";
              exit();
            }
            $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
            $checkSanPham = true;
            break;
          }
        }

        if (!$checkSanPham) {
          $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
        }

        header("Location: ?act=gio-hang");
      } else {
        var_dump('Chưa đăng nhập');
        die;
      }
    }
  }

  public function gioHang()
  {
    if (isset($_SESSION['user'])) {
      $email = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
      $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($email['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }
      $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
      ;
      // var_dump($chiTietGioHang);
      require_once './views/gioHang.php';
    } else {

      header("Location: ?act=login");
    }
  }



  public function capNhatGioHang()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (isset($_SESSION['user'])) {
              $email = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
              $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
  
              if (isset($_POST['so_luong'])) {
                  foreach ($_POST['so_luong'] as $sanPhamId => $soLuongMoi) {
                      // Lấy thông tin sản phẩm
                      $sanPham = $this->modelSanPham->getSanPhamById($sanPhamId);
                      $tonKho = $sanPham['so_luong'] ?? 0;
  
                      // Kiểm tra số lượng yêu cầu có vượt quá tồn kho không
                      if ($soLuongMoi > $tonKho) {
                          $_SESSION['error'] = "Không thể cập nhật sản phẩm <b>{$sanPham['ten']}</b> vì số lượng yêu cầu ({$soLuongMoi}) vượt quá tồn kho ({$tonKho}).";
                          header("Location: ?act=gio-hang");
                          exit();
                      }
  
                      // Nếu hợp lệ thì cập nhật
                      $this->modelGioHang->updateSoLuong($gioHang['id'], $sanPhamId, $soLuongMoi);
                  }
  
                  unset($_SESSION['error']);
                  header("Location:?act=gio-hang");
                  exit();
              }
          }
      }
  }
  
  
  
  
  




  public function xoaSanPhamGioHang()
  {
    // var_dump($_POST);die;

    if (isset($_SESSION['user'])) {
      $email = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
      $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
      if ($gioHang) {
        // Lấy ID sản phẩm từ form POST
        $sanPhamId = isset($_POST['san_pham_id']) ? $_POST['san_pham_id'] : null;

        if ($sanPhamId) {
          // Xóa sản phẩm khỏi giỏ hàng
          $tatus = $this->modelGioHang->xoaSanPham($gioHang['id'], $sanPhamId);
        }
      }
      // Cập nhật lại giỏ hàng sau khi xóa
      $gioHang = $this->modelGioHang->getGioHangFromUser($email['id']);
      $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

      header("Location: ?act=gio-hang ");
      exit();
    }
  }
  public function ThanhToan()
  {

    if (isset($_SESSION['user'])) {
      $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
      $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($user['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }
      $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
      ;
      // var_dump($chiTietGioHang);
      // Giả sử sau khi xử lý thanh toán thành công
      // Sau khi đặt hàng thành công
      $_SESSION['order_success'] = true;

      // Chuyển hướng về trang thanh toán (hoặc trang khác)
      require_once './views/thanhtoan.php';
    } else {

      header("Location: ?act=login");
    }
  }

  public function postThanhtoan()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ho_ten_nguoi_nhan = $_POST['ho_ten_nguoi_nhan'];
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
      $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
      $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
      $ghi_chu = $_POST['ghi_chu'];
      $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
      $tong_tien = $_POST['tong_tien'];
      $ngay_dat_hang = date('Y-m-d H:i:s');
      $trang_thai_don_hang_id = 1;
      $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);
      $tai_khoan_id = $user['id'];
      $ma_don_hang = 'DH' . rand(100, 999);
    }
    $result = $this->modelDonHang->addDonHang($ho_ten_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt_nguoi_nhan, $ghi_chu, $phuong_thuc_thanh_toan_id, $tong_tien, $ngay_dat_hang, $trang_thai_don_hang_id, $tai_khoan_id, $ma_don_hang);

    //Lấy thông tin giỏ hàng của người dùng
    $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

    //Lưu sản phẩm vào chi tiết đơn hàng
    if ($result) {
      $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

      foreach ($chiTietGioHang as $item) {
        $donGia = $item['gia_km'] ?? $item['gia_ban'];
        $this->modelDonHang->addChiTietDonHang($result, $item['san_pham_id'], $donGia, $item['so_luong'], $donGia * $item['so_luong']);
      }
      ;
    }
    $this->modelGioHang->clearDetailGioHang($gioHang['id']);
    $this->modelGioHang->clearGioHang($gioHang['id']);


    if ($result) {
      $_SESSION['thong_bao'] = 'Đặt hàng thành công! Cảm ơn bạn đã mua sắm tại cửa hàng.';
      header("Location: ?act=danhsachsanpham");
    }
    header("Location: ?act=lich-su-mua-hang");
    exit();
  }

  public function lichSuMuaHang()
  {
    if (isset($_SESSION['user'])) {
      // Lay ra id
      $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);

      $nguoi_dung_id = $user['id'];

      // lay ra trang thai don hang
      $arrtrangThai = $this->modelDonHang->getTrangThai();
      $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai_don_hang', 'id');
      $listDanhMuc = $this->modelSanPham->getAllDanhMuc();


      // Lay ra phuong thai thanh toan

      $arrPTTT = $this->modelDonHang->getPttt();
      $pTTT = array_column($arrPTTT, 'phuong_thuc_thanh_toan', 'id');

      // Lay ra danh sach all bill cua user

      $donHangs = $this->modelDonHang->getDonHangFromUser($nguoi_dung_id);
    } else {
      echo "Vui lòng đăng nhập.";
    }

    require_once './views/lichSuMuaHang.php';
  }

  public function chiTietMuahang()
  {
    // $listChiTietDonHang = $this->modelDonHang->getAllChiTietDonHang();
    // var_dump($listChiTietDonHang);
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);

    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id'];

    // lay ra trang thai don hang
    $arrtrangThai = $this->modelDonHang->getTrangThai();
    $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai_don_hang', 'id');
    // var_dump($trangThaiDonHang);
    // die;

    // Lay ra phuong thai thanh toan

    $arrPTTT = $this->modelDonHang->getPttt();
    $pTTT = array_column($arrPTTT, 'ten_phuong_thuc', 'id');

    //Lấy ra thông tin đơn hàng theo ID
    $donHang = $this->modelDonHang->getDonHangById($donHangId);

    // var_dump($donHang);

    //Lấy thông tin sản phẩm của đơn hàng trong bảng chi_tiet_don_hangs
    $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByOrderId($donHangId);
    // var_dump($chiTietDonHang);

    if ($donHang['tai_khoan_id'] != $nguoi_dung_id) {
      echo "Vui lòng đăng nhập.";
      exit();
    }
    require_once "./views/chiTietDonHang.php";
  }

  public function huyDonHang()
  {
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);

    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id_don_hang'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);
    if (!$donHang) {
      $_SESSION['message'] = "Đơn hàng không tồn tại.";
      header("Location:?act=lich-su-mua-hang");
      exit;
    }


    if ($donHang['tai_khoan_id'] != $nguoi_dung_id) {
    $_SESSION['message'] = "Bạn không có quyền hủy đơn hàng này.";
    header("Location:?act=lich-su-mua-hang");
    exit;
   
    }

    if ($donHang['trang_thai_don_hang_id'] != 1) {
      $_SESSION['message'] = "❌ Chỉ đơn hàng 'Chờ xác nhận' mới có thể hủy.";
      header("Location:?act=lich-su-mua-hang");
      exit;
    }
    

    // Lấy chi tiết đơn hàng để cập nhật lại số lượng sản phẩm trong kho
    $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByOrderId($donHangId);

    // Kiểm tra nếu có chi tiết đơn hàng
    if ($chiTietDonHang) {
      // Duyệt qua từng sản phẩm trong đơn hàng để cộng lại số lượng trong kho
      foreach ($chiTietDonHang as $item) {
        $sanPhamId = $item['san_pham_id'];
        $soLuong = $item['so_luong'];

        // Cập nhật lại số lượng sản phẩm trong kho
        $this->modelSanPham->updateQuantityKhiHuy($sanPhamId, $soLuong);
      }
    }
    // Hủy đơn hàng
    if ($this->modelDonHang->updateDH($donHangId, 7)) {
      header("Location:?act=lich-su-mua-hang ");
      exit();
    } else {
      echo "Cập nhật đơn hàng thất bại.";
    }
    require_once './views/lichSuMuaHang.php';
  }

  public function xacNhanDonHang()
  {
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);

    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id_don_hang'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);
    if (!$donHang) {
      echo "Đơn hàng không tồn tại.";
      exit;
    }


    if ($donHang['tai_khoan_id'] != $nguoi_dung_id) {
      echo "Bạn không có quyền xác nhận đơn hàng này.";
      exit;
    }

    if ($donHang['trang_thai_don_hang_id'] != 4) {
      echo "Chỉ đơn hàng 'Đã Giao' mới có thể hủy.";
      exit;
    }


    if ($this->modelDonHang->updateDH($donHangId, 5)) {
      header("Location:?act=lich-su-mua-hang ");
      exit();
    } else {
      echo "Xác nhận đơn hàng thất bại.";
    }
    require_once './views/lichSuMuaHang.php';
  }

  public function xoaDonHang()
  {
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelTaiKhoan->getAllTaiKhoanformEmail($_SESSION['user']['email']);

    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id_don_hang'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);
    if (!$donHang) {
      echo "Đơn hàng không tồn tại.";
      exit;
    }


    if ($donHang['tai_khoan_id'] != $nguoi_dung_id) {
      echo "Bạn không có quyền hủy đơn hàng này.";
      exit;
    }

    if ($donHang['trang_thai_don_hang_id'] != 7) {
      echo "Chỉ đơn hàng 'Đã Hủy' mới có thể xóa.";
      exit;
    }


    // Hủy đơn hàng
    if ($this->modelDonHang->xoaDH($donHangId)) {
      header("Location:?act=lich-su-mua-hang ");
      exit();
    } else {
      echo "Xóa đơn hàng thất bại.";
    }
    require_once './views/lichSuMuaHang.php';
  }

  public function timDonHang()
  {
      $search = isset($_POST['search']) ? $_POST['search'] : '';
      $status = isset($_POST['status']) ? $_POST['status'] : '';
      $userId = $_SESSION['user']['id']; // user hiện tại
  
      // Chuẩn hóa chuỗi tìm kiếm (viết hoa, bỏ khoảng trắng)
      $normalizedSearch = preg_replace('/[^a-zA-Z0-9]/', '', strtoupper(trim($search)));
  
      // Gọi model: nếu không nhập gì, truyền rỗng để lấy tất cả đơn hàng của user
      $donHangs = $this->modelDonHang->searchOrders($userId, $normalizedSearch, $status);

  
      $arrtrangThai = $this->modelDonHang->getTrangThai();
      $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai_don_hang', 'id');
      $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
      $arrPTTT = $this->modelDonHang->getPttt();
      $pTTT = array_column($arrPTTT, 'phuong_thuc_thanh_toan', 'id');
  
      require_once './views/lichSuMuaHang.php';
  }
  



  public function formLogin()
  {


    require_once './views/auth/formLogin.php';
    // deleteSessionError();
  }
}
