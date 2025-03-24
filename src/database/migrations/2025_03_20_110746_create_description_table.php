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
        Schema::create('description', function (Blueprint $table) {
            $table->id();
            $table->text('block_1_0_text')->nullable();
            $table->string('block_1_1_image_path', 500)->nullable();
            $table->string('block_1_1_image_name', 500)->nullable();
            $table->string('block_1_2_image_path', 500)->nullable();
            $table->string('block_1_2_image_name', 500)->nullable();
            $table->text('block_2_0_text')->nullable();
            $table->string('block_2_1_image_path', 500)->nullable();
            $table->string('block_2_1_image_name', 500)->nullable();
            $table->string('block_2_2_image_path', 500)->nullable();
            $table->string('block_2_2_image_name', 500)->nullable();
            $table->string('block_2_3_image_path', 500)->nullable();
            $table->string('block_2_3_image_name', 500)->nullable();
            $table->text('block_3_0_text')->nullable();
            $table->string('block_3_1_image_path', 500)->nullable();
            $table->string('block_3_1_image_name', 500)->nullable();
            $table->text('block_4_0_text')->nullable();
            $table->string('block_4_1_image_path', 500)->nullable();
            $table->string('block_4_1_image_name', 500)->nullable();
            $table->text('block_5_0_text')->nullable();
            $table->string('block_5_1_image_path', 500)->nullable();
            $table->string('block_5_1_image_name', 500)->nullable();
            $table->text('block_6_0_text')->nullable();
            $table->string('block_6_1_image_path', 500)->nullable();
            $table->string('block_6_1_image_name', 500)->nullable();
            $table->string('block_6_2_image_path', 500)->nullable();
            $table->string('block_6_2_image_name', 500)->nullable();
            $table->text('block_7_0_text')->nullable();
            $table->string('block_7_1_image_path', 500)->nullable();
            $table->string('block_7_1_image_name', 500)->nullable();
            $table->text('block_8_0_text')->nullable();
            $table->string('block_8_1_image_path', 500)->nullable();
            $table->string('block_8_1_image_name', 500)->nullable();
            $table->text('block_9_0_text')->nullable();
            $table->string('block_9_1_image_path', 500)->nullable();
            $table->string('block_9_1_image_name', 500)->nullable();
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
        Schema::dropIfExists('description');
    }
};
