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
        $names = array('Books', 'Furnitures', 'Economy', 'Buddhism', 'Others');
        for ($i=0; $i < count($names); $i++) {
          Category::create([
              'name' => $names[$i],
              'parent_id' => null,
              'slug' => str_slug($names[$i]),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
        for ($i=0; $i < 10; $i++) {
          $name = $faker->name;
          Category::create([
              'name' => $name,
              'parent_id' => rand(1, count($names)),
              'slug' => str_slug($name),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
        for ($i=0; $i < 10; $i++) {
          $name = $faker->name;
          Category::create([
              'name' => $name,
              'parent_id' => rand(10, 20),
              'slug' => str_slug($name),
              'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
    }
}
