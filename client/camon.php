<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }
      
    </style>
</head>

<body>
    <h1>Đặt hàng thành công!<i class="fas fa-check-circle"></i></h1><br>
    <h5>Cảm ơn bạn đã đặt hàng từ shop Sneaker. Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</h5><br>
    <a href="index.php" class="btn">Quay lại trang chủ</a>

</body>

<script>
    // Danh sách các màu sắc
    var colors = ["red", "green", "blue", "orange", "purple", "pink"];
    var currentColorIndex = 0;

    // Lấy thẻ chữ cần thay đổi màu
    var heading = document.querySelector("h1");

    // Thiết lập hàm chuyển màu tự động
    var changeColor = setInterval(function () {
        heading.style.color = colors[currentColorIndex];
        currentColorIndex = (currentColorIndex + 1) % colors.length;
    }, 700); // Thời gian chuyển màu (ms)

    // Dừng chuyển màu khi  rời khỏi trang
    window.addEventListener("beforeunload", function () {
        clearInterval(changeColor);




     var checkIcon = document.querySelector(".fa-check-circle");

    // Đặt thời gian tự động ẩn biểu tượng tích sau 3 giây (3000ms)
    setTimeout(function () {
        checkIcon.style.display = "none";
    }, 10000);
    });
</script>

</html>