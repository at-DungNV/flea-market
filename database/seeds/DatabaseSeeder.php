<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryTypesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        // $this->call(NotificationsTableSeeder::class);
    }
}
