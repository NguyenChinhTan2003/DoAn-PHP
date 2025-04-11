<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="public/css/change_password.css">
</head>
<body>
    <!-- Video Background -->
    <div class="video-container">
        <video autoplay muted loop playsinline>
            <source src="public/video/BG-2Likes.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>

    <div class="login-container">
        <h2>Đổi mật khẩu</h2>
        <form method="POST" action="index.php?controller=login&action=change_password">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="old_password">Mật khẩu cũ:</label>
                <input type="password" id="old_password" name="old_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <button type="submit" name="submit" class="btn-login">Đổi mật khẩu</button>
            <p><a href="index.php?action=login">Quay lại đăng nhập</a></p>
        </form>
    </div>
</body>
</html>