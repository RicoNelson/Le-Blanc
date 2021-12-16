<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['product_name' => 'Botol 1', 'category_id' => 3, 'product_description' => 'Ini adalah product description Botol 1', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/botol1.jpg'],
            ['product_name' => 'Botol 2', 'category_id' => 3, 'product_description' => 'Ini adalah product description Botol 2', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/botol2.jpg'],
            ['product_name' => 'Botol 3', 'category_id' => 3, 'product_description' => 'Ini adalah product description Botol 3', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/botol3.jpg'],
            ['product_name' => 'Kambing 1', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kambing 1', 'stock' => 32, 'price' => 15000, 'product_image' => 'images/product/kambing1.jpg'],
            ['product_name' => 'Kambing 2', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kambing 2', 'stock' => 32, 'price' => 15000, 'product_image' => 'images/product/kambing2.jpg'],
            ['product_name' => 'Kambing 3', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kambing 3', 'stock' => 32, 'price' => 12000, 'product_image' => 'images/product/kambing3.jpg'],
            ['product_name' => 'Kuda 1', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kuda 1', 'stock' => 32, 'price' => 1230000, 'product_image' => 'images/product/kuda1.jpg'],
            ['product_name' => 'Kuda 2', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kuda 2', 'stock' => 32, 'price' => 1224000, 'product_image' => 'images/product/kuda2.jpg'],
            ['product_name' => 'Kuda 3', 'category_id' => 1, 'product_description' => 'Ini adalah product description Kuda 3', 'stock' => 32, 'price' => 1231000, 'product_image' => 'images/product/kuda3.jpg'],
            ['product_name' => 'Sapi 1', 'category_id' => 1, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/sapi1.jpg'],
            ['product_name' => 'Sapi 2', 'category_id' => 1, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/sapi2.jpg'],
            ['product_name' => 'Sapi 3', 'category_id' => 1, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/sapi3.jpg'],
            ['product_name' => 'Satu set garpu', 'category_id' => 4, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/set of forks.jpg'],
            ['product_name' => 'Satu set sendok', 'category_id' => 4, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/set of spoons.jpg'],
            ['product_name' => 'Kettle', 'category_id' => 4, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/kettle.jpg'],
            ['product_name' => 'Televisi 1', 'category_id' => 5, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/tv1.jpg'],
            ['product_name' => 'Televisi 2', 'category_id' => 5, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/tv2.jpg'],
            ['product_name' => 'Televisi 3', 'category_id' => 5, 'product_description' => 'Ini adalah product description', 'stock' => 32, 'price' => 14000, 'product_image' => 'images/product/tv3.jpg'],
        ]);
    }
}
