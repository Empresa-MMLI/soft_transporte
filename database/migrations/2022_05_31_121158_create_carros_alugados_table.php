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
        Schema::create('carros_alugados', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('matricula')->unique();
            $table->bigInteger('veiculos_id');
            $table->bigInteger('aluguer_id');
            $table->foreign('veiculos_id')->references('id')->on('veiculos');
            $table->foreign('aluguer_id')->references('id')->on('aluguer');
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
        Schema::dropIfExists('carros_alugados');
    }
};
