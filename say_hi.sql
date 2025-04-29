-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2024 lúc 12:47 PM
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
-- Cơ sở dữ liệu: `say_hi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten`, `image`) VALUES
(42, 'Áo', 'ao.png\r\n'),
(43, 'Quần', 'quan.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idDH` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `ghiChu` text NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT 1,
  `diaChi` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sdt` bigint(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `giakhuyenmai` int(11) DEFAULT NULL,
  `idDM` int(11) NOT NULL,
  `soluong` int(11) DEFAULT 0,
  `mota` longtext DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0,
  `idBrand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `image`, `gia`, `giakhuyenmai`, `idDM`, `soluong`, `mota`, `hot`, `TrangThai`, `idBrand`) VALUES
(123, 'Áo thun nam, áo phông nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều hình thành phố alex cool', 'ao_thun_nam.png', 95000, 55000, 42, 1155, 'Áo thun nam, áo phông nam tay ngắn cổ tròn chất thun lạnh co giãn 4 chiều hình thành phố alex cool\r\n------------------------------\r\nLuôn luôn cập nhật những mẫu mã mới , đa dạng – ALEX COOL e hứa hẹn sẽ luôn đem lại cho bạn những sản phẩm thời trang ưng ý và hoàn hảo nhất.\r\n- Về sản phẩm: Shop cam kết cả về CHẤT LIỆU cũng như HÌNH DÁNG ( đúng với những gì được nêu bật trong phần mô tả sản phẩm). \r\n- Về giá cả : Shop nhập với số lượng nhiều và trực tiếp nên chi phí sẽ là RẺ NHẤT nhé.-\r\n- Thời gian chuẩn bị hàng: Hàng có sẵn, thời gian chuẩn bị tối ưu nhất. \r\n Shop Buôn Sỉ Áo Thun Nam Tay Ngắn In Họa Tiết \r\nMÔ TẢ CHI TIẾT SẢN PHẨM\r\n📢 Kích cỡ :* Chất Liệu :  \r\n- Chất thun lạnh , chất vải mềm , mịn , mặc thoải mái , đường chỉ may chắc chắn , không bị giản , nhão....\r\n  *  Công Nghệ In : Với công nghệ in chuyển nhiệt , chất liệu màu sẽ thấm trực tiếp lên vải  \r\n     -------------- ', NULL, 0, NULL),
(124, 'Quần dài nỉ thể thao unisex nam nữ DRAGON chất vải mềm mịn kiểu dáng trẻ trung phong cách năng động hai màu đen trắng', 'quan_dai_ni.png', 76000, 37000, 43, 1124, '- THÔNG TIN SẢN PHẨM : Quần dài nỉ thể thao unisex nam nữ DRAGON chất vải mềm mịn kiểu dáng trẻ trung phong cách năng động hai màu đen trắng\r\n\r\n- Màu : đen, trắng\r\n\r\n- Kích thước : DÀI 95CM , ĐÙI 27CM , ĐÁY 34CM\r\n\r\n- Size PHÙ HỢP CÁC BẠN TỪ 40 -65KG NHÉ dưới 1m75 nha.\r\n\r\n- QUẦN JOGGER  NAM NỮ chất liệu nỉ mặc siêu thoải mái, co giãn vận động \r\n\r\n- QUẦN THUN NAM DÀI phù hợp mặc đi chơi,bặn nhà, đi thể dục,thể thao, tập GYM.v.v thuận lợi phối đồ, mặc được trong phổ biến dịp khác nhau\r\n\r\n- Dáng QUẦN THỂ THAO từ trên xuống dưới sẽ hơi ôm vào theo dáng người chứ không phải dáng QUẦN\r\n\r\n- QUẦN NỈ xuất xứ Việt Nam\r\n\r\n- Phù hợp với mọi thời tiết\r\n\r\n- Bề mặt nỉ mang đến cảm giác mềm mịn cho vải. Vải có độ mềm mại nhất định,  giúp vải hạn chế việc bám bụi và dễ dàng làm sạch. \r\n\r\n- Bạn có thể an tâm khi diện trang phục đi ăn, đi chơi mà không lo dính bẩn.\r\n\r\n- Ưu điểm nổi trội của vải là ít bị nhăn và dễ làm phẳng. Điều này giúp bạn tiết kiệm được thời gian là (ủi) để giữ vè bằng phẳng của vải. Trong điều kiện đi chơi xa, không có nhiều thời gian thì trang phục từ vải nỉ chính là lựa chọn hàng đầu dành cho bạn.\r\n\r\n- Có khả năng thấm hút vượt trội. Chính vì thế, khi may trang phục, đây là mặt được đặt bên trong nhằm phát huy tối đa ưu điểm này. Khi mặt, bạn sẽ có cảm giác vô cùng dễ chịu, thoáng mát, kể cả trong điều kiện nắng nóng.', NULL, 0, NULL),
(125, 'Áo Thun Thêu 8YO CHILDHOOD Tee Cotton Mềm Mịn Mát - Áo Phông Local Brand Unisex Nam Nữ Form Rộng', 'ao_thun_theu.png', 238000, 119000, 42, 1012, '+ Chất liệu: PREMIUM COTTON - Càng mặc càng sướng\r\n\r\n+ Mềm - Mịn - Mát - Không đổ lông - Chống co rút\r\n\r\n+ Cổ áo dày bản hơn, bo cổ dày 3cm, nhưng mặc vẫn thoải mái và không bị thô. Lên form đẹp hơn, không bị dão cổ\r\n\r\n+ Màu sắc: Đen / Kem / Hồng / Xanh\r\n\r\n+ Họa tiết: Thêu vi tính cao cấp, sắc nét và bền bỉ\r\n\r\n+ Xuất xứ: Việt Nam.', NULL, 0, NULL),
(126, 'Quần short nam KAKI GIÓ cạp chun pha cúc trẻ trung', 'quan_short_nam.png', 130000, 78000, 42, 521, '🔷 THÔNG TIN SẢN PHẨM: \r\nQuần ngố,quần short kaki nam cạp chun pha cúc trẻ trung tiện lợi\r\n- Chất liệu vải Kaki giấy mềm,độ mỏng vừa phải.\r\n- Quần short Kaki được thiết kế có 2 túi trước, 1 túi sau \r\n Kiểu dáng: quần short nam kaki lưng thun với kiểu dáng trơn, form ống rộng, nhiều màu trung tính có thể mặc ở nhà, đi chơi, thể thao.\r\nQuần gồm 5 màu : Đen - Trắng - ghi - vàng - đỏ đô\r\nBảng SIZE: 5 Size 50-90kg\r\nM: 50kg - 58kg\r\nL:  9kg -67kg\r\nXL: 68 - 74kg\r\n2XL: 75 - 80kg\r\n3XL: 81 - 86kg\r\nBảng size tham khảo các anh bụng to ,mông to có thể lên thêm 1 size mặc cho thoải mái\r\nShop có hỗ trợ đổi trả sản phẩm nếu hàng lỗi hoặc không vừa size', NULL, 0, NULL),
(127, 'Áo thun Lovito họa tiết trái tim cơ bản phong cách thường ngày dành cho nữ LNE48014', 'ao_thun_lovito.png', 126000, 74000, 42, 53, '✅ĐIỂM NỔI BẬT \r\n-❤️Cơ bản \r\n-❤️Mềm mại và thoải mái\r\n\r\n✅MÔ TẢ \r\nHoa văn: Hình trái tim\r\nPhong cách: Ngày thường\r\nKích thước lớn: Không\r\nChất liệu: Polyester\r\nThành phần: 95% Polyester + 5% Spandex\r\nĐộ vừa vặn: Ôm vừa vặn\r\nVải xuyên thấu: Không\r\nĐộ co giãn: Co giãn nhẹ\r\nXuất xứ: Trung Quốc đại lục', NULL, 0, NULL),
(128, 'Quần lụa băng mỏng Echo Ridge, quần ống thẳng nam, quần ống rộng màu trơn cắt rời', 'quan_lua.png', 131000, 71000, 43, 521, '👔Cửa hàng quần áo nam Echo Ridge là thương hiệu quần áo nam thời trang tiếp tục thu hút sự yêu thích của người tiêu dùng với các khái niệm thiết kế độc đáo và tay nghề thủ công tinh tế.💘💖💗\r\n\r\n\r\n\r\n🥼Cửa hàng của chúng tôi bao gồm nhiều phong cách khác nhau, cho dù đó là phong cách bình thường, công sở hay thể thao, bạn có thể tìm thấy sự lựa chọn thỏa đáng tại đây. Tại cửa hàng của chúng tôi, cho dù đó là áo phông In hình phổ biến, áo sơ mi đơn giản hay áo khoác và áo khoác thời trang, bạn đều có thể thỏa mãn theo đuổi thời trang của mình.👓\r\n\r\n\r\n🧦Ngoài thiết kế thời trang, chúng tôi cũng rất chú trọng đến chất lượng và dịch vụ. Các sản phẩm trưng bày trong cửa hàng được lựa chọn cẩn thận, với chất lượng đáng tin cậy và giá cả hợp lý. Ngoài ra, dịch vụ khách hàng của chúng tôi cũng rất chuyên nghiệp và nhiệt tình. Chúng tôi sẽ cung cấp cho bạn những gợi ý chuyên nghiệp và những gợi ý phù hợp dựa trên nhu cầu và sở thích của bạn để giúp bạn tạo ra phong cách cá nhân của riêng mình.💼📖🎶🏀\r\n\r\n\r\n\r\n🎇Cửa hàng quần áo nam Echo Ridge là thương hiệu quần áo nam thời trang xứng đáng để bạn mua. Cho dù bạn là một thanh niên theo đuổi thời trang hay một người đàn ông trưởng thành coi trọng chất lượng và sự thoải mái, bạn có thể tìm thấy những phong cách quần áo phù hợp với mình tại đây. Hãy đến với cửa hàng quần áo nam Echo Ridge và duyệt qua, tôi tin rằng bạn sẽ tìm thấy những lợi ích bất ngờ.🎆✨🎊\r\n\r\n\r\n\r\nQuần lụa băng mỏng, quần ống thẳng nam, quần âu ống rộng màu trơn cắt rời dành cho học sinh', NULL, 0, NULL),
(129, 'Quần KaKi Nam Nữ Ống Rộng Dáng Công Sở Thiết Kế Lưng Thun Dáng 3 Màu Đen Kem Xám', 'quan_kaki.png', 160000, 79000, 43, 152, '🕵 THÔNG TIN SẢN PHẨM : Quần KaKi Nam Nữ Ống Rộng Dáng Công Sở Thiết Kế Lưng Thun Dáng 3 Màu Đen Kem Xám - TÂM SHOP\r\n\r\n✈ Chất liệu: chất kaki dày dặn mềm mịn, đem lại cảm giác mang mát mẻ đường may kỹ lưỡng.\r\n\r\n- Kiểu dáng: Form rộng, thoải mái\r\n\r\n- Phù Hợp : đi chơi , bặn nhà, tập gym, Thể Thao, Du lịch ,Đi Học, Bặn cặp, Bặn nhóm,....\r\n\r\n✈ Màu sắc: Đen, trắng, Kem , Xám , Rêu\r\n\r\n✈ KÍCH THƯỚC QUẦN :\r\n\r\n+ M [ 45-52KG ] CHIỀU DÀI 89cm; ống rộng 25cm, đáy 34cm -DƯỚI 1M62\r\n\r\n+ L [ 52-58KG ] CHIỀU DÀI  90cm; ống rộng 27cm, đáy 34cm -DƯỚI 1M67\r\n\r\n+ XL [ 58-75KG ] CHIỀU DÀI 95cm ống rộng 31cm, đáy 36cm - DƯỚI 1M75\r\n\r\n- Quần dài kaki  là sự lựa chọn hoàn hảo cho các chàng trai. \r\n\r\n- Quần có nhiều màu trung tính rất dễ mặc, form quần vừa vặn cơ thể, thoải mái theo từng cử động.\r\n\r\n- Màu sắc trung tính và phối màu tuyệt vời mà rất ít quần  có tạo nên sự dễ dàng trong việc phối đồ và tạo ra cho mình nhiều phong cách khác nhau.\r\n\r\n- Quần dài có chất liệu KAKI co giãn 4 chiều, vải dày dặn mát mịn, thoải mái trong từng chuyển động khi  di chuyển, đứng lên/ ngồi xuống. \r\n\r\n- Đây cũng là chất liệu dễ giặt sạch, giúp bạn tiết kiệm một khoảng thời gian đáng kể.\r\n\r\n-Giặt tay hay giặt máy thoải mái không sợ ra màu, nhăn , mất form', NULL, 0, NULL),
(130, 'Áo Thun AM VƯƠNG MIỆN Nam Nữ Unisex Tay Lỡ Form Rộng', 'ao_thun_AM.png', 180000, 158000, 42, 554, 'Chất liệu: thun COTTON SU MỎNG, IN CHÌM\r\n\r\nM DÀI 63 NGANG 47 30-45 KG\r\n\r\nL DÀI 70 NGANG 55 46-70 KG\r\n\r\nHướng dẫn ĐẶT HÀNG được FREESHIP 😍😍😍\r\n\r\n✔ Nếu các bạn mua 1 sản phẩm, vui lòng ấn mua ngay \r\n\r\n✔ Nếu các bạn mua từ 2 sản phẩm trở lên, vui lòng ấn thêm vào giỏ hàng, và lần lượt thêm các sản phẩm bạn muốn mua vào giỏ trước khi đặt hàng và thanh toán. Các bạn nên tận dụng mã giảm giá vận chuyển của shopee bằng cách đặt đơn hàng trên 150k nếu bạn ở Hà Nội, trên 250k ở các tỉnh thành còn lại nhé, điều này sẽ giúp mình tiết kiệm được kha khá tiền đó ạ.\r\n\r\n😍😍😍 Shop CAM KẾT 😍😍😍\r\n\r\n✔Về sản phẩm: Shop cam kết cả về CHẤT LIỆU cũng như HÌNH DÁNG (đúng với những gì được nêu bật trong phần mô tả sản phẩm).\r\n\r\n✔Về giá cả : Shop nhập với số lượng nhiều và trực tiếp nên chi phí sẽ là RẺ NHẤT với chất lượng sản phẩm bạn nhận được.\r\n\r\n✔Về dịch vụ: Shop sẽ cố gắng trả lời hết những thắc mắc xoay quanh sản phẩm nhé.\r\n\r\n✔Thời gian chuẩn bị hàng: Hàng có sẵn, thời gian chuẩn bị tối ưu nhất.\r\n\r\n🍃🍃🍃Quyền Lợi của Khách Hàng 🍃🍃🍃\r\n\r\n✔ Nếu sản phẩm khách nhận được không đúng với sản phẩm khách đặt, hoặc khác với mô tả sản phẩm, khách hàng đừng vội đánh giá 1s mà hãy inb ngay cho shop để được shop hỗ trợ khách hàng đổi trả sản phẩm. Shop không hi vọng trường hợp này xảy ra, và sẽ cố gắng hết sức đê bạn không có một trải nghiệm mua hàng không tốt tại shop, nhưng nếu có, shop cũng sẽ giải quyết mọi chuyện sao cho thỏa đáng nhất.\r\n\r\n✔ 10 khách hàng đánh giá 5s kèm kình ảnh ấn tượng nhất tháng sẽ được gửi kèm QUÀ TẶNG TO TO và MÃ GIẢM GIÁ trong lần mua hàng ở tháng kế tiếp.', 0, 0, NULL),
(131, 'Quần short Cartoon Unisex (Nhiều mẫu) BST 01 Molly Fashion - Quần đùi hoạt hình nam nữ Freesize đến 65kg', 'quan_short_cartoon.png', 182000, 140000, 43, 731, '🔰 Mô tả chi tiết sản phẩm Quần đùi nữ, quần short nam hoạt hình Molly Fashion\r\n\r\n\r\n\r\n✔️ Kiểu dáng: form rộng dễ mặc, năng động, trẻ trung.\r\n\r\n✔️ Xuất xứ: Việt Nam\r\n\r\n✔️ Phong cách: Unisex - Nam nữ đều mặc được\r\n\r\n\r\n\r\n✔️ Chất liệu: Vải thun siu (thun lạnh 2 chiều: 98% sợi Polyester - 2% sợi spandex), ít nhăn, bền màu, thấm nước chậm\r\n\r\n\r\n\r\n✔️ Kích cỡ:  Freesize 38->65kg (Không có size). Cao dưới 1m7. Vòng 2 nhỏ hơn 83cm, vòng 3 nhỏ hơn 95cm và đùi nhỏ hơn 55cm mặc vừa\r\n\r\n💢 Dài quần: 45cm (mặc đến chấm gối hoặc trên gối tùy chiều cao)\r\n\r\n💢 Ống quần: rộng 26cm\r\n\r\n💢 Chiều dài đáy quần: 33cm\r\n\r\n', NULL, 0, NULL),
(132, 'Áo thun nam tay ngắn in chữ phong cách vintage', 'ao_thun_tay_ngan.png', 227000, 118000, 42, 141, 'Chào mừng bạn đến với cửa hàng của chúng tôi🎗🔮Kích thước chi tiết nằm trong phần giới thiệu bên dưới.Vui lòng ĐỌC KỸ🎆Sản phẩm có trong kho và có thể giao cho bạn trong thời gian ngắn.🎆Mọi thắc mắc về việc mua hàng của bạn, vui lòng liên hệ với chúng tôi, chúng tôi sẽ giải đáp thỏa đáng nhất cho bạn💙Sản phẩm của chúng tôi là thương hiệu mới 100%.💙Hy vọng sẽ mang đến cho bạn trải nghiệm mua sắm tốt nhất.💙Chúng tôi có kinh nghiệm phong phú và sản phẩm chất lượng cao.💙Chúng tôi tập trung vào chất lượng tốt và giá rẻ!💙Có những sản phẩm mới trên kệ bất cứ lúc nào.Hãy tiếp tục chú ý đến những tin tức mới nhất của cửa hàng của chúng tôi.Chúng tôi sẽ gửi cho bạn phiếu giảm giá và chiết khấu sản phẩm.🔮Nếu bạn thích sản phẩm của chúng tôi, xin vui lòng thêm vào giỏ hàng, cảm ơn bạn!!!🎆Chúng tôi mong muốn nhận được đánh giá năm sao của bạn.', 0, 0, NULL),
(133, 'SHIHANROU Áo thun nữ phong cách thể thao hợp xu hướng thường ngày', 'shihanrou_ao_thun.png', 156000, 90000, 42, 1543, '🌈 Chào mừng đến với cửa hàng của chúng tôi.\r\n\r\n\r\n\r\n  🌈 Theo dõi cửa hàng để nhận phiếu giảm giá ”◕‿◕｡\r\n\r\n\r\n\r\n  🌈 Nếu bạn hài lòng với sản phẩm và dịch vụ của chúng tôi Lời khen ngợi năm sao\r\n\r\n\r\n\r\n  🚚 Sản phẩm đến từ Trung Quốc và mất một thời gian để vận chuyển\r\n\r\n\r\n\r\n  💕 Phải mặc! Phổ biến vào năm 2023!\r\n\r\n\r\n\r\n  💕Được làm bằng chất liệu cao cấp, đủ bền để bạn mặc hàng ngày!\r\n\r\n\r\n\r\n  💕 Thật thoải mái Chất liệu vải mềm mại, hình dáng đẹp, chất lượng tốt.\r\n\r\n\r\n\r\n  💕 Thiết kế đẹp, sang trọng, độc đáo.\r\n\r\n\r\n\r\n  💕 Nó là một món quà tốt cho người yêu của bạn hoặc chính bạn.\r\n\r\n\r\n\r\n  ❣️ Chất lượng và giá cả như thế này không thể tìm thấy ở bất kỳ nơi nào khác, rất đáng đồng tiền. ️\r\n\r\n\r\n\r\n  ❣️Do các thiết bị hiển thị và chiếu sáng khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của tất cả các sản phẩm. Cảm ơn bạn đã thông cảm ❣️\r\n\r\n', 0, 0, NULL),
(134, 'LOCAL BRAND Áo thun The Weird Phong Cách Unisex Form Rộng', 'ao_thun_the_weird.png', 250000, 147000, 42, 521, 'Thương hiệu thời trang The Weird - Local Brand Unisex chính hãng \r\n\r\n✔️Made in VietNam \r\n\r\n✔️Chất liệu: thun cotton 100%, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n✔️Hình in chất lượng cao \r\n\r\n✔️Đường may tỉ mỉ, chắc chắn \r\n\r\n✔️Thiết kế trẻ trung, năng động và thời trang \r\n\r\n✔️Mix - Match được nhiều phong cách khác nhau, mặc ở nhà, đi chơi hay đi học đều phù hợp \r\n\r\n\r\n\r\n📍Bảng size áo thun The Weird \r\n\r\nSize M: 1m55-1m64 (53-60kg) \r\n\r\nSize L: 1m65-1m72 (57-67kg) \r\n\r\nSize XL: 1m73- 1m80 (68-78kg) \r\n\r\nSize 2XL: Dưới 1m85 (78-85kg)\r\n\r\nLưu ý: Bảng trên chỉ mang tính chất tham khảo, bạn có thể tăng/giảm 1-2 size tùy theo gu ăn mặc và sở thích của mình nhé. ', NULL, 0, NULL),
(135, 'Quần Jean Ống Rộng Nữ Wash Bụi Màu Đen Và Xanh Lưng Cao Phong Cách Retro Ulzzang Hàn Quốc', 'quan_jean.png', 159000, 87000, 43, 531, 'Quần Jean Ống Rộng Nữ Wash Bụi Màu Đen Và Xanh Lưng Cao Phong Cách Retro Ulzzang Hàn Quốc 460 552 317 315\r\n\r\n\r\n\r\n🔥 Mang phong cách retro của những năm thập niên 90, Quần Jean Ống Rộng rất được lòng các cô nàng khi style cổ điển đang lên ngôi trong thời gian gần đây.\r\n\r\n🔥  Thay vì những chiếc quần jean đầy nhàm chán và bó sát gây khó chịu, quần ống rộng xuất hiện như một vị cứu tinh đối với các chị em bởi sự thoải mái và tính thời trang mà nó mang lại. \r\n\r\n🔥  Với thiết kế rộng rãi, thoải mái, Quần Jean Ống Rộng vừa đảm bảo sự an toàn cho nữ giới khi mặc nhưng cũng vô cùng mềm mại, nữ tính. \r\n\r\n\r\n\r\n- Chú ý : Mẫu mã do Xưởng tự lên ý tưởng thiết kế, chọn vải kỹ lưỡng nên các bạn yên tâm về chất lượng nhé !!!\r\n\r\n\r\n\r\n❌ THÔNG TIN SẢN PHẨM : Quần Jean Ống Rộng Nữ Màu Đen Wash Bụi Lưng Cao Phong Cách Retro Ulzzang Hàn Quốc 315\r\n\r\n✔ Màu sắc: Đen Wash Bụi 315 - X.Đậm Wash Bụi 552 - X.Nhạt Wash Bụi 317 - X.Đậm Wash Túi Xéo 460.1 - Xám Wash Túi Xéo 460.2 - Râu Mèo Wash Dơ 469 - Đen Túi Xéo 460.3 - X.Nhạt Wash Túi Xéo 460.4 - Xanh Nhạt Trơn 420.1 - Xanh Đậm Trơn 420.2 - Đen Trơn 522.2 - Trắng Trơn 522.1\r\n\r\n✔ Kiểu dáng: Quần ống suông rộng, không xù lông, có thể giặt máy và không ra màu\r\n\r\n✔ Kích thước: 4 Size S,M,L,XL  tương ứng:\r\n\r\nSize S: eo (64), mông (dưới 90), cân nặng (38 - 44kg) Chiều Dài 100cm\r\n\r\nSize M: eo (68), mông (Dưới 93),, cân nặng (46 - 49kg) Chiều Dài 100cm\r\n\r\nSize L: eo (72), mông (dưới 96),  cân nặng (50 - 54kg) Chiều  Dài 100cm\r\n\r\nSize XL: eo (76), mông (dưới 99),  cân nặng (55 - 58kg) Chiều  Dài 100cm', 0, 0, NULL),
(136, 'Quần Tây Nam - Quần Âu Nam OFS Công Sở Đen Cá Tính Dáng Ôm Chuẩn Vải Co Giãn Không Nhăn Cao Cấp', 'quan_tay_nam.png', 140000, 95000, 43, 52, 'Quần Tây Nam - Quần Âu Nam\r\n\r\nMÔ TẢ SẢN PHẨM:\r\n\r\n\r\n\r\n- Chất liệu: Vải Co Giãn Không Nhăn\r\n\r\n- Form dáng: dáng ôm \r\n\r\n- Thiết kế: 1 Cúc cài , khóa kéo\r\n\r\n\r\n\r\nOFS CAM KẾT\r\n\r\nHình ảnh sản phẩm là ảnh thật do shop tự chụp và giữ bản quyền hình ảnh\r\n\r\nQuần được kiểm tra kỹ, cẩn thận và tư vấn nhiệt tình \r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\n\r\nHoàn tiền nếu sản phẩm không giống với mô tả\r\n\r\nChấp nhận đổi hàng khi size không vừa\r\n\r\nGiao hàng trên toàn quốc, nhận hàng trả tiền \r\n\r\n\r\n\r\nQUY ĐỊNH BẢO HÀNH, ĐỔI TRẢ\r\n\r\n\r\n\r\n1. Điều kiện áp dụng (trong vòng 60 ngày kể từ khi nhận sản phẩm) \r\n\r\n- Hàng hoá vẫn còn mới, chưa qua sử dụng \r\n\r\n- Hàng hoá bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất \r\n\r\n2. Trường hợp được chấp nhận: \r\n\r\n- Hàng không đúng size, kiểu dáng như quý khách đặt hàng \r\n\r\n- Không đủ số lượng, không đủ bộ như trong đơn hàng \r\n\r\n3. Trường hợp không đủ điều kiện áp dụng chính sách: \r\n\r\n- Quá 20 ngày kể từ khi Quý khách nhận hàng \r\n\r\n- Gửi lại hàng không đúng mẫu mã, không phải sản phẩm của OFS\r\n\r\n- Không thích, không hợp, đặt nhầm mã, nhầm màu,... \r\n\r\nDo màn hình và điều kiện ánh sáng khác nhau, màu sắc thực tế của sản phẩm có thể chênh lệch khoảng 2-3%\r\n\r\n\r\n\r\n💖 Chắc chắn việc mặc 1 chiếc Quần Tây Nam - Quần Âu Nam thời trang, năng động sẽ mang lại cho bạn sự tự tin trong ánh mắt những người xung quanh, Còn trần chờ gì mà không thêm sản phẩm vào giỏ hàng!', 0, 0, NULL),
(137, 'Quần đùi nam quần short thể thao mặc nhà đi chơi đều đẹp phong cách cá tính giá rẻ', 'quan_dui.png', 115000, 82000, 43, 431, 'FREE SHIP + VIDEO + ẢNH THẬT . ĐỔI TRẢ NẾU KHÔNG HẢI LÒNG.\r\n\r\n✅Kiểu dáng : QUẦN ĐÙI\r\n\r\n✅Chất liệu: QUẦN CHẤT GIÓ mềm mại THOẢI MÁI , PHONG CÁCH, MẠNH MẼ\r\n\r\n✅Màu sắc: MÀU ĐEN\r\n\r\n✅ Size: L XL 2XL\r\n\r\n✅ Style: Quần đùi from thoải mái đi tập thể thao,dạo phố, đi ngủ, mặc nhà, đi chơi nặng động , phong cách\r\n\r\nChi tiết :\r\n\r\nQUẦN ĐÙI / SHORT NAM  bên shop đều được tuyển chọn kĩ càng về chất liệu, mẫu mã, đường may chuẩn từng milimet nha. \r\n\r\nQUẦN ĐÙI / SHORT NAM là thời trang dễ mặc mặc đi tập, đi làm, đi chơi. đi dạo vô cùng sang trọng,trẻ trung, mà vẫn vô cùng thoải mái\r\n\r\n♥️ QUẦN ĐÙI / SHORT NAM hợp dáng người, hợp màu sắc làm tăng vẻ đẹp của cơ thể bạn và khẳng định ấn tượng của bạn trong mắt người đối diện\r\nHãy chọn cho mình 1 màu phù hợp nhé...\r\n\r\n ❤ Luôn là nơi cập nhật xu hướng mẫu QUẦN THỂ THAO\r\n\r\nSHOP đã khẳng định vị trí của mình với khách hàng bởi phong cách thời trang sang trọng, thanh lịch nhưng không thiếu sự năng động và cá tính.\r\n\r\n- CAM KẾT\r\n\r\nQUẦN ĐÙI / SHORT NAM cam kết giống mô tả.\r\n\r\n-Video,ảnh sản phẩm là video thật do shop trực tiếp quay .\r\n\r\n-Đảm bảo vải loại 1, chất lượng 100%\r\n\r\n-Sản phẩm được kiểm tra kĩ càng, cẩn thận và tư vấn nhiệt tình trước khi gói hàng giao cho Quý Khách\r\n\r\n-Hàng có sẵn, giao hàng ngay khi nhận được đơn\r\n\r\n-Hoàn tiền nếu sản phẩm không giống với mô tả.', 0, 0, NULL),
(138, 'Quần thể thao 2 sọc nam nữ cao cấp, Quần ống rộng dáng suông chất vải Xleo chống nhăn, không xù lông', 'quan_the_thao.png', 180000, 92000, 43, 532, 'Quần thể thao 2 sọc nam nữ cao cấp logo \"𝐄𝐒𝐒𝐄𝐍𝐓𝐈𝐀𝐋𝐒\", Quần ống rộng dáng suông chất vải Xleo chống nhăn, không xù lông\r\n\r\n\r\n\r\n📍 THÔNG TIN SẢN PHẨM\r\n\r\n• Chất liệu: XLEO cao cấp\r\n\r\n• Độ dày: Thông thường\r\n\r\n• Màu sắc: Đen, Xám\r\n\r\n• Size: M, L, XL, XXL (40 - 85kg)\r\n\r\n• Xuất xứ: Hàn Quốc, Sản xuất tại Việt Nam\r\n\r\n\r\n\r\n📍 ĐẶC ĐIỂM NỔI BẬT\r\n\r\n• Chất liệu vải xleo mềm mịn, co giãn thoải mái, độ dày vừa phải, thấm hút mồ hôi tốt, thoáng mát.\r\n\r\n• Quần thể thao nam màu trơn, kiểu dáng đơn giản.\r\n\r\n• Quần thể thao nam gọn gàng. Lưng thun co giãn thoải mái, có dây rút.\r\n\r\n• Đường may sắc sảo, tinh tế.\r\n\r\n• Quần thể dục dễ dàng phối đồ với các loại trang phục và phụ kiện khác.\r\n\r\n• Quần thun nam có thể mặc đi làm, đi chơi, đi học,... và nhiều sự kiện khác nữa.\r\n\r\n• Quan thể dục nam thiết kế đầy trẻ trung, năng động, tiện lợi, có thể mặc từ nhà ra phố với rất nhiều style khác nhau.\r\n\r\n• Phù hợp cho cả nam và nữ.\r\n\r\n\r\n\r\n📍 BẢNG SIZE\r\n\r\n- Size M: 40-55kg, dưới 1m65, chiều dài quần 97cm\r\n\r\n- Size L: 56-65kg, dưới 1m70, chiều dài quần 98cm\r\n\r\n- Size XL: 66-75kg, dưới 1m80, chiều dài quần 99cm\r\n\r\n- Size XXL: 76-86kg, dưới 1m85, chiều dài quần 100cm\r\n\r\n- Size 3XL: 87-95kg, dưới 1m85, chiều dài quần 100cm', 0, 0, NULL),
(139, 'Quần kẻ caro ống suông rộng -HÀNG MAY KỸ-CHẤT ĐẸP- Quần dài karo mặc nhà unisex hottrend', 'quan_ke_caro.png', 185000, 134000, 43, 33, ' ✔️Đây là một trong những chiếc quần  quần hot nhất hiện nay đáng để sở hữu. Phong cách Hàn Quốc đơn giản phù hợp trong mọi hoàn cảnh và đối tượng gặp gỡ. Quần có màu xanh bắt mắt, thể hiện sự trẻ trung và lịch lãm.\r\n\r\n✔️ Các mẫu Quần mang vẻ đẹp tính tế và hiện đại\r\n\r\n\r\n\r\n✔️HƯỚNG DẪN CHỌN SIZE\r\n\r\nsize S ( 40-48kg)\r\n\r\nSize M ( 45- 60kg) cao từ 1m55-1m70\r\n\r\nSize L (  60- 68kg) cao từ 1m65-1m75\r\n\r\nSize XL ( 67- 75kg) cao từ 1m70-1m78\r\n\r\nSize XXL ( 75- 90kg) cao từ 1m75-1m85 \r\n\r\n\r\n\r\n✔️ QUẦN  DÁNG ỐNG SUÔNG NAM NỮ CAO CẤP\r\n\r\n- Có phải bạn đang muốn tìm cho mình một chiếc quần baggy cao cấp mang style hàn quốc? \r\n\r\nMay mắn là bạn đã tìm thấy chúng tôi.\r\n\r\n- Chiếc quần  dành cho  nam này cửa hàng chúng tôi bán khoảng nghìn chiếc mỗi tháng.\r\n\r\nĐã bán chục nghìn chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!\r\n\r\n-  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này.\r\n\r\nBởi vì đây là một chiếc quần mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..', 0, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDH` (`idDH`),
  ADD KEY `idKH` (`idKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDM` (`idDM`) USING BTREE,
  ADD KEY `idBrand` (`idBrand`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idDH`) REFERENCES `chitietdonhang` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`idKH`) REFERENCES `khachhang` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idDM`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
