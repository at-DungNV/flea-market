<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Post;

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
      for ($i=0; $i < 50; $i++) {
        $title = $faker->text;
        Post::create([
          'user_id' => $faker->randomElement($users->toArray()),
          'title' => $title,
          'price' => rand(1, 50) * 10,
          'state' => $states[rand(0, 3)],
          'type' => $types[rand(0, 1)],
          'address' => $faker->address,
          'slug' => str_slug($title),
          'description' => $faker->text,
          'created_at' => $faker->dateTimeThisYear($max = 'now')
        ]);
      }
    }
}
