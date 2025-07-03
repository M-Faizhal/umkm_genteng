<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['categories' => 'Kuliner', 'created_at' => now(), 'updated_at' => now()],
            ['categories' => 'Obat Herbal', 'created_at' => now(), 'updated_at' => now()],
            ['categories' => 'Kerajinan', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
