<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->string('correo')->unique();
            $table->string('contrasena');
            $table->unsignedBigInteger('id_rol');
            $table->timestamps();

            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

