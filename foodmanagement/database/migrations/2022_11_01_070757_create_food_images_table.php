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
        Schema::create('food_images', function (Blueprint $table) {
            $table->id('FoodImage_id');
            $table->string('F_name');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->timestamps();

            $table->foreign('F_name')->references('F_name')->on('foods')
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
        Schema::dropIfExists('food_images');
    }
};
