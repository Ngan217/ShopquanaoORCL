-- SQLINES DEMO *** sktop version to convert large SQL scripts,
-- SQLINES DEMO *** ny issues with Online conversion.

-- SQLINES DEMO *** act us at support@sqlines.com
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- SQLINES DEMO *** admin.net/
--
-- SQLINES DEMO *** .0.1
-- SQLINES DEMO *** tạo: Th7 17, 2020 lúc 01:32 PM
-- SQLINES DEMO ***  phục vụ: 10.4.11-MariaDB
-- SQLINES DEMO ***  7.4.5

/* SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; */
START TRANSACTION;
time_zone := "+00:00";


/* SQLINES DEMO *** ARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** LLATION_CONNECTION=@@COLLATION_CONNECTION */;
/* SQLINES DEMO *** tf8mb4 */;

--
-- SQLINES DEMO *** ��u: `webbanquanao`
--

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_admin`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_admin (
  admin_id number(10) NOT NULL,
  email varchar2(50) NOT NULL,
  password varchar2(100) NOT NULL,
  admin_name varchar2(100) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_admin`
--

INSERT INTO tbl_admin (admin_id, email, password, admin_name) VALUES
(1, 'admin@gmail.com', '123456', 'HƯNG TRẦN');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_baiviet`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_baiviet (
  baiviet_id number(10) NOT NULL,
  tenbaiviet varchar2(100) NOT NULL,
  tomtat clob NOT NULL,
  noidung clob NOT NULL,
  danhmuctin_id number(10) NOT NULL,
  baiviet_image varchar2(50) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_baiviet`
--

