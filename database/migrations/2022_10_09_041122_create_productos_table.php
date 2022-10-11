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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descripcion');
            $table->unsignedBigInteger('precioStock',10,8);
            $table->unsignedBigInteger('precioUnitario',10,8);
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('idcategoria');
            $table->unsignedBigInteger('idmarca');
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idmarca')->references('id')->on('marca')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
