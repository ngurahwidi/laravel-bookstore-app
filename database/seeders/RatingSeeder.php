<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $ratings = [];
        $batchSize = 5000;

        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => rand(1, 100000),
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