INSERT INTO tbl_baiviet (baiviet_id, tenbaiviet, tomtat, noidung, danhmuctin_id, baiviet_image)
 SELECT 1, 'quần jean cách tân (fashing new 2021)', 'Jeans là một loại quần xuất xứ từ các nước phương Tây, và là một trong những biểu tượng của xã hội phương tây vào thế kỷ XX. Cụ thể, nó đã từng ..', 'Jeans (Miền Bắc Việt Nam gọi là quần bò) là một loại quần xuất xứ từ các nước phương Tây, và là một trong những biểu tượng của xã hội phương tây vào thế kỷ XX. Cụ thể, nó đã từng là biểu tượng cho tuổi trẻ, sự phản kháng, tự do và cho chủ nghĩa cá nhân của mọi tầng lớp nhân dân ở phương tây. Đây là phần y phục được bán nhiều nhất trên thế giới. Cả hai giới tính và mọi tầng lớp xã hội, thuộc nhiều nền văn hóa đều có thể mặc jeans.', 1, 'hot20.jpg' FROM dual UNION ALL 
 SELECT 2, 'quần kaki (xu thế thời trang mới 2020)', 'Quần kaki luôn là lựa chọn tối ưu dành cho các bạn nam để tạo cho mình phong cách thời trang trẻ trung nhưng cũng đầy lịch lãm. ', 'Quần kaki luôn là lựa chọn tối ưu dành cho các bạn nam để tạo cho mình phong cách thời trang trẻ trung nhưng cũng đầy lịch lãm. Quần kaki đến từ Hotdeal được thiết kế với 2 túi trước, 2 túi sau, và có nhiều size để bạn thoải mái lựa chọn. Quần được may từ chất liệu kaki có độ bền cao, không bị co rút sợi vải hay phai màu sau một thời gian sử dụng. Dù kết hợp với áo sơ mi hay áo thun thì bạn cũng đều trở nên mạnh mẽ, nam tính hơn trong mắt mọi người.', 2, 'hot17.jpg' FROM dual UNION ALL 
 SELECT 3, 'áo sơ mi tự tin kheo vẻ lịch lãm', 'Ngày nay, áo sơ mi không còn là đặc quyền thời trang dành riêng cho nam giới. Đã có rất nhiều những biến thể trong thiết kế và phong cách của áo sơ mi. Cổ áo sơ mi cũng có nhiều thay đổi với những đường cắt và kích thước khác nhau. Nó thay đổi tùy thuộc vào các xu hướng thời trang khác nhau. Các loại vải cũng đa dạng hơn rất nhiều. Từ vải oxford đến vải cotton.', 'Ngày nay, áo sơ mi không còn là đặc quyền thời trang dành riêng cho nam giới. Đã có rất nhiều những biến thể trong thiết kế và phong cách của áo sơ mi. Cổ áo sơ mi cũng có nhiều thay đổi với những đường cắt và kích thước khác nhau. Nó thay đổi tùy thuộc vào các xu hướng thời trang khác nhau. Các loại vải cũng đa dạng hơn rất nhiều. Từ vải oxford đến vải cotton.rnGiờ đây, áo sơ mi đã trở thành 1 trang phục không thể thiếu trong tủ quần áo của mọi người không phân biệt giới tính, tuổi tác. Bạn hoàn toàn có thể tìm cho mình một chiếc áo sơ mi ở bất kì đâu. Từ những nhãn hiệu thời trang nổi tiếng đến các cửa hàng nhỏ, thậm chí có cả ở trong chợ, trên vỉa hè…rnrnTuy nhiên để có thể sở hữu được một chiếc áo sơ mi vừa vặn, chất liệu tốt nhất với mình, Sơ mi công sở sẽ hướng dẫn bạn những cách chọn áo sơ mi nam từ chất liệu, dáng áo phù hợp với bản thân.. Chúc bạn có thể lựa chọn được 1 chiếc áo sơ mi chất lượng ưng ý./.', 3, 'aosm1.jpg' FROM dual UNION ALL 
 SELECT 5, 'thông tin về áo tay ngắn của shop mình', 'một trong những thương hiệu thời trang nổi tiếng xuất của xứ sở hoa Anh Đào. Những trung tâm thời trang lớn ở Nhật Bản bên trong đều có cửa hàng Beams và thương hiệu này cũng hiện diện ngay cả ở nước ngoài nữa. Thành lập năm 1976, Beams xây dựng hình tượng nhãn hàng thời trang – phụ kiện đường phố thoải mái và chất lượng cao.rnrnrnrn', 'một trong những thương hiệu thời trang nổi tiếng xuất của xứ sở hoa Anh Đào. Những trung tâm thời trang lớn ở Nhật Bản bên trong đều có cửa hàng Beams và thương hiệu này cũng hiện diện ngay cả ở nước ngoài nữa. Thành lập năm 1976, Beams xây dựng hình tượng nhãn hàng thời trang – phụ kiện đường phố thoải mái và chất lượng cao.rnrnrnrnCảm hứng thời trang chính của Beams nhấn mạnh tính cơ bản nhưng vui là chủ yếu. Rất nhiều người chọn lựa Beams vì mẫu mã đáng yêu và chất lượng thì không chê vào đâu được. Sản phẩm của Beams cực kì đa dạng, cho nam, nữ và trẻ em, chưa kể có những bộ thiết kết đặt may riêng.', 4, 'aothun1.jpg' FROM dual UNION ALL 
 SELECT 6, 'thông tin đáng bận tâm về balo nè', 'Ngày nay khi tìm một chiếc balo du lịch người dùng không chỉ quan tâm đến chất lượng sản phẩm mà còn rất chú ý đến mẫu mã và công dụng của chiếc balo đem lại khi sử dụng. Để đáp ứng nhu cầu từ phía người dùng, nhiều hãng sản xuất balo cho ra đời các mẫu balo đa năng với nhiều mẫu mã, ', 'Ngày nay khi tìm một chiếc balo du lịch người dùng không chỉ quan tâm đến chất lượng sản phẩm mà còn rất chú ý đến mẫu mã và công dụng của chiếc balo đem lại khi sử dụng. Để đáp ứng nhu cầu từ phía người dùng, nhiều hãng sản xuất balo cho ra đời các mẫu balo đa năng với nhiều mẫu mã, màu sắc và thiết kế khác nhau giúp khách hàng có nhiều lựa chọn hơn khi mua hàng. Giới thiệu qua về balo đa năng, Balo đa năng là mẫu balo có thể sử dụng cho nhiều trường hợp với nhiều tiện ích mang lại khác nhau, có thể sử dụng thông thường như chiếc balo hoặc thay đổi thành cặp đựng, túi du lịch khi cần. Thông thường các mẫu balo đa năng được thiết kế với kích thước lớn, đựng được nhiều hành lý cần thiết phù hợp sử dụng cho các chuyến công tác hay đi du lịch ngắn ngày. Tại hệ thống cửa hàng của Balo Online có những mẫu balo đa năng đến từ các thương hiệu như Simplecarry, Tucano, Bestlife…với nhiều mẫu mã và màu sắc khác nhau, đều được làm từ những chất liệu cao cấp có độ bền cao. Tại hệ thống Balo Online các sản phẩm đều được đảm bảo là hàng chính hãng, có giá cả phải chăng và đặc biệt có chế độ bảo hành lên đến 10 năm cho các lỗi về khóa, quai đeo và đường chỉ may. Hệ thống bán hàng uy tín số 1 về các kênh online và offline, có chế độ giao hàng nhanh, ship cod toàn quốc, nhiều gói ưu đãi với các đơn hàng khác nhau', 5, 'balo4.jpg' FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_category`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_category (
  category_id number(10) NOT NULL,
  category_name varchar2(50) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_category`
