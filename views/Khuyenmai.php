<?php
require_once('views/layout/header.php'); ?>

<body class="home">
    <div id="page" class="hfeed page-wrapper">
        <?php require_once('views/layout/menu.php'); ?>
        <br><br>
        <h2 class="text-center">Khuyến Mãi, Ưu Đãi HOT Nhất Tại T-Shirt</h2>
        <h3 class="text-center">Ưu đãi tháng 11</h3><br>

        <div class="container">
            <div class="row">
                <?php foreach ($danhSachKhuyenMai as $KhuyenMaiItem) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4"> <!-- 3 cards in a row -->
                        <div class="card text-center shadow position-relative">
                            <p class="card-img-top mx-auto mt-3">T-Shirt</p>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title"><?= $KhuyenMaiItem['ten_khuyen_mai'] ?></h5>
                                <p class="card-text text-muted">Hạn sử dụng: <?= $KhuyenMaiItem['ngay_ket_thuc'] ?></p>
                                <span class="d-none" id="promo-code-<?= $KhuyenMaiItem['ma_khuyen_mai'] ?>"><?= $KhuyenMaiItem['ma_khuyen_mai'] ?></span>
                            </div>
                            <button class="btn btn-success btn-sm position-absolute top-0 end-0 m-2" onclick="copyCode('<?= $KhuyenMaiItem['ma_khuyen_mai'] ?>')">Sao chép mã</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <br>

        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f9f9f9;
                color: #333;
            }

            h2.text-center,
            h3.text-center {
                margin: 20px 0;
                color: #FF6347;
                /* Giữ màu xanh dương */
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
                /* Thêm bóng cho chữ */
            }

            h2.text-center {
                margin-top: 100px;
                font-weight: bold;
                /* Làm cho chữ đậm hơn */
            }

            .card {
                transition: transform 0.3s, box-shadow 0.3s;
                /* Smooth transition for hover effects */
                border-radius: 10px;
                /* Rounded corners */
                border: none;
                /* Remove default border */
                background-color: #fff;
                /* White background for cards */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                /* Subtle shadow */
                margin-top: 50px;
            }

            .card:hover {
                transform: translateY(-10px);
                /* Lift effect on hover */
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                /* Shadow effect on hover */
            }

            .card-img-top {
                font-size: 1.5rem;
                /* Adjust font size for the image title */
                font-weight: bold;
                /* Make the title bold */
                color: #333;
                /* Dark color for better contrast */
            }

            .card-title {
                font-size: 1.75rem;
                /* Adjust the title size */
                color: #007bff;
                /* Bootstrap primary color */
            }

            .card-text {
                font-size: 0.9rem;
                /* Slightly smaller font for text */
            }

            .btn-success {
                background: linear-gradient(135deg, #8A2BE2, #4B0082);
                /* Gradient từ tím sáng sang tím đậm */
                border: none;
                /* Không có viền */
                color: white;
                /* Màu chữ trắng */
                padding: 10px 15px;
                /* Khoảng cách bên trong */
                border-radius: 30px;
                /* Bo góc tròn */
                font-size: 0.9rem;
                /* Kích thước chữ */
                font-weight: bold;
                /* Chữ đậm */
                transition: background 0.3s, transform 0.2s, box-shadow 0.2s;
                /* Hiệu ứng chuyển đổi */
            }

            .btn-success:hover {
                background: linear-gradient(135deg, #4B0082, #8A2BE2);
                /* Đảo ngược gradient khi hover */
                transform: scale(1.05);
                /* Tăng kích thước nhẹ khi hover */
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
                /* Bóng đổ tối hơn khi hover */
            }

            .newsletter-form {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }

            .newsletter-form input[type="email"] {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-right: 10px;
                width: 300px;
            }

            .newsletter-form .btn-submit input[type="submit"] {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #007bff;
                color: white;
                cursor: pointer;
            }

            .newsletter-form .btn-submit input[type="submit"]:hover {
                background-color: #0056b3;
                /* Darker blue on hover */
            }

            .testimonial-wrap {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .testimonial-item {
                margin-bottom: 20px;
            }

            .testimonial-title {
                font-size: 1.2rem;
                font-weight: bold;
                color: #007bff;
            }

            .testimonial-excerpt {
                font-size: 0.9rem;
                color: #666;
            }

            .testimonial-image {
                display: flex;
                align-items: center;
                margin-top: 10px;
            }

            .testimonial-info {
                margin-left: 10px;
            }

            .testimonial-customer-name {
                font-weight: bold;
                color: #333;
            }

            .slick-slide {
                transition: transform 0.3s;
            }

            .slick-slide:hover {
                transform: scale(1.05);
                /* Slight zoom effect on hover */
            }
        </style>

        <script>
            function copyCode(code) {
                const tempInput = document.createElement('input');
                tempInput.value = code;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                alert('Đã sao chép mã: ' + code);
            }
        </script>
    </div>
    <?php require_once('views/layout/footer.php'); ?>
</body>