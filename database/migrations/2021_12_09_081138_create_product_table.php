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
            $table->unsignedBigInteger('highest_bidder_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->integer('starting_price');
            $table->integer('highest_bid');
            $table->dateTime('end_date');
            $table->string('product_image');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('highest_bidder_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
