<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '-1'); //Hanya untuk data yang besar masuk secara bersamaan

        // Alternatif jika tidak mengatur memory limit, tetapi data tidak dinamis jika seeder di generate lebih dari sekali
        // $authorIds = range(1, 1000);
        // $categoryIds = range(1, 3000);

        $faker = Faker::create();
        $now = now();
        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $books = [];
        $batchSize = 5000;

        for ($i = 0; $i < 100000; $i++) {
            $books[] = [
                'title' => $faker->sentence(3),
                'author_id' => $faker->randomElement($authorIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => $now,
                'updated_at' => $now
            ];

            if (count($books) >= $batchSize) {
                DB::table('books')->insert($books);
                $books = [];
            }
        }
        if (!empty($books)) {
            DB::table('books')->insert($books);
        }
        unset($books, $authorIds, $categoryIds);
    }
}
