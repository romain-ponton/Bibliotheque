<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Science Fiction',
            'Fantasy',
            'Mystery',
            'Thriller',
            'Romance',
            'Horror',
            'Biography',
            'History',
            'Self-Help',
            'Young Adult',
            'Children\'s',
            'Poetry',
            'Science',
            'Technology',
            'Travel',
            'Cooking',
            'Art',
            'Philosophy',
            'Religion',
            'Business'
        ];

        foreach ($categories as $categoryName) {
            Category::query()->create([
                'name' => $categoryName,
            ]);
        }
    }
}

