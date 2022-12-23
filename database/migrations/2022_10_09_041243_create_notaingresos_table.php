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
        Schema::create('notaingresos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('fechaHora');
            $table->double('total');
            $table->unsignedBigInteger('idempleado');
            $table->unsignedBigInteger('idproveedor');
            $table->foreign('idempleado')->references('id')->on('personas');
            $table->foreign('idproveedor')->references('id')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notaingresos');
    }
};
