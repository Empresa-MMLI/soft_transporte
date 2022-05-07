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
            $table->bigIncrements('id');
            $table->text('itnerario');
            $table->bigInteger('embarque_id');
            $table->bigInteger('desembarque_id');
            $table->bigInteger('veiculo_id');
            $table->bigInteger('cliente_id');
            $table->bigInteger('rota_id');
            $table->timestamp('data_viagem');
            $table->timestamp('data_chegada');
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
        Schema::dropIfExists('viagens');
    }
};
