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
        Schema::create('copuns', function (Blueprint $table) {
            $table->id();
            //$table->datetime('datebegin');
            $table->datetime('datefinish')->nullable();
            $table->unsignedBigInteger('period_of_copun')->nullable();
            $table->float('amount')->nullable();
            $table->string('code_owner')->nullable();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();


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
        Schema::dropIfExists('copuns');
    }
};
