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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descripcion');
            $table->string('autor');
            $table->string('titulo');
            $table->string('genero');
            $table->enum('estado', ['DISPONIBLE', 'PRESTADO'])->default('DISPONIBLE');
            $table->string('ejemplares');
            $table->integer('categoriId')->unsigned();
            $table->foreign('categoriId')->references('id')->on('categorias');
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
        Schema::dropIfExists('books');
    }
};
