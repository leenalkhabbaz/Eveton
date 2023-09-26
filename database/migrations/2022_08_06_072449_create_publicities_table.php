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
        Schema::create('publicities', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('vendor_id')->constrained('vendors')->nullable();
            // $table->foreignId('hall_id')->constrained('halls')->nullable();
            // $table->foreignId('copun_id')->constrained('copuns')->nullable();
            $table->enum('type', ['default', 'copun']);
            $table->string('vendorName')->nullable();
            $table->string('hallName')->nullable();
            $table->string('copunCode')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('publicities');
    }
};
