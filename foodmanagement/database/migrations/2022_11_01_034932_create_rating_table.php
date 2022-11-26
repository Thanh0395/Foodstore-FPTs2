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
        Schema::create('rating', function (Blueprint $table) {
            $table->id('R_id');
            $table->unsignedBigInteger('U_id');
            $table->unsignedBigInteger('F_id');
            $table->decimal('rating', 5, 2)->unsigned();
            $table->string('comment');
            $table->timestamps();

            $table->foreign('U_id')->references('U_id')->on('users')
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
        Schema::dropIfExists('rating');
    }
};
