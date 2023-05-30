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
        Schema::create('pubblica', function (Blueprint $table) {
            $table->bigInteger('IDOfferta')->unsigned();
            $table->foreign('IDOfferta')->references('IDOfferta')->on('offerta');
            $table->bigInteger('Azienda')->unsigned();
            $table->foreign('Azienda')->references('IDAzienda')->on('azienda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pubblica');
    }
};
