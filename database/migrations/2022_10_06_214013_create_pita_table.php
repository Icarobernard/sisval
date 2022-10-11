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
        Schema::create('pita', function (Blueprint $table) {
            $table->id();
            $table->string('maintenance');
            $table->string('tax');
            $table->string('concession');
            $table->string('time');
            $table->string('npt');
            $table->string('contribution');
            $table->string('volume');
            $table->string('investment');
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
        Schema::dropIfExists('pita');
    }
};