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
        Schema::create('partecipa', function (Blueprint $table) {
            $table->bigInteger('IDOfferta')->unsigned();
            $table->bigInteger('Pacchetto')->unsigned();
            $table->foreign('IDOfferta')->references('IDOfferta')->on('offerta');
            $table->foreign('Pacchetto')->references('IDPacchetto')->on('pacchetto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partecipa');
    }
};
