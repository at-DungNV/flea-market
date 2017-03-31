<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Province;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $faker = Faker::create();
      // $types = array('quận', 'huyện', 'thị xã');
      // $provinces = Province::all()->pluck('id');
      // for ($i=0; $i < 100; $i++) {
      //   $district = $faker->state;
      //   District::create([
      //     'province_id' => $faker->randomElement($provinces->toArray()),
      //     'name' => $district,
      //     'type' => $types[rand(0, 2)],
      //     'slug' => str_slug($district),
      //     'created_at' => $faker->dateTimeThisYear($max = 'now')
      //   ]);
      // }
    }
}
