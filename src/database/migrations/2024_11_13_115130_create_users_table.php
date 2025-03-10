<?php

use App\Models\UserClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('remember_token', 100)->nullable();
            $table->boolean('is_admin')->default(0)->nullable();
            $table->text('image', 255)->nullable();
            $table->foreignIdFor(UserClass::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test',
                'password' => Hash::make('test'),
                'is_admin' => 1,
                'user_class_id' => UserClass::query()->find(1)->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor(UserClass::class);
        });
        Schema::dropIfExists('users');
    }
};
