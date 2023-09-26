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
        Schema::create('day_of_books', function (Blueprint $table) {
            $table->id();
            $table->datetime('day_of_book');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('hall_id')->constrained('halls');
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
        Schema::dropIfExists('day_of_books');
    }
};
