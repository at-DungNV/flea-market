<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\CategoryType;

class CategoryTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array("Books", "Furnitures", "Others");
        $categories = Category::all()->lists('id');
        for ($i=0; $i < count($names); $i++) {
            CategoryType::create([
                'category_id' => $faker->randomElement($categories->toArray()),
                'name' => $names[$i],
                'slug' => str_slug($names[$i]),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
