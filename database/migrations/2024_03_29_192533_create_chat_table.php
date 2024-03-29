<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id('id_chat');
            $table->unsignedBigInteger('id_mantenimiento');
            $table->unsignedBigInteger('id_usuario_cliente');
            $table->unsignedBigInteger('id_usuario_tecnico');
            $table->text('mensaje');
            $table->dateTime('fecha_envio');
            $table->timestamps();

            $table->foreign('id_mantenimiento')->references('id_mantenimiento')->on('mantenimiento')->onDelete('cascade');
            $table->foreign('id_usuario_cliente')->references('id_usuario')->on('usuario');
            $table->foreign('id_usuario_tecnico')->references('id_usuario')->on('usuario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
