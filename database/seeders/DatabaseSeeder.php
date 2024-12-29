<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        user::create([
            'name' => 'arya_test',
            'email' => 'aryakamal@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        $this->call([
            BannerSeeder::class,
            CategorySeeder::class,
            RestaurantSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
