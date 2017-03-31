<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\District;
use App\Models\Ward;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $faker = Faker::create();
      // $types = array('xã', 'phường', 'thị trấn');
      // $districts = District::all()->pluck('id');
      // for ($i=0; $i < 100; $i++) {
      //   $ward = $faker->city;
      //   Ward::create([
      //     'district_id' => $faker->randomElement($districts->toArray()),
      //     'name' => $ward,
      //     'type' => $types[rand(0, 2)],
      //     'slug' => str_slug($ward),
      //     'created_at' => $faker->dateTimeThisYear($max = 'now')
      //   ]);
      // }
    }
}
