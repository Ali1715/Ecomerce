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
        Schema::create('notabajas', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->dateTime('fechaHora');
            $table->unsignedBigInteger('idempleado');
            $table->timestamps();
            $table->foreign('idempleado')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notabajas');
    }
};
