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
					<li><a href="?controller=category&action=index">Dashboard</a></li>
					<li><a href="?controller=community&action=index">Forums</a></li>
					<li><a href="?controller=contact&action=index">Contact</a></li>
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
				<div class="cata new">new</div>
				<h2>Recent Games</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="public/img/single-blog/3.jpg">
							<div class="cata new">new</div>
						</div>
						<div class="rgi-content">
							<h5><a href="?controller=singleblog&id=8">Honkai: Star Rail Ra Mắt Nhân Vật Mới Trong Bản Cập Nhật 3.0</a></h5>
							<p>miHoYo vừa công bố bản cập nhật 3.0 của Honkai: Star Rail, giới thiệu nhân vật mới 5 sao với tên gọi 'Aetheria'</p>
							<a  class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="public/img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="public/img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="public/img/single-blog/10.jpg">
							<div class="cata racing">racing</div>
						</div>
						<div class="rgi-content">
						<h5><a href="?controller=singleblog&id=10">Sự kiện Free Fire OB42: Skin Legendary miễn phí</a></h5>
						<p>LFree Fire sắp mang đến một sự kiện đặc biệt cực kỳ hấp dẫn trong bản cập nhật OB42 sắp tới, nơi người chơi sẽ...</p>
							<a href="#" class="comment">3 Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="public/img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="public/img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="public/img/single-blog/7.jpg">
							<div class="cata adventure">Adventure</div>
						</div>
						<div class="rgi-content">
						<h5><a href="?controller=singleblog&id=4">Đánh giá Baldur's Gate 3: Kiệt tác RPG thế hệ mới</a></h5>

							<p>Baldur's Gate 3 xứng đáng được đánh giá 10/10 nhờ cốt truyện đầy chiều sâu, lối chơi đa dạng với vô số cách ti...</p>
							<a href="#" class="comment">3 Comments</a>
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
			<div class="tournament-title">Tournaments</div>
			<div class="row">
				<div class="col-md-6">
					<div class="tournament-item mb-4 mb-lg-0">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="public/img/tournament/1.jpg"></div>
							<div class="ti-text">
								<h4>World Of WarCraft</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="tournament-item">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="public/img/tournament/2.jpg"></div>
							<div class="ti-text">
								<h4>DOOM</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
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
				<div class="cata new">new</div>
				<h2>Recent Reviews</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="public/img/review/1.jpg">
							<div class="score yellow">9.3</div>
						</div>
						<div class="review-text">
							<h5>Assasin’’s Creed</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="public/img/review/2.jpg">
							<div class="score purple">9.5</div>
						</div>
						<div class="review-text">
							<h5>Doom</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="public/img/review/3.jpg">
							<div class="score green">9.1</div>
						</div>
						<div class="review-text">
							<h5>Overwatch</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="public/img/review/4.jpg">
							<div class="score pink">9.7</div>
						</div>
						<div class="review-text">
							<h5>GTA</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
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
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/2.jpg"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="public/img/latest-blog/3.jpg"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
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