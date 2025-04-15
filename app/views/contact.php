<!DOCTYPE html>
<html lang="en">

<head>
    <title>Game Warrior</title>
    <meta charset="UTF-8">
    <meta name="description" content="Game Warrior Template">
    <meta name="keywords" content="warrior, game, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet"> -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/css/owl.carousel.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/animate.css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
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
    <!-- Header section end -->


    <!-- Latest news section -->
    <div class="latest-news-section">
		<div class="ln-title">Latest News</div>
		<div class="news-ticker">
			<div class="news-ticker-contant">
				<div class="nt-item"><span class="new">new</span>Genshin Impact 4.0 ra mắt bản đồ Fontaine. </div>
				<div class="nt-item"><span class="strategy">strategy</span>Hướng dẫn build team mạnh nhất Honkai: Star Rail 1.3. </div>
				<div class="nt-item"><span class="racing">racing</span>Đánh giá Baldur's Gate 3: Kiệt tác RPG thế hệ mới . </div>
			</div>
		</div>
	</div>
    <!-- Latest news section end -->


    <!-- Page info section -->
    <section class="page-info-section set-bg" data-setbg="public/img/page-top-bg/5.jpg">
        <div class="pi-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 text-white">
                        <h2>Contact us</h2>
                        <p>Contact us if you have any questions or suggestions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page info section -->


    <!-- Page section -->
    <section class="page-section spad contact-page">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="comment-title">Contact</h4>
                    <p>You can contact us through the following channels:</p>
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="contact-info-list">
                                <li>
                                    <div class="cf-left">Address</div>
                                    <div class="cf-right">Hanoi Highway High-Tech Park, Hiep Phu, Thu Duc, Ho Chi Minh, Vietnam</div>
                                </li>
                                <li>
                                    <div class="cf-left">Điện thoại</div>
                                    <div class="cf-right">+84 123 456 789</div>
                                </li>
                                <li>
                                    <div class="cf-left">Email</div>
                                    <div class="cf-right">info@gamewarrior.com</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <?php
                    // Kiểm tra nếu có thông báo lỗi
                    if (isset($error)) {
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    }

                    // Kiểm tra nếu có thông báo thành công
                    if (isset($success)) {
                        echo '<div class="alert alert-success">' . $success . '</div>';
                    }
                    ?>
                    <div class="contact-form-warp">
                        <h4 class="comment-title">Send us a message</h4>
                        <form class="comment-form" method="post" action="?controller=contact&action=submit">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="subject" placeholder="title" required>
                                    <textarea name="message" placeholder="message" required></textarea>
                                    <button class="site-btn btn-sm">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Contact Form end -->
            </div>
        </div>
    </section>
    <!-- Page section end -->


    <!-- Footer top section -->
    <section class="footer-top-section">
        <div class="container">
            <div class="footer-top-bg">
                <img src="public/img/footer-top-bg.png" alt="">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-logo text-white">
                        <img src="public/img/footer-logo.png" alt="">
                        <p>Nơi bạn tìm thấy tất cả thông tin về game, đánh giá, và cộng đồng game thủ.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-5 mb-md-0">
                        <h4 class="fw-title">Bài viết gần đây</h4>
                        <div class="latest-blog">
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/1.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Đánh giá chi tiết về tựa game mới nhất trên thị trường</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/2.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Tổng hợp các sự kiện game lớn trong tháng</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/3.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Hướng dẫn chơi game cho người mới bắt đầu</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4 class="fw-title">Bình luận nổi bật</h4>
                        <div class="top-comment">
                            <div class="tc-item">
                                <div class="tc-thumb set-bg" data-setbg="public/img/authors/1.jpg"></div>
                                <div class="tc-content">
                                    <p><a href="#">James Smith</a> <span>on</span> Lorem ipsum dolor sit amet, co</p>
                                    <div class="tc-date">June 21, 2018</div>
                                </div>
                            </div>
                            <div class="tc-item">
                                <div class="tc-thumb set-bg" data-setbg="public/img/authors/2.jpg"></div>
                                <div class="tc-content">
                                    <p><a href="#">James Smith</a> <span>on</span> Lorem ipsum dolor sit amet, co</p>
                                    <div class="tc-date">June 21, 2018</div>
                                </div>
                            </div>
                            <div class="tc-item">
                                <div class="tc-thumb set-bg" data-setbg="public/img/authors/3.jpg"></div>
                                <div class="tc-content">
                                    <p><a href="#">James Smith</a> <span>on</span> Lorem ipsum dolor sit amet, co</p>
                                    <div class="tc-date">June 21, 2018</div>
                                </div>
                            </div>
                            <div class="tc-item">
                                <div class="tc-thumb set-bg" data-setbg="public/img/authors/4.jpg"></div>
                                <div class="tc-content">
                                    <p><a href="#">James Smith</a> <span>on</span> Lorem ipsum dolor sit amet, co</p>
                                    <div class="tc-date">June 21, 2018</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer top section end -->


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container">
            <ul class="footer-menu">
                <li><a href="?controller=home&action=index">Home</a></li>
                <li><a href="?controller=review&action=index">Games</a></li>
                <li><a href="?controller=category&action=index">Blog</a></li>
                <li><a href="?controller=community&action=index">Forums</a></li>
                <li><a href="?controller=contact&action=index">Contact</a></li>
            </ul>
            <p class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright ©
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </footer>
    <!-- Footer section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.marquee.min.js"></script>
    <script src="public/js/main.js"></script>


    <!-- load for map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTIlluowDL-X4HbYQt3aDw_oi2JP0Krc&sensor=false"></script>
    <script src="public/js/map.js"></script>

</body>

</html>