-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2020 lúc 01:32 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '123456', 'HƯNG TRẦN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES
(1, 'quần jean cách tân (fashing new 2021)', 'Jeans là một loại quần xuất xứ từ các nước phương Tây, và là một trong những biểu tượng của xã hội phương tây vào thế kỷ XX. Cụ thể, nó đã từng ..', 'Jeans (Miền Bắc Việt Nam gọi là quần bò) là một loại quần xuất xứ từ các nước phương Tây, và là một trong những biểu tượng của xã hội phương tây vào thế kỷ XX. Cụ thể, nó đã từng là biểu tượng cho tuổi trẻ, sự phản kháng, tự do và cho chủ nghĩa cá nhân của mọi tầng lớp nhân dân ở phương tây. Đây là phần y phục được bán nhiều nhất trên thế giới. Cả hai giới tính và mọi tầng lớp xã hội, thuộc nhiều nền văn hóa đều có thể mặc jeans.', 1, 'hot20.jpg'),
(2, 'quần kaki (xu thế thời trang mới 2020)', 'Quần kaki luôn là lựa chọn tối ưu dành cho các bạn nam để tạo cho mình phong cách thời trang trẻ trung nhưng cũng đầy lịch lãm. ', 'Quần kaki luôn là lựa chọn tối ưu dành cho các bạn nam để tạo cho mình phong cách thời trang trẻ trung nhưng cũng đầy lịch lãm. Quần kaki đến từ Hotdeal được thiết kế với 2 túi trước, 2 túi sau, và có nhiều size để bạn thoải mái lựa chọn. Quần được may từ chất liệu kaki có độ bền cao, không bị co rút sợi vải hay phai màu sau một thời gian sử dụng. Dù kết hợp với áo sơ mi hay áo thun thì bạn cũng đều trở nên mạnh mẽ, nam tính hơn trong mắt mọi người.', 2, 'hot17.jpg'),
(3, 'áo sơ mi tự tin kheo vẻ lịch lãm', 'Ngày nay, áo sơ mi không còn là đặc quyền thời trang dành riêng cho nam giới. Đã có rất nhiều những biến thể trong thiết kế và phong cách của áo sơ mi. Cổ áo sơ mi cũng có nhiều thay đổi với những đường cắt và kích thước khác nhau. Nó thay đổi tùy thuộc vào các xu hướng thời trang khác nhau. Các loại vải cũng đa dạng hơn rất nhiều. Từ vải oxford đến vải cotton.', 'Ngày nay, áo sơ mi không còn là đặc quyền thời trang dành riêng cho nam giới. Đã có rất nhiều những biến thể trong thiết kế và phong cách của áo sơ mi. Cổ áo sơ mi cũng có nhiều thay đổi với những đường cắt và kích thước khác nhau. Nó thay đổi tùy thuộc vào các xu hướng thời trang khác nhau. Các loại vải cũng đa dạng hơn rất nhiều. Từ vải oxford đến vải cotton.\r\nGiờ đây, áo sơ mi đã trở thành 1 trang phục không thể thiếu trong tủ quần áo của mọi người không phân biệt giới tính, tuổi tác. Bạn hoàn toàn có thể tìm cho mình một chiếc áo sơ mi ở bất kì đâu. Từ những nhãn hiệu thời trang nổi tiếng đến các cửa hàng nhỏ, thậm chí có cả ở trong chợ, trên vỉa hè…\r\n\r\nTuy nhiên để có thể sở hữu được một chiếc áo sơ mi vừa vặn, chất liệu tốt nhất với mình, Sơ mi công sở sẽ hướng dẫn bạn những cách chọn áo sơ mi nam từ chất liệu, dáng áo phù hợp với bản thân.. Chúc bạn có thể lựa chọn được 1 chiếc áo sơ mi chất lượng ưng ý./.', 3, 'aosm1.jpg'),
(5, 'thông tin về áo tay ngắn của shop mình', 'một trong những thương hiệu thời trang nổi tiếng xuất của xứ sở hoa Anh Đào. Những trung tâm thời trang lớn ở Nhật Bản bên trong đều có cửa hàng Beams và thương hiệu này cũng hiện diện ngay cả ở nước ngoài nữa. Thành lập năm 1976, Beams xây dựng hình tượng nhãn hàng thời trang – phụ kiện đường phố thoải mái và chất lượng cao.\r\n\r\n\r\n\r\n', 'một trong những thương hiệu thời trang nổi tiếng xuất của xứ sở hoa Anh Đào. Những trung tâm thời trang lớn ở Nhật Bản bên trong đều có cửa hàng Beams và thương hiệu này cũng hiện diện ngay cả ở nước ngoài nữa. Thành lập năm 1976, Beams xây dựng hình tượng nhãn hàng thời trang – phụ kiện đường phố thoải mái và chất lượng cao.\r\n\r\n\r\n\r\nCảm hứng thời trang chính của Beams nhấn mạnh tính cơ bản nhưng vui là chủ yếu. Rất nhiều người chọn lựa Beams vì mẫu mã đáng yêu và chất lượng thì không chê vào đâu được. Sản phẩm của Beams cực kì đa dạng, cho nam, nữ và trẻ em, chưa kể có những bộ thiết kết đặt may riêng.', 4, 'aothun1.jpg'),
(6, 'thông tin đáng bận tâm về balo nè', 'Ngày nay khi tìm một chiếc balo du lịch người dùng không chỉ quan tâm đến chất lượng sản phẩm mà còn rất chú ý đến mẫu mã và công dụng của chiếc balo đem lại khi sử dụng. Để đáp ứng nhu cầu từ phía người dùng, nhiều hãng sản xuất balo cho ra đời các mẫu balo đa năng với nhiều mẫu mã, ', 'Ngày nay khi tìm một chiếc balo du lịch người dùng không chỉ quan tâm đến chất lượng sản phẩm mà còn rất chú ý đến mẫu mã và công dụng của chiếc balo đem lại khi sử dụng. Để đáp ứng nhu cầu từ phía người dùng, nhiều hãng sản xuất balo cho ra đời các mẫu balo đa năng với nhiều mẫu mã, màu sắc và thiết kế khác nhau giúp khách hàng có nhiều lựa chọn hơn khi mua hàng. Giới thiệu qua về balo đa năng, Balo đa năng là mẫu balo có thể sử dụng cho nhiều trường hợp với nhiều tiện ích mang lại khác nhau, có thể sử dụng thông thường như chiếc balo hoặc thay đổi thành cặp đựng, túi du lịch khi cần. Thông thường các mẫu balo đa năng được thiết kế với kích thước lớn, đựng được nhiều hành lý cần thiết phù hợp sử dụng cho các chuyến công tác hay đi du lịch ngắn ngày. Tại hệ thống cửa hàng của Balo Online có những mẫu balo đa năng đến từ các thương hiệu như Simplecarry, Tucano, Bestlife…với nhiều mẫu mã và màu sắc khác nhau, đều được làm từ những chất liệu cao cấp có độ bền cao. Tại hệ thống Balo Online các sản phẩm đều được đảm bảo là hàng chính hãng, có giá cả phải chăng và đặc biệt có chế độ bảo hành lên đến 10 năm cho các lỗi về khóa, quai đeo và đường chỉ may. Hệ thống bán hàng uy tín số 1 về các kênh online và offline, có chế độ giao hàng nhanh, ship cod toàn quốc, nhiều gói ưu đãi với các đơn hàng khác nhau', 5, 'balo4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Áo Dài'),
(2, 'Áo Ngắn'),
(3, 'Quần jean'),
(4, 'Quần kaki'),
(5, 'Balo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc_tin`
--

INSERT INTO `tbl_danhmuc_tin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(1, 'giới thiệu về quần jean của shop'),
(2, 'giới thiệu về quần kaki của shop'),
(3, 'giới thiệu về áo dài của shop'),
(4, 'giới thiệu về áo ngắn tay của shop'),
(5, 'giới thiệu về balo của shop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`) VALUES
(13, 20, 3, '4236', 15, '2019-10-04 02:33:55', 0, 0),
(14, 21, 4, '4236', 15, '2019-10-04 02:33:56', 0, 0),
(15, 20, 3, '6503', 16, '2019-10-04 02:34:56', 0, 0),
(16, 21, 4, '6503', 16, '2019-10-04 02:34:56', 0, 0),
(17, 21, 1, '2508', 17, '2019-10-04 02:35:19', 0, 0),
(18, 26, 3, '4249', 18, '2019-10-04 02:45:46', 0, 0),
(19, 26, 3, '8728', 19, '2019-10-04 02:46:40', 0, 0),
(20, 21, 1, '5037', 20, '2019-10-04 02:48:16', 0, 0),
(21, 20, 1, '5037', 20, '2019-10-04 02:48:17', 0, 0),
(22, 21, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0),
(23, 20, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0),
(49, 31, 2, '3555', 35, '2020-07-17 08:52:00', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`) VALUES
(3, 21, 2, '5737', '2019-10-04 02:57:00', 23, 0, 0),
(4, 26, 1, '6219', '2019-10-04 02:58:34', 24, 0, 0),
(5, 25, 3, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(6, 22, 5, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(7, 27, 2, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(8, 21, 1, '5396', '2019-10-04 03:49:08', 26, 0, 0),
(9, 20, 3, '5396', '2019-10-04 03:49:08', 26, 0, 0),
(10, 20, 3, '7914', '2019-10-05 05:38:42', 28, 0, 0),
(11, 26, 1, '7914', '2019-10-05 05:38:42', 28, 0, 0),
(12, 25, 2, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(13, 26, 3, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(14, 27, 1, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(15, 22, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2),
(16, 24, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2),
(17, 20, 1, '555', '2019-10-09 09:50:08', 27, 0, 2),
(18, 19, 3, '5158', '2020-07-17 08:43:10', 32, 1, 2),
(19, 22, 1, '5158', '2020-07-17 08:43:10', 32, 1, 2),
(20, 29, 1, '6739', '2020-07-17 06:04:15', 32, 0, 1),
(21, 29, 1, '663', '2020-07-17 08:45:29', 32, 1, 2),
(22, 21, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2),
(23, 30, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2),
(24, 31, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2),
(25, 30, 2, '6619', '2020-07-17 08:45:04', 33, 1, 1),
(26, 31, 2, '3555', '2020-07-17 08:52:00', 35, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`) VALUES
(29, 'ba lô cimima', 31, '500000', 'balo4.jpg', 1),
(30, 'quần jean titile goz', 23, '1150000', 'quanjean1.jpg', 1),
(31, 'áo sm khangu', 19, '5600000', 'hot2.jpg', 1),
(32, 'quần jean sehon', 24, '600000', 'quanjean3.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(12, 'Hiếu', '0932023992', '123/123', 'dasdasdas', 'hieu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(13, 'Long Hoàng', '01694494813', '123/123', 'dasdasdas', 'long@gmail.com', '0192023a7bbd73250516f069df18b500', 0),
(14, 'Hoàng Long', '0932023992', '123/123', 'dsadas', 'hoanglong@gmail.com', '', 1),
(22, 'Nam', '0932023992', '123/123', 'dasdas', 'name123@gmail.com', '', 1),
(23, 'Nam', '0932023992', '123/123', 'dasdasd', 'name456@gmail.com', '', 1),
(24, 'Hoa', '0932023992', '123/123', 'dasdas', 'hoa@gmail.com', '', 0),
(25, 'Hoàng Kha', '0932023992', '123/123', 'dasdasdas', 'hoangkha@gmail.com', '', 1),
(26, 'Trương Lưu', '0932023992', '123/123', 'dasdasdas', 'truongluu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(27, 'Trương Huệ Mẫn', '0932023992', '123', 'dasdasdasd', 'hueman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(28, 'Hoa', '0932023992', '123/123', 'dasdasdads', 'hoa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(29, 'q', '0362651862', 'kháh qua', 'ok', 'tranvinhhung2k@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(30, 'ád', 'ád', 'ád', 'ád', 'ád', '8898c2fbb18cf8419e8ef3bd141b8aff', 1),
(31, 'Trần Vĩnh Hưng', '0362651862', '26', '1', 'tranvinhhung2k@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(32, 'Trần Vĩnh Hưng', '0362651862', '26', 'he', 'tranvinhhung@gmail', '202cb962ac59075b964b07152d234b70', 1),
(33, 'Trần Vĩnh Hưng', '123', '12khan', 'hihi', 'tranvinhhung2k@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(34, '12', '21', '12', '21', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(35, 'Nguyễn thị úy thương', '123', '21313', '213', 'hh@gmail.com', 'cfe95b64ac715d64275365ede690ee7c', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(17, 1, 'áo sơ mi dài collas1', 'áo sơ mi dài collas1 thời thượng quý ông', 'áo sơ mi dài collas1 đen ống mượt', '6000000', '5500000', 0, 0, 19, 'aosm6.jpg'),
(18, 1, 'áo sơ mi sunsiz', 'áo sơ mi sunsiz cotton 80% , không giặt máy quá mạnh hư áo', 'áo sơ mi sunsiz phá cách tạo đồ', '5000000', '4500000', 0, 0, 9, 'hot1.jpg'),
(19, 1, 'áo sm khangu', 'áo sm khangu đảng cấp quý ông', 'áo sm khangu tìm lại chính mình', '5600000', '4800000', 0, 0, 78, 'hot2.jpg'),
(20, 2, 'áo sơ mi stu3', 'áo sơ mi stu3 phù hợp cho các lứa tuổi', 'áo sơ mi stu3 đem đến sự lịch thiệp', '2900000', '1800000', 0, 0, 26, 'aosm3.jpg'),
(21, 2, 'áo đen fasshing', 'áo đen fasshing may bằng sợi cotton nguyên chất đến 99%', 'áo đen fasshing đem lại cảm giác thời thượng', '1500000', '1200000', 0, 0, 12, 'hot4.jpg'),
(22, 2, 'áo kuntanggoMM1', 'áo kuntanggoMM1 vải chất liệu cotton thoáng mát cả ngày', 'áo kuntanggoMM1 thoải mái mùa hè', '7500000', '6800000', 0, 0, 10, 'aothun3.jpg'),
(23, 3, 'quần jean titile goz', 'quần jean titile goz tự tin khoe cá tính', 'quần jean titile goz thêm phần thoải mái', '1150000', '990000', 0, 0, 23, 'quanjean1.jpg'),
(24, 3, 'quần jean sehon', 'quần jean sehon có kiểu dáng thời thượng , phù hợp với lứa tuỏi 19+', 'quần jean sehon có kiểu dáng thời thượng', '600000', '550000', 0, 0, 14, 'quanjean3.jpg'),
(25, 3, 'quần jean mabbu2', 'quần jean mabbu2 thời thượng cách tân , mang đạm phong cách cool ngầu', 'quần jean mabbu2 thời thượng cách tân', '660000', '530000', 0, 0, 10, 'quanjean4.jpg'),
(26, 4, 'quần kaki longsuzz', 'quần kaki longsuzz quá đẹp ', 'quần kaki longsuzz đánh thức tiềm năng trong bạn', '2105000', '1990000', 0, 0, 16, 'quantay3.jpg'),
(27, 4, 'quần kaki sunnsuized', 'quần kaki sunnsuized được làm từ cotton 90%,chống bụi bẩn và không ra màu', 'quần kaki sunnsuized màu đen óng phù hợp cho mọi lứa tuổi', '3500000', '2300000', 0, 0, 10, 'photomain1.jpg'),
(28, 4, 'quần kaki jenfull', 'quần kaki jenfull bước đi trên mọi chặn đường', 'quần kaki jenfull', '2000000', '1800000', 0, 0, 15, 'hot21.jpg'),
(29, 5, 'balo Manking', 'balo Manking có màu hồng cá tính dành cho bạn', 'balo Manking', '630000', '590000', 0, 0, 20, 'balo6.jpg'),
(30, 5, 'balo kunji', 'ba lô kunji đi đồng hành với bạn các chặn đường có 3 ngăn rộng', 'ba lô kunji đi đồng hành với bạn các chặn đường', '1000000', '800000', 0, 0, 17, 'hot19.jpg'),
(31, 5, 'ba lô cimima', 'ok', 'ba lô xịn', '500000', '410000', 0, 0, 10, 'balo4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'photo1.jpg', 'Slider khuyến mãi ', 1),
(2, 'photo2.jpg', 'Slider 50%', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
