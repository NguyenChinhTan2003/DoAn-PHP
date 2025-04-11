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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

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
                    <a href="?action=logout" class="logout-btn">Đăng xuất</a>
                <?php else : ?>
                    <a href="?action=login">Login</a> /
                    <a href="?action=register">Register</a>
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

   

    <!-- Page info section -->
    <section class="page-info-section set-bg" data-setbg="public/img/page-top-bg/5.jpg">
        <div class="pi-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 text-white">
                        <h2>Liên hệ với chúng tôi</h2>
                        <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn. Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi nào</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page info section -->

    <!-- Page section -->
    <section class="page-section spad contact-page">
        <div class="container">
            <!-- Hiển thị thông báo nếu có -->
            <?php if (isset($_GET['success']) && $_GET['success'] == 1) : ?>
                <div class="alert alert-success" role="alert">
                    Your message has been sent successfully!
                </div>
            <?php elseif (isset($_GET['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <div class="map" id="map-canvas"></div>
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="comment-title">Liên hệ với chúng tôi</h4>
                    <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn. Nếu bạn có bất kỳ thắc mắc nào hoặc cần tư vấn thêm, đừng ngần ngại liên hệ với chúng tôi.
</p>
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="contact-info-list">
                                <li>
                                    <div class="cf-left">Địa chỉ</div>
                                    <div class="cf-right">227 Nguyễn Văn Cừ, Quận 5, TP. Hồ Chí Min</div>
                                </li>
                                <li>
                                    <div class="cf-left">Số điện thoại</div>
                                    <div class="cf-right">0965839789</div>
                                </li>
                                <li>
                                    <div class="cf-left">Email</div>
                                    <div class="cf-right"> support@yourcompany.com</div>
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
                <div class="col-lg-8">
                    <div class="contact-form-warp">
                        <h4 class="comment-title">Gửi phản hồi</h4>
                        <form class="comment-form" action="?controller=contact&action=submit" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Họ tên" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="subject" placeholder="Vấn đề" required>
                                    <textarea name="message" placeholder="Nội dung" required></textarea>
                                    <button type="submit" class="site-btn btn-sm">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing ipsum dolor sit ame.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-5 mb-md-0">
                        <h4 class="fw-title">Latest Posts</h4>
                        <div class="latest-blog">
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/1.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing ipsum</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/2.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing ipsum</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                            <div class="lb-item">
                                <div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/3.jpg"></div>
                                <div class="lb-content">
                                    <div class="lb-date">June 21, 2018</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing ipsum</p>
                                    <a href="#" class="lb-author">By Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4 class="fw-title">Top Comments</h4>
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
                Copyright ©<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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