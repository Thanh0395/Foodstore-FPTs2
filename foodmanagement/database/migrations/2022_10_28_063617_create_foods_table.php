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
        Schema::create('foods', function (Blueprint $table) {
            $table->id('F_id');
            $table->string('F_name')->unique();
            $table->unsignedBigInteger('Cate_id');
            $table->string('image');
            $table->integer('price')->unsigned();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('Cate_id')->references('Cate_id')->on('categories')
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
        Schema::dropIfExists('foods');
    }
};
