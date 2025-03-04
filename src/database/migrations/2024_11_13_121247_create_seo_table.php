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
            $table->string('url', 255);
            $table->string('title', 255);
            $table->string('description', 255);
            $table->string('canonical', 255);
            $table->string('keywords', 255);
            $table->string('og_title', 255);
            $table->string('og_description', 255);
            $table->string('og_url', 255);
            $table->string('twitter_title', 255);
            $table->string('twitter_site', 255);
            $table->string('jsonld_title', 255);
            $table->string('jsonld_description', 255);
            $table->string('jsonld_type', 255);
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
