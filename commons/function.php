<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;

    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
function deleteSessionError()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}

function checkLoginAdmin()
{
    if ($_REQUEST['act'] === 'login-admin' || 
    $_REQUEST['act'] === 'check-login-admin' || 
    $_REQUEST['act'] === 'logout-admin' || 
    $_REQUEST['act'] === 'dang-ky' ||
    $_REQUEST['act'] === 'check-dang-ky') {
    } else {
        if (!isset($_SESSION['user_admin'])) {
            header("Location: ?act=login-admin");
        }
    }

}
function checkAccess()
{
    $act = $_REQUEST['act'] ?? '';
    $isAdminRoute = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;

    // ✅ ƯU TIÊN: Nếu đã login với quyền admin → chuyển sang dashboard
    if (isset($_SESSION['user_admin']) && $_SESSION['user_admin']['chuc_vu_id'] == 1) {
        if (in_array($act, ['login', 'login-admin', 'check-login', 'check-login-admin'])) {
            header("Location: /web_Tshirt/admin/?act=dashboard");
            exit();
        }
    }

    // ==== ADMIN ROUTE ====
    if ($isAdminRoute) {
        $publicAdminActs = ['login-admin', 'check-login-admin', 'logout-admin'];
        if (!in_array($act, $publicAdminActs)) {
            if (!isset($_SESSION['user_admin'])) {
                header("Location: ?act=login-admin");
                exit();
            }

            if ($_SESSION['user_admin']['chuc_vu_id'] != 1) {
                header("Location: /web_Tshirt/?act=home");
                exit();
            }
        }
    }

    // ==== CLIENT ROUTE ====
    else {
        $publicClientActs = ['login', 'check-login', 'logout', 'dang-ky', 'check-dang-ky'];
        if (!in_array($act, $publicClientActs)) {
            if (!isset($_SESSION['user'])) {
                header("Location: ?act=login");
                exit();
            }

            // Nếu là admin nhưng chưa login client → redirect về admin
            if (isset($_SESSION['user_admin']) && !isset($_SESSION['user'])) {
                header("Location: /web_Tshirt/admin/?act=login-admin");
                exit();
            }
        }
    }
}




