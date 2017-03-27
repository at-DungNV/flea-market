<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Post;
use App\Models\Notification;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all()->pluck('id');
        $posts = Post::all()->pluck('id');
        for ($i=0; $i < 100; $i++) {
          Notification::create([
            'user_id' => $faker->randomElement($users->toArray()),
            'post_id' => $faker->randomElement($posts->toArray()),
            'message' => $faker->text,
            'seen' => $faker->boolean(50),
            'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
    }
}
