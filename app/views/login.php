<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/css/login_style.css">
</head>

<body>
    <!-- Video Background -->
    <div class="video-container">
        <video autoplay muted loop playsinline>
            <source src="public/video/BG-2Likes.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>

    <!-- Form đăng nhập -->
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="index.php?action=login" class="login-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="login" class="btn-login">Đăng nhập</button>
            <p><a href="index.php?controller=login&action=forgot_password" class="forgot-password-link">Quên mật khẩu?</a></p>
            <p><a href="index.php?controller=login&action=change_password">Đổi mật khẩu</a></p>
            <p class="register-link">Chưa có tài khoản? <a href="index.php?action=register">Đăng ký ngay</a></p>

            <!-- Nút đăng nhập mạng xã hội -->
            <div class="social-login">
                <p>Hoặc đăng nhập bằng</p>
                <a href="index.php?controller=login&action=login_facebook" class="btn-social facebook">Facebook</a>
                <a href="index.php?controller=login&action=login_google" class="btn-social google">Google</a>
            </div>
        </form>
    </div>
</body>
</html>