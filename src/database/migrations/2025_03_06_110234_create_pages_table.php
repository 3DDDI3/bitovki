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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable();
            $table->string('block_1_title', 1000)->nullable();
            $table->string('block_1_subtitle', 1000)->nullable();
            $table->string('block_1_price_title', 1000)->nullable();
            $table->integer('block_1_price_value')->nullable();
            $table->string('block_1_price_subtitle', 1000)->nullable();
            $table->text('block_1_image_path')->nullable();
            $table->text('block_1_image_name')->nullable();
            $table->text('block_2_title')->nullable();
            $table->string('block_2_subtitle', 1000)->nullable();
            $table->text('block_2_text1')->nullable();
            $table->text('block_2_text2')->nullable();
            $table->text('block_2_image_path')->nullable();
            $table->text('block_2_image_name')->nullable();
            $table->string('block_2_image_description', 1000)->nullable();
            $table->text('block_3_title')->nullable();
            $table->string('block_3_economy_title', 1000)->nullable();
            $table->integer('block_3_economy_value')->nullable();
            $table->string('block_3_subtitle', 1000)->nullable();
            $table->text('block_3_text')->nullable();
            $table->text('block_3_image_path')->nullable();
            $table->text('block_3_image_name')->nullable();
            $table->text('block_3_1_title')->nullable();
            $table->string('block_3_1_economy_title', 1000)->nullable();
            $table->integer('block_3_1_economy_value')->nullable();
            $table->string('block_3_1_subtitle', 1000)->nullable();
            $table->text('block_3_1_text')->nullable();
            $table->text('block_3_1_image_path')->nullable();
            $table->text('block_3_1_image_name')->nullable();
            $table->text('block_4_title')->nullable();
            $table->text('block_4_text')->nullable();
            $table->text('block_4_image1_path')->nullable();
            $table->text('block_4_image1_name')->nullable();
            $table->string('block_4_image1_description', 1000)->nullable();
            $table->text('block_4_image2_path')->nullable();
            $table->text('block_4_image2_name')->nullable();
            $table->string('block_4_image2_description', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
