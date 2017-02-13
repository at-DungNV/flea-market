<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = new User();
        $user->name = 'dungnv';
        $user->email = 'dungnv@gmail.com';
        $user->password = '12345678';
        $user->is_active = 1;
        $user->birthday = date("Y-m-d", strtotime('08/11/1994'));
        $user->address = 'Asian Tech Inc';
        $user->phone = '0123456789';
        $user->gender = 1;
        $user->save();

        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => '12345678',
                'is_active' => $faker->boolean(50),
                'birthday' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'gender' => rand(0, 1),
                'remember_token' => str_random(60),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
