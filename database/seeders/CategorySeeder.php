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
    public function run(): void
    {
        Category::create([
            "name" => "Presidential",
            "slug" => "presidential",
        ]);

        Category::create([
            "name" => "Luxury",
            "slug" => "luxury",
        ]);

        Category::create([
            "name" => "Deluxe",
            "slug" => "deluxe",
        ]);

        Category::create([
            "name" => "Single",
            "slug" => "single",
        ]);
    }
}
