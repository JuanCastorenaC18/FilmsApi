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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->integer('duracion')->nullable();
            $table->text('sinopsis')->nullable();
            $table->text('imagen')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_director');
            
            $table->foreign('id_categoria')->references('id_categoria')->on('categories');
            $table->foreign('id_director')->references('id_director')->on('directors');
            
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
        Schema::dropIfExists('movies_tables');
    }
};
