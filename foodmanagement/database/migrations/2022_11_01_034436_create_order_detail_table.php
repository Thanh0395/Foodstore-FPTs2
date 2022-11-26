<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('OD_id');
            $table->unsignedBigInteger('O_id');
            $table->unsignedBigInteger('F_id');
            $table->integer('quantity')->unsigned();
            $table->timestamps();

            $table->foreign('O_id')->references('O_id')->on('orders')
            ->onDelete('cascade');
            $table->foreign('F_id')->references('F_id')->on('foods')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
};
