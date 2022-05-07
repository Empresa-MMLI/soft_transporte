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
        Schema::create('bilhetes', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('num_bilhete');
            $table->smallInteger('estado');
            $table->bigInteger('viagem_id');
            $table->bigInteger('cliente_id');
            $table->bigInteger('autocarro_id');
            $table->timestamps(); //Data da compra do bilhete : created_at

            $table->foreign('viagem_id')->references('id')->on('viagens');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('autocarro_id')->references('id')->on('autocarros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bilhetes');
    }
};
