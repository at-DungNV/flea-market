<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $types = array('city', 'province');
      for ($i=0; $i < 50; $i++) {
        $city = $faker->city;
        Province::create([
          'name' => $city,
          'type' => $types[rand(0, 1)],
          'slug' => str_slug($city),
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
}