--

INSERT INTO tbl_category (category_id, category_name)
 SELECT 1, 'Áo Dài' FROM dual UNION ALL 
 SELECT 2, 'Áo Ngắn' FROM dual UNION ALL 
 SELECT 3, 'Quần jean' FROM dual UNION ALL 
 SELECT 4, 'Quần kaki' FROM dual UNION ALL 
 SELECT 5, 'Balo' FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_danhmuc_tin`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_danhmuc_tin (
  danhmuctin_id number(10) NOT NULL,
  tendanhmuc varchar2(100) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_danhmuc_tin`
--

INSERT INTO tbl_danhmuc_tin (danhmuctin_id, tendanhmuc)
 SELECT 1, 'giới thiệu về quần jean của shop' FROM dual UNION ALL 
 SELECT 2, 'giới thiệu về quần kaki của shop' FROM dual UNION ALL 
 SELECT 3, 'giới thiệu về áo dài của shop' FROM dual UNION ALL 
 SELECT 4, 'giới thiệu về áo ngắn tay của shop' FROM dual UNION ALL 
 SELECT 5, 'giới thiệu về balo của shop' FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_donhang`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_donhang (
  donhang_id number(10) NOT NULL,
  sanpham_id number(10) NOT NULL,
  soluong number(10) NOT NULL,
  mahang varchar2(50) NOT NULL,
  khachhang_id number(10) NOT NULL,
  ngaythang timestamp(0) DEFAULT current_timestamp() NOT NULL  (),
  tinhtrang trunc(to_number(11)) NOT NULL,
  huydon trunc(to_number(11)) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_donhang`
--

INSERT INTO tbl_donhang (donhang_id, sanpham_id, soluong, mahang, khachhang_id, ngaythang, tinhtrang, huydon)
 SELECT 13, 20, 3, '4236', 15, '2019-10-04 02:33:55', 0, 0 FROM dual UNION ALL 
 SELECT 14, 21, 4, '4236', 15, '2019-10-04 02:33:56', 0, 0 FROM dual UNION ALL 
 SELECT 15, 20, 3, '6503', 16, '2019-10-04 02:34:56', 0, 0 FROM dual UNION ALL 
 SELECT 16, 21, 4, '6503', 16, '2019-10-04 02:34:56', 0, 0 FROM dual UNION ALL 
 SELECT 17, 21, 1, '2508', 17, '2019-10-04 02:35:19', 0, 0 FROM dual UNION ALL 
 SELECT 18, 26, 3, '4249', 18, '2019-10-04 02:45:46', 0, 0 FROM dual UNION ALL 
 SELECT 19, 26, 3, '8728', 19, '2019-10-04 02:46:40', 0, 0 FROM dual UNION ALL 
 SELECT 20, 21, 1, '5037', 20, '2019-10-04 02:48:16', 0, 0 FROM dual UNION ALL 
 SELECT 21, 20, 1, '5037', 20, '2019-10-04 02:48:17', 0, 0 FROM dual UNION ALL 
 SELECT 22, 21, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0 FROM dual UNION ALL 
 SELECT 23, 20, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0 FROM dual UNION ALL 
 SELECT 49, 31, 2, '3555', 35, '2020-07-17 08:52:00', 1, 2 FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_giaodich`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_giaodich (
  giaodich_id number(10) NOT NULL,
  sanpham_id number(10) NOT NULL,
  soluong number(10) NOT NULL,
  magiaodich varchar2(50) NOT NULL,
  ngaythang timestamp(0) DEFAULT current_timestamp() NOT NULL  (),
  khachhang_id trunc(to_number(11)) NOT NULL,
  tinhtrangdon trunc(to_number(11)) NOT NULL DEFAULT 0,
  huydon trunc(to_number(11)) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_giaodich`
