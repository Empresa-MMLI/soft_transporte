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
        Schema::create('pontos_desembarque', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('ponto')->unique();
            $table->bigInteger('provincia_id');
            $table->timestamps();

            $table->foreign('provincia_id')->references('id')->on('provincias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pontos_desembarque');
    }
};
