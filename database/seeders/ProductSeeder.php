<?php

namespace Database\Seeders;

use Carbon\Carbon;
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

        $dt = Carbon::now();
        DB::table('product')->insert([
            ['product_name' => 'Fruio Macdon (1759 - 1800)', 'category_id' => 2, 'product_description' => 'King Xi Period (1745 - 1800)', 'starting_price' => 14000, 'end_date' => $dt->setDateTime(2022, 2, 21, 14, 30, 0), 'product_image' => 'images/product/image-1.jpg'],
            ['product_name' => 'Munusco Pauscoma (1628 - 1710)', 'category_id' => 2, 'product_description' => 'In the Yosemite', 'starting_price' => 14000, 'end_date' => $dt->setDateTime(2022, 2, 21, 14, 30, 0), 'product_image' => 'images/product/image-2.jpg'],
            ['product_name' => 'Frederic Edwin Church (1826 - 1900)', 'category_id' => 2, 'product_description' => 'CIRCA 1870, Probably Belgium', 'starting_price' => 14000, 'end_date' => $dt->setDateTime(2022, 2, 22, 14, 30, 0), 'product_image' => 'images/product/image-3.jpg'],
            ['product_name' => 'John Singer Sargent (1856 - 1925)', 'category_id' => 2, 'product_description' => 'PHILADELPHIA, CIRCA 1755', 'starting_price' => 15000, 'end_date' => $dt->setDateTime(2022, 2, 18, 14, 30, 0), 'product_image' => 'images/product/image-4.jpg'],
            ['product_name' => 'Sanford Robinson Gifford (1823 - 1880)', 'category_id' => 2, 'product_description' => 'Japanese sea createu 1985', 'starting_price' => 15000, 'end_date' => $dt->setDateTime(2022, 2, 23, 14, 30, 0), 'product_image' => 'images/product/image-5.jpg'],
            ['product_name' => 'William Trost Richards (1833 - 1905)', 'category_id' => 2, 'product_description' => 'Magical world from the northen earth with blue sky', 'starting_price' => 12000, 'end_date' => $dt->setDateTime(2022, 1, 21, 14, 30, 0), 'product_image' => 'images/product/image-6.jpg'],
            ['product_name' => 'Antique Mirror With Gilded Frame 1792', 'category_id' => 1, 'product_description' => 'Mirror from yunal 1759', 'starting_price' => 1230000, 'end_date' => $dt->setDateTime(2022, 3, 22, 14, 30, 0), 'product_image' => 'images/product/Antique Mirror With Gilded Frame 1792.jpg'],
            ['product_name' => 'Antique Victorian French Vase', 'category_id' => 4, 'product_description' => 'French Vase', 'starting_price' => 1224000, 'end_date' => $dt->setDateTime(2022, 4, 19, 14, 30, 0), 'product_image' => 'images/product/Antique Victorian French Vase.jpg'],
            ['product_name' => 'Dark Knights Horses Original Oil Painting 25 Years Old Painting', 'category_id' => 2, 'product_description' => 'Knight horse by Moneal 1774', 'starting_price' => 1231000, 'end_date' => $dt->setDateTime(2022, 1, 3, 14, 30, 0), 'product_image' => 'images/product/Dark Knights Horses Original Oil Painting 25 Years Old Painting.jpg'],
            ['product_name' => 'English Oil Painting of Church in Giltwood Frame', 'category_id' => 2, 'product_description' => 'Oil painting about church by Monestro XVII', 'starting_price' => 14000, 'end_date' => $dt->setDateTime(2022, 1, 13, 14, 30, 0), 'product_image' => 'images/product/English Oil Painting of Church in Giltwood Frame.jpg'],
            ['product_name' => 'Sewing Machine 1823', 'category_id' => 3, 'product_description' => 'Sewing Machine 1882', 'starting_price' => 14000, 'end_date' => $dt->setDateTime(2022, 2, 12, 14, 30, 0), 'product_image' => 'images/product/Sewing Machine 1823.jpg'],
        ]);
    }
}
