<!DOCTYPE html>
<html lang="zxx">

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
					<li><a href="?controller=dashboad&action=index">Dashboard</a></li>
					<!-- <li><a href="?controller=contact&action=index">Contact</a></li> -->
				</ul>
			</nav>
			
		</div>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="public/video/BG-2Likes.mp4">
				<div class="hs-text">
					<div class="container">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

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


	<!-- Feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="public/img/single-blog/1.jpg">
						<span class="cata new">new</span>
						<div class="fi-content text-white">
							<h5><a href="?controller=singleblog&id=1">Genshin Impact 4.0 ra mắt bản đồ Fontaine</a></h5>
							<p>HoYoverse chính thức trình làng bản cập nhật 4.0 đầy ấn tượng ... </p>
							<a href="#" class="fi-comment">3 Comments</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="public/img/single-blog/2.jpg">
						<span class="cata strategy">strategy</span>
						<div class="fi-content text-white">
							<h5><a href="?controller=singleblog&id=2">Valorant Champions 2023: Team A giành chức vô địch</a></h5>
							<p>Team A lập nên kỳ tích tại Valorant Champions 2023 sau màn lội ngược ... </p>
							<a href="#" class="fi-comment">3 Comments</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="public/img/single-blog/4.jpg">
						<span class="cata new">new</span>
						<div class="fi-content text-white">
							<h5><a href="?controller=singleblog&id=3">Hướng dẫn build team mạnh nhất Honkai: Star Rail 1.3</a></h5>
							<p>Bài viết phân tích chi tiết các đội hình (team com... </p>
							<a href="#" class="fi-comment">3 Comments</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="public/img/single-blog/6.jpg">
						<span class="cata racing">racing</span>
						<div class="fi-content text-white">
							<h5><a href="?controller=singleblog&id=4">Đánh giá Baldur's Gate 3: Kiệt tác RPG thế hệ mới</a></h5>
							<p>Baldur's Gate 3 xứng đáng được đánh giá 10/10 nhờ cốt truyện đầy chiều sâu... </p>
							<a href="#" class="fi-comment">3 Comments</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Feature section end -->


	<!-- Recent game section  -->
<section class="recent-game-section spad set-bg" data-setbg="public/img/recent-game-bg.png">
	<div class="container">
		<div class="section-title">
			<div class="cata new">mới</div>
			<h2>Game Mới Nhất</h2>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="recent-game-item">
					<div class="rgi-thumb set-bg" data-setbg="public/img/recent-game/1.jpg">
						<div class="cata new">mới</div>
					</div>
					<div class="rgi-content">
						<h5>Cyberpunk 2077: Phantom Liberty</h5>
						<p>Trải nghiệm bản mở rộng hấp dẫn của tựa game RPG hậu tận thế với các nhiệm vụ mới, nhân vật mới và cốt truyện gay cấn tại Night City.</p>
						<a href="#" class="comment">24 Bình luận</a>
						<div class="rgi-extra">
							<div class="rgi-star"><img src="public/img/icons/star.png" alt=""></div>
							<div class="rgi-heart"><img src="public/img/icons/heart.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="recent-game-item">
					<div class="rgi-thumb set-bg" data-setbg="public/img/recent-game/2.jpg">
						<div class="cata racing">đua xe</div>
					</div>
					<div class="rgi-content">
						<h5>Forza Horizon 5: Rally Adventure</h5>
						<p>Tham gia thử thách đua xe địa hình tuyệt đỉnh với các phương tiện rally mới, hệ thống thời tiết động và các giải đấu qua những khung cảnh tuyệt đẹp.</p>
						<a href="#" class="comment">16 Bình luận</a>
						<div class="rgi-extra">
							<div class="rgi-star"><img src="public/img/icons/star.png" alt=""></div>
							<div class="rgi-heart"><img src="public/img/icons/heart.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="recent-game-item">
					<div class="rgi-thumb set-bg" data-setbg="public/img/recent-game/3.jpg">
						<div class="cata adventure">Phiêu lưu</div>
					</div>
					<div class="rgi-content">
						<h5>Elden Ring: Shadow of the Erdtree</h5>
						<p>Hành trình vào vùng đất mở rộng của vũ trụ Elden Ring với những boss mới, vũ khí mới và những bí ẩn chờ đợi trong bản mở rộng được đánh giá cao này.</p>
						<a href="#" class="comment">32 Bình luận</a>
						<div class="rgi-extra">
							<div class="rgi-star"><img src="public/img/icons/star.png" alt=""></div>
							<div class="rgi-heart"><img src="public/img/icons/heart.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Recent game section end -->


<!-- Tournaments section -->
<section class="tournaments-section spad">
	<div class="container">
		<div class="tournament-title">Giải Đấu</div>
		<div class="row">
			<div class="col-md-6">
				<div class="tournament-item mb-4 mb-lg-0">
					<div class="ti-notic">Giải Đấu Cao Cấp</div>
					<div class="ti-content">
						<div class="ti-thumb set-bg" data-setbg="public/img/tournament/1.jpg"></div>
						<div class="ti-text">
							<h4>World Of WarCraft</h4>
							<ul>
								<li><span>Bắt đầu giải đấu:</span> 15/05/2025</li>
								<li><span>Kết thúc giải đấu:</span> 30/05/2025</li>
								<li><span>Số người tham gia:</span> 16 đội</li>
								<li><span>Tổ chức bởi:</span> BlizzardOps</li>
							</ul>
							<p><span>Giải thưởng:</span> Hạng nhất 5.000$, Hạng nhì: 2.500$, Hạng ba: 1.000$</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="tournament-item">
					<div class="ti-notic">Giải Đấu Cao Cấp</div>
					<div class="ti-content">
						<div class="ti-thumb set-bg" data-setbg="public/img/tournament/2.jpg"></div>
						<div class="ti-text">
							<h4>DOOM</h4>
							<ul>
								<li><span>Bắt đầu giải đấu:</span> 01/06/2025</li>
								<li><span>Kết thúc giải đấu:</span> 15/06/2025</li>
								<li><span>Số người tham gia:</span> 32 đội</li>
								<li><span>Tổ chức bởi:</span> BethesdaGaming</li>
							</ul>
							<p><span>Giải thưởng:</span> Hạng nhất 3.000$, Hạng nhì: 1.500$, Hạng ba: 700$</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Tournaments section bg -->


<!-- Review section -->
<section class="review-section spad set-bg" data-setbg="public/img/review-bg.png">
	<div class="container">
		<div class="section-title">
			<div class="cata new">mới</div>
			<h2>Đánh Giá Gần Đây</h2>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="review-item">
					<div class="review-cover set-bg" data-setbg="public/img/review/1.jpg">
						<div class="score yellow">9.3</div>
					</div>
					<div class="review-text">
						<h5>Assassin's Creed Mirage</h5>
						<p>Quay trở lại với cội nguồn của dòng game, mang đến trải nghiệm lẻn lút và ám sát chân thực.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="review-item">
					<div class="review-cover set-bg" data-setbg="public/img/review/2.jpg">
						<div class="score purple">9.5</div>
					</div>
					<div class="review-text">
						<h5>DOOM Eternal</h5>
						<p>Hành động không ngừng nghỉ, đồ họa siêu đẹp và gameplay điên cuồng xứng đáng với mọi lời khen.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="review-item">
					<div class="review-cover set-bg" data-setbg="public/img/review/3.jpg">
						<div class="score green">9.1</div>
					</div>
					<div class="review-text">
						<h5>Overwatch 2</h5>
						<p>Với các anh hùng mới và cơ chế chơi được cải tiến, Overwatch 2 mang đến làn gió mới cho thể loại FPS.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="review-item">
					<div class="review-cover set-bg" data-setbg="public/img/review/4.jpg">
						<div class="score pink">9.7</div>
					</div>
					<div class="review-text">
						<h5>GTA VI</h5>
						<p>Bom tấn được mong đợi nhất năm với thế giới mở rộng lớn, cốt truyện hấp dẫn và đồ họa đột phá.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Review section end -->


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
					<p>Cổng thông tin game hàng đầu Việt Nam, cập nhật tin tức và đánh giá mới nhất từ làng game trong nước và quốc tế.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="footer-widget mb-5 mb-md-0">
					<h4 class="fw-title">Bài Viết Mới Nhất</h4>
					<div class="latest-blog">
						<div class="lb-item">
							<div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/1.jpg"></div>
							<div class="lb-content">
								<div class="lb-date">15/04/2025</div>
								<p>Top 10 game bạn không thể bỏ lỡ trong nửa đầu năm 2025</p>
								<a href="#" class="lb-author">Bởi GameMaster</a>
							</div>
						</div>
						<div class="lb-item">
							<div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/2.jpg"></div>
							<div class="lb-content">
								<div class="lb-date">10/04/2025</div>
								<p>Tương lai của Cloud Gaming và cách nó thay đổi ngành công nghiệp</p>
								<a href="#" class="lb-author">Bởi TechGuru</a>
							</div>
						</div>
						<div class="lb-item">
							<div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/3.jpg"></div>
							<div class="lb-content">
								<div class="lb-date">05/04/2025</div>
								<p>Hướng dẫn build PC gaming tốt nhất với ngân sách 20 triệu đồng</p>
								<a href="#" class="lb-author">Bởi PCMaster</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="footer-widget">
					<h4 class="fw-title">Bình Luận Nổi Bật</h4>
					<div class="top-comment">
						<div class="tc-item">
							<div class="tc-thumb set-bg" data-setbg="public/img/authors/1.jpg"></div>
							<div class="tc-content">
								<p><a href="#">Minh Tuấn</a> <span>về</span> Đánh giá PS5 Pro: Có đáng để nâng cấp?</p>
								<div class="tc-date">14/04/2025</div>
							</div>
						</div>
						<div class="tc-item">
							<div class="tc-thumb set-bg" data-setbg="public/img/authors/2.jpg"></div>
							<div class="tc-content">
								<p><a href="#">Hoàng Phúc</a> <span>về</span> Hướng dẫn toàn tập Elden Ring</p>
								<div class="tc-date">12/04/2025</div>
							</div>
						</div>
						<div class="tc-item">
							<div class="tc-thumb set-bg" data-setbg="public/img/authors/3.jpg"></div>
							<div class="tc-content">
								<p><a href="#">Phước Hải</a> <span>về</span> Tin tức vập nhật nhanh quá shop</p>
								<div class="tc-date">10/04/2025</div>
							</div>
						</div>
						<div class="tc-item">
							<div class="tc-thumb set-bg" data-setbg="public/img/authors/4.jpg"></div>
							<div class="tc-content">
								<p><a href="#">Nhật Quang</a> <span>về</span> Phải nạp game nữa rồi!!!</p>
								<div class="tc-date">08/04/2025</div>
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
			<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>
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
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			let videoElements = document.querySelectorAll(".set-bg");

			videoElements.forEach(function(el) {
				let videoUrl = el.getAttribute("data-setbg");
				let video = document.createElement("video");
				video.src = videoUrl;
				video.autoplay = true;
				video.loop = true;
				video.muted = true;
				video.playsInline = true;
				video.style.position = "absolute";
				video.style.width = "100%";
				video.style.height = "100%";
				video.style.objectFit = "cover";
				video.style.top = "0";
				video.style.left = "0";
				video.style.zIndex = "-1";
				el.style.position = "relative";
				el.prepend(video);
			});
		});
	</script>
</body>

</html>