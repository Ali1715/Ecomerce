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
            $table->dateTime('FechaHora');
            $table->unsignedBigInteger('idempleado');
            $table->timestamps();

            $table->foreign('idempleado')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');
       
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
