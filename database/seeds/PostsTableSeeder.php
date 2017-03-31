<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Post;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $states = array('active', 'waiting', 'hidden', 'rejected');
      $types = array('buy', 'sell');
      $users = User::all()->pluck('id');
      $provinces = Province::all()->pluck('id');
      $districts = District::all()->pluck('id');
      $wards = Ward::all()->pluck('id');
      for ($i=0; $i < 300; $i++) {
        $title = $faker->text;
        Post::create([
          'user_id' => $faker->randomElement($users->toArray()),
          'province_id' => $faker->randomElement($provinces->toArray()),
          'district_id' => $faker->randomElement($districts->toArray()),
          'ward_id' => $faker->randomElement($wards->toArray()),
          'title' => $title,
          'price' => rand(1, 50) * 10,
          'state' => $states[rand(0, 3)],
          'type' => $types[rand(0, 1)],
          'phone' => $faker->phoneNumber,
          'address' => $faker->address,
          'slug' => str_slug($title),
          'description' => $faker->text,
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
      $this->createDummyPosts();
    }
    
    public function createDummyPosts()
    {
      $faker = Faker::create();
      $states = array('active', 'waiting', 'hidden', 'rejected');
      $types = array('buy', 'sell');
      $users = User::all()->pluck('id');
      $provinces = Province::all()->pluck('id');
      $districts = District::all()->pluck('id');
      $wards = Ward::all()->pluck('id');
      $titles = array(
        'ip6 gold 16gb độ vỏ 7 còn mới',
        'Samsung A3 2017 hàng fpt mới 100%',
        'Iphone 5 đen 16gb qte mỹ nguyên rin',
        'Máy Dell @F-764/seri:73/ram 4g/i5(2.7)/hdd 320g',
        'Iphone 6s lock 3 màu 16G tại 213 Ng Tri Phương',
        'sạc nhanh vocc oppo 5v 4A',
      ); 
      $prices = array(
        '4400000',
        '5390000',
        '1900000',
        '3800000',
        '5750000',
        '150000',
      );
      $descriptions = array(
        'Ip6 gold 16g qte vỏ độ ip7 máy đẹp còn mới dùng tốt. ngoài bị mất vân tay ra thì mọi thứ vẫn tốt ai 
        có nhu cầu mua liên hệ giao dịch trực tiếp giá 4tr4.có thương lượng fix cho ai thật sự thích.',
        'Hàng chính hãng hoá đơn đầy đủ
          Bảo hành toàn quốc 12 tháng 
          Lỗi 1 đổi 1 trong 30 ngày
          Màu gold
          32g',
        'Cần bán iphone 5 đen 16gb qte my nguyên rin chưa sửa chữa. Máy được cho xài hơn 2 năm mà vẫn còn tốt, 
        ios 9 mượt mà, pin chuẩn xài 1 ngày. Phụ kiện sạc cáp, vỏ trầy trong lúc sử dụng, tặng ốp su xanh và ốp su trong mới mua.',
        'Laptop Dell\6410%\ Core i5\Ram4G\ 14inHD\ USA
          3.800.000 đ* LAPTOP CŨ SIÊU BỀN - NHẬP KHẨU NGUYÊN BẢN TỪ MỸ HOẶC NHẬT.
          * MÁY ĐƯỢC KỸ THUẬT KIỂM TRA RẤT KỸ TRƯỚC KHI BÁN.
          ==========
          Laptop: Dell E6410
          * Bộ xử lý: Core i5 ( 4CPU x 2.5Ghz)
          * Ram: 4GB - DDR3 
          * Ổ cứng: 250GB Sata - Số vòng quay của HDD 7200rpm
          * Màn hình rộng: 14 in HD+ , chống chói, sáng đẹp
          * Card màn hình :Vga 2G
          * Webcam: 3.1 HD quay phim, chụp hình rõ
          * DVD đọc và ghi đĩa
          * Pin rin 6 cell chuẩn 
          * Bàn phím có đèn led, có khe sim 3G
          * Bảo mật bằng vân tay
          * Kết nối: E-SATA, VGA, USB 2.0, Card-Reader
          * Tên máy: Dell Latitude E6410',
        'PHONE HOT chi nhánh Đà Nẵng
          Đc: 213 Nguyễn Tri Phương, Thanh Khê, Đà Nẵng
          -Trung thực-Uy tín-Chất Lượng
          ------------------------------------------

          -Hiện tại cửa hàng đang kinh doanh

          -Sản Phẩm: iPhone 6S Lock 3 màu 16GB máy xách tay nguyên bản

          - Cửa hàng mình cam kết chỉ bán hàng ZIN,nhập nguyên bản nói không với hàng dựng kém chất lượng.
          -Máy bán ra được qua khâu chọn lọc kĩ càng nên độ ổn định cũng như chất luợng rất cao đảm bảo về mặt kĩ thuật.
          -Đội ngủ nhân viên nhiệt tình có kiến thức về các dòng smartphone đảm bảo làm hài lòng tất cả các khách hàng tới với cửa hàng
          - Về chính sách bảo hành bên mình chuyên nghiệp nhanh chóng đem lại niềm tin tránh đi lại nhiều lần cho mọi khách hàng
          - Chúng tôi luôn tạo điều kiện cho các bạn hết mức khi tới với cửa hàng ạ
          ------------------------------------------
          -Giá bán : 5.750.000đ (giá bán theo hình thức đảm bảo luôn luôn hợp lý cho mọi người tiêu dùng)
          -bao test 7 ngày lỗi 1 đổi 1
          +200k nếu khách hàng muốn mua thêm gói bh mở rộng là 3 tháng
          -máy được fix hết lỗi như *101# iMessage FaceTime
          -jaibreak miễn miễn phí nếu khách hàng yêu cầu
          -tặng đầy đủ pk như sạc. cáp. sim ghép. tai nghe. cường lực và ốp lưng

          QÚY KHÁCH LƯU Ý:
          -Nhằm nâng cao chất lượng sản phẩm cũng như hậu mãi cho khách hàng,mọi ý kiến đóng góp xin liên hệ số hotline cửa hàng.Chúng tôi xin ghi nhận và cảm ơn quý khách ủng hộ PHONE HOT suốt 3 năm qua.

          ĐỂ XEM NHỮNG SẢN PHẨM KHÁC QUÝ KHÁCH VUI LÒNG GÕ PHONE HOT vào ô TÌM KIẾM CỦA CHỢ TỐT',
        'có sạc ipad 3.36A dòng cao rồi nên bán cho ai cần sạc nhanh',
      );
      
      $images = array();
      for ($i=0; $i < count($titles); $i++) {
        Post::create([
          'user_id' => $faker->randomElement($users->toArray()),
          'province_id' => $faker->randomElement($provinces->toArray()),
          'district_id' => $faker->randomElement($districts->toArray()),
          'ward_id' => $faker->randomElement($wards->toArray()),
          'title' => $titles[$i],
          'price' => $prices[$i],
          'state' => $states[0],
          'type' => $types[rand(0, 1)],
          'phone' => $faker->phoneNumber,
          'address' => $faker->address,
          'slug' => str_slug($titles[$i]),
          'description' => $descriptions[$i],
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
}
