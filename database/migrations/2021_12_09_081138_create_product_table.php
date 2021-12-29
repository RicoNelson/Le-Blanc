<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->integer('starting_price');
            $table->dateTime('end_date');
            $table->string('product_image');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('category')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
