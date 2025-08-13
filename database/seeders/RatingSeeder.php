<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '-1'); //Hanya untuk data yang besar masuk secara bersamaan

        // Alternatif jika tidak mengatur memory limit, tetapi data tidak dinamis jika seeder di generate lebih dari sekali
        // 'book_id' => rand(1, 100000),

        $faker = Faker::create();

        $now = now();
        $ratings = [];
        $batchSize = 5000;

        $bookIds = Book::pluck('id')->toArray();

        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => $faker->randomElement($bookIds),
                'rating' => rand(1, 10),
                'created_at' => $now,
                'updated_at' => $now
            ];


            if (count($ratings) >= $batchSize) {
                DB::table('ratings')->insert($ratings);
                $ratings = [];
            }
        }

        if (!empty($ratings)) {
            DB::table('ratings')->insert($ratings);
        }

        unset($ratings);
    }
}
