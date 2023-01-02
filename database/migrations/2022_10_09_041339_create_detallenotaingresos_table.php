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
        Schema::create('detallenotaingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idnotaing');
            $table->unsignedBigInteger('idproducto');
            $table->unsignedInteger('cantidad');
            $table->double('costo');
            $table->double('total');
            $table->timestamps();
            $table->foreign('idnotaing')->references('id')->on('notaingresos');
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
        Schema::dropIfExists('detallenotaingresos');
    }
};
