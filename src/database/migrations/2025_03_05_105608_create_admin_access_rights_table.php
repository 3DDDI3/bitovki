<?php

use App\Models\UserClass;
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
        Schema::create('admin_access_rights', function (Blueprint $table) {
            $table->id();
            $table->string('path', 1000);
            $table->string('type', 1000);
            $table->foreignIdFor(UserClass::class)->constrained();
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
        Schema::table('admin_access_rights', function (Blueprint $table) {
            $table->dropForeignIdFor(UserClass::class);
        });
        Schema::dropIfExists('admin_access_rights');
    }
};
