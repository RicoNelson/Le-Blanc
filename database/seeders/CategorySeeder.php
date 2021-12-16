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
            ['category_name' => 'Animal'],
            ['category_name' => 'Computer'],
            ['category_name' => 'Bottle'],
            ['category_name' => 'Kitchen Attribute'],
            ['category_name' => 'Television'],
        ]);
    }
}
