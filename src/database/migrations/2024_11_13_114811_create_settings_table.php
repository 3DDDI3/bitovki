<?php

use App\Models\File;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->string('phones', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('requisites')->nullable();
            $table->foreignIdFor(File::class)
                ->comment('Реквизиты в формате файла')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('email')->nullable();
            $table->string('vk')->nullable();
            $table->string('youtube')->nullable();
            $table->string('telegram')->nullable();
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
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeignIdFor(File::class);
        });
        Schema::dropIfExists('settings');
    }
};
