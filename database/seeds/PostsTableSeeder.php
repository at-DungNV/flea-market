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
    }
}
