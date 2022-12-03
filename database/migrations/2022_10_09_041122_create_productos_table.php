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
            $table->text('descripcion');
            $table->integer('stock');
            $table->double('precioUnitario');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('idcategoria');
            $table->unsignedBigInteger('idmarca');
            $table->unsignedBigInteger('idpromocion')->nullable();
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idmarca')->references('id')->on('marcas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idpromocion')->references('id')->on('promocions');
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
