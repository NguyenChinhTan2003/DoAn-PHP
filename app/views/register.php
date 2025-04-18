<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="public/css/register_style.css">
    <title>Đăng ký tài khoản</title>
</head>

<body>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="public/video/BG-2Likes.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video nền.
        </video>
    </div>
    <div class="video-overlay"></div> <!-- Lớp phủ làm mờ video -->

    <div class="form-container">
        <h2>Đăng ký tài khoản</h2>
        <?php if (isset($error)): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="?controller=login&action=register" class="register-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Cái này là chọn Role để test chức năng -->
            <!-- <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div> -->

            <button type="submit" name="register" class="btn-register">Register</button>
        </form>
    </div>
</body>

</html>