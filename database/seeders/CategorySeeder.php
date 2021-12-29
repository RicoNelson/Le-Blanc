<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['category_name' => 'Mirror'],
            ['category_name' => 'Painting'],
            ['category_name' => 'Sewing Machine'],
            ['category_name' => 'Vase'],
        ]);
    }
}
