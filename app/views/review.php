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
					<li><a href="?controller=category&action=index">Dashboard</a></li>
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


    	<!-- Search Section -->
        <section class="search-section spad pt-4 pb-0"> 
            <div class="container">
                <div class="row justify-content-center"> 
                    <div class="col-lg-8"> 
                        <!-- Bỏ method, action và các input hidden -->
                        <form id="client-search-form" class="search-form"> 
                            <div class="input-group">
                                <input type="text" id="search-input" class="form-control" placeholder="Tìm kiếm tin tức trên trang này..." 
                                    aria-label="Tìm kiếm tin tức">
                                <div class="input-group-append">
                                    <!-- Có thể đổi thành type="button" hoặc để submit và dùng preventDefault() trong JS -->
                                    <button class="btn btn-outline-warning" type="submit">Tìm</button> 
                                </div>
                            </div>
                        </form>
                        <!-- Thêm một div để hiển thị thông báo không tìm thấy -->
                        <div id="no-results-message" style="display: none; margin-top: 10px; text-align: center; color: #777;">
                            Không tìm thấy tin tức nào phù hợp.
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<!-- END Search Section -->

    <!-- Page section (2 cột lớn cho tất cả tin tức) -->
    <section class="page-section review-page spad">
        <div id="news-list-container" class="container">
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
                <div class="col-md-6 news-item">
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
                <?php if (empty($newsList)): ?>
                    <p class="col-12 text-center">Hiện chưa có tin tức nào.</p>
                <?php endif; ?>
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

    <!-- *** Script mới cho Tìm kiếm Client-Side *** -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchForm = document.getElementById('client-search-form');
            const searchInput = document.getElementById('search-input');
            const newsItems = document.querySelectorAll('.news-item'); // Chọn tất cả các thẻ cha chứa bài viết
            const noResultsMessage = document.getElementById('no-results-message');
            const newsListContainer = document.getElementById('news-list-container'); // Container của danh sách

            // Hàm thực hiện lọc
            function filterNews() {
                const searchTerm = searchInput.value.toLowerCase().trim(); // Lấy từ khóa, chuyển về chữ thường và bỏ khoảng trắng thừa
                let foundResults = false; // Biến kiểm tra xem có kết quả nào không

                newsItems.forEach(item => {
                    const titleElement = item.querySelector('h4');
                    const contentElement = item.querySelector('p');
                    let itemText = '';

                    if (titleElement) {
                        itemText += titleElement.textContent.toLowerCase();
                    }
                    if (contentElement) {
                        itemText += ' ' + contentElement.textContent.toLowerCase();
                    }
                    
                    // Kiểm tra xem nội dung có chứa từ khóa không
                    if (itemText.includes(searchTerm)) {
                        item.style.display = ''; // Hiển thị item nếu khớp (trả về display mặc định của CSS)
                        foundResults = true; // Đánh dấu là đã tìm thấy ít nhất 1 kết quả
                    } else {
                        item.style.display = 'none'; // Ẩn item nếu không khớp
                    }
                });

                // Hiển thị hoặc ẩn thông báo "Không tìm thấy"
                if (!foundResults && searchTerm !== '') {
                    noResultsMessage.style.display = 'block';
                     // Ẩn container nếu không có kết quả để thông báo hiển thị đẹp hơn (tùy chọn)
                    // newsListContainer.style.display = 'none'; 
                } else {
                    noResultsMessage.style.display = 'none';
                    // Hiện lại container nếu có kết quả hoặc ô tìm kiếm trống
                    // newsListContainer.style.display = 'flex'; // Hoặc 'block' tùy layout
                }

                 // Trường hợp xóa hết ô tìm kiếm, hiện lại tất cả
                 if (searchTerm === '') {
                    newsItems.forEach(item => {
                        item.style.display = '';
                    });
                    noResultsMessage.style.display = 'none';
                    // newsListContainer.style.display = 'flex'; // Hoặc 'block'
                 }
            }

            // Lắng nghe sự kiện submit form
            searchForm.addEventListener('submit', (event) => {
                event.preventDefault(); // Ngăn form gửi đi theo cách truyền thống
                filterNews(); // Gọi hàm lọc
            });

            // Tùy chọn: Lắng nghe sự kiện nhập liệu để tìm kiếm "live" (khi đang gõ)
            searchInput.addEventListener('input', () => {
                filterNews(); // Gọi hàm lọc mỗi khi người dùng gõ
            });

             // (Đã có ở trên) Script để set background image
             document.querySelectorAll('.set-bg').forEach(element => {
                const bg = element.getAttribute('data-setbg');
                if (bg) { // Thêm kiểm tra nếu data-setbg tồn tại
                   element.style.backgroundImage = `url(${bg})`;
                }
             });
        });
    </script>

</body>
</html>