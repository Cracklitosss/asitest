<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->id('id_mantenimiento');
            $table->unsignedBigInteger('id_producto');
            $table->string('estatus', 50);
            $table->timestamps();

            $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mantenimiento');
    }
}
