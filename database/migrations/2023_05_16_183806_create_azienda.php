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
        Schema::create('azienda', function (Blueprint $table) {
            $table->bigIncrements('IDAzienda')->unsigned()->index();
            $table->string('RagioneSociale', 50);
            $table->string('Sede', 50);
            $table->string('Tipologia', 50);
            $table->string('Descrizione', 2500);
            $table->string('Mail', 50);
            $table->string('Link', 2000);
            $table->string('Telefono', 10);
            $table->text('Logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_azienda');
    }
};
