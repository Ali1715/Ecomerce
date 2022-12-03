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
        Schema::create('address_clients', function (Blueprint $table) {
            $table->id();
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('department');
            $table->string('country');
            $table->string('postal_code');
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('users');
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
        Schema::dropIfExists('address_clients');
    }
};
