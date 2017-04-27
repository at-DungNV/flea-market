<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $names = array('Sách', 'Việc làm', 'Đồ gia dụng', 'Khác');
        $books = array('Đại cương', 'Chuyên ngành', 'Công nghệ thông tin', 'Điện tử viễn thông');
        $jobs = array('Gia sư', 'Nội trợ', 'Part time', 'Bán hàng');
        $things = array('Xe cộ', 'Máy tính', 'Điện thoại', 'Bàn ghê');
        for ($i=0; $i < count($names); $i++) {
          Category::create([
              'name' => $names[$i],
              'parent_id' => null,
              'slug' => str_slug($names[$i]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
        for ($i=0; $i < count($books); $i++) {
          Category::create([
              'name' => $books[$i],
              'parent_id' => 1,
              'slug' => str_slug($books[$i]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
        for ($i=0; $i < count($jobs); $i++) {
          Category::create([
              'name' => $jobs[$i],
              'parent_id' => 2,
              'slug' => str_slug($jobs[$i]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
        for ($i=0; $i < count($things); $i++) {
          Category::create([
              'name' => $things[$i],
              'parent_id' => 3,
              'slug' => str_slug($things[$i]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
    }
}
