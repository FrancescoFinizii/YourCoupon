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
        Schema::create('users', function (Blueprint $table) {
            $table->string('username', 30)->primary();
            $table->string('password');
            $table->tinyInteger('role')->unsigned()->default(1);
            $table->string('Nome', 30);
            $table->string('Cognome', 30);
            $table->string('Email', 50);
            $table->date('Nascita');
            $table->string('Genere', 5);
            $table->string('Telefono', 10);
            $table->text('ProPic')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */


    public function down()
    {
        Schema::dropIfExists('utente');
    }
};
