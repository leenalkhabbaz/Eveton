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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('user_name');
            // $table->foreignId('vendor_id')->constrained('vendors');
            // $table->foreignId('hall_id')->constrained('halls');
            $table->foreignId('post_id')->constrained('posts');

            $table->string('rating'); // 1 to 5
            //$table->enum('rating', [1, 2, 3, 4, 5]); // 1 to 5
            $table->text('rating_text')->nullable();
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
        Schema::dropIfExists('ratings');
    }
};
