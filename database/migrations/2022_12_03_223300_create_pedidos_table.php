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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaHora');
            $table->double('total');
            $table->string('estado');
            $table->date('fechaEnvio')->nullable();
            $table->date('fechaEntrega')->nullable();
            $table->unsignedBigInteger('id_carrito');
            $table->unsignedBigInteger('id_direccion');
            $table->unsignedBigInteger('id_pago');
            $table->foreign('id_carrito')->references('id')->on('carritos');
            $table->foreign('id_direccion')->references('id')->on('address_clients');
            $table->foreign('id_pago')->references('id')->on('pagos');
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
        Schema::dropIfExists('pedidos');
    }
};
