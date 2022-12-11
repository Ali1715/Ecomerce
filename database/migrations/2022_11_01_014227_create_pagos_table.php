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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ctaOrd');
            $table->double('monto')->nullable();
            $table->double('costoEnv');
            $table->unsignedBigInteger('idTrans');
            $table->dateTime('fechaHora');
            $table->unsignedBigInteger('id_tipoPago');
            $table->foreign('id_tipoPago')->references('id')->on('tipo_pagos');
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
        Schema::dropIfExists('pagos');
    }
};
