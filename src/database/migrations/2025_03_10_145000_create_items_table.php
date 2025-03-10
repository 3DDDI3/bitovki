<?php

use Dom\Text;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable();
            $table->string('subtitle', 1000)->nullable();
            $table->float('old_price')->nullable();
            $table->float('new_price')->nullable();
            $table->float('monthly_payment')->nullable();
            $table->string('month_count')->nullable();
            $table->text('image_path')->nullable();
            $table->text('image_name')->nullable();
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
        Schema::dropIfExists('items');
    }
};
