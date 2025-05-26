<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'name' => "Inception",
                'slug' => 'inception',
                'description' => "ini film seru banget rek"
            ],
            [
                'name' => "Naruto",
                'slug' => 'naruto',
                'description' => "ini film seru banget rek"
            ],
            [
                'name' => "Boboiboy Movie",
                'slug' => 'boboiboy-movie',
                'description' => "ini film seru banget rek"
            ],
            [
                'name' => "Hulk",
                'slug' => 'hulk',
                'description' => "ini film seru banget rek"
            ],
            [
                'name' => "Ejen Ali",
                'slug' => 'ejen-ali',
                'description' => "ini film seru banget rek"
            ]
        ];

        DB::table('movies')->insert(array_map(function ($movie) {
            return array_merge($movie, [
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }, $movies));
    }
}