--

INSERT INTO tbl_giaodich (giaodich_id, sanpham_id, soluong, magiaodich, ngaythang, khachhang_id, tinhtrangdon, huydon)
 SELECT 3, 21, 2, '5737', '2019-10-04 02:57:00', 23, 0, 0 FROM dual UNION ALL 
 SELECT 4, 26, 1, '6219', '2019-10-04 02:58:34', 24, 0, 0 FROM dual UNION ALL 
 SELECT 5, 25, 3, '7785', '2019-10-04 03:11:52', 25, 0, 0 FROM dual UNION ALL 
 SELECT 6, 22, 5, '7785', '2019-10-04 03:11:52', 25, 0, 0 FROM dual UNION ALL 
 SELECT 7, 27, 2, '7785', '2019-10-04 03:11:52', 25, 0, 0 FROM dual UNION ALL 
 SELECT 8, 21, 1, '5396', '2019-10-04 03:49:08', 26, 0, 0 FROM dual UNION ALL 
 SELECT 9, 20, 3, '5396', '2019-10-04 03:49:08', 26, 0, 0 FROM dual UNION ALL 
 SELECT 10, 20, 3, '7914', '2019-10-05 05:38:42', 28, 0, 0 FROM dual UNION ALL 
 SELECT 11, 26, 1, '7914', '2019-10-05 05:38:42', 28, 0, 0 FROM dual UNION ALL 
 SELECT 12, 25, 2, '6687', '2019-10-09 09:48:42', 27, 1, 2 FROM dual UNION ALL 
 SELECT 13, 26, 3, '6687', '2019-10-09 09:48:42', 27, 1, 2 FROM dual UNION ALL 
 SELECT 14, 27, 1, '6687', '2019-10-09 09:48:42', 27, 1, 2 FROM dual UNION ALL 
 SELECT 15, 22, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2 FROM dual UNION ALL 
 SELECT 16, 24, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2 FROM dual UNION ALL 
 SELECT 17, 20, 1, '555', '2019-10-09 09:50:08', 27, 0, 2 FROM dual UNION ALL 
 SELECT 18, 19, 3, '5158', '2020-07-17 08:43:10', 32, 1, 2 FROM dual UNION ALL 
 SELECT 19, 22, 1, '5158', '2020-07-17 08:43:10', 32, 1, 2 FROM dual UNION ALL 
 SELECT 20, 29, 1, '6739', '2020-07-17 06:04:15', 32, 0, 1 FROM dual UNION ALL 
 SELECT 21, 29, 1, '663', '2020-07-17 08:45:29', 32, 1, 2 FROM dual UNION ALL 
 SELECT 22, 21, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2 FROM dual UNION ALL 
 SELECT 23, 30, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2 FROM dual UNION ALL 
 SELECT 24, 31, 1, '3846', '2020-07-17 08:43:08', 33, 1, 2 FROM dual UNION ALL 
 SELECT 25, 30, 2, '6619', '2020-07-17 08:45:04', 33, 1, 1 FROM dual UNION ALL 
 SELECT 26, 31, 2, '3555', '2020-07-17 08:52:00', 35, 1, 2 FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_giohang`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_giohang (
  giohang_id number(10) NOT NULL,
  tensanpham varchar2(100) NOT NULL,
  sanpham_id number(10) NOT NULL,
  giasanpham varchar2(50) NOT NULL,
  hinhanh varchar2(50) NOT NULL,
  soluong number(10) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_giohang`
--

