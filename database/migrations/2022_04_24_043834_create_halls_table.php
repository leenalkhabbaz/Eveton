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
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->string('type');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
           // $table->string('gendre');/************مابدنا ياه */
            $table ->string('profile_thumbnail')->default('userdefault.png');
            $table->boolean('forbiddin')->default(false);
            $table->longText('about')->nullable();
            $table ->string('city')->nullable();
            $table->time('since')->nullable();
            $table->time('to')->nullable();
            $table->unsignedBigInteger('period_of_book')->nullable();
            $table->unsignedBigInteger('number_of_client')->nullable();
            $table ->string('phone_number')->nullable();
            $table->unsignedBigInteger('max_number_of_person')->nullable();
            $table->unsignedBigInteger('min_number_of_person')->nullable();

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
        Schema::dropIfExists('halls');
    }
};
