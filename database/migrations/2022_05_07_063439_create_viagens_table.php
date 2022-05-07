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
        Schema::create('viagens', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->text('itnerario');
            $table->timestamp('data_partida');
            $table->timestamp('data_chegada');
            $table->bigInteger('embarque_id');
            $table->bigInteger('desembarque_id');
            $table->bigInteger('autocarro_id');
            $table->bigInteger('rota_id');
            $table->bigInteger('classe_id');

            $table->double('preco_viagem');

            $table->timestamps();

            $table->foreign('embarque_id')->references('id')->on('pontos_embarque');
            $table->foreign('desembarque_id')->references('id')->on('pontos_desembarque');
            $table->foreign('autocarro_id')->references('id')->on('autocarros');
            $table->foreign('rota_id')->references('id')->on('rotas');
            $table->foreign('classe_id')->references('id')->on('classes');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viagens');
    }
};
