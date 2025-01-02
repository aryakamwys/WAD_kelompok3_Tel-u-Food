<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Food',
            'description' => 'Menu Makanan'
        ]);

        Category::create([
            'name' => 'Beverage',
            'description' => 'Menu Minuman'
        ]);
    }
}
