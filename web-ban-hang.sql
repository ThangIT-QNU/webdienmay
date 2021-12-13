-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 28, 2020 lúc 07:12 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-ban-hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id_bill` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `bill_detail` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'STT,name,price,so luong,thanhtien,===tong tien',
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bill`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_customer`, `status`, `bill_detail`, `ghichu`, `created_at`) VALUES
(68, 65, 1, 'oppo-reno-10x-zoom-edition-black-400x460.png,Điện thoại OPPO Reno 10x Zoom Edition,20990000,2,41980000????oppo-reno-pink-400x460.png,Điện thoại OPPO Reno,12990000,1,12990000????oppo-r17-pro-2-400x460.png,Điện thoại OPPO R17 Pro,10490000,1,10490000===65460000', 'TY', '2020-10-15 06:51:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Điện Thoại'),
(2, 'LapTop'),
(3, 'Máy Tính Bảng'),
(4, 'Đồng Hồ'),
(5, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_products` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_products`, `name`, `comment`, `created_at`) VALUES
(79, 1, 'Phạm Văn Hiệu', 'hay', '2019-12-16 11:39:20'),
(80, 1, 'Phạm Văn Hiệu', 'hay', '2019-12-16 11:39:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `phone`, `email`, `address`) VALUES
(64, 'Phạm Văn Hiệu', '0359003130', 'vanhieutdc6@gmail.com', '143/12 đường 11, phường Trường Thọ,quận Thủ Đức,tp.Hồ Chí Minh'),
(65, 'twqtrewtrqtrrqt', 'ẺYE', 'RYTRYER@FDGDFS', 'ẺYER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Oppo'),
(4, 'Asus'),
(5, 'HTC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot` tinyint(4) NOT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `hot`, `sale`, `manu_id`, `cate_id`) VALUES
(1, 'Điện thoại OPPO Reno 10x Zoom Edition', '20990000', 'oppo-reno-10x-zoom-edition-black-400x460.png', 'Những chiếc flagship trong năm 2019 không chỉ có một camera chụp ảnh đẹp, chụp xóa phông ảo diệu mà còn phải \"chụp thật xa\" và với chiếc OPPO Reno 10x Zoom Edition chính thức gia nhập thị trường \"smartphone có camera siêu zoom\".', 1, '17990000', 3, 1),
(2, 'Điện thoại OPPO Reno', '12990000', 'oppo-reno-pink-400x460.png', 'Những năm gần đây OPPO luôn tạo được dấu ấn trên các sản phẩm mới của mình và smartphone vừa ra mắt OPPO Reno là một ví dụ điển hình.\r\n', 1, '10990000', 3, 1),
(3, 'Điện thoại OPPO R17 Pro', '10490000', 'oppo-r17-pro-2-400x460.png', 'Đặc điểm nổi bật của OPPO R17 Pro\r\nTìm hiểu thêmOPPO R17 Pro được xem là chiếc ện đại, c', 0, '10000000', 3, 1),
(4, 'Điện thoại OPPO A3s', '3390000', 'oppo-a3s-32gb-400x460.png', 'OPPO A3s 32GB là một chiếc smartphone mới của OPPO sở hữu giá rẻ hiếm hoi nhưng vẫn được trang bị màn hình tai thỏ và camera kép xu thế của năm 2018.', 0, '3000000', 3, 1),
(5, 'Điện thoại OPPO A7', '4900000', 'oppo-a7-400x460.png', 'OPPO A7, chiếc điện thoại được xem là sự hiện thân của cái đẹp, cái sáng tạo mà OPPO mang đến cho người dùng với mặt lưng được tô điểm bởi những họa tiết 3D thú vị cùng chiếc tai thỏ hình giọt nước đáng yêu.', 0, '4490900', 3, 1),
(6, 'Điện thoại OPPO F9', '5400000', 'oppo-f9-tim-400x460.png', 'Là chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo, màn hình tràn viền giọt nước và camera chụp chân dung tích hợp trí tuệ nhân tạo A.I hoàn hảo.', 1, '5000000', 3, 1),
(7, 'Điện thoại iPhone 8 Plus 64GB', '19990000', 'iphone-8-plus-1-400x460.png', 'Thừa hưởng những thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.', 1, '19000000', 1, 1),
(8, 'Điện thoại iPhone Xr ', '21900000', 'iphone-xr-128gb-red-400x460.png', 'Được xem là phiên bản iPhone giá rẻ đầy hoàn hảo, iPhone Xr 128GB khiến người dùng có nhiều sự lựa chọn hơn về màu sắc đa dạng nhưng vẫn sở hữu cấu hình mạnh mẽ và thiết kế sang trọng.', 1, '20000000', 1, 1),
(9, 'Điện thoại iPhone X', '23000000', 'iphone-x-64gb-1-400x460-1-400x460.png', 'Phone X là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.', 0, '19000000', 1, 1),
(10, 'Điện thoại iPhone Xs', '26000000', 'iphone-xs-gold-400x460.png', 'Đến hẹn lại lên, năm nay Apple giới thiệu tới người dùng thế hệ tiếp theo với 3 phiên bản, trong đó có cái tên iPhone Xs với những nâng cấp mạnh mẽ về phần cứng đến hiệu năng, màn hình cùng hàng loạt các trang bị cao cấp khác. ', 1, '25000000', 1, 1),
(11, 'Điện thoại iPhone Xs Max', '29990000', 'iphone-xs-max-gold-400x460.png', 'Hoàn toàn xứng đáng với những gì được mong chờ, phiên bản cao cấp nhất iPhone Xs Max của Apple năm nay nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp.', 1, '29000000', 1, 1),
(12, 'Điện thoại Samsung Galaxy S10+', '28990000', 'samsung-galaxy-s10-plus-512gb-ceramic-black-400x460.png', 'Samsung Galaxy S10+ (512GB) - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.', 1, '22000000', 2, 1),
(13, 'Điện thoại Samsung Galaxy Note 10+', '26900000', 'samsung-galaxy-note-10-plus-white-400x460.png', 'Trông ngoại hình khá giống nhau, tuy nhiên Samsung Galaxy Note 10+ sở hữu khá nhiều điểm khác biệt so với Galaxy Note 10 và đây được xem là một trong những chiếc máy đáng mua nhất trong năm 2019, đặc biệt dành cho những người thích một chiếc máy màn hình lớn, camera chất lượng hàng đầu.', 1, '25000000', 2, 1),
(14, 'Điện thoại Samsung Galaxy Note 9', '19900000', 'samsung-galaxy-note-9-black-400x460-400x460.png', 'Mang lại sự cải tiến đặc biệt trong cây bút S Pen, siêu phẩm Samsung Galaxy Note 9 còn sở hữu dung lượng pin khủng lên tới 4.000 mAh cùng hiệu năng mạnh mẽ vượt bậc, xứng đáng là một trong những chiếc điện thoại cao cấp nhất của Samsung', 0, '18000000', 2, 1),
(15, 'Điện thoại Samsung Galaxy A80', '14000000', 'samsung-galaxy-a80-gold-400x460.png', 'Samsung Galaxy A80 là chiếc smartphone mang trong mình rất nhiều đột phá của Samsung và hứa hẹn sẽ là \"ngọn cờ đầu\" cho những chiếc smartphone sở hữu một màn hình tràn viền thật sự.', 0, '12900000', 2, 1),
(16, 'Điện thoại Samsung Galaxy A70', '7900000', 'samsung-galaxy-a70-white-400x460.png', 'Samsung Galaxy A70 là một phiên bản phóng to của chiếc Samsung Galaxy A50 đã ra mắt trước đó với nhiều cải tiến tới từ bên trong.', 0, '6900000', 2, 1),
(17, 'Điện thoại ASUS Zenfone Max Pro M2', '10900000', 'asus-zenfone-max-pro-m2-400x460.png', 'Sau thành công của Zenfone Max Pro M1, Asus tiếp tục giới thiệu đến người dùng phiên bản kế thừa với cái tên ASUS Zenfone Max Pro M2, một chiếc điện thoại đầy sự trẻ trung trong thiết kế, mạnh mẽ trong hiệu năng và bền bỉ trong trải nghiệm.', 0, '8900000', 4, 1),
(18, 'Điện thoại Asus Zenfone 4 Max ZC520KL', '5600000', 'asus-zenfone-4-max-zc520kl-460-400x460.png', 'Tiếp nối sự thành công của chiếc Zenfone 3 Max thì Asus tiếp tục đưa đến người dùng thế hệ Zenfone Max tiếp theo với tên gọi Asus Zenfone 4 Max.', 0, '4600000', 4, 1),
(19, 'Điện thoại ASUS Zenfone Max Plus M1 - ZB570TL', '6700000', 'asus-zenfone-max-m1-plus-zb570tl-1-400x460.png', 'Zenfone Max Plus M1 là chiếc smartphone theo xu thế màn hình viền mỏng đầu tiên của ASUS. Với ưu điểm thiết kế đẹp, pin lớn truyền thống dòng Zenfone Max, camera kép và mức giá tầm trung cực kì hấp dẫn và đáng sở hữu.', 0, '5670000', 4, 1),
(20, 'Điện thoại Asus Zenfone C', '2500000', 'asus-zenfone-c-533-400x533.png', 'Zenfone C chính là dòng sản phẩm có giá thành thấp nhất trong các dòng sản phẩm Zenfone của Asus, máy có các chức năng cơ bản nhất cho người dùng.', 0, '2000000', 4, 1),
(21, 'Điện thoại Asus Zenfone 5', '7890000', 'asus-zenfone-5-cpu-12ghz-400x533.png', 'Nếu bạn đã là một tín đồ của Zenfone thì nay đã có thêm một lựa chọn cho dòng Zenfone 5 với mức giá không thể rẻ hơn - Asus Zenfone 5 (CPU-1.2GHz). Phiên bản này không có gì khác với phiên bản Zenfone 5 trước đây ngoài xung nhịp vi xử lý được giảm xuống 1.2GHz cùng với mức giá dễ chịu hơn đàn anh. ', 1, '5670000', 4, 1),
(22, 'Điện thoại HTC Wildfire E\r\n', '4500000', 'htc-wildfire-e-600x600.jpg', 'Màn hình:	IPS LCD, 5.45\", HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 13 MP & Phụ 2 MP\r\nCamera trước:	5 MP\r\nCPU:	Spreadtrum 4 nhân\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:\r\n2 Nano SIM, Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	3000 mAh', 1, '3500000', 5, 1),
(23, 'Điện thoại HTC U12 life', '6500000', 'htc-u12-life-1-400x460.png', 'HTC U12 life là một mẫu smartphone tầm trung rất hấp dẫn với thiết kế ấn tượng, cấu hình tốt cùng mức giá phải chăng.', 1, '5000000', 5, 1),
(24, 'Điện thoại HTC U11 Plus\r\n', '2500000', 'htc-u11-plus-bac-h1-400x461.png', 'HTC U11 Plus là bản nâng cấp của chiếc HTC U11 ra mắt trước đó với màn hình tỉ lệ 18:9 theo xu thế mà vẫn tích hợp được công nghệ bóp viền máy Edge Screen.', 0, '2000000', 5, 1),
(25, 'Điện thoại HTC One A9', '4600000', 'htc-one-a9-2-400x460.png', 'HTC One A9 với thiết kế kim loại nguyên khối sang trọng, cảm biến vân tay 1 chạm nhanh, camera nhiều tùy chỉnh chắc chắn sẽ là lựa chọn tốt cho 1 chiếc smartphone thời trang và sang trọng.', 0, '4000000', 5, 1),
(26, 'Điện thoại HTC Desire 620G', '1200000', 'htc-desire-620g-1-400x533.png', 'HTC Desire 620G với thiết kế trẻ trung, sử dụng vi xử lý 8 nhân, camera chụp ảnh selfie tốt', 0, '900000', 5, 1),
(27, 'Laptop Apple MacBook Air 2017 i5 1.8GHz/8GB/128GB (MQD32SA/A)', '22000000', 'apple-macbook-air-mqd32sa-a-i5-5350u-600x600.jpg', 'MacBook Air 2017 i5 128GB là mẫu laptop văn phòng, có thiết kế siêu mỏng và nhẹ, vỏ nhôm nguyên khối sang trọng. Máy có hiệu năng ổn định, thời lượng pin cực lâu 12 giờ, phù hợp cho hầu hết các nhu cầu làm việc và giải trí. ', 1, '20000000', 1, 2),
(28, 'Laptop Apple MacBook Air 2018 i5/8GB/128GB', '30000000', 'apple-macbook-air-mre82sa-a-i5-8gb-128gb-2018-2-600x600.jpg', 'Sở hữu thiết kế đơn giản và sang trọng bậc nhất thế giới, Laptop Apple MacBook Air 128 GB hoàn toàn phù hợp với những ai yêu thích vẻ đẹp tinh tế, hiện đại. Bên cạnh đó, máy trang bị ổ cứng SSD có thể khởi chạy các ứng dụng cực nhanh, RAM 8 GB xử lý đa nhiệm hiệu quả và thời lượng pin ấn tượng lên đến 12 giờ.', 1, '28900000', 1, 2),
(29, 'Laptop Apple MacBook Air 2018 i5/8GB/256GB (MREF2SA/A)\r\n', '34000000', 'apple-macbook-air-mref2sa-a-i5-8gb-256gb-content-manhinhdmx-1-1-600x600.jpg', 'Macbook Air 2018 256 GB sở hữu vẻ ngoài sang trọng và mỏng nhẹ. Chip Intel Core i5 mạnh mẽ đáp ứng đầy đủ nhu cầu sử dụng văn phòng, giải trí cùng thời lượng pin đủ để bạn sử dụng suốt cả ngày dài. ', 0, '32000000', 1, 2),
(30, 'Laptop Apple Macbook Pro Touch 2019 i5 1.4GHz/8GB/128GB (MUHN2SA/A)', '35000000', 'apple-macbook-pro-touch-2019-i5-14ghz-8gb-128gb-m-2-2-600x600.jpg', 'Laptop Apple MacBook Pro Touch 2019 i5 (MUHN2SA/A) là thế hệ laptop mới của dòng MacBook Pro. Khoác lên mình vẻ ngoài đẳng cấp, cấu hình mạnh mẽ cùng nhiều tính năng hiện đại, chiếc laptop Apple MacBook Pro là một trong những chiếc laptop cao cấp - sang trọng đáng sở hữu nhất hiện nay.', 0, '33000000', 1, 2),
(31, 'Laptop Asus VivoBook X507MA N4000/4GB/256GB/Win10 (BR318T)', '6490000', 'asus-x507ma-n4000-4gb-256gb-win10-br318t-8-600x600.jpg', 'Laptop Asus X507MA (BR318T) là chiếc laptop văn phòng - học tập sở hữu thiết kế mỏng nhẹ, hoạt động nhanh mượt với ổ cứng SSD. Máy tính xách tay này còn được trang bị tính năng bảo mật bằng vân tay 360 độ, giúp mở máy nhanh chóng và an toàn.', 1, '6000000', 4, 2),
(32, 'Laptop Asus ZenBook UX433FA i5 8265U/8GB/256GB/Win10 (A6061T)\r\n', '22490000', 'asus-zenbook-ux433fa-i5-8265u-8gb-256gb-win10-a60-1-600x600.jpg', 'Asus vừa cho ra mắt chiếc laptop Asus Zenbook UX433FA i5 (A6061T) với thiết kế cực kì sang trọng, hiện đại, siêu mỏng, siêu nhẹ giúp thuận tiện cho việc di chuyển. Cấu hình mạnh mẽ đáp ứng mượt mà các ứng dụng văn phòng và xử lý tốt các thao tác kéo thả cơ bản trên các ứng dụng đồ họa sẽ là một sự lựa chọn rất đáng để cân nhắc dành cho khách hàng là nhân viên văn phòng hoặc doanh nhân.', 1, '2190000', 4, 2),
(33, 'Laptop Asus VivoBook X509FJ i7 8565U/8GB/512GB/2GB MX230/Win10 (EJ133T)\r\n', '18890000', 'asus-vivobook-x509f-i7-8565u-8gb-mx230-win10-ej13-5-2-1-2-1-600x600.jpg', 'Laptop Asus Vivobook X509FJ (EJ133T) là chiếc máy tính xách tay mang đến hiệu năng mạnh mẽ cùng hình ảnh chân thực đáp ứng mọi nhu cầu cho dù là học tập văn phòng hay giải trí. ', 0, '17900000', 4, 2),
(34, 'Laptop Asus VivoBook S530UN i7 8550U/8GB/256GB/2GB MX150/Win10 (BQ028T)', '22190000', 'asus-s530un-bq028t-16-600x600.jpg', 'Laptop Asus S530UN i7 8550U là mẫu laptop mỏng nhẹ cấu hình mạnh đại diện cho sự hiện đại, tinh tế và thanh lịch. Điểm nhất đặc biệt ở chiếc máy tính là trọng lượng chỉ 1.76 kg hoàn toàn cơ động, dễ dàng để bạn cho vào balo và làm việc ở bất kì nơi đâu. Sáng tạo không giới hạn với chip Intel Core i7 mạnh mẽ, card đồ họa rời NVIDIA giải trí cực đỉnh.', 1, '21900000', 4, 2),
(35, 'Laptop Asus Gaming ROG Strix G531 i7 9750H/8GB/512GB/6GB GTX2060/Win10 (VAL218T)', '40490000', 'asus-rog-g531-i7-9750h-8gb-512gb-6gb-gtx2060-win10-14-600x600.jpg', 'Laptop Asus ROG G531 là dòng laptop gaming nổi bật của Asus. Máy sở hữu cấu hình khủng, thiết kế không quá hầm hố nhưng vẫn đầy uy lực kết hợp cùng dải đèn LED chuyển màu tạo sự bắt mắt, nâng tầm đẳng cấp. chỉ những nét nổi bật trên đã giúp máy có một màu sắc riêng trong dòng laptop gaming.', 1, '40000000', 4, 2),
(36, 'Máy tính bảng iPad Pro 11 inch Wifi 64GB (2018)', '21900000', 'ipad-pro-11-inch-2018-64gb-wifi-33397-chitiet-400x460.png', 'Máy tính bảng iPad Pro 11 inch 64GB Wifi (2018) được ra mắt vào cuối năm 2018, thu hút nhân viên văn phòng, doanh nhân bởi thiết kế hiện đại, đầy sức đột phá và một cấu hình mạnh mẽ đáp ứng tốt tất cả các nhu cầu từ giải trí đến làm việc.', 1, '20000000', 1, 3),
(37, 'Máy tính bảng iPad Mini 7.9 inch Wifi Cellular 64GB (2019)\r\n', '14490000', 'ipad-mini-79-inch-wifi-cellular-64gb-2019-gold-400x460.png', 'iPad Mini 7.9 inch Wifi Cellular 64GB (2019) đánh dấu sự trở lại mạnh mẽ của Apple trong phân khúc máy tính bảng nhỏ gọn, có thể dễ dàng mang theo bên mình.', 0, '14000000', 1, 3),
(38, 'Máy tính bảng iPad Wifi Cellular 32GB (2018)', '14100000', 'ipad-wifi-cellular-32g-2018-gold-400x460.png', 'Máy tính bảng iPad 6th Wifi Cellular 32 GB mang trong mình cấu hình mạnh mẽ cùng giá thành hợp lý.', 1, '13900000', 1, 3),
(39, 'Máy tính bảng iPad Wifi 32GB (2018)', '8900000', 'ipad-6th-wifi-32gb-1-400x460.png', 'iPad 6th Wifi 32GB với nhiều nâng cấp về phần cứng, đặc biệt hơn giá của sản phẩm này được định hình ở phân khúc giá rẻ, sinh viên sẽ là sự lựa chọn “không quá xa tầm tay” người dùng.', 1, '7900000', 1, 3),
(40, 'Máy tính bảng iPad Air 10.5 inch Wifi 64GB 2019', '13900000', 'ipad-air-105-inch-wifi-2019-gold-400x460.png', 'Đã rất lâu rồi Apple mới lại nâng cấp dòng iPad Air của mình và với phiên bản iPad Air 10.5 inch Wifi 2019 thì thực sự người dùng đã có được một thiết bị được nâng cấp mạnh mẽ sau thời gian dài chờ đợi.', 1, '13000000', 1, 3),
(41, 'Máy tính bảng Samsung Galaxy Tab S6\r\n', '18490000', 'samsung-galaxy-tab-s6-400x460.png', 'Samsung Galaxy Tab S6 là chiếc máy tính bảng 2 trong 1, được thiết kế để giúp cho những người cần một sản phẩm đủ gọn gàng nhưng mạnh mẽ.', 1, '18000000', 2, 3),
(42, 'Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)', '7490000', 'samsung-galaxy-tab-a-101-t515-2019-gold-400x460.png', 'Samsung Galaxy Tab A 10.1 T515 (2019) là chiếc máy tính bảng có màn hình lớn cùng cấu hình vừa phải đáp ứng tốt cho bạn trong hầu hết các nhu cầu giải trí hằng ngày.', 1, '6900000', 2, 3),
(43, 'Máy tính bảng Samsung Galaxy Tab A 10.5', '9490000', 'samsung-galaxy-tab-a-105-inch-chitietblue-400x460.png', 'Là một phiên bản máy tính bảng giá rẻ của dòng Tab S4, Samsung Galaxy Tab A 10.5 inch có giá bán phải chăng và phục vụ tốt nhu cầu sử dụng của người dùng.', 0, '9000000', 2, 3),
(44, 'Máy tính bảng Samsung Galaxy Tab A8 8\" T295 (2019)', '3290000', 'samsung-galaxy-tab-a8-t295-2019-silver-400x460.png', 'Samsung Galaxy Tab A8 8 inch T295 (2019) là một chiếc máy tính bảng gọn nhẹ, với màn hình vừa đủ có thể giúp bạn giải trí hay hỗ trợ trẻ nhỏ trong việc học tập.', 0, '3000000', 2, 3),
(45, 'Apple Watch S3 GPS 42mm viền nhôm xám dây cao su', '6490000', 'apple-watch-s3-gps-42mm-vien-nhom-day-cao-su-den-chi-tiet-600x600.png', 'Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Báo thức, Nghe nhạc với tai nghe Bluetooth, Từ chối cuộc gọi, Dự báo thời tiết, Điều khiển chơi nhạc, Thay mặt đồng hồ', 1, '6000000', 1, 4),
(46, 'Apple Watch S4 GPS 44mm viền nhôm dây vải\r\n', '11390000', 'apple-watch-s4-gps-44mm-vien-nhom-day-vai-hong-nt-600x600.jpg', 'Apple Watch S4 GPS 44mm viền nhôm dây vải có thiết kế khá đơn giản và nổi bật. Sử dụng dây từ chất liệu vải, giúp đồng hồ cá tính hơn, nhẹ nhàng hơn khi đeo trong thời gian dài. Ngoài ra dây vải còn giúp bạn thấy dễ chịu hơn khi tay ra mồ hôi lúc vận động nhiều.', 0, '11000000', 1, 4),
(47, 'Apple Watch S3 GPS, 38mm viền nhôm, dây cao su\r\n', '5690000', 'apple-watch-3-phien-ban-38-mm-chi-tiet-600x600.png', 'Theo dõi giấc ngủ, Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Chế độ luyện tập, Báo thức, Gọi điện trên đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung thông báo, Thay mặt đồng hồ', 1, '5000000', 1, 4),
(48, 'Vòng đeo tay thông minh Samsung Gear Fit2 Pro', '3790000', 'samsung-gear-fit2-pro-2-330x330.png', 'Theo dõi giấc ngủ, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Nghe nhạc với tai nghe Bluetooth, Màn hình luôn hiển thị, Đồng hồ bấm giờ, Rung thông báo', 1, '3500000', 2, 4),
(49, 'Đồng hồ thông minh Samsung Galaxy Watch 42mm', '6640000', 'samsung-galaxy-watch-42mm-nt-600x600.jpg', 'Theo dõi giấc ngủ, Đo nhịp tim, Tính lượng Calories tiêu thụ, Đếm số bước chân, Tính quãng đường chạy, Chế độ luyện tập, Cài ứng dụng Galaxy App, Báo thức, Nghe nhạc với tai nghe Bluetooth, Màn hình luôn hiển thị, Gọi điện trên đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Điều khiển chơi nhạc, Rung thông báo, Thay mặt đồng hồ, Nhận cuộc gọi, Tìm điện thoại, Nhắc nhở', 1, '6000000', 2, 4),
(50, 'Đồng hồ thông minh Samsung Galaxy Watch Active R500', '5290000', 'samsung-galaxy-watch-active-r500-10-600x600.jpg', 'Với thiết kế tối giản nhưng không kém phần thanh lịch, đồng hồ thông minh mới nhất của Samsung - Galaxy Watch Active, sẽ mang đến cho bạn trải nghiệm công nghệ và tính năng theo dõi sức khỏe tuyệt vời.', 0, '4900000', 2, 4),
(51, 'Adapter chuyển cổng Iphone 4 sang VGA Apple\r\n', '590000', 'adapter-chuyen-cong-iphone-4-sang-vga-apple-300x300.jpg', 'Sản phầm là phụ kiện cho phép chuyển dữ liệu từ chân cắm 30 chân của thiết bị di động iPhone 4, iPhone 4S, iPad 2, iPad 3 sang cổng VGA. Đây là một giải pháp cho phép đưa hình ảnh, video, Slideshows từ điện thoại, máy tính bảng tới TV, máy chiếu hay màn hình có hỗ trợ cổng kết nối VGA.', 1, '400000', 1, 5),
(52, 'Dây đeo Apple watch 42-44mm Jinya JA4005 Đen\r\n', '550000', 'day-deo-apple-watch-42-44mm-jinya-ja4005-den-avatar-600x600.jpg', 'Được làm bằng chất liệu da cao cấp, không bị bong, tróc tạo cảm giác thoải mái trong quá trình sử dụng.', 1, '400000', 1, 5),
(53, 'Bút cảm ứng Apple Pencil\r\n', '2990000', 'apple-pencil-10-400x460.png', 'Bút cảm ứng Apple Pencil không sử dụng cho iPad Pro 11inch và iPad dùng cổng sạc Type C', 0, '2000000', 1, 5),
(54, 'Tai nghe Bluetooth AirPods 2 Apple MV7N2 Trắn', '5990000', 'tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang-avatar-1-600x600.jpg', 'hiết kế đơn giản, thời trang và nhỏ gọn.\r\nTrang bị chip H1 hoàn toàn mới, cho tốc độ kết nối, chuyển đổi giữa các thiết bị nhanh chóng.\r\nKích hoạt nhanh trợ lý ảo Siri bằng cách nói \"Hey, Siri\".\r\nCó thể sử dụng nghe nhạc lên đến 5 giờ (âm lượng 50%) cho mỗi một lần sạc đầy.\r\nTích hợp công nghệ sạc nhanh hiện đại. Sạc nhanh 15 phút có thể nghe nhạc 3 giờ (âm lượng 50%).\r\nSử dụng song song với hộp sạc có thể dùng được lên đến 24 giờ.\r\nTính năng nhận cuộc gọi, kích hoạt Siri, nghe hoặc tạm dừng đoạn nhạc đang phát.\r\nSản phẩm chính hãng Apple, nguyên seal 100%.\r\nLưu ý: Thanh toán trước khi mở seal.', 1, '5000000', 1, 5),
(55, 'Kính thực tế ảo Samsung Gear VR3\r\n', '2490000', 'kinh-thuc-te-ao-samsung-gear-vr-sm-r325-400x400.png', 'Kính thực tế ảo Samsung Gear VR3 mang đến cho bạn một trải nghiệm chưa từng có, nơi mà bạn sẽ được đắm chìm trong những thứ mà trước đây bạn chỉ có thể tưởng tượng mà thôi.', 1, '2000000', 2, 5),
(56, 'Combo phụ kiện Galaxy S5 option 2\r\n', '500000', 'com-bo-phu-kien-s5-300-2-nowatermark-300x300.jpg', 'combo phụ kiện samsung', 0, '100000', 2, 5),
(57, 'Dây đeo Samsung Galaxy Watch Active R500\r\n', '650000', 'day-samsung-galaxy-watch-active-samsung-r500-den-avatar-600x600.jpg', 'Dây đeo thiết kế sang trọng, màu sắc trẻ trung và hiện đại.\r\nDây đeo được làm từ chất liệu cao su tổng hợp, có độ dẻo dai, linh hoạt và độ bền rất cao.\r\nSản phẩm có nhiều màu sắc cho bạn chọn lựa và thay đổi.', 1, '600000', 2, 5),
(58, 'Chuột quang có dây Asus UT210\r\n', '350000', 'Chuot-quang-co-day-Asus-UT210-l.jpg', 'Chuot-quang-co-day-Asus-UT210-l.jpg', 0, '200000', 4, 5),
(59, 'Asus Zenwatch WI500Q\r\n', '1000000', 'asus-zenwatch-wi500q-400x460.png', 'Asus Zenwatch WI500Q - Smartwatch mới đến từ Asus', 1, '890000', 4, 4),
(60, 'Ốp lưng Oppo A5s nhựa dẻo Woven OSMIA Navy\r\n', '70000', 'op-lung-oppo-a5s-nhua-deo-woven-osmia-navy-1-600x600.jpg', 'Kiểu dáng thời trang và đẹp mắt\r\nThiết kế vừa vặn và ôm sát thân máy\r\nDễ dàng tháo/lắp ốp vào máy', 1, '69000', 3, 5),
(61, 'Ốp lưng Oppo F1s Nhựa hình thú OSMIA Sao Hồng\r\n', '50000', 'op-lung-oppo-f1s-nhua-hinh-thu-osmia-ck160938-sao-avatar--300x300.jpg', 'Chất liệu nhựa, kiểu dáng thời trang và đẹp mắt.\r\nThiết kế vừa vặn và ôm sát thân máy.\r\n Dễ dàng tháo/lắp ốp vào máy.', 0, '20000', 3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:user,2:admin',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:off,1:on',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `address`, `phone`, `email`, `level`, `status`) VALUES
(39, 'admin', '$2y$10$A4dTY6BDrCAp1ZHUukVFxezcPc28xDtDqJ.2XzDS0mxmpNA2wIes.', 'Đinh Thành Đức', 'Cao Đẳng Công Nghệ Thủ Đức', '(+84) 3447543XX', 'kyojitachabana@gmail.com', 2, 1),
(38, 'admin1', '$2y$10$bM8.fC7ilef05Izq36uf4O7kanUa8dWyoJ15DT07aijNf1.yJHGwq', 'Đinh Thành Đức', 'Cao Đẳng Công Nghệ Thủ Đức', '(+84) 3447543XX', 'kyojitachabana@gmail.com', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
