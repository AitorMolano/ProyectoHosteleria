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
        Schema::dropIfExists('pedidos');

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->integer('suma_Precio');
            $table->enum('estado', ['pedido enviado', 'en proceso','en camino','recibido' ])->default('pedido enviado');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
