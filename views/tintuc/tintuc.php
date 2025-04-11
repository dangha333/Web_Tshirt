<?php require_once 'views/layout/header.php'; ?>

<body class="shop">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once 'views/layout/menu.php'; ?>
        <title><?= $TinTucss['title'] ?></title>
        <style>
            body {
                background-color: #f8f9fa;
                /* Sử dụng màu sáng hơn cho nền */
                line-height: 1.6;
                padding: 20px;
                /* Giảm padding cho thân */
                font-family: Arial, sans-serif;
                /* Thêm font cho toàn bộ trang */
            }

            .title {
                text-align: center;
                /* Canh giữa tiêu đề */
                font-size: 36px;
                /* Tăng kích thước tiêu đề */
                font-weight: bold;
                color: #333;
                margin: 20px 0;
            }

            .image {
                width: 100%;
                /* Đặt chiều rộng hình ảnh thành 100% */
                max-width: 800px;
                /* Giới hạn chiều rộng tối đa */
                height: auto;
                /* Tự động điều chỉnh chiều cao */
                border-radius: 8px;
                margin-bottom: 20px;
                display: block;
                /* Đảm bảo hình ảnh là khối */
                margin-left: auto;
                /* Canh giữa hình ảnh */
                margin-right: auto;
                /* Canh giữa hình ảnh */
            }

            .news-detail-title {
                font-size: 32px;
                font-weight: bold;
                color: #333;
                margin: 10px 0;
                text-align: center;
                /* Canh giữa tiêu đề tin tức */
            }

            .news-detail-date {
                font-size: 20px;
                color: #888;
                margin-bottom: 20px;
                text-align: center;
                /* Canh giữa ngày đăng */
            }

            .news-detail-content {
                font-size: 18px;
                /* Giảm kích thước font để dễ đọc hơn */
                line-height: 1.8;
                /* Tăng khoảng cách dòng */
                color: #555;
                margin: 0 auto;
                /* Canh giữa nội dung */
                max-width: 800px;
                /* Giới hạn chiều rộng nội dung */
                padding: 0 15px;
                /* Thêm padding bên trái và bên phải */
            }

            .news-detail-content p {
                margin-bottom: 15px;
            }

            .back-button {
                display: inline-block;
                margin-top: 30px;
                /* Tăng khoảng cách trên nút quay lại */
                padding: 12px 25px;
                /* Tăng padding cho nút */
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                font-size: 18px;
                /* Tăng kích thước font cho nút */
                transition: background-color 0.3s;
                /* Thêm hiệu ứng chuyển màu */
            }

            .back-button:hover {
                background-color: #2980b9;
            }

            hr {
                border: none;
                border-top: 1px solid #ddd;
                /* Tạo đường phân cách nhẹ */
                margin: 20px 0;
                /* Thêm khoảng cách trên và dưới */
            }
        </style>

        <h1 class="title"><?= $TinTucs['title'] ?></h1>
        <hr>
        <p class="news-detail-date">Ngày đăng: <?= $TinTucs['date'] ?></p>
        <div class="news-detail-container">
            <div class="news-detail-content">
                <p><?= $TinTucs['content'] ?></p>
            </div>
            <img src=<?= 'http://localhost/DA1-Silver_Ring' . $TinTucs['img'] ?> alt="Ảnh tin tức" class="image">
        </div>

    </div>
    <?php require_once('views/layout/footer.php'); ?>
</body>