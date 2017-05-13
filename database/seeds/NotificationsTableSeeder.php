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
        $types = array('1', '2');
        for ($i=0; $i < 500; $i++) {
          $data = array();
          $data["message"] = $faker->text;
          $data['approver'] = 'default.png';
          $data['url'] = url('/post').'/'. Post::find($faker->randomElement($users->toArray()))->slug;
          Notification::create([
            'user_id' => $faker->randomElement($users->toArray()),
            // 'post_id' => $faker->randomElement($posts->toArray()),
            'data' => json_encode($data),
            'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
    }
}
