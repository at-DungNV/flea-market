<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->createProvinces();
    }
    
    public function createProvinces()
    {
      // $provinces = array(
      //   'An Giang',
      //   'Bà Rịa - Vũng Tàu',
      //   'Bắc Giang',
      //   'Bắc Kạn',
      //   'Bạc Liêu',
      //   'Bắc Ninh',
      //   'Bến Tre',
      //   'Bình Định',
      //   'Bình Dương',
      //   'Bình Phước',
      //   'Bình Thuận',
      //   'Cà Mau',
      //   'Cao Bằng',
      //   'Đắk Lắk',
      //   'Đắk Nông',
      //   'Điện Biên',
      //   'Đồng Nai',
      //   'Đồng Tháp',
      //   'Gia Lai',
      //   'Hà Giang',
      //   'Hà Nam',
      //   'Hà Tĩnh',
      //   'Hải Dương',
      //   'Hậu Giang',
      //   'Hòa Bình',
      //   'Hưng Yên',
      //   'Khánh Hòa',
      //   'Kiên Giang',
      //   'Kon Tum',
      //   'Lai Châu',
      //   'Lâm Đồng',
      //   'Lạng Sơn',
      //   'Lào Cai',
      //   'Long An',
      //   'Nam Định',
      //   'Nghệ An',
      //   'Ninh Bình',
      //   'Ninh Thuận',
      //   'Phú Thọ',
      //   'Quảng Bình',
      //   'Quảng Nam',
      //   'Quảng Ngãi',
      //   'Quảng Ninh',
      //   'Quảng Trị',
      //   'Sóc Trăng',
      //   'Sơn La',
      //   'Tây Ninh',
      //   'Thái Bình',
      //   'Thái Nguyên',
      //   'Thanh Hóa',
      //   'Thừa Thiên Huế',
      //   'Tiền Giang',
      //   'Trà Vinh',
      //   'Tuyên Quang',
      //   'Vĩnh Long',
      //   'Vĩnh Phúc',
      //   'Yên Bái',
      //   'Phú Yên',
      //   'Cần Thơ',
      //   'Đà Nẵng',
      //   'Hải Phòng',
      //   'Hà Nội',
      //   'TP HCM',
      // );
      $provinces = array(
        'Cần Thơ',
        'Đà Nẵng',
        'Hải Phòng',
        'Hà Nội',
        'TP HCM'
      );
      $districts = array(
        array(
          'Quận Bình Thuỷ',
          'Quận Cái Răng',
          'Quận Ninh Kiều',
          'Quận Ô Môn',
          'Quận Thốt Nốt',
          'Huyện Phong Điền',
          'Huyện Cờ Đỏ',
          'Huyện Thới Lai',
          'Huyện Vĩnh Thạnh'
        ),
        array(
          'Quận Cẩm Lệ',
          'Quận Hải Châu',
          'Quận Liên Chiểu',
          'Quận Ngũ Hành Sơn',
          'Quận Sơn Trà',
          'Quận Thanh Khê',
          'Huyện Hoà Vang'
        ),
        array(
          'Quận Dương Kinh',
          'Quận Đồ Sơn',
          'Quận Hải An',
          'Quận Hồng Bàng',
          'Quận Kiến An',
          'Quận Lê Chân',
          'Quận Ngô Quyền',
          'Huyện An Dương',
          'Huyện An Lão',
          'Huyện Cát Hải',
          'Huyện Kiến Thuỵ',
          'Huyện Thủy Nguyên',
          'Huyện Tiên Lãng',
          'Huyện Vĩnh Bảo',
          'Huyện Bạch Long Vĩ'
        ),
        array(
          'Quận Ba Đình',
          'Quận Bắc Từ Liêm',
          'Quận Cầu Giấy',
          'Quận Đống Đa',
          'Quận Hà Đông',
          'Quận Hai Bà Trưng',
          'Quận Hoàn Kiếm',
          'Quận Hoàng Mai',
          'Quận Long Biên',
          'Quận Nam Từ Liêm',
          'Quận Tây Hồ',
          'Quận Thanh Xuân',
          'Thành Phố Sơn Tây',
          'Huyện Ba Vì',
          'Huyện Chương Mỹ',
          'Huyện Đan Phượng',
          'Huyện Đông Anh',
          'Huyện Gia Lâm',
          'Huyện Hoài Đức',
          'Huyện Mê Linh',
          'Huyện Mỹ Đức',
          'Huyện Phú Xuyên',
          'Huyện Phúc Thọ',
          'Huyện Quốc Oai',
          'Huyện Sóc Sơn',
          'Huyện Thạch Thất',
          'Huyện Thanh Oai',
          'Huyện Thanh Trì',
          'Huyện Thường Tín',
          'Huyện Ứng Hòa'
        ),
        array(
          'Quận 1',
          'Quận 2',
          'Quận 3',
          'Quận 4',
          'Quận 5',
          'Quận 6',
          'Quận 7',
          'Quận 8',
          'Quận 9',
          'Quận 10',
          'Quận 11',
          'Quận 12',
          'Quận Thủ Đức',
          'Quận Tân Phú',
          'Quận Tân Bình',
          'Quận Phú Nhuận',
          'Quận Gò Vấp',
          'Quận Bình Thạnh',
          'Quận Bình Tân',
          'Huyện Bình Chánh',
          'Huyện Cần Giờ',
          'Huyện Củ Chi',
          'Huyện Hóc Môn',
          'Huyện Nhà Bè'
        )
      );

      $wards = array(
        array(
          array('Bình Thuỷ', 'An Thới', 'Bùi Hữu Nghĩa', 'Long Hoà', 'Long Tuyền', 'Thới An Đông', 'Trà An', 'Trà Nóc'),
          array('Lê Bình', 'Ba Láng', 'Hưng Phú', 'Hưng Thạnh', 'Phú Thứ', 'Tân Phú', 'Thường Thạnh'),
          array('Thới Bình', 'An Bình', 'An Khánh', 'An Cư', 'An Hoà', 'An Hội', 'An Lạc', 'An Nghiệp', 'An Phú', 'Cái Khế', 'Hưng Lợi', 'Tân An', 'Xuân Khánh'),
          array('Châu Văn Liêm', 'Long Hưng', 'Phước Thới', 'Thới An', 'Thới Hoà', 'Thới Long', 'Trường Lạc'),
          array('Thốt Nốt', 'Tân Hưng', 'Tân Lộc', 'Thạnh Hoà', 'Thới Thuận', 'Thuận An', 'Thuận Hưng', 'Trung Kiên', 'Trung Nhất'),
          array('Đông Hiệp', 'Đông Thắng', 'Thạnh Phú', 'Thới Đông', 'Thới Hưng', 'Thới Xuân', 'Trung An', 'Trung Hưng', 'Trung Thạnh'),
          array('Giai Xuân', 'Mỹ Khánh', 'Nhơn Ái', 'Nhơn Nghĩa', 'Tân Thới', 'Trường Long'),
          array('Định Môn', 'Đông Bình', 'Đông Thuận', 'Tân Thạnh', 'Thới Tân', 'Thới Thạnh', 'Trường Thành', 'Trường Thắng', 'Trường Xuân', 'Trường Xuân A', 'Trường Xuân B', 'Xuân Thắng'),
          array('Thạnh An', 'Thạnh Lộc', 'Thạnh Mỹ', 'Thạnh Quới', 'Thạnh Thắng', 'Thạnh Tiến', 'Vĩnh Bình', 'Vĩnh Trinh')
        ),
        array(
          array('Hoà An', 'Hoà Phát', 'Hoà Thọ Đông', 'Hoà Thọ Tây', 'Hoà Xuân', 'Khuê Trung'),
          array('Bình Hiên', 'Bình Thuận', 'Hải Châu I', 'Hải Châu II', 'Hoà Cường Bắc', 'Hoà Cường Nam', 'Hoà Thuận Đông', 'Hoà Thuận Tây', 'Nam Dương', 'Phước Ninh', 'Thạch Thang', 'Thanh Bình', 'Thuận Phước'),
          array('Hoà Hiệp Bắc', 'Hoà Hiệp Nam', 'Hoà Khánh Bắc', 'Hoà Khánh Nam', 'Hoà Minh'),
          array('Hoà Hải', 'Hoà Quý', 'Khuê Mỹ', 'Mỹ An'),
          array('An Hải Bắc', 'An Hải Đông', 'An Hải Tây', 'Mân Thái', 'Nại Hiên Đông', 'Phước Mỹ', 'Thọ Quang'),
          array('An Khê', 'Chính Gián' , 'Hoà Khê', 'Tam Thuận', 'Tân Chính', 'Thạc Gián', 'Thanh Khê Đông', 'Thanh Khê Tây', 'Vĩnh Trung', 'Xuân Hà'),
          array('Hoà Phong', 'Hoà Bắc', 'Hoà Châu', 'Hoà Khương', 'Hoà Liên', 'Hoà Nhơn', 'Hoà Ninh', 'Hoà Phú', 'Hoà Phước', 'Hoà Sơn', 'Hoà Tiến')
        ),
        array(
          array('Anh Dũng', 'Đa Phúc', 'Hải Thành', 'Hòa Nghĩa', 'Hưng Đạo', 'Tân Thành'),
          array('Bàng La', 'Hợp Đức', 'Minh Đức', 'Ngọc Hải', 'Ngọc Xuyên', 'Vạn Hương', 'Vạn Sơn'),
          array('Cát Bi', 'Đằng Hải', 'Đằng Lâm', 'Đông Hải 1', 'Đông Hải 2', 'Nam Hải', 'Thành Tô', 'Tràng Cát'),
          array('Hạ Lý', 'Hoàng Văn Thụ', 'Hùng Vương', 'Minh Khai', 'Phạm Hồng Thái', 'Phan Bội Châu', 'Quán Toan', 'Quang Trung', 'Sở Dầu', 'Thượng Lý', 'Trại Chuối'),
          array('Bắc Sơn', 'Đồng Hòa', 'Lãm Hà', 'Nam Sơn', 'Ngọc Sơn', 'Phù Liễn', 'Quán Trữ', 'Trần Thành Ngọ', 'Tràng Minh', 'Văn Đẩu'),
          array('An Biên', 'An Dương', 'Cát Dài', 'Đông Hải', 'Dư Hàng', 'Dư Hàng Kênh', 'Hàng Kênh', 'Hồ Nam', 'Kênh Dương', 'Lam Sơn', 'Nghĩa Xá', 'Niệm Nghĩa', 'Trại Cau', 'Trần Nguyên Hãn', 'Vĩnh Niệm'),
          array('Cầu Đất', 'Cầu Tre', 'Đằng Giang', 'Đông Khê', 'Đổng Quốc Bình', 'Gia Viên', 'Lạc Viên', 'Lạch Tray', 'Lê Lợi', 'Lương Khánh Thiện', 'Máy Chai', 'Máy Tơ', 'Vạn Mỹ'),
          array('An Dương', 'An Đồng', 'An Hòa', 'An Hồng', 'An Hưng', 'Bắc Sơn', 'Đại Bản', 'Đặng Cương', 'Đồng Thái', 'Hồng Phong', 'Hồng Thái', 'Lê Lợi', 'Lê Thiện', 'Nam Sơn', 'Quốc Tuấn', 'Tân Tiến'),
          array('An Lão', 'Trường Sơn', 'An Thái', 'An Thắng', 'An Thọ', 'An Tiến', 'Bát Trang', 'Chiến Thắng', 'Mỹ Đức', 'Quang Hưng', 'Quang Trung', 'Quốc Tuấn', 'Tân Dân', 'Tân Viên', 'Thái Sơn', 'Trường Thành', 'Trường Thọ'),
          array('Cát Bà', 'Cát Hải', 'Đồng Bài', 'Gia Luận', 'Hiền Hào', 'Hoàng Châu', 'Nghĩa Lộ', 'Phù Long', 'Trân Châu', 'Văn Phong', 'Việt Hải', 'Xuân Đám'),
          array('Núi Đối', 'Du Lễ', 'Đại Đồng', 'Đại Hà', 'Đại Hợp', 'Đoàn Xá', 'Đông Phương', 'Hữu Bằng', 'Kiến Quốc', 'Minh Tân', 'Ngũ Đoan', 'Ngũ Phúc', 'Tân Phong', 'Tân Trào', 'Thanh Sơn', 'Thuận Thiên', 'Thụy Hương', 'Tú Sơn'),
          array('Núi Đèo', 'Minh Đức', 'An Lư', 'An Sơn', 'Cao Nhân', 'Chính Mỹ', 'Đông Sơn', 'Dương Quan', 'Gia Đức', 'Gia Minh', 'Hòa Bình', 'Hoa Động', 'Hoàng Động', 'Hợp Thành', 'Kênh Giang', 'Kiền Bái', 'Kỳ Sơn', 'Lại Xuân', 'Lâm Động', 'Lập Lễ', 'Liên Khê', 'Lưu Kiếm', 'Lưu Kỳ', 'Minh Tân', 'Mỹ Đồng', 'Ngũ Lão', 'Phả Lễ', 'Phù Ninh', 'Phục Lễ', 'Quảng Thanh', 'Tam Hưng', 'Tân Dương', 'Thiên Hương', 'Thủy Đường', 'Thủy Sơn', 'Thủy Triều', 'Trung Hà'),
          array('Tiên Lãng', 'Bắc Hưng', 'Bạch Đằng', 'Cấp Tiến', 'Đại Thắng', 'Đoàn Lập', 'Đông Hưng', 'Hùng Thắng', 'Khởi Nghĩa', 'Kiến Thiết', 'Nam Hưng', 'Quang Phục', 'Quyết Tiến', 'Tây Hưng', 'Tiên Cường', 'Tiên Hưng', 'Tiên Minh', 'Tiên Thắng', 'Tiên Thanh', 'Tiên Tiến', 'Toàn Thắng', 'Tự Cường', 'Vinh Quang'),
          array('Vĩnh Bảo', 'An Hòa', 'Cao Minh', 'Cổ Am', 'Cộng Hiền', 'Đồng Minh', 'Dũng Tiến', 'Giang Biên', 'Hiệp Hòa', 'Hòa Bình', 'Hùng Tiến', 'Hưng Nhân', 'Liên Am', 'Lý Học', 'Nhân Hòa', 'Tam Cường', 'Tam Đa', 'Tân Hưng', 'Tân Liên', 'Thắng Thủy', 'Thanh Lương', 'Tiền Phong', 'Trấn Dương', 'Trung Lập', 'Việt Tiến', 'Vinh Quang', 'Vĩnh An', 'Vĩnh Long', 'Vĩnh Phong', 'Vĩnh Tiến'),
          array('Anh Dũng', 'Đa Phúc', 'Hải Thành', 'Hòa Nghĩa', 'Hưng Đạo', 'Tân Thành')
        ),
        array(
          array('Cống Vị', 'Điện Biên', 'Đội Cấn', 'Giảng Võ', 'Kim Mã', 'Liễu Giai', 'Ngọc Hà', 'Ngọc Khánh', 'Nguyễn Trung Trực', 'Phúc Xá', 'Quán Thánh', 'Thành Công', 'Trúc Bạch', 'Vĩnh Phúc'),
          array('Cổ Nhuế 1', 'Cổ Nhuế 2', 'Đông Ngạc', 'Đức Thắng', 'Liên Mạc', 'Minh Khai', 'Phú Diễn', 'Phúc Diễn', 'Tây Tựu', 'Thượng Cát', 'Thụy Phương', 'Xuân Đỉnh', 'Xuân Tảo'),
          array('Nghĩa Đô', 'Quan Hoa', 'Dịch Vọng', 'Dịch Vọng Hậu', 'Trung Hòa', 'Nghĩa Tân', 'Mai Dịch', 'Yên Hòa'),
          array('Văn Miếu', 'Quốc Tử Giám', 'Hàng Bột', 'Nam Đồng', 'Trung Liệt', 'Khâm Thiên', 'Phương Liên', 'Phương Mai', 'Khương Thượng', 'Ngã Tư Sở', 'Láng Thượng', 'Cát Linh', 'Văn Chương', 'Ô Chợ Dừa', 'Quang Trung', 'Thổ Quan', 'Trung Phụng', 'Kim Liên', 'Trung Tự', 'Thịnh Quang', 'Láng Hạ'),
          array('Quang Trung', 'Nguyễn Trãi', 'Hà Cầu', 'Vạn Phúc', 'Phúc La', 'Yết Kiêu', 'Mộ Lao', 'Văn Quán', 'La Khê', 'Phú La', 'Kiến Hưng', 'Yên Nghĩa', 'Phú Lương', 'Phú Lãm', 'Dương Nội', 'Biên Giang', 'Đồng Mai'),
          array('Nguyễn Du', 'Bùi Thị Xuân', 'Ngô Thì Nhậm', 'Đồng Nhân', 'Bạch Đằng', 'Thanh Nhàn', 'Bách Khoa', 'Vĩnh Tuy', 'Trương Định', 'Lê Đại Hành', 'Phố Huế', 'Phạm Đình Hổ', 'Đống Mác', 'Thanh Lương', 'Cầu Dền', 'Bạch Mai', 'Quỳnh Mai', 'Minh Khai', 'Đồng Tâm', 'Quỳnh Lôi'),
          array('Chương Dương Độ', 'Cửa Đông', 'Cửa Nam', 'Đồng Xuân', 'Hàng Bạc', 'Hàng Bài', 'Hàng Bồ', 'Hàng Bông', 'Hàng Buồm', 'Hàng Đào', 'Hàng Gai', 'Hàng Mã', 'Hàng Trống', 'Lý Thái Tổ', 'Phan Chu Trinh', 'Phúc Tân', 'Trần Hưng Đạo', 'Tràng Tiền'),
          array('Định Công', 'Đại Kim', 'Giáp Bát', 'Hoàng Liệt', 'Hoàng Văn Thụ', 'Lĩnh Nam', 'Mai Động', 'Tân Mai', 'Thanh Trì', 'Thịnh Liệt', 'Trần Phú', 'Tương Mai', 'Vĩnh Hưng', 'Yên Sở'),
          array('Bồ Đề', 'Gia Thụy', 'Cự Khối', 'Đức Giang', 'Giang Biên', 'Long Biên', 'Ngọc Lâm', 'Ngọc Thụy', 'Phúc Đồng', 'Phúc Lợi', 'Sài Đồng', 'Thạch Bàn', 'Thượng Thanh', 'Việt Hưng'),
          array('Cầu Diễn', 'Đại Mỗ', 'Mễ Trì', 'Mỹ Đình 1', 'Mỹ Đình 2', 'Phú Đô', 'Phương Canh', 'Tây Mỗ', 'Trung Văn', 'Xuân Phương'),
          array('Bưởi', 'Thụy Khuê', 'Yên Phụ', 'Tứ Liên', 'Nhật Tân', 'Quảng An', 'Xuân La và Phú Thượng'),
          array('Hạ Đình', 'Kim Giang', 'Khương Đình', 'Khương Mai', 'Khương Trung', 'Nhân Chính', 'Phương Liệt', 'Thanh Xuân Bắc', 'Thanh Xuân Nam', 'Thanh Xuân Trung', 'Thượng Đình'),
          array('Lê Lợi', 'Quang Trung', 'Phú Thịnh', 'Ngô Quyền', 'Sơn Lộc', 'Xuân Khanh', 'Trung Hưng', 'Viên Sơn', 'Trung Sơn Trầm'),
          array('Đường Lâm', 'Thanh Mỹ', 'Xuân Sơn', 'Kim Sơn', 'Sơn Đông', 'Cổ Đông'),
          array('Tây Đằng', 'Ba Trại', 'Ba Vì', 'Cẩm Lĩnh', 'Cam Thượng', 'Châu Sơn', 'Chu Minh', 'Cổ Đô', 'Đông Quang', 'Đồng Thái', 'Khánh Thượng', 'Minh Châu', 'Minh Quang', 'Phong Vân', 'Phú Châu', 'Phú Cường', 'Phú Đông', 'Phú Phương', 'Phú Sơn', 'Sơn Đà', 'Tản Hồng', 'Tản Lĩnh', 'Thái Hòa', 'Thuần Mỹ', 'Thụy An', 'Tiên Phong', 'Tòng Bạt', 'Vân Hòa', 'Vạn Thắng', 'Vật Lại', 'Yên Bài'),
          array('Đại Yên', 'Đông Phương Yên', 'Đông Sơn', 'Đồng Lạc', 'Đồng Phú', 'Hòa Chính', 'Hoàng Diệu', 'Hoàng Văn Thụ', 'Hồng Phong', 'Hợp Đồng', 'Hữu Văn', 'Lam Điền', 'Mỹ Lương', 'Nam Phương Tiến', 'Ngọc Hòa', 'Ngọc Sơn', 'Phú Nam An', 'Phú Nghĩa', 'Phụng Châu', 'Quảng Bị', 'Tân Tiến', 'Thanh Bình', 'Thụy Hương', 'Thủy Xuân Tiên', 'Thượng Vực', 'Tiên Phương', 'Tốt Động', 'Trần Phú', 'Trung Hòa', 'Trường Yên', 'Văn Võ'),
          array('Bắc Hồng', 'Cổ Loa', 'Dục Tú', 'Đại Mạch', 'Đông Hội', 'Hải Bối', 'Kim Chung', 'Kim Nỗ', 'Liên Hà', 'Mai Lâm', 'Nam Hồng', 'Nguyên Khê', 'Tầm Xá', 'Thụy Lâm', 'Tiên Dương', 'Uy Nỗ', 'Vân Hà', 'Vân Nội', 'Việt Hùng', 'Võng La', 'Xuân Canh', 'Xuân Nộn', 'Vĩnh Ngọc'),
          array(),
          array('Bát Tràng', 'Cổ Bi', 'Đa Tốn', 'Đặng Xá', 'Đình Xuyên', 'Đông Dư', 'Dương Hà', 'Dương Quang', 'Dương Xá', 'Kiêu Kỵ', 'Kim Lan', 'Kim Sơn', 'Lệ Chi', 'Ninh Hiệp', 'Phù Đổng', 'Phú Thị', 'Trung Mầu', 'Văn Đức', 'Yên Thường', 'Yên Viên'),
          array(),
          array(),
          array('An Mỹ', 'An Phú', 'An Tiến', 'Bột Xuyên', 'Đại Hưng', 'Đốc Tín', 'Đồng Tâm', 'Hồng Sơn', 'Hợp Thanh', 'Hợp Tiến', 'Hùng Tiến', 'Hương Sơn', 'Lê Thanh', 'Mỹ Thành', 'Phù Lưu Tế', 'Phúc Lâm', 'Phùng Xá', 'Thượng Lâm', 'Tuy Lai', 'Vạn Kim', 'Xuy Xá'),
          array('Hồng Minh', 'Tri Trung', 'Hoàng Long', 'Phú Túc', 'Văn Hoàng', 'Quang Trung', 'Đại Thắng', 'Phượng Dực', 'Chuyên Mỹ', 'Tân Dân', 'Sơn Hà', 'Nam Phong', 'Nam Triều', 'Thụy Phú', 'Văn Nhân', 'Khai Thái', 'Bạch Hạ', 'Minh Tân', 'Quang Lãng', 'Châu Can', 'Phú Yên', 'Phúc Tiến', 'Hồng Thái', 'Vân Từ', 'Đại Xuyên', 'Tri Thủy'),
          array('Phú Mãn', 'Phú Cát', 'Hoà Thạch', 'Tuyết Nghĩa', 'Đông Yên', 'Liệp Tuyết', 'Ngọc Liệp', 'Ngọc Mỹ', 'Cấn Hữu', 'Nghĩa Hương', 'Thạch Thán', 'Đồng Quang', 'Sài Sơn', 'Yên Sơn', 'Phượng Cách', 'Tân Phú', 'Đại Thành', 'Tân Hoà', 'Cộng Hoà', 'Đông Xuân'),
          array(),
          array(),
          array('Cao Viên', 'Bích Hòa', 'Cự Khê', 'Mỹ Hưng', 'Tam Hưng', 'Bình Minh', 'Thanh Mai', 'Thanh Cao', 'Thanh Thùy', 'Thanh Văn', 'Đỗ Động', 'Kim Thư', 'Kim An', 'Phương Trung', 'Dân Hòa', 'Tân Ước', 'Liên Châu', 'Hồng Dương', 'Cao Dương', 'Xuân Dương'),
          array('Thanh Liệt', 'Đông Mỹ', 'Yên Mỹ', 'Duyên Hà', 'Tam Hiệp', 'Tứ Hiệp', 'Ngũ Hiệp', 'Ngọc Hồi', 'Vĩnh Quỳnh', 'Tả Thanh Oai', 'Đại Áng', 'Vạn Phúc', 'Liên Ninh', 'Hữu Hòa', 'Tân Triều'),
          
          array('Liên Phương', 'Minh Cường', 'Nghiêm Xuyên', 'Nguyễn Trãi', 'Nhị Khê', 'Ninh Sở', 'Quất Động', 'Tân Minh', 'Thắng Lợi', 'Thống Nhất', 'Thư Phú', 'Tiền Phong', 'Tô Hiệu', 'Tự Nhiên.Vạn Điểm', 'Văn Bình', 'Văn Phú', 'Văn Tự', 'Vân Tảo', 'Chương Dương', 'Dũng Tiến', 'Duyên Thái', 'Hà Hồi', 'Hiền Giang', 'Hòa Bình', 'Khánh Hà', 'Hồng Vân', 'Lê Lợi'),
          array()
        ),
        array(
          array('Bến Nghé', 'Bến Thành', 'Cô Giang', 'Cầu Kho', 'Cầu Ông Lãnh', 'Đa Kao', 'Nguyễn Cư Trinh', 'Nguyễn Thái Bình', 'Phạm Ngũ Lão', 'Tân Định'),
          array('An Khánh', 'An Lợi Đông', 'An Phú', 'Bình An', 'Bình Khánh', 'Bình Trưng Đông', 'Bình Trưng Tây', 'Cát Lái', 'Thạnh Mỹ Lợi', 'Thảo Điền', 'Thủ Thiêm'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'),
          array('1', '2', '3', '4', '5', '6', '8', '9', '10', '12', '13', '14', '15', '16', '18'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'),
          array('Bình Thuận', 'Phú Mỹ', 'Phú Thuận', 'Tân Hưng', 'Tân Kiểng', 'Tân Phong', 'Tân Phú', 'Tân Quy', 'Tân Thuận Đông', 'Tân Thuận Tây'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16'),
          array('Hiệp Phú', 'Long Bình', 'Long Phước', 'Long Thạnh Mỹ', 'Long Trường', 'Phú Hữu', 'Phước Bình', 'Phước Long A', 'Phước Long B', 'Tân Phú', 'Tăng Nhơn Phú A', 'Tăng Nhơn Phú B', 'Trường Thạnh'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16'),
          array('An Phú Đông', 'Đông Hưng Thuận', 'Hiệp Thành', 'Tân Chánh Hiệp', 'Tân Hưng Thuận', 'Tân Thới Hiệp', 'Tân Thới Nhất', 'Thạnh Lộc', 'Thạnh Xuân', 'Thới An', 'Trung Mỹ Tây'),
          array('Bình Chiểu', 'Bình Thọ', 'Hiệp Bình Chánh', 'Hiệp Bình Phước', 'Linh Chiểu', 'Linh Ðông', 'Linh Tây', 'Linh Trung', 'Linh Xuân', 'Tam Bình', 'Tam Phú', 'Trường Thọ'),
          array('Hiệp Tân', 'Hòa Thạnh', 'Phú Thạnh', 'Phú Thọ Hòa', 'Phú Trung', 'Sơn Kỳ', 'Tân Quý', 'Tân Sơn Nhì', 'Tân Thành', 'Tân Thới Hòa', 'Tây Thạnh'),
          array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'),
          array('1', '2', '3', '4', '5', '7', '8', '9', '10', '11', '12', '13', '14', '15', '17'),
          array('1', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17'),
          array('1', '2', '3', '5', '6', '7', '11', '12', '13', '14', '15', '17', '19', '21', '22', '24', '25', '26', '27', '28'),
          array('An Lạc', 'An Lạc A', 'Bình Hưng Hòa', 'Bình Hưng Hòa A', 'Bình Hưng Hòa B', 'Bình Trị Đông', 'Bình Trị Đông A', 'Bình Trị Đông B', 'Tân Tạo', 'Tân Tạo A'),
          array('An Phú Tây', 'Bình Chánh', 'Bình Hưng', 'Bình Lợi', 'Đa Phước', 'Hưng Long', 'Lê Minh Xuân', 'Phạm Văn Hai', 'Phong Phú', 'Quy Đức', 'Tân Kiên', 'Tân Nhựt', 'Tân Quý Tây', 'Vĩnh Lộc A', 'Vĩnh Lộc B'),
          array('An Thới Đông', 'Bình Khánh', 'Long Hòa', 'Lý Nhơn', 'Tam Thôn Hiệp', 'Thạnh An'),
          array('An Nhơn Tây', 'An Phú', 'Bình Mỹ', 'Hòa Phú', 'Nhuận Đức', 'Phạm Văn Cội', 'Phú Hòa Đông', 'Phú Mỹ Hưng', 'Phước Hiệp', 'Phước Thạnh', 'Phước Vĩnh An', 'Tân An Hội', 'Tân Phú Trung', 'Tân Thạnh Đông', 'Tân Thạnh Tây', 'Tân Thông Hội', 'Thái Mỹ', 'Trung An', 'Trung Lập Hạ', 'Trung Lập Thượng'),
          array('Bà Điểm', 'Đông Thạnh', 'Nhị Bình', 'Tân Hiệp', 'Tân Thới Nhì', 'Tân Xuân', 'Thới Tam Thôn', 'Trung Chánh', 'Xuân Thới Đông', 'Xuân Thới Sơn', 'Xuân Thới Thượng'),
          array('Hiệp Phước', 'Long Thới', 'Nhơn Đức', 'Phú Xuân', 'Phước Kiển', 'Phước Lộc')
        )
      );

      $faker = Faker::create();
      $types = array('city', 'province');
      for ($i=0; $i < count($provinces); $i++) {
        $province = Province::create([
          'name' => $provinces[$i],
          'type' => $types[rand(0, 1)],
          'slug' => str_slug($provinces[$i]),
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
        
        
        $types = array('quận', 'huyện', 'thị xã');
        for ($j=0; $j < count($districts[$i]); $j++) {
          $district = District::create([
            'province_id' => $province->id,
            'name' => $districts[$i][$j],
            'type' => $types[rand(0, 2)],
            'slug' => str_slug($districts[$i][$j]),
            'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
          
          for ($k=0; $k < count($wards[$i][$j]); $k++) {
            $types = array('xã', 'phường', 'thị trấn');
            Ward::create([
              'district_id' => $district->id,
              'name' => $wards[$i][$j][$k],
              'type' => $types[rand(0, 2)],
              'slug' => str_slug($wards[$i][$j][$k]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
          }
        }
        
      }
    }
}