INSERT INTO tbl_giohang (giohang_id, tensanpham, sanpham_id, giasanpham, hinhanh, soluong)
 SELECT 29, 'ba lô cimima', 31, '500000', 'balo4.jpg', 1 FROM dual UNION ALL 
 SELECT 30, 'quần jean titile goz', 23, '1150000', 'quanjean1.jpg', 1 FROM dual UNION ALL 
 SELECT 31, 'áo sm khangu', 19, '5600000', 'hot2.jpg', 1 FROM dual UNION ALL 
 SELECT 32, 'quần jean sehon', 24, '600000', 'quanjean3.jpg', 1 FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_khachhang`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_khachhang (
  khachhang_id number(10) NOT NULL,
  name varchar2(100) NOT NULL,
  phone varchar2(50) NOT NULL,
  address varchar2(200) NOT NULL,
  note clob NOT NULL,
  email varchar2(150) NOT NULL,
  password varchar2(100) NOT NULL,
  giaohang number(10) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_khachhang`
--

INSERT INTO tbl_khachhang (khachhang_id, name, phone, address, note, email, password, giaohang)
 SELECT 12, 'Hiếu', '0932023992', '123/123', 'dasdasdas', 'hieu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1 FROM dual UNION ALL 
 SELECT 13, 'Long Hoàng', '01694494813', '123/123', 'dasdasdas', 'long@gmail.com', '0192023a7bbd73250516f069df18b500', 0 FROM dual UNION ALL 
 SELECT 14, 'Hoàng Long', '0932023992', '123/123', 'dsadas', 'hoanglong@gmail.com', '', 1 FROM dual UNION ALL 
 SELECT 22, 'Nam', '0932023992', '123/123', 'dasdas', 'name123@gmail.com', '', 1 FROM dual UNION ALL 
 SELECT 23, 'Nam', '0932023992', '123/123', 'dasdasd', 'name456@gmail.com', '', 1 FROM dual UNION ALL 
 SELECT 24, 'Hoa', '0932023992', '123/123', 'dasdas', 'hoa@gmail.com', '', 0 FROM dual UNION ALL 
 SELECT 25, 'Hoàng Kha', '0932023992', '123/123', 'dasdasdas', 'hoangkha@gmail.com', '', 1 FROM dual UNION ALL 
 SELECT 26, 'Trương Lưu', '0932023992', '123/123', 'dasdasdas', 'truongluu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1 FROM dual UNION ALL 
 SELECT 27, 'Trương Huệ Mẫn', '0932023992', '123', 'dasdasdasd', 'hueman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0 FROM dual UNION ALL 
 SELECT 28, 'Hoa', '0932023992', '123/123', 'dasdasdads', 'hoa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0 FROM dual UNION ALL 
 SELECT 29, 'q', '0362651862', 'kháh qua', 'ok', 'tranvinhhung2k@gmail.com', '202cb962ac59075b964b07152d234b70', 0 FROM dual UNION ALL 
 SELECT 30, 'ád', 'ád', 'ád', 'ád', 'ád', '8898c2fbb18cf8419e8ef3bd141b8aff', 1 FROM dual UNION ALL 
 SELECT 31, 'Trần Vĩnh Hưng', '0362651862', '26', '1', 'tranvinhhung2k@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0 FROM dual UNION ALL 
 SELECT 32, 'Trần Vĩnh Hưng', '0362651862', '26', 'he', 'tranvinhhung@gmail', '202cb962ac59075b964b07152d234b70', 1 FROM dual UNION ALL 
 SELECT 33, 'Trần Vĩnh Hưng', '123', '12khan', 'hihi', 'tranvinhhung2k@gmail.com', '202cb962ac59075b964b07152d234b70', 0 FROM dual UNION ALL 
 SELECT 34, '12', '21', '12', '21', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0 FROM dual UNION ALL 
 SELECT 35, 'Nguyễn thị úy thương', '123', '21313', '213', 'hh@gmail.com', 'cfe95b64ac715d64275365ede690ee7c', 0 FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_sanpham`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_sanpham (
  sanpham_id number(10) NOT NULL,
  category_id number(10) NOT NULL,
  sanpham_name varchar2(255) NOT NULL,
  sanpham_chitiet clob NOT NULL,
  sanpham_mota clob NOT NULL,
  sanpham_gia varchar2(100) NOT NULL,
  sanpham_giakhuyenmai varchar2(100) NOT NULL,
  sanpham_active number(10) NOT NULL,
  sanpham_hot number(10) NOT NULL,
  sanpham_soluong number(10) NOT NULL,
  sanpham_image varchar2(50) NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_sanpham`
--

