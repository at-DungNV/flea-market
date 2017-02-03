<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Image;
use App\Models\Post;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $posts = Post::all()->pluck('id');
        for ($i=0; $i < 100; $i++) {
          Image::create([
            'url' => str_slug($faker->text). '.jpg',
            'post_id' => $faker->randomElement($posts->toArray()),
            'created_at' => $faker->dateTimeThisYear($max = 'now')
          ]);
        }
    }
}
