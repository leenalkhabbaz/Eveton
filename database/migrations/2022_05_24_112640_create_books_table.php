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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->integer('status_of_book')->default(0);
            $table->datetime('event_date');
            $table->longText('description')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('vendor_id')->constrained();
          //  $table->foreignId('copun_id')->constrained('copuns')->cascadeOnDelete();
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
        Schema::dropIfExists('books');
    }
};
