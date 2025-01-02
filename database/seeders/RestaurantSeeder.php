<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Pastikan direktori exists
        if (!File::exists(storage_path('app/public/restaurants'))) {
            File::makeDirectory(storage_path('app/public/restaurants'), 0777, true);
        }

        // Copy file gambar ke folder yang benar
        $samplePath = base_path('sample-images/restaurants'); // sesuaikan dengan folder sumber gambar Anda
        if (File::exists($samplePath)) {
            $files = File::files($samplePath);
            foreach ($files as $file) {
                File::copy($file->getPathname(), storage_path('app/public/restaurants/' . $file->getFilename()));
            }
        }

        $restaurants = [
            [
                'name' => 'Warung Pasta',
                'description' => 'Italian cuisine with Indonesian taste. We serve various pasta dishes with unique flavors.',
                'address' => 'Jl. Telekomunikasi No. 1',
                'phone' => '0812-3456-7890',
                'opening_hours' => '10:00 - 22:00',
                'image' => 'restaurant1.jpg'
            ],
            [
                'name' => 'Sushi Tei',
                'description' => 'Authentic Japanese restaurant serving fresh sushi and sashimi.',
                'address' => 'Jl. Telekomunikasi No. 2',
                'phone' => '0812-3456-7891',
                'opening_hours' => '11:00 - 22:00',
                'image' => 'restaurant2.jpg'
            ],
            [
                'name' => 'Padang Sederhana',
                'description' => 'Traditional Padang restaurant with various Indonesian dishes.',
                'address' => 'Jl. Telekomunikasi No. 3',
                'phone' => '0812-3456-7892',
                'opening_hours' => '07:00 - 22:00',
                'image' => 'restaurant3.jpg'
            ],
            [
                'name' => 'Burger King',
                'description' => 'Fast food restaurant specializing in burgers and fries.',
                'address' => 'Jl. Telekomunikasi No. 4',
                'phone' => '0812-3456-7893',
                'opening_hours' => '10:00 - 22:00',
                'image' => 'restaurant4.jpg'
            ]
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
