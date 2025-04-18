<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
  background: url('./assets/img/123.jpg') no-repeat center center fixed;
  background-size: cover;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Poppins', sans-serif;
}

    .login-container {
      position: relative;
      width: 400px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      color: #fff;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }

    .login-container label {
      margin-top: 15px;
      display: block;
      font-weight: 500;
    }

    .login-container input {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border-radius: 8px;
      border: none;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .login-container input::placeholder {
      color: #ccc;
    }

    .login-container button {
      margin-top: 30px;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #ff6a00;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background-color: #e65c00;
    }

    .login-container .register-btn {
      margin-top: 15px;
      display: block;
      text-align: center;
      font-size: 14px;
    }

    .login-container .register-btn a {
      color: #ddd;
      text-decoration: none;
      transition: color 0.3s;
    }

    .login-container .register-btn a:hover {
      color: #fff;
    }

    .error-message {
      margin-top: 15px;
      color: #ff4d4d;
      font-size: 14px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Đăng nhập Admin</h2>

    <?php if (isset($_SESSION['error'])): ?>
      <p class="error-message"><?= $_SESSION['error'] ?></p>
    <?php endif; ?>

    <form action="?act=check-login" method="post">
      <label for="email"><i class="fas fa-user"></i> Tên đăng nhập</label>
      <input type="text" id="email" name="email" placeholder="Nhập email hoặc số điện thoại" required>

      <label for="password"><i class="fas fa-lock"></i> Mật khẩu</label>
      <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

      <?php if (isset($_SESSION['flash'])): ?>
        <div class="error-message"><?= $_SESSION['flash'] ?></div>
      <?php endif; ?>

      <button type="submit">Đăng nhập</button>
    </form>

    <div class="register-btn">
      <a href="?act=dang-ky">Chưa có tài khoản? Đăng ký</a>
    </div>
  </div>
</body>

</html>
