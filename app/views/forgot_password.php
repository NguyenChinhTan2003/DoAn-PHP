<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap">
    <link rel="stylesheet" href="public/css/forgot_password.css">
</head>
<body>
    <!-- Video Background -->
    <div class="video-container">
        <video autoplay muted loop playsinline>
            <source src="public/video/BG-2Likes.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ thẻ video.
        </video>
        <div class="video-overlay"></div>
    </div>

    <!-- Forgot Password Form -->
    <div class="login-container">
        <h2>Quên Mật Khẩu</h2>
        <form method="POST" action="index.php?controller=login&action=forgot_password" class="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <button type="submit" name="submit" class="btn-login">Gửi Lại Mật Khẩu</button>
        </form>
        <div class="register-link">
            <p>Đã nhớ mật khẩu? <a href="index.php?action=login">Đăng nhập ngay</a></p>
        </div>
    </div>
</body>
</html>