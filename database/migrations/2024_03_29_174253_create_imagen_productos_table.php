<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenProductosTable extends Migration
{
    public function up()
    {
        Schema::create('imagen_productos', function (Blueprint $table) {
            $table->id();
            $table->string('url_imagen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen_productos');
    }
}

