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
        Schema::create('offerta', function (Blueprint $table) {
            $table->bigIncrements('IDOfferta')->unsigned();
            $table->string('Titolo', 30);
            $table->float('Prezzo');
            $table->integer('Sconto')->unsigned();
            $table->bigInteger('Azienda')->unsigned()->index();
            $table->foreign('Azienda')->references('IDAzienda')->on('azienda');
            $table->date('Inizio');
            $table->date('Scadenza');
            $table->string('Fruizione', 30);
            $table->string('Descrizione', 2500);
            $table->text('FotoProd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerta');
    }
};
