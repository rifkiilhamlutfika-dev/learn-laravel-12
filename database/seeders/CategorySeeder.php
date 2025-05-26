<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Action',
            'Adventure',
            'Animation',
            'Comedy',
            'Crime',
            'Documentary',
            'Drama',
            'Fantasy',
            'Horror',
            'Musical',
            'Mystery',
            'Romance',
            'Science Fiction',
            'Thriller',
            'Western'
        ];

        foreach ($categories as $key => $value) {
            DB::table('categories')->insert([
                'name' => $value,
                'slug' => Str::of($value)->slug('-'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
