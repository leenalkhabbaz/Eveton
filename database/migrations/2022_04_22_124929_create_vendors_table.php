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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gendre');
            $table ->string('profile_thumbnail')->default('userdefault.png');
            $table->longText('about')->nullable();
            $table ->string('city')->nullable();
            $table->time('since')->nullable();
            $table->time('to')->nullable();
            $table->unsignedBigInteger('period_of_book')->nullable();
            $table ->string('phone_number')->nullable();
            $table->boolean('forbiddin')->default(false);
            $table->string('fcm');
            $table->rememberToken();
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
        Schema::dropIfExists('vendors');
    }
};
