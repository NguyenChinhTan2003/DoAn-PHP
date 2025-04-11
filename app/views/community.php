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
					<a href="index.php?&action=logout" class="logout-btn">Đăng xuất</a>
				<?php else : ?>
					<a href="index.php?&action=login">Login</a> /
					<a href="index.php?&action=register">Register</a> <?php endif; ?>
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
				<div class="nt-item"><span class="new">new</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
				<div class="nt-item"><span class="strategy">strategy</span>Isum dolor sit amet, consectetur adipiscing elit.</div>
				<div class="nt-item"><span class="racing">racing</span>Isum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
		</div>
	</div>
	<!-- Latest news section end -->

	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="public/img/page-top-bg/4.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<h2>Our Community</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page info section -->


	<!-- Page section -->
	<section class="page-section community-page set-bg" data-setbg="public/img/community-bg.jpg">
		<div class="community-warp spad">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="community-top-title">Total Comments (<?php echo $commentCount; ?>)</h3>
					</div>
					<div class="col-md-6 text-lg-right">
						<form class="community-filter">
							<label for="fdf5">Show</label>
							<select id="fdf5">
								<option value="#">Everything</option>
								<option value="#">Everything</option>
							</select>
						</form>
					</div>
				</div>
				<!-- Form thêm bình luận -->
				<?php if (isset($_SESSION['user'])) : ?>
					<div class="comment-form mt-4">
						<form id="commentForm" method="POST">
							<input type="hidden" name="post_id" value="1">
							<div class="form-group">
								<textarea class="form-control" name="content" rows="3" placeholder="Viết bình luận của bạn..." required></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Gửi bình luận</button>
						</form>
					</div>
				<?php else : ?>
					<p class="text-center mt-4">Vui lòng <a href="index.php?&action=login">đăng nhập</a> để thêm bình luận.</p>
				<?php endif; ?>
				<!-- Hiển thị danh sách bình luận -->
				<div class="row">
					<div class="col-md-6">
						<h3 class="community-top-title">Total Comments (<span id="commentCount"><?php echo $commentCount; ?></span>)</h3>
					</div>
				</div>
				<ul class="community-post-list">
					<?php foreach ($comments as $comment) : ?>
						<li>
							<div class="community-post">
								<div class="author-avator set-bg" data-setbg="public/img/authors/<?php echo $comment['user_id']; ?>.jpg"></div>
								<div class="post-content">
									<h5>User #<?php echo htmlspecialchars($comment['user_id']); ?><span>posted an update</span></h5>
									<div class="post-date"><?php echo date('F d, Y', strtotime($comment['created_at'])); ?></div>
									<p><?php echo htmlspecialchars($comment['content']); ?></p>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
				<!-- Phân trang -->
				<div class="site-pagination sp-style-2" id="pagination">
					<span class="active">01.</span>
					<a href="#">02.</a>
					<a href="#">03.</a>
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
							<!-- Thêm các bài viết khác nếu cần -->
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
							<!-- Thêm các bình luận khác nếu cần -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->

	<!-- Footer section Sunny-->
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
	<script>
		$(document).ready(function() {
					let currentPage = 1;

					function loadComments(page) {
						console.log('Gửi yêu cầu AJAX với page:', page); // Debug
						$.ajax({
								url: '?controller=community&action=getComments',
								type: 'POST',
								data: {
									post_id: 1,
									page: page
								},
								dataType: 'json',
								success: function(response) {
									console.log('Phản hồi từ server:', response); // Debug
									if (response.success) {
										let commentList = '';
										$.each(response.comments, function(index, comment) {
											commentList += `
                                <li>
                                    <div class="community-post">
                                        <div class="author-avator set-bg" data-setbg="public/img/authors/${comment.user_id}.jpg"></div>
                                        <div class="post-content">
<h5>User #${comment.user_id}<span>posted an update</span></h5>
                                            <div class="post-date">${new Date(comment.created_at).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</div>
                                            <p>${comment.content}</p>
                                        </div>
                                    </div>
                                </li>
                            `;
										});
										$('.community-post-list').html(commentList); // Cập nhật danh sách bình luận
										$('#commentCount').text(response.commentCount);
										// Cập nhật phân trang
										let pagination = '';
										if (response.totalPages > 1) {
											for (let i = 1; i <= response.totalPages; i++) {
												if (i === response.currentPage) {
													pagination += < span class = "active" > $ {
														String(i).padStart(2, '0')
													} </span>;
												} else {
													pagination += <a href = "#" class = "page-link" data-page = "${i}" > $ {
														String(i).padStart(2, '0')
													} </a>;}
												}
											}
											$('#pagination').html(pagination);
										} else {
											alert('Không thể tải bình luận: ' + (response.message || 'Lỗi không xác định'));
										}
									},
									error: function(xhr, status, error) {
										console.log('Lỗi AJAX:', status, error); // Debug
										console.log('Phản hồi server:', xhr.responseText); // Debug
										alert('Lỗi kết nối server.');
									}
								});
						} // Tải bình luận ban đầu
						loadComments(currentPage);

						// Xử lý sự kiện click vào phân trang
						$('#pagination').on('click', '.page-link', function(e) {
							e.preventDefault();
							currentPage = $(this).data('page');
							console.log('Chuyển sang trang:', currentPage); // Debug
							loadComments(currentPage);
						});
						// Xử lý gửi bình luận
						$('#commentForm').on('submit', function(e) {
							e.preventDefault();
							$.ajax({
								url: '?controller=community&action=addComment',
								type: 'POST',
								data: $(this).serialize(),
								dataType: 'json',
								success: function(response) {
									if (response.success) {
										$('#commentForm textarea').val('');
										loadComments(currentPage); // Tải lại bình luận sau khi thêm
									} else {
										alert('Có lỗi xảy ra khi gửi bình luận.');
									}
								},
								error: function(xhr, status, error) {
									console.log('Lỗi AJAX:', status, error); // Debug
									console.log('Phản hồi server:', xhr.responseText); // Debug
									alert('Lỗi kết nối server.');
								}
							});
						});
					});
	</script>
</body>

</html>