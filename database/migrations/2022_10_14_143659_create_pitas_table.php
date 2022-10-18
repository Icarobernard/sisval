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
        Schema::create('pitas', function (Blueprint $table) {
            $table->id();
            $table->float('maintenance');
            $table->float('tax');
            $table->integer('period');
            $table->integer('concession');
            $table->integer('npt');
            $table->integer('contribution');
            $table->integer('volume');
            $table->integer('investment');
            $table->string('pmargem');
            $table->string('pvolume');
            $table->string('pinvestimento');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('pitas');
    }
};