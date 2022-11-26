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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('Comment_id');
            $table->unsignedBigInteger('U_id');
            $table->unsignedBigInteger('P_id');
            $table->longText('comment');
            $table->tinyInteger('status')->nullable();
            $table->timestamps();

            $table->foreign('U_id')->references('U_id')->on('users')
            ->onDelete('cascade');
            $table->foreign('P_id')->references('P_id')->on('posts')
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
        Schema::dropIfExists('comments');
    }
};
