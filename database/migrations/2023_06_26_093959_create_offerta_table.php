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
            $table->id();
            $table->string('oggetto');
            $table->date('emissione');
            $table->date('scadenza');
            $table->unsignedTinyInteger('sconto');
            $table->decimal('prezzo', 10)->nullable();
            $table->unsignedBigInteger('AziendaID')->index();
            $table->foreign('AziendaID')->references('id')->on('azienda')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->text('descrizione')->nullable();
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
