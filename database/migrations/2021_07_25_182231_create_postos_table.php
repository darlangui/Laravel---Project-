<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj'); 
            $table->string('razao');
            $table->string('nome');
            $table->string('bandeira');
            $table->string('endereco'); 
            $table->string('bairro'); 
            $table->unsignedInteger('cidades_id');
            $table->foreign('cidades_id')->references('id')->on('cidades'); 
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
        Schema::dropIfExists('postos');
    }
}
