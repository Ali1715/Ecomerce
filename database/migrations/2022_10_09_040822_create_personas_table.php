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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('ci')->unique();
            $table->string('correo')->unique();
            $table->smallInteger('sexo');
            $table->integer('celular')->unique();
            $table->string('domicilio');
            $table->float('salario')->nullable();
            $table->string('estadoemp')->nullable();
            $table->string('estadocli')->nullable();
            $table->smallInteger('tipoc');
            $table->smallInteger('tipoe');
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('personas');
    }
};
