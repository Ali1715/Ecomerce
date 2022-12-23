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
        Schema::create('detallenotabajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idnotabaja');
            $table->unsignedBigInteger('idproducto');
            $table->unsignedInteger('cantidad');
            $table->double('costo');
            $table->double('total');
            $table->string('observacion');
            $table->timestamps();
            $table->foreign('idnotabaja')->references('id')->on('notabajas');
            $table->foreign('idproducto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallenotabajas');
    }
};
