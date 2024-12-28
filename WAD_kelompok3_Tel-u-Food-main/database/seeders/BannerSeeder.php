<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $banners = [
            [
                'title' => 'Food Festival 2024',
                'subtitle' => 'Join us for the biggest food festival at Telkom University. Experience various cuisines from around Indonesia.',
                'image' => 'banner1.jpg',
                'event_date' => Carbon::parse('2024-01-15'),
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Cooking Workshop',
                'subtitle' => 'Learn to cook authentic Indonesian cuisine with our expert chefs. Limited seats available!',
                'image' => 'banner2.jpg',
                'event_date' => Carbon::parse('2024-02-01'),
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Sushi Making Class',
                'subtitle' => 'Master the art of sushi making with Chef Tanaka. Perfect for beginners and enthusiasts.',
                'image' => 'banner3.jpg',
                'event_date' => Carbon::parse('2024-02-15'),
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Wine Tasting Evening',
                'subtitle' => 'Discover premium wines from around the world paired with exquisite dishes.',
                'image' => 'banner4.jpg',
                'event_date' => Carbon::parse('2024-03-01'),
                'order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Barista Championship',
                'subtitle' => 'Watch top baristas compete and showcase their coffee-making skills. Free coffee tasting!',
                'image' => 'banner5.jpg',
                'event_date' => Carbon::parse('2024-03-15'),
                'order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Kids Baking Class',
                'subtitle' => 'Fun baking session for children aged 7-12. Let them discover the joy of baking!',
                'image' => 'banner6.jpg',
                'event_date' => Carbon::parse('2024-04-01'),
                'order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