INSERT INTO tbl_sanpham (sanpham_id, category_id, sanpham_name, sanpham_chitiet, sanpham_mota, sanpham_gia, sanpham_giakhuyenmai, sanpham_active, sanpham_hot, sanpham_soluong, sanpham_image)
 SELECT 17, 1, 'áo sơ mi dài collas1', 'áo sơ mi dài collas1 thời thượng quý ông', 'áo sơ mi dài collas1 đen ống mượt', '6000000', '5500000', 0, 0, 19, 'aosm6.jpg' FROM dual UNION ALL 
 SELECT 18, 1, 'áo sơ mi sunsiz', 'áo sơ mi sunsiz cotton 80% , không giặt máy quá mạnh hư áo', 'áo sơ mi sunsiz phá cách tạo đồ', '5000000', '4500000', 0, 0, 9, 'hot1.jpg' FROM dual UNION ALL 
 SELECT 19, 1, 'áo sm khangu', 'áo sm khangu đảng cấp quý ông', 'áo sm khangu tìm lại chính mình', '5600000', '4800000', 0, 0, 78, 'hot2.jpg' FROM dual UNION ALL 
 SELECT 20, 2, 'áo sơ mi stu3', 'áo sơ mi stu3 phù hợp cho các lứa tuổi', 'áo sơ mi stu3 đem đến sự lịch thiệp', '2900000', '1800000', 0, 0, 26, 'aosm3.jpg' FROM dual UNION ALL 
 SELECT 21, 2, 'áo đen fasshing', 'áo đen fasshing may bằng sợi cotton nguyên chất đến 99%', 'áo đen fasshing đem lại cảm giác thời thượng', '1500000', '1200000', 0, 0, 12, 'hot4.jpg' FROM dual UNION ALL 
 SELECT 22, 2, 'áo kuntanggoMM1', 'áo kuntanggoMM1 vải chất liệu cotton thoáng mát cả ngày', 'áo kuntanggoMM1 thoải mái mùa hè', '7500000', '6800000', 0, 0, 10, 'aothun3.jpg' FROM dual UNION ALL 
 SELECT 23, 3, 'quần jean titile goz', 'quần jean titile goz tự tin khoe cá tính', 'quần jean titile goz thêm phần thoải mái', '1150000', '990000', 0, 0, 23, 'quanjean1.jpg' FROM dual UNION ALL 
 SELECT 24, 3, 'quần jean sehon', 'quần jean sehon có kiểu dáng thời thượng , phù hợp với lứa tuỏi 19+', 'quần jean sehon có kiểu dáng thời thượng', '600000', '550000', 0, 0, 14, 'quanjean3.jpg' FROM dual UNION ALL 
 SELECT 25, 3, 'quần jean mabbu2', 'quần jean mabbu2 thời thượng cách tân , mang đạm phong cách cool ngầu', 'quần jean mabbu2 thời thượng cách tân', '660000', '530000', 0, 0, 10, 'quanjean4.jpg' FROM dual UNION ALL 
 SELECT 26, 4, 'quần kaki longsuzz', 'quần kaki longsuzz quá đẹp ', 'quần kaki longsuzz đánh thức tiềm năng trong bạn', '2105000', '1990000', 0, 0, 16, 'quantay3.jpg' FROM dual UNION ALL 
 SELECT 27, 4, 'quần kaki sunnsuized', 'quần kaki sunnsuized được làm từ cotton 90%,chống bụi bẩn và không ra màu', 'quần kaki sunnsuized màu đen óng phù hợp cho mọi lứa tuổi', '3500000', '2300000', 0, 0, 10, 'photomain1.jpg' FROM dual UNION ALL 
 SELECT 28, 4, 'quần kaki jenfull', 'quần kaki jenfull bước đi trên mọi chặn đường', 'quần kaki jenfull', '2000000', '1800000', 0, 0, 15, 'hot21.jpg' FROM dual UNION ALL 
 SELECT 29, 5, 'balo Manking', 'balo Manking có màu hồng cá tính dành cho bạn', 'balo Manking', '630000', '590000', 0, 0, 20, 'balo6.jpg' FROM dual UNION ALL 
 SELECT 30, 5, 'balo kunji', 'ba lô kunji đi đồng hành với bạn các chặn đường có 3 ngăn rộng', 'ba lô kunji đi đồng hành với bạn các chặn đường', '1000000', '800000', 0, 0, 17, 'hot19.jpg' FROM dual UNION ALL 
 SELECT 31, 5, 'ba lô cimima', 'ok', 'ba lô xịn', '500000', '410000', 0, 0, 10, 'balo4.jpg' FROM dual;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** g cho bảng `tbl_slider`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tbl_slider (
  slider_id number(10) NOT NULL,
  slider_image varchar2(100) NOT NULL,
  slider_caption clob NOT NULL,
  slider_active number(10) DEFAULT 1 NOT NULL
) ;

