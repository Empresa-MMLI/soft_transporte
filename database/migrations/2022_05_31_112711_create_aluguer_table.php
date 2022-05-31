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
        Schema::create('aluguer', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->decimal('preco',10,2);
            $table->integer('qtd_carros');
            $table->date('data_entrega');
            $table->date('data_prev_devol');
            $table->date('data_devolucao');
            $table->bigInteger('pedido_id');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluguer');
    }
};
