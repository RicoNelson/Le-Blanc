<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->bigIncrements('detail_transaction_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('item_name');
            $table->string('item_detail');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaction');
    }
}
