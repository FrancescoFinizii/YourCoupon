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
        Schema::create("cliente", function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('cognome', 30);
            $table->string('email', 60);
            $table->string('genere', 15);
            $table->string('telefono', 20);
            $table->date('dataNascita');
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
};
