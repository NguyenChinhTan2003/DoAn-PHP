-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2025 lúc 08:52 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `game_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức', 'Tin tức mới nhất về game mobile, PC và console', '2025-04-07 18:13:43', '2025-04-07 18:13:43'),
(2, 'Cộng đồng', 'Sự kiện và hoạt động cộng đồng game thủ', '2025-04-07 18:13:43', '2025-04-07 18:13:43'),
(3, 'Đánh giá', 'Đánh giá game mới và phân tích chuyên sâu', '2025-04-07 18:13:43', '2025-04-07 18:13:43'),
(4, 'Esports', 'Tin tức giải đấu Esports và thể thao điện tử', '2025-04-07 18:13:43', '2025-04-07 18:13:43'),
(5, 'Thủ thuật', 'Hướng dẫn và mẹo chơi game hay', '2025-04-07 18:13:43', '2025-04-07 18:13:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(19, 3, 1, 'Game này chơi hay thật, đồ họa đẹp mê!', '2025-04-01 03:15:00'),
(20, 3, 1, 'Mình vừa tải về, cảm ơn bạn đã chia sẻ!', '2025-04-01 04:00:00'),
(21, 3, 2, 'Hướng dẫn rất chi tiết, cảm ơn nhé!', '2025-04-02 09:00:00'),
(22, 3, 2, 'Mình thử mẹo này và lên cấp nhanh thật!', '2025-04-02 09:30:00'),
(23, 3, 3, 'Danh sách này hữu ích, mình sẽ thử hết!', '2025-04-03 03:00:00'),
(24, 3, 1, 'Mình cũng thích game này, chơi mượt lắm!', '2025-04-03 03:05:00'),
(25, 3, 1, 'Có ai biết cách qua màn 3 không? Khó quá!', '2025-04-03 03:10:00'),
(26, 3, 1, 'Game này đáng để thử, cảm ơn bạn đã giới thiệu!', '2025-04-03 03:15:00'),
(27, 3, 1, 'Mình vừa đạt top 10, ai muốn thi đấu không?', '2025-04-03 03:20:00'),
(28, 3, 2, 'Cảm ơn bạn, mình đã áp dụng và lên cấp 5 rồi!', '2025-04-03 03:25:00'),
(29, 3, 2, 'Hướng dẫn hay, nhưng mình vẫn kẹt ở màn 4, huhu!', '2025-04-03 03:30:00'),
(30, 3, 2, 'Mẹo này hiệu quả thật, mình sẽ chia sẻ thêm!', '2025-04-03 03:35:00'),
(31, 3, 3, 'Mình đã chơi game số 2 trong danh sách, rất hay!', '2025-04-03 03:40:00'),
(32, 3, 3, 'Cảm ơn bạn, mình sẽ tải game số 4 về chơi thử!', '2025-04-03 03:45:00'),
(33, 3, 3, 'Danh sách này chuẩn, mình đồng ý với top 1!', '2025-04-03 03:50:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `category_id`, `image`, `created_at`, `updated_at`, `views`) VALUES
(1, 'Genshin Impact 4.0 ra mắt bản đồ Fontaine', 'HoYoverse chính thức trình làng bản cập nhật 4.0 đầy ấn tượng, mở ra vùng đất Fontaine hoàn toàn mới - thành phố nước tráng lệ với kiến trúc tinh xảo và câu chuyện đầy bí ẩn.\n\nĐiểm nhấn đặc biệt của bản cập nhật này là cơ chế bơi lội dưới nước đầu tiên trong game, cho phép người chơi khám phá thế giới ngầm kỳ thú với hệ sinh thái độc đáo cùng những bí mật chờ đợi được khám phá.\n\nBản cập nhật cũng giới thiệu loạt nhân vật mới đầy cá tính, cùng chuỗi sự kiện hấp dẫn với phần thưởng nguyên thạch, vật phẩm quý hiếm và cơ hội sở hữu nhân vật 4 mạnh mẽ. Đây chắc chắn là bước ngoặt lớn tiếp theo cho hành trình khám phá Teyvat của mọi Traveler!*\n\nHãy sẵn sàng cho một chương mới đầy phiêu lưu và những trải nghiệm gameplay hoàn toàn mới lạ!', 1, 'public/img/single-blog/1.jpg', '2025-04-07 18:13:55', '2025-04-11 13:52:34', 45),
(2, 'Valorant Champions 2023: Team A giành chức vô địch', 'Team A lập nên kỳ tích tại Valorant Champions 2023 sau màn lội ngược dòng nghẹt thở, đánh bại Team B với tỷ số sát nút 3-2 trong loạt trận chung kết đầy kịch tính.\n\nTrận đấu bùng nổ với những pha clutch đỉnh cao, những round quyết định đến nghẹt thở và khoảnh khắc \"clutch or kick\" khiến khán giả toàn cầu không ngừng reo hò. Được tổ chức tại Los Angeles - thánh địa thể thao điện tử, giải đấu đã thu hút hàng triệu fan Valorant theo dõi trực tiếp, chứng kiến màn so tài đỉnh cao giữa hai đội tuyển hàng đầu thế giới.\n\nVới tổng giải thưởng kỷ lục 2 triệu USD, Valorant Champions 2023 không chỉ khẳng định vị thế của tựa game trong làng FPS chuyên nghiệp mà còn đưa esports Valorant lên tầm cao mới. Chiến thắng này giúp Team A ghi tên mình vào lịch sử và mang về danh hiệu vô địch thế giới đầu tiên trong sự nghiệp.\n\nMột chương mới của Valorant esports đã được viết nên bằng máu lửa, kịch tính và tinh thần thi đấu đỉnh cao!', 4, 'public/img/single-blog/3.jpg', '2025-04-07 18:13:55', '2025-04-11 13:52:39', 16),
(3, 'Hướng dẫn build team mạnh nhất Honkai: Star Rail 1.3', 'Bài viết phân tích chi tiết các đội hình (team comp) mạnh nhất trong meta hiện tại của game, bao gồm cách xây dựng đội hình, cơ chế phối hợp giữa các nhân vật, cũng như lựa chọn Light Cone tối ưu cho từng nội dung như khiêu chiến (MoC), trận đấu thường (SU), hoặc sự kiện đặc biệt.\n\nĐặc biệt, bài viết sẽ đi sâu vào đánh giá và gợi ý cách sử dụng các nhân vật mới ra mắt trong bản cập nhật 1.3, bao gồm cả cơ chế kỹ năng, vị trí trong đội hình, và sự tương thích với các nhân vật hiện có để đạt hiệu quả cao nhất.\n\nNgoài ra, bài viết cũng sẽ đề cập đến các chiến thuật thay đổi tùy theo meta, giúp người chơi tận dụng tối đa sức mạnh của đội hình trong từng hoàn cảnh chiến đấu khác nhau.', 5, 'public/img/single-blog/5.jpg', '2025-04-07 18:13:55', '2025-04-11 13:52:41', 9),
(4, 'Đánh giá Baldur\'s Gate 3: Kiệt tác RPG thế hệ mới', 'Baldur\'s Gate 3 xứng đáng được đánh giá 10/10 nhờ cốt truyện đầy chiều sâu, lối chơi đa dạng với vô số cách tiếp cận, và hệ thống tương tác cực kỳ phức tạp, cho phép người chơi tự do quyết định số phận của nhân vật và thế giới trong game.\n\nChỉ sau một tuần phát hành, tựa game này đã phá vỡ hàng loạt kỷ lục trên Steam, bao gồm số lượng người chơi đồng thời cực cao và doanh thu ấn tượng, chứng minh sức hút khổng lồ của dòng RPG cổ điển được làm mới một cách hoàn hảo.\n\nVới đồ họa tuyệt đẹp, dàn nhân vật đa dạng cùng lối viết kịch bản xuất sắc, Baldur\'s Gate 3 không chỉ là một tựa game đáng chơi mà còn là một tác phẩm nghệ thuật đích thực của làng game thế giới.', 3, 'public/img/single-blog/7.jpg', '2025-04-07 18:13:55', '2025-04-11 13:52:43', 13),
(5, 'Sự kiện Free Fire OB42: Skin Legendary miễn phí', 'Free Fire sắp mang đến một sự kiện đặc biệt cực kỳ hấp dẫn trong bản cập nhật OB42 sắp tới, nơi người chơi sẽ có cơ hội sở hữu skin Legendary cực hiếm hoàn toàn miễn phí.\n\nĐể nhận được phần quà giá trị này, game thủ chỉ cần tích cực tham gia và hoàn thành các nhiệm vụ hàng ngày theo yêu cầu của sự kiện. Đây là dịp hiếm có để sưu tập những món đồ độc đáo mà không cần chi tiêu, đồng thời trải nghiệm những nội dung mới lạ trong phiên bản OB42.\n\nĐừng bỏ lỡ cơ hội \"vừa chơi vừa nhận quà khủng\" này từ Free Fire – tựa game battle royale đình đám luôn biết cách làm hài lòng cộng đồng bằng những sự kiện độc đáo và phần thưởng giá trị!', 2, 'public/img/single-blog/16.jpg', '2025-04-07 18:13:55', '2025-04-11 14:39:33', 4),
(6, 'Liên Minh Huyền Thoại: Chung Kết Thế Giới 2025 Sẽ Diễn Ra Tại Việt Nam', 'Riot Games vừa công bố rằng Chung Kết Thế Giới 2025 của Liên Minh Huyền Thoại sẽ được tổ chức tại TP. Hồ Chí Minh, Việt Nam. Đây là lần đầu tiên sự kiện lớn nhất của LMHT được tổ chức tại Đông Nam Á...', 1, 'public/img/single-blog/11.jpg', '2025-04-10 02:00:00', '2025-04-11 15:09:23', 168),
(7, 'Valorant Champions 2025: Đội Tuyển Việt Nam Lọt Vào Top 8', 'Đội tuyển Valorant Việt Nam đã xuất sắc vượt qua vòng bảng tại Valorant Champions 2025, giành vé vào top 8 đội mạnh nhất thế giới. Trận đấu quyết định với đội tuyển Hàn Quốc đã kết thúc với tỷ số 2-1...', 4, 'public/img/single-blog/12.jpg', '2025-04-09 07:30:00', '2025-04-11 13:50:47', 235),
(8, 'Honkai: Star Rail Ra Mắt Nhân Vật Mới Trong Bản Cập Nhật 3.0', 'miHoYo vừa công bố bản cập nhật 3.0 của Honkai: Star Rail, giới thiệu nhân vật mới 5 sao với tên gọi \'Aetheria\'. Nhân vật này thuộc hệ Hư Vô và sở hữu kỹ năng độc đáo...', 5, 'public/img/single-blog/13.jpg', '2025-04-08 03:15:00', '2025-04-11 15:02:36', 186),
(9, 'Baldur’s Gate 3: DLC Mới Sẽ Ra Mắt Vào Cuối Năm 2025', 'Larian Studios xác nhận rằng DLC đầu tiên của Baldur’s Gate 3 sẽ được phát hành vào tháng 12 năm 2025. DLC này sẽ mở rộng câu chuyện chính và thêm một khu vực mới để khám phá...', 3, 'public/img/single-blog/14.jpg', '2025-04-07 09:45:00', '2025-04-11 14:37:07', 95),
(10, 'Free Fire: Giải Đấu Quốc Tế 2025 Thu Hút Hơn 1 Triệu Lượt Xem', 'Giải đấu Free Fire World Series 2025 vừa kết thúc với chiến thắng thuộc về đội tuyển Brazil. Sự kiện đã thu hút hơn 1 triệu lượt xem trực tiếp trên toàn cầu, phá vỡ kỷ lục trước đó...', 1, 'public/img/single-blog/15.jpg', '2025-04-06 06:00:00', '2025-04-11 14:37:02', 303);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Game mới ra mắt 2025', 'Hôm nay, tựa game XYZ chính thức ra mắt với đồ họa cực đẹp!', '2025-04-01 03:00:00', '2025-04-01 03:00:00'),
(2, 2, 'Hướng dẫn chơi game ABC', 'Đây là hướng dẫn chi tiết để bạn đạt cấp độ cao trong game ABC...', '2025-04-02 08:30:00', '2025-04-02 08:30:00'),
(3, 3, 'Top 5 game đáng chơi', 'Danh sách 5 tựa game hot nhất 2025 mà bạn không thể bỏ qua!', '2025-04-03 02:20:00', '2025-04-03 02:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `role`) VALUES
(1, 'tai', '$2y$10$Yr0slzFu9xy1dMs4siQke.mcRe/N2kzQl2VbYmJFl4L3U11/xSTbi', 'Võ Tấn Tài', 'votantai230@gmail.com', 'user'),
(2, 'admin', '$2y$10$Ex2utuUGpqIuyqqG8FKP9ucFTodGql/qw42z6nshmJSh7Teqv4HlC', 'admin', 'admin@gmail.com', 'admin'),
(3, 'user', '$2y$10$TILs0x45kV1Ay8SA9gk8XufUTWOAEdL1Bi2poJ1iBAiyVDaFM0PDW', 'user', 'user@gmail.com', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
