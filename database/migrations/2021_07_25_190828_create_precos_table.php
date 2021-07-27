<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->float('precov');
            $table->date('coleta'); 
            $table->unsignedInteger('postos_id');
            $table->foreign('postos_id')->references('id')->on('postos'); 
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
        Schema::dropIfExists('precos');
    }
}
