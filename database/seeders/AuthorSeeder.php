<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $now = now();
        $authors = [];
        for ($i = 0; $i < 1000; $i++) {
            $authors[] = [
                'name' => $faker->name(),
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        DB::table('authors')->insert($authors);
        unset($authors);
    }
}