--
-- SQLINES DEMO *** liệu cho bảng `tbl_slider`
--

INSERT INTO tbl_slider (slider_id, slider_image, slider_caption, slider_active)
 SELECT 1, 'photo1.jpg', 'Slider khuyến mãi ', 1 FROM dual UNION ALL 
 SELECT 2, 'photo2.jpg', 'Slider 50%', 0 FROM dual;

--
-- SQLINES DEMO *** ác bảng đã đổ
--

--
-- SQLINES DEMO *** ảng `tbl_admin`
--
ALTER TABLE tbl_admin
  ADD PRIMARY KEY (admin_id);

--
-- SQLINES DEMO *** ảng `tbl_baiviet`
--
ALTER TABLE tbl_baiviet
  ADD PRIMARY KEY (baiviet_id);

--
-- SQLINES DEMO *** ảng `tbl_category`
--
ALTER TABLE tbl_category
  ADD PRIMARY KEY (category_id);

--
-- SQLINES DEMO *** ảng `tbl_danhmuc_tin`
--
ALTER TABLE tbl_danhmuc_tin
  ADD PRIMARY KEY (danhmuctin_id);

--
-- SQLINES DEMO *** ảng `tbl_donhang`
--
ALTER TABLE tbl_donhang
  ADD PRIMARY KEY (donhang_id);

--
-- SQLINES DEMO *** ảng `tbl_giaodich`
--
ALTER TABLE tbl_giaodich
  ADD PRIMARY KEY (giaodich_id);

--
-- SQLINES DEMO *** ảng `tbl_giohang`
--
ALTER TABLE tbl_giohang
  ADD PRIMARY KEY (giohang_id);

--
-- SQLINES DEMO *** ảng `tbl_khachhang`
--
ALTER TABLE tbl_khachhang
  ADD PRIMARY KEY (khachhang_id);

--
-- SQLINES DEMO *** ảng `tbl_sanpham`
--
ALTER TABLE tbl_sanpham
  ADD PRIMARY KEY (sanpham_id);

--
-- SQLINES DEMO *** ảng `tbl_slider`
--
ALTER TABLE tbl_slider
  ADD PRIMARY KEY (slider_id);

--
-- SQLINES DEMO *** o các bảng đã đổ
--

--
-- SQLINES DEMO *** o bảng `tbl_admin`
--
ALTER TABLE tbl_admin
  MODIFY admin_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- SQLINES DEMO *** o bảng `tbl_baiviet`
--
ALTER TABLE tbl_baiviet
  MODIFY baiviet_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- SQLINES DEMO *** o bảng `tbl_category`
--
ALTER TABLE tbl_category
  MODIFY category_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- SQLINES DEMO *** o bảng `tbl_danhmuc_tin`
--
ALTER TABLE tbl_danhmuc_tin
  MODIFY danhmuctin_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- SQLINES DEMO *** o bảng `tbl_donhang`
--
ALTER TABLE tbl_donhang
  MODIFY donhang_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- SQLINES DEMO *** o bảng `tbl_giaodich`
--
ALTER TABLE tbl_giaodich
  MODIFY giaodich_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- SQLINES DEMO *** o bảng `tbl_giohang`
--
ALTER TABLE tbl_giohang
  MODIFY giohang_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- SQLINES DEMO *** o bảng `tbl_khachhang`
--
ALTER TABLE tbl_khachhang
  MODIFY khachhang_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- SQLINES DEMO *** o bảng `tbl_sanpham`
--
ALTER TABLE tbl_sanpham
  MODIFY sanpham_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- SQLINES DEMO *** o bảng `tbl_slider`
--
ALTER TABLE tbl_slider
  MODIFY slider_id trunc(to_number(11)) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/* SQLINES DEMO *** ER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** ON_CONNECTION=@OLD_COLLATION_CONNECTION */;
