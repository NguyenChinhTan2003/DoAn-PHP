<!-- app/views/single-blog.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?> - Game News</title>
    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/css/owl.carousel.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/animate.css" />
    <!-- Custom Styles for Single Blog -->
    <link rel="stylesheet" href="public/css/single-blog.css" />
</head>
<body>
    <!-- Header -->
    <header class="header-section">
        <div class="container">
            <!-- logo -->
            <a class="site-logo" href="?controller=home&action=index">
                <img src="public/img/logo.png" alt="">
            </a>
            <div class="user-panel">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span>Xin chào, <b><?php echo $_SESSION['user']['fullname']; ?></b>!</span>
                    <a href="index.php?action=logout" class="logout-btn">Đăng xuất</a>
                <?php else : ?>
                    <a href="index.php?action=login">Login</a> /
                    <a href="index.php?action=register">Register</a>
                <?php endif; ?>
            </div>
            <!-- responsive -->
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <!-- site menu -->
            <nav class="main-menu">
                <ul>
                    <li><a href="?controller=home&action=index">Home</a></li>
					<li><a href="?controller=review&action=index">Games</a></li>
					<li><a href="?controller=category&action=index">Dashboard</a></li>
					<li><a href="?controller=community&action=index">Forums</a></li>
					<li><a href="?controller=contact&action=index">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content single-blog-wrapper">
        <div class="container">
            <article class="blog-post">
                <h1 class="post-title"><?php echo htmlspecialchars($blog['title']); ?></h1>
                <div class="post-meta">
                    <span><i class="far fa-clock"></i> <?php echo $blog['created_at']; ?></span>
                    <span><i class="fa fa-eye"></i> <?php echo isset($blog['views']) ? $blog['views'] : '0'; ?> lượt xem</span>
                </div>
                <?php if (!empty($blog['image'])): ?>
                    <div class="post-image">
                        <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    </div>
                <?php endif; ?>
                <div class="post-content">
                    <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
                </div>
            </article>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>© <?php echo date('Y'); ?> Game News. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>