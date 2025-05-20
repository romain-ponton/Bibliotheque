<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $category_id = Category::query()->first()->id;
        $user_id = User::query()->first()->id;
        $books = [
            ['title' => 'Book 1', 'author' => 'Author 1', 'photo' => 'photos/AMvBHiZGBMLAISkxEqJSWiLLOy4ETWtuvkyXTSJn.png', 'nbpages' => 150, 'resume' => 'Resume 1', 'price' => 19.99, 'category_id' => $category_id, 'user_id' => $user_id],
            ['title' => 'Book 2', 'author' => 'Author 2', 'photo' => 'photos/AMvBHiZGBMLAISkxEqJSWiLLOy4ETWtuvkyXTSJn.png', 'nbpages' => 200, 'resume' => 'Resume 2', 'price' => 29.99, 'category_id' => $category_id, 'user_id' => $user_id],
            // Ajoutez ici 18 autres livres avec des données fictives
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }

    }
}
