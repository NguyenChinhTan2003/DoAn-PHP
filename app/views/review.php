<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Reviews</title>
    <!-- Bao gồm Font Awesome cho biểu tượng sao -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Liên kết đến file CSS riêng -->
    <link rel="stylesheet" href="public/css/review-page.css">
    <link href="public/img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/css/owl.carousel.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/animate.css" />
</head>
<body>
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
					<li><a href="?controller=category&action=index">Blog</a></li>
					<li><a href="?controller=community&action=index">Forums</a></li>
					<li><a href="?controller=contact&action=index">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page info section -->
    <section class="page-info-section set-bg" data-setbg="public/img/page-top-bg/3.jpg">
        <div class="pi-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 text-white">
                        <h2>Game NEWS</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page section (2 cột lớn cho tất cả tin tức) -->
    <section class="page-section review-page spad">
        <div class="container">
            <!-- Debug: Kiểm tra số lượng bài đăng trong $newsList -->

            <div class="row">
                <?php 
                // Sắp xếp $newsList theo ngày đăng mới nhất (created_at giảm dần)
                // (Không cần usort vì đã sắp xếp trong truy vấn SQL)
                // usort($newsList, function($a, $b) {
                //     return strtotime($b['created_at']) - strtotime($a['created_at']);
                // });

                // Khởi tạo biến đếm để gán hình ảnh theo thứ tự
                $imageCounter = 1;
                // Hiển thị tất cả tin tức từ $newsList trong bố cục 2 cột
                foreach ($newsList as $news): 
                    // Gán giá trị mặc định nếu dữ liệu thiếu
                    $news['id'] = $news['id'] ?? 0;
                    $news['title'] = $news['title'] ?? 'Untitled';
                    $news['content'] = $news['content'] ?? 'No content';
                    $news['created_at'] = $news['created_at'] ?? date('Y-m-d H:i:s');
                ?>
                <div class="col-md-6">
                    <div class="review-item">
                        <div class="review-cover set-bg" 
                             data-setbg="public/img/single-blog/<?php echo $imageCounter; ?>.jpg">
                            <div class="score yellow"><?php echo rand(8, 9) . '.' . rand(0, 9); ?></div>
                        </div>
                        <div class="review-text">
                            <h4><?php echo htmlspecialchars($news['title']); ?></h4>
                            <div class="rating">
                                <?php 
                                $rating = rand(3, 5);
                                for ($i = 0; $i < 5; $i++) {
                                    echo $i < $rating 
                                        ? '<i class="fa fa-star"></i>' 
                                        : '<i class="fa fa-star is-fade"></i>';
                                }
                                ?>
                            </div>
                            <p><?php echo substr(htmlspecialchars($news['content']), 0, 150) . '...'; ?></p>
                            <a href="?controller=singleblog&id=<?php echo $news['id']; ?>" 
                               class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <?php 
                // Tăng biến đếm để lấy hình ảnh tiếp theo
                $imageCounter++;
                endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Script để set background image -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.set-bg').forEach(element => {
                const bg = element.getAttribute('data-setbg');
                element.style.backgroundImage = `url(${bg})`;
            });
        });
    </script>
</body>
</html>