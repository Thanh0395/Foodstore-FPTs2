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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('P_id');
            $table->unsignedBigInteger('U_id');
            $table->longText('content');
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->string('status', 50)->default('Publish');
            $table->timestamps();

            $table->foreign('U_id')->references('U_id')->on('users')
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
        Schema::dropIfExists('posts');
    }
};
