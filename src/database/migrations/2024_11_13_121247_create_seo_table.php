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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->text('title');
            $table->text('description');
            $table->text('canonical');
            $table->text('keywords');
            $table->text('og_title');
            $table->text('og_description');
            $table->text('og_url');
            $table->text('twitter_title');
            $table->text('twitter_site');
            $table->text('jsonld_title');
            $table->text('jsonld_description');
            $table->text('jsonld_type');
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
        Schema::dropIfExists('seo');
    }
};
