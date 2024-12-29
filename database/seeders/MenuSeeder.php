<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Pastikan direktori exists
        if (!File::exists(storage_path('app/public/menus'))) {
            File::makeDirectory(storage_path('app/public/menus'), 0777, true);
        }

        // Copy file gambar ke folder yang benar
        $samplePath = base_path('sample-images/menus'); // sesuaikan dengan folder sumber gambar Anda
        if (File::exists($samplePath)) {
            $files = File::files($samplePath);
            foreach ($files as $file) {
                File::copy($file->getPathname(), storage_path('app/public/menus/' . $file->getFilename()));
            }
        }

        $menus = [
            // Restaurant 1 - Warung Pasta
            [
                'restaurant_id' => 1,
                'category_id' => 1, // Food
                'name' => 'Spaghetti Bolognese',
                'description' => 'Classic Italian pasta with meat sauce',
                'price' => 45000,
                'image' => 'makanan1.jpg'
            ],
            [
                'restaurant_id' => 1,
                'category_id' => 2, // Beverage
                'name' => 'Ice Lemon Tea',
                'description' => 'Refreshing iced tea with lemon',
                'price' => 15000,
                'image' => 'minuman1.jpg'
            ],

            // Restaurant 2 - Sushi Tei
            [
                'restaurant_id' => 2,
                'category_id' => 1,
                'name' => 'Salmon Sushi',
                'description' => 'Fresh salmon sushi',
                'price' => 35000,
                'image' => 'makanan2.jpg'
            ],
            [
                'restaurant_id' => 2,
                'category_id' => 2,
                'name' => 'Green Tea',
                'description' => 'Traditional Japanese green tea',
                'price' => 12000,
                'image' => 'minuman2.jpg'
            ],

            // Restaurant 3 - Padang Sederhana
            [
                'restaurant_id' => 3,
                'category_id' => 1,
                'name' => 'Rendang',
                'description' => 'Traditional Padang beef rendang',
                'price' => 40000,
                'image' => 'makanan3.jpg'
            ],
            [
                'restaurant_id' => 3,
                'category_id' => 2,
                'name' => 'Es Teh Manis',
                'description' => 'Sweet iced tea',
                'price' => 8000,
                'image' => 'minuman3.jpg'
            ],

            // Restaurant 4 - Burger King
            [
                'restaurant_id' => 4,
                'category_id' => 1,
                'name' => 'Whopper',
                'description' => 'Signature flame-grilled burger',
                'price' => 50000,
                'image' => 'makanan4.jpg'
            ],
            [
                'restaurant_id' => 4,
                'category_id' => 2,
                'name' => 'Cola',
                'description' => 'Refreshing cola drink',
                'price' => 15000,
                'image' => 'minuman4.jpg'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
