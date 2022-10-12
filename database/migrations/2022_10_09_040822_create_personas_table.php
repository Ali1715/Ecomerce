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
            $table->string('name');
            $table->integer('ci')->unique();
            $table->string('email')->unique();
            $table->char('sexo');
            $table->integer('celular')->unique();
            $table->string('domicilio');
            $table->double('salario')->nullable();
            $table->string('estadoemp')->nullable();
            $table->string('estadocli')->nullable();
            $table->smallInteger('tipoc');
            $table->smallInteger('tipoe');
            $table->unsignedBigInteger('iduser')->nullable();
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
