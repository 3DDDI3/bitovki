<?php

use App\Models\FileType;
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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('path')->nullable();
            $table->foreignIdFor(FileType::class)
                ->constrained('file_type')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->boolean('hide')->default(0)->nullable();
            $table->integer('rating')->default(0)->nullable();
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
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeignIdFor(FileType::class);
        });
        Schema::dropIfExists('files');
    }
};
