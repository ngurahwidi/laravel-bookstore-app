<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $now = now();
        $categories = [];
        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => $faker->word(),
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        DB::table('categories')->insert($categories);
        unset($categories);
    }
}
