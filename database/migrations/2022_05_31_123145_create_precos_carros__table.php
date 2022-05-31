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
        Schema::create('precos_carros', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->decimal('preco',10,2);
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('modelo_id')->references('i
            3d')->on('modelos');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *------
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precos_carros_');
    }
};
