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
            $table->unsignedBigInteger('idnota')->primary();
            $table->unsignedBigInteger('idproducto')->primary();
            $table->unsignedBigInteger('cantidad');
            $table->decimal('costo',10,8);
            $table->decimal('total',10,8);
            $table->timestamps();

            $table->foreing('idnota')->reference('id')->on('notaingresos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreing('idproducto')->reference('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
