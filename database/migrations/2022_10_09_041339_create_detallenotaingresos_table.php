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
            $table->unsignedBigInteger('idnota');
            $table->unsignedBigInteger('idproducto');
            $table->unsignedBigInteger('cantidad');
            $table->double('costo');
            $table->double('total');
            $table->timestamps();
            $table->primary('idnota', 'idproducto');
            $table->foreign('idnota')->references('id')->on('notaingresos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idproducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
