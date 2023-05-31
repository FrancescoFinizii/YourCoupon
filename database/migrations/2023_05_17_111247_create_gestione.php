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
        Schema::create('gestione', function (Blueprint $table) {
            $table->string('users', 30);
            $table->foreign('users')->references('Username')->on('users');
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
        Schema::dropIfExists('gestione');
    }
};
