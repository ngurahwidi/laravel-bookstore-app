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
        $faker = Faker::create();
        $now = now();
        $authorIds = range(1, 1000);
        $categoryIds = range(1, 3000);
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
