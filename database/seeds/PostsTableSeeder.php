<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Post;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Image;
use App\Models\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $faker = Faker::create();
      // $states = array('active', 'waiting', 'hidden', 'rejected');
      // $types = array('buy', 'sell');
      // $users = User::all()->pluck('id');
      // $provinces = Province::all()->pluck('id');
      // $districts = District::all()->pluck('id');
      // $wards = Ward::all()->pluck('id');
      // for ($i=0; $i < 300; $i++) {
      //   $title = $faker->text;
      //   Post::create([
      //     'user_id' => $faker->randomElement($users->toArray()),
      //     'province_id' => $faker->randomElement($provinces->toArray()),
      //     'district_id' => $faker->randomElement($districts->toArray()),
      //     'ward_id' => $faker->randomElement($wards->toArray()),
      //     'title' => $title,
      //     'price' => rand(1, 50) * 10,
      //     'state' => $states[rand(0, 3)],
      //     'type' => $types[rand(0, 1)],
      //     'phone' => $faker->phoneNumber,
      //     'address' => $faker->address,
      //     'slug' => str_slug($title),
      //     'description' => $faker->text,
      //     'created_at' => $faker->dateTimeThisYear($max = 'now')
      //   ]);
      // }
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
      $categories = Category::all()->pluck('id');
      $titles = array(
        'ip6 gold 16gb độ vỏ 7 còn mới',
        'laptop sony vaio fit 15 core i5-4200u card rời 2g',
        'Land Rover S209 Pin Cả Tuần Tặng Ổ Điện Đa Năng',
        'Iphone 7 plus 128 gb mã a1784 bảo hành 1 đổi 1',
        'Iphone 5s gold 16gb',
        'Dell e6410, hàng Mỹ, rin 100%',
        'Iphone 6s plus 64gb gold chính hãng vn/a likenew',
        'Loa Nanomax bass 20',
        'AB 2 đèn fi phun xăng -2010',
        'Sh 125 màu đỏ tươi xe /15',
        'Exciter 150 fi biển 43',
        'xe hàn quốc biển 43',
        'Xe sirius SYM đk12 43',
        'loa vi tính 2.0 hợp cho loại pc (100hz-20khz)',
        'Bộ âm thanh Kara YamahaE164N mới chưa sử dụng'
      ); 
      $prices = array(
        '4400000',
        '7900000',
        '399000',
        '19500000',
        '2500000',
        '3850000',
        '11500000',
        '550000',
        '27500000',
        '66000000',
        '39000000',
        '3900000',
        '6500000',
        '75000',
        '3100000'
      );
      $descriptions = array(
        'Ip6 gold 16g qte vỏ độ ip7 máy đẹp còn mới dùng tốt. ngoài bị mất vân tay ra thì mọi thứ vẫn tốt ai 
        có nhu cầu mua liên hệ giao dịch trực tiếp giá 4tr4.có thương lượng fix cho ai thật sự thích.',
        'SONY VAIO SVF15328SGW CORE I5-4200U/4G/500G VGA GT740M
          Bộ xử lý: core i5-4200U 1.6ghz
          •	RAM: 4gb ddr
          •	HDD: 500gb
          Màn hình : 15.6 inch 
          	Đồ họa: hd graphics hd 4400 /nvidia geforce gt740m
          •	Bảo hành 03-12 tháng. Giá 7.9tr',
        'Land Rover S209 Pin 3800 mah :
          Hàng Mới 100%- Fullbox- Hộp

          2 Sim 2 Sóng ,Loa to ,Sóng Khỏe ,Pin 05-10 ngày 
          Màn 1.8 in Rõ Nét .Đèn Pin Mạnh
          Bảo Hành 03 tháng ,Bao test 03 ngày Đầu Lỗi Kĩ thuật Đổi Mới
          Giao Hàng Miễn Phí Tận Nơi .Thanh Toán Khi Nhận Hàng

          Giá Chỉ : 399.000 VND
          Tặng Kèm Ổ Điện Đa Năng Trị Giá 120K Trên thị trường Hiện Nay Truy cập mạng Để xem ổ điện đa năng usb hình lục giá',
        'Bác mình xách tay từ mỹ về 01 cây 7 plus 128gb 
          Màu đen nhám mã LL/a quốc tế máy có mã bảo hành tại Việt nam A1784 nên được bảo hành tại Việt. Nam như hàng chính hãng nhé
          Máy nguyên zin. Do xách tay về nên chỉ có máy sạc cáp',
        'Cần bán con Iphone 5s 16GB màu gold như hình. Máy mình dùng ko 1 xước, máy dán đầy đủ 2 mặt, chưa qua sữa chữa gì cả. 
          Pin trâu, bắt wifi khoẻ, camera chụp hình sóng sánh luôn. 
          Mình dùng chủ yếu nge gọi , ko game gì cả. Muốn đổi máy nên bán, bạn nào có nhu cầu lhe mình test máy tại nhà nhé.',
        '* Hàng nhập khẩu nguyên chiếc từ Mỹ và Nhật, độ bền tuyệt đối ,máy được làm từ hợp kim nhôm nguyên khối,mới đến 99%.
          Cấu hình:
          • Chíp : core i5 2.80ghz
          • RAM : 4GB - DDR3
          • Ổ HDD : 320gb -7200 rpm
          • Màn hình : 14 inch HD chống chói
          • Đồ họa : VGA 2G
          •-Máy có hỗ trợ khe sim 3G, đèn bàn phím led và bảo mật vân tay.
          KHUYẾN MÃI : Tặng sạc rin + túi xách + chuột quang xịn 
          - Chương trình dùng thử laptop 30 ngày không thích cho đổi máy khác, để quý khách yên tâm sử dụng.
          Kinh doanh tại nhà : 306/8 Nguyễn Hoàng, Đà Nẵng

          Chú ý: Nhập 175, khu vực Đà Nẵng, danh mục Máy tính, laptop để xem các sản phẩm nhập khẩu giá rẻ khác.',
        'Lên iphone 7 plus nên bán lại 6s plus 64gb gold chính hãng vn/a likenew còn bảo hành apple đến cuối 8/2017. Máy , sạc, cáp . 
          Giao dịch tại nhà nên yên tâm. Đến xem máy đảm bảo thích',
        'Loa nguyên rin, nguyên thùng chưa qua sửa chữa, mới 95%. Nghe nhạc, karaoke thỏa mái 150w/1 cái. Ai cần lh tới thử tận nhà.',
        'đổi Sh nên bán lại AB 2 đèn fi phung xăng điện tử đúng đời 2010 vành 6 cây xe 1 chủ 1 bốn số vẫn còn nguyên xe đi giữ gìn 
          thay nhớt nên máy mốc chạy xướng lắm ai mua lh nhé',
        'Xe của người lớn tuổi đi nên xe còn mới keng 2 gương 2 chìa khoá đầy đủ xe để ở nhà miết chạy đúng 3 ngàn ốc vít còn mới 
          keng tiền nào của nấy nghe mấy bạn nay để lại 66 triệu ai có nhu cầu mua lh tới địa chỉ nhà xem xe nhé',
        'EX 150cc fi biển 43 còn mới keng nguyên rin. Xe nổ em đẹp như xe mới chưa làm lại bất cứ thứ gì hết sang tên trong ngày là xong',
        'Cần bán dream hàn quốc xe máy móc ok .vì trứoc kia ngừoi già đi .máy móc chưa đụng chạm còn rin .xe rất mới .biển 43. Giấy tờ 
          đầy đủ.có fix cho ngừoi thiện chí.',
        'Xe như trong hình cần bán gấp máy móc nguyên bản giấy tờ chính chủ biển số đà nẵng chính hãng sym máy móc cực em ae có lòng 
          đến 599 tôn đức thắng xem xe nha ae',
        'loại loa này là hàng nhập về còn mới ( giá siêu rẻ ) kích thước hình vuông (5cm) 3W*2(thd)',
        'chuyển hướng kinh doanh ko sử dụng Bán Dàn âm thanh Chuyên karaoke, nghe nhạc cực chuẩn còn mới chưa dung nguyên rin, mới 100% nguyên đai thùng kiện, tem niêm còn bảo hành 1 năm.....gồm
        1. Cặp Loa nén YAMAHA KMS910E, Loa bass25cm màng xanh tinh năng khuếch đại âm thanh cựa mạnh, công suất 700W ,2 treble Xanh lớn , bass treble rõ ràng sắc nét, âm thanh cực mạnh....
        2 Amply JAGUAR in korea 303XG chạy 12 fet Công suất Lớn, chạy 4 loa 4 micro, Echo chỉnh giọng hát chuyên nghiệp, chưc năng hiệu ứng âm thanh EQ lọc tiếng...
        3. Tặng kèm Micro kara Sure.
        _Mua 6 tr7 Nay tôi bán nhanh cho ae có nhu cầu giá 3tr100..
        đến nhà test âm thanh hát thử chuẩn. biết thêm thông tin xem google'
      );
      
      $images = array(
        array(
          'ip6-gold-16gb-do-vo-7-con-moi-1490944385-1490944385.jpg',
          'ip6-gold-16gb-do-vo-7-con-moi-1490944385-1490944386.jpg'
        ),
        array(
          'iphone-7-plus-128-gb-ma-a1784-bao-hanh-1-doi-1-1491093152-1491093152.jpg',
          'iphone-7-plus-128-gb-ma-a1784-bao-hanh-1-doi-1-1491093152-1491093153.jpg',
          'iphone-7-plus-128-gb-ma-a1784-bao-hanh-1-doi-1-1491093152-1491093154.jpg',
          'iphone-7-plus-128-gb-ma-a1784-bao-hanh-1-doi-1-1491093152-1491093155.jpg'
        ),
        array(
          'land-rover-s209-pin-ca-tuan-tang-o-dien-da-nang-1491092504-1491092504.jpg',
          'land-rover-s209-pin-ca-tuan-tang-o-dien-da-nang-1491092504-1491092505.jpg',
          'land-rover-s209-pin-ca-tuan-tang-o-dien-da-nang-1491092504-1491092506.jpg',
          'land-rover-s209-pin-ca-tuan-tang-o-dien-da-nang-1491092504-1491092507.jpg'
        ),
        array(
          'laptop-sony-vaio-fit-15-core-i5-4200u-card-roi-2g-1490944635-1490944635.jpg',
          'laptop-sony-vaio-fit-15-core-i5-4200u-card-roi-2g-1490944635-1490944636.jpg',
          'laptop-sony-vaio-fit-15-core-i5-4200u-card-roi-2g-1490944635-1490944637.jpg'
        ),
        array(
          'iphone-5s-gold-16gb-1491093760-1491093760.jpg',
          'iphone-5s-gold-16gb-1491093760-1491093761.jpg',
          'iphone-5s-gold-16gb-1491093760-1491093762.jpg'
        ),
        array(
          'dell-e6410-hang-my-rin-100-1491093999-1491093999.jpg',
          'dell-e6410-hang-my-rin-100-1491093999-1491094000.jpg',
          'dell-e6410-hang-my-rin-100-1491093999-1491094001.jpg'
        ),
        array(
          'iphone-6s-plus-64gb-gold-chinh-hang-vna-likenew-1491096423-1491096423.jpg',
          'iphone-6s-plus-64gb-gold-chinh-hang-vna-likenew-1491096423-1491096424.jpg',
          'iphone-6s-plus-64gb-gold-chinh-hang-vna-likenew-1491096423-1491096425.jpg',
          'iphone-6s-plus-64gb-gold-chinh-hang-vna-likenew-1491096423-1491096426.jpg',
          'iphone-6s-plus-64gb-gold-chinh-hang-vna-likenew-1491096423-1491096427.jpg'
        ),
        array(
          'loa-nanomax-bass-20-1491096679-1491096680.jpg',
          'loa-nanomax-bass-20-1491096679-1491096681.jpg'
        ),
        array(
          'ab-2-den-fi-phun-xang-2010-1491096808-1491096808.jpg',
          'ab-2-den-fi-phun-xang-2010-1491096808-1491096809.jpg',
          'ab-2-den-fi-phun-xang-2010-1491096808-1491096810.jpg'
        ),
        array(
          'sh-125-mau-do-tuoi-xe-15-1491096918-1491096918.jpg',
          'sh-125-mau-do-tuoi-xe-15-1491096918-1491096919.jpg'
        ),
        array(
          'exciter-150-fi-bien-43-1491097423-1491097423.jpg',
          'exciter-150-fi-bien-43-1491097423-1491097424.jpg',
          'exciter-150-fi-bien-43-1491097423-1491097425.jpg'
        ),
        array(
          'xe-han-quoc-bien-43-1491097575-1491097575.jpg'
        ),
        array(
          'xe-sirius-sym-dk12-43-1491097677-1491097677.jpg',
          'xe-sirius-sym-dk12-43-1491097677-1491097678.jpg',
          'xe-sirius-sym-dk12-43-1491097677-1491097679.jpg',
          'xe-sirius-sym-dk12-43-1491097677-1491097680.jpg',
          'xe-sirius-sym-dk12-43-1491097677-1491097681.jpg'
        ),
        array(
          'loa-vi-tinh-20-hop-cho-loai-pc-100hz-20khz-1495288922-1495288922.jpg'
        ),
        array(
          'bo-am-thanh-kara-yamahae164n-moi-chua-su-dung-1495289108-1495289108.jpg',
          'bo-am-thanh-kara-yamahae164n-moi-chua-su-dung-1495289108-1495289109.jpg',
          'bo-am-thanh-kara-yamahae164n-moi-chua-su-dung-1495289108-1495289110.jpg',
          'bo-am-thanh-kara-yamahae164n-moi-chua-su-dung-1495289108-1495289111.jpg',
          'bo-am-thanh-kara-yamahae164n-moi-chua-su-dung-1495289108-1495289112.jpg'
        )
      );
      for ($i=0; $i < count($titles); $i++) {
        $post = Post::create([
          'user_id' => $faker->randomElement($users->toArray()),
          'province_id' => $faker->randomElement($provinces->toArray()),
          'district_id' => $faker->randomElement($districts->toArray()),
          'ward_id' => $faker->randomElement($wards->toArray()),
          'category_id' => $faker->randomElement($categories->toArray()),
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
        for ($j=0; $j < count($images[$i]); $j++) { 
          Image::create([
            'url' => $images[$i][$j],
            'post_id' => $post->id,
            'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
      }
    }
}
